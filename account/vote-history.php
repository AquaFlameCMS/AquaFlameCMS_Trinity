<?php
require_once("../configs.php");
$page_cat = "gamesncodes";
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
        header('Location: '.BASE_URL.'account_log.php');		
}
?>

<!DOCTYPE html> 
<html lang="en-gb">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<title>Vote History - <?php echo TITLE ?></title>
<meta name="description" content="<?php echo DESCRIPTION ?>">
<meta name="keywords" content="<?php echo KEYWORDS ?>">
<link rel="shortcut icon" href="<?php echo BASE_URL ?>wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/local-common/css/common.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/bnet.css" />
<link rel="stylesheet" media="print" href="<?php echo BASE_URL ?>wow/static/css/bnet-print.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/management/dashboard.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/management/services.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/management/wow/raf.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/management/order-history.css" />
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/core.js?v22"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/tooltip.js?v22"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
</head>
<body class="en-us logged-in">
        <div id="layout-top">
<div class="wrapper">
<div id="header">
<?php include("../functions/header_account.php"); ?>
<?php include("../functions/footer_man_nav.php"); ?>
</div>
<div id="layout-middle">
<div class="wrapper">
<div id="content">
<div id="page-header">
<h2 class="subcategory"><?php echo $Vote['Vote7']; ?></h2>
<h3 class="headline"><?php echo $Vote['Vote8']; ?></h3>
</div>
<div id="page-content" class="page-content">
<div class="service-wrapper">
    <p class="service-nav">
        <a href=""><?php echo $Vote['Vote2']; ?></a>
        <a href="vote-history.php" class="active"><?php echo $Vote['Vote3']; ?></a>
        <a href=""><?php echo $Vote['Vote4']; ?></a>
        <a href="vote.php"><?php echo $Vote['Vote5']; ?></a>
    </p>
</div>
<br>
<?php
    $orderby = "DESC";
    $link = "vote-history.php?date=asc";
    if(isset($_GET['date'])) if($_GET['date'] == "desc"){ $orderby = "DESC"; $link = "vote-history.php?date=asc"; }else{ $orderby = "ASC"; $link = "vote-history.php?date=desc";}
    $sql = mysql_query("SELECT * FROM $server_db.votes_log WHERE userid = '".$account_information['id']."' ORDER BY `date` ".$orderby." LIMIT 50") or die(mysql_error());
    $numrows = mysql_num_rows($sql);

    if($numrows > 0){
        echo '
        Vote History<br><br>
        <span class="clear"></span>
        <table id="order-history">
			<thead>
				<tr>
					<th align="center"><span class="arrow">'.$Vote['Vote10'].'</span></th>
					<th align="center"><a href="'.$link.'" class="sort-link numeric"><span class="arrow">'.$Vote['Vote12'].'</span></a></th>
					<th align="center"><span class="arrow">'.$Vote['Vote13'].'</span></th>
					<th align="center"><span class="arrow">Points Earned</span></th>
					<th align="center"><span class="arrow">'.$Vote['Vote16'].'</span></th>
				</tr>
			</thead>
        ';
            
            while($raw = mysql_fetch_array($sql)){
                $vote = mysql_fetch_assoc(mysql_query("SELECT * FROM vote WHERE id = '".$raw['voteid']."'"));
                echo '
                <tbody>
                <tr class="parent-row">
                    <td valign="top" class="align-center" data-raw="20"><span class="icon-frame frame-14 " data-tooltip="'.$account_extra['firstName'].'"><a href="">'.$account_extra['firstName'].'</a></span></td>
                    <td valign="top" class="align-center" data-raw="20"><span><time datetime="2011-07-02T18:25+00:00">'.substr($raw['date'],0,10).'</time></span></td>
                    <td valign="top" class="align-center" data-raw="20"><strong data-service-id="null">'.substr($raw['date'],11,8).'</strong></td>
                    <td valign="top" class="align-center">1 VP Earned</td>
                    <td valign="top" class="align-center" data-raw="20">'.$vote['Name'].'</td>
                </tr>
                </tbody>';
            }
        echo "</table><br />";
   } else echo '<b>'.$Vote['Vote9'].'</b>';
   
   if($numrows > 0){
        echo '
        <span class="clear"></span>
        ';
            
            while($raw = mysql_fetch_array($sql)){
                echo '
                <tbody>
                <tr class="parent-row">
                    <td valign="top" class="align-center" data-raw="20"><span class="icon-frame frame-14 " data-tooltip="'.$account_extra['firstName'].'"><a href="">'.$account_extra['id'].'</a></span></td>
                    <td valign="top" class="align-center" data-raw="20"><a href="http://www.wowhead.com/item='.$raw['ItemID_took'].'">'.$raw['ItemID_took'].'</a></td>
                    <td valign="top" class="align-center" data-raw="20"><span><time datetime="2011-07-02T18:25+00:00">'.$raw['Vote_Date'].'</time></span></td>
                    <td valign="top" class="align-center" data-raw="20"><strong data-service-id="null">'.$raw['Vote_Hour'].'</strong></td>
                    <td valign="top" class="align-center">'.$raw['Costs'].' VP</td>
                    <td valign="top" class="align-center">'.$raw['Points'].'</td>
                    <td valign="top" class="align-center" data-raw="20">'.$raw['Link'].'</td>
                </tr>
                </tbody>';
            }
        echo "</table><br />";
   } else echo '<b>'.$Vote['Vote9'].'</b>';
?>
</div>
</div>
</div>
</div>
<div id="layout-bottom">
<?php include("../functions/footer_man.php"); ?>
</div>
<script src="<?php echo BASE_URL ?>wow/static/js/bam.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/tooltip.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/menu.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/dropdown.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/table.js"></script>
<script type="text/javascript">
//<![CDATA[
Core.load("wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js");
Core.load("wow/static/local-common/js/search.js");
Core.load("wow/static/local-common/js/login.js", false, function() {
if (typeof Login !== 'undefined') {
Login.embeddedUrl = '<?php echo BASE_URL ?>loginframe.php';
}
});
//]]>
</script>
</body>
</html>
