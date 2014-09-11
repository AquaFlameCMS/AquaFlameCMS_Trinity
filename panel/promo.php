<?php
/**
 * Random images
 */
$imagenes[0]='0.jpg';
$imagenes[1]='1.jpg';
$imagenes[2]='2.jpg';
$imagenes[3]='3.jpg';

/**
 * Description Images
 */
$descripcion[0]='Random Image 0';
$descripcion[1]='Random Image 1';
$descripcion[2]='Random Image 2';
$descripcion[3]='Random Image 3';

/**
 * URL of random images
 */
$href[0]='game/';
$href[1]='search.php';
$href[2]='account/';
$href[3]='account/';

/* Here it is important to give it the number of images starting from 0 */
$i=rand(0,3);
#####  4 give error
?>
<div id="sidebar-marketing" class="sidebar-module">
	<div class="bnet-offer">
		<!--  -->
		<div class="bnet-offer-bg">
			<a href="<?php echo BASE_URL ?><?php echo $href[$i];?>" target="_blank" id="ad10069924" class="bnet-offer-image">
			<?php
				$con=mysqli_connect(DBHOST,DBUSER,DBPASS,DB);
				$query= "SELECT * FROM themes WHERE active=1";
				$result=mysqli_query($con,$query);
				while($row=mysqli_fetch_array($result))
				{
				$CSS_LINK = $row['css_link'];
				/* Show random picture */
				echo '<img src="'.BASE_URL.'wow/static/Themes/'.$CSS_LINK.'/images/panel/'.$imagenes[$i].'" width="300" height="250" alt="'.$descripcion[$i].'"/>'; 
				}
			?>
			</a>
		</div>
	</div>
</div>
