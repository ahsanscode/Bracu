<?php
session_start();
include '../dbms_connect.php';
$conn = getDbConnection();
// Dummy authentication for demonstration purposes
$userID = $_POST['user_id'];
$password = $_POST['password'];

// Check in student table
$sql_check_student = "SELECT * FROM student WHERE student_id = '$userID' AND password = '$password'";

$result_student = $conn->query($sql_check_student);

$authenticated = false;

if ($result_student->num_rows > 0) {
    $authenticated = true;
}

// Check in admin table if not authenticated as student
$sql_check_admin = "SELECT * FROM admin WHERE admin_id = '$userID' AND password = '$password'";

$result_admin = $conn->query($sql_check_admin);

if ($result_admin->num_rows > 0) {
    $authenticated = true;
}


if ($authenticated) {
    $_SESSION['loggedIn'] = true;
    $_SESSION['userID'] = $userID; // Store user ID in session
    header('Location: ../index.php');
} else {
    echo 'Invalid login credentials';
}