<?php
require_once("configs.php");
require_once('functions/armory_func.php');  
$page_cat = "services";
include("classes/armory.class.php");
$character = Factory_Armory::createCharacter($_GET['name']);
?>

<!DOCTYPE html> 
<html lang="en-gb">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<title><?php echo TITLE ?> - Armory</title>
<meta content="false" http-equiv="imagetoolbar" />
<meta name="description" content="<?php echo DESCRIPTION ?>">
<meta name="keywords" content="<?php echo KEYWORDS ?>">
<link rel="shortcut icon" href="wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="stylesheet" href="wow/static/local-common/css/common.css" />
<link title="World of Warcraft - News" href="wow/en/feed/news" type="application/atom+xml" rel="alternate"/>
<link rel="stylesheet" href="wow/static/css/wow.css" />
<link rel="stylesheet" href="wow/static/css/view.css" />
<link rel="stylesheet" href="wow/static/css/character/character.css" />
<script src="wow/static/local-common/js/third-party/jquery-1.4.4.min.js"></script>
<script src="wow/static/local-common/js/core.js"></script>
<script src="wow/static/local-common/js/tooltip.js"></script>
<script src="http://static.wowhead.com/widgets/power.js"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
</head>
<body class="en-gb">
<div id="wrapper">
	<?php include("header.php"); ?>
<div id="content">
<div class="content-top">
<div class="content-trail">
<ol class="ui-breadcrumb">
<li>
<a href="<?php echo BASE_URL ?>" rel="np">
<?php echo TITLE ?>
</a>
<span class="breadcrumb-arrow"></span>
</li>
<li>
<a href="shop" rel="np">
Community
</a>
<span class="breadcrumb-arrow"></span>
</li>
<li class="last">
<a href="" rel="np">
<?php echo $character->getObjectInfo()->name;?> @ <?php echo @$name_realm1['realm']; ?>
</a>
</li>
	<li><a href="index.php" rel="np"><?php echo TITLE ?></a></li>
	<li><a href="shop" rel="np">Community</a></li>
	<li class="last"><a href="" rel="np"><?php echo $character->getObjectInfo()->name;?> @ <?php echo @$name_realm1['realm']; ?></a></li>
