<?php
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  $dbc = mysqli_connect('localhost', 'root', 'password', 'pc05353')
    or die('Error connecting to mysql.');
  $query = "UPDATE customer SET cs_name = '$name', " .
    "cs_email = '$email', cs_phone = '$phone' WHERE cs_id = '$id'";
  $result = mysqli_query($dbc, $query) or die('Error querying database.');
  mysqli_Close($dbc);

  echo 'Update success';
?>