<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

require_once('settings.php');

$error = "";

if (!isset($_GET['id'])) {
    header("Location: view_register.php");
    exit();
}

$user_id = mysqli_real_escape_string($conn, $_GET['id']);

// Get current user data
$result = mysqli_query($conn, "SELECT * FROM user WHERE user_id = '$user_id'");

if (!$result) {
    die("User query failed: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) == 0) {
    die("User not found.");
}

$row = mysqli_fetch_assoc($result);

// Update user data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = mysqli_real_escape_string($conn, trim($_POST['first_name']));
    $last_name = mysqli_real_escape_string($conn, trim($_POST['last_name']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $street = mysqli_real_escape_string($conn, trim($_POST['street']));
    $city = mysqli_real_escape_string($conn, trim($_POST['city']));
    $state = mysqli_real_escape_string($conn, trim($_POST['state']));
    $postcode = mysqli_real_escape_string($conn, trim($_POST['postcode']));

    if (empty($first_name) || empty($last_name) || empty($email)) {
        $error = "First name, last name, and email are required.";
    } else {
        $update_query = "UPDATE user SET
                            first_name = '$first_name',
                            last_name = '$last_name',
                            email = '$email',
                            phone = '$phone',
                            street = '$street',
                            city = '$city',
                            state = '$state',
                            postcode = '$postcode'
                         WHERE user_id = '$user_id'";

        if (mysqli_query($conn, $update_query)) {
            header("Location: view_register.php?msg=updated");
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
    <title>Edit Registered User</title>
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
<?php include 'header.inc.php'; ?>

<main class="form-container">
    <h2>Edit Registered User</h2>

    <?php
    if (!empty($error)) {
        echo "<p style='color:red;'>" . htmlspecialchars($error) . "</p>";
    }
    ?>

    <form action="edit_register.php?id=<?php echo htmlspecialchars($user_id); ?>" method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($row['first_name']); ?>" required>
        <br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($row['last_name']); ?>" required>
        <br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
        <br><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($row['phone']); ?>">
        <br><br>

        <label for="street">Street:</label>
        <input type="text" id="street" name="street" value="<?php echo htmlspecialchars($row['street']); ?>">
        <br><br>

        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="<?php echo htmlspecialchars($row['city']); ?>">
        <br><br>

        <label for="state">State:</label>
        <input type="text" id="state" name="state" value="<?php echo htmlspecialchars($row['state']); ?>">
        <br><br>

        <label for="postcode">Postcode:</label>
        <input type="text" id="postcode" name="postcode" value="<?php echo htmlspecialchars($row['postcode']); ?>">
        
        <p>
            <a href="view_register.php">← Back to Registered User List</a>
        </p>

        <br><br>
        <input type="submit" value="Update User">
        


    </form>
</main>

<?php
mysqli_close($conn);
include 'footer.inc.php';
?>

</body>
</html>