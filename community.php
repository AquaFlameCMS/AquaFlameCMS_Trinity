<?php
require_once("configs.php");
$page_cat = "community";
?>

<!doctype html>
<html lang="en-gb">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html>
<head>
<title><?php echo $website['title']; ?> - <?php $Community['Community']; ?></title>
<link rel="shortcut icon" href="wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="stylesheet" media="all" href="wow/static/local-common/css/common.css?v46" />
<link rel="stylesheet" media="all" href="wow/static/css/wow.css?v34" />
<link rel="stylesheet" media="all" href="wow/static/css/community/community.css?v34" />
<link rel="stylesheet" media="all" href="wow/static/css/cms.css?v34" />
<link rel="stylesheet" media="all" href="wow/static/css/locale/en-gb.css?v34" />
<script src="wow/static/local-common/js/third-party/jquery.js?v46"></script>
<script src="wow/static/local-common/js/core.js?v46"></script>
<script src="wow/static/local-common/js/tooltip.js?v46"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
<div id="wrapper">
<?php
$page_cat = "community";
include("header.php");
?>
<div id="content">
<div class="content-top">
<div class="content-trail">
<ol class="ui-breadcrumb">
<li><a href="index.php" rel="np"><?php echo $website['title']; ?></a><span class="breadcrumb-arrow"></span></li>
<li class="last"><a href="community.php" rel="np">Community</a></li>
</ol>
</div>
<div class="content-bot">
<script type="text/javascript">
//<![CDATA[
$(document).ready(function(){
	Input.bind('#wowcharacter');
	Input.bind('#wowguild');
});
//]]>
</script>
<div id="left">
<div class="profiles">
	<h4>Community</h4>
<div class="profiles-section">
<div class="sidebar-module " id="sidebar-profiles-search">
<div class="sidebar-title">
	<h3 class="category title-profiles-search">Profiles</h3>
</div>
<div class="sidebar-content">
<div class="profiles-search-block">
	<span class="profiles-search-title">Character</span>
	<form action="<?php echo $website['root']; ?>search.php" method="get" autocomplete="off">
	<input type="hidden" name="f" value="wowcharacter" />
	<input id="wowcharacter" alt="Name" href="<?php echo $website['root']; ?>search.php" type="text" name="search" maxlength="200" tabindex="40" />
<button class="ui-button button1 " href="<?php echo $website['root']; ?>search.php" type="submit" value="" tabindex="41"><span><span>Search</span></span></button>
	</form>
</div>
<div class="profiles-search-block">
<span class="profiles-search-title">Guild</span>
	<form action="<?php echo $website['root']; ?>search.php" method="get" autocomplete="off">
	<input type="hidden" name="f" value="wowcharacter" />
	<input id="wowcharacter" alt="Name" href="<?php echo $website['root']; ?>search.php" type="text" name="search" maxlength="200" tabindex="40" />
<button class="ui-button button1 " href="<?php echo $website['root']; ?>search.php" type="submit" value="" tabindex="41"><span><span>Search</span></span></button>
	</form>
</div>
</div>
</div>
<p class="profiles-tip">Tip: Log in to quickly access your profile.</p>
<span class="clear"><!-- --></span>
</div>
</div>
<div class="main-feature">
<div class="main-feature-wrapper">
<!-- LEADERBOARDS -->
<div class="sidebar-module " id="sidebar-leaderboards">
<div class="sidebar-title">
	<h3 class="category title-leaderboards">Leaderboards</h3>
</div>
<div class="sidebar-content">
<div id="challenge-mode" class="leaderboard-content-block">
<a href="#" class="leaderboard-content-title">PvE Mode</a>
<span class="leaderboard-content-desc">View the Server Progression over PvE, how many times dungeons & raids are run.</span>
<!-- FULL COLUMN -->
<div class="group">
<a href="#">
<span class="group-thumbnail thumb-gate-of-the-setting-sun"></span>
<span class="group-name">Gate of the Setting Sun</span>
	<span class="clear"><!-- --></span>
