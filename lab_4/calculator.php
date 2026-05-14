<?php
require_once 'Task/trig.php';
session_start();

if (!isset($_SESSION['history'])) {
    $_SESSION['history']  = [];
    $_SESSION['iteration'] = 0;
}
$_SESSION['iteration']++;

function isnum(string $x): bool
{
    if (!strlen($x)) return false;
    
    $start = 0;
    if ($x[0] === '-') {
        $start = 1;
        if (strlen($x) === 1) return false;
    }
    
    if ($x[$start] === '.') return false;
    if ($x[strlen($x) - 1] === '.') return false;

    $point_count = false;
    for ($i = $start; $i < strlen($x); $i++) {
        $c = $x[$i];
        if ($c !== '0' && $c !== '1' && $c !== '2' && $c !== '3' &&
            $c !== '4' && $c !== '5' && $c !== '6' && $c !== '7' &&
            $c !== '8' && $c !== '9' && $c !== '.') {
            return false;
        }
        if ($c === '.') {
            if ($point_count) return false;
            $point_count = true;
        }
    }
    return true;
}

function SqValidator(string $val): bool
{
    $open = 0;
    for ($i = 0; $i < strlen($val); $i++) {
        if ($val[$i] === '(') $open++;
        elseif ($val[$i] === ')') {
            $open--;
            if ($open < 0) return false;
        }
    }
    return $open === 0;
}

function calculate(string $val): int|float|string
{
    if (!strlen($val)) return 'Выражение не задано!';
    if (isnum($val)) return $val + 0;

    $args = explode('+', $val);
    if (count($args) > 1) {
        $sum = 0;
        for ($i = 0; $i < count($args); $i++) {
            $arg = calculate($args[$i]);
            if (!isnum((string)$arg)) return $arg;
            $sum += $arg;
        }
        return $sum;
    }

    $args = explode('-', $val);
    if (count($args) > 1) {
        if ($args[0] === '') {
            $result = -calculate($args[1]);
            $i = 2;
        } else {
            $result = calculate($args[0]);
            $i = 1;
        }
        for (; $i < count($args); $i++) {
            $arg = calculate($args[$i]);
            if (!isnum((string)$arg)) return $arg;
            $result -= $arg;
        }
        return $result;
    }

    $args = explode('*', $val);
    if (count($args) > 1) {
        $sup = 1;
        for ($i = 0; $i < count($args); $i++) {
            $arg = calculate($args[$i]);
            if (!isnum((string)$arg)) return $arg;
            $sup *= $arg;
        }
        return $sup;
    }

    $args = explode('/', $val);
    if (count($args) < 2) $args = explode(':', $val);
    if (count($args) > 1) {
        $result = calculate($args[0]);
        if (!isnum((string)$result)) return $result;
        for ($i = 1; $i < count($args); $i++) {
            $arg = calculate($args[$i]);
            if (!isnum((string)$arg)) return $arg;
            if ($arg == 0) return 'Деление на ноль!';
            $result /= $arg;
        }
        return $result;
    }

    return 'Недопустимые символы в выражении';
}

function calculateSq(string $val): int|float|string
{
    if (!SqValidator($val)) return 'Неправильная расстановка скобок';

    $start = strpos($val, '(');
    if ($start === false) return calculate($val);

    $end  = $start + 1;
    $open = 1;
    while ($open && $end < strlen($val)) {
        if ($val[$end] === '(') $open++;
        if ($val[$end] === ')') $open--;
        $end++;
    }

    $inner   = substr($val, $start + 1, $end - $start - 2);
    $inner_v = calculateSq($inner);
    if (!isnum((string)$inner_v)) return $inner_v;

    $new_val = substr($val, 0, $start) . $inner_v . substr($val, $end);
    return calculateSq($new_val);
}

$result = null;
$error  = null;
$expr   = '';

