<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css" />

</head>

<body>
    <!-- Header -->
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg bg-info">
            <div class="container-fluid">
                <img src="../images/logo.jpg" alt="logo" class="logo">

                <nav class="navbar navbar-expand-lg bg-info">

                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Welcome Admin</a>
                        </li>
                    </ul>

                </nav>
            </div>
        </nav>

        <!-- Second Child -->
        <div class="bg-light">
            <h3 class="text-center p-2">
                Manager Detail
            </h3>
        </div>

        <!-- Third Child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-5">
                    <a href="#">
                        <img src="../images/tao1.jpg" alt="tao1" class="admin_image">
                    </a>
                    <p class="text-light text-center">Admin name</p>
                </div>
                <div class="button text-center">
                    <button class="me-2">
                        <a href="index.php?insert_product" class="nav-link text-light bg-info my-1 p-2">Insert
                            Products</a>
                    </button>
                    <button class="me-2">
                        <a href="" class="nav-link text-light bg-info my-1 p-2">View Products</a>
                    </button>
                    <button class="me-2">
                        <a href="index.php?insert_category" class="nav-link text-light bg-info my-1 p-2">Insert
                            Categories</a>
                    </button>
                    <button class="me-2">
                        <a href="" class="nav-link text-light bg-info my-1 p-2">View
                            Categories</a>
                    </button>
                    <button class="me-2">
                        <a href="index.php?insert_brand" class="nav-link text-light bg-info my-1 p-2">Insert
                            Brands</a>
                    </button>
                    <button class="me-2">
                        <a href="" class="nav-link text-light bg-info my-1 p-2">View Brands</a>
                    </button>
                    <button class="me-2">
                        <a href="" class="nav-link text-light bg-info my-1 p-2">All Orders</a>
                    </button>
                    <button class="me-2">
                        <a href="" class="nav-link text-light bg-info my-1 p-2">All Payments</a>
                    </button>
                    <button class="me-2"><a href="" class="nav-link text-light bg-info my-1 p-2">List Users</a>
                    </button>
                    <button class="me-2">
                        <a href="" class="nav-link text-light bg-info my-1 p-2">Logout</a>
                    </button>
                </div>
            </div>

        </div>

        <!-- Four Child -->

        <div class="container my-3">
            <?php
            if (isset($_GET['insert_category'])) {
                include('insert_categories.php');
            }
            if (isset($_GET['insert_brand'])) {
                include('insert_brands.php');
            }
            if (isset($_GET['insert_product'])) {
                include('insert_products.php');
            }
            ?>
        </div>

    </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>