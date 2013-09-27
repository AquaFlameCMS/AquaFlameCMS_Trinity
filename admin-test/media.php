<?php
include("../configs.php");
mysql_select_db($server_adb);
$check_query = mysql_query("SELECT gmlevel from account inner join account_access on account.id = account_access.id where username = '" . strtoupper($_SESSION['username']) . "'") or die(mysql_error());
$login = mysql_fetch_assoc($check_query);
if ($login['gmlevel'] < 3) {
    die('
<meta http-equiv="refresh" content="0;url=wrong.php"/>
        ');
}


if (isset($_GET['sort']) == 'type') {    //Order by...
    $order = ' type ASC, ';
} elseif (isset($_GET['sort']) == 'title') {
    $order = ' title ASC, ';
} elseif (isset($_GET['sort']) == 'author') {
    $order = ' author ASC, ';
} else {
    $order = '';
}
//MEDIA TYPES VIEW **** Types: 0-video, 1-screen,2-wall,3-art,4-comic,5-download
if (isset($_GET['type']) == '') {
    $type = "";
} else {
    $type = "AND type='";
    $type .= $_GET['type'];
    $type .= "'";
}

mysql_select_db($server_db) or die(mysql_error());
$sql = mysql_query("SELECT * FROM media WHERE visible = '0' ".$type."");
$sql2 = mysql_query("SELECT * FROM media WHERE visible = '1' ".$type."");

//PAGINATION BEGIN
$size = 10;
$num_r = mysql_num_rows($sql);
$num_p = ceil($num_r / $size);
//Look for the number page, if not then first
if (!isset($_GET['page']) || empty($_GET['page']) || $_GET['page'] < 1) {   //More control for 'go to' textbox
    $page = 1;
} elseif ($_GET['page'] > $num_p) { //If overflow the show last page
    $page = $num_p;
} else {
    $page = $_GET['page'];
}
$start = ($page - 1) * $size;  //the first result to show
//PAGINATION END
$sql_string = "SELECT * FROM media WHERE visible = '0' " .$type. " ORDER BY " . $order . " date DESC LIMIT $start,$size";
$sql_string2 = "SELECT * FROM media WHERE visible = '1' " .$type. " ORDER BY " . $order . " date DESC LIMIT $start,$size";
$sql_query = mysql_query($sql_string); //add limit for pagination work
$sql_query2 = mysql_query($sql_string2);
?>
<?php   $login_query = mysql_query("SELECT * FROM $server_adb.account WHERE username = '" . mysql_real_escape_string($_SESSION["username"]) . "'");
      $login2 = mysql_fetch_assoc($login_query);
      $joindate = date("d.m.Y ", strToTime($login2['joindate']));
  
      $uI = mysql_query("SELECT avatar FROM $server_db.users WHERE id = '" . $login2['id'] . "'");
      $userInfo = mysql_fetch_assoc($uI);
  ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Flame.NET - Media</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1"/>
  <link rel="shortcut icon" href="img/favicon.png">
  <!---CSS Files-->
  <link rel="stylesheet" href="css/core.css">
  <link rel="stylesheet" href="css/ui.css">
  <link rel="stylesheet" href="css/style.css">
  <!---jQuery Files-->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/inputs.js"></script>
  <script src="js/minicolors.js"></script>
  <script src="js/cleditor.js"></script>
  <script src="js/functions.js"></script>
  <script type="text/javascript">
    function changeType(num) 
    {
      objVid = document.getElementById('videoLnk');
      objImg = document.getElementById('uploadImg');
      objFieldVid = document.getElementById('fieldVideo');
      objFieldImg = document.getElementById('fieldUpload');
      if (num == '0') 
      {
        objVid.style.display = '';
        objFieldVid.style.display = '';
        objFieldVid.required = 'required';
        objImg.style.display = 'none';
        objFieldImg.required = '';
      } 
      else 
      {
        objVid.style.display = 'none';
        objFieldVid.style.display  = 'none';
        objFieldVid.required = '';
        objImg.style.display = '';
        objFieldImg.required = 'required';
      }
    }
               
  </script>
</head>
<body>
  <div id="wrapper">
    <div id="usr-panel">
      <div class="av-overlay"></div>
      <img src="<?php echo $website['root']; ?>images/avatars/2d/<?php echo $account_extra['avatar']; ?>" id="usr-av">
      <div id="usr-info">
        <span id="usr-name"><?php echo $account_extra['firstName']; ?></span><span id="usr-role">Administrator</span>
        <button id="usr-btn" class="orange" data-modal="#usr-mod #mod-home">User CP</button>
      </div>
    </div>
    <div id="nav">
      <ul>
        <li><a href="dashboard.php"></a><span class="icon">H</span>Dashboard</li>
        <li><a href="news.php"></a><span class="icon">&lt;</span>News</li>
        <li><a href="forum.php"></a><span class="icon">P</span>Forum</li>
        <li class="active"><span class="icon">F</span>Media</li>
        <li><a href="users.php"></a><span class="icon">G</span>Users</li>
        <li data-modal="#usr-mod #mod-set" id="set-btn"><span class="icon">)</span>Settings</li>
        <li id="logout"><a href="logout.php"></a><span class="icon icon-grad">B</span>Log Out</li>
      </ul>
      <br class="clear">
    </div>
    <div id="content" class="inputs-page">
