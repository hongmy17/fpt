<?php
setcookie("username", "", time() - 3600, "/");
setcookie("login_status", "", time() - 3600, "/");
header("Location: index.php");
exit;