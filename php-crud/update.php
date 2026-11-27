<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$id = filter_var($_POST["employee_id"] ?? "", FILTER_VALIDATE_INT);
$employee_number = trim($_POST["employee_number"] ?? "");
$first_name = trim($_POST["first_name"] ?? "");
$last_name = trim($_POST["last_name"] ?? "");
$email = trim($_POST["email"] ?? "");
$phone = trim($_POST["phone"] ?? "");
$department = trim($_POST["department"] ?? "");
$position = trim($_POST["position"] ?? "");
$employment_status = trim($_POST["employment_status"] ?? "");

$allowed_departments = ["Administration", "Finance", "Human Resources", "Information Technology", "Marketing", "Operations", "Sales"];
$allowed_statuses = ["Active", "Inactive"];

if (
    !$id || $id < 1 ||
    $employee_number === "" || strlen($employee_number) > 30 ||
    $first_name === "" || strlen($first_name) > 100 ||
    $last_name === "" || strlen($last_name) > 100 ||
    !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 150 ||
    $phone === "" || strlen($phone) > 30 ||
    !in_array($department, $allowed_departments, true) ||
    $position === "" || strlen($position) > 100 ||
    !in_array($employment_status, $allowed_statuses, true)
) {
    http_response_code(422);
    exit("Invalid input. Return to the employee form and check all fields.");
}

try {
    $sql = "UPDATE employees SET
        employee_number = ?, first_name = ?, last_name = ?, email = ?,
        phone = ?, department = ?, position = ?, employment_status = ?
        WHERE employee_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        $employee_number, $first_name, $last_name, $email,
        $phone, $department, $position, $employment_status, $id
    ]);

    header("Location: index.php?message=updated");
    exit;
} catch (PDOException $e) {
    error_log($e->getMessage());
    if ($e->getCode() === "23000") {
        http_response_code(409);
        exit("Employee number or email already belongs to another employee.");
    }
    http_response_code(500);
    exit("Unable to update the employee record.");
}
?>
