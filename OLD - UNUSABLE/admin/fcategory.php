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

if(isset($_POST['s_new'])){
  mysql_select_db($server_db);
  $info = mysql_fetch_assoc(mysql_query("SELECT num FROM forum_categ ORDER BY num DESC LIMIT 0,1"));
  $categ = mysql_query("INSERT INTO forum_categ (num,name) VALUES ('".($info['num'] + 1)."','".$_POST['new_categ']."')");
  if(!$categ) echo '<div align="center"><font color="red">An error has ocurred, the category could not have been created!</font></div>';
}
elseif(isset($_POST['id_del'])){
  mysql_select_db($server_db);
  $forums = mysql_query("SELECT * FROM forum_forums WHERE categ = '".intval($_POST['id_del'])."'");
  if(mysql_num_rows($forums) > 0) echo '<div align="center"><font color="red">In order to the delete a category it must be empty. You can delete or move the forums on the forum edit panel.</font></div>';  
  else{
    $del = mysql_query("DELETE FROM forum_categ WHERE id = '".intval($_POST['id_del'])."'");
    if($del) echo '<div align="center"><font color="green">The forum category have been deleted!</font></div>';
    else echo '<div align="center"><font color="red">An error has ocurred, the category could not have been deleted!</font></div>';
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
		<script type="text/javascript" src="js/order.js"></script>
		<link href="css/tooltip.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="css/uniform.defaultstyle3.css" type="text/css" media="screen" />
		<script type="text/javascript" charset="utf-8">
      $(function(){
        $("input, select").uniform();
      });
    </script>
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
	<script type="text/javascript">
DD_roundies.addRule('#tabsPanel', '5px 5px 5px 5px', true);
	</script>
	<script type="text/javascript">
	$(document).ready(function()
{
   $( '#checkall' ).live( 'click', function() {
				
				$( '.chkl' ).each( function() {
					$( this ).attr( 'checked', $( this ).is( ':checked' ) ? '' : 'checked' );
				}).trigger( 'change' );
 
			});
  $('#checkall').click(function(){

 $('span').toggleClass('checked');
$('#checkall').toggleClass('clicked');

 }); 
	});
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
			<div class="datalist">
	     <div class="heading">
        <h2>Forum Categorys</h2>
        <form method="post" action="" class="pagination">
          <input type="text" class="pag" name="new_categ" value="New Category" style="margin: 20px 0 0 29px;width:auto;height:auto;background-color:#FFF;font-size:18px;" onfocus="if(this.value=='New Category'){this.value=''}" onblur="if(this.value==''){this.value='New Category'}"/>
          <button type="submit" name="s_new" value="Add">Add Category</button>
        </form>
      </div><div id="moveTable">
      <table>
        <thead>
        <tr>   
          <th class="edit"><strong>Manage</strong></th> 
          <th class="edit"><strong>Delete</strong></th>   
          <th class="title"><strong>Name</strong></th>
          <th class="desc"><strong>Forums</strong></th>
          <th class="inc"><strong>Nº Forums</strong></th>
          <th class="inc"><strong>Up / Down</strong></th>
        </tr>
        </thead>
        <tbody>
      <?php
      mysql_select_db($server_db) or die (mysql_error());
      $sql_categ = mysql_query("SELECT * FROM forum_categ ORDER BY num");
      $i = 0;
      while ($row = mysql_fetch_assoc($sql_categ)){
      $i++;
      $forums = mysql_query("SELECT * FROM forum_forums WHERE categ = '".$row['id']."' ORDER BY num ASC");
      echo'
        <tr>  
          <td class="edit">
            <a href="forums.php?id='.$row['id'].'"><img src="images/editIco.png" alt="" /></a>
          </td>
          <td class="inc">
            <form method="post" action="">
              <input type="hidden" name="id_del" value="'.$row['id'].'" />
              <input type="image" name="s_del" src="images/deletIco.png" alt="Del" />
            </form>
          </td>
          <td class="title">'.$row['name'].'</td>
          <td class="desc">';
            $f_list = '';
            while($forum = mysql_fetch_assoc($forums)){
              if(strlen($f_list) > 1) $f_list = $f_list.', ';
              
              if($forum['locked'] == '1') $f_list = $f_list.'<strong style=color:red;>'.$forum['name'].'</strong>';
              else $f_list = $f_list.'<strong style=color:green;>'.$forum['name'].'</strong>';
            }
              if (strlen(strip_tags($f_list)) > 60){
                echo'<span rel="tooltip" title="'.$f_list.'">'.substr(strip_tags($f_list),0,60).'...</span>';}
              else{ echo $f_list;}
      echo'</td>
          <td class="inc">'.mysql_num_rows($forums).'</td>
          <td class="inc">';
          if($i > 1) echo'<a href="javascript:;" onclick=move("'.$row['id'].'","up","categ");><div class="arrow-up"></div></a>';
          if($i < mysql_num_rows($sql_categ)) echo '<a href="javascript:;" onclick="move(&#39;'.$row['id'].'&#39;,&#39;down&#39;,&#39;categ&#39;);"><div class="arrow-down"></div></a>';
          '</td>       
        </tr>'; 
      }       
        
      ?> 
        </tbody>
      </table></div>
    </div>
    <img src="images/sepLine.png" alt="" class="sepline" />
              <div id="calen">
        <div id="yuicalendar1"></div>
      </div>
            </div>
  </div>
          <div class="push"></div>
        </div>
<?php include("footer.php"); ?>
</body>
</html>