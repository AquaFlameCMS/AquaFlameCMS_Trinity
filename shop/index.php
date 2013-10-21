<?php require_once("../configs.php"); ?>
<!DOCTYPE html> 
<html lang="en-gb">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<title><?php echo $website['title']; ?> - <?php echo $Services['Services']; ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<link rel="shortcut icon" href="../wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="stylesheet" href="../wow/static/local-common/css/common.css?v15" />
<link rel="stylesheet" href="../wow/static/css/shop/shop-index.css?v34" />
<link rel="stylesheet" href="../wow/static/css/wiki/wiki.css?v34" />
<link title="World of Warcraft - News" href="wow/en/feed/news" type="application/atom+xml" rel="alternate" />
<link rel="stylesheet" href="../wow/static/css/wow.css?v4" />
<link rel="stylesheet" href="../wow/static/css/services/services-index.css?v4" />
<script src="../wow/static/local-common/js/third-party/jquery-1.4.4.min.js"></script>
<script src="../wow/static/local-common/js/core.js?v15"></script>
<script src="../wow/static/local-common/js/tooltip.js?v15"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]--></head>
<body class="en-gb services-home logged-in">

<div id="wrapper">
<?php $page_cat="shop"; include("../header.php"); ?>
<div id="content">
<div class="content-top-serv">
<div class="content-trail">
<ol class="ui-breadcrumb">
<li><a href="<?php echo $website['root']; ?>" rel="np" class=""><?php echo $website['title']; ?></a><span class="breadcrumb-arrow"></span></li>
<li class="last"><a href="shop.php" rel="np"><?php echo $Shop['shop']; ?></a></li>
</ol>
</div>
<div class="content-bot">
<div class="main-banners">
<div class="expansion">
</div>	
<div class="starter-edition">
<span class="title"><?php echo $Shop['shop_2']; ?></span>
<span class="headline"><?php echo $Shop['shop_3']; ?></span>
<a href="<?php echo $website['root']; ?>register.php" class="playnow"><?php echo $Shop['shop_4']; ?></a>
</div>
</div>
<div id="wiki" class="wiki directory wiki-index">
<div class="panel free-paid-services">
<div id="free-services" class="services-column">
<h2 class="header"><?php echo $Shop['shop_5']; ?></h2>			
<ul>
	<li><a href="<?php echo $website['root']; ?>shop/recruit-a-friend/" class="free-services-raf">
	<span><?php echo $Shop['shop_6']; ?></span></a>
	</li>
	<li><a href="<?php echo $website['root']; ?>chars-unst.php" class="free-services-sor">
	<span><?php echo $Shop['shop_7']; ?></span></a>
	</li>
	<li><a href="#" class="free-services-item-restoration">
	<span><?php echo $Shop['shop_8']; ?></span></a>
	</li>
	<?php
					if(isset($_GET['ref']) && $_GET['ref'] != ""){
					//Ids
					/*
					1 - Change Avatar
					*/
					
					switch($_GET['ref']){
					case "avatar":
					include("services/avatar.php");
					break;
					default:
					include("services/redirect.php");
					break;
					}
					}else{
	?>
	<li><a href="<?php echo $website['root']; ?>shop/#" class="free-services-mobile-armory">
	<span><?php echo $Shop['shop_9']; ?></span></a>
	</li>
	<?php
				}
	?>
	<li><a href="#" class="free-services-security">
	<span><?php echo $Shop['shop_10']; ?></span></a>
	</li>
</ul>
</div>
<div id="paid-services" class="services-column">
<h2 class="header"><?php echo $Shop['shop_11']; ?></h2>
<ul>
	<li><a href="<?php echo $website['root']; ?>shop/character-transfer/" class="paid-services-character-transfer">
	<span><?php echo $Shop['shop_12']; ?></span></a>
	</li>
	<li><a href="<?php echo $website['root']; ?>shop/faction-change/" class="paid-services-faction-change">
	<span><?php echo $Shop['shop_13']; ?></span></a>
	</li>
	<li><a href="<?php echo $website['root']; ?>shop/race-change/" class="paid-services-race-change">
	<span><?php echo $Shop['shop_14']; ?></span></a>
	</li>
	<li><a href="<?php echo $website['root']; ?>options/change_appear.php" class="paid-services-character-customization">
	<span><?php echo $Shop['shop_15']; ?></span></a>
	</li>
	<li><a href="<?php echo $website['root']; ?>options/change_name.php" class="paid-services-name-change">
	<span><?php echo $Shop['shop_16']; ?></span></a>
	</li>
