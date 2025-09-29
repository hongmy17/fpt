<?php 
  $bill_id = $_POST['bill_id'];
  
  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
  $url = $protocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  $parts = explode('/', $url);
  $base_url = $parts[0] . '//' . $parts[2] . '/' . $parts[3];
  
  include "../../config/config.php";
  $query_products = "SELECT p.pd_img, p.pd_name, b.quantity, b.price, b.create_at AS order_day
    FROM bill_detail b JOIN products p ON b.pd_id  = p.pd_id WHERE b.bill_id = '$bill_id'";
  $result_products = mysqli_query($dbc, $query_products);
  $order_number = 1;
  $orders = "";

  while ($product = mysqli_fetch_array($result_products)) {
    $pd_img = $product['pd_img'];
    $pd_name = $product['pd_name'];
    $quantity = $product['quantity'];
    $price = $product['price'];
    $price_format = number_format($price, 0 , '', ',');
    $subtotal = number_format($price * $quantity, 0, '', ',');
    $order_day = $product['order_day'];

    $orders .= "
      <tr class='row'>
        <th class='col l-1 m-1 c-2 name-column'>$order_number</th>
        <th class='col l-1 m-2 c-5 name-column'>
          <img 
            src='$base_url/backend/admin/products/$pd_img' 
            style='width: 50px; object-fit: cover'
          />
        </th>
        <th class='col l-2 m-3 c-5 name-column ellipse'>$pd_name</th>
        <th class='col l-1 m-1 c-5 name-column'>$quantity</th>
        <th class='col l-2 m-2 c-0 name-column'>$price_format VND</th>
        <th class='col l-2 m-3 c-0 name-column'>$subtotal VND</th>
        <th class='col l-3 m-3 c-0 name-column'>$order_day</th>
      </tr>";
    $order_number++;
  }
  
  // Set the appropriate response headers to indicate JSON content
  header('Content-Type: application/json');

  // Encode the user information as JSON and echo it
  mysqli_close($dbc);
  echo json_encode($orders);
?>