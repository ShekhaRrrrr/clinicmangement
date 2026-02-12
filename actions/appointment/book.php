<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors',1);
require '../../dbconfig/dbconfig.php';

$patient_id = $_POST['patient_id'];
$doctor_id = $_POST['doctor_id'];
$appointment_date = $_POST['appointment_date'];
$appointment_time = $_POST['appointment_time'];
$description = $_POST['description'];
$user_id = $_SESSION['user_id'];

// appointments for patients
$q1 = mysqli_query($conn, "
    SELECT COUNT(*) AS c 
    FROM appointments 
    WHERE patient_id = $patient_id
    AND appointment_date = '$appointment_date'
");

if (!$q1) {
    die("Query error: " . mysqli_error($conn));
}

if (mysqli_fetch_assoc($q1)['c'] > 0) {
    die("Appointment Already Made");
}

// for doctors
$q2 = mysqli_query($conn, "
    SELECT COUNT(*) AS c 
    FROM appointments 
    WHERE doctor_id = $doctor_id 
    AND appointment_date = '$appointment_date'
");

if (!$q2) {
    die("Query error: " . mysqli_error($conn));
}

if (mysqli_fetch_assoc($q2)['c'] >= 5) {
    die("Doctor is Packed For Today");
}

//inserting the appointment with user_id
$sql = "INSERT INTO appointments 
(patient_id, doctor_id, appointment_date, appointment_time, description, user_id) 
VALUES ($patient_id, $doctor_id, '$appointment_date', '$appointment_time', '$description', $user_id)";

$result = mysqli_query($conn, $sql);
if(!$result){
    die("Query Error: " . mysqli_error($conn));
}

header("Location: ../../views/appointment/appointments.php");
exit;
?>