<?php
session_start();

require_once __DIR__ . '/../../dbconfig/dbconfig.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Query database with password check
    $query = "SELECT * FROM users WHERE email='$email' AND role='$role' AND password='$password'";
    $q = mysqli_query($conn, $query);
    
    $user = mysqli_fetch_assoc($q);

    // Check if user exists
    if ($user) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['username'] = $user['username'];

        // Redirect based on role
        if ($user['role'] === 'admin') {
            header("Location: ../../views/admin/adminindex.php");
        } else {
            header("Location: ../../views/doctors/doctors.php");
        }
        exit;
    }

    // Invalid credentials
    header("Location: ../../index.html");
    exit;
}
?>