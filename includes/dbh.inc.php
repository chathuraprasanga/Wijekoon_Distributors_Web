<?php
$serverName = "localhost";
$dBUsername = "root";
$dBPassword ="";
$dBName ="project";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn){
    die("connection failed: " .mysqli_connect_error());
}



?>