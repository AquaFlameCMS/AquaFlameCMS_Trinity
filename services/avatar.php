
<span><?php echo $Serv['Serv31']; ?></span>
<p><?php echo $Serv['Serv32']; ?></p>
</div>
<br />
<style type="text/css">
.avatar {
	padding:15px;
}

.service {
	width:600px; padding:0 0 0 28px; padding-bottom:70px; float:left; min-height:183px;
}

.submit {
	height:38px;
	width:128px;
	background:url('wow/static/images/services/button.png') no-repeat;
	border:0px;
	color:#E0BB00;
	text-shadow:0px 0px 2px #000;
	font-size:15px;
	font-weight:bold;
}
.submit:hover {
	background-position:0 -41;
}
.submit:active{
	background-position:0 -82;
}
.portrait-b img{ -moz-box-shadow:0 0 10px #000; -webkit-box-shadow:0 0 10px #000; box-shadow:0 0 10px #000;  }
.loader {
        width:24px;
        height:24px;
        background: url("wow/static/images/loaders/canvas-loader.gif") no-repeat;
       }
</style>
<center>
<?php
if(isset($_SESSION['username'])){
if($_POST['avatar'] != ""){
    if($_POST['avatar'] == "blizzard.png"){
        echo '
    	<div class="service" align="left">
    	<center>
        <h3>'.$Serv['Serv33'].'</h3><br />
        <div class="loader"></div>
    	<br />
    	<font color="red">'.$Serv['Serv34'].'</font>
        <meta http-equiv="refresh" content="2;url=services.php"/>
        </center>
    	</div>';
    }else{
	$change_avatar = mysql_real_escape_string(mysql_query("UPDATE users SET avatar = '".mysql_real_escape_string($_POST['avatar'])."' WHERE id = '".$account_information['id']."'"));
	echo '
	<div class="service" align="left">
	<center>
    <h3>'.$Serv['Serv33'].'</h3><br />
    <div class="loader"></div>
	<br />
	<font color="aqua">'.$Serv['Serv35'].'</font>
    <meta http-equiv="refresh" content="2;url=services.php"/>
    </center>
	</div>';
    }
}else{
?>



<script>
function colors (color){
    document.getElementById("image").src="images/avatars/2d/"+color;
}
</script>

<table border="0" width="400">
<tr>
<form method="POST">
<td class="avatar">
<center>
<div class="avatar portrait-b"><img id="image" src="images/avatars/2d/1-0.jpg" /></div>
<select onchange="colors(this.options[this.selectedIndex].value)" name="avatar">
    <option value="1-0.jpg" selected><?php echo $uplate['r1']; ?></option>
    <option value="2-0.jpg"><?php echo $uplate['r2']; ?></option>
	<option value="3-0.jpg"><?php echo $uplate['r3']; ?></option>
	<option value="4-0.jpg"><?php echo $uplate['r4']; ?></option>
	<option value="5-0.jpg"><?php echo $uplate['r5']; ?></option>
	<option value="6-0.jpg"><?php echo $uplate['r6']; ?></option>
	<option value="7-0.jpg"><?php echo $uplate['r7']; ?></option>
	<option value="8-0.jpg"><?php echo $uplate['r8']; ?></option>
	<option value="9-0.jpg"><?php echo $uplate['r9']; ?></option>
	<option value="10-0.jpg"><?php echo $uplate['r10']; ?></option>
	<option value="11-0.jpg"><?php echo $uplate['r11']; ?></option>
	<option value="22-0.jpg"><?php echo $uplate['r22']; ?></option>
</select>
</center>
</td>
</tr>
</table>
<br />
<input type="submit" class="submit" name="submit" value="<?php echo $Serv['Serv36']; ?>"/>
</form>
<?php }
}else{
echo '
	<div class="service" align="left">
	<center>
	<h3>'.$Serv['Serv37'].'</h3>
	<br />
	<div class="loader"></div>
	<br />
    <meta http-equiv="refresh" content="2;url=services.php"/>
	</center>
	</div>
';
}
?>
</center>