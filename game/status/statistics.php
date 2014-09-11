<?php
require_once("../../configs.php");
if(isset($_GET['realm'])) $realmid = intval($_GET['realm']); else $realmid = 1;
?>

<!DOCTYPE html> 
<html lang="en-gb">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<title><?php echo TITLE ?> - <?php echo $status['status']; ?></title>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="description" content="<?php echo DESCRIPTION ?>">
<meta name="keywords" content="<?php echo KEYWORDS ?>">
<link rel="shortcut icon" href="../../wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="stylesheet" href="../../wow/static/local-common/css/common.css?v17" />
<link rel="stylesheet" href="../../wow/static/css/wow.css?v7" />
<link rel="stylesheet" href="../../wow/static/css/status/stats.css?v7" />
<script src="../../wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script src="../../wow/static/local-common/js/core.js?v17"></script>
<script src="../../wow/static/local-common/js/tooltip.js?v17"></script>
<script src="../../wow/static/local-common/js/stats_tooltip.js?v1"></script>
<script src="../../wow/static/local-common/js/main.js"></script>
<script src="../../wow/static/local-common/js/utils.js"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
Core.staticUrl = '/wow/static';
Core.sharedStaticUrl= '/wow/static/local-common';
Core.baseUrl = '/wow/en';
Core.project = 'wow';
Core.locale = 'en-gb';
Core.buildRegion = 'eu';
Core.shortDateFormat= 'dd/MM/Y';
Core.loggedIn = false;
Flash.videoPlayer = 'http://eu.media.blizzard.com/wow/player/videoplayer.swf';
Flash.videoBase = 'http://eu.media.blizzard.com/wow/media/videos';
Flash.ratingImage = 'http://eu.media.blizzard.com/wow/player/rating-pegi.jpg';
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-544112-16']);
_gaq.push(['_setDomainName', '.battle.net']);
_gaq.push(['_trackPageview']);
//]]>
</script>
<script type="text/javascript">
			$(function(){

				// Accordion
				$("#accordion").accordion({ header: "h3" });
	
				// Tabs
				$('#tabs').tabs();
	

				// Dialog			
				$('#wow').dialog({
					autoOpen: false,
					width: 600,
					buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}
				});
				
				// About Link
				$('#wow_link').click(function(){
					$('#wow').dialog('open');
					return false;
				});

				// About	
				$('#about').dialog({
					autoOpen: false,
					width: 600,
					buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}
				});
				
				// Dialog Link
				$('#about_link').click(function(){
					$('#about').dialog('open');
					return false;
				});

				// About	
				$('#la2').dialog({
					autoOpen: false,
					width: 600,
					buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}
				});
				
				// Dialog Link
				$('#la2_link').click(function(){
					$('#la2').dialog('open');
					return false;
				});

				// About	
				$('#comm').dialog({
					autoOpen: false,
					width: 600,
					buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}
				});
				
				// Dialog Link
				$('#comm_link').click(function(){
					$('#comm').dialog('open');
					return false;
				});

				// About	
				$('#news').dialog({
					autoOpen: false,
					width: 600,
					buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}
				});
				
				// Dialog Link
				$('#news_link').click(function(){
					$('#news').dialog('open');
					return false;
				});

				

				// Datepicker
				$('#datepicker').datepicker({
					inline: true
				});
				
				// Slider
				$('#slider').slider({
					range: true,
					values: [17, 67]
				});
				
				// Progressbar
				$("#progressbar").progressbar({
					value: 20 
				});
				
				//hover states on the static widgets
				$('#dialog_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); }, 
					function() { $(this).removeClass('ui-state-hover'); }
				);
				//hover states on the static widgets
				$('#about_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); }, 
					function() { $(this).removeClass('ui-state-hover'); }
				);
				//hover states on the static widgets
				$('#la2_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); }, 
					function() { $(this).removeClass('ui-state-hover'); }
				);
				//hover states on the static widgets
				$('#wow_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); }, 
					function() { $(this).removeClass('ui-state-hover'); }
				);
				//hover states on the static widgets
				$('#comm_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); }, 
					function() { $(this).removeClass('ui-state-hover'); }
				);

				//hover states on the static widgets
				$('#news_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); }, 
					function() { $(this).removeClass('ui-state-hover'); }
				);
				
			});
		</script>
