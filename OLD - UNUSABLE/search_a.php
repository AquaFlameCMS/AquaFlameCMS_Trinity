<?php
require_once("configs.php");
require("functions/armory_func.php");
$page_cat = "services";
?>

<!DOCTYPE html> 
<html lang="en-gb">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<title><?php echo $Ind['Ind2']; ?> - <?php echo $website['title']; ?></title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="description" content="<?php echo $website['description']; ?>">
<meta name="keywords" content="<?php echo $website['keywords']; ?>">
<link rel="shortcut icon" href="wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common.css" />
<link title="World of Warcraft - News" href="feed/newshtml.html" type="application/atom+xml" rel="alternate"/>
<link rel="stylesheet" href="wow/static/css/wow.css" />
<link rel="stylesheet" href="wow/static/local-common/css/cms/search.css" />
<link rel="stylesheet" href="wow/static/css/search.css" />
<script src="wow/static/local-common/js/third-party/jquery-1.4.4.min.js"></script>
<script src="wow/static/local-common/js/core.js"></script>
<script src="wow/static/local-common/js/tooltip.js"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
Core.staticUrl = '/wow/static';
Core.sharedStaticUrl= '/wow/static/local-common';
Core.baseUrl = '/wow/en';
Core.projectUrl = '/wow';
Core.cdnUrl = 'http://eu.media.blizzard.com/';
Core.supportUrl = 'http://eu.battle.net/support/';
Core.secureSupportUrl= 'https://eu.battle.net/support/';
Core.project = 'wow';
Core.locale = 'en-gb';
Core.language = 'en';
Core.buildRegion = 'eu';
Core.region = 'eu';
Core.shortDateFormat= 'dd/MM/yyyy';
Core.dateTimeFormat = 'dd/MM/yyyy HH:mm';
Core.loggedIn = false;
Flash.videoPlayer = 'http://eu.media.blizzard.com/global-video-player/themes/wow/video-player.swf';
Flash.videoBase = 'http://eu.media.blizzard.com/wow/media/videos';
Flash.ratingImage = '../../../eu.media.blizzard.com/global-video-player/ratings/wow/rating-pegi.jpg';
Flash.expressInstall= 'http://eu.media.blizzard.com/global-video-player/expressInstall.swf';
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-544112-16']);
_gaq.push(['_setDomainName', '.battle.net']);
_gaq.push(['_trackPageview']);
_gaq.push(['_trackPageLoadTime']);
//]]>
</script>
</head>
<body class="en-gb search-win">
	<div id="wrapper">
  	<?php include("header.php"); 
    include("functions/search/arena.php")
    ?>
  	<div id="content">
      <div class="content-top">
      	<div class="content-trail">
        	<ol class="ui-breadcrumb">
          	<li>
            	<a href="index.php" rel="np"><?php echo $website['title']; ?></a>
				<span class="breadcrumb-arrow"></span>
          	</li>
          	<li>
            	<a href="community" rel="np"><?php echo $Community['Community'];?></a>
				<span class="breadcrumb-arrow"></span>
          	</li>
          	<li class="last">
            	<a href="search.php" rel="np"><?php echo $Ind['Ind2']; ?></a>
          	</li>
        	</ol>
      	</div>
      	<div class="content-bot">
        	<div class="search">
          	<div class="search-left">
            	<div class="search-header">
              	<h2 class="header "><?php echo $Ind['Ind2']; ?></h2>
            	</div>
            	<?php 
            	if (!$error){
            	 echo '<ul class="dynamic-menu" id="menu-search">
              	<li class=""><a href="search.php?search='.$term.'"><span class="arrow">'.$search['summ'].'</span></a></li>';
              	if ($num_char>0){ echo '<li><a href="search_c.php?search='.$term.'"><span class="arrow">'.$status['chars'].' ('.$num_char.')'.'<span></span></span></a></li>';}
	              if ($num_guild>0){ echo '<li><a href="search_g.php?search='.$term.'"><span class="arrow">'.$guild['Guilds'].' ('.$num_guild.')'.'<span></span></span></a></li>';}
               	if ($num_arena>0){ echo '<li class="item-active"><a href="search_a.php?search='.$term.'"><span class="arrow">'.$arena['Teams'].' ('.$num_arena.')'.'<span></span></span></a></li>';}
               	if ($num_forum>0){ echo '<li><a href="search_f.php?search='.$term.'"><span class="arrow">'.$Forums['Forums'].' ('.$num_forum.')'.'<span></span></span></a></li>';}
            	 echo '</ul>';} ?>
            </div>  
          	<div class="search-right">
            	<div class="search-header">
              	<form action="<?php echo 'search.php?search='.$term; ?>" method="get" class="search-form">
              	<div>
                	<input id="search-page-field" type="text" name="search" maxlength="200" tabindex="2" value="" />
                	<button class="ui-button button1" type="submit"><span><span><?php echo $Ind['Ind2']; ?></span></span></button>
               	</div>
              	</form>
            	</div>
            	<?php if ($error){echo $no_results; } ?>
            	<div class="helpers">
              	<h3 class="subheader ">
                <?php if (!$error){echo $search['arenaResults'].'<span>'.$term.'</span>';} ?>
                </h3>
            	</div>
	<!-- Here goes the pagination code. -->
              <div class="data-options ">
              	<div class="option">
                	<ul class="ui-pagination">
                	<?php
                	if (!$error){
                  pagination($page,$num_pages,$term,'search_a.php',$ChatB['ChatB5'],$search['prev']);}
                  ?>
                	</ul>
               	</div>
              	<?php 
                if (!$error){
                echo $search['Show'].'<strong class="results-start"> '.($start+1).' </strong>-<strong class="results-end"> '.($start+$num_result).'</strong> '.$search['Of'].' <strong class="results-total"> '.($num_arena).' </strong>'.$search['Results']; }?>
              	<span class="clear"><!-- --></span>
              </div>
	<!-- And here it ends. -->
	            <?php if (!$error){ echo'
	          <div class="view-table">
              <div class="table ">
                <table>
                  <thead>
                    <tr>
                      <th width="15%" class=" first-child"><a href="" class="sort-link" ><span class="arrow">'.$search['Name'].'</span></a></th>
                      <th width="6%"><a href="" class="sort-link" ><span class="arrow">'.$search['Mode'].'</span></a></th>
                      <th><a href="" class="sort-link" ><span class="arrow">'.$search['Realm'].'</span></a></th>
                      <th class=" last-child"><a href="" class="sort-link" ><span class="arrow">'.$search['Battlegroup'].'</span></a>
                      <th width="6%"><a href="" class="sort-link" ><span class="arrow">'.$search['Faction'].'</span></a></th>
                      <th width="15%"><a href="" class="sort-link" ><span class="arrow">'.$search['Rating'].'</span></a></th></th>
                    </tr>
                  </thead>
	<!-- Here start the list of characters. -->';     //Echo first row of table
                   if ($num_arena>0){
                    echo '<tbody>';
                      while ($row = mysql_fetch_array($result)) {        //Echo list of characters
                        echo '<tr class="row1">
                        	<td><strong><a href="">'.$row["name"].'</a></strong></td>
                         	<td class="align-center">'.$row["type"].'</td>
                         	<td>'.$name_realm1['realm'].'</td>
                         	<td align="center">-</td>
                         	<td class="align-center"><span class="icon-frame frame-14 " data-tooltip=""><img src="wow/static/images/icons/faction/'.translate($row["race"]).'" alt="" width="14" height="14" /></span></td>
                       	  <td align="center">'.$row['rating'].'</td>
                         </tr>';
                      }  
                     echo '</tbody>';                 
                   }  
                   echo'                         
  <!-- Here ends the found character list. -->                    
                </table>
              </div>
            </div>';        //Close table, that's big echo is for hide everything when no results found
              }               
            ?>
	<!-- Here goes the pagination code. -->
              <div class="data-options ">
              	<div class="option">
                	<ul class="ui-pagination">
                	<?php
                	if (!$error){
                  pagination($page,$num_pages,$term,'search_a.php',$ChatB['ChatB5'],$search['prev']);}
                  ?>
                	</ul>
               	</div>
              	<?php 
                if (!$error){
                  echo $search['Show'].'<strong class="results-start"> '.($start+1).' </strong>-<strong class="results-end"> '.($start+$num_result).'</strong> '.$search['Of'].' <strong class="results-total"> '.($num_arena).' </strong>'.$search['Results'];} ?>
              	<span class="clear"><!-- --></span>                                                                                                                                                                                                     
              </div>
	<!-- And here it ends. -->
            </div>
            <span class="clear"><!-- --></span> 
          </div>
        </div>
      </div>
    </div>
    <?php 
    mysql_end($conn);
    include("footer.php"); ?>
  </div>
	<script type="text/javascript">
