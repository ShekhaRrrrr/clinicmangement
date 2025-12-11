<?php
error_reporting(E_ALL);
ini_set('display errors',1);
If($_SERVER['REQUEST_METHOD']!=='POST'){
    header("Location:../..views/appointment/appointments.php");
    exit();
}
require'../../dbconfig/dbconfig.php';
$patient_id = $_POST['patient_id'];
$appointment_id = $_POST['appointment_id'];
$doctor_id = $_POST['doctor_id'];
$appointment_date = $_POST['appointment_date'];
$appointment_time = $_POST['appointment_time'];
$description = $_POST['description'];

$sql="UPDATE appointments
      SET patient_id='$patient_id'
        appointment_id='$appointment_id'
        doctor_id='$doctor_id'
        appointment_date='$appointment_date'
        appointment_time=$'$appointment_time'
        description='$description'";

        if(mysqli_query($conn,$sql)){
            header("Location: ../../views/appointment/appointments.php");
            exit();
        }
        else{
            echo("Error" . mysqli_error($conn));
        }
        ?>
