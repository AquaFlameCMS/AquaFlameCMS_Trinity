<?php
require_once("../../../configs.php");
$page_cat = "forums";
?>
<!doctype html>
<head>
<title><?php echo $website['title']; ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="description" content="<?php echo $website['description']; ?>">
<meta name="keywords" content="<?php echo $website['keywords']; ?>">
<link rel="shortcut icon" href="<?php echo $website['root'];?>wow/static/local-common/images/favicons/wow.ico" type="image/x-icon"/>
<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/en-gb/data/opensearch" title="Battle.net Search" />
<link rel="stylesheet" href="<?php echo $website['root'];?>wow/static/local-common/css/common.css?v37" />
<!--[if IE]> <link rel="stylesheet" href="/wow/static/local-common/css/common-ie.css?v37" /><![endif]-->
<!--[if IE 6]> <link rel="stylesheet" href="/wow/static/local-common/css/common-ie6.css?v37" /><![endif]-->
<!--[if IE 7]> <link rel="stylesheet" href="/wow/static/local-common/css/common-ie7.css?v37" /><![endif]-->
<link title="World of Warcraft - News" href="/wow/en/feed/news" type="application/atom+xml" rel="alternate"/>
<link rel="stylesheet" href="<?php echo $website['root'];?>wow/static/css/wow.css?v19" />
<link rel="stylesheet" href="<?php echo $website['root'];?>wow/static/local-common/css/cms/forums.css?v37" />
<link rel="stylesheet" href="<?php echo $website['root'];?>wow/static/local-common/css/cms/cms-common.css?v37" />
<link rel="stylesheet" href="<?php echo $website['root'];?>wow/static/css/cms.css?v19" />
<!--[if IE 6]> <link rel="stylesheet" href="/wow/static/css/cms-ie6.css?v19" /><![endif]-->
<!--[if IE]> <link rel="stylesheet" href="/wow/static/css/wow-ie.css?v19" /><![endif]-->
<!--[if IE 6]> <link rel="stylesheet" href="/wow/static/css/wow-ie6.css?v19" /><![endif]-->
<!--[if IE 7]> <link rel="stylesheet" href="/wow/static/css/wow-ie7.css?v19" /><![endif]-->
<script src="<?php echo $website['root'];?>wow/static/local-common/js/third-party/jquery.js?v37"></script>
<script src="<?php echo $website['root'];?>wow/static/local-common/js/core.js?v37"></script>
<script src="<?php echo $website['root'];?>wow/static/local-common/js/tooltip.js?v37"></script>
<script src="<?php echo $website['root'];?>wow/static/local-common/js/bml.js"></script>
<script src="http://static.wowhead.com/widgets/power.js"></script>
<!--[if IE 6]> <script type="text/javascript">//<![CDATA[try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}//]]></script><![endif]-->
<link rel="image_src" href="<?php echo $website['root'];?>wow/static/images/icons/facebook/article.jpg" />
<style type="text/css">
.loader {
  width:24px;
  height:24px;
  background: url("<?php echo $website['root'];?>wow/static/images/loaders/canvas-loader.gif") no-repeat;
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
	if(isset($_GET['p'])){
    $error = 0;

		$postid = intval($_GET['p']);
		$posts = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_posts WHERE id = '".$postid."'"))or $error=1;
		
		$thread = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_threads WHERE id = '".$posts['postid']."'"));
		if ($thread['locked'] == 0){
      $action = 'Closing'; 
      $post_lock = mysql_query("UPDATE forum_threads SET locked = '1' WHERE id = '".$posts['postid']."'");
    }else{
      $action = 'Openning';
      $post_lock = mysql_query("UPDATE forum_threads SET locked = '0' WHERE id = '".$posts['postid']."'");
    } 
		
		if($post_lock == false) $error = 1; 
		
  }else $error=1;
		
    echo '
		<ol class="ui-breadcrumb">
		<li><a href="'.$website['root'].'index.php" rel="np">'.$website['title'].'</a><span class="breadcrumb-arrow"></span></li>
		<li><a href="'.$website['root'].'forum" rel="np">Forums</a><span class="breadcrumb-arrow"></span></li>
		<li><a href="'.$website['root'].'forum" rel="np">'.$category['name'].'</a><span class="breadcrumb-arrow"></span></li>
		<li><a href="'.$website['root'].'forum/category/?f='.$forum['id'].'" rel="np">'.$forum['name'].'</a><span class="breadcrumb-arrow"></span></li>
		<li class="last"><a href="#" rel="np">'.$action.' Topic</a></li>
		</ol>
		

</div>
<div class="content-bot">

		<center>
		<h3>'.$action.' Topic</h3><br />
		<div class="loader"></div><br />';
		
		if($error == 1){
		
			echo '<div class="errors">';
			echo '<font color="red">*An error has ocurred! The publication could not be deleted</font><br />';
			echo '</div>';
			echo '<meta http-equiv="refresh" content="2;url='.$website['root'].'forum/category/view-topic/?t='.$thread['id'].'"';
			
		}else{
			
			echo '<div class="success">';
			echo 'The publication has been deleted';
			echo '</div>';
			echo '<meta http-equiv="refresh" content="2;url='.$website['root'].'forum/category/view-topic/?t='.$thread['id'].'"';
		}
		echo '<div id="forum-content"></div>';
	?>
    </div>
  </div>
</div>

<?php include("../../../footer.php"); ?>
</body>
</html>