//<![CDATA[
var xsToken = '';
var Msg = {
support: {
ticketNew: 'Ticket {0} was created.',
ticketStatus: 'Ticket {0}’s status changed to {1}.',
ticketOpen: 'Open',
ticketAnswered: 'Answered',
ticketResolved: 'Resolved',
ticketCanceled: 'Cancelled',
ticketArchived: 'Archived',
ticketInfo: 'Need Info',
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
loading: 'Loading…',
unexpectedError: 'An error has occurred',
fansiteFind: 'Find this on…',
fansiteFindType: 'Find {0} on…',
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
<script src="wow/static/local-common/js/menu.js"></script>
<script src="wow/static/js/wow.js"></script>
<script type="text/javascript">
//<![CDATA[
$(function(){
Menu.initialize('/data/menu.json');
Search.initialize('/ta/lookup');
});
//]]>
</script>
<script src="wow/static/local-common/js/utility/dynamic-menu.js"></script>
<script src="wow/static/js/character/guild-tabard.js"></script>
<script src="wow/static/js/character/arena-flag.js"></script>
<script type="text/javascript">
//<![CDATA[
Core.load("wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js");
Core.load("wow/static/local-common/js/search.js");
Core.load("wow/static/local-common/js/login.js", false, function() {
if (typeof Login !== 'undefined') {
Login.embeddedUrl = '<?php echo $website['root'];?>loginframe.php';
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
var src = "../../../ssl.google-analytics.com/ga.js";
if ('http:' == document.location.protocol) {
src = "../../../www.google-analytics.com/ga.js";
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
