<?php
require_once("configs.php");
$page_cat = "home";
?>
<head>
<title><?php echo TITLE ?></title>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
<meta name="description" content="<?php echo DESCRIPTION ?>">
<meta name="keywords" content="<?php echo KEYWORDS ?>">
<link rel="shortcut icon" href="wow/static/local-common/images/favicons/wow.png" type="image/x-icon"/>
<link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common.css?v15"/>
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common-ie.css?v15" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common-ie6.css?v15" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common-ie7.css?v15" /><![endif]-->
<link title="World of Warcraft - News" href="wow/en/feed/news" type="application/atom+xml" rel="alternate"/>
<?php GetStyle(); ?>
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="wow/static/css/cms-ie6.css?v4" /><![endif]-->
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="wow/static/css/wow-ie.css?v4" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="wow/static/css/wow-ie6.css?v4" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="wow/static/css/wow-ie7.css?v4" /><![endif]-->
<script type="text/javascript" src="wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script type="text/javascript" src="wow/static/local-common/js/core.js?v15"></script>
<script type="text/javascript" src="wow/static/local-common/js/tooltip.js?v15"></script>
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
	<?php include("header.php"); ?>
	<div id="content">
		<div class="content-top">
			<div class="content-trail">
				<ol class="ui-breadcrumb">
					<li><a href="<?php echo BASE_URL ?>" rel="np" class=""><?php echo TITLE ?>
					</a><span class="breadcrumb-arrow"></span></li>
					<li class="last"><a href="forgot-pw.php" rel="np">Forgot Password</a></li>
				</ol>
			</div>
			<div class="content-bot">
				<div id="server-error">
					<form name="forgotpw" action="ForgotPassword.php" method="POST">
						 User Name <br/>
						<input name="username" type="text" class="input border-5 glow-shadow-2" alt="Username"><br/>
						Password <br/>
						<input name="password" type="password" class="input border-5 glow-shadow-2" alt="Password"><br/>
						Password Repeat <br/>
						<input name="passwordrep" type="password" class="input border-5 glow-shadow-2" alt="Repeat Password"><br/>
						Security Question <br/>
						<input name="secquestion" type="text" class="input border-5 glow-shadow-2" alt="Security Question"><br/>
						<input name="submit" type="submit" value="Send Me My Reset!">
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include("footer.php"); ?>
</body>
</html>
