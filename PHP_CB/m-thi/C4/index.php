<?php
session_start();

if (!isset($_SESSION["users"])) {
  $_SESSION["users"] = [];
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
  <h1>Danh sach nguoi dung</h1>
  <?php if (count($_SESSION["users"]) == 0) {
    echo "Khong co nguoi dung";
  }
  ?>

  <ul>
    <?php foreach ($_SESSION["users"] as $index => $user): ?>
      <li><?=$user;?> <a href="handleDelete.php?userIndex=<?=$index;?>">Xoa</a></li>
    <?php endforeach; ?>
  </ul>
  <a href="add.php">Them nguoi dung</a>
</body>
</html>