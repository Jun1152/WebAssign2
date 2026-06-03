<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "succulent_db"; // Matches your system settings.php connection variable

// 1. Create connection to the MySQL server
$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// 2. Create the target database if it doesn't exist yet
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if (mysqli_query($conn, $sql)) {
    echo "Database '$dbname' initialized successfully.<br>";
}

// 3. Select the active database namespace
mysqli_select_db($conn, $dbname);

// --- 4. EXECUTE CLEAN DATABASE TABLE BUILDS ---

// Table 1: user (For Customer Registration Schema - Houses all fields seen in screenshots)
$sql_user = "CREATE TABLE IF NOT EXISTS user (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(25) NOT NULL,
    last_name VARCHAR(25) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(15),
    street VARCHAR(40),
    city VARCHAR(20),
    state VARCHAR(3),
    postcode VARCHAR(5),
    username VARCHAR(20) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
)";

// Table 2: order (COMPREHENSIVE SINGLE-ROW LIST STRUCTURE WITH UPDATED DELIVERY STATUS)
// Drops old order variations to avoid duplicate column or name mapping conflicts
mysqli_query($conn, "DROP TABLE IF EXISTS `order`");

$sql_order = "CREATE TABLE `order` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `customer_name` VARCHAR(100) NOT NULL,
    `address` VARCHAR(255) NOT NULL,
    `contact_number` VARCHAR(20) NOT NULL,
    `product` VARCHAR(255) NOT NULL,
    `delivery` VARCHAR(50) NOT NULL,
    `payment_type` VARCHAR(50) NOT NULL,
    `order_date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `status` VARCHAR(20) DEFAULT 'pending' -- New Column: tracks 'pending' vs 'delivered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

// Table 3: enquiry (For Help Contact Forms With Added Action Status)
// Drops old enquiry variations to apply the fresh status tracking configuration cleanly
mysqli_query($conn, "DROP TABLE IF EXISTS `enquiry`");

$sql_enquiry = "CREATE TABLE `enquiry` (
    `enquiry_id` INT AUTO_INCREMENT PRIMARY KEY,
    `first_name` VARCHAR(25),
    `last_name` VARCHAR(25),
    `email` VARCHAR(100),
    `phone` VARCHAR(15),
    `enquiry_type` VARCHAR(20),
    `comments` TEXT,
    `status` VARCHAR(20) DEFAULT 'unresolved' -- New Column: tracks 'unresolved' vs 'resolved'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

// Table 4: admin (System Control Credentials)
$sql_admin = "CREATE TABLE IF NOT EXISTS admin (
    admin_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(20) NOT NULL UNIQUE,
    password VARCHAR(20) NOT NULL
)";

// --- 5. EXECUTE TABLE BUILD STATEMENTS & SEED ADMINISTRATIVE ACCOUNT ---

if (mysqli_query($conn, $sql_user)) echo "Table 'user' is ready.<br>";
if (mysqli_query($conn, $sql_order)) echo "Table 'order' initialized with dynamic delivery tracking status.<br>";
if (mysqli_query($conn, $sql_enquiry)) echo "Table 'enquiry' initialized with dynamic comment resolution status.<br>";

if (mysqli_query($conn, $sql_admin)) {
    echo "Table 'admin' is ready.<br>";
    
    // Auto-creates seed operator account if the internal admin table is empty
    $checkAdmin = mysqli_query($conn, "SELECT * FROM admin WHERE username = 'Admin'");
    if (mysqli_num_rows($checkAdmin) == 0) {
        // Hardcoded straight clear-text values as requested
        $seed_query = "INSERT INTO admin (username, password) VALUES ('Admin', 'Admin')";
        mysqli_query($conn, $seed_query);
        echo "<strong>Default system credentials created:</strong> (Username: Admin, Password: Admin)<br>";
    }
}

mysqli_close($conn);
echo "<br>🎉 Initialization complete! All interactive tables and status tracking columns are successfully ready in your database.";
?>