<?php
// $favcolor = "blue";

// switch ($favcolor) {
//   case "yellow":
//   case "blue":
//     echo"Vi du ve viec 2 case khac nhau ma thuc thi 1 ma lenh";
//     break;
//   case "red":
//     echo"Your favorite color is red";
//     break;
//   default:
//     echo "Your favorite color is neither yellow, blue, nor red";
// }

// $i = 1;
// while (true) {
//   if ($i > 50 && $i < 100) {
//     $i++;
//     continue;
//   } else {
//     echo $i . PHP_EOL;
//   }

//   if ($i == 150) {
//     break;
//   }
//   $i++;
// }

$colors = ["red", "green", "blue"];

echo "<h1>Foreach voi value</h1>";
foreach ($colors as $color) {
  echo $color . PHP_EOL;
}

echo "<h1>Foreach voi key va value</h1>";
foreach ($colors as $key => $value) {
  echo "Vi tri {$key} voi gia tri la {$value} <br>";
}