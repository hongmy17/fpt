<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/table.css" />
    <link rel="stylesheet" href="../css/grid.css" />
    <!-- font awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
      integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <style>
      .content {
        overflow: hidden;
        position: relative;
        cursor: pointer;
        -webkit-tap-highlight-color: transparent;
      }

      .content .wrapper {
        position: relative;
        display: flex;
        transition: all 0.2s linear;
      }

      .content .custom-table {
        position: relative;
        flex: 1 0 100%;
      }

      .table-detail {
        margin-left: 30px;
      }
    </style>
  </head>

  <body>
    <!-- header -->
    <?php 
      include ('./header.php');
    ?>
    <!-- end header -->

    <main class="grid wide main">
      <div class="row">
        <!-- slide bar -->
        <?php 
          include ('slide-bar.php');
        ?>

        <!-- custom -->
        <div class="col l-10 m-12 c-12 content">
          <div class="wrapper">
            <table class="custom-table">
              <thead>
                <tr class="row header-table">
                  <th class="col l-6 m-6 c-12">
                    <h1 class="title">Quản lý don hang</h1>
                  </th>

                  <th class="col l-6 m-6 c-12 header-actions">
                  </th>
                </tr>

                <tr class="row">
                  <th class="col l-1 m-1 c-2 name-column">STT</th>
                  <th class="col l-2 m-2 c-5 name-column">Tên</th>
                  <th class="col l-2 m-2 c-0 name-column">Giá</th>
                  <th class="col l-6 m-6 c-0 name-column">Địa chỉ</th>
                  <th class="col l-1 m-2 c-2 name-column">Chi tiet</th>
                </tr>
              </thead>

              <tbody>
                <?php
                  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
                  $url = $protocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
                  $parts = explode('/', $url);
                  $base_url = $parts[0] . '//' . $parts[2] . '/' . $parts[3];
                  echo "
                    <input type='text' class='base-url' hidden value='$base_url/backend/admin/products/'/>";
                  $base_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $parts[3];
                  include "$base_path/backend/config/config.php";
                  
                  $query = "SELECT o.order_id, o.shipping_address, o.total, us.us_name 
                    FROM orders o JOIN users us ON o.us_id = us.us_id";
                  $result = mysqli_query($dbc, $query) or die('Error querying database.');
                  $order_number = 1;
                  $base_url = $base_url . "/backend/admin/products/";
                  
                  while ($row = mysqli_fetch_array($result)) {
                    $id = $row['order_id']; 
                    $name = $row['us_name'];
                    $shipping_address = $row['shipping_address'];
                    $total = number_format($row['total'], 0, '', ',');

                    echo "
                      <tr class='row'>
                        <td class='col l-1 m-1 c-2 name-column'>$order_number</td>
                        <td class='col l-2 m-2 c-5 name-column ellipse'>$name</td>
                        <td class='col l-2 m-2 c-0 name-column'>$total VND</td>
                        <td class='col l-6 m-5 c-0 name-column ellipse'>$shipping_address</td>
                        <td class='col l-1 m-2 c-2 name-column'>
                          <span class='info-icon-container' style='margin-left: 20px'>
                            <i class='fa-solid fa-info info-icon action-icon' order-id='$id'></i>
                          </span>
                        </td>
                      </tr>";
                    $order_number++;
                  }

                  mysqli_close($dbc);
                ?>
                <tr class="row more">
                  <td class="col l-0 m-0 c-12 show-col">Xem thêm</td>
                  <td class="col l-0 m-0 c-12 hide hide-col">Ẩn bớt</td>
                </tr>
                <tr class="row footer-table">
                  <td class="col l-6 m-6 c-12 hint-text">
                    Hiển thị
                    <span class="page-quantity current-quantity">5</span>/
                    <span class="page-quantity">25</span>
                  </td>
                  <td class="col l-6 m-6 c-12 pagination">
                    <li class="page-item prev-btn">Quay lại</li>
                    <li class="page-item">1</li>
                    <li class="page-item">2</li>
                    <li class="page-item active">3</li>
                    <li class="page-item">4</li>
                    <li class="page-item">5</li>
                    <li class="page-item next-btn">Tiếp</li>
                  </td>
                </tr>
              </tbody>
            </table>

            <table class="custom-table table-detail">
              <thead>
                <i class="fa-solid fa-arrow-left back-btn" style="margin-left: 30px"></i>  
                <tr class="row">
                  <th class="col l-1 m-1 c-2 name-column">STT</th>
                  <th class="col l-2 m-2 c-5 name-column">Ảnh</th>
                  <th class="col l-3 m-3 c-5 name-column">Tên</th>
                  <th class="col l-1 m-1 c-5 name-column">SL</th>
                  <th class="col l-2 m-2 c-0 name-column">Giá</th>
                  <th class="col l-3 m-3 c-0 name-column">Tổng</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>
    </main>

    <?php 
      include './modal.php';
    ?>

    <script src="../js/orders.js"></script>
  </body>
</html>