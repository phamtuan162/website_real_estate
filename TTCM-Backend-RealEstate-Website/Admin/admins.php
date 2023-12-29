<?php

include '../components/connect.php';

if (isset($_COOKIE['admin_id'])) {
    $admin_id = $_COOKIE['admin_id'];
} else {
    $admin_id = '';
    header('location:login.php');
}

if (isset($_POST['delete'])) {
    $allowed_id = 'BcjKNX58e4x7bIqIvxG7';
    $delete_id = $_POST['delete_id'];
    $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

    if ($delete_id == $allowed_id) {
        $warning_msg[] = 'You are not allowed to delete this admin!';
    } else {

        $delete_admin = $conn->prepare("DELETE FROM `admins` WHERE id = ?");
        $delete_admin->execute([$delete_id]);
        $success_msg[] = 'Admin deleted!';
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admins</title>
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

    <!-- Admins section starts  -->

    <section class="grid">

        <h1 class="heading">Admins</h1>

        <form action="" method="POST" class="search-form">
            <input type="text" name="search_box" placeholder="Search admins..." maxlength="100" required>
            <button type="submit" class="fas fa-search" name="search_btn"></button>
        </form>

        <div class="box-container">

            <?php
            if (isset($_POST['search_box']) or isset($_POST['search_btn'])) {
                $search_box = $_POST['search_box'];
                $search_box = filter_var($search_box, FILTER_SANITIZE_STRING);
                $select_admins = $conn->prepare("SELECT * FROM `admins` WHERE name LIKE '%{$search_box}%'");
                $select_admins->execute();
            } else {
                $select_admins = $conn->prepare("SELECT * FROM `admins`");
                $select_admins->execute();
            }
            if ($select_admins->rowCount() > 0) {
                while ($fetch_admins = $select_admins->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <?php if ($fetch_admins['id'] == $admin_id) { ?>
                        <div class="box" style="order: -1;">
                            <p>Name : <span>
                                    <?= $fetch_admins['name']; ?>
                            </p>
                            <?php
                            if ($fetch_admins['id'] == 'BcjKNX58e4x7bIqIvxG7') {
                                echo '<a href="update.php" class="option-btn">Update account</a>';
                                echo ' <a href="register.php" class="btn">Register new</a>';
                            } else {
                                echo '<a href="update.php" class="option-btn">Update account</a>';
                            }
                            ?>

                        </div>
                    <?php } else { ?>
                        <div class="box">
                            <p>Name : <span>
                                    <?= $fetch_admins['name']; ?>
                            </p>
                            <form action="" method="POST">
                                <input type="hidden" name="delete_id" value="<?= $fetch_admins['id']; ?>">
                                <input type="submit" value="delete admin" onclick="return confirm('delete this admin?');"
                                    name="delete" class="delete-btn">
                            </form>
                        </div>
                    <?php } ?>
                    <?php
                }
            } elseif (isset($_POST['search_box']) or isset($_POST['search_btn'])) {
                echo '<p class="empty">no results found!</p>';
            } else {
                ?>
                <p class="empty">No admins added yet!</p>
                <div class="box" style="text-align: center;">
                    <p>Create a new admin</p>
                    <a href="register.php" class="btn">Register now</a>
                </div>
                <?php
            }
            ?>

        </div>

    </section>

    <!-- Admins section ends -->



    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="./assets/js/admin_script.js"></script>
    <?php include '../components/message.php'; ?>
</body>

</html>