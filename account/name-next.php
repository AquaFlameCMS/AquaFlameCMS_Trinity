<?php
include("../configs.php");
$page_cat = "security";
if(!isset($_SESSION['username'])) header('Location: '.BASE_URL.'account_log.php');
if(!isset($_GET['character'])) header('Location: '.BASE_URL.'account_log.php');
if(!isset($_GET['realm'])) header('Location: '.BASE_URL.'account_log.php');
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<title><?php echo TITLE ?> - Race Change</title>
<meta content="false" http-equiv="imagetoolbar" />
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
<meta name="description" content="<?php echo DESCRIPTION ?>">
<meta name="keywords" content="<?php echo KEYWORDS ?>">
<link rel="shortcut icon" href="<?php echo BASE_URL ?>wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/local-common/css/management/common.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/bnet.css" />
<link rel="stylesheet" media="print" href="<?php echo BASE_URL ?>wow/static/css/bnet-print.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/management/dashboard.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/management/services.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/ui.css" />
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/core.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/tooltip.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/swfobject.js?v37"></script>
<script src="<?php echo BASE_URL ?>wow/static/js/management/dashboard.js?v23"></script>
<script src="<?php echo BASE_URL ?>wow/static/js/management/wow/dashboard.js?v23"></script>
<script src="<?php echo BASE_URL ?>wow/static/js/bam.js?v23"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/tooltip.js?v37"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/menu.js?v37"></script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
Core.staticUrl = '/account';
Core.sharedStaticUrl= 'wow/static/local-common';
Core.baseUrl = '/account';
Core.projectUrl = '/account';
Core.cdnUrl = 'http://eu.media.blizzard.com';
Core.supportUrl = 'http://eu.battle.net/support/';
Core.secureSupportUrl= 'https://eu.battle.net/support/';
Core.project = 'bam';
Core.locale = 'en-us';
Core.language = 'en';
Core.buildRegion = 'eu';
Core.region = 'eu';
Core.shortDateFormat= 'MM/dd/yyyy';
Core.dateTimeFormat = 'MM/dd/yyyy hh:mm a';
Core.loggedIn = true;
Flash.videoPlayer = 'http://eu.media.blizzard.com/global-video-player/themes/bam/video-player.swf';
Flash.videoBase = 'http://eu.media.blizzard.com/bam/media/videos';
Flash.ratingImage = 'http://eu.media.blizzard.com/global-video-player/ratings/bam/rating-en-us.jpg';
Flash.expressInstall= 'http://eu.media.blizzard.com/global-video-player/expressInstall.swf';
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-544112-16']);
_gaq.push(['_setDomainName', '.blizzard.net']);
_gaq.push(['_trackPageview']);
_gaq.push(['_trackPageLoadTime']);
//]]>
</script>
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
<div class="dashboard service">
<div class="primary">
<div class="header">
<h2 class="subcategory">Character Services</h2>
<h3 class="headline">Race Change</h3>
<a href=""><img src="<?php echo BASE_URL ?>wow/static/local-common/images/game-icons/wow.png" alt="World of Warcraft" width="48" height="48" /></a>
</div>
<div class="service-wrapper">
<p class="service-nav">
    <a href="" class="active">Service</a>
    <!--<a href="">History/Status</a>-->
    <a href="<?php echo BASE_URL ?>account/">Return to dashboard</a>
</p>
<?php
$guid = intval($_GET['character']);
$realmid = intval($_GET['realm']);

$realm_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE id = '".$realmid."'"));
if(!$realm_extra){ echo '<meta http-equiv="refresh" content="0;url=account_log.php"/>'; die(); }
$realm = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.realmlist WHERE id = '".$realm_extra['realmid']."'"));
$server_cdb = $realm_extra['char_db'];

