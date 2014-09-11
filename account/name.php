<?php
include("../configs.php");
$page_cat = "security";
// Check, if username session is NOT set then this page will jump to login page
if (!isset($_SESSION['username'])) {
        header('Location: '.BASE_URL.'account_log.php');		
}
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<title><?php echo TITLE ?> - Name Change</title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="description" content="<?php echo DESCRIPTION ?>">
<meta name="keywords" content="<?php echo KEYWORDS ?>">
<link rel="shortcut icon" href="<?php echo BASE_URL ?>wow/static/local-common/images/favicons/bam.ico" type="image/x-icon"/>
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/local-common/css/management/common.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/bnet.css" />
<link rel="stylesheet" media="print" href="<?php echo BASE_URL ?>wow/static/css/bnet-print.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/management/dashboard.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/management/services.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/ui.css" />
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/core.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/tooltip.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/js/bam.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/tooltip.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/menu.js"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
</head>
<body class="en-us logged-in">
<div id="layout-top">
<div class="wrapper">
<div id="header">
<?php include("../functions/header_account.php"); ?>
<?php include("../functions/footer_man_nav.php"); ?>
</div>
<div id="layout-middle">
<div class="wrapper">
<div id="content">
<script type="text/javascript" src="<?php echo BASE_URL ?>wow/static/js/management/services.js"></script>
<div class="dashboard service">
<div class="primary">
<div class="header">
<h2 class="subcategory">Character Services</h2>
<h3 class="headline">Name Change</h3>
<a href=""><img src="<?php echo BASE_URL ?>wow/static/local-common/images/game-icons/wow.png" alt="World of Warcraft" width="48" height="48" /></a>
</div>
<div class="service-wrapper">
<p class="service-nav">
    <a href="" class="active">Service</a>
    <!--<a href="">History/Status</a>-->
    <a href="account_man.php">Return to dashboard</a>
</p>

<div class="service-info">
    <div class="service-tag">
        <div class="service-tag-contents border-3">
            <div class="character-icon wow-portrait-64 no-character"></div>
            
            <div class="service-tag-description">
                <span class="character-message caption">Select a character to continue</span>
            </div>
            
            <span class="clear"><!-- --></span>
        </div>
    </div>
    
    <div class="service-summary">
        <p class="service-price headline">Cost: 
        <?php
            $price = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_db.prices WHERE service = 'name-change'"));
            if($price['type'] == "vote") echo $price['vp'] . "VP";
            else if($price['type'] == "donate") echo $price['dp'] . "DP";
            else echo "FREE";
        ?>
        </p>
        <a href="" target="_blank">Name Change table of equivalences</a>
    </div>
</div>

<div class="service-form">


<?php

function racetxt($race){
    switch($race){
        case 1: return "Human"; break;
        case 2: return "Orc"; break;
        case 3: return "Dwarf"; break;
        case 4: return "Night Elf"; break;
        case 5: return "Undead"; break;
        case 6: return "Tauren"; break;
        case 7: return "Gnome"; break;
        case 8: return "Troll"; break;
        case 9: return "Goblin"; break;
        case 10: return "Blood Elf"; break;
        case 11: return "Draenei"; break;
        case 22: return "Worgen"; break;
        
    }
}

function classtxt($class){
    switch($class){
        case 1: return "Warrior"; break;
        case 2: return "Paladin"; break;
        case 3: return "Hunter"; break;
        case 4: return "Rogue"; break;
        case 5: return "Priest"; break;
        case 6: return "Death Knight"; break;
        case 7: return "Shaman"; break;
        case 8: return "Mage"; break;
        case 9: return "Warlock"; break;
        case 10: return "Druid"; break;                
    }
}
?>

<?php
$icon = array(
	0 => 'PvE',
	1 => 'PvP',
	4 => 'PvE',
	6 => 'RP',
	8 => 'RP-PVP',
	16 => 'FFA_PVP',
);
                    
