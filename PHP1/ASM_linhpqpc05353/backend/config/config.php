<?php 
  $server_name = 'localhost';
  $user_name = 'root';
  $user_password = 'mysql';
  $db_name = 'pc05353';

  $dbc = mysqli_connect($server_name, $user_name, $user_password, $db_name)
    or die('Error connecting to mysql.');
?>