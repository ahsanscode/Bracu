<?php
include '../dbms_connect.php';
$conn = getDbConnection();

// Get and sanitize the review_id
$review_id = isset($_GET['review_id']) ? $conn->real_escape_string($_GET['review_id']) : null;

if (!$review_id) {
    echo "Invalid review ID.";
    exit();
}

// Query to get complain_student_id from review
$sql_complain_student = "SELECT complain_student_id FROM review WHERE review_id = '$review_id'";
$result_complain_student = $conn->query($sql_complain_student);

if ($result_complain_student->num_rows > 0) {
    $row_complain_student = $result_complain_student->fetch_assoc();
    $complain_student_id = $row_complain_student['complain_student_id'];

    // Query to check if complain_student_id exists in the student table
    $student_sql = "SELECT * FROM student WHERE student_id = '$complain_student_id'";
    $student_result = $conn->query($student_sql);

    if ($student_result->num_rows == 0) {
        echo "No complain student found for review ID: $review_id";
        header("Location: review.php");
        exit();
    } else {
        $row = $student_result->fetch_assoc();
        $student_id = $row['student_id'];
        $student_f_name = $row['first_name'];
        $student_l_name = $row['last_name'];
        $student_gender = $row['gender'];
        $student_blood_group = $row['blood_group'];
        $student_thesis_id = $row['thesis'];
    }
} else {
    echo "No complain student found for review ID: $review_id";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
            text-align: center;
            font-family: Arial, sans-serif;
        }

        .student-info h3 {
            margin: 10px 0;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="student-info">
    <h3>Student ID: <?= htmlspecialchars($student_id) ?></h3>
    <h3>First Name: <?= htmlspecialchars($student_f_name) ?></h3>
    <h3>Last Name: <?= htmlspecialchars($student_l_name) ?></h3>
    <h3>Gender: <?= htmlspecialchars($student_gender) ?></h3>
    <h3>Blood Group: <?= htmlspecialchars($student_blood_group) ?></h3>
    <h3>Thesis ID: <?= htmlspecialchars($student_thesis_id) ?></h3>
    <form method="POST" action="delete.php">
        <input type="hidden" name="student_id" value="<?= htmlspecialchars($student_id) ?>">
        <button type="submit" onclick="return confirm('Are you sure you want to remove this student?')">Remove the User
            from the Service
        </button>
    </form>
</div>
</body>
</html>
