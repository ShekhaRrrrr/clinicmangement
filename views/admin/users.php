<?php
require "../../actions/auth/middleware.php";
requireAuth('admin');
require "../../dbconfig/dbconfig.php";
include "../partials/admin_header.php";

// Fetch all users
$result = mysqli_query($conn, "SELECT * FROM users ORDER BY user_id DESC");
?>

<div class="container">
    <div class="content-container">
        <h2>Manage Users</h2>
        <a href="user_add.php" class="btn btn-success mb-3">
            <i class="bi bi-plus-circle"></i> Add New User
        </a>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $row['user_id']; ?></td>
                    <td><?= $row['username']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><span class="badge bg-primary"><?= ucfirst($row['role']); ?></span></td>
                    <td>
                        <a href="user_edit.php?user_id=<?= $row['user_id']; ?>" 
                           class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <a href="../../actions/admin/delete_user.php?user_id=<?= $row['user_id']; ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Are you sure you want to delete this user?');">
                            <i class="bi bi-trash"></i> Delete
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "../partials/footer.php"; ?>