<?php
 session_start();
 if(!$_SESSION['login_user'])
 {
   header('location:../auth/login.php');
 }else{
    include '../commonpage/header.php';
    include '../commonpage/topnav.php';
 }
?>


<div class="container mt-2">
    <div class="row">
        <div class="col-md-6">
            <div id="carousel" class="carousel slide mt-5" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="fw-bold">
                            <h1 class=" text-danger fs-1 mb-2">Sale 20% Off</h1>
                            <p class="fs-2 mb-2">On Everything</p>
                            <p class="lh-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic nemo voluptas obcaecati non ullam ex eligendi laboriosam quisquam ad! Id natus animi facere magni doloremque, aliquam possimus nostrum impedit ut.</p>
                            <a href="./product.php" class="btn btn-primary f-3 mt-3 text-center">Shop Now</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="fw-bold">
                            <h1 class=" text-danger fs-1 mb-2">Sale 20% Off</h1>
                            <p class="fs-2 mb-2">On Everything</p>
                            <p class="lh-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic nemo voluptas obcaecati non ullam ex eligendi laboriosam quisquam ad! Id natus animi facere magni doloremque, aliquam possimus nostrum impedit ut.</p>
                            <a href="" class="btn btn-primary f-3 mt-3 text-center">Shop Now</a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="col-md-6">
            <img src="https://img.freepik.com/free-photo/surprised-amused-good-looking-man-with-beard-open-mouth-fascinated-raise-eyebrows-wondered-enjoy-playing-amusement-park-pointing-fingers-left-astonished-with-amazing-promo-white-wall_176420-37055.jpg?w=900&t=st=1688642693~exp=1688643293~hmac=5c4691e6f61d1ddfe6776796eb229c64e1b35e46fc1c3d3fdab1beffabc5bff9" class="img-fluid img-height">
        </div>
    </div>

</div>
<div class="container mt-4 mb-3">
    <h1 class="text-center mb-4 fs-1 fw-bold">Why you choose us</h1>
    <div class="row ">
        <div class="col-md-4 text-center ">
            <div class="card  mt-2 text-light" id="cardhome"><i class="fa-solid fa-truck-fast fs-1 mt-2 "></i>
                <h1>Fast delivery</h1>
                <p class="fw-semibold lh-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime doloribus at quam, odit neque in consectetur perferendis tempore quibusdam soluta corrupti voluptate praesentium voluptates quia animi possimus iste necessitatibus ipsum.</p>
            </div>
        </div>
        <div class="col-md-4  text-center ">
            <div class="card mt-2 text-light " id="cardhome"><i class="fa-solid fa-truck-fast fs-1 mt-2 "></i>
                <h1>Fast delivery</h1>
                <p class="fw-semibold lh-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime doloribus at quam, odit neque in consectetur perferendis tempore quibusdam soluta corrupti voluptate praesentium voluptates quia animi possimus iste necessitatibus ipsum.</p>
            </div>
        </div>
        <div class="col-md-4 text-center ">
            <div class="card text-light mt-2" id="cardhome"><i class="fa-solid fa-truck-fast fs-1 mt-2 "></i>
                <h1>Fast delivery</h1>
                <p class="fw-semibold lh-lg">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime doloribus at quam, odit neque in consectetur perferendis tempore quibusdam soluta corrupti voluptate praesentium voluptates quia animi possimus iste necessitatibus ipsum.</p>
            </div>
        </div>

    </div>
</div>

<div class="container mt-5 mb-2">

    <div class="row">
        <div class="col-md-6">
            <img src="https://img.freepik.com/free-photo/beautiful-curly-girl-pointing-finger_176420-168.jpg?w=900&t=st=1688635926~exp=1688636526~hmac=86a0b5b09844ca90371cea8381b689414913ee350fa5329fc6eac58f58ba32d7" class="img-fluid">

        </div>
        <div class="col-md-6 text-center">
            <h1 class=" text-bold fs-1 mb-4">#New Arrival</h1>
            <p class="fs-3 text-semibold lh-lg ">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fuga, necessitatibus eos? Id eos culpa eius, eum voluptatum molestiae ea. Magni aut illo facilis officiis sed temporibus quae repellat iure earum?</p>
            <a href="./product.php" class="badge bg-primary text-wrap fs-4 text-decoration-none ">Shop Now</a>
        </div>
    </div>

</div>
<div class="conatiner text-center mt-3 mb-2">
    <h1>Subscribe To Get Discount Offers</h1>
    <p>Lorem ipsum dolor sit amet cem perspiciatis alias.</p>
    <form method="post">

        <input type="email" class="form-centrol form-control-lg" placeholder="Enter your email" name="subscribe">
        <input type="button" value="Submit" class="btn btn-success btn-lg">
</div>

</div>
</form>
</div>






<?php
include '../commonpage/footernav.php';
include '../commonpage/footer.php';
?>