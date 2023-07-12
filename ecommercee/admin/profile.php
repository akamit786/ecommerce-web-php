<?php
session_start(); 
include '../sql/connection.php';
include '../commonpage/header.php';
include '../commonpage/topnav.php';

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
}


$userID = $_SESSION['id'];

$sql = "SELECT * FROM reg_data WHERE id = $userID";
$result = mysqli_query($connection, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "User not found.";
    exit();
}
?>




    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">Welcome, <?php echo $row['name']; ?>!</h1>
                <p class="card-text"><strong>Email:</strong> <?php echo $row['email']; ?></p>
                <p class="card-text"><strong>Phone:</strong> <?php echo $row['phone']; ?></p>
                <p class="card-text"><strong>Gender:</strong> <?php echo $row['gender']; ?></p>

                <a href="./edit_profile.php" class="btn btn-primary">Edit Profile</a>

                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
    <?php
  include '../commonpage/footernav.php';
include '../commonpage/footer.php';

  ?>