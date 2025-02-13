<?php
session_start();
include('database.php');
global $conn;
// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

// Fetch all appointments with mechanic names
$result = $conn->query("SELECT appointments.*, mechanics.name AS mechanic_name FROM appointments JOIN mechanics ON appointments.mechanic_id = mechanics.id");
?>
<!DOCTYPE html>
<html lang="">
<head>
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<h1>Admin Panel</h1>
<div class="center"><a class="button-link" href="logout.php">Logout</a></div>
<h2>Appointments</h2>
<table>
    <tr>
        <th>Client Name</th>
        <th>Phone</th>
        <th>Car Registration</th>
        <th>Appointment Date</th>
        <th>Mechanic</th>
        <th>Actions</th>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                    <td>{$row['client_name']}</td>
                    <td>{$row['phone']}</td>
                    <td>{$row['car_license']}</td>
                    <td>{$row['appointment_date']}</td>
                    <td>{$row['mechanic_name']}</td>
                    <td><a href='edit_appointment.php?id={$row['id']}'>Edit</a></td>
                  </tr>";
    }
    ?>
</table>
</body>
</html>
