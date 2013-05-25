<?php
require_once("configs.php");
?>
<html>
<head>
<title><?php echo $website['title']; ?></title>
<link rel="shortcut icon" href="wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="wow/static/local-common/css/common.css?v15"/>
<link rel="stylesheet" type="text/css" href="wow/static/_themes/bam/css/master.css?v1"/>
<script type="text/javascript" src="wow/static/local-common/js/third-party/jquery-1.4.2.min.js?v15"></script>
<script type="text/javascript" src="wow/static/local-common/js/core.js?v15"></script>
<style type="text/css">
.loader {
	width:220px;
	height:17px;
	background: url("wow/static/images/loaders/canvas-loader.gif") no-repeat;
}
</style>
</head>
<body>
<div id="embedded-login">
	<h2><?php echo $website['title']; ?> - Filling Users</h2>
	<br />
	<center>
		<?php
        mysql_select_db($server_adb,$connection_setup)or die(mysql_error());
        $get_acc = mysql_query("SELECT * FROM account ORDER BY id ASC");
		echo'<h3>Filling users...</h3><br />
		<div class="loader"></div><br /><br />';
        while($acc = mysql_fetch_array($get_acc)){
            mysql_select_db($server_db,$connection_setup)or die(mysql_error());
            $select_user = mysql_query("SELECT * FROM users WHERE id = '".$acc['id']."' LIMIT 1");
            if(mysql_num_rows($select_user) > 0){
                echo 'Account <font color="aqua">'.strtolower($acc['username']).'</font> already inserted into users table<br />';
            }else{
                echo '<font color="aqua">'.strtolower($acc['username']).'</font> added!<br />';
                $fill_users = mysql_query("INSERT INTO users(id) VALUES ('".$acc['id']."')");
            }
        }
        echo '<br /><br /><font color="aqua">Everything is Configured! Please rerun to be sure.</font>';
		?>
		<meta http-equiv="refresh" content="8;url=index.php"/>
	</center>
</div>
</body>
</html>