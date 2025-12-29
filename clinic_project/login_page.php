<?php session_start(); include('db.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { font-family: Arial; background-color: #eef2f3; text-align: center; }
        .box { width: 350px; background: white; margin: 50px auto; padding: 20px; border-radius: 10px; border: 1px solid #ccc; }
        input { width: 90%; padding: 10px; margin: 10px 0; }
        button { background: #2ecc71; color: white; border: none; padding: 10px 20px; cursor: pointer; width: 100%; }
    </style>
</head>
<body>
    <div class="box">
        <h2>Login to Clinic</h2>
        <form action="" method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="btn_login">Login</button>
        </form>
        <?php
        if(isset($_POST['btn_login'])){
            $e = $_POST['email']; $p = $_POST['password'];
            $res = mysqli_query($conn, "SELECT * FROM users WHERE email='$e' AND password='$p'");
            if(mysqli_num_rows($res) > 0){
                $row = mysqli_fetch_assoc($res);
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user_name'] = $row['fullname'];
                header("Location: dashboard.php");
            } else { echo "<p style='color:red;'>Wrong data!</p>"; }
        }
        ?>
    </div>
    <script src="js/script.js"></script>
</body>
</html>