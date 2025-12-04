<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../../dbconfig/dbconfig.php';

$name = $_POST['name'];
$department = $_POST['department'];
$qualifications = $_POST['qualifications'];
$phone = $_POST['phone'];

$sql = "INSERT INTO doctors(name, department, qualifications, phone) VALUES('$name', '$department', '$qualifications', '$phone')";

if(mysqli_query($conn, $sql)) {
    header("Location: ../../views/doctor/doctors.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>