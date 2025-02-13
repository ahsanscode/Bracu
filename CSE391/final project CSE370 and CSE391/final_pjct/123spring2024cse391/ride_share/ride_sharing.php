<?php
include 'DBconnect.php'; // Include the database connection file
$conn = getDbConnection(); // Get the database connection
session_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header('Location: ../index.php');
    exit();
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get input data from the form
    $ride_id = $_POST['ride_id'];
    $from_dest = $_POST['from_dest'];
    $to_dest = $_POST['to_dest'];
    $at_time = $_POST['at_time'];
    $at_day = $_POST['at_day'];

    try {
        // Prepare the SQL query to insert data into the ride_sharing table
        $sql = "INSERT INTO ride_sharing (ride_id, from_dest, to_dest, at_time, at_day) 
                VALUES (:ride_id, :from_dest, :to_dest, :at_time, :at_day)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':ride_id', $ride_id);
        $stmt->bindParam(':from_dest', $from_dest);
        $stmt->bindParam(':to_dest', $to_dest);
        $stmt->bindParam(':at_time', $at_time);
        $stmt->bindParam(':at_day', $at_day);

        // Execute the query
        $stmt->execute();

        echo "Ride information has been successfully saved!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
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
        <h2>Enter Ride Sharing Details</h2>
        <form action="ride_sharing.php" method="POST" class="ride-form">
            <label for="ride_id">Ride ID:</label>
            <input type="text" id="ride_id" name="ride_id" required><br><br>

            <label for="from_dest">From (Origin):</label>
            <input type="text" id="from_dest" name="from_dest" required><br><br>

            <label for="to_dest">To (Destination):</label>
            <input type="text" id="to_dest" name="to_dest" required><br><br>

            <label for="at_time">Time:</label>
            <input type="time" id="at_time" name="at_time" required><br><br>

            <label for="at_day">Day:</label>
            <input type="text" id="at_day" name="at_day" placeholder="e.g., Monday" required><br><br>

            <button type="submit">Submit</button><br><br>

            <!-- Redirect button to search available rides -->
            <a href="search_ride.php">
                <button type="button">Search Available Rides</button>
            </a>
        </form>
    </div>
</body>
</html>
