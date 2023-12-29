<?php

include '../components/connect.php';

if (isset($_COOKIE['admin_id'])) {
   $admin_id = $_COOKIE['admin_id'];
} else {
   $admin_id = '';
   header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
    <link rel="stylesheet" href="assets/css/admin_base.css" />

    <!-- Main -->
    <link rel="stylesheet" href="assets/css/admin_main.css" />

    <!-- Reponsive -->
    <link rel="stylesheet" href="assets/css/admin_reponsive.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body>

    <!-- Header section starts  -->
    <?php include '../components/admin_header.php'; ?>
    <!-- Header section ends -->

    <!-- Dashboard section starts  -->

    <section class="dashboard">

        <h1 class="heading">Dashboard</h1>

        <div class="box-container">

            <div class="box">
                <?php
            $select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ? LIMIT 1");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
            ?>
                <h3>Welcome!</h3>
                <p>
                    <?= $fetch_profile['name']; ?>
                </p>
                <a href="update.php" class="btn">Update profile</a>
            </div>

            <div class="box">
                <?php
            $select_listings = $conn->prepare("SELECT * FROM `property`");
            $select_listings->execute();
            $count_listings = $select_listings->rowCount();
            ?>
                <h3>
                    <?= $count_listings; ?>
                </h3>
                <p>property posted</p>
                <a href="listings.php" class="btn">view listings</a>
            </div>

            <div class="box">
                <?php
            $select_users = $conn->prepare("SELECT * FROM `users`");
            $select_users->execute();
            $count_users = $select_users->rowCount();
            ?>
                <h3>
                    <?= $count_users; ?>
                </h3>
                <p>total users</p>
                <a href="users.php" class="btn">View users</a>
            </div>

            <div class="box">
                <?php
            $select_admins = $conn->prepare("SELECT * FROM `admins`");
            $select_admins->execute();
            $count_admins = $select_admins->rowCount();
            ?>
                <h3>
                    <?= $count_admins; ?>
                </h3>
                <p>Total admins</p>
                <a href="admins.php" class="btn">View admins</a>
            </div>

            <div class="box">
                <?php
            $select_messages = $conn->prepare("SELECT * FROM `messages`");
            $select_messages->execute();
            $count_messages = $select_messages->rowCount();
            ?>
                <h3>
                    <?= $count_messages; ?>
                </h3>
                <p>New messages</p>
                <a href="messages.php" class="btn">View messages</a>
            </div>

        </div>

    </section>


    <!-- Dashboard section ends -->



    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="./assets/js/admin_script.js"></script>
    <?php include '../components/message.php'; ?>
</body>

</html>