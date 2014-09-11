<?php 
require_once("configs.php");
$page_cat="pre";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de-de" class="ff ff25">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title><?php echo TITLE ?> - Test TItle</title>
<link rel="shortcut icon" href="pre/img/favicon.ico" type="image/x-icon" />
<script type="text/javascript" src="pre/js/jquery-1.js"></script>
<script type="text/javascript" src="pre/js/core.js"></script>
<style type="text/css">
html,
body { margin:0; padding: 0; height: 100%; font: normal 12px Arial, Helvetica, sans-serif; background: #000; }
img { border:0 }
.continue { background: #072540 url("pre/img/ribbon.png") no-repeat center bottom; border-bottom: 1px solid #143352; z-index: 1000; }
.continue a { background: url("pre/img/bnet-logo.png") 0 7px no-repeat; display: inline-block; padding-left: 45px; font-style: none; }
.continue a strong { background: url("pre/img/arrow.gif") right 16px no-repeat; padding-right: 15px; display: inline-block; }
.continue a:hover strong { background-position: right -16px }
.continue-message { width: 996px; margin: 0 auto; text-align: center; }
.continue-message p { margin: 0; padding: 0; height: 40px; line-height: 40px; }
.continue-message a { color: #d0a803; }
.continue-message a:hover,
.continue-message a:focus,
.continue-message a:active { color: #fff; }
:focus { outline: 0; }
</style>
<!--[if IE 6]><style type="text/css">
</style>
<![endif]-->
</head>
<body class="de-de int raf">
<div class="continue">
<div class="continue-message">
<p>
<a href="<?php echo BASE_URL ?>" tabindex="1">
<strong><? echo $Pre['next']; ?></strong>
</a>
</p>
</div>
</div>
<style type="text/css">
html, body { background: #000 url("pre/img/bg.jpg") 50% 0 no-repeat; padding: 0; margin: 0; }
.wrapper { position:relative; width:1000px; height:950px; margin:0 auto; }
.wrapper a.learn-more { display:block; cursor:pointer; width:1000px; height:700px; margin:0 auto; }
.wrapper .legal { width:1000px; margin:65px auto 0; }
.wrapper .legal .blizz-logo { display:block; float:left; margin-right:20px; }
.wrapper .legal .copyright { float:left; width:470px; margin-right:20px; color:#98896c; line-height:1.6em; font-size:11px; }
#legal { float:right; }
.legal #legal-ratings { float: right; }
.legal #legal-ratings img { vertical-align: top; text-align:right; }
.legal #legal-ratings a { margin-left: 10px; }
.legal a { display: inline-block; vertical-align: top; }
.es-mx .wrapper .legal .copyright { width:430px; }
.en-gb .legal .copyright,
.fr-fr .legal .copyright,
.es-es .legal .copyright,
.ru-ru .legal .copyright,
.pt-pt .legal .copyright,
.pl-pl .legal .copyright,
.it-it .legal .copyright { width:375px; }
.de-de .wrapper .legal .copyright { width:700px; }
.ko-kr .wrapper .legal .copyright { display:none; }
object, iframe { visibility: hidden; height: 1px; width: 1px; }
</style>
<div class="wrapper">
<a class="learn-more" href="<?php echo BASE_URL ?> test link"></a>
<div class="legal">
<div class="copyright">
<?php echo $copyright3['copyright3']; ?>.<br /><?php echo $copyright['copyright']; ?> - <?php echo date('Y'); ?> <?php echo TITLE ?>.<br /><?php echo $copyright4['copyright4']; ?>
</div>
<script type="text/javascript">
//<![CDATA[
if (Feedback.showForm) {
$('.common-feedback-buttons').css('display', 'block');
Feedback.initialize();
Feedback.titleWebsiteSuggestion = 'Feedback zur Webseite';
Feedback.titleWebsiteFeedback = 'Fehler melden';
Feedback.pageReferring = 'http://eu.battle.net/de/int?r=wow';
if (Feedback.pageReferring === '') {
Feedback.pageReferring = window.location.href;
}
Feedback.feedbackError = 'Fehler';
Feedback.introError = 'Ein Problem auf unseren Seiten gefunden? Lasst es uns wissen!';
Feedback.introFeedback = 'Ideen und Vorschläge für die Webseiten direkt an Battle.net senden!';
}
//]]>
</script>
<script type="text/javascript">
//<![CDATA[
$('.common-feedback-buttons').css('display', 'none');
$(function () {
Core.appendFrame('HTTP://bs.serving-sys.com/BurstingPipe/ActivityServer.bs?cn=as&amp;ifrm=1&amp;ActivityID=374912&amp;rnd=' + Math.random(), 1, 1, $('#legal'))
})
//]]>
</script>
</div>
<script>
//<![CDATA[
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-544112-16']);
_gaq.push(['_setDomainName', '.battle.net']);
_gaq.push(['_setAllowLinker', true]);
(function() {
var ga = document.createElement('script');
var src = "https://ssl.google-analytics.com/ga.js";
if ('http:' == document.location.protocol) {
src = "http://www.google-analytics.com/ga.js";
}
ga.type = 'text/javascript';
ga.setAttribute('async', 'true');
ga.src = src;
var s = document.getElementsByTagName('script');
s = s[s.length-1];
s.parentNode.insertBefore(ga, s.nextSibling);
})();
//]]>
</script><script type="text/javascript" async="true" src="pre/js/ga.js"></script>
</body>
</html>