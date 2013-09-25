<?php
  include("../configs.php");
  mysql_select_db($server_adb);
  $check_query = mysql_query("SELECT gmlevel from account inner join account_access on account.id = account_access.id where username = '".strtoupper($_SESSION['username'])."'") or die(mysql_error());
  $login = mysql_fetch_assoc($check_query);
  if($login['gmlevel'] < 3)
  {
    die('<meta http-equiv="refresh" content="0;url=wrong.php"/>');
  }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Flame Admin - PROCESSING</title>
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
      <h1>FLAME ADMIN - Process</h1>
    </div>
                <div id="body">
                  <div id="head">
                  <span class="icon">K</span>
                  <h2>Your order is being processed.<br></h2>
                  <?php
    $media = mysql_fetch_assoc(mysql_query("SELECT * FROM media WHERE id = '".mysql_real_escape_string($_GET['id'])."'"));
        if(isset($_GET['id']) && isset($_GET['action'])){
          mysql_select_db($server_db);
          if ($_GET['action'] == 'add'){
            $sql = mysql_query("UPDATE media SET visible='1' WHERE id = '".mysql_real_escape_string($_GET['id'])."'");
          }                                      //We could set get_action to 0/1 and set it on the sql query
          elseif($_GET['action'] == 'un'){
            $sql = mysql_query("UPDATE media SET visible='0' WHERE id = '".mysql_real_escape_string($_GET['id'])."'");  
          }
          elseif($_GET['action'] == 'del'){
            $sql = mysql_query("DELETE FROM media WHERE id = '".mysql_real_escape_string($_GET['id'])."'");
            $sql_c = mysql_query("DELETE FROM media_comments WHERE id = '".mysql_real_escape_string($_GET['id'])."'");
          }
          elseif($_GET['action'] == 'ndel'){
            $sql = mysql_query("DELETE FROM news WHERE id = '".mysql_real_escape_string($_GET['id'])."'");
            $sql_c = mysql_query("DELETE FROM comments WHERE newsid = '".mysql_real_escape_string($_GET['id'])."'");
          }
          elseif($_GET['action'] == 'fpdel'){
            $sql = mysql_query("DELETE FROM forum_posts WHERE postid = '".mysql_real_escape_string($_GET['id'])."'");
            $sql_a = mysql_query("DELETE FROM forum_threads WHERE id = '".mysql_real_escape_string($_GET['id'])."'");
            $getinfo = mysql_query("SELECT * FROM forum_blizzposts where postid ='".mysql_real_escape_string($_GET['id'])."'");
            if($getinfo == 0)
            {
            $sql_b = mysql_query("DELETE FROM forum_blizzposts WHERE postid = '".mysql_real_escape_string($_GET['id'])."'");
            }
            else
            {}
            $getsecinfo = mysql_query("SELECT * FROM forum_replies WHERE threadid = '".mysql_real_escape_string($_GET['id'])."'");
            if($getsecinfo == 0)
            {
            $sql_c = mysql_query("DELETE FROM forum_replies WHERE threadid = '".mysql_real_escape_string($_GET['id'])."'");
            }
            else
            {}
          }
          elseif($_GET['action'] == 'fcdel'){
            $sql = mysql_query("SELECT * FROM forum_forums WHERE categ = '".mysql_real_escape_string($_GET['cat'])."'");
            if($sql != $_GET['id'])
            {
              echo '<meta http-equiv="refresh" content="1;url=forum.php?act=1"/>';
            }
          }
        }
        if($sql == true && $_GET['action'] == 'add'){
          echo '<meta http-equiv="refresh" content="1;url=media.php?act=1"/>';
        }
        elseif($sql == true && $_GET['action'] == 'un'){
          echo '<meta http-equiv="refresh" content="1;url=media.php?act=2"/>';
        }
        elseif($sql == true && $_GET['action'] == 'del' && $sql_c == true){
          $del = unlink('../images/wallpapers/'.$media['id_url']);
          echo '<meta http-equiv="refresh" content="1;url=media.php?act=3"/>';
        }
        elseif($sql == true && $_GET['action'] == 'fpdel' && $sql_a == true){
          echo '<meta http-equiv="refresh" content="1;url=forum.php?act=1"/>';
        }
        elseif($sql == true && $_GET['action'] == 'fcdel'){
          echo '<meta http-equiv="refresh" content="1;url=forum.php?act=2"/>';
        }
        elseif($sql == true && $_GET['action'] == 'ndel' && $sql_c == true){
          echo '<meta http-equiv="refresh" content="1;url=news.php?act=1"/>';
        }
        elseif($_GET['action'] == 'add' || $_GET['action'] == 'un' || $_GET['action'] == 'del'){
          echo '<meta http-equiv="refresh" content="1;url=media.php?act=4"/>';
        }
        elseif($_GET['action'] == 'fpdel'  || $_GET['action'] == 'fcdel'){
          echo '<meta http-equiv="refresh" content="1;url=media.php?act=4"/>';
        }
        else{
          echo '<meta http-equiv="refresh" content="1;url=media.php?act=4"/>';
        }
      ?>
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
      $('#load').fadeOut(200, function() {
        $('#wrapper').fadeIn(600, function() {
          $('#welcome.notification').delay(500).fadeIn(4000).loginNotif();
          $('#psw').focus();
        });
      });
    });

    $('#rb-check').flcheck();

    $('#alt-lg-form').validateLogin();

  </script>
</body>
</html>
