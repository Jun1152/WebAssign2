<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

require_once('settings.php');

if (isset($_GET['id'])) {
    $user_id = mysqli_real_escape_string($conn, $_GET['id']);

    $query = "DELETE FROM user WHERE user_id = '$user_id'";

    if (mysqli_query($conn, $query)) {
        header("Location: view_account.php?msg=deleted");
        exit();
    } else {
        die("Delete failed: " . mysqli_error($conn));
    }
} else {
    header("Location: view_account.php");
    exit();
}

mysqli_close($conn);
?>