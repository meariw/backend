<?php

/*
$a = 27;
$b = 12;

$c = sqrt($a ** 2 + $b ** 2);
$c = round($c, 2);

echo $c;
*/

/*
$a = 27;
$b = 12;

$c = sqrt($a ** 2 - $b ** 2);
$c = round($c, 2);

echo $c;
*/

/*
$a = 27;
$b = 23;

$c = sqrt($a ** 2 - $b ** 2);
$c = round($c, 2);

$angle = rad2deg(acos($b / $a));
$angle = round($angle, 2);

echo $c . "\n" . $angle;
*/

/*
$a = 27;
$b = 12;

$c = sqrt($a ** 2 - $b ** 2);
$c = round($c, 2);

$angle1 = rad2deg(asin($b / $a));
$angle1 = round($angle1, 2);

$angle2 = rad2deg(asin($c / $a));
$angle2 = round($angle2, 2);

$angle3 = 90;

echo "Угол A: " . $angle1 . "\n";
echo "Угол B: " . $angle2 . "\n";
echo "Угол C: " . $angle3;
*/

/*
$a = 2;
$b = 2.0;
$c = '2';
$d = 'two';
$g = true;
$f = false;

$result1 = $a . $c;
$result2 = $b . $c;
$result3 = $c . $c;
$result4 = $g . $c;
$result5 = $f . $c;
$result6 = $a . $d;
$result7 = $c . $d;
$result8 = $g . $d;
$result9 = $a . $g;
$result10 = $a . $f;

var_dump($result1);
var_dump($result2);
var_dump($result3);
var_dump($result4);
var_dump($result5);
var_dump($result6);
var_dump($result7);
var_dump($result8);
var_dump($result9);
var_dump($result10);
*/

/*
$a = 2;
$b = 2.0;
$c = '2';
$d = 'two';
$g = true;
$f = false;

$result1 = $a == $b;
$result2 = $a == $c;
$result3 = $a === $b;
$result4 = $a === $c;
$result5 = $a > $b;
$result6 = $a < $c;
$result7 = $a >= $b;
$result8 = $a <= $c;
$result9 = $a != $b;
$result10 = $a != $c;
$result11 = $a !== $b;
$result12 = $a !== $c;
$result13 = $a && $g;
$result14 = $a || $f;
$result15 = !$f;
$result16 = $g && $c;
$result17 = $f || $d;

var_dump($result1);
var_dump($result2);
var_dump($result3);
var_dump($result4);
var_dump($result5);
var_dump($result6);
var_dump($result7);
var_dump($result8);
var_dump($result9);
var_dump($result10);
var_dump($result11);
var_dump($result12);
var_dump($result13);
var_dump($result14);
var_dump($result15);
var_dump($result16);
var_dump($result17);
*/

/*
$a = 2;
$b = 2.0;
$c = '2';
$d = 'two';
$g = true;
$f = false;

$result1 = $a + $b;
$result2 = $b + $c;
$result3 = $b + $g;
$result4 = $b + $f;
$result5 = $a - $b;
$result6 = $a * $b;
$result7 = $a / $b;
$result8 = $b / $a;
$result9 = $b / $c;
$result10 = $a / $b;
$result11 = $b / $g;

var_dump($result1);
var_dump($result2);
var_dump($result3);
var_dump($result4);
var_dump($result5);
var_dump($result6);
var_dump($result7);
var_dump($result8);
var_dump($result9);
var_dump($result10);
var_dump($result11);
*/

/*
$a = true;
$b = false;

echo $a . "\n";
echo $b . "\n";

var_dump($a);
var_dump($b);
*/

/*
$a = 2;
$b = 2.0;
$c = '2';
$d = 'two';
$g = true;
$f = false;

$result1 = $a + $c;
$result2 = $a + $g;
$result3 = $a + $f;
$result4 = $c + $c;
$result5 = $c + $g;
$result6 = $c + $f;
$result7 = $g + $g;
$result8 = $g + $f;
$result9 = $a - $c;
$result10 = $a - $g;
$result11 = $a - $f;
$result12 = $a * $c;
$result13 = $a * $g;
$result14 = $a * $f;
$result15 = $c * $c;
$result16 = $c * $g;
$result17 = $c * $f;

var_dump($result1);
var_dump($result2);
var_dump($result3);
var_dump($result4);
var_dump($result5);
var_dump($result6);
var_dump($result7);
var_dump($result8);
var_dump($result9);
var_dump($result10);
var_dump($result11);
var_dump($result12);
var_dump($result13);
var_dump($result14);
var_dump($result15);
var_dump($result16);
var_dump($result17);
*/