</ol>
</div>
<div class="content-bot">
<?php       
  $raceNum= $character->getObjectInfo()->race;               //Numbre race for all armory references
  echo'<div id="profile-wrapper" class="profile-wrapper profile-wrapper-advanced profile-wrapper-';  //Show horde/ally back image
  if (translateLet($raceNum) == 0){
    echo'alliance">';}
  else{
    echo'horde">';}?>
	<div class="profile-sidebar-anchor">
	<div class="profile-sidebar-outer">
	<div class="profile-sidebar-inner">
	<div class="profile-sidebar-contents">
	<div class="profile-info-anchor">
	<div class="profile-info">
	<div class="name"><a href="" rel="np"><?php echo $character->getObjectInfo()->name;?></a></div>
	<div class="title-guild">
	<div class="title">
  <?php
    /*if ($raceNum == 0){$col='title_A';}
    else {$col = 'title_H';}
    $conn = mysql_open($serveraddress, $serveruser, $serverpass);   //Gets title, have to make website title table
    $sql="SELECT $col as title FROM $server_db.titles WHERE guid = 
      (SELECT chosenTitle FROM $server_cdb.characters WHERE name = '".$character->getObjectInfo()->name."')";
    $row = mysql_fetch_assoc(mysql_query($sql,$conn));
    mysql_end($conn);
    echo $row['title']; */
  ?> &nbsp;
  </div>
	<div class="guild">
	<a href="#">
  <?php
    mysql_select_db($server_cdb,$connection_setup)or die(mysql_error());   //Gets guild name, connection have to change to title
    $sql =  mysql_query("SELECT guid FROM characters WHERE name = '".$character->getObjectInfo()->name."'");
    $guid = mysql_fetch_array($sql);
    $sql = mysql_query("SELECT name FROM guild WHERE guildid =(SELECT guildid FROM guild_member WHERE guid = '".$guid['guid']."')");
    if (mysql_num_rows($sql)>0){
      $row = mysql_fetch_assoc($sql);
      echo $row['name'];
    }
  ?>
  </a>
	</div>
	</div>
	<span class="clear"><!-- --></span>
	<div class="under-name color-c<?php echo @$character->getObjectInfo()->class; ?>">
	<span class="level"><strong><?php echo @$character->getObjectInfo()->level; ?></strong></span> <a href="#" class="race"><?php
  echo @$armory['race'.$raceNum];
  ?></a> <a id="profile-info-spec" href="#" class="spec tip"><?php
  @$talentP = $character->getTalentInfo()->branchP;
  @$talentS = $character->getTalentInfo()->branchS;
  if ($talentP==""){$talentP='0';}
  if ($talentS==""){$talentS='0';}
  ?><?php if ($talentP<>'0'){echo @$armory['branch'.$talentP];} ?></a> <a href="#" class="class"><?php
  @$classNum=$character->getObjectInfo()->class;   //Show the name of the class and not de number
  echo @$armory['class'.$classNum];
  ?></a><span class="comma">,</span>
	<span class="realm tip" id="profile-info-realm" data-battlegroup="Raserei / Frenzy">
	<?php echo $name_realm1['realm']; ?>
	</span>
	</div>
	<div class="achievements"><a href=""><?php echo $armory['APoints']; ?></a></div>
	</div>
	</div>
	<ul class="profile-sidebar-menu" id="profile-sidebar-menu">
	<li class=" active">
	<a href="" class="" rel="np">
	<span class="arrow"><span class="icon"><?php echo $armory['summary']; ?></span></span></a>
	</li>
	<!--<li class="">
	<a href="" class="" rel="np">
	<span class="arrow"><span class="icon">Talents &amp; Glyphs</span></span></a>
	</li>
	<li class=" disabled">
	<a href="javascript:;" class=" has-submenu vault" rel="np">
	<span class="arrow"><span class="icon">Auctions</span></span></a>
	</li>
	<li class=" disabled">
	<a href="javascript:;" class=" vault" rel="np">
	<span class="arrow"><span class="icon">Events</span></span></a>
	</li>
	<li class="">
	<a href="" class=" has-submenu" rel="np">
	<span class="arrow"><span class="icon">Achievements</span></span></a>
	</li>
	<li class="">
	<a href="" class="" rel="np">
	<span class="arrow"><span class="icon">Companions &amp; Mounts</span></span></a>
	</li>
	<li class="">
	<a href="" class=" has-submenu" rel="np">
	<span class="arrow"><span class="icon">Professions</span></span></a>
	</li>-->
	<li class="">
	<a href="#" class="" rel="np">
	<span class="arrow"><span class="icon"><?php echo $armory['reputation']; ?></span></span></a>
	</li><!--
	<li class="">
	<a href="" class="" rel="np">
	<span class="arrow"><span class="icon">PvP</span></span></a>
	</li>
	<li class="">
	<a href="" class="" rel="np">
	<span class="arrow"><span class="icon">Activity Feed</span></span></a>
	</li>-->
	</ul>
	<div class="summary-sidebar-links">
	</div>
	</div>
	</div>
	</div>
	</div>
	<div class="profile-contents">
	<div class="summary-top">
	<div class="summary-top-right">
	<ul class="profile-view-options" id="profile-view-options-summary">
	<li class="current">
	<a href="threed.php?name=<?php echo $character->getObjectInfo()->name;?>" rel="np" class="threed"><?php echo $armory['3d']; ?></a></li>
	<li>
	<a href="advanced.php?name=<?php echo $character->getObjectInfo()->name;?>" rel="np" class="advanced"><?php echo $armory['advanced']; ?></a></li>
	</ul>
	<div class="summary-averageilvl">
	<div class="rest"><?php echo $armory['itemlevel']; ?><br/>(<span class="equipped">20</span> <?php echo $armory['equipped']; ?>)
	</div>
	<div id="summary-averageilvl-best" class="best tip" data-id="averageilvl">20</div>
	</div>
	</div>
	<br>
	<div class="summary-top-inventory">
	<div id="summary-inventory" class="summary-inventory summary-inventory-advanced">
	<div class="character-3d">
	<?php
    $errors = 0;

    mysql_select_db($server_cdb)or die(mysql_error());
    $query_select_character = "SELECT guid, race, gender, playerBytes, playerBytes2 FROM characters WHERE name = '".@$name = $_GET['name']."' LIMIT 1";
    $result_select_character = mysql_query($query_select_character);

    if (!mysql_num_rows($result_select_character) == 0) 
    { // If OK

        $row = mysql_fetch_array($result_select_character);

        $guid = $row['guid'];
        $race = $row['race'];
        $gender = $row['gender'];
        $b = $row['playerBytes'];
        $b2 = $row['playerBytes2'];

        // Set Character Features
        $ha = ($b>>16)%256;
        $hc = ($b>>24)%256;
        $fa = ($b>>8)%256;
        $sk = $b%256;
        $fh = $b2%256;

        // Set Character Race/Gender
        $char_race = array(
        1 => 'human',
        2 => 'orc',
        3 => 'dwarf',
        4 => 'nightelf',
        5 => 'scourge',
        6 => 'tauren',
        7 => 'gnome',
        8 => 'troll',
		9 => 'goblin',
        10 => 'bloodelf',
        11 => 'draenei',
		22 => 'worgen');

        $char_gender = array(
        0 => 'male',
        1 => 'female');

        $rg = $char_race[$race].$char_gender[$gender];

        $query_select_guid = mysql_query("SELECT item FROM character_inventory WHERE guid = '$guid' AND bag='0' AND slot <'18'");
        if (mysql_num_rows($query_select_guid) != 0) 
        {
            $eq = "";
            while($row_select_guid = mysql_fetch_array($query_select_guid))
            {
                $item = $row_select_guid['item'];
                mysql_select_db($server_cdb);
                $query_select_itemEntry = mysql_query("SELECT itemEntry FROM item_instance WHERE guid = '$item'");
                if (mysql_num_rows($query_select_itemEntry) != 0) 
                {
                    while ($row_itemEntry = mysql_fetch_array($query_select_itemEntry)) 
                    {
                        $itemEntry = $row_itemEntry['itemEntry'];
                        if ($itemEntry != "") 
                        {
                            mysql_select_db($server_wdb);
                            $query_select_item = "SELECT displayid, InventoryType FROM item_template WHERE entry = '$itemEntry' LIMIT 1";
                            $result_select_item = mysql_query($query_select_item);
                            if (!mysql_num_rows($result_select_item) == 0) 
                            {
                                $row_item = mysql_fetch_array($result_select_item);
                                $displayid = $row_item['displayid'];
                                $inventory_type = $row_item['InventoryType'];
                                if ($eq == "") 
                                {
                                    $eq = $inventory_type.','.$displayid;
                                } else 
                                {
                                    $eq .= ','.$inventory_type.','.$displayid;
                                }
                            } 
                            else 
                            {
                                // If not OK
                                echo '<p>The DisplayID could not be retrieved. We apologize for any inconvenience.</p>'; // Public message.
                                //echo '<p>' . mysql_error() . '<br /><br />Query:'.$itemEntry.' ' . $query . '</p>'; // Debugging message.
                                $errors++;
                            }
                        }
                        else 
                        {
                            // If not OK
                            echo '<p>The itemEntry could not be retrieved. We apologize for any inconvenience.</p>'; // Public message.
                            //echo '<p>' . mysql_error() . '<br /><br />Query: ' . $query . '</p>'; // Debugging message.
                            $errors++;
                        }
                    }
                } 
                else 
                { 
                    // If not OK
                    echo '<p>The Inventory could not be retrieved. We apologize for any inconvenience.</p>'; // Public message.
                    //echo '<p>' . mysql_error() . '<br /><br />Query: ' . $query . '</p>'; // Debugging message.
                    $errors++;
                }
            }
        } 
    }
    else 
    { 
        // If not OK
        echo '<p>The Character could not be retrieved. We apologize for any inconvenience.</p>'; // Public message.
        //echo '<p>' . mysql_error() . '<br /><br />Query: ' . $query . '</p>'; // Debugging message.
        $errors++;
    }

    if ($errors == 0) 
    {
        echo '<div id="model_scene" align="center">';
        echo '<object id="wowhead" type="application/x-shockwave-flash" data="http://static.wowhead.com/modelviewer/ModelView.swf" height="440px" width="440px">';
        echo '<param name="quality" value="high">';
        echo '<param name="allowscriptaccess" value="always">';
        echo '<param name="menu" value="false">';
        echo '<param value="transparent" name="wmode">';
        echo printf('<param name="flashvars" value="model=%s&amp;modelType=16&amp;ha=%s&amp;hc=%s&amp;fa=%s&amp;sk=%s&amp;fh=%s&amp;fc=0&amp;contentPath=http://static.wowhead.com/modelviewer/&amp;blur=0&amp;equipList=%s">', $rg,$ha,$hc,$fa,$sk,$fh,$eq);
        echo '<param name="movie" value="http://static.wowhead.com/modelviewer/ModelView.swf">';
        echo '</object>';
        echo '</div>';
    }
 // End of Submit Conditional

