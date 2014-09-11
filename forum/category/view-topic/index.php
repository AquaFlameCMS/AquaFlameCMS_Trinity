<?php require_once("../../../configs.php"); 
$page_cat = "forums";

if(isset($_POST['s_move'])){
  mysql_select_db($server_db);
  $move = mysql_query("UPDATE forum_threads SET forumid = '".intval($_POST['t_move'])."' WHERE id = '".intval($_GET['t'])."'");
}
?>
<!doctype html>
<head>
<title><?php echo TITLE ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="description" content="<?php echo DESCRIPTION ?>">
<meta name="keywords" content="<?php echo KEYWORDS ?>">
<link rel="shortcut icon" href="<?php echo BASE_URL ?>wow/static/local-common/images/favicons/wow.ico" type="image/x-icon"/>
<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/en-gb/data/opensearch" title="Battle.net Search" />
<link rel="stylesheet" href="<?php echo BASE_URL ?>wow/static/local-common/css/common.css?v37" />
<!--[if IE]> <link rel="stylesheet" href="/wow/static/local-common/css/common-ie.css?v37" /><![endif]-->
<!--[if IE 6]> <link rel="stylesheet" href="/wow/static/local-common/css/common-ie6.css?v37" /><![endif]-->
<!--[if IE 7]> <link rel="stylesheet" href="/wow/static/local-common/css/common-ie7.css?v37" /><![endif]-->
<link title="World of Warcraft - News" href="/wow/en/feed/news" type="application/atom+xml" rel="alternate"/>
<link rel="stylesheet" href="<?php echo BASE_URL ?>wow/static/css/wow.css?v19" />
<link rel="stylesheet" href="<?php echo BASE_URL ?>wow/static/local-common/css/cms/forums.css?v37" />
<link rel="stylesheet" href="<?php echo BASE_URL ?>wow/static/local-common/css/cms/cms-common.css?v37" />
<link rel="stylesheet" href="<?php echo BASE_URL ?>wow/static/css/cms.css?v19" />
<!--[if IE 6]> <link rel="stylesheet" href="/wow/static/css/cms-ie6.css?v19" /><![endif]-->
<!--[if IE]> <link rel="stylesheet" href="/wow/static/css/wow-ie.css?v19" /><![endif]-->
<!--[if IE 6]> <link rel="stylesheet" href="/wow/static/css/wow-ie6.css?v19" /><![endif]-->
<!--[if IE 7]> <link rel="stylesheet" href="/wow/static/css/wow-ie7.css?v19" /><![endif]-->
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery.js?v37"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/core.js?v37"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/tooltip.js?v37"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/bml.js"></script>
<script src="http://static.wowhead.com/widgets/power.js"></script>
<!--[if IE 6]> <script type="text/javascript">//<![CDATA[try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}//]]></script><![endif]-->

<script type="text/javascript">
	//<![CDATA[
		Core.staticUrl = '/wow/static';
		Core.sharedStaticUrl= '/wow/static/local-common';
		Core.baseUrl = '';
		Core.projectUrl = '/wow';
		Core.cdnUrl = 'http://eu.media.blizzard.com';
		Core.supportUrl = 'http://eu.battle.net/support/';
		Core.secureSupportUrl= 'https://eu.battle.net/support/';
		Core.project = 'wow';
		Core.locale = 'en-gb';
		Core.language = 'en';
		Core.buildRegion = 'eu';
		Core.region = 'eu';
		Core.shortDateFormat= 'dd/MM/yyyy';
		Core.dateTimeFormat = 'dd/MM/yyyy HH:mm';
		Core.loggedIn = true;
		Flash.videoPlayer = 'http://eu.media.blizzard.com/global-video-player/themes/wow/video-player.swf';
		Flash.videoBase = 'http://eu.media.blizzard.com/wow/media/videos';
		Flash.ratingImage = 'http://eu.media.blizzard.com/global-video-player/ratings/wow/en-gb.jpg';
		Flash.expressInstall= 'http://eu.media.blizzard.com/global-video-player/expressInstall.swf';
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-544112-16']);
		_gaq.push(['_setDomainName', '.battle.net']);
		_gaq.push(['_trackPageview']);
		_gaq.push(['_trackPageLoadTime']);
	//]]>
