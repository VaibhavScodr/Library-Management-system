<?php
$host = 'localhost';    // Hostname, usually 'localhost'
$dbname = 'library';    // Replace with your database name
$username = 'root';     // Replace with your MySQL username
$password = '';         // Replace with your MySQL password (empty by default in XAMPP)

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn = new PDO("mysql:host=$host;port=3306;dbname=$dbname", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
