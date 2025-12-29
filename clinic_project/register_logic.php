<?php
include('db.php');

if(isset($_POST['btn_reg'])){
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "INSERT INTO users (fullname, email, password) VALUES ('$name', '$email', '$pass')";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Done! Now login.'); window.location='login_page.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>