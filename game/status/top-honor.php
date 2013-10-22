<?php
require_once("../../configs.php");
if(isset($_GET['realm'])) $realmid = intval($_GET['realm']); else $realmid = 1;
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<html lang="en-gb">
<head>
<title><?php echo $website['title']; ?>
 - <?php echo $status['status']; ?>
</title>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
<link rel="shortcut icon" href="../../wow/static/local-common/images/favicons/wow.png" type="image/x-icon"/>
<link rel="stylesheet" href="../../wow/static/local-common/css/common.css?v15"/>
<link rel="stylesheet" href="../../wow/static/css/wow.css?v7"/>
<link rel="stylesheet" href="../../wow/static/css/status/realmstatus.css?v7"/>
<script src="../../wow/static/local-common/js/third-party/jquery-1.4.4.min.js"></script>
<script src="../../wow/static/local-common/js/core.js?v15"></script>
<script src="../../wow/static/local-common/js/tooltip.js?v15"></script>
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
Core.loggedIn = false;
Flash.videoPlayer = 'http://eu.media.blizzard.com/wow/player/videoplayer.swf';
Flash.videoBase = 'http://eu.media.blizzard.com/wow/media/videos';
Flash.ratingImage = '../../../eu.media.blizzard.com/wow/player/rating-pegi.jpg';
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-544112-16']);
_gaq.push(['_setDomainName', '.battle.net']);
_gaq.push(['_trackPageview']);
//]]>
</script>
<body class="en-gb game-index">
<div id="predictad_div" class="predictad" style="display: none; left: 788px; top: 104px; width: 321px; ">
</div>
<div id="wrapper">
	<?php 
$page_cat="game";
include("../../header.php");
?>
	<div id="content">
		<div class="content-top">
			<div class="content-trail">
				<ol class="ui-breadcrumb">
					<li>
					<a href="index.php" rel="np"><?php echo $website['title']; ?>
					</a>
					<span class="breadcrumb-arrow"></span>
					</li>
					<li><a href="<?php echo $website['root']; ?>game/status/" rel="np"><?php echo $status['status']; ?>
					</a><span class="breadcrumb-arrow"></span></li>
					<li><a href="<?php echo $website['root']; ?>game/status/online.php" rel="np"><?php echo $Status['RealmStat']; ?>
					</a><span class="breadcrumb-arrow"></span></li>
					<li><a href="top-honor.php" rel="np">Top Honor</a><span class="breadcrumb-arrow"></span></li>
					<li class="last children"><a href="" rel="np"><?php
