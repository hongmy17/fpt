<header class="grid wide header">
  <?php 
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
    $url = $protocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    $parts = explode('/', $url);
    $base_url = $parts[0] . '//' . $parts[2] . '/' . $parts[3];

    echo "
      <link rel='stylesheet' href='$base_url/frontend/admin/assets/css/header.css' />";
  ?>
  <style>
    .img-container {
      position: relative;
    }

    .option-container {
      position: absolute;
      background-color: #000;
      top: 100%;
      right: 0;
      width: 120px;
      padding: 10px;
      text-align: left;
      display: none;
    }

    .option-container a {
      color: #fff;
      text-decoration: none;
    }

    #option-container-checkbox:checked ~ .option-container {
      display: block;
    }
  </style>
  <nav class="row">
    <a href="dash-board.php" target="page" class="col l-2 m-2 c-6 header__logo"
      >PIZZA</a
    >

    <input type="checkbox" hidden id="header__search-group-checkbox" />
    <div class="col l-8 m-8 header__search-group">
      <i class="fa-solid fa-magnifying-glass header__search-icon"></i>
      <input
        type="search"
        placeholder="Nhập từ khóa bạn muốn tìm ..."
        class="header__search-box"
      />
    </div>

    <div class="col l-2 m-2 c-6 header__option-group">
      <label for="header__search-group-checkbox">
        <i class="fa-solid fa-magnifying-glass header__option-icon"></i>
      </label>
      <i class="fa-solid fa-gear header__setting-icon header__option-icon"></i>
      <i class="fa-solid fa-bell header__bell-icon header__option-icon"></i>

      <label for="option-container-checkbox" class="img-container">
        <img
          src='<?php echo "$base_url/frontend/admin/assets/images/avatar.jpg " ?>'
          alt="avatar"
          class="header__avatar"
        />
        <input type="checkbox" hidden id="option-container-checkbox">
        <section class="option-container">
          <a href='<?php echo "$base_url/backend/admin/signout.php"; ?>'>Đăng xuất</a>
        </section>
      </label>
    </div>
  </nav>
</header>
