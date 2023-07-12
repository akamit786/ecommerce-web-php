<?php
session_start();
include '../sql/connection.php';
$pass = false;
include '../commonpage/header.php';



if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $pass = $_POST['pass'];
    $cpass = $_POST['cpass'];

    if ($pass !== $cpass) {
        $pass = true;
    } else {
        if ($email == 'pandit143amit@gmail.com') {
            $account = 'admin';
        } else {
            $account = 'user';
        }
        $encryptedPass = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `reg_data` (`name`, `email`, `account`, `phone`,`gender`, `pass`) VALUES ('$name', '$email', '$account', '$phone', '$gender', '$encryptedPass')";
        $result = mysqli_query($connection, $sql);

        if (!$result) {
            echo "Error: " . mysqli_error($connection);
        } else {
            $sql = "SELECT * FROM `reg_data` WHERE `email` = '$email'";
            $result = mysqli_query($connection, $sql);

            $row = mysqli_fetch_assoc($result);

            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            $_SESSION['account'] = $account;
            $_SESSION['phone'] = $phone;
            $_SESSION['gender'] = $gender;
            $_SESSION['image'] = null;
            $_SESSION['login_user'] = true;
            header("Location: ../page/home.php");
            exit;
        }
    }
}

?>

<?php
if ($pass) {
    echo '<div class="alert alert-danger">
    Password not match
  </div>';
}
?>


<div class="container">
    <div class="row align-items-center mt-5">
        <div class="col-md-7">
            <div id="carousel" class="carousel slide " data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://bootstrapious.com/i/snippets/sn-registeration/illustration.svg" class="img-fluid img-height">
                    </div>
                    <div class="carousel-item">
                        <img src="https://img.freepik.com/free-vector/global-data-security-personal-data-security-cyber-data-security-online-concept-illustration-internet-security-information-privacy-protection_1150-37336.jpg?w=740&t=st=1689054543~exp=1689055143~hmac=3cd3902e736da9fe5a1792dfe22a47c5d2c38885663848a5db8d34c27ad9c090" class="img-fluid img-height">
                    </div>

                </div>

            </div>
            <h1>Create Your Account</h1>
            <p class="mb-2">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Architecto perferendis voluptates
                labore sit ullam nostrum repellendus aperiam odio ad autem et, voluptatibus esse quis, illo eveniet a
                animi id ipsam.</p>
        </div>
        <div class="col-md-5">
            <form action="" method="POST">
                <div class=" row">
                    <div class="input-group mb-3">
                        <span class="input-group-text"> <i class="fa-solid fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="Enter your name" name="name" id="name" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"> <i class="fa-solid fa-envelope"></i></span>
                        <input type="email" class="form-control" placeholder="Enter your email" name="email" id="email" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"> <i class="fa-solid fa-phone"></i></span>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Enter your phone number" required>
                    </div>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="gender"><i class="fa-solid fa-person-half-dress"></i></label>
                        <select class="form-select" id="gender" name="gender">
                            <option selected>Select your Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" name="pass" id="pass" class="form-control" placeholder="create password" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" name="cpass" id="cpass" class="form-control" placeholder="Confirm password" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                    </div>
                    <div class="text-center">
                        <h5>Alredy Register <a href="./login.php">Sign in</a></h5>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<?php
include '../commonpage/footer.php';
?>