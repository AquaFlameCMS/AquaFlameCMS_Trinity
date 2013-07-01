<?php 
require_once("../configs.php");
$page_cat="media"; 
$type = intval($_GET['type']);
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
<title><?php echo $website['title']; ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="../wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/en-gb/data/opensearch" title="Battle.net Search" />
<link rel="stylesheet" href="../wow/static/local-common/css/common.css?v17" />
<link title="World of Warcraft - News" href="wow/en/feed/news" type="application/atom+xml" rel="alternate"/>
<link rel="stylesheet" href="../wow/static/css/wow.css?v7" />
<link rel="stylesheet" href="../wow/static/local-common/css/media-gallery.css?v17" />
<link rel="stylesheet" href="../wow/static/css/media/media.css?v7" />
<link href="../wow/static/css/media/media.css" rel="stylesheet" type="text/css">
<script src="../wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script src="../wow/static/local-common/js/core.js?v17"></script>
<script src="../wow/static/local-common/js/tooltip.js?v17"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
Core.staticUrl = '../wow/static';
Core.sharedStaticUrl= '../wow/static/local-common';
Core.baseUrl = '../wow/en';
Core.project = '../wow';
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
				<li><a href="../index.php" rel="np"><?php echo $website['title']; ?></a></li>
				<li><a href="../media.php" rel="np"><?php echo $Media['Media']; ?></a></li>
        <li class="last childless"><a href="images_index.php?type=<?php echo $type; ?>" rel="np">
<?php
  switch($type){
    case 1: echo 'Wallpapers'; break;
    case 2: echo 'Screenshots'; break;
    case 3: echo 'Art Work'; break;    
    case 4: echo 'Comic'; break;  
  }
?>
                </a></li>
			</ol>
			</div>
			<div class="content-bot">
				<div class="media-content">
<div class="currently-viewing">
<a id="toggle-thumbnail-page" href="#" data-tooltip="Switch to large thumbails view"
class="view-link active float-right"></a>
<a id="toggle-film-strip" href="images_visor.php?type=<?php echo $type; ?>" data-tooltip="Switch to filmstrip view"
class="view-link float-right"></a>
</div>
					<div id="media-index">
						<div class="thumbnail-page-wrapper">  
                        

						<?php
						$CantIndex = 12;
						$consulta0 = mysql_query(" SELECT * FROM media WHERE visible = 1 AND type = '".$type."'");
						$totalSql = mysql_num_rows($consulta0);
						$pagTotal = ceil($totalSql/$CantIndex);
						if (!isset($_GET['pag'])) {
              $pagActual=1;
            }
            elseif($_GET['pag'] > $pagTotal){
              $pagActual =$pagTotal; 
            }
            elseif($_GET['pag'] < 1){
              $pagActual =1; 
            }
            else{
              $pagActual=$_GET['pag'];
            }
						$pagAnterior = $pagActual-1;
						$pagSiguiente = $pagActual+1;
						?>

							<div class="thumbnail-list-paging">
							<?php if ($pagAnterior>0) {
							?>
							<a class="ui-button button1 button1-previous " href="images_index.php?type=<?php echo $type; ?>&pag=<?php echo $pagAnterior?>" id="previous-item" onClick="GalleryViewer.getPreviousPage()" >
							<span>
							<span><?php echo $Media['Previous']; ?></span>
							</span></a>
                            <?php 
							} 
							else {
							?>
							<a class="ui-button button1 button1-previous " href="#" id="previous-item" onClick="GalleryViewer.getPreviousPage()" >
							<span>
							<span><?php echo $Media['Previous']; ?></span>
							</span></a>
							<?php } ?>

							<span class="page-counter">
							Página <span id='start-page'><?php echo $pagActual; ?></span> de <?php echo $pagTotal; ?>
							</span>

							<?php 
							if ($pagSiguiente<=$pagTotal) {
							?>
							<a class="ui-button button1 button1-next " href="images_index.php?type=<?php echo $type; ?>&pag=<?php echo $pagSiguiente?>" id="next-item" onClick="GalleryViewer.getNextPage()" > 
							<span>
							<span><?php echo $Media['Next']; ?></span>
							</span></a>
							<?php 
							} 
							else {
							?>
							<a class="ui-button button1 button1-next " href="#" id="next-item" onClick="GalleryViewer.getNextPage()" >
							<span>
							<span><?php echo $Media['Next']; ?></span>
							</span></a>
							<?php } ?>

							</div>

						<?php

						$consulta1 = mysql_query(" SELECT * FROM media WHERE visible = 1 AND type = '".$type."' ORDER BY date DESC LIMIT ".(($pagActual-1)*$CantIndex).",".$CantIndex."");
						while($image = mysql_fetch_assoc($consulta1)) {
						?>
						<a href="images_visor.php?type=<?php echo $type; ?>&id=<?php echo $image['id']; ?>#/<?php echo $image['id']; ?>" class="thumb-wrapper">
						<span class="thumb-bg"; style="background-image: url('../images/wallpapers/<?php echo $image['id_url']; ?>'); background-size: 188px 118px">
            <span class="thumb-frame"></span></span></a>
						<?php } ?>

						<div class="pagination-wrapper">
						<ul class="ui-pagination" style="background:none">
						<?php 
						$pgIntervalo = 2;
						$pgMaximo = ($pgIntervalo*2)+1;
						$pg=$pagActual-$pgIntervalo;$i=0;
						while ($i<$pgMaximo) {
					 	if ($pg==$pagActual) {$current=array('<li class="current">','</li>');} else {$current=array('','');}
 						if ($pg>0 and $pg<=$pagTotal) {
 						?>
						<li><?php echo $current[0]; ?><a href="images_index.php?type=<?php echo $type; ?>&p=<?php echo $_GET['p']; ?>&amp;pag=<?php echo $pg; ?>"><?php echo $pg; ?></a><?php echo $current[1]; ?></li>
						<?php
  						$i++;
 						}
					 	if ($pg>$pagTotal) {$i=$pgMaximo;}
 						$pg++; 
						}
						?>
						</ul>
						</div>
                        <span class="clear"><!-- --></span>
             		</div>
					<span class="clear"><!-- --></span>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("../footer.php"); ?>
</body>
</html>