</ul>
</div>
<a href="<?php echo $website['root']; ?>raf-invite.php" class="ad-raf"><span><?php echo $Shop['shop_17']; ?></span></a>
</div> 
<div class="panel game-subscriptions">
<h2 class="header"><a href="#"><?php echo $Shop['shop_18']; ?></a></h2>
<div class="subscription-col subscription-1">
<a href="#" class="game-title">
<span class="tooltip" data-tooltip="#wow-battlechest-tooltip" data-tooltip-options="{&quot;location&quot;: &quot;mouse&quot;}">World of Warcraft, TBC & WOTLK</span>
</a>
<a class="ui-button button1 " href="<?php echo $website['root']; ?>change_client.php?client=2">
<span><span><?php echo $Shop['shop_19']; ?></span></span></a>
<br />
<div id="wow-battlechest-tooltip" class="tooltip-content-div">
<p>Everything you need to begin the adventure</p>
<ul>
	<li>- World of Warcraft Vanilla Set</li>
	<li>- World of Warcraft The Burning Crusade Set</li>
	<li>- World of Warcraft Wrath of the Lick King Set</li>
	<li>- Level Experience increased by 20%</li>
</ul>
</div>
</div>
<div class="subscription-col subscription-2">
<a href="#" class="game-title">Cataclysm (Expansion)</a>
<a class="ui-button button1 " href="<?php echo $website['root']; ?>change_client.php?client=3">
<span><span><?php echo $Shop['shop_19']; ?></span></span></a>
</div>
<div class="subscription-col subscription-3">
<a class="game-title">Mists of Pandaria (Expansion)</a>
<a class="ui-button button1 disabled" data-tooltip="Mists of Pandaria is not Supported" data-tooltip-options="{&quot;location&quot;: &quot;mouse&quot;}">
<span><span><?php echo $Shop['shop_19']; ?></span></span></a>
<br />
</div>
<p class="subscription-desc"><?php echo $website['title']; ?> <?php echo $Shop['shop_20']; ?> <a href="#"><?php echo $Shop['shop_21']; ?></p>
<span class="clear"><!-- --></span>
</div>
<?php
/*
 * Aqui ya se necesita locales desde la base de datos
 * Here you need to create a local-lang from DB
 *
 */
?>
<div class="panel pet-mount">
<h2 class="header"><a href="#"><?php echo $Shop['shop_22']; ?></a></h2>
<div class="product-block">
<div id="pet-mount-list" class="companion-container" style="width: 1440px;">
	<a  href="#" class="product-item crown-of-eternal-winter" data-tooltip="Buy Now" data-tooltip-options="{&quot;location&quot;: &quot;mouse&quot;}">
		<span class="thumb"></span>
		<span class="name">Dual-Wield<br />Fangs of the Father</span>
	</a>
	<a href="#" class="product-item jewel-of-the-firelord" data-tooltip="Buy Now" data-tooltip-options="{&quot;location&quot;: &quot;mouse&quot;}">
		<span class="thumb"></span>
		<span class="name">Dragonwrath,<br />Tarecgosa's Rest</span>
	</a>
	<a href="#" class="product-item hood-of-hungering-darkness" data-tooltip="Buy Now" data-tooltip-options="{&quot;location&quot;: &quot;mouse&quot;}">
		<span class="thumb"></span>
		<span class="name">Two-Hand<br />Shadowmourne</span>
	</a>
	<a href="#" class="product-item blossoming-ancient" data-tooltip="Buy Now" data-tooltip-options="{&quot;location&quot;: &quot;mouse&quot;}">
		<span class="thumb"></span>
		<span class="name">Blossoming<br /> Ancient</span>
	</a>
	<a href="#" class="product-item armored-bloodwing" data-tooltip="Buy Now" data-tooltip-options="{&quot;location&quot;: &quot;mouse&quot;}">
		<span class="thumb"></span>
		<span class="name">Armored<br /> Bloodwing</span>
	</a>
	<a href="#" class="product-item heart-of-the-aspects" data-tooltip="Buy Now" data-tooltip-options="{&quot;location&quot;: &quot;mouse&quot;}">
		<span class="thumb"></span>
		<span class="name">Heart of<br />the Aspects</span>
	</a>
	<a href="#" class="product-item cinder-kitten" data-tooltip="Buy Now" data-tooltip-options="{&quot;location&quot;: &quot;mouse&quot;}">
		<span class="thumb"></span>
		<span class="name">Cinder<br />Kitten</span>
	</a>
	<a href="#" class="product-item celestial-steed" data-tooltip="Buy Now" data-tooltip-options="{&quot;location&quot;: &quot;mouse&quot;}">
		<span class="thumb"></span>
		<span class="name">Celestial<br />Steed</span>
	</a>
	<a href="#" class="product-item swift-windsteed" data-tooltip="Buy Now" data-tooltip-options="{&quot;location&quot;: &quot;mouse&quot;}">
		<span class="thumb"></span>
		<span class="name">Swift<br />Windsteed</span>
	</a>
	<a href="#" class="product-item winged-guardian" data-tooltip="Buy Now" data-tooltip-options="{&quot;location&quot;: &quot;mouse&quot;}">
		<span class="thumb"></span>
		<span class="name">Winged<br />Guardian</span>
	</a>
	<a href="#" class="product-item pandaren-monk" data-tooltip="Buy Now" data-tooltip-options="{&quot;location&quot;: &quot;mouse&quot;}">
		<span class="thumb"></span>
		<span class="name">Pandaren<br />Monk</span>
	</a>
	<a href="#" class="product-item lil-ragnaros" data-tooltip="Buy Now" data-tooltip-options="{&quot;location&quot;: &quot;mouse&quot;}">
		<span class="thumb"></span>
		<span class="name">Lil<br />Ragnaros</span>
	</a>
	<a href="#" class="product-item lil-kt" data-tooltip="Buy Now" data-tooltip-options="{&quot;location&quot;: &quot;mouse&quot;}">
		<span class="thumb"></span>
		<span class="name">Lil<br />K.T.</span>
	</a>
	<a href="#" class="product-item cenarion-hatchling" data-tooltip="Buy Now" data-tooltip-options="{&quot;location&quot;: &quot;mouse&quot;}">
		<span class="thumb"></span>
		<span class="name">Cenarion<br />Hatchling</span>
	</a>
	<a href="#" class="product-item moonkin-hatchling-alliance" data-tooltip="Buy Now" data-tooltip-options="{&quot;location&quot;: &quot;mouse&quot;}">
		<span class="thumb"></span>
		<span class="name">Moonkin<br />Hatchling</span>
	</a>
	<a href="#" class="product-item guardian-cub" data-tooltip="Buy Now" data-tooltip-options="{&quot;location&quot;: &quot;mouse&quot;}">
		<span class="thumb"></span>
		<span class="name">Guardian<br />Cub</span>
	</a>
	<a href="#" class="product-item lil-xt" data-tooltip="Buy Now" data-tooltip-options="{&quot;location&quot;: &quot;mouse&quot;}">
		<span class="thumb"></span>
		<span class="name">Lil<br />XT</span>
	</a>
	<a href="#" class="product-item soul-of-the-aspects" data-tooltip="Buy Now" data-tooltip-options="{&quot;location&quot;: &quot;mouse&quot;}">
		<span class="thumb"></span>
		<span class="name">Soul of<br />the Aspects</span>
	</a>
