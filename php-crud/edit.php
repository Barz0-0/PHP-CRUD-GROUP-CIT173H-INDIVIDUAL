<?php
require_once "db.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
if (!$id || $id < 1) {
    http_response_code(400);
    exit("Invalid employee ID.");
}

$stmt = $pdo->prepare("SELECT * FROM employees WHERE employee_id = ?");
$stmt->execute([$id]);
$employee = $stmt->fetch();

if (!$employee) {
    http_response_code(404);
    exit("Employee record not found.");
}

$departments = ["Administration", "Finance", "Human Resources", "Information Technology", "Marketing", "Operations", "Sales"];
$statuses = ["Active", "Inactive"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Employee | EIMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark app-navbar"><div class="container"><a class="navbar-brand fw-semibold" href="index.php">EIMS | Employee Management</a></div></nav>
<main class="container py-5">
    <div class="row justify-content-center"><div class="col-lg-8">
        <div class="card app-card">
            <div class="card-header"><h1 class="h4 mb-0">Edit Employee Information</h1></div>
            <div class="card-body p-4">
                <p class="text-secondary">Update the fields below and save your changes.</p>
                <form action="update.php" method="POST">
                    <input type="hidden" name="employee_id" value="<?= e($employee["employee_id"]) ?>">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" for="employee_number">Employee Number</label>
                            <input class="form-control" id="employee_number" name="employee_number" maxlength="30" value="<?= e($employee["employee_number"]) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="email">Email Address</label>
                            <input class="form-control" type="email" id="email" name="email" maxlength="150" value="<?= e($employee["email"]) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="first_name">First Name</label>
                            <input class="form-control" id="first_name" name="first_name" maxlength="100" value="<?= e($employee["first_name"]) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="last_name">Last Name</label>
                            <input class="form-control" id="last_name" name="last_name" maxlength="100" value="<?= e($employee["last_name"]) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="phone">Contact Number</label>
                            <input class="form-control" id="phone" name="phone" maxlength="30" value="<?= e($employee["phone"]) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="department">Department</label>
                            <select class="form-select" id="department" name="department" required>
                                <?php foreach ($departments as $department): ?>
                                    <option value="<?= e($department) ?>" <?= $employee["department"] === $department ? "selected" : "" ?>><?= e($department) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="position">Job Position</label>
                            <input class="form-control" id="position" name="position" maxlength="100" value="<?= e($employee["position"]) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="employment_status">Employment Status</label>
                            <select class="form-select" id="employment_status" name="employment_status" required>
                                <?php foreach ($statuses as $status): ?>
                                    <option value="<?= e($status) ?>" <?= $employee["employment_status"] === $status ? "selected" : "" ?>><?= e($status) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex gap-2 mt-4">
                        <button class="btn btn-primary" type="submit">Update Employee</button>
                        <a class="btn btn-outline-secondary" href="index.php">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div></div>
</main>
</body>
</html>
