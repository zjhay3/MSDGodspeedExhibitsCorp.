<?php
$host = "localhost";
$user = "godspeedexhibits_godspeedexcorp"; //
$pass = "?Vct9J5]T%*M";
$dbname = "godspeedexhibits_sub";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM testimonials";
$result = $conn->query($sql);

$testimonials = [];
while ($row = $result->fetch_assoc()) {
    $testimonials[] = $row;
}

header('Content-Type: application/json');
echo json_encode($testimonials);
$conn->close();
?>
