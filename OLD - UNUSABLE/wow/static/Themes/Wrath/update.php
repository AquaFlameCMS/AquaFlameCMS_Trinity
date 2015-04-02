<?php

	/* Checks for updates using a remote CSV file
	 * The CSV must be like this
	 * versionnumber,versiondescription,type,downloadlink
	 * For the type, critical is 1 none critical is 0
	 * http://www.fusionstrike.com
	 */

	$version = "1"; //Version of the script, to check against CSV
	$critical = FALSE; //Set Critical Variable to False
	$update = FALSE; //Set None Critical to Fasle too


	$url = "http://logon.doxramos.org/version.csv"; //Link to your external CSV to check against
$fp = @fopen ($url, 'r') or print ('UPDATE SERVER OFFLINE'); //If the server is unreachable
	$read = fgetcsv ($fp); //PHP fgetcsv
	fclose ($fp); // Closes the connection
if ($read[0] > $version && $read[2] == "1") { $critical = TRUE; } // If its 1, set ciritcal to true
	if ($read[0] > $version) { $update = TRUE; } // Anything other than 1 set update to true
	if ($critical) {
		print '<font color="red">There is a critical update available!</font><br/>You can get it at <a href="'.$read[3].'">'.$read[3].'</a> (Version: '.$read[1].') <br/><br/>';
	}else if ($update){
		print '<font color="green">There is a none critical update available!</font><br/>You can get it at <a href="'.$read[3].'">'.$read[3].'</a> (Version: '.$read[1].') <br/><br/>';
	}
  
?>
