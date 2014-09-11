<?php
include("../configs.php");
$page_cat = 'gamesncodes';
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
        header('Location: '.BASE_URL.'account_log.php');		
}
if (empty($code))exit;
?>
<!DOCTYPE html>
<html lang="en-gb">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
<title><?php echo TITLE ?> - Donation Shop</title>
<meta content="false" http-equiv="imagetoolbar"/>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
<meta name="description" content="<?php echo DESCRIPTION ?>">
<meta name="keywords" content="<?php echo KEYWORDS ?>">
<link rel="shortcut icon" href="<?php echo BASE_URL ?>wow/static/local-common/images/favicons/wow.png" type="image/x-icon"/>
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/local-common/css/common.css"/>
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/bnet.css"/>
<link rel="stylesheet" media="print" href="<?php echo BASE_URL ?>wow/static/css/bnet-print.css"/>
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/management/get-game.css"/>
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/management/get-game-ie8.css"/>
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/management/dashboard.css"/>
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
						<span class="float-right"><span class="form-req"></span>
						<?php
							$cred_sql = "SELECT * FROM account WHERE id=".$account_information['id'];
							mysql_select_db($server_adb) or die(mysql_error());
							$cred_q = mysql_query($cred_sql);
							$cred = mysql_fetch_array($cred_q);
							echo "<p class=''>Credits:<strong><font color='green'>";
							echo $cred['credits'];
							echo "!</font></strong></p>";
							?>
						</span>
							<h2 class="subcategory"><?php echo $donar['2']; ?></h2>
							<h3 class="headline">Donation Shop</h3>
							<a href=""><img src="<?php echo BASE_URL ?>wow/static/local-common/images/game-icons/wow.png" alt="World of Warcraft" width="48" height="48"/></a>
						</div>
					</div>
				</div>
				<div id="page-content" class="page-content">
					<div class="digital-games" id="digital-games">
						<?php if ($donation_shop == true) { ?>
						<div class="data-grid-container">
							<div class="data-grid-row">
								<form action='<?php echo $_SERVER['PHP_SELF'] ?>' method='post'>
								<div class="form-row required">
									<label for="firstname" class="label-full ">
										<strong><?php echo $name['6']; ?></strong>
										<span class="form-required">*</span>
									</label>
									<input type="" id="firstname" name="account" value="<?php echo strtolower($_SESSION['username']); ?>" class=" input border-5 glow-shadow-2 form-disabled" maxlength="16" tabindex="1" disabled />
								</div>
								<div class="form-row required">
								<label for="type" class="label-full ">
									<strong>Choose your reward</strong>
									<span class="form-required">*</span>
								</label>
									<select name='reward'>
										<?php
										$items_id = mysql_query("SELECT * FROM $server_db.shop_items")or die(mysql_error());
										while($items = mysql_fetch_array($items_id))
										{ ?>
										<option value="<?php echo $items["id"]?>"> <?php echo $items ["name"] ?> - <?php echo $items["price"]?> Credits</option>
										<?php } ?>
									</select>
									</div>
									<br/>
									<div class="form-row required">
										<label for="character" class="label-full">
											<strong><?php echo $name['7']; ?></strong>
											<span class="form-required">*</span>
										</label>
										<select id="character" name="character">
											<?php
											$get_chars = mysql_query("SELECT * FROM $server_cdb.characters WHERE account = '".$account_information['id']."'");
											while($character = mysql_fetch_array($get_chars)){
													echo '<option value="'.$character['guid'].'">'.$character['name'].'</option>';
												}
											?>
										</select>
									</div>
									<br />
									<center>
										<fieldset class="ui-controls" >
										<button class="ui-button button1 " type="submit" name="submit" id="settings-submit" value="Buy Now" tabindex="1">
										<span>
										<span>Buy Now</span>
										</span>
										</button>
										</fieldset>
									</center>
								</form>
								<?php
								if(empty($_POST))
								{}
								elseif(empty($_POST['character']))
									echo "<center><div class='retail-purchase border-3'><p class='caption'>You must fill in all of the required fields.</p></div></center><br/>";
								else
								{
									for($i=1;$i<8;$i++)
										$price[$i] = 200;
									for($i=8;$i<10;$i++)
										$price[$i] = 100;
									if($price[$_POST['reward']] > $cred['credits'])
								 echo "<center><div class='retail-purchase border-3'><p class='caption'>You don't have money.</p></div></center><br/>";
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
								 mysql_select_db($server_adb) or die(mysql_error());
								 mysql_query("UPDATE account SET credits=credits-".$price[$i_mres]." WHERE id=".$account_information['id']);
								 mysql_select_db($server_db) or die(mysql_error());
								 $date = date('Y-m-d H:i:s',time());
								 $add_vote = mysql_query("INSERT INTO shop_log (userid,date,item_id) VALUES ('".$account_information['id']."','".$date."','".$item."')");
								 echo "<center><div class='retail-purchase border-3'><p class='caption'>Thanks for donation. Reward is in your mailbox ingame.!</p></div></center><br/>";
								 echo '<meta http-equiv="refresh" content="4;url='.BASE_URL.'account/"/>';
								 }
								 }
								 ?>
							</div>
							<center>
							<div class="retail-purchase border-3">
								<p class="caption">
									<?php echo $donar['12']; ?>
									<a href="<?php echo $website['root'] ?>account/get-an-item.php" tabindex="1" target="_blank"><?php echo TITLE ?>Store</a>.
								</p>
							</div>
							</center>
							<?php
							}else{
							echo"<center><div class='retail-purchase border-3'><p class='caption'>Right now the Donation Shop is disabled<br />Maintenance</p></div></center>";
							}
							?>
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
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/search.js?v39"></script>
<script src="<?php echo BASE_URL ?>wow/static/js/bam.js?v26"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/tooltip.js?v39"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/menu.js?v39"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js?v39"></script>
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