<?php
include '../commonpage/header.php';
session_start();

include '../commonpage/topnav.php';
include '../sql/connection.php';
$sql = "SELECT * FROM `inde2_db`";
$result = mysqli_query($connection, $sql);
?>
<div class="container-fluid mt-3">
    <h1 class="text-center bg-info text-light rounded">Find your product</h1>
</div>

<style>
    #card{
        height: 400px;
    }
</style>

<div class="container m-4" >
    <div class="row" >
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo '

            <div class="col-md-6 text-center">
                <div class="card mb-4" id="card"  >
                    <div class="card-body" >
                    <img src='."../image/product_upload/" .$row["image"].' class="imag-fluid rounded card-title" width="200" hight="200">
              
                        <h5 class="card-title"> Brand Name ' . $row['name'] . '</h5>
                        <h6 class="card-subtitle  text-muted">Price of the product is ' . $row['title'] . '</h6>
                        <p class="card-text">Details about product ' . $row['description'] . '</p>
                        <a href="./afterorder.php" class="btn btn-primary">Order Now</a>
                        <a href="../admin/view.php?id=' . $row['id'] . '" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>';
        }
        ?>
    </div>
</div>


    <?php
include '../commonpage/footernav.php';
include '../commonpage/footer.php';
?>