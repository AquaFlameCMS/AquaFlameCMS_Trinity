<?php 

	require_once("../configs.php");
	include_once("functions.d/GetMediaTheme.php");

	$page_cat = "media";


	$database_media_table = @new mysqli( constant('DBHOST'), constant('DBUSER'), constant('DBPASS'), constant('DB') );
	
	if (mysqli_connect_errno() == 0)
	{
		// VIDEO QUERY
		$media_video_count = 'SELECT * FROM media WHERE visible = 1 AND type = 0';
		$video_count = $database_media_table->query( $media_video_count );

		$media_video_query = 'SELECT * FROM media WHERE visible = 1 AND type = 0 LIMIT 2';
		$media_video = $database_media_table->query( $media_video_query );


		// WALLPAPER QUERY
		$media_wallpaper_count = 'SELECT * FROM media WHERE visible = 1 AND type = 1';
		$wallpaper_count = $database_media_table->query( $media_wallpaper_count );

		$media_wallpaper_query = 'SELECT * FROM media WHERE visible = 1 AND type = 1 LIMIT 4';
		$media_wallpaper = $database_media_table->query( $media_wallpaper_query );


		// SCREENSHOT QUERY
		$media_screenshot_count = 'SELECT * FROM media WHERE visible = 1 AND type = 2';
		$screenshot_count = $database_media_table->query( $media_screenshot_count );

		$media_screenshot_query = 'SELECT * FROM media WHERE visible = 1 AND type = 2 LIMIT 4';
		$media_screenshot = $database_media_table->query( $media_screenshot_query );


		// ARTWORK QUERY
		$media_artwork_count = 'SELECT * FROM media WHERE visible = 1 AND type = 3';
		$artwork_count = $database_media_table->query( $media_artwork_count );

		$media_artwork_query = 'SELECT * FROM media WHERE visible = 1 AND type = 3 LIMIT 4';
		$media_artwork = $database_media_table->query( $media_artwork_query );


		// COMICS QUERY
		$media_comic_count = 'SELECT * FROM media WHERE visible = 1 AND type = 4';
		$media_comic = $database_media_table->query( $media_comic_count );

		$media_comic_query = 'SELECT * FROM media WHERE visible = 1 AND type = 4 LIMIT 4';
		$media_comic = $database_media_table->query( $media_comic_query );


	}
	else
	{
		$error_message =  'Can not connect to the Database: <span class="hinweis">' .mysqli_connect_errno(). ' : ' .mysqli_connect_error(). '</span>';
	}

	$database_media_table->close();
