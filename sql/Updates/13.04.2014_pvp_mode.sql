CREATE TABLE `pvp_mode` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thumb` VARCHAR(50) NOT NULL,
  `group-name` VARCHAR(50) DEFAULT NULL,
  `description` VARCHAR(255) DEFAULT NULL,
  `link` VARCHAR(255) DEFAULT '#',
  UNIQUE KEY `id` (`id`)
) ENGINE=INNODB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT  INTO `pvp_mode`(`id`,`thumb`,`group-name`,`description`,`link`) VALUES
 (1,'thumb-pvp-overview','PvP Overview','Top players, specs, and teams','#'),
 (2,'thumb-battlegrounds','Battlegrounds',NULL,'#'),
 (3,'thumb-arena-2v2','Arena 2v2',NULL,'pvp/arena/2v2.php'),
 (4,'thumb-arena-3v3','Arena 3v3',NULL,'pvp/arena/3v3.php'),
 (5,'thumb-arena-5v5','Arena 5v5',NULL,'pvp/arena/5v5.php');
