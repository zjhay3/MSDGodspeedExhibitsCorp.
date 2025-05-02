<?php
$conn = new mysqli("localhost", "root", "", "msd_godspeed");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
