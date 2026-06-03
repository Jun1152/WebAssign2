<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

require_once('settings.php');

if (isset($_GET['id'])) {
    $delete_id = mysqli_real_escape_string($conn, $_GET['id']);
    
    $check_query = "SELECT username FROM admin WHERE admin_id = '$delete_id'";
    $check_result = mysqli_query($conn, $check_query);
    
    if ($row = mysqli_fetch_assoc($check_result)) {
        if ($row['username'] === $_SESSION['username']) {
            header("Location: create_admin.php?msg=admin_selfdelete");
            exit();
        }
    }

    $query = "DELETE FROM admin WHERE admin_id = '$delete_id'";
    if (mysqli_query($conn, $query)) {
        header("Location: create_admin.php?msg=admin_deleted");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    header("Location: create_admin.php");
}
exit();
?>
