<div class="sidebar-module" id="sidebar-forums">
	<div class="sidebar-title">
	<h3 class="category title-forums"><a href="#"><?php echo $P_topics['P_topics']; ?></a></h3>
	</div>
	<div class="sidebar-content">
	<ul class="trending-topics">
		<?php
		$server_db = DB;
		$get_lastactivity = mysql_query("SELECT *, date FROM $server_db.forum_threads ORDER BY `last_date` DESC LIMIT 10");
		if(mysql_num_rows($get_lastactivity) > 0){
		while($lastact = mysql_fetch_array($get_lastactivity)){
			$forum = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_db.forum_forums WHERE id = '".$lastact['forumid']."'"));
			echo '
			<li>
			<a href="forum/category/view-topic/?t='.$lastact['id'].'" class="topic">
			'.$lastact['name'].'</a>
			<a class="forum">'.$forum['name'].'</a> - <span class="date">'.$lastact['date'].'</span></li>
			';
		}
		}else{
			echo 'No Topics';
		}
		?>
		</ul>
	</div>
</div>