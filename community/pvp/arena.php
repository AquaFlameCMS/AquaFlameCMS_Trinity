<?php
require_once("configs.php");
$page_cat = "services";
include("functions/arena_items_func.php");
?>

<!doctype html>
<html lang="en-gb">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html>
<head>
<title><?php echo $name = $_GET['name'];?> - <?php echo TITLE ?></title>
<meta name="description" content="<?php echo DESCRIPTION ?>">
<meta name="keywords" content="<?php echo KEYWORDS ?>">
<link rel="shortcut icon" href="wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/en-gb/data/opensearch" title="Battle.net Search" />
<link rel="stylesheet" href="wow/static/local-common/css/armory/common.css?" />
<link title="World of Warcraft - News" href="http://eu.battle.net/wow/en/feed/news" type="application/atom+xml" rel="alternate"/>
<link rel="stylesheet" href="wow/static/css/wow.css?" />
<link rel="stylesheet" href="wow/static/css/armory/profile.css?" />
<link rel="stylesheet" type="text/css" media="all" href="wow/static/css/armory/arena/arena.css?" />
<link rel="stylesheet" type="text/css" media="all" href="wow/static/css/armory/arena/summary.css?" />
<script src="wow/static/local-common/js/third-party/jquery-1.4.4.min.js"></script>
<script src="wow/static/local-common/js/core.js"></script>
<script src="wow/static/local-common/js/tooltip.js"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
Core.staticUrl = '/wow/static';
Core.sharedStaticUrl= '/wow/static/local-common';
Core.baseUrl = '/wow/en';
Core.projectUrl = '/wow';
Core.cdnUrl = 'http://eu.media.blizzard.com/';
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
Flash.ratingImage = 'wow/../../eu.media.blizzard.com/global-video-player/ratings/wow/rating-pegi.jpg';
Flash.expressInstall= 'http://eu.media.blizzard.com/global-video-player/expressInstall.swf';
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-544112-16']);
_gaq.push(['_setDomainName', '.battle.net']);
_gaq.push(['_trackPageview']);
_gaq.push(['_trackPageLoadTime']);
//]]>
</script>
</head>
	<body class="en-gb search-win">
	<div id="wrapper">
	<?php include("header.php"); ?>
	<div id="content">
	<div class="content-top">
	<div class="content-trail">
	<ol class="ui-breadcrumb">
	<li>
	<a href="index.php" rel="np"><?php echo TITLE ?></a>
	<span class="breadcrumb-arrow"></span>
	</li>
	<li>
	<a href="services.php" rel="np">Services</a>
	<span class="breadcrumb-arrow"></span>
	</li>
	<li>
	<a href="search.php" rel="np">Search</a>
	<span class="breadcrumb-arrow"></span>
	</li>
	<li class="last children"><a href="arena.php" rel="np"><?php echo $name = $_GET['name'];?></a>
	</li>
	</ol>
	</div>
	<div class="content-bot">

	<div id="profile-wrapper" class="profile-wrapper profile-wrapper">
		<div class="profile-sidebar-anchor">
			<div class="profile-sidebar-outer">
				<div class="profile-sidebar-inner">
					<div class="profile-sidebar-contents">

		<div class="profile-info-anchor">
		<div class="arenateam-flag">
			<img src="wow/static/images/arena/banners/arena-a.png" alt="" width="240" height="240" />
		</div>
			<div class="profile-info profile-arenateam-info">
				<div class="name ">
					<a href="arena.php"><?php echo $name = $_GET['name'];?></a>
				</div>

				<?php
				// Grab Team Data
				$con = mysql_connect($serveraddress, $serveruser, $serverpass, $serverport) or die(mysql_error());
				mysql_select_db($server_cdb, $con) or die (mysql_error());
				$teamId = mysql_real_escape_string($_GET['arenaTeamId']);
				$sql = mysql_query("SELECT captainGuid, name, rating, seasonGames, seasonWins, weekGames, weekWins, rank FROM arena_team WHERE arenaTeamId = $teamId LIMIT 1") or die(mysql_error());
				$team_row = mysql_fetch_array($sql);
				$captain_guid = $team_row['captainGuid'];
				
				$sql_captain = mysql_query("SELECT * FROM characters WHERE guid = $captain_guid LIMIT 1") or die(mysql_error());
				$captain_row = mysql_fetch_array($sql_captain);
				
				switch ($captain_row['race'])
				{ 
					case 1: case 3: case 4: case 7: case 11: case 22:
						$faction = 'Alliance';
						break;
					default:
						$faction = 'Horde';
						break;
				}
				?>
				<div class="under-name">
					<span class="teamsize"><b><?php echo $type ?></b></span> <span class="faction"><?php echo $faction; ?></span> Arena Team<span class="comma">,</span>
					<span class="text" data-tooltip="<?php echo TITLE ?>">
					<a href=""><font color=""><?php echo $website['title'];?></font></a> <!-- There should be Battlegroup name -->
					</span>
				</div>

				<div class="rank">Last week's ranking: <span class="ranked"><?php echo $team_row['rank']; ?>°</span>
				</div>
			</div>
		</div>
	<ul class="profile-sidebar-menu" id="profile-sidebar-menu">
			<li class="">
	<a href="search.php" class="back-to" rel="np"><span class="arrow"><span class="icon">Search</span></span></a>

			</li>

			<li class=" active">

			<a href="index.html" class="" rel="np">
				<span class="arrow"><span class="icon">
					<?php echo $name = $_GET['name'];?>
				</span></span>
			</a>
			</li>
	</ul>
