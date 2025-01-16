<?php
$host = "videodbserver.mysql.database.azure.com";  // Use 127.0.0.1 instead of localhost
$port = "3306";      // Docker mapped port
$dbname = "video";
$username = "hamza";
$password = "Hamza1122";       // Your password if applicable

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; // Uncomment for debugging
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
