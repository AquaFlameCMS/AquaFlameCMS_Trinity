<?php
include("configs.php");
$page_cat = "account";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-gb">
<head>
<title><?php echo $re['re']; ?> <?php echo $website['title']; ?></title>
<link rel="shortcut icon" href="wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common.css" />
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common-ie.css" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common-ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="wow/static/local-common/css/common-ie7.css" /><![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="wow/static/css/bnet.css" />
<link rel="stylesheet" type="text/css" media="print" href="wow/static/css/bnet-print.css" />
<link rel="stylesheet" type="text/css" media="all" href="wow/static/css/inputs.css" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="wow/static/css/inputs-ie6.css" /><![endif]-->
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="wow/static/css/inputs-ie.css" /><![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="wow/static/css/account-reg/streamlined-creation.css" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="wow/static/css/account-reg/streamlined-creation-ie6.css" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" type="text/css" media="all" href="wow/static/css/account-reg/streamlined-creation-ie7.css" /><![endif]-->
<!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="wow/static/css/bnet-ie.css" /><![endif]-->
<!--[if IE 6]><link rel="stylesheet" type="text/css" media="all" href="wow/static/css/bnet-ie6.css" /><![endif]-->
<script type="text/javascript" src="wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script type="text/javascript" src="wow/static/local-common/js/core.js"></script>
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
			?>
			<?php
			
          function valid_email($email) {         //Small function to validate the email
                $result = TRUE;
                if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) {
                              $result = FALSE;
                }
                return $result;
          }
          
						  if(!isset($_SESSION['username'])){
						  if(isset($_POST['reg'])){
						  $accountName = mysql_real_escape_string($_POST['accountName']);
						  $accountPass = mysql_real_escape_string($_POST['accountPass']);
						  $accountEmail = mysql_real_escape_string(stripslashes($_POST['accountEmail']));
						  $accountEmail2 = mysql_real_escape_string(stripslashes($_POST['accountEmail2']));
						  mysql_select_db($server_adb,$connection_setup)or die(mysql_error());
						  $check_query = mysql_query("SELECT * FROM account WHERE username = '".$accountName."'");
						  $check = mysql_fetch_assoc($check_query);
						  $firstName = mysql_real_escape_string(ucfirst(strtolower($_POST['firstName'])));
						  $lastName = mysql_real_escape_string(ucfirst($_POST['lastName']));
						  
						  $country= $_POST['country'];
						  $dobD= $_POST['dobDay'];
						  $dobM= $_POST['dobMonth'];
						  $dobY= $_POST['dobYear'];
						  $dob= date ("Y-m-d", strtotime($dobY."-".$dobM."-".$dobD));  //YYYY-MM-DD
							$question= $_POST['question1'];
							$answer= mysql_real_escape_string($_POST['answer1']);
							
						  if(!$check){

							if($accountPass != stripslashes($_POST['accountPassc'])){
							  $error[]=$re['error2'];
							}
							
							if(empty($firstName)) $error[] = $re['error3'];
							if(empty($lastName)) $error[] = $re['error4'];
							
							if(empty($accountEmail) || !valid_email($accountEmail)){
							  $error[]=$re['error5'];
							}
							
							if($accountEmail != $accountEmail2){
							  $error[]=$re['error9'];
							}

							if(empty($accountPass)){
							  $error[]=$re['error6'];
							}
							
              if($dobD == '0' || $dobY == '0' || $dobM == '0'){
							  $error[]=$re['error8'];
							}
							
							if($question == 0 || empty($answer)){
							  $error[]=$re['error10'];
							}
							
							if(strlen($_POST['accountPass']) < 5 || strlen($_POST['accountPass']) > 15 ){
                $chars = strlen($accountPass);
                die("<p align='center'>".$Reg['Reg6']."<br><br>".$Reg['Reg9']."<br><br>".$Reg['Reg10']."".$chars." ".$Reg['Reg11']."<br><br>".$Reg['Reg12']."<br><br>".$Reg['Reg13']."</p><p align='center'><a href='register.php'><button class='ui-button button1' type='submit' value='back' tabindex='1'><span><span>".$back['back']."</span></span></button></a></p>");
              }
							
						  }else{
							$error[]=$re['error7'];
						  }
              
              ?>
			  <?php
              if(isset($error) && count($error) > 0){
                echo '<div class="errors" align="center">';
                foreach($error as $errors){
                echo "<font color='red'>*".$errors."</font><br />";
                }
                echo '</div>';
                echo '<meta http-equiv="refresh" content="3"/>';
              }
              else
              {
	      
              $ip = getenv("REMOTE_ADDR");
                
				
	              mysql_select_db($server_adb,$connection_setup)or die(mysql_error());
                $accinfoq = mysql_query("SELECT * FROM account WHERE username = '".$accountName."'");
                $accinfo = mysql_num_rows($accinfoq);
          
                if ($accinfo == 0)
                {
                    $sha_pass_hash= sha1(strtoupper($accountName ) . ":" . strtoupper($accountPass));
                    $register_logon = mysql_query("INSERT INTO account (username,sha_pass_hash,email,last_ip,expansion) VALUES (UPPER('".$accountName."'),  CONCAT('".$sha_pass_hash."'),'".$accountEmail."','".$ip."','3')")or die(mysql_error());
              
                    mysql_select_db($server_adb,$connection_setup)or die(mysql_error());
					          $accountinfo = mysql_fetch_assoc(mysql_query("SELECT * FROM account WHERE username = UPPER('".$accountName."')"));
                    mysql_select_db($server_db,$connection_setup)or die(mysql_error());
                    $register_cms = mysql_query("INSERT INTO users (id,class,firstName,lastName,registerIp,country,birth,quest1,ans1) VALUES ('".mysql_real_escape_string($accountinfo['id'])."','0','".$firstName."','".$lastName."','".$ip."','".$country."','".$dob."','".$question."',UPPER('".$answer."'))");
             
                    if ($register_logon == true && $register_cms == true)
                    {
                        echo '<div class="alert-page" align="center">';
                        echo '<div class="alert-page-message success-page">
								<p class="text-green title"><strong>'.$re['scc1'].'</strong></p>
								<p class="caption">'.$re['scc2'].'</p>
								<p class="caption"><a href="account_man.php">'.$re['goPanel'].'</a></p>
								</div>';
                        echo '</div>';
                        $_SESSION['username'] = $accountName;
                        echo '<meta http-equiv="refresh" content="3;url=account_man.php"/>';
                    }
                    else{ //MODIFIED TO DELETE THE ACCOUNT IF SOMETHING IS WRONG DURING THE REGISTRATION
                        mysql_select_db($server_adb,$connection_setup)or die(mysql_error());
                        $accdel= mysql_query("DELETE FROM account WHERE username = '".$accountName."'");
                        echo '<div class="errors" align="center"><font color="red">'.$re['error1'].'</font><br><br />';
                        echo'<a href="register.php"><button class="ui-button button1"  id="back" tabindex="1" /><span><span>'.$re['back'].'</span></span></button></a></div>'; 
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
<optgroup label="">
<option value="CHL">Chile</option>
<option value="ESP">Espa�a</option>
<option value="GBR" selected="selected">United Kingdom</option>
<option value="FRA">France</option>
<option value="DEU">Germany</option>
<option value="RUS">Russian Federation</option>
</optgroup>
<option value="AFG">Afghanistan</option>
<option value="ALA">Åland Islands</option>
<option value="ALB">Albania</option>
<option value="DZA">Algeria</option>
<option value="ASM">American Samoa</option>
<option value="AND">Andorra</option>
<option value="AGO">Angola</option>
<option value="AIA">Anguilla</option>
<option value="ATA">Antarctica</option>
<option value="ATG">Antigua And Barbuda</option>
<option value="ARG">Argentina</option>
<option value="ARM">Armenia</option>
<option value="ABW">Aruba</option>
<option value="AUS">Australia</option>
<option value="AUT">Austria</option>
<option value="AZE">Azerbaijan</option>
<option value="BHS">Bahamas</option>
<option value="BHR">Bahrain</option>
<option value="BGD">Bangladesh</option>
<option value="BRB">Barbados</option>
<option value="BLR">Belarus</option>
<option value="BEL">Belgium</option>
<option value="BLZ">Belize</option>
<option value="BEN">Benin</option>
<option value="BMU">Bermuda</option>
<option value="BTN">Bhutan</option>
<option value="BOL">Bolivia</option>
<option value="BIH">Bosnia And Herzegovina</option>
<option value="BWA">Botswana</option>
<option value="BVT">Bouvet Island</option>
<option value="BRA">Brazil</option>
<option value="IOT">British Indian Ocean Territory</option>
<option value="BRN">Brunei Darussalam</option>
<option value="BGR">Bulgaria</option>
<option value="BFA">Burkina Faso</option>
<option value="BDI">Burundi</option>
<option value="KHM">Cambodia</option>
<option value="CMR">Cameroon</option>
<option value="CAN">Canada</option>
<option value="CPV">Cape Verde</option>
<option value="CYM">Cayman Islands</option>
<option value="CAF">Central African Republic</option>
<option value="TCD">Chad</option>
<option value="CHINA">China</option>
<option value="CXR">Christmas Island</option>
<option value="CCK">Cocos (Keeling) Islands</option>
<option value="COL">Colombia</option>
<option value="COM">Comoros</option>
<option value="COG">Congo</option>
<option value="COD">Congo, Democratic Republic Of The</option>
<option value="COK">Cook Islands</option>
<option value="CRI">Costa Rica</option>
<option value="CIV">Cote D'Ivoire</option>
<option value="HRV">Croatia</option>
<option value="CUB">Cuba</option>
<option value="CYP">Cyprus</option>
<option value="CZE">Czech Republic</option>
<option value="DNK">Denmark</option>
<option value="DJI">Djibouti</option>
<option value="DMA">Dominica</option>
<option value="DOM">Dominican Republic</option>
<option value="TLS">East Timor</option>
<option value="ECU">Ecuador</option>
<option value="EGY">Egypt</option>
<option value="SLV">El Salvador</option>
<option value="GNQ">Equatorial Guinea</option>
<option value="ERI">Eritrea</option>
<option value="EST">Estonia</option>
<option value="ETH">Ethiopia</option>
<option value="FLK">Falkland Islands (Malvinas)</option>
<option value="FRO">Faroe Islands</option>
<option value="FJI">Fiji</option>
<option value="FIN">Finland</option>
<option value="GUF">French Guiana</option>
<option value="ATF">French Southern Territories</option>
<option value="GAB">Gabon</option>
<option value="GMB">Gambia</option>
<option value="GEO">Georgia</option>
<option value="GHA">Ghana</option>
<option value="GIB">Gibraltar</option>
<option value="GRC">Greece</option>
<option value="GRL">Greenland</option>
<option value="GRD">Grenada</option>
<option value="GLP">Guadeloupe</option>
<option value="GUM">Guam</option>
<option value="GTM">Guatemala</option>
<option value="GGY">Guernsey</option>
<option value="GIN">Guinea</option>
<option value="GNB">Guinea-Bissau</option>
<option value="GUY">Guyana</option>
<option value="HTI">Haiti</option>
<option value="HMD">Heard Island And Mcdonald Islands</option>
<option value="HND">Honduras</option>
<option value="HKG">Hong Kong</option>
<option value="HUN">Hungary</option>
<option value="ISL">Iceland</option>
<option value="IND">India</option>
<option value="IDN">Indonesia</option>
<option value="IRN">Iran, Islamic Republic Of</option>
<option value="IRQ">Iraq</option>
<option value="IRL">Ireland</option>
<option value="IMN">Isle Of Man</option>
<option value="ISR">Israel</option>
<option value="ITA">Italy</option>
<option value="JAM">Jamaica</option>
<option value="JPN">Japan</option>
<option value="JEY">Jersey</option>
<option value="JOR">Jordan</option>
<option value="KAZ">Kazakhstan</option>
<option value="KEN">Kenya</option>
<option value="KIR">Kiribati</option>
<option value="KOR">Korea, Republic Of</option>
<option value="KWT">Kuwait</option>
<option value="KGZ">Kyrgyzstan</option>
<option value="LAO">Lao People'S Democratic Republic</option>
<option value="LVA">Latvia</option>
<option value="LBN">Lebanon</option>
<option value="LSO">Lesotho</option>
<option value="LBR">Liberia</option>
<option value="LBY">Libyan Arab Jamahiriya</option>
<option value="LIE">Liechtenstein</option>
<option value="LTU">Lithuania</option>
<option value="LUX">Luxembourg</option>
<option value="MAC">Macao</option>
<option value="MKD">Macedonia, The Former Yugoslav Republic Of</option>
<option value="MDG">Madagascar</option>
<option value="MWI">Malawi</option>
<option value="MYS">Malaysia</option>
<option value="MDV">Maldives</option>
<option value="MLI">Mali</option>
<option value="MLT">Malta</option>
<option value="MHL">Marshall Islands</option>
<option value="MRT">Mauritania</option>
<option value="MUS">Mauritius</option>
<option value="MYT">Mayotte</option>
<option value="MEX">Mexico</option>
<option value="FSM">Micronesia, Federated States Of</option>
<option value="MDA">Moldova, Republic Of</option>
<option value="MCO">Monaco</option>
<option value="MNG">Mongolia</option>
<option value="MNE">Montenegro</option>
<option value="MSR">Montserrat</option>
<option value="MAR">Morocco</option>
<option value="MOZ">Mozambique</option>
<option value="MMR">Myanmar</option>
<option value="NAM">Namibia</option>
<option value="NRU">Nauru</option>
<option value="NPL">Nepal</option>
<option value="NLD">Netherlands</option>
<option value="ANT">Netherlands Antilles</option>
<option value="NCL">New Caledonia</option>
<option value="NZL">New Zealand</option>
<option value="NIC">Nicaragua</option>
<option value="NER">Niger</option>
<option value="NGA">Nigeria</option>
<option value="NIU">Niue</option>
<option value="NFK">Norfolk Island</option>
<option value="MNP">Northern Mariana Islands</option>
<option value="NOR">Norway</option>
<option value="OMN">Oman</option>
<option value="PAK">Pakistan</option>
<option value="PLW">Palau</option>
<option value="PSE">Palestinian Territory, Occupied</option>
<option value="PAN">Panama</option>
<option value="PNG">Papua New Guinea</option>
<option value="PRY">Paraguay</option>
<option value="PER">Peru</option>
<option value="PHL">Philippines</option>
<option value="PCN">Pitcairn</option>
<option value="POL">Poland</option>
<option value="PRT">Portugal</option>
<option value="PRI">Puerto Rico</option>
<option value="QAT">Qatar</option>
<option value="REU">Reunion</option>
<option value="ROU">Romania</option>
<option value="RWA">Rwanda</option>
<option value="BLM">Saint Barthélemy</option>
<option value="SHN">Saint Helena</option>
<option value="KNA">Saint Kitts And Nevis</option>
<option value="LCA">Saint Lucia</option>
<option value="MAF">Saint Martin (French Part)</option>
<option value="SPM">Saint Pierre And Miquelon</option>
<option value="VCT">Saint Vincent And The Grenadines</option>
<option value="WSM">Samoa</option>
<option value="SMR">San Marino</option>
<option value="STP">Sao Tome And Principe</option>
<option value="SAU">Saudi Arabia</option>
<option value="SEN">Senegal</option>
<option value="SRB">Serbia</option>
<option value="SYC">Seychelles</option>
<option value="SLE">Sierra Leone</option>
<option value="SGP">Singapore</option>
<option value="SVK">Slovakia</option>
<option value="SVN">Slovenia</option>
<option value="SLB">Solomon Islands</option>
<option value="SOM">Somalia</option>
<option value="ZAF">South Africa</option>
<option value="SGS">South Georgia And The South Sandwich Islands</option>
<option value="LKA">Sri Lanka</option>
<option value="SDN">Sudan</option>
<option value="SUR">Suriname</option>
<option value="SJM">Svalbard And Jan Mayen</option>
<option value="SWZ">Swaziland</option>
<option value="SWE">Sweden</option>
<option value="CHE">Switzerland</option>
<option value="SYR">Syrian Arab Republic</option>
<option value="TWN">Taiwan</option>
<option value="TJK">Tajikistan</option>
<option value="TZA">Tanzania, United Republic Of</option>
<option value="THA">Thailand</option>
<option value="TGO">Togo</option>
<option value="TKL">Tokelau</option>
<option value="TON">Tonga</option>
<option value="TTO">Trinidad And Tobago</option>
<option value="TUN">Tunisia</option>
<option value="TUR">Turkey</option>
<option value="TKM">Turkmenistan</option>
<option value="TCA">Turks And Caicos Islands</option>
<option value="TUV">Tuvalu</option>
<option value="UGA">Uganda</option>
<option value="UKR">Ukraine</option>
<option value="ARE">United Arab Emirates</option>
<option value="USA">United States</option>
<option value="UMI">United States Minor Outlying Islands</option>
<option value="URY">Uruguay</option>
<option value="UZB">Uzbekistan</option>
<option value="VUT">Vanuatu</option>
<option value="VAT">Vatican City State</option>
<option value="VEN">Venezuela, Bolivarian Republic Of</option>
<option value="VNM">Viet Nam</option>
<option value="VGB">Virgin Islands, British</option>
<option value="VIR">Virgin Islands, U.S.</option>
<option value="WLF">Wallis And Futuna</option>
<option value="ESH">Western Sahara</option>
<option value="YEM">Yemen</option>
<option value="ZMB">Zambia</option>
<option value="ZWE">Zimbabwe</option>
</select>
<span class="inline-message" id="country-message"> </span>
</span>
<button
class="ui-button button1 "
type="submit"
id="country-submit"
tabindex="1">
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
<a
class="ui-button button1 "
href=""
tabindex="1">
<span>
<span>Change Country</span>
</span>
</a>
<a class="ui-cancel "
href=""
tabindex="1">
<span>
Cancel </span>
</a>
</p>
</div>
<div id="countryCHINA" class="input-note-content">
<p class="caption">You are on the Taiwanese regional Battle.net website. Only account holders who have a Taiwanese World of Warcraft account should create a Battle.net account here. If you have a Chinese World of Warcraft account, go to Battle.net China instead.</p>
<p>
<a
class="ui-button button1 "
href="?country=CHINA"
id="stayTaiwan"
tabindex="1">
<span>
<span>YES, I HAVE A TAIWANESE WORLD OF WARCRAFT ACCOUNT</span>
</span>
</a>
<br />
<a
class="ui-button button1 "
href="http://www.battlenet.com.cn"
id="gotoChina"
tabindex="1">
<span>
<span>GO TO BATTLE.NET IN CHINA</span>
</span>
</a>
<a class="ui-cancel "
href=""
tabindex="1">
<span>
Cancel </span>
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
<option value="0" selected="selected"><?php echo $re['day']; ?></option>    <?php //se podria generar con blucle por php ?>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
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
<option value="2012">2012</option>
<option value="2011">2011</option>
<option value="2010">2010</option>
<option value="2009">2009</option>
<option value="2008">2008</option>
<option value="2007">2007</option>
<option value="2006">2006</option>
<option value="2005">2005</option>
<option value="2004">2004</option>
<option value="2003">2003</option>
<option value="2002">2002</option>
<option value="2001">2001</option>
<option value="2000">2000</option>
<option value="1999">1999</option>
<option value="1998">1998</option>
<option value="1997">1997</option>
<option value="1996">1996</option>
<option value="1995">1995</option>
<option value="1994">1994</option>
<option value="1993">1993</option>
<option value="1992">1992</option>
<option value="1991">1991</option>
<option value="1990">1990</option>
<option value="1989">1989</option>
<option value="1988">1988</option>
<option value="1987">1987</option>
<option value="1986">1986</option>
<option value="1985">1985</option>
<option value="1984">1984</option>
<option value="1983">1983</option>
<option value="1982">1982</option>
<option value="1981">1981</option>
<option value="1980">1980</option>
<option value="1979">1979</option>
<option value="1978">1978</option>
<option value="1977">1977</option>
<option value="1976">1976</option>
<option value="1975">1975</option>
<option value="1974">1974</option>
<option value="1973">1973</option>
<option value="1972">1972</option>
<option value="1971">1971</option>
<option value="1970">1970</option>
<option value="1969">1969</option>
<option value="1968">1968</option>
<option value="1967">1967</option>
<option value="1966">1966</option>
<option value="1965">1965</option>
<option value="1964">1964</option>
<option value="1963">1963</option>
<option value="1962">1962</option>
<option value="1961">1961</option>
<option value="1960">1960</option>
<option value="1959">1959</option>
<option value="1958">1958</option>
<option value="1957">1957</option>
<option value="1956">1956</option>
<option value="1955">1955</option>
<option value="1954">1954</option>
<option value="1953">1953</option>
<option value="1952">1952</option>
<option value="1951">1951</option>
<option value="1950">1950</option>
<option value="1949">1949</option>
<option value="1948">1948</option>
<option value="1947">1947</option>
<option value="1946">1946</option>
<option value="1945">1945</option>
<option value="1944">1944</option>
<option value="1943">1943</option>
<option value="1942">1942</option>
<option value="1941">1941</option>
<option value="1940">1940</option>
<option value="1939">1939</option>
<option value="1938">1938</option>
<option value="1937">1937</option>
<option value="1936">1936</option>
<option value="1935">1935</option>
<option value="1934">1934</option>
<option value="1933">1933</option>
<option value="1932">1932</option>
<option value="1931">1931</option>
<option value="1930">1930</option>
<option value="1929">1929</option>
<option value="1928">1928</option>
<option value="1927">1927</option>
<option value="1926">1926</option>
<option value="1925">1925</option>
<option value="1924">1924</option>
<option value="1923">1923</option>
<option value="1922">1922</option>
<option value="1921">1921</option>
<option value="1920">1920</option>
<option value="1919">1919</option>
<option value="1918">1918</option>
<option value="1917">1917</option>
<option value="1916">1916</option>
<option value="1915">1915</option>
<option value="1914">1914</option>
<option value="1913">1913</option>
<option value="1912">1912</option>
<option value="1911">1911</option>
<option value="1910">1910</option>
<option value="1909">1909</option>
<option value="1908">1908</option>
<option value="1907">1907</option>
<option value="1906">1906</option>
<option value="1905">1905</option>
<option value="1904">1904</option>
<option value="1903">1903</option>
<option value="1902">1902</option>
<option value="1901">1901</option>
<option value="1900">1900</option>
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
<script type="text/javascript" src="wow/static/js/bam.js"></script>
<script type="text/javascript" src="wow/static/local-common/js/tooltip.js"></script>
<script type="text/javascript" src="wow/static/local-common/js/menu.js"></script>
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
<script type="text/javascript" src="wow/static/js/inputs.js"></script>
<script type="text/javascript" src="wow/static/js/account-creation/streamlined-creation.js"></script>
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