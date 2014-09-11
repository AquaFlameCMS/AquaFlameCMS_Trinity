<?php require_once("../../configs.php"); ?>
<!DOCTYPE html>
<html lang="en-gb">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
<title><?php echo TITLE ?> - <?php echo $Shop['shop_62']; ?></title>
<meta content="false" http-equiv="imagetoolbar"/>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
<meta name="description" content="<?php echo DESCRIPTION ?>">
<meta name="keywords" content="<?php echo KEYWORDS ?>">
<link rel="shortcut icon" href="../../wow/static/local-common/images/favicons/wow.png" type="image/x-icon"/>
<link rel="stylesheet" href="../../wow/static/local-common/css/common.css?v15"/>
<!--[if IE]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/local-common/css/common-ie.css?v46" /><![endif]-->
<!--[if IE 6]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/local-common/css/common-ie6.css?v46" /><![endif]-->
<!--[if IE 7]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/local-common/css/common-ie7.css?v46" /><![endif]-->
<link title="World of Warcraft - Noticias" href="http://us.battle.net/wow/es/feed/news" type="application/atom+xml" rel="alternate"/>
<link rel="stylesheet" href="../../wow/static/css/wow.css?v4"/>
<link rel="stylesheet" href="../../wow/static/css/shop/vas.css"/>
<!--[if IE]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/wow-ie.css?v34" /><![endif]-->
<!--[if IE 6]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/wow-ie6.css?v34" /><![endif]-->
<!--[if IE 7]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/wow-ie7.css?v34" /><![endif]-->
<script src="../../wow/static/local-common/js/third-party/jquery-1.4.4.min.js"></script>
<script src="../../wow/static/local-common/js/core.js?v15"></script>
<script src="../../wow/static/local-common/js/tooltip.js?v15"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
</head>
<body class="race-change">
<div id="wrapper">
	<?php $page_cat="shop"; include("../../header.php"); ?>
	<div id="content">
		<div class="content-top">
			<div class="content-trail">
				<ol class="ui-breadcrumb">
					<li><a href="<?php echo BASE_URL ?>" rel="np" class=""><?php echo TITLE ?>
					</a><span class="breadcrumb-arrow"></span></li>
					<li class=""><a href="<?php echo BASE_URL ?>shop/" rel="np"><?php echo $Shop['shop']; ?>
					</a><span class="breadcrumb-arrow"></span></li>
					<li class="last"><a href="<?php echo BASE_URL ?>shop/race-change/" rel="np"><?php echo $Shop['shop_62']; ?></a></li>
				</ol>
			</div>
			<div class="content-bot">
				<div class="summary">
					<div class="page-titles">
						<h2><?php echo $Shop['shop_62']; ?></h2>
						<p>
							 <?php echo $Shop['shop_63']; ?>
						</p>
						<em><?php echo $Shop['shop_25']; ?></em>
					</div>
					<div class="button-section">
						<a class="ui-button button4 button-apply " href="<?php echo BASE_URL ?>account/change_race.php">
						<span>
						<span><?php echo $Shop['shop_64']; ?></span>
						</span>
						</a>
						<a class="ui-cancel " href="#">
						<span>
						<?php echo $Shop['shop_27']; ?> </span>
						</a>
					</div>
				</div>
				<div class="summary-top">
					<div class="step step-1">
						<h3><?php echo $Shop['shop_65']; ?></h3>
						<p>
							 <?php echo $Shop['shop_66']; ?>
						</p>
						<span class="hover-area"></span>
					</div>
					<div class="step step-2">
						<h3><?php echo $Shop['shop_67']; ?></h3>
						<p>
							 <?php echo $Shop['shop_68']; ?>
						</p>
						<span class="hover-area"></span>
					</div>
					<div class="step step-3">
						<h3><?php echo $Shop['shop_69']; ?></h3>
						<p>
							<?php echo $Shop['shop_70']; ?>
						</p>
						<br/>
						<span class="hover-area"></span>
					</div>
					<span class="clear">
					<!-- -->
					</span>
				</div>
				<div class="summary-bottom">
					<div class="desc">
						<p>
							 <?php echo $Shop['shop_71']; ?>
						</p>
						<div class="button-section">
							<table class="dynamic-center ">
							<tr>
								<td>
									<a class="ui-button button4 button-apply " href="<?php echo BASE_URL ?>account/change_race.php">
									<span>
									<span><?php echo $Shop['shop_64']; ?></span>
									</span>
									</a>
									<a class="ui-cancel " href="#">
									<span>
									 <?php echo $Shop['shop_72']; ?></span>
									</a>
								</td>
							</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("../../footer.php"); ?>
</body>
</html>