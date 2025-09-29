<?php 
  $pd_id = $_POST['pd_id'];
  $us_id = $_POST['us_id'];
  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
  $url = $protocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  $parts = explode('/', $url);
  $base_url = $parts[0] . '//' . $parts[2] . '/' . $parts[3];
  $base_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $parts[3];

  include "$base_path/backend/config/config.php";
  $query_order_id = "SELECT order_id FROM orders WHERE us_id = '$us_id'";
  $result_order_id = mysqli_query($dbc, $query_order_id) or die('Error querying database.');
  $order_id = mysqli_fetch_array($result_order_id)['order_id'];

  $query_get_product = "SELECT price, quantity FROM order_detail WHERE order_id = '$order_id' AND pd_id NOT IN ('$pd_id')";
  $result_get_product = mysqli_query($dbc, $query_get_product) or die('Error querying database.');

  $total = 0;
  while ($product = mysqli_fetch_array($result_get_product)) {
    $price = $product['price'];
    $quantity = $product['quantity'];
    $total += ($price * $quantity);
  }

  $query_update_total = "UPDATE orders SET total = $total, update_at = NOW() WHERE order_id = '$order_id'";
  $result_update_total = mysqli_query($dbc, $query_update_total) or die('Error querying database.');

  $query = "DELETE FROM order_detail WHERE pd_id = '$pd_id' AND order_id = '$order_id'";
  $result = mysqli_query($dbc, $query) or die('Error querying database.');
  mysqli_close($dbc);
?>