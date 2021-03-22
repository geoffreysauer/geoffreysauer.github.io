<html>
<head>
<title>Geoff's First Sample: Search for '<?php echo $_POST['hash']; ?>'</title>
<link href="sample/styles.css" rel="stylesheet" type="text/css">
</head>
<body>

<header><h1>Geoff's First Sample: Hash for '<?php echo $_POST['hash']; ?>'</h1></header>

<form method="post" action="hash.php">
Hash This String:<br>
<input type="text" name="hash" size="40">
<br><input type="submit" value="Hash It!"></form></div>


<?php

$hashed=hash("md5",$_POST['hash']);

if ($_POST['hash'] > '') {
	echo "<p>".$hashed."</p>";
};

?>

</div>

<footer><p>Copyright &copy; 2019 by Geoffrey Sauer. All rights reserved.</p></footer>

</body>
</html>