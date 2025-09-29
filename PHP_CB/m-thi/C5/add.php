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
    <label for="task">Name:</label>
    <input type="text" id="task" name="task" required>
    <br><br>
    <input type="submit" value="Submit">
  </form>
</body>
</html>