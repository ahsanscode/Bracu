<?php
// Include database connection
include 'db_connect.php';

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
                <li><a href="..//Review/review.php">Review</a></li>
                <li><a href="../../ride_share/ride_sharing.php">Ride Sharing</a></li>
                <li><a href="../../thesis/thesis.php">Thesis Member Finding</a></li>
                <!--                <li><a href="#">Blood Donation</a></li>-->
                <li><a href="../../login/logout.php">Logout</a></li>
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
    <h1>Available Houses</h1>

    <!-- Filter Form -->
    <form method="GET" action="" style="margin-bottom: 20px;">
        <label for="area">Preferred Area:</label>
        <input type="text" name="area" id="area" placeholder="Enter area">

        <label for="rent_min">Min Rent:</label>
        <input type="number" name="rent_min" id="rent_min" placeholder="Enter min rent">

        <label for="rent_max">Max Rent:</label>
        <input type="number" name="rent_max" id="rent_max" placeholder="Enter max rent">


        <button type="submit">Filter</button>
    </form>




<?php
// Include database connection
include 'db_connect.php';

// Initialize variables for filters
$area = isset($_GET['area']) ? $_GET['area'] : '';
$rent_min = isset($_GET['rent_min']) ? intval($_GET['rent_min']) : 0;
$rent_max = isset($_GET['rent_max']) ? intval($_GET['rent_max']) : PHP_INT_MAX;
$availability = isset($_GET['availability']) ? $_GET['availability'] : '';

// Construct the SQL query with filters
$sql = "SELECT * FROM house_rent WHERE 1=1";

if (!empty($area)) {
    $sql .= " AND pref_area LIKE '%" . $conn->real_escape_string($area) . "%'";
}

if ($rent_min > 0) {
    $sql .= " AND rent >= $rent_min";
}

if ($rent_max < PHP_INT_MAX) {
    $sql .= " AND rent <= $rent_max";
}


// Execute the query
$result = $conn->query($sql);

// Display results
if ($result && $result->num_rows > 0) {
    echo '<table border="1" class="thesis_table">';
    echo '<tr>
            <th>Rent ID</th>
            <th>Preferred Area</th>
            <th>Available Seat</th>
            <th>Rent</th>
            <th>From Month</th>
            <th>Max Seat</th>
            <th>Availability</th>
            <th>Description</th>
            <th>Room Type</th>
            <th>Phone</th>
          </tr>';
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['rent_id']) . '</td>';
        echo '<td>' . htmlspecialchars($row['pref_area']) . '</td>';
        echo '<td>' . htmlspecialchars($row['avail_seat']) . '</td>';
        echo '<td>' . htmlspecialchars($row['rent']) . '</td>';
        echo '<td>' . htmlspecialchars($row['from_month']) . '</td>';
        echo '<td>' . htmlspecialchars($row['max_seat']) . '</td>';
        echo '<td>' . htmlspecialchars($row['availability']) . '</td>';
        echo '<td>' . htmlspecialchars($row['description']) . '</td>';
        echo '<td>' . htmlspecialchars($row['room_type']) . '</td>';
        echo '<td>' . htmlspecialchars($row['phone']) . '</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo '<p>No houses available with the specified filters. <a href="student_page.php">Go back</a></p>';
}
?>






