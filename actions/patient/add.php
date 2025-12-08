<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
require'../../dbconfig/dbconfig.php';
$name=$_POST['name'];
$age=$_POST['age'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$gender=$_POST['gender'];
// id is auto incremented
$sql="INSERT INTO patients(name,age,phone,address,gender)VALUES('$name','$age','$phone','$address','$gender')";
if(mysqli_query($conn,$sql)){
    header('Location:../../views/patients/patients.php');
    exit();
}
else{
    echo("Error".mysqli_error($conn));
}
?>