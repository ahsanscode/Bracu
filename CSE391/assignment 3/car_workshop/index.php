<?php include('database.php');
global $conn ?>
<!DOCTYPE html>
<html lang="">
<head>
    <title>Appointment System</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="center">
    <a href="admin.php" class="button-link">Admin panel</a>
</div>

<h1>Car Workshop Appointment System</h1>
<form action="process.php" method="POST">
    <label>Name:</label>
    <label>
        <input type="text" name="client_name" required>
    </label>
    <label>Address:</label>
    <label>
        <input type="text" name="address" required>
    </label>
    <label>Phone:</label>
    <label>
        <input type="text" name="phone" required pattern="\d+">
    </label>
    <label>Car License:</label>
    <label>
        <input type="text" name="car_license" required>
    </label>
    <label>Car Engine Number:</label>
    <label>
        <input type="text" name="car_engine" required pattern="\d+">
    </label>
    <label>Appointment Date:</label>
    <label>
        <input type="date" name="appointment_date" required>
    </label>
    <label>Mechanic:</label>
    <label>
        <select name="mechanic_id" required>

            <?php
            $mechanics = $conn->query("SELECT * FROM mechanics");
            while ($mechanic = $mechanics->fetch_assoc()) {

                echo "<option value='{$mechanic['id']}'>{$mechanic['name']}</option>";
            }
            ?>


        </select>
    </label>
    <button type="submit">Book Appointment</button>
</form>
</body>
</html>
