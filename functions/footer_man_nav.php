<div id="service">
<ul class="service-bar">
<li class="service-cell service-home"><a href="<?php echo BASE_URL ?>" tabindex="50" accesskey="1" title="Home"><div style="width:45px;">&nbsp;</div></a></li>
<?php if(isset($_SESSION['username'])){ ?>
<li class="service-cell service-welcome"><?php echo $Welcome['Welcome']; ?><?php echo $account_extra['firstName']; ?> | <a href="<?php echo BASE_URL ?>logout.php"><?php echo $logout['logout']; ?></a></li>
<?php }else{ ?>
<li class="service-cell service-welcome"><a href="#" onclick="return Login.open('<?php echo @$website['root'];?>loginframe?')"><?php echo @$login['login']; ?></a> or <a href="<?php echo @$website['root']; ?>register"><?php echo @$Account3['Account3']; ?></a></li>
<?php } ?>
<li class="service-cell service-shop">
<a href="<?php echo BASE_URL ?>shop/" class="service-link"><?php echo $Services['Services']; ?></a>
</li>
<li class="service-cell service-account"><a href="<?php echo BASE_URL ?>account_log.php" class="service-link" tabindex="50" accesskey="3"><?php echo $Account['Account']; ?></a></li>
<?php
if (!isset($_SESSION['username'])){
}
else
{
mysql_select_db($server_adb);
$check_query = mysql_query("SELECT gmlevel from account inner join account_access on account.id = account_access.id where username = '".strtoupper($_SESSION['username'])."'") or die(mysql_error());
$login = mysql_fetch_assoc($check_query);
if($login['gmlevel'] < 3){
}
else 
{
echo '<li class="service-cell service-account">
<a href="'.$website['root'].$website['admin:path'].'" class="service-link" tabindex="50" accesskey="3">ACP (Admin)</a></li>';
}
}
?>
<li class="service-cell service-support service-support-enhanced">
<a href="#support" class="service-link service-link-dropdown" tabindex="50" accesskey="4" id="support-link" onclick="return false" style="cursor: progress" rel="javascript"><?php echo $Support['Support']; ?><span class="no-support-tickets" id="support-ticket-count"></span></a>
<div class="support-menu" id="support-menu" style="display:none;">
<div class="support-primary">
<ul class="support-nav">
<li>
<a href="#" tabindex="55" class="support-category">
<strong class="support-caption"><?php echo $Support8['Support8']; ?></strong>
<?php echo $Support5['Support5']; ?>
</a>
</li>
<li>
<a href="#" tabindex="55" class="support-category">
<strong class="support-caption"><?php echo $Support9['Support9']; ?></strong>
<?php echo $Support6['Support6']; ?>
</a>
</li>
<li>
<a href="#" tabindex="55" class="support-category">
<strong class="support-caption"><?php echo $Support10['Support10']; ?></strong>
<?php echo $Support7['Support7']; ?>
</a>
<div class="ticket-summary" id="ticket-summary"></div>
</li>
</ul>
<span class="clear"><!-- --></span>
</div>
<div class="support-secondary"></div>
<!--[if IE 6]> <iframe id="support-shim" src="javascript:false;" frameborder="0" scrolling="no" style="display: block; position: absolute; top: 0; left: 9px; width: 297px; height: 400px; z-index: -1;"></iframe>
<script type="text/javascript">
//<![CDATA[
(function(){
var doc = document;
var shim = doc.getElementById('support-shim');
shim.style.filter = 'progid:DXImageTransform.Microsoft.Alpha(style=0,opacity=0)';
shim.style.display = 'block';
})();
//]]>
</script>
<![endif]-->
</div>
</li>
<li class="service-cell service-explore">
<a href="#explore" tabindex="50" accesskey="5" class="dropdown" id="explore-link" onclick="return false" style="cursor: progress" rel="javascript"><?php echo $website['explore']; ?></a>
<div class="explore-menu" id="explore-menu" style="display:none;">
<div class="explore-primary">
<ul class="explore-nav">
<li>
<a href="<?php echo BASE_URL ?>index" tabindex="55">
<strong class="explore-caption"><?php echo TITLE ?></strong>
<?php echo $Friends['Keepthem']; ?>
</a>
</li>
<li>
<a href="#" tabindex="55">
<strong class="explore-caption"><?php echo $Account['Account']; ?></strong>
<?php echo $Account6['Account6']; ?>
</a>
</li>
<li>
<a href="#" tabindex="55">
<strong class="explore-caption"><?php echo $Support['Support']; ?></strong>
<?php echo $Support11['Support11']; ?>
</a>
</li>
<li>
<a href="#" tabindex="55">
<strong class="explore-caption"><?php echo $Donate['Donate']; ?></strong>
<?php echo $Donate1['Donate1']; echo $website['title']; ?>.
</a>
</li>
</ul>
<div class="explore-links">
<h2 class="explore-caption"><?php echo $More['More']; ?></h2>
<ul>
<li><a href="#" tabindex="55"><?php echo $Retrieve['Retrieve']; ?></a></li>
<li><a href="#" tabindex="55"><?php echo $Client_down3['Client_down3']; ?></a></li>
</ul>
</div>
<span class="clear"><!-- --></span>
</div>
</li>
</ul>
</div>
<script src="wow/static/local-common/js/menu.js?v15"></script>
<script src="wow/static/js/wow.js?v4"></script>
<script type="text/javascript"> 
friendData = [];
$(function(){
Menu.initialize('data/menu.json');
Search.init('ta/lookup');
});
</script>
<!--[if lt IE 8]> <script type="text/javascript" src="wow/static/local-common/js/third-party/jquery.pngFix.pack.js?v15"></script>
<script type="text/javascript">$('.png-fix').pngFix();</script>
<![endif]-->
<script src="wow/static/local-common/js/cms.js?v15?v2"></script>
<script type="text/javascript">
//<![CDATA[
Core.load("<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js?v15");
Core.load("<?php echo BASE_URL ?>wow/static/local-common/js/overlay.js?v15");
Core.load("<?php echo BASE_URL ?>wow/static/local-common/js/search.js?v15");
Core.load("<?php echo BASE_URL ?>wow/static/local-common/js/login.js?v15", false, function() {
Login.embeddedUrl = '<?php echo BASE_URL ?>loginframe.php';
});
//]]>
</script>
</div>
