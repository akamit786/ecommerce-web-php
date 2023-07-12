<?php

include '../sql/connection.php';

?>
<style>
    .img {
  border-radius: 50%;
}
</style>



<div class="container-fluid mt-2">
    <header class="header_section">
      
            <nav class="navbar navbar-expand-lg navbar-light ">
                <a class="navbar-brand fs-2 fst-italic fw-bold" href="../page/home.php">
                    <img width="120" src="https://i.pinimg.com/600x315/1e/29/77/1e2977ca1225981e307ad8d2c26a9040.jpg" alt="E-SHOP Logo">
                    E-SHOP
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 fs-5">
                        <li class="nav-item ">
                            <a class="nav-link active" aria-current="page" href="../page/home.php"><i class="fa-solid fa-house"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../page/about.php"><i class="fa-solid fa-address-card"></i>
                                About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../page/product.php"> <i class="fa-brands fa-product-hunt"></i>
                                Products</a>
                        </li>
                        <?php

                        if ($_SESSION['account'] == 'admin') {
                            echo  " <li class='nav-item'>
                                        <a class='nav-link' href='../admin/admin.php'> <i class='fa-solid fa-lock'></i> Admin</a>
                                    </li>";
                        }
                        ?>

                        <li class="nav-item">
                            <a class="nav-link" href="../page/contant.php"><i class="fa-solid fa-message"></i>
                                Contact</a>
                        </li>
                    </ul>
                    <div class="dropdown nav justify-content-end  mt-1 ">
    
    <?php
                if ($_SESSION['image']) { 
                    echo "<img src='../image/user_images/" . $_SESSION['image'] . "' class='img-fluid  img' width='50' >";
                } else {
                    echo "<img src='../image/user_images/" . $_SESSION['gender'] . ".png' class='img-fluid  img' width='70'>";
                }
                ?>
        <ul class="dropdown-menu" aria-labelledby="dropdown">
            <li><a class="dropdown-item" href="../admin/edit_profile.php?id=<?php echo $_SESSION['id'] ?>">Profile</a></li>
            <li><a class="dropdown-item" href="../admin/logout.php">Logout</a></li>
        </ul>
    </div>
                    
                </div>
                
            </nav>
       
    </header>
</div>
