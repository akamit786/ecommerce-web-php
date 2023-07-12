<?php
include '../commonpage/header.php';
session_start();

include '../commonpage/topnav.php';
include '../sql/connection.php';



?>
<style>
    input,
    textarea {
        width: 100% !important;
    }
</style>
<div class="container-fluid mt-3">
    <h1 class="text-center bg-info text-light rounded">Contant us</h1>
</div>
<?php
if (!empty($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "INSERT INTO `test` (`name`, `email`, `subject`, `message`) VALUES ('$name', '$email', '$subject', '$message')";

   $result= mysqli_query($connection, $sql);

   if(!$result){
    echo'<div class="alert alert-danger container" role="alert">
  Somthing Went Wrong
  </div>';

  }else{
    echo '<div class="alert alert-success container" role="alert">
   Your Message is successfully send
  </div>';
  }
}
  
?>

<div class="container mt-2">
    <div class="row">
        <div class="col-md-6">

            <form method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" id="subject" name="subject" class="form-control form-control-lg">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <div class="col-md-6 ">
            <div id="carousel" class="carousel slide " data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://img.freepik.com/free-vector/hand-drawn-contact-information-background-template_23-2148189662.jpg?w=740&t=st=1689051587~exp=1689052187~hmac=8f5f546697261d7cca050b1a20cf8ac9f7b40b4ca4a7106746c3985780c98db7" class="img-fluid img-height " >
                    </div>
                    <div class="carousel-item">
                        <img src="https://img.freepik.com/free-vector/contact-us-concept-illustration_114360-2299.jpg?w=740&t=st=1689051595~exp=1689052195~hmac=038e2f2d75aab7221aff57f8796f12d5a598634427cdd5c85599cfc48e625e23" class="img-fluid img-height " >
                    </div>

                </div>

            </div>

        </div>
    </div>
</div>



<div class="conatiner-fluid">
    <h2 class="text-center fw-semibold">Find us here </h2>
    <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d6856.060907878307!2d76.7713487!3d30.7737247!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1688641607996!5m2!1sen!2sin" width="100%" height="450" s="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<?php
include '../commonpage/footernav.php';
include '../commonpage/footer.php';
?>