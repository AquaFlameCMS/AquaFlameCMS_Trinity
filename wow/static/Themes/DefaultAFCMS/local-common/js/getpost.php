<?php

include("../configs.php");
$getpost = mysql_query("SELECT * FROM forum_replies WHERE id = '".$_GET['p']."'");
$post = mysql_fetch_assoc($getpost);
$getuser = mysql_query("SELECT * FROM $server_adb.account WHERE id = '".$post['author']."'");
$user = mysql_fetch_assoc($getuser); 
$arr = array ('name'=>strtolower($user['username']),'detail'=>$post['content']);
echo json_encode($arr);
header("Content-type: text/plain");
?>