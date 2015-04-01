<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Flame Admin - Error 403</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
  <link rel="shortcut icon" href="../wow/static/local-common/images/wow.png">
  <!---CSS Files-->
  <link rel="stylesheet" href="css/core.css">
  <link rel="stylesheet" href="css/ui.css">
  <link rel="stylesheet" href="css/style.css">
  <!---jQuery Files-->
  <script src="js/jquery.js"></script>
  <script src="js/functions.js"></script>
  <script src="js/inputs.js"></script>
</head>
<body>

  <div id="wrapper">

    <div class="err-cont">

      <div class="error-head">
        <div id="logo"></div>
        <h1>ERROR</h1>
      </div>

    <h1 class="error-nr">403</h1>

    <p class="error-msg">Forbidden.</p>
    <p class="error-desc">
      You don't have permission to access this page. <br>
      A group of heavily armed security enforcers with ski masks <br>
      will arrive at your address shortly to administer due punishment.
    </p>
    <meta http-equiv="refresh" content="3;url=index.php"/>

    </div>

  </div><!--END WRAPPER-->

  <span id="load">
    <img src="img/load.png"><img src="img/spinner.png" id="spinner">
  </span>

  <!---jQuery Code-->
  <script type='text/javascript'>

    // LOAD FUNCTIONS

    $.fn.loadfns();

    if (document.referrer != '') $('.error-act a').attr('href', document.referrer);

  </script>
</body>
</html>

