<?php
include("../configs.php");
$page_cat = "security";
if (!isset($_SESSION['username'])) {
        header('Location: account_log.php');		
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb">
<head>
<title><?php echo $website['title']; ?><?php echo $appear['1']; ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="../wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/en-gb/data/opensearch" title="Battle.net Search" />
<link rel="stylesheet" type="text/css" media="all" href="../wow/static/local-common/css/management/common.css" />
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="local-common/css/common-ie.css" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="local-common/css/common-ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="local-common/css/common-ie7.css" /><![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/bnet.css" />
<link rel="stylesheet" type="text/css" media="print" href="../wow/static/css/bnet-print.css" />
<link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/management/dashboard.css" />
<link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/management/wow/dashboard.css" />
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="/css/management/wow/dashboard-ie.css" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="/css/management/dashboard-ie6.css" /><![endif]-->
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="css/bnet-ie.css" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="css/bnet-ie6.css" /><![endif]-->
<script type="text/javascript" src="../wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script type="text/javascript" src="../wow/static/local-common/js/core.js"></script>
<script type="text/javascript" src="../wow/static/local-common/js/tooltip.js"></script>
<script type="text/javascript" src="../wow/static/local-common/js/third-party/swfobject.js?v37"></script>
<script type="text/javascript" src="../wow/static/js/management/dashboard.js?v23"></script>
<script type="text/javascript" src="../wow/static/js/management/wow/dashboard.js?v23"></script>
<script type="text/javascript" src="../wow/static/js/bam.js?v23"></script>
<script type="text/javascript" src="../wow/static/local-common/js/tooltip.js?v37"></script>
<script type="text/javascript" src="../wow/static/local-common/js/menu.js?v37"></script>
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
<h2 class="subcategory"><?php echo $appear['2']; ?></h2>
<?php
  $price = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_db.prices WHERE service = 'appear-change'"));
   if ($price['id']=='' || ($price['vp']==0 && $price['dp']==0)){
   $free = 1;
  }else{
   $free = 0;
  }
?>
<h3 class="headline"><?php echo $appear['3']; ?>
<?php
if ($free!= 1 && ($price['vp'] > 0 || $price['dp'] > 0)){
  echo ' (';
  if ($price['vp'] > 0){
    echo $price['vp'].' VP';
  }
  if ($price['vp'] > 0 && $price['dp'] > 0){ echo ' or ';}
  if ($price['dp'] > 0){
    echo $price['dp'].' DP';
  }
  echo ')';
}
?>
</h3>
</div>
<div id="page-content" class="page-content">
<p><?php echo $Reg['Reg3']; ?><b><?php echo $Reg['Reg4']; ?></b><?php echo $appear['4']; ?></p>
<p><?php echo $appear['5']; ?></p>
<form autocomplete="off" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<input type="hidden" name="csrftoken" value="" />
<?php 
if(isset($_POST['submit']))
{
	$type=$_POST['type'];
	if ($type==1){  
		$method="dp";
		$method1="donation_points";
		$method2="donation points";
	}else{
		$method="vp";
		$method1="vote_points";
		$method2="vote points";
	}
	
	$buscarpuntos = mysql_fetch_array(mysql_query("SELECT * FROM $server_db.users WHERE id='".$account_information['id']."'"));
	
	$character = intval($_POST['character']);

	$errors = Array();

	$dont2 = 0;

	$check = mysql_query("SELECT * FROM $server_cdb.characters WHERE guid = '".$character."' AND account = '".$account_information['id']."'");

	if(empty($character) || mysql_num_rows($check) < 1) $errors[] = "You have not selected an eligible character for name change.";
	
	if ($buscarpuntos[$method1]<$price[$method]) $errors[] = "You dont have enough ".$method2;

	if(count($errors) < 1){
		$total=$buscarpuntos[$method1]-$price[$method];
		$substract = mysql_query("UPDATE $server_db.users SET $method1=$total WHERE id='".$account_information['id']."'");
		$change = mysql_query("UPDATE $server_cdb.characters SET at_login = '8' WHERE guid = '".$character."'");
		echo '<p align="center"><font color="green"><strong>Succes!</strong></font><br/>';
		echo "<strong>You can now change your Character Appeareance logining ingame.</strong>";
		echo '</p>';
		echo '<meta http-equiv="refresh" content="2;url=../account_man.php"/>';

	}else{
	  echo '<p align="center"><font color="red"><strong>ERROR</strong></font><br/>';
		foreach($errors AS $error){
			echo $error . '<br>';
		}
		echo '</p>';
		echo '<meta http-equiv="refresh" content="2;url=change_appear.php"/>';

	}

}
else{
?>
	<div class="form-row required">
		<label for="firstname" class="label-full ">
			<strong><?php echo $appear['6']; ?></strong>
			<span class="form-required">*</span>
		</label>
		<input type="text" id="firstname" name="account" value="<?php echo strtolower($_SESSION['username']); ?>" class=" input border-5 glow-shadow-2 form-disabled" maxlength="16" tabindex="1" />
	</div>

	<div class="form-row required">
		<label for="character" class="label-full ">
			<strong><?php echo $appear['7']; ?></strong>
			<span class="form-required">*</span>
		</label>
		
		<select id="character" name="character">
			<?php
			$online = 0;
			$get_chars = mysql_query("SELECT * FROM $server_cdb.characters WHERE account = '".$account_information['id']."' AND at_login = '0'");
			//Get chars that doesn't have a current at_login change activated
      	while($character = mysql_fetch_array($get_chars)){
					echo '<option value="'.$character['guid'].'">'.$character['name'].'</option>';
					if($character['online'] == 1) $online = 1;
				}
			?>
		</select>
	</div>
		<?php 
	if($free==0){
		echo '<div class="form-row required">
			<label for="type" class="label-full ">
				<strong>Paymenth Method</strong>
				<span class="form-required">*</span>
			</label>
			<select id="type" name="type">';
				if ($price['dp'] > 0) echo '<option value="1">Donation Points</option>';
				if ($price['vp'] > 0) echo '<option value="2">Vote Points</option>';
			echo'</select>
		</div>';
	} ?>
	<fieldset class="ui-controls " >
		<?php
		if (mysql_num_rows($get_chars) < 1){
      echo '*You don&apos;t have characters availables. Remember that your character should not have a change option activated.<br><br>
      <button class="ui-button button1 disabled" type="submit" name="submit" id="settings-submit" value="Continue" tabindex="1" disabled="disabled">';
    }
		elseif($online == 1) echo '*One of your characters is online<br><br><button class="ui-button button1 disabled" type="submit" name="submit" id="settings-submit" value="Continue" tabindex="1" disabled="disabled">';
    else echo '<button class="ui-button button1" type="submit" name="submit" id="settings-submit" value="Purchase" tabindex="1">';
		?>
		<span><span><?php echo $appear['8']; ?></span></span>
		</button>
		
		<a class="ui-cancel" href="../account_man.php" tabindex="1"><span><?php echo $appear['9']; ?></span></a>
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
ticketStatus: 'Ticket {0}?s status changed to {1}.',
ticketOpen: 'Open',
ticketAnswered: 'Answered',
ticketResolved: 'Resolved',
ticketCanceled: 'Cancelled',
ticketArchived: 'Archived',
ticketInfo: 'Need Info',
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
loading: 'Loading?',
unexpectedError: 'An error has occurred',
fansiteFind: 'Find this on?',
fansiteFindType: 'Find {0} on?',
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
<script type="text/javascript" src="wow/static/js/bam.js?v21"></script>
<script type="text/javascript" src="wow/static/local-common/js/tooltip.js?v22"></script>
<script type="text/javascript" src="wow/static/local-common/js/menu.js?v22"></script>
<script type="text/javascript">
$(function() {
Menu.initialize();
Menu.config.colWidth = 190;
Locale.dataPath = 'data/i18n.frag.xml';
});
</script>
<!--[if lt IE 8]>
<script type="text/javascript" src="wow/static/local-common/js/third-party/jquery.pngFix.pack.js?v22"></script>
<script type="text/javascript">$('.png-fix').pngFix();</script>
<![endif]-->
<script type="text/javascript" src="wow/static/js/settings/settings.js?v21"></script>
<script type="text/javascript" src="wow/static/js/settings/password.js?v21"></script>
<script type="text/javascript">
//<![CDATA[
Core.load("wow/static/local-common/js/overlay.js?v22");
Core.load("wow/static/local-common/js/search.js?v22");
Core.load("wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js?v22");
Core.load("wow/static/local-common/js/third-party/jquery.mousewheel.min.js?v22");
Core.load("wow/static/local-common/js/third-party/jquery.tinyscrollbar.custom.js?v22");
Core.load("wow/static/local-common/js/login.js?v22", false, function() {
Login.embeddedUrl = '<?php echo $website['root'];?>loginframe.php';
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