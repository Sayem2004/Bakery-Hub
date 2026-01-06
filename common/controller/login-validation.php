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

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        header("Location: ../view/login.php?error=All fields are required");
        exit();
    }

    $user = $db->loginUser($conn, "users", $email, $password);

    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];
        $_SESSION['user_email'] = $user['email'];

        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'role' => $user['role'],
            'email' => $user['email']
        ];

        
        switch ($user['role']) {
            case 'customer':
                header("Location: ../../Customer/view/customer_dashboard.php");
                break;

            case 'staff':
                header("Location: ../../Staff/view/staff_dashboard.php");
                break;

            case 'delivery':
                header("Location: ../../Delivery/view/delivery_dashboard.php");
                break;

            default:
                header("Location: ../view/dashboard.php");
                break;
        }
        
        exit();

    } else {
        header("Location: ../view/login.php?error=Incorrect email or password");
        exit();
    }

} else {
    header("Location: ../view/login.php");
    exit();
}
?>