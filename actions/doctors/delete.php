<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../../dbconfig/dbconfig.php';

$doctor_id = $_GET['doctor_id'];

$sql = "DELETE FROM doctors WHERE doctor_id = $doctor_id";

if(mysqli_query($conn, $sql)) {
    header("Location: ../../views/doctor/doctors.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>