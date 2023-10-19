<?php
include("./includes/connect.php");
function getProduct()
{
    global $con;
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select = "SELECT * FROM `products` ORDER by rand() LIMIT 0,3";
            $result = mysqli_query($con, $select);
            while ($row_data = mysqli_fetch_assoc($result)) {
                $product_id = $row_data['product_id'];
                $product_image1 = $row_data['product_image1'];
                $product_title = $row_data['product_title'];
                $product_description = $row_data['product_description'];
                $product_price = $row_data['product_price'];


                echo  " <div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin/product_images/$product_image1' class='card-img-top ' alt='$product_image1'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price : $product_price/--</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add To Card</a>
                <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>
            </div>
        </div>
    </div>";
            }
        }
    }
}

function getAllProduct()
{
    global $con;
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select = "SELECT * FROM `products` ORDER by rand()";
            $result = mysqli_query($con, $select);
            while ($row_data = mysqli_fetch_assoc($result)) {
                $product_id = $row_data['product_id'];

                $product_image1 = $row_data['product_image1'];
                $product_title = $row_data['product_title'];
                $product_description = $row_data['product_description'];
                $product_price = $row_data['product_price'];


                echo  " <div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin/product_images/$product_image1' class='card-img-top ' alt='$product_image1'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price : $product_price/--</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add To Card</a>

                <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>

            </div>
        </div>
    </div>";
            }
        }
    }
}


function getUniqueProductWithCategory()
{
    global $con;
    if (isset($_GET['category'])) {
        $categories_id = $_GET['category'];

        $select = "SELECT * FROM `products` WHERE categories_id =$categories_id LIMIT 0,6 ";
        $result = mysqli_query($con, $select);
        $num_of_row = mysqli_num_rows($result);
        if ($num_of_row == 0) {
            echo "<h2 class='text-center text-danger'>There are no products matching this category</h2>";
        }
        while ($row_data = mysqli_fetch_assoc($result)) {
            $product_id = $row_data['product_id'];

            $product_image1 = $row_data['product_image1'];
            $product_title = $row_data['product_title'];
            $product_description = $row_data['product_description'];
            $product_price = $row_data['product_price'];


            echo  " <div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin/product_images/$product_image1' class='card-img-top ' alt='$product_image1'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price : $product_price/--</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add To Card</a>

                <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>

            </div>
        </div>
    </div>";
        }
    }
}
function getUniqueProductWithBrand()
{
    global $con;
    if (isset($_GET['brand'])) {
        $brands_id = $_GET['brand'];

        $select = "SELECT * FROM `products` WHERE brands_id = $brands_id LIMIT 0,6";
        $result = mysqli_query($con, $select);
        $num_of_row = mysqli_num_rows($result);
        if ($num_of_row == 0) {
            echo "<h2 class='text-center text-danger'>There are no products matching this brand</h2>";
        }
        while ($row_data = mysqli_fetch_assoc($result)) {
            $product_id = $row_data['product_id'];

            $product_image1 = $row_data['product_image1'];
            $product_title = $row_data['product_title'];
            $product_description = $row_data['product_description'];
            $product_price = $row_data['product_price'];

            echo  " <div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin/product_images/$product_image1' class='card-img-top ' alt='$product_image1'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price : $product_price/--</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add To Card</a>

                <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>

            </div>
        </div>
    </div>";
        }
    }
}

function getCategory()
{
    global $con;

    $select = "SELECT * FROM `categories` LIMIT 0,6";
    $result = mysqli_query($con, $select);

    while ($row_data = mysqli_fetch_assoc($result)) {
        $category = $row_data['category_title'];
        $category_id = $row_data['category_id'];

        echo  "<li class='nav-item'>
                    <a class='nav-link text-light' href='index.php?category=$category_id'>$category</a>
                </li>";
    }
}

function getBrand()
{
    global $con;

    $select = "SELECT * FROM `brands`";
    $result = mysqli_query($con, $select);

    while ($row_data = mysqli_fetch_assoc($result)) {
        $brand = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];

        echo  "<li class='nav-item'>
                    <a class='nav-link text-light' href='index.php?brand=$brand_id'>$brand</a>
                </li>";
    }
}

