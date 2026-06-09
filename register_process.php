<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once('settings.php');

// ==========================================
// CODE TO CLEAR SPAM (Handles the Reset Link)
// ==========================================
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] === 'clear_spam') {
    $_SESSION['reg_failed_attempts'] = 0;
    $_SESSION['reg_last_submit_time'] = 0;
    header("Location: register.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Initialize tracking variables in the session securely if they don't exist
    if (!isset($_SESSION['reg_last_submit_time'])) {
        $_SESSION['reg_last_submit_time'] = 0;
        $_SESSION['reg_failed_attempts'] = 0;
    }

    $current_time = time();

    // ==========================================
    // 1. HONEYPOT CHECK
    // ==========================================
    if (!empty($_POST['website_spamtrap'])) {
        $_SESSION['reg_failed_attempts'] += 3; // Instantly block
        http_response_code(400);
        die("<h1 style='color:red; font-family:sans-serif; text-align:center; margin-top:50px;'>Spam detected. Access Denied.</h1>");
    }

    // ==========================================
    // 2. RATE-LIMITING (RAPID CLICK SPAM CHECK)
    // ==========================================
    // If the difference between clicks is less than 3 seconds, increment a strike
    if (($current_time - $_SESSION['reg_last_submit_time']) < 3) {
        $_SESSION['reg_failed_attempts']++;
    }
    
    // Track the very last click timestamp
    $_SESSION['reg_last_submit_time'] = $current_time;

    // Check if they reached or exceeded the spam threshold
    if ($_SESSION['reg_failed_attempts'] >= 3) {
        http_response_code(429); // Too Many Requests
        die("<!DOCTYPE html>
        <html>
        <head><title>Spam Detected</title><link rel='stylesheet' href='styles/style.css'></head>
        <body style='font-family:sans-serif; background-color:#f8d7da; padding:40px;'>
            <div style='text-align:center; max-width:600px; margin:0 auto; background:white; padding:30px; border-radius:8px; box-shadow:0 2px 10px rgba(0,0,0,0.1);'>
                <h1 style='color:#721c24;'>Spam Detected</h1>
                <p>You have clicked the register button too many times rapidly or sent multiple incomplete registration forms.</p>
                <p>Please wait a few moments before trying again.</p>
                <br>
                <p><a href='register_process.php?action=clear_spam' style='display:inline-block; background-color:#721c24; color:white; padding:10px 20px; text-decoration:none; border-radius:4px; font-weight:bold;'>Reset Form & Try Again Safely</a></p>
            </div>
        </body>
        </html>");
    }

    // ==========================================
    // 3. SERVER-SIDE PARTIAL / EMPTY FIELD CHECK
    // ==========================================
    $form_is_valid = true;
    $required_fields = ['firstname', 'lastname', 'email', 'phone', 'street', 'city', 'state', 'postcode', 'username', 'password'];

    foreach ($required_fields as $field) {
        if (!isset($_POST[$field]) || trim($_POST[$field]) === '') {
            $form_is_valid = false;
        }
    }

    // Trigger penalty if any text inputs are blank
    if (!$form_is_valid) {
        $_SESSION['reg_failed_attempts']++; // Add a strike for invalid submissions
        
        die("<!DOCTYPE html>
        <html>
        <head><title>Validation Error</title></head>
        <body style='font-family:sans-serif; padding:20px; line-height:1.6;'>
            <h3 style='color:red;'>Registration Submission Error</h3>
            <p style='color:red; font-weight:bold;'>Error: Please completely fill in all required registration details, including your account credentials.</p>
            <p><a href='register.php'>Go back and try again</a></p>
        </body>
        </html>");
    }

    // ==========================================
    // 4. SUCCESSFUL VALIDATION (RESET STRIKES)
    // ==========================================
    $_SESSION['reg_failed_attempts'] = 0;

    // --- ORIGINAL DATABASE INSERTION CODE ---
    $fname    = mysqli_real_escape_string($conn, trim($_POST['firstname']));
    $lname    = mysqli_real_escape_string($conn, trim($_POST['lastname']));
    $email    = mysqli_real_escape_string($conn, trim($_POST['email']));
    $phone    = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $street   = mysqli_real_escape_string($conn, trim($_POST['street']));
    $city     = mysqli_real_escape_string($conn, trim($_POST['city']));
    $state    = mysqli_real_escape_string($conn, trim($_POST['state']));
    $postcode = mysqli_real_escape_string($conn, trim($_POST['postcode']));
    $user     = mysqli_real_escape_string($conn, trim($_POST['username']));
    $pass     = mysqli_real_escape_string($conn, trim($_POST['password']));

    $query = "INSERT INTO user (first_name, last_name, email, phone, street, city, state, postcode, username, password) 
              VALUES ('$fname', '$lname', '$email', '$phone', '$street', '$city', '$state', '$postcode', '$user', '$pass')";
              
    echo "<!DOCTYPE html>";
    echo "<html lang='en'>";
    echo "<head>";
    echo "<meta charset='UTF-8'>";             
    echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
    echo "<title>Registration Confirmed</title>";
    echo "<link rel='stylesheet' href='styles/style.css'> ";    
    echo "</head>";
    echo "<body>";

    if (mysqli_query($conn, $query)) {
        echo "<div class='success-container'>";
        echo "<h1>Registration Successful!</h1>";
        echo "<p><a href='index.php'>Return to Store</a></p>";
        echo "</div>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    echo "</body>";
    echo "</html>";
}

mysqli_close($conn);
?>