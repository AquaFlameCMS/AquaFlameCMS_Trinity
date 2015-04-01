<?php
include("../configs.php");
ini_set("default_charset", "iso-8859-1" );    //For special chars

	mysql_select_db($server_adb);
	$check_query = mysql_query("SELECT account.id,gmlevel from account  inner join account_access on account.id = account_access.id where username = '".strtoupper($_SESSION['username'])."'") or die(mysql_error());
    $login = mysql_fetch_assoc($check_query);
	if($login['gmlevel'] < 3)
	{
		die('
<meta http-equiv="refresh" content="2;url=GTFO.php"/>
		');
	}
  //To show the images pop-up
  $path = "../wow/static/images/news/";       //The images path
  $dir = opendir($path);   //Open path
  $img_total=0;
  while ($elemento = readdir($dir))   //read content
  {
    if (substr($elemento, strlen($elemento)-11,11)=='_header.jpg') //if a valid picture then show it
    {
      $img_array[$img_total]=$elemento;    //Save the pictures in array
      $img_total++;
    }
  } 
  //End image pop-up
  
  if (isset($_POST['save'])){
    $title = mysql_real_escape_string($_POST['title']);
    $image = mysql_real_escape_string($_POST['image']);
    $content = $_POST['content'];
    $content = trim($content);
    $date = date ("Y-m-d H:i:s", time()); 

    $emptyContent = strip_tags($content);
    if (empty($emptyContent)){                          //Check if content is empty, title will never be empty
      echo '<font color="red">You have to write something!</font>';
    }else{
      mysql_select_db($server_db);
      $save_new = mysql_query("INSERT INTO news (author, date, content, title, image) VALUES ('".$login['id']."','".$date."','".addslashes($content)."','".$title."','".$image."');") or die(mysql_error());
      if ($save_new == true){
        echo '<div class="alert-page" align="center"> The new has been created successfully!</div>';
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
          <h2>Write News</h2>
          <form class="search" method="get" action="#">
            <input name="search" type="text" value="search" onfocus="if(this.value=='search')this.value=''" onblur="if(this.value=='')this.value='search'" />
            <input name="" type="submit" value="" />
          </form>
        </div>
        <h3>Head</h3>
        <form method="post" action="" class="styleForm">
          <p>Title<br />
            <input name="title" id="title" type="text" value="Enter Title" class="reg" onfocus="if(this.value=='Enter Title')this.value=''" onblur="if(this.value=='')this.value='Enter Title'" />
          </p> 
          <div class="folder">
            <p>Image<br />
            <input id="image" name="image" type="text" value="" class="reg" onfocus="pop('open');" />
            </p>
            <img src="" id="imgLoad" style="display:none;"/>
            <div  class="pop-image" id="pop" name="pop" onblur="pop('blur');" tabindex="1">
              <div class="note">
                <table border=0>
                <?php
                for ($i=0;$i<$img_total; $i++)      //show images in table
                {
                  $imagen = $img_array[$i];
                  $pathimagen=$path.$imagen;
                  $nombre = substr($imagen,0,strlen($imagen)-11); //get the name for the db
                  echo "<tr>"; // para empezar una nueva linea
                  echo "<td><a href='javascript:;' name='pop' onclick=changeVal('".$nombre."');pop('close');>
                  <img src='$pathimagen' width='160px' border=0 onmouseover=preview('".$pathimagen."','on'); onmouseout=preview('".$pathimagen."','out');></a></td>";  //Clik on it and the name appear on the textbox
                  echo "</tr>";
                }
                ?>
                </table>
              </div>
            </div>
            <div  id="preview" style="display:none; float:right; position:absolute;left:450px;top:-50px;">
              <img src="../wow/static/images/news/staff.jpg" alt="img" id="imgP" />   
            </div>   
          </div>
          
          <h3>Content</h3>
          <div class="txt">
            <textarea id="input" name="content"></textarea>
          </div>
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
