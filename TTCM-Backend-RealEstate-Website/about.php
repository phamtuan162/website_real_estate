<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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
    <!-- About section starts  -->

    <section class="about">

        <div class="row">
            <div class="image">
                <img src="assets/images/about-img.svg" alt="">
            </div>
            <div class="content">
                <h3>Why choose us?</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum dolorem provident voluptatum
                    distinctio laborum veritatis vitae suscipit praesentium fugiat unde?</p>
                <a href="contact.php" class="inline-btn">Contact us</a>
            </div>
        </div>

    </section>

    <!-- About section ends -->

    <!-- Steps section starts  -->

    <section class="steps">

        <h1 class="heading">3 simple steps</h1>

        <div class="box-container">

            <div class="box">
                <img src="assets/images/step-1.png" alt="">
                <h3>Search property</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, placeat.</p>
            </div>

            <div class="box">
                <img src="assets/images/step-2.png" alt="">
                <h3>Contact agents</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, placeat.</p>
            </div>

            <div class="box">
                <img src="assets/images/step-3.png" alt="">
                <h3>Enjoy property</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni, placeat.</p>
            </div>

        </div>

    </section>

    <!-- Steps section ends -->

    <!-- Review section starts  -->

    <section class="reviews">

        <h1 class="heading">Client's reviews</h1>

        <div class="box-container">

            <div class="box">
                <div class="user">
                    <img src="assets/images/pic-1.png" alt="">
                    <div>
                        <h3>Mr.Đức</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci voluptates delectus distinctio
                    quam sequi error eum suscipit tempore inventore ex!</p>
            </div>

            <div class="box">
                <div class="user">
                    <img src="assets/images/pic-2.png" alt="">
                    <div>
                        <h3>Mr.My</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci voluptates delectus distinctio
                    quam sequi error eum suscipit tempore inventore ex!</p>
            </div>

            <div class="box">
                <div class="user">
                    <img src="assets/images/pic-3.png" alt="">
                    <div>
                        <h3>Mr.Vũ</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci voluptates delectus distinctio
                    quam sequi error eum suscipit tempore inventore ex!</p>
            </div>

            <div class="box">
                <div class="user">
                    <img src="assets/images/pic-4.png" alt="">
                    <div>
                        <h3>Mr.Quyên</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci voluptates delectus distinctio
                    quam sequi error eum suscipit tempore inventore ex!</p>
            </div>

            <div class="box">
                <div class="user">
                    <img src="assets/images/pic-5.png" alt="">
                    <div>
                        <h3>Mr.Minh</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci voluptates delectus distinctio
                    quam sequi error eum suscipit tempore inventore ex!</p>
            </div>

            <div class="box">
                <div class="user">
                    <img src="assets/images/pic-6.png" alt="">
                    <div>
                        <h3>Ms.Mai Anh</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                </div>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Adipisci voluptates delectus distinctio
                    quam sequi error eum suscipit tempore inventore ex!</p>
            </div>

        </div>

    </section>

    <!-- Review section ends -->


    <!-- Footer section starts -->
    <?php include 'components/footer.php'; ?>
    <!-- Footer section ends -->
    <script src="./assets/js/script.js"></script>
</body>

</html>