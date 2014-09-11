<?php
require_once("configs.php");
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
<meta name="description" content="<?php echo DESCRIPTION ?>">
<meta name="keywords" content="<?php echo KEYWORDS ?>">
<link rel="shortcut icon" href="wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/en-gb/data/opensearch" title="WoW Search" />
<?php GetStyle(); ?>
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
Core.sharedStaticUrl= '/wow/static/local-common';
Core.baseUrl = 'wow/en';
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
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</head>
<body  class="en-gb blog-article news logged-in" data-twttr-rendered="true" cz-shortcut-listen="true">
<div id="wrapper">
	<?php include("header.php"); ?>
	<div id="content">
		<div class="content-top body-top">
			<div class="content-trail">
				<ol class="ui-breadcrumb">
					<li itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
					<a href="index.php" rel="np" class="breadcrumb-arrow" itemprop="url">
					<span class="breadcrumb-text" itemprop="name"><?php echo TITLE ?></span>
					</a>
					</li>
					<?php
					$news_id = intval($_GET['id']);
					if($news_id != 0) $error=0; else $error=1;
					$news_query = mysql_query("SELECT * FROM news WHERE id = '".$news_id."'")or $error=1;
					$news = mysql_fetch_assoc($news_query)or $error=1;
					$date = $news['date'];
					?>
					<li class="last" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
					<a href="#" rel="np" itemprop="url">
					<span class="breadcrumb-text" itemprop="name"><?php echo $news['title']; ?></span>
					</a>
					</li>
				</ol>
			</div>
			<div class="content-bot clear">
				<div class="right-sidebar" itemscope="itemscope" itemtype="http://schema.org/WPSideBar">
					<div class="sidebar" id="sidebar">
						<div class="sidebar-top">
							<div class="sidebar-bot">
								<div id="dynamic-sidebar-target">
									<div class="sidebar-module " id="sidebar-recent-articles">
										<div class="sidebar-title">
											<h3 class="header-3 title-recent-articles">Recent Articles </h3>
										</div>
										<div class="sidebar-content">
											<?php
											$articles_query = mysql_query("SELECT * FROM news ORDER BY DATE desc LIMIT 6")or print("No Articles");
											while($articles = mysql_fetch_array($articles_query)){
											?>
											<ul id="recent-articles" class="articles-list-plain">
												<li>
												<a class="article-block on-view" href="news.php?id=<?php echo $articles['id']; ?>">
												<span class="image" style="background-image: url('wow/static/images/news/<?php echo $articles['image']; ?>.jpg');"></span>
												<span class="title"> <?php echo $articles['title']; ?></span>
												<span class="date"><?php echo $articles['date']; ?></span>
												<span class="clear">
												<!-- -->
												</span>
												</a>
												</li>
											</ul>
											<?php
											}
											?>
											<div class="blog-load-more">
												<a class="load-more" id="load-more" href="javascript:;">Ver Más</a>
												<span class="clear">
												<!-- -->
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>		
				<script type="text/javascript">
				//<![CDATA[
				$(function() {
				Sidebar.sidebar([
				{ "type": "recent-articles", "query": "?id=14605867" }
				]);
				});
				//]]>
				</script>
				</div>
				<div class="left-content">
					<?php
					$articles_query = mysql_query("SELECT * FROM news ORDER BY DATE desc LIMIT 4")or print("No Articles");
					while($articles = mysql_fetch_array($articles_query)){
					?>
					<div id="blog" class="article-wrapper" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
						<h2 class="header-2"><span itemprop="headline"><?php echo $articles['title']; ?></span></h2>
						<div class="article-meta">
							<a class="article-author" href="news?id=<?php echo $articles['id']; ?>">
							<?php
							}
									if($error == 0){
									
										$posted = 0;
										
										if(isset($_POST['vali']) || isset($_POST['replyTo'])){      //That's for post new comment or new reply comment
											mysql_select_db($server_adb,$connection_setup)or die(mysql_error());
											$get_accountinfo = mysql_query("SELECT * FROM account WHERE username = '".mysql_real_escape_string($_SESSION['username'])."'");
											$accountinfo = mysql_fetch_assoc($get_accountinfo);
											mysql_select_db($server_db,$connection_setup)or die(mysql_error());
											$author = $accountinfo['id'];
											$comment = stripslashes($_POST['detail']);
											
											/* Replace some HTML tags */
											$comment = strip_tags($comment);

											/* End of Replacing */
											$comment = addslashes($comment);
											$comment = nl2br($comment);
											if (isset($_POST['replyTo'])){
												$replyTo = $_POST['replyTo']; 
											  }else{
												$replyTo = 0;
											  }
											$insert = mysql_query("INSERT INTO comments (newsid,comment,accountid,reply) VALUES ('".$news['id']."','".$comment."','".$author."','".$replyTo."')")or print("Could not post the comment!");

											//Fixed that bugging bug + DATE =)) :)) =)) :D
											$update = mysql_query("UPDATE news SET comments = comments + 1 WHERE id = '".$news['id']."'");
											$update = mysql_query("UPDATE date SET date = '".$date."' WHERE id = '".$news['id']."'");
											$posted = 1;
											
											echo '<center><br /><br />Comment Posted<br />';
											echo '
											<style type="text/css">
											.loader {
											  width:24px;
											  height:24px;
											  background: url("'.BASE_URL.'wow/static/images/loaders/canvas-loader.gif") no-repeat;
											 }
											</style>';
											echo '<div class="loader"></div><br /></center>';
											echo '<meta http-equiv="refresh" content="1;url=news.php?id='.$news_id.'"/>';
											$show_comment=false;
										}else{				
										
										$posterInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_db.users WHERE id = '".$news['author']."'"));
										//<img alt="" src="wow/static/images/news/'.$news['image'].'_header.jpg" />
										//.$news['content'].'
										echo'
							<span class="author-icon"></span>
							<span itemprop="author">'.$posterInfo['firstName'].'</span>
							</a>
							<span class="publish-date" title="'.$news['date'].' CDT">
							'.$news['date'].' </span>
							<a href="#comments" class="comments-link">'.$news['comments'].'</a>
						</div>'; ?>
						<div class="article-content">
							<div class="header-image">
								<img itemprop="image" alt="¡La beta de World of Warcraft: Warlords of Draenor ya está activa!" src="wow/static/images/news/<?php echo $news['image']; ?>_header.jpg"/>
							</div>
							<div class="detail" itemprop="articleBody">
							<?php echo $news['content']; ?>
							</div>
						</div>
						<?php
							$show_comment=true;
							}
						}
						?>
						<div class="community-share">
							<div class="share-wrapper">
								<div class="share-links">
									<a class="facebook" href="https://www.facebook.com/sharer.php?u=<?php echo $website['address'].$website['root']; ?>news.php?id=<?php echo $news['id']; ?>" onclick="Core.trackEvent('wow- SNS', 'Sharing - Facebook', 'blog 14685348 - en-us'); window.open(this.href,'','height=450,width=550').focus(); return false;" title="Facebook"></a>
									<a class="twitter" href="http://twitter.com/share?<?php echo BASE_URL ?>news.php?id=<?php echo $news['id']; ?>" onclick="Core.trackEvent('wow- SNS', 'Sharing - Twitter', 'blog 14685348 - en-us'); window.open(this.href,'','height=450,width=550').focus(); return false;" title="Twitter"></a>
									<a class="reddit" href="http://www.reddit.com/submit?url=<?php echo BASE_URL ?>news.php?id=<?php echo $news['id']; ?>" onclick="Core.trackEvent('wow- SNS', 'Sharing - Reddit', 'blog 14685348 - en-us'); window.open(this.href,'','height=auto,width=auto').focus(); return false;" title="Reddit"></a>
									<span class="clear">
									<!-- -->
									</span>
								</div>
								<span class="share-title">Share:</span>
							</div>
							<div class="like-wrapper">
								<iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" src="http://platform.twitter.com/widgets/tweet_button.1404409145.html#_=1404494595471&amp;count=horizontal&amp;hashtags=wow&amp;id=twitter-widget-0&amp;lang=en&amp;original_referer=http%3A%2F%2Fus.battle.net%2Fwow%2Fen%2Fblog%2F14685348%2Fhappy-4th-7-4-2014&amp;size=m&amp;text=Happy%204th!&amp;url=http%3A%2F%2Fus.battle.net%2Fwow%2Fen%2Fblog%2F14685348%2Fhappy-4th-7-4-2014" class="twitter-share-button twitter-tweet-button twitter-share-button twitter-count-horizontal" title="Twitter Tweet Button" data-twttr-rendered="true" style="width: 110px; height: 20px;">
								</iframe>
								<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
							</div>
							<script type="text/javascript">
						//<![CDATA[
						Core.appendFrame("https://www.facebook.com/plugins/like.php?href=http://us.battle.net/wow/en/blog/14685348/happy-4th-7-4-2014&amp;layout=button_count&amp;show_faces=false&amp;width=200&amp;height=20&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;locale=en_US", 200, 20, $('.like-wrapper'), "facebook-like");
						//]]>
							</script>
							<span class="clear">
							<!-- -->
							</span>
						</div>
						<div class="keyword-list">
							<strong>Tags:</strong>
							<a href="<?php/* echo $news['tagsLink']; */?>"><?php /*echo $news['tags']; */?></a>
						</div> 
					</div>
