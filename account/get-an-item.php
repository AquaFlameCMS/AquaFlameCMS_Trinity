<?php
include("../configs.php");
$page_cat = 'gamesncodes';
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
        header('Location: '.$website['root'].'account_log.php');		
}
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
 <html lang="en-gb">
<title><?php echo $website['title']; ?> - Vote Shop</title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="description" content="<?php echo $website['description']; ?>">
<meta name="keywords" content="<?php echo $website['keywords']; ?>">
<link rel="shortcut icon" href="../wow/static/local-common/images/favicons/bam.ico" type="image/x-icon"/>
<link rel="stylesheet" media="all" href="../wow/static/local-common/css/common.css?v39" />
<link rel="stylesheet" media="all" href="../wow/static/css/bnet.css?v26" />
<link rel="stylesheet" media="print" href="../wow/static/css/bnet-print.css?v26" />
<link rel="stylesheet" media="all" href="../wow/static/css/management/get-game.css?v26" />
<link rel="stylesheet" media="all" href="../wow/static/css/management/get-game-ie8.css?v26" />
<script src="../wow/static/local-common/js/third-party/jquery.js?v39"></script>
<script src="../wow/static/local-common/js/core.js?v39"></script>
<script src="../wow/static/local-common/js/tooltip.js?v39"></script>
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
Flash.ratingImage = 'http://eu.media.blizzard.com/global-video-player/ratings/bam/en-us.jpg';
Flash.expressInstall= 'http://eu.media.blizzard.com/global-video-player/expressInstall.swf';
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-544112-16']);
_gaq.push(['_setDomainName', '.battle.net']);
_gaq.push(['_setAllowLinker', true]);
_gaq.push(['_trackPageview']);
_gaq.push(['_trackPageLoadTime']);
//]]>
</script>
</head>
<body class=" logged-in">
<div id="layout-top">
<div class="wrapper">
<div id="header">
<?php include("../functions/header_account.php"); ?>
<?php include("../functions/footer_man_nav.php"); ?>
</div>
</li>
</ul>
<div id="warnings-wrapper">
<span class="clear"><!-- --></span>
</div>
</div>
</div>
<div id="layout-middle">
<div class="wrapper">
<div id="content">
<div id="page-header" class="page-header">
<div class="columns-2">
<div class="column">
<h2 class="subcategory">Game Management</h2>
<h3 class="headline">Buy Digital Games</h3>
</div>
<div class="column">
<div class="region-selector">
<span class="subcategory">Game Region</span>: WorldWide
</div>
</div>
</div>
</div>
<div id="page-content" class="page-content">
<div class="digital-games" id="digital-games">
<div class="data-grid-container">
<div class="data-grid-row"><!--
--><span class="data-grid-member data-grid-member-first " id="D3"><!--
--><span class="data-grid-member-contents"><!--
--><span class="product-thumbnail glow-shadow border-3">
<a href="../wow/static/management/digital-purchase.html?product=D3&amp;gameRegion=EU">
<img src="../wow/static/images/products/box-art/games/diablo-iii/f61ecd9a-b0da-4fdd-8d0d-bd4c6717f462/default/medium.png?v26" alt="Diablo® III" width="115" height="163" />
</a>
</span><!--
--><span class="product-details">
<span class="product-name">
Diablo® III
</span>
<span class="product-price">
<span class="default-price">59.99 €</span>
</span>
</span><!--
--><span class="product-actions blizzard">
<a
class="ui-button button1 "
href="../wow/static/management/digital-purchase.html?product=D3&amp;gameRegion=EU"
tabindex="1"
>
<span>
<span> Buy Now
</span>
</span>
</a>
</span><!--
--></span><!--
--></span><!--
--><span class="data-grid-member " id="S2"><!--
--><span class="data-grid-member-contents"><!--
--><span class="product-thumbnail glow-shadow border-3">
<a href="../wow/static/management/digital-purchase.html?product=S2&amp;gameRegion=EU">
<img src="../wow/static/images/products/box-art/games/starcraft-ii-wings-of-liberty/1d24d291-c8b1-4218-b5bb-acbe44236cfa/default/medium.png?v26" alt="StarCraft II®: Wings of Liberty" width="115" height="163" />
</a>
</span><!--
--><span class="product-details">
<span class="product-name">
StarCraft II®:<br />Wings of Liberty
</span>
<span class="product-price">
<span class="default-price">39.99 €</span>
</span>
</span><!--
--><span class="product-actions blizzard">
<a
class="ui-button button1 "
href="../wow/static/management/digital-purchase.html?product=S2&amp;gameRegion=EU"
tabindex="1"
>
<span>
<span> Buy Now
</span>
</span>
</a>
<a class="alternate-action" href="../wow/static/download/?show=sc2&amp;starter=sc2" tabindex="1">Play for Free</a>
</span><!--
--></span><!--
--></span><!--
--><span class="data-grid-member " id="WOWC"><!--
--><span class="data-grid-member-contents"><!--
--><span class="product-thumbnail glow-shadow border-3">
<a href="../wow/static/management/digital-purchase.html?product=WOWC&amp;gameRegion=EU">
<img src="../wow/static/images/products/box-art/games/world-of-warcraft-battle-chest/0f6f75d5-5be3-495a-bf0f-ee28016b477e/default/medium.png?v26" alt="World of Warcraft® Battle Chest®" width="115" height="163" />
</a>
</span><!--
--><span class="product-details">
<span class="product-name">
World of Warcraft®<br /> Battle Chest®
</span>
<span class="product-price">
<span class="default-price">14.99 €</span>
</span>
</span><!--
--><span class="product-actions blizzard">
<a
class="ui-button button1 "
href="../wow/static/management/digital-purchase.html?product=WOWC&amp;gameRegion=EU"
tabindex="1"
>
<span>
<span> Buy Now
</span>
</span>
</a>
</span><!--
--></span><!--
--></span><!--
--><span class="data-grid-member data-grid-member-last " id="WAR3"><!--
--><span class="data-grid-member-contents"><!--
--><span class="product-thumbnail glow-shadow border-3">
<a href="../wow/static/management/digital-purchase.html?product=WAR3&amp;gameRegion=EU">
<img src="../wow/static/images/products/box-art/games/warcraft-iii-reign-of-chaos/8b5fed03-0bf8-478c-ba29-205f6ddceb53/default/medium.png?v26" alt="Warcraft III®: Reign of Chaos" width="115" height="163" />
</a>
</span><!--
--><span class="product-details">
<span class="product-name">
Warcraft III®:<br />Reign of Chaos
</span>
<span class="product-price">
<span class="default-price">14.99 €</span>
</span>
</span><!--
--><span class="product-actions blizzard">
<a
class="ui-button button1 "
href="../wow/static/management/digital-purchase.html?product=WAR3&amp;gameRegion=EU"
tabindex="1"
>
<span>
<span> Buy Now
</span>
</span>
</a>
</span><!--
--></span><!--
--></span><!--
--></div>

