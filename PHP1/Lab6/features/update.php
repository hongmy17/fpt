<?php
  $id = $_POST['id'];
  $name = $_POST['name'];
  $note = $_POST['note'];

  include '../config/config.php';
  include "../includes/announce.php";

  $query = "UPDATE category SET `name` = '$name'," . 
    "`note` = '$note', `update_at` = NOW() WHERE `id` = '$id'";
  $result = mysqli_query($dbc, $query) or die('Error querying database.');
  mysqli_close($dbc);
  
  function backToPrePage() {
    global $base_url;
    echo "
      <script>
        const $ = document.querySelector.bind(document);
        const announceText = $('.announce-text');
        const backBtn = $('.back-btn');

        announceText.textContent = 'Cập nhật thể loại thành công';
        backBtn.onclick = () => {
          this.location.href = 
            '../index.php';
        }
          
        setTimeout(() => {
            this.location.href = 
            '../index.php';
        }, 2000);
      </script>";
  }

  backToPrePage();
?>