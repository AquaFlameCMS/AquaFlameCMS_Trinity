<?php include("configs.php"); ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
 <html lang="en-gb">
  <head>
    <title>World of Warcraft</title>
	<meta name="description" content="<?php echo DESCRIPTION ?>">
	<meta name="keywords" content="<?php echo KEYWORDS ?>">
	<link rel="shortcut icon" href="wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
    <link rel="stylesheet" href="wow/static/local-common/css/common.css?v15"/>
    <link rel="stylesheet" href="wow/static/_themes/bam/css/master.css?v1"/>
    <script src="wow/static/local-common/js/third-party/jquery-1.4.2.min.js?v15"></script>
    <script src="wow/static/local-common/js/core.js?v15"></script>

    <script>
      var targetOrigin = "<?php echo BASE_URL ?>";

      function updateParent(action, key, value) {
        var obj = { action: action };

        if (key) obj[key] = value;

        parent.postMessage(JSON.stringify(obj), targetOrigin);
        return false;
      }

      function checkDefaultValue(input, isPass) {
        if (input.value == input.title)
          input.value = "";

        if (isPass)
          input.type = "password";
      }
    </script>
  </head>
  <body>
    <div id="embedded-login">
      <h2>World of Warcraft - Logging Out</h2>

      <style type="text/css">
      .loader {
        width:24px;
        height:24px;
        background: url("wow/static/images/loaders/canvas-loader.gif") no-repeat;
       }
      </style>
      <br />
      <center>
      <h3>Logging Out</h3><br />
      <div class="loader"></div>
      <?php session_unset(); session_destroy(); ?>
      <meta http-equiv="refresh" content="2;url=index.php"/>
      
      </center>
    
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
  </body>
  </html>


