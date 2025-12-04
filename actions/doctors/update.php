<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: /testproj/views/doctor/doctors.php");
    exit();
}

require '../../dbconfig/dbconfig.php';

$doctor_id = $_POST['doctor_id'] ?? null;
$name = $_POST['name'] ?? '';
$department = $_POST['department'] ?? '';
$qualifications = $_POST['qualifications'] ?? '';
$phone = $_POST['phone'] ?? '';

$sql = "UPDATE doctors 
        SET name='$name', department='$department', 
            qualifications='$qualifications', phone='$phone'
        WHERE doctor_id=$doctor_id";

if(mysqli_query($conn, $sql)) {
    header("Location: ../../views/doctor/doctors.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