</script>

<meta name="title" content="Im looking for someone to play with" />
<link rel="image_src" href="<?php echo BASE_URL ?>wow/static/images/icons/facebook/article.jpg" />
</head>
<body class="en-gb logged-in">

<?php
require("../../functions.php");
require("../../functions/post_toHtml.php");
?>

<div id="wrapper">
<?php include("../../../header.php"); ?>
<div id="content">
<div class="content-top">
<div class="content-trail">
<ol class="ui-breadcrumb">
<?php
if($_GET['t'] != ""){
	$error = 0;
	$threadid = intval($_GET['t']);
	$ndate = date('Y-m-d H:i:s');
	
	$thread = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_threads WHERE id = '".$threadid."'"))or $error=1;
	$postid = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_posts WHERE type = 1 AND postid = '".$thread['id']."'"));
	$update = mysql_query("UPDATE forum_threads SET views = views + 1 WHERE id = '".$thread['id']."'");
	$forum = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_forums WHERE id = '".$thread['forumid']."'"))or $error=1;
	$category = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_categ WHERE id = '".$forum['categ']."'"))or $error=1;
	if(isset($_SESSION['username'])){ $userInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id = '".$account_information['id']."'")); }
	
	echo '
	<li><a href="'.BASE_URL.'index.php" rel="np">'.$website['title'].'</a><span class="breadcrumb-arrow"></span></li>
	<li><a href="'.BASE_URL.'forum" rel="np">Forums</a><span class="breadcrumb-arrow"></span></li>
	<li><a href="'.BASE_URL.'forum" rel="np">'.$category['name'].'</a><span class="breadcrumb-arrow"></span></li>
	<li><a href="'.BASE_URL.'forum/category/?f='.$forum['id'].'" rel="np">'.$forum['name'].'</a><span class="breadcrumb-arrow"></span></li>
	<li class="last"><a href="../?t='.$thread['id'].'" rel="np">'.$thread['name'].'</a></li>
	';
	
}else $error=1;

if($error == 1){
	echo '
	<li><a href="'.BASE_URL.'index.php" rel="np">'.$website['title'].'</a></li>
	<li class="last"><a href="index.php" rel="np">Forums</a></li>
	';
}else{
	if(isset($_POST['detail']) && $_POST['detail'] != ""){
		$reply = $_POST['detail'];
		$reply = stripslashes($reply);
		$reply = strip_tags($reply);
		$reply = addslashes($reply);
		$reply = nl2br($reply);

            $insert = mysql_query("INSERT INTO forum_replies (threadid,content,author,date,forumid,name,last_date) VALUES ('".$thread['id']."','".mysql_real_escape_string($reply)."','".mysql_real_escape_string($account_information['id'])."','".$ndate."','".$forum['id']."','".mysql_real_escape_string($thread['name'])."','".$ndate."')")or print(''.$Forum['Forum58'].'');
            $replies = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_replies WHERE threadid = '".$thread['id']."' ORDER BY id DESC LIMIT 1"));
            $insert = mysql_query("INSERT INTO forum_posts (type,postid) VALUES ('2','".$replies['id']."')");
            $update = mysql_query("UPDATE forum_threads SET last_date = '".$ndate."', replies = replies + 1 WHERE id = '".$thread['id']."'");
		
		if($userInfo['class'] == "blizz"){
			$update = mysql_query("UPDATE forum_threads SET has_blizz = 1 WHERE id = '".$thread['id']."'");
			$insert = mysql_query("INSERT INTO forum_blizzposts (type,author,postid) VALUES ('reply','".$userInfo['id']."','".$replies['id']."')");
		}
		
		$posted = 1;
		
	} else $posted = 0;
}
?>
</ol>
</div>
<div class="content-bot">
<div id="forum-content">

		<script type="text/javascript">
		//<![CDATA[
			$(function(){ Cms.Forum.threadListInit('<?php echo $thread['id']; ?>'); });
		//]]>
	    </script>
		
		<?php
		if($error == 1){
		
			echo '
			<style type="text/css">
				.loader {
				width:24px;
				height:24px;
				background: url("../wow/static/images/loaders/canvas-loader.gif") no-repeat;
			   }
			</style>
			<center>'.$Forum['Forum59'].'<br /><br /><div class="loader"> </div><br />'.$Forum['Forum37'].'</center>
			<meta http-equiv="refresh" content="2;url=../index.php"/>
			';
			
		}else{
		?>
		
		<?php if($posted != 1){ ?>
		
		<?php
		echo
			'
			<div class="section-header">
				<div class="blizzard_icon"><a class="nextBlizz" href="#" onmouseover="Tooltip.show(this,\''.$Forum['Forum50'].'\');"></a></div>
				<span class="topic">'.$Forum['Forum60'].'</span>';
				
				$posterAccount = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.account WHERE id = '".$thread['author']."'"));
				$posterInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id = '".$posterAccount['id']."'"));
				
				if($posterInfo['character'] == 0){
					$char['name'] = $posterInfo['firstName'];
					$char['val'] = 0;
				}else{
					$char = mysql_fetch_assoc(mysql_query("SELECT name,level,class,race FROM $server_cdb.characters WHERE guid = '".$posterInfo['character']."'"));
					$char['val'] = 1;
				}
				
				if($thread['prefix'] != "none"){
					echo '( '.$thread['prefix'];
					if($thread['locked'] == 1){ echo ' Locked )';}else{ echo ' )'; }
				}else{
					if($thread['locked'] == 1){ echo '( Locked )';}
				}
				echo '
				<span class="sub-title">'.$thread['name'].'</span>
			</div>
		
			<div class="forum-actions top">
				<div class="actions-panel">
					<a class="ui-button button1 imgbutton " href="../?f='.$thread['forumid'].'"><span><span><span class="back-arrow"> </span></span></span></a>';
					if (isset($_SESSION['username'])){
					   if ($thread['locked'] == 0 && $userInfo['class'] == ""){
                echo '<a class="ui-button button1" href="#new-post"><span><span>'.$Forum['Forum61'].'</span></span></a>';
             }
             elseif ($thread['locked'] == 1 && $userInfo['class'] == ""){
                echo '<a class="ui-button button1 disabled" href="#new-post"><span><span>'.$Forum['Forum61'].'</span></span></a>';
             }
             else{ //If class mvp or blizz
                echo '<a class="ui-button button1" href="#new-post"><span><span>'.$Forum['Forum61'].'</span></span></a>';
                if ($thread['locked'] == 0) echo '<a class="ui-button button1" href="../edit-post/lock.php?p='.$postid['id'].'"><span><span>Close Topic</span></span></a>';
                else echo '<a class="ui-button button1" href="../edit-post/lock.php?p='.$postid['id'].'"><span><span>Open Topic</span></span></a>';
                echo '<a class="ui-button button1" href="../edit-post/delete.php?p='.$postid['id'].'"><span><span>Delete Topic</span></span></a>';
                $categ = mysql_query("SELECT * FROM forum_categ ORDER BY num ASC");
                echo '<div style="float:right;">
                <form method="post" action="">
                <select name="t_move"><option value="">Move to...</option>';
                while ($group = mysql_fetch_assoc($categ)){
                  echo '<optgroup label="'.$group['name'].'">';
                  $forums = mysql_query("SELECT * FROM forum_forums WHERE categ = '".$group['id']."' ORDER BY num ASC");
                  while ($op = mysql_fetch_assoc($forums)){
                    echo '<option value="'.$op['id'].'">'.$op['name'].'</option>';
                  }
                  echo '</optgroup>';
                }
                echo '</select><button type="submit" name="s_move" class="ui-button button1" style="float:right;"><span><span>MOVE</span></span></button>
                </form></div>';
             } 
          }
          elseif($thread['locked'] == 0){
            echo '<a class="ui-button button1" href="?login" onclick="return Login.open()"><span><span>'.$Forum['Forum61'].'</span></span></a>';
          } else{
            echo '<a class="ui-button button1 disabled" href="?login" onclick="return Login.open()"><span><span>'.$Forum['Forum61'].'</span></span></a>';
          }
					echo '		
					<span class="clear"><!-- --></span>
				</div>
			</div>
		
			<div id="thread">';

				switch($posterInfo['class']){
				case "blizz":
				echo '<div id="post-1" class="post blizzard">';
				break;
				case "mvp":
				echo '<div id="post-1" class="post mvp">';
				break;
				default:
				echo'<div id="post-1" class="post general">';
				break;
				}
				
				echo '
				<span id="1"></span>
				<div class="post-interior">
					<table>
					<tr>
					
						<!-- User Images -->
						<td class="post-character">
						<div class="post-user">
							<div class="avatar">
								<div class="avatar-interior">
										<a href="#"><img height="84" src="'.BASE_URL.'images/avatars/2d/'.$posterInfo['avatar'].'" alt="" /></a>
								</div>
							</div>
							
							<div class="character-info">
								<div class="user-name">
									<span class="char-name-code" style="display: none">'.$char['name'].'</span>
									
									<div id="context-2" class="ui-context">
										<div class="context">
											<a href="javascript:;" class="close" onclick="return CharSelect.close(this);"></a>
											<div class="context-user"><strong>'.$char['name'].'</strong></div>
											<div class="context-links">
											<a href="#" title="View posts" rel="np" class="icon-posts link-first link-last">'.$Forum['Forum62'].'</a>
											</div>
										</div>
									</div>
									
									<a href="javascript:;" class="context-link" rel="np">'.$char['name'].'</a>
								</div>
								';
								
								switch($posterInfo['class']){
								case "blizz": echo '<div class="blizzard-title">'.$Forum['Forum63'].'</div>'; break;
								case "mvp": echo '<div class="mvp-title">'.$Forum['Forum64'].'</div>'; break;
								default: 
									echo'<div>';
										if($char['val'] == 1){
										echo '
										<div class="character-desc"><span class="color-c5">'.$char['level'].' '.race($char['race']).' '.classx($char['class']).'</span></div>
										<div class="guild"><a href="#">'.$Forum['Forum65'].'</a></div>
										<div class="achievements">0</div>
										';
										} echo '<div class="character-desc"><span class="color-c5">No Characters</span></div>';
									echo '</div>';
								break;
								}
								
								echo'
							</div>
						</div>
						</td>
						<!-- End User Thingy -->
						
						<td>';
							if($thread['edited'] == 1)
							{
                $editorInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id = '".$thread['editedby']."'"));						
				
				        if($editorInfo['character'] == 0){
					       $charEdit['name'] = $editorInfo['firstName'];
				        }else{
					        $charEdit = mysql_fetch_assoc(mysql_query("SELECT name FROM $server_cdb.characters WHERE guid = '".$editorInfo['character']."'"));
				        }
								echo '<div class="post-edited">'.$Forum['Forum67'].' '.$charEdit['name'].' '.$Forum['Forum68'].' '.$thread['last_date'].'</div>';
							}
							
							$content=$thread['content'];
							$content=stripslashes($content);
							$content=postX($content,$posterInfo['class']);
							$content=str_replace("<br>", "\n", $content);
							$i=1;
							
							
							echo'
							<div class="post-detail">'.$content.'</br></br></div>
						</td>
						
						<td class="post-info">
								<div class="post-info-int">
									<div class="postData">
										<a href="#'.$i.'">#'.$i.'</a>
										<div class="date" onmouseover="Tooltip.show(this,\''.$Forum['Forum69'].''.$thread['date'].'\')">'.ago(strtotime($thread['date'])).'</div>
									</div>
									<div class="karma">
									<div class="karma-feedback">
									'.$Forum['Forum70'].' 
									</div>
									<span class="clear"><!-- --></span>
									</div>
									
									<!--<div class="blizzard_icon"><a class="nextBlizz" href="#" onmouseover="Tooltip.show(this,\''.$Forum['Forum71'].'\')"></a></div>-->
								</div>
						</td>
					</tr>
					</table>';
					// Goes on Rate is Disabled if not Logged in-> <a href="?login" onclick="return Login.open(https://eu.battle.net/login/login.frag)">Login</a>
					// Goes only if Logged In. ONLY if you are Logged in.
					// <div class="karma">
					// <div class="rate-btn-holder">
					// <a href="javascript:;" onclick="Cms.Topic.vote(POSTNUMBER,'up',1,'')" class="rateup rate-btn"><span>Like</span></a>
					// </div>
					// <div class="rate-btn-holder">
					// <a href="javascript:;" onclick="$(this).siblings('.rate-action').show();" class="ratedown rate-btn"></a>
					// <div class="rate-action" style="display: none; ">
					// <div class="ui-dropdown">
					// <div class="dropdown-wrapper">
					// <ul>
					// <li><a href="javascript:;" onclick="Cms.Topic.vote(POSTNUMBER,'down',1,'')">Dislike</a></li>
					// <li><a href="javascript:;" onclick="Cms.Topic.vote(POSTNUMBER,'down',2,'')">Trolling</a></li>
					// <li><a href="javascript:;" onclick="Cms.Topic.vote(POSTNUMBER,'down',3,'')">Spam</a></li>
					// <li><a href="javascript:;" onclick="Cms.Topic.report(POSTNUMBER,'CHARNAME','post-POSTNUMBER')" class="report">Report</a></li>
					// </ul>
					// </div>
					// </div>
					// </div>
					// </div>
					// <div class="prev-vote">You have already rated this item.</div>
					// <span class="clear"><!-- --></span>
					// </div>
					$postid = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_posts WHERE type = 1 AND postid = '".$thread['id']."'"));
					### POST OPTIONS ###
					if(isset($_SESSION['username']))
					{
						echo '
						<div class="post-options">';
							if($thread['locked'] == 1)
							{
								if($userInfo['class'] != ""){
									echo '<div class="respond">';
									
										if($thread['author'] == $userInfo['id']){
											echo'<a class="ui-button button2 " href="../edit-post/?p='.$postid['id'].'"><span><span>'.$Forum['Forum22'].'</span></span></a>';
										}
										
										echo '
										
										<a class="ui-button button2 " href="#new-post" onclick="Cms.Topic.quote('.$thread['id'].');">
											<span><span><span class="icon-quote">'.$Forum['Forum72'].'</span></span></span>
										</a>
										
									</div>';
								}else echo '<div class="no-post-options"><!-- --></div>';
							}else{
								echo '
								<div class="respond">';
									if($thread['author'] == $userInfo['id']) echo'<a class="ui-button button2 " href="../edit-post/?p='.$postid['id'].'"><span><span>'.$Forum['Forum22'].'</span></span></a>';
									
									echo '
									<a class="ui-button button2 " href="#new-post">
										<span><span>'.$reply['reply'].'</span></span>
									</a>
									
									<a class="ui-button button2 " href="#new-post" onclick="Cms.Topic.quote('.$thread['id'].');">
										<span><span><span class="icon-quote">'.$Forum['Forum72'].'</span></span></span>
									</a>
								</div>';
							}
							
						echo '
						<span class="clear"><!-- --></span>
						</div>
						';
					}
					###############
				
					echo '
				</div>
			</div>';
			// Thread Post - End
			$get_replies = mysql_query("SELECT * FROM forum_replies WHERE threadid = '".$thread['id']."' ORDER BY id ASC");
			if(mysql_num_rows($get_replies) > 0)
			{
			$i++;
				while($reply = mysql_fetch_array($get_replies))
				{
					$postid = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_posts WHERE type = 2 AND postid = '".$reply['id']."'"));
					$posterAccount = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.account WHERE id = '".$reply['author']."'"));
					$posterInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id = '".$posterAccount['id']."'"));
					
					if($posterInfo['character'] == 0){
						$char['name'] = $posterInfo['firstName'];
						$char['val'] = 0;
					}else{
						$char = mysql_fetch_assoc(mysql_query("SELECT name, level,race,class FROM $server_cdb.characters WHERE guid = '".$posterInfo['character']."'"));
						$char['val'] = 1;
					}
					
					switch($posterInfo['class']){
					case "blizz":
					echo '<div id="post-'.$i.'" class="post blizzard">';
					break;
					case "mvp":
					echo '<div id="post-'.$i.'" class="post mvp">';
					break;
					default:
					echo'<div id="post-'.$i.'" class="post general">';
					break;
					}
					
					echo'
					<span id="'.$i.'"></span>
					<div class="post-interior">
						<table>
							<tr>
								<td class="post-character">
									<div class="post-user">
										<div class="avatar">
											<div class="avatar-interior">
													<a href="#">
														<img height="84" src="'.BASE_URL.'images/avatars/2d/'.$posterInfo['avatar'].'" alt="" />
													</a>
											</div>
										</div>
									
										<div class="character-info">
											<div class="user-name">
												<span class="char-name-code" style="display: none">'.$char['name'].'</span>
												
												<div id="context-2" class="ui-context">
													<div class="context">
														<a href="javascript:;" class="close" onclick="return CharSelect.close(this);"></a>
														<div class="context-user"><strong>'.$char['name'].'</strong></div>
														<div class="context-links">
														<a href="#" title="View posts" rel="np" class="icon-posts link-first link-last">View posts</a>
														</div>
													</div>
												</div>
									
												<a href="javascript:;" class="context-link" rel="np">'.$char['name'].'</a>
											</div>';
											
											switch($posterInfo['class']){
												case "blizz":
												echo '<div class="blizzard-title">'.$Forum['Forum63'].'</div>';
												break;
												case "mvp":
												echo '<div class="mvp-title">'.$Forum['Forum64'].'</div>';
												break;
												default:
												echo'
												<div>';
												if($char['val'] == 1){ echo'
												<div class="character-desc"><span class="color-c5">'.$char['level'].' '.race($char['race']).' '.classx($char['class']).'</span></div>
												<div class="guild"><a href="#">'.$Forum['Forum65'].'</a></div>
												<div class="achievements">0</div>'; }else{
												echo '<div class="character-desc"><span class="color-c5">'.$Forum['Forum66'].'</span></div>';
												}
												echo'
												</div>';
												break;
											}
											echo'
										</div>
									</div>
								</td>
								
								<td>';
									if($reply['edited'] == 1)
									{
                    $editorInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id = '".$reply['editedby']."'"));						
				
				            if($editorInfo['character'] == 0){
					           $charEdit['name'] = $editorInfo['firstName'];
				            }else{
					           $charEdit = mysql_fetch_assoc(mysql_query("SELECT name FROM $server_cdb.characters WHERE guid = '".$editorInfo['character']."'"));
				            }
										echo '<div class="post-edited">'.$Forum['Forum67'].' '.$charEdit['name'].' '.$Forum['Forum68'].' '.$reply['last_date'].'</div>';
									}
									
									$content=$reply['content'];
									$content=postX($content,$posterInfo['class']);
								   
									echo'<div class="post-detail">'.stripslashes($content).'<br><br></div>
								</td>
								
								<td class="post-info">
									<div class="post-info-int">
										<div class="postData">
											<a href="#'.$i.'">#'.$i.'</a>
											<div class="date" onmouseover="Tooltip.show(this,\''.$Forum['Forum69'].''.$reply['date'].'\')">'.ago(strtotime($reply['date'])).'</div>
										</div>
										
										<!--<div class="blizzard_icon"><a class="nextBlizz" href="#" onmouseover="Tooltip.show(this,\''.$Forum['Forum71'].'\')"></a></div>-->
									</div>
								</td>
							</tr>
						</table>
					
						<div class="post-options">';
							if(isset($_SESSION['username'])){
								if($thread['locked'] == 1){
									if($userInfo['class'] != ""){
										echo '<div class="respond">';
											if($reply['author'] == $userInfo['id']){
                        echo '<a class="ui-button button2 " href="../edit-post/?p='.$postid['id'].'"><span><span>'.$Forum['Forum22'].'</span></span></a>';
                      }
											echo'
											<a class="ui-button button2 " href="#new-post">
										    <span><span>'.$Forum['reply'].'</span></span>
									    </a>
                      <a class="ui-button button2 " href="../edit-post/delete.php?p='.$postid['id'].'"><span><span>Delete</span></span></a>							
											<a class="ui-button button2 " href="#new-post" onclick="Cms.Topic.quote('.$reply['id'].');">
												<span><span><span class="icon-quote">'.$Forum['Forum72'].'</span></span></span>
											</a>	
										</div>';
									}else echo '<div class="no-post-options"><!-- --></div>';
								}else{
									echo '
									<div class="respond">';
										if($reply['author'] == $userInfo['id']){
                      echo '<a class="ui-button button2 " href="../edit-post/?p='.$postid['id'].'"><span><span>'.$Forum['Forum22'].'</span></span></a>';
                      echo '<a class="ui-button button2 " href="../edit-post/delete.php?p='.$postid['id'].'"><span><span>Delete</span></span></a>';
                    }
									  echo '
									  <a class="ui-button button2 " href="#new-post">
										  <span><span>'.$Forum['reply'].'</span></span>
									  </a>';
									  if($userInfo['class'] != "" && $reply['author'] != $userInfo['id']){
                      echo '<a class="ui-button button2 " href="../edit-post/delete.php?p='.$postid['id'].'"><span><span>Delete</span></span></a>';
                    } 
									  echo'
										<a class="ui-button button2 " href="#new-post" onclick="Cms.Topic.quote('.$reply['id'].');">
											<span><span><span class="icon-quote">'.$Forum['Forum72'].'</span></span></span>
										</a>
									</div>';
								}
							}
						echo'
						<span class="clear"><!-- --></span>
						</div>
					</div>
					</div>';
					$i++;
				}
			}
			?>
        </div>

	<div class="talkback">
		<?php
		if(!isset($_SESSION['username'])) $post=0;
		else{
			if($thread['locked'] == "1"){
				if($userInfo['class'] == "") $post=0;
				else $post=1;
			}else $post=1;
		}
	
		if($post == 1){
			if($userInfo['character'] == 0){
				$char['name'] = $userInfo['firstName'];
				$char['val'] = 0;
			}else{
				$char = mysql_fetch_assoc(mysql_query("SELECT name, level,race,class FROM $server_cdb.characters WHERE guid = '".$userInfo['character']."'"));
				$char['val'] = 1;
			}
			?>
				<a id="new-post"></a>
				<form method="post" onsubmit="return Cms.Topic.postValidate(this);" action="#<?php echo $i++; ?>">
					<div>
						<input type="hidden" name="xstoken" value="272c2eb0-9252-4eae-b494-93fd89788702" />
						<input type="hidden" name="sessionPersist" value="forum.topic.post" />
						<div class="post general"> 
							<div class="post-user-details"><h4><?php echo $Forum['Forum73'] ?></h4>
							<div class="post-user ajax-update">
							<div class="avatar">
							<div class="avatar-interior">
									<a href="#">
										<img height="84" src="<?php echo BASE_URL ?>images/avatars/2d/<?php echo $userInfo['avatar']; ?>" alt="" />
									</a>
							</div>
							</div>
							<div class="character-info">
							<div class="user-name">
							<span class="char-name-code" style="display: none"><?php echo $char['name']; ?></span>
							<a href="#" class="context-link" rel="np"><?php echo $char['name']; ?> </a>
							</div>

							<div class="userCharacter">
								<?php if($char['val'] == 1){ ?>
								<div class="character-desc">
									<span class="color-c1">
										<?php echo $char['level'].' '.race($char['race']).' '.classx($char['class']); ?>
									</span>
								</div>
								<div class="achievements">0</div>
								<?php } ?>
							</div>

							</div>
							</div>
							</div>

							<div class="post-edit">
								<div id="post-errors"></div>

								<div class="talkback-controls">
									<a href="javascript:;" onclick="Cms.Topic.previewToggle(this, 'preview')" class="preview-btn"><span class="arr"></span><span class="r"></span><span class="c">Preview</span></a>
									<a href="javascript:;" onclick="Cms.Topic.previewToggle(this, 'edit')" class="edit-btn selected"><span class="arr"></span><span class="r"></span><span class="c">Edit</span></a>
								</div>
								
								<div class="editor1" id="post-edit">
									
									<a id="editorMax" rel="5000"></a>
									
									<textarea id="detail" name="detail" class="post-editor" cols="78" rows="13"></textarea>
									
									<script type="text/javascript">
										//<![CDATA[
										$(function() {
											Wow.addBmlCommands();
											BML.initialize('#post-edit', false);
										});
										//]]>
									</script>
								</div>

								<div class="post-detail" id="post-preview"></div>
								
								<div class="talkback-btm">
									<table class="dynamic-center ">
									<tr>
									<td>
										<div id="submitBtn">
											<button class="ui-button button1 " type="submit"><span><span><?php echo $Forum['Forum23']; ?></span></span></button>
										</div>
									</td>
									</tr>
									</table>
								</div>
							</div>
							<span class="clear"><!-- --></span>
						</div>
					</div>
				</form>
				<span class="clear"><!-- --></span>
			<?php
		}
		else{
		?>
		
		<a id="new-post"></a>
			<div>
				<div class="post general">
					<table class="dynamic-center">
						<tr>
							<td>
								<?php
								if(isset($_SESSION['username'])) echo ''.$Forum['Forum74'].'';
								else echo ''.$Forum['Forum75'].'';
								?>
							</td>
						</tr>
					</table>
				</div>
			</div>
			
		<?php
		}
		?>
		
		<span class="clear"><!-- --></span>
		<?php
		}else{ 
			
			$_POST['detail'] = "";
			$link = '?t='.$threadid;
			echo '<center><br /><br />'.$Forum['Forum76'].'<br />';
			echo '
			<style type="text/css">
			.loader {
			  width:24px;
			  height:24px;
			  background: url("'.BASE_URL.'wow/static/images/loaders/canvas-loader.gif") no-repeat;
			 }
			</style>';
			echo '<div class="loader"></div><br /></center>';
			echo '<meta http-equiv="refresh" content="0;url='.$link.'"/>';
		}
		?>
		<div class="talkback-code">
			<div class="talkback-code-interior">
                <div class="talkback-icon">
                    <h4 class="code-header"><?php echo $Forum['Forum24']; ?></h4>
                                     <p><?php echo $Forum['Forum25']; ?> <strong><?php echo $Forum['Forum26']; ?></strong></p>
                                     <p><?php echo $Forum['Forum27']; ?> <strong><?php echo $Forum['Forum28']; ?></strong></p>
                                     <p><?php echo $Forum['Forum29']; ?> <strong><?php echo $Forum['Forum30']; ?></strong></p>
                                     <p><?php echo $Forum['Forum31']; ?> <a href="http://battle.net/community/conduct"><?php echo $Forum['Forum32']; ?></a> <?php echo $Forum['Forum33']; ?></p>
                </div>
			</div>
        </div>
	</div>
</div>


<?php } ?>
 </div>
</div>
</div>
<script type="text/javascript" src="../../../wow/static/local-common/js/search.js?v46"></script>
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
<?php include("../../../footer.php"); ?>
</body>
</html>
