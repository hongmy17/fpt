<?php
session_start();

unset($_SESSION["cart"]);
echo "Cart cleared successfully! <br>";
echo "<a href='/'>Add more product</a><br>";