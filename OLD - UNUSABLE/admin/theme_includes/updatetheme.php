<?php 
include '../../configs.php';
$ID = $_POST['id'];
$con=mysqli_connect(DBHOST,DBUSER,DBPASS,DB);
$resetRows = "UPDATE themes SET active=0 WHERE id <> '$ID'";
$query = "UPDATE themes SET active=1 WHERE id='$ID'";
$result=mysqli_query($con,$query);
$reset=mysqli_query($con,$resetRows);
?>
<meta http-equiv="refresh" content="2;url=../themes.php"/>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AquaFlame CMS Admin Panel</title>
    <link href="font/stylesheet.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
      $(function(){
        $("input").uniform();
		$('.sign').click(function(){
			$('.message').fadeIn();
		})
		$('.message').click(function(){
			$('.message').fadeOut();
		})
      });
    </script>
    <link rel="stylesheet" href="css/uniform.default.css" type="text/css" media="screen" />
    <link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
    </head>

    <body>
<div id="login">
<div id="log-Sup">
<div id="logWrap">
<h1><img src="../../wow/static/images/logos/wof-logo.png" height="21px" width="260px"/><br />
<span>Admin Login Panel</span></h1>

      <br />
      <div id="LogPannel">
      <center><h2>Successfully Updated</h2></center>

      </div>
      
    
    <script type="text/javascript">
      $(function() {
        $("#ssl-trigger").click(function() {
          updateParent('onload', 'height', $(document).height() + 76);
          $("#thawteseal").show();
        });
        
        $("#help-links a").click(function() {
          updateParent('redirect', 'url', this.href);
          return false;
        });

        $('#accountName').focus();

        updateParent('onload', 'height', $(document).height());
Uncaught ReferenceError: updateParent is not defined
      });
    </script>
</div>
  </div>
    </div>
	<?php include("../footer.php"); ?>
  </body>
  </html>


