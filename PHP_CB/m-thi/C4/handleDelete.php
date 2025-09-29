<?php
session_start();

$userIndex = (int)trim(htmlspecialchars($_GET["userIndex"]));

function isDeletedUser($userIndex) {
  foreach ($_SESSION["users"] as $index => $user) {
    if ($index == $userIndex) {
      unset($_SESSION["users"][$index]);
      $_SESSION["users"] = array_values($_SESSION["users"]);
      return true;
    }
  }

  return false;
}

if (!empty($userIndex)) {
  echo isDeletedUser((int)$userIndex) ? "Xoa nguoi dung thanh cong" : "Khong tim thay nguoi dung";
} else {
  echo "'userIndex' khong co gia tri<br>";
}

echo "<br><a href='index.php'>Trang chu</a>";