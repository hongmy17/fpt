<?php
session_start();

$name = trim(htmlspecialchars($_POST["name"]));
$quantity = (int)trim(htmlspecialchars($_POST["quantity"]));

if (!isset($_SESSION["cart"][$name])) {
  $_SESSION["cart"][$name] = $quantity;
} else {
  $_SESSION["cart"][$name] += $quantity;
}

echo "Them san pham thanh cong<br>";
echo "<a href='add.php'>Quay lai</a><br>";
echo "<a href='index.php'>Trang chu</a><br>";