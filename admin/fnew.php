<?php
include("../configs.php");

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
  $path = "../images/forum/forumicons/";       //The images path
  $dir = opendir($path);   //Open path
  $img_total=0;
  while ($elemento = readdir($dir))   //read content
  {
    if (substr($elemento, strlen($elemento)-4,4)=='.gif') //if a valid picture then show it
    {
      $img_array[$img_total]=$elemento;    //Save the pictures in array
      $img_total++;
    }
  } 
  //End image pop-up

if(isset($_POST['save'])){
  if (isset($_POST['f_locked'])) $lock = '1';
  else $lock = '0';   
  mysql_select_db($server_db);
  $info = mysql_fetch_assoc(mysql_query("SELECT num FROM forum_forums WHERE categ = '".intval($_POST['f_categ'])."' ORDER BY num DESC LIMIT 0,1"));
  if($info['num'] < 1) $info['num'] = '1';
  $new = mysql_query("INSERT INTO forum_forums (num,categ,name,image,description,locked) VALUES ('".$info['num']."','".intval($_POST['f_categ'])."','".$_POST['f_name']."','".$_POST['f_image']."','".htmlentities($_POST['f_desc'])."','".$lock."')");
  if($new) echo '<div align="center"><font color="green">The forum has been created!</font></div><meta http-equiv="refresh" content="2;url=forums.php?id='.intval($_POST['f_categ']).'"/>';
  else echo '<div align="center"><font color="red">An error has ocurred, the forum could not has been created!</font></div>';     
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
		<script type="text/javascript" src="js/DD_roundies_0.0.2a-min.js"></script>
		<script type="text/javascript" src="js/script-carasoul.js"></script>
		<link href="css/tooltip.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/uniform.defaultstyle3.css" type="text/css" media="screen" />
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
    <script src="js/DD_roundies_0.0.2a-min.js"></script>
    <script type="text/javascript">
DD_roundies.addRule('#tabsPanel', '5px 5px 5px 5px', true);

</script>
    <script src="js/script-carasoul.js"></script>
    <script src="js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
      $(function(){
        $("input, select, button").uniform();
      });
    </script>
    <link rel="stylesheet" href="css/uniform.defaultstyle2.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/jquery.cleditor.css" />
    <script src="js/jquery.cleditor.js"></script>
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
<script type="text/javascript">
function confirm_del(){
  var option = document.getElementById("delete");
  option = option.value;
  if (option == "del_all"){
    var text = "YOU WILL LOSE ALL THE THREADS!";
  }else{
    var op_del = document.getElementById("op_del"+option);
    op_del = op_del.getAttribute("name");
    var text = "All the threads will be moved to "+op_del+" forum!";
  }
  var answer = confirm("Are you sure you want to delete this forum? \n" + text);
  if (!answer){
    return false;
  }  
}
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
  imgL.src = '../images/forum/forumicons/' + val + '.gif';
}
function trim(str, chars) {
	return ltrim(rtrim(str, chars), chars);
}
 
function ltrim(str, chars) {
	chars = chars || "\\s";
	return str.replace(new RegExp("^[" + chars + "]+", "g"), "");
}
 
