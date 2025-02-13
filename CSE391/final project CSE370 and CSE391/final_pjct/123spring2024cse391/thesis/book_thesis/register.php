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
include '../../dbms_connect.php';

$conn = getDbConnection();


$thesis_id = $_GET['thesis_id'];
$student_id = $_SESSION['userID'];
$sql = "SELECT * FROM student WHERE student_id = '$student_id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


$sql_mem = "SELECT * FROM thesis WHERE thesis_id = '$thesis_id'";
$result_mem = $conn->query($sql_mem);
$row_mem = $result_mem->fetch_assoc();
if ( $row_mem['mem_needed'] <= 0){
    echo '<div class="red echo"><h1>Thesis is already full</h1></div>';
    exit();
}

if ($row['thesis'] === NULL) {
    $sql = "UPDATE student SET thesis = '$thesis_id' WHERE student_id = '$student_id'";
    $conn->query($sql);
    $sql_update = "UPDATE thesis SET mem_needed = mem_needed - 1 WHERE thesis_id = '$thesis_id'";
    $conn->query($sql_update);
    echo '<div class="green echo"><h1>Thesis registered successfully</h1></div>';

} else {
    echo '<div class="red echo"><h1>You have already registered a thesis </h1></div>';
}


$conn->close();
?>