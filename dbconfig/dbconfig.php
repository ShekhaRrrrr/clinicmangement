<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$host = "localhost";
$user = "root";
$password = "";
$dbname = "cms";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}


?>