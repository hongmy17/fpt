<?php
session_start();

$task = trim(htmlspecialchars($_POST["task"]));

function hasExistTask($taskInput) {
  foreach ($_SESSION["tasks"] as $task) {
    if ($task == $taskInput) {
      return true;
    }
  }

  return false;
}

if (!empty($task)) {
  if (hasExistTask($task)) {
    echo "Cong viec da ton tai<br>";
  } else {
    array_push($_SESSION["tasks"], $task);
    echo "Da them cong viec thanh cong <br>";
  }
  
  echo "<a href='add.php'>Them cong viec moi</a><br>";
  echo "<a href='index.php'>Trang chu</a>";
} else {
  echo "'task' khong duoc de trong";
}