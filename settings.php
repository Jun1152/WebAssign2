<?php
	$host = "localhost";
	$user = "root";
	$pswd = "";           // XAMPP default password is empty
	$dbnm = "succulent_db"; // Must match the name in phpMyAdmin exactly

	$conn = @mysqli_connect($host, $user, $pswd, $dbnm);

    // Check if connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>