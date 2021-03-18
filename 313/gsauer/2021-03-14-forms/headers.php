<html>
<head>
<style>
 	body { font-family: 'Georgia', serif; 
 	background-color: <?php echo $_POST['color']; ?>;
 	}
</style>
</head>
<body>

<h2>Browser HTTP Headers</h2>

<p><?php

// $headers =  getallheaders();
// foreach($headers as $key=>$val){
//  echo '<strong>' . $key . '</strong>: ' . $val . '<br>';
//  }
  echo '<strong>Name</strong>: ' . $_POST['name'] . '<br>';
  echo '<strong>Email</strong>: ' . $_POST['email'] . '<br>';
  echo '<strong>Year1</strong>: ' . $_POST['year1'] . '<br>';
  echo '<strong>Year2</strong>: ' . $_POST['year2'] . '<br>';
  echo '<strong>Year3</strong>: ' . $_POST['year3'] . '<br>';
  echo '<strong>Year4</strong>: ' . $_POST['year4'] . '<br>';
  echo '<strong>Favorite Color</strong>: ' . $_POST['color'] . '<br>';
  echo '<strong>Date</strong>: ' . $_POST['date'] . '<br>';
  echo '<strong>Love</strong>: ' . $_POST['love'] . '<br>';
  echo '<strong>Essay</strong>: ' . $_POST['essay'] . '<br>';
  

?></p>
</body>
</html>