<?php
session_start();

$taskIndex = trim(htmlspecialchars($_GET["taskIndex"]));

function isDeletedTask($taskIndex) {
  foreach ($_SESSION["tasks"] as $index => $task) {
    if ($index == $taskIndex) {
      unset($_SESSION["tasks"][$index]);
      $_SESSION["tasks"] = array_values($_SESSION["tasks"]);
      return true;
    }
  }

  return false;
}

if (!empty($taskIndex)) {
  echo isDeletedTask((int)$taskIndex) ? "Xoa cong viec thanh cong" : "Khong tim thay cong viec";
} else {
  echo "'taskIndex' khong co gia tri<br>";
}

echo "<br><a href='index.php'>Trang chu</a>";