<?php 
require_once("../configs.php");
$page_cat="media";
include_once("functions.d/GetMediaTheme.php");
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html lang="en-gb">
<head>
<title><?php echo $website['title']; ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="description" content="<?php echo $website['description']; ?>">
<meta name="keywords" content="<?php echo $website['keywords']; ?>">
<link rel="shortcut icon" href="<?php echo $website['root']; ?>wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<?php GetMediaTheme(); ?>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="<?php echo $website['root']; ?>wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script src="<?php echo $website['root']; ?>wow/static/local-common/js/core.js?v15"></script>
<script src="<?php echo $website['root']; ?>wow/static/local-common/js/tooltip.js?v15"></script>
<script src="http://static.wowhead.com/widgets/power.js"></script>
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
</head>

<body class="en-gb game-index">
	<div id="wrapper">
		<?php include("../header.php"); ?>
		
		<div id="content">
			<div class="content-top">
			<div class="content-trail">
			<ol class="ui-breadcrumb">
			<li>
			<a href="index.php" rel="np"><?php echo $website['title']; ?></a>
			<span class="breadcrumb-arrow"></span>
			</li>
			<li class="last children"><a href="<?php echo $website['root']; ?>/media/media.php" rel="np"><?php echo $Media['Media']; ?></a>
			</li>
			</ol>
			</div>
				<div class="content-bot">
					<div class="media-content">
						<div id="media-index">
							<div class="media-index-section float-left">
								<a class="gallery-title videos" href="<?php echo $website['root']; ?>/media/videos_index.php">
								<span class="view-all"><span class="arrow"></span><?php echo $Media['AllVideos']; ?></span>
								<span class="gallery-icon"></span>
                                <?php
								$consulta0 = mysql_query(" SELECT * FROM media WHERE visible = 1 AND type = '0'");
								$totalSql = mysql_num_rows($consulta0);
								?>
								Videos <span class="total">(<?php echo $totalSql; ?>)</span>
								</a>
                <div class="section-content">
								<?php					
								$consulta1 = mysql_query("SELECT * FROM media WHERE visible = 1 AND type = '0' ORDER BY date DESC LIMIT 0,2");
								while($video1 = mysql_fetch_assoc($consulta1)) {
								?>
                        				
									<a href="./media/videos_visor.php?id=<?php echo $video1['id']; ?>" class="thumb-wrapper video-thumb-wrapper first-video">
									<span class="video-info">
									<span class="video-title"><?php echo substr($video1['title'],0,50); ?></span>
									<span class="video-desc"><?php echo substr(strip_tags($video1['description']),0,50); ?>...</span>
									<span class="date-added">Date Added: <?php echo date('d/m/Y', strtotime($video1['date'])); ?></span>
									</span>
									<span class="thumb-bg"; style="background-image: url('http://img.youtube.com/vi/<?php echo $video1['id_url']; ?>/0.jpg'); background-size: 188px 118px">
									<span class="thumb-frame"></span>
									</span>
									</a>
									<?php } ?>
                                    
									<span class="clear"><!-- --></span>
								</div>
								<span class="clear"><!-- --></span>
							</div>
							
							<div class="media-index-section float-right">
							
								<a class="gallery-title screenshots" href="<?php echo $website['root']; ?>media/images_index.php?type=2">
								<span class="view-all"><span class="arrow"></span>All Screenshots</span>
								<?php
                  $screen_all = mysql_query("SELECT * FROM media WHERE visible = '1' AND type = '2'");
                  $screen_total = mysql_num_rows($screen_all);
                ?>
								<span class="gallery-icon"></span>
								Screenshots <span class="total">(<?php echo $screen_total; ?>)</span>
								</a>
								
								<div class="section-content">
								<?php
								  $pos = 0;
                  $screen_index = mysql_query("SELECT * FROM media WHERE visible = '1' AND type = '2' ORDER BY date DESC LIMIT 0,4");
                  while ($screen = mysql_fetch_assoc($screen_index)){
                ?>
									<a class="thumb-wrapper <?php 
                    if ($pos % 2 == 0 ){ echo 'left-col';} //correct postion depends of number
                    if ($pos > 2){ echo 'bottom-row';}
                    $pos++; ?>" 
                    href="<?php echo $website['root']; ?>media/images_visor.php?type=2&id=<?php echo $screen['id']; ?>#/<?php echo $screen['id']; ?>">
									<span class="thumb-bg" style="background-image:url(<?php echo 'images/wallpapers/'.$screen['id_url'];  ?>);background-size: 189px 118px">
									<span class="thumb-frame"></span>
									</span>
									<span class="date-added">Date Added: <?php echo date('d/m/Y', strtotime($screen['date'])); ?></span>
									</a>
								<?php } ?>
									<span class="clear"><!-- --></span>
								</div>
								
								<span class="clear"><!-- --></span>
							</div>
							
							<span class="clear"><!-- --></span>
							
							<div class="media-index-section float-left">
								<?php
                  $art_all = mysql_query("SELECT * FROM media WHERE visible = '1' AND type = '3'");
                  $art_total = mysql_num_rows($art_all);
                ?>
								<a class="gallery-title artwork" href="<?php echo $website['root']; ?>media/images_index.php?type=3">
								<span class="view-all"><span class="arrow"></span>All Artwork</span>
								<span class="gallery-icon"></span>
								Artwork <span class="total">(<?php echo $art_total; ?>)</span></a>
								
								<div class="section-content">
								<?php
								  $pos = 0;
                  $art_index = mysql_query("SELECT * FROM media WHERE visible = '1' AND type = '3' ORDER BY date DESC LIMIT 0,2");
                  while ($art = mysql_fetch_assoc($art_index)){
                ?>
									<a class="thumb-wrapper 
                  <?php 
                    if ($pos % 2 == 0 ){ echo 'left-col';} //correct postion depends of number
                    $pos++; ?>" 
                  <a href="<?php echo $website['root']; ?>media/images_visor.php?type=3&id=<?php echo $art['id']; ?>#/<?php echo $art['id']; ?>" />
									<span class="thumb-bg" style="background-image:url(<?php echo 'images/wallpapers/'.$art['id_url'];  ?>);background-size: 189px 118px">
									<span class="thumb-frame"></span>
									</span>
									<span class="date-added">Date Added: <?php echo date('d/m/Y', strtotime($art['date'])); ?></span>
									</a>
								<?php } ?>
									<span class="clear"><!-- --></span>
								</div>
								
								<span class="clear"><!-- --></span>
							</div>
							
							<div class="media-index-section float-right">
							<?php
                $wall_all = mysql_query("SELECT * FROM media WHERE visible = '1' AND type = '1'");
                $wall_total = mysql_num_rows($wall_all);
              ?>
								<a class="gallery-title wallpapers" href="<?php echo $website['root']; ?>media/images_index.php?type=1">
								<span class="view-all"><span class="arrow"></span>All Wallpapers</span>
								<span class="gallery-icon"></span>
								Wallpapers <span class="total">(<?php echo $wall_total; ?>)</span>
								</a>
								
								<div class="section-content">
								<?php
								  $pos = 0;
                  $wall_index = mysql_query("SELECT * FROM media WHERE visible = '1' AND type = '1' ORDER BY date DESC LIMIT 0,2");
                  while ($wall = mysql_fetch_assoc($wall_index)){
                ?>
									<a class="thumb-wrapper                   
                  <?php 
                    if ($pos % 2 == 0 ){ echo 'left-col';} //correct postion depends of number
                    $pos++; ?>" 
                  href="<?php echo $website['root']; ?>media/images_visor.php?type=1&id=<?php echo $wall['id']; ?>#/<?php echo $wall['id']; ?>">
									<span class="thumb-bg" style="background-image:url(<?php echo 'images/wallpapers/'.$wall['id_url'];  ?>);background-size: 189px 118px">
									<span class="thumb-frame"></span>
									</span>
									<span class="date-added">Date Added: <?php echo date('d/m/Y', strtotime($wall['date'])); ?></span>
									</a>
								<?php } ?>
									<span class="clear"><!-- --></span>
								</div>
								
								<span class="clear"><!-- --></span>
							</div>
							
							<div class="media-index-section float-left">
							<?php
                $wall_all = mysql_query("SELECT * FROM media WHERE visible = '1' AND type = '4'");
                $wall_total = mysql_num_rows($wall_all);
              ?>
								<a class="gallery-title comics" href="<?php echo $website['root']; ?>media/images_index.php?type=4">
								<span class="view-all"><span class="arrow"></span>All Comics</span>

								<span class="gallery-icon"></span>
								Comics <span class="total">(<?php echo $wall_total; ?>)</span>
								</a>
								<div class="section-content">
								<?php
								  $pos = 0;
                  $wall_index = mysql_query("SELECT * FROM media WHERE visible = '1' AND type = '4' ORDER BY date DESC LIMIT 0,2");
                  while ($wall = mysql_fetch_assoc($wall_index)){
                ?>
									<a class="thumb-wrapper                   
                  <?php 
                    if ($pos % 2 == 0 ){ echo 'left-col';} //correct postion depends of number
                    $pos++; ?>" 
                  href="<?php echo $website['root']; ?>media/images_visor.php?type=4&id=<?php echo $wall['id']; ?>#/<?php echo $wall['id']; ?>">
									<span class="thumb-bg" style="background-image:url(<?php echo 'images/wallpapers/'.$wall['id_url'];  ?>);background-size: 189px 118px">
									<span class="thumb-frame"></span>
									</span>
									<span class="date-added">Date Added: <?php echo date('d/m/Y', strtotime($wall['date'])); ?></span>
									</a>
								<?php } ?>
									<span class="clear"><!-- --></span>
								</div>
								<span class="clear"><!-- --></span>
							</div>
							
							<span class="clear"><!-- --></span>
						</div>
					</div>
					<div style="display:none" id="media-preload-container"></div>
					</div>
				</div>
			</div>
			<?php include("../footer.php"); ?>
		</div>
	</div>

</body>
</html>
