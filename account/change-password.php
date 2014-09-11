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
<title><?php echo TITLE ?><?php echo $Reg['Reg37']; ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="description" content="<?php echo DESCRIPTION ?>">
<meta name="keywords" content="<?php echo KEYWORDS ?>">
<link rel="shortcut icon" href="<?php echo BASE_URL ?>wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
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
<h2 class="subcategory"><?php echo $Reg['Reg1']; ?></h2>
<h3 class="headline"><?php echo $Reg['Reg2']; ?></h3>
</div>
<div id="page-content" class="page-content">
<p><?php echo $Reg['Reg3']; ?><b><?php echo $Reg['Reg4']; ?></b><?php echo $Reg['Reg5']; ?></p>
<form autocomplete="off" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
<input type="hidden" name="csrftoken" value="" />
<?php 
if(isset($_POST['submit']))
{
        $account = mysql_real_escape_string($_POST['account']);
        $passwordOld = mysql_real_escape_string($_POST['passwordOld']);
        $passwordNew = mysql_real_escape_string($_POST['passwordNew']);
        $passwordNew1 = mysql_real_escape_string($_POST['passwordNew1']);
        $passwordolde = sha1(strtoupper($account) . ":" . strtoupper($passwordOld));
        $passwordnewe = sha1(strtoupper($account) . ":" . strtoupper($passwordNew));
        $passwordNew1e = sha1(strtoupper($account) . ":" . strtoupper($passwordNew1));

        $eaccount = strtoupper($account);
        $eoldpass = strtoupper($passwordolde);
        $enewpass = strtoupper($passwordnewe);
        $enewpass1 = strtoupper($passwordNew1e);
        
        $con = mysql_connect($serveraddress, $serveruser, $serverpass) or die(mysql_error());
        mysql_select_db($server_adb, $con) or die(mysql_error());
        $query = "SELECT id FROM account WHERE username = '".$eaccount."' AND sha_pass_hash = '".$eoldpass."'";

        $result = mysql_query($query) or die(mysql_error());
        $numrows = mysql_num_rows($result);

        if($enewpass != $enewpass1) { die("<p align='center'>".$Reg['Reg6']."<br><br>".$Reg['Reg7']."<br><br>".$Reg['Reg8']."</p><p align='center'><a href='change-password.php'><button class='ui-button button1' type='submit' value='back' tabindex='1'><span><span>".$re['back']."</span></span></button></a></p>"); }

        if(strlen($_POST['passwordNew']) < 5 || strlen($_POST['passwordNew']) > 15 ){
                $chars = strlen($passwordNew);
                die("<p align='center'>".$Reg['Reg6']."<br><br>".$Reg['Reg9']."<br><br>".$Reg['Reg10']."".$chars." ".$Reg['Reg11']."<br><br>".$Reg['Reg12']."<br><br>".$Reg['Reg13']."</p><p align='center'><a href='change-password.php'><button class='ui-button button1' type='submit' value='back' tabindex='1'><span><span>".$re['back']."</span></span></button></a></p>");
        }

        if($numrows == 0) { die("<p align='center'>".$Reg['Reg6']."<br><br>".$Reg['Reg14']."<br><br>".$Reg['Reg15']."</p><p align='center'><a href='change-password.php'><button class='ui-button button1' type='submit' value='back' tabindex='1'><span><span>".$re['back']."</span></span></button></a></p>"); }

        $query = "UPDATE account SET sha_pass_hash = '".$enewpass."' WHERE username = '".$eaccount."'";
        $result = mysql_query($query) or die(mysql_error());
		$query = "UPDATE account SET v = '0' WHERE username = '".$eaccount."'";
        $result = mysql_query($query) or die(mysql_error());
        $query = "UPDATE account SET s = '0' WHERE username = '".$eaccount."'";
        $result = mysql_query($query) or die(mysql_error());
        

        echo "<p align='center'>".$Reg['Reg16']."<br><br>'<b>".$account."</b>'<br><br>".$Reg['Reg17']."<p align='center'><a href='".$website['root']."account/'><button class='ui-button button1' type='submit' value='back' tabindex='1'><span><span>".$re['back']."</span></span></button></a></p>";
        //close mysql connection
        mysql_close($con);
}
else{
?>
<div class="form-row required">
<label for="oldPassword" class="label-full ">
<strong> <?php echo $Reg['Reg18']; ?>
</strong>
<span class="form-required">*</span>
</label>
<input type="text" id="firstname" name="account" value="<?php echo strtolower($_SESSION['username']); ?>" class=" input border-5 glow-shadow-2 form-disabled" maxlength="16" tabindex="1" />
</div>
<div class="form-row required">
<label for="oldPassword" class="label-full ">
<strong> <?php echo $Reg['Reg19']; ?>
</strong>
<span class="form-required">*</span>
</label>
<input type="password" id="oldPassword" name="passwordOld" value="" class=" input border-5 glow-shadow-2" maxlength="16" tabindex="1" />
</div>
<div class="form-row required">
<label for="newPassword" class="label-full ">
<strong> <?php echo $Reg['Reg20']; ?>
</strong>
<span class="form-required">*</span>
</label>
<input type="password" id="newPassword" name="passwordNew" value="" class=" input border-5 glow-shadow-2" maxlength="16" tabindex="1" />
<script type="text/javascript">  
function pop(action){
  var frm_element = document.getElementById('newPassword-note11');
  var vis = frm_element.style;
  if (action=='open')
  {
    vis.display = 'block';
  }
  else
  {
    vis.display = 'none';
  }
}
</script>
<div class="ui-note">
<div class="form-note toggle-note border-5 glow-shadow" id="newPassword-note11">
<div class="note">
<h5><?php echo $Reg['Reg21']; ?></h5><ul><li><?php echo $Reg['Reg22']; ?><strong><?php echo $Reg['Reg23']; ?></strong></li><li><?php echo $Reg['Reg24']; ?><strong><?php echo $Reg['Reg25']; ?></strong><?php echo $Reg['Reg26']; ?><strong><?php echo $Reg['Reg27']; ?></strong><?php echo $Reg['Reg28']; ?></li><li><?php echo $Reg['Reg29']; ?></li><li><?php echo $Reg['Reg30']; ?><strong><?php echo $Reg['Reg31']; ?></strong><?php echo $Reg['Reg32']; ?></li><li><?php echo $Reg['Reg33']; ?></li></ul>
<a href="javascript:;" class="close-note" rel="newPassword-note" onclick="pop('close');"></a>
</div>
<div class="note-arrow"></div> 
</div>
<a href="javascript:;" class="note-toggler" rel="newPassword-note" onclick="pop('open');">
<img src="<?php echo BASE_URL ?>wow/static/images/icons/tooltip-help.gif" alt="?" width="16" height="16" />
</a>
</div>
</div>
<div class="form-row required">
<label for="newPasswordVerify" class="label-full ">
<strong> <?php echo $Reg['Reg34']; ?>
</strong>
<span class="form-required">*</span>
</label>
<input type="password" id="newPasswordVerify" name="passwordNew1" value="" class="input border-5 glow-shadow-2" maxlength="16" tabindex="1" />
</div>
<fieldset class="ui-controls " >
<button class="ui-button button1" type="submit" name="submit" id="settings-submit" value="Cambiar Contrase&ntilde;a" tabindex="1">
	<span>
	    <span><?php echo $Reg['Reg35']; ?></span>
	</span>
</button>
<a class="ui-cancel " href="account_man.php"tabindex="1" >
<span>
<?php echo $Reg['Reg36']; ?></span>
</a>
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
<script type="text/javascript" src="<?php echo BASE_URL ?>wow/static/js/settings/settings.js?v21"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>wow/static/js/settings/password.js?v21"></script>
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
