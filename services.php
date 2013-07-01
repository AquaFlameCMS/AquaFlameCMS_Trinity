<?php require_once("configs.php"); ?>
<!DOCTYPE html> 
<html lang="en-gb">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<title><?php echo $website['title']; ?> - <?php echo $Services['Services']; ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/en-gb/data/opensearch" title="Battle.net Search" />
<link rel="stylesheet" href="wow/static/local-common/css/common.css?v15" />
<link title="World of Warcraft - News" href="wow/en/feed/news" type="application/atom+xml" rel="alternate" />
<link rel="stylesheet" href="wow/static/css/wow.css?v4" />
<link rel="stylesheet" href="wow/static/css/services/services-index.css?v4" />
<script src="wow/static/local-common/js/third-party/jquery-1.4.4.min.js"></script>
<script src="wow/static/local-common/js/core.js?v15"></script>
<script src="wow/static/local-common/js/tooltip.js?v15"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]--></head>
<body class="en-gb services-home logged-in">

<div id="wrapper">
<?php $page_cat="services"; include("header.php"); ?>
<div id="content">
<div class="content-top">
<div class="content-trail">
<ol class="ui-breadcrumb">
<li><a href="index.php" rel="np" class=""><?php echo $website['title']; ?></a></li>
<li class="last"><a href="services.php" rel="np"><?php echo $Serv['Serv']; ?></a></li>
</ol>
</div>
<div class="content-bot">	
	<div class="bg-body">
		<div class="bg-bottom">		
			<div class="contents-wrapper">
			
				<div class="left-col" align="left">
					<div class="section-title">
					<?php
					if(isset($_GET['ref']) && $_GET['ref'] != ""){
					//Ids
					/*
					1 - Change Avatar
					*/
					
					switch($_GET['ref']){
					case "avatar":
					include("services/avatar.php");
					break;
					default:
					include("services/redirect.php");
					break;
					}
					}else{
					?>
					<span><?php echo $website['title']; ?><?php echo $Serv['Serv1']; ?></span>
					<p><?php echo $Serv['Serv2']; ?></p>
					</div>
					
					<div class="main-services">
					<a href="account_log.php" class="main-services-banner left-bnr" style="background-image:url('wow/static/images/services/thumbnails/thumb-main-services-1.jpg');">
						<span class="banner-title"><?php echo $Serv['Serv3']; ?></span>
						<span class="banner-desc"><?php echo $Serv['Serv4']; ?></span>
					</a>
					<a href="ban-list.php" class="main-services-banner right-bnr" style="background-image:url('wow/static/images/services/thumbnails/thumb-main-services-2.jpg');">
						<span class="banner-title"><?php echo $Serv['Serv5']; ?></span>
						<span class="banner-desc"><?php echo $Serv['Serv6']; ?></span>
					</a>
					<a href="search.php" class="main-services-banner left-bnr" style="background-image:url('wow/static/images/services/thumbnails/thumb-main-services-3.jpg');">
						<span class="banner-title"><?php echo $Serv['Serv7']; ?></span>
						<span class="banner-desc"><?php echo $Serv['Serv8']; ?><?php echo $website['title']; ?><?php echo $Serv['Serv9']; ?></span>
					</a>
					<a href="raf-invite.php" class="main-services-banner right-bnr" style="background-image:url('wow/static/images/services/thumbnails/thumb-main-services-4.jpg');">
						<span class="banner-title"><?php echo $Serv['Serv10']; ?></span>
						<span class="banner-desc"><?php echo $Serv['Serv11']; ?><?php echo $website['title']; ?>.</span>
					</a>
					<a href="#" class="main-services-banner left-bnr" style="background-image:url('wow/static/images/services/thumbnails/thumb-main-services-5.jpg');">
						<span class="banner-title"><?php echo $Serv['Serv12']; ?></span>
						<span class="banner-desc"><?php echo $Serv['Serv13']; ?></span>
					</a>
					<a href="account_log.php" class="main-services-banner right-bnr" style="background-image:url('wow/static/images/services/thumbnails/thumb-main-services-6.jpg');">
						<span class="banner-title"><?php echo $Serv['Serv14']; ?></span>
						<span class="banner-desc"><?php echo $Serv['Serv15']; ?></span>
					</a>
						<span class="clear"><!-- --></span>
					</div>
				<?php
				}
				?>
				</div>
				<div class="right-col">
					<div class="sub-services">					
							<div class="sub-services-section">
								<div class="sub-title">
									<span><?php echo $Serv['Serv16']; ?></span>
								</div>
								<ul>
								<li><a href="ban-list.php" class="c3-l6"><span><?php echo $Serv['Serv5']; ?></span></a></li>
								<li><a href="javascript:;" class="c1-l1"><span><?php echo $Account6['Account6']; ?></span></a></li>
								<li><a href="javascript:;" class="c1-l2"><span><?php echo $Account5['Account5']; ?></span></a></li>
										<!--<li><a href="javascript:;" class="c1-l3"><span>Add an Authenticator</span></a></li>
										<li><a href="javascript:;" class="c1-l4"><span>Authenticator FAQ</span></a></li>-->
								</ul>					
							</div>
							<div class="sub-services-section">
								<div class="sub-title">
									<span><?php echo $Serv['Serv17']; ?></span>
								</div>
								<ul>
										<li><a href="javascript:;" class="c4-l1"><span><?php echo $Friends['Keepthem']; ?></span></a></li>
										<!--<li><a href="javascript:;" class="c4-l2"><span>World of Warcraft Magazine</span></a></li>-->
										<li><a href="javascript:;" class="c4-l3"><span><?php echo $Serv['Serv18']; ?></span></a></li>
								</ul>					
							</div>
							<div class="sub-services-section">
								<div class="sub-title">
									<span><?php echo $Serv['Serv19']; ?></span>
								</div>
								<ul>
										<li><a href="javascript:;" class="c3-l1"><span><?php echo $Serv['Serv20']; ?></span></a></li>
										<li><a href="javascript:;" class="c3-l2"><span><?php echo $Serv['Serv21']; ?></span></a></li>
										<li><a href="javascript:;" class="c3-l3"><span><?php echo $Serv['Serv22']; ?></span></a></li>
										<li><a href="javascript:;" class="c3-l4"><span><?php echo $Serv['Serv23']; ?></span></a></li>
										<li><a href="javascript:;" class="c3-l5"><span><?php echo $Serv['Serv24']; ?></span></a></li>
										<!--<li><a href="javascript:;" class="c3-l6"><span>Free Character Migration</span></a></li>-->
										<!--<li><a href="javascript:;" class="c3-l7"><span>Public Test Realm</span></a></li>-->
								</ul>					
							</div>
							<div class="sub-services-section">
								<div class="sub-title">
									<span><?php echo $Serv['Serv25']; ?></span>
								</div>
								<ul>
								<li><a href="javascript:;" class="c2-l1"><span><?php echo $Serv['Serv26']; ?></span></a></li>
								<li><a href="services.php?ref=avatar" class="c4-20"><span><?php echo $Serv['Serv27']; ?></span></a></li>
								<li><a href="javascript:;" class="c2-l2"><span><?php echo $Serv['Serv28']; ?></span></a></li>
								<li><a href="javascript:;" class="c2-l3"><span><?php echo $Serv['Serv29']; ?></span></a></li>
								<li><a href="game_client.php" class="c2-l4"><span><?php echo $Serv['Serv30']; ?></span></a></li>
										<!--<li><a href="javascript:;" class="c2-l5"><span>Download Language Pack</span></a></li>-->
								</ul>
                            </div>
							<div class="sub-services-section">
								<div class="sub-title">
									<span><?php echo $Media['Multimedia']; ?></span>
								</div>
								<ul>
										<li><a href="<?php echo $website['root']; ?>media/send_media.php" class="c1-l3"><span><?php echo $Media['SendMedia']; ?></span></a></li>
										
								</ul>					
							</div>                                					
							</div>
					</div>	
				
				<br />
				<span class="clear"><!-- --></span>
				<span class="clear"><!-- --></span>
				<span class="clear"><!-- --></span>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<?php include("footer.php"); ?></body>
</html>