<div class="box g16">
        <h2 class="box-ttl">UNAPPROVED MEDIA</h2>                   
        <div class="box-body no-pad datatable-cont">
          <div id="example_wrapper" class="dataTables_wrapper" role="grid"><div id="example_length" class="dataTables_length">Show <div class="drop select"><select size="1" name="example_length" aria-controls="example" class="transformed" style="display: none;"><option value="5" selected="selected">5</option><option value="10">10</option><option value="25">25</option></select><ul><li class="sel">5</li><a href="?type=0" style="color: #999999;"><li class="">10</li></a><li>25</li></ul><span class="opt-sel" data-default-val="5">5</span><span class="arrow">&amp;</span></div> entries</div>
          <div style="width: 25px;"></div>
          <div id="example_length" class="dataTables_length">
            Select 
            <div class="drop select" style="width: 90px;">
              <ul>
                <a href="media.php" style="color: #999999;"><li class="sel">All</li></a>
                <a href="?type=0" style="color: #999999;"><li class="">Videos</li></a>
                <a href="?type=2" style="color: #999999;"><li class="">Screenshots</li></a>
                <a href="?type=1" style="color: #999999;"><li class="">Wallpaper</li></a>
                <a href="?type=3" style="color: #999999;"><li class="">Artwork</li></a>
                <a href="?type=4" style="color: #999999;"><li class="">Comics</li></a>
                <a href="?type=5" style="color: #999999;"><li class="">Downloads</li></a>
              </ul>
              <span class="opt-sel" data-default-val="All&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">All&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
              <span class="arrow">&amp;</span>
            </div>
          </div>
          <div class="dataTables_filter" id="example_filter"><label>Search: <input type="text" aria-controls="example"></label></div><table class="display table dataTable" id="example" aria-describedby="example_info">
            <thead>
              <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 0px;">TITLE</th><th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 0px;">AUTHOR</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 0px;">DESCRIPTION</th><th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 0px;">DATE</th><th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 0px;">TYPE</th><th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 170px;">APPROVE</th><th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 140px;">DELETE</th></tr>
            </thead>
            
          <tbody role="alert" aria-live="polite" aria-relevant="all">
          <?php
          
                                    while ($row = mysql_fetch_assoc($sql_query)) {
                                    $author = mysql_fetch_assoc(mysql_query("SELECT username FROM $server_adb.account WHERE id = '" . $row['author'] . "'"));
                                    echo'
                                <tr class="gradeX odd">
                                <td class=" sorting_1">' . $row['title'] . '...</td>
                                <td class="center">' . $author['username'] . '</td>
                                <td>' . strip_tags(substr($row['description'], 0, 60)) . '...</td>                      
                                <td class="center ">' . date('d-m-Y', strtotime($row['date'])) . '</td>
                                <td class="center ">';
                                    if ($row['type'] == '0') {
                                        echo 'Video';
                                    } elseif ($row['type'] == '1') {
                                        echo 'Wallpaper';
                                    } elseif ($row['type'] == '2') {
                                        echo 'Screenshot';
                                    } elseif ($row['type'] == '3') {
                                        echo 'ArtWork';
                                    } elseif ($row['type'] == '4') {
                                        echo 'Comic';
                                    } elseif ($row['type'] == '5') {
                                        echo 'Download';
                                    }
                                    echo'</td>
                                <td class="center "><form method="post"><input type="hidden" name="actionid" value="'. $row['id'] .'"><a href="">
                                <button class="btn-m green has-icon-r" name="approve">                         
                                <span class="icon">&lt;</span>APPROVE</button></a>
								<td class="center "><a href="">
                                <button class="btn-m red has-icon" name="delete">
                                <span class="icon2">X</span>DELETE</button></a></form></td>
                                </tr>';
                                }
                  ?>
                </tbody></table><div class="dataTables_info" id="example_info">Showing 0 to 0 of 0 entries</div><div class="dataTables_paginate paging_full_numbers" id="example_paginate"><a tabindex="0" class="first button" id="example_first">First</a><a tabindex="0" class="previous button" id="example_previous">%</a><span><a tabindex="0" class="button">1</a><a tabindex="0" class="button pressed">2</a><a tabindex="0" class="button">3</a></span><a tabindex="0" class="next button" id="example_next">(</a><a tabindex="0" class="last button" id="example_last">Last</a></div></div>
        </div></div>
      <div id="inputs" class="box g6">
        <h2 class="box-ttl"><?php echo $Media['SendMedia']; ?></h2>
        <p>&nbsp;</p>
        <div id="page-content">
          <div class="filter" style="padding-left: 10px;">
            <label for="filter-status"><?php echo $Media['ChooseMediaSend']; ?></label>
          </div>
          <div class="box-body form" id="inputs">
            <form action="" enctype="multipart/form-data" method="post">
              <select name="type" id="type" class="input border-5 glow-shadow-2 form-disabled" style="width:150px" data-filter="column" data-column="0" onchange="changeType(this.selectedIndex)">
                <option value="0" selected="selected"><?php echo $Media['Videos']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                <option value="1"><?php echo $Media['Wallpapers']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                <option value="2"><?php echo $Media['Screenshots']; ?>&nbsp;&nbsp;&nbsp;&nbsp;</option>
                <option value="3">Artwork&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                <option value="4"><?php echo $Media['Comics']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                <option value="5">Download&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
              </select>
              <br>
              <br>
              <br>
              <br>
              <p>&nbsp;</p>
              <span class="label input g4">Title</span>
              <input type="text" maxlength="40" name="title_form"  type="url" class="g12" placeholder="Enter the Title here..." required="required" >
              <div id="videoLnk">
                <span id="videoLnk" class="label input g4">Youtube Link</span>
                <input id="fieldVideo" name="url_form" type="url" class="g12" placeholder="Enter the Youtube Video URL..." required="required" />
              </div>
              <div id="uploadImg" style="display: none;">
                <span class="label input g4">File Select</span>
                <div class="file-sel g12">
                  <input type="hidden" name="MAX_SIZE" value="20000000" />
                  <input type="file" class="file full" id="fieldUpload" name="file">
                  <span class="icon">,</span>
                </div>
              </div>
              <span class="label input g4">Description</span>
              <textarea type="text" name="description_form" class="g12" required="required" >You can put anything in me!</textarea>
              <div style="float: right; padding-right: 10px;">
              <button type="submit" class="btn-m green" name="send">Submit Media</button>
              <button align="right" type="reset" class="btn-m" class="ui-cancel ">Cancel</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <div class="box g10">
        <h2 class="box-ttl">APPROVED MEDIA</h2>
            <div class="box-body no-pad datatable-cont">
          <div id="example_wrapper" class="dataTables_wrapper" role="grid"><div id="example_length" class="dataTables_length">Show <div class="drop select"><select size="1" name="example_length" aria-controls="example" class="transformed" style="display: none;"><option value="5" selected="selected">5</option><option value="10">10</option><option value="25">25</option></select><ul><li class="sel">5</li><a href="?type=0" style="color: #999999;"><li class="">10</li></a><li>25</li></ul><span class="opt-sel" data-default-val="5">5</span><span class="arrow">&amp;</span></div> entries</div>
          <div style="width: 25px;"></div>
          <div id="example_length" class="dataTables_length">
            Select 
            <div class="drop select" style="width: 90px;">
              <ul>
                <a href="media.php" style="color: #999999;"><li class="sel">All</li></a>
                <a href="?type=0" style="color: #999999;"><li class="">Videos</li></a>
                <a href="?type=2" style="color: #999999;"><li class="">Screenshots</li></a>
                <a href="?type=1" style="color: #999999;"><li class="">Wallpaper</li></a>
                <a href="?type=3" style="color: #999999;"><li class="">Artwork</li></a>
                <a href="?type=4" style="color: #999999;"><li class="">Comics</li></a>
                <a href="?type=5" style="color: #999999;"><li class="">Downloads</li></a>
              </ul>
              <span class="opt-sel" data-default-val="All&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;">All&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
              <span class="arrow">&amp;</span>
            </div>
          </div>
          <div class="dataTables_filter" id="example_filter"><label>Search: <input type="text" aria-controls="example"></label></div><table class="display table dataTable" id="example" aria-describedby="example_info">
            <thead>
              <tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 0px;">TITLE</th><th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 0px;">AUTHOR</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 0px;">DESCRIPTION</th><th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 0px;">DATE</th><th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 0px;">TYPE</th><th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 170px;">UNAPPROVE</th><th class="center sorting" role="columnheader" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 140px;">DELETE</th></tr>
            </thead>
            
          <tbody role="alert" aria-live="polite" aria-relevant="all">
      <?php
      
                  while ($row2 = mysql_fetch_assoc($sql_query2)) {
                                    $author2 = mysql_fetch_assoc(mysql_query("SELECT username FROM $server_adb.account WHERE id = '" . $row2['author'] . "'"));
                                    echo'
                <tr class="gradeX odd">
                <td class=" sorting_1">' . $row2['title'] . '...</td>
                <td class="center">' . $author2['username'] . '</td>
                <td>' . strip_tags(substr($row2['description'], 0, 40)) . '...</td>            
                <td class="center ">' . date('d-m-Y', strtotime($row2['date'])) . '</td>
                <td class="center ">';
                                    if ($row2['type'] == '0') {
                                        echo 'Video';
                                    } elseif ($row2['type'] == '1') {
                                        echo 'Wallpaper';
                                    } elseif ($row2['type'] == '2') {
                                        echo 'Screenshot';
                                    } elseif ($row2['type'] == '3') {
                                        echo 'ArtWork';
                                    } elseif ($row2['type'] == '4') {
                                        echo 'Comic';
                                    } elseif ($row2['type'] == '5') {
                                        echo 'Download';
                                    }
                                    echo'</td>
                                <td class="center "><form method="post"><input type="hidden" name="actionid" value="'. $row2['id'] .'">
								<a href="">
                                <button class="btn-m orange has-icon-r" name="unapprove">
								<span class="icon">&lt;</span>UNAPPROVE</button>
								</a>
                                </td>
								<td class="center ">
								<a href="">
								<button class="btn-m red has-icon" name="delete">
								<span class="icon">X</span>DELETE</button>
								</a></form></td>
                </tr>';
                }
                  ?>
        </tbody></table><div class="dataTables_info" id="example_info">Showing 0 to 0 of 0 entries</div><div class="dataTables_paginate paging_full_numbers" id="example_paginate"><a tabindex="0" class="first button" id="example_first">First</a><a tabindex="0" class="previous button" id="example_previous">%</a><span><a tabindex="0" class="button">1</a><a tabindex="0" class="button pressed">2</a><a tabindex="0" class="button">3</a></span><a tabindex="0" class="next button" id="example_next">(</a><a tabindex="0" class="last button" id="example_last">Last</a></div></div>
        </div>
      </div>
<div id="grid-cont" class="full">
        <div class="box g16"><span><center>All rights reserved. | Powered by: <a style="color: #CE9109;" href="http://aquaflame.org">AquaFlame CMS</a></center></span></div>
      </div>
                                    
    </div><!--END MAIN CONTENT-->

    <!--MODAL WINDOWS-->

     <div id="modal-ov">
      <div class="modal" id="usr-mod">
        <div class="mod-ttl"><h2>USER CONTROL PANEL</h2></div>
        <div class="mod-body">
          <div id="mod-home" class="nav-item show">
            <div class="av-overlay"></div>
            <img src="<?php echo $website['root']; ?>images/avatars/2d/<?php echo $account_extra['avatar']; ?>">
            <ul id="usr-det">
              <li><p><span>Name: </span><?php echo $account_extra['firstName'] . ' ' . $account_extra['lastName']; ?></p></li>
              <li><p><span>Role: </span>System Administrator</p></li>
              <li><p><span>Contact: </span><?php echo $login2['email']; ?></p></li>
              <li><p><span>Member since: </span><?php echo $joindate; ?></p></li>
              <li><p><span>Last IP: </span><?php echo $login2['last_ip']; ?></p></li>
            </ul>
          </div>
          <div id="mod-msg" class="mod-conv nav-item">
            <div class="scroll">
              <ul class="conv no-av scroll-cont">
                <span class="conv-info">Conversation with Mike - 9.20 AM</span>
                <li class="msg received">
                  <div class="message"><p><span class="msg-info">Mike, 1 hour ago</span>
                  Hey, can I borrow 6 grand til' tomorrow? Some mobster says he's going to cut off my toes if I don't pay him back. Thanks dude!</p></div>
                </li>
                <li class="msg sent">
                  <div class="message"><p><span class="msg-info">Sent 30 minutes ago</span>
                  Of course I'll lend you some money, I'm sure you'll pay me back. ;)</p></div>
                </li>
                <li class="msg received">
                  <div class="message"><p><span class="msg-info">Mobsters, 15 minutes ago</span>
                  We got your boy. If you want him to mooch off you ever again, bring $50,000
                  cash to the warehouse on 3rd and Lincoln. No cops.</p></div>
                </li>
              </ul>
              <form class="conv-text">
                <input type="text" class="conv-input" placeholder="Type in your message...">
                <button class="conv-btn">Send</button>
              </form>
            </div>
          </div>
          <div id="mod-notif" class="nav-item">
            <div class="notif green no-coll expanded full">
              Welcome to Flame Admin!<span class="icon">=</span>
              <p class="nt-det">Feel free to look around, there is much to see.</p>
            </div>
            <div class="notif red full">
              If a paperclip offers to help, please alert the authorities.
              <span class="icon">X</span>
            </div>
          </div>
          <div id="mod-set" class="nav-item">
            <input type="text" class="g4" placeholder="First name" value="<?php echo $account_extra['firstName']; ?>">
            <input type="text" class="g4" placeholder="Last name" value="<?php echo $account_extra['lastName']; ?>">
            <input type="text" class="g8 last" placeholder="E-mail" value="<?php echo $login2['email']; ?>">
            <button class="g8">Change Password</button>
            <button class="g8 last">Change Email</button>
            <div class="g8 cont">
              <input type="checkbox" class="chbox g4" checked>
              <div class="label g12 last"><span>Remember login details</span></div>
            </div>
            <div class="g8 cont last">
              <input type="checkbox" class="chbox g4" checked>
              <div class="label g12 last"><span>Toggle this checkbox</span></div>
            </div>
            <div class="g8 cont">
              <input type="checkbox" class="chbox tgcls g4" data-tgcls="#wrapper hz-nav">
              <div class="label g12 last"><span>Horizontal navigation</span></div>
            </div>
            <div class="g8 cont last">
              <input type="checkbox" class="chbox g4">
              <div class="label g12 last"><span>God Mode</span></div>
            </div>
          </div>
        </div>
        <div class="mod-act">
          <ul class="mod-nav">
            <li class="sel" data-nav="#mod-home"><span class="icon">H</span></li>
            <li data-nav="#mod-msg"><span class="icon">2</span></li>
            <li data-nav="#mod-notif">
              <span class="icon">A</span><div class="unread-ind">2</div>
            </li>
            <li data-nav="#mod-set"><span class="icon">U</span></li>
          </ul>
          <button class="orange close">Close</button>
        </div>
      </div>
    </div>

  </div><!--END WRAPPER-->

  <span id="load">
    <img src="img/load.png"><img src="img/spinner.png" id="spinner">
  </span>

  <!---jQuery Code-->
  <script type='text/javascript'>

    // LOAD FUNCTIONS

    $.fn.loadfns( function() {
      $.fn.inputgrp();
      $('#wysiwyg').cleditor({ height: 326 });
      $('#eula').nanoScroller();

      if ($('#ads').width() < 800) $('#ads').nanoScroller();
    });
    $.fn.inputs();
    $('#sample-form').validate();
    $('.datepicker').glDatePicker({ showAlways: false });
    $('.nav-hz').scrollspy();
    $('#age-inp').spinner({ min: 16, max: 99 });
    $('#decimal').spinner({ step: 0.1101001101010011, numberFormat: "n" });
    $('#card-num').mask('9999-9999-9999-9999');
    $('#exp-inp').mask('99/99', {placeholder:'.'});
  </script>
  <?php 
if (isset($_POST['approve'])) 
        {
            $check_media = mysql_query("SELECT * FROM media WHERE id = '".$_POST['actionid']."'");
            $num_media = mysql_num_rows($check_media);
            if($num_media >= 1)
            {
            $mysql_media = mysql_query("UPDATE media SET visible = 1 WHERE id = '".$_POST['actionid']."'");
            echo' <div id="toast-container" class="toast-top-full"><div class="toast toast-success" style="display: block;">
                  <div class="toast-title">Great !</div>
                  <div class="toast-message">The Media were approved successfully.</div>
                  </div></div>';
            echo '<meta http-equiv="refresh" content="1;url=media.php"/>';
            }
            else
            {
            echo' <div id="toast-container" class="toast-top-full"><div class="toast toast-error" style="display: block;">
                  <div class="toast-title">Uh damn !</div>
                  <div class="toast-message">An error occured while approving the Media.</div>
                  </div></div>';
            echo '<meta http-equiv="refresh" content="1;url=media.php"/>';
            }
        }
        if (isset($_POST['unapprove'])) 
        {
            $check_media = mysql_query("SELECT * FROM media WHERE id = '".$_POST['actionid']."'");
            $num_media = mysql_num_rows($check_media);
            if($num_media >= 1)
            {
            $mysql_media = mysql_query("UPDATE media SET visible = 0 WHERE id = '".$_POST['actionid']."'");
            echo' <div id="toast-container" class="toast-top-full"><div class="toast toast-success" style="display: block;">
                  <div class="toast-title">Great !</div>
                  <div class="toast-message">The Media were unapproved successfully.</div>
                  </div></div>';
            echo '<meta http-equiv="refresh" content="1;url=media.php"/>';
            }
            else
            {
            echo' <div id="toast-container" class="toast-top-full"><div class="toast toast-error" style="display: block;">
                  <div class="toast-title">Uh damn !</div>
                  <div class="toast-message">An error occured while unapproving the Media.</div>
                  </div></div>';
            echo '<meta http-equiv="refresh" content="1;url=media.php"/>';
            }
        }
        if (isset($_POST['delete'])) 
        {
            $check_media = mysql_query("SELECT * FROM media WHERE id = '".$_POST['actionid']."'");
            $num_media = mysql_num_rows($check_media);
            if($num_media >= 1)
            {
            $mysql_media = mysql_query("DELETE FROM media WHERE id = '".$_POST['actionid']."'");
            $mysql_media2 = mysql_query("DELETE FROM media_comments WHERE id = '".$_POST['actionid']."'");

            $unlink_media = mysql_query("SELECT * FROM media WHERE id = '".$_POST['actionid']."'");
            $unlink = mysql_fetch_assoc($check_media);
            if($unlink['type'] != '1' || $unlink['type'] != '5')
            {
              unlink('../images/wallpapers/'.$mysql_media2['id_url']);
            }
            echo' <div id="toast-container" class="toast-top-full"><div class="toast toast-success" style="display: block;">
                  <div class="toast-title">Great !</div>
                  <div class="toast-message">The Media were deleted successfully.</div>
                  </div></div>';
            echo '<meta http-equiv="refresh" content="1;url=media.php"/>';
            }
            else
            {
            echo' <div id="toast-container" class="toast-top-full"><div class="toast toast-error" style="display: block;">
                  <div class="toast-title">Uh damn !</div>
                  <div class="toast-message">An error occured while deleting the Media.</div>
                  </div></div>';
            echo '<meta http-equiv="refresh" content="1;url=media.php"/>';
            }
        }
        if (isset($_POST['send'])) 
        {
          $title = mysql_real_escape_string($_POST['title_form']);
          $description = mysql_real_escape_string($_POST['description_form']);
          //types: 0 videos, 1 wallpapers, 2 screenshots, 3 artwork, 4 comic, 5 DOWNLOAD
          if ($_POST['type'] == '0') //Youtube video sent
          { 
            $url = $_POST['url_form'];
            $exp = "/v\/?=?([0-9A-Za-z-_]{11})/is";
            preg_match_all($exp, $url, $matches);
            $id = $matches[1][0];
          } 
          elseif($_POST['type'] == '5')
          {
            $url = $website['address'] . $website['root'] . 'files/download/';   //absolute route
            $path = '../files/download/';                                   //relative route
            if ($_FILES["file"]["error"] > 0) 
            {
              echo "Error: " . $_FILES["file"]["error"] . ". File couldn't be sent.<br />";
            } 
            elseif (!($_FILES["file"]["size"] < $_POST['MAX_SIZE'])) 
            {
              echo' <div id="toast-container" class="toast-top-full"><div class="toast toast-error" style="display: block;">
                    <div class="toast-title">Uh damn !</div>
                    <div class="toast-message">The file must be less than 2 MB.</div>
                    </div></div>';
              echo '<meta http-equiv="refresh" content="1;url=media.php"/>';
            } 
            else 
            {
              $file = pathinfo($_FILES["file"]["name"]);
              $ext = '.' . $file['extension'];
              $part = date('dmYHis', time());
              $random = rand(10, 100);
              $fileName = $_POST['type'] . $part . $random . $ext; //An unique media name for file storage
              $url = $url . $fileName;  //The absolute route for links
              $id = $fileName;       //The filename for php refers, unlink(), etc.
              if (move_uploaded_file($_FILES["file"]["tmp_name"], $path . $fileName)) 
              {
                $error = false;
              }
            }
          }
          else //Image sent and upload to host
          {  
            $url = $website['address'] . $website['root'] . 'images/wallpapers/';   //absolute route
            $path = '../images/wallpapers/';                                   //relative route
            if ((($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/bmp") || ($_FILES["file"]["type"] == "image/png")) && ($_FILES["file"]["size"] < $_POST['MAX_SIZE'])) 
            {     //allowed extensions: jpg,jpeg,bmp,png,gif
              if ($_FILES["file"]["error"] > 0) 
              {
                echo "Error: " . $_FILES["file"]["error"] . ". File couldn't be sent.<br />";
              } 
              else 
              {
                $file = pathinfo($_FILES["file"]["name"]);
                $ext = '.' . $file['extension'];
                $part = date('dmYHis', time());
                $random = rand(10, 100);
                $fileName = $_POST['type'] . $part . $random . $ext; //An unique media name for file storage
                $url = $url . $fileName;  //The absolute route for links
                $id = $fileName;       //The filename for php refers, unlink(), etc.

                if (move_uploaded_file($_FILES["file"]["tmp_name"], $path . $fileName)) 
                {
                  $error = false;
                }
              }
            } 
            elseif (!($_FILES["file"]["size"] < $_POST['MAX_SIZE'])) 
            {
              echo' <div id="toast-container" class="toast-top-full"><div class="toast toast-error" style="display: block;">
                    <div class="toast-title">Uh damn !</div>
                    <div class="toast-message">The file must be less than 2 MB.</div>
                    </div></div>';
              echo '<meta http-equiv="refresh" content="1;url=media.php"/>';
            } 
          }
          if (!$error) 
          {
            mysql_select_db($server_adb);
            $check_query = mysql_query("SELECT account.id,gmlevel from account  inner join account_access on account.id = account_access.id where username = '" . strtoupper($_SESSION['username']) . "'");
            $login = mysql_fetch_assoc($check_query);

            mysql_select_db($server_db);
            $save_media = mysql_query("INSERT INTO media (author, id_url, title, description, link, type) VALUES ('" . $login['id'] . "','" . $id . "','" . $title . "','" . $description . "','" . $url . "','" . $_POST['type'] . "');");
            mysql_close($connection_setup);

            if ($save_media == true && $check_query == true) 
            {
              echo' <div id="toast-container" class="toast-top-full"><div class="toast toast-success" style="display: block;">
                    <div class="toast-title">Great !</div>
                    <div class="toast-message">The Media were uploaded successfully.</div>
                    </div></div>';
              echo '<meta http-equiv="refresh" content="1;url=media.php"/>';
            } 
            else 
            {
              echo' <div id="toast-container" class="toast-top-full"><div class="toast toast-error" style="display: block;">
                    <div class="toast-title">Uh damn !</div>
                    <div class="toast-message">An error occured while saving the Media.</div>
                    </div></div>';
              echo '<meta http-equiv="refresh" content="1;url=media.php"/>';
            }
          }
        }
        else
        {

        }
  ?>
</body>
</html>