<?php
$servername = $_ENV['DB_HOST'];
$usernameDB = $_ENV['DB_USER'];
$passwordDB = $_ENV['DB_PWD'];
$dbname = "project_php";

$conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);
if ($conn->connect_error) {
    die("connection failed!" . $conn->connect_error);
}
?>