<div id="comments" class="bnet-comments ">
	<h2 class="subheader-2"> <?php echo $comments['comments']; ?> (<span id="comments-total"><?php echo $news['comments']; ?></span>) </h2>
	<a href="javascript:;" class="comments-pull-link" id="comments-pull" onclick="Comments.loadBase();" style="display: none">
	<span class="pull-single" style="display: none">There is <span>{0}</span> new comment. <strong>Reload?</strong></span>
	<span class="pull-multiple" style="display: none">There are <span>{0}</span> new comments. <strong>Reload?</strong></span>
	</a>
	<?php
	if(isset($_SESSION['username']))
	{ 
	echo'';
	}
	else
	{
	?>
	<div class="comments-form-wrapper">
		<div class="comments-error-gate">
			<p>
				 You must <a href="?login" onclick="return Login.open();">log in</a> with a Battle.net account before you can post a comment.
			</p>
			<button class="ui-button button1" type="button" onclick="Login.open();"><span class="button-left"><span class="button-right">Log In</span></span></button>
		</div>
	</div>
	<?php
	}
	?>
	<div id="comments-sorting-wrapper">
		<ul class="tab-menu " id="comments-sorting-tabs">
			<li class="menu-best ">
			<a href="#best" class="tab-active">
			<span>Best</span>
			</a>
			</li>
			<li class="menu-latest ">
			<a href="#latest">
			<span>Latest</span>
			</a>
			</li>
		</ul>
	</div>
	<div id="comments-pages-wrapper">
		<div class="comments-pages">
			<div id="comments-list-wrapper">
				<div class="comments-controls">
					<ul class="ui-pagination">
						<li class="current"><a href="javascript:;" data-pagenum="1"><span>1</span></a></li>
						<li><a href="javascript:;" data-pagenum="2"><span>2</span></a></li>
						<li class="cap-item"><a class="page-next" href="javascript:;" data-pagenum="2"><span>Next</span></a></li>
					</ul>
					<span class="clear">
					<!-- -->
					</span>
				</div>
				<?php
				//SHOW COMMENTS
				$get_comments = mysql_query("SELECT * FROM comments WHERE newsid = '".$news['id']."' AND reply = '0' ORDER BY DATE desc");
				//Get just the comments of the post (not reply comments)
				if(mysql_num_rows($get_comments) > 0){
				while($comment = mysql_fetch_array($get_comments)){
					
					mysql_select_db($server_db,$connection_setup)or die(mysql_error());
					$userInfo_query = mysql_query("SELECT * FROM users WHERE id = '".$comment['accountId']."'");
					$userInfo = mysql_fetch_assoc($userInfo_query);
					//Show styles mvp and blizz
					if ($userInfo['class']=='blizz')
					{
					$type='blizzard';
					}
					elseif ($userInfo['class']=='mvp')
					{
					$type='mvp';
					}
					else
					{
					$type = 'list';
					}
				?>
				<ul class="comments-<?php echo $type; ?>" id="comments-<?php echo $comment['id']; ?>">
					<li class="" id="post-13349614868">
					<div class="comment-tile">
						<div class="rate-post-wrapper rate-post-login comment-rating" style="visibility: hidden;">
							 <!--+5-->
						</div>
						<?php
						if(isset($_SESSION['username']))
						{ 
							echo'';
						}
						else
						{
						?>
						<div class="rate-post-wrapper rate-post-login" style="visibility: hidden;">
							<a href="?login" onclick="return Login.open('https://us.battle.net/login/login.frag')">Login</a> to rate
						</div>
						<?php } ?>
						<div class="bnet-avatar ">
							<div class="avatar-outer">
								<a href="#">
								<img height="64" width="64" src="images/avatars/2d/<?php echo $userInfo['avatar']; ?>" alt=""/>
								<span class="avatar-inner"></span>
								</a>
							</div>
						</div>
						<div class="comment-head">
							<div class="bnet-username" itemscope="itemscope" itemprop="author" itemtype="http://schema.org/Person">
								<div id="context-1" class="ui-context">
									<div class="context">
										<a href="javascript:;" class="close" onclick="return CharSelect.close(this);"></a>
										<!-- IMAGE BLIZZ -->
										<?php if ($type == 'blizzard'){echo '<img src="wow/static/local-common/images/icons/employee.gif" alt="employee" />';} ?>										
										<div class="context-user">
											<strong><?php echo ucfirst($userInfo['firstName']); ?></strong>
										</div>
										<div class="context-links">
											<a href="#" title="Profile" rel="np" class="icon-profile link-first">
											<span class="context-icon"></span>Profile </a>
											<a href="#" title="View posts" rel="np" class="icon-posts">
											<span class="context-icon"></span>
											</a>
											<a href="javascript:;" title="Ignore" rel="np" class="icon-ignore link-last" onclick="ReportPost.ignoreUser(this, 20921607, false); return false;">
											<span class="context-icon"></span>
											</a>
										</div>
									</div>
								</div>
								<a href="#" itemprop="url" class="context-link wow-class-10">
								<span itemprop="name" class="poster-name"><?php echo ucfirst($userInfo['firstName']); ?></span>
								</a>
								<span class="timestamp"><?php echo $comment['date']; ?></span>
							</div>
						</div>
						<div class="comment-body">
							 <?php echo html_entity_decode($comment['comment']); ?>
						</div>
						<div class="comment-foot">
							<?php
							if(isset($_SESSION['username']))
							{?> 
							<a class="ui-button button2 reply-button" href="?login" onclick="return Login.open();"><span class="button-left"><span class="button-right"> <?php echo $reply['reply']; ?> </span></span></a>
						<?php
							}
							else
							{
							?>
							<a class="ui-button button2 reply-button" href="?login" onclick="return Login.open();"><span class="button-left"><span class="button-right"> <?php echo $reply['reply']; ?> </span></span></a>
							<?php
							}
							?>
							<span class="clear">
							<!-- -->
							</span>
						</div>
						<span class="clear">
						<!-- -->
						</span>
					</div>
					</li>
					<?php
					//Get reply comments
					$get_reply = mysql_query("SELECT * FROM comments WHERE newsid = '".$news['id']."' AND reply = '".$comment['id']."' ORDER BY DATE ASC");
					//Order it by date ASC!
					if(mysql_num_rows($get_reply) > 0){
					while($replyQ = mysql_fetch_array($get_reply))
					{                        
					 mysql_select_db($server_db,$connection_setup)or die(mysql_error());
					 $userInfo_query = mysql_query("SELECT * FROM users WHERE id = '".$replyQ['accountId']."'");
					 $userInfo = mysql_fetch_assoc($userInfo_query);
					 if ($userInfo['class']=='blizz')
					 {
					 $type='blizzard';   //Show styles mvp and blizz
					 } 
					 elseif ($userInfo['class']=='mvp')
					 { 
					 $type='mvp';
					 }
					 else {
					 $type = 'nested';
					 }
					 //SHOW REPLY COMMENTS
					?>
					<li class=" comment-nested" id="post-<?php echo $replyQ['id'];?>">
					<div class="comment-tile">
						<div class="rate-post-wrapper rate-post-login comment-rating">
							 <!--+5-->
						</div>
						<?php
						if(isset($_SESSION['username']))
						{ 
							echo'';
						}
						else
						{
						?>
						<div class="rate-post-wrapper rate-post-login" style="visibility: hidden;">
							<a href="?login" onclick="return Login.open('https://us.battle.net/login/login.frag')">Login</a> to rate
						</div>
						<?php } ?>
						<div class="bnet-avatar ">
							<div class="avatar-outer">
								<a href="#">
								<img height="64" width="64" src="images/avatars/2d/<?php echo $userInfo['avatar']; ?>" alt=""/>
								<span class="avatar-inner"></span>
								</a>
							</div>
						</div>
						<div class="comment-head">
							<div class="bnet-username" itemscope="itemscope" itemprop="author" itemtype="http://schema.org/Person">
								<div id="context-2" class="ui-context">
									<div class="context">
										<a href="javascript:;" class="close" onclick="return CharSelect.close(this);"></a>
										<div class="context-user">
											<strong><?php echo ucfirst($userInfo['firstName']); ?></strong>
										</div>
										<div class="context-links">
											<a href="#" title="Profile" rel="np" class="icon-profile link-first">
											<span class="context-icon"></span>Profile </a>
											<a href="#" title="View posts" rel="np" class="icon-posts">
											<span class="context-icon"></span>
											</a>
											<a href="javascript:;" title="Ignore" rel="np" class="icon-ignore link-last" onclick="ReportPost.ignoreUser(this, 4857345, false); return false;">
											<span class="context-icon"></span>
											</a>
										</div>
									</div>
								</div>
								<a href="#" itemprop="url" class="context-link wow-class-9">
								<span itemprop="name" class="poster-name"><?php echo ucfirst($userInfo['firstName']); ?></span>
								</a>
								<span class="timestamp"><?php echo $replyQ['date']; ?></span>
							</div>
						</div>
						<div class="comment-body">
							 <?php echo html_entity_decode($replyQ['comment']); ?>
						</div>
						<div class="comment-foot">
						<?php
						if(isset($_SESSION['username']))
						{ 
							echo'';
						}
						else
						{
						?>
							<a class="ui-button button2 reply-button" href="?login" onclick="return Login.open();"><span class="button-left"><span class="button-right"> Reply </span></span></a>
							<?php }?>
							<span class="clear">
							<!-- -->
							</span>
						</div>
						<span class="clear">
						<!-- -->
						</span>
					</div>
					</li>
				</ul>
					<?php  
							}//CLOSE WHILE REPLYS
						} //CLOSE IF REPLYS
					} //CLOSE WHILE COMMENTS
				} //CLOSE IF COMMENTS
					mysql_select_db($server_db,$connection_setup)or die(mysql_error());
					?>
				<div class="comments-controls">
					<ul class="ui-pagination">
						<li class="current"><a href="javascript:;" data-pagenum="1"><span>1</span></a></li>
						<li><a href="javascript:;" data-pagenum="2"><span>2</span></a></li>
						<li class="cap-item"><a class="page-next" href="javascript:;" data-pagenum="2"><span>Next</span></a></li>
					</ul>
					<span class="clear">
					<!-- -->
					</span>
				</div>
			</div>
		</div>
	</div>
	<div id="report-post" class="report-post type-forums">
		<table id="report-table">
		<tr>
			<td class="report-desc">
			</td>
			<td class="report-detail report-data">
				<h3 class="subheader-3"> Report Post #<span id="offensive-post-id"></span> written by <span id="offensive-post-author"></span>
				</h3>
			</td>
		</tr>
		<tr>
			<td class="report-desc">
				<div>
					 Reason
				</div>
			</td>
			<td class="report-detail">
				<select id="report-reason" required="required">
					<option value="SPAMMING">Spamming</option>
					<option value="ILLEGAL">Illegal</option>
					<option value="NOT_SPECIFIED">Not Specified</option>
					<option value="OTHER">Other</option>
					<option value="REAL_LIFE_THREATS">Real Life Threats</option>
					<option value="ADVERTISING_STRADING">Advertising</option>
					<option value="HARASSMENT">Harassment</option>
					<option value="BAD_LINK">Bad Link</option>
					<option value="TROLLING">Trolling</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="report-desc">
				<div>
					 Explain <small>(256 characters max)</small>
				</div>
			</td>
			<td class="report-detail">
				<textarea id="report-detail" class="post-editor" cols="78" rows="13" required="required" maxlength="256"></textarea>
			</td>
		</tr>
		<tr>
			<td>
			</td>
			<td class="report-submit-wrapper">
				<a class="ui-button button1 report-submit" href="javascript:;"><span class="button-left"><span class="button-right">Submit</span></span></a>
				<a class="cancel-report" href="javascript:;">Cancel</a>
			</td>
		</tr>
		</table>
		<div id="report-success" class="report-success">
			<h3 class="header-3">Reported!</h3>
			 [<a href="javascript:;" onclick="$(&quot;#report-post&quot;).hide()">Close</a>]
		</div>
	</div>
</div>
<span class="clear">
<!-- -->
</span>
<script type="text/javascript">
//<![CDATA[
$(function() {
Blog.init();
});
//]]>
</script>
</div>
</div>
</div>
</div>
	<script src="wow/static/local-common/js/cms.js"></script>
	<script src="wow/static/local-common/js/menu.js"></script>
	<script src="wow/static/js/wow.js"></script>
	<script src="http://s7.addthis.com/js/250/addthis_widget.js"></script>
	<script src="wow/static/local-common/js/cms.js?v17?v7"></script>
	<script src="wow/static/local-common/js/lightbox.js?v17?v7"></script>
	<?php include("footer.php"); ?>
</div>
</body>
</html>