?>
</div>
	<?php
    $character->run();
    ?>
    </div>
	</div>
        <script type="text/javascript">
        //<![CDATA[
		$(document).ready(function() {
			var summaryInventory = new Summary.Inventory({ view: "advanced" }, {
			
			1: {
				name: "Tumultuous Necklace of the Soldier",
				quality: 3,
				icon: "inv_jewelry_necklace_16"
			}
			,
			2: {
				name: "Elite Shoulders",
				quality: 2,
				icon: "inv_shoulder_05"
			}
			,
			14: {
				name: "Tumultuous Cloak of the Sorcerer",
				quality: 3,
				icon: "inv_misc_cape_03"
			}
			,
			4: {
				name: "Husk of Naraxis",
				quality: 2,
				icon: "inv_misc_monsterspidercarapace_01"
			}
			,
			3: {
				name: "Squire\'s Shirt",
				quality: 1,
				icon: "inv_shirt_16"
			}
			,
			18: {
				name: "Tabard of the Hand",
				quality: 1,
				icon: "inv_shirt_12"
			}
			,
			8: {
				name: "Fortified Bracers of the Bear",
				quality: 2,
				icon: "inv_bracer_03"
			}
			,
			9: {
				name: "Battleforge Gauntlets of the Bear",
				quality: 2,
				icon: "inv_gauntlets_26"
			}
			,
			5: {
				name: "Lambent Scale Girdle",
				quality: 2,
				icon: "inv_belt_04"
			}
			,
			6: {
				name: "Green Iron Leggings",
				quality: 2,
				icon: "inv_pants_05"
			}
			,
			7: {
				name: "Silvered Bronze Boots",
				quality: 2,
				icon: "inv_boots_01"
			}
			,
			10: {
				name: "Signet Ring of the Hand",
				quality: 2,
				icon: "inv_jewelry_ring_18"
			}
			,
			11: {
				name: "Clay Ring of the Bear",
				quality: 2,
				icon: "inv_jewelry_ring_14"
			}
			,
			15: {
				name: "Diamond Hammer",
				quality: 3,
				icon: "inv_hammer_06"
			}
			,
			16: {
				name: "Glimmering Shield",
				quality: 2,
				icon: "inv_shield_05"
			}
			});
		});
        //]]>
        </script>
        </div>
			<div class="summary-middle">
				<div class="summary-middle-inner">
					<div class="summary-middle-right">
						<div class="summary-audit" id="summary-audit">
							<div class="category-right"><span class="tip" id="summary-audit-whatisthis"><?php echo $armory['what']; ?></span></div>
							<h3 class="category "><?php echo $armory['audit']; ?></h3>
							<div class="profile-box-simple">
	                        <ul class="summary-audit-list">
							<li><span class="number">1</span> <?php echo $armory['emptyGlyph']; ?></li>
							<li data-slots="2,15">
								<span class="tip">
									<span class="number">2</span> <?php echo $armory['unenchanted']; ?>
								</span>
							</li>
							</ul>
<script type="text/javascript">
        //<![CDATA[
		$(document).ready(function() {
			new Summary.Audit({
	"unenchantedItems": {
			2: 1,
			15: 1
	},
				"foo": true
			});
		});
        //]]>
        </script>
						</div>
						</div>
						<div id="summary-reforging" class="summary-reforging">
						<h3 class="category "><?php echo $armory['reforging']; ?></h3>
						<div class="profile-box-simple">No items have been reforged.</div>
					</div>
				</div>
				<div class="summary-middle-left">
					<div class="summary-bonus-tally">
					<h3 class="category "><?php echo $armory['enchant']; ?></h3>
					<div class="profile-box-simple">
						<div class="numerical">
							<ul>
								<li><span class="value">+0</span> <?php echo $armory['armour']; ?></li>
								<li><span class="value">+0</span> <?php echo $armory['stamina']; ?></li>
								<li><span class="value">+0</span> <?php echo $armory['strength']; ?></li>
							</ul>
						</div>
					</div>
					</div>
                    <div class="summary-gems">
					<h3 class="category "><?php echo $armory['gems']; ?></h3>
                    <div class="profile-box-simple"><?php echo $armory['noGems']; ?></div>
				    </div>
	                <span class="clear"><!-- --></span>
				</div>
	            <span class="clear"><!-- --></span>
				</div>
			</div>
			<div class="summary-bottom">
				<div class="profile-recentactivity">
	           <h3 class="category "><?php echo $armory['activity']; ?></h3>
					<div class="profile-box-simple">
					<p><?php echo $armory['noActivity']; ?></p>
					<?php echo $armory['disable']; ?>
	<ul class="activity-feed">
	<li class="ach ">
	<dl>
		<dd>
		<a href="achievement#97:14777:a627" data-achievement="627">
		<!--<span  class="icon-frame frame-18 " style='background-image: url("http://eu.media.blizzard.com/wow/icons/18/achievement_zone_dunmorogh.jpg");'>
		</span>
		</a>
	    Earned the achievement <a href="achievement#97:14777:a627" data-achievement="627">Explore Dun Morogh</a> for 10 points.
        </dd>
		<dt>17/04/2011</dt>
	</dl>
	</li>
	<li class="ach ">
	<dl>
		<dd>
		<a href="achievement#97:14778:a736" data-achievement="736">
		<span  class="icon-frame frame-18 " style='background-image: url("http://eu.media.blizzard.com/wow/icons/18/achievement_zone_mulgore_01.jpg");'>
		</span>
		</a>
	Earned the achievement <a href="achievement#97:14778:a736" data-achievement="736">Explore Mulgore</a> for 10 points.
        </dd>
		<dt>17/04/2011</dt>
	</dl>
	</li>
	<li class="ach ">
	<dl>
		<dd>
		<a href="achievement#97:14778:a750" data-achievement="750">
		<span  class="icon-frame frame-18 " style='background-image: url("http://eu.media.blizzard.com/wow/icons/18/achievement_zone_barrens_01.jpg");'>
		</span>
		</a>
	Earned the achievement <a href="achievement#97:14778:a750" data-achievement="750">Explore Northern Barrens</a> for 10 points.
        </dd>
		<dt>17/04/2011</dt>
	</dl>
	</li>
	<li class="ach ">
	<dl>
		<dd>
		<a href="achievement#97:14777:a768" data-achievement="768">
		<span  class="icon-frame frame-18 " style='background-image: url("http://eu.media.blizzard.com/wow/icons/18/achievement_zone_tirisfalglades_01.jpg");'>
		</span>
		</a>

	Earned the achievement <a href="achievement#97:14777:a768" data-achievement="768">Explore Tirisfal Glades</a> for 10 points.
    </dd>
		<dt>17/04/2011</dt>
	</dl>
	</li>
	<li class="ach ">
	<dl>
		<dd>
		<a href="achievement#97:14777:a769" data-achievement="769">
		<span  class="icon-frame frame-18 " style='background-image: url("http://eu.media.blizzard.com/wow/icons/18/achievement_zone_silverpine_01.jpg");'>
		</span>
		</a>
	Earned the achievement <a href="achievement#97:14777:a769" data-achievement="769">Explore Silverpine Forest</a> for 10 points.
    </dd>
		<dt>17/04/2011</dt>-->
	</dl>
	</li>
	</ul>
	<div class="profile-linktomore">	
		<a href="" rel="np"><?php echo $armory['early']; ?></a>
	</div>
	<span class="clear"><!-- --></span>
	</div>
</div>
<div class="summary-bottom-left">
    <div class="summary-talents" id="summary-talents">
	<ul>
	<li class="summary-talents-0">
		<a href=""><span class="inner">
			<span class="icon"><img src="wow/static/images/icons/talents/<?php echo $talentS; ?>.jpg" alt="" /><span class="frame"></span></span>
			<span class="roles">
            <?php if($talentS=='750'){echo '<span class="icon-tank"></span>';}?>
			<?php                                                                   //Show roles based on the talent branch
              if($talentS=='398' || $talentS=='839' || $talentS=='845'){echo '<span class="icon-tank"></span>';}
              elseif ($talentS=='748' || $talentS=='831' || $talentS=='760' || $talentS=='813' || $talentS=='262'){echo '<span class="icon-heal"></span>';}
              elseif ($talentS=='0'){echo '<span></span>';}
              else {echo '<span class="icon-dps"></span>';}
            ?>	
            </span>		
            <span class="name-build">
				<span class="name"><?php echo $armory['branch'.$talentS]; ?></span>
				<span class="build">0<ins>/</ins>0<ins>/</ins>0</span>
			</span>
		</span></a>
	</li>
	<li class="summary-talents-1">
		<a href="" class="active"><span class="inner">
			<span class="checkmark"></span>
			<span class="icon"><img src="wow/static/images/icons/talents/<?php echo $talentP; ?>.jpg" alt="" /><span class="frame"></span></span>
			<span class="roles">
            <?php if($talentP=='750'){echo '<span class="icon-tank"></span>';}?>
			<?php                                                                 //Show roles based on the talent branch
              if($talentP=='398' || $talentP=='839' || $talentP=='845'){echo '<span class="icon-tank"></span>';}
              elseif ($talentP=='748' || $talentP=='831' || $talentP=='760' || $talentP=='813' || $talentP=='262'){echo '<span class="icon-heal"></span>';}
              elseif ($talentP=='0'){echo '<span></span>';}
              else {echo '<span class="icon-dps"></span>';}
            ?>
			</span>       
			<span class="name-build">
				<span class="name"><?php echo $armory['branch'.$talentP]; ?></span>
				<span class="build">0<ins>/</ins>0<ins>/</ins>0</span>
			</span>
		</span></a>
	</li>
	</ul>
