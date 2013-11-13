<?php
include("../configs.php");
	mysql_select_db($server_adb);
	$check_query = mysql_query("SELECT gmlevel from account inner join account_access on account.id = account_access.id where username = '".strtoupper($_SESSION['username'])."'") or die(mysql_error());
    $login = mysql_fetch_assoc($check_query);
	if($login['gmlevel'] < 3)
	{
		die('
<meta http-equiv="refresh" content="2;url=GTFO.php"/>
		');
	}
	
  mysql_select_db($server_db) or die (mysql_error());
  $sql = mysql_query("SELECT id FROM news");
  //PAGINATION BEGIN
  $size=10; 
  $num_r = mysql_num_rows($sql);
  $num_p = ceil($num_r / $size);
  //Look for the number page, if not then first
  if (!isset($_GET['page']) || empty($_GET['page']) || $_GET['page'] < 1) {   //More control for 'go to' textbox
    $page=1;
  } 
  elseif ($_GET['page'] > $num_p){ //If overflow the show last page
    $page = $num_p;
  } 
  else{
    $page = $_GET['page'];  
  }
  $start = ($page - 1) * $size;  //the first result to show
  //PAGINATION END
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
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
		<script type="text/javascript" charset="utf-8">
      $(function(){
        $("input, select").uniform();
      });
    </script>
	<script type="text/javascript">
 $(document).ready(function(){
     $('.ddm').hover(
	   function(){
		 $('.ddl').slideDown();
	   },
	   function(){
		 $('.ddl').slideUp();
	   }
	 );
 });
	</script>
	<script type="text/javascript">
DD_roundies.addRule('#tabsPanel', '5px 5px 5px 5px', true);
	</script>
	<script type="text/javascript">
	$(document).ready(function()
{
   $( '#checkall' ).live( 'click', function() {
				
				$( '.chkl' ).each( function() {
					$( this ).attr( 'checked', $( this ).is( ':checked' ) ? '' : 'checked' );
				}).trigger( 'change' );
 
			});
  $('#checkall').click(function(){

 $('span').toggleClass('checked');
$('#checkall').toggleClass('clicked');

 }); 
	});
	</script>
</head>
<body class="bgc">
	<div id="admin">
    <div id="wrap">
      <div id="head">
        <?php include('header.php'); ?>
      </div>
    <!--Content Start-->
    <div id="content">
		  <img src="images/sepLine.png" alt="" class="sepline" />
    <div class="datalist"> 
	     <div class="heading">
        <h2>Themes</h2>
		<a href="install_Theme.php">Install Theme</a>
        
      </div>
      <div class="pagination">
      
      </div>
     

<?php
$allowedExts = array("zip", "bz2", "tar");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);
if ((($_FILES["file"]["type"] == "application/x-zip-compressed")
|| ($_FILES["file"]["type"] == "application/octet-stream")
|| ($_FILES["file"]["type"] == "application/x-tar"))

&& in_array($extension, $allowedExts))
{
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else
    {

    if (file_exists("theme_upload/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "theme_upload/" . $_FILES["file"]["name"]);
      }
    }
  }
else
  {
  echo "Invalid file";
  }
     $zip = new ZipArchive;
     $res = $zip->open("theme_upload/".$_FILES['file']['name']. "");
     if ($res) {
         $zip->extractTo("../wow/static/Themes/");
         $zip->close();
		 unlink("theme_upload/".$_FILES['file']['name']. "");
$InstallStrips = preg_replace("/\\.[^.\\s]{3,4}$/", "", $_FILES['file']['name']);
$InstallDirectory ="../wow/static/Themes/".$InstallStrips."/install.sql";
$link = mysqli_connect(DBHOST, DBUSER, DBPASS, DB);
$query = file_get_contents($InstallDirectory);
/* execute multi query */
mysqli_query($link,$query);
	echo "<center>".$InstallStrips." Theme Installed Successfully";
	echo "<center><img src='../wow/static/Themes/".$InstallStrips."/preview.png' width='750px'></center>";
			}	
		 else {
         echo 'failed';
     }
  
?>

    </div>


    <img src="images/sepLine.png" alt="" class="sepline" />
             <!--  <div class="messages">
        <div><img src="images/warningIco.png" alt="" />
                  <p>Warning Message, Lorem ipsum dolor sit amet, consectetur adipiscing elit Pellentesque quis.</p>
                </div>
        <div><img src="images/infoIcon.png" alt="" />
                  <p>Information Message, Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
        <div><img src="images/success.png" alt="" />
                  <p>Success Message, Lorem ipsum dolor sit amet, Nam bibendum sagittis lobortis.consectetur.</p>
                </div>
        <div><img src="images/errorIco.png" alt="" />
                  <p>Error Message, Lorem ipsum dolor sit amet, Nam bibendum sagittis lobortis.consectetur.</p>
                </div>
      </div> -->
              <div id="calen">
        <div id="yuicalendar1"></div>
      </div>
            </div>
  </div>
          <div class="push"></div>
        </div>
<?php include("footer.php"); ?>
</body>
</html>
