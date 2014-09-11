<?php
require_once("../../configs.php");
if(isset($_GET['realm'])) $realmid = intval($_GET['realm']); else $realmid = 1;
include_once("functions.d/GetGameTheme.php");
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
 <html lang="en-gb">
<head>
<title><?php echo TITLE ?> - <?php echo $status['status']; ?></title>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="description" content="<?php echo DESCRIPTION ?>">
<meta name="keywords" content="<?php echo KEYWORDS ?>">
<link rel="shortcut icon" href="../../wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<?php GetGameTheme(); ?>
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
<body class="en-gb game-index"><div id="predictad_div" class="predictad" style="display: none; left: 788px; top: 104px; width: 321px; "></div>

<div id="wrapper">
<?php 
$page_cat="game";
include("../../header.php");
?>
	<div id="content">
		<div class="content-top body-top">
			<div class="content-trail">
				<ol class="ui-breadcrumb">
					<li itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
					<a href="<?php echo BASE_URL ?>" rel="np" class="breadcrumb-arrow" itemprop="url">
					<span class="breadcrumb-text" itemprop="name"><?php echo TITLE ?></span>
					</a>
					</li>
					<li itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
					<a href="<?php echo BASE_URL ?>game/status/" rel="np" class="breadcrumb-arrow" itemprop="url">
					<span class="breadcrumb-text" itemprop="name"><?php echo $status['status']; ?></span>
					</a>
					</li>
					<li itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
					<a href="<?php echo BASE_URL ?>game/status/" rel="np" class="breadcrumb-arrow" itemprop="url">
					<span class="breadcrumb-text" itemprop="name"><?php echo $Status['RealmStat']; ?></span>
					</a>
					</li>
					<li class="last childless" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
					<a href="" rel="np" itemprop="url">
					<span class="breadcrumb-text" itemprop="name"><?php
					$realm_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE id = '".$realmid."'"));
					if(!$realm_extra) $realm_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE id = '1'"));
					$realm = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.realmlist WHERE id = '".$realm_extra['realmid']."'"));
					echo $realm['name']; 
					?></span>
					</a>
					</li>
				</ol>
			</div>
<div class="content-bot">
	<div class="content-header">
		<h2 class="header ">
		<?php 	require_once("../../configs.php");
				echo $realm['name']; 
									?> 
		<?php echo $status['status']; ?></h2>
		<div class="desc"><?php echo $Status['Stat3']; ?>
		<?php 	require_once("../../configs.php");
				echo $realm['name'];?>
		<?php echo $Status['Stat4']; ?>
		</div>
