<?php
require_once("../configs.php");
$page_cat = "forums";
include_once("functions.d/GetForumTheme.php");
?>
<!doctype html>
<html lang="en-gb">
<head>
<title><?php echo TITLE ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="description" content="<?php echo DESCRIPTION ?>">
<meta name="keywords" content="<?php echo KEYWORDS ?>">
<link rel="shortcut icon" href="<?php echo BASE_URL ?>wow/static/local-common/images/favicons/wow.ico" type="image/x-icon" />
<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/en-gb/data/opensearch" title="Battle.net Search" />
<?php GetForumTheme(); ?>
<!--[if IE]><link rel="stylesheet" href="<?php echo BASE_URL ?>wow/static/local-common/css/common-ie.css?v15" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" href="<?php echo BASE_URL ?>wow/static/local-common/css/common-ie6.css?v15" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="<?php echo BASE_URL ?>wow/static/local-common/css/common-ie7.css?v15" /><![endif]-->

<!--[if IE 6]><link rel="stylesheet" href="<?php echo BASE_URL ?>wow/static/css/cms-ie6.css?v4" /><![endif]-->
<!--[if IE]><link rel="stylesheet" href="<?php echo BASE_URL ?>wow/static/css/wow-ie.css?v4" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" href="<?php echo BASE_URL ?>wow/static/css/wow-ie6.css?v4" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="<?php echo BASE_URL ?>wow/static/css/wow-ie7.css?v4" /><![endif]-->
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery-1.4.4.min.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/core.js?v15"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/tooltip.js?v15"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/cms.js"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
Core.staticUrl = '<?php echo $website['address'];?>wow/static';
Core.baseUrl = '<?php echo $website['address'];?>';
Core.project = 'wow';
Core.locale = 'en-gb';
Core.buildRegion = 'eu';
Core.loggedIn = true;
Flash.videoPlayer = 'http://eu.media.blizzard.com/wow/player/videoplayer.swf';
Flash.videoBase = 'http://eu.media.blizzard.com/wow/media/videos';
Flash.ratingImage = 'http://eu.media.blizzard.com/wow/player/rating-pegi.jpg';
//]]>
</script>
<body class="en-gb forums forums-home" onunload="opener.location=('index.php')">
<div id="wrapper">
	<?php include("../header.php"); ?>
		<div id="content">
			<div class="content-top">
			<div class="content-trail">
				<ol class="ui-breadcrumb">
					<li itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
					<a href="../index.php" rel="np" class="breadcrumb-arrow" itemprop="url">
					<span class="breadcrumb-text" itemprop="name"><?php echo TITLE ?></span>
					</a>
					</li>
					<li class="last" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
					<a href="../forum" rel="np" rel="np" itemprop="url">
					<span class="breadcrumb-text" itemprop="name"><?php echo $Forums['Forums']; ?></span>
					</a>
					</li>
				</ol>
			</div>
			<div class="content-bot clear">
				<div id="blizz-tracker-lite">
					<div class="blizzard-posts">
						<h2 class="header-2"><?php echo $Forum['Forum77']; ?> <a href="#">(<?php echo $View_all['View_all']; ?>)</a></h2>
						<a href="javascript:;" class="paging-arrow arrow-left"></a>
						<a href="javascript:;" class="paging-arrow arrow-right"></a>
						<div class="mask-wrapper">
							<div class="mask">
									<div class="holder" id="tracker-scroll-container">
										<?php
										$get_blizzposts = mysql_query("SELECT * FROM forum_blizzposts ORDER BY date DESC");
										$i=0;
										while($blizzpost = mysql_fetch_array($get_blizzposts)){
											if($blizzpost['type'] == "reply"){
												$post = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_replies WHERE id = '".$blizzpost['postid']."'"));
												$threadId = $post['threadid'];
											}else{
												$post = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_threads WHERE id = '".$blizzpost['postid']."'"));
												$threadId = $post['id'];
											}
											$forum = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_forums WHERE id = '".$post['forumid']."'"));
											
											if($i==0){ echo '<div class="set">'; }
											echo'<a class="tracked-blizzard-post" href="category/view-topic/?t='.$threadId.'">
												<span class="desc">
													<span class="int">';
														$content = substr($post['content'],0,120);
														$content=str_replace("[quote", "",$content);
														$content=str_replace("[/quote]", "",$content);
														$content=str_replace("[b]", "",$content);
														$content=str_replace("[/b]", "",$content);
														$content=str_replace("[i]", "",$content);
														$content=str_replace("[/i]", "",$content);
														$content=str_replace("[u]", "",$content);
														$content=str_replace("[/u]", "",$content);
														$content=str_replace("[ul]", "",$content);
														$content=str_replace("[/ul]", "",$content);
														$content=str_replace("[li]", "",$content);
														$content=str_replace("[/li]", "",$content);
														$content=str_replace("[code]", "",$content);
														$content=str_replace("[/code]", "",$content);
														$content=str_replace("]", "",$content);
														$content=stripslashes($content);
														echo '"'.$content.' ..."
													</span>
												</span>
												<span class="info">
												<span class="char">
												<span class="employee-icon"></span>';
														$userBlizz = mysql_fetch_assoc(mysql_query("SELECT `character`,firstName FROM users WHERE id = '".$blizzpost['author']."'"));
														if($userBlizz['character'] == 0){
															$char['name'] = $userBlizz['firstName'];
														}else{
															$char=mysql_fetch_assoc(mysql_query("SELECT name FROM $server_cdb.characters WHERE guid = '".$userBlizz['character']."'"));
														}
														
														echo $char['name'].'</span>
														 '.$post['date'].'
														 '.$Forum['Forum80'].' <strong>'.$forum['name'].'</strong>:
														 '.$post['name'].'
												 </span>
											</a>';
											$i++;
											if($i==3){ echo '</div>'; $i=0;}
											
										}
										?>
									<div class="set">
										<a class="tracked-blizzard-post" href="blizztracker/">
										<span class="desc">
										<span class="int"><?php echo $Forum['Forum78']; ?> </span>
										</span>
										<span class="info">
										</span>
										</a>
									</div>
								</div>
							</div>
							<div class="mask-edge mask-left">
							</div>
							<div class="mask-edge mask-right">
							</div>
						</div>
					</div>
				</div>
				<span class="clear">
				<!-- -->
				</span>
				<div id="station-content">
					<div class="station-content-wrapper">
						<div class="station-inner-wrapper">
							<div class="full-column" id="forum-list">
								<div class="forum-list-interior">
											<?php
											$get_categs = mysql_query("SELECT * FROM forum_categ ORDER BY num ASC");
											while($categ = mysql_fetch_array($get_categs)){
												echo'
									<div class="forum-group">
										<h2 class="header-2">
												<a id="forum'.$categ['id'].'" href="javascript:;" onclick="Cms.Station.parentToggle('.$categ['id'].',this)" class="group-header">'.$categ['name'].' </a>
										</h2>
										<ul class="child-forums" id="child'.$categ['id'].'">';
													$get_forums = mysql_query("SELECT * FROM forum_forums WHERE categ = '".$categ['id']."' ORDER BY num ASC");
													while($forum = mysql_fetch_array($get_forums)){
														echo '
											<li class="child-forum">														
													<a href="category/?f='.$forum['id'].'" class="forum-link">
														<span class="forum-icon">
																<img src="../images/forum/forumicons/'.$forum['image'].'.gif" />
														</span>
											<span class="forum-details">
											<span class="forum-title">
											'.$forum['name'].' <span class="forum-status">
											<strong>'.$forum['status'].'</strong>
											</span>
											</span>
											<span class="forum-desc">'.$forum['description'].' </span>
											</span>
											</a>
											</li>';
											}
											echo'
											<span class="clear">
											<!-- -->
											</span>
										</ul>
									</div>';
									}
									?>
								</div>
								<a class="code-of-conduct" href="#" target="_blank">Forums Code of Conduct</a>
							</div>
							<span class="clear">
							<!-- -->
							</span>
						</div>
					</div>
				</div>
				<script type="text/javascript">
		$(function(){
			Station.initialize();
		})
	</script>
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
<?php include("../footer.php"); ?>
</body>
</html>