<?php
$servername = "localhost"; // Change if your database is hosted elsewhere
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "nirc_web"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS `$dbname`"; // Enclose in backticks for safety
if ($conn->query($sql) === FALSE) {
    die("Error creating database: " . $conn->error);
}

// Select the database
$conn->select_db($dbname);


?>