$realm_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE id = '".$realmid."'"));
if(!$realm_extra) $realm_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE id = '1'"));
$realm = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.realmlist WHERE id = '".$realm_extra['realmid']."'"));
echo $realm['name']; 
?>
					</a>
					</li>
				</ol>
			</div>
			<div class="content-bot">
				<div class="content-header">
					<h2 class="header "><?php echo $name_realm1['realm']; ?>
					</h2>
					<div class="desc">
						This page lists all available <?php echo $website['title']; ?>
						 Players inside the <?php echo $name_realm1['realm']; ?>
						 Realms as well as the stats of each. The Character can be listed as either Horde or Alliance. Let us apologize in advance if you find any player that is not listed, it takes 5 seconds to refresh the list.
					</div>
					<span class="clear">
					<!-- -->
					</span>
				</div>
				<div id="realm-status">
					<?php include("../../functions/status_nav.php"); ?>
					<div class="filter-toggle">
						<a href="javascript:;" class="selected" onclick="RealmStatus.filterToggle(this)">
						</a>
					</div>
					<span class="clear">
					<!-- -->
					</span>
					<div id="realm-filters" class="table-filters">
						<form action="#">
							<div class="filter">
								<label for="filter-status">Faction</label>
								<select id="filter-status" class="input select" data-filter="column" data-column="0">
									<option value="">All</option>
									<option value="up">Alliance</option>
									<option value="down">Horde</option>
								</select>
							</div>
							<div class="filter">
								<label for="filter-name">Name</label>
								<input type="text" class="input" id="filter-name" data-filter="column" data-column="1"/>
							</div>
							<div class="filter">
								<label for="filter-type">Race</label>
								<select id="filter-type" class="input select" data-filter="column" data-column="2">
									<option value="">All</option>
									<option value="pve">
									Human </option>
									<option value="rppvp">
									Dwarf </option>
									<option value="pvp">
									Night Elf </option>
									<option value="rp">
									Gnome </option>
									<option value="rp">
									Draenei </option>
									<option value="rp">
									Worgen </option>
									<option value="rp">
									Orc </option>
									<option value="rp">
									Troll </option>
									<option value="rp">
									Tauren </option>
									<option value="rp">
									Undead </option>
									<option value="rp">
									Blood Elf </option>
									<option value="rp">
									Goblin </option>
								</select>
							</div>
							<div class="filter">
								<label for="filter-population">Class</label>
								<select id="filter-population" class="input select" data-filter="column" data-column="3">
									<option value="">All</option>
									<option value="high">Warrior</option>
									<option value="medium">Paladin</option>
									<option value="n/a">Rogue</option>
									<option value="low">Mage</option>
									<option value="low">Druid</option>
									<option value="low">Warlock</option>
									<option value="low">Hunter</option>
									<option value="low">Shaman</option>
									<option value="low">Priest</option>
									<option value="low">Death Knight</option>
								</select>
							</div>
							<div class="filter">
								<label for="filter-locale">Level</label>
								<select id="filter-locale" class="input select" data-column="4" data-filter="column">
									<option value="">All</option>
									<option value="spanish">Cataclysm Levels</option>
									<option value="german">WoTLK Levels</option>
									<option value="french">Burning Crusade Levels</option>
									<option value="tournament">Vanilla Levels</option>
								</select>
							</div>
							<div class="filter">
								<label for="filter-queue">Location</label>
								<input type="checkbox" id="filter-queue" class="input" value="true" data-column="5" data-filter="column"/>
							</div>
							<div class="filter" style="margin: 5px 0 5px 15px">
								<button class="ui-button button1 " type="button" id="filter-button" onclick="RealmStatus.reset();">
								<span>
								<span>Reset</span>
								</span>
								</button>
							</div>
							<span class="clear">
							<!-- -->
							</span>
						</form>
					</div>
				</div>
				<span class="clear">
				<!-- -->
				</span>
		<div id="all-realms">
	<div class="table full-width">
		<table>
			<thead>
				<tr>
<?php
$connect = mysql_connect($serveraddress, $serveruser, $serverpass, $serverport) or die(mysql_error()); 
mysql_select_db($server_cdb,$connect) or die(mysql_error()); 
$result = mysql_query("SELECT * FROM `characters` ORDER BY `totalKills` DESC LIMIT 0 , 100 ") or die(mysql_error());
$numrows = mysql_num_rows($result);
if($numrows > 0)
?>
<table border="1" width="100%" style="border: 1px solid #c0c0c0;border-collapse:collapse;" align="center">
<div id="all-realms">
	<div class="table full-width">
		<table>
			<thead>
				<tr>
					<th width="1%"><a href="javascript:;" class="sort-link"><span class="arrow">&#35;</span></a></th>
					<th><a href="javascript:;" class="sort-link"><span class="arrow">Name</span></a></th>
					<th><a href="javascript:;" class="sort-link"><span class="arrow">Level</span></a></th>
					<th><a href="javascript:;" class="sort-link"><span class="arrow">Top Honor</span></a></th>
					<th><a href="javascript:;" class="sort-link"><span class="arrow">Total Kills</span></a></th>
					<th><a href="javascript:;" class="sort-link"><span class="arrow">Class</span></a></th>
					<th><a href="javascript:;" class="sort-link"><span class="arrow">Server</span></a></th>
					</tr>
				</thead>
    <tbody>              
<?php

