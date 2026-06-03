<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('settings.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize data
    $fname    = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lname    = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $phone    = mysqli_real_escape_string($conn, $_POST['phone']);
    $type     = mysqli_real_escape_string($conn, $_POST['enquiry']);
    $comments = mysqli_real_escape_string($conn, $_POST['comments']);

    // Server-side validation
    if (empty($fname) || empty($email) || empty($comments)) {
        echo "<p style='color:red;'>Error: Please fill in all required fields.</p>";
    } else {
        // Insert into database
        $query = "INSERT INTO enquiry (first_name, last_name, email, phone, enquiry_type, comments) 
                  VALUES ('$fname', '$lname', '$email', '$phone', '$type', '$comments')";
        
        echo "<!DOCTYPE html>";
        echo "<html lang='en'>";
        echo "<head>";
        echo "<meta charset='UTF-8'>";             
        echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
        echo "<title>Order Confirmed</title>";
        echo "<link rel='stylesheet' href='styles/style.css'> ";    
        echo "</head>";
        echo "<body>";

        if (mysqli_query($conn, $query)) {
            echo "<div class='success-container'>";
            echo "<h1>Thank You!</h1>";
            echo "<p>Hi $fname, your enquiry regarding <strong>$type</strong> has been received.</p>";
            echo "<p>We will get back to you at $email shortly.</p>";
            echo "<p><a href='index.php'>Return to Cacti-Succulent Kuching</a></p>";
            echo "</div>";
        } else {
            echo "Database error: " . mysqli_error($conn);
        }

        echo "</body>";
        echo "</html>";
    }
}
mysqli_close($conn);
?>