/*
$hunter = 'охотник';
$wants_to = 'желает';
$know = 'знать';
$fizan = 'фазан';
$sits = 'сидит';

$phrase = "Каждый $hunter $wants_to $know, где $sits $fizan";

echo $phrase;
*/

/*
$quieter = 'Тише';
$go = 'едешь';
$further = 'дальше';

$phrase = "$quieter $go - $further будешь";

echo $phrase;
*/

/*
$not_take_risks = 'Кто не рискует';
$not_drink = 'не пьет';
$ellipsis = '...';

$phrase = "$not_take_risks, тот $not_drink шампанское$ellipsis";

echo $phrase;
*/

/*
$give = 'Дают';
$take = 'бери';
$beat = 'бьют';
$run = 'беги';

$phrase = "$give - $take, $beat - $run";

echo $phrase;
*/

/*
$quieter = 'Тише';
$go = 'едешь';
$further = 'дальше';

$phrase = $quieter . ' ' . $go . ' - ' . $further . ' будешь';

echo $phrase;
*/

/*
$give = 'Дают';
$take = 'бери';
$beat = 'бьют';
$run = 'беги';

$phrase = $give . ' - ' . $take . ', ' . $beat . ' - ' . $run;

echo $phrase;
*/

/*
$not_take_risks = 'Кто не рискует';
$not_drink = 'не пьет';
$ellipsis = '...';

$phrase = $not_take_risks . ', тот ' . $not_drink . ' шампанское' . $ellipsis;

echo $phrase;
*/

/*
$hunter = 'охотник';
$wants_to = 'желает';
$know = 'знать';
$fizan = 'фазан';
$sits = 'сидит';

$phrase = 'Каждый ' . $hunter . ' ' . $wants_to . ' ' . $know . ', где ' . $sits . ' ' . $fizan;

echo $phrase;
*/

/*
$a = 4.3;
$b = 7.7;
$c = '5.5';
$d = '3.4кг';

$d_num = (float)$d;

$floor_a = floor($a);
$floor_b = floor($b);
$floor_c = floor($c);
$floor_d = floor($d_num);

$ceil_a = ceil($a);
$ceil_b = ceil($b);
$ceil_c = ceil($c);
$ceil_d = ceil($d_num);

$round_a = round($a);
$round_b = round($b);
$round_c = round($c);
$round_d = round($d_num);

echo "Пол:\n";
echo "\$a = $floor_a\n";
echo "\$b = $floor_b\n";
echo "\$c = $floor_c\n";
echo "\$d = $floor_d\n";

echo "\nПотолок:\n";
echo "\$a = $ceil_a\n";
echo "\$b = $ceil_b\n";
echo "\$c = $ceil_c\n";
echo "\$d = $ceil_d\n";

echo "\nАрифметическое округление:\n";
echo "\$a = $round_a\n";
echo "\$b = $round_b\n";
echo "\$c = $round_c\n";
echo "\$d = $round_d\n";
*/

/*
$a = 4.6;
$b = 7.3;
$c = '3.8';
$d = '7.9кг';

$d_num = (float)$d;

$floor_a = floor($a);
$floor_b = floor($b);
$floor_c = floor($c);
$floor_d = floor($d_num);

$ceil_a = ceil($a);
$ceil_b = ceil($b);
$ceil_c = ceil($c);
$ceil_d = ceil($d_num);

$round_a = round($a);
$round_b = round($b);
$round_c = round($c);
$round_d = round($d_num);

echo "Пол:\n";
echo "\$a = $floor_a\n";
echo "\$b = $floor_b\n";
echo "\$c = $floor_c\n";
echo "\$d = $floor_d\n";

echo "\nПотолок:\n";
echo "\$a = $ceil_a\n";
echo "\$b = $ceil_b\n";
echo "\$c = $ceil_c\n";
echo "\$d = $ceil_d\n";

echo "\nАрифметическое округление:\n";
echo "\$a = $round_a\n";
echo "\$b = $round_b\n";
echo "\$c = $round_c\n";
echo "\$d = $round_d\n";
*/

