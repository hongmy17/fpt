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
        <link rel='stylesheet' href='$base_url/frontend/product/assets/css/new-password.css' />
        <link rel='stylesheet' href='$base_url/frontend/product/assets/css/announce.css' />
        ";
      $us_id = $_GET['us_id'];
    ?>
  </head>

  <body>
    <!-- header -->
    <?php 
      $base_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $parts[3];
      include "$base_path/frontend/product/assets/includes/header.php";
    ?>
    <!-- end header -->

    <form 
      class="new-password" 
      method="post" 
      action="<?php echo $_SERVER['PHP_SELF'] . "?us_id=$us_id"; ?>"
    >
      <?php 
        if (isset($_POST['submit'])) {
          $password = $_POST['password'];
          $confirm_password = $_POST['confirm-password'];

          if ($password == $confirm_password) {
            include "../../config/config.php";
            $query = "UPDATE users SET us_password = '$password' WHERE us_id = '$us_id'";
            $result = mysqli_query($dbc, $query) or die('Error querying database.');
            mysqli_close($dbc);
            echo "
              <script>
                this.location.href = '$base_url/backend/admin/users/signin.php';
              </script>";
          } else {
            echo '<div class="announce">Mật khẩu không khớp.</div>';
          }
        }
      ?>
      <h1 class="title">Mật khẩu mới</h1>
      <input
        type="password"
        name="password"
        class="new-password-input"
        placeholder="Mật khẩu mới"
      />
      <input
        type="password"
        name="confirm-password"
        class="new-password-input"
        placeholder="Nhập lại mật khẩu"
      />

      <button class="new-password-btn" name='submit'>Gửi</button>
    </form>

    <!-- footer -->
    <?php 
      include "$base_path/frontend/product/assets/includes/footer.php";
    ?>
    <!-- end footer -->
  </body>
</html>
