<?php

function getDbConnection()
{
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = '370dbms';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    return $conn;
}