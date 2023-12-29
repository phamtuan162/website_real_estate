<?php

include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}

if (isset($_POST['send'])) {

    $msg_id = create_unique_id();
    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $number = $_POST['number'];
    $number = filter_var($number, FILTER_SANITIZE_STRING);
    $message = $_POST['message'];
    $message = filter_var($message, FILTER_SANITIZE_STRING);

    $verify_contact = $conn->prepare("SELECT * FROM `messages` WHERE name = ? AND email = ? AND number = ? AND message = ?");
    $verify_contact->execute([$name, $email, $number, $message]);

    if ($verify_contact->rowCount() > 0) {
        $warning_msg[] = 'message sent already!';
    } else {
        $send_message = $conn->prepare("INSERT INTO `messages`(id, name, email, number, message) VALUES(?,?,?,?,?)");
        $send_message->execute([$msg_id, $name, $email, $number, $message]);
        $success_msg[] = 'message send successfully!';
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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

    <!-- Contact section starts  -->

    <section class="contact">

        <div class="row">
            <div class="image">
                <img src="./assets/images/contact-img.svg" alt="">
            </div>
            <form action="" method="post">
                <h3>Get in touch</h3>
                <input type="text" name="name" required maxlength="50" placeholder="enter your name" class="box">
                <input type="email" name="email" required maxlength="50" placeholder="enter your email" class="box">
                <input type="number" name="number" required maxlength="10" max="9999999999" min="0"
                    placeholder="enter your number" class="box">
                <textarea name="message" placeholder="enter your message" required maxlength="1000" cols="30" rows="10"
                    class="box"></textarea>
                <input type="submit" value="send message" name="send" class="btn">
            </form>
        </div>

    </section>

    <!-- Contact section ends -->

    <!-- Faq section starts  -->

    <section class="faq" id="faq">

        <h1 class="heading">FAQ</h1>

        <div class="box-container">

            <div class="box ">
                <h3><span>How to cancel booking?</span><i class="fas fa-angle-down"></i></h3>
                <p>
                    <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur quasi doloremque nostrum
                        debitis eos reiciendis esse magnam quos quas modi minima iure mollitia voluptates obcaecati,
                        praesentium fugiat ea eius similique corporis odit nobis laborum. Accusantium perspiciatis
                        voluptatum magni error? Accusamus laboriosam corporis aspernatur odio dignissimos modi delectus
                        omnis esse vel. Impedit quibusdam perferendis quia amet laudantium delectus doloribus
                        exercitationem explicabo ex autem, dolorum facere expedita aliquid ipsum. Nostrum, cupiditate
                        eligendi quis at nisi ipsum itaque repudiandae, quia error rem asperiores nesciunt, et non
                        voluptatibus reiciendis. Aliquid, esse necessitatibus autem aliquam porro libero est ex numquam,
                        vel ea, illo quibusdam laudantium!
                    </span>
                </p>
            </div>

            <div class="box">
                <h3><span>When will I get the possession?</span><i class="fas fa-angle-down"></i></h3>
                <p>
                    <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis excepturi assumenda nihil
                        laudantium tempora eligendi itaque repudiandae voluptatibus dolore fuga esse nobis pariatur
                        eaque culpa ex alias, magni corrupti vel blanditiis, natus illum cupiditate ea. Provident
                        commodi quod molestias quasi?
                    </span>
                </p>
            </div>

            <div class="box">
                <h3><span>Where can I pay the rent?</span><i class="fas fa-angle-down"></i></h3>
                <p>
                    <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. In, veritatis. Atque voluptatem iste
                        debitis fuga veniam nostrum unde, praesentium perspiciatis, asperiores maxime molestias autem
                        placeat. Iste ut, similique autem doloribus corrupti doloremque maxime sequi beatae, ipsa
                        obcaecati tenetur eos architecto!
                    </span>
                </p>
            </div>

            <div class="box">
                <h3><span>How to contact with the buyers?</span><i class="fas fa-angle-down"></i></h3>
                <p>
                    <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic nulla omnis ad, optio doloribus
                        et quia similique veritatis rerum non ipsum, unde magni quam? Pariatur eum recusandae nesciunt
                        sed at voluptatum, harum, fugiat incidunt eaque adipisci repudiandae aut atque. Fugiat
                        praesentium delectus adipisci quod, aliquid aut nulla iste repellat! Distinctio dolorum quas
                        maiores architecto minus quod rerum, porro repudiandae culpa excepturi, quaerat quisquam nostrum
                        accusamus tempora, reiciendis voluptatem delectus. Alias.
                    </span>
                </p>
            </div>

            <div class="box">
                <h3><span>Why my listing not showing up?</span><i class="fas fa-angle-down"></i></h3>
                <p>
                    <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta laudantium, temporibus
                        reiciendis minus quo repellendus odio earum incidunt similique amet tenetur facilis nisi sunt
                        dolorum, laboriosam consectetur consequuntur quaerat? Unde, suscipit. Soluta provident aliquam
                        est iusto, eius dolorem? Adipisci, fugit commodi? Eum quaerat non sapiente suscipit nesciunt
                        repellat architecto dignissimos, sequi natus nisi unde quia aliquam labore tenetur minus
                        voluptatum iusto veniam eveniet eius. Commodi temporibus eveniet repudiandae magni quia.
                        Molestiae a ea, dolores sint veritatis velit ad neque ex pariatur soluta minima. Dolorem iusto,
                        maiores provident natus rem optio?
                    </span>
                </p>
            </div>

            <div class="box">
                <h3><span>How to promote my listing?</span><i class="fas fa-angle-down"></i></h3>
                <p>
                    <span>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni ea doloremque possimus
                        dignissimos aut consequatur eius molestiae enim qui ab sint, architecto similique sit modi
                        consequuntur tempora officiis perferendis eum? Natus tenetur possimus, optio, consequuntur animi
                        sunt ipsum, aperiam nihil harum autem corporis aut. Rerum et corrupti natus, dolores quasi
                        numquam iusto voluptatibus amet nisi ratione nostrum quidem perspiciatis architecto quaerat, at
                        itaque. Iure porro ex quaerat natus magni, veniam recusandae, totam labore laudantium cumque
                        deserunt fuga veritatis molestias quisquam, ratione accusamus! Pariatur similique, tempore
                        exercitationem quae aspernatur inventore laborum dolores debitis facere commodi, nam blanditiis?
                        Minima voluptatibus quaerat similique quisquam sunt fugiat. Libero sint expedita beatae officiis
                        odit veniam soluta nihil aliquid iure incidunt saepe rerum ipsa tempora, omnis nam aliquam
                        placeat nostrum, quos voluptates! Architecto cumque corrupti aliquid praesentium atque similique
                        ipsa necessitatibus rerum, sed error in iusto cum a aperiam eveniet fugit sequi illum
                        consectetur modi eius impedit vel deleniti. Dolorem quas voluptas minima modi inventore est
                        molestiae animi asperiores rerum ex, eius eos, recusandae obcaecati assumenda quod dolorum fuga
                        nulla sapiente dicta. Consectetur similique quisquam inventore expedita impedit quibusdam
                        reiciendis cumque, quaerat asperiores excepturi rem iure minus eveniet. Velit molestiae tenetur
                        quidem sint dolor quos beatae.
                    </span>
                </p>
            </div>

        </div>

    </section>

    <!-- Faq section ends -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- Footer section starts -->
    <?php include 'components/footer.php'; ?>
    <!-- Footer section ends -->
    <script src="./assets/js/script.js"></script>
    <?php include 'components/message.php'; ?>
</body>

</html>