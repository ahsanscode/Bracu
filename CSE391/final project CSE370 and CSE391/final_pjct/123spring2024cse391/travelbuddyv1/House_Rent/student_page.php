<?php

session_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header('Location: ../../index.php');
    exit();
}
?>


<?php
//session_start();
$loggedIn = isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'];
$userType = ''; // Initialize userType variable

if ($loggedIn) {
    $userId = $_SESSION['userID']; // Assuming user_id is stored in session
    if ($userId[0] === 's' or $userId[0] === 'S') {
        $userType = 'student'; // User is a student
    } elseif ($userId[0] === 'a' or $userId[0] === 'A') {
        $userType = 'admin'; // User is an admin
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Central Platform</title>
    <link rel="stylesheet" href="../../home.css">
    <link rel="stylesheet" href="../../signup/signup.css">
</head>
<body>
<?php if ($loggedIn): ?>
    <?php if ($userType == 'student'): ?>
        <nav>
            <div class="brand">TravelBuddy</div>
            <ul>
                <li><a href="../../index.php">Home</a></li>
                <!--                <li><a href="travelbuddyv1/House_Rent/student_page.php">Rent</a></li>-->
                <li><a href="..//Review/review.php">Review</a></li>
                <li><a href="../../ride_share/ride_sharing.php">Ride Sharing</a></li>
                <li><a href="../../thesis/thesis.php">Thesis Member Finding</a></li>
                <!--                <li><a href="#">Blood Donation</a></li>-->
                <li><a href="../../login/logout.php">Logout</a></li>
            </ul>
        </nav>
    <?php elseif ($userType == 'admin'): ?>
        <nav>
            <div class="brand">TravelBuddy -- Admin panel</div>
            <ul>
                <!--                <li><a href="#">Rent</a></li>-->
                <li><a href="adminswork/review.php">Review</a></li>
                <!--                <li><a href="#">Ride Sharing</a></li>-->
                <!--                <li><a href="#">Thesis Member Finding</a></li>-->
                <!--                <li><a href="#">Blood Donation</a></li>-->
                <li><a href="login/logout.php">Logout</a></li>
            </ul>
        </nav>
    <?php endif; ?>
<?php else: ?>
    <nav>
        <div class="brand">TravelBuddy</div>
        <ul>
            <li><a href="login/login.php">Login</a></li>
            <li><a href="signup/signup.php">Sign Up</a></li>
        </ul>
    </nav>
<?php endif; ?>

<!-- Form Section -->
<div class="signup-container">

    <h1>House Rent</h1>

    <form method="POST" action="submit_rent_data.php">
        <label for="room_type">Room Type:</label>
        <input type="text" name="room_type" id="room_type" required><br><br>

        <label for="pref_area">Preferred Area:</label>
        <input type="text" name="pref_area" id="pref_area" required><br><br>

        <label for="avail_seat">Available Seat:</label>
        <input type="number" name="avail_seat" id="avail_seat" required><br><br>

        <label for="rent">Rent (in range):</label>
        <input type="text" name="rent" id="rent" required><br><br>

        <label for="from_month">From Month:</label>
        <input type="text" name="from_month" id="from_month" required><br><br>

        <label for="phone">Phone Number:</label>
        <input type="text" name="phone" id="phone" required><br><br>

        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea><br><br>

        <input type="submit" value="Submit">
    </form>

</div>
<!-- Button to View Available Houses -->
<form method="GET" action="available_houses.php" style="margin-top: 20px;">
    <button type="submit">View Available Houses</button>
</form>
</body>
</html>
















