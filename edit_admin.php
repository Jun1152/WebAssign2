<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}
require_once('settings.php');
include 'header.inc.php'; 

$error = "";
$admin_id = "";
$username = "";

if (isset($_GET['id'])) {
    $admin_id = mysqli_real_escape_string($conn, $_GET['id']);
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE admin_id = '$admin_id'");
    
    if ($row = mysqli_fetch_assoc($result)) {
        $username = $row['username'];
    } else {
        header("Location: create_admin.php");
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_id = mysqli_real_escape_string($conn, $_POST['admin_id']);
    $new_username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $new_password = trim($_POST['password']);

    if (empty($new_username)) {
        $error = "Username cannot be empty.";
    } else {
        $query = "UPDATE admin SET username = '$new_username' WHERE admin_id = '$admin_id'";
        
        if (mysqli_query($conn, $query)) {
            if (!empty($new_password)) {
                $escaped_password = mysqli_real_escape_string($conn, $new_password);
                mysqli_query($conn, "UPDATE admin SET password = '$escaped_password' WHERE admin_id = '$admin_id'");
            }
            
            header("Location: create_admin.php?msg=admin_updated");
            exit();
        } else {
            $error = "Database error: " . mysqli_error($conn);
        }
    }
}
?>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Edit Admin Account | Admin View</title>
    <link rel='stylesheet' href='styles/style.css'>
</head>

<main class="form-container">
    <h2>Edit Admin Account</h2>
    <p><a href="admindashboard.php" class="back-dashboard-btn">← Back to Admin Dashboard</a></p><br>

    <?php if (!empty($error)) echo "<p>$error</p>"; ?>

    <form action="edit_admin.php" method="POST">
        <input type="hidden" name="admin_id" value="<?php echo htmlspecialchars($admin_id); ?>">

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required><br><br>

        <label for="password">New Password (leave blank to keep current):</label>
        <input type="password" id="password" name="password"><br><br>

        <input type="submit" value="Update Account">
    </form>
</main>
<?php include 'footer.inc.php'; ?>