</div>
<div class="summary-health-resource">
	<ul>
		<li class="health" id="summary-health" data-id="health">
		<table width="100%">
		  <tr>
        <td><span class="name"><?php echo $armory['Health']; ?></span></td>
        <td align="right"><span class="value"><?php echo $character->getStatInfo()->maxhealth; ?>&nbsp;&nbsp;&nbsp;</span></td>
      </tr>
    </table>
    </li>
<?php 
		if($classNum == 2 || $classNum == 7 || $classNum == 8 || $classNum == 9 || $classNum == 11 || $classNum == 5 || $classNum == 7)
		{
		  echo '<li class="resource-0" id="summary-power" data-id="power-0">';
      echo '<table width="100%"><tr><td><span class="name">'.$armory['Mana'].'</span></td><td align="right"><span class="value">'.$character->getStatInfo()->maxpower1.'&nbsp;&nbsp;&nbsp;</span></td></tr>';
		}
		elseif($classNum == 3)
		{
      echo '<li class="resource-2" id="summary-power" data-id="power-2">';
      echo '<table width="100%"><tr><td><span class="name">'.$armory['Focus'].'</span></td><td align="right"><span class="value">'.$character->getStatInfo()->maxpower3.'&nbsp;&nbsp;&nbsp;</span></td></tr>';
		}
		elseif($classNum == 1)
		{
		echo '<li class="resource-1" id="summary-power" data-id="power-1">';
      echo '<table width="100%"><tr><td><span class="name">'.$armory['Rage'].'</span></td><td align="right"><span class="value">'.$character->getStatInfo()->maxpower4.'&nbsp;&nbsp;&nbsp;</span></td></tr>';
		}
		elseif($classNum == 4)
		{
		  echo '<li class="resource-3" id="summary-power" data-id="power-3">';
      echo '<table width="100%"><tr><td><span class="name">'.$armory['Energy'].'</span></td><td align="right"><span class="value">'.$character->getStatInfo()->maxpower1.'&nbsp;&nbsp;&nbsp;</span></td></tr>';
		}
		elseif($classNum == 6)
		{
		  echo '<li class="resource-6" id="summary-power" data-id="power-6">';
      echo '<table width="100%"><tr><td><span class="name">'.$armory['Runic'].'</span></td><td align="right"><span class="value">'.($character->getStatInfo()->maxpower7/10).'&nbsp;&nbsp;&nbsp;</span></td></tr>';
		}                                                                                                                               //runic is 1000 in db
		 ?></table></li>
	</ul>
