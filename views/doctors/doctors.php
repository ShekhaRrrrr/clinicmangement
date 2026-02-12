<?php
require "../../actions/auth/middleware.php";
requireAuth('user');

require "../../dbconfig/dbconfig.php";
include "../partials/header.php";

$user_id = $_SESSION['user_id'];

// FIXED: user_id=$user_id (not $user_id=user_id)

$result = mysqli_query($conn, "SELECT * FROM doctors ORDER BY doctor_id DESC");
?>

<!-- Landing Page Hero Section -->
<style>
    .hero {
        padding: 80px 20px;
        background: linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)),
                    url('https://images.unsplash.com/photo-1580281658629-7134a5d0f2b8?auto=format&fit=crop&w=1200&q=80') center/cover;
        color: white;
        text-align: center;
        border-radius: 12px;
        margin-bottom: 40px;
    }
    .hero h1 {
        font-size: 3rem;
        font-weight: 700;
    }
    .hero p {
        font-size: 1.25rem;
        opacity: 0.9;
    }
    .landing-container {
        max-width: 1100px;
        margin: auto;
    }
    .card {
        border-radius: 12px;
    }
</style>

<div class="landing-container">

    <!-- Hero Section -->
    <div class="hero shadow">
        <h1>Our Doctors</h1>
        <p>Your health is our priority. Meet our qualified and experienced medical professionals.</p>
        <a href="doctor_add.php" class="btn btn-lg btn-primary mt-3">
            <i class="bi bi-person-plus"></i> Add New Doctor
        </a>
    </div>

    <!-- Doctors Table Section -->
    <div class="card shadow-sm border-0 mb-5">
        <div class="card-header py-3 bg-primary text-white">
            <h4 class="mb-0">Doctors Directory</h4>
        </div>

        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0 align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Qualifications</th>
                        <th>Phone</th>
                        <th class="text-center" style="width: 160px;">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row['doctor_id']; ?></td>
                        <td class="fw-semibold"><?= $row['name']; ?></td>
                        <td><?= $row['department']; ?></td>
                        <td><?= $row['qualifications']; ?></td>
                        <td><?= $row['phone']; ?></td>

                        <td class="text-center">
                            <a href="doctor_edit.php?doctor_id=<?= $row['doctor_id']; ?>" 
                               class="btn btn-outline-warning btn-sm me-1">
                                <i class="bi bi-pencil"></i>
                            </a>

                            <a href="../../actions/doctors/delete.php?doctor_id=<?= $row['doctor_id']; ?>" 
                               class="btn btn-outline-danger btn-sm"
                               onclick="return confirm('Delete this doctor?');">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<?php include "../partials/footer.php"; ?>