<?php 
if(empty($_SESSION['user'])){
    header('location:./auth/login.php');
}


?>