</div>
<div class="summary-stats-profs-bgs">
	<div class="summary-stats" id="summary-stats">
		<div id="summary-stats-advanced" class="summary-stats-advanced">
			<div class="summary-stats-advanced-base">
			<div class="summary-stats-column">
				<h4>Base</h4>
				<ul>
			<li data-id="strength" class="">
				<span class="name"><?php echo $armory['strength']; ?></span>
				<span class="value color-q2"><?php echo $character->getStatInfo()->strength; ?></span>
			<span class="clear"><!-- --></span>
			</li>
			<li data-id="intellect" class="">
				<span class="name"><?php echo $armory['Agility']; ?></span>
				<span class="value color-q2"><?php echo $character->getStatInfo()->agility; ?></span>
			<span class="clear"><!-- --></span>
			</li>
			<li data-id="stamina" class="">
				<span class="name"><?php echo $armory['stamina']; ?></span>
				<span class="value color-q2"><?php echo $character->getStatInfo()->stamina; ?></span>
			<span class="clear"><!-- --></span>
			</li>
			<li data-id="mastery" class="">
				<span class="name"><?php echo $armory['Intellect']; ?></span>
				<span class="value"><?php echo $character->getStatInfo()->intellect; ?></span>
			<span class="clear"><!-- --></span>
			</li>
				</ul>
			</div>
        </div>
		<div class="summary-stats-advanced-role">
	    <div class="summary-stats-column">
		<h4><?php echo $armory['Other']; ?></h4>
		<ul>
	<li data-id="meleeattackpower" class="">
		<span class="name"><?php echo $armory['AP']; ?></span>
		<span class="value color-q2"><?php echo $character->getStatInfo()->attackPower; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="parry" class="">
		<span class="name"><?php echo $armory['Parry']; ?></span>
		<span class="value"><?php echo number_format($character->getStatInfo()->parryPct,2,".",","); ?> %</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="meleehaste" class="">
		<span class="name"><?php echo $armory['Haste']; ?></span>
		<span class="value">--</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="meleehit" class="">
		<span class="name"><?php echo $armory['Hit']; ?></span>
		<span class="value">--</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="meleecrit" class="">
		<span class="name"><?php echo $armory['Crit']; ?></span>
		<span class="value"><?php echo number_format($character->getStatInfo()->critPct,2,".",","); ?> %</span>
	<span class="clear"><!-- --></span>
	</li>
		</ul>
	</div>
    </div>
	<div class="summary-stats-end"></div></div>

		<div id="summary-stats-simple" class="summary-stats-simple" style=" display: none">
			<div class="summary-stats-simple-base">
	    <div class="summary-stats-column">
		<h4><?php echo $armory['Base']; ?></h4>
		<ul>
	<li data-id="strength" class="">
		<span class="name"><?php echo $armory['strength']; ?></span>
		<span class="value color-q2"><?php echo $character->getStatInfo()->strength; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="agility" class="">
		<span class="name"><?php echo $armory['Agility']; ?></span>
		<span class="value"><?php echo $character->getStatInfo()->agility; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="stamina" class="">
		<span class="name"><?php echo $armory['stamina']; ?></span>
		<span class="value color-q2"><?php echo $character->getStatInfo()->stamina; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="intellect" class="">
		<span class="name"><?php echo $armory['Intellect']; ?></span>
		<span class="value color-q2"><?php echo $character->getStatInfo()->intellect; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="spirit" class="">
		<span class="name"><?php echo $armory['Spirit']; ?></span>
		<span class="value"><?php echo $character->getStatInfo()->spirit; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="mastery" class="">
		<span class="name"><?php echo $armory['Mastery']; ?></span>
		<span class="value">--</span>
	<span class="clear"><!-- --></span>
	</li>
		</ul>
	</div>
	</div>
	<div class="summary-stats-simple-other">
		<a id="summary-stats-simple-arrow" class="summary-stats-simple-arrow" href="javascript:;"></a>
	<div class="summary-stats-column">
		<h4><?php echo $armory['Melee']; ?></h4>
		<ul>
		<li data-id="meleedamage" class="">
			<span class="name"><?php echo $armory['Damage'];?></span>
			<span class="value">--</span>
		<span class="clear"><!-- --></span>
		</li>
	<li data-id="meleedps" class="">
		<span class="name">DPS</span>
		<span class="value">--</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="meleeattackpower" class="">
		<span class="name"><?php echo $armory['AP'];?></span>
		<span class="value color-q2"><?php echo $character->getStatInfo()->attackPower; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="meleespeed" class="">
		<span class="name"><?php echo $armory['Speed'];?></span>
		<span class="value">--</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="meleehaste" class="">
		<span class="name"><?php echo $armory['Haste'];?></span>
		<span class="value">--</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="meleehit" class="">
		<span class="name"><?php echo $armory['Hit'];?></span>
		<span class="value">--</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="meleecrit" class="">
		<span class="name"><?php echo $armory['Crit'];?></span>
		<span class="value"><?php echo number_format($character->getStatInfo()->critPct,2,".",","); ?> %</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="expertise" class="">
		<span class="name"><?php echo $armory['Expertise'];?></span>
		<span class="value">--</span>
	<span class="clear"><!-- --></span>
	</li>
		</ul>
	</div>
	<div class="summary-stats-column" style="display: none">
		<h4><?php echo $armory['Ranged']; ?></h4>
		<ul>
	<li data-id="rangeddamage" class=" no-tooltip">
		<span class="name"><?php echo $armory['Damage'];?></span>
		<span class="value color-q0">--</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="rangeddps" class=" no-tooltip">
		<span class="name">DPS</span>
		<span class="value color-q0"->-</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="rangedattackpower" class="">
		<span class="name"><?php echo $armory['AP'];?></span>
		<span class="value color-q2"><?php echo $character->getStatInfo()->rangedAttackPower; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="rangedspeed" class=" no-tooltip">
		<span class="name"><?php echo $armory['Speed'];?></span>
		<span class="value color-q0">--</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="rangedhaste" class="">
		<span class="name"><?php echo $armory['Haste'];?></span>
		<span class="value">--</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="rangedhit" class="">
		<span class="name"><?php echo $armory['Hit'];?></span>
		<span class="value">--</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="rangedcrit" class="">
		<span class="name"><?php echo $armory['Crit'];?></span>
		<span class="value"><?php echo number_format($character->getStatInfo()->rangedCritPct,2,".",","); ?> %</span>
	<span class="clear"><!-- --></span>
	</li>
		</ul>
	</div>
	<div class="summary-stats-column" style="display: none">
		<h4><?php echo $armory['Spell']; ?></h4>
		<ul>
	<li data-id="spellpower" class="">
		<span class="name"><?php echo $armory['AP'];?></span>
		<span class="value"><?php echo $character->getStatInfo()->spellPower; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="spellhaste" class="">
		<span class="name"><?php echo $armory['Haste'];?></span>
		<span class="value">--</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="spellhit" class="">
		<span class="name"><?php echo $armory['Hit'];?></span>
		<span class="value">--</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="spellcrit" class="">
		<span class="name"><?php echo $armory['Crit'];?></span>
		<span class="value"><?php echo number_format($character->getStatInfo()->SpellCritPct,2,".",","); ?> %</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="spellpenetration" class="">
		<span class="name"><?php echo $armory['Penetration'];?></span>
		<span class="value">--</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="manaregen" class="">
		<span class="name"><?php echo $armory['manaReg'];?></span>
		<span class="value">--</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="combatregen" class="">
		<span class="name"><?php echo $armory['combatReg'];?></span>
		<span class="value">--</span>
	<span class="clear"><!-- --></span>
	</li>
		</ul>
	</div>
	<div class="summary-stats-column" style="display: none">
		<h4><?php echo $armory['Defense'] ?></h4>
		<ul>
	<li data-id="armor" class="">
		<span class="name"><?php echo $armory['armour'];?></span>
		<span class="value color-q2"><?php echo $character->getStatInfo()->armor; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="dodge" class="">
		<span class="name"><?php echo $armory['Dodge'];?></span>
		<span class="value"><?php echo number_format($character->getStatInfo()->dodgePct,2,".",","); ?> %</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="parry" class="">
		<span class="name"><?php echo $armory['Parry'];?></span>
		<span class="value"><?php echo number_format($character->getStatInfo()->parryPct,2,".",","); ?> %</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="block" class="">
		<span class="name"><?php echo $armory['Block'];?></span>
		<span class="value"><?php echo number_format($character->getStatInfo()->parryPct,2,".",","); ?> %</span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="resilience" class="">
		<span class="name"><?php echo $armory['Resilience'];?></span>
		<span class="value">--</span>
	<span class="clear"><!-- --></span>
	</li>
		</ul>
	</div>
	<div class="summary-stats-column" style="display: none">
		<h4><?php echo $armory['Resis']; ?></h4>
		<ul>
	<li data-id="arcaneres" class=" has-icon">
		<span class="icon">
		<span class="icon-frame frame-12 ">
			<img src="http://eu.media.blizzard.com/wow/icons/18/resist_arcane.jpg" alt="" width="12" height="12" />
		</span>
        </span>
		<span class="name"><?php echo $armory['Arcane']; ?></span>
		<span class="value"><?php echo $character->getStatInfo()->resArcane; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="fireres" class=" has-icon">
		<span class="icon">
		<span class="icon-frame frame-12 ">
			<img src="http://eu.media.blizzard.com/wow/icons/18/resist_fire.jpg" alt="" width="12" height="12" />
		</span>
        </span>
		<span class="name"><?php echo $armory['Fire']; ?></span>
		<span class="value"><?php echo $character->getStatInfo()->resFire; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="frostres" class=" has-icon">
		<span class="icon">
		<span class="icon-frame frame-12 ">
			<img src="http://eu.media.blizzard.com/wow/icons/18/resist_frost.jpg" alt="" width="12" height="12" />
		</span>
        </span>
		<span class="name"><?php echo $armory['Frost']; ?></span>
		<span class="value"><?php echo $character->getStatInfo()->resFrost; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="natureres" class=" has-icon">
		<span class="icon">
		<span class="icon-frame frame-12 ">
			<img src="http://eu.media.blizzard.com/wow/icons/18/resist_nature.jpg" alt="" width="12" height="12" />
		</span>
        </span>
		<span class="name"><?php echo $armory['Nature']; ?></span>
		<span class="value"><?php echo $character->getStatInfo()->resNature; ?></span>
	<span class="clear"><!-- --></span>
	</li>
	<li data-id="shadowres" class=" has-icon">
		<span class="icon">
		<span class="icon-frame frame-12 ">
			<img src="http://eu.media.blizzard.com/wow/icons/18/resist_shadow.jpg" alt="" width="12" height="12" />
		</span>
        </span>
		<span class="name"><?php echo $armory['Shadow']; ?></span>
		<span class="value"><?php echo $character->getStatInfo()->resShadow; ?></span>
	<span class="clear"><!-- --></span>
	</li>
		</ul>
	</div>
