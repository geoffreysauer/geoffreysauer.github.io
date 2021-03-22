<?php
$servername = "localhost";
$username = "313";
$password = "webdes";
$dbname = "313_micro";
$id = $_POST['id'];
$user = $_POST['username'];
$pass = $_POST['pass'];
$pic = $_POST['pic'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];

$sql="SELECT * FROM user WHERE (user.id LIKE '".$id."')";


$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ugly, simple post.

$message = $_POST['message'];

// More sophisticated, safer post.

// $message = mysql_real_escape_string($_POST['message']);

$sql = "UPDATE user SET pass='".$pass."' WHERE id=".$id.";";
$result = $conn->query($sql);

$sql = "UPDATE user SET fname='".$fname."' WHERE id=".$id.";";
$result = $conn->query($sql);

$sql = "UPDATE user SET pic='".$pic."' WHERE id=".$id.";";
$result = $conn->query($sql);

$sql = "UPDATE user SET lname='".$lname."' WHERE id=".$id.";";
$result = $conn->query($sql);

$conn->close();

header( "Location: http://snm.engl.iastate.edu/313/gsauer/08-php/microblog/" );

?>