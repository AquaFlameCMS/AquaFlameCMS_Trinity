<?php
require_once("../../configs.php");
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
<title><?php echo $website['title']; ?> - Status</title>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
<meta name="description" content="<?php echo $website['description']; ?>">
<meta name="keywords" content="<?php echo $website['keywords']; ?>">
<link rel="shortcut icon" href="../../wow/static/local-common/images/favicons/wow.png" type="image/x-icon"/>
<link rel="stylesheet" href="../../wow/static/local-common/css/common.css?v15"/>
<link rel="stylesheet" type="text/css" media="all" href="../../wow/static/css/wow.css?v7"/>
<link rel="stylesheet" type="text/css" media="all" href="../../wow/static/css/pvp/pvp.css"/>
<link rel="stylesheet" type="text/css" media="all" href="../../wow/static/css/status/realmstatus.css?v7"/>
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
Core.staticUrl = '../../wow/static';
Core.sharedStaticUrl= '../../wow/static/local-common';
Core.baseUrl = '../../wow/en';
Core.project = 'wow';
Core.locale = 'en-gb';
Core.buildRegion = 'eu';
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
</head>
<body class="">
</div>
<div id="wrapper">
<?php $page_cat="community"; include("../../header.php"); ?>
<div id="content">
	<div class="content-top">
		<div class="content-trail">
			<ol class="ui-breadcrumb">
				<li>
				<a href="<?php echo $website['root']; ?>" rel="np"><?php echo $website['title']; ?>
				</a>
				<span class="breadcrumb-arrow"></span>
				</li>
				<li>
				<a href="<?php echo $website['root']; ?>community/" rel="np"> <?php echo $Community['Community'];?>
				</a>
				<span class="breadcrumb-arrow"></span>
				</li>
				<li>
				<a href="<?php echo $website['root']; ?>" rel="np"> PvP</a>
				<span class="breadcrumb-arrow"></span>
				</li>
				<li class="last">
				<a href="<?php echo $website['root']; ?>community/pvp/5v5" rel="np"> Arena 5v5</a>
				</li>
			</ol>
		</div>
		<div class="content-bot">
			<div class="content-header">
				<h2 class="header ">PvP Ladders</h2>
				<span class="clear">
				<!-- -->
				</span>
			</div>
			<div class="pvp pvp-ladder">
				<div class="pvp-right">
					<div class="ladder-title">
						<h3 class="category "> Arena 5v5 </h3>
					</div>
					<form action="#" method="get" id="pvp-filters" class="table-filters">
						<div class="filter">
							<label for="filter-player">Player:</label>
							<input type="text" class="input" id="filter-player" name="player" maxlength="30">
						</div>
						<div class="filter">
							<label for="filter-realm">Realm:</label>
							<select class="input select" id="filter-realm" name="realm">
								<option value="">all</option>
								<option value="<?php echo $name_realm1['realm']; ?>"><?php echo $name_realm1['realm']; ?>
								</option>
							</select>
						</div>
						<div class="filter">
							<label for="filter-faction">Faction:</label>
							<select class="input select" id="filter-faction" name="faction">
								<option value="">All</option>
								<option value="0">Alliance</option>
								<option value="1">Horde</option>
							</select>
						</div>
						<div class="filter">
							<label for="filter-rating-min">Rating::</label>
							<input type="text" class="input align-center" name="minRating" id="filter-rating-min" maxlength="4"> - <input type="text" class="input align-center" name="maxRating" id="filter-rating-max" maxlength="4">
						</div>
						<span class="clear">
						<!-- -->
						</span>
						<span class="clear">
						<!-- -->
						</span>
						<span class="clear">
						<!-- -->
						</span>
						<div id="filter-buttons">
							<button class="ui-button button1 " type="submit" id="submit-button">
							<span>
							<span>Filter</span>
							</span>
							</button>
							<a href="#" id="reset-filters">Reset</a>
						</div>
					</form>
					<div id="ladders-loading" style="display: none;">
					</div>
					<div id="ladders" style="display: block;">
						<div class="table-options data-options ">
							<div class="option">
								<div class="ui-pagination">
									<li class="first-item" style="display: none;"><a href="#page=1"><span>first</span></a></li>
									<li style="display: inline-block;" class="current"><a href="#page=1"><span>1</span></a></li>
									<li class="last-item" style="display: inline-block;"><a href="#page=20"><span>last</span></a></li>
								</div>
							</div>
							 Showing <strong class="results-start">1</strong>–<strong class="results-end">1</strong> of <strong class="results-total">1</strong> results <span class="clear">
							<!-- -->
							</span>
						</div>
						<div class="table type-table" id="ladders-table">
							<table>
								<?php
								$con = mysql_connect($serveraddress, $serveruser, $serverpass, $serverport) or die(mysql_error());
								mysql_select_db($server_cdb, $con) or die (mysql_error());
								$sql = mysql_query("SELECT name, rating, seasonGames, seasonWins FROM arena_team WHERE type = '5' ORDER BY rating DESC LIMIT 10") or die(mysql_error());
								$i='1';
								$numrows = mysql_num_rows($sql);
								if($numrows > 0) { 
								echo '
								<div class="view-table">
									<div class="table ">
										<table>
										<thead>
										<tr>
											<th class="ranking">
												<a href="javascript:;" class="sort-link numeric"><span class="arrow up">&#35;</span></a>
											</th>
											<th class="player">
												<a href="javascript:;" class="sort-link default"><span class="arrow">Name</span></a>
											</th>
											<th class="realm">
												<a href="javascript:;" class="sort-link default"><span class="arrow">realm</span></a>
											</th>
											<th class="faction">
												<a href="javascript:;" class="sort-link default"><span class="arrow">Games Played</span></a>
											</th>
											<th class="wins">
												<a href="javascript:;" class="sort-link numeric"><span class="arrow">Games Won</span></a>
											</th>
											<th class="pvp-rating">
												<a href="javascript:;" class="sort-link numeric"><span class="arrow">Rating</span></a>
											</th>
										</tr>
										</thead>';
										while ($pvp_row = mysql_fetch_assoc($sql))
										{ 
										echo '
										<tr class="ladder-record row1" id="rank-1">
											<td class="ranking">'.$i.'</td>
											<td class="player" data-raw="'.$pvp_row["name"].'">'.$pvp_row["name"].'</td>
											<td class="realm">'.$name_realm1['realm'].'</td>
											<td style="background-color: "><center>'.$pvp_row["seasonGames"].'</center></td>
											<td class="wins align-center"><span class="win">'.$pvp_row["seasonWins"].'</span></td>
											<td class="pvp-rating align-center"><span class="rating">'.$pvp_row["rating"].'</span></td>
										</tr>';
										 $i++;
										 }
										 echo '';
										 echo"
										</table>
										<br/>";
										} else {
										echo "<b>There are no Arena Teams right now.</b>";
										} ?>
										</table>
									</div>
									<div class="table-options data-options ">
										<div class="option">
											<div class="ui-pagination">
												<li class="first-item" style="display: none;"><a href="#page=1"><span>first</span></a></li>
												<li style="display: inline-block;" class="current"><a href="#page=1"><span>1</span></a></li>
												<li class="last-item" style="display: inline-block;"><a href="#page=20"><span>last</span></a></li>
											</div>
										</div>
										 Showing <strong class="results-start">1</strong>–<strong class="results-end">1</strong> of <strong class="results-total">1</strong> results <span class="clear">
										<!-- -->
										</span>
									</div>
								</div>
							</div>
							<div class="pvp-left">
								<ul class="dynamic-menu" id="menu-pvp">
									<li>
									<a href="2v2">
									<span class="arrow">Arena 2v2</span>
									</a>
									</li>
									<li>
									<a href="3v3">
									<span class="arrow">Arena 3v3</span>
									</a>
									</li>
									<li class="item-active">
									<a href="5v5">
									<span class="arrow">Arena 5v5</span>
									</a>
									</li>
									<li>
									<a href="top-arena">
									<span class="arrow">Rated Battlegrounds</span>
									</a>
									</li>
									<li>
									<a href="#">
									<span class="arrow">Arena Pass</span>
									</a>
									</li>
									<li>
									<a href="top-honor">
									<span class="arrow">Top Honor</span>
									</a>
									</li>
								</ul>
							</div>
							<span class="clear">
							<!-- -->
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("../../footer.php"); ?>
<div id="fansite-menu" class="ui-fansite"></div>
<div id="menu-container"></div>
<ul class="ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all" role="listbox" aria-activedescendant="ui-active-menuitem" style="z-index: 6; top: 0px; left: 0px; display: none; "></ul>
</body>
</html>