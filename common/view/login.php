<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bakery Hub</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<div class="form-container">
    <h2>Login</h2>

    
    <?php
    if (isset($_GET['error'])) {
        echo "<p style='color:red;'>".$_GET['error']."</p>";
    }
    ?>

    <form action="login-validation.php" method="POST">
        <label>Email:</label>
        <input type="email" name="email" placeholder="Email"><br>

        <label>Password:</label>
        <input type="password" name="password" placeholder="Password" ><br>

        <button type="submit">Login</button>
    </form>

    <p>Don't have an account? <a href="register.php">Register here</a></p>
</div>

</body>
</html>
