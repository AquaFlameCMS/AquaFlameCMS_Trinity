<?php
/**
 * Copyright (C) 2014 AquaflameCMS <http://aquaflame.org/>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 **/

ob_start();  
if(file_exists("install"))
{
	header("Location: install");
	die();
}
include("include/pre-header.php");
if (!isset($_SESSION))
    session_start();

/*
|--------------------------------------------------------------------------
| Default Locale Languages 
|--------------------------------------------------------------------------
| Default Locale Web
|
*/
if (isset($_GET['Local']))
    $lang = $_GET['Local'];
else if (isset($_SESSION['Local']))
    $lang = $_SESSION['Local'];
if (empty($lang))
    $lang = 'en-us';

$language = $lang;
$langs    = Array(
    "en-us" => null,
    "ro-ro" => null,
    "en-gb" => null,
    "it-it" => null,
    "de-de" => null,
    "es-es" => null,
    "bu-bg" => null,
    "es-mx" => null,
    "gr-gr" => null,
    "ru-ru" => null,
    "zh-cn" => null,
    "zh-tw" => null,
    "fr-fr" => null
);

if (array_key_exists($lang, $langs))
    require_once("lang/" . $lang . ".php");
else
    require_once("/lang/en-us.php");
$_SESSION['Local'] = $language;

/*
|--------------------------------------------------------------------------
| MySQL Configuration.
|--------------------------------------------------------------------------
| Connect to MySQL Host
| For example:
| 	$serveraddress = "MySQL Host Address"; 
|	$serveruser    = "User";
| 	$serverpass    = "Password";
| 	$serverport	   = "Port";
*/
$serveraddress = "127.0.0.1";
$serveruser    = "root";
$serverpass    = "password";
$serverport    = "3306";
@define('DBHOST', '127.0.0.1');
@define('DBUSER', 'root');
@define('DBPASS', 'password');
@define('DB', 'website');

/*
|--------------------------------------------------------------------------
| Connect to Database Configuration.
|--------------------------------------------------------------------------
| auth database configuration.
| World database configuration.
| Characters database configuration.
| Web Site database configuration.
| @access public
|
*/
$server_adb = "auth";
$server_wdb = "world";
$server_cdb = "chars";
$server_db  = "website";

/*
|--------------------------------------------------------------------------
| Expansion for Default
|--------------------------------------------------------------------------
|
| Your Expansion for Default "Register"
| 0 - Classic, 1 - Burning Crusade, 2 - Wrath, 3 - Cataclysm
|
*/
$expansion_wow = "3";

/*
|--------------------------------------------------------------------------
| Donation Store Beta
|--------------------------------------------------------------------------
|
| Enable Donation Store Beta
| For Example
| Change true(Donation Store mode)/false(off mode) to disable/enable Donation Store
|        true or false
|
|*/
$donation_shop  = true;
$code = "f7c3bc1d808e04732adf679965ccc34ca7ae3441";

/*
|--------------------------------------------------------------------------
| Paygol SMS Donation
|--------------------------------------------------------------------------
| Paygol service id 
| For Example 
| $service_id = "99694";
| Paygol service name
| For Example $service_name = "AquaflameCMS"
| Paygol service currency
| For Example $service_currency	= "USD"
|*/
$service_id			= "12345";
$service_name		= "AquaflameCMS";
$service_currency	= "USD";

/*
|--------------------------------------------------------------------------
| Realmlist & Realm Name
|--------------------------------------------------------------------------
|
*/
$website['realm']     = "Set Realmlist Your_Realmlist";
$name_realm1['realm'] = "Realm_Name";
$mysql_cod            = 'cp1251';

/*
|--------------------------------------------------------------------------
| Community Links
|--------------------------------------------------------------------------
|
| Community Links. Leave it blank if you don't use any.
| Your address of community link
|
*/
$comun_link['Facebook'] = "http://www.facebook.com/";
$comun_link['Twitter']  = "http://twitter.com/";
$comun_link['Youtube']  = "http://www.youtube.com/";
$comun_link['Reddit']   = "http://www.reddit.com/";

/*
|--------------------------------------------------------------------------
| Server name & Information
|--------------------------------------------------------------------------
|
| Your Server Name Title.
| For example: "AquaFlameCMS 1.0"
|
| Server & Website Description
| For example: "AquaFlameCMS 1.0 the best of the best server private!"
|
| Your keywords
| Type your keywords for the web
| For example: "AquaFlameCMS 1.0 , The Best CMS, Private Server, World Of WarCraft, WoW"
|
| Address
| URL to your Server. Typically this will be your base URL,
| WITH a trailing slash: http://localhost/
| If this is not set then CMS will guess the protocol, domain and
| path to your installation.
|
| Root Directory
| Without slash at the end of path. If your site is in root directory, leave this empty.
| For example: site is available at http://example.org/AquaFlameCMS_Trinity/
| That means that you should set this variable as '/AquaFlameCMS_Trinity/'.
*/
$website['title']       = "AquaFlameCMS 1.0";
$website['description'] = "AquaFlameCMS 1.0 the best of the best!";
$website['keywords']    = "AquaFlameCMS 1.0, The Best CMS";
$website['address']     = "http://localhost/";
$website['root']        = "/AquaFlameCMS_Trinity/";
$website['admin:path']	= "admin/"

/*
|--------------------------------------------------------------------------
| Pre Page
|--------------------------------------------------------------------------
|
| Enable PrePage
| For Example
| Change true(prepage mode)/false(normal mode) to disable/enable pre page
|        true or false
|*/

$pre = false;
if ($pre == true) {
    if (!isset($_COOKIE['prepage'])) {
        $pre_cookie = 'viewed';
        setcookie("prepage", $pre_cookie, time() + 3600 * 60 * 24);
        
        header('Location: ' . $website['address'] . '' . $website['root'] . 'pre.php');
    }
}

/*
|--------------------------------------------------------------------------
| Maintenance Page
|--------------------------------------------------------------------------
|
| Disable site? on maintenance page
| For Example
| Change true(maintenance mode)/false(normal mode) to disable/enable website
|        true or false
|
*/
$maintenance = false;
    
/*
|--------------------------------------------------------------------------
| No edit
|--------------------------------------------------------------------------
| From now on, we recommend not to change the code to maintain default operation script.
| All changes must be made on data found above.
|
*/

if ($maintenance == true) {
    if (!isset($bucle_mant)) {
        header('Location: '.$website['address'].''.$website['root'].'maintenance.php');
    }
} else {
    $teamsLimit = 50; // Number of team to display on each page
    
    $connection_setup = mysql_connect($serveraddress . ':' . $serverport, $serveruser, $serverpass) or die(mysql_error());
    mysql_select_db($server_db, $connection_setup) or die(mysql_error());
    
    if (isset($_SESSION['username'])) {
        $username            = mysql_real_escape_string($_SESSION['username']);
        $account_information = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.account WHERE username = '" . $username . "'"));
        $account_extra       = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_db.users WHERE id = '" . $account_information['id'] . "'"));
        mysql_select_db($server_db, $connection_setup) or die(mysql_error());
    }
}

/* End of file configs.php */

