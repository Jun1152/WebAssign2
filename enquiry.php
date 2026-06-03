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
            <h2>Send us an Enquiry</h2>
			<p>We will get back to you within 24-48 hours.</p><br>
            
            <form action="enquiry_process.php" method="POST">
                
                <fieldset>
                    <legend>Personal Information</legend>

                    <label for="firstname">First Name:</label>
                    <input type="text" id="firstname" name="firstname" maxlength="25" pattern="[A-Za-z]+"
                        title="Alphabetical characters only" required>

                    <label for="lastname">Last Name:</label>
                    <input type="text" id="lastname" name="lastname" maxlength="25" pattern="[A-Za-z]+"
                        title="Alphabetical characters only" required>

                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" required>

                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" maxlength="10" pattern="\d{1,10}"
                        placeholder="e.g. 0123456789" required>

                </fieldset>

                <label for="enquiry">Enquiry Type:</label>
                <select id="enquiry" name="enquiry" required>
                    <option value="">-- Select a Type --</option>
                    <option value="product">Product Information</option>
                    <option value="service">Plant Care Service</option>
                    <option value="delivery">Delivery</option>
                    <option value="other">Other</option>
                </select>

                <label for="comments">Comments:</label>
                <textarea id="comments" name="comments" rows="6" placeholder="Type your message here..." required></textarea>
				<br>
				
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">

            </form>
        </section>
    </main>

<?php include 'footer.inc.php'; ?>