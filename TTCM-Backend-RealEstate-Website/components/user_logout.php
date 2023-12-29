<?php

include 'connect.php';

setcookie('user_id', '', time() - 1, '/');
//xóa cookie "user_id" khỏi trình duyệt của người dùng 
// Cookie được đặt với đường dẫn '/' để truy cập từ mọi trang web trong tên miền hiện tại.

header('location:../home.php');

?>