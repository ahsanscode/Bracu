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
<?php
include '../../dbms_connect.php';
$conn = getDbConnection();
$sql = "SELECT * FROM thesis";
$result = $conn->query($sql);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Central Platform</title>
    <link rel="stylesheet" href="../../home.css">

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
                <li><a href="../../index.php">Home</a></li>
                <li><a href="../../travelbuddyv1/House_Rent/student_page.php">Rent</a></li>
                <li><a href="../../travelbuddyv1/Review/review.php">Review</a></li>
                <li><a href="../../ride_share/ride_sharing.php">Ride Sharing</a></li>
<!--                <li><a href="#">Blood Donation</a></li>-->
                <li><a href="../../login/logout.php">Logout</a></li>
            </ul>
        </nav>
    <?php elseif ($userType == 'admin'): ?>
        <nav>
            <div class="brand">TravelBuddy -- Admin panel</div>
            <ul>
                <li><a href="#">Rent</a></li>
                <li><a href="#">Review</a></li>
                <li><a href="#">Ride Sharing</a></li>
                <li><a href="#">Thesis Member Finding</a></li>
                <li><a href="#">Blood Donation</a></li>
                <li><a href="">Logout</a></li>
            </ul>
        </nav>
    <?php endif; ?>
<?php else: ?>
    <nav>
        <div class="brand">TravelBuddy</div>
        <ul>
            <li><a href="../../login/login.php">Login</a></li>
            <li><a href="../../signup/signup.php">Sign Up</a></li>
        </ul>
    </nav>
<?php endif; ?>
<div

<h1>Available Thesis Slots</h1>
<table  class="thesis_table">
    <tr>
        <th>Topic</th>
        <th>Faculty</th>
        <th>From Semester</th>
        <th>Max Members</th>
        <th>Slots Available</th>
        <th>Register</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <?php
            $thesis_id = $row['thesis_id'];
            $member_needed = 0;
            $sql_member_needed = "SELECT mem_needed FROM thesis WHERE thesis_id = '$thesis_id'";
            $result_member_needed = $conn->query($sql_member_needed);
            if ($result_member_needed->num_rows > 0) {
                $row_member_needed = $result_member_needed->fetch_assoc();
                $member_needed = $row_member_needed['mem_needed'];
            } else {
                $sql_member_needed_max = "SELECT *  FROM thesis WHERE thesis_id = '$thesis_id'";
                $result_member_needed_max = $conn->query($sql_member_needed_max);
                $member_needed = $result_member_needed_max->fetch_assoc()['mem_needed'];
            }
            ?>
            <td><?php echo $row['pref_topic']; ?></td>
            <td><?php echo $row['pref_faculty']; ?></td>
            <td><?php echo $row['from_semester']; ?></td>
            <td><?php echo $row['vacancy']; ?></td>
            <td><?php echo $member_needed ?></td>
            <td><a href="register.php?thesis_id=<?php echo $row['thesis_id']; ?>">Register</a></td>
        </tr>
    <?php endwhile; ?>
</table>
</div>
</body>
</html>