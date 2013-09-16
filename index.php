<?php
require_once("configs.php");
$page_cat = "home";
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<HTML>
<head>
	<title><?php echo $website['title']; ?></title>
	<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
	<meta name="viewport" content="width=device-width">
	<link rel="shortcut icon" href="wow/static/local-common/images/favicons/wow.png" type="image/x-icon">
	<link rel="search" type="application/opensearchdescription+xml" href="http://eu.battle.net/en-gb/data/opensearch" title="Battle.net Search">
	<link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common.css?v15">
	<link title="World of Warcraft - News" href="wow/en/feed/news" type="application/atom+xml" rel="alternate">
	<link rel="stylesheet"  href="wow/static/css/wow.css?v4">
	<link rel="stylesheet"  href="wow/static/local-common/css/cms/homepage.css?v15">
	<link rel="stylesheet"  href="wow/static/local-common/css/cms/blog.css?v15">
	<link rel="stylesheet"  href="wow/static/css/status.css?v1">
	<link rel="stylesheet"  href="wow/static/local-common/css/cms/cms-common.css?v15">
	<link rel="stylesheet"  href="wow/static/css/cms.css?v4">
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
	<script src="wow/static/local-common/js/core.js?v15"></script>
	<script src="wow/static/local-common/js/tooltip.js?v15"></script>
	<script src="http://static.wowhead.com/widgets/power.js"></script>
	<!--[if IE 6]> <script type="text/javascript">
	//<![CDATA[
	try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
	//]]>
	</script>
	<![endif]-->
	</head>
	<body class="en-us homepage" onUnload="opener.location=('index.php')">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

