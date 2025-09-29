<?php 
  $query_categories = "SELECT `id`, `name` FROM categories";
  $result_categories = mysqli_query($dbc, $query_categories);
  $categories = "";

  while ($category = mysqli_fetch_array($result_categories)) {
    $id = $category['id'];
    $name = $category['name'];
    $categories .= "<option value='$id'>$name</option>";
  }
    
  echo "
    <script>
    const formAddUpdate = `
      <div class='form-body'>
        <div class='form-group'>
          <label for='file'>Ảnh sản phẩm</label>
          <br/>
          <input type='file' id='file' name='file' />
          <p class='message'></p>
          <img class='image' name='image' style='width: 100%; object-fit: cover; margin-top: 10px'/>
        </div>  
        <div class='form-group'>
          <input type='text' class='form-input' name='name' placeholder='Tên' />
          <p class='message'></p>
        </div>  
        <div class='form-group'>
          <input type='number' class='form-input' name='price' placeholder='Giá' min='0' />
          <p class='message'></p>
        </div>
        <div class='form-group'>
          <input type='text' class='form-input' name='desc' placeholder='Mô tả' />
          <p class='message'></p>
        </div>
        <div class='form-group'>
          <select name='categories' id='categories'>
            <option value=''>Mời chọn thể loại</option>
            $categories
          </select>
          <p class='message'></p>
        </div>
      </div>`
    </script>";
?>