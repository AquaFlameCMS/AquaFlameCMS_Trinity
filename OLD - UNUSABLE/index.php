<?php
require_once("configs.php");
require_once("functions/custom.php");
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
	<meta name="description" content="<?php echo $website['description']; ?>">
    <meta name="keywords" content="<?php echo $website['keywords']; ?>">
	<link rel="shortcut icon" href="<?php echo $website['root']; ?>wow/static/local-common/images/favicons/wow.png" type="image/x-icon">
	<?php GetStyle(); ?>
	<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
	<script src="<?php echo $website['root']; ?>wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
	<script src="<?php echo $website['root']; ?>wow/static/local-common/js/core.js"></script>
	<script src="<?php echo $website['root']; ?>wow/static/local-common/js/tooltip.js"></script>
	<script src="http://static.wowhead.com/widgets/power.js"></script>
	<!--[if IE 6]> <script type="text/javascript">
	//<![CDATA[
	try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
	//]]>
	</script>
	<![endif]-->
	</head>
	<body class="en-us homepage  news" onUnload="opener.location=('index.php')">
<div id="wrapper">
<?php include("header.php"); ?>
<div id="content">
<div class="content-top body-top">
<div class="content-trail">
	<ol class="ui-breadcrumb">
		<li class="last">
			<a href="index.html" rel="np" itemprop="url">
				<span class="breadcrumb-text" itemprop="name"><?php echo $website['title']; ?></span>
			</a>
		</li>
	</ol>
