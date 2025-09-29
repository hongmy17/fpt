<!doctype html>
<html lang="en">
  <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
        rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
        crossorigin="anonymous">
      <title>Hello, world!</title>
  </head>

  <body>
    <?php 
      if (isset($_POST['btnLogin'])) {
        include ('./config/config.php');

        $name = $_POST['user_name'];
        $password = $_POST['password'];

        $query = "SELECT * FROM customer";
        $result = mysqli_query($dbc, $query) or die('Error querying database.');
        $isSuccessLogin = false;

        while ($row = mysqli_fetch_array($result)) {
          $cs_name = $row['cs_name'];
          $cs_password = $row['cs_password'];

          if ($name == $cs_name && $password == $cs_password) {
            $isSuccessLogin = true;
            break;
          }
        }

        $alert_success = '
          <div class="alert alert-success" role="alert">
              Bạn đã đăng nhập thành công.
          </div>';
        $alert_danger = '
          <div class="alert alert-danger" role="alert">
            Vui lòng kiểm tra lại thông tin đăng nhập.
          </div>';

        echo $isSuccessLogin ? $alert_success : $alert_danger;
        mysqli_close($dbc);
      }
    ?>
    
    <div class="container">
      <div class="login-box">
        <h1 class="mb-5">Login</h1>
        <form class="login-register" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <input 
            class="form-control"
            type="text" 
            placeholder="Nhập Tài Khoản" 
            name="user_name" />
          </br>
          <input 
            class="form-control"
            type="password" 
            placeholder="Nhập Mật Khẩu" 
            name="password" />
          </br>
          <button class="btn btn-success" name="btnLogin">Đăng Nhập</button>
        </form>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>