function rtrim(str, chars) {
	chars = chars || "\\s";
	return str.replace(new RegExp("[" + chars + "]+$", "g"), "");
}
function validateF(){
  var error = false;
  if(trim(document.forms["newF"]["f_desc"].value) == ""){
    document.getElementById("error_desc").innerHTML = "<font color='red'>Forum Description can't be empty!</font>";
    error = true;
  }
  if(document.forms["newF"]["f_name"].value == "Enter Name" || trim(document.forms["newF"]["f_name"].value) == ""){
    document.getElementById("error_name").innerHTML = "<font color='red'>You must write a valid Forum Name!</font>";
    error = true;
  }
  if(error == true){
    return false;
  }else{
    return true;
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
          <?php
            mysql_select_db($server_db);
            $categ = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_categ WHERE id = '".intval($_GET['id'])."'"));
            $all_categ = mysql_query("SELECT * FROM forum_categ ORDER BY num ASC");
          ?>
          <style>
            div.selector{
              top: -8px;
              float:none;
            }
          </style>
          <h2>Edit Forums</h2>
        </div>
        <h3>Forum Information: 
        <?php 
          if($forum['locked'] == '1'){
            echo '<font color="red">'.$forum['name'].'</font>';
          }else{
            echo '<font color="green">'.$forum['name'].'</font>';
          }
        ?></h3>
        <form method="post" action="" class="styleForm" id="newF" onsubmit="return validateF();">
        <table width="100%" class="table-content">
          <tr>
            <td width="50%"><p><strong>Locked: </strong>
            <style>
            div.checker{
              margin-top: -5px;
            }
            </style>
            <input type="checkbox" name="f_locked" onchange="if(this.checked){document.getElementById('is_lock').innerHTML = '<font color=red>YES</font>';}else{document.getElementById('is_lock').innerHTML = '<font color=green>NO</font>';}"/>
            <span id="is_lock"><font color=green>NO</font></span></p>
            </td>
            <td>
              <p>
                <strong>Category: </strong>
                <select name="f_categ">
                <?php
                  $array_categ = array();
                  while($op = mysql_fetch_assoc($all_categ)){
                    $array_categ[$op['id']] =$op['name'];
                    if($op['id'] == $categ['id']) echo'<option value="'.$op['id'].'" selected="selected">'.$op['name'].'</option>'; 
                    else echo'<option value="'.$op['id'].'">'.$op['name'].'</option>';
                  }
                ?>
                </select> 
              </p>
            </td>
          </tr>
          <tr><td>
          <div class="folder">
          <p><strong>Image: </strong><a href="javascript:;" onclick="pop('open');">
          <img id="imgLoad" src="../images/forum/forumicons/blizzard.gif" alt="<?php echo $forum['image']; ?>" style="vertical-align:middle;"/></a>
          <input type="hidden" name="f_image" id="image" value="blizzard">  
            <div  class="pop-image" id="pop" name="pop" onblur="pop('blur');" tabindex="1" style="width:80px;height:300px;left:80px;">
              <div class="note">
                <table border=0>
                <?php
                for ($i=0;$i<$img_total; $i++)      //show images in table
                {
                  $imagen = $img_array[$i];
                  $pathimagen=$path.$imagen;
                  $nombre = substr($imagen, 0,strlen($imagen)-4);
                  echo "<tr>"; // para empezar una nueva linea
                  echo "<td><a href='javascript:;' name='pop' onclick=changeVal('".$nombre."');pop('close');>
                  <img src='$pathimagen' width='38px' border='0' ></a></td>";  //Clik on it and the name appear on the textbox
                  echo "</tr>";
                }
                ?>
                </table>
              </div>
            </div>
          </p></div>
          </td>
          <td></td></tr>
          <tr><td><p><strong>Name: </strong>
          <input type="text" name="f_name" value="Enter Name" class="reg" onfocus="document.getElementById('error_name').innerHTML='';if(this.value=='Enter Name')this.value=''" onblur="if(this.value=='')this.value='Enter Name'"/></p></td>
          <td><div id="error_name"></div></td></tr>
          <tr><td><p><strong>Description: </strong><br />
          <textarea name="f_desc" class="reg" style="width:450px;" onfocus="document.getElementById('error_desc').innerHTML='';"/><?php echo $forum['description']; ?></textarea></p></td>
          <td><div id="error_desc"></div></td></tr>
          <tr><td align="center"><p><button type="submit" name="save">Save Changes</button>
          <a href="forums.php?id=<?php echo $categ['id']; ?>"><button type="reset" name="cancel">Cancel</button></a></p></td>
          <td></td></tr>
        </table>
        </form></div>
    </div>
  </div>
  <div class="push"></div>
</div>
<?php include("footer.php"); ?>
</body>