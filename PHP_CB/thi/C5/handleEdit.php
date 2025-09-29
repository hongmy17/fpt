<?php
session_start();
$email = trim(htmlspecialchars($_POST["hidden_email"]));

$student = [
  "name" => trim(htmlspecialchars($_POST["name"])),
  "email" => trim(htmlspecialchars($_POST["email"])),
  "phone" => trim(htmlspecialchars($_POST["phone"]))
];

function updateStudentByEmail($email, $student) {
  foreach ($_SESSION["students"] as $key => $value) {
    if ($value["email"] == $email) {
      $_SESSION["students"][$key] = $student;
      return true;
    }
  }
  return false;
}

updateStudentByEmail($email, $student);
echo "Cap nhap hoc sinh thanh cong!<br>";
echo "<a href='index.php'>Quay ve trang chu</a>";