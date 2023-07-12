<?php
$server = 'localhost';
$name = 'root';
$password ='';
$database = 'amit_db';
$connection = mysqli_connect($server,$name,$password,$database);

if(!$connection)
{
    echo 'error';
}

  

?>