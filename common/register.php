<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <link rel="stylesheet" href="register.css">
</head>
<body>

<div class="form-container">
    <h2>Customer Registration Form</h2>

    <!-- error message -->
    <?php
    if (isset($_GET['error'])) {
        echo "<p style='color:red;'>".$_GET['error']."</p>";
    }
    if (isset($_GET['success'])) {
        echo "<p style='color:green;'>".$_GET['success']."</p>";
    }
    ?>

    <form action="register-validation.php" method="POST">

        <label>Name</label><br>
        <input type="text" name="name" placeholder="Name"><br>

        <label>Phone</label><br>
        <input type="text" name="phone" placeholder="Phone"><br>

        <label>Email</label><br>
        <input type="email" name="email" placeholder="Email"><br>

        <label>Password</label><br>
        <input type="password" name="password" placeholder="Password"><br>

        <label>Role</label><br>
        <select name="role">
            <option value="">Select Role</option>
            <option value="customer">Customer</option>
            <option value="staff">Staff</option>
            <option value="delivery">Delivery</option>
        </select>

        <p>Already have an account? <a href="./login.php">Sign In</a></p>

        <div class="flexx">
            <button type="submit">Submit</button>
        </div>

    </form>
</div>

</body>
</html>
