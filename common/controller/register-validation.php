<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name     = trim($_POST['name']);
    $phone    = trim($_POST['phone']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role     = trim($_POST['role']);

    
    if (empty($name) || empty($phone) || empty($email) || empty($password) || empty($role)) {
        header("Location: register.php?error=All fields are required");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: register.php?error=Invalid email format");
        exit();
    }

    if (!preg_match("/^[0-9]{10,15}$/", $phone)) {
        header("Location: register.php?error=Invalid phone number");
        exit();
    }

    if (strlen($password) < 5) {
        header("Location: register.php?error=Password must be at least 5 characters");
        exit();
    }


    header("Location: login.php?success=Registration successful! Please Login.");
    exit();

} else {
    header("Location: register.php");
    exit();
}