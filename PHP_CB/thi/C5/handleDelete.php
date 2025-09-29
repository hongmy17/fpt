<?php
session_start();

$email = $_GET["email"];

function deleteStudentByEmail($email) {
  foreach ($_SESSION["students"] as $key => $student) {
    if ($student["email"] == $email) {
      unset($_SESSION["students"][$key]);
      $_SESSION["students"] = array_values($_SESSION["students"]);
      break;
    }
  }
}

deleteStudentByEmail($email);
echo "Xoa hoc sinh thanh cong!<br>";
echo "<a href='index.php'>Tro ve trang chu</a>";