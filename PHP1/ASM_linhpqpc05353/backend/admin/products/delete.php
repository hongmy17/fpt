<?php 
  $id = $_POST['id'];

  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
  $url = $protocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  $parts = explode('/', $url);
  $base_url = $parts[0] . '//' . $parts[2] . '/' . $parts[3];

  include ('../../config/config.php');
  $query = "SELECT pd_img FROM products WHERE pd_id IN($id)";
  $result = mysqli_query($dbc, $query) or die('Error querying database.');
  while ($row = mysqli_fetch_array($result)) {
    $img = $row['pd_img'];
    unlink(__DIR__ . "/" . $img);
  }

  $query = "DELETE FROM products WHERE pd_id IN($id)";
  $result = mysqli_query($dbc, $query) or die('Error querying database.');
  mysqli_close($dbc);

  $base_path = $_SERVER['DOCUMENT_ROOT'] . '/' . $parts[3];
  include "$base_path/frontend/admin/assets/includes/announce.php";

  function backToPrePage() {
    global $base_url;
    echo "
      <script>
        const $ = document.querySelector.bind(document);
        const announceText = $('.announce-text');
        const backBtn = $('.back-btn');

        announceText.textContent = 'Xóa sản phẩm thành công';
        backBtn.onclick = () => {
          this.location.href = 
            '$base_url/frontend/admin/assets/includes/products.php';
        }
        
        // setTimeout(() => {
        //   this.location.href = 
        //     '$base_url/frontend/admin/assets/includes/products.php';
        // }, 2000);
      </script>";
  }

  backToPrePage();
?>