<?php
  $ids = $_POST['id'];

  $dbc = mysqli_connect('localhost', 'root', 'password', 'pc05353')
    or die('Error connecting to mysql.');
  $query = "DELETE FROM customer WHERE cs_id IN($ids)";
  $result = mysqli_query($dbc, $query) or die('Error querying database.');
  mysqli_Close($dbc);

  echo 'Delete success';
?>