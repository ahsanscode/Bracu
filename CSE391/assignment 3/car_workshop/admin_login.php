<?php
session_start();
include('database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hardcoded admin credentials for simplicity
    $admin_username = 'admin';
    $admin_password = 'admin';

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin.php");
        exit;
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="">
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<h1>Admin Login</h1>
<form method="POST">
    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    <label>Username:</label>
    <label>
        <input type="text" name="username" required>
    </label>
    <label>Password:</label>
    <label>
        <input type="password" name="password" required>
    </label>
    <button type="submit">Login</button>
</form>
</body>
</html>
