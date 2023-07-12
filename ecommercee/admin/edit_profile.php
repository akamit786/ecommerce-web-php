<?php
session_start();

if (!isset($_SESSION['login_user'])) {
    header("Location: ../auth/login.php");
    exit();
}

include '../sql/connection.php';

$userID = $_SESSION['id'];


$sql = "SELECT * FROM reg_data WHERE id = $userID";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    unset($_SESSION['login_user']);
    header("Location: ../auth/login.php");
}


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $image = $_FILES['image'];



if($image)
{
    
    $image_name = $image['name'];
    $full_path = $image['full_path'];
    $tmp_name = $image['tmp_name'];
    $type = $image['type'];

    $image_store = "../image/user_images/". $image_name;

    move_uploaded_file($tmp_name,$image_store);
}

    $updateSql = "UPDATE reg_data SET `image`='$image_name' ,`name`='$name', `email`='$email', `phone`='$phone', `gender`='$gender' WHERE id='$userID'";
    $updateResult = mysqli_query($connection, $updateSql);

    if ($updateResult) {
        $_SESSION['success_message'] = 'Profile updated successfully';
        $_SESSION['image'] = $image_name;
    } else {
        $_SESSION['error_message'] = 'Error updating profile';
    }

    header('Location: edit_profile.php');
    exit();
}

include '../commonpage/header.php';
include '../commonpage/topnav.php';
?>


<div class="container mt-5">
    <div class="row">
        <div class="col-md-4 text-center" >
            <?php
            if ($_SESSION['image']) {
                echo "<img src='../image/user_images/" . $_SESSION['image'] . "' class='img-fluid rounded' width='100'>";
            } else {
                echo "<img src='../image/user_images/" . $_SESSION['gender'] . ".png' class='img-fluid rounded' width='100'>";
            }
            ?>
             <h1 class="fs-2 fw-semibold">Welcome, <?php echo $row['name']; ?>!</h1>
             <p class=" fs-4">Email: <?php echo $row['email'];?></p>
        </div>
        <div class="col-md-8 border-start">
            <h1 class="card-title text-center">Edit Profile</h1>
            <?php
            if (isset($_SESSION['success_message'])) {
                echo '<div class="alert alert-success">' . $_SESSION['success_message'] . '</div>';
                unset($_SESSION['success_message']);
            }

            if (isset($_SESSION['error_message'])) {
                echo '<div class="alert alert-danger">' . $_SESSION['error_message'] . '</div>';
                unset($_SESSION['error_message']);
            }
            ?>
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" required readonly>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select class="form-control" id="gender" name="gender" required>
                        <option value="Male" <?php if ($row['gender'] === 'Male') echo 'selected'; ?>>Male</option>
                        <option value="Female" <?php if ($row['gender'] === 'Female') echo 'selected'; ?>>Female</option>
                        <option value="Other" <?php if ($row['gender'] === 'Other') echo 'selected'; ?>>Other</option>
                    </select>
                </div>
                <div class="form-group ">
                    <label for="image">Profile Picture</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary mt-2" name="submit">Update Profile</button>
            </form>
        </div>
    </div>
</div>

<?php
include '../commonpage/footernav.php';
include '../commonpage/footer.php';
?>