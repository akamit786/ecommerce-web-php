<?php

include '../sql/connection.php';

$id = $_GET['id'];
$sql = "SELECT * FROM `inde2_db` where `id`= $id";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $tmp_name = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
        move_uploaded_file($tmp_name, './image/upload/' . $image_name);

       
        $sql_image_update = "UPDATE `inde2_db` SET image='$image_name' WHERE id='$id'";
        $result_image_update = mysqli_query($connection, $sql_image_update);
        if (!$result_image_update) {
            echo 'error in image update';
            exit; 
        }
    }


    $name = $_POST['name'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "UPDATE `inde2_db` SET  name='$name', title='$title', description='$description' WHERE id='$id'";
    $result = mysqli_query($connection, $sql);
    if (!$result) {
        echo 'error in update';
    } else {
        header('location: admin.php');
    }
}
include '../commonpage/header.php';
include '../commonpage/topnav.php';
?>
<style>
        input,textarea{width: 100% !important;}
</style>
<div class="container-fluid mt-3">
    <h1 class="text-center bg-info text-light rounded">Edit product Details</h1>
</div>
    <div class="container">
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">

                <label class="form-label">Product Picture</label>
                <img src="../image/upload/<?php echo $row['image']; ?>" height="200">
                <div class="mb-3">
                <label for="" class="form-label">Change Product Picture</label>
         <input type="file" class="form-control" name="image" id="image" value="./image/upload/<?php echo $row['image']?>"            </div>
         </div>
         <div class="mb-3">
                <label class="form-label "> Brand Name</label>
                <select class="form-select" name="name" required>
                    <option><?php echo $row['name'] ?></option>
                    <option value="Redmi"> Redmi</option>
                    <option value="Realme">Realme</option>
                    <option value="POCO">POCO</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="text" class="form-control" placeholder="price" name="title" id="title" value="<?php echo $row['title'] ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Details</label>
                <textarea type="text" class="form-control" placeholder="details" name="description" id="description" required><?php echo $row['description'] ?></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" name="submit" id="submit">update</button>
            </div>
        </form>
    </div>
  <?php
  include '../commonpage/footernav.php';
include '../commonpage/footer.php';

  ?>