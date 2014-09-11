<?php require_once("configs.php"); ?>
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
<link rel="search" type="application/opensearchdescription+xml" href="http://us.battle.net/en-us/data/opensearch" title="Battle.net Search" />
<link rel="stylesheet" href="wow/static/local-common/css/common.css?v15" />
<link title="World of Warcraft - News" href="wow/en/feed/news" type="application/atom+xml" rel="alternate"/>
<link rel="stylesheet" href="wow/static/css/wow.css?v2" />
<link rel="stylesheet" href="wow/static/local-common/css/cms/forums.css?v15" />
<link rel="stylesheet" href="wow/static/local-common/css/cms/cms-common.css?v15" />
<link rel="stylesheet" href="wow/static/css/cms.css?v2" />
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
Core.baseUrl = 'wow/en';
Core.project = 'wow';
Core.locale = 'en-us';
Core.buildRegion = 'us';
Core.loggedIn = false;
Flash.videoPlayer = 'http://us.media.blizzard.com/wow/player/videoplayer.swf';
Flash.videoBase = 'http://us.media.blizzard.com/wow/media/videos';
Flash.ratingImage = 'http://us.media.blizzard.com/wow/player/rating-en-us.jpg';
//]]>
</script>
<meta name="title" content="Forum" />
<link rel="image_src" href="wow/static/images/icons/facebook/article.jpg" />
</head>
<body class="en-us">
<div id="wrapper">
<?php $page_cat="none"; include("header.php"); ?>
<div id="content">
<div class="content-top">
<div class="content-trail">
<ol class="ui-breadcrumb">
<li>
<a href="index.php" rel="np"><?php echo TITLE ?></a>
<span class="breadcrumb-arrow"></span>
</li>
<?php
if($_GET['mId'] == ""){
$error=1;
$message['title'] = "Error - No Message Selected";
$message['author'] = "Website";
$message['class'] = "Internal Server";
$message['content'] = "Error - No Message Selected";
}else{
$error=0;
$messagex = intval($_GET['mId']);
$get_message = mysql_query("SELECT * FROM messages WHERE id = '".$messagex."'");
$message = mysql_fetch_assoc($get_message);
}
?>
<li class="last children"><a href="#" rel="np">Website Message</a>
</li>
</ol>
</div>
<div class="content-bot">
<div id="forum-content">
<div class="section-header">
<div class="blizzard_icon">
</div>
<span class="topic">Message : </span>
<span class="sub-title"><?php echo $message['title']; ?></span>
</div>
<div class="forum-actions top">
<div class="actions-panel">
<a class="ui-button button1 imgbutton" href="javascript:history.back()"><span><span> <span class="back-arrow"> </span></span></span></a>
<!--<a class="ui-button button1 disabled" href="javascript:;"><span><span> Add a reply</span></span></a>-->
<span class="clear"><!-- --></span>
</div>
</div>
<div id="thread">
<div id="post-9326196671" class="post blizzard">
<span id="1"></span>
<div class="post-interior">
<table><tr><td class="post-character">
<div class="post-user">
<div class="avatar avatar-interior">
<img alt="" src="images/avatars/Blizzard.png" />
</div>
<div class="character-info">
<div class="user-name">
<span class="char-name-code" style="display: none"><?php echo $message['author']; ?></span>
<div id="context-1" class="ui-context">
<div class="context">
<a href="javascript:;" class="close" onclick="return CharSelect.close(this);"></a>
<div class="context-user">
<strong><?php echo $message['author']; ?></strong>
</div>
<div class="context-links"><a href="" title="View posts" rel="np" class="icon-posts link-first link-last">View posts</a></div>
</div>
</div>
<a href="javascript:;" class="context-link" rel="np">
<?php echo $message['author']; ?>
</a>
</div>
<div class="blizzard-title"><?php echo $message['class']; ?></div>
</div>
</div>
</td><td>
<div class="post-edited">
</div>
<div class="post-detail">
<br />
<?php echo $message['content']; ?>
</div>
</td><td class="post-info">
<div class="post-info-int">
<div class="postData">
</a>
<div class="date" onmouseover="Tooltip.show(this,'TheAdriann')">
<!-- Orice (gen data) -->
</div>
</div>
</div>
</td></tr>
</table>
<div class="post-options">
<div class="no-post-options"><!-- --></div>
<span class="clear"><!-- --></span>
</div>
</div>
</div>
</div>
<div class="talkback"><a id="new-post"></a>
<form method="post" onsubmit="return Cms.Topic.postValidate(this);" action="#new-post">
<div>
<input type="hidden" name="xstoken" value="8e51dedc-87f2-4b7f-b108-5459f668634a"/>
<div class="post ">
<table class="dynamic-center">
<tr>
<td> Click <a href="javascript:history.back()">here</a> to leave this page.
</td>
</tr>
</table>
</div>
</div>
</form>
<span class="clear"><!-- --></span>
<!--
<div class="talkback-code">
<div class="talkback-code-interior">
<div class="talkback-icon">
<h4 class="code-header">Please report any Code of Conduct violations, including:</h4>
<p>Threats of violence. <strong>We take these seriously and will alert the proper authorities.</strong></p>
<p>Posts containing personal information about other players. <strong>This includes physical addresses, e-mail addresses, phone numbers, and inappropriate photos and/or videos.</strong></p>
<p>Harassing or discriminatory language. <strong>This will not be tolerated.</strong></p>
<p>Click <a href="/Support/Index.html?Link-Value=Code of Conduct">here</a> to view the Forums Code of Conduct.</p>
</div>
</div>
</div>
-->
</div>
</div>
<div id="report-post">
<table id="report-table">
<tr>
<td class="report-desc"> </td>
<td class="report-detail report-data"> Report Post #<span id="report-postID"></span> written by <span id="report-poster"></span> </td>
<td class="post-info"></td>
</tr>
<tr>
<td class="report-desc"><div>Reason</div></td>
<td class="report-detail">
<select id="report-reason">
<option value="SPAMMING">Spamming</option>
<option value="REAL_LIFE_THREATS">Real Life Threats</option>
<option value="BAD_LINK">Bad Link</option>
<option value="ILLEGAL">Illegal</option>
<option value="ADVERTISING_STRADING">Advertising</option>
<option value="HARASSMENT">Harassment</option>
<option value="OTHER">Other</option>
<option value="NOT_SPECIFIED">Not Specified</option>
<option value="TROLLING">Trolling</option>
</select>
</td>
<td></td>
</tr>
<tr>
<td class="report-desc"><div>Explain <small>(256 characters max)</small></div></td>
<td class="report-detail"><textarea id="report-detail" class="post-editor" cols="78" rows="13"></textarea></td>
<td></td>
</tr>
<tr>
<td></td>
<td colspan="2" class="report-submit">
<div>
<a href="javascript:;" onclick="Cms.Topic.reportSubmit('')">Submit</a>
|
<a href="javascript:;" onclick="Cms.Topic.reportCancel()">Cancel</a>
</div></td>
</tr>
</table>
<div id="report-success" style="text-align:center">
<h4>Reported!</h4>
[<a href='javascript:;' onclick='$("#report-post").hide()'>Close</a>]
</div>
</div>
</div>
</div>
</div>
<?php include("footer.php"); ?>
</body>
</html>
