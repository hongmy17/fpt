<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Them san pham</h1>
  <form action="handleAdd.php" method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>
    <br>
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" id="quantity" required>
    <br>
    <input type="submit" value="Add to cart">
  </form>
</body>
</html>