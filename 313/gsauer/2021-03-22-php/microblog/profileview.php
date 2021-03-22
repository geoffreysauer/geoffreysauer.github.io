<?php
if(!isset($_COOKIE['login'])) {
	header( "Location: http://snm.engl.iastate.edu/313/gsauer/08-php/microblog/login.html" );
} else {
	$logincookie = $_COOKIE['login'];
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
	        	{
	        	$id = $row["id"];
	        	$fname = $row["fname"];
	        	$lname = $row["lname"];
	        	$username = $row["username"];
	        	$pass = $row["pass"];
	        	$pic = $row["pic"];
	        	$login = $row["fname"]." ".$row["lname"];}
	    }
	}
	$conn->close();
}
?><!DOCTYPE html>
<html>
<head>
	<title>313 Microblog: Update Profile</title>
	<link href="styles.css" rel="stylesheet" type="text/css">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
	<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
	<script type="text/javascript">tinymce.init({ selector: "textarea", theme: "modern", skin: "lightgray", plugins: [ "advlist autolink lists link image charmap emoticons spellchecker print textcolor preview anchor searchreplace visualblocks code fullscreen insertdatetime media table  paste " ], statusbar: false, menubar: false, resize: false, toolbar1: "undo redo | bold italic strikethrough | | forecolor backcolor | code fullscreen "});</script>
	<style>
		input { position: absolute; left: 150px; }
	</style>
</head>
<body>

<header><h1><a href="http://snm.engl.iastate.edu/313/gsauer/08-php/microblog/"><img src="logo.jpg" width="48" height="36" alt="Logo "></a>Geoff's First Microblog: Update User Info for '<?php echo $login; ?>'</h1></header>

<div>
<form method="post" action="profileupdate.php">
 
<p>ID:&nbsp;&nbsp;<input type="text" name="id" value="<?php echo $id; ?>" readonly style="background-color:#eee; color:#666;"></p>

<p>Username:&nbsp;&nbsp;<input type="text" name="username" value="<?php echo $username; ?>" readonly style="background-color:#eee; color:#666;"></p>

<p>Password:&nbsp;&nbsp;<input type="password" name="pass" value="<?php echo $pass; ?>"></p>

<p>First Name:&nbsp;&nbsp;<input type="text" name="fname" value="<?php echo $fname; ?>"></p>

<p>Last Name:&nbsp;&nbsp;<input type="text" name="lname" value="<?php echo $lname; ?>"></p>

<p>Photo URL:&nbsp;&nbsp;<input type="text" name="pic" value="<?php echo $pic; ?>"></p>

<input type="submit" value="Update Information">

</form>
</div>

<footer><p>Copyright &copy; 2019 by Geoffrey Sauer. All rights reserved.</p></footer>

</body>
</html>