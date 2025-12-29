# Dental Clinic Appointment System

## Description
This is a simple web-based system for a dental clinic created using **HTML, CSS, JavaScript, and PHP**. It allows patients to register an account, log in, and manage their dental appointments. The system uses **MySQL** as a database and is designed to run on a local server like **XAMPP**.

## Features
* **User Registration:** Patients can create a new account.
* **Secure Login:** Access to the dashboard is protected by sessions.
* **Appointment Booking:** Patients can choose a date and time for their visit.
* **Dashboard:** A summary table showing all the patient's booked appointments.
* **JS Validation:** Simple client-side checks for forms and dates.

## Folder Structure
* `index.php` - Registration page (Home).
* `login_page.php` - User login.
* `db.php` - Database connection settings.
* `dashboard.php` - Patient's private panel.
* `book_appointment.php` - Booking form.
* `js/script.js` - Custom JavaScript for UI effects.
* `logout.php` - Terminates user session.

## Requirements
* XAMPP or any local server with PHP 7.4+ support.
* Web Browser (Chrome, Firefox, etc.).

## How to Run
1.  **Extract** the folder into `C:/xampp/htdocs/`.
2.  **Open XAMPP Control Panel** and start Apache and MySQL.
3.  **Create Database:**
    * Go to `localhost/phpmyadmin`.
    * Create a new database named `clinic_db`.
    * Import the SQL commands (provided in the code files) to create `users` and `appointments` tables.
4.  **Open Browser** and type: `http://localhost/clinic_project/index.php`.

## Author
Baha Taki Eddine Ben Abdallah - 2023/2024 Project
