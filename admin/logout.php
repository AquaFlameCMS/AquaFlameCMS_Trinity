<?php include("../configs.php"); ?>
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
	<style type="text/css">
      .loaderleft {
	    margin-top:-25px;
	    margin-left:383px;
        width:25px;
        height:25px;
        background: url("../wow/static/images/loaders/canvas-loader.gif") no-repeat;
       }
	   .loaderright {
	    margin-left:3px;
        width:25px;
        height:25px;
        background: url("../wow/static/images/loaders/canvas-loader.gif") no-repeat;
       }
      </style>
    <link rel="stylesheet" href="css/uniform.default.css" type="text/css" media="screen" />
    <link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
    </head>

    <body>
<div id="login">
<div id="log-Sup">
<div id="logWrap">
<h1><img src="../wow/static/images/logos/wof-logo.png" height="21px" width="260px"/><br />
<span>Admin Login Panel</span></h1>

      <br />
      <div id="LogPannel">
      <center><h2>Logging Out</h2></center>
      <div class="loaderright"></div>
	  <div class="loaderleft"></div>
      <?php session_unset(); session_destroy(); ?>
      <meta http-equiv="refresh" content="2;url=index.php"/>
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
      });
    </script>
</div>
  </div>
    </div>
	<?php include("footer.php"); ?>
  </body>
  </html>


