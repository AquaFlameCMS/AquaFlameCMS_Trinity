<?php
include("../configs.php");
$page_cat = "security";
// Check, if username session is NOT set then this page will jump to login page
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
<title><?php echo TITLE ?><?php echo $Uns['Uns']; ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="description" content="<?php echo DESCRIPTION ?>">
<meta name="keywords" content="<?php echo KEYWORDS ?>">
<link rel="shortcut icon" href="<?php echo BASE_URL ?>wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/local-common/css/management/common.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/bnet.css" />
<link rel="stylesheet" media="print" href="<?php echo BASE_URL ?>wow/static/css/bnet-print.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/inputs.css?v21" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/management/wow/merge/wow-merge.css?v21" />
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
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
<body class="en-gb wowconv logged-in">
<div id="layout-top">
<div class="wrapper">
<div id="header">
<?php include("../functions/header_account.php"); ?>
<?php include("../functions/footer_man_nav.php"); ?>
</div>
<div id="layout-middle">
<div class="wrapper">
<div id="content">
<div id="account-progress">
<span><?php echo $Uns['Uns1']; ?></span><?php echo $Uns['Uns2']; ?>
<div id="progress-bar" class="border-3">
<div id="current-progress" class="border-3" style="width: 100%"></div>
</div>
</div>
<div id="notKRAccount" class="noregion-merge" style="display: none;">
<div class="alert caution border-4 glow-shadow">
<div class="alert-inner">
<div class="alert-message">
<p class="title"><strong><?php echo $Uns['Uns3']; ?></strong></p>
<p><?php echo $Uns['Uns4']; ?></p>
</div>
</div>
<span class="clear"><!-- --></span>
</div>
</div>
<div id="mergeNA" class="noregion-merge" style="display: none;">
<div class="alert caution border-4 glow-shadow">
<div class="alert-inner">
<div class="alert-message">
<p class="title"><strong><?php echo $Uns['Uns5']; ?></strong></p>
<p><?php echo $Uns['Uns6']; ?></p>
</div>
</div>
<span class="clear"><!-- --></span>
</div>
</div>
<div class="caution" id="kr-merge-alert" style="display: none;">
<div class="alert caution border-4 glow-shadow">
<div class="alert-inner">
<div class="alert-message">
<p><?php echo $Uns['Uns7']; ?><a href="http://www.worldofwarcraft.co.kr/myworld/security/unbind-form.do" target="_blank">Detach your authenticator</a>.<br /><br /><a href="http://kr.blizzard.com/support/article.xml?articleId=21140&amp;categoryId=1614&amp;parentCategoryId=&amp;pageNumber=1" target="_blank"><?php echo $Uns['Uns24']; ?></a>.</p>
</div>
</div>
<span class="clear"><!-- --></span>
</div>
</div>
<div class="caution" id="tw-warning" style="display: none;">
<div class="alert caution border-4 glow-shadow">
<div class="alert-inner">
<div class="alert-message">
<p class="title"><strong><?php echo $Uns['Uns8']; ?></strong></p>
<p>
<?php echo $Uns['Uns9']; ?><br />
<em><?php echo $Uns['Uns10']; ?></em>
</p>
<p><?php echo $Uns['Uns11']; ?></p>
</div>
</div>
<span class="clear"><!-- --></span>
</div>
</div>
<div id="page-header">
<span class="float-right"><span class="form-req">*</span><?php echo $Uns['Uns12']; ?></span>
<h2 class="subcategory"><?php echo $Uns['Uns13']; ?></h2>
<h3 class="headline"><?php echo $Uns['Uns14']; ?></h3>
</div>
<p><?php echo $Uns['Uns15']; ?></p>
<div id="page-content">
<form method="post" action="" class="account-merge" id="account-merge">
<div id="wowLogin">

