<?php
// Connect to the database
$conn = new mysqli("localhost", "root", "", "370dbms");

session_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header('Location: ../../index.php');
    exit();
}
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize message variables
$success_message = '';
$error_message = '';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $conn->real_escape_string($_POST['student_id']);
    $complain_student_id = $conn->real_escape_string($_POST['complain_student_id']);
    $review_for = $conn->real_escape_string($_POST['review_for']);
    $description = $conn->real_escape_string($_POST['description']);

    // Generate a unique review_id (you can adjust this based on your system's ID generation strategy)
    $review_id = 'R' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);

    // Insert complaint into the 'review' table
    $sql = "INSERT INTO review (review_Id, student_id, complain_student_id, review_for, description) 
            VALUES ('$review_id', '$student_id', '$complain_student_id', '$review_for', '$description')";

    if ($conn->query($sql) === TRUE) {
        $success_message = "Complaint filed successfully.";
    } else {
        $error_message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review - File Complaint</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        button:hover {
            background-color: #45a049;
        }

        .message {
            width: 50%;
            margin: 20px auto;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
    </style>
</head>
<body>

<h1>Review</h1>

<?php if (!empty($success_message)): ?>
    <div class="message success"><?php echo $success_message; ?></div>
<?php endif; ?>
<?php if (!empty($error_message)): ?>
    <div class="message error"><?php echo $error_message; ?></div>
<?php endif; ?>

<form action="review.php" method="POST">
    <label for="student_id">Your Student ID</label>
    <input type="text" id="student_id" name="student_id" required>

    <label for="complain_student_id">Student ID of the Person You're Complaining About</label>
    <input type="text" id="complain_student_id" name="complain_student_id" required>

    <label for="review_for">Category</label>
    <select id="review_for" name="review_for" required>
        <option value="Behavior">Behavior</option>
        <option value="Commitment">Commitment</option>
        <option value="Performance">Performance</option>
        <option value="Teamwork">Teamwork</option>
        <option value="Reliability">Reliability</option>
        <option value="Professionalism">Professionalism</option>
        <option value="Collaboration">Collaboration</option>
        <option value="Communication">Communication</option>
        <option value="Availability">Availability</option>
    </select>

    <label for="description">Description of the Issue</label>
    <textarea id="description" name="description" rows="5" required></textarea>

    <button type="submit">Submit Complaint</button>
</form>

</body>
</html>
