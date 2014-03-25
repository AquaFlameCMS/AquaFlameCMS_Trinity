<?php
include("../configs.php");
$page_cat = 'gamesncodes';
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
        header('Location: '.$website['root'].'account_log.php');		
}
$code = "f7c3bc1d808e04732adf679965ccc34ca7ae3441";
$service_donate  = 1;    // 1 - on  ;  0 -off
?>
<!DOCTYPE html>
<html lang="en-gb">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
<title><?php echo $website['title']; ?> - Donation Shop</title>
<meta content="false" http-equiv="imagetoolbar"/>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
<meta name="description" content="<?php echo $website['description']; ?>">
<meta name="keywords" content="<?php echo $website['keywords']; ?>">
<link rel="shortcut icon" href="../wow/static/local-common/images/favicons/wow.png" type="image/x-icon"/>
<link rel="stylesheet" media="all" href="../wow/static/local-common/css/common.css"/>
<link rel="stylesheet" media="all" href="../wow/static/css/bnet.css"/>
<link rel="stylesheet" media="print" href="../wow/static/css/bnet-print.css"/>
<link rel="stylesheet" media="all" href="../wow/static/css/management/get-game.css"/>
<link rel="stylesheet" media="all" href="../wow/static/css/management/get-game-ie8.css"/>
<link rel="stylesheet" media="all" href="../wow/static/css/management/dashboard.css"/>
<script src="../wow/static/local-common/js/third-party/jquery.js"></script>
<script src="../wow/static/local-common/js/core.js"></script>
<script src="../wow/static/local-common/js/tooltip.js"></script>
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
							<h2 class="subcategory"><?php echo $donar['2']; ?>
							</h2>
							<h3 class="headline"><?php echo $donar['3']; ?>
							</h3>
							<a href=""><img src="../wow/static/local-common/images/game-icons/wow.png" alt="World of Warcraft" width="48" height="48"/></a>
						</div>
					</div>
				</div>
				<div id="page-content" class="page-content">
					<div class="digital-games" id="digital-games">
						<div class="data-grid-container">
							<div class="data-grid-row">
								<center>
								<?php
								$cred_sql = "SELECT * FROM account WHERE id=".$_SESSION['id'];
								mysql_select_db($server_adb) or die(mysql_error());
								$cred_q = mysql_query($cred_sql);
								$cred = mysql_fetch_array($cred_q);
								echo "Credits:";
								echo $cred['credits'];
								echo "<br />
								<br/>"; ?>
								<form action='<?php echo $_SERVER['PHP_SELF'] ?>' method='post'>
									<select name='reward'>
										<option value=1>Amani War Bear - 200Credits</option>
										<option value=2>Swift Zhevra - 200Credits</option>
										<option value=3>Reins of the Swift Spectral Tiger - 200Credits</option>
										<option value=4>Peep's Whistle - 200Credits</option>
										<option value=5>X-51 Nether-Rocket X-TREME - 200Credits</option>
										<option value=6>Mimiron's Head - 200Credits</option>
										<option value=7>The Horseman's Reins - 200Credits</option>
										<option value=8>Pandaren Monk - 100Credits</option>
										<option value=9>Gryphon Hatchling - 100Credits</option>
									</select>
									<br/>
									<?php
									mysql_select_db($server_cdb) or die(mysql_error());
									$charss_sql = mysql_query("SELECT * FROM $server_cdb.characters WHERE account=".$_SESSION['id']."")or die(mysql_error());
										while($chars = mysql_fetch_array($charss_sql))
									{
									echo $chars['name']."<input type='radio' name='character' value='".$chars['guid']."'>
									<br/>";
									} ?>
									<input type='submit' value='Buy Now'>
								</form>
								<?php
								if(empty($_POST))
								{}
								elseif(empty($_POST['character']))
									echo "You must fill in all of the required fields.";
								else
								{
									for($i=1;$i<8;$i++)
										$price[$i] = 200;
									for($i=8;$i<10;$i++)
										$price[$i] = 100;
									if($price[$_POST['reward']] >
								 $cred['credits'])
								 echo "You don't have money.";
								 else {
								 switch($_POST['reward'])
								 {
								 case 1: $item = 33809;
								 break;
								 case 2: $item = 37719;
								 break;
								 case 3: $item = 49284;
								 break;
								 case 4: $item = 25596;
								 break;
								 case 5: $item = 49286;
								 break;
								 case 6: $item = 45693;
								 break;
								 case 7: $item = 37012;
								 break;
								 case 8: $item = 49665;
								 break;
								 case 9: $item = 49662;
								 break;
								 }
								 $char = mysql_real_escape_string($_POST['character']);
								 $i_mres = mysql_real_escape_string($_POST['reward']);
								 $item_last_id_sql = "SELECT * FROM item_instance ORDER BY guid DESC LIMIT 1";
								 $mail_last_id_sql = "SELECT * FROM mail ORDER BY id DESC LIMIT 1";
								 mysql_select_db($server_cdb) or die(mysql_error());
								 $item_last_id_q = mysql_query($item_last_id_sql);
								 $mail_last_id_q = mysql_query($mail_last_id_sql);
								 $item_last_id = mysql_fetch_array($item_last_id_q);
								 $mail_last_id = mysql_fetch_array($mail_last_id_q);
								 if(empty($item_last_id['guid'])) $item_last_id['guid'] = 1000000;
								 else $item_last_id['guid'] += 1000000;
								 if(empty($mail_last_id['id'])) $mail_last_id['id'] = 1000000;
								 else $mail_last_id['id'] += 1000000;
								 mysql_query("INSERT INTO item_instance VALUES ('".$item_last_id['guid']."', '".$item."', '".$char."', 0, 0, 1, 0, '-1 0 0 0 0 ', 0, '0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 ', '0', '0', '0', '')");
								 mysql_query("INSERT INTO mail_items VALUES ('".$mail_last_id['id']."', '".$item_last_id['guid']."', '".$char."')");
								 mysql_query("INSERT INTO mail VALUES ('".$mail_last_id['id']."', '0', '61', '0', '1', '1', 'Donate', 'Thanks for donation. Reward is in your mailbox ingame.', '1', '".(time()+2592000)."', '".time()."', '0', '0', '0')");
								 mysql_select_db($server_adb) or die(mysql_error()); mysql_query("UPDATE account SET credits=credits-".$price[$i_mres]." WHERE id=".$_SESSION['id']);
								 echo "Thanks for donation. Reward is in your mailbox ingame.<br/>";
								 echo '<meta http-equiv="refresh" content="4;url='.$website['root'].'account/"/>';
								 }
								 }
								 ?> 
							   </center>
							</div>
							<center>
							<div class="retail-purchase border-3">
								<p class="caption">
									<?php echo $donar['12']; ?>
									<a href="#" tabindex="1" target="_blank"><?php echo $website['title']; ?>Store</a>.
								</p>
							</div>
							</center>
						</div>
					</div>
					<br/>
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
</div>
<script src="../wow/static/local-common/js/search.js?v39"></script>
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