<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <?php 
      $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
      $url = $protocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
      $parts = explode('/', $url);
      $base_url = $parts[0] . '//' . $parts[2] . '/' . $parts[3];

      echo "
        <link rel='stylesheet' href='$base_url/frontend/product/assets/css/admin.css' />
        <link rel='stylesheet' href='$base_url/frontend/product/assets/css/announce.css' />
        ";
    ?>
  </head>

  <body>
    <!-- header -->
    <?php 
      $base_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $parts[3];
      include "$base_path/frontend/product/assets/includes/header.php";
    ?>
    <!-- end header -->
    
    <form class="admin" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <?php 
        if (isset($_POST['admin-btn'])) {
          include ('../config/config.php');
          $query = "SELECT us_name, us_email, us_password FROM users WHERE is_admin = 1";
          $result = mysqli_query($dbc, $query) or die('Error querying database');
          
          while ($row = mysqli_fetch_array($result)) {
            $us_name = $row['us_name'];
            $us_email = $row['us_email'];
            $us_password = $row['us_password'];
      
            if (
              (($_POST['name-or-email'] == $us_name) || 
              ($_POST['name-or-email'] == $us_email)) && 
              ($_POST['password'] == $us_password)
            ) {
              echo "
                <script>
                  this.location.href = '$base_url/frontend/admin/assets/includes/dash-board.php';
                </script>";
            }
          }
          
          echo '<div class="announce">Sai thong tin dang nhap</div>';
          mysqli_close($dbc);
        }
      ?>

      <h1 class="title">ADMIN</h1>
      <input 
        type="text" 
        class="admin-input" 
        name="name-or-email" 
        placeholder="Tên"
        value="<?php if (isset($_POST['admin-btn'])) echo $_POST['name-or-email']; ?>"
      />
      <input 
        type="password" 
        class="admin-input" 
        name="password" 
        placeholder="Mật khẩu"
        value="<?php if (isset($_POST['admin-btn'])) echo $_POST['password']; ?>"
      />

      <div class="admin-group">
          <a href="./users/signin.php" target="page" class="has-account"
            >Đăng nhập với tư cách người dùng?</a
          >

        <button class="admin-btn" name="admin-btn">Đăng nhập</button>
      </div>
    </form>

    <!-- footer -->
    <?php 
      include "$base_path/frontend/product/assets/includes/footer.php";
    ?>
    <!-- end footer -->
  </body>
</html>
