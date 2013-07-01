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
		  
      <div class="messages">
      <?php
        if(isset($_GET['id']) && isset($_GET['action'])){
          mysql_select_db($server_db);
          if ($_GET['action'] == 'add'){
            $sql = mysql_query("UPDATE media SET visible='1' WHERE id = '".mysql_real_escape_string($_GET['id'])."'");
          }                                      //We could set get_action to 0/1 and set it on the sql query
          elseif($_GET['action'] == 'un'){
            $sql = mysql_query("UPDATE media SET visible='0' WHERE id = '".mysql_real_escape_string($_GET['id'])."'");  
          }
        }
        if($sql == true && $_GET['action'] == 'add'){
          echo '
            <div><img src="images/success.png" alt="" />
              <p>The media file has been approved succesfully! Now it will be visible for all users.</p>
            </div>';
        }
        elseif($sql == true && $_GET['action'] == 'un'){
          echo '
            <div><img src="images/success.png" alt="" />
              <p>The media file has been unapproved! Now it will be not visible.</p>
            </div>';
        }
        else{
          echo'
            <div align="center"><img src="images/errorIco.png" alt="" />
              <p>An error has ocurred while approving/unpproving the media file</p>
            </div>';
        }
        echo '<meta http-equiv="refresh" content="1;url='.$_SERVER['HTTP_REFERER'].'"/>';
      ?>
      </div>
    </div>
  </div>
</div>
<?php include("footer.php"); ?>
</body>
</html>