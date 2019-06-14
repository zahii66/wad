<?php
require_once "db_connection.php";

function getCats(){
    global $con;
    $getCatsQuery = "select * from categories";
    $getCatsResult = mysqli_query($con,$getCatsQuery);
    while($row = mysqli_fetch_assoc($getCatsResult)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<li><a class='nav-link'  href='index.php?cat=$cat_id'>$cat_title</a></li>";
    }
}
function getBrands(){
    global $con;
    $getBrandsQuery = "select * from brands";
    $getBrandsResult = mysqli_query($con,$getBrandsQuery);
    while($row = mysqli_fetch_assoc($getBrandsResult)){
        $brand_id = $row['brand_id'];
        $brand_title = $row['brand_title'];
        echo "<li><a class='nav-link'  href='index.php?brand=$brand_id'>$brand_title</a></li>";
    }
}
function getPro(){
    global $con;

    if(isset($_GET['cat'])){
        $getProQuery="";
        $cat_id =$_GET['cat'];
        $getProQuery = "select *from products where pro_cat='$cat_id'";
    }
    else if(isset($_GET['brand'])){
        $brand_id =$_GET['brand'];
        $getProQuery = "select *from products where pro_brand = ' $brand_id'";
    }
    else if(isset($_GET['search']))
    {
        $q= $_GET['search'];
        $getProQuery="select * from products where pro_keywords like '%$q%'";
    }
    else {
        $getProQuery = "select *from products order by RAND()";
    }
    $getProResult = mysqli_query($con,$getProQuery);
    while ($row =mysqli_fetch_assoc($getProResult)) {
        $title = $row['pro_title'];
        $price = $row['pro_price'];
        $image = $row['pro_image'];
        echo "
    <div class='col-sm-6 col-md-4 col-lg-3 text-center product-summary'>
                <h5 class='text-capitalize'> $title </h5>
                <img src='admin/product_images/$image'>
                <p> <b> Rs $price/-  </b> </p>
                <a href='#' class='btn btn-info btn-sm'>Details</a>
                <a href='#'>
                    <button class='btn btn-primary btn-sm'>
                        <i class='fas fa-cart-plus'></i> Add to Cart
    </button>
                </a>
            </div>";
    }
}


