<?php
$host = 'localhost';
$username = 'udmbyklz4jkql';
$password = 'jhttrgxbzoea';
$dbname = 'dbzir4nxlq2f3v';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
