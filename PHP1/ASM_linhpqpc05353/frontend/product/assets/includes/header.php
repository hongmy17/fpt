<header class="header">
  <?php 
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $url = $protocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    $parts = explode('/', $url);
    $base_url = $parts[0] . '//' . $parts[2] . '/' . $parts[3];

    echo "
      <link rel='stylesheet' href='$base_url/frontend/product/assets/css/style.css' />
      <link rel='stylesheet' href='$base_url/frontend/product/assets/css/main.css' />
      <link rel='stylesheet' href='$base_url/frontend/product/assets/css/grid.css' />
      <link rel='stylesheet' href='$base_url/frontend/product/assets/css/responsive.css' />";
  ?>
  <!-- font awesome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />

  <nav class="grid wide">
    <section class="row">
      <h1 class="col l-4 m-8 c-6 header__logo">
        <a target="page" href='<?php 
          echo "$base_url/frontend/product/pages/home.php";
          if (isset($_GET['id'])) echo '?id=' . $_GET['id'];
        ?>' 
        class="header__logo-link"
          >PIZZA</a
        >
      </h1>

      <section class="col l-7 m-0 c-0 header__navbar">
        <i class="fa-solid fa-xmark header-mobile-tablet__close-icon"></i>
        <ul class="row header__navbar-list">
          <li class="col l-3 m-12 c-12 header__navbar-item">
            <a
              target="page"
              href='<?php 
                echo "$base_url/frontend/product/pages/home.php";
                if (isset($_GET['id'])) echo '?id=' . $_GET['id'];
              ?>'
              class="header__navbar-link"
              id="home"
              >TRANG CHỦ</a
            >
          </li>

          <li class="col l-3 m-12 c-12 header__navbar-item">
            <a
              target="page"
              href='<?php 
                echo "$base_url/frontend/product/pages/about.php";
                if (isset($_GET['id'])) echo '?id=' . $_GET['id'];
              ?>'
              class="header__navbar-link"
              id="about"
              >GIỚI THIỆU</a
            >
          </li>

          <li class="col l-2 m-12 c-12 header__navbar-item">
            <a
              target="page"
              href='<?php 
                echo "$base_url/frontend/product/pages/contact.php";
                if (isset($_GET['id'])) echo '?id=' . $_GET['id'];
              ?>'
              class="header__navbar-link"
              >LIÊN HỆ</a
            >
          </li>

          <li class="col l-2 m-12 c-12 header__navbar-item">
            <a
              target="page"
              href='<?php 
                echo "$base_url/frontend/product/pages/feedback.php";
                if (isset($_GET['id'])) echo '?id=' . $_GET['id'];
              ?>'
              class="header__navbar-link"
              >GÓP Ý</a
            >
          </li>

          <li class="col l-2 m-12 c-12 header__navbar-item">
            <a
              target="page"
              href='<?php 
                echo "$base_url/frontend/product/pages/faq.php";
                if (isset($_GET['id'])) echo '?id=' . $_GET['id'];
              ?>'
              class="header__navbar-link"
              >HỎI ĐÁP</a
            >
          </li>
        </ul>
      </section>

      <section class="col l-1 m-4 c-6 container">
        <label for="header__navbar-bill-checkbox" class="container-icon">
          <span class="bill-item-quantity item-quantity">0</span>
          <i class="fa-solid fa-money-bill bill-icon header__navbar-list-icon"></i>
        </label>
        <label for="header__navbar-cart-checkbox" class="container-icon" style="margin: 0 15px">
          <span class="cart-item-quantity item-quantity">0</span>
          <i
            class="fa-solid fa-cart-shopping cart-icon header__navbar-list-icon"
          ></i>
        </label>

        <label for="container-option__checkbox">
          <img
            class="header__navbar-avatar"
            src='
              <?php 
                $base_src = "$base_url/backend/admin/users/";
                $default_src = $base_src . "images/default.png";
                if (isset($_GET['id'])) {
                  $path = $_SERVER['DOCUMENT_ROOT'] . '/' . $parts[3];
                  include "$path/backend/config/config.php";
                  $id = $_GET['id'];
                  $query = "SELECT us_avatar FROM users WHERE us_id = $id";
                  $result = mysqli_query($dbc, $query);
                  $src = mysqli_fetch_array($result)['us_avatar'] ?? "images/default.png";
                  echo $base_src . $src;
                } else {
                  echo $default_src;
                }
              ?>'
            alt="avatar"
          />
        </label>

        <input type="checkbox" hidden id="container-option__checkbox" />
        <section class="container-option">
          <a href="#" target="page" class="container-option__link"
            >Cài đặt</a
          >
          <?php 
            if (isset($_GET['id'])) {
              echo "
                <a
                  href='$base_url/backend/admin/users/signout.php'
                  target='page'
                  class='container-option__link'
                >
                  Đăng xuất
                </a>";
            } else {
              echo "
                <a
                  href='$base_url/backend/admin/users/signin.php'
                  target='page'
                  class='container-option__link'
                >
                  Đăng ký/Đăng nhập
                </a>";
            }
          ?>
          <a
            href='<?php echo "$base_url/backend/admin/login.php"; ?>'
            target="page"
            class="container-option__link"
          >
            Admin
          </a>
        </section>

        <section class="header-mobile-tablet__navbar">
          <i class="fa-solid fa-bars header-mobile-tablet__navbar-icon"></i>
          <section class="header-mobile-tablet__navbar-overlay"></section>
        </section>
      </section>

      <input type="checkbox" hidden id="header__navbar-bill-checkbox"/>
      <section class="header__navbar-bill-list header__navbar-item-list">
        <label for="header__navbar-bill-checkbox">
          <i
            class="fa-solid fa-xmark header__navbar-item-list-close-icon"
          ></i>
        </label>

        <img
          class="header__navbar-item-list-img header__navbar-bill-list-no-item-img"
          src='<?php echo "$base_url/frontend/product/assets/images/no-bill.png" ?>'
          alt="no item"
        />

        <section class="row container-item">
          <?php 
            $us_id = $_GET['id'] ?? '';

            $base_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $parts[3];
            if (isset($_GET['id'])) {
              include "$base_path/backend/config/config.php";
              $query = "SELECT bill_id, total, create_at AS order_day FROM bills WHERE us_id = '$us_id'";
              $result = mysqli_query($dbc, $query);

              while ($row = mysqli_fetch_array($result)) {
                $bill_id = $row['bill_id'];
                $total = $row['total'];
                $total_format = number_format($total, 0, '', ',');
                $order_day = $row['order_day'];

                echo "
                  <section 
                    class='col l-12 m-12 c-12 bill-item item' 
                    style='flex-direction: column; align-items: flex-start; padding: 10px; cursor: pointer'
                    bill-id = '$bill_id'
                  >
                    <h3>Hoa don: $order_day</h3>
                    <p><strong style='font-size: 18px'>Tong: </strong> $total_format VND</p>
                  </section>";
              }
              mysqli_close($dbc);
              
              if ($total > 0) {
                echo "
                  <script>
                    document.querySelector('.header__navbar-bill-list-no-item-img')
                      .style.display = 'none';
                    document.querySelector('.bill-item-quantity').textContent = 
                      document.querySelectorAll('.bill-item').length;
                  </script>";
              }
            }
          ?>
        </section>
      </section>

      <input type="checkbox" hidden id="header__navbar-cart-checkbox" />
      <section class="header__navbar-cart-list header__navbar-item-list">
        <label for="header__navbar-cart-checkbox">
          <i
            class="fa-solid fa-xmark header__navbar-item-list-close-icon"
          ></i>
        </label>

        <img
          class="header__navbar-item-list-img header__navbar-cart-list-no-item-img"
          src='<?php echo "$base_url/frontend/product/assets/images/no-cart.png" ?>'
          alt="no item"
        />

        <section class="row container-item">
          <?php 
            $us_id = $_GET['id'] ?? '';
            echo "<input type='text' class='base-url' hidden value='$base_url/backend/admin/products/'/>
              <input type='text' hidden class='us-id' value='$us_id' />";

            $base_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $parts[3];
            if (isset($_GET['id'])) {
              include "$base_path/backend/config/config.php";
              $query_order_id = "SELECT order_id FROM orders WHERE us_id = '$us_id'";
              $query_product_id = "SELECT pd_id FROM order_detail 
                WHERE order_id = ($query_order_id)";

              $query = "SELECT p.pd_id, p.pd_img, p.pd_name, p.pd_desc, p.pd_price, 
                o.quantity FROM products p JOIN order_detail o ON o.pd_id = p.pd_id 
                WHERE p.pd_id IN ($query_product_id) AND o.order_id = ($query_order_id)";
              $result = mysqli_query($dbc, $query) or die('Error querying database.');
              $total = 0;

              while ($row = mysqli_fetch_array($result)) {
                $id = $row['pd_id'];
                $quantity = $row['quantity'];
                $img = $base_url . "/backend/admin/products/" . $row['pd_img'];
                $name = $row['pd_name'];
                $desc = $row['pd_desc'];
                $total += ($row['pd_price'] * $quantity);
                $price = number_format($row['pd_price'], 0, '', ',');

                echo "
                  <section 
                    class='col l-12 m-12 c-12 cart-item item' pd-id='${id}'
                  >
                    <i class='fa-solid fa-trash remove-icon' onclick='removeItem()'></i>
                    <section class='container-quantity'>
                      <span class='minus'><i class='fa-solid fa-minus' onclick='decrease()'></i></span>
                      <span class='quantity'>$quantity</span>
                      <span class='plus'><i class='fa-solid fa-plus' onclick='increase()'></i></span>
                    </section>
                    
                    <section class='item-image'>
                      <img
                        src='$img'
                        class='item-img'
                      />
                    </section>

                    <section class='item-content'>
                      <h3 class='item-title'>$name</h3>
                      <p class='item-text'>$desc</p>
                      <p class='item-price'>$price VND</p>
                    </section>
                  </section>";
              }
              mysqli_close($dbc);
              
              if ($total > 0) {
                echo "
                  <script>
                    document.querySelector('.header__navbar-cart-list-no-item-img')
                      .style.display = 'none';
                    document.querySelector('.cart-item-quantity').textContent = 
                      document.querySelectorAll('.cart-item').length;
                  </script>";
              }
            }
          ?>
        </section>

        <span class="header__navbar-cart-total-container"
          >Tổng: <span class="header__navbar-cart-total">
            <?php 
              echo isset($_GET['id']) ? number_format($total, 0, '', ',') : 0;
            ?>
          </span>
        </span>
        <button class="header__navbar-cart-buy-btn">Mua</button>
      </section>
    </section>
  </nav>
  
</header>
<!-- announce -->
<?php 
  include "$base_path/frontend/product/assets/includes/announce.php";
?>
<!-- end announce -->

<script src="../assets/js/main.js"></script>