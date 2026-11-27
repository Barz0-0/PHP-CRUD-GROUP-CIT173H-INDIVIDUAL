<?php
require_once "db.php";
$departments = ["Administration", "Finance", "Human Resources", "Information Technology", "Marketing", "Operations", "Sales"];
$statuses = ["Active", "Inactive"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Employee | EIMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark app-navbar">
    <div class="container"><a class="navbar-brand fw-semibold" href="index.php">EIMS | Employee Management</a></div>
</nav>
<main class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card app-card">
                <div class="card-header"><h1 class="h4 mb-0">Add New Employee</h1></div>
                <div class="card-body p-4">
                    <p class="text-secondary">Complete all required fields to register an employee.</p>
                    <form action="add.php" method="POST">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="employee_number">Employee Number</label>
                                <input class="form-control" id="employee_number" name="employee_number" maxlength="30" placeholder="EMP-2026-004" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="email">Email Address</label>
                                <input class="form-control" type="email" id="email" name="email" maxlength="150" placeholder="employee@example.com" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="first_name">First Name</label>
                                <input class="form-control" id="first_name" name="first_name" maxlength="100" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="last_name">Last Name</label>
                                <input class="form-control" id="last_name" name="last_name" maxlength="100" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="phone">Contact Number</label>
                                <input class="form-control" id="phone" name="phone" maxlength="30" placeholder="09XXXXXXXXX" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="department">Department</label>
                                <select class="form-select" id="department" name="department" required>
                                    <option value="">Select Department</option>
                                    <?php foreach ($departments as $department): ?>
                                        <option value="<?= e($department) ?>"><?= e($department) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="position">Job Position</label>
                                <input class="form-control" id="position" name="position" maxlength="100" placeholder="e.g. Office Staff" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="employment_status">Employment Status</label>
                                <select class="form-select" id="employment_status" name="employment_status" required>
                                    <?php foreach ($statuses as $status): ?>
                                        <option value="<?= e($status) ?>"><?= e($status) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex gap-2 mt-4">
                            <button class="btn btn-primary" type="submit">Save Employee</button>
                            <a class="btn btn-outline-secondary" href="index.php">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="assets/js/script.js"></script>
</body>
</html>
