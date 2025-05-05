<?php
// Database credentials
$servername = "localhost"; 
$username = "godspeedexhibits_godspeedexcorp"; 
$password = "?Vct9J5]T%*M"; 
$dbname = "godspeedexhibits_sub"; 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]));
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and fetch form data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);    
    //$department = $conn->real_escape_string($_POST['department']);
    
    // Check if hCaptcha response is present
    if (isset($_POST['h-captcha-response']) && !empty($_POST['h-captcha-response'])) {
        // hCaptcha Secret Key
        $hcaptcha_secret = "ES_80d2dfe81849454189471c408f5cadf0";
        $hcaptcha_response = $_POST['h-captcha-response'];
        
        // Verify hCaptcha Response
        $verify_url = "https://hcaptcha.com/siteverify";
        
        // Setup POST request
        $data = [
            'secret' => $hcaptcha_secret,
            'response' => $hcaptcha_response
        ];
        
        // Use cURL for better error handling
        $ch = curl_init($verify_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        
        // Check for cURL errors
        if (curl_errno($ch)) {
            echo json_encode(["status" => "error", "message" => "cURL Error: " . curl_error($ch)]);
            curl_close($ch);
            $conn->close();
            exit;
        }
        
        curl_close($ch);
        $captcha_success = json_decode($response);
        
        // If hCaptcha verification failed
        if (!$captcha_success || !$captcha_success->success) {
            echo json_encode(["status" => "error", "message" => "Captcha verification failed!"]);
            $conn->close();
            exit;
        }
    } else {
        // hCaptcha response not provided
        echo json_encode(["status" => "error", "message" => "Please complete the captcha verification"]);
        $conn->close();
        exit;
    }

    // Insert data into the database
    $sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success", "message" => "Message saved to database!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Database Error: " . $conn->error]);
    }

    // Close connection
    $conn->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
?>