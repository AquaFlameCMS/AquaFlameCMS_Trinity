<?php
$page_cat = "forums";
require_once("../configs.php");
?>
<head>
<title><?php echo $website['title']; ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="../wow/static/local-common/images/favicons/wow.ico" type="image/x-icon" />
<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/en-gb/data/opensearch" title="Battle.net Search" />
<link rel="stylesheet" type="text/css" media="all" href="../wow/static/local-common/css/common.css?v15" />
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="../wow/static/local-common/css/common-ie.css?v15" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="../wow/static/local-common/css/common-ie6.css?v15" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="../wow/static/local-common/css/common-ie7.css?v15" /><![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/wow.css?v4" />
<link rel="stylesheet" type="text/css" media="all" href="../wow/static/local-common/css/cms/forums.css?v15" />
<link rel="stylesheet" type="text/css" media="all" href="../wow/static/local-common/css/cms/cms-common.css?v15" />
<link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/cms.css?v4" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/cms-ie6.css?v4" /><![endif]-->
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/wow-ie.css?v4" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/wow-ie6.css?v4" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="../wow/static/css/wow-ie7.css?v4" /><![endif]-->
<script type="text/javascript" src="../wow/static/local-common/js/third-party/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="../wow/static/local-common/js/core.js?v15"></script>
<script type="text/javascript" src="../wow/static/local-common/js/tooltip.js?v15"></script>
<script type="text/javascript" src="../wow/static/local-common/js/cms.js"></script>
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
<body class="en-gb station-home" onunload="opener.location=('index.php')">
<div id="wrapper">
	<?php include("../header.php"); ?>
		<div id="content">
			<div class="content-top">
				<div class="content-trail">
					<ol class="ui-breadcrumb">
					<li>
					<a href="../index.php" rel="np"><?php echo $website['title']; ?></a></li>
					<li class="last"><a href="../forum" rel="np"><?php echo $Forums['Forums']; ?></a></li>
					</ol>
				</div>
				
				<div class="content-bot">
				<script type="text/javascript">$(function(){Cms.Station.init();});</script>
					<div id="station-view">
						<div class="bt-lite">
							<div class="bt-link readmore"><?php echo $Forum['Forum77']; ?> <span><a href="#">(<?php echo $View_all['View_all']; ?>)</a></span></div>
								<a href="javascript:;" onClick="Cms.Station.btLiteScroll(1)" class="bt-left"></a>
								<a href="javascript:;" onClick="Cms.Station.btLiteScroll(-1)" class="bt-right"></a>
					
							<div class="bt-adjust">
								<div class="bt-mask">
									<div id="bt-holder">
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
											
											if($i==0){ echo '<div class="bt-set">'; }
											echo'<a href="category/view-topic/?t='.$threadId.'">
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
														<span class="char">';
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
										
										<div class="bt-set">
											<a href="#">
												<span class="desc">
												<span class="int"><?php echo $Forum['Forum78']; ?></span>
												</span>
												<span class="info">
												 </span>
											</a>
										</div>
									</div>
								</div>
								<div class="bt-mask-l"></div>
								<div class="bt-mask-r"></div>
							</div>
						</div>
						
						<div id="station-content">
							<div class="station-content-wrapper">
								<div class="station-inner-wrapper">
									<div id="forum-list">
										<div id="forum-list-interior">
											<?php
											$get_categs = mysql_query("SELECT * FROM forum_categ ORDER BY num ASC");
											while($categ = mysql_fetch_array($get_categs)){
												echo'
												<a id="forum'.$categ['id'].'" href="javascript:;" onclick="Cms.Station.parentToggle('.$categ['id'].',this)" class="forum-parent">
												'.$categ['name'].'
												</a>
												<div class="child-forums" id="child'.$categ['id'].'">
												<div class="forums-list">
													';
													$get_forums = mysql_query("SELECT * FROM forum_forums WHERE categ = '".$categ['id']."' ORDER BY num ASC");
													while($forum = mysql_fetch_array($get_forums)){
														echo '
														
																<a href="category/?f='.$forum['id'].'" class="forum-link">
																	<span class="forum-icon">
																			<img src="../images/forum/forumicons/'.$forum['image'].'.gif" />
																	</span>
																	<span class="int">
																		<span class="int-padding">
																			'.$forum['name'].'
																			<span class="desc">'.$forum['description'].'</span>
																		</span>
																	</span>
																</a>
														';
													}
													echo '
												</div>
												</div>';
											}
											?>
										</div>
									</div>


									<div id="popular-topics">
										<div class="readmore"><?php echo $P_topics['P_topics']; ?></div>
											<div class="sidebar-module" id="sidebar-forums">
							<div class="sidebar-title">
							<h3 class="category title-forums"><a href="#"><?php echo $P_topics['P_topics']; ?></a></h3>
							</div>
							<div class="sidebar-content">
							<ul class="trending-topics">
								<?php
								$get_lastactivity = mysql_query("SELECT *, date FROM $server_db.forum_threads ORDER BY `last_date` DESC LIMIT 10");
								if(mysql_num_rows($get_lastactivity) > 0){
								while($lastact = mysql_fetch_array($get_lastactivity)){
									$forum = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_db.forum_forums WHERE id = '".$lastact['forumid']."'"));
									echo '
									<li>
									<a href="category/view-topic/?t='.$lastact['id'].'" class="topic">
									'.$lastact['name'].'</a>
									<a class="forum">'.$forum['name'].'</a> - <span class="date">'.$lastact['date'].'</span></li>
									';
								}
								}else{
									echo 'No Topics';
								}
								?>
								</ul>
							</div>
						</div>
											<div class="coc"> <?php echo $click['click']; ?> <a href="http://battle.net/community/conduct"><?php echo $here['here']; ?></a><?php echo $Forum['Forum33']; ?></div>
									</div>
									<span class="clear"><!-- --></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php include("../footer.php"); ?>
</body>
</html>