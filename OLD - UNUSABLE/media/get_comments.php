<?php

/* ERROR REPORTING */
error_reporting(E_ALL);
ini_set('display_errors', 1);  

  include('../configs.php');
  $idImage = intval($_GET["id"]);
  ?>
        <span id="comments"></span>
        <div id="page-comments">
          <div class="page-comment-interior" id="comments">
          <div class="comments-container">
            <script type="text/javascript">
            //<![CDATA[
              var textAreaFocused = false;
            //]]>
            </script>
       <?php
            if(isset($_SESSION['username'])){
              if($posted == 1){
              }else{
                  $user_query = mysql_query("SELECT * FROM users WHERE id = '".mysql_real_escape_string($account_information['id'])."'");
                  $user = mysql_fetch_assoc($user_query);
        ?>
            <form action="" method="post" onSubmit="return Cms.Comments.validateComment(this);" id="comment-form">
              <fieldset>
                <input type="hidden" name="videoId" value="<?php echo intval($_GET['id']); ?>">
                <input type="hidden" name="ref" value="" />
                <input type="hidden" name="xstoken" value="" />
                <input type="hidden" name="vali" value="" />
              </fieldset>
              <div class="new-post">
                <div class="comment">
                  <div class="portrait-b ajax-update">
                    <div class="avatar-interior">
                      <a href="#"><img height="64" width="64" src="../images/avatars/2d/<?php echo $user['avatar']; ?>" alt="" /></a>
                    </div>
                  </div>
                  <div class="comment-interior">
                    <div class="character-info user ajax-update">
                    <!--commentThrottle[]-->
                      <div class="user-name">
                        <a href="#" class="context-link" rel="np"><?php echo ucfirst($user['firstName']); ?></a>
                      </div>
                    </div>
                    <div class="content">
                      <div class="comment-ta">
                        <textarea id="comment-ta" cols="78" rows="3" name="detail" onFocus="textAreaFocused = true;" onBlur="textAreaFocused = false;"></textarea>
                      </div>
                      <div class="action">
                        <div class="submit">
                          <button class="ui-button button1 comment-submit" type="submit">
                          <span><span><?php echo $post['post']; ?></span></span>
                          </button>
                        </div>
                        <span class="clear"><!-- --></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          <?php
              }
            }else{
              echo'
               <table class="dynamic-center"><tr><td>
               <a class="ui-button button1 " href="?login" onclick="return Login.open(\'../loginframe.php\')"><span><span>Add a reply</span></span></a>
               </td></tr></table>';
            }
            $get_comments = mysql_query("SELECT * FROM media_comments WHERE mediaid = '".$idImage."' ORDER BY DATE DESC");
            if(mysql_num_rows($get_comments) > 0){
              while($comment = mysql_fetch_array($get_comments)){
                mysql_select_db($server_adb)or die(mysql_error());
                $accountInfo_query = mysql_query("SELECT * FROM account WHERE id = '".$comment['accountId']."'");
                $accountInfo = mysql_fetch_assoc($accountInfo_query);
                      
                mysql_select_db($server_db)or die(mysql_error());
                $userInfo_query = mysql_query("SELECT * FROM users WHERE id = '".$accountInfo['id']."'");
                $userInfo = mysql_fetch_assoc($userInfo_query);
          ?>
                      <div class="comment" id="">
                        <div class="avatar portrait-b">
                        <a href="#">
                        <img height="64" src="../images/avatars/2d/<?php echo $userInfo['avatar']; ?>" alt="" />
                        </a>
                        </div>

                        <div class="comment-interior">
                          <div class="character-info user">
                          <div class="user-name">
                            <a href="#" class="context-link" rel="np">
                            <?php echo ucfirst($user['firstName']); ?>
                            </a>
                          </div>
                          
                          <span class="time"><a href="#"><?php echo date('d-m-Y H:i:s', strtotime($comment['date'])); ?></a></span>
                          </div>
                          <div class="content"><?php echo html_entity_decode($comment['comment']); ?></div>
                          <div class="comment-actions"><a class="reply-link" href="#" onClick=""><?php echo $reply['reply']; ?></a></div>
                        </div>
                      </div>
                      <?php
                      }
                    }
              ?>
              <div class="page-nav-container">
                        <div class="page-nav-int"></div>
                      </div>
                    </div>
              </div>
            </div>

            <script type="text/javascript">
            //<![CDATA[
                var addthis_config = {
                   username: "wow"
                }
            //]]>
            </script>


  
            <span class="clear"><!-- --></span>
          </div>
        </div>
      </div>
    