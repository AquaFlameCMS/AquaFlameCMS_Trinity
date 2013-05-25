<span>ERROR</span>
<p>Requesting Error.</p>
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
	echo '
	<div class="service" align="left">
	<center>
    <h3>ERROR</h3><br />
    <div class="loader"></div>
	<br />
	<font color="red">You\'re being redirected to Services Page...</font>
    <meta http-equiv="refresh" content="3;url=services.php"/>
    </center>
	</div>';
?>
</center>