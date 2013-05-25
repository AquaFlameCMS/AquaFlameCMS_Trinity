<?
session_start();
require("../configs.php");
if($_SESSION['login']!=true)
{
	switch($_GET['do'])
	{
	case "login":
		if($_POST['pass']==ACP_PASSWORD)
		{
			$_SESSION['login']=true;
		}
		else
		{
			?><title>Log In</title>
			<body style="margin:auto; width:400px; margin-top:200px;">
			<fieldset><legend>Enter Password</legend>
			Incorrect Password
			</fieldset>
			<script type="text/javascript">
<!--
var TabbedPanels2 = new Spry.Widget.TabbedPanels("TabbedPanels2");
var TabbedPanels3 = new Spry.Widget.TabbedPanels("TabbedPanels3");
//-->
</script>
</body>
			<?
			die;
		}
		break;
	default:
		?><title>Log In</title>
		<body style="margin:auto; width:400px; margin-top:200px;">
		<fieldset><legend>Enter Password</legend>
		<form action="?do=login" method="post">
		<input name="pass" type="password" size="32" /> <input type="submit" value="Enter" />
		</form>
		</fieldset></body>
		<?
		die;
		break;
	}
}
switch($_GET['do'])
{
case "invalid":
	$sql = mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASS);
	mysql_select_db(MYSQL_DATA);
	$start = (int)$_GET['start'];
	$res = mysql_query("SELECT * FROM logs WHERE code='1' ORDER BY id DESC");
	@mysql_data_seek($res,$start);
	$i=1;
	?><tr><td>Payer Email</td><td>Date</td><td>Info</td></tr><?
	while($i<=100 && ($row = mysql_fetch_array($res)))
	{
		?><tr><td><? echo $row['payer_email']; ?></td><td><? echo $row['date']; ?></td><td><? echo $row['info']; ?></tr><?
		$i++;
	}
	break;
case "erroneous":
	$start = (int)$_GET['start'];
	$sql = mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASS);
	mysql_select_db(MYSQL_DATA);
	$res = mysql_query("SELECT * FROM logs WHERE code='0' AND payer_email LIKE '%".$_GET['search']."%' ORDER BY id DESC");
	@mysql_data_seek($res,$start);
	$i=1;
	?><tr><td>Payer Email</td><td>Date</td><td>TXN Id</td><td>Amount Paid</td><td>Info</td></tr><?
	while($i<=100 && ($row = mysql_fetch_array($res)))
	{
		?><tr><td><? echo $row['payer_email']; ?></td><td><? echo $row['date']; ?></td><td><? echo $row['txn_id']; ?></td><td><? echo (real)$row['amount']; ?></td><td><? echo $row['info']; ?></tr><?
		$i++;
	}
	break;
case "processed":
	$start = (int)$_GET['start'];
	$sql = mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASS);
	mysql_select_db(MYSQL_DATA);
	$res = mysql_query("SELECT * FROM logs WHERE code='2' AND payer_email LIKE '%".$_GET['search']."%' ORDER BY id DESC");
	@mysql_data_seek($res,$start);
	$i=1;
	?><tr><td>Payer Email</td><td>Date</td><td>TXN Id</td><td>Amount Paid</td><td>Notes</td></tr><?
	while($i<=100 && ($row = mysql_fetch_array($res)))
	{
		?><tr><td><? echo $row['payer_email']; ?></td><td><? echo $row['date']; ?></td><td><? echo $row['txn_id']; ?></td><td><? echo (real)$row['amount']; ?></td><td><? echo (real)$row['info']; ?></td></tr><?
		$i++;
	}
	break;
