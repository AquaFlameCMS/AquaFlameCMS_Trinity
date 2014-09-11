<?php
require_once("configs.php");
$page_cat = "services";
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb">
<head>
<title>Reputation - Game - World of Warcraft</title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="wow/static/local-common/images/favicons/wow.ico" type="image/x-icon"/>
<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/en-gb/data/opensearch" title="Battle.net Search" />
<link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common.css?v37" />
<!--[if IE]> <link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common-ie.css?v37" /><![endif]-->
<!--[if IE 6]> <link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common-ie6.css?v37" /><![endif]-->
<!--[if IE 7]> <link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common-ie7.css?v37" /><![endif]-->
<link title="World of Warcraft - News" href="/wow/en/feed/news" type="application/atom+xml" rel="alternate"/>
<link rel="stylesheet" type="text/css" media="all" href="wow/static/css/wow.css?v19" />
<link rel="stylesheet" type="text/css" media="all" href="wow/static/css/armory/profile.css?v19" />
<!--[if IE]> <link rel="stylesheet" type="text/css" media="all" href="wow/static/css/profile-ie.css?v19" /><![endif]-->
<!--[if IE 6]> <link rel="stylesheet" type="text/css" media="all" href="wow/static/css/profile-ie6.css?v19" /><![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="wow/static/css/character/reputation.css?v19" />
<!--[if IE]> <link rel="stylesheet" type="text/css" media="all" href="wow/static/css/character/reputation-ie.css?v19" /><![endif]-->
<!--[if IE 6]> <link rel="stylesheet" type="text/css" media="all" href="wow/static/css/character/reputation-ie6.css?v19" /><![endif]-->
<!--[if IE 7]> <link rel="stylesheet" type="text/css" media="all" href="wow/static/css/character/reputation-ie7.css?v19" /><![endif]-->
<!--[if IE]> <link rel="stylesheet" type="text/css" media="all" href="wow/static/css/wow-ie.css?v19" /><![endif]-->
<!--[if IE 6]> <link rel="stylesheet" type="text/css" media="all" href="wow/static/css/wow-ie6.css?v19" /><![endif]-->
<!--[if IE 7]> <link rel="stylesheet" type="text/css" media="all" href="wow/static/css/wow-ie7.css?v19" /><![endif]-->
<script type="text/javascript" src="wow/static/local-common/js/third-party/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="wow/static/local-common/js/core.js"></script>
<script type="text/javascript" src="wow/static/local-common/js/tooltip.js"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
Core.staticUrl = '/wow/static';
Core.sharedStaticUrl= 'wow/static/local-common';
Core.baseUrl = '/wow/en';
Core.projectUrl = '/wow';
Core.cdnUrl = 'http://eu.media.blizzard.com';
Core.supportUrl = 'http://eu.battle.net/support/';
Core.secureSupportUrl= 'https://eu.battle.net/support/';
Core.project = 'wow';
Core.locale = 'en-gb';
Core.language = 'en';
Core.buildRegion = 'eu';
Core.region = 'eu';
Core.shortDateFormat= 'dd/MM/yyyy';
Core.dateTimeFormat = 'dd/MM/yyyy HH:mm';
Core.loggedIn = false;
Flash.videoPlayer = 'http://eu.media.blizzard.com/global-video-player/themes/wow/video-player.swf';
Flash.videoBase = 'http://eu.media.blizzard.com/wow/media/videos';
Flash.ratingImage = 'http://eu.media.blizzard.com/global-video-player/ratings/wow/en-gb.jpg';
Flash.expressInstall= 'http://eu.media.blizzard.com/global-video-player/expressInstall.swf';
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-544112-16']);
_gaq.push(['_setDomainName', '.battle.net']);
_gaq.push(['_trackPageview']);
_gaq.push(['_trackPageLoadTime']);
//]]>
</script>
</head>
<body class="en-gb">

<div id="wrapper">
	<?php include("header.php"); ?>
	<div id="content">
<div class="content-top">
<div class="content-trail">
<ol class="ui-breadcrumb">
<li>
<a href="index.php" rel="np">
<?php echo TITLE ?>
</a>
</li>
<li>
<a href="services.php" rel="np">
Services
</a>
</li>
<li class="last">
<a href="" rel="np">
<?php echo $name = $_GET['name'];?> @ <?php echo $name_realm1['realm']; ?>
</a>
</li>
</ol>
</div>
<div class="content-bot">	

	


	<div id="profile-wrapper" class="profile-wrapper profile-wrapper-alliance">

		<div class="profile-sidebar-anchor">
			<div class="profile-sidebar-outer">
				<div class="profile-sidebar-inner">
					<div class="profile-sidebar-contents">




<div class="profile-sidebar-crest">

<a href="" rel="np" class="profile-sidebar-character-model" style="background-image: url(http://eu.battle.net/wow/static/images/2d/inset/4-0.jpg);">
<span class="hover"></span>
<span class="fade"></span>
</a>

<div class="profile-sidebar-info">
<div class="name"><a href="" rel="np">NAME</a></div>
				
<div class="under-name color-c6">
<span class="level"><strong>LEVEL</strong></span> <a href="" class="race">Night Elf</a> <a href="" class="class">Death Knight</a>
</div>
				
<div class="guild">
<a href="">GUILD</a>
</div>

<div class="realm">
<span id="profile-info-realm" class="tip" data-battlegroup="Raserei / Frenzy">Hellscream</span>
</div>


			</div>
		</div>


		

	<ul class="profile-sidebar-menu" id="profile-sidebar-menu">
	<li>
	<a href="" class="" rel="np">
	<span class="arrow"><span class="icon">Summary</span></span></a>
	</li>
	<!--<li class="">
	<a href="" class="" rel="np">
	<span class="arrow"><span class="icon">Talents &amp; Glyphs</span></span></a>
	</li>
	<li class=" disabled">
	<a href="javascript:;" class=" has-submenu vault" rel="np">
	<span class="arrow"><span class="icon">Auctions</span></span></a>
	</li>
	<li class=" disabled">
	<a href="javascript:;" class=" vault" rel="np">
	<span class="arrow"><span class="icon">Events</span></span></a>
	</li>
	<li class="">
	<a href="" class=" has-submenu" rel="np">
	<span class="arrow"><span class="icon">Achievements</span></span></a>
	</li>
	<li class="">
	<a href="" class="" rel="np">
	<span class="arrow"><span class="icon">Companions &amp; Mounts</span></span></a>
	</li>
	<li class="">
	<a href="" class=" has-submenu" rel="np">
	<span class="arrow"><span class="icon">Professions</span></span></a>
	</li>-->
	<li class=" active">
	<a href="reputation.php" class="" rel="np">
	<span class="arrow"><span class="icon">Reputation</span></span></a>
	</li><!--
	<li class="">
	<a href="" class="" rel="np">
	<span class="arrow"><span class="icon">PvP</span></span></a>
	</li>
	<li class="">
	<a href="" class="" rel="np">
	<span class="arrow"><span class="icon">Activity Feed</span></span></a>
	</li>-->
	</ul>






					</div>
				</div>
			</div>
		</div>
		
		<div class="profile-contents">

		<div class="reputation reputation-simple" id="reputation">

			<div class="profile-section-header">
	<h3 class="category ">					Reputation
</h3>
			</div>

			<div class="profile-section">
				<div class="profile-filters">
					<div class="tabs">
						<a href="/wow/en/character/hellscream/Simitis/reputation/"  class="tab-active">
							Simple
						</a>
					</div>
				</div>

	<ul class="reputation-list">


	<li class="reputation-category">
		<h3 class="category-header">Cataclysm</h3>
		<ul class="reputation-entry">




	<li class="faction-details">
		<div class="rank-6">
	<a href="javascript:;" data-fansite="faction|1204|Avengers of Hyjal" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/avengers-of-hyjal" data-faction="1204">Avengers of Hyjal</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				7534/21000
			</div>
			<div class="faction-fill" style="width: 36%;"></div>
		</div>
	</div>
		<div class="faction-level">	Revered 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-6">
	<a href="javascript:;" data-fansite="faction|1177|Baradin&#39;s Wardens" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/baradins-wardens" data-faction="1177">Baradin&#39;s Wardens</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				7698/21000
			</div>
			<div class="faction-fill" style="width: 37%;"></div>
		</div>
	</div>
		<div class="faction-level">	Revered 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>





	<li class="faction-details">
		<div class="rank-7">
	<a href="javascript:;" data-fansite="faction|1158|Guardians of Hyjal" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/guardians-of-hyjal" data-faction="1158">Guardians of Hyjal</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				999/999
			</div>
			<div class="faction-fill full-fill" style="width: 100%;"></div>
		</div>
	</div>
		<div class="faction-level">	Exalted 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>





	<li class="faction-details">
		<div class="rank-7">
	<a href="javascript:;" data-fansite="faction|1173|Ramkahen" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/ramkahen" data-faction="1173">Ramkahen</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				31/999
			</div>
			<div class="faction-fill" style="width: 3%;"></div>
		</div>
	</div>
		<div class="faction-level">	Exalted 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-7">
	<a href="javascript:;" data-fansite="faction|1135|The Earthen Ring" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/the-earthen-ring" data-faction="1135">The Earthen Ring</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				999/999
			</div>
			<div class="faction-fill full-fill" style="width: 100%;"></div>
		</div>
	</div>
		<div class="faction-level">	Exalted 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-7">
	<a href="javascript:;" data-fansite="faction|1171|Therazane" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/therazane" data-faction="1171">Therazane</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				51/999
			</div>
			<div class="faction-fill" style="width: 5%;"></div>
		</div>
	</div>
		<div class="faction-level">	Exalted 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-7">
	<a href="javascript:;" data-fansite="faction|1174|Wildhammer Clan" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/wildhammer-clan" data-faction="1174">Wildhammer Clan</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				999/999
			</div>
			<div class="faction-fill full-fill" style="width: 100%;"></div>
		</div>
	</div>
		<div class="faction-level">	Exalted 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>

		</ul>
	</li>


	<li class="reputation-category">
		<h3 class="category-header">Wrath of the Lich King</h3>
		<ul class="reputation-entry">




	<li class="faction-details">
		<div class="rank-7">
	<a href="javascript:;" data-fansite="faction|1106|Argent Crusade" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/argent-crusade" data-faction="1106">Argent Crusade</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				999/999
			</div>
			<div class="faction-fill full-fill" style="width: 100%;"></div>
		</div>
	</div>
		<div class="faction-level">	Exalted 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-7">
	<a href="javascript:;" data-fansite="faction|1090|Kirin Tor" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/kirin-tor" data-faction="1090">Kirin Tor</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				999/999
			</div>
			<div class="faction-fill full-fill" style="width: 100%;"></div>
		</div>
	</div>
		<div class="faction-level">	Exalted 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-7">
	<a href="javascript:;" data-fansite="faction|1098|Knights of the Ebon Blade" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/knights-of-the-ebon-blade" data-faction="1098">Knights of the Ebon Blade</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				999/999
			</div>
			<div class="faction-fill full-fill" style="width: 100%;"></div>
		</div>
	</div>
		<div class="faction-level">	Exalted 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-7">
	<a href="javascript:;" data-fansite="faction|1156|The Ashen Verdict" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/the-ashen-verdict" data-faction="1156">The Ashen Verdict</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				999/999
			</div>
			<div class="faction-fill full-fill" style="width: 100%;"></div>
		</div>
	</div>
		<div class="faction-level">	Exalted 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-5">
	<a href="javascript:;" data-fansite="faction|1073|The Kalu&#39;ak" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/the-kaluak" data-faction="1073">The Kalu&#39;ak</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				9690/12000
			</div>
			<div class="faction-fill" style="width: 81%;"></div>
		</div>
	</div>
		<div class="faction-level">	Honoured 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-7">
	<a href="javascript:;" data-fansite="faction|1119|The Sons of Hodir" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/the-sons-of-hodir" data-faction="1119">The Sons of Hodir</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				105/999
			</div>
			<div class="faction-fill" style="width: 11%;"></div>
		</div>
	</div>
		<div class="faction-level">	Exalted 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-7">
	<a href="javascript:;" data-fansite="faction|1091|The Wyrmrest Accord" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/the-wyrmrest-accord" data-faction="1091">The Wyrmrest Accord</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				999/999
			</div>
			<div class="faction-fill full-fill" style="width: 100%;"></div>
		</div>
	</div>
		<div class="faction-level">	Exalted 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="reputation-subcategory">
		<div class="faction-details faction-subcategory-details  rank-7">
			<h4 class="faction-header">
				Alliance Vanguard
			</h4>
	<a href="javascript:;" data-fansite="faction|1037|Alliance Vanguard" class="fansite-link float-right"> </a>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				999/999
			</div>
			<div class="faction-fill full-fill" style="width: 100%;"></div>
		</div>
	</div>
		<div class="faction-level">	Exalted 
</div>
	<span class="clear"><!-- --></span>
		</div>
		<ul class="factions">




	<li class="faction-details">
		<div class="rank-7">
	<a href="javascript:;" data-fansite="faction|1068|Explorers&#39; League" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/explorers-league" data-faction="1068">Explorers&#39; League</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				999/999
			</div>
			<div class="faction-fill full-fill" style="width: 100%;"></div>
		</div>
	</div>
		<div class="faction-level">	Exalted 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-7">
	<a href="javascript:;" data-fansite="faction|1126|The Frostborn" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/the-frostborn" data-faction="1126">The Frostborn</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				999/999
			</div>
			<div class="faction-fill full-fill" style="width: 100%;"></div>
		</div>
	</div>
		<div class="faction-level">	Exalted 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-7">
	<a href="javascript:;" data-fansite="faction|1094|The Silver Covenant" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/the-silver-covenant" data-faction="1094">The Silver Covenant</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				999/999
			</div>
			<div class="faction-fill full-fill" style="width: 100%;"></div>
		</div>
	</div>
		<div class="faction-level">	Exalted 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-7">
	<a href="javascript:;" data-fansite="faction|1050|Valiance Expedition" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/valiance-expedition" data-faction="1050">Valiance Expedition</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				999/999
			</div>
			<div class="faction-fill full-fill" style="width: 100%;"></div>
		</div>
	</div>
		<div class="faction-level">	Exalted 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>

		</ul>
	</li>






	<li class="reputation-subcategory">
		<div class="faction-details faction-subcategory-details ">
			<h4 class="faction-header">
				Sholazar Basin
			</h4>
	<span class="clear"><!-- --></span>
		</div>
		<ul class="factions">




	<li class="faction-details">
		<div class="rank-0">
	<a href="javascript:;" data-fansite="faction|1104|Frenzyheart Tribe" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/frenzyheart-tribe" data-faction="1104">Frenzyheart Tribe</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				25217/36000
			</div>
			<div class="faction-fill" style="width: 70%;"></div>
		</div>
	</div>
		<div class="faction-level">	Hated 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-5">
	<a href="javascript:;" data-fansite="faction|1105|The Oracles" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/the-oracles" data-faction="1105">The Oracles</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				0/12000
			</div>
			<div class="faction-fill" style="width: 1%;"></div>
		</div>
	</div>
		<div class="faction-level">	Honoured 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>

		</ul>
	</li>


		</ul>
	</li>


	<li class="reputation-category">
		<h3 class="category-header">The Burning Crusade</h3>
		<ul class="reputation-entry">




	<li class="faction-details">
		<div class="rank-6">
	<a href="javascript:;" data-fansite="faction|1012|Ashtongue Deathsworn" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/ashtongue-deathsworn" data-faction="1012">Ashtongue Deathsworn</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				11421/21000
			</div>
			<div class="faction-fill" style="width: 54%;"></div>
		</div>
	</div>
		<div class="faction-level">	Revered 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-5">
	<a href="javascript:;" data-fansite="faction|942|Cenarion Expedition" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/cenarion-expedition" data-faction="942">Cenarion Expedition</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				6025/12000
			</div>
			<div class="faction-fill" style="width: 50%;"></div>
		</div>
	</div>
		<div class="faction-level">	Honoured 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-6">
	<a href="javascript:;" data-fansite="faction|946|Honor Hold" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/honor-hold" data-faction="946">Honor Hold</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				10776/21000
			</div>
			<div class="faction-fill" style="width: 51%;"></div>
		</div>
	</div>
		<div class="faction-level">	Revered 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-4">
	<a href="javascript:;" data-fansite="faction|989|Keepers of Time" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/keepers-of-time" data-faction="989">Keepers of Time</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				3221/6000
			</div>
			<div class="faction-fill" style="width: 54%;"></div>
		</div>
	</div>
		<div class="faction-level">	Friendly 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-5">
	<a href="javascript:;" data-fansite="faction|978|Kurenai" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/kurenai" data-faction="978">Kurenai</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				8531/12000
			</div>
			<div class="faction-fill" style="width: 71%;"></div>
		</div>
	</div>
		<div class="faction-level">	Honoured 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-5">
	<a href="javascript:;" data-fansite="faction|1015|Netherwing" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/netherwing" data-faction="1015">Netherwing</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				4742/12000
			</div>
			<div class="faction-fill" style="width: 40%;"></div>
		</div>
	</div>
		<div class="faction-level">	Honoured 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-3">
	<a href="javascript:;" data-fansite="faction|1038|Ogri&#39;la" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/ogrila" data-faction="1038">Ogri&#39;la</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				0/3000
			</div>
			<div class="faction-fill" style="width: 1%;"></div>
		</div>
	</div>
		<div class="faction-level">	Neutral 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-2">
	<a href="javascript:;" data-fansite="faction|970|Sporeggar" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/sporeggar" data-faction="970">Sporeggar</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				785/3000
			</div>
			<div class="faction-fill" style="width: 26%;"></div>
		</div>
	</div>
		<div class="faction-level">	Unfriendly 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-4">
	<a href="javascript:;" data-fansite="faction|933|The Consortium" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/the-consortium" data-faction="933">The Consortium</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				1516/6000
			</div>
			<div class="faction-fill" style="width: 25%;"></div>
		</div>
	</div>
		<div class="faction-level">	Friendly 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>





	<li class="faction-details">
		<div class="rank-5">
	<a href="javascript:;" data-fansite="faction|990|The Scale of the Sands" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/the-scale-of-the-sands" data-faction="990">The Scale of the Sands</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				913/12000
			</div>
			<div class="faction-fill" style="width: 8%;"></div>
		</div>
	</div>
		<div class="faction-level">	Honoured 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-4">
	<a href="javascript:;" data-fansite="faction|967|The Violet Eye" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/the-violet-eye" data-faction="967">The Violet Eye</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				1310/6000
			</div>
			<div class="faction-fill" style="width: 22%;"></div>
		</div>
	</div>
		<div class="faction-level">	Friendly 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>







	<li class="reputation-subcategory">
		<div class="faction-details faction-subcategory-details ">
			<h4 class="faction-header">
				Shattrath City
			</h4>
	<span class="clear"><!-- --></span>
		</div>
		<ul class="factions">




	<li class="faction-details">
		<div class="rank-6">
	<a href="javascript:;" data-fansite="faction|1011|Lower City" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/lower-city" data-faction="1011">Lower City</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				2632/21000
			</div>
			<div class="faction-fill" style="width: 13%;"></div>
		</div>
	</div>
		<div class="faction-level">	Revered 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-3">
	<a href="javascript:;" data-fansite="faction|1031|Sha&#39;tari Skyguard" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/shatari-skyguard" data-faction="1031">Sha&#39;tari Skyguard</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				0/3000
			</div>
			<div class="faction-fill" style="width: 1%;"></div>
		</div>
	</div>
		<div class="faction-level">	Neutral 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-3">
	<a href="javascript:;" data-fansite="faction|1077|Shattered Sun Offensive" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/shattered-sun-offensive" data-faction="1077">Shattered Sun Offensive</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				2505/3000
			</div>
			<div class="faction-fill" style="width: 84%;"></div>
		</div>
	</div>
		<div class="faction-level">	Neutral 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-4">
	<a href="javascript:;" data-fansite="faction|932|The Aldor" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/the-aldor" data-faction="932">The Aldor</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				1185/6000
			</div>
			<div class="faction-fill" style="width: 20%;"></div>
		</div>
	</div>
		<div class="faction-level">	Friendly 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-1">
	<a href="javascript:;" data-fansite="faction|934|The Scryers" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/the-scryers" data-faction="934">The Scryers</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				1397/3000
			</div>
			<div class="faction-fill" style="width: 47%;"></div>
		</div>
	</div>
		<div class="faction-level">	Hostile 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-7">
	<a href="javascript:;" data-fansite="faction|935|The Sha&#39;tar" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/the-shatar" data-faction="935">The Sha&#39;tar</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				999/999
			</div>
			<div class="faction-fill full-fill" style="width: 100%;"></div>
		</div>
	</div>
		<div class="faction-level">	Exalted 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>

		</ul>
	</li>


		</ul>
	</li>


	<li class="reputation-category">
		<h3 class="category-header">Guild</h3>
		<ul class="reputation-entry">




	<li class="faction-details">
		<div class="rank-6">
	<a href="javascript:;" data-fansite="faction|1168|Guild" class="fansite-link float-right"> </a>

				<a href="/wow/en/guild/hellscream/Option/">
	<span class="faction-name">
		Option
	</span>
				</a>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				281/21000
			</div>
			<div class="faction-fill" style="width: 1%;"></div>
		</div>
	</div>
		<div class="faction-level">	Revered 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>

		</ul>
	</li>


	<li class="reputation-category">
		<h3 class="category-header">Classic</h3>
		<ul class="reputation-entry">




	<li class="faction-details">
		<div class="rank-5">
	<a href="javascript:;" data-fansite="faction|529|Argent Dawn" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/argent-dawn" data-faction="529">Argent Dawn</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				7261/12000
			</div>
			<div class="faction-fill" style="width: 61%;"></div>
		</div>
	</div>
		<div class="faction-level">	Honoured 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-4">
	<a href="javascript:;" data-fansite="faction|87|Bloodsail Buccaneers" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/bloodsail-buccaneers" data-faction="87">Bloodsail Buccaneers</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				4337/6000
			</div>
			<div class="faction-fill" style="width: 72%;"></div>
		</div>
	</div>
		<div class="faction-level">	Friendly 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-0">
	<a href="javascript:;" data-fansite="faction|910|Brood of Nozdormu" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/brood-of-nozdormu" data-faction="910">Brood of Nozdormu</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				20888/36000
			</div>
			<div class="faction-fill" style="width: 58%;"></div>
		</div>
	</div>
		<div class="faction-level">	Hated 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-4">
	<a href="javascript:;" data-fansite="faction|609|Cenarion Circle" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/cenarion-circle" data-faction="609">Cenarion Circle</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				5964/6000
			</div>
			<div class="faction-fill" style="width: 99%;"></div>
		</div>
	</div>
		<div class="faction-level">	Friendly 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-4">
	<a href="javascript:;" data-fansite="faction|909|Darkmoon Faire" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/darkmoon-faire" data-faction="909">Darkmoon Faire</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				3490/6000
			</div>
			<div class="faction-fill" style="width: 58%;"></div>
		</div>
	</div>
		<div class="faction-level">	Friendly 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-3">
	<a href="javascript:;" data-fansite="faction|92|Gelkis Clan Centaur" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/gelkis-clan-centaur" data-faction="92">Gelkis Clan Centaur</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				2000/3000
			</div>
			<div class="faction-fill" style="width: 67%;"></div>
		</div>
	</div>
		<div class="faction-level">	Neutral 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-5">
	<a href="javascript:;" data-fansite="faction|749|Hydraxian Waterlords" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/hydraxian-waterlords" data-faction="749">Hydraxian Waterlords</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				4102/12000
			</div>
			<div class="faction-fill" style="width: 34%;"></div>
		</div>
	</div>
		<div class="faction-level">	Honoured 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-3">
	<a href="javascript:;" data-fansite="faction|93|Magram Clan Centaur" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/magram-clan-centaur" data-faction="93">Magram Clan Centaur</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				2000/3000
			</div>
			<div class="faction-fill" style="width: 67%;"></div>
		</div>
	</div>
		<div class="faction-level">	Neutral 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-3">
	<a href="javascript:;" data-fansite="faction|349|Ravenholdt" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/ravenholdt" data-faction="349">Ravenholdt</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				0/3000
			</div>
			<div class="faction-fill" style="width: 1%;"></div>
		</div>
	</div>
		<div class="faction-level">	Neutral 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-3">
	<a href="javascript:;" data-fansite="faction|809|Shen&#39;dralar" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/shendralar" data-faction="809">Shen&#39;dralar</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				0/3000
			</div>
			<div class="faction-fill" style="width: 1%;"></div>
		</div>
	</div>
		<div class="faction-level">	Neutral 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-0">
	<a href="javascript:;" data-fansite="faction|70|Syndicate" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/syndicate" data-faction="70">Syndicate</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				32000/36000
			</div>
			<div class="faction-fill" style="width: 89%;"></div>
		</div>
	</div>
		<div class="faction-level">	Hated 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-3">
	<a href="javascript:;" data-fansite="faction|59|Thorium Brotherhood" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/thorium-brotherhood" data-faction="59">Thorium Brotherhood</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				0/3000
			</div>
			<div class="faction-fill" style="width: 1%;"></div>
		</div>
	</div>
		<div class="faction-level">	Neutral 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-2">
	<a href="javascript:;" data-fansite="faction|576|Timbermaw Hold" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/timbermaw-hold" data-faction="576">Timbermaw Hold</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				100/3000
			</div>
			<div class="faction-fill" style="width: 3%;"></div>
		</div>
	</div>
		<div class="faction-level">	Unfriendly 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-3">
	<a href="javascript:;" data-fansite="faction|589|Wintersaber Trainers" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/wintersaber-trainers" data-faction="589">Wintersaber Trainers</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				0/3000
			</div>
			<div class="faction-fill" style="width: 1%;"></div>
		</div>
	</div>
		<div class="faction-level">	Neutral 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-3">
	<a href="javascript:;" data-fansite="faction|270|Zandalar Tribe" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/zandalar-tribe" data-faction="270">Zandalar Tribe</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				1847/3000
			</div>
			<div class="faction-fill" style="width: 62%;"></div>
		</div>
	</div>
		<div class="faction-level">	Neutral 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="reputation-subcategory">
		<div class="faction-details faction-subcategory-details ">
			<h4 class="faction-header">
				Alliance
			</h4>
	<span class="clear"><!-- --></span>
		</div>
		<ul class="factions">




	<li class="faction-details">
		<div class="rank-7">
	<a href="javascript:;" data-fansite="faction|69|Darnassus" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/darnassus" data-faction="69">Darnassus</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				32/999
			</div>
			<div class="faction-fill" style="width: 3%;"></div>
		</div>
	</div>
		<div class="faction-level">	Exalted 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-7">
	<a href="javascript:;" data-fansite="faction|930|Exodar" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/exodar" data-faction="930">Exodar</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				347/999
			</div>
			<div class="faction-fill" style="width: 35%;"></div>
		</div>
	</div>
		<div class="faction-level">	Exalted 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-5">
	<a href="javascript:;" data-fansite="faction|1134|Gilneas" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/gilneas" data-faction="1134">Gilneas</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				4954/12000
			</div>
			<div class="faction-fill" style="width: 41%;"></div>
		</div>
	</div>
		<div class="faction-level">	Honoured 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-7">
	<a href="javascript:;" data-fansite="faction|54|Gnomeregan" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/gnomeregan" data-faction="54">Gnomeregan</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				999/999
			</div>
			<div class="faction-fill full-fill" style="width: 100%;"></div>
		</div>
	</div>
		<div class="faction-level">	Exalted 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-7">
	<a href="javascript:;" data-fansite="faction|47|Ironforge" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/ironforge" data-faction="47">Ironforge</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				999/999
			</div>
			<div class="faction-fill full-fill" style="width: 100%;"></div>
		</div>
	</div>
		<div class="faction-level">	Exalted 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-7">
	<a href="javascript:;" data-fansite="faction|72|Stormwind" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/stormwind" data-faction="72">Stormwind</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				999/999
			</div>
			<div class="faction-fill full-fill" style="width: 100%;"></div>
		</div>
	</div>
		<div class="faction-level">	Exalted 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>

		</ul>
	</li>




	<li class="reputation-subcategory">
		<div class="faction-details faction-subcategory-details ">
			<h4 class="faction-header">
				Alliance Forces
			</h4>
	<span class="clear"><!-- --></span>
		</div>
		<ul class="factions">




	<li class="faction-details">
		<div class="rank-3">
	<a href="javascript:;" data-fansite="faction|890|Silverwing Sentinels" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/silverwing-sentinels" data-faction="890">Silverwing Sentinels</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				2229/3000
			</div>
			<div class="faction-fill" style="width: 74%;"></div>
		</div>
	</div>
		<div class="faction-level">	Neutral 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-5">
	<a href="javascript:;" data-fansite="faction|730|Stormpike Guard" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/stormpike-guard" data-faction="730">Stormpike Guard</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				4958/12000
			</div>
			<div class="faction-fill" style="width: 41%;"></div>
		</div>
	</div>
		<div class="faction-level">	Honoured 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-3">
	<a href="javascript:;" data-fansite="faction|509|The League of Arathor" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/the-league-of-arathor" data-faction="509">The League of Arathor</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				1906/3000
			</div>
			<div class="faction-fill" style="width: 64%;"></div>
		</div>
	</div>
		<div class="faction-level">	Neutral 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>

		</ul>
	</li>








	<li class="reputation-subcategory">
		<div class="faction-details faction-subcategory-details ">
			<h4 class="faction-header">
				Steamwheedle Cartel
			</h4>
	<span class="clear"><!-- --></span>
		</div>
		<ul class="factions">




	<li class="faction-details">
		<div class="rank-0">
	<a href="javascript:;" data-fansite="faction|21|Booty Bay" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/booty-bay" data-faction="21">Booty Bay</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				0/36000
			</div>
			<div class="faction-fill" style="width: 1%;"></div>
		</div>
	</div>
		<div class="faction-level">	Hated 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-0">
	<a href="javascript:;" data-fansite="faction|577|Everlook" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/everlook" data-faction="577">Everlook</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				0/36000
			</div>
			<div class="faction-fill" style="width: 1%;"></div>
		</div>
	</div>
		<div class="faction-level">	Hated 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-0">
	<a href="javascript:;" data-fansite="faction|369|Gadgetzan" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/gadgetzan" data-faction="369">Gadgetzan</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				0/36000
			</div>
			<div class="faction-fill" style="width: 1%;"></div>
		</div>
	</div>
		<div class="faction-level">	Hated 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>



	<li class="faction-details">
		<div class="rank-0">
	<a href="javascript:;" data-fansite="faction|470|Ratchet" class="fansite-link float-right"> </a>

	<span class="faction-name">
				<a href="/wow/en/faction/ratchet" data-faction="470">Ratchet</a>
	</span>
	<div class="faction-standing">
		<div class="faction-bar">
			<div class="faction-score">
				0/36000
			</div>
			<div class="faction-fill" style="width: 1%;"></div>
		</div>
	</div>
		<div class="faction-level">	Hated 
</div>
	<span class="clear"><!-- --></span>
		</div>
	</li>

		</ul>
	</li>


		</ul>
	</li>


	</ul>

			</div>
		</div>

		</div>

	<span class="clear"><!-- --></span>
	</div>

        <script type="text/javascript">
        //<![CDATA[
		$(function() {
			Profile.url = '/wow/en/character/hellscream/Simitis/reputation';
		});

			var MsgProfile = {
				tooltip: {
					feature: {
						notYetAvailable: "This feature is not yet available."
					},
					vault: {
						character: "This section is only accessible if you are logged in as this character.",
						guild: "This section is only accessible if you are logged in as a character belonging to this guild."
					}
				}
			};
        //]]>
        </script>

</div>
</div>
</div><script type="text/javascript" src="wow/static/local-common/js/search.js?v37"></script>
<script type="text/javascript">
//<![CDATA[
var xsToken = '';
var Msg = {
support: {
ticketNew: 'Ticket {0} was created.',
ticketStatus: 'Ticket {0}’s status changed to {1}.',
ticketOpen: 'Open',
ticketAnswered: 'Answered',
ticketResolved: 'Resolved',
ticketCanceled: 'Cancelled',
ticketArchived: 'Archived',
ticketInfo: 'Need Info',
ticketAll: 'View All Tickets'
},
cms: {
requestError: 'Your request cannot be completed.',
ignoreNot: 'Not ignoring this user',
ignoreAlready: 'Already ignoring this user',
stickyRequested: 'Sticky requested',
stickyHasBeenRequested: 'You have already sent a sticky request for this topic.',
postAdded: 'Post added to tracker',
postRemoved: 'Post removed from tracker',
userAdded: 'User added to tracker',
userRemoved: 'User removed from tracker',
validationError: 'A required field is incomplete',
characterExceed: 'The post body exceeds XXXXXX characters.',
searchFor: "Search for",
searchTags: "Articles tagged:",
characterAjaxError: "You may have become logged out. Please refresh the page and try again.",
ilvl: "Level {0}",
shortQuery: "Search requests must be at least three characters long."
},
bml: {
bold: 'Bold',
italics: 'Italics',
underline: 'Underline',
list: 'Unordered List',
listItem: 'List Item',
quote: 'Quote',
quoteBy: 'Posted by {0}',
unformat: 'Remove Formating',
cleanup: 'Fix Linebreaks',
code: 'Code Blocks',
item: 'WoW Item',
itemPrompt: 'Item ID:',
url: 'URL',
urlPrompt: 'URL Address:'
},
ui: {
submit: 'Submit',
cancel: 'Cancel',
reset: 'Reset',
viewInGallery: 'View in gallery',
loading: 'Loading…',
unexpectedError: 'An error has occurred',
fansiteFind: 'Find this on…',
fansiteFindType: 'Find {0} on…',
fansiteNone: 'No fansites available.'
},
grammar: {
colon: '{0}:',
first: 'First',
last: 'Last'
},
fansite: {
achievement: 'achievement',
character: 'character',
faction: 'faction',
'class': 'class',
object: 'object',
talentcalc: 'talents',
skill: 'profession',
quest: 'quest',
spell: 'spell',
event: 'event',
title: 'title',
arena: 'arena team',
guild: 'guild',
zone: 'zone',
item: 'item',
race: 'race',
npc: 'NPC',
pet: 'pet'
},
search: {
kb: 'Support',
post: 'Forums',
article: 'Blog Articles',
static: 'General Content',
wowcharacter: 'Characters',
wowitem: 'Items',
wowguild: 'Guilds',
wowarenateam: 'Arena Teams',
other: 'Other'
}
};
//]]>
</script>
<script type="text/javascript">
//<![CDATA[
Core.load("wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js?v37");
Core.load("wow/static/local-common/js/login.js?v37", false, function() {
Login.embeddedUrl = 'https://eu.battle.net/login/login.frag';
});
//]]>
</script>
<script type="text/javascript" src="wow/static/local-common/js/menu.js?v37"></script>
<script type="text/javascript" src="wow/static/js/wow.js?v19"></script>
<script type="text/javascript">
//<![CDATA[
$(function() {
Menu.initialize('/data/menu.json');
});
//]]>
</script>
<script type="text/javascript" src="wow/static/local-common/js/table.js?v37"></script>
<script type="text/javascript" src="wow/static/js/profile.js?v19"></script>
<script type="text/javascript" src="wow/static/js/character/reputation.js?v19"></script>
<!--[if lt IE 8]> <script type="text/javascript" src="wow/static/local-common/js/third-party/jquery.pngFix.pack.js?v37"></script>
<script type="text/javascript">
//<![CDATA[
$('.png-fix').pngFix(); //]]>
</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
(function() {
var ga = document.createElement('script');
var src = "https://ssl.google-analytics.com/ga.js";
if ('http:' == document.location.protocol) {
src = "http://www.google-analytics.com/ga.js";
}
ga.type = 'text/javascript';
ga.setAttribute('async', 'true');
ga.src = src;
var s = document.getElementsByTagName('script');
s = s[s.length-1];
s.parentNode.insertBefore(ga, s.nextSibling);
})();
//]]>
</script>

<?php include("footer.php"); ?>
<div id="warnings-wrapper">
<!--[if lt IE 8]> <div id="browser-warning" class="warning warning-red">
<div class="warning-inner2">
You are using an outdated web browser.<br />
<a href="http://eu.blizzard.com/support/article/browserupdate">Upgrade</a> or <a href="http://www.google.com/chromeframe/?hl=en-GB" id="chrome-frame-link">install Google Chrome Frame</a>.
<a href="#close" class="warning-close" onclick="App.closeWarning('#browser-warning', 'browserWarning'); return false;"></a>
</div>
</div>
<![endif]-->
<!--[if lt IE 8]> <script type="text/javascript" src="wow/static/local-common/js/third-party/CFInstall.min.js?v37"></script>
<script type="text/javascript">
//<![CDATA[
$(function() {
var age = 365 * 24 * 60 * 60 * 1000;
var src = 'https://www.google.com/chromeframe/?hl=en-GB';
if ('http:' == document.location.protocol) {
src = 'http://www.google.com/chromeframe/?hl=en-GB';
}
document.cookie = "disableGCFCheck=0;path=/;max-age="+age;
$('#chrome-frame-link').bind({
'click': function() {
App.closeWarning('#browser-warning');
CFInstall.check({
mode: 'overlay',
url: src
});
return false;
}
});
});
//]]>
</script>
<![endif]-->
<noscript>
<div id="javascript-warning" class="warning warning-red">
<div class="warning-inner2">
JavaScript must be enabled to use this site.
</div>
</div>
</noscript>
</div>
</div>
</div>


</body>
</html>
