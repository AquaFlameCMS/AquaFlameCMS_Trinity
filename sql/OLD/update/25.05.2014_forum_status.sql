ALTER TABLE `forum_forums` 
ADD COLUMN `status` VARCHAR(255) CHARSET utf8 COLLATE utf8_general_ci NOT NULL AFTER `categ`,
CHANGE `name` `name` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
CHANGE `image` `image` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL ,
CHANGE `description` `description` TEXT(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
UPDATE `forum_forums` SET `status`='[Limited]' WHERE `id`='1';
UPDATE `forum_forums` SET `status`='[Read-Only]' WHERE `id`='2';
UPDATE `forum_forums` SET `status`='[Limited]' WHERE `id`='3';
UPDATE `forum_forums` SET `status`='[Read-Only]' WHERE `id`='4';
