<?php
	include_once("../configs.php");
	switch($_GET['do'])
	{
	case "rewards":
		$Con = mysql_connect($serveraddress,$serveruser,$serverpass);
		mysql_select_db($server_db,$Con);
		$Id = mysql_real_escape_string($_GET['id']);
		$res = mysql_query("SELECT * FROM rewards WHERE server='{$Id}' ORDER BY id ASC");
		$first = true;
		while($row = mysql_fetch_array($res))
		{
			if(!$first) { $Rewards.="\n\n"; }
			$first=false;
			$Rewards.="{$row['id']}\n{$row['name']}\n{$row['price']}";
		}
		mysql_close($Con);
		echo $Rewards;
		die;
		break;
	case "checkcharacter":
		$Con = mysql_connect($serveraddress,$serveruser,$serverpass);
		mysql_select_db($server_db,$Con);
		$Character = mysql_real_escape_string($_GET['name']);
		$Server = mysql_real_escape_string($_GET['id']);
		$res = mysql_query("SELECT * FROM servers WHERE id='$Server'");
		$res = mysql_fetch_array($res);
		$Con2 = mysql_connect($res['host'],$res['username'],$res['password']);
		mysql_select_db($res['database'],$Con2);
		$res = mysql_query("SELECT * FROM characters WHERE name='$Character'",$Con2);
		$res = mysql_fetch_array($res);
		if($res==NULL) { echo "0"; mysql_close($Con); mysql_close($Con2); die; }
		echo $res['guid'];
		mysql_close($Con);
		mysql_close($Con2);
		die;
		break;
	}
	
	//Generate server list.
	$Con = mysql_connect($serveraddress,$serveruser,$serverpass);
	mysql_select_db($server_db,$Con);
	$res = mysql_query("SELECT * FROM servers ORDER BY id ASC");
	while($row = mysql_fetch_array($res))
	{
		$Servers.="<option value='{$row['id']}'>{$row['name']}</option>";
	}
	mysql_close($Con);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<script src="resources/xpath.js" type="text/javascript"></script>
<script src="resources/SpryUtils.js" type="text/javascript"></script>
<script src="resources/SpryData.js" type="text/javascript"></script>
<script language="javascript">
	var Server;
	var Reward;
	var Rewards = new Array();
	var Character;
	var Price;
	var Submit = false;
	
	function GetRewards()
	{
		//document.getElementById("submit").disabled="true";
		Submit = false;
		R.options.length=0;
		Rewards.length=0;
		document.getElementById("rewardinfo").style.visibility="visible";
		Spry.Utils.loadURL("GET","form.php?do=rewards&id="+S.value,false,function(Req)
		{
			var r = Req.xhRequest.responseText.split("\n\n");
			for(x in r)
			{
				var rr = r[x].split("\n");
				Rewards[rr[0]]=new Object();
				Rewards[rr[0]].Name = rr[1];
				Rewards[rr[0]].Price = rr[2];
				R.options[x] = new Option(rr[1],rr[0]);
			}
		});
		document.getElementById("rewardinfo").style.visibility="hidden";
		Submit=true;
		GetPrice();
		CheckCharacter();
	}
	
	function GetPrice()
	{
		P.value = '<?php echo CURRENCYSYMBOL; ?>'+Rewards[R.value].Price;
	}
	
	function CheckCharacter()
	{
		Submit=false;
		document.getElementById("charloading").style.display="block";
		document.getElementById("charfound").style.display="none";
		document.getElementById("charnotfound").style.display="none";
		Spry.Utils.loadURL("GET","form.php?do=checkcharacter&name="+C.value+"&id="+S.value,false,function(Req)
		{
			var r = Req.xhRequest.responseText;
			if(r!="0")
			{
				document.getElementById("charloading").style.display="none";
				document.getElementById("charfound").style.display="block";
				Character = r;
				Submit = true;
			}
			else
			{
				document.getElementById("charloading").style.display="none";
				document.getElementById("charnotfound").style.display="block";
			}
		});
	}
	
	function SubmitCheck()
	{
		if(Submit)
		{
			document.getElementById('item_name').value=Rewards[R.value].Name;
			document.getElementById('item_number').value=S.value+'-'+R.value+'-'+Character;
			document.getElementById('amount').value=Rewards[R.value].Price;
			return true;
		}
		else
		{
			return false;
		}
	}
</script>


