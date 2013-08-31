<?php
if(!isset($_SESSION)) session_start();

# Languages ############

if(isset($_GET['Local'])) $lang = $_GET['Local'];
else if(isset($_SESSION['Local'])) $lang = $_SESSION['Local'];
if(empty($lang)) $lang = 'en-us';


$language = $lang;
$langs = Array("en-us" => null, "ro-ro" => null, "en-gb" => null, "it-it" => null, "de-de" => null, "es-es" => null, "bu-bg" => null , "es-mx" => null, "gr-gr" => null, "ru-ru" => null, "zh-cn" => null, "zh-tw" => null, "fr-fr" => null);
if(array_key_exists($lang,$langs))require_once("lang/".$lang.".php");
else require_once("/lang/en-us.php");
$_SESSION['Local'] = $language;
######################


# Mysql ################

$serveraddress = "127.0.0.1";
$serveruser = "root";
$serverpass = "password";
$serverport	= "3306";

$server_db = "website";
$server_adb = "trinity_auth";

$server_cdb = "trinity_chars";
$server_wdb = "sky_world";

######################


# Extra ################

$website['realm'] = "Set Realmlist Your_Realmlist";
$name_realm1['realm'] = "Realm_Name";
$mysql_cod = 'cp1251';

# Comunity Links ############

$comun_link['Facebook'] = "http://www.facebook.com/";          // Your address of Facebook community link
$comun_link['Twitter'] = "http://twitter.com//";               // Your address of Twitter community link
$comun_link['Youtube'] = "http://www.youtube.com/";            // Your address of Youtube community link
$comun_link['Reddit'] = "http://www.reddit.com/"; 			   // Your address of Reddit community link

# Important #############

$website['title'] = "AquaFlameCMS 1.0";
$website['slogan'] = "AquaFlameCMS 1.0, the best of the best!";
$website['address'] = "http://localhost";
$website['root'] = "/AquaFlameCMS_Trinity/";

######################

$maintenance = false; //Change true(maintenance mode)/false(normal mode) to disable/enable website
if($maintenance == true){
  if($bucle_mant == 0 ){                        
    header('Location: maintenance.php');
  }
}else{

############

$teamsLimit = 50;				// Number of team to display on each page

$connection_setup = mysql_connect($serveraddress . ':' . $serverport,$serveruser,$serverpass)or die(mysql_error());
mysql_select_db($server_db,$connection_setup)or die(mysql_error());

if(isset($_SESSION['username'])){
	$username = mysql_real_escape_string($_SESSION['username']);
	$account_information = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.account WHERE username = '".$username."'"));
	$account_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_db.users WHERE id = '".$account_information['id']."'"));
	mysql_select_db($server_db,$connection_setup)or die(mysql_error());
}
###########
}
?>