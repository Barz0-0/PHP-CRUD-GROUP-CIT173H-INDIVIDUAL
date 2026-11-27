# EIMS Testing Documentation

**Project:** Employee Information Management System  
**Environment:** XAMPP (Apache and MySQL), PHP, MySQL/MariaDB, browser  
**Tester:** [Your name]  
**Test date:** [Date performed]

Record the actual result after running each test. Do not mark a test as passed until you have verified it.

| # | Test case | Procedure | Expected result | Actual result / Pass or Fail |
|---|---|---|---|---|
| 1 | Database connection | Open the application after starting Apache and MySQL | Employee listing loads without a database connection error | |
| 2 | Add employee | Submit a valid employee form | New employee is saved and appears in the listing | |
| 3 | Required fields | Submit the form with a required field empty | Browser/PHP validation prevents invalid data | |
| 4 | Invalid email | Enter an invalid email address | Form submission is rejected | |
| 5 | Duplicate employee number | Add an employee number already in use | Duplicate is rejected with a clear message | |
| 6 | Display records | Open the main page | Records are retrieved from the employees table | |
| 7 | Search employee number | Search for an existing employee number | Matching record appears | |
| 8 | Search employee name | Search for a first or last name | Matching record appears | |
| 9 | Search department/position | Search for an existing department or position | Matching record appears | |
| 10 | Reset search | Click Reset | All employee records appear again | |
| 11 | Edit employee | Change an employee's details and submit | Updated details appear in the listing and database | |
| 12 | Delete confirmation – Cancel | Click Delete, then Cancel | Employee remains in the database | |
| 13 | Delete confirmation – OK | Click Delete, then OK | Selected employee is deleted | |
| 14 | Invalid edit ID | Open edit.php with a nonnumeric or missing ID | Application rejects the invalid ID | |
| 15 | Invalid delete request | Attempt to open delete.php directly with GET | Application redirects without deleting anything | |

## Test summary
- Total tests performed: [Enter number]
- Passed: [Enter number]
- Failed: [Enter number]
- Issues found and fixes: [Describe actual issues and fixes]

## Evidence
Place screenshots of the actual application in the `screenshots/` directory and reference their filenames here.
