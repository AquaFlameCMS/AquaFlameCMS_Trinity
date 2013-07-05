<?php
require_once("configs.php");
?>

<!doctype html>
<html lang="en-gb">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html>
<head>
<title><?php echo $website['title']; ?> - <?php $Community['Community']; ?></title>
<link rel="shortcut icon" href="wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/en-gb/data/opensearch" title="Battle.net Search" />
<link rel="stylesheet" href="wow/static/local-common/css/common.css?v15" />
<link rel="stylesheet" href="wow/static/css/wow.css?v3" />
<link rel="stylesheet" href="wow/static/css/community/community-index.css" />
<style type="text/css">
.bnr04 .banner-title, .bnr04 .banner-desc, .bnr04:hover .banner-desc  {color:#625841;}
.bnr04 {border:1px solid #261e16; cursor:default;}
.bnr04:hover {background-position:0 0; border:1px solid #261e16; cursor:default;}
</style>
<script src="wow/static/local-common/js/third-party/jquery-1.4.4.min.js"></script>
<script src="wow/static/local-common/js/core.js?v15"></script>
<script src="wow/static/local-common/js/tooltip.js?v15"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
Core.staticUrl = 'wow/static';
Core.baseUrl = 'wow/en';
Core.project = 'wow';
Core.locale = 'en-gb'
Core.buildRegion = 'eu';
Core.loggedIn = true;
Flash.videoPlayer = 'http://eu.media.blizzard.com/wow/player/videoplayer.swf';
Flash.videoBase = 'http://eu.media.blizzard.com/wow/media/videos';
Flash.ratingImage = 'http://eu.media.blizzard.com/wow/player/rating-pegi.jpg';
//]]>
</script>
<body class="en-gb community-home"><div id="predictad_div" class="predictad" style="display: none; left: 788px; top: 104px; width: 321px; "></div>

<div id="wrapper">
<?php
$page_cat = "community";
include("header.php");
?>
<div id="content">
<div class="content-top">
<div class="content-trail">
<ol class="ui-breadcrumb">
<li><a href="index.php" rel="np"><?php echo $website['title']; ?></a></li>
<li class="last"><a href="community.php" rel="np"><?php $Community['Community']; ?></a></li>
</ol>
</div>
<div class="content-bot">			
	<div class="top-banner">
    <script src="wow/static/local-common/js/slideshow.js"></script>
    <script src="wow/static/local-common/js/third-party/swfobject.js"></script>

     <div id="slideshow" class="ui-slideshow">
        <div class="slideshow">
        
				<?php
				$query = mysql_query("SELECT * FROM community_slides ORDER BY id DESC LIMIT 4");
				$i=0;
				while($community = mysql_fetch_array($query)){
					if($i==0){
					echo '<div class="slide" id="slide-'.$i.'" style="background-image: url(\'images/community/'.$community['image'].'\'); opacity: 0.997084;"></div>';
					}else{
					echo '<div class="slide" id="slide-'.$i.'" style="background-image: url(\'images/community/'.$community['image'].'\'); display: none; "></div>';
					}
					$i++;
				}
			?>
		</div>

			<div class="paging">
			<?php
				$query2 = mysql_query("SELECT * FROM community_slides ORDER BY id DESC LIMIT 4");
				$i=0;
				while($communityx = mysql_fetch_assoc($query2)){
					echo '<a href="javascript:;" id="paging-'.$i.'" onclick="Slideshow.jump('.$i.', this);"';
					if($i==0){ print 'class="curent"'; }else if($i==3){ print 'class="last-slide"'; }else { print 'class=""'; } echo'>
					<span class="paging-title">'.$communityx['title'].' </span>
					<span class="paging-date">'.$communityx['date'].'</span></a>';
					$i++;
				}
			?>
					<a href="javascript:;" id="paging-0" onclick="Slideshow.jump(0, this);" class="">
							<span class="paging-title">Leader of the Alliance and Horde Part 2: Genn Greymane</span>
							<span class="paging-date">01/24/11</span>
					</a>
					<a href="javascript:;" id="paging-1" onclick="Slideshow.jump(1, this);" class="current">
							<span class="paging-title">New Fan Art </span>
							<span class="paging-date">12/10/10</span>
					</a>
					<a href="javascript:;" id="paging-2" onclick="Slideshow.jump(2, this);" class="">
							<span class="paging-title">Leaders of the Alliance and Horde Part 1 - Garrosh</span>
							<span class="paging-date">12/10/10</span>
					</a>
					<a href="javascript:;" id="paging-3" onclick="Slideshow.jump(3, this);" class="last-slide">
							<span class="paging-title">Get into the Warcraft community!</span>
							<span class="paging-date">12/10/10</span>
					</a>
			</div>
		<?php
		$query3 = mysql_query("SELECT * FROM community_slides ORDER BY id DESC LIMIT 1");
		$communityz = mysql_fetch_assoc($query3);
		echo '<div class="caption" style="display: block;"><h3><a href="#" class="link"> '.$communityz['title'].'</a></h3>'.$communityz['desc'].'</div>';
		?>
		<div class="preview" style="display: none;"></div>
		<div class="mask"></div>
    </div>

	<script type="text/javascript">
	//<![CDATA[
        $(function() {
            Slideshow.initialize('#slideshow', [
				<?php
				$getting_lastq = mysql_query("SELECT * FROM community_slides ORDER BY id DESC");
				$getting_last = mysql_fetch_assoc($getting_lastq);
				$last=$getting_last['id']-4;
				$query = mysql_query("SELECT * FROM community_slides WHERE id >= '".$last."' ORDER BY id DESC LIMIT 4");
				$i=0;
				while($community2 = mysql_fetch_assoc($query)){
					echo '
					{
					image: "'.$community2['image'].'",
					desc: "'.$community2['desc'].'",
                    title: "'.$community2['title'].'",
                    url: "'.$community2['url'].'",
					id: "'.$community2['id'].'"
					}';
					if($i!=3) echo ',';
					$i++;
				}
				?>
            ]);

        });
	//]]>
	</script>
	</div>
	
	<div class="community-content-body">
		<div class="body-wrapper">
			<div class="content-wrapper">
				<div class="inside-col">				
					<div class="official-content">
						<div class="inside-section contests">
							<a href="javascript:;" target="_blank" class="main-link" style="background-image:url('wow/static/images/community/thumbnails/thumb-contests.jpg');">
								<span>
									<span class="wrapper">
										<span class="banner-title"><?php echo $Community['comm1']; ?></span>
										<span class="banner-desc"><?php echo $Community['comm2']; ?></span>
									</span>
								</span>
							</a>
						</div>
						
						<div class="inside-section forum">
							<a href="forum/" class="main-link" style="background-image:url('wow/static/images/community/thumbnails/thumb-forum.jpg');">
								<span>
									<span class="wrapper">
										<span class="banner-title"><?php echo $Forums['Forums']; ?> </span>
										<span class="banner-desc"><?php echo $Community['comm3']; ?><?php echo $website['title']; ?><?php echo $Community['comm4']; ?></span>
									</span>
								</span>
							</a>
						</div>
						
						<span class="clear"><!-- --></span>
						
						<div class="inside-section fanart">
							<a href="media.php" class="main-link" style="background-image:url('wow/static/images/community/thumbnails/thumb-fanart.jpg');">
								<span class="panel">
									<span class="wrapper">
										<span class="banner-title"><?php echo $Community['FanArt']; ?></span>
										<span class="view-all"><?php echo $View_all['View_all']; ?><?php echo $Community['FanArt']; ?></span>
									</span>
								</span>
							</a>
								<a href="media.php" class="tosubmit external"><?php echo $Community['comm5']; ?></a>
						</div>
						
						<div class="inside-section comics">
							<a href="media.php" class="main-link" style="background-image:url('wow/static/images/community/thumbnails/thumb-comics.jpg');">
								<span class="panel">
									<span class="wrapper">
										<span class="banner-title"><?php echo $Community['Media']; ?> <em>(0)</em></span>
										<span class="view-all"><?php echo $View_all['View_all']; ?><?php echo $Community['Media']; ?></span>
									</span>
								</span>
							</a>
								<a href="media.php" class="tosubmit external"><?php echo $Community['comm6']; ?></a>
						</div>
						
						<span class="clear"><!-- --></span>
						
						<div class="inside-section screenshot">
							<a href="media.php" class="main-link" style="background-image:url('wow/static/images/community/thumbnails/thumb-screenshot.jpg');">
								<span class="panel">
									<span class="wrapper">
										<span class="banner-title"><?php echo $Community['Screenshots']; ?> <em>(1)</em></span>
										<span class="view-all"><?php echo $View_all['View_all']; ?><?php echo $Community['Screenshots']; ?></span>
									</span>
								</span>
							</a>
								<a href="media.php" class="tosubmit external"><?php echo $Community['comm7']; ?></a>
						</div>
						
						<div class="inside-section wallpaper">
							<a href="media.php" class="main-link" style="background-image:url('wow/static/images/community/thumbnails/thumb-wallpaper.jpg');">
								<span class="panel">
									<span class="wrapper">
										<span class="banner-title"><?php echo $Community['Wallpap']; ?> <em>(0)</em></span>
										<span class="view-all"><?php echo $View_all['View_all']; ?><?php echo $Community['Wallpap']; ?></span>
									</span>
								</span>
							</a>
								<a href="media.php" class="tosubmit external"><?php echo $Community['comm8']; ?></a>
						</div>
						
						<span class="clear"><!-- --></span>
					</div>	
				</div>
				
				<div class="outside-col">
										
					<div class="outside-section social-media">
						<div class="title-block">
							<span class="title"><?php echo $Community['comm9']; ?></span>
						<span class="clear"><!-- --></span>
						</div>
						<div class="content-block">
							<ul>
							<style type="text/css">#wow { background: url("wow/static/images/community/001.png") no-repeat; }</style>
								<li><a href="<?php echo $comun_link['Facebook']; ?>" class="facebook" target="_blank"><span class="content-title"><?php echo $website['title']; ?> Facebook</span><span class="content-desc"><?php echo $Community['comm10']; ?></span></a></li>
								<li><a href="<?php echo $comun_link['Twitter']; ?>" class="twitter" target="_blank"><span class="content-title"><?php echo $website['title']; ?> Twitter</span><span class="content-desc"><?php echo $Community['comm11']; ?></span></a></li>
								<li><a href="<?php echo $comun_link['Youtube']; ?>" class="youtube" target="_blank"><span class="content-title"><?php echo $website['title']; ?> Youtube</span><span class="content-desc"><?php echo $Community['comm12']; ?></span></a></li>
						</div>
						<span class="clear"><!-- --></span>
						<br></br>
						<div class="title-block">
							<span class="title"><?php echo $Community['comm13']; ?></span>
						<span class="clear"><!-- --></span>
						</div>
						<div class="content-block">
							<ul>
							<style type="text/css">#wow { background: url("wow/static/images/community/001.png") no-repeat; }</style>
							<li><a href="http://aquaflame.org" id="wow" target="_blank"><span class="content-title">AquaFlame.NET</span><span class="content-desc"><?php echo $Community['comm14']; ?></span></a></li></ul>
						</div>
					</div>
					
				</div>
			</div>		
		</div>	
	</div>
			
	<span class="clear"><!-- --></span>
</div>
</div>
</div>
<?php include("footer.php"); ?>
<div id="fansite-menu" class="ui-fansite"></div><div id="menu-container"></div><ul class="ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all" role="listbox" aria-activedescendant="ui-active-menuitem" style="z-index: 6; top: 0px; left: 0px; display: none; "></ul></body>
</html>