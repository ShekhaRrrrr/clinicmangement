<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function requireAuth(...$allowed_roles) {
    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../../index.html");
        exit();
    }
    
    // If roles are specified, check if user has one of them
    if (!empty($allowed_roles) && !in_array($_SESSION['role'], $allowed_roles)) {
        header("Location: ../../index.html");
        exit();
    }
}

function isLoggedIn() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

function hasRole($role) {
    return isset($_SESSION['role']) && $_SESSION['role'] === $role;
}
?>