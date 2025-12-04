<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../partials/header.php";
?>

<h2>Add Doctor</h2>

<form method="POST" action="../../actions/doctors/add.php" class="mb-3">
    <div class="mb-2">
        <label class="form-label">Name:</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-2">
        <label class="form-label">Department:</label>
        <input type="text" name="department" class="form-control" required>
    </div>

    <div class="mb-2">
        <label class="form-label">Qualifications:</label>
        <input type="text" name="qualifications" class="form-control" required>
    </div>

    <div class="mb-2">
        <label class="form-label">Phone:</label>
        <input type="text" name="phone" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Add Doctor</button>
    <a href="doctors.php" class="btn btn-secondary">Back</a>
</form>

<?php include "../partials/footer.php"; ?>