</head>
<body class="en-gb game-index"><div id="predictad_div" class="predictad" style="display: none; left: 788px; top: 104px; width: 321px; "></div>

<div id="wrapper">
<?php
$page_cat="game";
include("../../header.php");
$realm_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE id = '".$realmid."'"));
if(!$realm_extra) $realm_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE id = '1'"));
$realm = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.realmlist WHERE id = '".$realm_extra['realmid']."'"));
$server_cdb = $realm_extra['char_db'];
$server_wdb = $realm_extra['world_db'];

$realms = mysql_query("SELECT * FROM realms");
$realm_count = mysql_num_rows($realms);
?>
<div id="content">
<div class="content-top">
<div class="content-trail">
<ol class="ui-breadcrumb">
<li><a href="index.php" rel="np"><?php echo TITLE ?></a>
<span class="breadcrumb-arrow"></span></li>
<li class="last"><a href="" rel="np"><?php echo $Status['RlmStat']; ?></a></li>
</ol>
</div>
<div class="content-bot">
<span class="clear"><!-- --></span><div class="content-header">
<h2 class="header "><?php echo $Status['RlmStat']; ?></h2></div>
<div class="desc" style="padding: 10px;"><?php echo $Status['Stat5']; ?><?php echo $realm['name']; ?><?php echo $Status['Stat6']; ?><a href="forum/category/?f=27"><?php echo $Status['Stat7']; ?></a><?php echo $Status['Stat8']; ?></div>
	<span class="clear"><!-- --></span>
<?php
	
	if (isset($_GET['page'])) {
		if (preg_match("/^[a-zA-Z0-9_]+$/", $_GET['page'])) {
			@$page = strtolower($_GET['page']);
		} else { $page = 'main'; }
	} else { $page = 'main'; }
	
	if (isset($_GET['do'])) {
		if (preg_match("/^[a-zA-Z0-9_]+$/", $_GET['do'])) {
			@$do = strtolower($_GET['do']);
		} else { $do = ''; }
	} else { $do = ''; }
	
	if (isset($_GET['realm'])) {
		if (preg_match("/^[0-9]+$/", $_GET['realm'])) {
			@$realm_num = $_GET['realm'];
			if ($realm_num < '1' || $realm_num > $realm_count) { $realm_num = '1';} 
		} else { $realm_num = '1'; }
	} else { $realm_num = '1'; }
	
	if (isset($_GET['guid'])) {
		if (preg_match("/^[0-9]+$/", $_GET['guid'])) {
			@$guid = $_GET['guid'];
		} else { $guid = '1'; }
	} else { $guid = '1'; }
	
	if (isset($_GET['vote'])) {
		if (preg_match("/^[0-9]+$/", $_GET['vote'])) {
			@$vote = $_GET['vote'];
			if ($vote < '1' || $vote > $vote_count) { $vote = '';} 
		} else { $vote = ''; }
	} else { $vote = ''; }
	
	if ($page == "main"){
		$page_mtitle = @$str[$lang]['0'];
		$page_path = "./modules/main/main_page_$lang.php";
	} elseif($page=="statistics"){
		$page_mtitle = @$str[$lang]['9'];
		$page_path = "./modules/statistics_page.php";
	}
    
	for ($i = 1; $i <= $realm_count; $i++) {
		$ConnectDB[$i] = @mysql_connect($serveraddress, $serveruser, $serverpass);
		$fp[$i] = @fsockopen ($server_path[$i], $server_port[$i], $errno, $errstr, 0.5);
		@mysql_query("SET NAMES '$mysql_cod'", $ConnectDB[$i]);
	}
	$ConnectDB['cms'] = @mysql_connect($serveraddress, $serveruser, $serverpass);
	@mysql_query("SET NAMES '$mysql_cod'", $ConnectDB['cms']);
	 
