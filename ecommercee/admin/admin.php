<?php
include '../commonpage/header.php';

include '../sql/connection.php';
session_start();

$sql = "SELECT * FROM `inde2_db`";
$result = mysqli_query($connection, $sql);
include '../commonpage/topnav.php';
?>
<div class="container-fluid mt-3">
    <h1 class="text-center bg-info text-light rounded">Welcome Admin</h1>
</div>
<div class="container">
    <div class="row mt-1">
        <div class="col-md-10 mb-3">
            <h3>This is your product details</h3>
        </div>
        <div class="col-md-2 mb-3">
            <a href="./createproduct.php" class="text-decoration-none fs-4 badge bg-success"><i class="fas fa-plus"></i> ADD</a>
        </div>
    </div>
</div>
<style>
    .card {
        height: 100%;
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
    }
</style>



<div class="container">
    <div class="row">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="../image/upload/' . $row['image'] . '" class="card-img-top" alt="Product Image">
                    <div class="card-body">
                        <h5 class="card-title">' . $row['name'] . '</h5>
                        <p class="card-text">' . $row['title'] . '</p>
                        <p class="card-text">' . $row['description'] . '</p>
                        <div class="d-flex justify-content-between align-items-center">
                        <a href="./view.php?id=' . $row['id'] . '" class="btn btn-primary"><i class="fas fa-eye"></i> View</a>
                           
                            <a href="./editform.php?id=' . $row['id'] . '" class="btn btn-success"><i class="fas fa-pen"></i> Edit</a>
                            <a href="./delete.php?id=' . $row['id'] . '" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</a>
                          
                            </div>
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