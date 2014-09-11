<?php
require_once("../../../configs.php");
include_once("functions.d/GetMediaTheme.php");
$page_cat="media";
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="/s7.addthis.com/static/r07/widget49.css" media="all" />
<title>Media - World of Warcraft</title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="../../../wow/static/local-common/images/favicons/wow.ico" type="image/x-icon"/>
<?php GetMediaTheme(); ?>
<script src="../../../wow/static/local-common/js/third-party/jquery.js?v39"></script>
<script src="../../../wow/static/local-common/js/core.js?v39"></script>
<script src="../../../wow/static/local-common/js/tooltip.js?v39"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
</head>
<body class="en-gb logged-in">
<div id="wrapper">
        <?php include("../../../header.php"); ?>
                <div id="content">
<div class="content-top">
<div class="content-trail">
<ol class="ui-breadcrumb">
<li>
<a href="<?php echo BASE_URL ?>" rel="np">
<?php echo TITLE ?>
</a>
<span class="breadcrumb-arrow"></span></li>
<li>
<a href="<?php echo BASE_URL ?>media/" rel="np">
Media
</a>
<span class="breadcrumb-arrow"></span></li>
<li class="last childless">
<a href="<?php echo BASE_URL ?>media/screenshots/" rel="np">
Screenshots
</a>
</li>
</ol>
</div>
<div class="content-bot"> <div class="media-content">
<div class="currently-viewing">
<a id="toggle-thumbnail-page" href="../" data-tooltip="Switch to large thumbails view"
class="view-link float-right"></a>
<a id="toggle-film-strip" href="#" data-tooltip="Switch to filmstrip view"
class="view-link active float-right"></a>
</div>
<?php
        $count = 0;
        $index = '';
        $paths = '';
        mysql_select_db($server_db) or die(mysql_error());
        $images = mysql_query("SELECT * FROM media WHERE visible = '1' AND type ='2'");
        while ($image= mysql_fetch_assoc($images)){
          $index = $index.',"'.$image['id'].'"';
          $paths = $paths.',"'.$image['link'].'"';
          if($count == 0){
            $index1 = $image['id'];
            $path1 = $image['link'];
            $count = 1;
          }
        }
        $index = substr($index,1,strlen($index));
        $paths = substr($paths,1,strlen($paths));
      ?>

<script type="text/javascript">
//<![CDATA[
var galleryType = "images";
var dataKey = "screenshots";
var viewType = "film-strip";
var indices = [<?php echo $index; ?>];
var itemPaths = [<?php echo $paths; ?>];
//var discussionSigs = ["a6862cfb175efc54ec1c3e57ee52694b", "749ee3682634875064a9d069c7e91866", "bad2df75abfceafb012bc4c70129017b", "c25670f2c7e041d88d64c25dea08eac5", "c4b2151e98d4de982339b546d5c40bce", "bd64f8e8ffb217a1131f5e245b9e34df", "79cdbbb77369916c0de1a928f9b270dc", "2854346e36a18f1de100143e8344ad53", "f33051bdec5d23c825928278a7551b1b", "7f9702bd0c7c19fcce7f57f82318e715", "1e9d66f16b482fd962e043e9e31e837b", "378c8c3ee0bb576b9248f674452eda98", "e4646ca682df38b81f939801cd7ac6f5", "f3ce908c263e342a00952dcb7ef8ee57", "db557ffd3a1da19270b02562a7dca162", "576f79c5e2d5e55393f281e5d6258e03", "5d70d4f9e88c11b1761db68bb2130acd"];
//]]>
</script>
<div class="film-strip-wrapper">
<div id="film-strip">
<div class="viewport-scrollbar">
<div class="track">
<div id="scroll-thumb" class="thumb">
<div class="thumb-bot">
</div>
</div>
</div>
</div>
<div class="viewport-content">
<div id="film-strip-thumbnails">
<?php
        mysql_select_db($server_db) or die(mysql_error());
        $images = mysql_query("SELECT * FROM media WHERE visible = '1' AND type ='2'");
        while ($thumb = mysql_fetch_assoc($images)){
      ?>
<a id="<?php echo $thumb['id']; ?>" class="film-strip-thumb-wrapper"
style="background-image:url(../../../images/media/screenshots/<?php echo $thumb['id_url']; ?>);background-size: 120px 75px;"
href="#/<?php echo $thumb['id']; ?>" onclick="GalleryViewer.loadItem('<?php echo $thumb['id']; ?>');">
<span class="film-strip-thumb-frame"></span>
</a>

<?php } 


mysql_select_db($server_db) or die(mysql_error());
$meta_data = mysql_fetch_assoc(mysql_query("SELECT * FROM media WHERE visible = '1' AND type ='2' and id = '".$_GET['id']."'"));
        ?>
</div>
</div>
</div>
<div class="ajax-frame">
<table>
<tr>
<td id="film-strip-ajax-target" onclick="GalleryViewer.getNextItem();" style="cursor:pointer">
<img id="current-image" src="<?php if(intval($_GET['id']) == $index1 || !isset($_GET['id'])){ echo $path1; } ?>" alt="" width="704" height="440" style="display:none;" />
</td>
</tr>
</table>
<a href="javascript:;" onclick="GalleryViewer.getNextItem();" class="paging-arrow next"></a>
<a href="javascript:;" onclick="GalleryViewer.getPreviousItem();" class="paging-arrow previous"></a>
</div>
</div>
<div id="media-meta-data">
<div class="meta-data">
<dl class="meta-details">
<dt>Date: <?php echo $meta_data['date']; ?></dt>
<dd></dd>
<dt class="dt-separator">Author:</dt>
<dd><?php echo $meta_data['author']; ?></dd>
</dl>
<dl class="meta-details">
<dt class="dt-downloads">
<a class="format" href="../../../images/media/screenshots/<?php echo $meta_data['url']; ?>" onclick="window.open(this.href);return false;">
Download the fullsize Image
</a>
</dt>
</dl>
<span class="clear"><!-- --></span>
</div>
</div>
<div id="media-comments">
<div id="load-comments">
<span id="load-comments-link" style="display:none;">Loading Comments...</span>
</div>
</div>
<div id="comments-error-retry" style="display:none">
<div class="media-comments-fail">
An error has ocurred while loading the comments, <a href="javascript:;" onclick="GalleryViewer.loadComments('heart-of-the-aspects-01')">try again?</a>.
</div>
</div>
</div>
<div style="display:none" id="media-preload-container"></div>
</div>
</div>
</div>
<script type="text/javascript" src="../../../wow/static/local-common/js/dropdown.js?v39"></script>
<script type="text/javascript" src="../../../wow/static/local-common/js/media/gallery-viewer.js?v39"></script>
<script type="text/javascript" src="../../../wow/static/local-common/js/media/data.js"></script>
<script type="text/javascript" src="../../../wow/static/local-common/js/third-party/jquery.mousewheel.min.js?v39"></script>
<!--[if lt IE 8]> <script type="text/javascript" src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery.pngFix.pack.js?v39"></script>
<script type="text/javascript">
//<![CDATA[
$('.png-fix').pngFix(); //]]>
</script>
<![endif]-->
        <?php include("../../../footer.php"); ?>
</div>
</body>
</html>