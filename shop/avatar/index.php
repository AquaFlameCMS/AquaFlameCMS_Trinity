<?php
require_once("../../configs.php");
$page_cat = "security";
if (!isset($_SESSION['username'])) {
        header('Location: '.BASE_URL.'account_log.php');		
}
?>
<!DOCTYPE html>
<html lang="en-gb">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
<title><?php echo TITLE ?> - <?php echo $Serv['Serv31']; ?>
</title>
<meta content="false" http-equiv="imagetoolbar"/>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
<meta name="description" content="<?php echo DESCRIPTION ?>">
<meta name="keywords" content="<?php echo KEYWORDS ?>">
<link rel="shortcut icon" href="../../wow/static/local-common/images/favicons/wow.png" type="image/x-icon"/>
<link rel="stylesheet" href="../../wow/static/local-common/css/common.css?v15"/>
<!--[if IE]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/local-common/css/common-ie.css?v46" /><![endif]-->
<!--[if IE 6]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/local-common/css/common-ie6.css?v46" /><![endif]-->
<!--[if IE 7]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/local-common/css/common-ie7.css?v46" /><![endif]-->
<link title="World of Warcraft - Noticias" href="http://us.battle.net/wow/es/feed/news" type="application/atom+xml" rel="alternate"/>
<link rel="stylesheet" href="../../wow/static/css/wow.css?v4"/>
<link rel="stylesheet" href="../../wow/static/css/shop/vas.css"/>
<link rel="stylesheet" href="../../wow/static/css/shop/avatar.css"/>
<!--[if IE]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/wow-ie.css?v34" /><![endif]-->
<!--[if IE 6]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/wow-ie6.css?v34" /><![endif]-->
<!--[if IE 7]> <link rel="stylesheet" type="text/css" media="all" href="/wow/static/css/wow-ie7.css?v34" /><![endif]-->
<script src="../../wow/static/local-common/js/third-party/jquery-1.4.4.min.js"></script>
<script src="../../wow/static/local-common/js/core.js?v15"></script>
<script src="../../wow/static/local-common/js/tooltip.js?v15"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
</head>
<body class="en-gb services-home logged-in">
<div id="wrapper">
	<?php $page_cat="shop"; include("../../header.php"); ?>
	<div id="content">
		<div class="content-top-avatar">
			<div class="content-trail">
				<ol class="ui-breadcrumb">
					<li><a href="<?php echo BASE_URL ?>" rel="np" class=""><?php echo TITLE ?>
					</a><span class="breadcrumb-arrow"></span></li>
					<li class=""><a href="<?php echo BASE_URL ?>shop/" rel="np"><?php echo $Shop['shop']; ?>
					</a><span class="breadcrumb-arrow"></span></li>
					<li class="last"><a href="<?php echo BASE_URL ?>shop/avatar/" rel="np">Avatar</a></li>
				</ol>
			</div>
			<div class="content-bot">
				<div class="summary">
					<div class="page-titles">
						<h2><?php echo $Serv['Serv31']; ?>
						</h2>
					</div>
				</div>
				<style type="text/css">
.avatar {
	padding:15px;
}
.service {
	width:600px; padding:0 0 0 28px; padding-bottom:70px; float:left; min-height:183px;
}
.submit {
	height:38px;
	width:128px;
	background:url('<?php echo BASE_URL ?>wow/static/images/services/button.png') no-repeat;
	border:0px;
	color:#E0BB00;
	text-shadow:0px 0px 2px #000;
	font-size:15px;
	font-weight:bold;
}
.submit:hover {
	background-position:0 -41;
}
.submit:active{
	background-position:0 -82;
}
.portrait-b img{ -moz-box-shadow:0 0 10px #000; -webkit-box-shadow:0 0 10px #000; box-shadow:0 0 10px #000;  }
.loader {
        width:24px;
        height:24px;
        background: url("<?php echo BASE_URL ?>wow/static/images/loaders/canvas-loader.gif") no-repeat;
       }
				</style>
				<center>
				<?php
if(isset($_SESSION['username'])){
if(@$_POST['avatar'] != ""){
    if($_POST['avatar'] == "blizzard.png"){
        echo '
    	<div class="service" align="left">
				<center>
				<h3>'.$Serv['Serv33'].'</h3>
				<br/>
				<div class="loader">
				</div>
				<br/>
				<font color="red">'.$Serv['Serv34'].'</font>
				<meta http-equiv="refresh" content="2;url='.BASE_URL.'shop"/>
				</center>
			</div>';
			}else{
			$change_avatar = mysql_real_escape_string(mysql_query("UPDATE users SET avatar = '".mysql_real_escape_string($_POST['avatar'])."' WHERE id = '".$account_information['id']."'"));
			echo '
			<div class="service" align="left">
				<center>
				<h3>'.$Serv['Serv33'].'</h3>
				<br/>
				<div class="loader">
				</div>
				<br/>
				<font color="aqua">'.$Serv['Serv35'].'</font>
				<meta http-equiv="refresh" content="2;url='.BASE_URL.'shop"/>
				</center>
			</div>'; }
			}else{ ?>
			<script>
function colors (color){
    document.getElementById("image").src="<?php echo BASE_URL ?>images/avatars/2d/"+color;
}
			</script>
			<table border="0" width="400">
			<tr>
				<form method="POST">
					<td class="avatar">
						<center>
						<div class="avatar portrait-b">
							<img id="image" src="<?php echo BASE_URL ?>images/avatars/2d/1-0.jpg" />
						</div>
						<select onchange="colors(this.options[this.selectedIndex].value)" name="avatar">
							<option value="1-0.jpg" selected><?php echo $uplate['r1']; ?>
							</option>
							<option value="2-0.jpg"><?php echo $uplate['r2']; ?>
							</option>
							<option value="3-0.jpg"><?php echo $uplate['r3']; ?>
							</option>
							<option value="4-0.jpg"><?php echo $uplate['r4']; ?>
							</option>
							<option value="5-0.jpg"><?php echo $uplate['r5']; ?>
							</option>
							<option value="6-0.jpg"><?php echo $uplate['r6']; ?>
							</option>
							<option value="7-0.jpg"><?php echo $uplate['r7']; ?>
							</option>
							<option value="8-0.jpg"><?php echo $uplate['r8']; ?>
							</option>
							<option value="9-0.jpg"><?php echo $uplate['r9']; ?>
							</option>
							<option value="10-0.jpg"><?php echo $uplate['r10']; ?>
							</option>
							<option value="11-0.jpg"><?php echo $uplate['r11']; ?>
							</option>
							<option value="22-0.jpg"><?php echo $uplate['r22']; ?>
							</option>
						</select>
						</center>
					</td>
				</tr>
				</table>
				<br/>
			<center>
				<fieldset class="ui-controls" >
					<button class="ui-button button1 " type="submit" name="Change your avatar" id="settings-submit" value="Change your avatar" tabindex="1">
						<span>
							<span>Change your avatar</span>
						</span>
					</button>
				</fieldset>
			</center>
			</form>
			<?php }
}else{
echo '
	<div class="service" align="left">
			<center>
			<h3>'.$Serv['Serv37'].'</h3>
			<br/>
			<div class="loader">
			</div>
			<br/>
			<meta http-equiv="refresh" content="2;url='.BASE_URL.'shop"/>
			</center>
		</div>
		 '; } ?> </center>
	</div>
</div>
</div>
</div>
<?php include("../../footer.php"); ?>
</body>
</html>