<?php
$servername = "localhost";
$usename = "root";
$password = "";
$dbname = "insea_1a";
//creation de la connexion
$conn = mysqli_connect($servername,$usename,$password,$dbname);
//tester la connexion 
if (!$conn)
    die("connect failed :" . mysqli_connect_error());


?>