</div>
</div>
	<a href="javascript:;" class="nav-button nav-prev" onclick="CompanionSlider.move(1);" style="display: none;"></a>
	<a href="javascript:;" class="nav-button nav-next" onclick="CompanionSlider.move(-1);"></a>
<span class="clear"><!-- --></span>
</div>
<script type="text/javascript">
        //<![CDATA[
		$(function() {
			CompanionSlider.init();
		});
		
		var CompanionSlider = {
			
			newPosition: 0,
			movement: 870,
			container: null,
			
			init: function(){			
				CompanionSlider.container = $('#pet-mount-list');
				CompanionSlider.containerSize();
				CompanionSlider.navPrev = $('.pet-mount .nav-prev');
				CompanionSlider.navNext = $('.pet-mount .nav-next');
				CompanionSlider.setNav();
			},			
			move: function(direction){			
				var currentPosition = eval(CompanionSlider.container.css('left').replace('px',''));
				var prevPosition = CompanionSlider.newPosition;
				CompanionSlider.newPosition = prevPosition + direction*CompanionSlider.movement;
				
				if( CompanionSlider.newPosition <= currentPosition || CompanionSlider.newPosition >= currentPosition ){
					CompanionSlider.container.css('left', CompanionSlider.newPosition +'px');					
					CompanionSlider.setNav();
				}
			},			
			containerSize: function(){
				var itemCount = $('#pet-mount-list .product-item').length;
				var itemWidth = $('#pet-mount-list .product-item').outerWidth();
				CompanionSlider.container.width(itemCount*itemWidth);
			},
			setNav: function(){
				CompanionSlider.navPrev.show();
				CompanionSlider.navNext.show();
				
				if( CompanionSlider.newPosition == 0 ){
					CompanionSlider.navPrev.hide();
				}
				if( CompanionSlider.newPosition*-1 + CompanionSlider.movement > CompanionSlider.container.width() ){
					CompanionSlider.navNext.hide();
				}			
			}
		}
        //]]>
</script>
<span class="clear"><!-- --></span>
</div>
</div>
</div>
</div>
<?php include("../footer.php"); ?></body>
</html>
