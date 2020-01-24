<?php
$servername = "127.0.0.1";
$username = "root";
$password = "4165";
$dbname = "GH12L";

$conn = new Mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
