<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

require_once('settings.php');

$error = "";

if (!isset($_GET['id'])) {
    header("Location: view_account.php");
    exit();
}

$user_id = mysqli_real_escape_string($conn, $_GET['id']);

$query = "SELECT * FROM user WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("User query failed: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) == 0) {
    die("User not found.");
}

$row = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = trim($_POST['password']);

    if (empty($email)) {
    $error = "Email is required.";
    } else {
        if (empty($password)) {
            // Only update email if password field is empty
            $update_query = "UPDATE user 
                            SET email = '$email'
                            WHERE user_id = '$user_id'";
        } else {
            // Update both email and password
            $password = mysqli_real_escape_string($conn, $password);

            $update_query = "UPDATE user 
                            SET email = '$email', password = '$password'
                            WHERE user_id = '$user_id'";
        }

        if (mysqli_query($conn, $update_query)) {
            header("Location: view_account.php?msg=updated");
            exit();
        } else {
            $error = "Database error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer Account | Admin View</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
<?php include 'header.inc.php'; ?>

<main class="form-container">
    <h2>Edit Customer Account</h2>



    <?php
    if (!empty($error)) {
        echo "<p>" . htmlspecialchars($error) . "</p>";
    }
    ?>

    <form action="edit_customer.php?id=<?php echo htmlspecialchars($user_id); ?>" method="POST">
        <label>Username:</label>
        <p class="readonly-text">
            <?php echo htmlspecialchars($row['username']); ?>
        </p>
        <br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
        <br><br>

        <label for="password">New Password:</label>
        <input type="password" id="password" name="password">
        <br>
        <small>Leave blank if you do not want to change the password.</small>
        <br><br>

        <p>
        <a href="view_account.php">← Back to User Management</a>
        </p>

        <input type="submit" value="Update Account">
    </form>
</main>

<?php
mysqli_close($conn);
include 'footer.inc.php';
?>

</body>
</html>