<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

require_once('settings.php');

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, trim($_POST['username']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));

    if (empty($username) || empty($password) || empty($email)) {
        $error = "All fields are required.";
    } else {
        $check = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

        if (!$check) {
            $error = "Database error: " . mysqli_error($conn);
        } else if (mysqli_num_rows($check) > 0) {
            $error = "Username already taken.";
        } else {
            $query = "INSERT INTO user (username, password, email)
                      VALUES ('$username', '$password', '$email')";

            if (mysqli_query($conn, $query)) {
                header("Location: view_account.php?msg=created");
                exit();
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
    <title>Add New Customer Account | Admin View</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
<?php include 'header.inc.php'; ?>

<main class="form-container">
    <h2>Add New Customer Account</h2>

    <br>

    <?php
    if (!empty($error)) {
        echo "<p>" . htmlspecialchars($error) . "</p>";
    }
    ?>

    <form action="create_customer.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

    <p>
        <a href="admindashboard.php" class="back-dashboard-btn"> Back to Dashboard</a>
    </p>
        <br><br>
        
        <input type="submit" value="Create Account">

            

    </form>

</main>

<?php
mysqli_close($conn);
include 'footer.inc.php';
?>

</body>
</html>