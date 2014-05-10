<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="css/FlameCMS.css">
	<meta charset="utf-8">
	<title>Dashboard - <?php echo $title ?></title>
</head>
<body>
	<div id="container">
	<img src="images/64x264.png"></img><h1></h1>
	
	<div id="body">
	<p>Trying to connect to database...</p>
	<?php
	// Create connection
	define('__ROOT__', dirname(dirname(__FILE__))); 
	require_once(__ROOT__.'/configs.php'); 
	
	$con=mysqli_connect($serveraddress,$serveruser,$serverpass,$server_db);

	// Check connection
	if (mysqli_connect_errno($con))
	  {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	  }
	?>
	Succesful!<br/><br/>
	
	Attempting to import SQL files...
	<br/><br/>
	<?php
	$mysqli = new mysqli($serveraddress,$serveruser,$serverpass,$server_db);

	if (mysqli_connect_error()) {
		exit('Connect Error (' . mysqli_connect_errno() . ') '
				. mysqli_connect_error());
	}
	
	@$sql = file_get_contents('../sql/AquaFlameCMS SQL v8 BETA.sql');
	if (!$sql){
		exit ('Oops, something went wrong, cannot open the SQL file!');
	}

	mysqli_multi_query($mysqli,$sql);
	$mysqli->close();
	?>
	Succesful!<br/><br/>

	Please delete the install folder to start using AquaFlameCMS!
	
	<p class="footer">Created by <a href="<?php echo $linkAuthor ?>"><?php echo $author ?></a></p>
	<div>
	</div>
</body>
</html>
