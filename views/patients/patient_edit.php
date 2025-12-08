<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "../../dbconfig/dbconfig.php";
$patient_id = $_GET['patient_id'];

$result = mysqli_query($conn, "SELECT * FROM patients WHERE patient_id = $patient_id");
$patient = mysqli_fetch_assoc($result);

include "../partials/header.php";
?>

<h2>Edit Patient</h2>

<form method="POST" action="../../actions/patient/update.php" class="mb-3">
    <input type="hidden" name="patient_id" value="<?= $patient['patient_id']; ?>">

    <div class="mb-2">
        <label class="form-label">Name:</label>
        <input type="text" name="name" value="<?= $patient['name']; ?>" class="form-control" required>
    </div>

    <div class="mb-2">
        <label class="form-label">Gender:</label>
        <input type="text" name="gender" value="<?= $patient['gender']; ?>" class="form-control" required>
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