<style type="text/css">
<!--
body,td,th {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #000000;
}
body {
	background-color: #333333;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	background-image: url(sq.jpg);
	background-repeat: repeat;
}
a {
	font-size: 11px;
	color: #666666;
}
a:link {
	text-decoration: none;
}
a:visited {
	text-decoration: none;
	color: #666666;
}
a:hover {
	text-decoration: none;
	color: #999999;
}
a:active {
	text-decoration: none;
	color: #999999;
}
#apDiv1 {
	position:absolute;
	left:28px;
	top:45px;
	width:426px;
	height:289px;
	z-index:1;
}
#apDiv3 {
	position:absolute;
	left:60px;
	top:171px;
	width:398px;
	height:173px;
	z-index:2;
}
-->
</style>
<div id="apDiv1"><img src="transmain.png" width="467" height="381" /></div>
<div id="apDiv3">
  <table border="0" cellspacing="5px">
    <tr>
      <td><span class="style1">Realm:</span></td>
      <td><select name="server" id="server" size="1" style="width:150px;" onchange="GetRewards();">
          <?php echo $Servers; ?>
      </select></td>
      <td id="serverinfo"></td>
    </tr>
    <tr>
      <td><span class="style1">Select Item:</span></td>
      <td><select name="reward" id="reward" size="1" style="width:150px;" onchange="GetPrice();">
      </select></td>
      <td id="rewardinfo" style="visibility:hidden;"><img src="resources/loading.gif" alt="loading" /></td>
    </tr>
    <tr>
      <td><span class="style1">Character Name:</span></td>
      <td><input name="character" id="character" type="text" maxlength="20" style="width:150px;" onblur="CheckCharacter();"/></td>
      <td id="characterinfo"><img src="resources/loading.gif" alt="loading" id="charloading" /><img src="resources/ok.png" alt="ok" id="charfound" /><img src="resources/notok.png" alt="notok" id="charnotfound" /></td>
    </tr>
     <tr>
      <td><span class="style1">Donation Cost:</span></td>
      <td><input type="text" size="8" name="price" id="price" readonly="readonly" /></td>
      <td></td>
      </tr>
      <td><span class="style1">Email Address:</span></td>
      <td><input name="character" id="character" type="text" maxlength="20" style="width:150px;" onblur="CheckCharacter();"/></td>
<tr class='forumrow'><td>Are You Sure?</td><td><select name='showprofile'><option value='1'>No</option><option value='0'>Yes</option></select></td></tr>
    </tr>
    <tr>
      <td><form target="paypal" action="https://<?php echo PAYPAL_ADDRESS; ?>/cgi-bin/webscr" method="post" onsubmit="return SubmitCheck();">
          <input id="submit" type="submit" value="  Confirm Order  "<form target="paypal" action="https://<?php echo PAYPAL_ADDRESS; ?>/cgi-bin/webscr" method="post" onsubmit="return SubmitCheck();">
          <input type="hidden" name="notify_url" value="<?php echo FORM_LOCATION; ?>" />
          <input type="hidden" name="add" value="1" />
          <input type="hidden" name="cmd" value="_cart" />
          <input type="hidden" name="business" value="<?php echo RECEIVER_EMAIL; ?>" />
          <input type="hidden" id="item_name" name="item_name" value="" />
          <input type="hidden" id="item_number" name="item_number" value="" />
          <!-- ATTENTION HACKERS: Don't try changing anything here, it won't work, you won't receive a reward, and we'll keep your money. -->
          <input type="hidden" id="amount" name="amount" value="" />
          <input type="hidden" name="no_shipping" value="0" />
          <input type="hidden" name="no_note" value="1" />
          <input type="hidden" name="currency_code" value="<?php echo CURRENCY_CODE; ?>" />
          <input type="hidden" name="lc" value="US" />
          <input type="hidden" name="bn" value="PP-ShopCartBF" />
      </form></td>
      <td valign="top"><div align="left" class="style7">Typing Incorrect Information May Result In Item Loss. This Is Hack Proof</div></td>
      <td></td>


    </tr>
  </table>
</div>
<div id="maindonate"></div>
<div id="apDiv2"></div>
<p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;        </p>
    <script language="javascript">
	var S = document.getElementById("server");
	var R = document.getElementById("reward");
	var C = document.getElementById("character");
	var P = document.getElementById("price");
	GetRewards();
    </script>