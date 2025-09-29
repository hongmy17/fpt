<?php 
  echo "Bai1: <br>";
  $color = array('red', 'green', 'white');
  print_r($color);
  echo "<br>";
  echo $color[0];

  $age = array();
  $age[0] = 10;
  $age[1] = 20;
  $age[2] = 30;
  print_r($age);

  echo "<br> Bai2: <br>";
  $salaries = array(
    "mohammad" => 2000,
    "qadir" => 1000,
    "zara" => 500
  );

  echo "Salary of mohammad is" . $salaries['mohammad'] . "<br>";
  echo "Salary of qadir is" . $salaries['qadir'] . "<br>";
  echo "Salary of zara is" . $salaries['zara'] . "<br>";

  echo "<br> Bai3: <br>";
  define('LOCATOR', "/locator");
  define('CLASSES', LOCATOR."/code/classes");
  define('FUNCTIONS', LOCATOR."/code/functions");
  define('USERDIR', LOCATOR."/user");
?>