<span class="clear"><!-- --></span>
	</div>
	<div id="realm-status">
		<div class="filter-toggle">
			<a href="javascript:;" class="selected" onClick="RealmStatus.filterToggle(this)">	</a>
		</div>
	<span class="clear"><!-- --></span>
		<div id="realm-filters" class="table-filters">
			<form action="#">
				<div class="filter">
					<label for="filter-status"><?php echo $Status['Faction']; ?></label>
					<select id="filter-status" class="input select" data-filter="column" data-column="0">
						<option value=""><?php echo $Status['All']; ?></option>
						<option value="up"><?php echo $Status['Ali']; ?></option>
						<option value="down"><?php echo $Status['Horde']; ?></option>
					</select>
				</div>
				<div class="filter">
					<label for="filter-name"><?php echo $Status['Name']; ?></label>
					<input type="text" class="input" id="filter-name" data-filter="column" data-column="1" />
				</div>
				<div class="filter">
					<label for="filter-type"><?php echo $Status['Race']; ?></label>
					<select id="filter-type" class="input select" data-filter="column" data-column="2">
						<option value=""><?php echo $Status['All']; ?></option>
						<option value="pve"><?php echo $Status['Human']; ?></option>
						<option value="rppvp"><?php echo $Status['Dwarf']; ?></option>
						<option value="pvp"><?php echo $Status['NightElf']; ?></option>
						<option value="rp"><?php echo $Status['Gnome']; ?></option>
						<option value="rp"><?php echo $Status['Draenei']; ?></option>
						<option value="rp"><?php echo $Status['Worgen']; ?></option>
						<option value="rp"><?php echo $Status['Orc']; ?></option>
						<option value="rp"><?php echo $Status['Troll']; ?></option>
						<option value="rp"><?php echo $Status['Tauren']; ?></option>
						<option value="rp"><?php echo $Status['Undead']; ?></option>
						<option value="rp"><?php echo $Status['BloodElf']; ?></option>
						<option value="rp"><?php echo $Status['Goblin']; ?></option>
					</select>
				</div>
				<div class="filter">
					<label for="filter-population"><?php echo $Status['Class']; ?></label>
					<select id="filter-population" class="input select" data-filter="column" data-column="3">
						<option value=""><?php echo $Status['All']; ?></option>
						<option value="high"><?php echo $Status['Warrior']; ?></option>
						<option value="medium"><?php echo $Status['Paladin']; ?></option>
						<option value="n/a"><?php echo $Status['Rogue']; ?></option>
						<option value="low"><?php echo $Status['Mage']; ?></option>
						<option value="low"><?php echo $Status['Druid']; ?></option>
						<option value="low"><?php echo $Status['Warlock']; ?></option>
						<option value="low"><?php echo $Status['Hunter']; ?></option>
						<option value="low"><?php echo $Status['Shaman']; ?></option>
						<option value="low"><?php echo $Status['Priest']; ?></option>
						<option value="low"><?php echo $Status['DeathKnight']; ?></option>
					</select>
				</div>
				<div class="filter">
					<label for="filter-locale"><?php echo $Status['Level']; ?></label>
					<select id="filter-locale" class="input select" data-column="4" data-filter="column">
						<option value=""><?php echo $Status['All']; ?></option>
						<option value="spanish"><?php echo $Status['CataLev']; ?></option>
						<option value="german"><?php echo $Status['WoTLKLev']; ?></option>
						<option value="french"><?php echo $Status['BCLev']; ?></option>
						<option value="tournament"><?php echo $Status['VanLev']; ?></option>
					</select>
				</div>
				<div class="filter">
					<label for="filter-queue"><?php echo $Status['Location']; ?></label>
					<input type="checkbox" id="filter-queue" class="input" value="true" data-column="5" data-filter="column" />
				</div>
				<div class="filter" style="margin: 5px 0 5px 15px">
					<button class="ui-button button1 " type="button" id="filter-button" onclick="RealmStatus.reset();" >
						<span>
							<span><?php echo $Status['Reset']; ?></span>
						</span>
					</button>
				</div>
	            <span class="clear"><!-- --></span>
			</form>
		</div>
	</div>
	<span class="clear"><!-- --></span>
		<div id="all-realms">
	    <div class="table full-width">
		<table>
			<thead>
				<tr>
				<?php
				$server_cdb = $realm_extra['char_db'];
				$sql = mysql_query("SELECT * FROM $server_cdb.characters WHERE online='1' ORDER BY RAND() LIMIT 49") or die(mysql_error());
				$numrows = mysql_num_rows($sql);
				if($numrows > 0)
				{
				echo '<div class="view-table">
					<div class="table ">
						<table>
					<thead>
					 <tr>
				<th><a href="javascript:;" class="sort-link"><span class="arrow">'.$Status['Name'].'</span></a></th>
				<th><a href="javascript:;" class="sort-link"><span class="arrow">'.$Status['Race'].'</span></a></th>
				<th><a href="javascript:;" class="sort-link"><span class="arrow">'.$Status['Class'].'</span></a></th>
				<th><a href="javascript:;" class="sort-link"><span class="arrow">'.$Status['Level'].'</span></a></th>
				<th><a href="javascript:;" class="sort-link"><span class="arrow">'.$Status['Location'].'</span></a></th>
				<th><a href="javascript:;" class="sort-link"><span class="arrow">'.$Status['Faction'].'</span></a></th>
				</tr>
					</thead>';
				while($raw = mysql_fetch_array($sql)){
				//Character Class
				$cclass = $raw['class'];
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
				//Character Race
				$rrace = $raw['race'];
				$gender = $raw['gender'];
				if ($rrace == 1)
				{
				$race = "".$Status['Human']."";
				}
				elseif ($rrace == 2)
				{
				$race = "".$Status['Orc']."";
				}
				if ($rrace == 3)
				{
				$race = "".$Status['Dwarf']."";
				}
				elseif ($rrace == 4)
				{
				$race = "".$Status['NightElf']."";
				}
				elseif ($rrace == 5)
				{
				$race = "".$Status['Undead']."";
				}
				elseif ($rrace == 6)
				{
				$race = "".$Status['Tauren']."";
				}
				elseif ($rrace == 7)
				{
				$race = "".$Status['Gnome']."";
				}
				elseif ($rrace == 8)
				{
				$race = "".$Status['Troll']."";
				}
				elseif ($rrace == 9)
				{
				$race = "".$Status['Goblin']."";
				}
				elseif ($rrace == 10)
				{
				$race = "".$Status['BloodElf']."";
				}
				elseif ($rrace == 11)
				{
				$race = "".$Status['Draenei']."";
				}
				elseif ($rrace == 22)
				{
				$race = "".$Status['Worgen']."";
				}
				//Character Gender
				$ggender = $raw['gender'];
				if($ggender == 1)
				{
				$gender = "".$Status['Female']."";
				}
				else
				if($ggender == 0)
				{
				$gender = "".$Status['Male']."";
				}
				//Location Map
				$map = $raw['map'];
				if($map == 0)
				{
				$location = "<b>".$Status['EastKingd']."</b>";
				}
				elseif($map == 648)
				{
				$location = "<b>".$Status['LostIsle']."</b>";
				}
				elseif($map == 638)
				{
				$location = "<b>".$Status['Gilneas']."</b>";
				}
				elseif($map == 1)
				{
				$location = "<b>".$Status['Kalimdor']."</b>";
				}
				elseif($map == 530)
				{
				$location = "<b>".$Status['Outland']."</b>";
				}
				elseif($map == 571)
				{
				$location = "<b>".$Status['Northrend']."</b>";
				}
				 // Alliance or Horde FLAG
				if($rrace == 1 || $rrace == 3 || $rrace == 4 || $rrace == 7 || $rrace == 11 || $rrace == 22)
				{
				$bg = "<img src='../../wow/static/images/icons/faction/ally.png' width='18' height='18'/>";
				}
				elseif($rrace == 2 || $rrace == 5 || $rrace == 6 || $rrace == 8 || $rrace == 9 || $rrace == 10)
				{
				$bg = "<img src='../../wow/static/images/icons/faction/horde.png' width='18' height='18'/>";
				}
				 // Alliance or Horde FLAG
				if($rrace == 1 || $rrace == 3 || $rrace == 4 || $rrace == 7 || $rrace == 11 || $rrace == 22)
				{
				$bg2 = "Alliance";
				}
				elseif($rrace == 2 || $rrace == 5 || $rrace == 6 || $rrace == 8 || $rrace == 9 || $rrace == 10)
				{
				$bg2 = "Horde";
				}
				echo '

				<tr class="row1">
				<td>
				<a href="" class="item-link color-c9"><strong><a href="'.BASE_URL.'advanced.php?name='.$raw["name"].'">'.$raw["name"].'</a></strong>
				</a>
				</td>
				<td class="align-center">
				<span class="icon-frame frame-14 " data-tooltip="'.$race.' '.$gender.'">
				<img src="../../wow/static/images/icons/race/'.$raw['race'].'-'.$raw['gender'].'.gif" alt="" width="14" height="14" />
				</span>
				</td>
				<td style="background-color: '.$bg.';"><center>'.@$class.'</center></td>
				<td style="background-color: '.$bg.';"><center>'.@$raw['level'].'</center></td>
				<td style="background-color: '.$bg.';"><center>'.@$location.'</center></td>
				<td style="background-color: '.$bg.';"><center>'.@$bg.'</center></td>
				</tr>';

				}
				echo '';
				echo"</table><br />";
				}
				else
				{
				echo "<b>".$Status['NotConected']."</b>";
				}
				?>
			<tbody>
				<tr class="row1">
					<td class="name"></td>
					<td class="type" data-raw="pvp"><span class="pvp"></span></td>
					<td class="population" data-raw="Low"><span class="Low"></span></td>
					<td class="locale">
					</td><td class="queue" data-raw="false"></td>
				</tr>
				<tr class="row2">
					<td class="name"></td>
					<td class="type" data-raw="pve"><span class="pve"></span></td>
					<td class="population" data-raw="medium"><span class="medium"></span></td>
					<td class="locale"></td>
					<td class="queue" data-raw="false"></td>
				</tr>
				<tr class="row1">
					<td class="name"></td>
					<td class="type" data-raw="pvp"><span class="normal"></span></td>
					<td class="population" data-raw="Low"><span class="Low"></span></td>
					<td class="locale"></td>
					<td class="queue" data-raw="false"></td>
				</tr>
				<tr class="no-results" style="display: none"><td colspan="6"></td></tr>
			</tbody>
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
