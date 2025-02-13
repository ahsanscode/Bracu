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
include('database.php');

$client_name = $_POST['client_name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$car_license = $_POST['car_license'];
$car_engine = $_POST['car_engine'];
$appointment_date = $_POST['appointment_date'];
$mechanic_id = $_POST['mechanic_id'];
global $conn;
//Check for duplicate appointments

$check = "SELECT * FROM appointments WHERE phone='$phone' AND appointment_date='$appointment_date'";
$check_result = $conn->query("SELECT * FROM appointments WHERE phone='$phone' AND appointment_date='$appointment_date'");
//$check_result = $conn->query($check);
if ($check_result->num_rows > 0) {
    echo '<div class="red echo"><h1>You already have an appointment on this date!</h1></div>';
    exit;
}

$sql_ver = $conn->query("SELECT * FROM appointments where appointment_date = '$appointment_date' and mechanic_id = '$mechanic_id'");
if ($sql_ver->num_rows > 3) {
    echo '<div class="red echo"><h1>Sorry, this mechanic is fully booked on this date!</h1></div>';
    exit;
} else {
    $sql = "INSERT INTO appointments (client_name, address, phone, car_license, car_engine, appointment_date, mechanic_id)
        VALUES ('$client_name', '$address', '$phone', '$car_license', '$car_engine', '$appointment_date', '$mechanic_id')";

// Add Appointment
    if ($conn->query($sql) === TRUE) {
        echo '<div class="green echo"><h1>Appointment booked successfully!</h1></div>';
    } else {
        echo '<div class="red echo"><h1>Error: ' . $sql . '<br>' . $conn->error . '</h1></div>';
    }
}


