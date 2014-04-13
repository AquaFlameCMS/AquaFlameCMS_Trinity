<div class="sidebar-module " id="sidebar-events" style="">
<div class="sidebar-title">
<h3 class="category title-events"><a href="account/vote.php"><?php echo $Vote['VotePanel']; ?></a></h3></div>
<div class="sidebar-content">
<?php		$votes_log = mysql_query("SELECT * FROM $server_db.vote ORDER BY `id` ASC");
			while($vote = mysql_fetch_array($votes_log))
			{
			$votedx = mysql_query("SELECT * FROM $server_db.votes_log WHERE voteid = '".$vote['ID']."' AND userid = '".$account_information['id']."' ORDER BY `date` DESC");
			if(mysql_num_rows($votedx) > 0)
			{
			require_once("functions/custom.php");		
			$voted = mysql_fetch_assoc($votedx);
			$last_vote = $voted['date'];
			$whenIcanvote = strtotime($last_vote) + (12*60*60);
			if(time() >= $whenIcanvote) $voteable = 1;
			else
			{
			$mYear = date('Y', $whenIcanvote);
			$mMonth = date('m', $whenIcanvote);
			$mDay = date('d', $whenIcanvote);
			$mHour = date('H', $whenIcanvote);
			$mMinute = date('i', $whenIcanvote);
			$mSecond = date('s', $whenIcanvote);
			$target = mktime($mHour, $mMinute, $mSecond, $mMonth, $mDay, $mYear);
			$when = $target - time();
			$timp['ore'] = floor(($when%86400)/3600);
			$timp['min'] = floor((($when%86400) - $timp['ore']*3600)/60);
			$timp['sec'] = $when%60;
			$voteable = 0;
			if($timp['ore'] > 0)
			if($timp['ore'] > 1) $in_time = ''.$timp['ore'].' hours';
			else $in_time = ''.$timp['ore'].' hour';
			else if($timp['min'] > 0)
			if($timp['min'] > 1) $in_time = 'in '.$timp['min'].' minutes';
			else $in_time = ''.$timp['min'].' minute';
			else if($timp['sec'] > 0)
			if($timp['sec'] > 1) $in_time = 'in '.$timp['sec'].' seconds';
			else $in_time = ''.$timp['sec'].' second';
			else $voteable = 1;
			}
			}
			else $voteable = 1;	
			echo'
			<div class="sidebar-events"><h4>Today</h4>
			<ul class="sidebar-list today">
			<li data-id="1379664000000" class="event-summary sidebar-tile system-event">';		
			if($voteable == 1) echo '<a onclick="window.location = \'vote.php?id='.$vote['ID'].'\'" rel="np">';
			echo'
			<span class="icon-frame ">
			<img src="http://media.blizzard.com/wow/assets/calendar/calendar_brewfeststart.png" alt="" width="27" height="27" />
			<span class="frame"></span>
			</span>
			<span class="info-wrapper clear-after">
			<span class="title">'.$vote['Name'].'</span>
			</span>';
			if($voteable == 1) echo '<span class="date date-status">'.$Vote['CanVoteNow'].'</span>';
			else echo '<span class="date date-status">'.$Vote['CanVoteIn'].''.$in_time.'</span>
			<span class="date">'.date('H:i:s & d/m',$whenIcanvote).'</span>';
			echo'
			<span class="clear"><!-- --></span>';
			if ($voteable == 1) echo '</a>';
			echo '<span class="clear"><!-- --></span>
			</li>
			</ul>
			</div>';
		}
	?>
<span class="clear"><!-- --></span>
<div class="sidebar-module " id="sidebar-auctions" style="">
<div class="sidebar-content">
<div class="sidebar-cell">
<a><?php echo $Vote['Earned']; ?></a>
<ul>
<li>Gold <a href="#"><span>0</span></a></li>
<li>Silver <a href="#"><span><?php echo $account_extra['vote_points']; ?></span></a></li>
</ul>
</div>		
<div class="sidebar-cell">
<a>Can Earn</a>
<ul>
<li>Gold <a href="#"><span>0</span></a></li>
<li>Silver <a href="#"><span>0</span></a></li>	
</ul>
</div>
<span class="clear"><!-- --></span>
<ul class="sidebar-list">
<li>
<span class="float-right">
<span class="icon-gold">--</span>
<span class="icon-silver"><?php echo $account_extra['vote_points']; ?></span>
</span>
<?php echo $Vote['Earned']; ?>
</li>
</ul>
</div>
</div>
</div>
</div>