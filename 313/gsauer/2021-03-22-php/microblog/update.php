<?php
$servername = "localhost";
$username = "313";
$password = "webdes";
$dbname = "313_micro";
$id = $_POST['id'];
$user = $_POST['user'];
$pass = $_POST['pass'];

$sql="SELECT * FROM user WHERE (main.message LIKE '".$searchphrase."')";


$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ugly, simple post.

$message = $_POST['message'];

// More sophisticated, safer post.

// $message = mysql_real_escape_string($_POST['message']);

$sql = "UPDATE main SET message='".$message."' WHERE id=".$id.";";
$result = $conn->query($sql);

$conn->close();

header( "Location: http://snm.engl.iastate.edu/313/gsauer/08-php/microblog/" );

?>