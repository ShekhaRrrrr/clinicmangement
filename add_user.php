<?php
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    header("Location: ../../views/admin/users.php");
    exit();
}

require "../../dbconfig/dbconfig.php";

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

$sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";

if(mysqli_query($conn, $sql)) {
    header("Location: ../../views/admin/users.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>