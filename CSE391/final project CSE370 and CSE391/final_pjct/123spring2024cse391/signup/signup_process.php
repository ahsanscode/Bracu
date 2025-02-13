<!DOCTYPE html>
<html lang="en">
<head>
    <title>Styled Div</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .red {
            color: white;
            background-color: red;
        }

        .green {
            color: white;
            background-color: green;
        }

        .echo p {
            font-size: 50px;
        }

        .echo {
            /*width: 35%;*/
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>
<body>
</body>
</html>

<?php
session_start();
include '../dbms_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $blood_group = $_POST['blood_group'];

    $conn = getDbConnection();

    $sql = "INSERT INTO student (student_id, first_name, last_name, email, password, gender, blood_group) VALUES ('$student_id', '$first_name', '$last_name', '$email', '$password', '$gender', '$blood_group')";


    $sql_check = "SELECT * FROM student WHERE student_id = '$student_id'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        echo '<div class="red echo"><h1>Student with this ID is already registered.</h1></div>';
        $conn->close();
        exit();
    }


    if ($conn->query($sql) === TRUE) {
        echo '<div class="green echo"><h1>"New record created successfully"</h1></div>';

    } else {
        echo '<div class="red echo"><h1>Could not sign up  </h1></div>';
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>