</div>
<div class="summary-stats-end"></div>
</div>
<a href="javascript:;" id="summary-stats-toggler" class="summary-stats-toggler"><span class="inner"><span class="arrow"><?php echo $armory['showAll']; ?></span></span></a>
</div>
<script type="text/javascript">
        //<![CDATA[
		$(document).ready(function() {
			new Summary.Stats({

			"health": <?php echo @$get["health"] ?>,
			"power": <?php echo @$get["power1"] ?>,
			"powerTypeId": 0,
			"hasOffhandWeapon": false,
			"masteryName": "Hand of Light",
			"masteryDescription": "Your Templar\'s Verdict, Crusader Strike, and Divine Storm deal 17% additional damage as Holy damage.  Each point of Mastery increases the damage by an additional 2.1%.",
			"averageItemLevelEquipped": 20,
			"averageItemLevelBest": 20,
			"spellHitRating": 0,
			"agiBase": 239,
			"energy": <?php echo @$get["power4"] ?>,
			"expertiseOffPercent": 0,
			"critPercent": <?php echo @$gets["critPct"] ?>,
			"rangeCritPercent": <?php echo @$gets["rangedCritPct"] ?>,
			"dodgeRatingPercent": <?php echo @$gets["dodgePct"] ?>,
			"parry": <?php echo @$gets["parryPct"] ?>,
			"parryRating": 0,
			"rangeBonusWeaponRating": 0,
			"atkPowerBase": 270,
			"runicPower": <?php echo @$get["power4"] ?>,
			"rangeHitPercent": 1,
			"bonusOffWeaponRating": 0,
			"resilience_damage": 0,
			"mana": <?php echo @$get["power1"] ?>,
			"masteryRatingBonus": 0,
			"dmgMainSpeed": 2.4709999561309814,
			"rangeAtkPowerBonus": 4,
			"expertiseMain": 0,
			"shadowDamage": 113,
			"rangeHitRating": 0,
			"spellDmg_petSpellDmg": -1,
			"shadowResist": 26,
			"resistNature_pet": -1,
			"armorPercent": 43.17439651489258,
			"spellHitRatingPercent": 0,
			"manaRegenPerFive": 42,
			"dmgRangeDps": -1,
			"frostCrit": 6.986073017120361,
			"armorPenetrationPercent": 0,
			"resistShadow_pet": -1,
			"focus": <?php echo @$get["power3"] ?>,
			"rangeHitRatingPercent": 0,
			"natureResist": 0,
			"intTotal": <?php echo @$gets["maxpower1"] ?>,
			"expertiseRating": 0,
			"bonusOffMainWeaponSkill": 0,
			"frostResist": 0,
			"int_mp": <?php echo @$gets["maxpower1"] ?>,
			"arcaneCrit": 6.986073017120361,
			"holyCrit": 6.986073017120361,
			"bonusMainWeaponSkill": 0,
			"natureCrit": 6.986073017120361,
			"sprBase": 41,
			"agi_ap": -1,
			"dodge": 5,
			"atkPowerBonus": 4,
			"spr_regen": 43,
			"expertiseRatingPercent": 0,
			"mastery": 0,
			"health": <?php echo @$get["health"] ?>,
			"manaRegenCombat": 27,
			"sprTotal": 41,
			"rangeCritRatingPercent": 2.0634920597076416,
			"dodgeRating": 0,
			"bonusMainWeaponRating": 0,
			"intBase": 231,
			"strBase": 234,
			"critRatingPercent": <?php echo @$gets["critPct"] ?>,
			"rangeHasteRatingPercent": 1.1555559635162354,
			"rangeBonusWeaponSkill": 0,
			"dmgRangeMin": -1,
			"rangeHasteRating": 4,
			"dmgOffSpeed": 1.9769999980926514,
			"resistFire_pet": -1,
			"defense": 0,
			"strTotal": <?php echo @$gets["strength"] ?>,
			"fireCrit": 6.986073017120361,
			"natureDamage": 113,
			"dmgMainMax": 102,
			"dmgMainMin": 77,
			"resilience_crit": 0,
			"holyResist": 0,
			"rangeAtkPowerBase": 0,
			"dmgOffMin": 0,
			"spellHitPercent": 9,
			"spellDmg_petAp": -1,
			"agi_armor": 64,
			"resistHoly_pet": -1,
			"hitRating": 0,
			"str_ap": 192,
			"block_damage": 30,
			"dmgOffMax": 0,
			"masteryRating": 0,
			"spellCritRating": 10,
			"resilience": 0,
			"expertiseOff": 0,
			"defensePercent": 0,
			"blockRating": 0,
			"armor_petArmor": -1,
			"block": 5,
			"dmgOffDps": 0,
			"dmgRangeMax": -1,
			"power": <?php echo @$get["power1"] ?>,
			"resistArcane_pet": -1,
			"dmgMainDps": 36.281612396240234,
			"healing": 113,
			"str_block": 53,
			"rangeAtkPowerLoss": 0,
			"rangeCritRating": 10,
			"fireDamage": 113,
			"shadowCrit": 6.986073017120361,
			"hasteRating": 4,
			"arcaneDamage": 113,
			"rangeAtkPowerTotal": 4,
			"expertiseMainPercent": 0,
			"atkPowerTotal": 274,
			"agiTotal": 32,
			"ap_dps": 19.571428298950195,
			"atkPowerLoss": 0,
			"staBase": 218,
			"fireResist": 0,
			"blockRatingPercent": 0,
			"hitRatingPercent": 0,
			"hitPercent": 1,
			"int_crit": 0,
			"rap_petSpellDmg": -1,
			"arcaneResist": 0,
			"resistFrost_pet": -1,
			"dmgRangeSpeed": -1,
			"hasteRatingPercent": 1.1555559635162354,
			"frostDamage": 113,
			"sta_hp": <?php echo @$gets["maxhealth"] ?>,
			"agi_crit": 4.045567989349365,
			"rage": <?php echo @$get["power4"] ?>,
			"armorTotal": 1983,
			"sta_petSta": -1,
			"spellCritRatingPercent": 2.0634920597076416,
			"armorBase": 1817,
			"spellCritPercent": 6.986073017120361,
			"critRating": 00,
			"armorPenetration": 0,
			"spellPenetration": 0,
			"parryRatingPercent": <?php echo @$gets["parryPct"] ?>,
			"spellDamage": 113,
			"staTotal": <?php echo @$gets["stamina"] ?>,
			"rap_petAp": -1,
			"holyDamage": 113,
	"foo": true
});
		});
        //]]>
        </script>
<div class="summary-stats-bottom">
<div class="summary-battlegrounds">
	<ul>
		<li class="rating"><span class="name">Total Honor</span><span class="value"><?php echo @$honor ?></span><span class="clear"><!-- --></span></li>
		<li class="kills"><span class="name">Total Conquest</span><span class="value"><?php echo @$conq ?></span><span class="clear"><!-- --></span></li>
	</ul>
</div>
<div class="summary-professions">
<ul>
	<li>
	<div class="profile-progress border-3" >
		<div class="bar border-3 hover" style="width: 1%"></div>
			<div class="bar-contents">						
			<a class="profession-details" href="">
			<span class="icon">
            <span class="icon-frame frame-12 ">
			    <img src="http://eu.media.blizzard.com/wow/icons/18/trade_herbalism.jpg" alt="" width="12" height="12" />
		    </span>
            </span>
			<span class="name">Herbalism</span>
			<span class="value">0</span>
			</a>
           </div>
	</div>
    </li>
	<li>
	<div class="profile-progress border-3" >
		<div class="bar border-3 hover" style="width: 1%"></div>
		<div class="bar-contents">						
			<a class="profession-details" href="">
			<span class="icon">
			<span class="icon-frame frame-12 ">
				<img src="http://eu.media.blizzard.com/wow/icons/18/inv_pick_02.jpg" alt="" width="12" height="12" />
			</span>
		    </span>
			<span class="name">Mining</span>
			<span class="value">0</span></a>
        </div>
	</div>
	</li>
