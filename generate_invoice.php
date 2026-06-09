<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_GET['order_id'])) {
    die("Error: Request missing a valid transaction identity reference.");
}

require_once('settings.php');
$order_id = (int)$_GET['order_id'];

// Fetch the order data
$query = "SELECT * FROM `order` WHERE id = $order_id";
$result = mysqli_query($conn, $query);

if (!$result || mysqli_num_rows($result) === 0) {
    die("Error: No records found for order #" . htmlspecialchars($order_id));
}

$order = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - #<?php echo htmlspecialchars($order['id']); ?></title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

    <table width="800" align="center" border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td valign="top">
                            <h2>CACTI-SUCCULENT KUCHING</h2>
                            <p>Premium Succulents Specialists<br>Kuching, Sarawak, Malaysia</p>
                        </td>
                        <td align="right" valign="top">
                            <h1>TAX INVOICE</h1>
                            <p><strong>Invoice No:</strong> #CSK-<?php echo htmlspecialchars($order['id']); ?></p>
                            <p><strong>Order Date:</strong> <?php echo htmlspecialchars($order['order_date']); ?></p>
                        </td>
                    </tr>
                </table>

                <hr size="2" color="#000000">
                <br>

                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="50%" valign="top">
                            <h3>Billed To:</h3>
                            <p><strong>Customer Name:</strong> <?php echo htmlspecialchars($order['customer_name']); ?></p>
                            <p><strong>Contact Line:</strong> <?php echo htmlspecialchars($order['contact_number']); ?></p>
                        </td>
                        <td width="50%" align="right" valign="top">
                            <h3>Delivery Details:</h3>
                            <p><strong>Address:</strong> <?php echo htmlspecialchars($order['address']); ?></p>
                            <p><strong>Option:</strong> <?php echo htmlspecialchars(ucfirst($order['delivery'])); ?></p>
                            <p><strong>Payment Mode:</strong> <?php echo htmlspecialchars(ucfirst($order['payment_type'])); ?></p>
                        </td>
                    </tr>
                </table>

                <br><br>

                <h3>Order Summary</h3>
                <table class="invoice-table">
                    <thead>
                        <tr>
                            <th>Itemized Plant Varieties</th>
                            <th class="text-right" width="100">Price</th>
                            <th class="text-right" width="100">Quantity</th>
                            <th class="text-right" width="120">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $grand_total = 0;
                        
                        // Strip out the wrapping parentheses "( )" you appended in order_process.php
                        $clean_string = trim($order['product'], "()");
                        
                        if (!empty($clean_string)) {
                            // Split string back into separate item elements via the commas
                            $items = explode(", ", $clean_string);
                            
                            foreach ($items as $item) {
                                // Split the item name and quantity via the hyphen separating them
                                $parts = explode(" - ", $item);
                                if (count($parts) == 2) {
                                    $product_name = trim($parts[0]);
                                    $qty = (int)trim($parts[1]);
                                    
                                    // Fetch current price from your product stock inventory
                                    $safe_name = mysqli_real_escape_string($conn, $product_name);
                                    $price_query = "SELECT price FROM products WHERE product_name = '$safe_name'";
                                    $price_result = mysqli_query($conn, $price_query);
                                    
                                    $price = 0.00;
                                    if ($price_result && $row = mysqli_fetch_assoc($price_result)) {
                                        $price = (float)$row['price'];
                                    }
                                    
                                    $row_total = $price * $qty;
                                    $grand_total += $row_total;
                                    
                                    echo "<tr>";
                                    echo "<td>" . htmlspecialchars($product_name) . "</td>";
                                    echo "<td class='text-right'>RM " . number_format($price, 2) . "</td>";
                                    echo "<td class='text-right'>$qty</td>";
                                    echo "<td class='text-right'>RM " . number_format($row_total, 2) . "</td>";
                                    echo "</tr>";
                                }
                            }
                        }
                        ?>
                        <tr>
                            <td colspan="3" class="text-right"><strong>Grand Total:</strong></td>
                            <td class="text-right"><strong>RM <?php echo number_format($grand_total, 2); ?></strong></td>
                        </tr>
                    </tbody>
                </table>

            <div class="btn-container">
                <button type="button" class="print-btn" onclick="window.print()">Print / Save PDF</button>
            </div>

            </td>
        </tr>
    </table>

</body>
</html>