<?php include_once("../configs.php");

// Paypal Post-back script.
class Item
{
	var $Id;
	var $Server;
	var $Character;
	
	var $Servername;
	var $Charname;
	var $Rewardname;
	var $RewardInfo;
	var $Price;
	var $Error;
}

//Check with paypal
$Post = "cmd=_notify-validate";
foreach($_POST as $key => $value)
{
	$value = urlencode(stripslashes($value));
	$Post.="&$key=$value";
}

$Sock = fsockopen(PAYPAL_ADDRESS,80);
if(!$Sock) {}
$Header.="POST /cgi-bin/webscr HTTP/1.0\r\n";
$Header.="Content-Type: application/x-www-form-urlencoded\r\n";
$Header.="Content-Length: ".strlen($Post)."\r\n\r\n";
fputs($Sock,$Header.$Post);
while(!feof($Sock))
{
	$Read = fgets($Sock,1024);
	if(strcmp($Read,"INVALID")==0)
	{
		$Con = mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASS);
		mysql_select_db(MYSQL_DATA,$Con);
		mysql_query("INSERT INTO logs (code,date,info) VALUES ('1',NOW(),'Error: invalid request sent.')",$Con);
		mysql_close($Con);
		die;
	}
	if(strcmp($Read,"VERIFIED")==0)
	{
		$Con = mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASS);
		mysql_select_db(MYSQL_DATA,$Con);
		// First, let's check the important information.
		// Payment was actually sent to us?
		if($_POST['receiver_email'] != RECEIVER_EMAIL)
		{
			mysql_query("INSERT INTO logs (code,date,txn_id,payer_email,info) VALUES ('0',NOW(),'{$_POST['txn_id']}','{$_POST['payer_email']}','Error: receiver_email should have been ".RECEIVER_EMAIL.", but was {$_POST['receiver_email']}.')",$Con);
			die;
		}
		
		// Transaction ID is not recycled?
		$res = mysql_query("SELECT * FROM logs WHERE txn_id='{$_POST['txn_id']}'",$Con);
		if(mysql_num_rows($res)!=0)
		{
			mysql_query("INSERT INTO logs (code,date,txn_id,payer_email,info) VALUES ('0',NOW(),'{$_POST['txn_id']}','{$_POST['payer_email']}','Error: Payment transaction ID (txn_id) was found to be used already.')",$Con);
			die;
		}
		
		// Gather all reward info.
		$Items;
		$idx = 0;
		for($i=1;$i<=(int)$_POST['num_cart_items'];$i++)
		{
			for($ii=1;$ii<=(int)$_POST['quantity'.$i];$ii++)
			{
				$idx++;
				$info = explode("-",$_POST['item_number'.$i]);
				$Items[$idx]=new Item();
				$Items[$idx]->Id = $info[1];
				$Items[$idx]->Server = $info[0];
				$Items[$idx]->Character = $info[2];
			}
		}
		
		// Loop through and check to make sure items are valid, also get item price.
		$Money = 0.00;
		foreach($Items as $key => $value)
		{
			$res = mysql_query("SELECT * FROM rewards WHERE id='{$value->Id}' AND server='{$value->Server}'",$Con);
			if(mysql_num_rows($res)==0)
			{
				$value->Error.="No reward with ID {$value->Id} exists on server ID {$value->Server}. ";
			}
			else
			{
				$rew = mysql_fetch_array($res);
				$value->Rewardname = $rew['name'];
				$Money+=(float)$rew['price'];
				$value->Price = $rew['price'];
				$value->RewardInfo = $rew;
				if($Money>(float)$_POST['mc_gross'])
				{
					$value->Error.="Did not pay enough to include this item. Item cost: {$rew['price']} Money spent: {$_POST['mc_gross']} Total money used up: {$Money}. ";
				}
			}
		}
		
		// Begin granting items.
		foreach($Items as $key => $value)
		{
			if($value->Error==NULL)
			{
				$res = mysql_query("SELECT * FROM servers WHERE id='{$value->Server}'",$Con);
				$res = mysql_fetch_array($res);
				$value->Servername = $res['name'];
				mysql_query("INSERT INTO logs (code,date,txn_id,amount,payer_email,info) VALUES (2,NOW(),'{$_POST['txn_id']}',{$value->Price},'{$_POST['payer_email']}','Reward granted \"{$value->Rewardname}\" ({$value->Id}) for player GUID {$value->Character} on server {$value->Servername}.')",$Con);
				mysql_close($Con);
				$Con = mysql_connect($res['host'],$res['username'],$res['password']);
				mysql_select_db($res['database'],$Con);
				for($i=1;$i<=8;$i++)
				{
					if($value->RewardInfo['item'.$i]!="0")
					{
						mysql_query("INSERT INTO mailbox_insert_queue (sender_guid,receiver_guid,subject,body,stationary,money,item_id,item_stack) VALUES ('{$value->Character}','{$value->Character}','".MAIL_SUBJECT."','".MAIL_BODY."','61','0','{$value->RewardInfo['item'.$i]}','1')",$Con);
					}
				}
				if($value->RewardInfo['gold']!="0")
					{
						mysql_query("INSERT INTO mailbox_insert_queue (sender_guid,receiver_guid,subject,body,stationary,money,item_id,item_stack) VALUES ('{$value->Character}','{$value->Character}','".MAIL_SUBJECT."','".MAIL_BODY."','61','{$value->RewardInfo['gold']}','0','0')",$Con);
					}
				mysql_close($Con);
				$Con = mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASS);
				mysql_select_db(MYSQL_DATA,$Con);
				
			}
			else
			{
				mysql_query("INSERT INTO logs (code,date,txn_id,payer_email,info) VALUES ('0',NOW(),'{$_POST['txn_id']}','{$_POST['payer_email']}','{$value->Error}')",$Con);
			}
		}
		mysql_close($Con);
	}
}
fclose($Sock);
?>