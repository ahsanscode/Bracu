<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Student Central Platform</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
<nav>
    <div class="brand">TravelBuddy</div>
    <ul>
        <li><a href="../login/login.php">Login</a></li>
<!--        <li><a href="signup.php">Sign Up</a></li>-->
    </ul>
</nav>
<main>
    <div class="signup-container">
        <h2>Sign Up</h2>
        <form action="signup_process.php" method="post" onsubmit="return validateStudentId()">
            <div class="form-group">
                <label for="student_id">Student ID</label>
                <input type="text" id="student_id" name="student_id" required>
            </div>
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    <option value="O">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="blood_group">Blood Group</label>
                <input type="text" id="blood_group" name="blood_group" required>
            </div>
            <button type="submit">Sign Up</button>
        </form>
    </div>
</main>
</body>
<script>
    function validateStudentId() {
        const studentId = document.getElementById('student_id').value;
        if (!studentId.startsWith('s')) {
            alert('Student ID must start with "s".');
            return false;
        }
        return true;
    }
</script>
</html>