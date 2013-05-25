<?php
  include("../configs.php");
  ini_set("default_charset", "iso-8859-1" );
  $id = intval($_GET['id']);
  $move = $_GET['move'];
  $type = $_GET['t'];

if($type == 'categ'){   //Updates and change innerHtml for change order in forum categorys    
  mysql_select_db($server_db);
  $info = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_categ WHERE id = '".$id."'"));
  
  if($move == 'up'){
    $info_move = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_categ WHERE num < '".$info['num']."' ORDER BY num DESC LIMIT 0,1"));
  }elseif($move == 'down'){
    $info_move = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_categ WHERE num > '".$info['num']."' ORDER BY num ASC LIMIT 0,1"));
  }
  
  $update = mysql_query("UPDATE forum_categ SET num = '".$info_move['num']."' WHERE id = '".$info['id']."'"); 
  $update_up = mysql_query("UPDATE forum_categ SET num = '".$info['num']."' WHERE id = '".$info_move['id']."'");  
  

$sql_categ = mysql_query("SELECT * FROM forum_categ ORDER BY num");
$i = 0;   
echo '<table>
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
        <tbody>'; 
while ($row = mysql_fetch_assoc($sql_categ)){
$i++;
  $forums = mysql_query("SELECT * FROM forum_forums WHERE categ = '".$row['id']."'");
  echo'
    <tr> 
      <td class="edit">
        <a href="forums.php?id='.$row['id'].'"><img src="images/editIco.png" alt="" /></a>
      </td>
      <td class="inc">
        <form method="post" action="">
          <input type="hidde" name="id_del" value="'.$row['id'].'" />
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
          if($i < mysql_num_rows($sql_categ)) echo '<a href="javascript:;" onclick=move("'.$row['id'].'","down","categ");><div class="arrow-down"></div></a>';
          '</td>       
        </tr>'; 
  }
  echo '</tbody></table>';
}
elseif($type == 'forum'){   //Updates and change innerHtml for change order in forums
  mysql_select_db($server_db);
  $info = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_forums WHERE id = '".$id."'"));
  
  if($move == 'up'){
    $info_move = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_forums WHERE num < '".$info['num']."' AND categ = '".$info['categ']."' ORDER BY num DESC LIMIT 0,1"));
  }elseif($move == 'down'){
    $info_move = mysql_fetch_assoc(mysql_query("SELECT * FROM forum_forums WHERE num > '".$info['num']."' AND categ = '".$info['categ']."' ORDER BY num ASC LIMIT 0,1"));
  }
  
  $update = mysql_query("UPDATE forum_forums SET num = '".$info_move['num']."' WHERE id = '".$info['id']."'"); 
  $update_up = mysql_query("UPDATE forum_forums SET num = '".$info['num']."' WHERE id = '".$info_move['id']."'"); 

  $sql_forum = mysql_query("SELECT * FROM forum_forums WHERE categ = '".$info['categ']."' ORDER BY num ASC");
  $i = 0;
  echo '<table>
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
        <tbody>';
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
          $number_t = mysql_fetch_assoc(mysql_query("SELECT COUNT(id) as count FROM forum_threads WHERE forumid = '".$row['id']."'"));
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
  echo '</tbody></table>';
}                   
?>