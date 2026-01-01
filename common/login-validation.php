<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        header("Location: login.php?error=All fields are required");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: login.php?error=Invalid email format");
        exit();
    }

 
    $_SESSION['user_email'] = $email;

    header("Location: dashboard.php");
    exit();

} else {
    
    header("Location: login.php");
    exit();
}