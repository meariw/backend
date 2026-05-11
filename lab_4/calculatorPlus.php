<?php
session_start();

if (!isset($_SESSION['history'])) {
    $_SESSION['history'] = [];
}


function validateExpression($expr) {
    $expr = trim($expr);
    
    if (empty($expr)) {
        return "Ошибка: выражение не может быть пустым";
    }
    
    $allowedChars = '0123456789+-*/^()!,. lnlogsqrtπe';
    for ($i = 0; $i < strlen($expr); $i++) {
        if (strpos($allowedChars, $expr[$i]) === false) {
            return "Ошибка: недопустимый символ '{$expr[$i]}'";
        }
    }
    
    $balance = 0;
    for ($i = 0; $i < strlen($expr); $i++) {
        if ($expr[$i] === '(') $balance++;
        if ($expr[$i] === ')') $balance--;
        if ($balance < 0) return "Ошибка: неверная расстановка скобок";
    }
    if ($balance !== 0) return "Ошибка: несбалансированные скобки";
    
    return true;
}

function replaceConstants($expr) {
    $expr = str_replace('π', M_PI, $expr);
    $expr = str_replace('pi', M_PI, $expr);
    $expr = str_replace('e', M_E, $expr);
    return $expr;
}

function calculateLog($value, $base = null) {
    if ($value <= 0) {
        throw new Exception("Логарифм определён только для положительных чисел!");
    }
    
    if ($base === null || $base == 10) {
        return log10($value);
    }
    
    if ($base <= 0 || $base == 1) {
        throw new Exception("Основание логарифма должно быть положительным и не равным 1!");
    }
    
    return log($value) / log($base);
}

function parseExpression($tokens, &$index) {
    $left = parseTerm($tokens, $index);
    
    while ($index < count($tokens) && ($tokens[$index] === '+' || $tokens[$index] === '-')) {
        $op = $tokens[$index];
        $index++;
        $right = parseTerm($tokens, $index);
        
        if ($op === '+') {
            $left += $right;
        } else {
            $left -= $right;
        }
    }
    
    return $left;
}

function parseTerm($tokens, &$index) {
    $left = parsePower($tokens, $index);
    
    while ($index < count($tokens) && ($tokens[$index] === '*' || $tokens[$index] === '/')) {
        $op = $tokens[$index];
        $index++;
        $right = parsePower($tokens, $index);
        
        if ($op === '*') {
            $left *= $right;
        } else {
            if ($right == 0) {
                throw new Exception("Деление на ноль!");
            }
            $left /= $right;
        }
    }
    
    return $left;
}

function parsePower($tokens, &$index) {
    $left = parseFactor($tokens, $index);
    
    if ($index < count($tokens) && $tokens[$index] === '^') {
        $index++;
        $right = parsePower($tokens, $index);
        return pow($left, $right);
    }
    
    return $left;
}

function parseFactor($tokens, &$index) {
    $token = $tokens[$index];
    
    if (is_numeric($token)) {
        $index++;
        return (float)$token;
    }
    
    if ($token === '-') {
        $index++;
        return -parseFactor($tokens, $index);
    }
    
    if ($token === '(') {
        $index++;
        $result = parseExpression($tokens, $index);
        if ($index < count($tokens) && $tokens[$index] === ')') {
            $index++;
        }
        return $result;
    }
    
    if ($token === 'sqrt') {
        $index++;
        if ($tokens[$index] === '(') {
            $index++;
            $arg = parseExpression($tokens, $index);
            if ($tokens[$index] === ')') $index++;
            if ($arg < 0) throw new Exception("Корень из отрицательного числа!");
            return sqrt($arg);
        }
    }
    
    if ($token === 'ln') {
        $index++;
        if ($tokens[$index] === '(') {
            $index++;
            $arg = parseExpression($tokens, $index);
            if ($tokens[$index] === ')') $index++;
            if ($arg <= 0) throw new Exception("ln определён только для положительных чисел!");
            return log($arg);
        }
    }
    
    if ($token === 'log') {
        $index++;
        if ($tokens[$index] === '(') {
            $index++;
            $firstArg = parseExpression($tokens, $index);
            
            if ($tokens[$index] === ',') {
                $index++;
                $secondArg = parseExpression($tokens, $index);
                $result = calculateLog($firstArg, $secondArg);
            } else {
                $result = calculateLog($firstArg, 10);
            }
            
            if ($tokens[$index] === ')') $index++;
            return $result;
        }
    }
    
    throw new Exception("Неожиданный токен: $token");
}

