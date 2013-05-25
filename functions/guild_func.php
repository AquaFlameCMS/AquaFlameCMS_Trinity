<?php
require ('configs.php');

function mysql_open($serveraddress, $serveruser, $serverpass){
	$conn = mysql_connect($serveraddress, $serveruser, $serverpass) or die(mysql_error());
	return $conn;
}
function mysql_end($resc){
	mysql_close($resc);
}

if (isset($_GET['guildname'])) {
    $cont = new wowheadparser();
    $conn = mysql_open($serveraddress, $serveruser, $serverpass);
    $sql = "SELECT guildid,name,level FROM `" . $server_cdb .
        "`.`guild` WHERE name='" . mysql_real_escape_string($_GET["guildname"]) .
        "'";
    $result = mysql_query($sql, $conn) or die(mysql_error());
    if ($row = mysql_fetch_array($result)) {
        $items = show_items($row["guildid"]);
        $all = array_merge($items);
        $html->load('armory',$all);
    }
    mysql_end($conn);
} elseif (empty($_POST['search'])) {
    
} elseif (isset($_POST['search'])) {
    
    $term = $_POST['search'];
    $conn = mysql_open($serveraddress, $serveruser, $serverpass);
    $sql = "SELECT guildid,name,level FROM `" . $server_cdb .
        "`.`guild` WHERE name LIKE '%" . mysql_real_escape_string($term) . "%'";
		$result = mysql_query($sql, $conn) or die(mysql_error());
    while ($row = mysql_fetch_array($result)) {
        //echo $row['name'];
        echo '
		<tbody>
					<tr class="row1">
	<td>
	<a href="" class="item-link color-c9">
	<span class="icon-frame frame-18">
	<img src="images/postavatar.jpg" alt="" width="18" height="18" />
	</span>
	
	<strong><a href="guild.php?name='.$row["name"].'">'.$row["name"].'</a></strong>
	</a>
	</td>
	<td>'.$name_realm1['realm'].'</td>
	<td class="align-center"><span class="icon-frame " data-tooltip="">
	<img src="wow/static/images/loaders/thumbnail-loader.gif" width="15" height="15" alt="" />
	</span></td>
	<td class="align-center">'.@$row2["faction"].'</td>
	<td class="align-center">'.@$row["level"].'</td>
	</tr></tbody>';
    }
    
    mysql_end($conn);
}

?>