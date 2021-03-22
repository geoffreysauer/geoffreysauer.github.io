<!DOCTYPE html>
<html>
<head>
	<title>313 First Example</title>
	<link href="styles.css" rel="stylesheet" type="text/css">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
	<meta http-equiv="Cache-Control" content="no-store" />
	<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
	<script type="text/javascript">tinymce.init({ selector: "textarea", theme: "modern", skin: "lightgray", plugins: [ "advlist autolink lists link image charmap emoticons spellchecker print textcolor preview anchor searchreplace visualblocks code fullscreen insertdatetime media table  paste " ], statusbar: false, menubar: false, resize: false, toolbar1: "undo redo | bold italic strikethrough | link unlink | forecolor backcolor | code fullscreen "});</script>
</head>
<body>

<header id="header"><h1>313 First Example</h1>

<form id="post" method="post" action="add.php" style="margin: -0.75em 0 0 0; padding: 0 1em; height: 0;">
	<textarea id="message" name="message" style="width:75%;height:6em;"></textarea>
	<input type="submit" value="Post">
</form>

</header>
<div>
<?php

// Set variables.
	
	$servername = "localhost";
	$username = "313";
	$password = "webdes";
	$dbname = "313_first";
	
	// Create database connection.
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check database connection. Give error, if broken.
	
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
	// Send SQL request for all info from the table main, sorted in descending order by id.
	
	$sql = "SELECT id, message, posted FROM main ORDER BY `id` DESC;";
	$result = $conn->query($sql);
	
	// Show results from each row.
	
	if ($result->num_rows > 0) {
	
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	$dt = new DateTime($row["posted"]);
	        echo "<p class=\"post\"><strong>";
	        	{echo $row["id"];}
	        echo ": </strong>".$row["message"];
	        echo " (".$dt->format('d M Y g:i:sa').")";
	        echo "</p>\r\r";
	}

	// Show error if nothing found.

	} else {
	    echo "<p>No results found.</p>";
	}
	
	// Close database connection.
	
	$conn->close();
	
?>

</div>

<footer><p>Copyright &copy; 2020 by Geoffrey Sauer. All rights reserved. | <a href="search.html">Search</a></p></footer>

</body>
</html>