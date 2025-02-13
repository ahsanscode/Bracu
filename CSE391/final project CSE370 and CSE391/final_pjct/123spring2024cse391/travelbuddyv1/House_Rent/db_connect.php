<?php
$servername = "localhost"; // XAMPP uses 'localhost' by default
$username = "root";       // Default username for XAMPP
$password = "";           // Default password is empty
$dbname = "370dbms";  // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
