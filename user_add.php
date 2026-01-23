<?php
require "../../actions/auth/middleware.php";
requireAuth('admin');
require "../../dbconfig/dbconfig.php";
include "../partials/admin_header.php";
?>

<div class="container mt-4">
    <h2>Add New User</h2>

    <form method="POST" action="../../actions/admin/add_user.php">
        <div class="mb-2">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="admin">Admin</option>
                <option value="user">Staff</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Add User</button>
        <a href="users.php" class="btn btn-secondary">Back</a>
    </form>
</div>

<?php include "../partials/footer.php"; ?>