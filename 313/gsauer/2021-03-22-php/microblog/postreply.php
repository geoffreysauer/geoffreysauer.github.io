<?php

if(!isset($_COOKIE['login'])) {
	header( "Location: http://snm.engl.iastate.edu/313/gsauer/08-php/microblog/login.html" );
} else {
	$logincookie = $_COOKIE["login"];
	$servername = "localhost";
	$username = "313";
	$password = "webdes";
	$dbname = "313_micro";

	$conn = new mysqli($servername, $username, $password, $dbname);
	if ($conn->connect_error) {
	    die("Username lookup failed: " . $conn->connect_error);
	}
	$sql="SELECT * FROM user WHERE (user.id LIKE '".$logincookie."');";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        if(strlen($row["fname"])>1)
	        	{$login = $row["fname"]." ".$row["lname"];}
	    }
	}
}

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ugly, simple post.

$message = $_POST['message'];
$replypost = $_POST['id'];
$replytoreply=$_POST['replytoreply'];
$replylevel = $_POST['replylevel'];

// More sophisticated, safer post.

// $message = mysql_real_escape_string($_POST['message']);

$sql = "INSERT INTO `reply` (`id`, `message`, `replytopost`, `replytoreply`, `replylevel`, `user`, `firstposted`) VALUES (NULL, '".$message."', '".$replypost."', '".$replytoreply."', '".$replylevel."', '".$logincookie."', CURRENT_TIMESTAMP);";

$result = $conn->query($sql);

$conn->close();

	header( "Location: http://snm.engl.iastate.edu/313/gsauer/08-php/microblog/" );

?>




