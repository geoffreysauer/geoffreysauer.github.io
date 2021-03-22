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
	
	$sql = "SELECT name, img, descrip FROM main ORDER BY name ASC;";
	$result = $conn->query($sql);
	
	// Show results from each row.
	
	if ($result->num_rows > 0) {

	    // output data of each row
		$i=1;
	    while($row = $result->fetch_assoc()) {
	        echo "\t\t\t\t<div class=\"slide\">\r";
	        echo "\t\t\t\t\t<div class=\"slide__img-wrap\">\r";
	        echo "\t\t\t\t\t\t<div class=\"slide__img\" style=\"background-image: url(img/".$row["img"].");\"></div>\r";
	        echo "\t\t\t\t\t</div>\r";
	        echo "\t\t\t\t\t<div class=\"slide__side\">".$row["name"]."</div>\r";
	        echo "\t\t\t\t\t<div class=\"slide__title-wrap\">\r";
	        echo "\t\t\t\t\t\t<span class=\"slide__number\">".$i."</span>\r";
	        echo "<h3 class=\"slide__title\">".$row["name"]."</h3>\r";
	        echo "<h4 class=\"slide__subtitle\">".$row["descrip"]."</h4>\r";
	        echo "</div>\r";
	        echo "</div>\r";
	        $i++;
	    }
	
	// Show error if nothing found.
	
	} else {
	    echo "";
	}
	
	// Close database connection.
	
	$conn->close();
	
?>

				<button class="nav nav--prev">
					<svg class="icon icon--navarrow-prev">
						<use xlink:href="#icon-navarrow"></use>
					</svg>
				</button>
				<button class="nav nav--next">
					<svg class="icon icon--navarrow-next">
						<use xlink:href="#icon-navarrow"></use>
					</svg>
				</button>
			</div>
			<div class="content">


<?php

// Set variables.
	
	$servername = "localhost";
	$username = "engl477";
	$password = "webdev";
	$dbname = "engl477_apples";
	
	// Create database connection.
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	// Check database connection. Give error, if broken.
	
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
	// Send SQL request for all info from the table main, sorted in descending order by id.
	
	$sql = "SELECT name, img, descrip, longdesc FROM main ORDER BY name ASC;";
	$result = $conn->query($sql);
	
	// Show results from each row.
	
	if ($result->num_rows > 0) {
	$i=1;
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo "\t\t\t\t<div class=\"content__item\">\r";
	        echo "\t\t\t\t\t<span class=\"content__number\">".$i."</span>\r";
	        echo "\t\t\t\t\t\t<h3 class=\"content__title\">".$row["name"]."</h3>\r";
	        echo "\t\t\t\t\t<h4 class=\"content__subtitle\">".$row["descrip"]."</h4>\r";
	        echo "\t\t\t\t\t<div class=\"content__text\">".$row["longdesc"]."</div>\r";
	        echo "\t\t\t\t\t</div>\r";
	    	$i++;
		}
	
	// Show error if nothing found.
	
	} else {
	    echo "";
	}
	// Close database connection.
	$conn->close();
?>