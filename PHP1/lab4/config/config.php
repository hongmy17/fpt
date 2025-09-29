<?php 
  $server_name = 'localhost';
  $user_name = 'root';
  $password = 'mysql';
  $db_name = 'pc05353';
  
  $dbc = mysqli_connect($server_name, $user_name, $password, $db_name)
    or die('Error connecting to mysql.');
?>