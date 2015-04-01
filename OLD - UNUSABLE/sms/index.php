<?php 
/**
 * AquaFlameCMS SMS DONATION
 * FIXED BY OneLuiz
 */
include("../configs.php");
// check that the request comes from PayGol server
if(!in_array($_SERVER['REMOTE_ADDR'],
   array('109.70.3.48', '109.70.3.146', '109.70.3.58'))) {
   header("HTTP/1.0 403 Forbidden");
   die("Error: Unknown IP");
}

// You Should Write here your MySQL Server information ! 
$dbhost = $serveraddress; //Host adress
$dbuser = $serveruser; //Username
$dbpass = $serverpass; //Password
$dbname = $server_adb; // the name of realmd database
$connection = mysql_connect($dbhost, $dbuser, $dbpass) or die ("Can't connect with $dbhost");
mysql_select_db($dbname, $connection);

//Get parameters from PayGol
$message_id		= $_GET[message_id];
$shortcode		= $_GET[shortcode];
$keyword		= $_GET[keyword];
$message		= $_GET[message];
$sender			= $_GET[sender];
$operator		= $_GET[operator];
$country		= $_GET[country];
$price			= $_GET[price];
$currency		= $_GET[currency];
$custom			= $_GET[custom];//character or username of the payer
$points     	= $_GET[points];//points to be inserted in DB

//Select user account
$username = $custom;
$select_username = mysql_query("SELECT id FROM account WHERE username='$username';");
$fetch_info = mysql_fetch_array($select_username);
$sUsername = $fetch_info["id"];

$query = "UPDATE account SET credits=credits+$points WHERE id='$sUsername'";
mysql_query($query); 

?>