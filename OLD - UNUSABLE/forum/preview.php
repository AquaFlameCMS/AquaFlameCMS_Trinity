<?php
$reply = $_GET['text'];
$reply = stripslashes($reply);
$reply = strip_tags($reply);
$reply = addslashes($reply);
$reply=str_replace("[quote]", "<blockquote class=\"quote-public\">",$reply);
$reply=str_replace("[/quote]", "</blockquote>",$reply);
$reply=str_replace("[b]", "<b>",$reply);
$reply=str_replace("[/b]", "</b>",$reply);
$reply=str_replace("[i]", "<i>",$reply);
$reply=str_replace("[/i]", "</i>",$reply);
$reply=str_replace("[u]", "<u>",$reply);
$reply=str_replace("[/u]", "</u>",$reply);
$reply=str_replace("[ul]", "<ul>",$reply);
$reply=str_replace("[/ul]", "</ul>",$reply);
$reply=str_replace("[li]", "<li>",$reply);
$reply=str_replace("[/li]", "</li>",$reply);
$reply=str_replace("[code]", "<code>",$reply);
$reply=str_replace("[/code]", "</code>",$reply);
$reply=str_replace("[img]", "<img src=\"",$reply);
$reply=str_replace("[/img]", "\"/>",$reply);
$reply=str_replace("[IMG]", "<img src=\"",$reply);
$reply=str_replace("[/IMG]", "\"/>",$reply);
$reply = nl2br($reply);
$arr = array ('detail'=>$reply);
echo json_encode($arr);
header("Content-type: text/plain");
?>