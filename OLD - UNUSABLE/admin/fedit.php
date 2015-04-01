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
  
if(isset($_POST['s_categ'])){
  mysql_select_db($server_db);
  $info = mysql_fetch_assoc(mysql_query("SELECT num FROM forum_forums WHERE categ = '".intval($_POST['f_categ'])."' ORDER BY num DESC LIMIT 0,1"));
  $change = mysql_query("UPDATE forum_forums SET categ = '".intval($_POST['f_categ'])."', num = '".($info['num'] + 1)."' WHERE id = '".intval($_POST['f_id'])."'");
  if($change) echo '<div align="center"><font color="green">The forum category has been changed</font></div>';
  else echo '<div align="center"><font color="red">An error has ocurred, the category could not been changed!</font></div>'; 
}
elseif(isset($_POST['save'])){
  $image = $_POST['f_image'];
  $name =   htmlentities($_POST['f_name']);
  $desc =  htmlentities($_POST['f_desc']);
  mysql_select_db($server_db);
  $change = mysql_query("UPDATE forum_forums SET image = '".$image."', name = '".$name."', description = '".$desc."' WHERE id = '".intval($_POST['f_id'])."'");
  if($change) echo '<div align="center"><font color="green">The changes have been saved!</font></div>';
  else echo '<div align="center"><font color="red">An error has ocurred, the changes could not been saved!</font></div>'; 
}
elseif(isset($_POST['s_delete'])){
  $option = $_POST['f_delete'];
  if($option == 'del_all'){           
  
    mysql_select_db($server_db);
    $threads = mysql_query("SELECT * FROM forum_threads WHERE forumid = '".intval($_POST['f_id'])."'"); //get all topics info
    $replies = mysql_query("SELECT * FROM forum_replies WHERE forumid = '".intval($_POST['f_id'])."'"); //get all replies info
    
    while($reply = mysql_fetch_assoc($replies)){
      $del_post = mysql_query("DELETE FROM forum_posts WHERE postid = '".$reply['id']."' AND type = '2'"); //delete info from forum_posts
      $del_blizz = mysql_query("DELETE FROM forum_blizzposts WHERE postid = '".$reply['id']."' AND type = 'reply'"); //info from forum_blizzposts
    }
    if($del_post && $del_blizz) $del_replies = mysql_query("DELETE FROM forum_replies WHERE forumid = '".intval($_POST['f_id'])."'"); //delete replies 
    
    while(($topic = mysql_fetch_assoc($threads)) && $del_replies){
      $del_post = mysql_query("DELETE FROM forum_posts WHERE postid = '".$topic['id']."' AND type = '1'"); //delete info from forum_posts
      $del_blizz = mysql_query("DELETE FROM forum_blizzposts WHERE postid = '".$topic['id']."' AND type = 'thread'"); //info from forum_blizzposts
    }
    if($del_post && $del_blizz) $del_threads = mysql_query("DELETE FROM forum_threads WHERE forumid = '".intval($_POST['f_id'])."'"); //delete topics      
    
    if($del_threads || mysql_num_rows($threads) < 1) $delete = mysql_query("DELETE FROM forum_forums WHERE id = '".intval($_POST['f_id'])."'"); 
    
    if($delete) die ('<div align="center"><font color="green">The forum has been deleted. All the threads have been deleted too!</font></div><meta http-equiv="refresh" content="3;url=fcategory.php"/>');
    else echo '<div align="center"><font color="red">An error has ocurred, the forum could not been deleted!</font></div>'; 
  
  }
  else{
    mysql_select_db($server_db);
    $delete = mysql_query("DELETE FROM forum_forums WHERE id = '".intval($_POST['f_id'])."'"); 
    if($delete) $change = mysql_query("UPDATE forum_threads SET forumid = '".$option."' WHERE forumid = '".intval($_POST['f_id'])."'");
    if($change) die ('<div align="center"><font color="green">The forum has been deleted. All the threads have been moved!</font></div><meta http-equiv="refresh" content="3;url=fcategory.php"/>');
    else echo '<div align="center"><font color="red">An error has ocurred, the forum could not been deleted!</font></div>'; 
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
    <script type="text/javascript" src="js/DD_roundies_0.0.2a-min.js"></script>
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
            $forum = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_forums WHERE id = '".intval($_GET['id'])."'"));
            $categ = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_categ WHERE id = '".$forum['categ']."'"));
            $all_categ = mysql_query("SELECT * FROM forum_categ ORDER BY num ASC");
            $all_forum = mysql_query("SELECT * FROM forum_forums ORDER BY categ ASC,num ASC");
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
        <form method="post" action="" class="styleForm">
        <input type="hidden" value="<?php echo $forum['id']; ?>" name="f_id">
        <table width="100%" class="table-content">
          <tr>
            <td width="50%"><p><strong>Locked: </strong><?php if($forum['locked']==1) echo '<font color="red">YES</font>'; else echo '<font color="green">NO</font>';?></p></td>
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
                <button type="submit" name="s_categ">Change</button>
              </p>
            </td>
          </tr>
          <tr><td>
          <div class="folder">
          <p><strong>Image: </strong><a href="javascript:;" onclick="pop('open');">
          <img id="imgLoad" src="../images/forum/forumicons/<?php echo $forum['image']; ?>.gif" alt="<?php echo $forum['image']; ?>" style="vertical-align:middle;"/></a>
          <input type="hidden" name="f_image" id="image" value="<?php echo $forum['image']; ?>">  
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
                  echo "<td><a name='pop' onclick=changeVal('".$nombre."');pop('close');>
                  <img src='$pathimagen' width='38px' border='0' ></a></td>";  //Clik on it and the name appear on the textbox
                  echo "</tr>";
                }
                ?>
                </table>
              </div>
            </div>
          </p></div>
          </td>
          <td><p><strong>Delete Forum: </strong>
            <select name="f_delete" id="delete">
            <option value="del_all" selected="selected">Delete all threads</option>
            <?php
              while($op = mysql_fetch_assoc($all_forum)){
                if($op['categ'] != $last_categ) echo '<optgroup label="Move to '.$array_categ[$op['categ']].'">';
                echo'<option value="'.$op['id'].'" name="'.$op['name'].'" id="op_del'.$op['id'].'">'.$op['name'].'</option>';
                $last_categ = $op['categ'];
              }
              ?>
            </select> 
            <button type="submit" name="s_delete" onclick="return confirm_del();">Delete</button>
          </p></td></tr>
          <tr><td><p><strong>Name: </strong>
          <input type="text" name="f_name" value="<?php echo $forum['name']; ?>" class="reg" /></p></td>
          <td></td></tr>
          <tr><td><p><strong>Description: </strong><br />
          <textarea name="f_desc" class="reg" style="width:450px;"/><?php echo $forum['description']; ?></textarea></p></td>
          <td></td></tr>
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