<?php
require_once("../configs.php");
function char_unstuck(){
global $serveraddress, $serveruser, $serverpass, $server_adb, $server_cdb;
if(isset($_POST['unstuck'])){
$connect = mysql_connect("$serveraddress", "$serveruser", "$serverpass") or die('Connection Error: ' . mysql_error());
$serverusername = $_POST['username'];
$character = $_POST['char'];
$serverpassword = sha1(strtoupper($serverusername) . ":" . strtoupper($serverpassword));
$valid_account = mysql_query("SELECT * FROM $server_adb.account WHERE username='$serverusername' AND sha_pass_hash='$serverpassword'");
$account_valid = mysql_num_rows($valid_account);
if($account_valid != 1){print''.$Uns['Uns25'].'<br/>';}else{
while($get_char = mysql_fetch_array($valid_account)){
$valid_char = mysql_query("SELECT * FROM $server_cdb.characters WHERE name='$character'");
$char_valid = mysql_num_rows($valid_char);
if($char_valid != 1){print''.$Uns['Uns26'].'<br/>';}else{
$char_acc = mysql_query("SELECT * FROM $server_cdb.characters WHERE account='".$get_char['id']."' AND name='$character'");
$acc_char = mysql_num_rows($char_acc);
if($acc_char != 1){print''.$Uns['Uns27'].'<br/>';}else{
//Get Character HomeBind
while($acc_id = mysql_fetch_array($char_acc)){
$homeb = mysql_query("SELECT * FROM $server_cdb.character_homebind WHERE guid='".$acc_id['guid']."'");
while($home = mysql_fetch_array($homeb)){
$px = $home['position_x'];//Position X
$py = $home['position_y'];//Position Y
$pz = $home['position_z'];//Position Z
$z = $home['zone'];//Zone
$m = $home['map'];//Map
//Unstuck Character
$unstuck = mysql_query("UPDATE $server_cdb.characters SET position_x = '$px', position_y = '$py', position_z = '$pz', zone = '$z', map = '$m' WHERE name='$character'") or die('UnStuck Failed: ' . mysql_error());
print'Your character is unlocked.';
//Success
print''.$Uns['Uns28'].'';	
}}}}}}}}
print'<table align="center">
<form action="" method="post">
<tr>
<div id="wowLogin">
<div class="input-row input-row-text">
<span class="input-left">
<label for="username">
<span class="label-text">
'.$Uns['Uns16'].'
</span>	
<span class="input-required">*</span>	
</label>
</span>
<span class="input-right">
<span class="input-text input-text-small">
<input type="text" name="username" value="'.strtolower($_SESSION['username']).'" id="username" class="input border-5 glow-shadow-2 form-disabled" autocomplete="off" tabindex="1" required="required" disabled="disabled" />
<span class="inline-message" id="username-message"></span>
</span>
</span>	
</div>	
<div id="wowLogin">	
<div class="input-row input-row-text">	
<span class="input-left"> 	
<label for="username">	
<span class="label-text">	
'.$Uns['Uns17'].'	
</span>
<span class="input-required">*</span>
</label>
</span>
<span class="input-right">
<span class="input-text input-text-small">
<input type="text" name="char" value="" id="char" class="small border-5 glow-shadow-2" autocomplete="off" tabindex="1" required="required" />
<span class="inline-message" id="username-message"></span>
</span>
</span>	
</div>
<div class="input-row input-row-text">
<span class="input-left">
<label for="password">
<span class="label-text">
'.$Uns['Uns18'].'
</span>
<span class="input-required">*</span>
</label>
</span>
<span class="input-right">
<span class="input-text input-text-small">
<input type="password" id="password" name="password" value="" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="16" tabindex="1" required="required" />		
<span class="inline-message" id="password-message"><a id="pwLink" class="icon-external" href="" onclick="window.open(this.href);return false" tabindex="1">
'.$Uns['Uns19'].'
</a>
<p id="pwLinkNo" style="display:none;">'.$Uns['Uns20'].' <a href="" target="_blank">'.$Uns['Uns21'].'</a>.</p>
</span>
</span>
</span>	
</div>
<fieldset class="ui-controls " >	
<button class="ui-button button1 " type="submit" name="unstuck" value="Unstuck!" id="merge-submit" tabindex="1">
<span><span>'.$Uns['Uns29'].'</span></span>
</button>
<a class="ui-cancel" href= "'.BASE_URL.'account/" tabindex="1">
<span>'.$Uns['Uns23'].'</span></a>
</fieldset>
</form>
</table>
<center>';
char_unstuck();
print'</center>';
?>
</div>
<script type="text/javascript">
//<![CDATA[
(function() {
var mergeSubmit = document.getElementById('merge-submit');
mergeSubmit.disabled = 'disabled';
mergeSubmit.className = mergeSubmit.className  ' disabled';
})();
//]]>
</script>
</form>
</div>
<script type="text/javascript">
//<![CDATA[
$(function() {
var inputs = new Inputs('#account-merge');
var mergeForm = new AccountMerge('#account-merge', {
captchaRegions: [ 'US', 'EU', 'KR', 'TW' ],
accountCountry: 'GRC'
});
});
//]]>
</script>
</div>
</div>
</div>
<div id="layout-bottom">
<?php include("../functions/footer_man.php"); ?>
</div>
<script type="text/javascript">
//<![CDATA[
var xsToken = 'b213c993-d61d-4957-9141-9da399fd7d54';
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
<script src="<?php echo BASE_URL ?>wow/static/js/inputs.js?v21"></script>
<script src="<?php echo BASE_URL ?>wow/static/js/management/wow/merge/account-merge.js?v21"></script>
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
