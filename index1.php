<?php
// Database credentials
$host = 'db'; // Use the service name of the MySQL container as the hostname
$user = 'lamp_demo';
$password = 'password';
$database = 'lamp_demo';

// Create connection
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>

