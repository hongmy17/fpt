<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./category.css" />
    <link rel="stylesheet" href="../frontend/assets/css/grid.css" />
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
    <div class="grid wide content">
      <table class="custom-table">
        <thead>
          <tr class="row header-table">
            <th class="col l-6 m-6 c-12">
              <h1 class="title">Sản phẩm</h1>
            </th>

            <th class="col l-6 m-6 c-12 header-actions">
              <span class="delete-action header-action">
                <i class="fa-solid fa-circle-minus"></i>
                Xóa
              </span>
            </th>
          </tr>

          <tr class="row">
            <th class="col l-1 m-1 c-1 name-column">
              <input type="checkbox" class="checkbox all-checkbox" />
            </th>
            <th class="col l-1 m-1 c-2 name-column">STT</th>
            <th class="col l-3 m-3 c-4 name-column">Tên</th>
            <th class="col l-4 m-4 c-0 name-column">Mô tả</th>
            <th class="col l-2 m-2 c-3 name-column">Giá</th>
            <th class="col l-1 m-1 c-2 name-column">Hành động</th>
          </tr>
        </thead>

        <tbody>
          <?php
            $dbc = mysqli_connect('localhost', 'root', 'password', 'pc05353')
              or die('Error connecting to mysql.');
            $query = "SELECT * FROM product";
            $result = mysqli_query($dbc, $query) or die('Error querying database.');
            $show_id = 1;
            
            while ($row = mysqli_fetch_array($result)) {
              $id = $row['pd_id']; // realistic of customer
              $name = $row['pd_name'];
              $desc = $row['pd_desc'];
              $price = $row['pd_price'];

              echo "
                <tr class=\"row\">
                  <td class=\"col l-1 m-1 c-1 name-column\">
                    <input type=\"text\" hidden name=\"id\" value=\"$id\" />
                    <input type=\"checkbox\" class=\"checkbox\" />
                  </td>
                  <td class=\"col l-1 m-1 c-2 name-column\">$show_id</td>
                  <td class=\"col l-3 m-3 c-4 name-column\">$name</td>
                  <td class=\"col l-4 m-4 c-0 name-column\">$desc</td>
                  <td class=\"col l-2 m-2 c-3 name-column\">$price</td>
                  <td class=\"col l-1 m-1 c-2 name-column\">
                    <span class=\"edit-icon-container\">
                      <i class=\"fa-solid fa-pencil edit-icon action-icon\"></i>
                      <div class=\"edit-icon-text\">Edit</div>
                    </span>

                    <span class=\"delete-icon-container\">
                      <i class=\"fa-solid fa-trash delete-icon action-icon\"></i>
                      <div class=\"delete-icon-text\">Delete</div>
                    </span>
                  </td>
                </tr>";
              $show_id++;
            }

            mysqli_Close($dbc);
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

    <?php 
      include ('./modal.php');
    ?>
    <script src="./category.js"></script>
  </body>
</html>