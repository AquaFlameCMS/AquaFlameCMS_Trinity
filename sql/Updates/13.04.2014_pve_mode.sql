CREATE TABLE `pve_mode` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `thumb` VARCHAR(50) NOT NULL,
  `group-name` VARCHAR(50) NOT NULL,
  `description` VARCHAR(255) NOT NULL,
  `link` VARCHAR(255) DEFAULT '#',
  UNIQUE KEY `id` (`id`)
) ENGINE=INNODB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT  INTO `pve_mode`(`id`,`thumb`,`group-name`,`description`,`link`) VALUES
(1,'thumb-gate-of-the-setting-sun','Gate of the Setting Sun','','#'),
(2,'thumb-mogushan-palace','Mogu\'shan Palace','','#'),
(3,'thumb-scarlet-halls','Scarlet Halls','','#'),
(4,'thumb-scarlet-monastery','Scarlet Monastery','','#'),
(5,'thumb-scholomance','Scholomance','','#'),
(6,'thumb-shadopan-monastery','Shado-Pan Monastery','','#'),
(7,'thumb-siege-of-niuzao-temple','Siege of Niuzao Temple','','#'),
(8,'thumb-stormstout-brewery','Stormstout Brewery','','#'),
(9,'thumb-temple-of-the-jade-serpent','Temple of the Jade Serpent','','#');
