<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$id = filter_var($_POST["employee_id"] ?? "", FILTER_VALIDATE_INT);
if (!$id || $id < 1) {
    http_response_code(400);
    exit("Invalid employee ID.");
}

try {
    $stmt = $pdo->prepare("DELETE FROM employees WHERE employee_id = ?");
    $stmt->execute([$id]);

    if ($stmt->rowCount() > 0) {
        header("Location: index.php?message=deleted");
    } else {
        header("Location: index.php");
    }
    exit;
} catch (PDOException $e) {
    error_log($e->getMessage());
    http_response_code(500);
    exit("Unable to delete the employee record.");
}
?>
