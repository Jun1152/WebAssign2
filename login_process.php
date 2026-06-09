<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once('settings.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = mysqli_real_escape_string($conn, trim($_POST['username']));
    $pass = mysqli_real_escape_string($conn, trim($_POST['password']));

    $admin_query = "SELECT * FROM admin WHERE username = '$user' AND password = '$pass'";
    $admin_result = mysqli_query($conn, $admin_query);

    if (mysqli_num_rows($admin_result) > 0) {
    $admin_row = mysqli_fetch_assoc($admin_result);
    $_SESSION['role'] = 'admin';
    $_SESSION['username'] = $admin_row['username'];
    
    // Clean, proper redirection:
    header("Location: admindashboard.php"); 
    exit();
	}

    // 2. If not admin, check the regular USER table for customers
    $user_query = "SELECT * FROM user WHERE username = '$user' AND password = '$pass'";
    $user_result = mysqli_query($conn, $user_query);

    if (mysqli_num_rows($user_result) > 0) {
        $user_row = mysqli_fetch_assoc($user_result);
        $_SESSION['role'] = 'user';
        $_SESSION['username'] = $user_row['username'];
        header("Location: index.php"); 
        exit();
    } else {
        // Both failed
        echo "<h2 style='color:red;'>Access Denied</h2>";
        echo "<p>Invalid credentials for both Admin and User.</p>";
        echo "<a href='login.php'>Try again</a>";
    }
}
mysqli_close($conn);
?>