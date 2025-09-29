<ul class="col l-2 m-12 c-12 category">
  <?php 
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $url = $protocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    $parts = explode('/', $url);
    $base_url = $parts[0] . '//' . $parts[2] . '/' . $parts[3] . '/frontend/admin/assets';

    echo "
      <link rel='stylesheet' href='$base_url/css/slide-bar.css' />";
  ?>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
    integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  />

  <li class="category-item">
    <a href='<?php echo "$base_url/includes/dash-board.php" ?>' class="category-link">
      <i class="fa-solid fa-chart-line category-link-icon"></i>
      Điều khiển
    </a>
  </li>
  <li class="category-item">
    <a href='<?php echo "$base_url/includes/products.php" ?>' class="category-link">
      <i class="fa-solid fa-pizza-slice category-link-icon"></i>
      Sản phẩm
    </a>
  </li>
  <li class="category-item">
    <a href='<?php echo "$base_url/includes/categories.php" ?>' class="category-link">
      <i class="fa-solid fa-list category-link-icon"></i>
      Thể loại
    </a>
  </li>
  <li class="category-item">
    <a href='<?php echo "$base_url/includes/users.php" ?>' class="category-link">
      <i class="fa-solid fa-user-group category-link-icon"></i>
      Khách hàng
    </a>
  </li>
  <li class="category-item">
    <a href='<?php echo "$base_url/includes/orders.php" ?>' class="category-link">
      <i class="fa-solid fa-cart-shopping category-link-icon"></i>
      Đơn hàng
    </a>
  </li>
  <li class="category-item">
    <a href='<?php echo "$base_url/includes/bills.php" ?>' class="category-link">
      <i class="fa-solid fa-money-bill category-link-icon"></i>
      Hóa đơn
    </a>
  </li>
</ul>
