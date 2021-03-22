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
	        	{$login = $row["fname"]." ".$row["lname"];}
	    }
	}
	$conn->close();
}
?><!DOCTYPE html>
<html>
<head>
	<title>313 Microblog</title>
	<link href="styles.css" rel="stylesheet" type="text/css">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
	<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
	<script type="text/javascript">tinymce.init({ selector: "textarea", theme: "modern", skin: "lightgray", plugins: [ "advlist autolink lists link image charmap emoticons spellchecker print textcolor preview anchor searchreplace visualblocks code fullscreen insertdatetime media table  paste " ], statusbar: false, menubar: false, resize: false, toolbar1: "undo redo | bold italic strikethrough | link unlink | forecolor backcolor | code fullscreen "});</script>
	<script>
	function showhide() {
    var x = document.getElementById("post");
    var y = document.getElementById("header");
    var z = document.getElementById("message");
    if (x.style.display === "block") {
        x.style.display = "none";
        x.style.height = "1px";
        y.style.height = "100px";
        z.style.height = "1px";
    } else {
        x.style.display = "block";
        y.style.height = "200px";
        z.style.height = "4em";
    }
} 
	</script>
</head>
<body>

<header id="header"><h1><a href="http://snm.engl.iastate.edu/313/gsauer/08-php/microblog/"><img src="logo.jpg" width="48" height="36" alt="Logo "></a>313 Microblog</h1>



<form id="post" method="post" action="add.php" style="margin: -0.75em 0 0 0; padding: 0 1em; height: 0;">
	<textarea id="message" name="message" style="width:75%;height:6em;"></textarea>
	<input type="submit" value="Post as '<?php echo $login ?>'">
</form>

</header>
<div>
<?php

// Set variables.
	
	$servername = "localhost";
	$username = "313";
	$password = "webdes";
	$dbname = "313_micro";
	
	// Create database connection.
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check database connection. Give error, if broken.
	
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
	// Send SQL request for all info from the table main, sorted in descending order by id.
	
	$sql = "SELECT main.id, main.message, main.userid, main.firstposted, user.fname, user.pic, user.lname FROM main INNER JOIN user ON main.userid = user.id ORDER BY `id` DESC;";
	$result = $conn->query($sql);
	
	// Show results from each row.
	
	if ($result->num_rows > 0) {
	
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	$dt = new DateTime($row["firstposted"]);
	        echo "<p class=\"post\"><strong>";
				if(strlen($row["pic"])>1) {
	        		echo "<img src=".$row["pic"]." class=\"picture\"> ";
	        	}
	        if(strlen($row["fname"])>1)
	        	{
	        	echo $row["fname"]." ".$row["lname"];}
	        	else
	        	{echo $row["id"];}
	        echo ": </strong>".$row["message"];
	        echo "</p>\r\r<p class=\"replyline\">(".$dt->format('d M Y').") ";
	        if($logincookie == $row["userid"]) {
	        	echo "(<a href=edit.php?id=".$row["id"].">edit</a>)";
	        	}
			echo " (<a href=\"reply.php?replytopost=".$row["id"]."&replytoreply=0&replylevel=1\">reply</a>)";
	        echo "</p>\r\r";

	$sql2 = "SELECT reply.id, reply.message, reply.replytopost, reply.replytoreply, reply.replylevel, user.fname, user.pic, user.lname FROM `reply` INNER JOIN user ON reply.user = user.id WHERE `replytopost` = ".$row["id"]." ORDER BY reply.replytopost, reply.replytoreply;"; 

	$result2 = $conn->query($sql2);

	if ($result2->num_rows > 0) {
	
	    // output data of each row
	    while($row = $result2->fetch_assoc()) {
	        echo "<p class=\"post\" style=\"margin-left: ".(4*$row["replylevel"])."em;\"><strong>";
				if(strlen($row["pic"])>1) {
	        		echo "<img src=".$row["pic"]." class=\"picture\"> ";
	        	}
	        if(strlen($row["fname"])>1)
	        	{
	        	echo $row["fname"]." ".$row["lname"];}
	        	else
	        	{echo $row["id"];}
	        echo ": </strong>".$row["message"];
			echo "</p>\r\r<p class=\"replyline\">(<a href=\"reply.php?replytopost=".$row["replytopost"]."&replytoreply=".$row["replytoreply"]."&replylevel=".($row["replylevel"]+1)."\">reply</a>)";
	        echo "</p>\r\r";

	}
	}
	}

	// Show error if nothing found.

	} else {
	    echo "<p>No results found.</p>";
	}
	
	// Close database connection.
	
	$conn->close();
	
?>

</div>

<footer><p><a href="profileview.php">Profile</a> | Copyright &copy; 2019 by Geoffrey Sauer. All rights reserved. | <a href="logout.php">Log Out</a> | <a href="search.html">Search</a></p></footer>

</body>
</html>