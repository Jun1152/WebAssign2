<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

require_once('settings.php');

// Handle Status Update Logic
if (isset($_POST['mark_delivered'])) {
    $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);

    // Only allow status change from pending to delivered
    $update_query = "UPDATE `order` 
                     SET status = 'delivered' 
                     WHERE id = '$order_id' AND status = 'pending'";

    if (!mysqli_query($conn, $update_query)) {
        die("Status update failed: " . mysqli_error($conn));
    }

    header("Location: manage_orders.php?msg=updated");
    exit();
}

// Handle Search Logic
$search_query = "";
if (isset($_GET['search_name']) && !empty($_GET['search_name'])) {
    $name = mysqli_real_escape_string($conn, $_GET['search_name']);

    // The order table uses "product", not "product_name"
    $search_query = " WHERE product LIKE '%$name%' ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders | Admin View</title>
    <link rel="stylesheet" href="styles/style.css"> 
</head>

<body>
<?php include 'header.inc.php'; ?>

<main class="form-container">
    <h2>Manage Orders</h2>



    <?php
    if (isset($_GET['msg'])) {
        if ($_GET['msg'] == 'deleted') {
            echo "<p>Order successfully deleted.</p>";
        }

        if ($_GET['msg'] == 'updated') {
            echo "<p>Order status successfully updated.</p>";
        }
    }
    ?>

    <form method="GET" action="manage_orders.php" style="margin-bottom: 20px;">
        <input type="text" name="search_name" placeholder="Search by Product Name">

        <div class="search-button-row">
            <input type="submit" value="Search">
            <a href="manage_orders.php" class="reset-btn">Reset</a>
        </div>
    </form>

    <table class="policy-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Contact Number</th>
                <th>Product</th>
                <th>Delivery</th>
                <th>Payment Type</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $query = "SELECT * FROM `order` $search_query ORDER BY order_date DESC";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                die("Order query failed: " . mysqli_error($conn));
            }

            if (mysqli_num_rows($result) == 0) {
                echo "<tr>";
                echo "<td colspan='10'>No orders found.</td>";
                echo "</tr>";
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
                    $product_display = str_replace(array("(", ")"), "", $row['product']);
                    $product_display = htmlspecialchars($product_display);
                    $product_display = str_replace(", ", ",<br>", $product_display);
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['customer_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['contact_number']) . "</td>";
                    echo "<td>" . $product_display . "</td>";
                    echo "<td>" . htmlspecialchars($row['delivery']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['payment_type']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['order_date']) . "</td>";
                    echo "<td>";

                    if ($row['status'] == 'pending') {
                        echo "<form method='POST' action='manage_orders.php' style='margin:0;'>";
                        echo "<input type='hidden' name='order_id' value='" . htmlspecialchars($row['id']) . "'>";
                        echo "<button type='submit' name='mark_delivered' class='status-badge status-pending' onclick='return confirm(\"Mark this order as delivered?\");'>";
                        echo "Pending";
                        echo "</button>";
                        echo "</form>";
                    } else {
                        echo "<span class='status-badge status-delivered'>Delivered</span>";
                    }

                    echo "</td>";

                    echo "<td>";
                    echo "<a href='delete_order.php?id=" . htmlspecialchars($row['id']) . "' onclick='return confirm(\"Delete this order?\")'>Delete</a>";
                    echo "</td>";

                    echo "</tr>";
                }
            }
            ?>

                
        </tbody>
    </table>

    <p><a href="admindashboard.php" class="back-dashboard-btn"> Back to Dashboard</a></p>

</main>

<?php
mysqli_close($conn);
include 'footer.inc.php';
?>

</body>
</html>