<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "../../dbconfig/dbconfig.php";

$appointment_id = $_GET['appointment_id'];

// Fetch appointment details
$appointment_q = mysqli_query($conn, "SELECT * FROM appointments WHERE appointment_id = $appointment_id");
$appointment = mysqli_fetch_assoc($appointment_q);

// Fetch doctors
$doctors_q = mysqli_query($conn, "SELECT doctor_id, name FROM doctors");

// Fetch patients
$patients_q = mysqli_query($conn, "SELECT patient_id, name FROM patients");

include "../partials/header.php";
?>

<h2>Edit Appointment</h2>

<form method="POST" action="../../actions/appointment/update.php">

    <input type="hidden" name="appointment_id" value="<?= $appointment['appointment_id']; ?>">

    <!-- PATIENT -->
    <div class="mb-2">
        <label class="form-label">Patient</label>
        <select name="patient_id" class="form-control" required>
            <?php while($p = mysqli_fetch_assoc($patients_q)) { ?>
                <option value="<?= $p['patient_id'] ?>" 
                    <?= $p['patient_id'] == $appointment['patient_id'] ? 'selected' : '' ?>>
                    <?= $p['name'] ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <!-- DOCTOR -->
    <div class="mb-2">
        <label class="form-label">Doctor</label>
        <select name="doctor_id" class="form-control" required>
            <?php while($d = mysqli_fetch_assoc($doctors_q)) { ?>
                <option value="<?= $d['doctor_id'] ?>" 
                    <?= $d['doctor_id'] == $appointment['doctor_id'] ? 'selected' : '' ?>>
                    <?= $d['name'] ?>
                </option>
            <?php } ?>
        </select>
    </div>

    <!-- DATE -->
    <div class="mb-2">
        <label class="form-label">Date</label>
        <input type="date" name="appointment_date" 
               value="<?= $appointment['appointment_date'] ?>" 
               class="form-control" required>
    </div>

    <!-- TIME -->
    <div class="mb-2">
        <label class="form-label">Time</label>
        <input type="time" name="appointment_time" 
               value="<?= $appointment['appointment_time'] ?>" 
               class="form-control" required>
    </div>

    <!-- DESCRIPTION -->
    <div class="mb-2">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" required><?= $appointment['description'] ?></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update Appointment</button>
    <a href="appointments.php" class="btn btn-secondary">Back</a>

</form>

<?php include "../partials/footer.php"; ?>
