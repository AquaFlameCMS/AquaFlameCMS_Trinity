<?php
include("../configs.php");
$page_cat = "security";
if(!isset($_SESSION['username'])) header('Location: '.BASE_URL.'account_log.php');
if(!isset($_POST['character'])) header('Location: '.BASE_URL.'account_log.php');
if(!isset($_POST['realm'])) header('Location: '.BASE_URL.'account_log.php');
if(!isset($_POST['newname'])) header('Location: '.BASE_URL.'account_log.php'); else if(!ctype_alpha($_POST['newname'])) header('Location: name.php');
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
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/management/wow/dashboard.css" />
<link rel="stylesheet" media="all" href="../wow/account/css/management/payment.css" /> />
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
<!--[if lt IE 8]>
<style>
.confirm-service-details {}
.confirm-service-label {float:left;}
</style>
<![endif]-->
<div class="dashboard service">
<div class="primary">
<div class="header">
    <h2 class="subcategory">Character Services</h2>
    <h3 class="headline">Name Change</h3>
    <a href="#"><img src="<?php echo BASE_URL ?>wow/static/local-common/images/game-icons/wow.png" alt="World of Warcraft" width="48" height="48" /></a>
</div>

<?php
    $charid = intval($_POST['character']);
    $realmid = intval($_POST['realm']);
    $newname = mysql_real_escape_string($_POST['newname']);
    
    $errors =  Array();
    
    $realm_check = mysql_query("SELECT * FROM realms WHERE id = '".$realmid."'");
    if(mysql_num_rows($realm_check) > 0) $realm_extra = mysql_fetch_assoc($realm_check); else $errors[] = "The selected realm is unavailable.";
    
    $realm = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.realmlist WHERE id = '".$realm_extra['realmid']."'"));
    $server_cdb = $realm_extra['char_db'];
    
    $char_check = mysql_query("SELECT * FROM $server_cdb.characters WHERE guid = '".$charid."'");
    if(mysql_num_rows($char_check) > 0) $character = mysql_fetch_assoc($char_check); else $errors[] = "The selected character is unavailable.";
    
    if($character['online'] == 1) $errors[] = "The selected character is online.";
    if($character['account'] != $account_information['id']) $errors[] = "The selected character does not belong to you.";
    
    
?>

<div id="payment-wrapper" class="clear-after">
<div class="purchase-overview">
    <h3>Summary</h3>
    <div class="content">
        <div class="item last-item">
            <span class="thumb">
                <img src="<?php echo BASE_URL ?>wow/account/images/products/marketplace/wow-pnc/name-change-small.png" alt="Name Change" title="" />
            </span>
            <div class="product-detail clear-after">
                <h4>Name Change</h4>
                <p class="description">This service lets you change the names of your characters.</p>
                <p class="description"></p>
            </div>
            <div class="clear" style="margin-bottom: 12px;"></div>
            <div class="detail">Character<strong><?php echo $character['name']; ?></strong></div>
            <span class="clear"><!-- --></span>
            <div class="detail">New Character Name:<strong><?php echo $newname; ?></strong></div>
            <div class="detail">Realm <strong><?php echo $realm['name']; ?></strong></div>
        </div>
    </div>
    <div class="total-price">
        <div class="total-due">
        Total:
        <strong>
            <?php
            $price = mysql_fetch_assoc(mysql_query("SELECT * FROM prices WHERE service = 'name-change'"));
            if($price['type'] == "vote") echo $price['vp'] . "VP";
            else if($price['type'] == "donate") echo $price['dp'] . "DP";
            else echo "FREE";
            ?>
        </strong>
        </div>
    </div>
</div>

