<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
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

    <!-- Dashboard section starts -->

    <section class="dashboard">

        <h1 class="heading">Dashboard</h1>

        <div class="box-container">

            <div class="box">
                <?php
                $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ? LIMIT 1");
                $select_profile->execute([$user_id]);
                $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
                ?>
                <h3>Welcome!</h3>
                <p>
                    <?= $fetch_profile['name']; ?>
                </p>
                <a href="update.php" class="btn">Update profile</a>
            </div>

            <div class="box">
                <h3>Filter search</h3>
                <p>Search your dream property</p>
                <a href="search.php" class="btn">Search now</a>
            </div>

            <div class="box">
                <?php
                $count_properties = $conn->prepare("SELECT * FROM `property` WHERE user_id = ?");
                $count_properties->execute([$user_id]);
                $total_properties = $count_properties->rowCount();
                ?>
                <h3>
                    <?= $total_properties; ?>
                </h3>
                <p>Properties listed</p>
                <a href="my_listings.php" class="btn">View all listings</a>
            </div>

            <div class="box">
                <?php
                $count_requests_received = $conn->prepare("SELECT * FROM `requests` WHERE receiver = ?");
                $count_requests_received->execute([$user_id]);
                $total_requests_received = $count_requests_received->rowCount();
                ?>
                <h3>
                    <?= $total_requests_received; ?>
                </h3>
                <p>Requests received</p>
                <a href="requests.php" class="btn">View all requests</a>
            </div>

            <div class="box">
                <?php
                $count_requests_sent = $conn->prepare("SELECT * FROM `requests` WHERE sender = ?");
                $count_requests_sent->execute([$user_id]);
                $total_requests_sent = $count_requests_sent->rowCount();
                ?>
                <h3>
                    <?= $total_requests_sent; ?>
                </h3>
                <p>Requests sent</p>
                <a href="requests_sender.php" class="btn">View all requests</a>
            </div>

            <div class="box">
                <?php
                $count_saved_properties = $conn->prepare("SELECT * FROM `saved` WHERE user_id = ?");
                $count_saved_properties->execute([$user_id]);
                $total_saved_properties = $count_saved_properties->rowCount();
                ?>
                <h3>
                    <?= $total_saved_properties; ?>
                </h3>
                <p>Properties saved</p>
                <a href="saved.php" class="btn">View saved properties</a>
            </div>

        </div>

    </section>
    <!-- Dashboard section ends -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- Footer section starts -->
    <?php include 'components/footer.php'; ?>
    <!-- Footer section ends -->
    <script src="./assets/js/script.js"></script>
    <?php include 'components/message.php'; ?>
</body>

</html>