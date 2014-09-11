<?php
$page_cat = "community";
require_once("../configs.php");
$page_cat = "community";
?>
<!doctype html>
<html lang="en-gb">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<html>
<head>
<title><?php echo TITLE ?> - <?php echo $Community['Community'];?></title>
<meta name="description" content="<?php echo DESCRIPTION ?>">
<meta name="keywords" content="<?php echo KEYWORDS ?>">
<link rel="shortcut icon" href="<?php echo BASE_URL ?>wow/static/local-common/images/favicons/wow.png" type="image/x-icon"/>
<?php GetCommunityTheme(); ?>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery.js?v46"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/core.js?v46"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/tooltip.js?v46"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
</head>
<body class="es-mx community-home logged-in">
<div id="wrapper">
<?php
include("../header.php");
?>
	<div id="content">
		<div class="content-top body-top">
			<div class="content-trail">
				<ol class="ui-breadcrumb">
					<li itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
					<a href="/wow/es/" rel="np" class="breadcrumb-arrow" itemprop="url">
					<span class="breadcrumb-text" itemprop="name"><?php echo TITLE ?></span>
					</a>
					</li>
					<li class="last" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
					<a href="/wow/es/community/" rel="np" itemprop="url">
					<span class="breadcrumb-text" itemprop="name"><?php echo $Community['Community'];?></span>
					</a>
					</li>
				</ol>
			</div>
			<div class="content-bot clear">
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
						<h4><?php echo $Community['Community'];?></h4>
						<div class="profiles-section">
							<div class="sidebar-module " id="sidebar-profiles-search">
								<div class="sidebar-title">
									<h3 class="header-3 title-profiles-search"><?php echo $Community['profiles'];?></h3>
								</div>
								<div class="sidebar-content">
									<div class="profiles-search-block">
										<span class="profiles-search-title"><?php echo $Community['character'];?></span>
										<form action="<?php echo BASE_URL ?>search.php" method="get" autocomplete="off">
											<input type="hidden" name="f" value="wowcharacter"/>
											<input type="text" id="wowcharacter" alt="Name" name="q"/>
											<button class="ui-button button1" type="submit"><span class="button-left"><span class="button-right"><?php echo $Community['search'];?></span></span></button>
										</form>
									</div>
									<div class="profiles-search-block">
										<span class="profiles-search-title"><?php echo $Community['guild'];?></span>
										<form action="<?php echo BASE_URL ?>search.php" method="get" autocomplete="off">
											<input type="hidden" name="f" value="wowguild"/>
											<input type="text" id="wowguild" alt="Name" name="q"/>
											<button class="ui-button button1" type="submit"><span class="button-left"><span class="button-right"><?php echo $Community['search'];?></span></span></button>
										</form>
									</div>
								</div>
							</div>
							<p class="profiles-tip">
								Tip: Log in to quickly access your profile.
							</p>
							<span class="clear">
							<!-- -->
							</span>
						</div>
					</div>
					<div class="main-feature">
						<div class="main-feature-wrapper">
							<div class="sidebar-module " id="sidebar-leaderboards">
								<div class="sidebar-title">
									<h3 class="header-3 title-leaderboards">Leaderboards</h3>
								</div>
								<div class="sidebar-content">
									<div id="challenge-mode" class="leaderboard-content-block">
										<a href="#" class="leaderboard-content-title">PvE Mode</a>
										<span class="leaderboard-content-desc">View the Server Progression over PvE, how many times dungeons & raids are run.</span>
										<!-- FULL COLUMN -->
										<div class="group">
											<?php
											$server_db=DB;
											$pve_mode = mysql_query("SELECT * FROM $server_db.pve_mode");
											while($pve = mysql_fetch_array($pve_mode)){ ?>
											<a href="<?php echo $pve["link"] ?>">
											<span class="group-thumbnail <?php echo $pve["thumb"] ?>"></span>
											<span class="group-name"><?php echo $pve["group-name"] ?><span class="group-desc"><?php echo $pve["description"] ?></span>
											</span>
											<span class="clear">
											<!-- -->
											</span>
											</a>
											 <?php }?>
										</div>
									</div>
									<div id="pvp-ladder" class="leaderboard-content-block">
										<a href="#" class="leaderboard-content-title">PvP Mode</a>
										<span class="leaderboard-content-desc">View the current Rated Battleground and Arena ladders.</span>
										<div class="group">
											<?php
											$pvp_mode = mysql_query("SELECT * FROM $server_db.pvp_mode");
											while($pvp = mysql_fetch_array($pvp_mode)){ ?>
											<a href="<?php echo $pve["link"] ?>">
											<span class="group-thumbnail <?php echo $pvp["thumb"] ?>"></span>
											<span class="group-name"><?php echo $pvp["group-name"] ?><span class="group-desc"><?php echo $pvp["description"] ?></span>
											</span>
											<span class="clear">
											<!-- -->
											</span>
											</a>
											 <?php }?>
										</div>
									</div>
									<span class="clear">
									<!-- -->
									</span>
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
								<span class="clear">
								<!-- -->
								</span>
								</a>
								</li>
								<li>
								<a href="#" class="mobile-armory block">
								<span class="content-icon"></span>
								<span class="content-title">PvE Block</span>
								<span class="content-desc">Find who is the best on the PvE Block, statistics, points, boss kills, dungeon runs, etc...</span>
								<span class="clear">
								<!-- -->
								</span>
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
								<span class="clear">
								<!-- -->
								</span>
								</a>
								</li>
								<li>
								<a href="search" class="fanart block" target="_blank">
								<span class="content-thumb"></span>
								<span class="content-title">Armory</span>
								<span class="clear">
								<!-- -->
								</span>
								</a>
								</li>
							</ul>
						</div>
					</div>
					<?php include("../panel/connect.php"); ?>
					<div class="sidebar-module " id="sidebar-blizzard-community">
						<div class="sidebar-title">
							<h3 class="category title-blizzard-community">Community Links</h3>
						</div>
						<div class="sidebar-content">
							<div class="content-block">
								<ul>
									<li>
									<a href="http://aquaflame.org" class="web-auction-house block">
									<style type="text/css">
									#wow { background: url("wow/static/images/community/001.png") no-repeat; }
									</style>
									<span class="content-title">AquaFlame.NET</span>
									<span class="content-desc"></span>
									<span class="clear">
									<!-- -->
									</span>
									</a>
									</li>
									<li>
									<a href="http://aquaflame.org/forum/" class="mobile-armory block">
									<style type="text/css">
									#wow { background: url("wow/static/images/community/001.png") no-repeat; }
									</style>
									<span class="content-title">AquaFlame CMS</span>
									<span class="content-desc"></span>
									<span class="clear">
									<!-- -->
									</span>
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
								<span class="clear">
								<!-- -->
								</span>
								</a>
								<a href="<?php echo BASE_URL ?>media/send_media.php" class="tosubmit external">Submit</a>
								</li>
								<li>
								<a href="#" class="comics block" target="_blank">
								<span class="content-thumb"></span>
								<span class="content-title">Comics</span>
								<span class="clear">
								<!-- -->
								</span>
								</a>
								<a href="<?php echo BASE_URL ?>media/send_media.php" class="tosubmit external">Submit</a>
								</li>
								<li>
								<a href="#" class="shreenshot block" target="_blank">
								<span class="content-thumb"></span>
								<span class="content-title">Shreenshots</span>
								<span class="clear">
								<!-- -->
								</span>
								</a>
								<a href="<?php echo BASE_URL ?>media/send_media.php" class="tosubmit external">Submit</a>
								</li>
								<li>
								<a href="#" class="wallpaper block" target="_blank">
								<span class="content-thumb"></span>
								<span class="content-title">Fan Wallpapapers</span>
								<span class="clear">
								<!-- -->
								</span>
								</a>
								<a href="<?php echo BASE_URL ?>media/send_media.php" class="tosubmit external">Submit</a>
								</li>
							</ul>
						</div>
					</div>
					<span class="clear">
					<!-- -->
					</span>
				</div>
				<span class="clear">
				<!-- -->
				</span>
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
</div>
</body>
</html>