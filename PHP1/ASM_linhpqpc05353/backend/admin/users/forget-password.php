<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <?php 
      include "../../PHPMailer/src/PHPMailer.php";
      include "../../PHPMailer/src/Exception.php";
      include "../../PHPMailer/src/OAuth.php";
      include "../../PHPMailer/src/POP3.php";
      include "../../PHPMailer/src/SMTP.php";
      
      use PHPMailer\PHPMailer\PHPMailer;
      use PHPMailer\PHPMailer\Exception;
      use PHPMailer\PHPMailer\SMTP;
      $ran_number = rand(10, 99);   

      function send_mail($name, $email) {
        global $ran_number;
        $mail = new PHPMailer(true);     
        try {
          //Server settings
          $mail->SMTPDebug = 0;                                 
          $mail->isSMTP();                                      
          $mail->Host = 'smtp.gmail.com';  
          $mail->SMTPAuth = true;                               
          $mail->Username = 'linhpqpc05353@fpt.edu.vn';                 
          $mail->Password = 'plvdbchpexkhkpwh';                           
          $mail->SMTPSecure = 'tls';                            
          $mail->Port = 587;                                    

          //Recipients
          $mail->setFrom('linhpqpc05353@fpt.edu.vn');
          $mail->addAddress($email);     
          
          //Content
          $mail->isHTML(true);            
          $subject = mb_encode_mimeheader('Thư xác nhận', 'utf-8');
          $mail->Subject = $subject;
          $mail->Body = 
            "<!DOCTYPE html>
            <html lang='en'>
              <head>
                <meta charset='UTF-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                <title>Document</title>
                <style>
                  .code {
                    font-size: 24px;
                    font-weight: 600;
                    border-radius: 50%;
                    border: 1px solid #999;
                    width: 50px;
                    line-height: 50px;
                    text-align: center;
                    margin-top: 20px;
                    cursor: pointer;
                    transition: all 0.2s linear;
                    position: absolute;
                    left: 50%;
                    transform: translateX(-50%);
                  }
                </style>
              </head>

              <body>
                Kính gửi: $name <br/>
                Đây là code xác thực của bạn: <br/>
                <div class='code'>$ran_number</div>
              </body>
            </html>";

          $mail->send();
        } catch (Exception $e) {
          echo "<div class='announce'>Không thể gửi Email <br/> $mail->ErrorInfo </div>";
        }
      }

      $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
      $url = $protocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
      $parts = explode('/', $url);
      $base_url = $parts[0] . '//' . $parts[2] . '/' . $parts[3];

      echo "
        <link rel='stylesheet' href='$base_url/frontend/product/assets/css/forget-password.css' />
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

    <form class="forget-password" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <?php 
        if (isset($_POST['submit'])) {
          $email = $_POST['email'];
          include ('../../config/config.php');
          $query = "SELECT us_id, us_name, us_email FROM users WHERE us_email = '$email'";
          $result = mysqli_query($dbc, $query);

          if ($row = mysqli_fetch_array($result)) {
            send_mail($row['us_name'], $row['us_email']);
            $code = base64_encode($ran_number);
            $us_id = $row['us_id'];
            echo "
              <script>
                this.location.href = '$base_url/backend/admin/users/verification.php?code=$code&us_id=$us_id';
              </script>";
          } else {
            echo '<div class="announce">Email không tồn tại.</div>';
          }
        }
      ?>
      <h1 class="title">QUÊN MẬT KHẨU</h1>
      <input 
        type="email" 
        class="forget-password-input" 
        placeholder="Email"
        name="email"
        value="<?php 
          if (isset($_POST['submit'])) {
            echo $_POST['email'];
          }
        ?>"
      />

      <div class="forget-password-group">
        <div class="forget-password-content">
          <a href="./signin.php" target="page" class="has-account"
            >Trở về đăng nhập?</a
          >
          <a href="./admin.php" target="page" class="is-admin">Admin?</a>
        </div>

        <button class="forget-password-btn" name="submit">Gửi</button>
      </div>
    </form>

    <!-- footer -->
    <?php 
      include "$base_path/frontend/product/assets/includes/footer.php";
    ?>
    <!-- end footer -->
  </body>
</html>
