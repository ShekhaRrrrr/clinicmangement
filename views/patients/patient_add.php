<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../partials/header.php";
?>

<h2>Add Patient</h2>

<form method="POST" action="../../actions/patient/add.php" class="mb-3">
    <div class="mb-2">
        <label class="form-label">Name:</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-2">
        <label class="form-label">Age:</label>
        <input type="text" name="age" class="form-control" required>
    </div>

    <div class="mb-2">
        <label class="form-label">Gender:</label>
        <input type="text" name="gender" class="form-control" required>
    </div>

    <div class="mb-2">
        <label class="form-label">Phone:</label>
        <input type="text" name="phone" class="form-control" required>
    </div>
    <div class="mb-2">
        <label class="form-label">Address</label>
        <input type="text" name="address" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Add Patient</button>
    <a href="patients.php" class="btn btn-secondary">Back</a>
</form>

<?php include "../partials/footer.php"; ?>