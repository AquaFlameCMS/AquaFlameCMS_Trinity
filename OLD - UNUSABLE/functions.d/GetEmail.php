<?php
	function GetEmail() {
		$con=mysqli_connect(DBHOST, DBUSER, DBPASS, SERVER_ADB);
			$query = "SELECT * FROM account WHERE username='".strtoupper($_SESSION["username"])."'";
				$result = mysqli_query($con,$query);
				while($row=mysqli_fetch_array($result)) {
					$UserEmail=$row['email'];
				}
				}