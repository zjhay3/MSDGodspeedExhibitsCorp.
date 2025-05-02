<?php
include "db.php";  // Include database connection

$sql = "SELECT name, email, department, message, sent_at FROM messages ORDER BY sent_at DESC";
$result = $conn->query($sql);

$messages = [];
while ($row = $result->fetch_assoc()) {
    $messages[] = $row;
}

echo json_encode($messages);
?>
