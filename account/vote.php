<?php
require_once("../configs.php");
$page_cat = "gamesncodes";
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
<title><?php echo $Vote['Vote'];?> - <?php echo TITLE ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="description" content="<?php echo DESCRIPTION ?>">
<meta name="keywords" content="<?php echo KEYWORDS ?>">
<link rel="shortcut icon" href="<?php echo BASE_URL ?>wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/local-common/css/common.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/bnet.css" />
<link rel="stylesheet" media="print" href="<?php echo BASE_URL ?>wow/static/css/bnet-print.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/management/dashboard.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/management/services.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/management/wow/raf.css" />
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
     <!--[if lte IE 7]>  <style type="text/css">
    .raf-step3-arrow { position:relative; width:176px; height:61px; background:url('wow/static/images/services/wow/raf/step_3_arrow_b.png') 0 0 no-repeat!important; top:-540px; left:105px; }
    .raf-step5-arrow { position:relative; width:155px; height:57px; background:url('wow/static/images/services/wow/raf/step_5_arrow_b.png') 0 0 no-repeat!important; top:-163px; left:150px; }
     </style>  <![endif]-->
	<div class="dashboard service">
		<div class="primary">
			<div class="header">
				<h2 class="subcategory"><?php echo $Vote['Vote']; ?></h2>
				<h3 class="headline">Vote System</h3>
				<a href=""><img src="<?php echo BASE_URL ?>wow/static/local-common/images/game-icons/wow.png" alt="World of Warcraft" width="48" height="48" /></a>
			</div>
			<div class="service-wrapper">
			<p class="service-nav">
				<a href=""><?php echo $Vote['Vote2']; ?></a> <!-- Spend Points -->
				<a href="vote-history.php"><?php echo $Vote['Vote3']; ?></a>
				<a href="#howitworks"><?php echo $Vote['Vote4']; ?></a> <!-- How it works -->
				<a href="vote.php" class="active"><?php echo $Vote['Vote5']; ?></a>
			</p>
            <p><?php echo $Vote['Vote6']; ?><?php echo TITLE ?><?php echo $Vote2['Vote6']; ?></p><br />
			<p><?php echo $Vote['Vote18'];?><?php echo $account_extra['vote_points']; ?><?php echo $Vote['Vote17'];?></p>
			<br><br>
			<?php include("../functions/vote_func.php"); ?>
			<div style="position:relative;">
				<?php

					if(isset($_GET['id'])){
					
						$errors = Array();
					
						if(empty($_GET['id'])) $errors[] = "".$Vote['Vote19']."";
						if($_GET['id'] != (int)$_GET['id']) $errors[] = "".$Vote['Vote19']."";
						
						$id = (int)$_GET['id'];
						
						$check = mysql_query("SELECT * FROM $server_db.vote WHERE id = '".$id."'");
						if(mysql_num_rows($check) < 1) $errors[] = "".$Vote['Vote20']."";					
						
						
						if(count($errors) > 0)
						{
							echo'					
							<div class="subsection">
								<div class="middle">??!</div>
								<div class="right">
									<h2 class="caption">'.$Vote['Vote21'].'</h2>
									<meta http-equiv="refresh" content="3;url=vote.php"/>
									';
									
									foreach($errors AS $message) { echo $message . '<br>'; }
									$error = 1;
									
									echo '
									<small>'.$Forum['Forum37'].'</small>
								</div>
							</div>';
							
						} else {
							
							$vote_option = mysql_fetch_assoc($check);
							$check = mysql_query("SELECT * FROM $server_db.votes_log WHERE userid = '".$account_information['id']."' AND voteid = '".$vote_option['ID']."' ORDER BY `date` DESC");
							
							function vote()
							{
								global $server_db, $account_information, $vote_option;
								$add_points = mysql_query("UPDATE $server_db.users SET vote_points = vote_points + 1 WHERE id = '".$account_information['id']."'");	
								$date = date('Y-m-d H:i:s',time());
								$add_vote = mysql_query("INSERT INTO $server_db.votes_log (userid,date,voteid) VALUES ('".$account_information['id']."','".$date."','".$vote_option['ID']."')");
								?>
								<SCRIPT LANGUAGE="JavaScript">
								window.open("<?php echo $vote_option['Link']; ?>");
								</SCRIPT>
								<?php
							}
							
							if(mysql_num_rows($check) > 0)
								{
									$last_vote = mysql_fetch_assoc($check);
									$whenIcanvote = strtotime($last_vote['date']) + (12*60*60); // + 12 Hours
									if(time() >= $whenIcanvote)
									{
										vote();
										$voted = 1;
									} else $voted = 0;
								} else { vote(); $voted = 1; }
							
							echo '					
								<div class="subsection">
									<div class="middle">';
										if($voted == 1) echo '!!!';
										else echo '??!';
									echo'
									</div>
									<div class="right">
										<h2 class="caption">'.$Vote['Vote21'].'</h2>';
											if($voted == 1) echo ''.$Vote['Vote22'].'';
											else echo ''.$Vote['Vote23'].'';
										echo'
									</div>
								</div>
							';
							
							echo '<meta http-equiv="refresh" content="3;url=vote.php"/>';
							
							$error = 1;
						
						}
						
					} else $error = 0;
					
					if($error != 1){
						$votes_log = mysql_query("SELECT * FROM $server_db.vote ORDER BY `id` ASC");
							$i=0;
							while($vote = mysql_fetch_array($votes_log))
							{
								$i++;
								$votedx = mysql_query("SELECT * FROM $server_db.votes_log WHERE voteid = '".$vote['ID']."' AND userid = '".$account_information['id']."' ORDER BY `date`	 DESC");
								if(mysql_num_rows($votedx) > 0)
								{
									require_once("../functions/custom.php");
									
									$voted = mysql_fetch_assoc($votedx);
									$last_vote = $voted['date'];
									$whenIcanvote = strtotime($last_vote) + (12*60*60);
									
									if(time() >= $whenIcanvote) $voteable = 1;
									else
									{
										$mYear = date('Y', $whenIcanvote);
										$mMonth = date('m', $whenIcanvote);
										$mDay = date('d', $whenIcanvote);
										$mHour = date('H', $whenIcanvote);
										$mMinute = date('i', $whenIcanvote);
										$mSecond = date('s', $whenIcanvote);
										$target = mktime($mHour, $mMinute, $mSecond, $mMonth, $mDay, $mYear);
										$when = $target - time();
										
										$timp['ore'] = floor(($when%86400)/3600);
										$timp['min'] = floor((($when%86400) - $timp['ore']*3600)/60);
										$timp['sec'] = $when%60;
										
										$voteable = 0;
										
										if($timp['ore'] > 0)
											if($timp['ore'] > 1) $in_time = ''.$timp['ore'].''.$Vote['Vote24'].'';
											else $in_time = ''.$timp['ore'].''.$Vote['Vote34'].'';
										else if($timp['min'] > 0)
											if($timp['min'] > 1) $in_time = ''.$timp['min'].''.$Vote['Vote25'].'';
											else $in_time = ''.$timp['min'].''.$Vote['Vote35'].'';
										else if($timp['sec'] > 0)
											if($timp['sec'] > 1) $in_time = ''.$timp['sec'].''.$Vote['Vote26'].'';
											else $in_time = ''.$timp['sec'].''.$Vote['Vote27'].'';
										else $voteable = 1;
									}
									
									
								} else $voteable = 1;
								
								
								
								echo'					
								<div class="subsection">
									<div class="left">
										';
										if($voteable == 1) echo '<img src="<?php echo BASE_URL ?>wow/static/images/services/wow/raf/en-us/step_02.jpg" alt="" />';
										else echo '<img src="<?php echo BASE_URL ?>wow/static/images/services/wow/raf/en-us/step_01.jpg" alt="" />';
									echo'
									</div>
									<div class="middle">'.$i.'</div>
									<div class="right">
										<h2 class="caption"><a target="_blank" href="'.$vote['Link'].'" onclick="window.location = \'vote.php?id='.$vote['ID'].'\'">'.$vote['Name'].'</a>'.$Vote['Vote28'].'</h2>
										<p>'.$vote['Description'].'</p>';
										echo '<br><br><br>';
										if($voteable == 1) echo '<small>'.$Vote['CanVoteNow'].'</small>';
										else echo '<small>'.$Vote['CanVoteIn'].' '. $in_time . '</small>';
										echo '
									</div>
								</div>
								';
							}
						}
				
				?>
					<br><br><br>
					<div class="subsection">
						<div class="middle">?</div>
						<div class="right">
							<h2 class="caption" id="howitworks"><a href="#"><?php echo $Vote['Vote4']; ?></a></h2>
							<p><?php echo $Vote['Vote30']; ?></p>
							<P><?php echo $Vote['Vote31']; ?></p>
							<p><?php echo $Vote['Vote32']; ?></p>
						</div>
					</div>
				<div class="raf-step3-arrow"></div>
				<div class="raf-step5-arrow"></div>
			</div>
			<span class="clear"><!-- --></span>
		    </div>
		</div>
	</div>
</div>
</div>
</div>
<div id="layout-bottom">
<?php include("../functions/footer_man.php"); ?>
</div>
<script type="text/javascript">
//<![CDATA[
var xsToken = '6c454de7-4409-4ee5-9cbf-84f6f4c4f238';
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
