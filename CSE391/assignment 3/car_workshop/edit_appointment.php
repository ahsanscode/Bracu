<!DOCTYPE html>
<html lang="">
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
include('database.php');
global $conn;
// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $appointment_id = $_POST['appointment_id'];
    $new_date = $_POST['appointment_date'];
    $new_mechanic_id = $_POST['mechanic_id'];
    global $conn;
    // Update appointment in the database
    $old_mechanic = $conn->query("select mechanic_id from appointments where id = '$appointment_id'")->fetch_assoc();


    $just_a_var = $conn->query("SELECT * FROM appointments where appointment_date = '$new_date' and mechanic_id = '$new_mechanic_id'");
    if ($just_a_var->num_rows > 3) {
        echo '<div class="red echo"><h1>Sorry, this mechanic is fully booked on this date!</h1></div>';
        exit;
    } else {

        if ($conn->query("UPDATE appointments SET appointment_date = '$new_date', mechanic_id = '$new_mechanic_id' WHERE id = '$appointment_id'") === TRUE) {
            echo '<div class="green echo"><h1>Appointment updated successfully!</h1></div>';
        }
    }


    header("Location: admin.php");
    exit;
}

$appointment_id = $_GET['id'];

// Fetch appointment details
$appointment = $conn->query("SELECT * FROM appointments WHERE id = '$appointment_id'")->fetch_assoc();

// Fetch mechanics list
$mechanics = $conn->query("SELECT * FROM mechanics");
?>
<!DOCTYPE html>
<html lang="">
<head>
    <title>Edit Appointment</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<h1>Edit Appointment</h1>
<form method="POST">
    <input type="hidden" name="appointment_id" value="<?php echo $appointment['id']; ?>">
    <label>New Appointment Date:</label>
    <label>
        <input type="date" name="appointment_date" value="<?php echo $appointment['appointment_date']; ?>" required>
    </label>

    <label>Select Mechanic:</label>
    <label>
        <select name="mechanic_id" required>
            <?php
            while ($mechanic = $mechanics->fetch_assoc()) {
                $selected = $mechanic['id'] == $appointment['mechanic_id'] ? "selected" : "";
                echo "<option value='{$mechanic['id']}' $selected>{$mechanic['name']}</option>";
            }
            ?>

        </select>
    </label>
    <button type="submit">Save Changes</button>
</form>
</body>
</html>
