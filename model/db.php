<?php
// Define your database connection parameters
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'finance_main';

// Function to establish a database connection
function connectToDatabase() {
    global $dbHost, $dbUsername, $dbPassword, $dbName;
    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

?>