</div>
<div class="content-bot clear">
    <div id="slideshow" class="ui-slideshow">
        <div class="slideshow">
			<?php
			$slideshows = mysql_query("SELECT * FROM slideshows ORDER BY id ASC LIMIT 5");
			mysql_error($connection_setup);
			$i=0;
			while($slideshow=mysql_fetch_array($slideshows))
			{
			if($i == 0)
			{
			echo'<div class="slide" id="slide-'.$i.'" style="background-image: url(\'images/slideshows/'.$slideshow['image'].'\'); "></div>';
			}
			if($i != 0)
			{
			echo'<div class="slide" id="slide-'.$i.'" style="background-image: url(\'images/slideshows/'.$slideshow['image'].'\'); display: none;"></div>';
			}
			$i++;
			}
			echo'</div>';
			?>
            <div class="paging">
                <a href="javascript:;" class="prev" onclick="Slideshow.prev();"></a>
				<?php
				$a = 1;
				while ($a<$i){ 
                echo '<a href="javascript:;" class="next" id="paging-'.$a.'" onclick="Slideshow.next('.$a.', this);" onMouseOver="Slideshow.preview('.$a.');"></a>';
				$a++;}
				?>
            </div>
			<?php
			$slideshows = mysql_query("SELECT * FROM slideshows ORDER BY id ASC LIMIT 1");
			$slideshow = mysql_fetch_assoc($slideshows);
			echo'<div class="caption">
			<h3><a href="#" class="link">'.$slideshow['title'].'</a></h3>
			'.$slideshow['description'].'
			</div>';
			?>
        <div class="preview"></div>
        <div class="mask"></div>
    </div>
		<?php $slideshows = mysql_query("SELECT * FROM slideshows ORDER BY id ASC LIMIT 5"); ?>
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
                    id: "'.$slideshow['id'].'",
					duration: '.$slideshow['duration'].'
                    }';
					if($i!=4){echo',';}
					$i++;
					}
					?>
            ]);

        });
		//]]>
		</script>
	<div class="right-sidebar">
		<?php
		include("panel/promo.php");
		include("panel/connect.php");
		?>
		<div class="sidebar" id="sidebar">
		<div class="sidebar-top">
		<div class="sidebar-bot">
		<?php
		if(isset($_SESSION['username']))
		{
		include("panel/vote.php");
		}
			$query="SELECT * FROM sidebars WHERE name='ServerInfo'";
					$con=mysqli_connect(DBHOST, DBUSER, DBPASS, DB);
						$result=mysqli_query($con,$query);
			while($row=mysqli_fetch_array($result)) {
						if($row['enabled']=='1') {
							include("panel/server_information.php");
								}
						else {
						}
					}
		include("panel/sotd.php");
		include("panel/popular_topics.php");
		?>
					<div id="dynamic-sidebar-target"></div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
		//<![CDATA[
			$(function() {
				Sidebar.sidebar([
						{ "type": "expansion", "query": "" },
						{ "type": "under-dev", "query": "" },
						{ "type": "gear-store", "query": "" },
						{ "type": "sotd", "query": "" },
						{ "type": "blizzard-posts", "query": "" }
				]);
			});
		//]]>
		</script>
	</div>
	

	<div class="left-content">
		<div class= "left-content-inner">
		<div class="featured-news-container">
			<ul class="featured-news">
		<?php
			$articles_query = mysql_query("SELECT * FROM news ORDER BY DATE DESC LIMIT 3")or print("No Articles");
			while($articles = mysql_fetch_array($articles_query)){
			?>
				<li>
					<div class="article-wrapper">
						<a href="news.php?id=<?php echo $articles['id']; ?>" class="featured-news-link" data-category="wow" data-action="Blog_Click-Throughs" data-label="home 0 - us - 14061292 - 14092809">
							<div class="article-image" style="background-image:url(wow/static/images/news/<?php echo $articles['image']; ?>.jpg)">
								<div class="article-image-frame"></div>
							</div>
							<div class="article-content">
								<span class="article-title" title="<?php echo $articles['title']; ?>"><?php echo $articles['title']; ?></span>
								<span class="article-summary"><?php echo $articles['content']; ?></span>
							</div>
						</a>
						<div class="article-meta">
							<a href="news.php?id=<?php echo $articles['id']; ?>#comments" class="comments-link"><?php echo $articles['comments']; ?></a>
							<span class="publish-date" title="8 may 2014 12:00 PM CDT"><?php echo ago(strtotime($articles['date'])); ?></span>
						</div>
					</div>
				</li>
			<?php
			}
			?>
			</ul>
		</div>
		<span class="clear"><!-- --></span>
			<div id="blog-articles" class="blog-articles" itemscope="itemscope" itemtype="http://schema.org/Blog">
			<?php
			if(isset($_GET['new'])){
			$new = intval($_GET['new']);
			}else{
				$new = 0;
			}
			
			$news_first = $new ? $new : 9999999999;
			$news_query = ("SELECT * FROM news WHERE id <= '".$news_first."' ORDER BY `id` DESC LIMIT 8");
			$news_query = mysql_query($news_query);
			$counter = 1;
			
			while($counter<=7 && $news=mysql_fetch_array($news_query)){
			if($counter == 1){}else{}

			if($news['content'] == "")
			{
				$news['content'] = substr(strip_tags($news['content'],'<p><a><br><li><ol><ul>'),0,310);
			if (substr($news['content'], -1) == '<') 
			{
	    		$news['content'] = substr($news['content'], 0, -1);
			}  

			$content = $news['content'];
			}
			else
			{
			$content = substr(strip_tags($news['content']),0,310);
			}
			if($news['id'] != NULL)
			echo '
			<div class="article-wrapper">
			<a href="news.php?id='.$news['id'].'" itemprop="url">';
			echo '
						<div class="article-image" style="background-image:url(\'wow/static/images/news/'.$news['image'].'.jpg\')">
							<div class="article-image-frame"></div>
						</div>
						<div class="article-content" itemprop="blogPost" itemscope="itemscope" itemtype="http://schema.org/BlogPosting">
							<h2 class="header-2">
								<span class="article-title" itemprop="headline">'.$news['title'].'</span>
							</h2>
							<span class="clear"><!-- --></span>						
							<div class="article-summary" itemprop="description">'.$content."...".'</div>
							<span class="clear"><!-- --></span>
						</div>
					</a>
					<div class="article-meta">
						<span class="publish-date" title="'.$news['date'].'"> '.ago(strtotime($news['date'])).'</span>
							<a href="news.php?id='.$news['id'].'#comments" class="comments-link">'.$news['comments'].'</a>
					</div>
					<span class="clear"><!-- --></span>
				</div>';
				$counter++;
			 } ?>
			</div>
		<?php if($news=mysql_fetch_array($news_query)){ ?>
		<span class="clear"><!-- --></span>
		<div class="blog-load-more">
		<a class="load-more" id="load-more" href="<?php echo'?new='.$news['id'];?>"><?php echo $LoadMore['LoadMore']; ?></a>
		<span class="clear"><!-- --></span>
		</div>
		<?php }?>
		</div>
	</div>
	<span class="clear"><!-- --></span>
</div>
</div>
</div>
<?php include("footer.php"); ?>
</body>
</html>
