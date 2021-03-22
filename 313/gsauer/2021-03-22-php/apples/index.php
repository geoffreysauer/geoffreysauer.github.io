<!DOCTYPE html>
<html>
<head>
	<title>Apples</title>
	<link href="styles.css" rel="stylesheet" type="text/css">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
	<style>
		body { background-color: beige; }
		img { vertical-align: middle; width: 240px; height: auto; }
		p { vertical-align: middle; clear: both; margin: 0 0 12px 0; background-color: white; font-family: "Trebuchet MS", Trebuchet, serif; font-size: 36pt; }
	</style>
</head>
<body>

<header><h1>Apples:</h1></header>
<div>
<?php

// Set variables.
	
	$servername = "localhost";
	$username = "engl313";
	$password = "webdes";
	$dbname = "engl313apples";
	
	// Create database connection.
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check database connection. Give error, if broken.
	
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
	// Send SQL request for all info from the table main, sorted in descending order by id.
	
	$sql = "SELECT name, img, descrip FROM main ORDER BY name DESC;";
	$result = $conn->query($sql);
	
	// Show results from each row.
	
	if ($result->num_rows > 0) {
	    echo "<div>";
	
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo "<p><img src=images/".$row["img"]."> ";
	        echo $row["name"]."<br>".$row["descrip"];
	        echo "</p>\r";
	    }
	    echo "</div>";
	
	// Show error if nothing found.
	
	} else {
	    echo "No results found.";
	}
	
	// Close database connection.
	
	$conn->close();
	
?>

</div>
</body>
</html>