while($rows = mysql_fetch_object($result))
 
{ 
 $i++; 
 $name = $rows->name; 
 $level = $rows->level;  
 $Total_Kills = $rows->totalKills;
 $Total_Honor = $rows->totalHonorPoints;
 while($rows = mysql_fetch_array($result))
 $cclass = $rows['class'];
 if ($cclass == 1)
 {
 $class = "<img src='../../wow/static/images/icons/class/1.gif' width='18' height='18'/>";
 }
 elseif ($cclass == 2)
 {
 $class = "<img src='../../wow/static/images/icons/class/2.gif' width='18' height='18'/>";
 }
 elseif ($cclass == 3)
 {
 $class = "<img src='../../wow/static/images/icons/class/3.gif' width='18' height='18'/>";
 }
 elseif ($cclass == 4)
 {
 $class = "<img src='../../wow/static/images/icons/class/4.gif' width='18' height='18'/>";
 }
 elseif ($cclass == 5)
 {
 $class = "<img src='../../wow/static/images/icons/class/5.gif' width='18' height='18'/>";
 }
 elseif ($cclass == 6)
 {
 $class = "<img src='../../wow/static/images/icons/class/6.gif' width='18' height='18'/>";
 }
 elseif ($cclass == 7)
 {
 $class = "<img src='../../wow/static/images/icons/class/7.gif' width='18' height='18'/>";
 }
 elseif ($cclass == 8)
 {
 $class = "<img src='../../wow/static/images/icons/class/8.gif' width='18' height='18'/>";
 }
 elseif ($cclass == 9)
 {
 $class = "<img src='../../wow/static/images/icons/class/9.gif' width='18' height='18'/>";
 }
 elseif ($cclass == 11)
 {
 $class = "<img src='../../wow/static/images/icons/class/11.gif' width='18' height='18'/>";
 }
 // Alliance or Horde FLAG
if($rrace == 2 || $rrace == 5 || $rrace == 6 || $rrace == 8 || $rrace == 9 || $rrace == 10)
{
$bg = "<img src='../../wow/static/images/icons/faction/ally.gif' width='18' height='18'/>";
}
elseif($rrace == 1 || $rrace == 3 || $rrace == 4 || $rrace == 7 || $rrace == 11 || $rrace == 22)
{
$bg = "<img src='../../wow/static/images/icons/faction/horde.gif' width='18' height='18'/>";
}
    echo " 
	<tr>
 <td style=''>",$i,"</td>
 <td><center>".$bg."",$name,"</center></td>
 <td><center>",$level,"</center></td>
 <td><center>",$Total_Honor,"</center></td>
 <td><center>",$Total_Kills,"</center></td>
 <td><center>",$class,"</center></td>
 <td>",$name_realm1['realm'],"</td>
  </tr>"; 
echo '</tr>';
echo"</table><br/>";
} 
?>
<div id="all-realms">
	<div class="table full-width">
		<table>
			<thead>
				<tr>
<?php
$connect = mysql_connect($serveraddress, $serveruser, $serverpass, $serverport) or die(mysql_error()); 
mysql_select_db($server_cdb,$connect) or die(mysql_error()); 
$result = mysql_query("SELECT * FROM `characters` ORDER BY `totalKills` DESC LIMIT 0 , 100 ") or die(mysql_error());
$numrows = mysql_num_rows($result);
if($numrows > 0)
?>
 <tbody>              
<!--<?php

while($rows = mysql_fetch_object($result))
 
