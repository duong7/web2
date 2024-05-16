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

    input[type="text"],
    input[type="email"],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    input[type="submit"] {
        width: 100%;
        background-color: #f3d5b5;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: medium;
    }

    input[type="submit"]:hover {
        background-color: #e2c7ab;
    }

    .form-contact {
        border-radius: 5px;
        background-color: white;
        padding: 20px;
    }

    textarea {
        width: 100%;
        height: 150px;
        padding: 12px 20px;
        margin: 8px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 15px;
        resize: none;
        font-family: "Rubik", sans-serif;
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
                    <li><a class="link" href="menu.php">Menu</a></li>
                    <li><a class="link" href="news.php">News</a></li>
                    <li><a class="link acc" href="contact.php">Contact</a></li>
                </ul>
            </nav>

            <div class="account">
                <li class="nav-item"><a class="nav-link active" href="mycart.php"><i class="fa fa-shopping-cart" style="font-size: 25px;"></i></a></li>
            </div>
        </div>
    </header>
    <!-- ======= Header ======= -->


    <!-- Main -->
        <?php
         include("main/contact.php")
        ?>
    <!-- Main -->


    <!-- Footer -->
        <?php
            include('main/footer.php')
        ?>
    <!-- Footer -->
</body>

</html>