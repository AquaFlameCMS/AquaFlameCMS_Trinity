<div class="sidebar-module " id="sidebar-expansion" style="">
<div class="sidebar-title">
<h3 class="category title-expansion"><a href="vote.php"><?php echo $Vote['VotePanel']; ?></a></h3>
</div>
<div class="sidebar-content">
<a class="mop-preview"></a>
<ul>
	<?php	$votes = mysql_query("SELECT * FROM $server_db.vote ORDER BY `id` ASC");
			while($vote = mysql_fetch_array($votes))
			{	
			$votedx = mysql_query("SELECT * FROM $server_db.votes WHERE voteid = '".$vote['ID']."' AND userid = '".$account_information['id']."' ORDER BY `date` DESC");
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
			} else $voteable = 1;	
			echo'					
			<li>';
			if($voteable == 1) echo '<a target="_blank" href="'.$vote['Link'].'" onclick="window.location = \'vote.php?id='.$vote['ID'].'\'" rel="np">';
			echo'
			<span class="info-wrapper clear-after">
			<span class="title">'.$vote['Name'].'</span></br>';
			if($voteable == 1) echo '<span class="date">'.$Vote['CanVoteNow'].'</span>';
			else echo '<span class="date">'.$Vote['CanVoteIn'].''.$in_time.'</span></br>
			<small>Time & Date to Vote:</small>
			<span class="date date-status">'.date('H:i:s & d/m',$whenIcanvote).'</span>';
			echo'
			</span>
			<span class="clear"><!-- --></span>';
			if ($voteable == 1) echo '</a>';
			echo '<span class="clear"><!-- --></span>
			</li>
			';
		}
	?>
</ul>
<a class="learn-more">
<span style="float-left">
<span class="icon-gold"><?php echo $account_extra['vote_points']; ?> VP</span>
</span>
<?php echo $Vote['Earned']; ?>
</a>
</div>
</div>