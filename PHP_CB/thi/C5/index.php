<?php
session_start();

if (!isset($_SESSION["students"])) {
  $_SESSION["students"] = [];
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
  <h1>Danh sach hoc sinh</h1>
  
  <table>
    <thead>
      <tr>
        <th>Ho ten</th>
        <th>Email</th>
        <th>So dien thoai</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($_SESSION["students"] as $student): ?>
        <tr>
          <td><?=$student["name"]?></td>
          <td><?=$student["email"]?></td>
          <td><?=$student["phone"]?></td>
          <td>
            <a href="edit.php?email=<?=$student["email"]?>">Sua</a>
            <a href="handleDelete.php?email=<?=$student["email"]?>">Xoa</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <a href="add.php">Them hoc sinh</a>
</body>
</html>