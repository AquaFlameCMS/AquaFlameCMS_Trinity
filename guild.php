<?php
require_once("configs.php");
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
 <html lang="en-gb">
<html>
<head>
<title>GUILD @ REALM - <?php echo TITLE ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="description" content="<?php echo DESCRIPTION ?>">
<meta name="keywords" content="<?php echo KEYWORDS ?>">
<link rel="shortcut icon" href="wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/en-gb/data/opensearch" title="Battle.net Search" />
<link rel="stylesheet" href="wow/static/local-common/css/common.css" />
<link title="World of Warcraft - News" href="http://eu.battle.net/wow/en/feed/news" type="application/atom+xml" rel="alternate"/>
<link rel="stylesheet" href="wow/static/css/wow.css" />
<link rel="stylesheet" href="wow/static/css/armory/profile.css" />
<link rel="stylesheet" href="wow/static/css/guild/guild.css" />
<link rel="stylesheet" href="wow/static/css/guild/summary.css" />
<script src="wow/static/local-common/js/third-party/jquery6cc4.js"></script>
<script src="wow/static/local-common/js/core6cc4.js"></script>
<script src="wow/static/local-common/js/tooltip6cc4.js"></script>
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
Flash.ratingImage = '../../../../../../eu.media.blizzard.com/global-video-player/ratings/wow/rating-pegi.jpg';
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
<?php
include("header.php");
?>
<div id="content">
<div class="content-top">
<div class="content-trail">
<ol class="ui-breadcrumb">
<li>
<a href="index.php" rel="np"><?php echo TITLE ?></a>
<span class="breadcrumb-arrow"></span>
</li>
<li><a href="services.php" rel="np">Services</a><span class="breadcrumb-arrow"></span></li>
<li><a href="search.php" rel="np">Search</a><span class="breadcrumb-arrow"></span></li>
<li class="last children"><a href="guild.php" rel="np">GUILD @ REALM</a></a>
</li>
</ol>
</div>
<div class="content-bot">


	<div id="profile-wrapper" class="profile-wrapper profile-wrapper">

		<div class="profile-sidebar-anchor">
		<div class="profile-sidebar-outer">
		<div class="profile-sidebar-inner">
		<div class="profile-sidebar-contents">
		<div class="profile-info-anchor profile-guild-info-anchor">
		<div class="guild-tabard">
		<img src="wow/static/images/guild/tabards/default-alliance.png" alt="" width="269" height="289" />
		</div>

			<div class="profile-info profile-guild-info">
				<div class="name"><a href="index.html">Immortals</a></div>
				<div class="under-name">
					Level <span class="level"><strong>25</strong></span> <span class="faction">Alliance</span> Guild<span class="comma">,</span>
					<span class="realm tip" id="profile-info-realm" data-battlegroup="Blackout">
						Aggramar
					</span>.
					<span class="members">104 members</span>
				</div>

				<div class="achievements"><a href="achievementhtml.html">650</a></div>
			</div>
		</div>



	<ul class="profile-sidebar-menu" id="profile-sidebar-menu">










			<li class=" active">

		<a href="index.html" class="" rel="np">
			<span class="arrow"><span class="icon">
				Summary
			</span></span>
		</a>

			</li>





			<li class="">

		<a href="rosterhtml.html" class="" rel="np">
			<span class="arrow"><span class="icon">
				Roster
			</span></span>
		</a>

			</li>





			<li class="">

		<a href="newshtml.html" class="" rel="np">
			<span class="arrow"><span class="icon">
				News
			</span></span>
		</a>

			</li>





			<li class=" disabled">

		<a href="javascript:;" class=" vault" rel="np">
			<span class="arrow"><span class="icon">
				Events
			</span></span>
		</a>

			</li>





			<li class="">

		<a href="achievementhtml.html" class=" has-submenu" rel="np">
			<span class="arrow"><span class="icon">
				Achievements
			</span></span>
		</a>

			</li>





			<li class="">

		<a href="perkhtml.html" class="" rel="np">
			<span class="arrow"><span class="icon">
				Perks
			</span></span>
		</a>

			</li>





			<li class=" disabled">

		<a href="javascript:;" class=" vault" rel="np">
			<span class="arrow"><span class="icon">
				Rewards
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

				<div class="summary-right">


	<div class="summary-simple-list summary-perks">
	<h3 class="category ">			Perks
