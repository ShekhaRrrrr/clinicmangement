<?php
require "../../actions/auth/middleware.php";
requireAuth('admin');
require "../../dbconfig/dbconfig.php";

include "../partials/admin_header.php";

$user_id = $_GET['user_id'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE user_id = $user_id");
$user = mysqli_fetch_assoc($result);
?>

<div class="container mt-4">
    <h2>Edit User</h2>

    <form method="POST" action="../../actions/admin/update_user.php">
        <input type="hidden" name="user_id" value="<?= $user['user_id']; ?>">

        <div class="mb-2">
            <label>Name</label>
            <input type="text" name="username" value="<?= $user['username']; ?>" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Email</label>
            <input type="email" name="email" value="<?= $user['email']; ?>" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Password (leave blank to keep current)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-2">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="admin" <?= $user['role']=='admin'?'selected':'' ?>>Admin</option>
                <option value="user" <?= $user['role']=='user'?'selected':'' ?>>Staff</option>
            </select>
        </div>

        <button type="submit" class="btn btn-warning">Update User</button>
        <a href="users.php" class="btn btn-secondary">Back</a>
    </form>
</div>

<?php include "../partials/footer.php"; ?>
