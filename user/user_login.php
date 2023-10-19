<?php
include_once("../includes/connect.php");
session_start();
function getIPAddress()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']) && filter_var($_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']) && filter_var($_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (!empty($_SERVER['REMOTE_ADDR']) && filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP)) {
        return $_SERVER['REMOTE_ADDR'];
    } else {
        return 'Unknown';
    }
}
function checkCart()
{
    global $con;
    $ip = getIPAddress();

    $select_cart_items = "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
    $result_select_cart = mysqli_query($con, $select_cart_items);
    $num_result_select_cart = mysqli_num_rows($result_select_cart);
    if ($num_result_select_cart > 0) {
        echo "<script>alert('Login Successfull');</script>";
        echo "<script>window.open('../payment.php','_self')</script>";
    } else {
        echo "<script>alert('Login Successfull');</script>";
        echo "<script>window.open('./profile.php','_self')</script>";
    }
}
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $select = "SELECT * FROM `users` WHERE username='$username' ";
    $result_select = mysqli_query($con, $select);
    $num_select = mysqli_num_rows($result_select);
    $row_data_select = mysqli_fetch_assoc($result_select);
    if ($num_select > 0) {
        if (password_verify($password, $row_data_select['password'])) {
            $_SESSION['username'] = $username;
            checkCart();
        } else {
            echo "<script>alert('Invalid Credetials');</script>";
        }
    } else {
        echo "<script>alert('Invalid Credetials');</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css" />
</head>

<body>

    <div class="container-fluid my-3">
        <h2 class="text-center mb-4">
            User Login
        </h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter your Username" autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your Password" autocomplete="off" required="required">
                    </div>

                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Dont have an account?<a href="/user/user_registration.php" class="text-danger">
                                Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>