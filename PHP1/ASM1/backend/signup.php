<?php 
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];

  $dbc = mysqli_connect('localhost', 'root', 'password', 'pc05353')
    or die('Error connecting to mysql.');
  $query = "INSERT INTO customer (cs_name, cs_email, cs_address, cs_phone, " .
    "cs_password) VALUES ('$name', '$email', '$address', '$phone', '$password')";
  $result = mysqli_query($dbc, $query) or die('Error querying database.');
  mysqli_close($dbc);

  echo 'Success sign up.';
?>