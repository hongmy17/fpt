<?php
  $name = $_POST['name'];
  $desc = $_POST['desc'];
  $price = $_POST['price'];
  $category = $_POST['categories'];

  $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
  $url = $protocol . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
  $parts = explode('/', $url);
  $base_url = $parts[0] . '//' . $parts[2] . '/' . $parts[3];

  $target_dir = 'images/';
  $file_name = basename($_FILES["file"]["name"]);
  $target_file_path = $target_dir . uniqid() . '_' . $file_name;

  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file_path)) {
    include ('../../config/config.php');
    $query = "INSERT INTO products (pd_img, pd_name, pd_price, pd_desc, category_id)" .
      "VALUES ('$target_file_path', '$name', '$price', '$desc', '$category')";
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

          announceText.textContent = 'Thêm sản phẩm thành công';
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