$get_realms = mysql_query("SELECT * FROM realms ORDER BY `id` ASC");
if($get_realms){
    $i=0;
    while($realm_extra = mysql_fetch_array($get_realms)){
        $realm = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.realmlist WHERE id = '".$realm_extra['realmid']."'"));
        $i++;
        $realm_data[$i]['name'] = $realm['name'];
        $realm_data[$i]['id'] = $realm['id'];
        $realm_data[$i]['locale'] = "English";
        $realm_data[$i]['icon'] = $icon[$realm['icon']];
    }
    
    $n=$i;
    echo '<script type="text/javascript" src="<?php echo BASE_URL ?>wow/static/js/management/services.js?v24"></script>';
    echo '<script type="text/javascript">
        //<![CDATA[
        Services.realmName = [';
    for($i=1;$i<=$n;$i++) if($i==$n) echo'"'.$realm[$i]['name'].'"'; else echo'"'.$realm[$i]['name'].'",';
    
    echo '];
        Services.realmID = [';
    for($i=1;$i<=$n;$i++) if($i==$n) echo'"'.$realm[$i]['id'].'"'; else echo'"'.$realm[$i]['id'].'",';
    echo '];
        
        Services.realmType = [';
    for($i=1;$i<=$n;$i++) if($i==$n) echo'"'.$realm[$i]['icon'].'"'; else echo'"'.$realm[$i]['icon'].'",';
    echo '];
        
        Services.realmLocale = [';
    for($i=1;$i<=$n;$i++) if($i==$n) echo'"'.$realm[$i]['locale'].'"'; else echo'"'.$realm[$i]['locale'].'",';
    echo '];
        
        //]]>
        </script>';
}

$get_realms = mysql_query("SELECT * FROM realms ORDER BY `id` ASC");
if($get_realms){
    $i=0;
    while($realm_extra = mysql_fetch_array($get_realms)){
        
            $realm = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.realmlist WHERE id = '".$realm_extra['realmid']."'"));
            $server_cdb = $realm_extra['char_db'];
            
            echo '
            <div class="character-list">
            <a href="#" class="realm border-2 opened" id="active-realm" rel="character-list"><span class="realm-name">'.$realm['name'].'</span></a>
            <ul id="character-list-'.$realm['name'].'" style="display: block;">';
            
                    $get_characters = mysql_query("SELECT * FROM $server_cdb.characters WHERE account = '".$account_information['id']."'");
                    while($character = mysql_fetch_array($get_characters))
                    {
                        echo '
                        <a href="name-next.php?character='.$character['guid'].'&realm='.$realm_extra['id'].'">
                        <li class="character border-4" id="'.$account_information['username'].':EU:'.$account_information['id'].'">
                            <div class="character-icon wow-portrait-64-80 wow-0-10-2 glow-shadow-3">
                                <img src="'.BASE_URL.'images/avatars/2d/'.$character['race'].'-'.$character['gender'].'.jpg" width="64" height="64" alt="" />
                            </div>
                            <div class="character-description">
                                <span class="character-name caption">'.$character['name'].'</span>
                                <span class="character-class">
                                Level '.$character['level'].' '.racetxt($character['race']).' '.classtxt($character['class']).'
                                </span>
                            </div>
                        </li>
                        </a>';
                    }
                    
            echo '</ul></div>';
            echo '<br />';
    }
}

echo '<div id="error-container" style="display: none;"></div>';

?>
    <!-- Recheck whats Wrong -->
</center>
<div id="error-container" style="display: none;"></div>
<script type="text/javascript">
//<![CDATA[
var additionalMessages = {
'error': {
'title': 'Error:',
'serverTitle': 'Server Unavailable',
'serverDesc': 'Please try again later',
'retry': '<a href="#retry" onclick="return false;">Try Again</a>',
'multiDesc': 'Please address <a href="#retry" onclick="return false;" onmouseover="Tooltip.show(this, \'#error-container\', {\'location\': \'mouse\'});">these issues</a>',
'20012Title': 'Character is an active guild master',
'20012Desc': 'Log in and disband your guild or promote another character to guild master, then log out.',
'20016Title': 'Character has mail in mailbox',
'20016Desc': 'Log in to the game and clear your character's mailbox, then log out.',
'20032Title': 'Character's gold exceeds the limit for their level',
'20032Desc': 'Log in and reduce your character's gold so that it is under the limit, then log out.',
'20033Title': 'Character has active auctions',
'20033Desc': 'Log in and cancel your auctions, then log out.',
'20034Title': 'Logged in too recently',
'20034Desc': 'The character must be logged out for at least 20 minutes.',
'20057Title': 'Logged in too recently',
'20057Desc': 'Character has service pending.',
'20064Title': 'Already requested',
'20064Desc': 'Log in and disband your arena team or promote another character to captain, then log out.',
'unknown': 'Unknown error'
},
'loading': {
'title': 'Checking Eligibility'
},
'active': {
serviceName: 'PRC',
viewingRealm: '619'
}
};
//]]>
</script>
<div class="service-interior realm-selector" id="realm-selector" style="display: none;">
<p class="caption">If you have characters on a realm not shown above, please enter the realm name and we'll try to retrieve a character list for that realm.</p>
<form method="post">
<input type="hidden" name="l" value=""/>
<input type="hidden" name="r" value="EU"/>
<div class="hiddenInputWrapper">
<input type="hidden" name="action" value="CHECK_REALM" />
</div>
<div class="form-row-stacked">
<label><strong class="secondary-label">Enter your new realm:</strong></label><br />
<div style="position:relative; margin-bottom:40px;">
<input type="text" id="realm-type-ahead" value="" class="input border-5 glow-shadow-2" autocomplete="off" />
<input type="hidden" name="sr" id="targetRealmId" value="0" />
</div>
</div>
<span class="clear"><!-- --></span>
<a class="combobox-link icon-search" style="margin-top:0px;" onclick="Services.showRealmSelectDialog();">View all realms</a>
<fieldset class="ui-controls section-stacked" >
<button
class="ui-button button1 "
type="submit"
tabindex="1"
>
<span>
<span>Check Realm</span>
</span>
</button>
<a class="ui-cancel "
href="<?php echo BASE_URL ?>wow/static/"
id="realm-selector-cancel"
tabindex="1">
<span>
Cancel </span>
</a>
</fieldset>
</form>
</div>
</div>
<span class="clear"><!-- --></span>
</div>
</div>
</div>
<div class="realmselect-dialog" style="display:none;" id="realmselect-dialog" title="Select a realm">
<p>Choose a realm from the available list</p>
<div class="filter-controls">
<input type="text" id="name-filter" class="border-5 glow-shadow-2" />
<select class="input border-5 glow-shadow-2" id="realm-type-filter">
<option value=""></option>
<option value="PVE">PVE</option>
<option value="PVP">PVP</option>
<option value="RP">RP</option>
<option value="RPPVP">RPPVP</option>
</select>
<select class="input border-5 glow-shadow-2" id="realm-locale-filter">
<option value=""></option>
<option value="United States">United States</option>
<option value="Oceanic">Oceanic</option>
<option value="Latin America">Latin America</option>
<option value="English">English</option>
<option value="German">German</option>
<option value="French">French</option>
<option value="Spanish">Spanish</option>
<option value="Russian">Russian</option>
<option value="CN 1">CN 1</option>
<option value="CN 2">CN 2</option>
<option value="CN 3">CN 3</option>
<option value="CN 5">CN 5</option>
<option value="CN 10">CN 10</option>
</select>
<span class="name-label">NAME</span>
<span class="realm-type-label">TYPE</span>
<span class="realm-locale-label">LOCALE</span>
<span class="button-container">
<span class="small-button" onclick="Services.filterRealmDataTable();">Filter</span>
<span class="reset-link" onclick="Services.resetRealmFilter();">Reset</span>
</span>
</div>
<div class="table-options" id="table-options-top">
<div class="option">
<ul class="ui-pagination">
<li><a href="#">…</a></li>
</ul>
</div>
<span class="position">
Showing <strong class="results-start">…</strong>–<strong class="results-end">…</strong> of <strong class="results-total">…</strong> results
</span>
</div>
<span class="clear"><!-- --></span>
<table id="realm-table">
<thead>
<tr>
<th class="guid">GUID</th>
<th class="header" scope="col" width="300"><a href="#" class="sort-link"><span class="arrow">NAME</span></a></th>
<th class="header" scope="col" width="100"><a href="#" class="sort-link"><span class="arrow">TYPE</span></a></th>
<th class="header" scope="col"><a href="#" class="sort-link"><span class="arrow">LOCALE</span></a></th>
</tr>
</thead>
</table>
<div class="table-options" id="table-options-bottom">
<div class="option">
<ul class="ui-pagination">
<li><a href="#">…</a></li>
</ul>
</div>
<span class="position">
Showing <strong class="results-start">…</strong>–<strong class="results-end">…</strong> of <strong class="results-total">…</strong> results
</span>
</div>
<span class="clear"><!-- --></span>
</div>
<script type="text/javascript">
//<![CDATA[
$(function() {
$(".realmselect-dialog").dialog("destroy");
$('.realmselect-dialog').dialog({
autoOpen: false,
modal: true,
position: "center",
resizeable: false,
closeText: "Close",
width: 570,
height: 580,
open: function() {
}
});
});
//]]>
</script>
</div>
</div>
</div>
<div id="layout-bottom">
<?php include("../functions/footer_man.php"); ?>
</div><script type="text/javascript">
//<![CDATA[
var xsToken = '7abb4c16-95ff-4b34-a14b-72afd1e0b7e2';
var Msg = {
support: {
ticketNew: 'Ticket {0} was created.',
ticketStatus: 'Ticket {0}'s status changed to {1}.',
ticketOpen: 'Open',
ticketAnswered: 'Answered',
ticketResolved: 'Resolved',
ticketCanceled: 'Canceled',
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

<script type="text/javascript">
//<![CDATA[

$(function() {

$(".realmselect-dialog").dialog("destroy");

$('.realmselect-dialog').dialog({

autoOpen: false,

modal: true,

position: "center",

resizeable: false,

closeText: "Close",

width: 570,

height: 580,

open: function() {

}

});

});

//]]>
</script>

<script type="text/javascript">
$(function() {
Menu.initialize();
Menu.config.colWidth = 190;
Locale.dataPath = 'data/i18n.frag.xml';
});
</script>
<!--[if lt IE 8]>
<script type="text/javascript" src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery.pngFix.pack.js"></script>
<script type="text/javascript">$('.png-fix').pngFix();</script>
<![endif]-->
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery-ui-1.8.1.custom.min.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/table.js"></script>
<script type="text/javascript">
//<![CDATA[
Core.load("wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js");
Core.load("wow/static/local-common/js/search.js");
Core.load("wow/static/local-common/js/login.js", false, function() {
if (typeof Login !== 'undefined') {
Login.embeddedUrl = '<?php echo BASE_URL ?>loginframe.php';
}
});
//]]>
</script>
<!--[if lt IE 8]> <script type="text/javascript" src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery.pngFix.pack.js"></script>
<script type="text/javascript">
//<![CDATA[
$('.png-fix').pngFix(); //]]>
</script>
<![endif]-->

</body>
</html>
