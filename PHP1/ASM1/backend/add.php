<?php
  // if (isset($_POST['submit-btn']) == true) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    $dbc = mysqli_connect('localhost', 'root', 'password', 'pc05353')
      or die('Error connecting to mysql.');
    $query = "INSERT INTO customer (cs_name, cs_email, " .
      "cs_phone) VALUES ('$name', '$email', '$phone')";
    $result = mysqli_query($dbc, $query) or die('Error querying database.');
  // }
?>