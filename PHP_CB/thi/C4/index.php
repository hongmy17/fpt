<?php
session_start();

if (isset($_SESSION["email"])) {
  echo $_SESSION["email"];
} else {
  $_SESSION["email"] = "student@example.com";
  echo "Session email vua duoc tao";
}