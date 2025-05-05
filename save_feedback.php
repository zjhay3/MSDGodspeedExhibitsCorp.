<?php
include 'php/db.php';  // Updated path to include from the php subfolder

header('Content-Type: application/json');

// Get JSON data from the request body
$json_data = file_get_contents('php://input');
$data = json_decode($json_data, true);

// For debugging - log the IP to error log
error_log("Incoming request IP: " . $_SERVER['REMOTE_ADDR']);

// Capture IP address
$user_ip = $_SERVER['REMOTE_ADDR'];
$limit = 10; // max submissions
$time_window = "12 HOUR"; // restriction period

// Check if the user has exceeded the submission limit
$stmt = $conn->prepare("SELECT COUNT(*) FROM ip_logs WHERE ip_address = ? AND submitted_at > NOW() - INTERVAL $time_window");
if (!$stmt) {
    error_log("IP check prepare failed: " . $conn->error);
    echo json_encode(["error" => "Database error. Please try again later."]);
    exit;
}

$stmt->bind_param("s", $user_ip);
$stmt->execute();
$stmt->bind_result($ip_count);
$stmt->fetch();
$stmt->close();

if ($ip_count >= $limit) {
    echo json_encode(["error" => "You've reached the submission limit. Try again after 12 hours."]);
    exit;
}

// Validate inputs (getting data from JSON body)
$name = $data['name'] ?? '';
$email = $data['email'] ?? '';
$rating = $data['rating'] ?? 0;
$message = $data['message'] ?? '';

if (empty($email) || empty($message) || empty($rating)) {
    echo json_encode(["error" => "Please fill in all required fields."]);
    exit;
}

// Save feedback to your feedback table - updated column names to match form fields
$stmt = $conn->prepare("INSERT INTO feedback (name, email, rating, message) VALUES (?, ?, ?, ?)");
if (!$stmt) {
    error_log("Feedback insert prepare failed: " . $conn->error);
    echo json_encode(["error" => "Database error while saving feedback."]);
    exit;
}

$stmt->bind_param("ssds", $name, $email, $rating, $message);
if (!$stmt->execute()) {
    error_log("Feedback insert execute failed: " . $stmt->error);
    echo json_encode(["error" => "Failed to save feedback."]);
    exit;
}
$stmt->close();

// Log the IP and time
error_log("Attempting to log IP: $user_ip");
$stmt = $conn->prepare("INSERT INTO ip_logs (ip_address, submitted_at) VALUES (?, NOW())");
if (!$stmt) {
    error_log("IP log prepare failed: " . $conn->error);
    echo json_encode(["success" => "Thank you for your feedback! (Note: IP logging failed)"]);
    exit;
}

$stmt->bind_param("s", $user_ip);
if (!$stmt->execute()) {
    error_log("IP log execute failed: " . $stmt->error);
    echo json_encode(["success" => "Thank you for your feedback! (Note: IP logging failed)"]);
    exit;
}
$stmt->close();

echo json_encode(["success" => "Thank you for your feedback!"]);
?>