<div id="wrapper">
	<?php include("header.php"); ?>
	<div id="content">
		<div class="content-top">
			<div class="content-bot">	
				<div id="homepage">
					<div id="left">
						<script src="wow/static/local-common/js/slideshow.js"></script>
						<script src="wow/static/local-common/js/third-party/swfobject.js"></script>
						<div id="slideshow" class="ui-slideshow">
							<div class="slideshow">
							<?php
							$slideshows = mysql_query("SELECT * FROM slideshows ORDER BY id DESC LIMIT 5");
							mysql_error($connection_setup);
							$i=0; 
							echo '<div class="container">';
							while($slideshow=mysql_fetch_array($slideshows)){
							if($i == 0){echo'<div class="slide" id="slide-'.$i.'" style="background-image: url(\'images/slideshows/'.$slideshow['image'].'\');"></div>';}
							if($i != 0){
							echo'<div class="slide" id="slide-'.$i.'" style="background-image: url(\'images/slideshows/'.$slideshow['image'].'\'); display:none;"></div>';}
							$i++;
							}
							echo '</div>';
							?>
							<div class="paging">
									<a href="javascript:;" id="paging-0" onClick="Slideshow.jump(0, this);" onMouseOver="Slideshow.preview(0);" class="current"></a>
							<?php
              $a = 1;
              while ($a<$i){ 
                echo '<a href="javascript:;" id="paging-'.$a.'" onClick="Slideshow.jump('.$a.', this);" onMouseOver="Slideshow.preview('.$a.');"></a>';
                $a++;}
              ?>
							</div>
							<?php
							$slideshows = mysql_query("SELECT * FROM slideshows ORDER BY id DESC LIMIT 1");
							$slideshow = mysql_fetch_assoc($slideshows);
							echo'<div class="caption">
							<h3><a href="#" class="link">'.$slideshow['title'].'</a></h3>
							'.$slideshow['description'].'
							</div>';
							?>
							
							<div class="preview"></div>
							<div class="mask"></div>
						</div>
						
						<?php $slideshows = mysql_query("SELECT * FROM slideshows ORDER BY id DESC LIMIT 5"); ?>
						<script type="text/javascript">
						//<![CDATA[
							$(function() {
								Slideshow.initialize('#slideshow', [
									<?php
									$i=0; 
									while($slideshow=mysql_fetch_array($slideshows)){
									echo '
									{
										image: "images/slideshows/'.$slideshow['image'].'",
										desc: "'.$slideshow['description'].'",
										title: "'.$slideshow['title'].'",
										url: "'.$slideshow['link'].'",
										id: "'.$slideshow['id'].'"
									}';
									if($i!=4){echo',';}
									$i++;
									}
									?>
								]);

							});
						//]]>
						</script>
						</div>
						
						<div class="featured-news">
							<?php
							$articles_query = mysql_query("SELECT * FROM news ORDER BY DATE desc LIMIT 4")or print("No Articles");
							while($articles = mysql_fetch_array($articles_query)){
							?>
							<div class="featured">
								<a href="news.php?id=<?php echo $articles['id']; ?>">
									<span class="featured-img" style="background-image: url('news/<?php echo $articles['image']; ?>.jpg');"></span>
									<span class="featured-desc"> <?php echo $articles['title']; ?> </span>
								</a>
							</div>
							<?php
							}
							?>
							<span class="clear"></span>
						</div>
						<!-- DO NOT EDIT BELOW UNLESS YOU KNOW WHAT YOU ARE DOING! -->
						<div id="news-updates">
							<?php
							
							if(isset($_GET['new'])){
								$new = intval($_GET['new']);
							}else{
								$new = 0;
							}
							
							$news_first = $new ? $new : 9999999999;
							$news_query = ("SELECT * FROM news WHERE id <= '".$news_first."' ORDER BY `id` desc LIMIT 6");
							$news_query = mysql_query($news_query);
							$counter = 1;
							
							while($counter<=5 && $news=mysql_fetch_array($news_query)){
								if($counter == 1){
									echo '<div class="news-article first-child">';
								}else{
									echo '<div class="news-article">';
								}
								
								$posterInfo = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_db.users WHERE id = '".$news['author']."'"));
								require_once("functions/custom.php");
								
								
								if($news['contentlnk'] != NULL)
									echo '<h3><a href="'.$news['contentlnk'].'">'.$news['title'].'</a></h3>';
								else
									echo '<h3><a href="news.php?id='.$news['id'].'">'.$news['title'].'</a></h3>';
								
								echo'
									<div class="by-line">
									'.$Index['By'].' <a href="#">'.$posterInfo['firstName'].'</a><span class="spacer"> // </span> '.ago(strtotime($news['date'])).'
									<a href="news.php?id='.$news['id'].'#comments" class="comments-link">'.$news['comments'].'</a>
									</div>
									
									<div class="article-left" style="background-image: url(\'news/'.$news['image'].'.jpg\');">
									<a href="news.php?id='.$news['id'].'"><img src="wow/static/images/homepage/thumb-frame.gif" alt="" /></a>
									</div>

									<div class="article-right">
										<div class="article-summary">
										<p>'. substr(strip_tags($news['content'],'<p><a><br><li><ol><ul>'),0,305)."...".'</p>'; //Needs Strip tags for not closed tags
										
										if($news['contentlnk'] != NULL)
											echo '<a href="'.$news['contentlnk'].'" class="more">'.$More['More'].'</a>';
										else
											echo '<a href="news.php?id='.$news['id'].'" class="more">'.$More['More'].'</a>';
											
										echo'
										</div>
									</div>
									
									<span class="clear"><!-- --></span>
									</div>
								';
								
								$counter++;
							}
							
							if($news=mysql_fetch_array($news_query)){ ?>
								<!--Next Page Button-->
								<div class="blog-paging">
								<a class="ui-button button1 button1-next float-right " href="<?php echo'?new='.$news['id'];?>">
								<span><span><?php echo $Ind['Ind']; ?></span></span></a>
								<span class="clear"><!-- --></span>
								</div>
							<?php }?>
						</div>
					</div>
				
					<!-- Right Panel -->

					<div id="right" class="ajax-update">
					<?php
						include("panel/promo.php");
						if(isset($_SESSION['username']))
						{
							echo '<br><br>';
							include("panel/vote.php");
						}else
						include("panel/vote_offline.php");
						include("panel/server_information.php");
						include("panel/services.php");
						include("panel/popular_topics.php");
					?>
					</div>
					<span class="clear"><!-- --></span>
				</div>
			</div>
		</div>
	</div>

	<?php include("footer.php"); ?>
</div>
</body>
</html>