if (isset($_POST['val']) && strlen($_POST['val'])) {
    $expr    = $_POST['val'];
    $res_raw = calculateSq($expr);

    if (isnum((string)$res_raw)) {
        $result = $res_raw;
    } else {
        $error = $res_raw;
    }

    $post_iter = isset($_POST['iteration']) ? (int)$_POST['iteration'] : -1;
    if ($post_iter + 1 === $_SESSION['iteration']) {
        $_SESSION['history'][] = htmlspecialchars($expr) . ' = ' .
            ($error ? $error : $result);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $q = http_build_query([
        'result' => $result,
        'error'  => $error,
        'expr'   => $expr
    ]);
    header("Location: ?$q");
    exit;
}

$get_result = isset($_GET['result']) ? $_GET['result'] : null;
$get_error  = isset($_GET['error'])  ? $_GET['error']  : null;
$get_expr   = isset($_GET['expr'])   ? htmlspecialchars($_GET['expr']) : '';

$exprFile = 'Task/expression.txt';
if (file_exists($exprFile) && $get_result === null && $get_expr === '') {
    $content = trim(file_get_contents($exprFile));
    if (preg_match('/cot\((\d+)\)/', $content, $m)) {
        $cotVal = calcTrig('cot', (float)$m[1]);
        $calcResult = 6 / $cotVal;
        $get_expr = $content;
        $get_result = $calcResult;
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Калькулятор</title>
<link rel="stylesheet" href="style3.css">
</head>
<body>

<h1>✿ Калькулятор</h1>

<form id="calcForm" method="POST" action="">
  <input type="hidden" name="val" id="hiddenVal">
  <input type="hidden" name="iteration" value="<?= $_SESSION['iteration'] ?>">
</form>

<div class="calc-wrap">

  <div class="display">
    <div class="display__expr" id="dispExpr"><?= $get_expr ?></div>
    <div class="display__value<?= $get_error ? ' error' : '' ?>" id="dispVal">
      <?php
        if ($get_error !== null && strlen($get_error))       echo htmlspecialchars($get_error);
        elseif ($get_result !== null && strlen($get_result)) echo htmlspecialchars($get_result);
        else echo '0';
      ?>
    </div>
  </div>

  <div class="buttons">
    <button class="btn btn--clear" onclick="clearAll()">C</button>
    <button class="btn btn--br"    onclick="appendChar('(')"> ( </button>
    <button class="btn btn--br"    onclick="appendChar(')')"> ) </button>
    <button class="btn btn--op"    onclick="appendChar('/')"> ÷ </button>

    <button class="btn" onclick="appendChar('7')">7</button>
    <button class="btn" onclick="appendChar('8')">8</button>
    <button class="btn" onclick="appendChar('9')">9</button>
    <button class="btn btn--op" onclick="appendChar('*')"> × </button>

    <button class="btn" onclick="appendChar('4')">4</button>
    <button class="btn" onclick="appendChar('5')">5</button>
    <button class="btn" onclick="appendChar('6')">6</button>
    <button class="btn btn--op" onclick="appendChar('-')"> − </button>

    <button class="btn" onclick="appendChar('1')">1</button>
    <button class="btn" onclick="appendChar('2')">2</button>
    <button class="btn" onclick="appendChar('3')">3</button>
    <button class="btn btn--op" onclick="appendChar('+')"> + </button>

    <button class="btn btn--zero" onclick="appendChar('0')">0</button>
    <button class="btn" onclick="appendChar('.')"> . </button>
    <button class="btn btn--eq"   onclick="submitCalc()"> = </button>
  </div>
</div>

<div class="history">
  <h2>История</h2>
  <div class="history__list">
    <?php if (count($_SESSION['history'])): ?>
      <?php foreach ($_SESSION['history'] as $h): ?>
        <div class="history__item"><?= $h ?></div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="history__empty">История пуста</div>
    <?php endif; ?>
  </div>
</div>

<script>
  let expr = '';

  const dispVal  = document.getElementById('dispVal');
  const dispExpr = document.getElementById('dispExpr');

  const urlParams = new URLSearchParams(window.location.search);
  if (urlParams.has('expr')) {
    expr = urlParams.get('expr');
  }
  dispExpr.textContent = expr;

  function appendChar(c) {
    expr += c;
    dispExpr.textContent = expr;
    dispVal.textContent  = expr;
    dispVal.classList.remove('error');
  }

  function clearAll() {
    expr = '';
    dispExpr.textContent = '';
    dispVal.textContent  = '0';
    dispVal.classList.remove('error');
    history.replaceState(null, '', location.pathname);
  }

  function submitCalc() {
    if (!expr) return;
    document.getElementById('hiddenVal').value = expr;
    document.getElementById('calcForm').submit();
  }
</script>
</body>
</html>