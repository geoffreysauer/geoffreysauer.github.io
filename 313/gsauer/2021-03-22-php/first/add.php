<?php
	$servername = "localhost";
	$username = "313";
	$password = "webdes";
	$dbname = "313_first";
	
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ugly, simple post.

$message = $_POST['message'];

// $message = mysql_real_escape_string($_POST['message']);

$sql = "INSERT INTO main VALUES (NULL, '".$message."', CURRENT_TIME);";

$result = $conn->query($sql);

$conn->close();

	header( "Location: http://snm.engl.iastate.edu/313/gsauer/08-php/first/" );

?>