</h3>
	
		<div class="profile-box-simple">

			<ul>

























						<li>

							<a href="perkhtml.html#p24">

								<span class="icon-wrapper">




		<span  class="icon-frame frame-36 " style='background-image: url("../../../../../../eu.media.blizzard.com/wow/icons/36/achievement_guildperk_massresurrection.jpg");'>
		</span>
									<span class="symbol"></span>
								</span>
								<div class="text">
									<strong>Mass Resurrection </strong>
									<span class="desc" title="Brings all dead party and raid members back to life with 35% health and 35% mana.  A player may only be resurrected by this spell once every 10 minutes.  Cannot be cast in combat or while in a battleground or arena.">Brings all dead party and raid members back to life with 35% health and 35%…</span>
								</div>

								<span class="type">Level 25</span>
	<span class="clear"><!-- --></span>

							</a>
						</li>
			</ul>

	<div class="profile-linktomore">
		<a href="perkhtml.html" rel="np">All perks</a>
	</div>

	<span class="clear"><!-- --></span>
		</div>
	</div>


	<div class="summary-weekly-contributors">
	<h3 class="category ">			Top Weekly Contributors
</h3>

		<div class="profile-box-simple">


	<div id="roster" class="table">
		<table>
			<thead>
				<tr>
						<th class="position">
									<span class="sort-tab">#</span>
						</th>
						<th class="name align-center">
									<span class="sort-tab">Name</span>
						</th>
						<th class="cls align-center">
									<span class="sort-tab">Class</span>
						</th>
						<th class="lvl align-center">
									<span class="sort-tab">Level</span>
						</th>
						<th class="weekly align-center">
									<span class="sort-tab">Weekly</span>
						</th>
				</tr>
			</thead>
			<tbody>


						<tr class="row1" data-level="85">
							<td class="rank">1</td>
							<td class="name">
								<a href="http://eu.battle.net/wow/en/character/aggramar/Voidrager/" class="color-c7">Voidrager</a>
							</td>
							<td class="cls">




		<span class="icon-frame frame-14 " data-tooltip="Shaman">
			<img src="../../../../../../eu.media.blizzard.com/wow/icons/18/class_7.jpg" alt="" width="14" height="14" />
		</span>
							</td>
							<td class="lvl">85</td>
							<td class="weekly">1444440</td>
						</tr>


						<tr class="row2" data-level="85">
							<td class="rank">2</td>
							<td class="name">
								<a href="http://eu.battle.net/wow/en/character/aggramar/Voidscream/" class="color-c6">Voidscream</a>
							</td>
							<td class="cls">




		<span class="icon-frame frame-14 " data-tooltip="Death Knight">
			<img src="../../../../../../eu.media.blizzard.com/wow/icons/18/class_6.jpg" alt="" width="14" height="14" />
		</span>
							</td>
							<td class="lvl">85</td>
							<td class="weekly">1262216</td>
						</tr>


						<tr class="row1" data-level="85">
							<td class="rank">3</td>
							<td class="name">
								<a href="http://eu.battle.net/wow/en/character/aggramar/Pyroline/" class="color-c4">Pyroline</a>
							</td>
							<td class="cls">




		<span class="icon-frame frame-14 " data-tooltip="Rogue">
			<img src="../../../../../../eu.media.blizzard.com/wow/icons/18/class_4.jpg" alt="" width="14" height="14" />
		</span>
							</td>
							<td class="lvl">85</td>
							<td class="weekly">1210164</td>
						</tr>


						<tr class="row2" data-level="85">
							<td class="rank">4</td>
							<td class="name">
								<a href="http://eu.battle.net/wow/en/character/aggramar/Qloyo/" class="color-c11">Qloyo</a>
							</td>
							<td class="cls">




		<span class="icon-frame frame-14 " data-tooltip="Druid">
			<img src="../../../../../../eu.media.blizzard.com/wow/icons/18/class_11.jpg" alt="" width="14" height="14" />
		</span>
							</td>
							<td class="lvl">85</td>
							<td class="weekly">785088</td>
						</tr>


						<tr class="row1" data-level="85">
							<td class="rank">5</td>
							<td class="name">
								<a href="http://eu.battle.net/wow/en/character/aggramar/Zimbee/" class="color-c4">Zimbee</a>
							</td>
							<td class="cls">




		<span class="icon-frame frame-14 " data-tooltip="Rogue">
			<img src="../../../../../../eu.media.blizzard.com/wow/icons/18/class_4.jpg" alt="" width="14" height="14" />
		</span>
							</td>
							<td class="lvl">85</td>
							<td class="weekly">763400</td>
						</tr>
			</tbody>
		</table>
	</div>



	<div class="profile-linktomore">
		<a href="rostera0d4html.html?view=guildActivity" rel="np">All contributions</a>
	</div>

	<span class="clear"><!-- --></span>

				
		</div>
	</div>
	
					
				</div>

				<div class="summary-left">





	<div class="summary-activity">
	<h3 class="category ">			Recent News
