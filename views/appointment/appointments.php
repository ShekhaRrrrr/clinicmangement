<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "../../dbconfig/dbconfig.php";
include "../partials/header.php";

// Fetch appointments along with patient & doctor names
$result = mysqli_query($conn, "
    SELECT a.appointment_id, a.appointment_date, a.appointment_time, a.description,
           p.name AS patient_name,
           d.name AS doctor_name
    FROM appointments a
    JOIN patients p ON a.patient_id = p.patient_id
    JOIN doctors d ON a.doctor_id = d.doctor_id
    ORDER BY a.appointment_id DESC
");
?>

<div class="container mt-4">
    <h2>Appointments List</h2>
    <a href="appointment_add.php" class="btn btn-success mb-3">Add New Appointment</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Patient</th>
                <th>Doctor</th>
                <th>Date</th>
                <th>Time</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['appointment_id']; ?></td>
                <td><?= $row['patient_name']; ?></td>
                <td><?= $row['doctor_name']; ?></td>
                <td><?= $row['appointment_date']; ?></td>
                <td><?= $row['appointment_time']; ?></td>
                <td><?= $row['description']; ?></td>
                <td>
                    <a href="appointment_edit.php?appointment_id=<?= $row['appointment_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="../../actions/appointment/delete.php?appointment_id=<?= $row['appointment_id']; ?>" class="btn btn-danger btn-sm"
                       onclick="return confirm('Delete this appointment?');">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include "../partials/footer.php"; ?>
