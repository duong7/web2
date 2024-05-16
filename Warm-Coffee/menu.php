<?php

include 'config/config.php';
session_start();

if (isset($_POST['add_to_cart'])) {

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];


    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'") or die('query failed');

    if (mysqli_num_rows($select_cart) > 0) {
    } else {
        mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
    }
};

?>


<?php
if (isset($message)) {
    foreach ($message as $message) {
        echo '<div class="message" onclick="this.remove();">' . $message . '</div>';
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Warm Coffee</title>

    <!-- favicons -->
    <link href="assets/img/warmCoffee_icon.png" rel="icon" />

    <!-- GG font -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css2?family=Amatic+SC:wght@400;700&family=Rubik:wght@300&display=swap"
        rel="stylesheet" />

    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- CSS file -->
    <link rel="stylesheet" href="assets/css/style.css" />


    <style>
    li>.acc::after {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 2px;
        background: #000;
        transform: scale(1);
    }
    </style>
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header">
        <div class="container-header">
            <a href="index.php" class="logo_link">
                <h1>Warm Coffee</h1>
            </a>

            <div class="delivery">
                <img class="delivery-img" src="assets/img/delivery.jpg" alt="" />
                <div class="delivery-info">
                    <h3>Delivery</h3>
                    <span>To: Van Lang Uni</span>
                </div>
                <i class="fa fa-chevron-down arrow"></i>
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="link" href="index.php">Home</a></li>
                    <li><a class="link" href="about.php">About</a></li>
                    <li><a class="link acc" href="menu.php">Menu</a></li>
                    <li><a class="link" href="news.php">News</a></li>
                    <li><a class="link" href="contact.php">Contact</a></li>
                </ul>
            </nav>

            <div class="account">
                <li class="nav-item"><a class="nav-link active" href="mycart.php"><i class="fa fa-shopping-cart" style="font-size: 25px;"></i></a></li>
            </div>
        </div>
    </header>
    <!-- ======= Header ======= -->


    <!-- Main -->
    <main>
        <!-- Menu -->
        <?php 
            include("main/menu.php");
         ?>
        <!-- Menu -->
    </main>
    <!-- Main -->


    <!-- Script -->
    <script src="assets/js/mixitup.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- Script -->


    <!-- Footer -->
    <?php 
            include("main/footer.php");
    ?>
    <!-- Footer -->
</body>

</html>