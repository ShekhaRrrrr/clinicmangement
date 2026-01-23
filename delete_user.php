<?php
require "../../dbconfig/dbconfig.php";

$user_id = $_GET['user_id'];
$sql="DELETE FROM users 
WHERE user_id=$user_id";
if(mysqli_query($conn,$sql)){
header("Location: ../../views/admin/users.php");
exit();
}
else{
    echo("Error" .mysqli_error($conn));
}
exit;
?>