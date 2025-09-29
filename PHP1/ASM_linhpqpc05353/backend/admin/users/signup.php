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
        <link rel='stylesheet' href='$base_url/frontend/product/assets/css/signup.css' />
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

    <form 
      class="signup" 
      method="post" 
      enctype="multipart/form-data"
      action="<?php echo $_SERVER['PHP_SELF']; ?>" 
    >
      <?php 
        if (isset($_POST['signup-btn'])) {
          $name = $_POST['name'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $password = $_POST['password'];
          $isEmpty = false;
          
          if (
            empty($name) || empty($email) ||
            empty($phone) || empty($password)
            ) {
              echo '<div class="announce">Vui lòng nhập đầy đủ thông tin.</div>';
              $isEmpty = true;
            }
            
            if (!$isEmpty) {
              $target_dir = 'images/';
              $file_name = basename($_FILES["user-avatar"]["name"]);
              $target_file_path = $target_dir . uniqid() . '_' . $file_name;

              if (move_uploaded_file($_FILES["user-avatar"]["tmp_name"], $target_file_path)) {
                include ('../../config/config.php');
                $query = "INSERT INTO users (us_name, us_email, us_phone, us_password, " .
                  "us_avatar) VALUES ('$name', '$email', '$phone', '$password', '$target_file_path')";
                $result = mysqli_query($dbc, $query) or die('Error querying database.');
                $id = mysqli_insert_id($dbc);
                mysqli_close($dbc);
            
                echo "
                  <script>
                    this.location.href = '$base_url/frontend/product/pages/home.php?id=$id';
                  </script>";
              }
          }
        }
      ?>

      <h1 class="title">ĐĂNG KÝ</h1>
      <div class="form-group">
        <input type="file" class="avatar-input" name="user-avatar">
        <img class="user-avatar" style="width: 100%; object-fit: cover: margin-top: 20px">
      </div>
      <input 
        type="text" 
        class="signup-input"
        name="name"
        placeholder="Tên"
        value="<?php if (isset($_POST['signup-btn'])) echo $_POST['name']; ?>"
      />
      <input
        type="email"
        class="signup-input"
        name="email"
        placeholder="Email"
        value="<?php if (isset($_POST['signup-btn'])) echo $_POST['email']; ?>"
      />
      <input
        type="number"
        class="signup-input"
        name="phone"
        placeholder="Số điện thoại"
        value="<?php if (isset($_POST['signup-btn'])) echo $_POST['phone']; ?>"
      />
      <input
        type="password"
        class="signup-input"
        name="password"
        placeholder="Mật khẩu"
        value="<?php if (isset($_POST['signup-btn'])) echo $_POST['password']; ?>"
      />

      <div class="signup-group">
        <div class="signup-content">
          <a href="./signin.php" target="page" class="has-account"
            >Đã có tài khoản?</a
          >
          <a href="../login.php" target="page" class="is-admin">Admin?</a>
        </div>

        <button class="signup-btn" name="signup-btn">Đăng ký</button>
      </div>
    </form>

    <!-- footer -->
    <?php 
      include "$base_path/frontend/product/assets/includes/footer.php";
    ?>
    <!-- end footer -->

    <script>
      const avatarInput = document.querySelector('.avatar-input');
      const userAvatar = document.querySelector('.user-avatar');

      avatarInput.oninput = function () {
        const avatarInputFile = this.files[0];
        const reader = new FileReader();
        reader.onload = function () {
          userAvatar.src = reader.result;
        };
        reader.readAsDataURL(avatarInputFile);
      };
    </script>
  </body>
</html>
