<?php
require_once("../configs.php");
$page_cat = "home";
?>
<html lang="en-gb">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<html>
<head>
	<title><?php echo TITLE ?></title>
	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
	<meta name="description" content="<?php echo DESCRIPTION ?>">
	<meta name="keywords" content="<?php echo KEYWORDS ?>">
	<link rel="shortcut icon" href="<?php echo BASE_URL ?>wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>wow/static/local-common/css/common.css?v15" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>wow/static/css/wow.css?v4" />
	<script type="text/javascript" src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL ?>wow/static/local-common/js/core.js?v15"></script>
	<script type="text/javascript" src="<?php echo BASE_URL ?>wow/static/local-common/js/tooltip.js?v15"></script>
	<script type="text/javascript" src="http://static.wowhead.com/widgets/power.js"></script>
	<!--[if IE 6]> <script type="text/javascript">
	//<![CDATA[
	try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
	//]]>
	</script>
	<![endif]-->
</head>
<body class="en-gb server-error logged-in">
<div id="wrapper">
<?php include("../header.php"); ?>
<div id="content">
<div class="content-top">
<div class="content-trail">
<ol class="ui-breadcrumb">
<li><a href="<?php echo BASE_URL ?>" rel="np" class=""><?php echo TITLE ?></a><span class="breadcrumb-arrow"></span></li>
<li class="last"><a href="shop.php" rel="np"><?php echo $Errors['404']; ?></a></li>
</ol>
</div>
<div class="content-bot">
	<div id="server-error">
		<h2 class="http">Four,<br /> oh: four.</h2>
		<h3>Page Not Found</h3>
		<p>There was<br /> a <strong>PAGE</strong><br /> here.<br />It's gone now.<br /><br /><em>(Is this what happens to pages that wander into the forest?)</em></p>
		<!-- http : 404 -->
	</div>
</div>
</div>
</div>
	<?php include("../footer.php"); ?>
</body>
</html>
