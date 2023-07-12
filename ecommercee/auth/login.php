<?php
session_start();
include '../sql/connection.php';
include '../commonpage/header.php';

if (!empty($_POST)) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $sql = "SELECT * FROM `reg_data` WHERE `email`= '$email'";

    $result = mysqli_query($connection, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {

            $result = mysqli_query($connection, $sql);
            $row =  mysqli_fetch_assoc($result);

            $verify_pass = password_verify($pass, $row['pass']);

            if ($verify_pass) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['account'] = $row['account'];
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['gender'] = $row['gender'];
                $_SESSION['image'] = $row['image'];
                $_SESSION['login_user'] = true;
                $db_store_password = $row['pass'];
                header('location:../page/home.php');
                exit();
            } else {
                echo "Password doesn't match.";
            }
        } else {
            echo 'Email not found.';
        }
    } else {
        echo 'SQL error: ' . mysqli_error($connection);
    }
}
?>

<div class="container">
    <div class="row align-items-center ">
        <div class="col-md-7">
            <div id="carousel" class="carousel slide " data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://www.sme-news.co.uk/wp-content/uploads/2021/11/Login.jpg" class="img-fluid img-height">
                    </div>
                    <div class="carousel-item">
                        <img src="https://img.freepik.com/free-vector/tiny-people-carrying-key-open-padlock_74855-16292.jpg?w=900&t=st=1689052792~exp=1689053392~hmac=6bc927d425bf07120b65237fa2d86ec1b6f93b28e3b0f268e3e3744358ecc4e2" class="img-fluid img-height">
                    </div>
                </div>
            </div>
            <h1>Sign in to Your Account</h1>
            <p class="mb-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Architecto perferendis voluptates
                labore sit ullam nostrum repellendus aperiam odio ad autem et, voluptatibus esse quis, illo eveniet a
                animi id ipsam.</p>
        </div>
        <div class="col-md-5">
            <form method="POST">
                <div class="row">
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                        <input type="email" class="form-control" placeholder="Enter your email" name="email" id="email" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" name="pass" id="pass" class="form-control" placeholder="Enter your password" required>
                    </div>
                    <div class="form-group mb-3 text-center">
                        <input type="submit" value="Sign in" class="btn btn-success">
                    </div>
                    <div class="text-center">
                        <h5>If not registered, <a href="register.php">Sign up</a></h5>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
include '../commonpage/footer.php';
?>