-- --------------------------------------------------------
-- Host:                         doxramos.org
-- Server version:               5.5.31-0+wheezy1 - (Debian)
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             8.1.0.4545
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table website.themes
CREATE TABLE IF NOT EXISTS `themes` (
  `id` int(11) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `vs_info` varchar(50) DEFAULT NULL,
  `active` int(10) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `css_link` varchar(50) DEFAULT NULL,
  `creation_date` date DEFAULT NULL,
  `development_crew` varchar(50) DEFAULT NULL,
  `development_linkback` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table website.themes: ~2 rows (approximately)
DELETE FROM `themes`;
/*!40000 ALTER TABLE `themes` DISABLE KEYS */;
INSERT INTO `themes` (`id`, `author`, `vs_info`, `active`, `name`, `description`, `css_link`, `creation_date`, `development_crew`, `development_linkback`) VALUES
	(1, 'FailzorD', '1.0', 0, 'AquaFlame Cata Edition', 'The AquaFlame Cata Theme', 'DefaultAFCMS', '2013-11-09', 'AquaFlame', NULL),
	(2, 'FailzorD', '1.0', 0, 'AquaFlame Wrath Edition', 'The AquaFlame Wrath Theme', 'Wrath', '2013-11-09', 'AquaFlame', NULL),
	(3, 'FailzorD', '1.0', 1, 'AquaFlame', 'AquaFlame Default Theme', 'Default', '2013-11-12', 'AquaFlame', NULL);
/*!40000 ALTER TABLE `themes` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
