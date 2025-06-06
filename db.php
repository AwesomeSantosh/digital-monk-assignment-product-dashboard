<?php
$servername = "localhost";
$username = "digital_monk_user";
$password = "mDWANIdx~2DF";
$dbname = "digital_monk";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
