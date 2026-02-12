<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Management System - Admin</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        /* Navbar Styles */
        .navbar-brand {
            font-weight: 700;
            font-size: 1.4rem;
            letter-spacing: .5px;
        }
        .nav-link {
            font-size: 1.05rem;
            padding: 10px 14px !important;
            transition: 0.2s;
        }
        .nav-link:hover {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 6px;
        }
        .navbar {
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        }

        /* Page container */
        .content-container {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            margin-top: 20px;
        }

        /* Heading */
        h2 {
            font-weight: 600;
            margin-bottom: 20px;
        }

        /* Add button */
        .btn-success {
            font-weight: 500;
        }

        /* Table */
        .table {
            border-radius: 6px;
            overflow: hidden;
        }

        .table thead {
            background: #343a40;
            color: #fff;
        }

        .table th {
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
        }

        .table td {
            vertical-align: middle;
        }

        /* Hover effect */
        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        /* Action buttons */
        .btn-sm {
            padding: 4px 10px;
        }

        .btn-warning {
            color: #fff;
        }

        .btn-warning:hover {
            background-color: #d39e00;
        }

        .btn-danger:hover {
            background-color: #bd2130;
        }

        /* Body background */
        body {
            background-color: #f4f6f9;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-danger sticky-top">
    <div class="container">

        <a class="navbar-brand d-flex align-items-center gap-2" href="#">
            <i class="bi bi-shield-lock"></i>  
            Admin Panel
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="adminNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="users.php">
                        <i class="bi bi-people-fill"></i> Manage Users
                    </a>
                </li>

                <!-- User Info & Logout -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle"></i> <?= $_SESSION['username'] ?? 'Admin'; ?>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="../../actions/auth/logout.php">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </a></li>
                    </ul>
                </li>

            </ul>
        </div>

    </div>
</nav>
</body>
</html>