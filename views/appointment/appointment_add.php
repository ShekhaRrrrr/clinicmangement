<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "../../dbconfig/dbconfig.php";
include "../partials/header.php";

// Fetch patients
$patients = mysqli_query($conn, "SELECT patient_id, name FROM patients");

// Fetch doctors
$doctors = mysqli_query($conn, "SELECT doctor_id, name FROM doctors");
?>

<h2>Add Appointment</h2>

<form method="POST" action="../../actions/appointment/book.php" class="mb-3">

    <!-- Patient -->
    <div class="mb-2">
        <label class="form-label">Patient</label>
        <select name="patient_id" class="form-control" required>
            <option value="">-- Select Patient --</option>
            <?php while ($p = mysqli_fetch_assoc($patients)) { ?>
                <option value="<?= $p['patient_id']; ?>"><?= $p['name']; ?></option>
            <?php } ?>
        </select>
    </div>

    <!-- Doctor -->
    <div class="mb-2">
        <label class="form-label">Doctor</label>
        <select name="doctor_id" class="form-control" required>
            <option value="">-- Select Doctor --</option>
            <?php while ($d = mysqli_fetch_assoc($doctors)) { ?>
                <option value="<?= $d['doctor_id']; ?>"><?= $d['name']; ?></option>
            <?php } ?>
        </select>
    </div>

    <!-- Date -->
    <div class="mb-2">
        <label class="form-label">Appointment Date</label>
        <input type="date" name="appointment_date" class="form-control" required>
    </div>

    <!-- Time -->
    <div class="mb-2">
        <label class="form-label">Appointment Time</label>
        <input type="time" name="appointment_time" class="form-control" required>
    </div>

    <!-- Description -->
    <div class="mb-2">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>

    <button type="submit" class="btn btn-success">Add Appointment</button>
    <a href="appointments.php" class="btn btn-secondary">Back</a>

</form>

<?php include "../partials/footer.php"; ?>
