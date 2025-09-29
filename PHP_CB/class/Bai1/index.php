<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$color = "red";
$color_2 = "blue";
echo $color;
echo $COLOR; // chưa khai báo mà viết gọi biến ra, chỗ này sẽ xuất hiện warning error
echo $color; // warning error nếu mã xuất hiện thì dòng này vẫn chạy

echo $color . $color_2; // dấu chấm nối 2 chuỗi lại với nhau
echo "Dấu nháy ($color_2) đôi"; // tương tác với biến dùng dấu nháy đôi
echo 'Dấu nháy $color_2 đối'; // tương tác với chuối dùng nhấu nháy đơn

// mãng là tập hợp các phần tử



// thẻ pre thường đi cùng với var_dump để tạo ra được màn hình kiểm tra lỗi
echo "<pre>";
var_dump($color); // dùng để kiểm tra kiểu dữ liệu
echo "</pre>";