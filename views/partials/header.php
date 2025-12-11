<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clinic Management System</title>

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

   
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
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
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top mb-4">
    <div class="container">

        
        <a class="navbar-brand d-flex align-items-center gap-2" href="http://127.0.0.1:5500/index.html">
            <i class="bi bi-hospital"></i>  
            Clinic System
        </a>

        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#clinicNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        
        <div class="collapse navbar-collapse" id="clinicNav">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link" href="../doctor/doctors.php">
                        <i class="bi bi-person-badge"></i> Doctors
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../patients/patients.php">
                        <i class="bi bi-people"></i> Patients
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../appointments/appointments.php">
                        <i class="bi bi-calendar-check"></i> Appointments
                    </a>
                </li>

            </ul>
        </div>

    </div>
</nav>

<div class="container">
