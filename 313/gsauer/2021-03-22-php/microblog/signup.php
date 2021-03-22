<?php
$servername = "localhost";
$username = "313";
$password = "webdes";
$dbname = "313_micro";
$login = $_POST['username'];
// $pass = $_POST['pass'];
$pass = hash("md5",$_POST['pass']);
$photo = $_POST['photo'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO `user` (`id`, `username`, `pass`, `fname`, `lname`, `pic`) VALUES (NULL, '".$login."', '".$pass."', '".$fname."', '".$lname."', '".$photo."');";

$result = $conn->query($sql);

$conn->close();

$cookie_name = "login";
$cookie_value = $row["user"];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

header( "Location: http://snm.engl.iastate.edu/313/gsauer/08-php/microblog/" );

?>