<?php include 'header.inc.php'; ?>
	<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name='author' content='Yeo Zi Yi'>
    <title>Succulents | Cacti-Succulent Kuching</title>
    <link rel='stylesheet' href='styles/style.css'>
	</head>
	
	<body>
		<main>
			<!-- Login Section -->
			<section class="form-container login-section">
				<h2>Account Login</h2>
				<p>Please login to access your account.</p>

				<form method="post" action="login_process.php">
					<fieldset>
						<legend>Login Details</legend>

						<label for="Username">Username:</label>
						<input
							type="text"
							id="Username"
							name="username" 
							maxlength="20"
							required
						>

						<label for="Password">Password:</label>
						<input
							type="password"
							id="Password"
							name="password"
							maxlength="20"
							required
						>
					</fieldset>

					<div class="button-group">
						<input type="submit" value="Login">
						<a href="forgot_password.php" class="btn-forgot">Forgot Password?</a>
					</div>
				</form>
			</section>
		</main>

<?php include 'footer.inc.php'; ?>