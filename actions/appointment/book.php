<?php
require '../../dbconfig/dbconfig.php';

$patient_id = $_POST['patient_id'];
$appointment_id = $_POST['appointment_id'];
$doctor_id = $_POST['doctor_id'];
$appointment_date = $_POST['appointment_date'];
$appointment_time = $_POST['appointment_time'];
$description = $_POST['description'];

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

//inserting the appointment

$sql = "INSERT INTO appointments 
(patient_id, appointment_id, doctor_id, appointment_date, appointment_time, description) 
VALUES ($patient_id, $appointment_id, $doctor_id, '$appointment_date', '$appointment_time', '$description')";

$result=mysqli_query($conn,$sql);
if(!$result){
    die("Query Error:".mysqli_error($conn));
}



header("Location: ../../views/appointments.php");
exit;
?>