{ 
 $i++; 
 $name = $rows->name; 
 $level = $rows->level;  
 $Total_Kills = $rows->totalKills;
 $Total_Honor = $rows->totalHonorPoints;
 while($rows = mysql_fetch_array($result))
 $cclass = $rows['class'];
 if ($cclass == 1)
 {
 $class = "<img src='../../wow/static/images/icons/class/1.gif' width='18' height='18'/>";
 }
 elseif ($cclass == 2)
 {
 $class = "<img src='../../wow/static/images/icons/class/2.gif' width='18' height='18'/>";
 }
 elseif ($cclass == 3)
 {
 $class = "<img src='../../wow/static/images/icons/class/3.gif' width='18' height='18'/>";
 }
 elseif ($cclass == 4)
 {
 $class = "<img src='../../wow/static/images/icons/class/4.gif' width='18' height='18'/>";
 }
 elseif ($cclass == 5)
 {
 $class = "<img src='../../wow/static/images/icons/class/5.gif' width='18' height='18'/>";
 }
 elseif ($cclass == 6)
 {
 $class = "<img src='../../wow/static/images/icons/class/6.gif' width='18' height='18'/>";
 }
 elseif ($cclass == 7)
 {
 $class = "<img src='../../wow/static/images/icons/class/7.gif' width='18' height='18'/>";
 }
 elseif ($cclass == 8)
 {
 $class = "<img src='../../wow/static/images/icons/class/8.gif' width='18' height='18'/>";
 }
 elseif ($cclass == 9)
 {
 $class = "<img src='../../wow/static/images/icons/class/9.gif' width='18' height='18'/>";
 }
 elseif ($cclass == 11)
 {
 $class = "<img src='../../wow/static/images/icons/class/10.gif' width='18' height='18'/>";
 }
  // Alliance or Horde FLAG
if($rrace == 2 || $rrace == 5 || $rrace == 6 || $rrace == 8 || $rrace == 9 || $rrace == 10)
{
$bg = "<img src='../../wow/static/images/icons/faction/ally.gif' width='18' height='18'/>";
}
elseif($rrace == 1 || $rrace == 3 || $rrace == 4 || $rrace == 7 || $rrace == 11 || $rrace == 22)
{
$bg = "<img src='../../wow/static/images/icons/faction/horde.gif' width='18' height='18'/>";
}
    echo " 
	<tr>
 <td style=''><center>",$i,"</center></td>
 <td><center>",$name,"</center></td>
 <td><center>",$level,"</center></td>
 <td><center>",$Total_Honor,"</center></td>
 <td><center>",$Total_Kills,"</center></td>
 <td><center>",$class,"</center></td>
 <td><center>",$bg,"</center></td>
  </tr>
  
  "; 



echo '</tr>';
echo"</table><br/>";
} 
?>-->
			<!--<tbody>
			
					<tr class="row1">
						
						<td class="name">
							
						</td>
						<td class="type" data-raw="pvp">
							<span class="pvp">
									
							</span>
						</td>
						<td class="population" data-raw="Low">
							<span class="Low">
									
							</span>
						</td>
						<td class="locale">
							
						</td>
						<td class="queue" data-raw="false">
						
						</td>
					</tr>
					<tr class="row2">
						
						<td class="name">
							
						</td>
						<td class="type" data-raw="pve">
							<span class="pve">
									
							</span>
						</td>
						<td class="population" data-raw="medium">
							<span class="medium">
									
							</span>
						</td>
						<td class="locale">
							
						</td>
						<td class="queue" data-raw="false">
						
						</td>
					</tr>
					<tr class="row1">
						
						<td class="name">
							
						</td>
						<td class="type" data-raw="pvp">
							<span class="normal">
									
							</span>
						</td>
						<td class="population" data-raw="Low">
							<span class="Low">
									
							</span>
						</td>
						<td class="locale">
							
						</td>
						<td class="queue" data-raw="false">
						
						</td>
					</tr>
				<tr class="no-results" style="display: none">
					<td colspan="6"></td>
				</tr>
			</tbody>-->
		</table>
	</div>
		</div>

	<span class="clear"><!-- --></span>

</div>
</div>
</div>
<?php include("../../footer.php"); ?>
<div id="fansite-menu" class="ui-fansite"></div><div id="menu-container"></div><ul class="ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all" role="listbox" aria-activedescendant="ui-active-menuitem" style="z-index: 6; top: 0px; left: 0px; display: none; "></ul></body>
</html>