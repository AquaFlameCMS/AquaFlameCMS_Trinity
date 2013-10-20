<?php
include("configs.php");
$page_cat = "account";
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<title><?php echo $website['title']; ?><?php echo $Log['Log']; ?></title>
<meta http-equiv="imagetoolbar" content="false"/>
<link rel="shortcut icon" href="wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="stylesheet" href="wow/static/local-common/css/common.css?v22"/>
<link rel="shortcut icon" href="wow/static/_themes/bam/img/favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="wow/static/_themes/bam/css/master.css?v1"/>
<link rel="stylesheet" href="wow/static/_themes/bam/css/_lang/en-gb.css?v1"/>
<script src="wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script src="wow/static/local-common/js/core.js?v22"></script>
<script type="text/javascript">
Core.baseUrl = '/login/en/';
</script>
</head>
<body class="en-gb">
<div id="wrapper">
<h1 id="logo"><a href="./"><?php echo $Log['Log1']; ?></a></h1>
<div id="content" class="login">
<div id="left">
<script>
      var targetOrigin = "<?php echo $website['address']; ?>";

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
      <h2><?php echo $Log['Log2']; ?></h2>
  <?php
  
  if(!isset($_SESSION['username'])){
  if(isset($_POST['accountName'])){
    $accountName = mysql_real_escape_string($_POST['accountName']);
    $accountPass = mysql_real_escape_string($_POST['password']);

    $sha_pass_hash = sha1(strtoupper($accountName ) . ":" . strtoupper($accountPass));

    $db_setup = mysql_select_db($server_adb,$connection_setup)or die(mysql_error());
    $login_query = mysql_query("SELECT * FROM account WHERE username = UPPER('".$accountName."') AND sha_pass_hash = CONCAT('".$sha_pass_hash."')");
    $login = mysql_fetch_assoc($login_query);
    if($login&&!empty($accountName)){
      ?>
      <style type="text/css">
      .loader {
        width:24px;
        height:24px;
        background: url("wow/static/images/loaders/canvas-loader.gif") no-repeat;
       }
      </style>
      <center>
      <h3><?php echo $Log['Log3']; ?></h3><br />
      <div class="loader"></div>
     <?php
        $_SESSION['username']=$accountName;
          echo '<meta http-equiv="refresh" content="2;"';
          echo 'Succesfully';
      ?>
      </center>
      <?php
    }else{
      ?>
      <style type="text/css">
      .loader {
        width:24px;
        height:24px;
        background: url("wow/static/images/loaders/canvas-loader.gif") no-repeat;
       }
      </style>
      <center>
      <h3><?php echo $Log['Log5']; ?></h3><br />
      <div class="loader"></div>
      <meta http-equiv="refresh" content="2"/>
      </center>
      <?php
    }
    
    ?>
  <?php }else{ ?>
  <form action="?SSID:<?php echo $sessionid; ?>" method="post">
    <a id="embedded-close" href="javascript:;" onclick="updateParent('close')"> </a>
    <div>
      <p><label for="accountName" class="label"><?php echo $Log['Log6']; ?></label>
      <input id="accountName" value="" name="accountName" maxlength="320" type="text" tabindex="1" class="input" /></p>
      <p><label for="password" class="label"><?php echo $Log['Log7']; ?></label>
      <input id="password" name="password" maxlength="16" type="password" tabindex="2" autocomplete="off" class="input"/></p>
      <p>
        <span id="remember-me">
          <label for="persistLogin">
            <input type="checkbox" checked="checked" name="persistLogin" value="true" id="persistLogin" />
            <?php echo $Log['Log8']; ?>
          </label>
        </span>
        <button class="ui-button button1" type="submit" data-text="<?php echo $Log['Log19']; ?>">
          <span>
            <span><?php echo $Log['Log9']; ?></span>
          </span>
        </button>
      </p>
    </div>
  </form>
  <?php } }else{
    ?>
    <a id="embedded-close" href="javascript:;" onclick="updateParent('close')"> </a>
    <script>
    parent.postMessage("{\"action\":\"success\"}", "<?php echo $website['address']; ?>");
    </script>
    <?php
    echo "<h3><font color='green'>".$Log['Log10']."</font></h3>";
    echo '<meta http-equiv="refresh" content="2;url=account_man.php"';
  } ?>
	  <ul id="help-links">
		  <li class="icon-pass">
			<a href="<?php echo $website['root']; ?>account/recover-pass/"><?php echo $Log['Log11']; ?></a>
		  </li>
			<li class="icon-signup">
			  <?php echo $Log['Log12']; ?><a href="register.php"><?php echo $Log['Log13']; ?></a>!
			</li>
		  <li class="icon-secure">
			<?php echo $Log['Log14']; ?><a href="#"><?php echo $Log['Log15']; ?></a>
		  </li>
	  </ul>
  <br /><br />
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
<div id="right">
<h2><?php echo $Log['Log16']; ?></h2>
<h3><?php echo $Log['Log17']; ?></h3>
<a class="ui-button button1 " href="account_man.php" >
<span>
<span><?php echo $Log['Log18']; ?></span>
</span>
</a>
</div>
<span class="clear"><!-- --></span>
<script type="text/javascript">
$(function() {
$('#accountName').focus();
});
</script>
</div>
<?php include("functions/footer_man.php"); ?>
</body>
</html>
