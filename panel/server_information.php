<div class="sidebar-module " id="sidebar-sotd" style="">
<div class="sidebar-title">
<h3 class="category title-sotd"><a href="<?php echo BASE_URL ?>game/status/"><?php echo $Status['StatRealms']; ?></a></h3></div>
    <div class="text-area-2" style="font-size:12px">
		<?php echo $Ind['Ind5']; ?><font color='#FF0000'><?php echo $website['realm']; ?></font>
	</div>
    <div class="text-area-2"><?php echo $Ind['Ind7']; ?>
		<span class="date text-area-2">
			<?php
			$server_adb = DBAUTH;
			$acct_sql = mysql_query("SELECT COUNT(*) FROM $server_adb.account");
			$acc = mysql_result($acct_sql,0,0);
			echo ("<font color='#FF0000'>$acc</font>");
			?>
			<?php echo $Ind['Ind8']; ?>
		</span>
	</div>
</div>
<?php

$type = array(
	0 => 'PvE',
	1 => 'PvP',
	4 => 'PvE',
	6 => 'RP',
	8 => 'RP-PVP',
	16 => 'FFA_PVP',
);
		
$timezone = array(
	1 => 'Development',
	2 => 'United States',
	3 => 'Oceanic',
	4 => 'Latin America',
	5 => 'Tournament',
	6 => 'Korea',
	7 => 'Tournament',
	8 => 'English',
	9 => 'German',
	10 => 'French',
	11 => 'Spanish',
	12 => 'Russian',
	13 => 'Tournament',
	14 => 'Taiwan',
	15 => 'Tournament',
	16 => 'China',
	17 => 'CN1',
	18 => 'CN2',
	19 => 'CN3',
	20 => 'CN4',
	21 => 'CN5',
	22 => 'CN6',
	23 => 'CN7',
	24 => 'CN8',
	25 => 'Tournament',
	26 => 'Test Server',
	27 => 'Tournament',
	28 => 'QA Server',
	29 => 'CN9',
);
		
$population = array(
	0 => 'Low',
	1 => 'Medium',
	2 => 'High',
	3 => 'New Players',
	4 => 'New'
);
$server_cdb = DBCHARS;
function getPlayers($server_cdb) {
return mysql_num_rows(mysql_query("SELECT 1 FROM $server_cdb.characters WHERE online = '1'"));
}

function doFaction($server_cdb,$a) {
	$query = @mysql_query("SELECT race FROM $server_cdb.characters WHERE online = '1'");
	$i = 0;
	while($r = @mysql_fetch_array($query)) {
		$race = $r['race'];
		if(in_array($race,$a)) {
			$i++;
		}
	}
	return $i;
}

function percent($a,$t) {
	$count1 = $a / $t;
	$count2 = $count1 * 100;
	$count = number_format($count2, 0);
	return $count;
}

function barWidth($a,$b,$t) {
	if(($a == 0) && ($b == 0)) {
		$count2 = "136.5";
	}
	else {
		$count1 = $a / $b;
		$count2 = $count1 * $t;
	}
	return $count2;
}

