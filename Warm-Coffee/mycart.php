<?php
// include 'menu.php';
include 'config/config.php';
session_start();
?>

<?php
if (isset($_POST['update_cart'])) {
    $update_quantity = $_POST['cart_quantity'];
    $update_id = $_POST['cart_id'];
    mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_quantity' WHERE id = '$update_id'") or die('query failed');
}


if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
    header('location:mycart.php');
}


if (isset($_GET['delete_all'])) {
    mysqli_query($conn, "DELETE FROM `cart`") or die('query failed');
    header('location:mycart.php');
}



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
    .shopping-cart {
        padding: 20px 0;
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
    }

    .shopping-cart table {
        width: 100%;
        text-align: center;
        border: 2px solid black;
        border-radius: 5px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        background-color: white;
    }

    .shopping-cart table thead {
        background-color: black;
    }

    .shopping-cart table thead th {
        padding: 10px;
        color: white;
        text-transform: capitalize;
        font-size: 20px;
    }

    .shopping-cart table .table-bottom {
        background-color: #eee;
    }

    .shopping-cart table tr td {
        padding: 10px;
        font-size: 20px;
        color: black;
    }

    .shopping-cart table tr td:nth-child(1) {
        padding: 0;
    }

    .shopping-cart table tr td input[type="number"] {
        width: 80px;
        border: 2px solid black;
        padding: 12px 14px;
        font-size: 20px;
        color: black;
    }

    .shopping-cart {
        margin-top: 10px;
        text-align: center;
    }

    .shopping-cart .disabled {
        pointer-events: none;
        border-radius: 5px;
        background-color: gray;
        opacity: 0.5;
        user-select: none;
        padding: 3px 5px;
    }

    .delete-btn {
        display: inline-block;
        padding: 10px 30px;
        cursor: pointer;
        font-size: 15px;
        color: white;
        border-radius: 5px;
        text-transform: capitalize;
    }

    .delete-btn:hover {
        background-color: black;
    }

    .delete-btn {
        background-color: red;
    }

    td {
        border-bottom: 2px solid black;
    }

    .table-bottom {
        background: gainsboro;
    }

    .cart-btn {
        width: 200px;
        margin-top: 30px;
        text-align: center;
        border-radius: 10px;

    }

    .btn:hover {
        background-color: #f0bc85;
    }

    .btn {
        display: inline-block;
        padding: 10px 30px;
        background-color: #f3d5b5;
        cursor: pointer;
        font-size: 18px;
        border-radius: 5px;
        text-transform: capitalize;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
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
                    <li><a class="link" href="contact.php">Contact</a></li>
                </ul>
            </nav>

            <div class="account">
                <li class="nav-item"><a class="nav-link active" href="mycart.php">
                    <i class="fa fa-shopping-cart" style="font-size: 25px;"></i></a></li>
            </div>
        </div>
    </header>
    <!-- ======= Header ======= -->

    <!-- Main -->
    <section class="cover">
        <div class="container">
            <div class="section-header">
                <h2>My Cart</h2>
                <p>
                    payment now
                    <span>WarmCoffee</span>
                </p>
            </div>

            <div class="shopping-cart">
                <table>
                    <thead>
                        <th>image</th>
                        <th>name</th>
                        <th>price</th>
                        <th>quantity</th>
                        <th>total</th>
                        <th>action</th>
                    </thead>
                    <tbody>
                        <?php
                        $grand_total = 0;
                        $cart_query = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
                        if (mysqli_num_rows($cart_query) > 0) {
                            while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
                        ?>
                        <tr>
                            <td><img src="assets/img/<?php echo $fetch_cart['image']; ?>" height="100" alt=""></td>
                            <td style="text-transform: capitalize;"><?php echo $fetch_cart['name']; ?></td>
                            <td><?php echo $fetch_cart['price']; ?></td>
                            <td>
                                <form action="" method="post">
                                    <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['id']; ?>">
                                    <input type="number" min="1" name="cart_quantity"
                                        value="<?php echo $fetch_cart['quantity']; ?>">
                                    <input style="width: 100px;" type="submit" name="update_cart" value="Update"
                                        class="option-btn">
                                </form>
                            </td>
                            <td><?php echo $sub_total = number_format($fetch_cart['price'] * $fetch_cart['quantity']); ?>.000đ
                            </td>
                            <td><a href="mycart.php?remove=<?php echo $fetch_cart['id']; ?>" class="delete-btn"
                                    onclick="return confirm('Remove item from cart?')">remove</a></td>
                        </tr>
                        <?php
                                $grand_total += $sub_total;
                            }
                        } else {
                            echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">No item added</td></tr>';
                        }
                        ?>

                        <tr class="table-bottom">
                            <td style="border: 0;" colspan="4">Grand total : </td>
                            <td style="border: 0;"><?php echo $grand_total; ?>.000đ</td>
                            <td style="border: 0;"><a href="mycart.php?delete_all"
                                    onclick="return confirm('Delete all from cart?');"
                                    class="delete-btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">delete
                                    all</a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="cart-btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">
                    <a href="#" class="btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">PAY NOW</a>
                </div>

            </div>


        </div>

    </section>
    <!-- Main -->


    <!-- Footer -->
    <?php
        include("main/footer.php")
    ?>
    <!-- Footer -->
</body>

</html>