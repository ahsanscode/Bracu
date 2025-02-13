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
                <li><a href="../../travelbuddyv1/House_Rent/student_page.php">Rent</a></li>
                <li><a href="../../travelbuddyv1/Review/review.php">Review</a></li>
                <li><a href="../../ride_share/ride_sharing.php">Ride Sharing</a></li>
                <li><a href="../book_thesis/view_thesis.php">Join a thesis Group </a></li>
                <!--                <li><a href="#">Blood Donation</a></li>-->
                <li><a href="../../login/logout.php">Logout</a></li>
            </ul>
        </nav>
    <?php elseif ($userType == 'admin'): ?>
        <nav>
            <div class="brand">TravelBuddy -- Admin panel</div>
            <ul>
                <li><a href="../../index.php">Home</a></li>
                <li><a href="#">Rent</a></li>
                <li><a href="#">Review</a></li>
                <li><a href="#">Ride Sharing</a></li>
                <li><a href="#">Thesis Member Finding</a></li>
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
<body>
<div class="signup-container">
    <h1>Add Thesis Slot</h1>
    <form action="add_thesis_process.php" method="POST">
        <div class="form-group">
            <label for="thesis_ID">thesis_ID:</label>
            <input type="text" id="thesis_ID" name="thesis_ID" required>
        </div>
        <div class="form-group">
            <label for="preferred-topic">Preferred Topic:</label>
            <input type="text" id="preferred-topic" name="Preferred_topic" required>
        </div>
        <div class="form-group">
            <label for="preferred-faculty">Preferred Faculty:</label>
            <input type="text" id="preferred-faculty" name="preferred_faculty" required>
        </div>
        <div class="form-group">
            <label for="from-semester">From Semester:</label>
            <input type="text" id="from-semester" name="from_Semester" required>
        </div>

        <div class="form-group">
            <label for="max-member">Max Members:</label>
            <input type="number" id="max-member" name="max_member" required>
        </div>

        <button type="submit">Add Slot</button>
    </form>
</div>
</body>
</body>
</html>