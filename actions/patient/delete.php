<?php
require'../../dbconfig/dbconfig.php';
$patient_id=$_GET['patient_id'];
$sql="DELETE FROM patients where patient_id=$patient_id";
if(mysqli_query($conn,$sql)){
header('Location:../../views/patients/patients.php');
exit;
} else{
    echo("Error".mysqli_error($conn));
}
?>
