<?php 
  $pd_id = $_POST['pd_id'];
  $us_id = $_POST['us_id'];
  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
  $url = $protocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  $parts = explode('/', $url);
  $base_url = $parts[0] . '//' . $parts[2] . '/' . $parts[3];
  $base_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $parts[3];

  include "$base_path/backend/config/config.php";
  $query = "SELECT order_id FROM orders WHERE us_id = '$us_id'";
  $result = mysqli_query($dbc, $query) or die('Error querying database.');
  $row = mysqli_fetch_array($result);
  $order_id;
  if ($row) {
    $order_id = $row['order_id'];
  } else {
    $query_insert_order = "INSERT INTO orders (us_id) VALUES ('$us_id')";
    $result_insert_order = mysqli_query($dbc, $query_insert_order) or die('Error querying database.');
    $order_id = mysqli_insert_id($dbc);
  }

  $query_product = "SELECT pd_price FROM products WHERE pd_id = '$pd_id'";
  $result_product = mysqli_query($dbc, $query_product) or die('Error querying database.');
  $product = mysqli_fetch_array($result_product);
  $pd_price = $product['pd_price'];
  $query_add_total = "UPDATE orders SET total = total + $pd_price, update_at = NOW() WHERE us_id = '$us_id'";
  $result_add_total = mysqli_query($dbc, $query_add_total) or die('Error querying database.');

  $query = "INSERT INTO order_detail (order_id, pd_id, price) " .
    "VALUES ('$order_id', '$pd_id', '$pd_price')";
  $result = mysqli_query($dbc, $query) or die('Error querying database.');
  mysqli_close($dbc);
?>