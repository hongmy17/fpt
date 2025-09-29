<?php
  $id = $_POST['id'];
  $name = $_POST['name'];
  $desc = $_POST['desc'];
  $price = $_POST['price'];

  $dbc = mysqli_connect('localhost', 'root', 'password', 'pc05353')
    or die('Error connecting to mysql.');
  $query = "UPDATE product SET pd_name = '$name', " .
    "pd_desc = '$desc', pd_price = '$price' WHERE pd_id = '$id'";
  $result = mysqli_query($dbc, $query) or die('Error querying database.');
  mysqli_Close($dbc);

  echo 'Update success';
?>