<!DOCTYPE html>
<html>
<head>
    <title>Dental Clinic - Home</title>
    <style>
        /* CSS internal to avoid linking issues */
        body { font-family: Arial; background-color: #eef2f3; text-align: center; }
        .box { width: 350px; background: white; margin: 50px auto; padding: 20px; border-radius: 10px; border: 1px solid #ccc; }
        input { width: 90%; padding: 10px; margin: 10px 0; }
        button { background: #3498db; color: white; border: none; padding: 10px 20px; cursor: pointer; width: 100%; }
        button:hover { background: #2980b9; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Patient Registration</h2>
        <form action="register_logic.php" method="POST">
            <input type="text" name="fullname" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Create Password" required>
            <button type="submit" name="btn_reg">Register Now</button>
        </form>
        <p>Already have an account? <a href="login_page.php">Login here</a></p>
    </div>
    <script src="js/script.js"></script>
</body>
</html>