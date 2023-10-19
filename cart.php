<?php
include("./includes/connect.php");
include('./funtions/common_function.php');
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website-Cart Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <!-- Header -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <img src="./images/logo.jpg" alt="logo" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/display_all.php">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./user/user_registration.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">
                                <i class="fa-solid fa-cart-shopping"></i><sup><?php countItemInCart(); ?></sup>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <!-- Second Child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
            <?php
            if (!isset($_SESSION['username'])) {
                echo " 
           <li class='nav-item'>
                <a class='nav-link' href='#'>Welcome Guest</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='./user/user_login.php'>Login</a>
            </li>";
            } else {
                echo " 
                <li class='nav-item'>
                <a class='nav-link' href='#'>Welcome " . $_SESSION['username'] . "</a>
            </li>
                 <li class='nav-item'>
                <a class='nav-link' href='./user/user_logout.php'>Logout</a>
            </li>";
            }
            ?>
        </ul>
    </nav>

    <!-- Third Child -->
    <div class="bg-light">
        <h3 class="text-center">
            Hidden Shop
        </h3>
        <p class="text-center">
            Daya la shpp demo
        </p>
    </div>

    <!-- Four child -->
    <div class="container">
        <div class="row">
            <!-- <form action="" method="post"> -->
            <table class="table table-bodered text-center">

                <tbody>
                    <?php
                    global $con;
                    $ip = getIPAddress();
                    $out = 0;

                    $select = "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
                    $result = mysqli_query($con, $select);
                    $num_result = mysqli_num_rows($result);
                    if ($num_result > 0) {
                        echo " <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th>Change Quantity</th>
                            <th colspan='2'>Operations</th>
                        </tr>
                    </thead>";

                        while ($row = mysqli_fetch_array($result)) {
                            $product_id = $row['product_id'];
                            $selectProduct = "SELECT * FROM `products` WHERE product_id=$product_id";
                            $resultProduct = mysqli_query($con, $selectProduct);


                            while ($row_product_price = mysqli_fetch_array($resultProduct)) {
                                $cart_id = $row['id'];
                                $product_price = array($row_product_price['product_price']);
                                $price = $row_product_price['product_price'];
                                $title = $row_product_price['product_title'];
                                $image1 = $row_product_price['product_image1'];
                                $real_quantity = $row['quantity'];
                                $value = array_sum($product_price);

                    ?>
                    <tr>
                        <form action="" method="post">
                            <td><?php echo $title; ?></td>
                            <td><img src='../admin/product_images/<?php echo $image1; ?>' class='card_img'></td>
                            <td><?php echo $real_quantity; ?></td>
                            <td><?php echo $price; ?></td>

                            <td><?php echo $price * $real_quantity; ?>/--</td>
                            <td><input type='text' name='qty' class='form-input w-50'></td>
                            <input type='hidden' name='id' value='<?php echo $cart_id; ?>'>
                            <?php
                                        if ($out == 0) {
                                            if (isset($_POST['update_cart'])) {
                                                $quantity = $_POST['qty'];
                                                $id = $_POST['id'];
                                                if (!is_numeric($quantity) || $quantity < 1) {
                                                    echo "<script>alert('Số lượng không hợp lệ. Vui lòng nhập số lớn hơn hoặc bằng 1.')</script>";
                                                    $out = 1;
                                                } else {
                                                    $update = "UPDATE `cart_details` SET `quantity`=$quantity WHERE `id`=$id";
                                                    $result_update = mysqli_query($con, $update);
                                                    $total = $total * $quantity;
                                                    $out = 1;
                                                    echo "<script>window.open('cart.php','_self')</script>";
                                                }
                                            }
                                            if (isset($_POST['delete_cart'])) {
                                                $id = $_POST['id'];
                                                $update = "DELETE FROM `cart_details` WHERE `id`=$id";
                                                $result_update = mysqli_query($con, $update);
                                                echo "<script>alert('Thanh cong')</script>";

                                                $out = 1;
                                                echo "<script>window.open('cart.php','_self')</script>";
                                            }
                                        }
                                        ?>

                            <td>

                                <input type='submit' value='Update Cart' class='bg-info px-3 border-0 mx-3 py-2'
                                    name='update_cart'>
                                <button class='bg-info px-3 border-0 mx-3 py-2' name='delete_cart'>
                                    Remove</button>
                            </td>
                        </form>
                    </tr>
                    <?php

                            }
                        }
                    } else {
                        echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                    }
                    ?>
                </tbody>
            </table>
            <div class='d-flex mb-5'>
                <?php
                global $con;
                $ip = getIPAddress();
                $out = 0;

                $select = "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
                $result = mysqli_query($con, $select);
                $num_result = mysqli_num_rows($result);

                if ($num_result > 0) {
                    echo    "
                <h4 class='px-3'>
                    Subtotal: <strong class='text-info'>" . totalPricetItemInCart() . " /--</strong>
                </h4>
                <a href='index.php'>
                    <button class='bg-info px-3 border-0 mx-3 py-2'>
                        Continue Shopping
                    </button>
                </a>
                <a href='checkout.php'>
                    <button class='bg-secondary p-3 py-2 border-0 text-light'>
                        Checkout
                    </button>
                </a>
                ";
                } else {
                    echo "
                <a href='index.php'>
                    <button class='bg-info px-3 border-0 mx-3 py-2'>
                        Continue Shopping
                    </button>
                </a>

                ";
                }
                ?>
            </div>
        </div>
    </div>
    <!-- </form> -->
    <!-- Footer -->
    <!-- <div class="bg-info p-3 text-center">
        <p> đây là foôter</p>
    </div> -->
    <?php
    include('./includes/footer.php');
    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">

    </script>
</body>

</html>