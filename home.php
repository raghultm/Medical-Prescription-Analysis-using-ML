<?php
$host = "localhost"; // Hostname
$user = "";          // Username (empty for anonymous connection)
$password = "";      // Password (empty for anonymous connection)
$db_name = "doctor"; // Database name

// Create connection
$con = mysqli_connect($host, $user, $password, $db_name);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully";
?>
