<?php 
  $id = $_POST['id'];
  $name = $_POST['name'];
  $price = $_POST['price'];
  $desc = $_POST['desc'];
  $category = $_POST['categories'];

  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
  $url = $protocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  $parts = explode('/', $url);
  $base_url = $parts[0] . '//' . $parts[2] . '/' . $parts[3];

  include ('../../config/config.php');
  $query_img = "SELECT pd_img FROM products WHERE pd_id = '$id'";
  $result_img = mysqli_query($dbc, $query_img);
  $img = mysqli_fetch_array($result_img)['pd_img'];
  unlink(__DIR__ . "/" . $img);
  
  $target_dir = 'images/';
  $file_name = basename($_FILES["file"]["name"]);
  $target_file_path = $target_dir . uniqid() . '_' . $file_name;

  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file_path)) {
    $query = "UPDATE products SET pd_img = '$target_file_path', pd_name = '$name', " .
      "pd_price = '$price', pd_desc = '$desc', category_id = '$category', update_at = NOW() WHERE pd_id = '$id'";
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

          announceText.textContent = 'Cập nhật sản phẩm thành công';
          backBtn.onclick = () => {
            this.location.href = 
              '$base_url/frontend/admin/assets/includes/products.php';
          }
          
          setTimeout(() => {
            this.location.href = 
              '$base_url/frontend/admin/assets/includes/products.php';
          }, 2000);
        </script>";
    }

    backToPrePage();
  }
?>