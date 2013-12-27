<?php
include("configs.php");
$page_cat = "account";
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<html lang="en-gb">
<head>
<title><?php echo $re['re']; ?> <?php echo $website['title']; ?></title>
<meta name="description" content="<?php echo $website['description']; ?>">
<meta name="keywords" content="<?php echo $website['keywords']; ?>">
<link rel="shortcut icon" href="wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="stylesheet" media="all" href="wow/static/local-common/css/common.css" />
<link rel="stylesheet" media="all" href="wow/static/css/bnet.css" />
<link rel="stylesheet" media="print" href="wow/static/css/bnet-print.css" />
<link rel="stylesheet" media="all" href="wow/static/css/inputs.css" />
<link rel="stylesheet" media="all" href="wow/static/css/account-reg/streamlined-creation.css" />
<script src="wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script src="wow/static/local-common/js/core.js"></script>
<script type="text/javascript" src="wow/static/local-common/js/tooltip.js"></script>

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
Core.supportUrl = 'http://eu.battle.net/support/';
Core.secureSupportUrl= 'https://eu.battle.net/support/';
Core.project = 'bam';
Core.locale = 'en-gb';
Core.buildRegion = 'eu';
Core.shortDateFormat= 'dd/MM/yyyy';
Core.dateTimeFormat = 'dd/MM/yyyy HH:mm';
Core.loggedIn = false;
Flash.videoPlayer = 'http://eu.media.blizzard.com/global-video-player/themes/bam/video-player.swf';
Flash.videoBase = 'http://eu.media.blizzard.com/bam/media/videos';
Flash.ratingImage = 'http://eu.media.blizzard.com/global-video-player/ratings/bam/rating-pegi.jpg';
Flash.expressInstall= 'http://eu.media.blizzard.com/global-video-player/expressInstall.swf';
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-544112-16']);
_gaq.push(['_trackPageview']);
_gaq.push(['_trackPageLoadTime']);
//]]>
</script>
</head>
<body class="en-gb creation">
<div id="layout-top">
<div class="wrapper">
<div id="header">
<div id="navigation">
<div id="page-menu" class="large">
<h2 class="isolated"> <?php echo $re['re1']; ?>
</h2>
<span class="clear"></span>
</div>
<span class="clear"></span>
</div>
</div>
<?php include("functions/footer_man_nav.php"); ?>
<div id="layout-middle">
<div class="wrapper">
<div id="content">
<div id="page-header">
<?php

function valid_email($email) //Small function to validate the email
{
    $result = TRUE;
    if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)) {
        $result = FALSE;
    }
    return $result;
}

