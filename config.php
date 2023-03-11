<?php
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "portfolio_db";

$conn = mysqli_connect($servername, $username, $password,$dbname);

//connection check

if(!$conn){
    die(" connection failed:" . mysqli_connect_error());
}

?>
