<?php 
  $id = $_POST['id'];

  include '../../config/config.php';
  $query = "SELECT us_name, us_email, us_phone, is_admin FROM users WHERE us_id = $id";
  $result = mysqli_query($dbc, $query) or die('Error querying database.');
  
  $row = mysqli_fetch_array($result);
  $name = $row['us_name'];
  $email = $row['us_email'];
  $phone = $row['us_phone'];
  $is_admin = $row['is_admin'];
  $info_user = [
    'name' => $name,
    'email' => $email,
    'phone' => $phone,
    'isAdmin' => $is_admin
  ];

  // Set the appropriate response headers to indicate JSON content
  header('Content-Type: application/json');

  // Encode the user information as JSON and echo it
  echo json_encode($info_user);
  mysqli_close($dbc);
?>