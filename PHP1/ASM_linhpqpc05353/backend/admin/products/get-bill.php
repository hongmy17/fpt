<?php 
  $bill_id = $_POST['bill_id'];

  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
  $url = $protocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  $parts = explode('/', $url);
  $base_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $parts[3];

  include "$base_path/backend/config/config.php";
  $query_bill = "SELECT b.order_id, b.shipping_address, b.total, us.us_name, 
    b.create_at AS order_day FROM bills b JOIN users us ON us.us_id = b.us_id 
    WHERE b.bill_id = '$bill_id'";
  $result_bill = mysqli_query($dbc, $query_bill) or die('Error querying database.');
  $bill = mysqli_fetch_array($result_bill);

  $order_id = $bill['order_id'];
  $shipping_address = $bill['shipping_address'];
  $total = $bill['total'];
  $us_name = $bill['us_name'];
  $order_day = $bill['order_day'];

  $query_product = "SELECT bd.quantity, bd.price, p.pd_name FROM bill_detail bd 
    JOIN products p ON p.pd_id = bd.pd_id WHERE bd.bill_id = '$bill_id'";
  $result_product = mysqli_query($dbc, $query_product);

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
    $pd_name = $product['pd_name'];
    $quantity = $product['quantity'];
    $price = $product['price'];
    $price_format = number_format($price, 0, '', ',');
    $sub_total = number_format($quantity * $price, 0, '', ',');

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
      <p><strong>Tổng tiền:</strong> <span>$total</span></p>
    </div>";

  header('Content-Type: application/json');

  // Encode the user information as JSON and echo it
  mysqli_close($dbc);
  echo json_encode($bill_body);
  // echo json_encode(1);
?>