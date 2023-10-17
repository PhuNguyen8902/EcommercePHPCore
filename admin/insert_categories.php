<?php
include("../includes/connect.php");

if (isset($_POST['insert_cart'])) {
    $name = $_POST['cat_title'];

    $select_query = "SELECT * FROM `categories` WHERE category_title = ('$name')";
    $result_select = mysqli_query($con, $select_query);
    $num_result = mysqli_num_rows($result_select);

    if ($num_result > 0) {
        echo '<script>alert("Category đã tồn tại")</script>';
    } else {
        $insert_query = "INSERT INTO `categories` (category_title) VALUES ('$name')";
        $result = mysqli_query($con, $insert_query);
        if ($result) {
            echo '<script>alert("Thêm thành công")</script>';
        } else {
            echo '<script>alert("Thêm không thành công")</script>';
        }
    }
}
?>
<h2 class="text-center">Insert Category</h2>

<form action="" method="POST" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1">
            <i class="fa-solid fa-receipt"></i>
        </span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Category" aria-label="Categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <input type="submit" class=" bg-info border-0 p-2 my-3" name="insert_cart" value="Insert Categories" aria-label="Username" aria-describedby="basic-addon1">
    </div>
</form>