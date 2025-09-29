<?php
session_start();

$email = $_GET["email"];

function getStudentByEmail($email) {
  foreach ($_SESSION["students"] as $student) {
    if ($student["email"] == $email) {
      return $student;
    }
  }
  return null;
}
$student = getStudentByEmail($email);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="handleEdit.php" method="post">
    <label for="name">Ho ten:</label>
    <input type="text" name="name" id="name" value="<?=$student["name"]?>" required><br>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?=$student["email"]?>" required><br>
    <input type="email" name="hidden_email" id="email" value="<?=$student["email"]?>" style="display: none;" readonly required>

    <label for="phone">So dien thoai:</label>
    <input type="text" name="phone" id="phone" value="<?=$student["phone"]?>" required><br>

    <input type="submit" value="Sua hoc sinh">
  </form>
</body>
</html>