$get_realms = mysql_query("SELECT * FROM $server_adb.realmlist");
while($realm = mysql_fetch_array($get_realms)){
    $host = $realm['address'];
    $world_port = $realm['port'];
    $world = @fsockopen($host, $world_port, $err, $errstr, 2);
    
    $realm_config = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE realmid = '".$realm['id']."'"));
    $server_cdb = $realm_config['char_db'];
    $server_wdb = $realm_config['world_db'];
?>
<div class="realm-panel">
    	<div id="sidebar-marketing" class="sidebar-module">
        	<div style="font-size:18px; color:#FEF092">
        	  <h3 class="title-bnet-ads">
                <table width="300">
            	    <tr>
                        <td width="208"><?php echo $realm['name']; ?></td>
                        
                        <td width="79" align="left">
                            <?php
                    	 	if (!$world) echo"<font color=red size=2>OFFLINE</font><img src=\"./wow/static/images/icons/down.png\">"; 
                    	 	else echo "<font color=#00FF00 size=2>ONLINE</font><img src=\"./wow/static/images/icons/up.png\">";
                    	  	?>
                        </td>
                    </tr>
                </table>
        	  </h3>
        	</div>
    	   <span class="clear"><!-- --></span>
    	
        	<?php
        	$sql = mysql_query ("SELECT * FROM $server_adb.`uptime` WHERE `realmid` = '".$realm['id']."' ORDER BY `starttime` DESC LIMIT 1");  
        	$uptime_results = mysql_fetch_array($sql);    
        	
        	if($uptime_results['uptime'] > 2592000) $uptime =  round(($uptime_results['uptime'] / 30 / 24 / 60 / 60),2)."".$Status['Months']."";
        	elseif($uptime_results['uptime'] > 86400) $uptime =  round(($uptime_results['uptime'] / 24 / 60 / 60),2)."".$Status['Days']."";
        	elseif($uptime_results['uptime'] > 3600) $uptime =  round(($uptime_results['uptime'] / 60 / 60),2)."".$Status['Hours']."";
        	else $uptime =  round(($uptime_results['uptime'] / 60),2)."".$Status['Min']."";
        		
        		if (!$world) echo "<font color=red><b>".$Status['Uptime:']."</b></font> <span class='date text-area-2'>0 ".$Status['Min']."</span> <br>";
        		else echo "<font color='#00FF00'><b>".$Status['Uptime:']."</b></font> <span class='date text-area-2'>$uptime</span> <br>";	
        	?>
    	
    	<div class="sidebar-module text-area-2" id="sidebar">
        	<table width="300">
        	  <tr><td width="208" height="18">
        	<?php echo $Ind['Ind6']; ?><span class="date text-area-2"><?php echo $realm_config['version']; ?></span></td>
            <td width="80" align="left">
            <?php echo $Status['Tipe']; ?><span class="date text-area-2"><?php $icon = $realm['icon']; echo $type[$icon]; ?></span></td>
        	  </tr>
            <tr><td height="18">
            <?php echo $Status['PjCreat']; ?>
    		<?php
    		$char_sql = "SELECT COUNT(*) FROM $server_cdb.characters";
    		$sqlquery = mysql_query($char_sql) or die(mysql_error());
    		$char = mysql_result($sqlquery,0,0);
     
            $char_online = "SELECT COUNT(*) FROM $server_cdb.characters WHERE online = '1'";
    		$sql_on = mysql_query($char_online) or die(mysql_error());
    		$char_on = mysql_result($sql_on,0,0);
    		?>
    		<span class="date text-area-2"><?php echo $char; ?></span>
           	</td><td align="left">
            <?php echo $Status['Drop']; ?><span class="date text-area-2"><?php echo $realm_config['drop_rate']; ?></span><br />
            </td></tr>
            <tr><td height="18">
            <?php echo $Status['PjConect']; ?><span class="date text-area-2"><?php echo $char_on; ?></span><br />
            <td align="left">
            <?php echo $Status['Exp']; ?><span class="date text-area-2"><?php echo $realm_config['exp_rate']; ?></span><br />
            </td>
            </tr></table>
    		<span class="clear"><!-- --></span>
    		<br />
    				
    		<center>
    			<?php 
    			$bar_width = "273px";
    			$bar_height = "20px";
    			$ally_img = "wow/static/images/services/status/ally.png";
    			$horde_img = "wow/static/images/services/status/horde.png";
    			//Show percent online (true = yes, false = no)
    			$show_percent = true; 
    
    			$alliance = array("1","3","4","7","11","22");
    			$horde = array("2","5","6","8","9","10");
    
    			$p = @getPlayers($server_cdb);
    			$a = @doFaction($server_cdb,$alliance);
    			$h = @doFaction($server_cdb,$horde);
    			$ap = @percent($a,$p);
    			$hp = @percent($h,$p);
    			$b = @barWidth($a,$p,273);
    			$c = @barWidth($h,$p,273);
    			echo "<a data-tooltip='".doFaction($server_cdb,$alliance)." <font style=\"color:#3399ff;font-weight:bold;\">".$Status['Ali']."</font> <small>".$Status['PlOnLine']."</small>'\><div style=\"width:" . $bar_width . ";height:" . $bar_height . ";\">
    			<div style=\"float:left;text-align:right;background:url(./" . $ally_img . ");width:" . $b . "px;height:20px;\">";
    			if($show_percent) {
    				echo "<font style=\"color:#FFFFFF;font-weight:bold;\"><center>$ap%</center></font></a>";
    			}
    			echo "<a data-tooltip='".doFaction($server_cdb,$horde)." <font style=\"color:#ff3333;font-weight:bold;\">".$Status['Horde']."</font> <small>".$Status['PlOnLine']."</small>'\></div>
    			<div style=\"float:right;text-align:left;background:url(./" . $horde_img . ");background-position:right;width:" . $c . "px;height:20px;\">";
    			if($show_percent) {
    				echo "<font style=\"color:#FFFFFF;font-weight:bold;\"><center>$hp%</center></font></a>";
    			}
    			echo "</div>
    			</div>";
    
    			?>
    		</center>
    		</div>
    	</div>
    </div>
	<br />
<?php
}
?>