<center><div class="retail-purchase border-3">
<p class="caption">Such items are only available at the <a href="#" tabindex="1" target="_blank"><?php echo $website['title']; ?> Store</a>.</p>
</div></center>
</div>
</div>
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
<script src="../wow/static/local-common/js/search.js?v39"></script>
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
Core.load("wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js?v39");
Core.load("wow/static/local-common/js/login.js?v39", false, function() {
Login.embeddedUrl = 'https://eu.battle.net/login/login.frag';
});
//]]>
</script>
<script src="../wow/static/js/bam.js?v26"></script>
<script src="../wow/static/local-common/js/tooltip.js?v39"></script>
<script src="../wow/static/local-common/js/menu.js?v39"></script>
<script src="../wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js?v39"></script>
<script type="text/javascript">
$(function() {
Locale.dataPath = 'data/i18n.frag.xml';
});
</script>
<!--[if lt IE 8]>
<script type="text/javascript" src="../wow/static/local-common/js/third-party/jquery.pngFix.pack.js?v39"></script>
<script type="text/javascript">$('.png-fix').pngFix();</script>
<![endif]-->
<script src="../wow/static/js/management/get-game.js?v26"></script>
<!--[if lt IE 8]> <script type="text/javascript" src="../wow/static/local-common/js/third-party/jquery.pngFix.pack.js?v39"></script>
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