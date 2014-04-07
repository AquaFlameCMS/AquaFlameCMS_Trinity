<?php
include("../configs.php");
ini_set("default_charset", "iso-8859-1" );    //For special chars

	mysql_select_db($server_adb);
	$check_query = mysql_query("SELECT account.id,gmlevel from account  inner join account_access on account.id = account_access.id where username = '".strtoupper($_SESSION['username'])."'") or die(mysql_error());
    $login = mysql_fetch_assoc($check_query);
	if($login['gmlevel'] < 3)
	{
		die('<meta http-equiv="refresh" content="2;url=GTFO.php"/>');
	}
  
  if (isset($_POST['save'])){
    $server = mysql_real_escape_string($_POST['server']);
    $name = mysql_real_escape_string($_POST['name']);
    $item = mysql_real_escape_string($_POST['item']);
    $price = mysql_real_escape_string($_POST['price']);

    $emptyPrice = strip_tags($price);
    if (empty($emptyPrice)){
      echo '<font color="red">You have to write something!</font>';
    }else{
      mysql_select_db($server_db);
      $save_new = mysql_query("INSERT INTO rewards (server, name, item, price) VALUES ('".$server."','".$name."','".$item."','".$price."');") or die(mysql_error());
      if ($save_new == true){
        echo '<div class="alert-page" align="center" style="background-color: #26A2FE"><font color="#fff">The item has been created successfully!</font></div>';
        echo '<meta http-equiv="refresh" content="3;url=dashboard.php"/>';
      }
      else{
        echo '<div class="errors" align="center"><font color="red"> An ERROR has occured while saving the post in the database!</font></div>';
      }
    }
  }
?>      

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
		<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
		<title>AquaFlame CMS Admin Panel</title>
		<link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
		<link href="font/stylesheet.css" rel="stylesheet" type="text/css" media="all" />
		<script src="js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/tooltip.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/DD_roundies_0.0.2a-min.js"></script>
		<script src="js/script-carasoul.js"></script>
		<link href="css/tooltip.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/uniform.defaultstyle3.css" type="text/css" media="screen" />
    <script src="js/jquery-1.4.4.js"</script>
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
    <script src="js/DD_roundies_0.0.2a-min.js"></script>
    <script type="text/javascript">
DD_roundies.addRule('#tabsPanel', '5px 5px 5px 5px', true);

</script>
    <script src="js/script-carasoul.js"></script>
    <script src="js/jquery.uniform.js"</script>
    <script type="text/javascript">
      $(function(){
        $("input, select, button").uniform();
      });
    </script>
    <link rel="stylesheet" href="css/uniform.defaultstyle2.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/jquery.cleditor.css" />
    <script </script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#input").cleditor(
			{
				width:        900, // width not including margins, borders or padding
                height:       250, // height not including margins, borders or padding
			}
							 );
      });
//This functions to work the pop-up image select
function pop(action){
  var frm_element = document.getElementById('pop');
  var vis = frm_element.style;
  if (action=='open')
  {
    vis.display = 'block';               //show/hidde the image select pop-up
    frm_element.focus();
  }
  else if(action == 'blur'){
    if(document.activeElement.name != 'pop'){
      vis.display = 'none';
    }
  }
  else
  {
      vis.display = 'none';
  }
}
function changeVal(val){
  var  frm_element = document.getElementById('image'); //change the image input box value
  frm_element.value = val;                            //And the preview image
  var imgL = document.getElementById('imgLoad');
  imgL.style.display = '';
  imgL.src = '../wow/static/images/news/' + val + '.jpg';
}

function preview(img,event){
  var div = document.getElementById('preview');      //To show preview image
  div = div.style;
  var imgP = document.getElementById('imgP');
  if (event == 'on'){
    div.display = 'block';
    imgP.src= img;
  }
  else{
    div.display = 'none';
  }
  }
</script>
</head>
<body class="bgc">
	<div id="admin">
    <div id="wrap">
      <div id="head">
        <?php include('header.php'); ?>
      </div>
    <!--Content Start-->
    <div id="content">
      <div class="forms">
        <div class="heading">
          <h2>Add Items</h2>
          <form class="search" method="get" action="#">
            <input name="search" type="text" value="search" onfocus="if(this.value=='search')this.value=''" onblur="if(this.value=='')this.value='search'" />
            <input name="" type="submit" value="" />
          </form>
        </div>
        <h3>Shop AquaFlameCMS</h3>
        <form method="post" action="" class="styleForm">
            <p>Server ID<br />
             <input name="server" id="server" type="text" value="Enter Server Id" class="reg" onfocus="if(this.value=='Enter Server Id')this.value=''" onblur="if(this.value=='')this.value='Enter Server Id'" />
            </p>
            <p>Name Item<br />
             <input name="name" id="name" type="text" value="Enter Name" class="reg" onfocus="if(this.value=='Enter Name')this.value=''" onblur="if(this.value=='')this.value='Enter Name'" />
            </p>
            <p>Item Id<br />
            <input id="item" name="item" type="text" value="" class="reg" onfocus="if(this.value=='Enter id item')this.value=''" onblur="if(this.value=='')this.value='Enter id item'" />
            </p>
            <p>Price<br />
            <input id="price" name="price" type="text" value="" class="reg" onfocus="if(this.value=='Enter Price')this.value=''" onblur="if(this.value=='')this.value='Enter Price'" />
            </p>
          <input name="save" type="submit" value="Save Changes" />
          <input name="reset" type="reset" value="Cancel" />
        </form>
      </div>
    </div>
  </div>
  <div class="push"></div>
</div>
<?php include("footer.php"); ?>
</body>
