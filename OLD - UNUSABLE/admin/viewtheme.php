
<?php
include("../configs.php");

	mysql_select_db($server_adb);
	$check_query = mysql_query("SELECT account.id,gmlevel from account  inner join account_access on account.id = account_access.id where username = '".strtoupper($_SESSION['username'])."'") or die(mysql_error());
    $login = mysql_fetch_assoc($check_query);
	if($login['gmlevel'] < 3)
	{
		die('
<meta http-equiv="refresh" content="2;url=GTFO.php"/>
		');
	}

$con=mysqli_connect(DBHOST,DBUSER,DBPASS,DB);
	$query= "SELECT * FROM themes WHERE id= " .$_GET['id'] . "";
	$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result))
	{
		$theme_name=$row['name'];
		$description=$row['description'];
		$CSS_Link=$row['css_link'];
  		$Dev_Team=$row['development_crew'];
		$Authored_By=$row['author'];
		$Release_Date=$row['creation_date'];
		$vs_info=$row['vs_info'];
		$ID=$row['id'];	
}
  ?>

  

<script type="text/javascript" language="javascript" src="theme_includes/lytebox.js"></script>
<link rel="stylesheet" href="theme_includes/lytebox.css" type="text/css" media="screen" />
<html>
<head>
    <meta charset="utf-8">
<head>
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
		<title>AquaFlame CMS Admin Panel</title>
		<link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
		<link href="font/stylesheet.css" rel="stylesheet" type="text/css" media="all" />
		<script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/tooltip.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" src="js/DD_roundies_0.0.2a-min.js"></script>
		<script type="text/javascript" src="js/script-carasoul.js"></script>
		<link href="css/tooltip.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/uniform.defaultstyle3.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="theme_includes/style.css" type="text/css">
    <link rel="stylesheet" href="css/uniform.defaultstyle2.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/jquery.cleditor.css" />
</head>
<body class="bgc">
	<div id="admin">
    <div id="wrap">
      <div id="head">
        <?php include('header.php'); ?>
      </div>
    <!--Content Start-->
    <div id="content">
      <div class="forms">
        <div class="heading">
	
         <h2><?php echo $Dev_Team; ?></h2>

<form name="themeapply" action="theme_includes/updatetheme.php" method="post">
<input type="hidden" id="id" name="id" value="<?php echo $ID; ?>">


</form>
<div class="dev_logo" onclick="document.themeapply.submit()"></div>
        <div class="tabs"><a href="#" class="tabbed">Test</a></div></div>
        <h3><?php echo $theme_name; ?></h3>


              <div class="note">

<?php
$custom_index="../wow/static/Themes/".$CSS_Link."/custom_description.php";
if (file_exists($custom_index)) {
	include "../wow/static/Themes/".$CSS_Link."/custom_description.php";
	}
else {
echo $description;
}
?>
<div class="image_preview">
<?php
$preview_image="../wow/static/Themes/".$CSS_Link."/preview.png";
if (file_exists($preview_image)) {

echo '<img src="../wow/static/Themes/'.$CSS_Link.'/preview.png" width="400px"><br />
		<a href="../wow/static/Themes/'.$CSS_Link.'/preview.png" class="lytebox" data-title"Preview">Click To Enlarge</a>
              </div>';


}
else {

echo "No Preview Available
	</div>";
}
?>
</div>
<div id="se-push">
</div>
Author:<br />
<?php
echo $Authored_By;
?>
<br /><br />
Release Date:
<?php
echo $Release_Date;
?>
 <div class="vs_info">Version Info:
Version <?php echo $vs_info; ?>
<br />
<?php include "../wow/static/Themes/".$CSS_Link."/update.php"; ?>
</div>

      </div>
    </div>
  </div>
  <div class="push"></div>
</div>
<?php include("footer.php"); ?>
</body>
