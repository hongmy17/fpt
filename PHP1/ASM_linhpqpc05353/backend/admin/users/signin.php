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
        <link rel='stylesheet' href='$base_url/frontend/product/assets/css/signin.css' />
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

    <form class="signin" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <?php 
        if (isset($_POST['signin-btn'])) {
          include ('../../config/config.php');
          $query = "SELECT us_id, us_name, us_email, us_password FROM users";
          $result = mysqli_query($dbc, $query) or die('Error querying database.');

          while ($row = mysqli_fetch_array($result)) {
            $us_name = $row['us_name'];
            $us_email = $row['us_email'];
            $us_password = $row['us_password'];

            if (
              (($_POST['name-or-email'] == $us_name) || 
              ($_POST['name-or-email'] == $us_email)) &&
              ($_POST['password'] == $us_password)
            ) {
              $id = $row['us_id'];
              echo "
                <script>
                  this.location.href = '$base_url/frontend/product/pages/home.php?id=$id';
                </script>";
            }
          }

          echo '<div class="announce">Thông tin đằng nhập sai.</div>';
        }
      ?>
      <h1 class="title">ĐĂNG NHẬP</h1>
      <input 
        type="text" 
        class="signin-input" 
        name="name-or-email" 
        placeholder="Tên hoặc email" 
        value="<?php 
          if (isset($_POST['signin-btn'])) { 
            echo $_POST['name-or-email']; 
          ?>" />
      <input 
        type="password" 
        class="signin-input" 
        name="password" 
        placeholder="Mật khẩu" 
        value="<?php 
            echo $_POST['password'];
          }?>" />

      <div class="signin-group">
        <div class="signin-content">
          <a href="./signup.php" target="page" class="has-account"
            >Chưa có tài khoản?</a
          >
          <a href="../login.php" target="page" class="is-admin">Admin?</a>
        </div>

        <button class="signin-btn" name="signin-btn">Đăng nhập</button>
      </div>
      <a href="./forget-password.php" class="forget-pass">Quên mật khẩu?</a>
    </form>

    <!-- footer -->
    <?php 
      include "$base_path/frontend/product/assets/includes/footer.php";
    ?>
    <!-- end footer -->
  </body>
</html>
