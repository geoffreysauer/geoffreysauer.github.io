<?php

// Set variables.
	
	$servername = "localhost";
	$username = "313";
	$password = "webdes";
	$dbname = "313_micro";
	$login = $_POST['username'];
//  $pass = $_POST['pass'];
	$pass = hash("md5",$_POST['pass']);
	
	// Create database connection.
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check database connection. Give error, if broken.
	
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
	// Send SQL request for all info from the table main, sorted in descending order by id.

	$sql="SELECT * FROM user WHERE (user.username LIKE '".$login."') AND (user.pass LIKE '".$pass."');";
	
	$result = $conn->query($sql);
	
	// Show results from each row.
	
	if ($result->num_rows > 0) {
	
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
			$cookie_name = "login";
			$cookie_value = $row["id"];
			setcookie($cookie_name, $cookie_value, time() + (86400 * 1), "/"); // 86400 = 1 day
			header( "Location: http://snm.engl.iastate.edu/313/gsauer/08-php/microblog/" );
	    }
	
	// Show error if nothing found.
	
	} else {
	    echo "<!DOCTYPE html><html><head><title>Login Error</title></head><body>That username/password combination is not in the database.</body></html>";
	}
	
	// Close database connection.
	
	$conn->close();

	
?>