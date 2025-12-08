<?php
require '../../dbconfig/dbconfig.php';
$appointment_id = $_GET['appointment_id'];
$sql = "DELETE FROM appointments WHERE appointment_id = $appointment_id";
mysqli_query($conn, $sql);
header('Location: ../../views/appointments.php');
?>