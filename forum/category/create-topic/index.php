<?php
require_once("../../../configs.php");
$page_cat = "forums";
include_once("../../functions.d/GetForumTheme.php");
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
<script type="text/javascript" src="http://static.wowhead.com/widgets/power.js"></script>
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
<link rel="image_src" href="<?php echo BASE_URL ?>wow/static/images/icons/facebook/article.jpg" />
<style type="text/css">
.loader {
  width:24px;
  height:24px;
  background: url("<?php echo BASE_URL ?>wow/static/images/loaders/canvas-loader.gif") no-repeat;
 }
 
.errors {
  width:400px;
  background:#FFA3A3;
  border:1px solid #FF0000;
  opacity: 0.40;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  -moz-box-shadow: #000 0 0 10px;
  -webkit-box-shadow: #000 0 0 10px;
  box-shadow: #000 0 0 10px;
  text-shadow:0px 1px 1px #000;
}

.success {
  width:400px;
  background:#59FF6C;
  border:1px solid #00FF21;
  opacity: 0.40;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  -moz-box-shadow: #000 0 0 10px;
  -webkit-box-shadow: #000 0 0 10px;
  box-shadow: #000 0 0 10px;
  text-shadow:0px 1px 1px #000;
  color:#007F0E;
}
</style>
</head>
<body class="en-gb logged-in">
<div id="wrapper">
<?php include("../../../header.php"); ?>
<div id="content">
<div class="content-top">
<div class="content-trail">
	<?php

	if(!isset($_SESSION['username']) || $_SESSION['username'] == ""){ $error=1; }
	if(isset($_GET['f'])){

		$forumid = intval($_GET['f']);
		$forum = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_forums WHERE id = '".$forumid."'"))or $error=1;
		$category = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_categ WHERE id = '".$forum['categ']."'"))or $error=1;
		$userInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id = '".$account_information['id']."'"));

		if($userInfo['character'] == 0){
			$charInfo['name'] = $userInfo['firstName'];
			$char['val'] = 0;
		}else{
			$charInfo = mysql_fetch_assoc(mysql_query("SELECT name,class,race,level FROM $server_cdb.characters WHERE guid = '".$userInfo['character']."'"));
			$char['val'] = 1;
		}

		require_once("../../functions.php");

		echo '
		<ol class="ui-breadcrumb">
		<li><a href="'.BASE_URL.'index.php" rel="np">'.$website['title'].'</a><span class="breadcrumb-arrow"></span></li>
		<li><a href="'.BASE_URL.'forum" rel="np">Forums</a><span class="breadcrumb-arrow"></span></li>
		<li><a href="'.BASE_URL.'forum" rel="np">'.$category['name'].'</a><span class="breadcrumb-arrow"></span></li>
		<li><a href="'.BASE_URL.'forum/category/?f='.$forum['id'].'" rel="np">'.$forum['name'].'</a><span class="breadcrumb-arrow"></span></li>
		<li class="last"><a href="create-topic/?f='.$forumid.'" rel="np">'.$Forum['Forum8'].'</a></li>
		</ol>';

		$error=0;
		
	}else $error=1;

	if($error == 1){
		echo '
		<ol class="ui-breadcrumb">
		<li><a href="/" rel="np">World of Warcraft</a><span class="breadcrumb-arrow"></span></li>
		<li class="last"><a href="'.BASE_URL.'forum" rel="np">Forums</a></li>
		</ol>
		';
		echo '<meta http-equiv="refresh" content="2;url=index.php"/>';
	}
	?>
