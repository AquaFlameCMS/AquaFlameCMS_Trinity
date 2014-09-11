<?php
$page_cat = "forums";
require_once("../../configs.php");
require_once("../functions/post_toHtml.php");
include_once("functions.d/GetForumTheme.php");
?>
<!doctype html>
<head>
<title><?php echo TITLE ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="description" content="<?php echo DESCRIPTION ?>">
<meta name="keywords" content="<?php echo KEYWORDS ?>">
<link rel="shortcut icon" href="<?php echo BASE_URL ?>wow/static/local-common/images/favicons/wow.ico" type="image/x-icon" />
<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/en-gb/data/opensearch" title="Battle.net Search" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo BASE_URL ?>wow/static/local-common/css/common.css?v15" />
<!--[if IE]><link rel="stylesheet"  href="<?php echo BASE_URL ?>wow/static/local-common/css/common-ie.css?v15" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet"  href="<?php echo BASE_URL ?>wow/static/local-common/css/common-ie6.css?v15" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="<?php echo BASE_URL ?>wow/static/local-common/css/common-ie7.css?v15" /><![endif]-->
<?php GetForumTheme(); ?>
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
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/menu.js?v15"></script>
<script src="<?php echo BASE_URL ?>wow/static/js/wow.js?v4"></script>
</head>
<body class="en-gb logged-in">