$character = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_cdb.characters WHERE guid = '".$guid."'"));


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
<div class="service-info">
    <div class="service-tag">
        <div class="service-tag-contents border-3">
            <div class="character-icon wow-portrait-64-80 wow-0-4-6 glow-shadow-3">
                <?php
                    if($character) echo '<img src="'.BASE_URL.'images/avatars/2d/'.$character['race'].'-'.$character['gender'].'.jpg" width="64" height="64" alt="" />';
                    else echo '<img src="'.BASE_URL.'images/avatars/2d/0-0.jpg" width="64" height="64" alt="" />';
                ?>
            </div>
            <div class="service-tag-description">
                <span class="character-name caption"><?php echo $character['name']; ?></span>
                <span class="character-class"> <?php echo $character['level'] . ' ' . racetxt($character['race']) . ' ' . classtxt($character['class']); ?></span>
                <span class="character-realm"> <?php echo $realm['name']; ?></span>
            </div>
            <span class="clear"><!-- --></span>
        </div>
    </div>
    <div class="service-summary">
        <p class="service-price headline">
        <?php
            $price = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_db.prices WHERE service = 'name-change'"));
            if($price['type'] == "vote") echo $price['vp'] . "VP";
            else if($price['type'] == "donate") echo $price['dp'] . "DP";
            else echo "FREE";
        ?>
        </p>
    </div>
</div>
<div class="service-form">
    <div class="service-interior">
        <h2 class="caption">Name Change</h2>
        <div class="tos-left full-width">
            <ul>
                <?php
                    if(!$character){ echo '<li>This character does not exist.</li>'; $disabled = 1;}
                    if($character['account'] != $account_information['id']){ echo '<li>This character does not belong to you.</li>'; $disabled = 1;}
                ?>
                <li>Please read the conditions and disclaimers below, thank you.</li>
            </ul>
        </div>
        <span class="clear"><!-- --></span>
    </div>
    <br />
    <div class="service-interior">
        <h2 class="caption">CONDITIONS AND DISCLAIMERS</h2>
        <div class="tos-left full-width">
            <ul>
                <li>The race change process is immediate, your character will be only become available as a new Race to play, only if you are not online. Under normal conditions the process should take less than a minute, but please remember to be offline while you are doing customization.</li>
                <li>You can select a new character race only from those in the same faction that have the character's class available. You cannot change a characters class.</li>
                <li>A character's current home city reputation level will switch values with their new home city and their home city racial mounts will convert to those of their new race.</li>
                <li>A realm transfer is not included in a race change.</li>
                <li>A character can only change races once every 12 hours.</li>
            </ul>
        </div>
        <span class="clear"><!-- --></span>
        
        <form method="POST" action="name-confirm.php">
            <input type="hidden" name="character" value="<?php echo $character['guid'] ?>"/>
            <input type="hidden" name="realm" value="<?php echo $realm_extra['id'] ?>"/>
            <fieldset class="ui-controls section-stacked" >
                <?php if(isset($disabled)) echo '<button class="ui-button button1 disabled" type="submit" id="tos-submit" tabindex="1" disabled="disabled"><span><span>Agree &amp; Continue</span></span></button>';
                else echo '<button class="ui-button button1" type="submit" id="tos-submit" tabindex="1"><span><span>Agree &amp; Continue</span></span></button>'; ?>
                <a class="ui-cancel" href="name.php" tabindex="1"><span>Back </span></a>
            </fieldset>
            
            <script type="text/javascript">
            //<![CDATA[
            (function() {
            var tosSubmit = document.getElementById('tos-submit');
            tosSubmit.removeAttribute('disabled');
            tosSubmit.className = 'ui-button button1';
            })();
            //]]>
            </script>
        </form>
    </div>
</div>
<span class="clear"><!-- --></span>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="layout-bottom">
<?php include("../functions/footer_man.php"); ?>
</div><script type="text/javascript">
//<![CDATA[
var xsToken = '';
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
<script src="<?php echo BASE_URL ?>wow/static/js/bam.js?v23"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/tooltip.js?v35"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/menu.js?v35"></script>
<script type="text/javascript">
$(function() {
Menu.initialize();
Menu.config.colWidth = 190;
Locale.dataPath = 'data/i18n.frag.xml';
});
</script>
<!--[if lt IE 8]>
<script type="text/javascript" src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery.pngFix.pack.js?v35"></script>
<script type="text/javascript">$('.png-fix').pngFix();</script>
<![endif]-->
<script type="text/javascript" src="<?php echo BASE_URL ?>wow/static/js/management/services.js?v23"></script>
<script type="text/javascript">
//<![CDATA[
Core.load("wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js?v35");
Core.load("wow/static/local-common/js/search.js?v35");
Core.load("wow/static/local-common/js/login.js?v35", false, function() {
if (typeof Login !== 'undefined') {
Login.embeddedUrl = 'https://eu.battle.net/login/login.frag';
}
});
//]]>
</script>
<!--[if lt IE 8]> <script type="text/javascript" src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery.pngFix.pack.js?v35"></script>
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
