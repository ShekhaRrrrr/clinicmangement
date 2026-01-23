<?php
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header("Location: ../../views/admin/users.php");
    exit();
}

require "../../dbconfig/dbconfig.php";

$user_id = $_POST['user_id'];
$username = $_POST['username'];
$email = $_POST['email'];
$role = $_POST['role'];

// Check if password field is filled
if(!empty($_POST['password'])){
    $password = $_POST['password'];
    
    $sql = "UPDATE users
            SET username='$username',
                email='$email',
                password='$password',
                role='$role'
            WHERE user_id='$user_id'";
} else {
    // Update without changing password
    $sql = "UPDATE users
            SET username='$username',
                email='$email',
                role='$role'
            WHERE user_id='$user_id'";
}

if(mysqli_query($conn, $sql)){
    header("Location: ../../views/admin/users.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>