<div id="wrapper">
<?php include("../../header.php"); ?>
<div id="content">
<div class="content-top">
<div class="content-trail">
<ol class="ui-breadcrumb">
<?php if($_GET['f'] != ""){
	$forumid = intval($_GET['f']);
	$get_forum = mysql_query("SELECT * FROM forum_forums WHERE id = '".$forumid."'");
	$forum = mysql_fetch_assoc($get_forum)or $error=1;
	$get_category = mysql_query("SELECT * FROM forum_categ WHERE id = '".$forum['categ']."'");
	$category = mysql_fetch_assoc($get_category)or $error=1;
	if(isset($_GET['page'])){
		$page = intval($_GET['page']);
	}else{
		$page = 1;
	}
	$news_second = ($page-1)*20;
	if($page==1){
	$get_threads = mysql_query("SELECT * FROM forum_threads WHERE forumid = '".$forum['id']."' ORDER by last_date DESC LIMIT 20");
	}else{
	$get_threads = mysql_query("SELECT * FROM forum_threads WHERE forumid = '".$forum['id']."' ORDER by last_date DESC LIMIT 20,$news_second");
	}
	$get_allthreads = mysql_query("SELECT * FROM forum_threads WHERE forumid = '".$forum['id']."'");
	echo '
	<li><a href="'.BASE_URL.'index.php" rel="np">'.$website['title'].'</a><span class="breadcrumb-arrow"></span></li>
	<li><a href="'.BASE_URL.'forum" rel="np">Forums</a><span class="breadcrumb-arrow"></span></li>
	<li><a href="'.BASE_URL.'forum" rel="np">'.$category['name'].'</a><span class="breadcrumb-arrow"></span></li>
	<li class="last"><a href="#" rel="np">'.$forum['name'].'</a></li>
	';
	
	/* small fix */
	$error = 0;
}else{ $error=1; }
if($error == 1){
echo '
<li><a href="'.BASE_URL.'index.php" rel="np">World of Warcraft</a></li>
<li class="last"><a href="'.BASE_URL.'forum" rel="np">Forums</a></li>
';
}
?>
</ol>
</div>
<div class="content-bot">
<div id="forum-content">
		<script type="text/javascript">
		//<![CDATA[
			$(function(){ Cms.Forum.threadListInit('<?php echo $forum['id']; ?>'); });
		//]]>
	    </script>
		<?php if($error == 1){ echo '
		<style type="text/css">
			.loader {
			width:24px;
			height:24px;
			background: url("/wow/static/images/loaders/canvas-loader.gif") no-repeat;
		   }
		</style>
		<center>'.$Forum['Forum36'].'<br /><br /><div class="loader"> </div><br />'.$Forum['Forum37'].'</center>
		<meta http-equiv="refresh" content="2;url='.BASE_URL.'"/>
		';
		}else{ ?>
		<div class="forum-options">
          	<a href="javascript:;" onClick="Cms.Forum.setView('simple',this)"><?php echo $Forum['Forum39'] ?></a>
        	<a href="javascript:;" class="active" onClick="Cms.Forum.setView('advanced',this)"><?php echo $Forum['Forum38'] ?></a>
        </div>
		
		<div class="forum-actions top">
		<div class="actions-panel">
        <div class="pageNav">
		<?php
		$pages = ceil(mysql_num_rows($get_allthreads)/20);
		for ($i=1;$i<=$pages;$i++){
			if($i == $page){ echo '<span class="active">'.$i.'</span>'; }else{
			echo '<a href="?f='.$forumid.'&page='.$i.'">'.$i.'</a><div class="page-sep"></div>';}
		}
		?>
		<!--
						<a href="#">2</a>
						<div class="page-sep"></div>

            	<div class="page-sep">
					...
        		</div>

	            <a href="#">Last Page</a>
		            	<a href="#">Next &gt;</a>-->
        </div>

		<a class="ui-button button1 imgbutton " href="<?php echo $website['root'].'forum'; ?>"><span><span><span class="back-arrow"> </span></span></span></a>
		<?php
		if(isset($_SESSION['username'])){
			if($forum['locked'] == 1){
				mysql_select_db($server_db,$connection_setup)or print($lang['db']);
				
				$posterInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id = '".$account_information['id']."'"));
					switch($posterInfo['class']){
						case "blizz":
							echo'<a class="ui-button button1" href="create-topic/?f='.$forumid.'"><span><span>'.$Forum['Forum40'].'</span></span></a>';
							break;
							
						case "mvp":
							echo'<a class="ui-button button1" href="create-topic/?f='.$forumid.'"><span><span>'.$Forum['Forum40'].'</span></span></a>';
							break;
							
						default:
							echo'<a class="ui-button button1 disabled" href="#"><span><span>'.$Forum['Forum40'].'</span></span></a>';
							break;
					}
			}else{
				echo'<a class="ui-button button1" href="create-topic/?f='.$forumid.'"><span><span>'.$Forum['Forum40'].'</span></span></a>';
			}
		}else{
			echo '<a class="ui-button button1 disabled"><span><span>'.$Forum['Forum40'].'</span></span></a>';
		}
		?>
		<span class="clear"><!-- --></span>
        </div>
		</div>
		
		<div id="posts-container">
			<table id="posts" cellspacing="0" class="advanced">
				<tr class="post-th">
					<td></td>
					<td colspan="2"><?php echo $Forum['Forum48'] ?></td>
					<td><?php echo $Forum['Forum49'] ?></td>
						<td class="replies"><?php echo $Forum['Forum41'] ?></td>
						<td class="views"><?php echo $Forum['Forum42'] ?></td>
						<td class="poster"><?php echo $Forum['Forum43'] ?></td>
				</tr>
				<?php
				if(mysql_num_rows($get_threads) == 0){
				echo '
					<tr>
					<td class="post-icon"><div class="forum-post-icon"></div></td>
					<td class="post-title">'.$Forum['Forum43'].'</td>
					<td class="post-pageNav"></td>
					<td class="post-author"></td>
						<td class="post-replies"></td>
						<td class="post-views"></td>
						<td class="post-lastPost"></td>
					<tr>
				';
				}else{
				while($thread = mysql_fetch_array($get_threads)){
				    mysql_select_db($server_adb,$connection_setup)or print($lang['adb']);
				    $posterAccount = mysql_fetch_assoc(mysql_query("SELECT * FROM account WHERE id = '".$thread['author']."'"));
                    mysql_select_db($server_db,$connection_setup)or print($lang['db']);
				    $posterInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id = '".$thread['author']."'"));
					if($posterInfo['character'] == 0){ $charInfo['name'] = $posterInfo['firstName']; }else{
                    $charInfo = mysql_fetch_assoc(mysql_query("SELECT name FROM $server_cdb.characters WHERE guid = '".$posterInfo['character']."'"));
					}
				echo'
				<tr id="postRowId" class="featured read">
					<td class="post-icon">
						<div class="forum-post-icon">';
						if($thread['has_blizz'] == 1 || $posterInfo['blizz'] == 1){
							echo'
								<div class="blizzard_icon">
									<a href="" onmouseover="Tooltip.show(this,\''.$Forum['Forum50'].'\');"></a>
								</div>';
						}
						echo'
						</div>
					</td>
					
					<td class="post-title">';
							if($thread['prefix'] != "none"){
							echo'<span class="post-status">['.$thread['prefix'].']</span>';
							}
                            $small = removeBBCode($thread['content']);
							echo'
							<div id="thread_tt_'.$thread['id'].'" style="display:none">
								<div class="tt_detail">
										'.substr($small,0,75).'...
								</div>
								
								<div class="tt_time">'.$thread['date'].'</div> 
								<div class="tt_info">
									'.$thread['views'].' '.$Forum['Forum42'].' / '.$thread['replies'].' '.$Forum['Forum41'].'<br />';
									$get_last_reply = mysql_query("SELECT * FROM forum_replies WHERE threadid = '".$thread['id']."' ORDER BY id DESC");
									if(mysql_num_rows($get_last_reply) == 0){
										$get_user = mysql_query("SELECT * FROM users WHERE id = '".$thread['author']."'");
										$lp = mysql_fetch_assoc($get_user);
										$date = $thread['date'];
									}else{
										$this_reply = mysql_fetch_assoc($get_last_reply);
										$date = $this_reply['date'];
										$get_user = mysql_query("SELECT * FROM users WHERE id = '".$this_reply['author']."'");
										$lp = mysql_fetch_assoc($get_user);
										
									}
									$posterAccountx = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.account WHERE id = '".$lp['id']."'"))or print(mysql_error());
									if($lp['character'] == 0){ $posterCharacterx['name'] = $lp['firstName']; }else{
									$posterCharacterx = mysql_fetch_assoc(mysql_query("SELECT name FROM $server_cdb.characters WHERE guid = '".$lp['character']."'"))or print(mysql_error());
									}
									echo'
										'.$Forum['Forum51'].' <i>'.strtolower($posterCharacterx['name']).'</i> '.$Forum['Forum52'].' ('.$date.')
								</div>
							</div>
							<a href="view-topic/?t='.$thread['id'].'" onmouseover="Tooltip.show(this, \'#thread_tt_'.$thread['id'].'\',{ location: \'mouse\' });">
									<b>'.$thread['name'];
								if($thread['locked'] != 0){
								echo ' <img src="'.BASE_URL.'wow/static/images/layout/cms/post_locked.gif" alt="" />';
								}
								echo '
							</a></b>
					</td>
					
					<td class="post-pageNav"></td>
					<td class="post-author">
							';
							if($posterInfo['class'] == 'blizz'){
							echo'
							<span class="type-blizzard">
								'.$charInfo['name'].'
								<img src="'.BASE_URL.'wow/static/images/layout/cms/icon_blizzard.gif" alt="" />
							</span>';
							}else{
							echo $charInfo['name'];
							}
							echo '
					</td>
					
					<td class="post-replies">
						'.$thread['replies'].'
					</td>
					
					<td class="post-views">
						'.$thread['views'].'
					</td>
					
					<td class="post-lastPost">
					
						<a href="#" onmouseover="Tooltip.show(this, \''.$date.'\');">
								';
								$get_last_reply = mysql_query("SELECT * FROM forum_replies WHERE threadid = '".$thread['id']."' ORDER BY id DESC");
								if(mysql_num_rows($get_last_reply) == 0){
									$get_user = mysql_query("SELECT * FROM users WHERE id = '".$thread['author']."'");
									$lp = mysql_fetch_assoc($get_user);
								}else{
									$this_reply = mysql_fetch_assoc($get_last_reply);
									$get_user = mysql_query("SELECT * FROM users WHERE id = '".$this_reply['author']."'");
									$lp = mysql_fetch_assoc($get_user);
									
								}
								$posterAccountx = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.account WHERE id = '".$lp['id']."'"))or print(mysql_error());
								if($lp['character'] == 0){ $posterCharacterx['name'] = $lp['firstName']; }else{
								$posterCharacterx = mysql_fetch_assoc(mysql_query("SELECT name FROM $server_cdb.characters WHERE guid = '".$lp['character']."'"))or print(mysql_error());
								}
								if($lp['class'] == "blizz"){
								echo '
								<span class="type-blizzard">
										'.$posterCharacterx['name'].'
								</span><img src="'.BASE_URL.'wow/static/images/layout/cms/icon_blizzard.png" alt="" />';}else{
								echo $posterCharacterx['name'];
								}
								echo'
						</a>
							
					</td>
				</tr>';
				} 
				$_SESSION['dpage'] = $thread['last_date']; }
				?>
				
				</table>
		</div>

        


        <div class="forum-info">
		<div class="forum-actions topic-bottom">
			<div class="actions-panel">
				<div class="pageNav">
					<?php
					$pages = ceil(mysql_num_rows($get_allthreads)/20);
					for ($i=1;$i<=$pages;$i++){
						if($i == $page){ echo '<span class="active">'.$i.'</span>'; }else{
						echo '<a href="?f='.$forumid.'&page='.$i.'">'.$i.'</a><div class="page-sep"></div>';}
					}
					?>
				</div>
				<a class="ui-button button1 imgbutton " href="index.php"><span><span><span class="back-arrow"> </span></span></span></a>
				<?php
				if(isset($_SESSION['username'])){
					if($forum['locked'] == 1){
						mysql_select_db($server_db,$connection_setup)or print($lang['db']);
						
						$posterInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id = '".$account_information['id']."'"));
							switch($posterInfo['class']){
								case "blizz":
									echo'<a class="ui-button button1" href="create-topic/?f='.$forumid.'"><span><span>Create Thread</span></span></a>';
									break;
									
								case "mvp":
									echo'<a class="ui-button button1" href="create-topic/?f='.$forumid.'"><span><span>Create Thread</span></span></a>';
									break;
									
								default:
									echo'<a class="ui-button button1 disabled" href="#"><span><span>Create Thread</span></span></a>';
									break;
							}
					}else{
						echo'<a class="ui-button button1" href="create-topic/?f='.$forumid.'"><span><span>Create Thread</span></span></a>';
					}
				}else{
					echo '<a class="ui-button button1 disabled"><span><span>Create Thread</span></span></a>';
				}
				?>
				<span class="clear"><!-- --></span>
			</div>
		</div>
        </div>
		<?php } ?>
    </div>
</div>
</div>
</div>
<script type="text/javascript" src="../../wow/static/local-common/js/search.js?v46"></script>
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
</div>
</body>
</html>