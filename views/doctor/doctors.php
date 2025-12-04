<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require "../../dbconfig/dbconfig.php";
include "../partials/header.php";

$result = mysqli_query($conn, "SELECT * FROM doctors ORDER BY doctor_id DESC");
?>

<h2>Doctors List</h2>
<a href="doctor_add.php" class="btn btn-success mb-3">Add Doctor</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Department</th>
            <th>Qualifications</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['doctor_id']; ?></td>
            <td><?= $row['name']; ?></td>
            <td><?= $row['department']; ?></td>
            <td><?= $row['qualifications']; ?></td>
            <td><?= $row['phone']; ?></td>
            <td>
                <a href="doctor_edit.php?doctor_id=<?= $row['doctor_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="../../actions/doctors/delete.php?doctor_id=<?= $row['doctor_id']; ?>" 
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Delete doctor?');">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<?php include "../partials/footer.php"; ?>