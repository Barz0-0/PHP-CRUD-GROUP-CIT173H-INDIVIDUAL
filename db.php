<?php
// Shared PDO connection used by every page in this application.
$host = "localhost";
$dbname = "employee_management";
$username = "root";
$password = ""; // Default XAMPP MySQL password is commonly blank.

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch (PDOException $e) {
    // Do not expose database credentials or technical details to visitors.
    error_log($e->getMessage());
    http_response_code(500);
    exit("Database connection failed. Check your XAMPP MySQL service and db.php settings.");
}

// Escape values before placing database/user data into HTML.
function e($value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}
?>
