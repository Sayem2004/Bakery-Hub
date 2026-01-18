<?php
class DatabaseConnection {
   
    function openConnection() {
        $db_host = "localhost";
        $db_user = "root";
        $db_password = "";
        $db_name = "bakery_db"; 

        $connection = new mysqli($db_host, $db_user, $db_password, $db_name);

        if ($connection->connect_error) {
            die("Failed to connect database " . $connection->connect_error);
        }

        return $connection;
    }

    
    function registerUser($conn, $table, $name, $phone, $email, $password, $role) {
        $checkEmail = "SELECT * FROM $table WHERE email = '$email'";
        $result = $conn->query($checkEmail);
        
        if ($result->num_rows > 0) {
            return "EmailExists"; 
        }

        $sql = "INSERT INTO $table (name, phone, email, password, role) VALUES ('$name', '$phone', '$email', '$password', '$role')";
        
        if ($conn->query($sql) === TRUE) {
            return true;
        } else {
            return "Error: " . $conn->error;
        }
    }

    function loginUser($conn, $table, $email, $password) {
        $email = mysqli_real_escape_string($conn, $email);
        $password = mysqli_real_escape_string($conn, $password);

        $sql = "SELECT * FROM $table WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            return $result->fetch_assoc(); 
        } else {
            return false; 
        }
    }
} 
?>