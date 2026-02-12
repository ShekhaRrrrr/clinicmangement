<?php
require "../../actions/auth/middleware.php";
requireAuth('user');
require '../../dbconfig/dbconfig.php';

$patient_id = $_POST['patient_id'];
$name       = $_POST['name'];
$age        = $_POST['age'];
$gender     = $_POST['gender'];
$address    = $_POST['address'];
$phone      = $_POST['phone'];

$sql = "UPDATE patients 
        SET name='$name', 
            age='$age', 
            gender='$gender', 
            address='$address',
            phone='$phone'
        WHERE patient_id='$patient_id'";

if (mysqli_query($conn, $sql)) {
    header("Location: ../../views/patients/patients.php");
    exit();
} 
else {
    echo "Error: " . mysqli_error($conn);
}
?>
