ALTER TABLE `rewards` DROP COLUMN `item2`, DROP COLUMN `item3`, DROP COLUMN `item4`, DROP COLUMN `item5`, DROP COLUMN `item6`, DROP COLUMN `item7`, DROP COLUMN `item8`, DROP COLUMN `gold`,    CHANGE `name` `name` VARCHAR(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,     CHANGE `item1` `item` INT(10) UNSIGNED NOT NULL;
ALTER TABLE `rewards`     CHANGE `name` `name` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
INSERT INTO `rewards`(`id`,`server`,`name`,`item`,`price`) VALUES
( '1','1','Amani War Bear','33809','200'),
( '2','1','Swift Zhevra','37719','200'),
( '3','1','Reins of the Swift Spectral Tiger','49284','200'),
( '4','1','Peep\'s Whistle','25596','200'),
( '5','1','X-51 Nether-Rocket','49286','200'),
( '6','1','Mimiron\'s Head','45693','200'),
( '7','1','The Horseman\'s Reins','37012','200'),
( '8','1','Pandaren Monk','49665','100'),
( '9','1','Gryphon Hatchling','49662','100');