function searchProduct()
{
    global $con;
    if (isset($_GET['search_data_product'])) {
        $value = $_GET['search_data'];

        $select = "SELECT * FROM `products` WHERE product_title like '%$value%' or product_keywords like '%$value%' ";
        $result = mysqli_query($con, $select);
        $num_of_row = mysqli_num_rows($result);
        if ($num_of_row == 0) {
            echo "<h2 class='text-center text-danger'>There are no products matching the search criteria</h2>";
        }
        while ($row_data = mysqli_fetch_assoc($result)) {
            $product_id = $row_data['product_id'];

            $product_image1 = $row_data['product_image1'];
            $product_title = $row_data['product_title'];
            $product_description = $row_data['product_description'];
            $product_price = $row_data['product_price'];


            echo  " <div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin/product_images/$product_image1' class='card-img-top ' alt='$product_image1'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_description</p>
                <p class='card-text'>Price : $product_price/--</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add To Card</a>

                <a href='product_detail.php?product_id=$product_id' class='btn btn-secondary'>View More</a>

            </div>
        </div>
    </div>";
        }
    }
}

function view_detail()
{
    global $con;
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category'])) {
            if (!isset($_GET['brand'])) {
                $value = $_GET['product_id'];
                $select = "SELECT * FROM `products` WHERE product_id=$value";
                $result = mysqli_query($con, $select);
                while ($row_data = mysqli_fetch_assoc($result)) {
                    $product_id = $row_data['product_id'];
                    $product_image1 = $row_data['product_image1'];
                    $product_image2 = $row_data['product_image2'];
                    $product_image3 = $row_data['product_image3'];
                    $product_title = $row_data['product_title'];
                    $product_description = $row_data['product_description'];
                    $product_price = $row_data['product_price'];

                    echo  "<div class='col-md-4'>
                <div class='card'>
                    <img src='../admin/product_images/$product_image1' class='card-img-top ' alt='$product_image1'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                <p class='card-text'>Price : $product_price/--</p>
                        <a href='index.php?add_to_cart=$product_id' class='btn btn-primary'>Add To Card</a>

                <a href='index.php' class='btn btn-secondary'>Go Home</a>

                    </div>
                </div>
            </div>
            <div class='col-md-8'>
                <div class='row'>
                    <div class='col-md-12'>
                        <h4 class='text-center text-info mb-5'>
                            Related Products
                        </h4>
                    </div>
                    <div class='col-md-6'>
                        <img src='./admin/product_images/$product_image2' class='card-img-top ' alt='$product_image2'>

                    </div>
                    <div class='col-md-6'>
                        <img src='./admin/product_images/$product_image3' class='card-img-top ' alt='$product_image3'>

                    </div>
                </div>
            </div>";
                }
            }
        }
    }
}

function getIPAddress()
{
    // Kiểm tra IP từ share internet
    if (!empty($_SERVER['HTTP_CLIENT_IP']) && filter_var($_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP)) {
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    // Kiểm tra IP từ proxy
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']) && filter_var($_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP)) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    // Kiểm tra IP từ remote address
    elseif (!empty($_SERVER['REMOTE_ADDR']) && filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP)) {
        return $_SERVER['REMOTE_ADDR'];
    }
    // Trường hợp không tìm thấy địa chỉ IP hợp lệ
    else {
        return 'Unknown';
    }
}

function card()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $ip = getIPAddress();
        $product_id = $_GET['add_to_cart'];
        $select = "SELECT * FROM `cart_details` WHERE ip_address='$ip' and product_id = $product_id";
        $result = mysqli_query($con, $select);
        $num_of_result = mysqli_num_rows($result);
        if ($num_of_result > 0) {
            echo "<script>alert('This item is already present inside cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        } else {
            $insert = "INSERT INTO `cart_details` (product_id,ip_address,quantity) values ($product_id,'$ip',1)";
            $result = mysqli_query($con, $insert);
            echo "<script>alert('Item is added to cart')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

function countItemInCart()
{
    global $con;
    $ip = getIPAddress();
    $total = 0;
    $select = "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
    $result = mysqli_query($con, $select);
    while ($row = mysqli_fetch_array($result)) {
        $quantity = $row['quantity'];
        $total += $quantity;
    }
    echo "$total";
    // $num_of_result = mysqli_num_rows($result);
    // echo $num_of_result;
}

function totalPricetItemInCart()
{
    global $con;
    $ip = getIPAddress();
    $total = 0;
    $select = "SELECT * FROM `cart_details` WHERE ip_address='$ip'";
    $result = mysqli_query($con, $select);
    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        $quantity = $row['quantity'];
        $selectProduct = "SELECT * FROM `products` WHERE product_id=$product_id";
        $resultProduct = mysqli_query($con, $selectProduct);

        while ($row_product_price = mysqli_fetch_array($resultProduct)) {
            $product_price = array($row_product_price['product_price']);
            $value = array_sum($product_price);
            $total += $value * $quantity;
        }
    }
    return $total;
}