default:
	$sql = mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASS);
	mysql_select_db(MYSQL_DATA);
	$res = mysql_query("SELECT amount,date FROM logs WHERE code='2'");
	$res2 = mysql_query("SELECT amount,date FROM logs WHERE code='2' AND date >= cast('".date("Y-m")."-00' AS DATETIME)");
	$res4 = mysql_query("SELECT amount,date FROM logs WHERE code='2' AND date >= cast('".date("Y-m-d")."' AS DATETIME)");
	$T=0;
	$M=0;
	$D=0;
	while($row = mysql_fetch_array($res))
	{
		$T+=(float)$row['amount'];
	}
	while($row = mysql_fetch_array($res2))
	{
		$M+=(float)$row['amount'];
	}
	while($row = mysql_fetch_array($res4))
	{
		$D+=(float)$row['amount'];
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Donations Administration Panel</title>
<script src="resources/SpryTabbedPanels.js" type="text/javascript"></script>
<script src="resources/SpryData.js" type="text/javascript"></script>
<script src="resources/xpath.js" type="text/javascript"></script>
<link href="resources/SpryTabbedPanels.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="TabbedPanels1" class="TabbedPanels">
	<ul class="TabbedPanelsTabGroup">
		<li class="TabbedPanelsTab" tabindex="0">Donations Home</li>
		<li class="TabbedPanelsTab" tabindex="0">Donation Logs - Processed</li>
		<li class="TabbedPanelsTab" tabindex="0">Donation Logs - Erroneous</li>
		<li class="TabbedPanelsTab" tabindex="0">Donation Logs - Invalid</li>
	</ul>
	<div class="TabbedPanelsContentGroup">
		<div class="TabbedPanelsContent"><h3>Donations Home</h3><br />
			<br />
			This is the Donations Administration Panel.
			Here you will be able to access logs of donations that are processed, erroneous, or invalid.
			You will also be able to set up the donations system if this is your first visit.<br />
			<br />
			Use the tabs at the top of the page to navigate.<br />
			<br />
			<table width="200" border="0" cellspacing="5px">
				<tr>
					<td>Total Gain: </td>
					<td><?php echo CURRENCYSYMBOL.$T; ?></td>
				</tr>
				<tr>
					<td>This Month: </td>
					<td><?php echo CURRENCYSYMBOL.$M; ?></td>
				</tr>
				<tr>
					<td>Today: </td>
					<td><?php echo CURRENCYSYMBOL.$D; ?></td>
				</tr>
			</table>

			<br />
			Please consider donating some money to the Ascent team, for all their hard work to make the Ascent server possible.<br />

			<br />
		</div>
		<div class="TabbedPanelsContent">
			<h3>Donation Logs - Processed</h3><br />
			These are the logs of donations that were successfully processed.<br />
			<br /><font size="-1">
			<input type="text" size="16" id="processedsearch" /><input type="button" value="Refresh" onClick="Spry.Utils.updateContent('processed','?do=processed&search='+document.getElementById('processedsearch').value+'&start=0');" />
			<table width="800px" border="1" id="processed" cellspacing="2px" cellpadding="5px">
			</table></font>
		</div>
		<div class="TabbedPanelsContent">
			<h3>Donation Logs - Erroneous</h3><br />
			These are the logs of donations where the reward was not given because the information was erroneous.<br />
			<br /><font size="-1">
			<input type="text" size="16" id="erroneoussearch" /><input type="button" value="Refresh" onClick="Spry.Utils.updateContent('erroneous','?do=erroneous&search='+document.getElementById('erroneoussearch').value+'&start=0');" />
			<table width="900px" border="1" id="erroneous" cellspacing="2px" cellpadding="5px">
			</table></font>
		</div>
		<div class="TabbedPanelsContent">
			<h3>Donation Logs - Invalid</h3><br />
			These are logs of invalid PayPal requests. It is reccomended that you investigate every report of this.<br />
			<br /><font size="-1">
			<input type="button" value="Refresh" onClick="Spry.Utils.updateContent('invalid','?do=invalid&start=0');" />
			<table width="900px" border="1" id="invalid" cellspacing="2px" cellpadding="5px">
			</table></font>
		</div>
	</div>
</div>
<script type="text/javascript">
<!--
var TabbedPanels1 = new Spry.Widget.TabbedPanels("TabbedPanels1");
//-->
</script>
</body>
</html><?
	break;
}?>
