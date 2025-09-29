<?php
session_start();

if (!isset($_SESSION["students"])) {
  $_SESSION["students"] = [
    ["name" => "John Doe"],
  ];
}

if (isset($_POST["name"])) {
  $data = [
    "name" => $_POST["name"],
  ];
  array_push($_SESSION["students"], $data);
  echo "<pre>";
  var_dump($_SESSION);
  echo "</pre>";
}
?>

<form action="" method="post">
  <input type="text" name="name">
  <button type="submit">Submit</button>
</form>