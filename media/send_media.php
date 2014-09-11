<?php
include("../configs.php");
$page_cat = "media";
if (!isset($_SESSION['username'])) {
        header('Location: ../account_log.php');		
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html>
<head>
<title><?php echo TITLE ?><?php echo @$Man['Man']; ?></title>
<link rel="shortcut icon" href="<?php echo BASE_URL ?>wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/local-common/css/management/common.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/bnet.css" />
<link rel="stylesheet" media="print" href="<?php echo BASE_URL ?>wow/static/css/bnet-print.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/management/dashboard.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/management/order-history.css" />
<link rel="stylesheet" media="all" href="<?php echo BASE_URL ?>wow/static/css/management/wow/dashboard.css" />
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/core.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/tooltip.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/third-party/swfobject.js?v37"></script>
<script src="<?php echo BASE_URL ?>wow/static/js/management/dashboard.js?v23"></script>
<script src="<?php echo BASE_URL ?>wow/static/js/management/wow/dashboard.js?v23"></script>
<script src="<?php echo BASE_URL ?>wow/static/js/bam.js?v23"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/tooltip.js?v37"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/menu.js?v37"></script>
<script type="text/javascript">
$(function() {
Menu.initialize();
Menu.config.colWidth = 190;
Locale.dataPath = 'data/i18n.frag.xml';
});
</script>
<!--[if IE 6]> <script type="text/javascript">
//<![CDATA[
try { document.execCommand('BackgroundImageCache', false, true) } catch(e) {}
//]]>
</script>
<![endif]-->
<script type="text/javascript">
//<![CDATA[
Core.staticUrl = '/account';
Core.sharedStaticUrl= '../wow/static/local-common';
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
Core.shortDateFormat= 'dd/MM/yyyy';
Core.dateTimeFormat = 'dd/MM/yyyy hh:mm a';
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

<script type="text/javascript">
function changeType(num) {
  objVid = document.getElementById('videoLnk');
  objImg = document.getElementById('uploadImg');
  objFieldVid = document.getElementById('fieldVideo');
  objFieldImg = document.getElementById('fieldUpload');
  if (num == '0'){
    objVid.style.display= '';
    objFieldVid.required= 'required';
    objImg.style.display= 'none'; 
    objFieldImg.required= ''; 
  }
  else{
    objVid.style.display= 'none';
    objFieldVid.required= '';
    objImg.style.display= '';
    objFieldImg.required= 'required';
  }
}
</script>

</head>
<body class="es-es logged-in">
  <div id="layout-top">
    <div class="wrapper">
      <div id="header">
        <?php include("../functions/header_account.php"); ?>
        <?php include("../functions/footer_man_nav.php"); ?>
      </div>
      <div id="layout-middle">
        <div class="wrapper">
          <div id="content">
            <div id="page-header">
<?php
if (isset($_POST['send'])){ 

  $title = mysql_real_escape_string($_POST['title_form']); 
  $description = mysql_real_escape_string($_POST['description_form']);
  //types: 0 videos, 1 wallpapers, 2 screenshots, 3 artwork, 4 comic
  if ($_POST['type'] == '0'){ //Youtube video sent  
  
    $url = $_POST['url_form']; 
    $exp="/v\/?=?([0-9A-Za-z-_]{11})/is";
    preg_match_all( $exp , $url , $matches );
    $id = $matches[1][0];
  }
  else{  //Image sent and upload to host
  
    $url = $website['address'].$website['root'].'images/wallpapers/';   //absolute route
    $path = '../images/wallpapers/';                                   //relative route
    
    if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") 
        || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/bmp") 
		|| ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/png")) && ($_FILES["file"]["size"] < $_POST['MAX_SIZE'])){
        //allowed extensions: jpg,jpeg,bmp,png,gif
      if ($_FILES["file"]["error"] > 0){
        echo "Error: " . $_FILES["file"]["error"] . ". File couldn't be sent.<br />";
      }
      else{
        $file = pathinfo($_FILES["file"]["name"]);
        $ext = '.'.$file['extension']; 
        $part = date('dmYHis',time());                                            
        $random = rand (10,100);
        $fileName = $_POST['type'].$part.$random.$ext; //An unique media name for file storage
        $url = $url.$fileName;  //The absolute route for links
        $id = $fileName;       //The filename for php refers, unlink(), etc.                                 
                                                                    
        if(move_uploaded_file($_FILES["file"]["tmp_name"],$path.$fileName)){
          $error = false;
        }
      }
    }
    elseif (!($_FILES["file"]["size"] < $_POST['MAX_SIZE'])){
      echo '<div class="errors" align="center"><font color="red" size="6"><strong>Error</strong></font></p>';
      echo '<p class="caption">The file size must be less than 2MB</p>';
      echo'<a href="send_media.php"><button class="ui-button button1"  id="back" tabindex="1" /><span><span>'.$re['back'].'</span></span></button></a></div>'; 
      $error = true;
    }
    else{
      echo '<div class="errors" align="center"><font color="red" size="6"><strong>Error</strong></font></p>';
      echo '<p class="caption">Invalid File Extension!</p>';
      echo'<a href="send_media.php"><button class="ui-button button1"  id="back" tabindex="1" /><span><span>'.$re['back'].'</span></span></button></a></div>'; 
      $error = true;
    } 
  }
 if (!$error){
  mysql_select_db($server_adb);
  $check_query = mysql_query("SELECT account.id,gmlevel from account  inner join account_access on account.id = account_access.id where username = '".strtoupper($_SESSION['username'])."'");
  $login = mysql_fetch_assoc($check_query);

  mysql_select_db($server_db);
  $save_media = mysql_query("INSERT INTO media (author, id_url, title, description, link, type) VALUES ('".$login['id']."','".$id."','".$title."','".$description."','".$url."','".$_POST['type']."');");
  mysql_close($connection_setup);
  
  if ($save_media == true && $check_query == true){ 
    echo '<div class="alert-page" align="center">';
    echo '<div class="alert-page-message success-page">
      <p class="text-green title"><strong>'.$Media['SendCorrect'].'</strong></p>
      <p class="caption">'.$Media['SendSuccse'].'</p>
      <p class="caption"><a href="'.BASE_URL.'account/">'.$re['goPanel'].'</a></p>
      </div>';
    echo '</div>';
    echo '<meta http-equiv="refresh" content="4;url='.BASE_URL.'account/"/>';
  }
  else{
    echo '<div class="errors" align="center"><font color="red" size="6"><strong>Error</strong></font></p>';
    echo '<p class="caption">An error has ocurred, the media file could not be sent!</p>';
    echo'<a href="send_media.php"><button class="ui-button button1"  id="back" tabindex="1" /><span><span>'.$re['back'].'</span></span></button></a></div>'; 
  }
 }
}
else{
?>
	<div id="content">
     <!--[if lte IE 7]>  <style type="text/css">
    .raf-step3-arrow { position:relative; width:176px; height:61px; background:url('wow/static/images/services/wow/raf/step_3_arrow_b.png') 0 0 no-repeat!important; top:-540px; left:105px; }
    .raf-step5-arrow { position:relative; width:155px; height:57px; background:url('wow/static/images/services/wow/raf/step_5_arrow_b.png') 0 0 no-repeat!important; top:-163px; left:150px; }
     </style>  <![endif]-->
	<div class="dashboard service">
		<div class="primary">
			<div class="header">
				<h3 class="headline"><?php echo $Media['SendMedia']; ?></h3>
				<a href=""><img src="<?php echo BASE_URL ?>wow/static/local-common/images/game-icons/wow.png" alt="World of Warcraft" width="48" height="48" /></a>
			</div>
              <p>&nbsp;</p>
              <div id="page-content">
                <div class="filter">
	               <label for="filter-status"><?php echo $Media['ChooseMediaSend']; ?></label>   
                </div>                 
<form action="" enctype="multipart/form-data" method="post">
<select name="type" id="type" class="input border-5 glow-shadow-2 form-disabled" style="width:150px" data-filter="column" data-column="0" onchange="changeType(this.selectedIndex)">
  <option value="0" selected="selected"><?php echo $Media['Videos']; ?></option>
  <option value="1"><?php echo $Media['Wallpapers']; ?></option>
  <option value="2"><?php echo $Media['Screenshots']; ?></option>
  <option value="3"><?php echo $Media['Artwork']; ?></option>
  <option value="4"><?php echo $Media['Comics']; ?></option>
</select>

<p>&nbsp;</p>
<p><?php echo $Media['AllFildRequiered']; ?></p>
<p><?php echo $Media['LargeText']; ?></p>

<p>&nbsp;</p><p>&nbsp;</p> 
     
<table width="550" height="330">
	<tr>
    <td valign="top"><label><?php echo $Media['Title']; ?></label></td>
	  <td width="367" valign="top"><div align="right"><input type="text" maxlength="40" name="title_form" class="input border-5 glow-shadow-2 form-disabled" size="40" required="required"></div></td>
  </tr>
	<tr id="videoLnk">
    <td valign="top"><label><?php echo $Media['LinkVideo']; ?></label></td>
	  <td valign="top"><div align="right"><input id="fieldVideo" type="url" name="url_form"  class="input border-5 glow-shadow-2 form-disabled" size="40" required="required" ></div></td>
  </tr>
	<tr id="uploadImg" style="display:none;">
    <td valign="top"><label><?php echo $Media['File']; ?></label></td>
	  <td valign="top">
	    <input type="hidden" name="MAX_SIZE" value="2000000" />
      <div align="right"><input id="fieldUpload" type="file" name="file"  class="bluefile border-5 glow-shadow-2 " size="30" /></div>
    </td>
  </tr>
	<tr>
    <td valign="top"><label><?php echo $Media['Description']; ?></label></td>
	  <td valign="top"><div align="right"><textarea type="text" name="description_form"  class="input border-5 glow-shadow-2 form-disabled" cols="38" rows="8" required="required" ></textarea></div></td>
  </tr>
  <!-- Here will be have to add a catpcha recognition to prevent spam -->
	<tr>
    <td><button type="submit" class="ui-button button1"  name="send"><span><span><?php echo $Media['SendVideo2']; ?></span></span></button></td>
    <td><div align="right"><button class="ui-cancel"  type="reset"><span><?php echo $Media['DelFields']; ?></span></button></div></td>
  </tr>
</table>
</form>
</div>
</div>     
<?php
  }
?>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
<div id="layout-bottom">
<?php include("../functions/footer_man.php"); ?>
</div>
</body>
<script type="text/javascript">
//<![CDATA[
var xsToken = '1719af93-c8ae-4514-b0ba-68fbf28147b5';
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
loading: 'Loading?',
unexpectedError: 'An error has occurred',
fansiteFind: 'Find this on?',
fansiteFindType: 'Find {0} on?',
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
<script src="<?php echo BASE_URL ?>wow/static/js/bam.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/tooltip.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/menu.js"></script>
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
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/dropdown.js"></script>
<script src="<?php echo BASE_URL ?>wow/static/local-common/js/table.js"></script>
<script type="text/javascript">
//<![CDATA[
Core.load("../wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js");
Core.load("../wow/static/local-common/js/search.js");
Core.load("../wow/static/local-common/js/login.js", false, function() {
if (typeof Login !== 'undefined') {
Login.embeddedUrl = '<?php echo BASE_URL ?>loginframe.php';
}
});
//]]>
</script>
<!--[if lt IE 8]> <script type="text/javascript" src="wow/static/local-common/js/third-party/jquery.pngFix.pack.js"></script>
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
</html>