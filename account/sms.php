<?php
include("../configs.php");
$page_cat = 'gamesncodes';
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
					<h2 class="subcategory"><?php echo $sms['2']; ?></h2>
					<h3 class="headline"><?php echo $sms['3']; ?></h3>
					<a href=""><img src="<?php echo BASE_URL ?>wow/static/local-common/images/game-icons/wow.png" alt="World of Warcraft" width="48" height="48" /></a>
				</div>
			</div>
		</div>
	<div id="page-content" class="page-content">
		<p><?php echo $sms['4']; ?></p>
		<!-- PayGol JavaScript -->
		<script src="https://www.paygol.com/micropayment/js/paygol.js" type="text/javascript"></script> 

		<!-- PayGol Form -->
		<form name="pg_frm">
		 Account Name
		 <p><input type="text" name="pg_custom" value="<?php echo strtolower($_SESSION['username']); ?>" disabled><p>
		 <input type="hidden" name="pg_serviceid" value="<?php echo $service_id ?>">
		 <input type="hidden" name="pg_currency" value="<?php echo $service_currency ?>">
		 <input type="hidden" name="pg_name" value="<?php echo $service_name ?>">

		 <!-- With Option buttons -->
		 <input type="radio" name="pg_price" value="1"checked>Donate for 3 Credits<p>
		 <input type="radio" name="pg_price" value="2">Donate for 5 Credits<p>
		 <input type="radio" name="pg_price" value="3">Donate for 10 Credits<p>
		 <input type="radio" name="pg_price" value="4">Donate for 15 Credits<p>
		 <input type="radio" name="pg_price" value="5">Donate for 20 Credits<p>
		 <input type="hidden" name="pg_return_url" value="<?php echo BASE_URL ?>/sms/successfully/">
		 <input type="hidden" name="pg_cancel_url" value="<?php echo BASE_URL ?>/sms/fail/">
		 <input type="image" name="pg_button" class="paygol" src="https://www.paygol.com/micropayment/buttons/es/black.png" border="0" alt="Realiza pagos con PayGol: la forma mas facil!" title="Realiza pagos con PayGol: la forma mas facil!" onClick="pg_reDirect(this.form)">
		</form>
		<br>
		</br>
		<br>
		</br>
		<div class="address-book" id="address-book">
		<script type="text/javascript">
		//<![CDATA[
		$(function() {
		$(".address-dialog").dialog("destroy");
		$('.address-dialog').dialog({
		autoOpen: false,
		modal: true,
		position: "center",
		resizeable: false,
		closeText: "Close",
		buttons: {
		'Yes': function() {
		var id = $(this).find('input[name="addressId"]').val();
		AddressBook.deleteAddress(id);
		$(this).dialog("close");
		},
		'Cancel': function() {
		$(this).dialog("close");
		}
		},
		open: function() {
		$(".ui-dialog-buttonpane").find("button").addClass("button1").find(":first").addClass("first");
		}
		});
		});
		//]]>
		</script>
		<span class="clear"></span>
		</div>
	</div>
</div>
</div>
</div>
<div id="layout-bottom">
<?php include("../functions/footer_man.php"); ?>
</div>
</div>
<script type="text/javascript">
//<![CDATA[
var xsToken = 'db9c1032-afc8-4a29-9ab8-07ec1c068d37';
var Msg = {
support: {
ticketNew: 'Ticket {0} was created.',
ticketStatus: 'Ticket {0}’s status changed to {1}.',
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
Locale.dataPath = '../data/i18n.frag.xml';
});
</script>
<!--[if lt IE 8]>
<script type="text/javascript" src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery.pngFix.pack.js?v22"></script>
<script type="text/javascript">$('.png-fix').pngFix();</script>
<![endif]-->
<script type="text/javascript" src="<?php echo BASE_URL ?>wow/static/js/management/address-book.js?v21"></script>
<script type="text/javascript" src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery-ui-1.8.1.custom.min.js?v22"></script>
<script type="text/javascript">
//<![CDATA[
Core.load("../wow/static/local-common/js/overlay.js?v22");
Core.load("../wow/static/local-common/js/search.js?v22");
Core.load("../wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js?v22");
Core.load("../wow/static/local-common/js/third-party/jquery.mousewheel.min.js?v22");
Core.load("../wow/static/local-common/js/third-party/jquery.tinyscrollbar.custom.js?v22");
Core.load("../wow/static/local-common/js/login.js?v22", false, function() {
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
