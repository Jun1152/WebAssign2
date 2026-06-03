<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
require_once('settings.php');

// Handle status toggling between pending and delivered
if (isset($_GET['toggle_id']) && isset($_GET['current_status'])) {
    $order_id = (int)$_GET['toggle_id'];
    $new_status = ($_GET['current_status'] === 'delivered') ? 'pending' : 'delivered';
    
    $update_query = "UPDATE `order` SET status = '$new_status' WHERE id = $order_id";
    mysqli_query($conn, $update_query);
    header("Location: view_order.php");
    exit();
}

include 'header.inc.php'; 
?>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>All Customer Orders | Admin View</title>
    <link rel='stylesheet' href='styles/style.css'>
</head>

<main class="form-container">
    <h2>All Customer Orders</h2>
    
    <br>

    <table class="view-order-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer Name</th>
                <th>Address</th>
                <th>Contact Number</th>
                <th>Product Summary</th>
                <th>Delivery Mode</th>
                <th>Payment Type</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM `order` ORDER BY order_date DESC");
            while($row = mysqli_fetch_assoc($result)) {
                $status = !empty($row['status']) ? $row['status'] : 'pending';
                $status_class = ($status === 'delivered') ? 'status-delivered' : 'status-pending';

                echo"<tr>
                    <td>" . htmlspecialchars($row['id']) . "</td>
                    <td>" . htmlspecialchars($row['customer_name']) . "</td>
                    <td>" . htmlspecialchars($row['address']) . "</td>
                    <td>" . htmlspecialchars($row['contact_number']) . "</td>
                    <td>" . htmlspecialchars($row['product']) . "</td>
                    <td>" . htmlspecialchars($row['delivery']) . "</td>
                    <td>" . htmlspecialchars($row['payment_type']) . "</td>
                    <td>" . htmlspecialchars($row['order_date']) . "</td>
                    <td><span class='$status_class'>" . ucfirst($status) . "</span></td>
                    <td>
                         <a href='view_order.php?toggle_id={$row['id']}&current_status={$status}'>
                            Mark as " . (($status === 'delivered') ? 'Pending' : 'Delivered') . "
                        </a>
                    </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>

    <p><a href="manage_orders.php">← Details about Order</a></p>  

    <p><a href="admindashboard.php" class="back-dashboard-btn"> Back to Dashboard</a></p>
    
    <br><br>
    <form action="logout.php" method="POST">
        <input type="submit" value="Log Out">
    </form>
</main>
<?php include 'footer.inc.php'; ?>