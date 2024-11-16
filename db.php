<?php
$host = 'localhost';
$username = 'root'; // Your MySQL username
$password = ''; // Your MySQL password
$dbname = 'todo_app';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
