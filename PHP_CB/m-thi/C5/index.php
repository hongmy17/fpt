<?php
session_start();

if (!isset($_SESSION["tasks"])) {
  $_SESSION["tasks"] = [];
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
<h1>Danh sach cong viec</h1>
  <?php if (count($_SESSION["tasks"]) == 0) {
    echo "Khong co cong viec";
  }
  ?>

  <ul>
    <?php foreach ($_SESSION["tasks"] as $index => $task): ?>
      <li><?=$task;?> <a href="handleDelete.php?taskIndex=<?=$index;?>">Xoa</a></li>
    <?php endforeach; ?>
  </ul>
  <a href="add.php">Them cong viec</a>
</body>
</html>