<?php

/* ERROR REPORTING */
error_reporting(E_ALL);
ini_set('display_errors', 1);  

  include('../configs.php');
  $idImage = intval($_GET["id"]);

  mysql_select_db($server_db);
  $data = mysql_fetch_assoc(mysql_query("SELECT * FROM media WHERE id = '".$idImage."'"));
  $author = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id = '".$data['author']."'"));
  echo '
  <div class="meta-data">
    <dl class="meta-details">
      <dt>Title:</dt>
      <dd>'.$data['title'].'</dd>
      <dt class="dt-separator">Date: </dt>
      <dd>'.date('d-m-Y', strtotime($data['date'])).'</dd>
      <dt class="dt-separator">Author:</dt>
      <dd>'.$author['firstName'].'</dd>
    </dl>
    <dl class="meta-details">
      <dt class="dt-downloads">
        '.$data['description'].'
      </dt>
      <dt class="dt-downloads">
        <a class="format" href="'.$data['link'].'" onclick="window.open(this.href);return false;">
          Download the fullsize Image
        </a>
      </dt>
    </dl>
    <span class="clear"><!-- --></span>
  </div>';
    
?>