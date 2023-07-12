<?php

include '../sql/connection.php';
session_start();

if (!empty($_POST)) {

    $name = $_POST['name'];
    $title = $_POST['title'];
    $description = $_POST['description'];
 
    $image = $_FILES['image'];



if($image)
{
    
    $image_name = $image['name'];
    $full_path = $image['full_path'];
    $tmp_name = $image['tmp_name'];
    $type = $image['type'];

    $image_store = "../image/product_upload/". $image_name;

    move_uploaded_file($tmp_name,$image_store);

}
    $sql = "INSERT INTO `inde2_db` (`image`,`name`, `title`, `description`) VALUES ('$image_name','$name', '$title', '$description')";
    $result = mysqli_query($connection, $sql);


    if (!$result) {
        echo "Error ";
    } else {
       header("location:./admin.php");
    }
}

include '../commonpage/header.php';
include '../commonpage/topnav.php';
?>
<style>
        input,textarea{width: 100% !important;}
</style>
<div class="container-fluid mt-3">
    <h1 class="text-center bg-info text-light rounded">Add new product</h1>
</div>

<div class="container">
    <form method="POST"  enctype="multipart/form-data">

        <div class="mb-3">
            <label class="form-label">Picture</label>
            <input type="file" class="form-control" placeholder="Add product image" name="image" id="image">
        </div>
        <div class="mb-3">
            <label class="form-label "> Brand Name</label>
            <select class="form-select" name="name" required>
                <option selected>Select the Brand</option>
                <option value="Redmi"> Redmi</option>
                <option value="Realme">Realme</option>
                <option value="POCO">POCO</option>
            </select>

            <div class="mb-3">
                <label class="form-label"> Price</label>
                <input type="number" class="form-control" placeholder="Enter the Price" name="title" id="title" required>
                <div class="mb-3">
                    <label class="form-label">Details</label>
                    <textarea type="text" class="form-control" placeholder="details" name="description" id="description" required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                </div>
    </form>
</div>
<hr>
</form>
<?php
include '../commonpage/footernav.php';
include '../commonpage/footer.php';
?>