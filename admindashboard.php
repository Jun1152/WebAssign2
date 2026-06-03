<?php
session_start();
// Security check: Only admins can access the central hub
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
require_once('settings.php');
include 'header.inc.php'; 
?>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Admin Dashboard | Management Hub</title>
    <link rel='stylesheet' href='styles/style.css'>
</head>

<main class="form-container">
    <h2>System Administrator Dashboard</h2>
    <p class="admin-welcome">Welcome back, <?php echo htmlspecialchars($_SESSION['username']); ?>! Select a database log overview to review:</p>

    <ul class="admin-menu">
        <li><a href="view_enquiry.php">📋 View Customer Enquiries</a></li>
        <li><a href="manage_orders.php">📦 View Customer Orders</a></li>
        <li><a href="view_register.php">👥 View Registered User List</a></li>
        <li><a href="view_account.php">⚙️ System Account Management</a></li>
        <li><a href="create_customer.php"> 👤 Create User Account</a></li>
    </ul>


    <form action="logout.php" method="POST" class="admin-logout-form">
        <input type="submit" value="Log Out">
    </form>
</main>
<?php include 'footer.inc.php'; ?>