/*
$a = 5.7;
$b = 4.2;
$c = '7.4';
$d = '8.9кг';

$d_num = (float)$d;

$floor_a = floor($a);
$floor_b = floor($b);
$floor_c = floor($c);
$floor_d = floor($d_num);

$ceil_a = ceil($a);
$ceil_b = ceil($b);
$ceil_c = ceil($c);
$ceil_d = ceil($d_num);

$round_a = round($a);
$round_b = round($b);
$round_c = round($c);
$round_d = round($d_num);

echo "Пол:\n";
echo "\$a = $floor_a\n";
echo "\$b = $floor_b\n";
echo "\$c = $floor_c\n";
echo "\$d = $floor_d\n";

echo "\nПотолок:\n";
echo "\$a = $ceil_a\n";
echo "\$b = $ceil_b\n";
echo "\$c = $ceil_c\n";
echo "\$d = $ceil_d\n";

echo "\nАрифметическое округление:\n";
echo "\$a = $round_a\n";
echo "\$b = $round_b\n";
echo "\$c = $round_c\n";
echo "\$d = $round_d\n";
*/

/*
$a = 5.7;
$b = 8.3;
$c = '5.6';
$d = '9.2кг';

$d_num = (float)$d;

$floor_a = floor($a);
$floor_b = floor($b);
$floor_c = floor($c);
$floor_d = floor($d_num);

$ceil_a = ceil($a);
$ceil_b = ceil($b);
$ceil_c = ceil($c);
$ceil_d = ceil($d_num);

$round_a = round($a);
$round_b = round($b);
$round_c = round($c);
$round_d = round($d_num);

echo "Пол:\n";
echo "\$a = $floor_a\n";
echo "\$b = $floor_b\n";
echo "\$c = $floor_c\n";
echo "\$d = $floor_d\n";

echo "\nПотолок:\n";
echo "\$a = $ceil_a\n";
echo "\$b = $ceil_b\n";
echo "\$c = $ceil_c\n";
echo "\$d = $ceil_d\n";

echo "\nАрифметическое округление:\n";
echo "\$a = $round_a\n";
echo "\$b = $round_b\n";
echo "\$c = $round_c\n";
echo "\$d = $round_d\n";
*/

/*
$a = 4;
$b = 3;
$c = ' мандаринок';

$result = $a * $b;
$result .= $c;

echo $result;
*/

/*
$a = 7;
$b = 4;
$c = ' воробья';

$result = $a - $b;
$result .= $c;

echo $result;
*/

/*
$a = 14;
$b = 21;
$c = 'ласточек';

$result = $a + $b;
$result .= ' ' . $c;

echo $result;
*/

/*
$a = 148;
$b = 76;
$c = ' голубя';

$result = $a - $b;
$result .= $c;

echo $result;
*/

/*
$a = 54;
$b = 6;
$c = ' попугаев';

$result = $a / $b;
$result .= $c;

echo $result;
*/

/*
$a = 2;
$b = '2';
$d = '2a';

if ($a == $b) echo "\$a == \$b -> true\n";
if ($a == $d) echo "\$a == \$d -> true\n";
if ($a !== $b) echo "\$a !== \$b -> true\n";
if ($a !== $d) echo "\$a !== \$d -> true\n";
*/

/*
$a = 3;
$b = '3';
$d = '3a';

if ($b == $d) echo "\$b == \$d -> false\n";
if ($a === $b) echo "\$a === \$b -> false\n";
if ($a === $d) echo "\$a === \$d -> false\n";
if ($b === $d) echo "\$b === \$d -> false\n";
if ($a != $b) echo "\$a != \$b -> false\n";
if ($a != $d) echo "\$a != \$d -> false\n";
if ($a !== $b) echo "\$a !== \$b -> false\n";
if ($a !== $d) echo "\$a !== \$d -> false\n";
if ($b !== $d) echo "\$b !== \$d -> false\n";
if ($a > $b) echo "\$a > \$b -> false\n";
if ($a > $d) echo "\$a > \$d -> false\n";
if ($a < $b) echo "\$a < \$b -> false\n";
if ($a < $d) echo "\$a < \$d -> false\n";
*/

/*
$a = 3;
$b = '3';
$d = '3a';

if ($a == $b) echo "\$a == \$b -> true\n";
if ($a == $d) echo "\$a == \$d -> true\n";
if ($b != $d) echo "\$b != \$d -> true\n";
if ($a !== $b) echo "\$a !== \$b -> true\n";
if ($a !== $d) echo "\$a !== \$d -> true\n";
if ($b !== $d) echo "\$b !== \$d -> true\n";
*/

