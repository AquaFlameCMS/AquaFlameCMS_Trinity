<div id="search-bar">
	<form action="<?php echo $website['root']; ?>search.php" method="get" id="search-form">
		<div>
			<input type="text" name="q" id="search-field" value="Search <?php echo $website['title']; ?>" maxlength="35" alt="Search <?php echo $website['title']; ?>" tabindex="50" accesskey="q" class="" />
			<input type="submit" id="search-button" value="" title="Search <?php echo $website['title']; ?>" tabindex="50" />
		</div>
	</form>
</div>
<h1 id="logo"><a href="<?php echo $website['root']; ?>" tabindex="50" accesskey="h">Battle.net</a></h1>
<div id="navigation">
<div id="page-menu" class="large">
<h2><a href="<?php echo $website['root']; ?>account/"> <?php echo $ha['ha26']; ?>
</a></h2>
<?php if(isset($page_cat)) ?>
<ul>
<li <?php if($page_cat=='summary') echo'class="active"';?>>
<a href="<?php echo $website['root']; ?>account/" class="border-3"><?php echo $ha['ha0']; ?></a>
<span></span>
</li>
<li <?php if($page_cat=='settings') echo'class="active"';?>>
<a href="#" class="border-3 menu-arrow" onclick="openAccountDropdown(this, 'settings'); return false;"><?php echo $ha['ha1']; ?></a>
<span></span>
<div class="flyout-menu" id="settings-menu" style="display: none">
<ul>
<li><a href="<?php echo $website['root']; ?>account/change-mail.php"><?php echo $ha['ha2']; ?></a></li>
<li><a href="<?php echo $website['root']; ?>account/change-password.php"><?php echo $ha['ha3']; ?></a></li>
<li><a href="#"><?php echo $ha['ha4']; ?></a></li>
<li><a href="#"><?php echo $ha['ha5']; ?></a></li>
<li><a href="#"><?php echo $ha['ha6']; ?></a></li>
<li><a href="contact_info.php"><?php echo $ha['ha7']; ?></a></li>
</ul>
</div>
</li>
<li <?php if($page_cat=='gamesncodes') echo'class="active"';?>>
<a href="#" class="border-3 menu-arrow" onclick="openAccountDropdown(this, 'games'); return false;"><?php echo $ha['ha8']; ?></a>
<span></span>
<div class="flyout-menu" id="games-menu" style="display: none">
<ul>
<li><a href="<?php echo $website['root']; ?>account/vote.php"><?php echo $ha['ha9']; ?></a></li>
<li><a href="<?php echo $website['root']; ?>account/donation_panel.php"><?php echo $ha['ha10']; ?></a></li>
<li><a href="<?php echo $website['root']; ?>account/sms.php"><?php echo $ha['ha11']; ?></a></li>
<li><a href=""><?php echo $ha['ha12']; ?></a></li>
<li><a href="<?php echo $website['root']; ?>account/game_client.php"><?php echo $ha['ha13']; ?></a></li>
<li><a href=""><?php echo $ha['ha14']; ?></a></li>
<li><a href=""><?php echo $ha['ha15']; ?></a></li>
</ul>
</div>
</li>

<li <?php if($page_cat=='security') echo'class="active"';?>>
<a href="" class="border-3 menu-arrow" onclick="openAccountDropdown(this, 'player'); return false;"><?php echo $ha['ha16']; ?></a>
<span></span>
<div class="flyout-menu" id="player-menu" style="display: none">
<ul>
<li><a href="<?php echo $website['root']; ?>account/chars-unst.php"><?php echo $ha['ha17']; ?></a></li>
<li><a href="<?php echo $website['root']; ?>account/change_name.php"><?php echo $ha['ha18']; ?></a></li>
<li><a href="<?php echo $website['root']; ?>account/change_faction.php"><?php echo $ha['ha19']; ?></a></li>
<li><a href="<?php echo $website['root']; ?>account/change_race.php"><?php echo $ha['ha20']; ?></a></li>
<li><a href="<?php echo $website['root']; ?>account/change_appear.php"><?php echo $ha['ha22']; ?></a></li>
<li><a href=""><?php echo $ha['ha21']; ?></a></li>
<li><a href="<?php echo $website['root']; ?>account/raf-invite.php"><?php echo $ha['ha23']; ?></a></li>
<li><a href=""><?php echo $ha['ha24']; ?></a></li>
</ul>
</div>
</li>

