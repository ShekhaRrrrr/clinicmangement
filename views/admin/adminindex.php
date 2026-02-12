<?php
require "../../actions/auth/middleware.php";
requireAuth('admin');
require "../../dbconfig/dbconfig.php";


// Counts
$patients_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) c FROM patients"))['c'];
$doctors_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) c FROM doctors"))['c'];
$appts_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) c FROM appointments"))['c'];
$users_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) c FROM users"))['c'];

// Recent appointments
$appointments = mysqli_query($conn, "
SELECT a.appointment_id, p.name patient_name, d.name doctor_name,
a.appointment_date, a.appointment_time, d.department
FROM appointments a
JOIN patients p ON a.patient_id = p.patient_id
JOIN doctors d ON a.doctor_id = d.doctor_id
ORDER BY a.appointment_date DESC LIMIT 10
");

// Departments
$departments = mysqli_query($conn, "
SELECT d.department, COUNT(a.appointment_id) c
FROM appointments a
JOIN doctors d ON a.doctor_id = d.doctor_id
GROUP BY d.department
ORDER BY c DESC
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

<style>
body { background: #f8fafc; }

/* Sidebar */
.sidebar {
    background: white;
    width: 240px;
    min-height: 100vh;
    position: fixed;
    left: -240px;
    transition: 0.25s;
    border-right: 1px solid #e5e7eb;
}
.sidebar.show { left: 0; }
.sidebar a {
    display: block;
    padding: 10px 18px;
    margin: 3px 8px;
    border-radius: 8px;
    color: #374151;
    font-size: 14px;
    text-decoration: none;
}
.sidebar a:hover { background: #f3f4f6; }

/* Content */
.content {
    padding: 18px;
    transition: margin-left 0.25s;
}
.content.shift { margin-left: 240px; }
</style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="px-3 py-3 fw-bold">
        <i class="fas fa-hospital me-2"></i> CMS Admin
    </div>

    <a href="#"><i class="fas fa-home me-2"></i>Dashboard</a>
    <a  href="../../views/admin/user_add.php" class="fas fa-user-md me-2""></i>Manage Users</a>
    <a href="../../actions/auth/logout.php" class="text-danger"><i class="fas fa-sign-out me-2" ></i>Logout</a>
</div>

<!-- Content -->
<div class="content container-lg" id="content">

<!-- Top Bar -->
<div class="d-flex justify-content-between align-items-center mb-3 bg-white border rounded-3 px-3 py-2">
    <div class="d-flex align-items-center gap-2">
        <button id="menuBtn" class="btn btn-sm btn-light">
            <i class="fas fa-bars"></i>
        </button>
        <strong>Dashboard</strong>
    </div>
    <small class="text-muted fw-semibold">Admin <i class="fas fa-user-circle"></i></small>
</div>

<!-- Stats -->
<div class="row g-2 mb-3">

    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body py-2 px-3 d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Patients</small>
                    <h6 class="fw-bold mb-0"><?php echo $patients_count; ?></h6>
                </div>
                <i class="fas fa-users text-primary"></i>
            </div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body py-2 px-3 d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Doctors</small>
                    <h6 class="fw-bold mb-0"><?php echo $doctors_count; ?></h6>
                </div>
                <i class="fas fa-user-md text-success"></i>
            </div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body py-2 px-3 d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Appointments</small>
                    <h6 class="fw-bold mb-0"><?php echo $appts_count; ?></h6>
                </div>
                <i class="fas fa-calendar-check text-warning"></i>
            </div>
        </div>
    </div>

    <div class="col-6 col-md-3">
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body py-2 px-3 d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-muted">Users</small>
                    <h6 class="fw-bold mb-0"><?php echo $users_count; ?></h6>
                </div>
                <i class="fas fa-user-shield text-danger"></i>
            </div>
        </div>
    </div>

</div>

<!-- Tables -->
<div class="row g-3">

    <!-- Departments -->
    <div class="col-md-4">
        <div class="bg-white border rounded-3 p-3">
            <strong class="small">Departments</strong>

            <div class="table-responsive mt-2">
                <table class="table table-sm align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Department</th>
                            <th class="text-end">Count</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($d = mysqli_fetch_assoc($departments)): ?>
                        <tr>
                            <td><?php echo $d['department']; ?></td>
                            <td class="text-end"><?php echo $d['c']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Recent Appointments -->
    <div class="col-md-8">
        <div class="bg-white border rounded-3 p-3">
            <strong class="small">Recent Appointments</strong>

            <div class="table-responsive mt-2">
                <table class="table table-sm align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Department</th>
                            <th>Date</th>
                            <th>Time</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($a = mysqli_fetch_assoc($appointments)): ?>
                        <tr>
                            <td>#<?php echo $a['appointment_id']; ?></td>
                            <td><?php echo $a['patient_name']; ?></td>
                            <td><?php echo $a['doctor_name']; ?></td>
                            <td><?php echo $a['department']; ?></td>
                            <td><?php echo $a['appointment_date']; ?></td>
                            <td><?php echo $a['appointment_time']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
</div>

<script>
document.getElementById('menuBtn').onclick = function () {
    document.getElementById('sidebar').classList.toggle('show');
    document.getElementById('content').classList.toggle('shift');
};
</script>

</body>
</html>
