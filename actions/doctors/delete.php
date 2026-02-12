<?php
require "../../actions/auth/middleware.php";
requireAuth('user');

require '../../dbconfig/dbconfig.php';

$doctor_id = $_GET['doctor_id'];

$sql = "DELETE FROM doctors WHERE doctor_id = $doctor_id";

if(mysqli_query($conn, $sql)) {
    header("Location: ../../views/doctors/doctors.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>