</ul>
</div>
	<span class="clear"><!-- --></span>
</div>
</div>
</div>
<span class="clear"><!-- --></span>
	<span class="clear"><!-- --></span>
		<div class="summary-lastupdate">Last updated on 09/08/2011</div>
    </div>
</div>
	<span class="clear"><!-- --></span>
	</div>
        <script type="text/javascript">
        //<![CDATA[
		$(function() {
			Profile.url = '/wow/en/character/moonglade/Me/summary';
		});

			var MsgProfile = {
				tooltip: {
					feature: {
						notYetAvailable: "This feature is not yet available."
					},
					vault: {
						character: "This section is only accessible if you are logged in as this character.",
						guild: "This section is only accessible if you are logged in as a character belonging to this guild."
					}
				}
			};
        //]]>
        </script>
        <script type="text/javascript">
        //<![CDATA[
		var MsgSummary = {
			inventory: {
				slots: {
					1: "Head",
					2: "Neck",
					3: "Shoulder",
					4: "Shirt",
					5: "Chest",
					6: "Waist",
					7: "Legs",
					8: "Feet",
					9: "Wrist",
					10: "Hands",
					11: "Finger",
					12: "Trinket",
					15: "Ranged",
					16: "Back",
					19: "Tabard",
					21: "Main Hand",
					22: "Off Hand",
					28: "Relic",
					empty: "Empty slot"
				}
			},
			audit: {
				whatIsThis: "This feature makes recommendations on how this character can be improved. The following is verified:<br /\><br /\>- Empty glyph slots<br /\>- Unspent talent points<br /\>- Unenchanted items<br /\>- Empty sockets<br /\>- Non-optimal armour<br /\>- Missing belt buckle<br /\>- Unused profession perks",
				missing: "Missing {0}",
				enchants: {
					tooltip: "Unenchanted"
				},
				sockets: {
					singular: "empty socket",
					plural: "empty sockets"
				},
				armor: {
					tooltip: "Non-{0}",
					1: "Cloth",
					2: "Leather",
					3: "Mail",
					4: "Plate"
				},
				lowLevel: {
					tooltip: "Low level"	
				},
				blacksmithing: {
					name: "Blacksmithing",
					tooltip: "Missing socket"
				},
				enchanting: {
					name: "Enchanting",
					tooltip: "Unenchanted"
				},
				engineering: {
					name: "Engineering",
					tooltip: "Missing tinker"
				},
				inscription: {
					name: "Inscription",
					tooltip: "Missing enchant"
				},
				leatherworking: {
					name: "Leatherworking",
					tooltip: "Missing enchant"
				}
			},
			talents: {
				specTooltip: {
					title: "Talent Specializations",
					primary: "Primary:",
					secondary: "Secondary:",
					active: "Active"
				}
			},
			stats: {
				toggle: {
					all: <?php echo $armory["showAll"] ?>,
					core: <?php echo $armory["showMain"] ?>,
				},
				increases: {
					attackPower: "Increases Attack Power by {0}.",
					critChance: "Increases Crit chance by {0}%.",
					spellCritChance: "Increases Spell Crit chance by {0}%.",
					health: "Increases Health by {0}.",
					mana: "Increases Mana by {0}.",
					manaRegen: "Increases mana regeneration by {0} every 5 seconds while not casting.",
					meleeDps: "Increases damage with melee weapons by {0} damage per second.",
					rangedDps: "Increases damage with ranged weapons by {0} damage per second.",
					petArmor: "Increases your pet’s Armour by {0}.",
					petAttackPower: "Increases your pet’s Attack Power by {0}.",
					petSpellDamage: "Increases your pet’s Spell Damage by {0}.",
					petAttackPowerSpellDamage: "Increases your pet’s Attack Power by {0} and Spell Damage by {1}."
				},
				decreases: {
					damageTaken: "Reduces Physical Damage taken by {0}%.",
					enemyRes: "Reduces enemy resistances by {0}.",
					dodgeParry: "Reduces chance to be dodged or parried by {0}%."
				},
				noBenefits: "Provides no benefit for your class.",
				beforeReturns: "(Before diminishing returns)",
				damage: {
					speed: "Attack speed (seconds):",
					damage: "Damage:",
					dps: "Damage per second:"
				},
				averageItemLevel: {
					title: "Item Level {0}",
					description: "The average item level of your best equipment. Increasing this will allow you to enter more difficult dungeons using Dungeon Finder."
				},
				health: {
					title: "Health {0}",
					description: "Your maximum amount of health. If your health reaches zero, you will die."
				},
				mana: {
					title: "Mana {0}",
					description: "Your maximum mana. Mana allows you to cast spells."
				},
				rage: {
					title: "Rage 100",
					description: "Your maximum rage. Rage is consumed when using abilities and is restored by attacking enemies or being damaged in combat."
				},
				focus: {
					title: "Focus 100",
					description: "Your maximum focus. Focus is consumed when using abilities and is restored automatically over time."
				},
				energy: {
					title: "Energy 100",
					description: "Your maximum energy. Energy is consumed when using abilities and is restored automatically over time."
				},
				runic: {
					title: "Runic 100",
					description: "Your maximum Runic Power."
				},
				strength: {
					title: "Strength {0}"
				},
				agility: {
					title: "Agility {0}"
				},
				stamina: {
					title: "Stamina {0}"
				},
				intellect: {
					title: "Intellect {0}"
				},
				spirit: {
					title: "Spirit {0}"
				},
				mastery: {
					title: "Mastery {0}",
					description: "Mastery rating of {0} adds {1} Mastery.",
					unknown: "You must learn Mastery from your trainer before this will have an effect.",
					unspecced: "You must select a talent specialization in order to activate Mastery."
				},
				meleeDps: {
					title: "Damage per Second"
				},
				meleeAttackPower: {
					title: "Melee Attack Power {0}"
				},
				meleeSpeed: {
					title: "Melee Attack Speed {0}"
				},
				meleeHaste: {
					title: "Melee Haste {0}%",
					description: "Haste rating of {0} adds {1}% Haste.",
					description2: "Increases melee attack speed."
				},
				meleeHit: {
					title: "Melee Hit Chance {0}%",
					description: "Hit rating of {0} adds {1}% Hit chance."
				},
				meleeCrit: {
					title: "Melee Crit Chance {0}%",
					description: "Crit rating of {0} adds {1}% Crit chance.",
					description2: "Chance of melee attacks doing extra damage."
				},
				expertise: {
					title: "Expertise {0}",
					description: "Expertise rating of {0} adds {1} Expertise."
				},
				rangedDps: {
					title: "Damage per Second"
				},
				rangedAttackPower: {
					title: "Ranged Attack Power {0}"
				},
				rangedSpeed: {
					title: "Ranged Attack Speed {0}"
				},
				rangedHaste: {
					title: "Ranged Haste {0}%",
					description: "Haste rating of {0} adds {1}% Haste.",
					description2: "Increases ranged attack speed."
				},
				rangedHit: {
					title: "Ranged Hit Chance {0}%",
					description: "Hit rating of {0} adds {1}% Hit chance."
				},
				rangedCrit: {
					title: "Ranged Crit Chance {0}%",
					description: "Crit rating of {0} adds {1}% Crit chance.",
					description2: "Chance of ranged attacks doing extra damage."
				},
				spellPower: {
					title: "Spell Power {0}",
					description: "Increases the damage and healing of spells."
				},
				spellHaste: {
					title: "Spell Haste {0}%",
					description: "Haste rating of {0} adds {1}% Haste.",
					description2: "Increases spell casting speed."
				},
				spellHit: {
					title: "Spell Hit Chance {0}%",
					description: "Hit rating of {0} adds {1}% Hit chance."
				},
				spellCrit: {
					title: "Spell Crit Chance {0}%",
					description: "Crit rating of {0} adds {1}% Crit chance.",
					description2: "Chance of spells doing extra damage or healing."
				},
				spellPenetration: {
					title: "Spell Penetration {0}"
				},
				manaRegen: {
					title: "Mana Regen",
					description: "{0} mana regenerated every 5 seconds while not in combat."
				},
				combatRegen: {
					title: "Combat Regen",
					description: "{0} mana regenerated every 5 seconds while in combat."
				},
				armor: {
					title: "Armour {0}"
				},
				dodge: {
					title: "Dodge Chance {0}%",
					description: "Dodge rating of {0} adds {1}% Dodge chance."
				},
				parry: {
					title: "Parry Chance {0}%",
					description: "Parry rating of {0} adds {1}% Parry chance."
				},
				block: {
					title: "Block Chance {0}%",
					description: "Block rating of {0} adds {1}% Block chance.",
					description2: "Your block stops {0}% of incoming damage."
				},
				resilience: {
					title: "Resilience {0}",
					description: "Provides {0}% damage reduction against all damage done by players and their pets or minions."
				},
				arcaneRes: {
					title: "Arcane Resistance {0}",
					description: "Reduces Arcane damage taken by an average of {0}%."
				},
				fireRes: {
					title: "Fire Resistance {0}",
					description: "Reduces Fire damage taken by an average of {0}%."
				},
				frostRes: {
					title: "Frost Resistance {0}",
					description: "Reduces Frost damage taken by an average of {0}%."
				},
				natureRes: {
					title: "Nature Resistance {0}",
					description: "Reduces Nature damage taken by an average of {0}%."
				},
				shadowRes: {
					title: "Shadow Resistance {0}",
					description: "Reduces Shadow damage taken by an average of {0}%."
				}
			},
			recentActivity: {
				subscribe: "Subscribe to this feed"
			},
			raid: {
				tooltip: {
					normal: "(Normal)",
					heroic: "(Heroic)",
					complete: "{0}% complete ({1}/{2})",
					optional: "(optional)"
					}
				},
			links: {
				tools: "Tools",
				saveImage: "Export character image",
				saveimageTitle: "Export your character image for use with the World of Warcraft Rewards Visa credit card."
				}
		};
        //]]>
        </script>
