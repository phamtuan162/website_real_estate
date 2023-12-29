<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}


if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $pass = sha1($_POST['pass']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING); //xóa các ký tự không hợp lệ và mã hóa các ký tự đặc biệt trong chuỗi.

    $select_users = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ? LIMIT 1");
    $select_users->execute([$email, $pass]);
    $row = $select_users->fetch(PDO::FETCH_ASSOC);
    //truy xuất thông tin người dùng từ cơ sở dữ liệu

    if ($select_users->rowCount() > 0) {
        setcookie('user_id', $row['id'], time() + 60 * 60 * 24 * 30, '/');
        header('location:home.php');
    } else {
        $warning_msg[] = 'Incorrect username or password!';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="./assets/images/logotitile.jpg">
    <!-- Reset CSS -->
    <link rel="stylesheet" href="./assets/css/reset.css" />

    <!-- Embed Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;1,100;1,200;1,300;1,400&display=swap"
        rel="stylesheet">

    <!-- Base -->
    <link rel="stylesheet" href="./assets/css/base.css" />

    <!-- Main -->
    <link rel="stylesheet" href="./assets/css/main.css" />

    <!-- Reponsive -->
    <link rel="stylesheet" href="./assets/css/reponsive.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>
    <!-- header section starts-->
    <?php
    include 'components/user_header.php';
    ?>
    <!-- header section ends-->


    <!-- Login section starts  -->

    <section class="form-container">

        <form action="" method="post">
            <h3>Welcome back!</h3>
            <input type="email" name="email" required maxlength="50" placeholder="Enter your email" class="box">
            <input type="password" name="pass" required maxlength="20" placeholder="Eter your password" class="box">
            <p>Don't have an account? <a href="register.php">Register new</a></p>
            <input type="submit" value="login now" name="submit" class="btn">
        </form>

    </section>

    <!-- Login section ends -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- Footer section starts -->
    <?php include 'components/footer.php'; ?>
    <!-- Footer section ends -->
    <script src="./assets/js/script.js"></script>
    <?php include 'components/message.php'; ?>
</body>

</html>