if (!isset($_SESSION['username'])) {
    if (isset($_POST['reg'])) {
        $accountName   = mysql_real_escape_string($_POST['accountName']);
        $accountPass   = mysql_real_escape_string($_POST['accountPass']);
        $accountEmail  = mysql_real_escape_string(stripslashes($_POST['accountEmail']));
        $accountEmail2 = mysql_real_escape_string(stripslashes($_POST['accountEmail2']));
        mysql_select_db($server_adb, $connection_setup) or die(mysql_error());
        $check_query = mysql_query("SELECT * FROM account WHERE username = '" . $accountName . "'");
        $check       = mysql_fetch_assoc($check_query);
        $firstName   = mysql_real_escape_string(ucfirst(strtolower($_POST['firstName'])));
        $lastName    = mysql_real_escape_string(ucfirst($_POST['lastName']));
        
        $country  = $_POST['country'];
        $dobD     = $_POST['dobDay'];
        $dobM     = $_POST['dobMonth'];
        $dobY     = $_POST['dobYear'];
        $dob      = date("Y-m-d", strtotime($dobY . "-" . $dobM . "-" . $dobD)); //YYYY-MM-DD
        $question = $_POST['question1'];
        $answer   = mysql_real_escape_string($_POST['answer1']);
        
        if (!$check) {
            
            if ($accountPass != stripslashes($_POST['accountPassc'])) {
                $error[] = $re['error2'];
            }
            
            if (empty($firstName))
                $error[] = $re['error3'];
            if (empty($lastName))
                $error[] = $re['error4'];
            
            if (empty($accountEmail) || !valid_email($accountEmail)) {
                $error[] = $re['error5'];
            }
            
            if ($accountEmail != $accountEmail2) {
                $error[] = $re['error9'];
            }
            
            if (empty($accountPass)) {
                $error[] = $re['error6'];
            }
            
            if ($dobD == '0' || $dobY == '0' || $dobM == '0') {
                $error[] = $re['error8'];
            }
            
            if ($question == 0 || empty($answer)) {
                $error[] = $re['error10'];
            }
            
            if (strlen($_POST['accountPass']) < 5 || strlen($_POST['accountPass']) > 15) {
                $chars = strlen($accountPass);
                die("<p align='center'>" . $Reg['Reg6'] . "<br><br>" . $Reg['Reg9'] . "<br><br>" . $Reg['Reg10'] . "" . $chars . " " . $Reg['Reg11'] . "<br><br>" . $Reg['Reg12'] . "<br><br>" . $Reg['Reg13'] . "</p><p align='center'><a href='register.php'><button class='ui-button button1' type='submit' value='back' tabindex='1'><span><span>" . $back['back'] . "</span></span></button></a></p>");
            }
            
        } else {
            $error[] = $re['error7'];
        }
        
?>
<?php
        if (isset($error) && count($error) > 0) {
            echo '<div class="errors" align="center">';
            foreach ($error as $errors) {
                echo "<font color='red'>*" . $errors . "</font><br />";
            }
            echo '</div>';
            echo '<meta http-equiv="refresh" content="3"/>';
        } else {
            
            $ip = getenv("REMOTE_ADDR");
            
            
            mysql_select_db($server_adb, $connection_setup) or die(mysql_error());
            $accinfoq = mysql_query("SELECT * FROM account WHERE username = '" . $accountName . "'");
            $accinfo  = mysql_num_rows($accinfoq);
            
            if ($accinfo == 0) {
                $sha_pass_hash = sha1(strtoupper($accountName) . ":" . strtoupper($accountPass));
                $register_logon = mysql_query("INSERT INTO account (username,sha_pass_hash,email,last_ip,expansion) VALUES (UPPER('" . $accountName . "'),  CONCAT('" . $sha_pass_hash . "'),'" . $accountEmail . "','" . $ip . "','" . $expansion_wow . "')") or die(mysql_error());
                $alter_pem_auto_increment = mysql_query("ALTER TABLE `rbac_account_permissions` CHANGE `accountId` `accountId` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Account id'") or die(mysql_error());
                $register_logon = mysql_query("INSERT INTO rbac_account_permissions (permissionId) VALUES ('199')") or die(mysql_error());
                $alter_pem_auto_increment = mysql_query("ALTER TABLE `rbac_account_permissions` CHANGE `accountId` `accountId` INT(10) UNSIGNED NOT NULL COMMENT 'Account id'") or die(mysql_error());
                mysql_select_db($server_adb, $connection_setup) or die(mysql_error());
                $accountinfo = mysql_fetch_assoc(mysql_query("SELECT * FROM account WHERE username = UPPER('" . $accountName . "')"));
                mysql_select_db($server_db, $connection_setup) or die(mysql_error());
                $register_cms = mysql_query("INSERT INTO users (id,class,firstName,lastName,registerIp,country,birth,quest1,ans1) VALUES ('" . mysql_real_escape_string($accountinfo['id']) . "','0','" . $firstName . "','" . $lastName . "','" . $ip . "','" . $country . "','" . $dob . "','" . $question . "',UPPER('" . $answer . "'))");
                
                if ($register_logon == true && $register_cms == true) {
                    echo '<div class="alert-page" align="center">';
                    echo '<div class="alert-page-message success-page">
								<p class="text-green title"><strong>' . $re['scc1'] . '</strong></p>
								<p class="caption">' . $re['scc2'] . '</p>
								<p class="caption"><a href="'.$website['root'] .'account/">' . $re['goPanel'] . '</a></p>
								</div>';
                    echo '</div>';
                    $_SESSION['username'] = $accountName;
                    echo '<meta http-equiv="refresh" content="3;url='.$website['root'] .'account/"/>';
                } else { //MODIFIED TO DELETE THE ACCOUNT IF SOMETHING IS WRONG DURING THE REGISTRATION
                    mysql_select_db($server_adb, $connection_setup) or die(mysql_error());
                    $accdel = mysql_query("DELETE FROM account WHERE username = '" . $accountName . "'");
                    echo '<div class="errors" align="center"><font color="red">' . $re['error1'] . '</font><br><br />';
                    echo '<a href="register.php"><button class="ui-button button1"  id="back" tabindex="1" /><span><span>' . $re['back'] . '</span></span></button></a></div>';
                }
            }
        }
?>
<?php
						  }else{
?>
<p class="privacy-message"><b><?php echo $re['re2']; ?><?php echo $website['title']; ?> <?php echo $re['re3']; ?><a href="" onclick="window.open(this.href); return false;"><?php echo $re['re4']; ?></a>.</p>
</div>
<form action="" method="post" id="creation">
<div class="input-row input-row-select">
<span class="input-left">
<label for="country">
<span class="label-text">
<?php echo $re['re5']; ?>
</span>
<span class="input-required"></span>
</label>
</span>

<span class="input-right">
<span class="input-select input-select-small">
<select name="country" id="country" class="small border-5 glow-shadow-2 form-disabled" tabindex="1"  >
<?php
mysql_select_db($server_db, $connection_setup) or die(mysql_error());
$contry = mysql_query("SELECT * FROM $server_db.country")or die(mysql_error());
while($get = mysql_fetch_array($contry))
{
?>
<?php
echo'<option value="'.$get["iso3"].'">'.$get["printable_name"].'</option>';
?>
<?php } ?>
</select>
<span class="inline-message" id="country-message"> </span>
</span>
<button class="ui-button button1 " type="submit" id="country-submit" tabindex="1">
	<span>
	    <span>Change Country</span>
	</span>
</button>
</span>
</div>
<div class="input-row input-row-note" id="country-warning" style="display: none">
<div class="input-note border-5 glow-shadow">
<div id="countryGlobal" class="input-note-content">
<p class="caption">If you change your country, you will get different form fields for account creation and address entry that may not match your situation. Proceed?</p>
<p>
<a class="ui-button button1 " href="" tabindex="1">
	<span>
	    <span>Change Country</span>
	</span>
</a>
<a class="ui-cancel " href="" tabindex="1">
<span> Cancel </span>
</a>
</p>
</div>
<div id="countryCHINA" class="input-note-content">
<p class="caption">You are on the Taiwanese regional Battle.net website. Only account holders who have a Taiwanese World of Warcraft account should create a Battle.net account here. If you have a Chinese World of Warcraft account, go to Battle.net China instead.</p>
<p>
<a class="ui-button button1 " href="?country=CHINA" id="stayTaiwan" tabindex="1">
	<span>
	    <span>YES, I HAVE A TAIWANESE WORLD OF WARCRAFT ACCOUNT</span>
	</span>
</a>
<br />
<a class="ui-button button1 " href="http://www.battlenet.com.cn" id="gotoChina" tabindex="1">
	<span>
	    <span>GO TO BATTLE.NET IN CHINA</span>
	</span>
</a>
<a class="ui-cancel " href="" tabindex="1">
<span> Cancel </span>
</a>
</p>
</div>
<div class="input-note-arrow"></div>
</div>
</div>
<script type="text/javascript">
//<![CDATA[
(function() {
var countrySubmit = document.getElementById('country-submit');
countrySubmit.style.display = 'none';
})();
//]]>
</script>
<div id="page-content">
<div class="input-hidden">
<input type="hidden" id="csrftoken" name="csrftoken" value="6693641e-fbf5-4e6a-af8b-00d8d853a45e" />
</div>
<script type="text/javascript">
//<![CDATA[
var FormMsg = {
emailMessage1: 'This will be the username you use to log in.',                          //*************************************
emailError1: '<span class="inline-error">Not a valid e-mail address.</span>',
emailError2: '<span class="inline-error">E-mail addresses must match.</span>',
passwordError1: '<span class="inline-error">Password does not meet the guidelines.</span>',
passwordError2: '<span class="inline-error">Passwords must match!</span>',
passwordStrength0: 'Too Short',
passwordStrength1: 'Weak',
passwordStrength2: 'Fair',
passwordStrength3: 'Strong'
};
//]]>
</script>
<div class="form-blockable" id="country-change">
<div class="input-row input-row-select">
<span class="input-left">
<label for="dobDay">
<span class="label-text">
<?php echo $re['re6']; ?>
</span>
<span class="input-required">*</span>
</label>
</span>
<span class="input-right">
<span class="input-select input-select-extra-extra-extra-small">
<select name="dobDay" id="dobDay" class="extra-extra-extra-small border-5 glow-shadow-2" tabindex="1" required="required" >
<option value="0" selected="selected"><?php echo $re['day']; ?></option>
	<?php
	for($day=1;$day<=31;$day++){
	echo'<option value="'.$day.'">'.$day.'</option>';
	}
	 ?>
</select>
<span class="inline-message" id="dobDay-message"> </span>
</span>
<span class="input-select input-select-extra-extra-small">
<select name="dobMonth" id="dobMonth" class="extra-extra-small border-5 glow-shadow-2" tabindex="1" required="required">
<option value="0" selected="selected"><?php echo $re['month']; ?></option>
<option value="1">January</option>
<option value="2">February</option>
<option value="3">March</option>
<option value="4">April</option>
<option value="5">May</option>
<option value="6">June</option>
<option value="7">July</option>
<option value="8">August</option>
<option value="9">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
<span class="inline-message" id="dobMonth-message"> </span>
</span>
<span class="input-select input-select-extra-extra-extra-small">
<select name="dobYear" id="dobYear" class="extra-extra-extra-small border-5 glow-shadow-2" tabindex="1" required="required">
<option value="0" selected="selected"><?php echo $re['year']; ?></option>
	<?php
	for($year=2014;$year>=1904;$year--){
	echo'<option value="'.$year.'">'.$year.'</option>';
	}
	 ?>
</select>
<span class="inline-message" id="dobYear-message"> </span>
</span>
</span>
</div>
<div class="input-row input-row-select">
<span class="input-left">
<label for="gender">
<span class="label-text">
<?php echo $re['re7']; ?>
</span>
<span class="input-required">*</span>
</label>
</span>
<span class="input-right">
<span class="input-select input-select-small">
<select name="gender" id="gender" class="small border-5 glow-shadow-2" tabindex="1" required="required">
<option value="1" selected="selected"><?php echo $re['mr']; ?></option>
<option value="2"><?php echo $re['miss']; ?></option>
<option value="3"><?php echo $re['ms']; ?></option>
</select>
<span class="inline-message" id="gender-message"> </span>
</span>
</span>
</div>
<br />
<div  class="input-row input-row-text">
<span class="input-left">
<label for="firstname">
<span class="label-text">
<?php echo $re['re8']; ?>
</span>
<span class="input-required">*</span>
</label>
</span><!--
--><span class="input-right">
<span class="input-text input-text-small">
<input type="text" name="firstName" value="" id="firstname" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="32" tabindex="1" required="required" placeholder="<?php echo $re['re41']; ?>" />
<span class="inline-message" id="firstname-message"></span>
</span>
<span class="input-text input-text-small">
<input type="text" name="lastName" value="" id="lastname" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="32" tabindex="1" required="required" placeholder="<?php echo $re['re42']; ?>" />
<span class="inline-message" id="lastname-message"></span>
</span>
</span>
</div>

<div  class="input-row input-row-text">
<span class="input-left">
<label for="emailAddress">
<span class="label-text">
<?php echo $re['re10']; ?>
</span>
<span class="input-required">*</span>
</label>
</span><!--
--><span class="input-right">
<span class="input-text input-text-small">
<input type="text" name="accountEmail" value="" id="emailAddress" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="32" tabindex="1" required="required" placeholder="<?php echo $re['re43']; ?>" />
<span class="inline-message" id="emailAddress-message"></span>
</span>
<span class="input-text input-text-small">
<input type="text" name="accountEmail2" value="" id="lastname" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="32" tabindex="1" required="required" placeholder="<?php echo $re['re44']; ?>" />
<span class="inline-message" id="emailAddressConfirmation-message"></span>
</span>
</span>
</div>
<div class="input-row input-row-text">
<span class="input-left">
<label for="Username">
<span class="label-text">
<?php echo $re['re11']; ?>
</span>
<span class="input-required">*</span>
</label>
</span>
<span class="input-right">
<span class="input-text input-text-small">
<input type="text" name="accountName" value="" id="accountName" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="320" tabindex="1" required="required" placeholder="<?php echo $re['re45']; ?>" />
<span class="inline-message" id="emailAddress-message"></span>
</span>
</span>
</div>
<div  class="input-row input-row-text">

<span class="input-left">
<label for="password">
<span class="label-text">
<?php echo $re['re12']; ?>
</span>
<span class="input-required">*</span>
</label>
</span><!--
--><span class="input-right">
<span class="input-text input-text-small">
<input type="password" id="password" name="accountPass" value="" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="16" tabindex="1" required="required" placeholder="<?php echo $re['re46']; ?>" />
<span class="inline-message" id="password-message"></span>
</span>
<span class="input-text input-text-small">
<input type="password" id="rePassword" name="accountPassc" value="" class="small border-5 glow-shadow-2" autocomplete="off" onpaste="return false;" maxlength="16" tabindex="1" required="required" placeholder="<?php echo $re['re47']; ?>" />
<span class="inline-message" id="rePassword-message"></span>
</span>
</span>
</div>

<div class="input-row input-row-note" id="password-strength" style="display: none">
<div class="input-note border-5 glow-shadow">
<div class="input-note-left">
<p class="caption"><?php echo $re['re13']; ?></p>
</div>
<div class="input-note-right border-5">
<div class="password-strength">
<span class="password-result">
<?php echo $re['re14']; ?>
<strong id="password-result"></strong>
</span>
<span class="password-rating"><span class="rating rating-default" id="password-rating"></span></span>
</div>
<ul class="password-level" id="password-level">
<li id="password-level-0">
<span class="icon-16"></span>
<span class="icon-16-label"><?php echo $re['re15']; ?></span>
</li>
<li id="password-level-1">
<span class="icon-16"></span>
<span class="icon-16-label"><?php echo $reg['reg22']; ?></span>
</li>
<li id="password-level-2">
<span class="icon-16"></span>
<span class="icon-16-label"><?php echo $re['re16']; ?></span>
</li>
<li id="password-level-3">
<span class="icon-16"></span>
<span class="icon-16-label"><?php echo $re['re17']; ?></span>
</li>
<li id="password-level-4">
<span class="icon-16"></span>
<span class="icon-16-label"><?php echo $re['re18']; ?></span>
</li>
</ul>
</div>
<div class="clear"></div>
<div class="input-note-arrow"></div>
</div>
</div>
<div class="input-row input-row-select">
<span class="input-left">
<label for="question1">
<span class="label-text">
<?php echo $re['re19']; ?>
</span>
<span class="input-required">*</span>
</label>
</span>
<span class="input-right">
<span class="input-select input-select-small">
<select name="question1" id="question1" class="small border-5 glow-shadow-2" tabindex="1" required="required">
<option value="0" selected="selected"><?php echo $re['re20']; ?></option>
<option value="1"><?php echo $re['re21']; ?></option>
<option value="2"><?php echo $re['re22']; ?></option>
<option value="3"><?php echo $re['re23']; ?></option>
<option value="4"><?php echo $re['re24']; ?></option>
<option value="5"><?php echo $re['re25']; ?></option>
<option value="6"><?php echo $re['re26']; ?></option>
<option value="7"><?php echo $re['re27']; ?></option>
<option value="8"><?php echo $re['re28']; ?></option>
<option value="9"><?php echo $re['re29']; ?></option>
<option value="10"><?php echo $re['re30']; ?></option>
</select>
<span class="inline-message" id="question1-message"> </span>
</span>
<span class="input-text input-text-small">
<input type="text" name="answer1" value="" id="answer1" class="small border-5 glow-shadow-2" autocomplete="off" maxlength="50" tabindex="1" required="required" placeholder="<?php echo $re['re48']; ?>" />
<span class="inline-message" id="answer1-message"> </span>
</span>
</span>
</div>
<div class="input-row input-row-note question-info" id="question-info" style="display: none;">
<span class="inline-message"><?php echo $re['re31']; ?></span>
</div>
<div class="input-row input-row-text">
<span class="input-left">
<label for="agreedToChatPolicy">
<span class="label-text"><?php echo $re['re32']; ?></span>
<span class="input-required">*</span>
</label>
</span>
<span class="input-right">
<div class="agreement-check">
<p class="tou-desc"><?php echo $re['re33']; ?></p>
</div>
</span>
</div>
<div class="input-row input-row-checkbox input-row-important">
<span class="input-left">
<span class="title-text">
</span>
<span class="input-required"></span>
</span>
<span class="input-right">
<label for="agreedToChatPolicy">
<input type="checkbox" name="agreedToChatPolicy" value="true" id="agreedToChatPolicy" tabindex="1" required="required" />
<span class="label-text">
<?php echo $re['re34']; ?><?php echo $website['title']; ?><?php echo $re['re35']; ?> 
<span class="input-required">*</span>
</span>
</label>
</span>
<span class="input-left">
<span class="title-text">
</span>
<span class="input-required"></span>
</span>
<span class="input-right">
<label for="agreedToToU">
<input type="checkbox" name="agreedToToU" value="true" id="agreedToToU" tabindex="1" required="required" />
<span class="label-text">
<?php echo $re['re36']; ?><a href="" onclick="window.open(this.href); return false;"><?php echo $re['re37']; ?></a><?php echo $re['re38']; ?></a>
<span class="input-required">*</span>
</span>
</label>
</span>
</div>
<div class="submit-row">
<div class="input-left"> </div>
<div class="input-right">
<button class="ui-button button1" type="submit" name="reg" onclick="Form.submit(this)" id="submit" tabindex="1">
<span>
<span><?php echo $re['re39'] ?></span>
</span>
</button>
<a class="ui-cancel "
href="index.php"
tabindex="1">
<span>
<?php echo $re['re40']; ?> </span>
</a>
</div>
</div>
<?php
               }
               }else{
                 echo '<div class="alert error closeable border-4 glow-shadow">
						<div class="alert-inner">
						<div class="alert-message">
						<p class="title"><strong>An error has occurred.</strong></p>
						<p class="error.password.mustMatch">You can not Register while you are logged in.</p>
						</div>
						</div>
						<a class="alert-close" href="#" onclick="$(this).parent().fadeOut(250, function() { $(this).css({opacity:0}).animate({height: 0}, 100, function() { $(this).remove(); }); }); return false;">Close</a>
						<span class="clear"><!-- --></span>
						</div>';
                 echo '<meta http-equiv="refresh" content="2;url=index.php"';
               }
               ?>
