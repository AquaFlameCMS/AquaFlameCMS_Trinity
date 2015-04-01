<?php
	function GetClientLink() {
		$con = mysqli_connect(DBHOST,DBUSER,DBPASS,DB);
			$query = "SELECT * FROM links WHERE name ='ClientDownload'";
				$result=mysqli_query($con,$query);
				while($row=mysqli_fetch_array($result)) 
				{
					echo $row['link'];
					}
			}