<?php
if (!isset($_SESSION['username'])) {
    ?>
    <div class="user-plate">
        <a href="?login" class="card-character plate-logged-out" onclick="return Login.open()">
            <span class="card-portrait"></span>
            <span class="wow-login-key"></span>
            <span class="login-msg"><?php echo $uplate['login']; ?></span>
        </a>
    </div>
    <?php
} else {
    $side = rand(1, 2);
    switch ($side) {
        case 1:
            $side = "alliance";
            break;
        case 2:
            $side = "horde";
            break;
    }

    if (isset($_GET['cc'])) {
        $character_id = intval($_GET['cc']);
        $realm_id = intval($_GET['r']);

        $realm = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.realmlist WHERE id = '" . $realm_id . "'"));
        $realm_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE realmid = '" . $realm_id . "'"));

        $server_cdb = $realm_extra['char_db'];

        $select = mysql_fetch_assoc(mysql_query("SELECT guid,race,gender FROM $server_cdb.characters WHERE guid = '" . $character_id . "' AND account = '" . $account_information['id'] . "'"));

        if ($select) {
            $avatar = $select['race'] . "-" . $select['gender'] . ".jpg";
            $update = mysql_query("UPDATE users SET `avatar` = '" . $avatar . "', `character` ='" . $character_id . "', `char_realm` = '" . $realm_extra['id'] . "' WHERE id = '" . $account_extra['id'] . "'");
            echo '<meta http-equiv="refresh" content="0;url='.$website['root'].'"/>';
        } else {
            echo '<meta http-equiv="refresh" content="0;url='.$website['root'].'"/>';
        }
    }

    $login_query = mysql_query("SELECT * FROM $server_adb.account WHERE username = '" . mysql_real_escape_string($_SESSION["username"]) . "'");
    $login2 = mysql_fetch_assoc($login_query);

    $uI = mysql_query("SELECT * FROM $server_db.users WHERE id = '" . $login2['id'] . "'");
    @$userInfo = mysql_fetch_assoc($uI);

    $numchars = 0;

    if ($account_extra['character'] != 0) {
        $realm_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE realmid = '" . $account_extra['char_realm'] . "'"));
        $realm = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_adb.realmlist WHERE id = '" . $realm_extra['realmid'] . "'"));

        $server_cdb = $realm_extra['char_db'];
        $server_wdb = $realm_extra['world_db'];

        $query001 = mysql_query("SELECT * FROM $server_cdb.characters WHERE account = '" . $account_information['id'] . "' AND guid = '" . $account_extra['character'] . "'");
        if (mysql_num_rows($query001) > 0) {
            $actualchar = mysql_fetch_assoc($query001);
            $numchars++;
        } else {
            mysql_query("UPDATE $server_db.users SET `character` = 0 WHERE id = $account_extra[id]") or die(mysql_error("Cannot remove character from web db"));
            header("Location : ".$website['root']."");
        }
    } else {

        $get_realms = mysql_query("SELECT * FROM $server_adb.realmlist ORDER BY `id` DESC");
        if ($get_realms) {
            while ($realm = mysql_fetch_array($get_realms)) {
                $realm_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE realmid = '" . $realm['id'] . "'"));

                $server_cdb = $realm_extra['char_db'];
                $server_wdb = $realm_extra['world_db'];

                $check_chars = mysql_query("SELECT * FROM $server_cdb.characters WHERE account = '" . $account_information['id'] . "' ORDER BY `guid` DESC");
                if ($check_chars) {

                    //Re-Check
                    $account_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM $server_db.users WHERE id = '" . $account_information['id'] . "'"));

                    if ($account_extra['character'] == 0) {
                        $actualchar = mysql_fetch_assoc($check_chars);
                        $avatar = $actualchar['race'] . "-" . $actualchar['gender'] . ".jpg";

                        @$set_character = mysql_query("UPDATE users SET `avatar` = '" . $avatar . "', `character` = '" . $actualchar['id'] . "', `char_realm` = '" . $realm_extra['id'] . "' WHERE id = '" . $account_extra['id'] . "'");
                    }
                }
                $numchars = $numchars + mysql_num_rows($check_chars);
            }
        }
    }

    if ($numchars != 0) {

        switch ($actualchar["race"]) {
            case 2:
            case 5:
            case 6:
            case 8:
            case 9:
            case 10: $side = "horde";
                break;
            default: $side = "alliance";
        }

        function racetxt($race) {
            switch ($race) {
                case 1: return "Human";
                    break;
                case 2: return "Orc";
                    break;
                case 3: return "Dwarf";
                    break;
                case 4: return "Night Elf";
                    break;
                case 5: return "Undead";
                    break;
                case 6: return "Tauren";
                    break;
                case 7: return "Gnome";
                    break;
                case 8: return "Troll";
                    break;
                case 9: return "Goblin";
                    break;
                case 10: return "Blood Elf";
                    break;
                case 11: return "Draenei";
                    break;
                case 22: return "Worgen";
                    break;
            }
        }

        function classtxt($class) {
            switch ($class) {
                case 1: return "Warrior";
                    break;
                case 2: return "Paladin";
                    break;
                case 3: return "Hunter";
                    break;
                case 4: return "Rogue";
                    break;
                case 5: return "Priest";
                    break;
                case 6: return "Death Knight";
                    break;
                case 7: return "Shaman";
                    break;
                case 8: return "Mage";
                    break;
                case 9: return "Warlock";
                    break;
                case 10: return "Druid";
                    break;
            }
        }
        ?>
        <div class="user-plate">
            <a id="user-plate" class="card-character plate-<?php echo $side; ?> ajax-update" rel="np" href="#"> <!--http://eu.battle.net/static-render/eu/twisting-nether/68/83271236-avatar.jpg?alt=/wow/static/images/2d/avatar/6-0.jpg-->
                <span class="card-portrait" style="background-image:url(<?php echo $website['root']; ?>wow/static/images/2d/avatar/<?php echo $actualchar["race"] . "-" . $actualchar["gender"]; ?>.jpg)"></span>
            </a>
            <div class="meta-wrapper meta-<?php echo $side; ?> ajax-update">
                <div class="meta">
                    <div class="player-name"><?php echo $account_extra['firstName'] . ' ' . $account_extra['lastName']; ?></div>
                    <div class="character">
                        <a class="character-name context-link " rel="np" href="#" data-tooltip="Change character" data-tooltip-options="{&quot;location&quot;: &quot;topCenter&quot;}">
                            <?php echo $actualchar["name"]; ?>
                            <span class="arrow"></span>
                        </a>
                        <div class="guild">
                            <a class="guild-name" href="#">
                                <?php echo $realm['name'] ?>
                            </a>
                        </div>
                        <div id="context-1" class="ui-context character-select">
                            <div class="context">
                                <a href="javascript:;" class="close" onclick="return CharSelect.close(this);"></a>
                                <div class="context-user">
                                    <strong><?php echo $actualchar["name"]; ?></strong>
                                    <br />
                                    <span class="realm
									<?php
                                                $get_realms = mysql_query("SELECT * FROM $server_adb.realmlist ORDER BY `id` DESC");
                                                if ($get_realms) {
                                                    while ($realm = mysql_fetch_array($get_realms)) {
                                                $realm_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE realmid = '" . $realm['id'] . "'"));
                                                $server_cdb = $realm_extra['char_db'];
                                                $check_chars = mysql_query("SELECT * FROM $server_cdb.characters WHERE account = '" . $account_information['id'] . "' ORDER BY `guid` DESC");
                                                $current_realm = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE id = '" . $account_extra['char_realm'] . "'"));
                                                if ($check_chars) {
                                                    while ($char = mysql_fetch_array($check_chars)) {
                                                $host = $realm['address'];
                                                $world_port = $realm['port'];
                                                $world = @fsockopen($host, $world_port, $err, $errstr, 2);
                                                if (!$world)
                                                echo ' down';
                                                    }
                                                echo '">' . $realm['name'] . '</span>';
                                            }
                                        }
                                    }
                                ?>
                                </div>
                                <div class="context-links">
                                    <a href="<?php echo $website['root']; ?>advanced?name=<?php echo $actualchar["name"]; ?>" title="<?php echo $uplate['profile']; ?>" rel="np" class="icon-profile link-first">
                                        <?php echo $uplate['profile']; ?>
                                    </a>
                                    <a href="#" title="<?php echo $uplate['post']; ?>" rel="np" class="icon-posts">
                                    </a>
                                    <a href="#" title="<?php echo $uplate['auction']; ?>" rel="np" class="icon-auctions">
                                    </a>
                                    <a href="#" title="<?php echo $uplate['events']; ?>" rel="np" class="icon-events link-last">
                                    </a>
                                </div>
                            </div>
                            <div class="character-list">
                                <div class="primary chars-pane">
                                    <div class="char-wrapper">
                                        <?php
                                        $get_realms = mysql_query("SELECT * FROM $server_adb.realmlist ORDER BY `id` DESC");
                                        if ($get_realms) {
                                            while ($realm = mysql_fetch_array($get_realms)) {
                                                $realm_extra = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE realmid = '" . $realm['id'] . "'"));

                                                $server_cdb = $realm_extra['char_db'];
                                                $check_chars = mysql_query("SELECT * FROM $server_cdb.characters WHERE account = '" . $account_information['id'] . "' ORDER BY `guid` DESC");

                                                $current_realm = mysql_fetch_assoc(mysql_query("SELECT * FROM realms WHERE id = '" . $account_extra['char_realm'] . "'"));

                                                if ($check_chars) {
                                                    while ($char = mysql_fetch_array($check_chars)) {

                                                        echo '
                                    <a href="?cc=' . $char['guid'] . '&r=' . $realm['id'] . '" class="char ';
                                                        if ($char['guid'] == $actualchar['guid'] && $realm['id'] == $current_realm['realmid'])
                                                            echo 'pinned';
                                                        echo '" rel="np">
                                        <span class="pin"></span>
                                        <span class="name">' . $char["name"] . '</span>
                                        <span class="class color-c' . $char["class"] . '">' . $char["level"] . ' ' . racetxt($char['race']) . ' ' . classtxt($char['class']) . '</span>
                                        <span class="realm';

                                                        $host = $realm['address'];
                                                        $world_port = $realm['port'];
                                                        $world = @fsockopen($host, $world_port, $err, $errstr, 2);

                                                        if (!$world)
                                                            echo ' down';

                                                        echo '">' . $realm['name'] . '</span>
                                    </a>
                                    ';
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                    <a href="javascript:;" class="manage-chars" onclick="CharSelect.swipe('in', this); return false;">
                                        <span class="plus"></span>
                                        <?php echo $uplate['manage']; ?><br />
                                        <span><?php echo $uplate['customize']; ?></span>
                                    </a>
                                </div>
                                <!--
                                <div class="secondary chars-pane" style="display: none">
                                <div class="char-wrapper scrollbar-wrapper" id="scroll" style="overflow: hidden;">
                                <div class="scrollbar">
                                <div class="track"><div class="thumb"></div></div>
                                </div>
                                <div class="viewport">
                                <div class="overview">
                                <a href="/wow/en/character/twisting-nether/Ricu/" class="wow-class-6 pinned" rel="np" data-tooltip="Tauren Death Knight (<?php echo $realm['name'] ?>)">
                                <span class="icon-frame frame-14 ">
                                <img src="/wow/static/local-common/images/wow/race/6-0.jpg" alt="" width="14" height="14" />
                                <span class="frame"></span>
                                </span>
                                <span class="icon-frame frame-14 ">
                                <img src="/wow/static/local-common/images/wow/class/6.jpg" alt="" width="14" height="14" />
                                <span class="frame"></span>
                                </span>
                                90 Ricu
                                </a>
                                <div class="no-results hide">No characters were found</div>
                                </div>
                                </div>
                                </div>
                                <div class="filter">
                                <input type="input" class="input character-filter" value="Filter…" alt="Filter…" /><br />
                                <a href="javascript:;" onclick="CharSelect.swipe('out', this); return false;">Return to characters</a>
                                </div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            //<![CDATA[
            $(document).ready(function() {
                Tooltip.bind('#header .user-meta .character-name', {location: 'topCenter'});
            });
            //]]>
        </script>
        <?php
    }else {
        echo'<div class="user-plate">
			<div class="card-character plate-default no-wow">
			</div>
			<div class="meta-wrapper meta-no-wow ajax-update">
			<div class="meta">
			<div class="player-name">' . $userInfo['firstName'] . '</div>
			' . $uplate['nochars'] . '
			</div>
			</div>
			</div>';
    }
}
mysql_select_db($server_db, $connection_setup) or die(mysql_error());
?>
