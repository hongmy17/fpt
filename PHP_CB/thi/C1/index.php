<?php
session_start();
if (!isset($_SESSION["cart"])) {
  $_SESSION["cart"] = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Danh sach san pham</h1>

  <?php foreach ($_SESSION["cart"] as $name => $quantity): ?>
    <p><?="$name: $quantity"?></p>
  <?php endforeach; ?>

  <a href="add.php">Them san pham</a><br>
</body>
</html>