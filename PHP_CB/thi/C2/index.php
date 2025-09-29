<?php
session_start();

$_SESSION["username"] = "admin";

echo "<p>Truoc khi xoa username:</p>";
echo $_SESSION["username"] . "<br>";

unset($_SESSION["username"]);
echo "<p>Sau khi xoa username:</p>";
echo $_SESSION["username"] . "<br>";