</div>
</div>
</div>
<?php include("footer.php"); ?>
<script type="text/javascript">
//<![CDATA[
var xsToken = '';
var Msg = {
support: {
ticketNew: 'Ticket {0} was created.',
ticketStatus: 'Ticket {0}’s status changed to� {1}.',
ticketOpen: 'Open',
ticketAnswered: 'Answered',
ticketResolved: 'Resolved',
ticketCanceled: 'Cancelled',
ticketArchived: 'Archived',
ticketInfo: 'Need� Info',
ticketAll: 'View All Tickets'
},
cms: {
requestError: 'Your request cannot be completed.',
ignoreNot: 'Not ignoring this user',
ignoreAlready: 'Already ignoring this user',
stickyRequested: 'Sticky requested',
stickyHasBeenRequested: 'You have already sent a sticky request for this topic.',
postAdded: 'Post added to tracker',
postRemoved: 'Post removed from tracker',
userAdded: 'User added to tracker',
userRemoved: 'User removed from tracker',
validationError: 'A required field is incomplete',
characterExceed: 'The post body exceeds XXXXXX characters.',
searchFor: "Search for",
searchTags: "Articles tagged:",
characterAjaxError: "You may have become logged out. Please refresh the page and try again.",
ilvl: "Level {0}",
shortQuery: "Search requests must be at least three characters long."
},
bml: {
bold: 'Bold',
italics: 'Italics',
underline: 'Underline',
list: 'Unordered List',
listItem: 'List Item',
quote: 'Quote',
quoteBy: 'Posted by {0}',
unformat: 'Remove Formating',
cleanup: 'Fix Linebreaks',
code: 'Code Blocks',
item: 'WoW Item',
itemPrompt: 'Item ID:',
url: 'URL',
urlPrompt: 'URL Address:'
},
ui: {
submit: 'Submit',
cancel: 'Cancel',
reset: 'Reset',
viewInGallery: 'View in gallery',
loading: 'Loading...',
unexpectedError: 'An error has occurred',
fansiteFind: 'Find this on...',
fansiteFindType: 'Find {0} on...',
fansiteNone: 'No fansites available.'
},
grammar: {
colon: '{0}:',
first: 'First',
last: 'Last'
},
fansite: {
achievement: 'achievement',
character: 'character',
faction: 'faction',
'class': 'class',
object: 'object',
talentcalc: 'talents',
skill: 'profession',
quest: 'quest',
spell: 'spell',
event: 'event',
title: 'title',
arena: 'arena team',
guild: 'guild',
zone: 'zone',
item: 'item',
race: 'race',
npc: 'NPC',
pet: 'pet'
},
search: {
kb: 'Support',
post: 'Forums',
article: 'Blog Articles',
static: 'General Content',
wowcharacter: 'Characters',
wowitem: 'Items',
wowguild: 'Guilds',
wowarenateam: 'Arena Teams',
other: 'Other'
}
};
//]]>
</script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/menu.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/js/wow.js"></script>
<script type="text/javascript">
//<![CDATA[
$(function(){
Menu.initialize('/data/menu.json');
Search.initialize('/ta/lookup');
});
//]]>
</script>
<script src="<?php echo BASE_URL ?>wow/static/js/profile.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/js/character/summary.js"></script>
<script type="text/javascript">
//<![CDATA[
Core.load("<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js");
Core.load("<?php echo BASE_URL ?>wow/static/local-common/js/search.js");
Core.load("<?php echo BASE_URL ?>wow/static/local-common/js/login.js", false, function() {
if (typeof Login !== 'undefined') {
Login.embeddedUrl = '<?php echo BASE_URL ?>loginframe.php';
}
});
//]]>
</script>
<!--[if lt IE 8]> <script type="text/javascript" src="/wow/static/local-common/js/third-party/jquery.pngFix.pack.js"></script>
<script type="text/javascript">
//<![CDATA[
$('.png-fix').pngFix(); //]]>
</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
(function() {
var ga = document.createElement('script');
var src = "https://ssl.google-analytics.com/ga.js";
if ('http:' == document.location.protocol) {
src = "http://www.google-analytics.com/ga.js";
}
ga.type = 'text/javascript';
ga.setAttribute('async', 'true');
ga.src = src;
var s = document.getElementsByTagName('script');
s = s[s.length-1];
s.parentNode.insertBefore(ga, s.nextSibling);
})();
//]]>
</script>
</body>
</html>
