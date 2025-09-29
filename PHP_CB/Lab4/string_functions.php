<?php
$string = "Hello, welcome to the world";

$uppercaseString = strtoupper($string);
echo "Chu hoa: " . $uppercaseString ."<br>";

$lowercaseString = strtolower($string);
echo "Chu thuong: ". $lowercaseString ."<br>";

$replacedString = str_replace("world","university", $string);
echo "Thay the `world` bang `university`: ". $replacedString ."<br>";

$array = explode(" ", $string);
echo "Tach chuoi thanh mang: ";
print_r($array);