ALTER TABLE `realms` CHANGE `version` `version` VARCHAR(15) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '4.3.4a' NOT NULL;
UPDATE `realms` SET `char_db`='characters' WHERE `id`='1';