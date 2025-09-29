<?php
$numbers = [1,4,6,3,9,2];

foreach ($numbers as $number) {
  if ($number > 5 && $number % 2 == 0) {
    echo "$number lon hon 5 va la so chan<br>";
  }
}