<?php

$db_name = 'mysql:host=localhost;dbname=home_db';
$db_user_name = 'root';
$db_user_pass = '';
//kết nối đến cơ sở dữ liệu
$conn = new PDO($db_name, $db_user_name, $db_user_pass); // tạo ra một kết nối PDO đến cơ sở dữ liệu

function create_unique_id()
{
   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $charactersLength = strlen($characters);
   $randomString = '';
   for ($i = 0; $i < 20; $i++) {
      $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
   }
   return $randomString; // trả về chuỗi để sử dụng làm một ID độc nhất
}
//   tạo ra một chuỗi ngẫu nhiên với độ dài là 20 ký tự để sử dụng làm một ID độc nhất
?>