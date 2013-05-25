<?php
$detail = $_POST['post'];
$xstoken = $_POST['xstoken'];
$arr = array ('detail'=>$detail,'xstoken'=>$xstoken);
echo json_encode($arr);
header("Content-type: text/plain");
?>