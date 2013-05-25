<?php
require_once("configs.php");
$page_cat = "gamesncodes";
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
        header('Location: account_log.php');		
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-us">
<head>
<title>Vote History - <?php echo $website['title']; ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/en-us/data/opensearch" title="Battle.net Search" />
<link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common.css" />
<!--[if IE]> <link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common-ie.css" />
<![endif]-->
<!--[if IE 6]> <link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common-ie6.css" />
<![endif]-->
<!--[if IE 7]> <link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common-ie7.css" />
<![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="wow/static/css/bnet.css" />
<link rel="stylesheet" type="text/css" media="print" href="wow/static/css/bnet-print.css" />
<link rel="stylesheet" type="text/css" media="all" href="wow/static/css/management/order-history.css" />
<link rel="stylesheet" type="text/css" media="all" href="wow/static/css/management/services.css" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="wow/static/css/management/services-ie6.css" /><![endif]-->
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="wow/static/css/bnet-ie.css" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="wow/static/css/bnet-ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="wow/static/css/bnet-ie7.css" /><![endif]-->
<script type="text/javascript" src="wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script type="text/javascript" src="wow/static/local-common/js/core.js?v22"></script>
<script type="text/javascript" src="wow/static/local-common/js/tooltip.js?v22"></script>
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
<?php include("functions/header_account.php"); ?>
<?php include("functions/footer_man_nav.php"); ?>
</div>
<div id="layout-middle">
<div class="wrapper">
<div id="content">
<div id="page-header">
<h2 class="subcategory"><?php echo $Vote['Vote7']; ?></h2>
<h3 class="headline"><?php echo $Vote['Vote8']; ?></h3>
</div>
<div id="page-content" class="page-content">
<div class="service-wrapper">
    <p class="service-nav">
            <a href=""><?php echo $Vote['Vote2']; ?></a>
            <a href="vote-history.php" class="active"><?php echo $Vote['Vote3']; ?></a>
            <a href=""><?php echo $Vote['Vote4']; ?></a>
            <a href="vote.php"><?php echo $Vote['Vote5']; ?></a>
    </p>
	</div>
	<br>

<?php
    $orderby = "DESC";
    $link = "vote-history.php?date=asc";
    if(isset($_GET['date'])) if($_GET['date'] == "desc"){ $orderby = "DESC"; $link = "vote-history.php?date=asc"; }else{ $orderby = "ASC"; $link = "vote-history.php?date=desc";}
    $sql = mysql_query("SELECT * FROM votes WHERE userid = '".$account_information['id']."' ORDER BY `date` ".$orderby." LIMIT 50") or die(mysql_error());
    $numrows = mysql_num_rows($sql);

    if($numrows > 0){
        echo '
        Vote History<br><br>
        <span class="clear"></span>
        <table id="order-history">
			<thead>
				<tr>
					<th align="center"><span class="arrow">'.$Vote['Vote10'].'</span></th>
					<th align="center"><a href="'.$link.'" class="sort-link numeric"><span class="arrow">'.$Vote['Vote12'].'</span></a></th>
					<th align="center"><span class="arrow">'.$Vote['Vote13'].'</span></th>
					<th align="center"><span class="arrow">Points Earned</span></th>
					<th align="center"><span class="arrow">'.$Vote['Vote16'].'</span></th>
				</tr>
			</thead>
        ';
            
            while($raw = mysql_fetch_array($sql)){
                $vote = mysql_fetch_assoc(mysql_query("SELECT * FROM vote WHERE id = '".$raw['voteid']."'"));
                echo '
                <tbody>
                <tr class="parent-row">
                    <td valign="top" class="align-center" data-raw="20"><span class="icon-frame frame-14 " data-tooltip="'.$account_extra['firstName'].'"><a href="">'.$account_extra['firstName'].'</a></span></td>
                    <td valign="top" class="align-center" data-raw="20"><span><time datetime="2011-07-02T18:25+00:00">'.substr($raw['date'],0,10).'</time></span></td>
                    <td valign="top" class="align-center" data-raw="20"><strong data-service-id="null">'.substr($raw['date'],11,8).'</strong></td>
                    <td valign="top" class="align-center">1 VP Earned</td>
                    <td valign="top" class="align-center" data-raw="20">'.$vote['Name'].'</td>
                </tr>
                </tbody>';
            }
        echo "</table><br />";
   } else echo '<b>'.$Vote['Vote9'].'</b>';
   
   if($numrows > 0){
        echo '
        <span class="clear"></span>
        ';
            
            while($raw = mysql_fetch_array($sql)){
                echo '
                <tbody>
                <tr class="parent-row">
                    <td valign="top" class="align-center" data-raw="20"><span class="icon-frame frame-14 " data-tooltip="'.$account_extra['firstName'].'"><a href="">'.$account_extra['id'].'</a></span></td>
                    <td valign="top" class="align-center" data-raw="20"><a href="http://www.wowhead.com/item='.$raw['ItemID_took'].'">'.$raw['ItemID_took'].'</a></td>
                    <td valign="top" class="align-center" data-raw="20"><span><time datetime="2011-07-02T18:25+00:00">'.$raw['Vote_Date'].'</time></span></td>
                    <td valign="top" class="align-center" data-raw="20"><strong data-service-id="null">'.$raw['Vote_Hour'].'</strong></td>
                    <td valign="top" class="align-center">'.$raw['Costs'].' VP</td>
                    <td valign="top" class="align-center">'.$raw['Points'].'</td>
                    <td valign="top" class="align-center" data-raw="20">'.$raw['Link'].'</td>
                </tr>
                </tbody>';
            }
        echo "</table><br />";
   } else echo '<b>'.$Vote['Vote9'].'</b>';
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
<?php include("functions/footer_man.php"); ?>
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
<script type="text/javascript" src="wow/static/js/bam.js"></script>
<script type="text/javascript" src="wow/static/local-common/js/tooltip.js"></script>
<script type="text/javascript" src="wow/static/local-common/js/menu.js"></script>
<script type="text/javascript">
$(function() {
Menu.initialize();
Menu.config.colWidth = 190;
Locale.dataPath = 'data/i18n.frag.xml';
});
</script>
<!--[if lt IE 8]>
<script type="text/javascript" src="wow/static/local-common/js/third-party/jquery.pngFix.pack.js"></script>
<script type="text/javascript">$('.png-fix').pngFix();</script>
<![endif]-->
<script type="text/javascript" src="wow/static/local-common/js/dropdown.js"></script>
<script type="text/javascript" src="wow/static/local-common/js/table.js"></script>
<script type="text/javascript">
//<![CDATA[
Core.load("wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js");
Core.load("wow/static/local-common/js/search.js");
Core.load("wow/static/local-common/js/login.js", false, function() {
if (typeof Login !== 'undefined') {
Login.embeddedUrl = '<?php echo $website['root'];?>loginframe.php';
}
});
//]]>
</script>
<!--[if lt IE 8]> <script type="text/javascript" src="wow/static/local-common/js/third-party/jquery.pngFix.pack.js"></script>
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
