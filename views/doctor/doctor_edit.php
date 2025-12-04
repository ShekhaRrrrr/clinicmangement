<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "../../dbconfig/dbconfig.php";
$doctor_id = $_GET['doctor_id'];

$result = mysqli_query($conn, "SELECT * FROM doctors WHERE doctor_id = $doctor_id");
$doctor = mysqli_fetch_assoc($result);

include "../partials/header.php";
?>

<h2>Edit Doctor</h2>

<form method="POST" action="../../actions/doctors/update.php" class="mb-3">
    <input type="hidden" name="doctor_id" value="<?= $doctor['doctor_id']; ?>">

    <div class="mb-2">
        <label class="form-label">Name:</label>
        <input type="text" name="name" value="<?= $doctor['name']; ?>" class="form-control" required>
    </div>

    <div class="mb-2">
        <label class="form-label">Department:</label>
        <input type="text" name="department" value="<?= $doctor['department']; ?>" class="form-control" required>
    </div>

    <div class="mb-2">
        <label class="form-label">Qualifications:</label>
        <input type="text" name="qualifications" value="<?= $doctor['qualifications']; ?>" class="form-control" required>
    </div>

    <div class="mb-2">
        <label class="form-label">Phone:</label>
        <input type="text" name="phone" value="<?= $doctor['phone']; ?>" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Update Doctor</button>
    <a href="doctors.php" class="btn btn-secondary">Back</a>
</form>

<?php include "../partials/footer.php"; ?>