<?php

/**
 * Copyright (C) 2013 AquaflameCMS <http://aquaflame.org/>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 **/

//Conexion con la base de datos y el archivo que contiene la funcion email
require_once('../../configs.php');
include('funcion.php');
$page_cat = "account";
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
<title><?php echo $website['title']; ?><?php echo $Log['Log']; ?></title>
<meta http-equiv="imagetoolbar" content="false"/>
<link rel="shortcut icon" href="../../wow/static/local-common/images/favicons/wow.png" type="image/x-icon" />
<link rel="stylesheet" href="../../wow/static/local-common/css/common.css?v22"/>
<link rel="shortcut icon" href="../../wow/static/_themes/bam/img/favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" href="../../wow/static/_themes/bam/css/master.css?v1"/>
<link rel="stylesheet" href="../../wow/static/_themes/bam/css/_lang/en-gb.css?v1"/>
<script src="../../wow/static/local-common/js/third-party/jquery-1.4.4-p1.min.js"></script>
<script src="../../wow/static/local-common/js/core.js?v22"></script>
<script type="text/javascript">
Core.baseUrl = '/login/en/';
</script>
</head>
<body class="en-gb">
<div id="wrapper">
<h1 id="logo"><a href="./"><?php echo $Log['Log1']; ?></a></h1>
<div id="content" class="login">
<div id="left">
<script>
      var targetOrigin = "<?php echo $website['address']; ?>";

      function updateParent(action, key, value) {
        var obj = { action: action };

        if (key) obj[key] = value;

        parent.postMessage(JSON.stringify(obj), targetOrigin);
        return false;
      }

      function checkDefaultValue(input, isPass) {
        if (input.value == input.title)
          input.value = "";

        if (isPass)
          input.type = "password";
      }
    </script>
  </head>
  <body>
    <div id="embedded-login">
<?php
    //Si presionan el boton Enviar, ejecutamos el Script
    if(isset($_POST['Enviar']))
        {
            //Validacion por parte del servidor
            if($_POST['mail']!='' && valid_email($_POST['mail'])==TRUE)
                {
                    //Hacemos la consulta en la base de datos
                    $query = "SELECT username, email, sha_pass_hash FROM $server_adb.account WHERE email = '".($_POST['mail'])."'";
                    $getEmail = mysql_query($query) or die(mysql_error());
                    $row = mysql_fetch_assoc($getEmail);
                    //Componemos el mensaje
                    $headers = "From: tucorreo@tudominio.com \r\n";
                    $headers .= "Reply-To: tudominio@tudominio.com \r\n";
                    $headers .= "X-Mailer: PHP/" . phpversion();
                    $subject = "Peticion de Contrasena desde TUDOMINIO.com";
                    $message = "Querido " .$row['username']. "\r\n";
                    $message .= "\r\n";
                    $message .= "La contrasena de tu cuenta es: \r\n";
                    $message .= $row['sha_pass_hash'];
                    
                    if(mail($row['email'], $subject, $message, $headers))
                        {
                        //Solo establecemos esta variable si el envio fue exitoso
                            $exito = 'La contrase&ntilde;a fue enviada a su direccion de correo electronico';
                        }
                    else
                        {
                            $error = 'El envio ha fallado, porfavor contacte al administrador sobre este problema';
                        }
                }
            else
                {
                    $error = 'Asegurese de que no ha dejado el campo vacio y que la direccion de correo electronica es una direccion de correo valida';
                }
        }
        
    if(isset($exito))
        {
            echo $exito;
        }
    else
        {
            echo $error = '
			<h2>Recover Pass</h2>
			<h3>Asegurese de que no ha dejado el campo vacio y que la direccion de correo electronica es una direccion de correo valida</h3>';
//Solo mostramos el formulario si tenemos un mensaje de error
    ?>
    <form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <table width="300" border="1" cellspacing="0" cellpadding="0">
    <tr><br />
      <td width="80">Email:</td>
      <td width="194"><input name="mail" class=" input border-5 glow-shadow-2" type="text" id="mail" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" size="32" /></td>
    </tr>
    <tr>
      <td><input style="" name="Enviar" type="submit" id="Enviar" value="Enviar" /></td>
    </tr>
  </table>
</form>
<?php } ?>
</div>
</div>
<div id="right">
<h2><?php echo $Log['Log16']; ?></h2>
<h3><?php echo $Log['Log17']; ?></h3>
<a class="ui-button button1 " href="account_man.php" >
<span>
<span><?php echo $Log['Log18']; ?></span>
</span>
</a>
</div>
<span class="clear"><!-- --></span>
<script type="text/javascript">
$(function() {
$('#accountName').focus();
});
</script>
<?php include("../../functions/footer_man.php"); ?>
</body>
</html>
