<?php
session_start();

$path = __DIR__."/../model/db_connect.php";
if(!file_exists($path)){
    die("Database File not found");
}
require_once $path;

$db = new DatabaseConnection();
$conn = $db->openConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name     = trim($_POST['name']);
    $phone    = trim($_POST['phone']);
    $email    = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role     = trim($_POST['role']);

    if (empty($name) || empty($phone) || empty($email) || empty($password) || empty($role)) {
        header("Location: ../view/register.php?error=All fields are required");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../view/register.php?error=Invalid email format");
        exit();
    }

    if (!preg_match("/^[0-9]{10,15}$/", $phone)) {
        header("Location: ../view/register.php?error=Invalid phone number");
        exit();
    }

    if (strlen($password) < 5) {
        header("Location: ../view/register.php?error=Password must be at least 5 characters");
        exit();
    }


    $result = $db->registerUser($conn, "users", $name, $phone, $email, $password, $role);

    if ($result === true) {
        header("Location: ../view/login.php?success=Registration successful! Please Login.");
    } 
    elseif ($result === "EmailExists") {
        header("Location: ../view/register.php?error=Email already exists!");
    } 
    else {
        header("Location: ../view/register.php?error=" . urlencode($result));
    }

} else {
    header("Location: ../view/register.php");
    exit();
}
?>