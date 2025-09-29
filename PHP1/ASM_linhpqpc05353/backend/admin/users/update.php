<?php
  $id = $_POST['id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $is_admin = isset($_POST['is-admin']) ? 1 : 0;

  include '../../config/config.php';
  $is_exist = false;
  $query = "SELECT us_email, us_phone FROM users WHERE us_id <> $id";
  $result = mysqli_query($dbc, $query);
  while ($row = mysqli_fetch_array($result)) {
    $us_email = $row['us_email'];
    $us_phone = $row['us_phone'];

    if (($email == $us_email) || ($phone == $us_phone)) {
      $is_exist = true;
      break;
    }
  }

  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
  $url = $protocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  $parts = explode('/', $url);
  $path = $_SERVER['DOCUMENT_ROOT'] . '/' . $parts[3];
  $base_url = $parts[0] . '//' . $parts[2] . '/' . $parts[3];

  $base_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $parts[3];
  include "$base_path/frontend/admin/assets/includes/announce.php";

  if ($is_exist) {
    alertError();
    mysqli_close($dbc);
    return;
  }

  function alertError() {
    echo "
      <script>
        const $ = document.querySelector.bind(document);
        const announceIcon = $('.icon');
        const announceText = $('.announce-text');
        const backBtn = $('.back-btn');
        announceIcon.className = 'fa-solid fa-circle-xmark icon fail';

        announceText.innerHTML = 
          'Cập nhật khách hàng không thành công <br/>' +
          '(Email hoặc số điện thoại đã tồn tại)';
        backBtn.onclick = () => {
          window.history.back();
        }
        
        setTimeout(() => {
          window.history.back();
        }, 4000);
      </script>";
  }

  $query = "UPDATE users SET us_name = '$name', us_email = '$email'," . 
    "us_phone = '$phone', is_admin = '$is_admin', update_at = NOW() WHERE us_id = '$id'";
  $result = mysqli_query($dbc, $query) or die('Error querying database.');
  mysqli_close($dbc);
  
  function backToPrePage() {
    global $base_url;
    echo "
      <script>
        const $ = document.querySelector.bind(document);
        const announceText = $('.announce-text');
        const backBtn = $('.back-btn');

        announceText.textContent = 'Cập nhật khách hàng thành công';
        backBtn.onclick = () => {
          this.location.href = 
            '$base_url/frontend/admin/assets/includes/users.php';
        }
        
        setTimeout(() => {
          this.location.href = 
            '$base_url/frontend/admin/assets/includes/users.php';
        }, 2000);
      </script>";
  }

  backToPrePage();
?>