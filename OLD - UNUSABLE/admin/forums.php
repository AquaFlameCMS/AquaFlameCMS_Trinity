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

if(isset($_POST['change_name'])){
  $name = mysql_real_escape_string(trim($_POST['newName']));
  if(strlen($name) > 2){
    mysql_select_db($server_db);
    $change = mysql_query("UPDATE forum_categ SET name = '".$name."' WHERE id = '".intval($_POST['name_id'])."'")or die(mysql_error());
    if($change){
      echo '<meta http-equiv="refresh" content="0;url=fcategory.php"/>';
    }
  }
}
elseif(isset($_POST['lock_id'])){
  mysql_select_db($server_db);
  $lock = mysql_query("UPDATE forum_forums SET locked = ((locked + 1) % 2) WHERE id = '".intval($_POST['lock_id'])."'")or die(mysql_error());  
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
		<script src="js/jquery.min.js"</script>
		<script src="js/jquery.uniform.js"</script>
		<script src="js/tooltip.js"</script>
		<script src="js/DD_roundies_0.0.2a-min.js"></script>
		<script src="js/script-carasoul.js"></script>
		<script src="js/order.js"></script>
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
      <?php
      mysql_select_db($server_db);
      $categ = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_categ WHERE id = '".intval($_GET['id'])."'"));
      ?> 
        <h2>
          <form method="post" action="" class="pagination">
            <input type="hidden" name="name_id" value="<?php echo intval($_GET['id']); ?>" />
            <input type="text" class="pag" name="newName" value="<?php echo $categ['name']; ?>" style="width:auto;height:auto;background-color:#FFF;font-size:18px;" />
            <button type="submit" name="change_name" value="Submit Name">Submit Name</button>
          </form>
        </h2>
        <div style="float:right;margin: 30px 20px 0 0px;"><a href="fnew.php?id=<?php echo intval($_GET['id']); ?>"><button type="submit" name="f_new" value="New Forum">New Forum</button></a></div>
      </div>
      <div id="moveTable">
      <table>
        <thead>
        <tr>  
          <th class="edit"><strong>Edit</strong></th>
          <th></th>   
          <th class="title"><strong>Name</strong></th>
          <th class="desc"><strong>Description</strong></th>
          <th class="inc"><strong>Topics</strong></th>
          <th class="inc"><strong>Lock/Unlock</strong></th>
          <th class="inc"><strong>Up / Down</strong></th>
        </tr>
        </thead>
        <tbody>
      <?php
      mysql_select_db($server_db);
      $sql_forum = mysql_query("SELECT * FROM forum_forums WHERE categ = '".intval($_GET['id'])."' ORDER BY num ASC");
      $i = 0;
      while ($row = mysql_fetch_assoc($sql_forum)){
      $i++;
      echo'
        <tr>
          <td class="edit">
            <a href="fedit.php?id='.$row['id'].'"><img src="images/editIco.png" alt="" /></a>
          </td>
          <td><img src="../images/forum/forumicons/'.$row['image'].'.gif" alt="" /></td>
          <td class="title">';
          if($row['locked'] == '1'){
            echo '<font color="red">'.$row['name'].'</font>';
            $lock_ico = 'nlockIco.gif';
          }else{
            echo '<font color="green">'.$row['name'].'</font>';
            $lock_ico = 'lockIco.gif';
          }
          echo '</td>
          <td class="desc">';          
              if (strlen(strip_tags($row['description'])) > 60){
                echo'<span rel="tooltip" title="<strong>'.$row['description'].'</strong>">'.substr(strip_tags($row['description']),0,60).'...</span>';}
              else{ echo $row['description'];}
      echo'</td>
          <td>';
          $number_t = mysql_fetch_assoc(mysql_query("SELECT COUNT(*) as count FROM forum_threads WHERE forumid = '".$row['id']."'"));
      echo $number_t['count'].'</td>
          <td class="inc">
            <form method="post" action="">
              <input type="hidden" name="lock_id" value="'.$row['id'].'" />
              <input type="image" name="lock" src="images/'.$lock_ico.'" alt="Lock" />
            </form>
          </td> 
          <td class="inc">';
          if($i > 1) echo'<a href="javascript:;" onclick=move("'.$row['id'].'","up","forum");><div class="arrow-up"></div></a>';
          if($i < mysql_num_rows($sql_forum)) echo '<a href="javascript:;" onclick=move("'.$row['id'].'","down","forum");><div class="arrow-down"></div></a>';
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