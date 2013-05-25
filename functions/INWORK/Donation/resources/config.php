<?php
//CONFIG FILE
//YOU MUST EDIT THIS

define($serveraddress,"localhost"); // Host of your WEB SITE'S MySQL server, NOT ascent's.
define($serveruser,"root"); // User to above server.
define($serverpass,"ascent"); // Password for above user.
define($server_db,"donation"); // Database holding information for AAPDRDSS.
define($donatadmin,"ascent"); // The password you will use to gain access to the Donations ACP.

define(RECEIVER_EMAIL,"YOURPAYPALEMAIL"); // This is the paypal account payments will be sent to.
define(FORM_LOCATION,"http://www.yoursite.com/ADS/postback.php"); // The FULL path to postback.php, INCLUDING http://!!!
define(CURRENCY_CODE,"USD"); // PayPal currency code, i.e. USD or EUR.
define(CURRENCYSYMBOL,"$"); // Symbol to represent currency, i.e. $ or €.
define(PAYPAL_ADDRESS,"www.paypal.com"); // Leave this alone unless you wish to use the paypal sandbox.

define(MAIL_SUBJECT,"Thanks!"); // The subject of the mail sent.
define(MAIL_BODY,"Thank you for supporting our server! Here is a reward for your donation!"); // The body of the mail sent.

?>