function tokenize($expr) {
    $tokens = [];
    $i = 0;
    $len = strlen($expr);
    
    while ($i < $len) {
        $char = $expr[$i];
        
        if ($char === ' ') {
            $i++;
            continue;
        }
        
        if (is_numeric($char) || $char === '.') {
            $num = '';
            while ($i < $len && (is_numeric($expr[$i]) || $expr[$i] === '.')) {
                $num .= $expr[$i];
                $i++;
            }
            $tokens[] = $num;
            continue;
        }
        
        if (substr($expr, $i, 4) === 'sqrt') {
            $tokens[] = 'sqrt';
            $i += 4;
            continue;
        }
        
        if (substr($expr, $i, 2) === 'ln') {
            $tokens[] = 'ln';
            $i += 2;
            continue;
        }
        
        if (substr($expr, $i, 3) === 'log') {
            $tokens[] = 'log';
            $i += 3;
            continue;
        }
        
        if ($char === '!') {
            $tokens[] = '!';
            $i++;
            continue;
        }
        
        if ($char === ',') {
            $tokens[] = ',';
            $i++;
            continue;
        }
        
        if (strpos('+-*/^()', $char) !== false) {
            $tokens[] = $char;
            $i++;
            continue;
        }
        
        $i++;
    }
    
    return $tokens;
}

function factorial($n) {
    if ($n < 0) throw new Exception("Факториал отрицательного числа не определён!");
    if ($n != floor($n)) throw new Exception("Факториал дробного числа не определён!");
    if ($n > 170) throw new Exception("Число слишком велико для факториала!");
    
    $result = 1;
    for ($i = 2; $i <= $n; $i++) {
        $result *= $i;
    }
    return $result;
}

function calculateExpression($expr) {
    try {
        $expr = replaceConstants($expr);
        
        while (($pos = strpos($expr, '!')) !== false) {
            $start = $pos - 1;
            while ($start >= 0 && (is_numeric($expr[$start]) || $expr[$start] === '.' || $expr[$start] === '-')) {
                $start--;
            }
            $start++;
            $number = substr($expr, $start, $pos - $start);
            
            if (strpos($number, '(') !== false) {
                $number = substr($expr, $start + 1, $pos - $start - 2);
                $calculated = calculateExpression($number);
                $factResult = factorial($calculated);
            } else {
                $factResult = factorial((float)$number);
            }
            
            $expr = substr($expr, 0, $start) . $factResult . substr($expr, $pos + 1);
        }
        
        $tokens = tokenize($expr);
        $index = 0;
        $result = parseExpression($tokens, $index);
        
        if (is_float($result) && abs($result - round($result, 10)) < 1e-10) {
            $result = round($result, 10);
        }
        
        return $result;
        
    } catch (Exception $e) {
        return $e->getMessage();
    }
}


echo "=== КАЛЬКУЛЯТОР ===\n";
echo "Операции: + - * / ^ ( ) !\n";
echo "Функции: sqrt(x), ln(x), log(x), log(x, base)\n";
echo "Константы: π, pi, e\n";
echo "Команды: exit, history, clear\n";
echo "===================\n\n";

while (true) {
    echo "> ";
    $input = trim(fgets(STDIN));
    
    if ($input === 'exit') {
        echo "До свидания!\n";
        break;
    }
    
    if ($input === 'history') {
        if (empty($_SESSION['history'])) {
            echo "История пуста\n";
        } else {
            foreach ($_SESSION['history'] as $entry) {
                echo $entry . "\n";
            }
        }
        continue;
    }
    
    if ($input === 'clear') {
        $_SESSION['history'] = [];
        echo "История очищена\n";
        continue;
    }
    
    if (empty($input)) continue;
    
    $validationResult = validateExpression($input);
    
    if ($validationResult !== true) {
        echo "Ошибка: $validationResult\n";
    } else {
        $result = calculateExpression($input);
        $_SESSION['history'][] = $input . ' = ' . $result;
        echo "Результат: $result\n";
    }
}
?>