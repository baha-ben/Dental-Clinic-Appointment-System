<?php
session_start();
include('db.php');

// Security check: if not logged in, go to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login_page.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$message = "";

// Booking Logic
if (isset($_POST['btn_book'])) {
    $date = $_POST['app_date'];
    $time = $_POST['app_time'];

    // Simple insert query
    $sql = "INSERT INTO appointments (user_id, app_date, app_time) VALUES ('$user_id', '$date', '$time')";
    
    if (mysqli_query($conn, $sql)) {
        $message = "<p class='success'>Appointment booked successfully!</p>";
    } else {
        $message = "<p class='error'>Error: Could not book appointment.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Appointment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .booking-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            width: 350px;
            text-align: center;
        }
        h2 { color: #2c3e50; margin-bottom: 20px; }
        label { display: block; text-align: left; margin-bottom: 5px; font-weight: bold; color: #555; }
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box; /* To keep padding inside width */
        }
        .btn-confirm {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn-confirm:hover { background-color: #2980b9; }
        .back-link { display: block; margin-top: 15px; color: #7f8c8d; text-decoration: none; font-size: 14px; }
        .success { color: #27ae60; font-weight: bold; }
        .error { color: #e74c3c; font-weight: bold; }
    </style>
</head>
<body>

    <div class="booking-card">
        <h2>Book a Visit</h2>
        
        <?php echo $message; ?>

        <form action="" method="POST" id="bookingForm">
            <label>Select Date:</label>
            <input type="date" name="app_date" id="app_date" required>

            <label>Select Time:</label>
            <input type="time" name="app_time" required>

            <button type="submit" name="btn_book" class="btn-confirm">Confirm Appointment</button>
        </form>

        <a href="dashboard.php" class="back-link">← Back to Dashboard</a>
    </div>

    <script>
        // Simple JS to prevent selecting past dates
        var today = new Date().toISOString().split('T')[0];
        document.getElementById('app_date').setAttribute('min', today);
    </script>

</body>
</html>