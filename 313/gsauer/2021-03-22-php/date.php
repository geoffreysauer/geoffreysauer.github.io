<!DOCTYPE html>
<html>
<head>
</head>
<body>

<p>Today's date in Ames, Iowa is:

<?php date_default_timezone_set('America/Chicago'); echo date("l, F jS, Y"); ?>
. The time is:

<?php date_default_timezone_set('America/Chicago'); echo date("H:i:s"); ?>
.</p>

</body>
</html>