/*
$a = 2;
$b = 2.0;
$c = '2';
$d = 'two';
$g = true;
$f = false;

$int_a = (int)$a;
$int_b = (int)$b;
$int_c = (int)$c;
$int_d = (int)$d;
$int_g = (int)$g;
$int_f = (int)$f;

echo "+---------------------+--------------+----------------------------+\n";
echo "| Исходная переменная | Исходный тип | Полученное значение (int) |\n";
echo "+---------------------+--------------+----------------------------+\n";
echo "| \$a = 2              | integer      | $int_a                      |\n";
echo "+---------------------+--------------+----------------------------+\n";
echo "| \$b = 2.0            | double       | $int_b                      |\n";
echo "+---------------------+--------------+----------------------------+\n";
echo "| \$c = '2'            | string       | $int_c                      |\n";
echo "+---------------------+--------------+----------------------------+\n";
echo "| \$d = 'two'          | string       | $int_d                      |\n";
echo "+---------------------+--------------+----------------------------+\n";
echo "| \$g = true           | boolean      | $int_g                      |\n";
echo "+---------------------+--------------+----------------------------+\n";
echo "| \$f = false          | boolean      | $int_f                      |\n";
echo "+---------------------+--------------+----------------------------+\n";
*/


/*
$a = 2;
$b = 2.0;
$c = '2';
$d = 'two';
$g = true;
$f = false;

$float_a = (float)$a;
$float_b = (float)$b;
$float_c = (float)$c;
$float_d = (float)$d;
$float_g = (float)$g;
$float_f = (float)$f;

echo "+---------------------+--------------+----------------------------+\n";
echo "| Исходная переменная | Исходный тип | Полученное значение (float) |\n";
echo "+---------------------+--------------+----------------------------+\n";
echo "| \$a = 2              | integer      | $float_a                    |\n";
echo "+---------------------+--------------+----------------------------+\n";
echo "| \$b = 2.0            | double       | $float_b                    |\n";
echo "+---------------------+--------------+----------------------------+\n";
echo "| \$c = '2'            | string       | $float_c                    |\n";
echo "+---------------------+--------------+----------------------------+\n";
echo "| \$d = 'two'          | string       | $float_d                    |\n";
echo "+---------------------+--------------+----------------------------+\n";
echo "| \$g = true           | boolean      | $float_g                    |\n";
echo "+---------------------+--------------+----------------------------+\n";
echo "| \$f = false          | boolean      | $float_f                    |\n";
echo "+---------------------+--------------+----------------------------+\n";
*/


// $a = 2;
// $b = 2.0;
// $c = '2';
// $d = 'two';
// $g = true;
// $f = false;

// $string_a = (string)$a;
// $string_b = (string)$b;
// $string_c = (string)$c;
// $string_d = (string)$d;
// $string_g = (string)$g;
// $string_f = (string)$f;

// echo "+---------------------+--------------+-----------------------------+\n";
// echo "| Исходная переменная | Исходный тип | Полученное значение (string) |\n";
// echo "+---------------------+--------------+-----------------------------+\n";
// echo "| \$a = 2              | integer      | \"$string_a\"                  |\n";
// echo "+---------------------+--------------+-----------------------------+\n";
// echo "| \$b = 2.0            | double       | \"$string_b\"                  |\n";
// echo "+---------------------+--------------+-----------------------------+\n";
// echo "| \$c = '2'            | string       | \"$string_c\"                  |\n";
// echo "+---------------------+--------------+-----------------------------+\n";
// echo "| \$d = 'two'          | string       | \"$string_d\"                  |\n";
// echo "+---------------------+--------------+-----------------------------+\n";
// echo "| \$g = true           | boolean      | \"$string_g\"                  |\n";
// echo "+---------------------+--------------+-----------------------------+\n";
// echo "| \$f = false          | boolean      | \"$string_f\"                  |\n";
// echo "+---------------------+--------------+-----------------------------+\n";


// $a = 2;
// $b = 2.0;
// $c = '2';
// $d = 'two';
// $g = true;
// $f = false;

// $bool_a = (bool)$a;
// $bool_b = (bool)$b;
// $bool_c = (bool)$c;
// $bool_d = (bool)$d;
// $bool_g = (bool)$g;
// $bool_f = (bool)$f;

