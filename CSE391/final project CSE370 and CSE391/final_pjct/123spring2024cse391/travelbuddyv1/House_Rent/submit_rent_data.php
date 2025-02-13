<?php
// Include database connection
include '../../dbms_connect.php';
$conn = getDbConnection();
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $room_type = $conn->real_escape_string($_POST['room_type']);
    $pref_area = $conn->real_escape_string($_POST['pref_area']);
    $avail_seat = $conn->real_escape_string($_POST['avail_seat']);
    $rent = $conn->real_escape_string($_POST['rent']);
    $from_month = $conn->real_escape_string($_POST['from_month']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $description = $conn->real_escape_string($_POST['description']);
    $rent_id = rand(1000, 9999); // Generate a random rent ID
    $sql = "INSERT INTO house_rent (rent_id, room_type, pref_area, avail_seat, rent, from_month, max_seat, availability, description, phone)
        VALUES ('$rent_id', '$room_type', '$pref_area', '$avail_seat', '$rent', '$from_month', '$avail_seat', 'Yes', '$description', '$phone')";

//    $sql = "INSERT INTO house_rent (rent_id ,room_type, pref_area, avail_seat, rent, from_month, max_seat, availability, description, phone)
//            VALUES ('$room_type', '$pref_area', '$avail_seat', '$rent', '$from_month', '$avail_seat', 'Yes', '$description', '$phone')";

    if ($conn->query($sql) === TRUE) {
        echo '<p>Data inserted successfully! <a href="student_page.php">Go back</a></p>';
    } else {
        echo '<p>Error: ' . $conn->error . '</p>';
    }
} else {
    echo '<p>Invalid request. <a href="student_page.php">Go back</a></p>';
}

