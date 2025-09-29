<?php
  $name = $_POST['name'];
  $note = $_POST['note'];
  
  include '../config/config.php';
  include "../includes/announce.php";

  $query = "INSERT INTO category (`name`, `note`) VALUES ('$name', '$note')";
  $result = mysqli_query($dbc, $query) or die('Error querying database');
  mysqli_close($dbc);
  
  function backToPrePage() {
    echo "
      <script>
        const $ = document.querySelector.bind(document);
        const announceText = $('.announce-text');
        const backBtn = $('.back-btn');

        announceText.textContent = 'Thêm thể loại thành công';
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