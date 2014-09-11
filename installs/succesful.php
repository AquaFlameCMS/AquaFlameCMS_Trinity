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
	
	@$sql = file_get_contents('../sql/AquaFlameCMS SQL v8.1.sql');
	if (!$sql){
		exit ('Oops, something went wrong, cannot open the SQL file!');
	}

	mysqli_multi_query($mysqli,$sql);



	$con=mysqli_connect($serveraddress,$serveruser,$serverpass,$server_adb);

	// Check connection
	if (mysqli_connect_errno($con))
	  {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	  }
	?>
	Website DB Succesful!<br/><br/>
	
	Attempting to import SQL files...
	<br/><br/>
	<?php
	$mysqli = new mysqli($serveraddress,$serveruser,$serverpass,$server_adb);

	if (mysqli_connect_error()) {
		exit('Connect Error (' . mysqli_connect_errno() . ') '
				. mysqli_connect_error());
	}
	
	@$sql = file_get_contents('../sql/auth_apply/25.03.2014_shop_credits.sql');
	if (!$sql){
		exit ('Oops, something went wrong, cannot open the SQL file!');
	}

	mysqli_multi_query($mysqli,$sql);
	$mysqli->close();
	?>
	Auth DB Succesful!<br/><br/>

<?php 
if(isset($_POST['Submit'])) 
{
    if($_POST['usernames'] == '' or $_POST['nameweb'] == '' or $_POST['email'] == '' or $_POST['password'] == '' or $_POST['expansion'] == '') 
    {
        echo 'Por favor llene todos los campos.';
    }
    else
    {
        $sql = 'SELECT * FROM usuarios';
        $rec = mysql_query($sql);
        $verificar_usuario = 0;
 
        while($result = mysql_fetch_object($rec))
        {
            if($result->usuario == $_POST['usernames'])
            {
                $verificar_usuario = 1;
            }
        }
  
        if($verificar_usuario == 0)
        {
            if($_POST['password'] == $_POST['expansion'])
            {
                $expansion	= $_POST['expansion'];
                $usuario	= $_POST['usernames'];
                $nameweb	= $_POST['nameweb'];
                $email		= $_POST['email'];
                $password	= $_POST['password'];
				$ip 		= getenv("REMOTE_ADDR");
				mysql_query("SET NAMES 'utf8'");
				$AUTH = "auth";
                $sql						= "INSERT INTO ".$AUTH.".`account` (username,sha_pass_hash,email,last_ip,expansion) VALUES (UPPER('" . $usuario . "'), '".sha1($password)."', '" . $email . "','" . $ip . "','" . $expansion . "'";
                $alter_pem_auto_increment	= "ALTER TABLE ".$AUTH.".`rbac_account_permissions` CHANGE `accountId` `accountId` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Account id'";
                $register_logon				= "INSERT INTO ".$AUTH.".`rbac_account_permissions` (permissionId) VALUES ('196')";
                $alter_pem_auto_increment	= "ALTER TABLE ".$AUTH.".`rbac_account_permissions` CHANGE `accountId` `accountId` INT(10) UNSIGNED NOT NULL COMMENT 'Account id'";
                $account_access				= "INSERT INTO ".$AUTH.".`account_access`(`id`,`gmlevel`,`RealmID`) VALUES ( '1','3','-1')";
				mysql_query($sql,$alter_pem_auto_increment,$register_logon,$alter_pem_auto_increment,$account_access);
  
                echo 'Usted se ha registrado correctamente.';
            }
            else
            {
                echo 'Las claves no son iguales, intente nuevamente.';
            }
        }
        else
        {
            echo 'Este usuario ya ha sido registrado anteriormente.';
        }
    }
}
?>
	Please delete the install folder to start using AquaFlameCMS!<br>
	<h1>We recommend you rename the directory "admin" and edit the name in the configuration file.</h1>
	
	<p class="footer">&copy; <?php echo date('Y')?> Created by <a href="<?php echo $linkAuthor ?>"><?php echo $author ?></a></p>
	<div>
	</div>
</body>
</html>
