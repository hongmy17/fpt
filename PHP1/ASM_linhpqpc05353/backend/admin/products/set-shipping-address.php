<?php 
  $us_id = $_POST['us_id'];
  $shipping_address = $_POST['shipping_address'];

  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
  $url = $protocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  $parts = explode('/', $url);
  $base_url = $parts[0] . '//' . $parts[2] . '/' . $parts[3];
  $base_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $parts[3];

  include "$base_path/backend/config/config.php";
  $query = "UPDATE orders SET shipping_address = '$shipping_address' WHERE us_id = '$us_id'";
  $result = mysqli_query($dbc, $query);

  mysqli_close($dbc);
?>