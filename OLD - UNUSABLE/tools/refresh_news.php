<?php
require_once("../configs.php");
?>
<html">
<head>
<title><?php echo $website['title']; ?></title>
<link rel="stylesheet" type="text/css" href="../wow/static/local-common/css/common.css?v15"/>
<link rel="stylesheet" type="text/css" href="../wow/static/_themes/bam/css/master.css?v1"/>
<script type="text/javascript" src="../wow/static/local-common/js/third-party/jquery-1.4.2.min.js?v15"></script>
<script type="text/javascript" src="../wow/static/local-common/js/core.js?v15"></script>
<style type="text/css">
.loader {
	width:24px;
	height:24px;
	background: url("../wow/static/images/loaders/canvas-loader.gif") no-repeat;
}
</style>
</head>
<body>
<div id="embedded-login">
	<h2><?php echo $website['title']; ?> - Refresh Comments Count</h2>
	<br />
	<center>
		<?php
		$getting_news = mysql_query("SELECT * FROM news ORDER BY id ASC");
		while($news=mysql_fetch_array($getting_news)){
			$comments = mysql_query("SELECT * FROM comments WHERE newsid = '".$news['id']."'");
			$c=0;
			while($comment = mysql_fetch_array($comments)){
				$c++;
			}
			$update = mysql_query("UPDATE news SET comments = '".$c."' WHERE id ='".$news['id']."'");
		}
		?>
		<h3>Refreshing...</h3><br />
		<div class="loader"></div>
		<h3>It should be done by now. Let's get outa here!...</h3><br />
		<meta http-equiv="refresh" content="2;url=../index.php"/>
	</center>
</div>
</body>
</html>