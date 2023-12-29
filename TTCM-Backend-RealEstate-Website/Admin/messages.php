<?php

include '../components/connect.php';

if (isset($_COOKIE['admin_id'])) {
   $admin_id = $_COOKIE['admin_id'];
} else {
   $admin_id = '';
   header('location:login.php');
}
if (isset($_POST['delete'])) {

   $delete_id = $_POST['delete_id'];
   $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

   $verify_delete = $conn->prepare("SELECT * FROM `messages` WHERE id = ?");
   $verify_delete->execute([$delete_id]);

   if ($verify_delete->rowCount() > 0) {
      $delete_bookings = $conn->prepare("DELETE FROM `messages` WHERE id = ?");
      $delete_bookings->execute([$delete_id]);
      $success_msg[] = 'Message deleted!';
   } else {
      $warning_msg[] = 'Message deleted already!';
   }

}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
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

    <!-- Messages section starts  -->

    <section class="grid">

        <h1 class="heading">Messages</h1>

        <form action="" method="POST" class="search-form">
            <input type="text" name="search_box" placeholder="Search messages..." maxlength="100" required>
            <button type="submit" class="fas fa-search" name="search_btn"></button>
        </form>

        <div class="box-container">

            <?php
         if (isset($_POST['search_box']) or isset($_POST['search_btn'])) {
            $search_box = $_POST['search_box'];
            $search_box = filter_var($search_box, FILTER_SANITIZE_STRING);
            $select_messages = $conn->prepare("SELECT * FROM `messages` WHERE name LIKE '%{$search_box}%' OR number LIKE '%{$search_box}%' OR email LIKE '%{$search_box}%'");
            $select_messages->execute();
         } else {
            $select_messages = $conn->prepare("SELECT * FROM `messages`");
            $select_messages->execute();
         }
         if ($select_messages->rowCount() > 0) {
            while ($fetch_messages = $select_messages->fetch(PDO::FETCH_ASSOC)) {
               ?>
            <div class="box">
                <p>Name : <span>
                        <?= $fetch_messages['name']; ?>
                    </span></p>
                <p>Email : <a href="mailto:<?= $fetch_messages['email']; ?>"><?= $fetch_messages['email']; ?></a></p>
                <p>Number : <a href="tel:<?= $fetch_messages['number']; ?>"><?= $fetch_messages['number']; ?></a></p>
                <p>Message : <span>
                        <?= $fetch_messages['message']; ?>
                    </span></p>
                <form action="" method="POST">
                    <input type="hidden" name="delete_id" value="<?= $fetch_messages['id']; ?>">
                    <input type="submit" value="delete message" onclick="return confirm('delete this message?');"
                        name="delete" class="delete-btn">
                </form>
            </div>
            <?php
            }
         } elseif (isset($_POST['search_box']) or isset($_POST['search_btn'])) {
            echo '<p class="empty">results not found!</p>';
         } else {
            echo '<p class="empty">you have no messages!</p>';
         }
         ?>

        </div>

    </section>

    <!-- Messages section ends -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="./assets/js/admin_script.js"></script>
    <?php include '../components/message.php'; ?>
</body>

</html>