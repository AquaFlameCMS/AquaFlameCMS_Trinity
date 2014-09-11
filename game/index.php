<?php
require_once("../configs.php");
$page_cat = "game";
include_once("functions.d/GetGameTheme.php");
?>

<!doctype html>
<html lang="en-gb">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html>
<head>
<title><?php echo TITLE ?> - <?php echo $game['1']; ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="description" content="<?php echo DESCRIPTION ?>">
<meta name="keywords" content="<?php echo KEYWORDS ?>">
<link rel="shortcut icon" href="<?php echo BASE_URL ?>wow/static/local-common/images/favicons/wow.ico" type="image/x-icon" />
<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/en-gb/data/opensearch" title="Battle.net Search" />
<!--[if IE]><link rel="stylesheet" href="<?php echo BASE_URL ?>wow/static/local-common/css/common-ie.css?v15" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" href="<?php echo BASE_URL ?>wow/static/local-common/css/common-ie6.css?v15" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="<?php echo BASE_URL ?>wow/static/local-common/css/common-ie7.css?v15" /><![endif]-->
<?php GetGameTheme(); ?>
<!--[if IE]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/wiki/wiki-ie.css?v35" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" href="<?php echo BASE_URL ?>wow/static/css/cms-ie6.css?v4" /><![endif]-->
<!--[if IE]><link rel="stylesheet" href="<?php echo BASE_URL ?>wow/static/css/wow-ie.css?v4" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" href="<?php echo BASE_URL ?>wow/static/css/wow-ie6.css?v4" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="<?php echo BASE_URL ?>wow/static/css/wow-ie7.css?v4" /><![endif]-->
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery-1.4.4.min.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/core.js?v15"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/tooltip.js?v15"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/cms.js"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
</head>
<body class=" game-index">
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
<body class="game-index">
<div id="wrapper">
	<?php include("../header.php"); ?>
	<div id="content">
		<div class="content-top body-top">
			<div class="content-trail">
				<ol class="ui-breadcrumb">
					<li itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
					<a href="<?php echo BASE_URL ?>" rel="np" class="breadcrumb-arrow" itemprop="url">
					<span class="breadcrumb-text" itemprop="name"><?php echo TITLE ?></span>
					</a>
					</li>
					<li class="last" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
					<a href="<?php echo BASE_URL ?>game/" rel="np" itemprop="url">
					<span class="breadcrumb-text" itemprop="name"><?php echo $game['game']; ?></span>
					</a>
					</li>
				</ol>
			</div>
			<div class="content-bot clear">
				<div id="wiki" class="wiki directory wiki-index">
					<div class="announcement-site">
						<a href="/wow/es/warlords-of-draenor/" class="announcement-site-link">Discover the expansion <span class="arrow"></span>
						</a>
					</div>
					<div class="title">
						<h2><?php echo $game['1']; ?></h2>
						<p class="desc">
							<?php echo $game['2']; ?>
						</p>
					</div>
					<div class="hot-topics">
						<div class="new-returning-guides">
							<a href="guide/" class="new-to-wow">
							<span><?php echo $game['3']; ?></span>
							</a>
							<a href="returning-players-guide/" class="coming-back-to-wow">
							<span><?php echo $game['4']; ?></span>
							</a>
						</div>
						<div class="story-and-characters">
							<a href="lore/characters/" class="the-characters-of-warcraft">
							<span><?php echo $game['5']; ?></span>
							</a>
							<a href="the-story-of-warcraft/" class="the-story-of-warcraft">
							<span><?php echo $game['6']; ?></span>
							</a>
						</div>
						<a href="patch-notes/" class="under-development">
						<span><?php echo $game['7']; ?></span>
						</a>
						<span class="clear">
						<!-- -->
						</span>
					</div>
					<div class="index">
						<div class="panel">
							<div class="column" style="width: 295px;">
								<div class="box first-child">
									<h2 class="header "><a href="race/"><?php echo $game['8']; ?><span class="arrow"></span></a></h2>
									<h4 class="subcategory "><?php echo $game['9']; ?></h4>
									<ul class="double">
										<li>
										<a href="race/draenei">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/race_draenei_male.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['10']; ?></a>
										</li>
										<li>
										<a href="race/night-elf">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/race_night-elf_male.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['11']; ?></a>
										</li>
										<li>
										<a href="race/dwarf">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/race_dwarf_male.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['12']; ?></a>
										</li>
									</ul>
									<ul class="double">
										<li>
										<a href="race/gnome">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/race_gnome_male.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['13']; ?></a>
										</li>
										<li>
										<a href="race/worgen">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/race_worgen_male.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['14']; ?></a>
										</li>
										<li>
										<a href="race/human">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/race_human_male.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['15']; ?></a>
										</li>
									</ul>
									<span class="clear">
									<!-- -->
									</span>
									<br/>
									<h4 class="subcategory "><?php echo $game['16']; ?></h4>
									<ul class="double">
										<li>
										<a href="race/blood-elf">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/race_blood-elf_male.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['17']; ?></a>
										</li>
										<li>
										<a href="race/goblin">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/race_goblin_male.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['18']; ?></a>
										</li>
										<li>
										<a href="race/undead">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/race_undead_male.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['19']; ?></a>
										</li>
									</ul>
									<ul class="double">
										<li>
										<a href="race/orc">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/race_orc_male.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['20']; ?></a>
										</li>
										<li>
										<a href="race/tauren">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/race_tauren_male.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['21']; ?></a>
										</li>
										<li>
										<a href="race/troll">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/race_troll_male.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['22']; ?></a>
										</li>
									</ul>
									<span class="clear">
									<!-- -->
									</span>
									<br/>
									<h4 class="subcategory "><?php echo $game['23']; ?></h4>
									<ul class="double">
										<li>
										<a href="race/pandaren">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/race_pandaren_male.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['24']; ?></a>
										</li>
									</ul>
									<span class="clear">
									<!-- -->
									</span>
								</div>
								<div class="box">
									<h2 class="header "><a href="class/"><?php echo $game['25']; ?><span class="arrow"></span></a></h2>
									<ul class="double">
										<li>
										<a href="class/warlock">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/class_warlock.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['26']; ?></a>
										</li>
										<li>
										<a href="class/death-knight" data-tooltip="C. de la Muerte">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/class_death-knight.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['27']; ?></a>
										</li>
										<li>
										<a href="class/hunter">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/class_hunter.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['28']; ?></a>
										</li>
										<li>
										<a href="class/shaman">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/class_shaman.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['29']; ?></a>
										</li>
										<li>
										<a href="class/druid">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/class_druid.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['30']; ?></a>
										</li>
										<li>
										<a href="class/warrior">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/class_warrior.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['31']; ?></a>
										</li>
									</ul>
									<ul class="double">
										<li>
										<a href="class/mage">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/class_mage.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['32']; ?></a>
										</li>
										<li>
										<a href="class/monk">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/class_monk.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['33']; ?></a>
										</li>
										<li>
										<a href="class/paladin">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/class_paladin.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['34']; ?></a>
										</li>
										<li>
										<a href="class/rogue">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/class_rogue.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['35']; ?></a>
										</li>
										<li>
										<a href="class/priest">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/class_priest.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['36']; ?></a>
										</li>
									</ul>
									<span class="clear">
									<!-- -->
									</span>
								</div>
							</div>
							<div class="column" style="margin: 0 19px; width: 250px;">
								<div class="box first-child">
									<h2 class="header "><a href="<?php echo BASE_URL ?>zone/"><?php echo $game['37']; ?><span class="arrow"></span></a></h2>
									<ul>
										<li><a href="<?php echo BASE_URL ?>zone/#expansion=4"><?php echo $game['38']; ?></a></li>
										<li><a href="<?php echo BASE_URL ?>zone/#expansion=3"><?php echo $game['39']; ?></a></li>
										<li><a href="<?php echo BASE_URL ?>zone/#expansion=2"><?php echo $game['40']; ?></a></li>
										<li><a href="<?php echo BASE_URL ?>zone/#expansion=1"><?php echo $game['41']; ?></a></li>
										<li><a href="<?php echo BASE_URL ?>zone/#expansion=0"><?php echo $game['42']; ?></a></li>
									</ul>
								</div>
								<div class="box">
									<h2 class="header "><a href="pvp/"><?php echo $game['43']; ?><span class="arrow"></span></a></h2>
									<ul>
										<li><a href="pvp/battlegrounds"><?php echo $game['44']; ?></a></li>
										<li><a href="pvp/arenas"><?php echo $game['45']; ?></a></li>
										<li><a href="pvp/world-pvp"><?php echo $game['46']; ?></a></li>
										<li><a href="pvp/rewards"><?php echo $game['47']; ?></a></li>
									</ul>
								</div>
								<div class="box">
									<h2 class="header "><a href="lore/"><?php echo $game['48']; ?><span class="arrow"></span></a></h2>
									<ul>
										<li><a href="lore/#destination-pandaria/"><?php echo $game['49']; ?></a></li>
										<li><a href="lore/#leader-story/"><?php echo $game['50']; ?></a></li>
										<li><a href="lore/#short-story/"><?php echo $game['51']; ?></a></li>
									</ul>
								</div>
								<div class="box">
									<h2 class="header "><?php echo $game['52']; ?></h2>
									<ul>
										<li><a href="faction/"><?php echo $game['53']; ?></a></li>
										<li><a href="pet-battles/"><?php echo $game['54']; ?></a></li>
										<li><a href="events/"><?php echo $game['55']; ?></a></li>
									</ul>
								</div>
							</div>
							<div class="column" style="width: 300px;">
								<div class="box first-child" id="tools">
									<h2 class="header "><?php echo $game['56']; ?></h2>
									<ul>
										<li>
										<a href="h<?php echo BASE_URL ?>game/tool/talent-calculator">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/ability_marksmanship.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['57']; ?></a>
										</li>
										<li>
										<a href="<?php echo BASE_URL ?>game/status">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/assets/misc/18/realm_status.gif" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['58']; ?></a>
										</li>
									</ul>
									<span class="clear">
									<!-- -->
									</span>
								</div>
								<div class="box">
									<h2 class="header "><a href="http://us.battle.net/wow/es/profession/"><?php echo $game['59']; ?><span class="arrow"></span></a></h2>
									<h4 class="subcategory "><?php echo $game['60']; ?></h4>
									<ul class="double">
										<li>
										<a href="http://us.battle.net/wow/es/profession/alchemy">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/trade_alchemy.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['61']; ?></a>
										</li>
										<li>
										<a href="http://us.battle.net/wow/es/profession/skinning">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/inv_misc_pelt_wolf_01.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['62']; ?></a>
										</li>
										<li>
										<a href="http://us.battle.net/wow/es/profession/enchanting">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/trade_engraving.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['63']; ?></a>
										</li>
										<li>
										<a href="http://us.battle.net/wow/es/profession/herbalism">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/trade_herbalism.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['64']; ?></a>
										</li>
										<li>
										<a href="http://us.battle.net/wow/es/profession/blacksmithing">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/trade_blacksmithing.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['65']; ?></a>
										</li>
										<li>
										<a href="http://us.battle.net/wow/es/profession/engineering">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/trade_engineering.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['66']; ?></a>
										</li>
									</ul>
									<ul class="double">
										<li>
										<a href="http://us.battle.net/wow/es/profession/inscription">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/inv_inscription_tradeskill01.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['67']; ?></a>
										</li>
										<li>
										<a href="http://us.battle.net/wow/es/profession/jewelcrafting">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/inv_misc_gem_01.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['68']; ?></a>
										</li>
										<li>
										<a href="http://us.battle.net/wow/es/profession/mining">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/inv_pick_02.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['69']; ?></a>
										</li>
										<li>
										<a href="http://us.battle.net/wow/es/profession/leatherworking">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/trade_leatherworking.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['70']; ?></a>
										</li>
										<li>
										<a href="http://us.battle.net/wow/es/profession/tailoring">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/trade_tailoring.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['71']; ?></a>
										</li>
									</ul>
									<span class="clear">
									<!-- -->
									</span>
									<br/>
									<h4 class="subcategory "><?php echo $game['72']; ?></h4>
									<ul class="double">
										<li>
										<a href="http://us.battle.net/wow/es/profession/archaeology">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/trade_archaeology.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['73']; ?></a>
										</li>
										<li>
										<a href="http://us.battle.net/wow/es/profession/cooking">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/inv_misc_food_15.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['74']; ?></a>
										</li>
									</ul>
									<ul class="double">
										<li>
										<a href="http://us.battle.net/wow/es/profession/fishing">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/trade_fishing.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['75']; ?></a>
										</li>
										<li>
										<a href="http://us.battle.net/wow/es/profession/first-aid">
										<span class="icon-frame frame-14 ">
										<img src="http://media.blizzard.com/wow/icons/18/spell_holy_sealofsacrifice.jpg" alt="" width="14" height="14"/>
										</span>
										<?php echo $game['76']; ?></a>
										</li>
									</ul>
									<span class="clear">
									<!-- -->
									</span>
								</div>
								<div class="box" id="patch-notes">
									<h2 class="header "><a href="patch-notes/"><?php echo $game['77']; ?><span class="arrow"></span></a></h2>
									<ul>
										<li>
										<a href="patch-notes/5-4">
										<?php echo $game['78']; ?></a>
										</li>
										<li>
										<a href="patch-notes/5-3">
										<?php echo $game['79']; ?></a>
										</li>
										<li>
										<a href="patch-notes/5-2">
										<?php echo $game['80']; ?></a>
										</li>
									</ul>
									<span class="clear">
									<!-- -->
									</span>
								</div>
							</div>
							<span class="clear">
							<!-- -->
							</span>
						</div>
					</div>
					<span class="clear">
					<!-- -->
					</span>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript" src="<?php echo BASE_URL ?>wow/static/local-common/js/search.js?v46"></script>
<script type="text/javascript">
//<![CDATA[
var xsToken = '';
var supportToken = '';
var jsonSearchHandlerUrl = '//eu.battle.net';
var Msg = {
support: {
ticketNew: 'Ticket {0} was created.',
ticketStatus: 'Ticket {0}’s status changed to {0}.',
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
fansiteNone: 'No fansites available.',
flashErrorHeader: 'Adobe Flash Player must be installed to see this content.',
flashErrorText: 'Download Adobe Flash Player',
flashErrorUrl: 'http://get.adobe.com/flashplayer/'
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
noResults: 'There are no results to display.',
kb: 'Support',
post: 'Forums',
article: 'Blog Articles',
static: 'General Content',
wowcharacter: 'Characters',
wowitem: 'Items',
wowguild: 'Guilds',
wowarenateam: 'Arena Teams',
url: 'Suggested Links',
friend: 'Friends',
other: 'Other'
}
};
//]]>
</script>
<?php include("../footer.php"); ?>
</body>
</html>