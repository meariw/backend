<?php

// Входные данные
$equation = "3 * 4 = 12";

echo "========================================\n";
echo "  РЕШЕНИЕ УРАВНЕНИЯ\n";
echo "========================================\n";
echo "Уравнение: $equation\n\n";


// Парсинг уравнения
function parseEquation(string $equation): array
{
    $eq = strtoupper(str_replace(' ', '', $equation));

    if (substr_count($eq, '=') !== 1) {
        throw new InvalidArgumentException("Уравнение должно содержать ровно один знак '='.");
    }
    [$left, $right] = explode('=', $eq);

    $operators = ['+', '-', '*', '/'];
    $operator  = null;

    foreach ($operators as $op) {
        if (preg_match('/(?<=\w)\\' . $op . '/', $left) ||
            preg_match('/(?<=\w)\\' . $op . '/', $right)) {
            $operator = $op;
            break;
        }
    }

    if ($operator === null) {
        throw new RuntimeException("Оператор не найден в уравнении.");
    }

    return [
        'left'     => $left,
        'right'    => $right,
        'operator' => $operator,
        'original' => $equation,
    ];
}


// Определение расположения переменной
function findVariablePosition(array $parsed): array
{
    $left     = $parsed['left'];
    $right    = $parsed['right'];
    $operator = $parsed['operator'];

    $varInLeft  = str_contains($left,  'X');
    $varInRight = str_contains($right, 'X');

    if ($varInLeft && $varInRight) {
        throw new RuntimeException("Переменная X находится в обеих частях — уравнение слишком сложное для данной программы.");
    }
    if (!$varInLeft && !$varInRight) {
        throw new RuntimeException("Переменная X не найдена в уравнении.");
    }

    $side = $varInLeft ? 'left' : 'right';
    $part = $varInLeft ? $left  : $right;

    $operands = preg_split('/(?<=\w)\\' . $operator . '/', $part);
    $position = str_contains($operands[0], 'X') ? 'left_operand' : 'right_operand';

    $numericPart = str_replace('X', '', $part);
    $numericPart = str_replace($operator, '', $numericPart);
    $coefficient = (float) $numericPart;

    $result = (float) ($varInLeft ? $right : $left);

    return [
        'side'        => $side,
        'position'    => $position,
        'coefficient' => $coefficient,
        'result'      => $result,
        'operator'    => $operator,
    ];
}

// Вычисление значения X
function solveForX(array $info): float
{
    $c  = $info['coefficient'];
    $r  = $info['result'];
    $op = $info['operator'];
    $pos = $info['position']; 

    switch ($op) {
        case '+':
            return $r - $c;

        case '-':
            if ($pos === 'left_operand') {
                return $r + $c;
            } else {
                return $c - $r;
            }

        case '*':
            if ($c == 0) {
                throw new DivisionByZeroError("Коэффициент равен нулю — деление невозможно.");
            }
            return $r / $c;

        case '/':
            if ($pos === 'left_operand') {
                return $r * $c;
            } else {
                if ($r == 0) {
                    throw new DivisionByZeroError("Результат равен нулю — деление невозможно.");
                }
                return $c / $r;
            }

        default:
            throw new RuntimeException("Неизвестный оператор: $op");
    }
}

//  ГЛАВНАЯ ПРОГРАММА
try {
    $parsed = parseEquation($equation);
    echo "--- Анализ уравнения ---\n";
    echo "Левая часть  : {$parsed['left']}\n";
    echo "Правая часть : {$parsed['right']}\n";
    echo "Оператор     : {$parsed['operator']}\n\n";

    $info = findVariablePosition($parsed);
    $sideLabel     = $info['side'] === 'left' ? 'левой' : 'правой';
    $positionLabel = $info['position'] === 'left_operand'
        ? 'левый операнд (X стоит первым)'
        : 'правый операнд (X стоит вторым)';

    echo "--- Расположение переменной ---\n";
    echo "Переменная X находится в {$sideLabel} части уравнения\n";
    echo "Позиция X    : $positionLabel\n";
    echo "Коэффициент  : {$info['coefficient']}\n";
    echo "Результат    : {$info['result']}\n\n";

    $x = solveForX($info);
    echo "--- Решение ---\n";
    printf("X = %.4g\n\n", $x);


} catch (Throwable $e) {
    echo "ОШИБКА: " . $e->getMessage() . "\n";
}

echo "\n========================================\n";
echo "  КОНЕЦ ПРОГРАММЫ\n";
echo "========================================\n";