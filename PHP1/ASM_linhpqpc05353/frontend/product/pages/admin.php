<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/admin.css" />
    <link rel="stylesheet" href="../assets/css/announce.css" />
  </head>

  <body>
    <!-- header -->
    <?php 
      include ('../assets/includes/header.php');
      ?>
    <!-- end header -->
    
    <form class="admin" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <?php 
        include ('../../../backend/admin/login.php');
      ?>

      <h1 class="title">ADMIN</h1>
      <input type="text" class="admin-input" name="name" placeholder="Tên" />
      <input type="password" class="admin-input" name="password" placeholder="Mật khẩu" />

      <div class="admin-group">
        <div class="admin-content">
          <a href="./signin.php" target="page" class="has-account"
            >Đăng nhập với tư cách người dùng?</a
          >
          <br />
          <a href="#" class="forget-pass">Quên mật khẩu?</a>
        </div>

        <button class="admin-btn" name="admin-btn">Đăng nhập</button>
      </div>
    </form>

    <!-- footer -->
    <?php 
      include ('../assets/includes/footer.php');
    ?>
    <!-- end footer -->
  </body>
</html>
