<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
   $user_id = $_COOKIE['user_id'];
} else {
   $user_id = '';
   header('location:login.php');
}

$select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ? LIMIT 1");
$select_user->execute([$user_id]);
$fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['submit'])) {

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $number = $_POST['number'];
   $number = filter_var($number, FILTER_SANITIZE_STRING);
   $email = $_POST['email'];
   $email = filter_var($email, FILTER_SANITIZE_STRING);

   if (!empty($name)) {
      $update_name = $conn->prepare("UPDATE `users` SET name = ? WHERE id = ?");
      $update_name->execute([$name, $user_id]);
      $success_msg[] = 'Name updated!';
   }

   if (!empty($email)) {
      $verify_email = $conn->prepare("SELECT email FROM `users` WHERE email = ?");
      $verify_email->execute([$email]);
      if ($verify_email->rowCount() > 0) {
         $warning_msg[] = 'Email already taken!';
      } else {
         $update_email = $conn->prepare("UPDATE `users` SET email = ? WHERE id = ?");
         $update_email->execute([$email, $user_id]);
         $success_msg[] = 'Email updated!';
      }
   }

   if (!empty($number)) {
      $verify_number = $conn->prepare("SELECT number FROM `users` WHERE number = ?");
      $verify_number->execute([$number]);
      if ($verify_number->rowCount() > 0) {
         $warning_msg[] = 'Number already taken!';
      } else {
         $update_number = $conn->prepare("UPDATE `users` SET number = ? WHERE id = ?");
         $update_number->execute([$number, $user_id]);
         $success_msg[] = 'Number updated!';
      }
   }

   $empty_pass = 'da39a3ee5e6b4b0d3255bfef95601890afd80709'; // chuỗi rỗng ->  sử dụng hàm băm SHA-1
   $prev_pass = $fetch_user['password'];
   $old_pass = sha1($_POST['old_pass']);
   $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
   $new_pass = sha1($_POST['new_pass']);
   $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
   $c_pass = sha1($_POST['c_pass']);
   $c_pass = filter_var($c_pass, FILTER_SANITIZE_STRING);

   if ($old_pass != $empty_pass) {
      if ($old_pass != $prev_pass) {
         $warning_msg[] = 'Old password not matched!';
      } elseif ($new_pass != $c_pass) {
         $warning_msg[] = 'Confirm passowrd not matched!';
      } else {
         if ($new_pass != $empty_pass) {
            $update_pass = $conn->prepare("UPDATE `users` SET password = ? WHERE id = ?");
            $update_pass->execute([$c_pass, $user_id]);
            $success_msg[] = 'Password updated successfully!';
         } else {
            $warning_msg[] = 'Please enter new password!';
         }
      }
   }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Update profile</title>
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
   <!-- Jeader section starts-->
   <?php include 'components/user_header.php'; ?>
   <!-- Header section ends-->

   <!-- Update section starts -->
   <section class="form-container">

      <form action="" method="post">
         <h3>Update your account!</h3>
         <input type="tel" name="name" maxlength="50" placeholder="<?= $fetch_user['name']; ?>" class="box">
         <input type="email" name="email" maxlength="50" placeholder="<?= $fetch_user['email']; ?>" class="box">
         <input type="number" name="number" min="0" max="9999999999" maxlength="10"
            placeholder="<?= $fetch_user['number']; ?>" class="box">
         <input type="password" name="old_pass" maxlength="20" placeholder="Enter your old password" class="box">
         <input type="password" name="new_pass" maxlength="20" placeholder="Enter your new password" class="box">
         <input type="password" name="c_pass" maxlength="20" placeholder="Confirm your new password" class="box">
         <input type="submit" value="update now" name="submit" class="btn">
      </form>

   </section>
   <!-- Update section ends -->



   <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
   <!-- Footer section starts -->
   <?php include 'components/footer.php'; ?>
   <!-- Footer section ends -->
   <script src="./assets/js/script.js"></script>
   <?php include 'components/message.php'; ?>
</body>

</html>