<div class="payment-overview">
    <div id="payment-toggle">
        <div>
            <div class="section-header drop-shadow border-4">Name Change </div>
            <?php
            if(isset($_POST['payment'])){
                if($_POST['payment'] == "pay"){
                    
                    if($price['type'] == "vote"){
                        if($account_extra['vote_points'] < $price['vp']) $errors[] = "You don't have enough vote points.";
                        else $buy = mysql_query("UPDATE users SET vote_points = vote_points - '".$price['vp']."' WHERE id = '".$account_extra['id']."'");
                    }else if($price['type'] == "donate"){
                        if($account_extra['donation_points'] < $price['dp']) $errors[] = "You don't have enough donation points.";
                        else $buy = mysql_query("UPDATE users SET donation_points = donation_points - '".$price['dp']."' WHERE id = '".$account_extra['id']."'");
                    }
                
                }else{
                    
                    if(empty($_POST['giftcode'])) $errors[] = "You haven't written your gift code.";
                    else $errors[] = "The gift code provided is invalid.";
                    
                }
                    
                    ?>
                    
                    <div id="payment-details">
                        <div>
                            <div class="section-box border-4">
                                <p style="margin: 10px 0 1em 0;">
                                    <?php
                                    if(count($errors) > 0){
                                        foreach($errors AS $error){
                                            echo '<span style="color:red">'. $error . '</font><br />';
                                        }
                                        
                                        echo '<meta http-equiv="refresh" content="3;url=name.php"/>';
                                    }else{
                                        $name = strtoupper(substr($newname,0,1)) . strtolower(substr($newname,1,(strlen($newname)-1)));
                                        
                                        $changeName = mysql_query("UPDATE $server_cdb.characters SET name = '".$name."' WHERE guid = '".$character['guid']."'");
                                        echo '<span style="color:green">'.$character['name'].' has changed his name into '. $name . '</font><br />';
                                        echo '<meta http-equiv="refresh" content="3;url=name.php"/>';
                                    }
                                    ?>
                                </p>
                                <span class="clear"></span>
                            </div>
                        </div>
                    </div>
                    
                    <?php 
            }else{
            ?>
            
            <form method="POST">
            <div class="section-box2 border-4">
                <div id="payment-types" class="border-5">
                    <ul class="clear-after">
                        <li class="active">
                            <label>
                                <input name="payment" id="PAYPAL" type="radio" value="pay" checked="checked" />
                                <span class="logo type-giftcode png-fix">Pay</span>
                            </label>
                        </li>
                        <li class="last-on-row">
                            <label>
                                <input name="payment" id="VISA_EU" type="radio" value="gift" />
                                <span class="logo type-giftcode png-fix">Gift Code</span>
                            </label>
                        </li>
                    </ul>
                </div>
                <span class="clear"></span>
            </div>
            
            <div id="payment-details">
                <div>
                    <input type="hidden" name="character" value="<?php echo $character['guid']; ?>"/>
                    <input type="hidden" name="realm" value="<?php echo $realm_extra['id']; ?>"/>
                    <input type="hidden" name="newname" value="<?php echo $newname; ?>"/>
                    <div class="section-box border-4">
                        <p style="margin: 10px 0 1em 0;">
                            If you have a gift code please select the option and enter your gift code.
                            <br /><br />
                            <div class="form-row required">
    							<label for="giftcode" class="label-full ">
                                    <strong>Gift Code</strong>
                                    <span class="form-required"></span>
                                </label>
                                <input type="text" name="giftcode" id="giftcode" value="" class="input border-5 glow-shadow-2" maxlength="26" tabindex="1" /> <small>(not required)</small>	
                            </div>
                            <br />
                            <?php
                            if(count($errors) > 0){
                                foreach($errors AS $error){
                                    echo '<span style="color:red">'. $error . '</font><br />';
                                }
                                
                                echo '<meta http-equiv="refresh" content="3;url=name.php"/>';
                            }
                            ?>
                        </p>
                        <span class="clear"></span>
                    </div>
                    <fieldset class="ui-controls section-buttons">
                        <?php if(count($errors) > 0) echo '<button class="ui-button button1 disabled" type="submit" id="tos-submit" tabindex="1" disabled="disabled"><span><span>Continue</span></span></button>';
                        else  echo '<button class="ui-button button1" type="submit" id="tos-submit" tabindex="1"><span><span>Continue</span></span></button>'; ?>
                        <a class="ui-cancel " href="name.php" tabindex="1">
                            <span>Cancel </span>
                        </a>
                    </fieldset>
                    <script type="text/javascript">
                    //<![CDATA[
                    $(function() {
                    getTax.flagPaymentMethod = 'otherPayment';
                    });
                    //]]>
                    </script>
                </div>
            </div>
            </form>
            <?php } ?>
        </div>
    </div>
    <div id="payment-toggle-loading">
    <img src="<?php echo BASE_URL ?>wow/account/images/icons/loading-light-large.gif" alt="loading" />
    </div>
</div>
<script type="text/javascript">
//<![CDATA[

var taxFormating = "@ €";

var deficit, minBackupAmount;

$(function () {

getTax.productPriceNumber = getTax.currencyNumber(8);

getTax.accountBalance = getTax.currencyNumber("0.00");

FormHandler.pngFix();

$(".thumb").pngFix();

FormHandler.highlight($("#payment-types").find("input:checked:first"));

$('.ui-dropdown').dropdown({

callback: function(dropdown, selected) {

FormHandler.paymentSelect(selected)

},

updateText: true

});

getTax.initialize();

});

//]]>
</script>
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
ticketStatus: 'Ticket {0}’s status changed to {1}.',
ticketOpen: 'Open',
ticketAnswered: 'Answered',
ticketResolved: 'Resolved',
ticketCanceled: 'Canceled',
ticketArchived: 'Archived',
ticketInfo: 'Need Info',
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
