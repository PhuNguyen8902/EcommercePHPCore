<?php
include("./includes/connect.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website using PHP and MySQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <!-- Header -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <img src="./images/logo.jpg" alt="logo" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fa-solid fa-cart-shopping"></i><sup>1</sup>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price:100/-</a>
                        </li>

                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>

    <!-- Second Child -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Welcome Guest</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Login</a>
            </li>
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

    <!-- Four Child -->
    <div class="row">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <img src="./images/tao1.jpg" class="card-img-top" alt="tao1">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Add To Card</a>
                            <a href="#" class="btn btn-secondary">View More</a>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <img src="./images/tao2.webp" class="card-img-top" alt="tao2">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Add To Card</a>
                            <a href="#" class="btn btn-secondary">View More</a>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <img src="./images/tao1.jpg" class="card-img-top" alt="tao1">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Add To Card</a>
                            <a href="#" class="btn btn-secondary">View More</a>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <img src="./images/tao2.webp" class="card-img-top" alt="tao2">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Add To Card</a>
                            <a href="#" class="btn btn-secondary">View More</a>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-2">
                    <div class="card">
                        <img src="./images/tao1.jpg" class="card-img-top" alt="tao1">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-primary">Add To Card</a>
                            <a href="#" class="btn btn-secondary">View More</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-2 bg-secondary p-0">
            <!-- Brand to display -->
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-info">
                    <a class="nav-link text-light" href="#">
                        <h4>Delivery Brands</h4>
                    </a>
                </li>

                <?php
                $select = "SELECT * FROM `brands`";
                $result = mysqli_query($con, $select);
                while ($row_data = mysqli_fetch_assoc($result)) {
                    $brand = $row_data['brand_title'];
                    $brand_id = $row_data['brand_id'];

                    echo  "<li class='nav-item'>
                                <a class='nav-link text-light' href='index.php?brand=$brand_id'>$brand</a>
                            </li>";
                }
                ?>
            </ul>
            <!-- CAtegory -->
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-info">
                    <a class="nav-link text-light" href="#">
                        <h4>Categories</h4>
                    </a>
                </li>
                <?php
                $select = "SELECT * FROM `categories`";
                $result = mysqli_query($con, $select);
                while ($row_data = mysqli_fetch_assoc($result)) {
                    $category = $row_data['category_title'];
                    $category_id = $row_data['category_id'];

                    echo  "<li class='nav-item'>
                                <a class='nav-link text-light' href='index.php?category=$category_id'>$category</a>
                            </li>";
                }
                ?>
                <!-- <li class="nav-item">
                    <a class="nav-link text-light" href="#">
                        Category1
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">
                        Category2
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">
                        Category3
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">
                        Category4
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">
                        Category5
                    </a>
                </li> -->
            </ul>
        </div>
    </div>

    <!-- Footer -->
    <div class="bg-info p-3 text-center">
        <p> đây là foôter</p>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>