# PHP-CRUD-GROUP-CIT173H-INDIVIDUAL
Laboratory Activity: PHP CRUD Application Development

# Employee Information Management System (EIMS)

A PHP and MySQL CRUD web application developed for the PHP CRUD Application Development laboratory activity. The system manages employee records and demonstrates Create, Read, Update, Delete, search, validation, and database connectivity.

## Technologies
- PHP
- MySQL / MariaDB
- PDO
- HTML5 and CSS3
- Bootstrap 5.3
- JavaScript
- XAMPP
- Git and GitHub

## Features
- Add employee records
- Display all employee records from MySQL
- Search by employee number, first name, last name, email, department, or position
- Edit existing employee records
- Delete employee records after confirmation
- Validate required fields and email addresses
- Prevent duplicate employee numbers and email addresses
- Use prepared statements and escape displayed HTML

## Project structure
```text
employee-information-management-system/
├── index.php
├── db.php
├── database.sql
├── create.php
├── add.php
├── edit.php
├── update.php
├── delete.php
├── assets/
│   ├── css/style.css
│   └── js/script.js
├── screenshots/
└── README.md
```

## Installation using XAMPP
1. Install and open XAMPP.
2. Start **Apache** and **MySQL**.
3. Copy this project folder into XAMPP's `htdocs` directory.
4. Open `http://localhost/phpmyadmin`.
5. Select the **Import** tab, choose `database.sql`, and click **Import** (or open the SQL tab and execute its contents).
6. Check `db.php`. The default XAMPP settings are host `localhost`, database `employee_management`, username `root`, and a blank password. Change these if your MySQL configuration differs.
7. Open `http://localhost/employee-information-management-system/` in your browser. If you rename the folder to `php-crud`, use `http://localhost/php-crud/`.

## How to use
- Click **Add Employee** to open the registration form.
- Enter the required employee details and click **Save Employee**.
- Use the search field to find records.
- Click **Edit** to modify a record and save changes.
- Click **Delete**, then confirm to remove a record.

## Database
The SQL file creates the `employee_management` database and the `employees` table. `employee_id` is the auto-increment primary key. `employee_number` and `email` are unique.

## Four laboratory responsibilities (completed by one student)
| Activity part | Responsibility | Files |
|---|---|---|
| Part 1 | Database design and CREATE | `database.sql`, `db.php`, `create.php`, `add.php` |
| Part 2 | READ and SEARCH | `index.php` |
| Part 3 | UPDATE | `edit.php`, `update.php` |
| Part 4 | DELETE and integration | `delete.php`, `assets/`, testing documentation |

For the final submission, replace the group number, section, student name, and repository URL below with your actual information.

- **Project:** Employee Information Management System
- **Group number:** INDIVIDUAL
- **Section:** CIT17 3H
- **Developer:** Dawn Blanche R. Barsatan
- **Responsibilities:** Parts 1, 2, 3, and 4
- **GitHub repository:** (https://github.com/Barz0-0/PHP-CRUD-GROUP-CIT173H-INDIVIDUAL.git)

## Testing evidence
Save actual screenshots in the `screenshots/` folder:
- `dashboard.png` – employee listing page
- `create.png` – add employee form
- `read.png` – records displayed
- `update.png` – edited employee record
- `delete-confirmation.png` – browser confirmation prompt
- `delete-result.png` – listing after deletion
