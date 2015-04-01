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
    
  if (isset($_GET['sort']) == 'type'){    //Order by...
    $order = ' type ASC, ';
  }
  elseif(isset($_GET['sort']) == 'title'){
    $order = ' title ASC, ';
  }
  elseif(isset($_GET['sort']) == 'author'){
    $order = ' author ASC, ';
  }
  else{
    $order = '';
  }
  //MEDIA TYPES VIEW **** Types: 0-video, 1-screen,2-wall,3-art,4-comic
  if (isset($_GET['type'])=='0' || isset($_GET['type'])=='1' || isset($_GET['type'])=='2' || isset($_GET['type'])=='3' || isset($_GET['type'])=='4'){
    $type = " AND type = '".isset($_GET['type'])."' ";
  }else{
    $type = ''; //If not defined type or type all then show all media types
  }
  
  mysql_select_db($server_db) or die (mysql_error());
  $sql = mysql_query("SELECT * FROM media WHERE visible = '0' ".$type);

  //PAGINATION BEGIN
  $size=10; 
  $num_r = mysql_num_rows($sql);
  $num_p = ceil($num_r / $size);
  //Look for the number page, if not then first
  if (!isset($_GET['page']) || empty($_GET['page']) || $_GET['page'] < 1) {   //More control for 'go to' textbox
    $page=1;
  } 
  elseif ($_GET['page'] > $num_p){ //If overflow the show last page
    $page = $num_p;
  } 
  else{
    $page = $_GET['page'];  
  }
  $start = ($page - 1) * $size;  //the first result to show
  //PAGINATION END
  
  $sql_string = "SELECT * FROM media WHERE visible = '0' ".$type." ORDER BY ".$order." date DESC LIMIT $start,$size";  
  $sql_query = mysql_query($sql_string); //add limit for pagination work
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
        <h2>Manage Media</h2>
        <form method="get" action="">
          <select name="sort" onchange="submit(this.form)">
            <option value="" <?php if(!isset($_GET['sort'])){echo 'selected="selected"';} ?>>Sort by</option>
            <option value="date" <?php if($_GET['sort']=='date'){echo 'selected="selected"';} ?>>Date</option>
            <option value="type" <?php if($_GET['sort']=='type'){echo 'selected="selected"';} ?>>Type</option>
            <option value="title" <?php if($_GET['sort']=='title'){echo 'selected="selected"';} ?>>Title</option>
            <option value="author" <?php if($_GET['sort']=='author'){echo 'selected="selected"';} ?>>Author</option>
          </select>
          <select name="type" onchange="submit(this.form)">
            <option value="all" <?php if(!isset($_GET['type']) || $_GET['type']=='all'){echo 'selected="selected"';} ?>>All</option>
            <option value="0" <?php if($_GET['type']=='0'){echo 'selected="selected"';} ?>>Videos</option>
            <option value="1" <?php if($_GET['type']=='1'){echo 'selected="selected"';} ?>>Wallpapers</option>
            <option value="2" <?php if($_GET['type']=='2'){echo 'selected="selected"';} ?>>Screen</option>
            <option value="3" <?php if($_GET['type']=='3'){echo 'selected="selected"';} ?>>Art</option>
            <option value="3" <?php if($_GET['type']=='4'){echo 'selected="selected"';} ?>>Comic</option>
          </select>
        </form>
      </div>
      <div class="pagination">
      <?php
      if ($num_p > 1){
         if ($page > 1){echo '<a href="mediaun.php?page='.($page-1).'" style="color:#43ACFB;text-decoration:none;">Prev. </a>|';}
         if ($page > 2){echo '<a href="mediaun.php?page=1" style="color:#43ACFB;text-decoration:none;"> 1 </a>...';}
         echo $page;
         if ($page < $num_p-1){echo '...<a href="mediaun.php?page='.$num_p.'" style="color:#43ACFB;text-decoration:none;"> '.$num_p.' </a>';}
         if ($page < $num_p){echo '|<a href="mediaun.php?page='.($page+1).'" style="color:#43ACFB;text-decoration:none;"> Next</a>';}
         echo'
        <form method="get" action="">
          <input type="hidden" name="sort" value="'.$_GET['sort'].'">
          <input type="hidden" name="type" value="'.$_GET['type'].'">
          <input type="text" name="page" maxlength="4" class="pag"/>
          <input type="submit" value="Go">
        </form>'; 
      }
      ?> 
      </div>
      <table>
        <thead>
        <tr>  
          <th class="chk"><input type="checkbox" /></th>   
          <th class="edit"><strong>Approve/Delete</strong></th>   
          <th class="title"><strong>Title</strong></th>
          <th class="desc"><strong>Description</strong></th>
          <th class="inc"><strong>Author</strong></th>
          <th class="inc"><strong>Date</strong></th>
          <th class="inc"><strong>Type</strong></th>
        </tr>
        </thead>
        <tbody>
      <?php
      while ($row = mysql_fetch_assoc($sql_query)){
      $author = mysql_fetch_assoc(mysql_query("SELECT username FROM ".$server_adb.".account WHERE id = '".$row['author']."'"));
      echo'
        <tr>
          <td class="chk"><input type="checkbox" /></td>   
          <td class="edit">
            <a href="media_man.php?id='.$row['id'].'&action=add"><img src="images/addIco.png" alt="" /></a>
            <a href="mediadelete.php?id='.$row['id'].'"><img src="images/deletIco.png" alt="" /></a>
          </td>
          <td class="title"><a href="'.$row['link'].'" target="_blank">'.$row['title'].'</a></td>
          <td class="desc">';
              if (strlen($row['description']) > 60){
                echo'<span rel="tooltip" title="<strong>'.$row['description'].'</strong>">'.strip_tags(substr($row['description'],0,60)).'...</span>';}
              else{ echo strip_tags($row['description']);}
      echo'</td>
          <td class="inc">'.$author['username'].' ('.$row['author'].')</td> 
          <td class="inc">'.date('d-m-Y', strtotime($row['date'])).'</td> 
          <td class="inc">';
      if ($row['type'] == '0'){echo 'Video';}
      elseif ($row['type'] == '1'){echo 'Wallpaper';}
      elseif ($row['type'] == '2'){echo 'Screenshot';}
      elseif ($row['type'] == '3'){echo 'ArtWork';}
      elseif ($row['type'] == '4'){echo 'Comic';}    
      echo' </td>         
        </tr>';  
      }       
        
      ?>
        </tbody>
      </table>
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
