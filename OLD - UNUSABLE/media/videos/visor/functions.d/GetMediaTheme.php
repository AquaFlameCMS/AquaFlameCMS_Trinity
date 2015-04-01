<?php
	function GetMediaTheme() {
	$con=mysqli_connect(DBHOST,DBUSER,DBPASS,DB);
	$query= "SELECT * FROM themes WHERE active=1";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
	$CSS_LINK = $row['css_link'];
	echo '<link rel="stylesheet" href="../../../wow/static/Themes/'.$CSS_LINK.'/local-common/css/common.css?v15" />';
	echo '<link rel="stylesheet" href="../../../wow/static/Themes/'.$CSS_LINK.'/css/wow.css?v3" />';
	echo '<link rel="stylesheet" href="../../../wow/static/Themes/'.$CSS_LINK.'/css/lightbox.css?v7" />';
	echo '<link rel="stylesheet" href="../../../wow/static/Themes/'.$CSS_LINK.'/local-common/css/cms/blog.css?v15" />';
	echo '<link rel="stylesheet" href="../../../wow/static/Themes/'.$CSS_LINK.'/local-common/css/cms/comments.css?v15" />';
	echo '<link rel="stylesheet" href="../../../wow/static/Themes/'.$CSS_LINK.'/css/cms.css?v3" />';
	echo '<link rel="stylesheet" href="../../../wow/static/Themes/'.$CSS_LINK.'/css/media/media.css" />';
}
}
