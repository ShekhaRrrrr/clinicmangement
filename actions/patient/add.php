<?php
require "../../actions/auth/middleware.php";
requireAuth('user');
require'../../dbconfig/dbconfig.php';
$name=$_POST['name'];
$age=$_POST['age'];
$phone=$_POST['phone'];
$address=$_POST['address'];
$gender=$_POST['gender'];
$user_id = $_SESSION['user_id'];
// id is auto incremented
$sql="INSERT INTO patients(name,age,phone,address,gender,user_id)VALUES('$name','$age','$phone','$address','$gender','$user_id')";
if(mysqli_query($conn,$sql)){
    header('Location:../../views/patients/patients.php');
    exit();
}
else{
    echo("Error".mysqli_error($conn));
}
?>