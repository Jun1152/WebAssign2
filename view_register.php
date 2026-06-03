<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

require_once('settings.php');

// Handle deleting a user from the system
if (isset($_GET['delete_id'])) {
    $delete_id = (int)$_GET['delete_id'];

    $delete_query = "DELETE FROM user WHERE user_id = $delete_id";

    if (mysqli_query($conn, $delete_query)) {
        header("Location: view_register.php?msg=deleted");
        exit();
    } else {
        die("Delete failed: " . mysqli_error($conn));
    }
}

include 'header.inc.php';
?>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Registered User List | Admin View</title>
    <link rel='stylesheet' href='styles/style.css'>
</head>

<main class="form-container">
    <h2>Registered User List</h2>
    <br>

    <?php
    if (isset($_GET['msg'])) {
        if ($_GET['msg'] === 'deleted') {
            echo "<p>Customer account deleted successfully.</p>";
        }

        if ($_GET['msg'] === 'updated') {
            echo "<p>Customer account updated successfully.</p>";
        }
    }
    ?>

    <table class="policy-table">
        <thead>
            <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Street</th>
                <th>City</th>
                <th>State</th>
                <th>Postcode</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM user ORDER BY user_id ASC");

            if (!$result) {
                die("User query failed: " . mysqli_error($conn));
            }

            if (mysqli_num_rows($result) == 0) {
                echo "<tr>";
                echo "<td colspan='10'>No registered users found.</td>";
                echo "</tr>";
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['user_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['first_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['last_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['street']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['city']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['state']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['postcode']) . "</td>";
                    echo "<td>";
                    echo "<a href='edit_register.php?id=" . htmlspecialchars($row['user_id']) . "'>Edit</a>";
                    echo " | ";
                    echo "<a href='view_register.php?delete_id=" . htmlspecialchars($row['user_id']) . "' onclick='return confirm(\"Are you sure you want to permanently delete this user?\");'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>

    <p><a href="admindashboard.php" class="back-dashboard-btn"> Back to Dashboard</a></p>

    <br><br>

    <form action="logout.php" method="POST">
        <input type="submit" value="Log Out">
    </form>
</main>

<?php
mysqli_close($conn);
include 'footer.inc.php';
?>