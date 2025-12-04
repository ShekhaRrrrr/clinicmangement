<?php
require'../../dbconfig/dbconfig.php';
$appointmentid=$_GET['appointment_id'];
$sql="DELETE FROM appointments where 'appointment_id'=$appointment_id ";
mysqli_query($conn,$sql);
header('Location../../views/appointments.php');
?>