?>
<?php
	if ($ConnectDB[$realm_num]) {
		$statistics_chars_count_a = 0;
		$statistics_chars_count_h = 0;
		$statistics_chars_count = 0;
		$online_chars_count_a = 0;
		$online_chars_count_h = 0;
		$statistics_race_count = array("");
		$statistics_class_count = array(array(""), array(""));
		
		$i = 0;
		while ($i <= 22) {
			$statistics_race_count[$i]=0;
			$statistics_class_count[$i][0]=0;
			$statistics_race_count[$i]=0;
			$statistics_class_count[$i][1]=0;
			$i++;
		}
		
		$online_user_db = @mysql_query("SELECT * FROM `".$server_cdb."`.`characters` WHERE online = 1", $ConnectDB[$realm_num]);
		if ($online_user_db) {
			while($result = mysql_fetch_array($online_user_db)){
				if ($result['race'] == 1 || $result['race'] == 3 || $result['race'] == 4 || $result['race'] == 7 || $result['race'] == 11 || $result['race'] == 22) { 
					$online_chars_count_a++;
				} else {
					$online_chars_count_h++;
				}
			}
		}
		
		$statistics_user_db = @mysql_query("SELECT * FROM `".$server_cdb."`.`characters`", $ConnectDB[$realm_num]);
		if ($statistics_user_db) {
			while($result = mysql_fetch_array($statistics_user_db)){
				if ($result['race'] == 1 || $result['race'] == 3 || $result['race'] == 4 || $result['race'] == 7 || $result['race'] == 11 || $result['race'] == 22) { 
					$statistics_chars_count_a++;
					$statistics_race_count[$result['race']]++;
					$statistics_class_count[$result['class']][0]++;
				} else {
					$statistics_chars_count_h++;
					$statistics_race_count[$result['race']]++;
					$statistics_class_count[$result['class']][1]++;
				}
				$statistics_chars_count++;
			}
		}
		
		if (!($fp[$realm_num])) { $online_chars_count_a = 0; $online_chars_count_h = 0; }
		
		$statistics_page ="
            <style>td { padding:0 4px 0 4px; }</style>
			<table width=\"100%\" border=\"0\" class=\"list_table\">
				<tr><td align=\"center\" height=\"20\"></tr>
				<tr>
					<td align=\"center\">
					<div class=\"content-header\">
				<h3 class=\"header\"><font color=\"2062A3\">".$Status['Ali']."</font></h3></div>
						<img src=\"../../wow/static/images/character/summary/sidebar-bg-alliance.png\" onmouseover=\"Tip('".@$str[$lang]['40'][0]."', WIDTH, 150, OFFSETX, 10, OFFSETY, -40, STICKY, false);\"><br>
						<br>
						<font color=\"2062A3\">".$Status['Ali']."</font>".$Status['CharCreat']."$statistics_chars_count_a<br>
						<font color=\"2062A3\">".$Status['Ali']."</font>".$Status['CharOn']." $online_chars_count_a
					</td>
					<td align=\"center\">
					<div class=\"content-header\">
				<h3 class=\"header\"><font color=\"A22A1A\">".$Status['Horde']."</font></h3></div>
						<img src=\"../../wow/static/images/character/summary/sidebar-bg-horde.png\" onmouseover=\"Tip('".@$str[$lang]['40'][1]."', WIDTH, 150, OFFSETX, 10, OFFSETY, -40, STICKY, false);\"><br>
						<br>
						<font color=\"A22A1A\">".$Status['Horde']."</font>".$Status['CharCreat']."$statistics_chars_count_h<br>
						<font color=\"A22A1A\">".$Status['Horde']."</font>".$Status['CharOn']."$online_chars_count_h
					</td>
				</tr>
				<tr>
					<td align=\"center\" colspan=\"2\">
						<br><b><div class=\"content-header\">
				<h3 class=\"header\">".$Status['StatClass']."</h3></div></b><br><br>
					</td>
				</tr>
				<tr>
					<td align=\"center\">
						<table align=\"center\" width=\"100\" border=\"0\" class=\"list_table\">
							<tr>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Warrior']."'><img src=\"../../wow/static/images/icons/big/1.gif\" height=\"32\" width=\"32\" ><br>".$statistics_class_count[1][0]."</td></span>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Paladin']."'><img src=\"../../wow/static/images/icons/big/2.gif\" height=\"32\" width=\"32\" ><br>".$statistics_class_count[2][0]."</td></span>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Hunter']."'><img src=\"../../wow/static/images/icons/big/3.gif\" height=\"32\" width=\"32\" ><br>".$statistics_class_count[3][0]."</td></span>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Rogue']."'><img src=\"../../wow/static/images/icons/big/4.gif\" height=\"32\" width=\"32\" ><br>".$statistics_class_count[4][0]."</td></span>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Priest']."'><img src=\"../../wow/static/images/icons/big/5.gif\" height=\"32\" width=\"32\" ><br>".$statistics_class_count[5][0]."</td></span>
							</tr>
							<tr>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['DeathKnight']."'><img src=\"../../wow/static/images/icons/big/6.gif\" height=\"32\" width=\"32\" ><br>".$statistics_class_count[6][0]."</td></span>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Shaman']."'><img src=\"../../wow/static/images/icons/big/7.gif\" height=\"32\" width=\"32\" ><br>".$statistics_class_count[7][0]."</td></span>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Mage']."'><img src=\"../../wow/static/images/icons/big/8.gif\" height=\"32\" width=\"32\" ><br>".$statistics_class_count[8][0]."</td></span>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Warlock']."'><img src=\"../../wow/static/images/icons/big/9.gif\" height=\"32\" width=\"32\" ><br>".$statistics_class_count[9][0]."</td></span>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Druid']."'><img src=\"../../wow/static/images/icons/big/11.gif\" height=\"32\" width=\"32\" ><br>".$statistics_class_count[11][0]."</td></span>
							</tr>
						</table>
					</td>
					<td align=\"center\">
						<table align=\"center\" width=\"100\" border=\"0\" class=\"list_table\">
							<tr>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Warrior']."'><img src=\"../../wow/static/images/icons/big/1.gif\" height=\"32\" width=\"32\" ><br>".$statistics_class_count[1][1]."</td></span>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Paladin']."'><img src=\"../../wow/static/images/icons/big/2.gif\" height=\"32\" width=\"32\" ><br>".$statistics_class_count[2][1]."</td></span>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Hunter']."'><img src=\"../../wow/static/images/icons/big/3.gif\" height=\"32\" width=\"32\" ><br>".$statistics_class_count[3][1]."</td></span>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Rogue']."'><img src=\"../../wow/static/images/icons/big/4.gif\" height=\"32\" width=\"32\" ><br>".$statistics_class_count[4][1]."</td></span>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Priest']."'><img src=\"../../wow/static/images/icons/big/5.gif\" height=\"32\" width=\"32\" ><br>".$statistics_class_count[5][1]."</td></span>
							</tr>
							<tr>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['DeathKnight']."'><img src=\"../../wow/static/images/icons/big/6.gif\" height=\"32\" width=\"32\" ><br>".$statistics_class_count[6][1]."</td></span>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Shaman']."'><img src=\"../../wow/static/images/icons/big/7.gif\" height=\"32\" width=\"32\" ><br>".$statistics_class_count[7][1]."</td></span>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Mage']."'><img src=\"../../wow/static/images/icons/big/8.gif\" height=\"32\" width=\"32\" ><br>".$statistics_class_count[8][1]."</td></span>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Warlock']."'><img src=\"../../wow/static/images/icons/big/9.gif\" height=\"32\" width=\"32\" ><br>".$statistics_class_count[9][1]."</td></span>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Druid']."'><img src=\"../../wow/static/images/icons/big/11.gif\" height=\"32\" width=\"32\" ><br>".$statistics_class_count[11][1]."</td></span>
							</tr>
						</table>
					</td>
				</tr>
				<tr>
					<td align=\"center\" colspan=\"2\">
						<br><b><div class=\"content-header\">
				<h3 class=\"header\">".$Status['StatRace']."</h3></div></b><br><br>
					</td>
				</tr>
				<tr>
					<td align=\"center\">
						<table align=\"center\" width=\"100\" border=\"0\" class=\"list_table\">
							<tr>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Human']."'><img src=\"../../wow/static/images/icons/big/1-0.gif\" height=\"32\" width=\"32\" ><br>".$statistics_race_count[1]."</td></span>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Dwarf']."'><img src=\"../../wow/static/images/icons/big/3-0.gif\" height=\"32\" width=\"32\" ><br>".$statistics_race_count[3]."</td></span>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['NightElf']."'><img src=\"../../wow/static/images/icons/big/4-0.gif\" height=\"32\" width=\"32\" ><br>".$statistics_race_count[4]."</td></span>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Gnome']."'><img src=\"../../wow/static/images/icons/big/7-0.gif\" height=\"32\" width=\"32\" ><br>".$statistics_race_count[7]."</td></span>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Draenei']."'><img src=\"../../wow/static/images/icons/big/11-0.gif\" height=\"32\" width=\"32\"><br>".$statistics_race_count[11]."</td></span>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Worgen']."'><img src=\"../../wow/static/images/icons/big/22-0.gif\" height=\"32\" width=\"32\" ><br>".$statistics_race_count[22]."</td></span>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Pandaren']."'><img src=\"../../wow/static/images/icons/big/26-0.gif\" height=\"32\" width=\"32\"><br>0</td>
							</tr>
						</table>
					</td>
					<td align=\"center\">
						<table align=\"center\" width=\"100\" border=\"0\" class=\"list_table\">
							<tr>
							
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Orc']."'><img src=\"../../wow/static/images/icons/big/2-0.gif\" height=\"32\" width=\"32\" ><br>".$statistics_race_count[2]."</td>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Undead']."'><img src=\"../../wow/static/images/icons/big/5-0.gif\" height=\"32\" width=\"32\" ><br>".$statistics_race_count[5]."</td>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Tauren']."'><img src=\"../../wow/static/images/icons/big/6-0.gif\" height=\"32\" width=\"32\" ><br>".$statistics_race_count[6]."</td>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Troll']."'><img src=\"../../wow/static/images/icons/big/8-0.gif\" height=\"32\" width=\"32\" ><br>".$statistics_race_count[8]."</td>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['BloodElf']."'><img src=\"../../wow/static/images/icons/big/10-0.gif\" height=\"32\" width=\"32\"><br>".$statistics_race_count[10]."</td>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Goblin']."'><img src=\"../../wow/static/images/icons/big/9-0.gif\" height=\"32\" width=\"32\"><br>".$statistics_race_count[9]."</td>
								<td width=\"100\" align=\"center\"><span class=/'icon-frame frame-14/' data-tooltip='".$Status['Pandaren']."'><img src=\"../../wow/static/images/icons/big/26-0.gif\" height=\"32\" width=\"32\"><br>0</td>
							</tr>
						</table>
					</td>
				</tr>
				
			</table>
			";
	} else { $statistics_page =
				 "<br>
				 <center>".@$str[$lang]['44']."</center>
				 <br>";}
?>
<div class="mb_top" style="padding: 10px;"><?php echo @$str[$lang]['59'];?> <strong><?php echo $realm['name'];?></strong> Realm</div>
<div class="mb_main">
<?php echo $statistics_page;?>
</div>
<div class="mb_down"></div>
<br><span class="clear"><!-- --></span><br><br>
<div class="faction-req">
<center><span class="req mists"><?php echo $Status['Pandaren']; ?></span><br>
<span class='icon-frame frame-32' data-tooltip='Pandaren'><img src="../../wow/static/local-common/images/icons/panda.jpg" height="32" width="32"></span><br>
<span class="req mists"><?php echo $Status['ReqMistPand']; ?></span><Br>
<span class="req cataclysm"><?php echo $Status['PandNoAval']; ?></span></center></div>
<br>
<span class="clear"><!-- --></span>
<span class="clear"><!-- --></span>
<br><br><br><br>
<div id="all-realms">
	<div class="table full-width"><table></table></div>
</div>
<span class="clear"><!-- --></span>
</div>
</div>
</div>
<?php include("../../footer.php"); ?>
<div id="fansite-menu" class="ui-fansite"></div><div id="menu-container"></div><ul class="ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all" role="listbox" aria-activedescendant="ui-active-menuitem" style="z-index: 6; top: 0px; left: 0px; display: none; "></ul></body>
</html>
