<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "../../dbconfig/dbconfig.php";
$appointment_id = $_GET['appointment_id'];

$result = mysqli_query($conn, "SELECT * FROM appointments WHERE appointment_id = $appointment_id");
$appointment = mysqli_fetch_assoc($result);

include "../partials/header.php";
?>

<h2>Edit Appointments</h2>

<form method="POST" action="../../actions/appointment/update.php" class="mb-3">
    <input type="hidden" name="appointment_id" value="<?= $appointment['appointment_id']; ?>">

    <div class="mb-2">
        <label class="form-label">Appointment_Id:</label>
        <input type="text" name="appointment_id" value="<?= $appointment['appointment_id']; ?>" class="form-control" required>
    </div>

    <div class="mb-2">
        <label class="form-label">Descritpion:</label>
        <input type="text" name="description" value="<?= $appointment['description']; ?>" class="form-control" required>
    </div>

    <div class="mb-2">
        <label class="form-label">Address:</label>
        <input type="text" name="address" value="<?= $patient['address']; ?>" class="form-control" required>
    </div>

    <div class="mb-2">
        <label class="form-label">Phone:</label>
        <input type="text" name="phone" value="<?= $patient['phone']; ?>" class="form-control" required>
    </div>

    <div class="mb-2">
    <label class="form-label">Age:</label>
    <input type="text" name="age" value="<?= $patient['age']; ?>" class="form-control" required>
    </div>


    <button type="submit" class="btn btn-primary">Update Patient</button>
    <a href="patients.php" class="btn btn-secondary">Back</a>
</form>

<?php include "../partials/footer.php"; ?>