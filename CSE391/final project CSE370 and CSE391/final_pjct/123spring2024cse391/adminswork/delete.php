<?php
include '../dbms_connect.php';
$conn = getDbConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize the student_id
    $student_id = isset($_POST['student_id']) ? $conn->real_escape_string($_POST['student_id']) : null;

    if ($student_id) {
        // Query to delete the student
        $delete_sql = "DELETE FROM student WHERE student_id = '$student_id'";
        if ($conn->query($delete_sql) === TRUE) {
            echo "Student with ID $student_id has been removed successfully.";
            // Redirect back to the review page or another page
            header("Location: review.php");
            exit();
        } else {
            echo "Error removing student: " . $conn->error;
        }
    } else {
        echo "Invalid student ID.";
    }
} else {
    echo "Invalid request method.";
}
?>
