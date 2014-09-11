<?php
include("../configs.php");
$page_cat = "settings";
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
<title><?php echo TITLE ?> - Change Character Name</title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="description" content="<?php echo DESCRIPTION ?>">
<meta name="keywords" content="<?php echo KEYWORDS ?>">
<link rel="shortcut icon" href="<?php echo BASE_URL ?>wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/en-gb/data/opensearch" title="Battle.net Search" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/local-common/css/management/common.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/bnet.css" />
<link rel="stylesheet" media="print" href="<?php echo BASE_URL ?>wow/static/css/bnet-print.css" />
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
<body class="en-gb logged-in">
<div id="layout-top">
<div class="wrapper">
<div id="header">
<?php include("../functions/header_account.php"); ?>
<?php include("../functions/footer_man_nav.php"); ?>
</div>
</div>
</div>
<div id="layout-middle">
<div class="wrapper">
<div id="content">
<div id="page-header">
<span class="float-right"><span class="form-req">*</span> <?php echo $Reg['Reg']; ?></span>
<h2 class="subcategory">CHARACTERS SETTINGS</h2>
<?php
$price = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_db.prices WHERE service = 'name-change'"))or $free = 1;
?>
<h3 class="headline">Name Change
<?php
if ($free!= 1 && ($price['vp'] > 0 || $price['dp'] > 0)){
  echo ' (';
  if ($price['vp'] > 0){
    echo $price['vp'].' VP';
  }
  if ($price['vp'] > 0 && $price['dp'] > 0){ echo ', ';}
  if ($price['dp'] > 0){
    echo $price['dp'].' DP';
  }
  echo ')';
}
?>
</h3>
</div>
<div id="page-content" class="page-content">
<p><?php echo $Reg['Reg3']; ?><b><?php echo $Reg['Reg4']; ?></b> be offline for this tool to successfully work! Plus you need to be Loged to the 
website. Use this form to change your characters Name.</p>
<form autocomplete="off" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<input type="hidden" name="csrftoken" value="" />
<?php 
if(isset($_POST['submit']))
{
	$new_name = mysql_real_escape_string($_POST['newName']);
	$character = intval($_POST['character']);
	
	$errors = Array();
	
	$dont2 = 0;
	
	$check = mysql_query("SELECT * FROM $server_cdb.characters WHERE guid = '".$character."' AND account = '".$account_information['id']."'");
	$check2 = mysql_query("SELECT * FROM $server_cdb.characetrs WHERE name = '".$new_name."'")or $dont2 = 1;
	
	if(trim(strlen($new_name))< 2) $errors[] = "Your new character name must have 2 letters at least.";
	if(preg_match('#[\d]#',$new_name)) $errors[] = "Your new character name can't have numbers.";
	if(strlen(str_replace(' ','',$new_name)) < strlen($new_name)) $errors[] = "Your new character name can't have blank spaces.";
	if(empty($character) || mysql_num_rows($check) < 1) $errors[] = "You have not selected an eligible character for name change.";
	else if($dont2 == 0) if(mysql_num_rows($check2) > 0) $errors[] = "There's already a character created with this name.";
	
	if(!isset($free))
		if($price['type'] == 'vote'){
			if($account_extra['vote_points'] < $price['vp'])$errors[] = "You don't have enough vote points (Needed ".$price['vp']." VP)";
		}else if($price['type'] == 'donate'){
			if($account_extra['donation_points'] < $price['dp'])$errors[] = "You don't have enough donation points (Needed ".$price['dp']." DP)";
		}
	
	if(count($errors) < 1){
	
		$change = mysql_query("UPDATE $server_cdb.characters SET name = '".$new_name."' WHERE guid = '".$character."'");
		echo "Your character's name is now <strong>".$new_name."</strong>.";
		echo '<meta http-equiv="refresh" content="2;url=change-name.php"/>';
	
	}else{
	  echo '<p align="center"><font color="red"><strong>ERROR</strong></font><br/>';
		foreach($errors AS $error){
			echo $error . '<br>';
		}
		echo '</p>';
		echo '<meta http-equiv="refresh" content="2;url=change-name.php"/>';
		
	}
	
}
else{
?>
	<div class="form-row required">
		<label for="firstname" class="label-full ">
			<strong>Account Name</strong>
			<span class="form-required">*</span>
		</label>
		<input type="text" id="firstname" name="account" value="<?php echo strtolower($_SESSION['username']); ?>" class=" input border-5 glow-shadow-2 form-disabled" maxlength="16" tabindex="1" />
	</div>

	<div class="form-row required">
		<label for="character" class="label-full ">
			<strong>Select a Character</strong>
			<span class="form-required">*</span>
		</label>
		
		<?php
		$get_chars = mysql_query("SELECT * FROM $server_cdb.characters WHERE account = '".$account_information['id']."'");
			while($character = mysql_fetch_array($get_chars)){
			}
		?>
		
		<select id="character" name="character">
			<?php
			$online = 0;
			$get_chars = mysql_query("SELECT * FROM $server_cdb.characters WHERE account = '".$account_information['id']."'");
				while($character = mysql_fetch_array($get_chars)){
					echo '<option value="'.$character['guid'].'">'.$character['name'].'</option>';
					if($character['online'] == 1) $online = 1;
				}
			?>
		</select>
	</div>

	<div class="form-row required">
		<label for="CharNew" class="label-full ">
			<strong>New Character Name</strong>
			<span class="form-required">*</span>
		</label>
		<input type="text" id="CharNew" name="newName" value="" class=" input border-5 glow-shadow-2" maxlength="16" tabindex="1" />
	</div>

	<fieldset class="ui-controls " >
		<?php
		if($online == 1) echo '*One of your characters are online<br><br><button class="ui-button button1 disabled" type="submit" name="submit" id="settings-submit" value="Continue" tabindex="1" disabled="disabled">';
		else echo '<button class="ui-button button1" type="submit" name="submit" id="settings-submit" value="Continue" tabindex="1">';
		?>
		<span><span>Continue</span></span>
		</button>
		
		<a class="ui-cancel" href="account_man.php" tabindex="1"><span>Cancel</span></a>
	</fieldset>

</form>
<?php
}
?>
</div>
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
<script src="<?php echo BASE_URL ?>wow/static/js/settings/settings.js?v21"></script>
<script src="<?php echo BASE_URL ?>wow/static/js/settings/password.js?v21"></script>
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
