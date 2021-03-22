<html>
<head>
<title>313 Microblog: Reply to <?php if($_GET['replylevel']>1){ echo "Reply"; } else { echo "Post"; } ?> '<?php echo $_GET['replytopost'] ?>'</title>
<link href="styles.css" rel="stylesheet" type="text/css">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
<script type="text/javascript" src="tinymce/tinymce.min.js"></script>
<script type="text/javascript">tinymce.init({ selector: "textarea", theme: "modern", skin: "lightgray", plugins: [ "advlist autolink lists link image charmap emoticons spellchecker print textcolor preview anchor searchreplace visualblocks code fullscreen insertdatetime media table  paste " ], statusbar: false, menubar: false, resize: false, toolbar1: "undo redo | bold italic strikethrough | link unlink | forecolor backcolor | code fullscreen "});</script>
</head>
<body>

<header><h1><a href="http://snm.engl.iastate.edu/313/gsauer/08-php/microblog/"><img src="logo.jpg" width="48" height="36" alt="Logo "></a>313 Microblog: Reply to '<?php echo $_GET['replytopost'] ?>'	</h1></header>

<?php

// set variables

$servername = "localhost";
$username = "313";
$password = "webdes";
$dbname = "313_micro";
$replypost=$_GET['replytopost'];
$replytoreply=($_GET['replytoreply']+0.0001);
$replylevel=$_GET['replylevel'];

    echo "<div>";

	echo "<form method=\"post\" action=\"postreply.php\"><input type=\"hidden\" name=\"id\" value=\"".$replypost."\"><input type=\"hidden\" name=\"replytoreply\" value=\"".$replytoreply."\"><input type=\"hidden\" name=\"replylevel\" value=\"".$replylevel."\"><br><textarea name=\"message\"></textarea><br><input type=\"submit\" value=\"Update\"></form>";

    echo "</div>";

?>

</div>

<footer><p>Copyright &copy; 2019 by Geoffrey Sauer. All rights reserved.</p></footer>

</body>
</html>