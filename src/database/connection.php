<?php
include_once 'config.php';

function dbConnection() {
    global $host, $username, $password, $dbname;

    $conn = new mysqli($host, $username, $password, $dbname);

    if($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}