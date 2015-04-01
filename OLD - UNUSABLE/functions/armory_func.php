<span class="clear"><!-- --></span>
<?php
require ('configs.php');

function mysql_open($serveraddress, $serveruser, $serverpass){
	$conn = mysql_connect($serveraddress, $serveruser, $serverpass) or die(mysql_error());
	return $conn;
}
function mysql_end($resc){
	mysql_close($resc);
}


function translate($race)
{
    $faction = "";
    switch ($race) {
        case "1":
        case "3":
        case "4":
        case "7":
        case "11":
        case "22":
            global $faction;
            $faction = "faction_0.jpg";
            break;
        case "2":
        case "5":
        case "6":
        case "8":
        case "9":
        case "10":
            global $faction;
            $faction = "faction_1.jpg";
            break;
    }
    return $faction;
}

if (isset($_GET['charname'])) {
    $cont = new wowheadparser();
    $conn = mysql_open($serveraddress, $serveruser, $serverpass);
    $sql = "SELECT guid,name,class,level,race,gender FROM `" . $server_cdb .
        "`.`characters` WHERE name='" . mysql_real_escape_string($_GET["charname"]) .
        "'";
		$num_rows = mysql_num_rows($result);
    $result = mysql_query($sql, $conn) or die(mysql_error());
    if ($row = mysql_fetch_array($result)) {
        $items = show_items($row["guid"]);
        $all = array_merge($items);
        $html->load('armory',$all);
    }
    mysql_end($conn);
}

//Get Base stats
function baseStats($charName){
  include ('configs.php');
  
  mysql_select_db($server_cdb,$connection_setup)or die(mysql_error());
  $sql = "SELECT guid,name,class,level,race FROM characters WHERE name='".$charName."'";
  $result = mysql_query($sql) or die(mysql_error());
  $row = mysql_fetch_array($result);
  
  mysql_select_db($server_wdb,$connection_setup)or die(mysql_error());
  $wSql= "SELECT str,agi,sta,inte,spi,basehp as hp, basemana as mana FROM player_levelstats level,
  player_classlevelstats class WHERE level.race='".$row['race']."' AND level.class='".$row['class']."' AND 
  level.level='".$row['level']."' AND class.class='".$row['class']."' AND class.level='".$row['level']."'";
  $result = mysql_query($wSql) or die(mysql_error());
  $baseStats = mysql_fetch_array($result);

  /*Here you have the bases stats
  echo $baseStats['str']; 
  echo $baseStats['agi']; 
  echo $baseStats['sta']; 
  echo $baseStats['inte']; 
  echo $baseStats['spi']; 
  echo $baseStats['hp']; 
  echo $baseStats['mana']; */
}

//More complex function to make it works better
function pagination($current,$num,$term,$type,$next,$prev){
if ($num>1){
  if($current > 1){ echo '<li class="cap-item"><a href="'.$type.'?page='.($current-1).'&search='.$term.'"><span>'.$prev.'</span></a></li>';}
  if ($current==1){ echo '<li class="current"><a><span>1</span></a></li>';}
  else { echo '<li><a href="'.$type.'?page=1&search='.$term.'"><span>1</span></a></li>';}     
  $i=$current-3;
  if ($current+4>$num ){$i=$current+($num-$current)-7;}
  if ($i>2){echo '<li class="expander"><span>...</span></li>';}  
  $count=1;           
  while($count<8 && $i<$num){
    if ($i>1){
      if ($i == $current){ echo '<li class="current"><a><span>'.$i.'</span></a></li>';}
      else { echo '<li><a href="'.$type.'?page='.$i.'&search='.$term.'"><span>'.$i.'</span></a></li>';}
      $count++;
    }
    $i++;
  }
  if ($i < $num ){echo '<li class="expander"><span>...</span></li>';}    
  if ($current==$num){ echo '<li class="current"><a><span>'.$num.'</span></a></li>';}
  else { echo '<li><a href="'.$type.'?page='.$num.'&search='.$term.'"><span>'.$num.'</span></a></li>';}
  if($num>$current){ echo '<li class="cap-item"><a href="'.$type.'?page='.($current+1).'&search='.$term.'"><span>'.$next.'</span></a></li>';}
  }
}

function translateLet($race)
{
    $faction = "";
    switch ($race) {
        case "1":
        case "3":
        case "4":
        case "7":
        case "11":
        case "22":
            global $faction;
            $faction = "0";
            break;
        case "2":
        case "5":
        case "6":
        case "8":
        case "9":
        case "10":
            global $faction;
            $faction = "1";
            break;
    }
    return $faction;
}
?>