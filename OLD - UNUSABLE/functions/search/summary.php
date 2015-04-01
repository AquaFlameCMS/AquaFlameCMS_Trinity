<?php
if (isset($_GET['search']) && !empty($_GET['search'])) {    //Here starts the search
    $error=false;
    
    $term = strip_tags(htmlentities(htmlspecialchars($_GET['search'])));  //Get the term search
    
    $conn = mysql_open($serveraddress, $serveruser, $serverpass);              //connect to DB
    $sqlc = "SELECT guid,level,name,race,class,gender FROM `" . $server_cdb .
        "`.`characters` WHERE name LIKE '%" . mysql_real_escape_string($term) . "%'";    //Get searchs for characters    
    $sqlg = "SELECT guildid FROM `" . $server_cdb .
        "`.`guild` WHERE name LIKE '%" . mysql_real_escape_string($term) . "%'";       //Searchs for guilds    
    $sqla = "SELECT arenaTeamId FROM `" . $server_cdb .
        "`.`arena_team` WHERE name LIKE '%" . mysql_real_escape_string($term) . "%'";  //Searchs for arena
    $sqlf = "SELECT id FROM `" . $server_db ."`.`forum_threads` WHERE name LIKE '" . mysql_real_escape_string($term) . "' OR 
        name LIKE '% " . mysql_real_escape_string($term) . " %' OR name LIKE '" . mysql_real_escape_string($term) . " %' OR 
        name LIKE '% " . mysql_real_escape_string($term) . "'"; 
        //Searchs for forum threads, search the exactly word, at begining, at end or in the middle
    $num_char = mysql_num_rows(mysql_query($sqlc,$conn));    //Get number of matchs for the menu
    $num_guild = mysql_num_rows(mysql_query($sqlg,$conn));
    $num_arena = mysql_num_rows(mysql_query($sqla,$conn));
    $num_forum = mysql_num_rows(mysql_query($sqlf,$conn));
    $total = $num_char+$num_guild+$num_arena+$num_forum; //To know if show no results found
      
}
if (empty($_GET['search'])){
  $error=true;
$no_results='<div class="no-results"><h3 class="subheader">'.$search['again'].'</h3>           
  <h3 class="category">'.$search['sugg'].'</h3>
  <ul><li>'.$search['sugg1'].'</li><li>'.$search['sugg2'].'</li><li>'.$search['sugg3'].'</li></ul></div>';     //Echo for empty search
}
elseif ($total < 1){
  $error=true;
$no_results='<div class="no-results"><h3 class="subheader">'.$search['noResults1'].'<span>'.$term.'</span>'.$search['noResults2'].'</h3>           
  <h3 class="category">'.$search['sugg'].'</h3>
  <ul><li>'.$search['sugg1'].'</li><li>'.$search['sugg2'].'</li><li>'.$search['sugg3'].'</li></ul></div>';     //Echo for no results found
}
?>