<?php
session_start();

$student = [
  "name" => trim(htmlspecialchars($_POST["name"])),
  "email" => trim(htmlspecialchars($_POST["email"])),
  "phone" => trim(htmlspecialchars($_POST["phone"]))
];

array_push($_SESSION["students"], $student);

echo "Them hoc sinh thanh cong!<br>";
echo "<a href='add.php'>Them hoc sinh khac</a><br>";
echo "<a href='index.php'>Tro ve trang chu</a><br>";