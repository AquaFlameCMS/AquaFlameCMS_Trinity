<?php
include("../configs.php");
$page_cat = "security";
if (!isset($_SESSION['username'])) {
        header('Location: '.BASE_URL.'account_log.php');		
}
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
 <html lang="en-gb">
<head>
<title><?php echo TITLE ?> - Download Games</title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="description" content="<?php echo DESCRIPTION ?>">
<meta name="keywords" content="<?php echo KEYWORDS ?>">
<link rel="shortcut icon" href="<?php echo BASE_URL ?>wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/local-common/css/common.css?v22" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/bnet.css?v21" />
<link rel="stylesheet" media="print" href="<?php echo BASE_URL ?>wow/static/css/bnet-print.css?v21" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/download/download.css?v21" />
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
Core.supportUrl = 'http://eu.battle.net/support/';
Core.secureSupportUrl= 'https://eu.battle.net/support/';
Core.project = 'bam';
Core.locale = 'en-gb';
Core.buildRegion = 'eu';
Core.shortDateFormat= 'dd/MM/yyyy';
Core.dateTimeFormat = 'dd/MM/yyyy HH:mm';
Core.loggedIn = true;
Flash.videoPlayer = 'http://eu.media.blizzard.com/global-video-player/themes/bam/video-player.swf';
Flash.videoBase = 'http://eu.media.blizzard.com/bam/media/videos';
Flash.ratingImage = 'http://eu.media.blizzard.com/global-video-player/ratings/bam/rating-pegi.jpg';
Flash.expressInstall= 'http://eu.media.blizzard.com/global-video-player/expressInstall.swf';
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-544112-16']);
_gaq.push(['_trackPageview']);
_gaq.push(['_trackPageLoadTime']);
//]]>
</script>
</head>
<body class="en-gb logged-in">
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
<h2 class="subcategory">Game Management</h2>
<h3 class="headline">Download Games</h3>
</div>
<p class="download-filter">
<a href="" class="active">World of Warcraft</a>
</p>
<div class="category" id="wow">
<div class="header">
<h2 class="subcategory">Game Client Downloads</h2>
<h3 class="headline">World of Warcraft</h3>
<img src="<?php echo BASE_URL ?>wow/static/local-common/images/game-icons/wow.png" alt="World of Warcraft" width="48" height="48" />
</div>
<table>
<thead>
<tr>
<th scope="col" class="details">File Details</th>
<th scope="col" class="language">Language</th>
<th scope="col" class="download win">Windows Link</th>
<th scope="col" class="download mac">Mac Link</th>
</tr>
</thead>
<tbody>
<tr class="full wow localized" id="wow-full-EU">
<th scope="row" colspan="2" class="details">
<h4>Full Game Client</h4>
<p class="language-selection">
<span class="active-region">Europe</span> /
<span class="active-language">English (EU)</span>
<a href="" class="change-language" rel="region-wow-full">(Change)</a>
</p>
<div id="region-wow-full" class="region-selection hidden border-3">
<p><strong>Available Regions</strong></p>
<p class="selection regions">
<a href="" rel="languages-wow-full-NA">Americas &amp; Oceania</a> /
<a href="" rel="languages-wow-full-EU" class="active">Europe</a> /
<a href="" rel="languages-wow-full-RU">Russia</a> /
<a href="" rel="languages-wow-full-KR">Korea</a> /
<a href="" rel="languages-wow-full-TW">Taiwan</a>
</p>
<div id="languages-wow-full-NA" class="available-languages hidden">
<p><strong>Available Languages for Americas &amp; Oceania</strong></p>
<p class="selection languages">
<a href="" rel="en_US" id="language-wow-full-NA-en_US">English (US)</a> /
<a href="" rel="es_MX" id="language-wow-full-NA-es_MX">Espa&ntilde;ol (AL)</a>
</p>
</div>
<div id="languages-wow-full-EU" class="available-languages">
<p><strong>Available Languages for Europe</strong></p>
<p class="selection languages">
<a href="" rel="en_GB" id="language-wow-full-EU-en_GB" class="active">English (EU)</a> /
<a href="" rel="es_ES" id="language-wow-full-EU-es_ES">Espa&ntilde;ol (EU)</a> /
<a href="" rel="de_DE" id="language-wow-full-EU-de_DE">Deutsch</a> /
<a href="" rel="fr_FR" id="language-wow-full-EU-fr_FR">Fran&ccedil;ais</a> /
<a href="" rel="ru_RU" id="language-wow-full-EU-ru_RU">Pycc&#1082;&#1080;&#1081;</a>
</p>
</div>
<div id="languages-wow-full-RU" class="available-languages hidden">
<p><strong>Available Languages for Russia</strong></p>
<p class="selection languages">
<a href="" rel="ru_RU" id="language-wow-full-RU-ru_RU">Pycc&#1082;&#1080;&#1081;</a>
</p>
</div>
<div id="languages-wow-full-KR" class="available-languages hidden">
<p><strong>Available Languages for Korea</strong></p>
<p class="selection languages">
<a href="" rel="ko_KR" id="language-wow-full-KR-ko_KR">&#54620;&#44397;&#51032;</a>
</p>
</div>
<div id="languages-wow-full-TW" class="available-languages hidden">
<p><strong>Available Languages for Taiwan</strong></p>
<p class="selection languages">
<a href="" rel="zh_TW" id="language-wow-full-TW-zh_TW">&#3652;&#3607;&#3618;</a>
</p>
</div>
<p class="controls"><a href="" class="close">Save</a></p>
</div>
</th>
<td class="download win">
<a href="" class="link hidden" id="win-wow-full-NA-en_US"><span class="icon"></span> Windows</a>
<a href="" class="link hidden" id="win-wow-full-NA-es_MX"><span class="icon"></span> Windows</a>
<a href="" class="link" id="win-wow-full-EU-en_GB"><span class="icon"></span> Windows</a>
<a href="" class="link hidden" id="win-wow-full-EU-es_ES"><span class="icon"></span> Windows</a>
<a href="" class="link hidden" id="win-wow-full-EU-de_DE"><span class="icon"></span> Windows</a>
<a href="" class="link hidden" id="win-wow-full-EU-fr_FR"><span class="icon"></span> Windows</a>
<a href="" class="link hidden" id="win-wow-full-EU-ru_RU"><span class="icon"></span> Windows</a>
<a href="" class="link hidden" id="win-wow-full-KR-ko_KR"><span class="icon"></span> Windows</a>
<a href="" class="link hidden" id="win-wow-full-TW-zh_TW"><span class="icon"></span> Windows</a>
</td>
<td class="download mac">
<a href="" class="link hidden" id="mac-wow-full-NA-en_US"><span class="icon"></span> Mac</a>
<a href="" class="link hidden" id="mac-wow-full-NA-es_MX"><span class="icon"></span> Mac</a>
<a href="" class="link" id="mac-wow-full-EU-en_GB"><span class="icon"></span> Mac</a>
<a href="" class="link hidden" id="mac-wow-full-EU-es_ES"><span class="icon"></span> Mac</a>
<a href="" class="link hidden" id="mac-wow-full-EU-de_DE"><span class="icon"></span> Mac</a>
<a href="" class="link hidden" id="mac-wow-full-EU-fr_FR"><span class="icon"></span> Mac</a>
<a href="" class="link hidden" id="mac-wow-full-EU-ru_RU"><span class="icon"></span> Mac</a>
<a href="" class="link hidden" id="mac-wow-full-KR-ko_KR"><span class="icon"></span> Mac</a>
<a href="" class="link hidden" id="mac-wow-full-TW-zh_TW"><span class="icon"></span> Mac</a>
</td>
</tr>
<tr class="beta wow localized" id="wow-beta-EU">
<th scope="row" colspan="2" class="details">
<h4>Public Test Realm Client</h4>
<p class="language-selection">
<span class="active-region">Europe</span> /
<span class="active-language">English (EU)</span>
<a href="" class="change-language" rel="region-wow-beta">(Change)</a>
</p>
<div id="region-wow-beta" class="region-selection hidden border-3">
<p><strong>Available Regions</strong></p>
<p class="selection regions">
<a href="" rel="languages-wow-beta-NA">Americas &amp; Oceania</a> /
<a href="" rel="languages-wow-beta-EU" class="active">Europe</a> /
<a href="" rel="languages-wow-beta-KR">Korea</a>
</p>
<div id="languages-wow-beta-NA" class="available-languages hidden">
<p><strong>Available Languages for Americas &amp; Oceania</strong></p>
<p class="selection languages">
<a href="" rel="en_US" id="language-wow-beta-NA-en_US">English (US)</a> /
<a href="" rel="es_MX" id="language-wow-beta-NA-es_MX">Espa&ntilde;ol (AL)</a>
</p>
</div>
<div id="languages-wow-beta-EU" class="available-languages">
<p><strong>Available Languages for Europe</strong></p>
<p class="selection languages">
<a href="" rel="en_GB" id="language-wow-beta-EU-en_GB" class="active">English (EU)</a> /
<a href="" rel="es_ES" id="language-wow-beta-EU-es_ES">Espa&ntilde;ol (EU)</a> /
<a href="" rel="de_DE" id="language-wow-beta-EU-de_DE">Deutsch</a> /
<a href="" rel="fr_FR" id="language-wow-beta-EU-fr_FR">Fran&ccedil;ais</a> /
<a href="" rel="ru_RU" id="language-wow-beta-EU-ru_RU">Pycc&#1082;&#1080;&#1081;</a>
</p>
</div>
<div id="languages-wow-beta-KR" class="available-languages hidden">
<p><strong>Available Languages for Korea</strong></p>
<p class="selection languages">
<a href="" rel="ko_KR" id="language-wow-beta-KR-ko_KR">&#54620;&#44397;&#51032;</a>
</p>
</div>
<p class="controls"><a href="" class="close">Save</a></p>
</div>
</th>
<td class="download win">
<a href="" class="link hidden" id="win-wow-beta-NA-en_US"><span class="icon"></span> Windows</a>
<a href="" class="link hidden" id="win-wow-beta-NA-es_MX"><span class="icon"></span> Windows</a>
<a href="" class="link" id="win-wow-beta-EU-en_GB"><span class="icon"></span> Windows</a>
<a href="" class="link hidden" id="win-wow-beta-EU-es_ES"><span class="icon"></span> Windows</a>
<a href="" class="link hidden" id="win-wow-beta-EU-de_DE"><span class="icon"></span> Windows</a>
<a href="" class="link hidden" id="win-wow-beta-EU-fr_FR"><span class="icon"></span> Windows</a>
<a href="" class="link hidden" id="win-wow-beta-EU-ru_RU"><span class="icon"></span> Windows</a>
<a href="" class="link hidden" id="win-wow-beta-KR-ko_KR"><span class="icon"></span> Windows</a>
</td>
<td class="download mac">
<a href="" class="link hidden" id="mac-wow-beta-NA-en_US"><span class="icon"></span> Mac</a>
<a href="" class="link hidden" id="mac-wow-beta-NA-es_MX"><span class="icon"></span> Mac</a>
<a href="" class="link" id="mac-wow-beta-EU-en_GB"><span class="icon"></span> Mac</a>
<a href="" class="link hidden" id="mac-wow-beta-EU-es_ES"><span class="icon"></span> Mac</a>
<a href="" class="link hidden" id="mac-wow-beta-EU-de_DE"><span class="icon"></span> Mac</a>
<a href="" class="link hidden" id="mac-wow-beta-EU-fr_FR"><span class="icon"></span> Mac</a>
<a href="" class="link hidden" id="mac-wow-beta-EU-ru_RU"><span class="icon"></span> Mac</a>
<a href="" class="link hidden" id="mac-wow-beta-KR-ko_KR"><span class="icon"></span> Mac</a>
</td>
</tr>
<tr class="starter wow localized" id="wow-starter-EU">
<th scope="row" colspan="2" class="details">
<h4>Free Starter Edition</h4>
<p class="language-selection">
<span class="active-region">Europe</span> /
<span class="active-language">English (EU)</span>
<a href="" class="change-language" rel="region-wow-starter">(Change)</a>
</p>
<div id="region-wow-starter" class="region-selection hidden border-3">
<p><strong>Available Regions</strong></p>
<p class="selection regions">
<a href="" rel="languages-wow-starter-NA">Americas &amp; Oceania</a> /
<a href="" rel="languages-wow-starter-EU" class="active">Europe</a> /
<a href="" rel="languages-wow-starter-RU">Russia</a> /
<a href="" rel="languages-wow-starter-KR">Korea</a> /
<a href="" rel="languages-wow-starter-TW">Taiwan</a>
</p>
<div id="languages-wow-starter-NA" class="available-languages hidden">
<p><strong>Available Languages for Americas &amp; Oceania</strong></p>
<p class="selection languages">
<a href="" rel="en_US" id="language-wow-starter-NA-en_US">English (US)</a> /
<a href="" rel="es_MX" id="language-wow-starter-NA-es_MX">Espa&ntilde;ol (AL)</a>
</p>
</div>
<div id="languages-wow-starter-EU" class="available-languages">
<p><strong>Available Languages for Europe</strong></p>
<p class="selection languages">
<a href="" rel="en_GB" id="language-wow-starter-EU-en_GB" class="active">English (EU)</a> /
<a href="" rel="es_ES" id="language-wow-starter-EU-es_ES">Espa&ntilde;ol (EU)</a> /
<a href="" rel="de_DE" id="language-wow-starter-EU-de_DE">Deutsch</a> /
<a href="" rel="fr_FR" id="language-wow-starter-EU-fr_FR">Fran&ccedil;ais</a> /
<a href="" rel="ru_RU" id="language-wow-starter-EU-ru_RU">Pycc&#1082;&#1080;&#1081;</a>
</p>
</div>
<div id="languages-wow-starter-RU" class="available-languages hidden">
<p><strong>Available Languages for Russia</strong></p>
<p class="selection languages">
<a href="" rel="ru_RU" id="language-wow-starter-RU-ru_RU">Pycc&#1082;&#1080;&#1081;</a>
</p>
</div>
<div id="languages-wow-starter-KR" class="available-languages hidden">
<p><strong>Available Languages for Korea</strong></p>
<p class="selection languages">
<a href="" rel="ko_KR" id="language-wow-starter-KR-ko_KR">&#54620;&#44397;&#51032;</a>
</p>
</div>
<div id="languages-wow-starter-TW" class="available-languages hidden">
<p><strong>Available Languages for Taiwan</strong></p>
<p class="selection languages">
<a href="" rel="zh_TW" id="language-wow-starter-TW-zh_TW">&#3652;&#3607;&#3618;</a>
</p>
</div>
<p class="controls"><a href="" class="close">Save</a></p>
</div>
</th>
<td class="download win">
<a href="" class="link hidden" id="win-wow-starter-NA-en_US"><span class="icon"></span> Windows</a>
<a href="" class="link hidden" id="win-wow-starter-NA-es_MX"><span class="icon"></span> Windows</a>
<a href="" class="link" id="win-wow-starter-EU-en_GB"><span class="icon"></span> Windows</a>
<a href="" class="link hidden" id="win-wow-starter-EU-es_ES"><span class="icon"></span> Windows</a>
<a href="" class="link hidden" id="win-wow-starter-EU-de_DE"><span class="icon"></span> Windows</a>
<a href="" class="link hidden" id="win-wow-starter-EU-fr_FR"><span class="icon"></span> Windows</a>
<a href="" class="link hidden" id="win-wow-starter-EU-ru_RU"><span class="icon"></span> Windows</a>
<a href="" class="link hidden" id="win-wow-starter-KR-ko_KR"><span class="icon"></span> Windows</a>
<a href="" class="link hidden" id="win-wow-starter-TW-zh_TW"><span class="icon"></span> Windows</a>
</td>
<td class="download mac">
<a href="" class="link hidden" id="mac-wow-starter-NA-en_US"><span class="icon"></span> Mac</a>
<a href="" class="link hidden" id="mac-wow-starter-NA-es_MX"><span class="icon"></span> Mac</a>
<a href="" class="link" id="mac-wow-starter-EU-en_GB"><span class="icon"></span> Mac</a>
<a href="" class="link hidden" id="mac-wow-starter-EU-es_ES"><span class="icon"></span> Mac</a>
<a href="" class="link hidden" id="mac-wow-starter-EU-de_DE"><span class="icon"></span> Mac</a>
<a href="" class="link hidden" id="mac-wow-starter-EU-fr_FR"><span class="icon"></span> Mac</a>
<a href="" class="link hidden" id="mac-wow-starter-EU-ru_RU"><span class="icon"></span> Mac</a>
<a href="" class="link hidden" id="mac-wow-starter-KR-ko_KR"><span class="icon"></span> Mac</a>
<a href="" class="link hidden" id="mac-wow-starter-TW-zh_TW"><span class="icon"></span> Mac</a>
</td>
</tr>
<tr class="guide wow localized" id="wow-guide-NA">
<th scope="row" colspan="2" class="details">
<h4>Beginner's Guide</h4>
<p class="language-selection">
<span class="active-region">Americas &amp; Oceania</span> /
<span class="active-language">English (US)</span>
</p>
</th>
<td class="download"></td>
<td class="download pdf">
<a href="" class="link" id="pdf-wow-guide-NA-en_US"><span class="icon"></span> PDF</a>
</td>
</tr>
<tr class="language-pack language-pack-wow-full language-pack-wow-full-NA hidden">
<th scope="row" class="details" rowspan="2">
<h4>American Language Packs</h4>
<p>Used for patching a game client with a different language.<br />(Requires the American full game client.)</p>
</th>
<td class="language">English (US)</td>
<td class="download win"><a href=""><span class="icon"></span> Windows</a></td>
<td class="download mac"><a href=""><span class="icon"></span> Mac</a></td>
</tr>
<tr class="language-pack language-pack-wow-full language-pack-wow-full-NA hidden">
<td class="language">Espa&ntilde;ol (AL)</td>
<td class="download win"><a href=""><span class="icon"></span> Windows</a></td>
<td class="download mac"><a href=""><span class="icon"></span> Mac</a></td>
</tr>
<tr class="language-pack language-pack-wow-full language-pack-wow-full-EU">
<th scope="row" class="details" rowspan="5">
<h4>European Language Packs</h4>
<p>Used for patching a game client with a different language.<br />(Requires the European full game client.)</p>
</th>
<td class="language">English (EU)</td>
<td class="download win"><a href=""><span class="icon"></span> Windows</a></td>
<td class="download mac"><a href=""><span class="icon"></span> Mac</a></td>
</tr>
<tr class="language-pack language-pack-wow-full language-pack-wow-full-EU">
<td class="language">Deutsch</td>
<td class="download win"><a href=""><span class="icon"></span> Windows</a></td>
<td class="download mac"><a href=""><span class="icon"></span> Mac</a></td>
</tr>
<tr class="language-pack language-pack-wow-full language-pack-wow-full-EU">
<td class="language">Espa&ntilde;ol (EU)</td>
<td class="download win"><a href=""><span class="icon"></span> Windows</a></td>
<td class="download mac"><a href=""><span class="icon"></span> Mac</a></td>
</tr>
<tr class="language-pack language-pack-wow-full language-pack-wow-full-EU">
<td class="language">Fran&ccedil;ais</td>
<td class="download win"><a href=""><span class="icon"></span> Windows</a></td>
<td class="download mac"><a href=""><span class="icon"></span> Mac</a></td>
</tr>
<tr class="language-pack language-pack-wow-full language-pack-wow-full-EU">
<td class="language">Pycc&#1082;&#1080;&#1081;</td>
<td class="download win"><a href=""><span class="icon"></span> Windows</a></td>
<td class="download mac"><a href=""><span class="icon"></span> Mac</a></td>
</tr>
</tbody>
</table>
<table>
<thead>
<tr>
<th scope="col" class="details">File Details</th>
<th scope="col" class="language">Language</th>
<th scope="col" class="download win">Windows Link</th>
<th scope="col" class="download mac">Mac Link</th>
</tr>
</thead>
</table>
</div>
</div>
</div>
</div>
<div id="layout-bottom">
<?php include("../functions/footer_man.php"); ?>
</div>
<script type="text/javascript">
//<![CDATA[
var xsToken = '99fdec16-4132-4511-9b04-8df6e4a12088';
var Msg = {
support: {
ticketNew: 'Ticket {0} was created.',
ticketStatus: 'Ticket {0}'s status changed to {1}.',
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
postAdded: 'Post added to tracker',
postRemoved: 'Post removed from tracker',
userAdded: 'User added to tracker',
userRemoved: 'User removed from tracker',
validationError: 'A required field is incomplete',
characterExceed: 'The post body exceeds XXXXXX characters.',
searchFor: "Search for",
searchTags: "Articles tagged:",
characterAjaxError: "You may have become logged out. Please refresh the page and try again.",
ilvl: "Item Lvl",
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
}
};
//]]>
</script>
<script src="<?php echo BASE_URL ?>wow/static/js/bam.js?v21"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/tooltip.js?v22"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/menu.js?v22"></script>
<script type="text/javascript">
$(function() {
Menu.initialize();
Menu.config.colWidth = 190;
Locale.dataPath = 'data/i18n.frag.xml';
});
</script>
<!--[if lt IE 8]>
<script type="text/javascript" src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery.pngFix.pack.js?v22"></script>
<script type="text/javascript">$('.png-fix').pngFix();</script>
<![endif]-->
<script src="<?php echo BASE_URL ?>wow/static/js/download/download.js?v21"></script>
<script src="<?php echo BASE_URL ?>wow/static/js/management/d3/dashboard.js?v21"></script>
<script type="text/javascript">
//<![CDATA[
Core.load("wow/static/local-common/js/overlay.js?v22");
Core.load("wow/static/local-common/js/search.js?v22");
Core.load("wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js?v22");
Core.load("wow/static/local-common/js/third-party/jquery.mousewheel.min.js?v22");
Core.load("wow/static/local-common/js/third-party/jquery.tinyscrollbar.custom.js?v22");
Core.load("wow/static/local-common/js/login.js?v22", false, function() {
Login.embeddedUrl = '<?php echo BASE_URL ?>loginframe.php';
});
//]]>
</script>
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