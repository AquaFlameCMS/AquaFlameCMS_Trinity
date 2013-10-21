<?php
$page="loginframe.php";
include("configs.php");
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
 <html lang="en-gb">
  <head>
		<title></title>
		<link rel="shortcut icon" href="wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
		<link rel="stylesheet" href="wow/static/login/static/local-common/css/common.css?v22"/>
		<link rel="stylesheet" href="wow/static/login/static/_themes/bam/css/master.css?v1"/>
		<script src="wow/static/login/static/local-common/js/third-party/jquery.js"></script>
		<script src="wow/static/login/static/local-common/js/core.js?v22"></script>
		<style type="text/css">
		.wuaha {
		text-shadow:0px 0px 6px #000;
			}

		.wuaha2 {
			text-shadow:0px 0px 10px #444;
			}
		</style>
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
	<center><a href="#" height="46" width="190"><img src="<?php echo $website['root'];?>wow/static/images/logos/wof-logo.png" /></a>
    <br /><h2 class="wuaha2"><?php echo $website['title']; ?></h2></center>
	<a id="embedded-close" href="javascript:;" onclick="updateParent('close')"> </a>
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
      <p><h3>Success</h3></p>
	  <h3>Loading&#8230;</h3><br />
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
      <h3>Your Credentials are Incorrect.</h3><br />
      <div class="loader"></div>
      <meta http-equiv="refresh" content="2"/>
      </center>
      <?php
    }
    
    ?>
    
  <?php }else{ ?>
  <form action="?SSID:<?php echo @$sessionid; ?>" method="post">
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

        <input type="hidden" name="app" value="com-sc2"/>

        <button class="ui-button button1" type="submit" data-text="<?php echo $Log['Log3']; ?>">
          <span>
            <span><?php echo $Log['Log9']; ?></span>
          </span>
        </button>
      </p>
    </div>
  </form>
  <?php } }else{
    ?>
    <script>
    parent.postMessage("{\"action\":\"success\"}", "<?php echo $website['address']; ?>");
    </script>
    <?php
    echo "<h3><font color='green'>".$Log['Log10']."</font></h3>";
    
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
	</form>
    </div>
  </body>
  </html>
