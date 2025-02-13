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
include '../../dbms_connect.php';
$conn = getDbConnection();
$Preferred_topic = $_POST['Preferred_topic'];
$preferred_faculty = $_POST['preferred_faculty'];
$from_Semester = $_POST['from_Semester'];
$max_member = (int)$_POST['max_member'];
$new_thesis_id = $_POST['thesis_ID'];
$sql_check = "SELECT thesis_id FROM thesis WHERE thesis_id = '$new_thesis_id'";
$result = $conn->query($sql_check);
$mem_needed = $max_member - 1;

if ($result && $result->num_rows > 0 || strlen($new_thesis_id) > 10) {
    echo '<div class="red echo"><h1>This thesis ID already exists or the thesis ID is inappropriate . Please use a different ID.</h1></div>';
    $conn->close();
    exit();
} else {
    $sql = "INSERT INTO thesis (thesis_id, pref_topic, pref_faculty, from_semester, vacancy) VALUES ('$new_thesis_id', '$Preferred_topic', '$preferred_faculty', '$from_Semester', '$max_member')";
     $result = $conn->query($sql);


    $mem_needed = $max_member - 1;
    $sql_update = "UPDATE thesis SET mem_needed = '$mem_needed' WHERE thesis_id = '$new_thesis_id'";
    $conn->query($sql_update);

    echo '<div class="green echo"><h1>Thesis slot added successfully!</h1></div>';
}



$conn->close();
?>
