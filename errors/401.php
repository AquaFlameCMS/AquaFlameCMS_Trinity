<?php
require_once("../configs.php");
$page_cat = "home";
?>
<head>
	<title><?php echo $website['title']; ?></title>
	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
	<meta name="description" content="<?php echo $website['description']; ?>">
	<meta name="keywords" content="<?php echo $website['keywords']; ?>">
	<link rel="shortcut icon" href="../wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" media="all" href="../wow/static/local-common/css/common.css?v15" />
	<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="../wow/static/local-common/css/common-ie.css?v15" /><![endif]-->
	<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="../wow/static/local-common/css/common-ie6.css?v15" /><![endif]-->
	<!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="../wow/static/local-common/css/common-ie7.css?v15" /><![endif]-->
	<link title="World of Warcraft - News" href="../wow/en/feed/news" type="application/atom+xml" rel="alternate"/>
	<link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/wow.css?v4" />
	<link rel="stylesheet" type="text/css" media="all" href="../wow/static/local-common/css/cms/homepage.css?v15" />
	<link rel="stylesheet" type="text/css" media="all" href="../wow/static/local-common/css/cms/blog.css?v15" />
	<link rel="stylesheet" type="text/css" media="all" href="../wow/static/local-common/css/cms/cms-common.css?v15" />
	<link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/cms.css?v4" />
  <link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/wow.css?v23" />
	<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/cms-ie6.css?v4" /><![endif]-->
	<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/wow-ie.css?v4" /><![endif]-->
	<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/wow-ie6.css?v4" /><![endif]-->
	<!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/wow-ie7.css?v4" /><![endif]-->
	<script type="text/javascript" src="../wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
	<script type="text/javascript" src="../wow/static/local-common/js/core.js?v15"></script>
	<script type="text/javascript" src="../wow/static/local-common/js/tooltip.js?v15"></script>
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
<li><a href="<?php echo $website['root']; ?>" rel="np" class=""><?php echo $website['title']; ?></a><span class="breadcrumb-arrow"></span></li>
<li class="last"><a href="shop.php" rel="np"><?php echo $Errors['401']; ?></a></li>
</ol>
</div>
<div class="content-bot">
	<div id="server-error">
		<h2 class="http">Four,<br /> oh: One.</h2>
		<h3>Unauthorized</h3>
		<p>access<br /> <strong>Unauthorized</strong><br /><br /><em>(Is this what happens to pages that wander into the forest?)</em></p>
		<!-- http : 404 -->
	</div>
</div>
</div>
</div>
	<?php include("../footer.php"); ?>
</body>
</html>
