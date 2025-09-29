<?php

$students = ["nguyen van a", "nguyen van b", "nguyen van c", "nguyen van d", "nguyen van e"];
foreach ($students as $index => $student) {
  $numberOrder = $index + 1;
  echo "$numberOrder. $student<br>";
}