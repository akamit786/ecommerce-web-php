<?php
include '../commonpage/header.php';
include '../sql/connection.php';
session_start();
include '../commonpage/topnav.php';

if(isset($_GET['id'])) {
    $productId = $_GET['id'];

    $sql = "SELECT * FROM `inde2_db` WHERE `id` = $productId";
    $result = mysqli_query($connection, $sql);

   
    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
?>
<div class="container-fluid mt-3">
    <h1 class="text-center bg-info text-light rounded">Product Details</h1>
</div>
<div class="container">
    <div class="row mt-1">
       
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="../image/product_upload/<?php echo $row['image']; ?>" class="img-fluid" alt="Product Image">
        </div>
        <div class="col-md-6">
            <h4><?php echo $row['name']; ?></h4>
            <p><?php echo $row['title']; ?></p>
            <p><?php echo $row['description']; ?></p>
        </div>
    </div>
</div>

<?php
    } else {
        echo '<div class="container"><p class="alert alert-danger">Product not found.</p></div>';
    }
} else {
    echo '<div class="container"><p class="alert alert-danger">Invalid product ID.</p></div>';
}
include '../commonpage/footernav.php';
include '../commonpage/footer.php';?>
