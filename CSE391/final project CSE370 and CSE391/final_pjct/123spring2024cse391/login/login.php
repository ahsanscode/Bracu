<?php
$loggedIn = false; // Change this to true if the user is logged in
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Student Central Platform</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<nav>
    <div class="brand">TravelBuddy</div>
    <ul>
        <?php if ($loggedIn): ?>
            <li><a href="#">Home</a></li>
            <li><a href="#">Rent</a></li>
            <li><a href="#">Ride Sharing</a></li>
            <li><a href="#">Thesis Member Finding</a></li>
            <li><a href="#">Blood Donation</a></li>
            <li><a href="#">Logout</a></li>
        <?php else: ?>
<!--            <li><a href="login.php">Login</a></li>-->
            <li><a href="../signup/signup.php">Sign Up</a></li>
        <?php endif; ?>
    </ul>
</nav>
<main>
    <div class="login-container">
        <h2>Login</h2>
        <form action="login_process.php" method="post">
            <div class="form-group">
                <label for="user_id">UserID</label>
                <input type="text" id="user_id" name="user_id" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</main>
</body>
</html>