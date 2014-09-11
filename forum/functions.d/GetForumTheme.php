<?php
	function GetForumTheme() {
	$con=mysqli_connect(DBHOST,DBUSER,DBPASS,DB);
	$query= "SELECT * FROM themes WHERE active=1";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
	$CSS_LINK = $row['css_link'];
	echo '<link rel="stylesheet" type="text/css" media="all" href="'.BASE_URL.'wow/static/Themes/'.$CSS_LINK.'/local-common/css/common-game-site.css" />';
	echo '<link rel="stylesheet" type="text/css" media="all" href="'.BASE_URL.'wow/static/Themes/'.$CSS_LINK.'/css/wow.css" />';
	echo '<link rel="stylesheet" type="text/css" media="all" href="'.BASE_URL.'wow/static/Themes/'.$CSS_LINK.'/css/lightbox.css" />';
	echo '<link rel="stylesheet" type="text/css" media="all" href="'.BASE_URL.'wow/static/Themes/'.$CSS_LINK.'/cms-overlay/css/build/cms.min.css" />';
	echo '<link rel="stylesheet" type="text/css" media="all" href="'.BASE_URL.'wow/static/Themes/'.$CSS_LINK.'/css/forums/forums-index.css" />';
	echo '<link rel="stylesheet" type="text/css" media="all" href="'.BASE_URL.'wow/static/Themes/'.$CSS_LINK.'/css/forums/view-forum.css" />';
	echo '<link rel="stylesheet" type="text/css" media="all" href="'.BASE_URL.'wow/static/Themes/'.$CSS_LINK.'/css/forums/view-topic.css" />';
	echo '<link rel="stylesheet" type="text/css" media="all" href="'.BASE_URL.'wow/static/Themes/'.$CSS_LINK.'/css/forums/blizz-tracker.css" />';

}
}