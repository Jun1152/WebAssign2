<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

require_once('settings.php');

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));

    if (empty($username) || empty($password)) {
        $error = "All fields are required.";
    } else {
        // Check whether the user username already exists
        $check_query = "SELECT * FROM user WHERE username = '$username'";
        $check_result = mysqli_query($conn, $check_query);

        if (!$check_result) {
            $error = "Database error: " . mysqli_error($conn);
        } else if (mysqli_num_rows($check_result) > 0) {
            $error = "Username already exists.";
        } else {
            // Insert new user account into user table
            // Password is kept as plain text because login_process.php currently checks plain text password
            $insert_query = "INSERT INTO user (username, password)
                             VALUES ('$username', '$password')";

            if (mysqli_query($conn, $insert_query)) {
                $success = "New user account successfully created.";
            } else {
                $error = "Database error: " . mysqli_error($conn);
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User Account</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
<?php include 'header.inc.php'; ?>

<main class="form-container">
    <h2>Create User Account</h2>



    <?php
    if (!empty($error)) {
        echo "<p style='color:red;'>" . htmlspecialchars($error) . "</p>";
    }

    if (!empty($success)) {
        echo "<p style='color:green;'>" . htmlspecialchars($success) . "</p>";
    }
    ?>

    <form action="create_admin.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>


        <input type="submit" value="Create Account">
    </form>



    <p><a href="admindashboard.php" class="back-dashboard-btn"> Back to Dashboard</a></p>

</main>

<?php
mysqli_close($conn);
include 'footer.inc.php';
?>

</body>
</html>