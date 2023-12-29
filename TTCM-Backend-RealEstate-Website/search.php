<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
    header('location:login.php');
}

include 'components/save_send.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
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
    <!-- search filter section starts  -->

    <section class="filters" style="padding-bottom: 0;">

        <form action="" method="post">
            <div id="close-filter"><i class="fas fa-times"></i></div>
            <h3>Filter your search</h3>

            <div class="flex">
                <div class="box">
                    <p>Enter location</p>
                    <input type="text" name="location" required maxlength="50" placeholder="Enter ciyt name"
                        class="input">
                </div>
                <div class="box">
                    <p>Offer type</p>
                    <select name="offer" class="input" required>
                        <option value="sale">sale</option>
                        <option value="resale">resale</option>
                        <option value="rent">rent</option>
                    </select>
                </div>
                <div class="box">
                    <p>Property type</p>
                    <select name="type" class="input" required>
                        <option value="flat">flat</option>
                        <option value="house">house</option>
                        <option value="shop">shop</option>
                    </select>
                </div>
                <div class="box">
                    <p>How many BHK</p>
                    <select name="bhk" class="input" required>
                        <option value="1">1 BHK</option>
                        <option value="2">2 BHK</option>
                        <option value="3">3 BHK</option>
                        <option value="4">4 BHK</option>
                        <option value="5">5 BHK</option>
                        <option value="6">6 BHK</option>
                        <option value="7">7 BHK</option>
                        <option value="8">8 BHK</option>
                        <option value="9">9 BHK</option>
                    </select>
                </div>
                <div class="box">
                    <p>Min budget</p>
                    <select name="min" class="input" required>
                        <option value="5000">5k</option>
                        <option value="10000">10k</option>
                        <option value="15000">15k</option>
                        <option value="20000">20k</option>
                        <option value="30000">30k</option>
                        <option value="40000">40k</option>
                        <option value="40000">40k</option>
                        <option value="50000">50k</option>
                        <option value="100000">1 lac</option>
                        <option value="500000">5 lac</option>
                        <option value="1000000">10 lac</option>
                        <option value="2000000">20 lac</option>
                        <option value="3000000">30 lac</option>
                        <option value="4000000">40 lac</option>
                        <option value="4000000">40 lac</option>
                        <option value="5000000">50 lac</option>
                        <option value="6000000">60 lac</option>
                        <option value="7000000">70 lac</option>
                        <option value="8000000">80 lac</option>
                        <option value="9000000">90 lac</option>
                        <option value="10000000">1 Cr</option>
                        <option value="20000000">2 Cr</option>
                        <option value="30000000">3 Cr</option>
                        <option value="40000000">4 Cr</option>
                        <option value="50000000">5 Cr</option>
                        <option value="60000000">6 Cr</option>
                        <option value="70000000">7 Cr</option>
                        <option value="80000000">8 Cr</option>
                        <option value="90000000">9 Cr</option>
                        <option value="100000000">10 Cr</option>
                        <option value="150000000">15 Cr</option>
                        <option value="200000000">20 Cr</option>
                    </select>
                </div>
                <div class="box">
                    <p>Maximum budget</p>
                    <select name="max" class="input" required>
                        <option value="5000">5k</option>
                        <option value="10000">10k</option>
                        <option value="15000">15k</option>
                        <option value="20000">20k</option>
                        <option value="30000">30k</option>
                        <option value="40000">40k</option>
                        <option value="40000">40k</option>
                        <option value="50000">50k</option>
                        <option value="100000">1 lac</option>
                        <option value="500000">5 lac</option>
                        <option value="1000000">10 lac</option>
                        <option value="2000000">20 lac</option>
                        <option value="3000000">30 lac</option>
                        <option value="4000000">40 lac</option>
                        <option value="4000000">40 lac</option>
                        <option value="5000000">50 lac</option>
                        <option value="6000000">60 lac</option>
                        <option value="7000000">70 lac</option>
                        <option value="8000000">80 lac</option>
                        <option value="9000000">90 lac</option>
                        <option value="10000000">1 Cr</option>
                        <option value="20000000">2 Cr</option>
                        <option value="30000000">3 Cr</option>
                        <option value="40000000">4 Cr</option>
                        <option value="50000000">5 Cr</option>
                        <option value="60000000">6 Cr</option>
                        <option value="70000000">7 Cr</option>
                        <option value="80000000">8 Cr</option>
                        <option value="90000000">9 Cr</option>
                        <option value="100000000">10 Cr</option>
                        <option value="150000000">15 Cr</option>
                        <option value="200000000">20 Cr</option>
                    </select>
                </div>
                <div class="box">
                    <p>Status</p>
                    <select name="status" class="input" required>
                        <option value="ready to move">ready to move</option>
                        <option value="under construction">under construction</option>
                    </select>
                </div>
                <div class="box">
                    <p>Furnished</p>
                    <select name="furnished" class="input" required>
                        <option value="unfurnished">unfurnished</option>
                        <option value="furnished">furnished</option>
                        <option value="semi-furnished">semi-furnished</option>
                    </select>
                </div>
            </div>
            <input type="submit" value="search property" name="filter_search" class="btn">
        </form>

    </section>

    <!-- search filter section ends -->

    <div id="filter-btn" class="fas fa-filter"></div>
    <?php
    if (isset($_POST['h_search'])) {

        $h_location = $_POST['h_location'];
        $h_location = filter_var($h_location, FILTER_SANITIZE_STRING);
        $h_type = $_POST['h_type'];
        $h_type = filter_var($h_type, FILTER_SANITIZE_STRING);
        $h_offer = $_POST['h_offer'];
        $h_offer = filter_var($h_offer, FILTER_SANITIZE_STRING);
        $h_min = $_POST['h_min'];
        $h_min = filter_var($h_min, FILTER_SANITIZE_STRING);
        $h_max = $_POST['h_max'];
        $h_max = filter_var($h_max, FILTER_SANITIZE_STRING);

        $select_properties = $conn->prepare("SELECT * FROM `property` WHERE address LIKE '%{$h_location}%' AND type LIKE '%{$h_type}%' AND offer LIKE '%{$h_offer}%' AND price BETWEEN $h_min AND $h_max ORDER BY date DESC");
        $select_properties->execute();

    } elseif (isset($_POST['filter_search'])) {

        $location = $_POST['location'];
        $location = filter_var($location, FILTER_SANITIZE_STRING);
        $type = $_POST['type'];
        $type = filter_var($type, FILTER_SANITIZE_STRING);
        $offer = $_POST['offer'];
        $offer = filter_var($offer, FILTER_SANITIZE_STRING);
        $bhk = $_POST['bhk'];
        $bhk = filter_var($bhk, FILTER_SANITIZE_STRING);
        $min = $_POST['min'];
        $min = filter_var($min, FILTER_SANITIZE_STRING);
        $max = $_POST['max'];
        $max = filter_var($max, FILTER_SANITIZE_STRING);
        $status = $_POST['status'];
        $status = filter_var($status, FILTER_SANITIZE_STRING);
        $furnished = $_POST['furnished'];
        $furnished = filter_var($furnished, FILTER_SANITIZE_STRING);

        $select_properties = $conn->prepare("SELECT * FROM `property` WHERE address LIKE '%{$location}%' AND type LIKE '%{$type}%' AND offer LIKE '%{$offer}%' AND bhk LIKE '%{$bhk}%' AND status LIKE '%{$status}%' AND furnished LIKE '%{$furnished}%' AND price BETWEEN $min AND $max ORDER BY date DESC");
        $select_properties->execute();

    } else {
        $select_properties = $conn->prepare("SELECT * FROM `property` ORDER BY date DESC LIMIT 6");
        $select_properties->execute();
    }
    ?>
    <!-- Listings section starts  -->

    <section class="listings">
        <?php
        if (isset($_POST['h_search']) or isset($_POST['filter_search'])) {
            echo '<h1 class="heading">search results</h1>';
        } else {
            echo '<h1 class="heading">latest listings</h1>';
        }
        ?>

        <div class="box-container">
            <?php
            $total_images = 0;
            if ($select_properties->rowCount() > 0) {
                while ($fetch_property = $select_properties->fetch(PDO::FETCH_ASSOC)) {
                    $select_user = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
                    $select_user->execute([$fetch_property['user_id']]);
                    $fetch_user = $select_user->fetch(PDO::FETCH_ASSOC);

                    if (!empty($fetch_property['image_02'])) {
                        $image_coutn_02 = 1;
                    } else {
                        $image_coutn_02 = 0;
                    }
                    if (!empty($fetch_property['image_03'])) {
                        $image_coutn_03 = 1;
                    } else {
                        $image_coutn_03 = 0;
                    }
                    if (!empty($fetch_property['image_04'])) {
                        $image_coutn_04 = 1;
                    } else {
                        $image_coutn_04 = 0;
                    }
                    if (!empty($fetch_property['image_05'])) {
                        $image_coutn_05 = 1;
                    } else {
                        $image_coutn_05 = 0;
                    }

                    $total_images = (1 + $image_coutn_02 + $image_coutn_03 + $image_coutn_04 + $image_coutn_05);

                    $select_saved = $conn->prepare("SELECT * FROM `saved` WHERE property_id = ? and user_id = ?");
                    $select_saved->execute([$fetch_property['id'], $user_id]);
                    ?>
                    <form action="" method="POST">
                        <div class="box">
                            <input type="hidden" name="property_id" value="<?= $fetch_property['id']; ?>">
                            <?php
                            if ($select_saved->rowCount() > 0) {
                                ?>
                                <button type="submit" name="save" class="save"><i
                                        class="fas fa-heart"></i><span>saved</span></button>
                                <?php
                            } else {
                                ?>
                                <button type="submit" name="save" class="save"><i
                                        class="far fa-heart"></i><span>save</span></button>
                                <?php
                            }
                            ?>

                            <div class="thumb">
                                <p class="total-images"><i class="far fa-image"></i><span>
                                        <?= $total_images; ?>
                                    </span></p>
                                <img src="uploaded_files/<?= $fetch_property['image_01']; ?>" alt="">
                            </div>
                            <div class="admin">
                                <h3>
                                    <?= substr($fetch_user['name'], 0, 1); ?>
                                </h3>
                                <div>
                                    <p>
                                        <?= $fetch_user['name']; ?>
                                    </p>
                                    <span>
                                        <?= $fetch_property['date']; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="box">
                            <div class="price"><i class="fas fa-indian-rupee-sign"></i><span>
                                    <?= $fetch_property['price']; ?>
                                </span></div>
                            <h3 class="name">
                                <?= $fetch_property['property_name']; ?>
                            </h3>
                            <p class="location"><i class="fas fa-map-marker-alt"></i><span>
                                    <?= $fetch_property['address']; ?>
                                </span></p>
                            <div class="flex">
                                <p><i class="fas fa-house"></i><span>
                                        <?= $fetch_property['type']; ?>
                                    </span></p>
                                <p><i class="fas fa-tag"></i><span>
                                        <?= $fetch_property['offer']; ?>
                                    </span></p>
                                <p><i class="fas fa-bed"></i><span>
                                        <?= $fetch_property['bhk']; ?> BHK
                                    </span></p>
                                <p><i class="fas fa-trowel"></i><span>
                                        <?= $fetch_property['status']; ?>
                                    </span></p>
                                <p><i class="fas fa-couch"></i><span>
                                        <?= $fetch_property['furnished']; ?>
                                    </span></p>
                                <p><i class="fas fa-maximize"></i><span>
                                        <?= $fetch_property['carpet']; ?>sqft
                                    </span></p>
                            </div>
                            <div class="flex-btn">
                                <a href="view_property.php?get_id=<?= $fetch_property['id']; ?>" class="btn">View
                                    property</a>
                                <input type="submit" value="send enquiry" name="send" class="btn">
                            </div>
                        </div>
                    </form>
                    <?php
                }
            } else {
                echo '<p class="empty">No results found!</p>';
            }
            ?>

        </div>
    </section>

    <!-- Listings section ends -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- Footer section starts -->
    <?php include 'components/footer.php'; ?>
    <!-- Footer section ends -->
    <script src="./assets/js/script.js"></script>
    <?php include 'components/message.php'; ?>
</body>

</html>