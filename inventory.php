<?php
session_start();
// Security check
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
require_once('settings.php');

$message = "";

// 1. Process Form Submission (Updates occur here before the page loads the table)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_inventory'])) {
    
    // Loop through the posted arrays
    foreach($_POST['product_id'] as $index => $id) {
        $safe_id = (int)$id;
        $new_price = (float)$_POST['price'][$index];
        $new_stock = (int)$_POST['stock'][$index];
        
        $update_query = "UPDATE products SET price = '$new_price', stock = '$new_stock' WHERE product_id = '$safe_id'";
        mysqli_query($conn, $update_query);
    }
    $message = "<p style='color: green; font-weight: bold;'>Inventory and Pricing successfully updated!</p>";
}

include 'header.inc.php'; 
?>
<head>
    <meta charset='UTF-8'>
    <title>Inventory Management</title>
    <link rel='stylesheet' href='styles/style.css'>
</head>

<main class="form-container" style="max-width: 800px;">
    <h2>Inventory & Pricing Management</h2>
    
    <?php echo $message; ?>

    <form action="inventory.php" method="POST">
        <table class="product-table2" style="width: 100%; margin-top: 20px;">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price (RM)</th>
                    <th>Remaining Stock</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM products ORDER BY product_id ASC");
                while($row = mysqli_fetch_assoc($result)) {
                    $id = $row['product_id'];
                    $name = htmlspecialchars($row['product_name']);
                    $price = $row['price'];
                    $stock = $row['stock'];
                    
                    echo "<tr>";
                    echo "<td>$name <input type='hidden' name='product_id[]' value='$id'></td>";
                    // Input for Price
                    echo "<td><input type='number' name='price[]' step='0.01' min='0' value='$price' style='width: 80px;'></td>";
                    // Input for Stock
                    echo "<td><input type='number' name='stock[]' min='0' value='$stock' style='width: 80px;'></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

            <p><a href="admindashboard.php" class="back-dashboard-btn"> Back to Dashboard</a></p>

        <br><br>
        <input type="submit" name="update_inventory" value="Save Changes to Database">
    </form>
</main>

<?php include 'footer.inc.php'; ?>