<script type="text/javascript">
//<![CDATA[
(function() {
var creationSubmit = document.getElementById('creation-submit');
creationSubmit.disabled = 'disabled';
creationSubmit.className = creationSubmit.className + ' disabled';
})();
//]]>
</script>
<div class="form-block" id="country-change-overlay" style="display: none"></div>
</div>
</form>
</div>
<script type="text/javascript">
//<![CDATA[
$(function() {
var inputs = new Inputs('#creation');
var creation = new Creation('#creation');
Core.appendFrame('https://bs.serving-sys.com/BurstingPipe/ActivityServer.bs?cn=as&amp;ifrm=1&amp;ActivityID=99739&amp;Value=Revenue&amp;OrderID=OrderID&amp;ProductID=ProductID&amp;ProductInfo=ProductInfo');
});
//]]>
</script>
<!--[if IE 6]> <script type="text/javascript" src="wow/static/local-common/js/third-party/DD_belatedPNG.js"></script>
<script type="text/javascript">
//<![CDATA[
DD_belatedPNG.fix('.icon-32');
DD_belatedPNG.fix('.icon-64');
DD_belatedPNG.fix('.input-note-arrow');
//]]>
</script>
<![endif]-->
</div>
</div>
</div>
<div id="layout-bottom">
<?php include("functions/footer_man.php"); ?>
</div>
<script type="text/javascript">
//<![CDATA[
var xsToken = '33037d3c-3214-46b1-bcb6-7350cedc9ca5';
var Msg = {
support: {
ticketNew: 'Ticket {0} was created.',
ticketStatus: 'Ticket {0}'s status changed to {1}.',
ticketOpen: 'Open',
ticketAnswered: 'Answered',
ticketResolved: 'Resolved',
ticketCanceled: 'Cancelled',
ticketArchived: 'Archived',
ticketInfo: 'Need Info',
ticketAll: 'View All Tickets'
},
cms: {
requestError: 'Your request cannot be completed.',
ignoreNot: 'Not ignoring this user',
ignoreAlready: 'Already ignoring this user',
stickyRequested: 'Sticky requested',
postAdded: 'Post added to tracker',
postRemoved: 'Post removed from tracker',
userAdded: 'User added to tracker',
userRemoved: 'User removed from tracker',
validationError: 'A required field is incomplete',
characterExceed: 'The post body exceeds XXXXXX characters.',
searchFor: "Search for",
searchTags: "Articles tagged:",
characterAjaxError: "You may have become logged out. Please refresh the page and try again.",
ilvl: "Item Lvl",
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
viewInGallery: 'View in gallery',
loading: 'Loading&#8230;',
unexpectedError: 'An error has occurred',
fansiteFind: 'Find this on&#8230;',
fansiteFindType: 'Find {0} on&#8230;',
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
}
};
//]]>
</script>
<script src="wow/static/js/bam.js"></script>
<script src="wow/static/local-common/js/tooltip.js"></script>
<script src="wow/static/local-common/js/menu.js"></script>
<script type="text/javascript">
$(function() {
Menu.initialize();
Menu.config.colWidth = 190;
Locale.dataPath = 'data/i18n.frag.xml';
});
</script>
<!--[if lt IE 8]>
<script type="text/javascript" src="wow/static/local-common/js/third-party/jquery.pngFix.pack.js"></script>
<script type="text/javascript">$('.png-fix').pngFix();</script>
<![endif]-->
<script src="wow/static/js/inputs.js"></script>
<script src="wow/static/js/account-creation/streamlined-creation.js"></script>
<script type="text/javascript">
//<![CDATA[
Core.load("wow/static/local-common/js/overlay.js");
Core.load("wow/static/local-common/js/search.js");
Core.load("wow/static/local-common/js/third-party/jquery-ui-1.8.6.custom.min.js");
Core.load("wow/static/local-common/js/third-party/jquery.mousewheel.min.js");
Core.load("wow/static/local-common/js/third-party/jquery.tinyscrollbar.custom.js");
Core.load("wow/static/local-common/js/login.js", false, function() {
Login.embeddedUrl = '<?php echo $website['root'];?>loginframe.php';
});
//]]>
</script>
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
