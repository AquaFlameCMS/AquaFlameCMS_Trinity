<?php
require_once("configs.php");
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb" xmlns:xml="http://www.w3.org/XML/1998/namespace" class="chrome chrome8">
<head>
<title><?php echo $website['title']; ?> - Status</title>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common.css?v15" />
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="/wow/static/local-common/css/common-ie.css?v17" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="/wow/static/local-common/css/common-ie6.css?v17" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="/wow/static/local-common/css/common-ie7.css?v17" /><![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="wow/static/css/wow.css?v7" />
<link rel="stylesheet" type="text/css" media="all" href="wow/static/css/status/realmstatus.css?v7" />
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/wow-ie.css?v7" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/wow-ie6.css?v7" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/wow-ie7.css?v7" /><![endif]-->
<script type="text/javascript" src="wow/static/local-common/js/third-party/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="wow/static/local-common/js/core.js?v15"></script>
<script type="text/javascript" src="wow/static/local-common/js/tooltip.js?v15"></script>

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
<?php $page_cat="game"; include("header.php"); ?>
<div id="content">
<div class="content-top">
<div class="content-trail">
<ol class="ui-breadcrumb">
<li><a href="index.php" rel="np"><?php echo $website['title']; ?></a></li>
<li><a href="status.php" rel="np">Status</a></li>
<li><a href="status.php" rel="np">Arena</a></li>
<li class="last"><a href="2vs2.php" rel="np">Top 2vs2</a></li>
</ol>
</div>
<div class="content-bot">
	<div class="content-header">
				<h2 class="header ">Top 2vs2</h2>

		<div class="desc">This page lists all available World of Failure Players inside the <?php
					$get_realms = mysql_query("SELECT * FROM $server_adb.realmlist ORDER BY `id` ASC");
					while($realm = mysql_fetch_array($get_realms)){
					
					$host = $realm['address'];
					$world_port = $realm['port']; 
					$world = @fsockopen($host, $world_port, $err, $errstr, 2);
					
					echo $realm['name'];

					}?>
					Realm as well as the stats of each. The Character can be listed as either Horde or Alliance. Let us apologize in advance if you find any player that is not listed, it takes 5 seconds to refresh the list.</div><span class="clear"><!-- --></span>
	</div>

<div id="realm-status">	
<?php include("functions/status_nav.php"); ?>
		<div class="filter-toggle">
			<a href="javascript:;" class="selected" onclick="RealmStatus.filterToggle(this)">
				
			</a>
		</div>

	<span class="clear"><!-- --></span>

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

					<input type="text" class="input" id="filter-name" 
						   data-filter="column" data-column="1" />
				</div>

				<div class="filter">
					<label for="filter-type">Race</label>

					<select id="filter-type" class="input select" data-filter="column" data-column="2">
						<option value="">All</option>
							<option value="pve">
								Human
							</option>
							<option value="rppvp">
								Dwarf
							</option>
							<option value="pvp">
								Night Elf
							</option>
							<option value="rp">
								Gnome
							</option>
							<option value="rp">
								Draenei
							</option>
							<option value="rp">
								Worgen
							</option>
							<option value="rp">
								Orc
							</option>
							<option value="rp">
								Troll
							</option>
							<option value="rp">
								Tauren
							</option>
							<option value="rp">
								Undead
							</option>
							<option value="rp">
								Blood Elf
							</option>
							<option value="rp">
								Goblin
							</option>
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

					<input type="checkbox" id="filter-queue" class="input" value="true" data-column="5" data-filter="column" />
				</div>

				<div class="filter" style="margin: 5px 0 5px 15px">
					

	<button
		class="ui-button button1 "
			type="button"
			
		
		id="filter-button"
		
		onclick="RealmStatus.reset();"
		
		
		>
		<span>
			<span>Reset</span>
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
$con = mysql_connect($serveraddress, $serveruser, $serverpass, $serverport) or die(mysql_error());
mysql_select_db($server_cdb, $con) or die (mysql_error());
$sql = mysql_query("SELECT arenaTeamId, name, rating, seasonGames, seasonWins FROM arena_team WHERE type = '2' ORDER BY rating DESC LIMIT $teamsLimit") or die(mysql_error());
$i='1';
$numrows = mysql_num_rows($sql);
if($numrows > 0)
{
echo '<div class="view-table">
	<div class="table ">
		<table>
	<thead>
	 <tr>
<th><a href="javascript:;" class="sort-link"><span class="arrow">&#35;</span></a></th>
<th><a href="javascript:;" class="sort-link"><span class="arrow">Name</span></a></th>
<th><a href="javascript:;" class="sort-link"><span class="arrow">Rating</span></a></th>
<th><a href="javascript:;" class="sort-link"><span class="arrow">Games Played</span></a></th>
<th><a href="javascript:;" class="sort-link"><span class="arrow">Games Won</span></a></th>
</tr>
	</thead>';
while ($pvp_row = mysql_fetch_assoc($sql)){
echo '

<tr class="row1">
<td>
<a href="" class="item-link color-c9"><strong><a href="">'.$i.'</a></strong>
</a>
</td>
<td style="background-color: '.$bg.';"><center><a href="arena.php?name='.$pvp_row["name"].'&arenaTeamId='.$pvp_row["arenaTeamId"].'">'.$pvp_row["name"].'</a></center></td>
<td style="background-color: '.$bg.';"><center>'.$pvp_row["rating"].'</center></td>
<td style="background-color: '.$bg.';"><center>'.$pvp_row["seasonGames"].'</center></td>
<td style="background-color: '.$bg.';"><center>'.$pvp_row["seasonWins"].'</center></td>
</tr>';
$i++;
}
echo '';
echo"</table><br />";
}
else
{
echo "<b>There are no Arena Teams right now.</b>";
}
?>
					
				
			<tbody>
			
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
			</tbody>
		</table>
	</div>
		</div>

	<span class="clear"><!-- --></span>

</div>
</div>
</div>
<?php include("footer.php"); ?>
<div id="fansite-menu" class="ui-fansite"></div><div id="menu-container"></div><ul class="ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all" role="listbox" aria-activedescendant="ui-active-menuitem" style="z-index: 6; top: 0px; left: 0px; display: none; "></ul></body>
</html>