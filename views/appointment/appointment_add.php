<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../partials/header.php";
?>

<h2>Add Appointments</h2>

<form method="POST" action="../../actions/appointment/book.php" class="mb-3">
    <div class="mb-2">
        <label class="form-label">Patient ID:</label>
        <input type="text" name="patient_id" class="form-control" required>
    </div>

    <div class="mb-2">
        <label class="form-label">Description:</label>
        <input type="text" name="description" class="form-control" required>
    </div>

    <div class="mb-2">
        <label class="form-label">Appointment Time:</label>
        <input type="text" name="appointment_time" class="form-control" required>
    </div>

    <div class="mb-2">
        <label class="form-label">Appointment Date:</label>
        <input type="text" name="appointment_date" class="form-control" required>
    </div>
    <div class="mb-2">
        <label class="form-label">Address</label>
        <input type="text" name="address" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Add Appointment</button>
    <a href="appointments.php" class="btn btn-secondary">Back</a>
</form>

<?php include "../partials/footer.php"; ?>