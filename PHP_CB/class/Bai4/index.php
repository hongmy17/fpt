<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// $num4 = 10;
// function getSum($num1, $num2, $num3 = 0) {
//   global $num4;
//   $sum = $num1 + $num2 + $num3 + $num4;
//   $num4 = 15;
//   return $sum;
// }

// echo $num4;
// echo getSum(2 , 2);
// echo $num4;

// function increment(&$number) {
//   $number += 1;
//   echo "Goi number ben trong ham increment: $number <br>";
// }

// $num = 1;
// echo "Truoc khi ham increment duoc goi: $num <br>";
// increment($num);
// echo "Sau khi increment goi lan 1 thi bien 'num' bi thay doi thanh $num <br>";
// increment($num);
// echo "Sau khi increment goi lan 2 thi bien 'num' bi thay doi thanh $num <br>";
// increment($num);
// echo "Sau khi increment goi lan 3 thi bien 'num' bi thay doi thanh $num <br>";

// echo "Truoc khi ham decrement duoc goi: $num <br>";
// function decrement(&$number) {
//   $number -= 1;
//   echo "Goi number ben trong ham decrement: $number <br>";
// }
// decrement($num);
// echo "Sau khi decrement goi lan 1 thi bien 'num' bi thay doi thanh $num <br>";

// tinh tong mang
// $numbers = [1, 2, 3, 4];
// $sum = 0;
// foreach ($numbers as $number) {
//   $sum += $number;
// }
// echo "Tong: $sum <br>";

// title case
// $string = "day la title case";
// $string = explode(" ", $string);
// foreach ($string as &$value) {
//   $value[0] = strtoupper($value[0]);
// }
// $string = implode(" ", $string);
// echo $string . "<br>";

$fullName = "Nguyen Van A";
$array = explode(" ", $fullName);

$array_length = sizeof($array);
echo $array[$array_length - 1];