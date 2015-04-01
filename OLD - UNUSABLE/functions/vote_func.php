<?php 
require ('../configs.php');

// Connection to database
$conn = mysql_connect("$serveraddress", "$serveruser", "$serverpass")or die("Couldn't connect to database"); 
mysql_select_db("$server_db",$conn); // Select database
////////////////////////////////////////////////////////////////////
///////////////////That Code is to view info from db////////////////
///////////////////////////////////////////////////////////////////
// Sql Query For Vote 1
$query1 = mysql_query("SELECT * FROM vote WHERE ID = '1'");
// Execute the query (the $get contains the result)
$get1 = mysql_fetch_array($query1); 
///////////////////////////////////////////////////////////////////
// Sql Query For Vote 2
$query2 = mysql_query("SELECT * FROM vote WHERE ID = '2'");
// Execute the query (the $get contains the result)
$get2 = mysql_fetch_array($query2); 
///////////////////////////////////////////////////////////////////
// Sql Query For Vote 3
$query3 = mysql_query("SELECT * FROM vote WHERE ID = '3'");
// Execute the query (the $get contains the result)
$get3 = mysql_fetch_array($query3); 
///////////////////////////////////////////////////////////////////
// Sql Query For Vote 4
$query4 = mysql_query("SELECT * FROM vote WHERE ID = '4'");
// Execute the query (the $get contains the result)
$get4 = mysql_fetch_array($query4); 
///////////////////////////////////////////////////////////////////
// Sql Query For Vote 5
$query5 = mysql_query("SELECT * FROM vote WHERE ID = '5'");
// Execute the query (the $get contains the result)
$get5 = mysql_fetch_array($query5); 
///////////////////////////////////////////////////////////////////

?>



