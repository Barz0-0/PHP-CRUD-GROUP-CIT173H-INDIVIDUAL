<?php
require_once "db.php";

$search = trim($_GET["search"] ?? "");
if ($search !== "") {
    $sql = "SELECT * FROM employees
            WHERE employee_number LIKE ?
               OR first_name LIKE ?
               OR last_name LIKE ?
               OR email LIKE ?
               OR department LIKE ?
               OR position LIKE ?
            ORDER BY employee_id DESC";
    $stmt = $pdo->prepare($sql);
    $keyword = "%" . $search . "%";
    $stmt->execute([$keyword, $keyword, $keyword, $keyword, $keyword, $keyword]);
} else {
    $stmt = $pdo->query("SELECT * FROM employees ORDER BY employee_id DESC");
}
$employees = $stmt->fetchAll();

$messages = [
    "added" => "Employee successfully added.",
    "updated" => "Employee information successfully updated.",
    "deleted" => "Employee successfully deleted."
];
$message = $messages[$_GET["message"] ?? ""] ?? "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Information Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark app-navbar">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="index.php">EIMS | Employee Management</a>
        <span class="navbar-text text-white-50">Employee Information Management System</span>
    </div>
</nav>
<main class="container py-5">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <p class="eyebrow mb-1">ADMINISTRATION</p>
            <h1 class="h2 mb-1">Employee Directory</h1>
            <p class="text-secondary mb-0">View, search, add, edit, and manage employee records.</p>
        </div>
        <a href="create.php" class="btn btn-primary">+ Add Employee</a>
    </div>

    <?php if ($message !== ""): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= e($message) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <section class="card app-card">
        <div class="card-body p-4">
            <form method="GET" action="index.php" class="mb-4">
                <label for="search" class="form-label fw-semibold">Search employees</label>
                <div class="input-group">
                    <input class="form-control" type="search" id="search" name="search"
                           placeholder="Employee number, name, email, department, or position"
                           value="<?= e($search) ?>">
                    <button class="btn btn-dark" type="submit">Search</button>
                    <a class="btn btn-outline-secondary" href="index.php">Reset</a>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                    <tr>
                        <th>ID</th><th>Employee No.</th><th>Employee Name</th><th>Email</th>
                        <th>Department</th><th>Position</th><th>Status</th><th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (count($employees) > 0): ?>
                        <?php foreach ($employees as $employee): ?>
                            <tr>
                                <td><?= e($employee["employee_id"]) ?></td>
                                <td class="fw-semibold"><?= e($employee["employee_number"]) ?></td>
                                <td><?= e($employee["first_name"] . " " . $employee["last_name"]) ?></td>
                                <td><?= e($employee["email"]) ?></td>
                                <td><?= e($employee["department"]) ?></td>
                                <td><?= e($employee["position"]) ?></td>
                                <td>
                                    <span class="badge <?= $employee["employment_status"] === "Active" ? "text-bg-success" : "text-bg-secondary" ?>">
                                        <?= e($employee["employment_status"]) ?>
                                    </span>
                                </td>
                                <td class="text-nowrap">
                                    <a class="btn btn-sm btn-outline-primary" href="edit.php?id=<?= e($employee["employee_id"]) ?>">Edit</a>
                                    <form class="d-inline" action="delete.php" method="POST"
                                          onsubmit="return confirmDelete('<?= e($employee["employee_number"]) ?>');">
                                        <input type="hidden" name="employee_id" value="<?= e($employee["employee_id"]) ?>">
                                        <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="8" class="text-center text-secondary py-4">No employee records found.</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-between text-secondary small">
                <span>Total records displayed: <?= count($employees) ?></span>
                <?php if ($search !== ""): ?><span>Search: <?= e($search) ?></span><?php endif; ?>
            </div>
        </div>
    </section>
    <p class="text-center text-secondary small mt-4">Employee Information Management System · PHP and MySQL CRUD Laboratory Project</p>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>
