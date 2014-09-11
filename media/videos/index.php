<?php 
require_once("../../configs.php");
include_once("functions.d/GetMediaTheme.php");
$page_cat = "media";
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
<title><?php echo TITLE ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="../../wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<?php GetMediaTheme(); ?>
<script src="../../wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script src="../../wow/static/local-common/js/core.js?v17"></script>
<script src="../../wow/static/local-common/js/tooltip.js?v17"></script>
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
<?php $page_cat="media"; include("../../header.php"); ?>
	<div id="content">
		<div class="content-top">
			<div class="content-trail">
			<ol class="ui-breadcrumb">
				<li><a href="../../" rel="np"><?php echo TITLE ?></a><span class="breadcrumb-arrow"></span></li>
				<li><a href="../" rel="np"><?php echo $Media['Media']; ?></a><span class="breadcrumb-arrow"></span></li>
                <li class="last"><a href="" rel="np"><?php echo $Media['Videos']; ?></a></li>
			</ol>
			</div>
			<div class="content-bot">
				<div class="media-content">
					<div id="media-index">
						<div class="thumbnail-page-wrapper">  
                        

						<?php
						$CantIndex = 12;
						$consulta0 = mysql_query(" SELECT * FROM media WHERE visible = 1 AND type = '0'");
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
							<a class="ui-button button1 button1-previous " href="v?pag=<?php echo $pagAnterior?>" id="previous-item" onClick="GalleryViewer.getPreviousPage()" >
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
							Page <span id='start-page'><?php echo $pagActual; ?></span> of <?php echo $pagTotal; ?>
							</span>

							<?php 
							if ($pagSiguiente<=$pagTotal) {
							?>
							<a class="ui-button button1 button1-next " href="?pag=<?php echo $pagSiguiente?>" id="next-item" onClick="GalleryViewer.getNextPage()" > 
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
<div id="thumbnail-page" class="video-page">
						<?php

						$consulta1 = mysql_query(" SELECT * FROM media WHERE visible = 1 AND type = '0' ORDER BY date DESC LIMIT ".(($pagActual-1)*$CantIndex).",".$CantIndex."");
						while($videos = mysql_fetch_assoc($consulta1)) {
						?>
						<a href="visor/?id=<?php echo $videos['id']; ?>" class="thumb-wrapper video-thumb-wrapper first-video">
						<span class="thumb-bg"; style="background-image: url('http://img.youtube.com/vi/<?php echo $videos['id_url']; ?>/0.jpg'); background-size: 188px 118px">
                        <span class="thumb-frame"></span></span>				
						<span class="thumb-title"><?php echo substr($videos['title'],0,45); ?></span></a>
						<?php } ?>
</div>
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
						<li><?php echo @$current[0]; ?><a href="?p=<?php echo @$_GET['p']; ?>&amp;pag=<?php echo @$pg; ?>"><?php echo @$pg; ?></a><?php echo @$current[1]; ?></li>
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
<script type="text/javascript" src="<?php echo BASE_URL ?>wow/static/local-common/js/search.js?v46"></script>
<script type="text/javascript">
//<![CDATA[
var xsToken = '';
var supportToken = '';
var jsonSearchHandlerUrl = '//eu.battle.net';
var Msg = {
support: {
ticketNew: 'Ticket {0} was created.',
ticketStatus: 'Ticket {0}’s status changed to {0}.',
ticketOpen: 'Open',
ticketAnswered: 'Answered',
ticketResolved: 'Resolved',
ticketCanceled: 'Cancelled',
ticketArchived: 'Archived',
ticketInfo: 'Need Info',
ticketAll: 'View All Tickets'
},
cms: {
requestError: 'Your request cannot be completed.',
ignoreNot: 'Not ignoring this user',
ignoreAlready: 'Already ignoring this user',
stickyRequested: 'Sticky requested',
stickyHasBeenRequested: 'You have already sent a sticky request for this topic.',
postAdded: 'Post added to tracker',
postRemoved: 'Post removed from tracker',
userAdded: 'User added to tracker',
userRemoved: 'User removed from tracker',
validationError: 'A required field is incomplete',
characterExceed: 'The post body exceeds XXXXXX characters.',
searchFor: "Search for",
searchTags: "Articles tagged:",
characterAjaxError: "You may have become logged out. Please refresh the page and try again.",
ilvl: "Level {0}",
shortQuery: "Search requests must be at least three characters long."
},
bml: {
bold: 'Bold',
italics: 'Italics',
underline: 'Underline',
list: 'Unordered List',
listItem: 'List Item',
quote: 'Quote',
quoteBy: 'Posted by {0}',
unformat: 'Remove Formating',
cleanup: 'Fix Linebreaks',
code: 'Code Blocks',
item: 'WoW Item',
itemPrompt: 'Item ID:',
url: 'URL',
urlPrompt: 'URL Address:'
},
ui: {
submit: 'Submit',
cancel: 'Cancel',
reset: 'Reset',
viewInGallery: 'View in gallery',
loading: 'Loading…',
unexpectedError: 'An error has occurred',
fansiteFind: 'Find this on…',
fansiteFindType: 'Find {0} on…',
fansiteNone: 'No fansites available.',
flashErrorHeader: 'Adobe Flash Player must be installed to see this content.',
flashErrorText: 'Download Adobe Flash Player',
flashErrorUrl: 'http://get.adobe.com/flashplayer/'
},
grammar: {
colon: '{0}:',
first: 'First',
last: 'Last'
},
fansite: {
achievement: 'achievement',
character: 'character',
faction: 'faction',
'class': 'class',
object: 'object',
talentcalc: 'talents',
skill: 'profession',
quest: 'quest',
spell: 'spell',
event: 'event',
title: 'title',
arena: 'arena team',
guild: 'guild',
zone: 'zone',
item: 'item',
race: 'race',
npc: 'NPC',
pet: 'pet'
},
search: {
noResults: 'There are no results to display.',
kb: 'Support',
post: 'Forums',
article: 'Blog Articles',
static: 'General Content',
wowcharacter: 'Characters',
wowitem: 'Items',
wowguild: 'Guilds',
wowarenateam: 'Arena Teams',
url: 'Suggested Links',
friend: 'Friends',
other: 'Other'
}
};
//]]>
</script>
<?php include("../../footer.php"); ?>
</body>
</html>
