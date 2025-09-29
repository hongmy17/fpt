<?php
if (isset($_POST['name']) && isset($_POST['email'])) {
    $name = trim(htmlspecialchars($_POST['name']));
    $email = trim(htmlspecialchars($_POST['email']));

    echo "<p>Name: $name</p>";
    echo "<p>Email: $email</p>";
} else {
    echo "No data received.";
}