<?php
session_start();
include('db.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login_page.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'];

// Fetch user appointments from the database
$query = "SELECT * FROM appointments WHERE user_id = '$user_id' ORDER BY app_date ASC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard - Clinic</title>
    <style>
        /* Simple Human-made Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #2c3e50;
            color: white;
            padding: 15px;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h2 { color: #2c3e50; }
        .welcome-msg {
            font-size: 18px;
            margin-bottom: 20px;
            border-left: 5px solid #3498db;
            padding-left: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th {
            background-color: #3498db;
            color: white;
            padding: 12px;
            text-align: left;
        }
        td {
            padding: 10px;
            text-align: left;
        }
        tr:nth-child(even) { background-color: #f9f9f9; }
        .btn-book {
            display: inline-block;
            background-color: #27ae60;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 10px;
        }
        .logout-link {
            color: #e74c3c;
            text-decoration: none;
            font-weight: bold;
            float: right;
        }
    </style>
</head>
<body>
    
    <div class="navbar">
        <h1>Dental Clinic Management</h1>
    </div>

    <div class="container">
        <a href="logout.php" class="logout-link">Logout</a>
        <div class="welcome-msg">
            Welcome back, <strong><?php echo $user_name; ?></strong>! <br>
            Here you can manage your appointments.
        </div>

        <h2>Your Appointments</h2>
        
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Visit Date</th>
                        <th>Visit Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td>#<?php echo $row['id']; ?></td>
                            <td><?php echo $row['app_date']; ?></td>
                            <td><?php echo $row['app_time']; ?></td>
                            <td style="color: green; font-weight: bold;">Confirmed</td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>You don't have any appointments yet.</p>
        <?php endif; ?>

        <br>
        <a href="book_appointment.php" class="btn-book">Book New Appointment</a>
    </div>
    

<script src="js/script.js"></script>

</body>
</html>