</h3>
	
		<div class="profile-box-simple">


					<ul class="activity-feed">
<!-- ONLY 11 ROWS MUST BE HERE! KEEP IT CLEAN! -->
<!-- ONLY 11 ROWS MUST BE HERE! KEEP IT CLEAN! -->
<!-- ONLY 11 ROWS MUST BE HERE! KEEP IT CLEAN! -->
	<li data-id="18545519" class="item-looted first">
		<dl>
			<dd>
	<a href="http://eu.battle.net/wow/en/item/69579" class="color-q4">



		<span  class="icon-frame frame-18 " style='background-image: url("../../../../../../eu.media.blizzard.com/wow/icons/18/inv_helmet_112.jpg");'>
		</span>
</a>

	<a href="http://eu.battle.net/wow/en/character/aggramar/Voidscream/">Voidscream</a> obtained <a href="http://eu.battle.net/wow/en/item/69579" class="color-q4">Amani Headdress</a>.

</dd>
			<dt>2 days ago</dt>
		</dl>
	</li>


	<li data-id="18543633" class="item-purchased">
		<dl>
			<dd>

	<a href="http://eu.battle.net/wow/en/item/71061" class="color-q4">



		<span  class="icon-frame frame-18 " style='background-image: url("../../../../../../eu.media.blizzard.com/wow/icons/18/inv_pant_plate_raiddeathknight_j_01.jpg");'>
		</span>
</a>
	
	<a href="http://eu.battle.net/wow/en/character/aggramar/Voidscream/">Voidscream</a> purchased item <a href="http://eu.battle.net/wow/en/item/71061" class="color-q4">Elementium Deathplate Greaves</a>.

</dd>
			<dt>2 days ago</dt>
		</dl>
	</li>


	<li data-id="18541159" class="item-looted">
		<dl>
			<dd>
	<a href="http://eu.battle.net/wow/en/item/69592" class="color-q4">



		<span  class="icon-frame frame-18 " style='background-image: url("../../../../../../eu.media.blizzard.com/wow/icons/18/inv_axe_85.jpg");'>
		</span>
</a>

	<a href="http://eu.battle.net/wow/en/character/aggramar/Voidscream/">Voidscream</a> obtained <a href="http://eu.battle.net/wow/en/item/69592" class="color-q4">Reforged Trollbane</a>.

