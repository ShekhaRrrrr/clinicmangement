<?php
require "../../actions/auth/middleware.php";
requireAuth('user');
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header("Location: ../../views/doctors/doctors.php");
    exit();
}

require "../../dbconfig/dbconfig.php";

$name = $_POST['name'];
$department = $_POST['department'];
$qualifications=$_POST['qualifications'];
$phone = $_POST['phone'];
$user_id = $_SESSION['user_id'];

$sql = "INSERT INTO doctors (name, department,qualifications,phone,  user_id) 
        VALUES ('$name', '$department','$qualifications','$phone', $user_id)";

if(mysqli_query($conn, $sql)) {
    header("Location: ../../views/doctors/doctors.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>