</div>
</div>
</div>
</div>
		
		<div class="profile-contents">
		<div class="summary">
			<div class="profile-section">
					<div class="summary-stats">
	<div class="arenateam-stats table">
		<table>
			<thead>
				<tr>
					<th class="align-left">	<span class="sort-tab">&#0160;</span></th>
					<th width="23%" class="align-center">	<span class="sort-tab">Matches</span></th>
					<th width="23%" class="align-center">	<span class="sort-tab">Win - Loss</span></th>
					<th width="23%" class="align-center">	<span class="sort-tab">Team Rating</span></th>
				</tr>
			</thead>
			<tbody>

	<tr class="row2">
		<td class="align-left">
			<strong class="week">This Week</strong>
		</td>
		<td class="align-center"><?php echo $team_row['weekGames']; ?></td>
		<td class="align-center arenateam-gameswonlost">
			<span class="arenateam-gameswon"><?php echo $team_row['weekWins']; ?></span> &#8211; <span class="arenateam-gameslost"><?php echo $team_row['weekGames'] - $team_row['weekWins']; ?></span>
			<span class="arenateam-percent">(<?php echo round($team_row['weekWins'] * 100 / $team_row['weekGames'], 1); ?>%)</span>
		</td>
		<td class="align-center">
				<span class="arenateam-rating"><?php echo $team_row['rating']; ?></span>
		</td>
	</tr>
	<tr class="row1">
		<td class="align-left">
			<strong class="season">Season</strong>
		</td>
		<td class="align-center"><?php echo $team_row['seasonGames']; ?></td>
		<td class="align-center arenateam-gameswonlost">
			<span class="arenateam-gameswon"><?php echo $team_row['seasonWins']; ?></span> &#8211; <span class="arenateam-gameslost"><?php echo $team_row['seasonGames'] - $team_row['seasonWins']; ?></span>
			<span class="arenateam-percent">(<?php echo round($team_row['seasonWins'] * 100 / $team_row['seasonGames'], 1); ?>%)</span>
		</td>
		<td class="align-center">
				<span class="arenateam-rating"><?php echo $team_row['rating']; ?></span>
		</td>
	</tr>
	</tbody>
		</table>
	</div>
