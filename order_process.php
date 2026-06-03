<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once('settings.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the text fields from your form
    // Make sure your form (order.php) inputs match these exact POST keys!
    $customer_name = mysqli_real_escape_string($conn, trim($_POST['customer_name']));
    $address = mysqli_real_escape_string($conn, trim($_POST['address']));
    $contact_number = mysqli_real_escape_string($conn, trim($_POST['contact_number']));
    $delivery = mysqli_real_escape_string($conn, $_POST['delivery2']);
    $payment = mysqli_real_escape_string($conn, $_POST['payment2']);
    
    // Check if any products were selected
    if (isset($_POST['selected']) && is_array($_POST['selected'])) {
        
        $compiled_items = array();

        // Loop through the selected items to build our text strings
        foreach ($_POST['selected'] as $index => $product_name) {
            $qty = (int)$_POST['qty'][$index]; 
            
            // Only add to list if quantity is greater than 0
            if ($qty > 0) {
                $compiled_items[] = $product_name . " - " . $qty;
            }
        }

        // Only save if at least one product had a valid quantity
        if (!empty($compiled_items)) {
            // Join items together cleanly: "Golden Barrel Cactus - 2, Peanut cactus - 3"
            $products_string = "(" . implode(", ", $compiled_items) . ")";
            $safe_products = mysqli_real_escape_string($conn, $products_string);
            
            // Insert the entire order as ONE SINGLE ROW into your new database table
            $query = "INSERT INTO `order` (customer_name, address, contact_number, product, delivery, payment_type) 
                      VALUES ('$customer_name', '$address', '$contact_number', '$safe_products', '$delivery', '$payment')";
            
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
                echo "<h1>Order Confirmed!</h1>";
                echo "<p>Success! Your order has been placed cleanly into a single summary block.</p>";
                echo "<p>Items: " . htmlspecialchars($products_string) . "</p>";
                echo "<p><a href='index.php'>Return to Store</a></p>";
                echo "</div>";
            } else {
                echo "<p style='color:red;'>Database Error: " . mysqli_error($conn) . "</p>";
            }

            echo "</body>";
            echo "</html>";
        } else {
            echo "<p style='color:red;'>Error: You checked a box but didn't enter a quantity for that item.</p>";
        }
    } else {
        echo "<p style='color:red;'>Error: Please select at least one product to order.</p>";
    }
}
mysqli_close($conn);
?>