<?php
	function EnableServerSidebar() {
		$query="SELECT * FROM sidebars WHERE name='ServerInfo'";
			$con=mysqli_connect(DBHOST, DBUSER, DBPASS, DB);
				$result=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($result)) {
				if($row['enabled']=='1') {
					include("panel/server_information.php");
						}
				else {
				}
			}
		}	
	?>