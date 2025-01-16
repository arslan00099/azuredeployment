<?php
$host = "127.0.0.1";  // Use 127.0.0.1 instead of localhost
$port = "55000";      // Docker mapped port
$dbname = "video";
$username = "root";
$password = "123456";       // Your password if applicable

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; // Uncomment for debugging
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
