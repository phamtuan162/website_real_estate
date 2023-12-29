<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
    header('location:login.php');
}
if (isset($_POST['delete'])) {

    $delete_id = $_POST['request_id'];
    $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

    $verify_delete = $conn->prepare("SELECT * FROM `requests` WHERE id = ?");
    $verify_delete->execute([$delete_id]);

    if ($verify_delete->rowCount() > 0) {
        $delete_request = $conn->prepare("DELETE FROM `requests` WHERE id = ?");
        $delete_request->execute([$delete_id]);
        $success_msg[] = 'request deleted successfully!';
    } else {
        $warning_msg[] = 'request deleted already!';
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requests</title>
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

    <!-- Requests section starts-->
    <section class="requests">

        <h1 class="heading">All requests</h1>

        <div class="box-container">
            <?php
            $select_requests = $conn->prepare("SELECT * FROM `requests` WHERE receiver = ?");
            $select_requests->execute([$user_id]);
            if ($select_requests->rowCount() > 0) {
                while ($fetch_request = $select_requests->fetch(PDO::FETCH_ASSOC)) {

                    $select_sender = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                    $select_sender->execute([$fetch_request['sender']]);
                    $fetch_sender = $select_sender->fetch(PDO::FETCH_ASSOC);

                    $select_property = $conn->prepare("SELECT * FROM `property` WHERE id = ?");
                    $select_property->execute([$fetch_request['property_id']]);
                    $fetch_property = $select_property->fetch(PDO::FETCH_ASSOC);

                    ?>
                    <div class="box">
                        <p>Name : <span>
                                <?= $fetch_sender['name']; ?>
                            </span></p>
                        <p>Number : <a href="tel:<?= $fetch_sender['number']; ?>"><?= $fetch_sender['number']; ?></a></p>
                        <p>Email : <a href="mailto:<?= $fetch_sender['email']; ?>"><?= $fetch_sender['email']; ?></a></p>
                        <p>Enquiry for : <span>
                                <?= $fetch_property['property_name']; ?>
                            </span></p>
                        <form action="" method="POST">
                            <input type="hidden" name="request_id" value="<?= $fetch_request['id']; ?>">
                            <input type="submit" value="delete request" class="btn"
                                onclick="return confirm('remove this request?');" name="delete">
                            <a href="view_property.php?get_id=<?= $fetch_property['id']; ?>" class="btn">View property</a>
                        </form>
                    </div>
                    <?php
                }
            } else {
                echo '<p class="empty">you have no requests!</p>';
            }
            ?>


        </div>

    </section>

    <!-- Requets section ends-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- Footer section starts -->
    <?php include 'components/footer.php'; ?>
    <!-- Footer section ends -->
    <script src="./assets/js/script.js"></script>
    <?php include 'components/message.php'; ?>
</body>

</html>