</a>
<a href="#">
<span class="group-thumbnail thumb-mogushan-palace"></span>
<span class="group-name">Mogu'shan Palace</span>
<span class="clear"><!-- --></span>
</a>
<a href="#">
<span class="group-thumbnail thumb-scarlet-halls"></span>
<span class="group-name">Scarlet Halls</span>
<span class="clear"><!-- --></span>
</a>
<a href="#">
<span class="group-thumbnail thumb-scarlet-monastery"></span>
<span class="group-name">Scarlet Monastery</span>
<span class="clear"><!-- --></span>
</a>
<a href="#">
<span class="group-thumbnail thumb-scholomance"></span>
<span class="group-name">Scholomance</span>
<span class="clear"><!-- --></span>
</a>
<a href="#">
<span class="group-thumbnail thumb-shadopan-monastery"></span>
<span class="group-name">Shado-Pan Monastery</span>
<span class="clear"><!-- --></span>
</a>
<a href="#">
<span class="group-thumbnail thumb-siege-of-niuzao-temple"></span>
<span class="group-name">Siege of Niuzao Temple</span>
<span class="clear"><!-- --></span>
</a>
<a href="#">
<span class="group-thumbnail thumb-stormstout-brewery"></span>
<span class="group-name">Stormstout Brewery</span>
<span class="clear"><!-- --></span>
</a>
<a href="#">
<span class="group-thumbnail thumb-temple-of-the-jade-serpent"></span>
<span class="group-name">Temple of the Jade Serpent</span>
<span class="clear"><!-- --></span>
</a>
</div>
</div>
<div id="pvp-ladder" class="leaderboard-content-block">
<a href="#" class="leaderboard-content-title">PvP Mode</a>
<span class="leaderboard-content-desc">View the current Rated Battleground and Arena ladders.</span>
<div class="group">
<a href="#">
<span class="group-thumbnail thumb-pvp-overview"></span>
<span class="group-name">PvP Overview
<span class="group-desc">Top players, specs, and teams</span>
</span>
<span class="clear"><!-- --></span>
</a>
<a href="#">
<span class="group-thumbnail thumb-battlegrounds"></span>
<span class="group-name">Battlegrounds
</span>
<span class="clear"><!-- --></span>
</a>
<a href="#">
<span class="group-thumbnail thumb-arena-2v2"></span>
<span class="group-name">Arena 2v2
</span>
<span class="clear"><!-- --></span>
</a>
<a href="#">
<span class="group-thumbnail thumb-arena-3v3"></span>
<span class="group-name">Arena 3v3
</span>
<span class="clear"><!-- --></span>
</a>
<a href="#">
<span class="group-thumbnail thumb-arena-5v5"></span>
<span class="group-name">Arena 5v5
</span>
<span class="clear"><!-- --></span>
</a>
</div>	
</div>
<span class="clear"><!-- --></span>
</div>
</div>
</div>
</div>
</div>
<div id="right">
<div class="sidebar-module " id="sidebar-auction-house">
<div class="sidebar-title">
	<h3 class="category title-auction-house">Rank Blocks</h3>
</div>
<div class="sidebar-content">
<ul>
	<li>
	<a href="#" class="web-auction-house block">
	<span class="content-icon"></span>
	<span class="content-title">PvP Block</span>
	<span class="content-desc">Find who is the best on the PvP Block, statistics, points, kill, skills, etc...</span>
	<span class="clear"><!-- --></span>
	</a>
	</li>
	<li>
	<a href="#" class="mobile-armory block">
	<span class="content-icon"></span>
	<span class="content-title">PvE Block</span>
	<span class="content-desc">Find who is the best on the PvE Block, statistics, points, boss kills, dungeon runs, etc...</span>
	<span class="clear"><!-- --></span>
	</a>
	</li>
</ul>
</div>
</div>
<div class="sidebar-module " id="sidebar-fan-contributions">
<div class="sidebar-title">
	<h3 class="category title-fan-contributions">Game Guide</h3>
