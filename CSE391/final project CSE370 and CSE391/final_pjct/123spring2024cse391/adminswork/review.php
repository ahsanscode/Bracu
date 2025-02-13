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
include '../dbms_connect.php';
$conn = getDbConnection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Central Platform</title>
    <link rel="stylesheet" href="../home.css">
    <style>
        body {
            text-align: center;
        }

        .thesis_table {
            margin: 0 auto;
        }
    </style>
</head>
<body>
<?php if ($loggedIn): ?>
    <?php if ($userType == 'student'): ?>
        <nav>
            <div class="brand">TravelBuddy</div>
            <ul>
                <li><a href="travelbuddyv1/House_Rent/student_page.php">Rent</a></li>
                <li><a href="travelbuddyv1/Review/review.php">Review</a></li>
                <li><a href="#">Ride Sharing</a></li>
                <li><a href="thesis/thesis.php">Thesis Member Finding</a></li>
                <li><a href="#">Blood Donation</a></li>
                <li><a href="login/logout.php">Logout</a></li>
            </ul>
        </nav>
    <?php elseif ($userType == 'admin'): ?>
        <nav>
            <div class="brand">TravelBuddy -- Admin panel</div>
            <ul>
                <!--                <li><a href="#">Rent</a></li>-->
                <!--                <li><a href="adminswork/review.php">Review</a></li>-->
                <!--                <li><a href="#">Ride Sharing</a></li>-->
                <!--                <li><a href="#">Thesis Member Finding</a></li>-->
                <!--                <li><a href="#">Blood Donation</a></li>-->
                <li><a href="../login/logout.php">Logout</a></li>
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
    <h1>All Reviews</h1>
    <table border="1" class="thesis_table">
        <tr>
            <th>Review ID</th>
            <th>Student ID</th>
            <th>Complain Student ID</th>
            <th>Review For</th>
            <th>Description</th>
            <th>Manage</th>
        </tr>
        <?php
        $sql_reviews = "SELECT *  FROM review";
        $result_reviews = $conn->query($sql_reviews);
        while ($row = $result_reviews->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['review_Id']; ?></td>
                <td><?php echo $row['student_id']; ?></td>
                <td><?php echo $row['complain_student_id']; ?></td>
                <td><?php echo $row['review_for']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><a href="student_manage.php?review_id=<?php echo $row['review_Id']; ?>">Manage</a></td>
            </tr>
        <?php endwhile; ?>
    </table>
</main>

</body>
</html>