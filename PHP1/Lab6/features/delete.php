<?php
  $id = $_POST['id'];

  include '../config/config.php';
  include "../includes/announce.php";

  $query = "DELETE FROM category WHERE `id` IN($id)";
  $result = mysqli_query($dbc, $query) or die('Error querying database.');
  mysqli_close($dbc);

  function backToPrePage() {
    global $base_url;
    echo "
      <script>
        const $ = document.querySelector.bind(document);
        const announceText = $('.announce-text');
        const backBtn = $('.back-btn');

        announceText.textContent = 'Xóa thể loại thành công';
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