// echo "+---------------------+--------------+----------------------------+\n";
// echo "| Исходная переменная | Исходный тип | Полученное значение (bool) |\n";
// echo "+---------------------+--------------+----------------------------+\n";
// echo "| \$a = 2              | integer      | $bool_a                     |\n";
// echo "+---------------------+--------------+----------------------------+\n";
// echo "| \$b = 2.0            | double       | $bool_b                     |\n";
// echo "+---------------------+--------------+----------------------------+\n";
// echo "| \$c = '2'            | string       | $bool_c                     |\n";
// echo "+---------------------+--------------+----------------------------+\n";
// echo "| \$d = 'two'          | string       | $bool_d                     |\n";
// echo "+---------------------+--------------+----------------------------+\n";
// echo "| \$g = true           | boolean      | $bool_g                     |\n";
// echo "+---------------------+--------------+----------------------------+\n";
// echo "| \$f = false          | boolean      | $bool_f                     |\n";
// echo "+---------------------+--------------+----------------------------+\n";


// $a = 36;
// $b = '4';

// $result = $a / $b;
// $remainder = $a % $b;

// echo ($remainder > 0) 
//     ? "Тип данных результата деления: " . gettype($result) . ", остаток: $remainder" 
//     : "$a / $b = $result";


// $a = 148;
// $b = '51';

// $result = $a / $b;
// $remainder = $a % $b;

// echo ($remainder > 0) 
//     ? "Тип данных результата деления: " . gettype($result) . ", остаток: $remainder" 
//     : "$a / $b = $result";

// $a = 7;
// $b = '8';

// $pow_a_b = $a ** $b;
// $pow_b_a = $b ** $a;

// echo ($pow_a_b > $pow_b_a) 
//     ? "$a ** $b = $pow_a_b" 
//     : "\$a = $a, \$b = $b";


// $a = 7;
// $b = '8';

// $increment_a = ++$a;
// $decrement_b = --$b;

// echo ($increment_a > $decrement_b) ? $increment_a : $decrement_b;


// $a = 27;
// $b = 12;

// if ($a) {
//     $ratio = $b / $a;
//     echo $ratio;
// } else {
//     echo (bool)$a;
// }


// $a = 0;
// $b = 12;

// if ($a) {
//     $ratio = $b / $a;
//     echo $ratio;
// } else {
//     echo (bool)$a;
// }



// $c = -27;
// $b = 12;

// if ($c > 0 && $b > 0) {
//     echo $c ** $b;
// } elseif ($c < 0 && $b < 0) {
//     echo $c + $b;
// } else {
//     echo $c * $b;
// }


// $c = -27;
// $b = -12;

// if ($c > 0 && $b > 0) {
//     echo $c ** $b;
// } elseif ($c < 0 && $b < 0) {
//     echo $c + $b;
// } else {
//     echo $c * $b;
// }


// $c = 27;
// $b = 12;

// if ($c > 0 && $b > 0) {
//     echo $c ** $b;
// } elseif ($c < 0 && $b < 0) {
//     echo $c + $b;
// } else {
//     echo $c * $b;
// }


// $year = 2022;
// $month = 3;
// $day = 2;

// $date = sprintf("%04d-%02d-%02d", $year, $month, $day);
// echo "Дата: " . $date;


// $money1 = 33.15;
// $money2 = 67.45;

// $sum = $money1 + $money2;   

// printf("%08.3f", $sum);     


// date_default_timezone_set('Europe/Moscow');

// $dateMech = date("H:i");
// $dateElec = date("Y-m-d H:i:s");
// $clockMech = "Механические часы";
// $clockElec = "Электронные часы";

// $sentence1 = sprintf("%s показывают время %s", $clockMech, $dateMech);
// $sentence2 = sprintf("%s показывают дату и время %s", $clockElec, $dateElec);

// echo $sentence1 . "\n";
// echo $sentence2;



// $number = 362525200;

// $result = sprintf("%.2e", $number);
// echo $result;


// $sum = 0;

// for ($i = 1; $i <= 5; $i++) {
//     $sum += $i;
// }

// echo $sum;


// $f = 'string';
// $length = strlen($f);
// $sum = 0;

// for ($i = 1; $i <= $length; $i++) {
//     $sum += $i;
// }

// echo $sum;


// $sum = 0;
// $count = 0;
// $num = 2;

// do {
//     $sum += $num;
//     $num += 2;
//     $count++;
// } while ($count < 20);

// echo $sum;


// $sum = 0;
// $count = 0;
// $num = 1;

// while ($count < 20) {
//     $sum += $num;
//     $num += 2;
//     $count++;
// }

// echo $sum;


// $sum = 0;
// $count = 0;
// $num = 3;

// while ($count < 15) {
//     $sum += $num;
//     $num += 3;
//     $count++;
// }

// echo $sum;


// $sum = 0;
// $count = 0;
// $num = 3;

// do {
//     $sum += $num;
//     $num += 3;
//     $count++;
// } while ($count < 15);

// echo $sum;


?>
