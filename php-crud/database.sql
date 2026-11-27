CREATE DATABASE IF NOT EXISTS employee_management
    CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE employee_management;

CREATE TABLE IF NOT EXISTS employees (
    employee_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    employee_number VARCHAR(30) NOT NULL UNIQUE,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    phone VARCHAR(30) NOT NULL,
    department VARCHAR(100) NOT NULL,
    position VARCHAR(100) NOT NULL,
    employment_status ENUM('Active', 'Inactive') NOT NULL DEFAULT 'Active',
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- Optional sample records for initial testing.
-- Remove or change these sample values if they conflict with your own data.
INSERT IGNORE INTO employees
(employee_number, first_name, last_name, email, phone, department, position, employment_status)
VALUES
('EMP-2026-001', 'Juan', 'Dela Cruz', 'juan.delacruz@example.com', '09171234567', 'Human Resources', 'HR Assistant', 'Active'),
('EMP-2026-002', 'Maria', 'Santos', 'maria.santos@example.com', '09181234567', 'Information Technology', 'IT Support Specialist', 'Active'),
('EMP-2026-003', 'Pedro', 'Reyes', 'pedro.reyes@example.com', '09191234567', 'Finance', 'Accounting Clerk', 'Inactive');
