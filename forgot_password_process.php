<?php include 'header.inc.php'; ?>
	<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='author' content='Jeff'>
    <title>Password Reset | Cacti-Succulent Kuching</title>
    <link rel='stylesheet' href='styles/style.css'>
	</head>
	
	<body>
		<main>
			<section class="form-container">
				<h2>Password Reset Requested</h2>

				<?php
				if ($_SERVER['REQUEST_METHOD'] === 'POST') {
					$email = trim($_POST['email'] ?? '');

					if (!empty($email)) {
						// In a real system, we would check the database and send an email.
						// For this assignment, we simulate success.
						echo "<p class='success-message'>If an account with <strong>" . htmlspecialchars($email) . "</strong> exists, a password reset link has been sent to your email.</p>";
						echo "<p>Please check your inbox (and spam folder).</p>";
					} else {
						echo "<p class='error-message'>Please enter a valid email address.</p>";
					}
				} else {
					echo "<p>Invalid request.</p>";
				}
				?>

				<div class="button-group" style="margin-top: 20px;">
					<a href="login.php" class="btn-secondary">Back to Login</a>
				</div>
			</section>
		</main>

<?php include 'footer.inc.php'; ?>