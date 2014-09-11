<?php
include("../configs.php");
$page_cat = "security";
if (!isset($_SESSION['username'])) {
        header('Location: '.BASE_URL.'account_log.php');		
}
?>

<!doctype html>
<html lang="en-gb">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<title><?php echo $BanL['BanL11']; ?> - <?php echo TITLE ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="description" content="<?php echo DESCRIPTION ?>">
<meta name="keywords" content="<?php echo KEYWORDS ?>">
<link rel="shortcut icon" href="<?php echo BASE_URL ?>wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/local-common/css/common.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/bnet.css" />
<link rel="stylesheet" media="print" href="<?php echo BASE_URL ?>wow/static/css/bnet-print.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/management/order-history.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/management/services.css" />
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/core.js?v22"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/tooltip.js?v22"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
Core.staticUrl = '/account';
Core.sharedStaticUrl= 'wow/static/local-common';
Core.baseUrl = '/account';
Core.projectUrl = '/account';
Core.cdnUrl = 'http://eu.media.blizzard.com';
Core.supportUrl = 'http://eu.battle.net/support/';
Core.secureSupportUrl= 'https://eu.battle.net/support/';
Core.project = 'bam';
Core.locale = 'en-us';
Core.language = 'en';
Core.buildRegion = 'eu';
Core.region = 'eu';
Core.shortDateFormat= 'MM/dd/yyyy';
Core.dateTimeFormat = 'MM/dd/yyyy hh:mm a';
Core.loggedIn = true;
Flash.videoPlayer = 'http://eu.media.blizzard.com/global-video-player/themes/bam/video-player.swf';
Flash.videoBase = 'http://eu.media.blizzard.com/bam/media/videos';
Flash.ratingImage = 'http://eu.media.blizzard.com/global-video-player/ratings/bam/rating-en-us.jpg';
Flash.expressInstall= 'http://eu.media.blizzard.com/global-video-player/expressInstall.swf';
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-544112-16']);
_gaq.push(['_setDomainName', '.blizzard.net']);
_gaq.push(['_trackPageview']);
_gaq.push(['_trackPageLoadTime']);
//]]>
</script>
</head>
<body class="en-us logged-in">
        <div id="layout-top">
<div class="wrapper">
<div id="header">
<?php include("../functions/header_account.php"); ?>
<?php include("../functions/footer_man_nav.php"); ?>
</div>
<div id="layout-middle">
<div class="wrapper">
<div id="content">
<div id="page-header">
<h2 class="subcategory"><?php echo $BanL['BanL7']; ?></h2>
<h3 class="headline"><?php echo $BanL['BanL8']; ?></h3>
</div>
<div id="page-content" class="page-content">
<div class="service-wrapper">
    <p class="service-nav">
            <a href="ban-list.php" class="active"><?php echo $BanL['BanL7']; ?></a>
    </p>
	</div>
	<br>

<?php
$con = mysql_connect("$serveraddress", "$serveruser", "$serverpass", "$server_adb") or die(mysql_error());
        mysql_select_db("$server_adb", $con) or die("Error Cant Connect".mysql_error());
        $query = "SELECT * FROM account_banned WHERE active != '0'";

		$response=mysql_query($query);

$numrows = mysql_num_rows($response);
if($numrows > 0)
{
echo '
<span class="clear"></span>
		<table id="order-history">
			<thead>
				<tr>
					<th align="center"><a href="#" class="sort-link numeric"><span class="arrow">'.$BanL['BanL9'].'</span></a></th>
					<th align="center"><a href="#" class="sort-link numeric"><span class="arrow">'.$BanL['BanL1'].'</span></a></th>
					<th align="center"><span class="arrow">'.$BanL['BanL2'].'</span></th>
					<th align="center"><span class="arrow">'.$BanL['BanL3'].'</span></th>
					<th align="center"><span class="arrow">'.$BanL['BanL4'].'</span></th>
					</tr>
				</thead>';
while($raw = mysql_fetch_array($response)) {
    if($raw['active'] == "1") {
        $bantime = "Permanent";
		$unban= "Never";
		
    }
    else {
        $bantime =  date("Y-m-d H:i:s", $raw['bandate']);
		$unban = date("Y-m-d H:i:s", $raw['bandate']);
    }

echo '
<tbody>
<tr class="parent-row">
<td valign="top" class="align-center" data-raw="20"><a href="">'.$raw['id'].'</a></span></td>
<td valign="top" class="align-center" data-raw="20"><a href="">'.$raw['bannedby'].'</a></td>
<td valign="top" class="align-center" data-raw="20"><span>'.$unban.'</time></span></td>
<td valign="top" class="align-center" data-raw="20"><strong data-service-id="null">'.$bantime.'</strong></td>
<td valign="top" class="align-center">'.$raw['banreason'].'</td>
</tbody>';
}
echo '</tr>';
echo"</table><br />";
}
else
{
echo "<b>".$BanL['BanL10']."</b>";
}
?>
<script type="text/javascript">
//<![CDATA[
$(function() {
var times = new DateTime(false);
$('#region-dropdown2').dropdown({
callback: function(dropdown, selected) {
var test = $("#view-dropdown2").find("select option:selected").val();
location.href = 'orders.html?rId='+ selected;
},
updateText: false
});
$('#view-dropdown2').dropdown({
callback: function(dropdown, selected) {
if(selected == "1"){selected = '';}
switch (selected) {
case "2":
selected = "chargeback";
break;
}
orderTable.filter('class', 'class', selected);
},
updateText: true
});
var orderTable = new Table('#order-history');
$('#order-history tr').hover(
function() {
var activeRow = $(this);
activeRow.addClass('row-hover');
activeRow.nextUntil('.parent-row').addClass('row-hover');
if (activeRow.hasClass('child-row')) {
activeRow.prevUntil('.parent-row').addClass('row-hover');
activeRow.prevAll('.parent-row').eq(0).addClass('row-hover');
}
},
function() {
$('#order-history tr').removeClass('row-hover');
}
);
});
//]]>
</script>
</div>
</div>
</div>
</div>
<div id="layout-bottom">
<?php include("../functions/footer_man.php"); ?>
</div>
<script type="text/javascript">
//<![CDATA[
var xsToken = '1719af93-c8ae-4514-b0ba-68fbf28147b5';
var Msg = {
support: {
ticketNew: 'Ticket {0} was created.',
ticketStatus: 'Ticket {0}’s status changed to {1}.',
ticketOpen: 'Open',
ticketAnswered: 'Answered',
ticketResolved: 'Resolved',
ticketCanceled: 'Canceled',
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
<script src="<?php echo BASE_URL ?>wow/static/js/bam.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/tooltip.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/menu.js"></script>
<script type="text/javascript">
$(function() {
Menu.initialize();
Menu.config.colWidth = 190;
Locale.dataPath = 'data/i18n.frag.xml';
});
</script>
<!--[if lt IE 8]>
<script type="text/javascript" src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery.pngFix.pack.js"></script>
<script type="text/javascript">$('.png-fix').pngFix();</script>
<![endif]-->
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/dropdown.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/table.js"></script>
<script type="text/javascript">
//<![CDATA[
Core.load("wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js");
Core.load("wow/static/local-common/js/search.js");
Core.load("wow/static/local-common/js/login.js", false, function() {
if (typeof Login !== 'undefined') {
Login.embeddedUrl = '<?php echo BASE_URL ?>loginframe.php';
}
});
//]]>
</script>
<!--[if lt IE 8]> <script type="text/javascript" src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery.pngFix.pack.js"></script>
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
</body>
</html>
