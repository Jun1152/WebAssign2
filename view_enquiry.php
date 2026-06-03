<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

require_once('settings.php');

// One-way status update: unresolved -> resolved only
if (isset($_GET['resolve_id'])) {
    $resolve_id = mysqli_real_escape_string($conn, $_GET['resolve_id']);

    $update_query = "UPDATE enquiry
                     SET status = 'resolved'
                     WHERE enquiry_id = '$resolve_id'
                     AND status = 'unresolved'";

    if (mysqli_query($conn, $update_query)) {
        header("Location: view_enquiry.php?msg=resolved");
        exit();
    } else {
        echo "Error updating enquiry status: " . mysqli_error($conn);
    }
}

include 'header.inc.php';
?>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Customer Enquiries | Admin View</title>
    <link rel='stylesheet' href='styles/style.css'>
</head>

<main class="form-container">
    <h2>Customer Enquiries (Admin View Only)</h2>
    <br>

    <?php
    if (isset($_GET['msg']) && $_GET['msg'] == 'resolved') {
        echo "<p>Enquiry successfully marked as resolved.</p>";
    }
    ?>

    <table class="policy-table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Type</th>
                <th>Comments</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM enquiry ORDER BY enquiry_id DESC");

            if (!$result) {
                die("Enquiry query failed: " . mysqli_error($conn));
            }

            if (mysqli_num_rows($result) == 0) {
                echo "<tr>";
                echo "<td colspan='7'>No enquiries found.</td>";
                echo "</tr>";
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
                    $status = !empty($row['status']) ? strtolower($row['status']) : 'unresolved';

                    echo "<tr>";

                    echo "<td>" . htmlspecialchars($row['first_name'] . ' ' . $row['last_name']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['phone']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['enquiry_type']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['comments']) . "</td>";

                    echo "<td>";
                    if ($status == 'unresolved') {
                        echo "<span class='status-badge status-pending'>Unresolved</span>";
                    } else {
                        echo "<span class='status-badge status-delivered'>Resolved</span>";
                    }
                    echo "</td>";

                    echo "<td>";
                    if ($status == 'unresolved') {
                        echo "<a href='view_enquiry.php?resolve_id=" . htmlspecialchars($row['enquiry_id']) . "' onclick='return confirm(\"Mark this enquiry as resolved?\");'>Mark as Resolved</a>";
                    } else {
                        echo "Already Resolved";
                    }
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