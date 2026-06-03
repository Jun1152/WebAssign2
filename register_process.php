<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('settings.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Collect all fields including the new Account Credentials
    $fname    = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lname    = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $phone    = mysqli_real_escape_string($conn, $_POST['phone']);
    $street   = mysqli_real_escape_string($conn, $_POST['street']);
    $city     = mysqli_real_escape_string($conn, $_POST['city']);
    $state    = mysqli_real_escape_string($conn, $_POST['state']);
    $postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
    
    // Capture the username and password from the "Create New" section
    $user     = mysqli_real_escape_string($conn, $_POST['username']);
    $pass     = mysqli_real_escape_string($conn, $_POST['password']);

    // 2. Check for all required fields
    if (empty($fname) || empty($email) || empty($street) || empty($postcode) || empty($user) || empty($pass)) {
        echo "<p style='color:red;'>Error: Please fill in all required details, including your new username and password.</p>";
    } else {
        // 3. Updated INSERT query to include username and password columns
        // Note: Ensure your 'user' table has 'username' and 'password' columns
        $query = "INSERT INTO user (first_name, last_name, email, phone, street, city, state, postcode, username, password) 
                  VALUES ('$fname', '$lname', '$email', '$phone', '$street', '$city', '$state', '$postcode', '$user', '$pass')";
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
        echo "<h1>Registration Successful!</h1>";
        echo "<p><a href='index.php'>Return to Store</a></p>";
        echo "</div>";
    } else {
        // This will tell you EXACTLY why phpMyAdmin doesn't have the data
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    echo "</body>";
    echo "</html>";

    }
}
mysqli_close($conn);
?>