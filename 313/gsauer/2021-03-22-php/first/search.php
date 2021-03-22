<html>
<head>
<title>Geoff's First Example: Search for '<?php echo $_POST['search']; ?>'</title>
<link href="styles.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
<style>td, th { border: 1px solid #ccc; }</style>
</head>
<body>

<header><h1>Geoff's First Example: Search Results for '<?php echo $_POST['search']; ?>'</h1></header>

&nbsp; 

<?php

// set variables

$servername = "localhost";
$username = "313";
$password = "webdes";
$dbname = "313_first";
$searchphrase=$_POST['search'];

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Send SQL request for all info from the table main

$sql="SELECT * FROM main WHERE (message LIKE '%".$searchphrase."%')";

$result = $conn->query($sql);

// Show results from each row

echo "<p>&nbsp;</p><p>".($result->num_rows)." found:</p>";

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Message</th></tr>";

    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["message"]."</td></tr>";
    }
    echo "</table>";

} else {
    echo "No results found.";
}

$conn->close();

?>

</div>

<footer><p>Copyright &copy; 2020 by Geoffrey Sauer. All rights reserved.</p></footer>

</body>
</html>