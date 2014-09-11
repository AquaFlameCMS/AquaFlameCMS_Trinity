<div id="header">
	<div class="search-bar">
		<form action="<?php echo BASE_URL ?>search.php" method="get" autocomplete="off">
			<div>
				<div class="ui-typeahead-ghost">
					<input type="text" value="" autocomplete="off" readonly="readonly" class="search-field input input-ghost"/>
					<input href="<?php echo BASE_URL ?>search.php" type="text" class="input border-5 glow-shadow-2" name="search" id="search-field" maxlength="200" tabindex="40" alt="<?php echo $search['text_bar']; ?>" value="<?php echo $search['text_bar']; ?>" style="background-color: transparent; " />
				</div>
				<input href="<?php echo BASE_URL ?>search.php" type="submit" class="search-button" value="" tabindex="41" />
			</div>
		</form>
	</div>
	<h1 id="logo"><a href="<?php echo BASE_URL ?>"><?php echo TITLE ?></a></h1>
	<div class="header-plate">
		<ul class="menu" id="menu">
			<?php if(isset($page_cat)){
			?>
			<li class="menu-home"><a href="<?php echo BASE_URL ?>" <?php if($page_cat=='home') echo'class="menu-active"';?>
			><span><?php echo $home['home']; ?>
			</span></a></li>
			<li class="menu-game"><a href="<?php echo BASE_URL ?>game/" <?php if($page_cat=='game') echo'class="menu-active"';?>
			><span><?php echo $game['game']; ?>
			</span></a></li>
			<li class="menu-community"><a href="<?php echo BASE_URL ?>community/" <?php if($page_cat=='community') echo'class="menu-active"';?>
			><span><?php echo $Community['Community']; ?>
			</span></a></li>
			<li class="menu-media"><a href="<?php echo BASE_URL ?>media/" <?php if($page_cat=='media') echo'class="menu-active"';?>
			><span><?php echo $Media['Media_menu']; ?>
			</span></a></li>
			<li class="menu-forums"><a href="<?php echo BASE_URL ?>forum/" <?php if($page_cat=='forums') echo'class="menu-active"';?>
			><span><?php echo $Forums['Forums']; ?>
			</span></a></li>
			<li class="menu-services"><a href="<?php echo BASE_URL ?>shop/" <?php if($page_cat=='shop') echo'class="menu-active"';?>
			><span><?php echo $Shop['shop']; ?>
			</span></a></li>
		</ul>
		<?php
			if($page_cat == "forums"){ require("userplate.php"); }else{ require("userplate.php"); }
			}else{ ?>
		<li class="menu-home"><a href="<?php echo BASE_URL ?>"><span><?php echo $home['home']; ?>
		</span></a></li>
		<li class="menu-game"><a href="<?php echo BASE_URL ?>game/"><span><?php echo $game['game']; ?>
		</span></a></li>
		<li class="menu-community"><a href="<?php echo BASE_URL ?>community/"><span><?php echo $Community['Community']; ?>
		</span></a></li>
		<li class="menu-media"><a href="<?php echo BASE_URL ?>media/"><span><?php echo $Media['Media_menu']; ?>
		</span></a></li>
		<li class="menu-forums"><a href="<?php echo BASE_URL ?>forum/"><span><?php echo $Forums['Forums']; ?>
		</span></a></li>
		<li class="menu-services"><a href="<?php echo BASE_URL ?>shop/"><span><?php echo $Shop['shop']; ?>
		</span></a></li>
	</ul>
	<?php require("userplate.php"); } ?>
</div>
</div>
