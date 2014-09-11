<?php
include("../configs.php");
$page_cat = 'gamesncodes';
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
        header('Location: '.BASE_URL.'account_log.php');		
}
?>

<!DOCTYPE html>
<html lang="en-gb">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<title><?php echo TITLE ?><?php echo $donar['1']; ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="description" content="<?php echo DESCRIPTION ?>">
<meta name="keywords" content="<?php echo KEYWORDS ?>">
<link rel="shortcut icon" href="<?php echo BASE_URL ?>wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/local-common/css/common.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/bnet.css" />
<link rel="stylesheet" media="print" href="<?php echo BASE_URL ?>wow/static/css/bnet-print.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/management/get-game.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/management/get-game-ie8.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/management/dashboard.css" />
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/core.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/tooltip.js"></script>

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
     <!--[if lte IE 7]>  <style type="text/css">
    .raf-step3-arrow { position:relative; width:176px; height:61px; background:url('wow/static/images/services/wow/raf/step_3_arrow_b.png') 0 0 no-repeat!important; top:-540px; left:105px; }
    .raf-step5-arrow { position:relative; width:155px; height:57px; background:url('wow/static/images/services/wow/raf/step_5_arrow_b.png') 0 0 no-repeat!important; top:-163px; left:150px; }
     </style>  <![endif]-->
	<div class="dashboard service">
			<div class="header">
				<h2 class="subcategory"><?php echo $donar['2']; ?></h2>
				<h3 class="headline"><?php echo $donar['3']; ?></h3>
				<a href=""><img src="<?php echo BASE_URL ?>wow/static/local-common/images/game-icons/wow.png" alt="World of Warcraft" width="48" height="48" /></a>
			</div>
        </div>
    </div>
		<div id="page-content" class="page-content">
			<div class="digital-games" id="digital-games">
				<div class="data-grid-container">
					<div class="data-grid-row">
						<span class="data-grid-member data-grid-member-first " id="SMS">
						<span class="data-grid-member-contents">
						<span class="product-thumbnail glow-shadow border-3">
						<a href="<?php echo BASE_URL ?>account/sms"><img src="<?php echo BASE_URL ?>wow/static/local-common/images/donate/sms.png" alt="Donate via SMS" width="115" height="163" />
						</a>
						</span>
						<span class="product-details">
						<span class="product-name"><?php echo $donar['4']; ?></span>
						<span class="product-price">
						<span class="default-price"><?php echo $donar['5']; ?></span>
						</span>
					    </span>
						<span class="product-actions blizzard">
						<a class="ui-button button1" href="<?php echo BASE_URL ?>account/sms.php" tabindex="1">
						<span>
		                <span><?php echo $donar['4']; ?></span>
	                    </span>
	                    </a>
	                    </span>
						</span><!--
						--></span><!--
						--><span class="data-grid-member " id="paypal"><!--
						--><span class="data-grid-member-contents"><!--
						--><span class="product-thumbnail glow-shadow border-3">
						<a href="<?php echo BASE_URL ?>#"><img src="<?php echo BASE_URL ?>wow/static/local-common/images/donate/paypal.png" alt="paypal" width="115" height="163" />
						</a>
						</span><!--
						--><span class="product-details">
						<span class="product-name"><?php echo $donar['6']; ?></span>
						<span class="product-price">
						<span class="default-price"><?php echo $donar['7']; ?></span>
						</span>
						</span><!--
						--><span class="product-actions blizzard">
						<a class="ui-button button1" href="<?php echo BASE_URL ?>#" tabindex="1" >
						<span>
						    <span><?php echo $donar['6']; ?></span>
						</span>
						</a>
						</span><!--
						--></span><!--
						--></span><!--
						--><span class="data-grid-member " id="votashop"><!--
						--><span class="data-grid-member-contents"><!--
						--><span class="product-thumbnail glow-shadow border-3">
						<a href=""><img src="<?php echo BASE_URL ?>wow/static/local-common/images/donate/tienda_votaciones.png" alt="VotaShop" width="115" height="163" />
						</a>
						</span><!--
						--><span class="product-details">
						<span class="product-name"><?php echo $donar['8']; ?></span>
						<span class="product-price">
						<span class="default-price"><?php echo $donar['9']; ?></span>
						</span>
						</span><!--
						--><span class="product-actions blizzard">
						<a class="ui-button button1" href="<?php echo BASE_URL ?>#" tabindex="1" >
						<span>
						<span><?php echo $donar['8']; ?></span>
						</span>
						</a>
						</span><!--
						--></span><!--
						--></span><!--
						--><span class="data-grid-member data-grid-member-last " id="WAR3"><!--
						--><span class="data-grid-member-contents"><!--
						--><span class="product-thumbnail glow-shadow border-3">
						<a href="<?php echo BASE_URL ?>#">
						<img src="<?php echo BASE_URL ?>wow/static/local-common/images/donate/tienda_donaciones.png" alt="Donashop" width="115" height="163" />
						</a>
						</span><!--
						--><span class="product-details">
						<span class="product-name"><?php echo $donar['10']; ?></span>
						<span class="product-price">
						<span class="default-price"><?php echo $donar['11']; ?></span>
						</span>
						</span><!--
						--><span class="product-actions blizzard">
						<a class="ui-button button1" href="<?php echo BASE_URL ?>#" tabindex="1">
						<span>
						    <span><?php echo $donar['10']; ?></span>
						</span>
						</a>
					    </span><!--
				--></span><!--
			--></span><!--
		--></div>
	<center>
		<div class="retail-purchase border-3">
		    <p class="caption"><?php echo $donar['12']; ?><a href="#" tabindex="1" target="_blank"><?php echo TITLE ?> Store</a>.</p>
		</div>
	</center>
</div>
</div>
<br />
<script type="text/javascript">
//<![CDATA[
$(function() {
var digitalGames = new DigitalGames('#digital-games');
});
//]]>
</script>
</div>
</div>
</div>
<div id="layout-bottom">
<?php include("../functions/footer_man.php"); ?>
</div>
</div>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/search.js?v39"></script>
<script type="text/javascript">
//<![CDATA[
var xsToken = '9d875366-e8b3-46e0-a17f-431c939fa3b7';
var supportToken = '';
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
<script type="text/javascript">
//<![CDATA[
Core.load("../wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js?v39");
Core.load("../wow/static/local-common/js/login.js?v39", false, function() {
Login.embeddedUrl = 'https://eu.battle.net/login/login.frag';
});
//]]>
</script>
<script src="<?php echo BASE_URL ?>wow/static/js/bam.js?v26"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/tooltip.js?v39"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/menu.js?v39"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js?v39"></script>
<script type="text/javascript">
$(function() {
Locale.dataPath = 'data/i18n.frag.xml';
});
</script>
<!--[if lt IE 8]>
<script type="text/javascript" src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery.pngFix.pack.js?v39"></script>
<script type="text/javascript">$('.png-fix').pngFix();</script>
<![endif]-->
<script src="<?php echo BASE_URL ?>wow/static/js/management/get-game.js?v26"></script>
<!--[if lt IE 8]> <script type="text/javascript" src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery.pngFix.pack.js?v39"></script>
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