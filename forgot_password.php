<?php include 'header.inc.php'; ?>
	<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='author' content='Jeff'>
    <title>Forgot Password | Cacti-Succulent Kuching</title>
    <link rel='stylesheet' href='styles/style.css'>
	</head>
	
	<body>
		<main>
			<section class="form-container">
				<h2>Forgot Password</h2>
				<p>Enter your email address below. We will send you a password reset link.</p>

				<form method="post" action="forgot_password_process.php">
					<fieldset>
						<legend>Reset Password</legend>

						<label for="email">Email Address:</label>
						<input 
							type="email" 
							id="email" 
							name="email" 
							placeholder="Enter your registered email" 
							required
						>
					</fieldset>

					<div class="button-group">
						<input type="submit" value="Send Reset Link">
						<a href="login.php" class="btn-secondary">Back to Login</a>
					</div>
				</form>
			</section>
		</main>

<?php include 'footer.inc.php'; ?>