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
          <table class="custom-table">
            <thead>
              <tr class="row header-table">
                <th class="col l-6 m-6 c-12">
                  <h1 class="title">Quản lý sản phẩm</h1>
                </th>

                <th class="col l-6 m-6 c-12 header-actions">
                  <span class="delete-action header-action">
                    <i class="fa-solid fa-circle-minus"></i>
                    Xóa
                  </span>
                  <span class="add-action header-action">
                    <i class="fa-solid fa-circle-plus"></i>
                    Thêm
                  </span>
                </th>
              </tr>

              <tr class="row">
                <th class="col l-1 m-1 c-1 name-column">
                  <input type="checkbox" class="checkbox all-checkbox" />
                </th>
                <th class="col l-1 m-1 c-2 name-column">
                  <!-- <i class="fa-solid fa-sort"></i> -->
                  STT
                </th>
                <th class="col l-1 m-1 c-2 name-column">Ảnh</th>
                <th class="col l-1 m-1 c-5 name-column">Tên</th>
                <th class="col l-2 m-2 c-0 name-column">Giá</th>
                <th class="col l-4 m-3 c-0 name-column">Mô tả</th>
                <th class="col l-1 m-1 c-0 name-column">Loai</th>
                <th class="col l-1 m-2 c-2 name-column">Hành động</th>
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
                include "$base_path/backend/admin/products/get-categories.php";
                
                $query = "SELECT p.pd_id, p.pd_name, p.pd_img, p.pd_price, p.pd_desc, 
                  c.name FROM products p JOIN categories c ON c.id = p.category_id";
                $result = mysqli_query($dbc, $query) or die('Error querying database.');
                $order_number = 1;
                $base_url = $base_url . "/backend/admin/products/";
                
                while ($row = mysqli_fetch_array($result)) {
                  $id = $row['pd_id']; 
                  $name = $row['pd_name'];
                  $img = $base_url . $row['pd_img'];
                  $price = number_format($row['pd_price'], 0, '', ',');
                  $desc = $row['pd_desc'];
                  $category_name = $row['name'];

                  echo "
                    <tr class='row'>
                      <td class='col l-1 m-1 c-1 name-column'>
                        <input type='text' hidden name='id' value='$id' />
                        <input type='checkbox' class='checkbox' />
                      </td>
                      <td class='col l-1 m-1 c-2 name-column'>$order_number</td>
                      <td class='col l-1 m-1 c-2 name-column'>
                        <img src='$img' style='width: 50px; object-fit: cover'/>
                      </td>
                      <td class='col l-1 m-1 c-5 name-column ellipse'>$name</td>
                      <td class='col l-2 m-2 c-0 name-column'>$price VND</td>
                      <td class='col l-4 m-3 c-0 name-column ellipse'>$desc</td>
                      <td class='col l-1 m-1 c-0 name-column ellipse'>$category_name</td>
                      <td class='col l-1 m-2 c-2 name-column'>
                        <span class='edit-icon-container'>
                          <i class='fa-solid fa-pencil edit-icon action-icon'></i>
                          <div class='edit-icon-text'>Edit</div>
                        </span>

                        <span class='delete-icon-container'>
                          <i class='fa-solid fa-trash delete-icon action-icon'></i>
                          <div class='delete-icon-text'>Delete</div>
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
        </div>
      </div>
    </main>

    <?php 
      include './modal.php';
    ?>

    <script src="../js/products.js"></script>
  </body>
</html>