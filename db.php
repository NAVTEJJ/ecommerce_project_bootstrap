<?php
$host = "localhost";
$user = "root";
$pass = "qwertyuiop1@1"; // If your XAMPP MySQL root has a password, put it here
$db   = "ecommerce_db";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>