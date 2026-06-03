<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

require_once('settings.php');

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // The order table uses "id", not "order_id"
    $query = "DELETE FROM `order` WHERE id = '$id'";

    if (mysqli_query($conn, $query)) {
        header("Location: manage_orders.php?msg=deleted");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    header("Location: manage_orders.php");
    exit();
}

mysqli_close($conn);
?>