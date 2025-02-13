<?php
include 'DBconnect.php'; // Include the database connection file
$conn = getDbConnection(); // Get the database connection
session_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header('Location: ../index.php');
    exit();
}
$results = ""; // Initialize results

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get input data from the form
    $from_time = $_POST['from_time'];
    $to_time = $_POST['to_time'];
    $at_day = $_POST['at_day'];

    try {
        // Prepare the SQL query to filter rides
        $sql = "SELECT ride_id, from_dest, to_dest, at_time, at_day
                FROM ride_sharing
                WHERE at_time BETWEEN :from_time AND :to_time AND at_day = :at_day";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':from_time', $from_time);
        $stmt->bindParam(':to_time', $to_time);
        $stmt->bindParam(':at_day', $at_day);
        $stmt->execute();

        // Fetch all matching records
        $rides = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($rides) > 0) {
            $results .= "<h3>Available Rides:</h3>";
            $results .= "<table class='rides-table'>";
            $results .= "<thead><tr><th>Ride ID</th><th>From</th><th>To</th><th>Time</th><th>Day</th></tr></thead>";
            $results .= "<tbody>";
            foreach ($rides as $ride) {
                $results .= "<tr>
                                <td>" . htmlspecialchars($ride['ride_id']) . "</td>
                                <td>" . htmlspecialchars($ride['from_dest']) . "</td>
                                <td>" . htmlspecialchars($ride['to_dest']) . "</td>
                                <td>" . htmlspecialchars($ride['at_time']) . "</td>
                                <td>" . htmlspecialchars($ride['at_day']) . "</td>
                             </tr>";
            }
            $results .= "</tbody></table>";
        } else {
            $results = "<p class='no-results'>No rides found for the given criteria.</p>";
        }
    } catch (PDOException $e) {
        $results = "<p class='error'>Error: " . $e->getMessage() . "</p>";
    }
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
    <link rel="stylesheet" href="../home.css">
    <link rel="stylesheet" href="../signup/signup.css">
</head>
<body>
<?php if ($loggedIn): ?>
    <?php if ($userType == 'student'): ?>
        <nav>
            <div class="brand">TravelBuddy</div>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="../travelbuddyv1/House_Rent/student_page.php">Rent</a></li>
                <li><a href="../travelbuddyv1/Review/review.php">Review</a></li>
<!--                <li><a href="ride_share/ride_sharing.php">Ride Sharing</a></li>-->
                <li><a href="../thesis/thesis.php">Thesis Member Finding</a></li>
                <!--                <li><a href="#">Blood Donation</a></li>-->
                <li><a href="../login/logout.php">Logout</a></li>
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
    <div class="signup-container">
        <h2>Search Rides</h2>
        <form action="search_ride.php" method="POST" class="ride-form">
            <label for="from_time">From Time:</label>
            <input type="time" id="from_time" name="from_time" required><br><br>

            <label for="to_time">To Time:</label>
            <input type="time" id="to_time" name="to_time" required><br><br>

            <label for="at_day">Day:</label>
            <input type="text" id="at_day" name="at_day" placeholder="e.g., Monday" required><br><br>

            <button type="submit">Search</button>
        </form>

        <?php
        // Display the results if available
        echo $results;
        ?>
    </div>
</body>
</html>
