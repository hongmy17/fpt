<?php
  $name = $_POST['name'];
  $note = $_POST['note'];
  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
  $url = $protocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  $parts = explode('/', $url);
  $base_url = $parts[0] . '//' . $parts[2] . '/' . $parts[3];
  $base_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $parts[3];
  
  include '../../config/config.php';
  include "$base_path/frontend/admin/assets/includes/announce.php";

  $query = "INSERT INTO categories (`name`, `note`) VALUES ('$name', '$note')";
  $result = mysqli_query($dbc, $query) or die('Error querying database');
  mysqli_close($dbc);
  
  function backToPrePage() {
    global $base_url;
    echo "
      <script>
        const $ = document.querySelector.bind(document);
        const announceText = $('.announce-text');
        const backBtn = $('.back-btn');

        announceText.textContent = 'Thêm thể loại thành công';
        backBtn.onclick = () => {
          this.location.href = 
            '$base_url/frontend/admin/assets/includes/categories.php';
        }
        
        setTimeout(() => {
          this.location.href = 
          '$base_url/frontend/admin/assets/includes/categories.php';
        }, 2000);
      </script>";
  }

  backToPrePage();
?>