<li <?php if($page_cat=='media') echo'class="active"';?>>
<a href="<?php echo $website['root']; ?>media/send_media.php"><?php echo $Media['SendMedia']; ?></a>
<span></span>
</li>



<li class="account-balance account-balance-usd" id="accountBalanceCenter" data-tooltip-options="{&quot;location&quot;: &quot;mouse&quot;}">
<a href="#" class="border-3 menu-arrow title" onclick="openAccountDropdown(this, 'accountBalance'); return false;">
<span class="sub-title">Credits:</span><br />
<?php
$points = mysql_query("SELECT * FROM $server_adb.account WHERE username = '".$_SESSION['username']."'")or die(mysql_error());
while($get = mysql_fetch_array($points))
{
?>
<span class="balance" id="primary-balance"><?php echo $get["credits"];?></span>
<?php } ?>
</a>
<div class="flyout-menu" id="accountBalance-menu">
<ul>
<li class=" first nonBeta"><a href="<?php echo $website['root']; ?>account/sms.php">Add Funds</a></li>
<li class=" "><a href="#">Add Pre-Paid Card</a></li>
<li class=" line "><a href="#">Balance History</a></li>
<li class="line"><a href="#" onclick="$('#account-balance-dialog').dialog('open'); return false;">Other Currencies</a></li>
<li class="line"><a href="#">Balance Help</a></li>
<li id="refreshBalance"><a href="#" onclick="accountBalance.refreshBalance(); return false;">Refresh Balance</a></li>
<!--<li class="refreshing" id="refreshingBalance"><a href="#" onclick="return false;"><img src="/account/static/images/icons/loader.gif" alt="" height="11" width="16" />Refreshing…</a></li>-->
</ul>
</div>
</li>
</ul>
<span class="clear"><!-- --></span>
</div>
<script type="text/javascript">
//<![CDATA[
$(function() {
accountBalance.accountBalanceCurrency = "USD";
accountBalance.currencyMap = {
'USD' : {
'format': '{0} USD',
'groupSize': 3,
'delimiter': '.',
'point': ','
},
'BRL' : {
'format': '{0} BRL',
'groupSize': 3,
'delimiter': '.',
'point': ','
},
'ARS' : {
'format': '{0} ARS',
'groupSize': 3,
'delimiter': '.',
'point': ','
},
'CLP' : {
'format': '{0} CLP',
'groupSize': 3,
'delimiter': '.',
'point': ','
},
'MXN' : {
'format': '{0} MXN',
'groupSize': 3,
'delimiter': '.',
'point': ','
},
'AUD' : {
'format': '{0} AUD',
'groupSize': 3,
'delimiter': '.',
'point': ','
},
'BET' : {
'format': 'BZ${0}',
'groupSize': 3,
'delimiter': '.',
'point': ','
}
};
accountBalance.initialize();
$('.account-balance-dialog').dialog({
autoOpen: false,
modal: true,
position: "center",
resizeable: false,
closeText: "Cerrar",
buttons: {
'Ok': function() {
$(this).dialog("close");
}
},
open: function() {
$(".ui-dialog-buttonpane").find("button").addClass("button1").find(":first").addClass("first");
if(Core.browser=="ie6" || Core.browser=="ie7" || Core.browser=="ie8"){
$(".ui-widget-overlay").css("opacity", 0.8);
}
}
});
});
//]]>
</script>
<span class="clear"></span>
</div>
</div>