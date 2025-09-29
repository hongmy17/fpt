<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// const RATE_GOV_SUPPORT = 4.5;

// $number_of_month = 12;
// $base_salary = 1200000;

// $total = RATE_GOV_SUPPORT * $number_of_month * $base_salary;
// echo $total;

// define("NAME", "NAME");
// echo NAME;

$total = 1000;

if ($total > 0) {
  $msg = "Da them {$total} dong du lieu";
  echo $msg;
}