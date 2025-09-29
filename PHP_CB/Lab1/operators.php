<?php
$a = 10;
$b = 3;

echo "Addition: " . ( $a + $b ) ."<br>";
echo "Subtraction: ". ( $a - $b ) ."<br>";
echo "Multiplication: ". ( $a * $b ) ."<br>";
echo "Division: ". ( $a / $b ) ."<br>";
echo "Modulus: ". ( $a % $b ) ."<br>";

echo "Equal: ". var_dump($a == $b) ."<br>";
echo "Not equal: ". var_dump($b != $b) ."<br>";
echo "Greater than: ". var_dump($a > $b) ."<br>";
echo "Less than: ". var_dump($a < $b) ."<br>";

$x = true;
$y = false;

echo "AND: " . var_dump($x && $y) ."<br>";
echo "OR: ". var_dump( $x || $y) ."<br>";
echo "NOT: ". var_dump(!$x) ."<br>";