</div>

	<div class="summary-roster">
		<div class="ui-dropdown" id="filter-timeframe">
			<select>
				<option value="season">Season</option>
				<option value="weekly">Weekly</option>
			</select>
		</div>
	<h3 class="category "><b>Roster</b></h3>
	<div class="arenateam-roster table" id="arena-roster">
		<table>
			<thead>
				<tr>
					<th><a href="javascript:;" class="sort-link">
						<span class="arrow">Name</span></a></th>
					<th style="display: none" class="align-center season">	<a href="javascript:;" class="sort-link numeric">
						<span class="arrow">Season Played</span></a></th>
					<th style="display: none" class="align-center season">	<a href="javascript:;" class="sort-link numeric">
						<span class="arrow">Season Win – Loss</span></a></th>
					<th class="align-center weekly">	<a href="javascript:;" class="sort-link numeric">
						<span class="arrow">Played</span></a></th>
					<th class="align-center weekly">	<a href="javascript:;" class="sort-link numeric">
						<span class="arrow">Win – Loss</span></a></th>
					<th class="align-center">	<a href="javascript:;" class="sort-link numeric">
						<span class="arrow">Rating</span></a></th>
				</tr>
			</thead>
			<tbody>
			<?php
			// Team member list
			$sql_members = mysql_query("SELECT * FROM arena_team_member WHERE arenaTeamId = $teamId") or die(mysql_error());
			$i = 1;
			while ($member_row = mysql_fetch_assoc($sql_members))
			{
				$guid = $member_row['guid'];
				$sql_pg_member = mysql_query("SELECT * FROM characters WHERE guid = $guid") or die(mysql_error());
				if (mysql_num_rows($sql_pg_member) > 0)
				{
					$pg_member_rows = mysql_fetch_array($sql_pg_member);
					$seasonLost = $member_row['seasonGames'] - $member_row['seasonWins'];
					$weekLost = $member_row['weekGames'] - $member_row['weekWins'];
					echo '<tr class="row'.$i.'">
						<td data-raw="'.$pg_member_rows['name'].'" style="width: 40%">
					    <a href="" rel="np"> 
						<span class="character-talents">
						<span class="icon">
						  
						<span class="icon-frame frame-12 ">
							<img src="wow/static/images/icons/talents/DK_Bpresence.jpg" alt="" width="12" height="12" />
						</span>		
						</span>	

						<span class="points">33<ins>/</ins>3<ins>/</ins>5</span>
						<span class="clear"><!-- --></span>
						</span>
						</a>	

						<a href="advanced.php?name='.$pg_member_rows['name'].'" class="color-c'.$pg_member_rows['class'].'" rel="allow">
						
						<span class="icon-frame frame-14 ">
							<img src="wow/static/images/icons/race/'.$pg_member_rows['race'].'-'.$pg_member_rows['gender'].'.gif" alt="" width="14" height="14" />
						</span>
						
						<span class="icon-frame frame-14 ">
							<img src="wow/static/images/icons/class/'.$pg_member_rows['class'].'.gif" alt="" width="14" height="14" />
						</span>
						
						'.$pg_member_rows['name'].'
						</a>	

						<span class="leader" data-tooltip="Team Leader"></span>
						</td>
						<td class="align-center season">
							'.$member_row['seasonGames'].'
							<span class="arenateam-percent">('.round($member_row['seasonGames'] * 100 / $team_row['seasonGames'], 1).'%)</span>
						</td>
						<td class="align-center season arenateam-gameswonlost" data-raw="46">
							<span class="arenateam-gameswon">'.$member_row['seasonWins'].'</span> &#8211;
							<span class="arenateam-gameslost">'.$seasonLost.'</span>

							<span class="arenateam-percent">('.round($member_row['seasonWins'] * 100 / $member_row['seasonGames'], 1).'%)</span>
						</td>

						<td class="align-center weekly" style="display: none">
							'.$member_row['weekGames'].'

							<span class="arenateam-percent">('.round($member_row['weekGames'] * 100 / $team_row['weekGames'], 1).'%)</span>
						</td>
						
						<td class="align-center weekly arenateam-gameswonlost" data-raw="0" style="display: none">
							<span class="arenateam-gameswon">'.$member_row['weekWins'].'</span> &#8211;
							<span class="arenateam-gameslost">'.$weekLost.'</span>

							<span class="arenateam-percent">('.round($member_row['weekWins'] * 100 / $member_row['weekGames'], 1).'%)</span>
						</td>
						
						<td class="align-center"><span class="arenateam-rating">'.$member_row['personalRating'].'</span>
						</td>
					</tr>';		
					$i++;						
				}
			}
			?>
			</tbody>
		</table>
	</div>

        <script type="text/javascript">
        //<![CDATA[
		$(document).ready(function() {
			new Table('#arena-roster', { column: 3, method: 'numeric', type: 'desc' });
		});
        //]]>
        </script>
					</div>

			</div>
		</div>

        <script type="text/javascript">
        //<![CDATA[
			$(function() {
				$('.ui-dropdown').dropdown({
					callback: function(dropdown, value) {
						Arena.swapStats('#arena-roster', value, dropdown);
					}
				});
			});
        //]]>
        </script>

		</div>

	<span class="clear"><!-- --></span>
	</div>

        <script type="text/javascript">
        //<![CDATA[
		$(function() {
			Profile.url = '/wow/en/arena/hellscream/2v2/Fishing%20Trail/summary';
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
</div>
<?php include("footer.php") ?>
<script src="wow/static/local-common/js/search.js?"></script>
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
Core.load("wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js?");
Core.load("wow/static/local-common/js/login.js?", false, function() {
Login.embeddedUrl = '<?php echo BASE_URL ?>loginframe.php';
});
//]]>
</script>
<script src="wow/static/local-common/js/menu.js?"></script>
<script src="wow/static/js/wow.js?"></script>
<script type="text/javascript">
//<![CDATA[
$(function() {
Menu.initialize('/data/menu.json');
Search.initialize('/ta/lookup');
});
//]]>
</script>
<script src="wow/static/js/profile.js?"></script>
<script src="wow/static/local-common/js/table.js?"></script>
<script src="wow/static/js/character/arena-flag.js?"></script>
<script type="text/javascript" src="wow/static/local-common/js/dropdown.js?"></script>
<script type="text/javascript" src="wow/static/js/armory/pvp/arena.js?"></script>
<!--[if lt IE 8]> <script type="text/javascript" src="/wow/static/local-common/js/third-party/jquery.pngFix.pack.js?"></script>
<script type="text/javascript">
//<![CDATA[
$('.png-fix').pngFix(); //]]>
</script>
<![endif]-->
</body>
</html>
