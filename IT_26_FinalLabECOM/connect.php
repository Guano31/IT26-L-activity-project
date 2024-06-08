<?php
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "cart";

$conn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
if(!$conn){
    die("Something wen't Wrong.");
}
?>