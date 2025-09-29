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
        <link rel='stylesheet' href='$base_url/frontend/product/assets/css/verification.css' />
        <link rel='stylesheet' href='$base_url/frontend/product/assets/css/announce.css' />
        ";

      $code = $_GET['code'];
      $decode = base64_decode($code);
      $us_id = $_GET['us_id'];
    ?>

    <style>
      /* .verification .code-selected {
        border: 1px solid #ffa400;
      } */
      /* .verification input[name='code']:checked ~ .code {
        border: 1px solid #ffa400;
      } */
      #checkbox0:checked ~ label[for='checkbox0'],
      #checkbox1:checked ~ label[for='checkbox1'],
      #checkbox2:checked ~ label[for='checkbox2'],
      #checkbox3:checked ~ label[for='checkbox3'] {
        background-color: #999;
      }
    </style>
  </head>

  <body>
    <!-- header -->
    <?php 
      $base_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $parts[3];
      include "$base_path/frontend/product/assets/includes/header.php";
    ?>
    <!-- end header -->

    <form 
      class="verification" 
      method="POST" 
      action="<?php echo $_SERVER['PHP_SELF'] . "?code=$code&us_id=$us_id"; ?>"
    >
      <?php 
        if (isset($_POST['submit'])) {
          if (isset($_POST['code']) && $_POST['code'] == $decode) {
            echo "
              <script>
                this.location.href = '$base_url/backend/admin/users/new-password.php?us_id=$us_id';
              </script>";
          } else {
            echo '<div class="announce">Vui lòng chọn đúng code được gửi.</div>';
          }
        }
      ?>

      <h1 class="title">XÁC THỰC</h1>
      <div class="code-verification">
        <h3 class="code-verification-desc">Nhấn vào code bạn nhận được</h3>

        <ul class="codes">
          <?php 
            $ran_numbers = [];
            $ran_numbers_quantity = 4;
            $count = 0;
            $order_ran = rand(0, 3);

            while ($count < $ran_numbers_quantity) {
              $ran_number = rand(10, 99);
              if (in_array($ran_number, $ran_numbers)) continue;
              if ($count == $order_ran) 
                $ran_number = $decode;

              array_push($ran_numbers, $ran_number);
              echo "
              <input type='radio' name='code' hidden value='$ran_number' id='checkbox$count'/>
              <label for='checkbox$count' class='code'>$ran_number</label>
              ";
              $count++;
            }
            unset($ran_numbers);
          ?>
        </ul>
      </div>

      <button class="verification-btn" name="submit" style="margin-left: 100%; transform: translateX(-100%)">Gửi</button>
    </form>

    <!-- footer -->
    <?php 
      include "$base_path/frontend/product/assets/includes/footer.php";
    ?>
    <!-- end footer -->
  </body>
</html>
