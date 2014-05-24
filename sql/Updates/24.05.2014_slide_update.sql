ALTER TABLE `slideshows` 
ADD COLUMN `duration` VARCHAR(2) CHARSET utf8 COLLATE utf8_general_ci DEFAULT '7' NOT NULL AFTER `link`,
CHANGE `title` `title` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
CHANGE `description` `description` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
CHANGE `image` `image` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
CHANGE `link` `link` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '#' NULL ;