</dd>
			<dt>2 days ago</dt>
		</dl>
	</li>


	<li data-id="18540541" class="item-looted">
		<dl>
			<dd>
	<a href="http://eu.battle.net/wow/en/item/71059" class="color-q4">



		<span  class="icon-frame frame-18 " style='background-image: url("../../../../../../eu.media.blizzard.com/wow/icons/18/inv_glove_plate_raiddeathknight_j_01.jpg");'>
		</span>
</a>

	<a href="http://eu.battle.net/wow/en/character/aggramar/Arkhangelsk/">Arkhangelsk</a> obtained <a href="http://eu.battle.net/wow/en/item/71059" class="color-q4">Elementium Deathplate Gauntlets</a>.

</dd>
			<dt>2 days ago</dt>
		</dl>
	</li>


	<li data-id="18536280" class="item-looted">
		<dl>
			<dd>
	<a href="http://eu.battle.net/wow/en/item/69604" class="color-q4">



		<span  class="icon-frame frame-18 " style='background-image: url("../../../../../../eu.media.blizzard.com/wow/icons/18/inv_belt_50.jpg");'>
		</span>
</a>

	<a href="http://eu.battle.net/wow/en/character/aggramar/Voidscream/">Voidscream</a> obtained <a href="http://eu.battle.net/wow/en/item/69604" class="color-q4">Coils of Hate</a>.

</dd>
			<dt>2 days ago</dt>
		</dl>
	</li>


	<li data-id="18508011" class="player-ach">
		<dl>
			<dd>
	<a href="http://eu.battle.net/wow/en/character/aggramar/Voidscream/achievement#201:a5794" rel="np" data-achievement="5794">



		<span  class="icon-frame frame-18 " style='background-image: url("../../../../../../eu.media.blizzard.com/wow/icons/18/inv_epicguildtabard.jpg");'>
		</span>
</a>

	<a href="http://eu.battle.net/wow/en/character/aggramar/Voidscream/">Voidscream</a> earned the achievement <a href="http://eu.battle.net/wow/en/character/aggramar/Voidscream/achievement#201:a5794" rel="np" data-achievement="5794">Time Flies When You&#39;re Having Fun</a> for 0 points.
</dd>
			<dt>2 days ago</dt>
		</dl>
	</li>


	<li data-id="18494265" class="item-looted">
		<dl>
			<dd>
	<a href="http://eu.battle.net/wow/en/item/69620" class="color-q4">



		<span  class="icon-frame frame-18 " style='background-image: url("../../../../../../eu.media.blizzard.com/wow/icons/18/inv_sword_55.jpg");'>
		</span>
</a>

	<a href="http://eu.battle.net/wow/en/character/aggramar/Zimbee/">Zimbee</a> obtained <a href="http://eu.battle.net/wow/en/item/69620" class="color-q4">Twinblade of the Hakkari</a>.

</dd>
			<dt>3 days ago</dt>
		</dl>
	</li>


	<li data-id="18492776" class="item-purchased">
		<dl>
			<dd>

	<a href="http://eu.battle.net/wow/en/item/58482" class="color-q4">



		<span  class="icon-frame frame-18 " style='background-image: url("../../../../../../eu.media.blizzard.com/wow/icons/18/inv_boot_leatherraidrogue_i_01.jpg");'>
		</span>
</a>
	
	<a href="http://eu.battle.net/wow/en/character/aggramar/Zimbee/">Zimbee</a> purchased item <a href="http://eu.battle.net/wow/en/item/58482" class="color-q4">Treads of Fleeting Joy</a>.

</dd>
			<dt>3 days ago</dt>
		</dl>
	</li>


	<li data-id="18484121" class="item-looted">
		<dl>
			<dd>
	<a href="http://eu.battle.net/wow/en/item/69624" class="color-q4">



		<span  class="icon-frame frame-18 " style='background-image: url("../../../../../../eu.media.blizzard.com/wow/icons/18/inv_staff_35.jpg");'>
		</span>