</div>
<div class="content-bot">    
    <?php if(isset($_POST['create'])){
	
		if(empty($_POST['subject'])){ $errors[] = ''.$Forum['Forum11'].''; }
		if(empty($_POST['detail'])){ $errors[] = ''.$Forum['Forum12'].''; }
		if($error == 1){ $errors[] = ''.$Forum['Forum13'].''; }
		echo '<center>
		<h3>'.$Forum['Forum14'].'</h3><br />
		<div class="loader"></div><br />';
		
		if(isset($errors) && count($errors) > 0){
		
			echo '<div class="errors">';
			foreach($errors as $error2){ echo "<font color='red'>*".$error2."</font><br />"; }
			echo '</div>';
			echo '<meta http-equiv="refresh" content="2"';
			
		}else{
		
			//Preparing for inseration into Database
			$subject = mysql_real_escape_string(addslashes($_POST['subject']));
			$content = stripslashes($_POST['detail']);
			$content = strip_tags($content);
			$content = addslashes($content);
			$content = nl2br($content);
			$content = mysql_real_escape_string($content);
			$ndate = date('Y-m-d H:i:s');	
			
			//User Parameteres
			$author = $account_information['id'];
			if($userInfo['class'] == 'blizz'){$hb = 1; }else{ $hb = 0;}
			
			$insert = mysql_query("INSERT INTO forum_threads (forumid,name,author,views,date,content,has_blizz,last_date) VALUES ('".$forumid."','".$subject."','".$author."','0','".$ndate."','".$content."','".$hb."','".$ndate."')")or die(''.$Forum['Forum15'].'');
			$replies = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_threads WHERE forumid = '".$forumid."' ORDER BY id DESC LIMIT 1"));
      $insert = mysql_query("INSERT INTO forum_posts (type,postid) VALUES ('1','".$replies['id']."')")or die(''.$Forum['Forum15'].'');
			
			if($hb == 1) $insert = mysql_query("INSERT INTO forum_blizzposts (type,author,postid) VALUES ('thread','".$userInfo['id']."','".$replies['id']."')");
			
			echo '<div class="success">';
			echo ''.$Forum['Forum16'].'';
			echo '</div>';
			echo '<meta http-equiv="refresh" content="2;url='.BASE_URL.'forum/category/?f='.$forumid.'"';
		}
		echo '<div id="forum-content"></div>';
	}else{
	?>
    <div id="forum-content">
		<div class="talkback new-post"><a id="new-post"></a>
			<form method="POST">
				<div>
					<input type="hidden" name="xstoken" value="9612931e-14b4-4b21-96c6-90225616b34e" />
					<div class="post general">
						<?php
						if($error != 1){
						?>
						<div class="post-user-details ">
							<h4><?php echo $Forum['Forum40'] ?></h4>
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
										<span class="char-name-code" style="display: none"><?php echo $charInfo['name']; ?></span>
										<div id="context-2" class="ui-context character-select">
											<div class="context">
												<a href="javascript:;" class="close" onclick="return CharSelect.close(this);"></a>
												<div class="context-user">
													<strong><?php echo $charInfo['name']; ?></strong>
														<br />
														<span><?php echo $Forum['Forum18']; ?></span>
												</div>
												<div class="context-links">
														<a href="#" title="Profile" rel="np" class="icon-profile link-first"><?php echo $Forum['Forum19']; ?></a>
														<a href="#" title="View my posts" rel="np" class="icon-posts"> </a>
														<a href="#" title="View auctions" rel="np" class="icon-auctions"> </a>
														<a href="#" title="View events" rel="np" class="icon-events link-last"> </a>
												</div>
											</div>
										</div>
										<a href="#" class="context-link" rel="np"><?php echo $charInfo['name']; ?></a>
									</div>
									
									<div class="userCharacter">
										<?php if($char['val'] == 1){ ?>
										<div class="character-desc"><span class="color-c1"><?php echo $charInfo['level'].' '.race($charInfo['race']).' '.classx($charInfo['class']); ?></span></div>
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
							<div class="editor1" id="post-edit"><div class="bml-toolbar"></div>
								<a id="editorMax" rel="5000"></a>
								<input type="text" id="subject" name="subject" value="" class="post-subject" maxlength="55" />
								<textarea id="postCommand.detail" name="detail" class="post-editor" cols="78" rows="13"></textarea>
								<script type="text/javascript" src="<?php echo BASE_URL ?>wow/static/local-common/js/bml.js"></script>
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
								<table class="dynamic-center"><tr><td>
									<div id="submitBtn">
									<button class="ui-button button1 " type="submit" name="create">
										<span>
											<span><?php echo $Forum['Forum23']; ?></span>
										</span>
									</button>
									</div>
								</td></tr></table>
							</div>
						</div>
						<span class="clear"><!-- --></span>
						<?php
						}else{
						if(!isset($_SESSION['username'])){ echo '<div class="post-user-details "><center><h4>'.$Forum['Forum47'].'</h4></center><br /></div>'; }else{
						echo '<div class="post-user-details "><center><h4>Error...</h4></center><br /></div>'; }
						}
						?>
					</div>
				</div>
			</form>
			<span class="clear"><!-- --></span>
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

</div>
</div>
<?php } ?>
</div>

<?php include("../../../footer.php"); ?>
</body>
</html>