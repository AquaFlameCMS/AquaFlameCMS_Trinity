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

<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>AquaFlame CMS Admin Panel</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
    <link href="font/stylesheet.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquery-1.4.4.js" type="text/javascript" charset="utf-8"></script>
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
    <script type="text/javascript" src="js/DD_roundies_0.0.2a-min.js"></script>
    <script type="text/javascript">
DD_roundies.addRule('#tabsPanel', '5px 5px 5px 5px', true);

</script>
    <script type="text/javascript" src="js/script-carasoul.js"></script>
    <script src="js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
      $(function(){
        $("input, select, button").uniform();
      });
    </script>
    <link rel="stylesheet" href="css/uniform.defaultstyle2.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/jquery.cleditor.css" />
    <script type="text/javascript" src="js/jquery.cleditor.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#input").cleditor(
			{
				width:        900, // width not including margins, borders or padding
                height:       250, // height not including margins, borders or padding
			}
							 );
      });
    </script>
    </head>

    <body class="bgc">
<div id="admin">
      <div id="wrap">
    <div id="head">
          <h1><img src="../wow/static/images/logos/wof-logo.png" height="21px" width="260px"/><br />
        <span>Admin Login Panel</span></h1>
          <ul id="menu">
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="">Styles</a></li>
        <li><a href="forms.php">Forms</a></li>
        <li><a href="#">Table Data</a></li>
        <li class="ddm"><a>Multi-Level Menu</a>
              <ul class="ddl">
            <li><a href="#">Multi-Level Menu</a></li>
            <li><a href="#">Documentation</a></li>
            <li><a href="#">FAQ'S</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
            </li>
      </ul>
          <ul id="tablist">
        <li><a href="#a"><span>Dashboard Links</span></a></li>
        <li><a href="#b"><span>Other Functions</span></a></li>
      </ul>
          <div id="tabsPanel">
        <div id="a" class="tab_content">
              <div class='carousel_container'>
            <div class='left_scroll'><img src='images/leftArrow.png' alt="" /></div>
            <div class='carousel_inner'>
                  <ul class='carousel_ul'>
                <li><a class="ico1" href='#'></a></li>
                <li><a class="ico2" href='#'></a></li>
                <li><a class="ico3" href='#'></a></li>
                <li><a class="ico4" href='#'></a></li>
                <li><a class="ico5" href='#'></a></li>
                <li><a class="ico6" href='#'></a></li>
                <li><a class="ico7" href='#'></a></li>
                <li><a class="ico8" href='#'></a></li>
                <li><a class="ico9" href='#'></a></li>
              </ul>
                </div>
				<div class='right_scroll'><img src='images/rightArrow.png' alt="" /></div>
          </div>
            </div>
        <div id="b" class="tab_content">
              <div class='carousel_container'>
            <div class='left_scroll2'><img src='images/leftArrow.png' alt="" /></div>
            <div class='carousel_inner'>
                  <ul class='carousel_ul2'>
                <li><a class="ico1" href='#'></a></li>
                <li><a class="ico2" href='#'></a></li>
                <li><a class="ico3" href='#'></a></li>
                <li><a class="ico4" href='#'></a></li>
                <li><a class="ico5" href='#'></a></li>
                <li><a class="ico6" href='#'></a></li>
                <li><a class="ico7" href='#'></a></li>
                <li><a class="ico8" href='#'></a></li>
                <li><a class="ico9" href='#'></a></li>
              </ul>
                </div>
            <div class='right_scroll2'><img src='images/rightArrow.png' alt="" /></div>
          </div>
            </div></div> <img src="images/shadow.png" class="shadow" alt="" /> </div>
			<div id="content">
          <div class="forms">
        <div class="heading">
              <h2><a href="#">Edit News</a> > NAME OF NEWS</h2>
            </div>
        <form method="post" action="#" class="styleForm">
              <p>Title<br />
            <input name="Enter Title" type="text" value="Enter Title" class="med" onfocus="if(this.value=='Enter Title')this.value=''" onblur="if(this.value=='')this.value='Enter Title'" />
          </p>
              <p>Content<br />
            <textarea name="content" cols="" rows="" onfocus="if(this.value=='Enter Content')this.value=''" onblur="if(this.value=='')this.value='Enter Content'">Enter Content</textarea>
</p>
              <input name="save" type="submit" value="Save Changes" />
              <input name="save" type="reset" value="Cancel" />
            </form>
      </div>
        </div>
  </div>
      <div class="push"></div>
    </div>
<?php include("footer.php"); ?>
</body>
</html>