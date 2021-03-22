<html>
<head>
<title>313 Microblog: Edit '<?php echo $_GET['id']; ?>'</title>
<link href="styles.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
<script type="text/javascript">tinymce.init({ selector: "textarea", theme: "modern", skin: "lightgray", plugins: [ "advlist autolink lists link image charmap emoticons spellchecker print textcolor preview anchor searchreplace visualblocks code fullscreen insertdatetime media table  paste " ], statusbar: false, menubar: false, resize: false, toolbar1: "undo redo | bold italic strikethrough | link unlink | forecolor backcolor | code fullscreen "});</script>
</head>
<body>

<header><h1><a href="http://snm.engl.iastate.edu/313/gsauer/08-php/microblog/"><img src="logo.jpg" width="48" height="36" alt="Logo "></a>313 Microblog: Edit '<?php echo $_GET['id']; ?>'</h1></header>

<?php

// set variables

$servername = "localhost";
$username = "313";
$password = "webdes";
$dbname = "313_micro";
$searchphrase=$_GET['id'];

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Send SQL request for all info from the table main

$sql="SELECT * FROM main WHERE (main.id LIKE '".$searchphrase."')";

$result = $conn->query($sql);

// Show results from each row

if ($result->num_rows == 1) {
    echo "<div>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
	echo "<form method=\"post\" action=\"update.php\"><input type=\"hidden\" name=\"id\" value=\"".$row["id"]."\"><br><textarea name=\"message\">".$row["message"]."</textarea><br><input type=\"submit\" value=\"Update\"></form>";

    }
    echo "</div>";

} else {
    echo "No results found.";
}

$conn->close();

?>

</div>

<footer><p>Copyright &copy; 2019 by Geoffrey Sauer. All rights reserved.</p></footer>

</body>
</html>