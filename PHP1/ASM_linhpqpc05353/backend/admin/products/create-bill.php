<?php 
  $us_id = $_POST['us_id'];

  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
  $url = $protocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  $parts = explode('/', $url);
  $base_url = $parts[0] . '//' . $parts[2] . '/' . $parts[3];
  $base_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $parts[3];

  include "$base_path/backend/config/config.php";
  $query_orders = "SELECT order_id, total, shipping_address, 
    NOW() AS order_day FROM orders WHERE us_id = '$us_id'";
  $result_orders = mysqli_query($dbc, $query_orders) or die('Error querying database.');
  $orders = mysqli_fetch_array($result_orders);

  $order_id = $orders['order_id'];
  $total = $orders['total'];
  $total_format = number_format($total, 0, '', ',');
  $order_day = $orders['order_day'];
  $shipping_address = $orders['shipping_address'];
  
  $query_us_name = "SELECT us_name FROM users WHERE us_id = '$us_id'";
  $result_us_name = mysqli_query($dbc, $query_us_name);
  $us_name = mysqli_fetch_array($result_us_name)['us_name'];

  $query_product = "SELECT p.pd_id, p.pd_name, o.quantity, o.price FROM products p JOIN order_detail o ON p.pd_id = o.pd_id WHERE o.order_id = '$order_id' AND o.quantity <> 0";
  $result_product = mysqli_query($dbc, $query_product);

  $query_bill = "INSERT INTO bills (order_id, us_id, shipping_address, 
    total) VALUES ('$order_id', '$us_id', '$shipping_address', '$total')";
  $result_bill = mysqli_query($dbc, $query_bill);
  $bill_id = mysqli_insert_id($dbc);

  $bill_body = "
    <div class='bill-container'>
      <div class='bill-header'>
        <i class='fa-solid fa-xmark close-btn'></i>
        <h2 class='text-center'>PIZZA</h2>
        <hr style='height: 2px; background-color: #000' />
        <h2 class='text-center'>HÓA ĐƠN THANH TOÁN</h2>
        <p>Mã số: <span>$order_id</span></p>
        <p>Ngày đặt hàng: <span>$order_day</span></p>
        <p>Tên khách hàng: <span>$us_name</span></p>
        <p>Địa chỉ giao hàng: <span>$shipping_address</span></p>
        <hr style='height: 2px; background-color: #000' />
      </div>

      <table class='bill-body' style='width: 100%'>
        <thead>
          <tr>
            <td style='width: 50%'>Sản phẩm</td>
            <td>SL</td>
            <td>Giá bán</td>
            <td>Thành tiền</td>
          </tr>
        </thead>
        <tbody>";

  while ($product = mysqli_fetch_array($result_product)) {
    $pd_id = $product['pd_id'];
    $pd_name = $product['pd_name'];
    $quantity = $product['quantity'];
    $price = $product['price'];
    $price_format = number_format($price, 0, '', ',');
    $sub_total = number_format($quantity * $product['price'], 0, '', ',');

    $query_bill_detail = "INSERT INTO bill_detail (bill_id, pd_id, quantity, price) 
      VALUES ('$bill_id', '$pd_id', '$quantity', '$price')";
    $result_bill_detail = mysqli_query($dbc, $query_bill_detail);

    $bill_body .= "
      <tr>
        <td>$pd_name</td>
        <td>$quantity</td>
        <td>$price_format</td>
        <td>$sub_total</td>
      </tr>";
  }

  $bill_body .= "
        </tbody>
      </table>
      <hr style='height: 2px; background-color: #000' />
      <p><strong>Tổng tiền:</strong> <span>$total_format</span></p>
    </div>";

  header('Content-Type: application/json');

  // Encode the user information as JSON and echo it
  mysqli_close($dbc);
  echo json_encode($bill_body);
?>