<?php
session_start();
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
    <link rel="stylesheet" href="home.css">
</head>
<body>
<?php if ($loggedIn): ?>
    <?php if ($userType == 'student'): ?>
        <nav>
            <div class="brand">TravelBuddy</div>
            <ul>
                <li><a href="travelbuddyv1/House_Rent/student_page.php">Rent</a></li>
                <li><a href="travelbuddyv1/Review/review.php">Review</a></li>
                <li><a href="ride_share/ride_sharing.php">Ride Sharing</a></li>
                <li><a href="thesis/thesis.php">Thesis Member Finding</a></li>
<!--                <li><a href="#">Blood Donation</a></li>-->
                <li><a href="login/logout.php">Logout</a></li>
            </ul>
        </nav>
    <?php elseif ($userType == 'admin'): ?>
        <nav>
            <div class="brand">TravelBuddy -- Admin panel </div>
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
<main>
    <header>
        <h1>Welcome to the TravelBuddy</h1>
        <p>Your one-stop solution for renting homes, ride sharing, finding thesis members, and blood donation.</p>
    </header>
</main>
</body>
</html>