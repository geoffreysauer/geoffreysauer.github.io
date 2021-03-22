<html>
<head>
<title>Question Answered</title>
<style>
	body { background-color: <?php echo $_POST['favcolor']; ?>; }
</style>
</head>
<body>

<header><span class="links"></span><h3>Question Asked</h3></header>

<div class="main">


So. Your favorite color is

<?php echo $_POST['favcolor']; ?>.


</div>

<footer><p></p></footer>

</body>
</html>