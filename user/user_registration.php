<?php
include("../includes/connect.php");
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
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $ip = getIPAddress();

    if ($password == $confirm_password) {
        if (preg_match('/^\d{10}$/', $contact)) {

            $select = "SELECT * FROM `users` WHERE username='$username' or email='$email'";
            $result_select = mysqli_query($con, $select);
            $num_select = mysqli_num_rows($result_select);
            if ($num_select == 0) {
                $hash_password = password_hash($password, PASSWORD_DEFAULT);

                move_uploaded_file($image_tmp, "./images/$image");
                $insert = "INSERT INTO `users` (username,email,password,address,mobile,image,ip) values ('$username','$email','$hash_password','$address','$confirm_password'
    ,'$image','$ip')";
                $result = mysqli_query($con, $insert);
                if ($result) {
                    $_SESSION['username'] = $username;

                    echo "<script>alert('thanh cong');</script>";
                    checkCart();
                } else {
                    echo "<script>alert('that bai');</script>";
                }
            } else {
                echo "<script>alert('User Exist');</script>";
            }
        } else {
            echo "<script>alert('Contact not true');</script>";
        }
    } else {
        echo "<script>alert('Wrong Confirm Password');</script>";
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
        echo "<script>alert('You have items in yoiur cart');</script>";
        echo "<script>window.open('../checkout.php','_self')</script>";
    } else {
        echo "<script>window.open('../index.php','_self')</script>";
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
            New User Registration
        </h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter your Username" autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your Email" autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="image" class="form-control" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter your Password" autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Enter Confirm Password" autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" id="address" class="form-control" placeholder="Enter your Address" autocomplete="off" required="required">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" name="contact" id="contact" class="form-control" placeholder="Enter your Contact" autocomplete="off" required="required">
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account?<a href="/user/user_login.php" class="text-danger">
                                Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>