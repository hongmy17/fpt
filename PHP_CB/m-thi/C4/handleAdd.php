<?php
session_start();

$name = trim(htmlspecialchars($_POST["name"]));

if (!empty($name)) {
  array_push($_SESSION["users"], $name);
  echo "Da them nguoi dung thanh cong <br>";
} else {
  echo "'name' khong duoc de trong<br>";
}

echo "<a href='add.php'>Them nguoi dung moi</a><br>";
echo "<a href='index.php'>Trang chu</a>";