</div>
<div class="sidebar-content">
<ul>
	<li>
	<a href="#" class="fanart block" target="_blank">
	<span class="content-thumb"></span>
	<span class="content-title">Items</span>
	<span class="clear"><!-- --></span>
	</a>
	</li>
	<li>
	<a href="search.php" class="fanart block" target="_blank">
	<span class="content-thumb"></span>
	<span class="content-title">Armory</span>
	<span class="clear"><!-- --></span>
	</a>
	</li>
</ul>
</div>
</div>
<div class="sidebar-module " id="sidebar-social-media">
<div class="sidebar-title">
	<h3 class="category title-social-media">Stay Connected</h3>
</div>
<div class="sidebar-content">
	<ul class="social-media">
		<li class="atom-feed">
		<a href="#" target="_blank"></a>
		</li>
		<li class="facebook">
		<a href="<?php echo $comun_link['Facebook']; ?>" title="<?php echo $website['title']; ?> on Facebook"></a>
		</li>
		<li class="twitter">
		<a href="<?php echo $comun_link['Twitter']; ?>" title="<?php echo $website['title']; ?> on Twitter"></a>
		</li>
		<li class="youtube">
		<a href="<?php echo $comun_link['Youtube']; ?>" title="<?php echo $website['title']; ?> on Youtube"></a>
		</li>
		<li class="reddit">
		<a href="<?php echo $comun_link['Reddit']; ?>" title="<?php echo $website['title']; ?> on reddit"></a>
		</li>
	<span class="clear"><!-- --></span>
	</ul>
</div>
</div>
<div class="sidebar-module " id="sidebar-blizzard-community">
<div class="sidebar-title">
	<h3 class="category title-blizzard-community">Community Links</h3>
</div>
<div class="sidebar-content">
<div class="content-block">
<ul>
	<li>
	<a href="http://aquaflame.org" class="web-auction-house block">
	<style type="text/css">#wow { background: url("wow/static/images/community/001.png") no-repeat; }</style>

	<span class="content-title">AquaFlame.NET</span>
	<span class="content-desc"></span>
	<span class="clear"><!-- --></span>
	</a>
	</li>
	<li>
	<a href="http://aquaflame.org/forum/" class="mobile-armory block">
	<style type="text/css">#wow { background: url("wow/static/images/community/001.png") no-repeat; }</style>

	<span class="content-title">AquaFlame CMS</span>
	<span class="content-desc"></span>
	<span class="clear"><!-- --></span>
	</a>
	</li>
</ul>
</div>
</div>
</div>
<div class="sidebar-module " id="sidebar-fan-contributions">
<div class="sidebar-title">
	<h3 class="category title-fan-contributions">Fan Contributions</h3>
</div>
<div class="sidebar-content">
<ul>
	<li>
	<a href="#" class="fanart block" target="_blank">
	<span class="content-thumb"></span>
	<span class="content-title">Fan Art</span>
	<span class="clear"><!-- --></span>
	</a>
	<a href="<?php echo $website['root']; ?>media/send_media.php" class="tosubmit external">Submit</a>
	</li>
	<li>
	<a href="#" class="comics block" target="_blank">
	<span class="content-thumb"></span>
	<span class="content-title">Comics</span>
	<span class="clear"><!-- --></span>
	</a>
	<a href="<?php echo $website['root']; ?>media/send_media.php" class="tosubmit external">Submit</a>
	</li>
	<li>
	<a href="#" class="shreenshot block" target="_blank">
	<span class="content-thumb"></span>
	<span class="content-title">Shreenshots</span>
	<span class="clear"><!-- --></span>
	</a>
	<a href="<?php echo $website['root']; ?>media/send_media.php" class="tosubmit external">Submit</a>
	</li>
	<li>
	<a href="#" class="wallpaper block" target="_blank">
	<span class="content-thumb"></span>
	<span class="content-title">Fan Wallpapapers</span>
	<span class="clear"><!-- --></span>
	</a>
	<a href="<?php echo $website['root']; ?>media/send_media.php" class="tosubmit external">Submit</a>
	</li>
</ul>
</div>
</div>
<span class="clear"><!-- --></span>
</div>
<span class="clear"><!-- --></span>
</div>
</div>
</div>
<?php include("footer.php"); ?></body>
</body>
</html>

