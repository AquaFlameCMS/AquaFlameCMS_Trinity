                  <?php 

                  /* You have to set warnings in your PHP Configuration "off", 
                     cause we have to initialize a session if an old one expired.
                     Else you got an error while unsetting or destroying 
                     the unexisting  Session.
                  */

                    if (!isset($_SESSION['username'])) 
                    {
                      $sessionid = @$_SESSION['id'];
                      session_start();
                    }
                    session_unset();
                    session_destroy();
                    $_SESSION = array();
                   ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Flame Admin - Logout</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
  <link rel="shortcut icon" href="../wow/static/local-common/images/wow.png">
  <!---CSS Files-->
  <link rel="stylesheet" href="css/core.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/ui.css">  
  <!---jQuery Files-->
  <script src="js/jquery.js"></script>
  <script src="js/inputs.js"></script>
</head>
<body>
  <div id="wrapper">
    <div id="header">
      <div id="logo"></div>
      <h1>FLAME ADMIN - Logout</h1>
    </div>
								<div id="body">
									<div id="head">
									<span class="icon">K</span>
									<h2>You were logged out! See you later.</h2>
									<meta http-equiv="refresh" content="2;url=index.php"/>
									<br class="clear">
									</div>
									<span id="load">
									<img src="img/load.png"><img src="img/spinner.png" id="spinner">
									</span>
								</div>
	<span id="load">
    <img src="img/load.png"><img src="img/spinner.png" id="spinner">
	</span>
  <!---jQuery Code-->
  <script type='text/javascript'>
    $('#wrapper, .notification, #forgot-psw').hide();
    $('#load').fadeIn(400);
    $(window).load( function() {
      $('#load').fadeOut(400, function() {
        $('#wrapper').fadeIn(600, function() {
          $('#welcome.notification').delay(500).fadeIn(400).loginNotif();
          $('#psw').focus();
        });
      });
    });

    $('#rb-check').flcheck();

    $('#alt-lg-form').validateLogin();

  </script>
</body>
</html>