</a>

	<a href="http://eu.battle.net/wow/en/character/aggramar/Zimbee/">Zimbee</a> obtained <a href="http://eu.battle.net/wow/en/item/69624" class="color-q4">Legacy of Arlokk</a>.

</dd>
			<dt>3 days ago</dt>
		</dl>
	</li>


	<li data-id="18482665" class="item-looted">
		<dl>
			<dd>
	<a href="http://eu.battle.net/wow/en/item/69615" class="color-q4">



		<span  class="icon-frame frame-18 " style='background-image: url("../../../../../../eu.media.blizzard.com/wow/icons/18/inv_pants_leather_35.jpg");'>
		</span>
</a>

	<a href="http://eu.battle.net/wow/en/character/aggramar/Zimbee/">Zimbee</a> obtained <a href="http://eu.battle.net/wow/en/item/69615" class="color-q4">Zombie Walker Legguards</a>.

</dd>
			<dt>3 days ago</dt>
		</dl>
	</li>


	<li data-id="18480481" class="item-looted">
		<dl>
			<dd>
	<a href="http://eu.battle.net/wow/en/item/69607" class="color-q4">



		<span  class="icon-frame frame-18 " style='background-image: url("../../../../../../eu.media.blizzard.com/wow/icons/18/inv_offhand_stratholme_a_02.jpg");'>
		</span>
</a>

	<a href="http://eu.battle.net/wow/en/character/aggramar/Zimbee/">Zimbee</a> obtained <a href="http://eu.battle.net/wow/en/item/69607" class="color-q4">Touch of Discord</a>.

</dd>
			<dt>3 days ago</dt>
		</dl>
	</li>
</ul>
	<div class="profile-linktomore">
		<a href="newshtml.html" rel="np">All news</a>
	</div>
	<!-- ONLY 11 ROWS MUST BE HERE! KEEP IT CLEAN! -->

	<span class="clear"><!-- --></span>



		</div>
	</div>

					
				</div>

	<span class="clear"><!-- --></span>
			</div>
		</div>

		</div>

	<span class="clear"><!-- --></span>
	</div>

        <script type="text/javascript">
        //<![CDATA[
		$(function() {
			Profile.url = '/wow/en/guild/aggramar/Immortals/summary';
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
<?php include("footer.php"); ?>
<script type="text/javascript" src="wow/static/local-common/js/search6cc4.js"></script>
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
Core.load("wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min6cc4.js");
Core.load("wow/static/local-common/js/login6cc4.js", false, function() {
Login.embeddedUrl = '<?php echo BASE_URL ?>loginframe.php';
});
//]]>
</script>
<script src="wow/static/local-common/js/menu6cc4.js"></script>
<script src="wow/static/js/wow2e13.js"></script>
<script type="text/javascript">
//<![CDATA[
$(function() {
Menu.initialize('/data/menu.json');
Search.initialize('/ta/lookup');
});
//]]>
</script>
<script src="wow/static/js/profile2e13.js"></script>
<script src="wow/static/js/character/guild-tabard2e13.js"></script>
<!--[if lt IE 8]> <script type="text/javascript" src="/wow/static/local-common/js/third-party/jquery.pngFix.pack.js"></script>
<script type="text/javascript">
//<![CDATA[
$('.png-fix').pngFix(); //]]>
</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
(function() {
var ga = document.createElement('script');
var src = "../../../../../../ssl.google-analytics.com/ga.js";
if ('http:' == document.location.protocol) {
src = "../../../../../../www.google-analytics.com/ga.js";
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
</body>

<!-- Mirrored from eu.battle.net/wow/en/guild/aggramar/Immortals/ by HTTrack Website Copier/3.x [XR&CO'2010], Sun, 20 Nov 2011 08:22:14 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8"><!-- /Added by HTTrack -->
</html>