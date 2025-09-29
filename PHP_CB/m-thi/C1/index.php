<?php
session_start();

if (!isset($_SESSION["counter"])) {
  $_SESSION["counter"] = 1;
} else {
  $_SESSION["counter"]++;
}

echo "So lan truy cap trang: {$_SESSION["counter"]}";