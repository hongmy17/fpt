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
  <form action="handleAdd.php" method="post">
    <label for="name">Ho ten:</label>
    <input type="text" name="name" id="name" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required><br>

    <label for="phone">So dien thoai:</label>
    <input type="text" name="phone" id="phone" required><br>

    <input type="submit" value="Them hoc sinh">
  </form>
</body>
</html>