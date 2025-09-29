<?php
session_start();

$person = [
  "id" => trim(htmlspecialchars($_POST["id"])),
  "name" => trim(htmlspecialchars($_POST["name"])),
  "description" => trim(htmlspecialchars($_POST["description"])),
  "image" => $_FILES["image"]["name"],
  "status" => trim(htmlspecialchars($_POST["status"]))
];

array_push($_SESSION["persons"], $person);

echo "<h1>Ban da them nguoi dung thanh cong</h1>";
echo "<a href='addForm.php'>Them nguoi dung moi</a><br>";
echo "<a href='index.php'>Quay ve trang chu</a>";