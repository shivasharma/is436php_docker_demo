<?php
$servername = "db"; // Service name of the MySQL container in docker-compose
$username = "lamp_demo";
$password = "password";
$database = "lamp_demo";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully to the database";
?>