?>
<!doctype html>
	<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
	<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
	<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
	<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
 	<html lang="en-gb">
		<head>
			<title><?php echo TITLE ?></title>
			<meta content="false" http-equiv="imagetoolbar" />
			<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
			<link rel="shortcut icon" href="<?php echo BASE_URL ?>wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
			<?php GetMediaTheme(); ?>
			<script src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
			<script src="<?php echo BASE_URL ?>wow/static/local-common/js/core.js?v17"></script>
			<script src="<?php echo BASE_URL ?>wow/static/local-common/js/tooltip.js?v17"></script>
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
					<div class="content-top body-top">
						<div class="content-trail">
							<ol class="ui-breadcrumb">
								<li itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
								<a href="<?php echo BASE_URL ?>" class="breadcrumb-arrow" itemprop="url">
									<span class="breadcrumb-text" itemprop="name"><?php echo TITLE ?></span>
									</a>
									</li>
									<li class="last" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
									<a href="<?php echo BASE_URL ?>media/" rel="np" itemprop="url">
										<span class="breadcrumb-text" itemprop="name"><?php echo $Media['Media']; ?></span>
									</a>
									</li>
								</ol>
							</div>
							<div class="content-bot">
								<div class="media-content">
									<div id="media-index">
										<div class="media-index-section float-left">
											<a class="gallery-title videos" href="videos/">
												<span class="view-all"><span class="arrow"></span><?php echo $Media['AllVideos']; ?></span>
												<span class="gallery-icon"></span>
												<?php echo $Media['Videos']; ?> <span class="total">(<?php echo $video_count->num_rows; ?>)</span>
											</a>
               								<div class="section-content">
											<?php					
											while($video = $media_video->fetch_object()) 
											{
											?>
                        				
											<a href="videos/visor/?id=<?php echo $video->id; ?>" class="thumb-wrapper video-thumb-wrapper first-video">
											<span class="video-info">
									<span class="video-title"><?php echo substr($video->title,0,50); ?></span>
									<span class="video-desc"><?php echo substr(strip_tags($video->description),0,50); ?>...</span>
									<span class="date-added"><?php echo $Media['added']; ?><?php echo date('d/m/Y', strtotime($video->date)); ?></span>
									</span>
									<span class="thumb-bg"; style="background-image: url('http://img.youtube.com/vi/<?php echo $video->id_url; ?>/0.jpg'); background-size: 188px 118px">
									<span class="thumb-frame"></span>
									</span>
									</a>
									<?php } ?>
                                    
									<span class="clear"><!-- --></span>
								</div>
								<span class="clear"><!-- --></span>
							</div>
							
							<div class="media-index-section float-right">
							
								<a class="gallery-title screenshots" href="screenshots/">
								<span class="view-all"><span class="arrow"></span><?php echo $Media['AllScreenshots']; ?></span>
								<span class="gallery-icon"></span>
								<?php echo $Media['Screenshots']; ?> <span class="total">(<?php echo $screenshot_count->num_rows; ?>)</span>
								</a>
								
								<div class="section-content">
								<?php
									$pos = 0;
                  					while($screenshot = $media_screenshot->fetch_object()) 
                  					{


                						?>
									<a class="thumb-wrapper <?php 
                    if ($pos % 2 == 0 ){ echo 'left-col';} //correct postion depends of number
                    if ($pos > 2){ echo 'bottom-row';}
                    $pos++; ?>" 
                    href="screenshots/visor/#/<?php echo $screenshot->id ?>">
									<span class="thumb-bg" style="background-image:url(<?php echo '../images/media/screenshot/'.$screenshot->id_url;  ?>);background-size: 189px 118px">
									<span class="thumb-frame"></span>
									</span>
									<span class="date-added"><?php echo $Media['added']; ?><?php echo date('d/m/Y', strtotime($screenshot->date)); ?></span>
									</a>
								<?php } ?>
									<span class="clear"><!-- --></span>
								</div>
								
								<span class="clear"><!-- --></span>
							</div>
							
							<span class="clear"><!-- --></span>
							
							<div class="media-index-section float-left">
								<a class="gallery-title artwork" href="artworks/">
								<span class="view-all"><span class="arrow"></span><?php echo $Media['AllArtworks']; ?></span>
								<span class="gallery-icon"></span>
								<?php echo $Media['Artwork']; ?> <span class="total">(<?php echo $artwork_count->num_rows; ?>)</span></a>
								
								<div class="section-content">
								<?php
								  $pos = 0;
                  while($artwork = $media_artwork->fetch_object())
                  { 
                ?>
									<a class="thumb-wrapper 
                  <?php 
                    if ($pos % 2 == 0 ){ echo 'left-col';} //correct postion depends of number
                    $pos++; ?>" 
                  href="artworks/visor/#/<?php echo $artwork->id ?>">
									<span class="thumb-bg" style="background-image:url(<?php echo '../images/media/artwork/'.$artwork->id_url;  ?>);background-size: 189px 118px">
									<span class="thumb-frame"></span>
									</span>
									<span class="date-added"><?php echo $Media['added']; ?><?php echo date('d/m/Y', strtotime($artwork->date)); ?></span>
									</a>
								<?php } ?>
									<span class="clear"><!-- --></span>
								</div>
								
								<span class="clear"><!-- --></span>
							</div>
							
							<div class="media-index-section float-right">
								<a class="gallery-title wallpapers" href="wallpapers/">
								<span class="view-all"><span class="arrow"></span><?php echo $Media['AllWallpapers']; ?></span>
								<span class="gallery-icon"></span>
								<?php echo $Media['Wallpapers']; ?> <span class="total">(<?php echo $artwork_count->num_rows; ?>)</span>
								</a>
								
								<div class="section-content">
								<?php
								  $pos = 0;
                  while($wallpaper = $media_wallpaper->fetch_object()) 
                  {
                ?>
									<a class="thumb-wrapper                   
                  <?php 
                    if ($pos % 2 == 0 ){ echo 'left-col';} //correct postion depends of number
                    $pos++; ?>" 
                  href="wallpapers/visor/#/<?php echo $wallpaper->id; ?>">
									<span class="thumb-bg" style="background-image:url(<?php echo '../images/media/wallpapers/'.$wallpaper->id_url;  ?>);background-size: 189px 118px">
									<span class="thumb-frame"></span>
									</span>
									<span class="date-added"><?php echo $Media['added']; ?> <?php echo date('d/m/Y', strtotime($wallpaper->date)); ?></span>
									</a>
								<?php } ?>
									<span class="clear"><!-- --></span>
								</div>
								
								<span class="clear"><!-- --></span>
							</div>
							
							<div class="media-index-section float-left">
								<a class="gallery-title comics" href="comics/">
								<span class="view-all"><span class="arrow"></span><?php echo $Media['AllComics']; ?></span>

								<span class="gallery-icon"></span>
								<?php echo $Media['Comics']; ?> <span class="total">(<?php echo $media_comic->num_rows; ?>)</span>
								</a>
								<div class="section-content">
								<?php
								  $pos = 0;
                  while($comic = $media_comic->fetch_object()) 
                  {
                ?>
									<a class="thumb-wrapper                   
                  <?php 
                    if ($pos % 2 == 0 ){ echo 'left-col';} //correct postion depends of number
                    $pos++; ?>" 
                  href="comics/visor/#/<?php echo $comic->id; ?>">
									<span class="thumb-bg" style="background-image:url(<?php echo '../images/media/comics/'.$comic->id_url;  ?>);background-size: 189px 118px">
									<span class="thumb-frame"></span>
									</span>
									<span class="date-added"><?php echo $Media['added']; ?><?php echo date('d/m/Y', strtotime($comic->date)); ?></span>
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
<?php include("../footer.php"); ?>
</div>
</div>
</body>
</html>
