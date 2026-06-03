<?php
session_start();

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
    <title>Customer Account Management | Admin View</title>
    <link rel='stylesheet' href='styles/style.css'>
</head>

<main class="form-container">
    <h2>Customer Account Management</h2>



    <br>

    <?php
    if (isset($_GET['msg'])) {
        if ($_GET['msg'] == 'deleted') {
            echo "<p>User successfully removed.</p>";
        }

        if ($_GET['msg'] == 'created') {
            echo "<p>New user successfully created.</p>";
        }

        if ($_GET['msg'] == 'updated') {
            echo "<p>User details updated successfully.</p>";
        }

        if ($_GET['msg'] == 'selfdelete') {
            echo "<p>Error: You cannot delete your own active account!</p>";
        }
    }
    ?>

    <table class="policy-table">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
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
                echo "<td colspan='5'>No user accounts found.</td>";
                echo "</tr>";
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['user_id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['username']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['password']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                    echo "<td>";
                    echo "<a href='edit_customer.php?id=" . htmlspecialchars($row['user_id']) . "'>Edit</a>";
                    echo " | ";
                    echo "<a href='delete_customer.php?id=" . htmlspecialchars($row['user_id']) . "' onclick='return confirm(\"Are you sure you want to delete this customer account?\");'>Delete</a>";
                    echo "</td>";
                }
            }
            ?>
        </tbody>
    </table>
    
    <p>
        <a href="admindashboard.php" class="back-dashboard-btn"> Back to Dashboard</a>
    </p>

    <br><br>

    <form action="logout.php" method="POST">
        <input type="submit" value="Log Out">
    </form>
</main>

<?php 
mysqli_close($conn);
include 'footer.inc.php'; 
?>