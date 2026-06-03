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
        <section class="form-container">
            <h2>Customer Registration</h2>
            <p>Create an account to reserve plants and manage your orders.</p><br>
            
            <form action="register_process.php" method="POST">
                
				
                <label for="firstname">First Name:</label>
                <input type="text" id="firstname" name="firstname" maxlength="25" pattern="[A-Za-z]+" title="Alphabetical characters only" required>
                <br>

                <label for="lastname">Last Name:</label>
                <input type="text" id="lastname" name="lastname" maxlength="25" pattern="[A-Za-z]+" title="Alphabetical characters only" required>
                <br>

                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>
                <br>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" maxlength="10" pattern="\d{1,10}" placeholder="e.g. 0123456789" required>
                <br>





                <fieldset>
                    <legend>Delivery Address</legend>
                    
                    <label for="street">Street Address:</label>
                    <input type="text" id="street" name="street" required>
                    <br>

                    <label for="city">City/Town:</label>
                    <input type="text" id="city" name="city" required>
                    <br>

                    <label for="state">State:</label>
                    <select id="state" name="state" required>
                        <option value="">-- Select a State/Territory --</option>
                        <option value="JHR">Johor</option>
                        <option value="KDH">Kedah</option>
                        <option value="KTN">Kelantan</option>
                        <option value="MLK">Malacca</option>
                        <option value="NSN">Negeri Sembilan</option>
                        <option value="PHG">Pahang</option>
                        <option value="PRK">Perak</option>
                        <option value="PLS">Perlis</option>
                        <option value="PNG">Penang</option>
                        <option value="SBH">Sabah</option>
                        <option value="SWK">Sarawak</option>
                        <option value="SGR">Selangor</option>
                        <option value="TRG">Terengganu</option>
                        <option value="KUL">W.P. Kuala Lumpur</option>
                        <option value="LBN">W.P. Labuan</option>
                        <option value="PJY">W.P. Putrajaya</option>
                    </select>
                    <br>

                    <label for="postcode">Postcode:</label>
                    <input type="text" id="postcode" name="postcode" pattern="\d{5}" title="Exactly 5 digits required" required>
                </fieldset>
                <br>
				
				<fieldset>
				<legend>Create New</legend>

					<label for="username">Username:</label>
					<input type="text" id="username" name="username" maxlength="20" required>
					<br>

					<label for="password">Password:</label>
					<input type="password" id="password" name="password" maxlength="20" required>
				
				</fieldset>
				<br>


                <input type="submit" value="Register">
                <input type="reset" value="Reset">

            </form>
        </section>
		
    </main>

<?php include 'footer.inc.php'; ?>