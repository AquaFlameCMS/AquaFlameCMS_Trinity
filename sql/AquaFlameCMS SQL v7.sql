-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.13 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             8.1.0.4545
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table website.comments
DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `newsid` int(10) NOT NULL,
  `comment` text NOT NULL,
  `accountId` int(10) NOT NULL DEFAULT '1337',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `reply` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

-- Dumping data for table website.comments: 1 rows
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` (`id`, `newsid`, `comment`, `accountId`, `date`, `reply`) VALUES
	(64, 20, 'This sucks!', 1, '2013-08-12 01:09:09', 0);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;


-- Dumping structure for table website.contacts
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) unsigned DEFAULT NULL COMMENT 'Account ID',
  `country` varchar(50) DEFAULT NULL COMMENT 'The Country of Residence',
  `date` date DEFAULT NULL COMMENT 'Date of Birth',
  `year` year(4) DEFAULT NULL COMMENT 'Year of Birth',
  `security_question` char(4) DEFAULT NULL COMMENT 'Security Question from the Registration',
  `answer` varchar(50) DEFAULT NULL COMMENT 'Answer of the Security Question',
  `name` varchar(50) DEFAULT NULL COMMENT 'User''s Name',
  `lastname` varchar(50) DEFAULT NULL COMMENT 'User''s Last Name'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table website.contacts: 0 rows
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;


-- Dumping structure for table website.forum_blizzposts
DROP TABLE IF EXISTS `forum_blizzposts`;
CREATE TABLE IF NOT EXISTS `forum_blizzposts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `postid` int(10) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table website.forum_blizzposts: 8 rows
/*!40000 ALTER TABLE `forum_blizzposts` DISABLE KEYS */;
INSERT INTO `forum_blizzposts` (`id`, `type`, `author`, `postid`, `date`) VALUES
	(1, 'thread', '1', 7, '2013-08-11 17:53:36'),
	(2, 'thread', '1', 8, '2013-08-11 17:55:24'),
	(3, 'thread', '1', 9, '2013-08-12 00:21:42'),
	(4, 'thread', '1', 10, '2013-08-12 00:22:10'),
	(5, 'reply', '1', 34, '2013-08-12 00:22:38'),
	(6, 'thread', '1', 11, '2013-08-12 00:36:22'),
	(7, 'thread', '1', 12, '2013-08-12 00:36:56'),
	(8, 'thread', '1', 13, '2013-08-12 00:37:15');
/*!40000 ALTER TABLE `forum_blizzposts` ENABLE KEYS */;


-- Dumping structure for table website.forum_categ
DROP TABLE IF EXISTS `forum_categ`;
CREATE TABLE IF NOT EXISTS `forum_categ` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `num` int(10) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table website.forum_categ: 1 rows
/*!40000 ALTER TABLE `forum_categ` DISABLE KEYS */;
INSERT INTO `forum_categ` (`id`, `num`, `name`) VALUES
	(1, 1, 'WoWFailureCMS');
/*!40000 ALTER TABLE `forum_categ` ENABLE KEYS */;


-- Dumping structure for table website.forum_forums
DROP TABLE IF EXISTS `forum_forums`;
CREATE TABLE IF NOT EXISTS `forum_forums` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `num` int(10) NOT NULL,
  `categ` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `locked` smallint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table website.forum_forums: 4 rows
/*!40000 ALTER TABLE `forum_forums` DISABLE KEYS */;
INSERT INTO `forum_forums` (`id`, `num`, `categ`, `name`, `image`, `description`, `locked`) VALUES
	(1, 1, 1, 'Announcement', 'blizzard', 'All important messages/announcements/informations regarding WoWFailureCMS will be posted here.', 1),
	(2, 2, 1, 'General Talk', 'general', 'You can talk anything you want here :)', 0),
	(3, 3, 1, 'Bugs', 'bugs', 'Post here all bugs you find.', 0),
	(4, 4, 1, 'Suggestions', 'suggestions', 'Post here your ideas regarding WoWFailureCMS.', 0);
/*!40000 ALTER TABLE `forum_forums` ENABLE KEYS */;


-- Dumping structure for table website.forum_posts
DROP TABLE IF EXISTS `forum_posts`;
CREATE TABLE IF NOT EXISTS `forum_posts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` int(2) NOT NULL DEFAULT '0',
  `postid` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

-- Dumping data for table website.forum_posts: 8 rows
/*!40000 ALTER TABLE `forum_posts` DISABLE KEYS */;
INSERT INTO `forum_posts` (`id`, `type`, `postid`) VALUES
	(38, 1, 7),
	(39, 1, 8),
	(40, 1, 9),
	(41, 1, 10),
	(42, 2, 34),
	(43, 1, 11),
	(44, 1, 12),
	(45, 1, 13);
/*!40000 ALTER TABLE `forum_posts` ENABLE KEYS */;


-- Dumping structure for table website.forum_replies
DROP TABLE IF EXISTS `forum_replies`;
CREATE TABLE IF NOT EXISTS `forum_replies` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `threadid` int(10) NOT NULL,
  `content` text NOT NULL,
  `author` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `forumid` int(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `edited` int(1) NOT NULL DEFAULT '0',
  `editedby` int(10) NOT NULL DEFAULT '0',
  `last_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- Dumping data for table website.forum_replies: 1 rows
/*!40000 ALTER TABLE `forum_replies` DISABLE KEYS */;
INSERT INTO `forum_replies` (`id`, `threadid`, `content`, `author`, `date`, `forumid`, `name`, `edited`, `editedby`, `last_date`) VALUES
	(34, 10, 'I was the 1.000.000th visitor on a site, but no prize yet?', 1, '2013-08-11 23:22:38', 2, 'Do we even care? Just Lift!', 0, 0, '2013-08-11 23:22:38');
/*!40000 ALTER TABLE `forum_replies` ENABLE KEYS */;


-- Dumping structure for table website.forum_threads
DROP TABLE IF EXISTS `forum_threads`;
CREATE TABLE IF NOT EXISTS `forum_threads` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `forumid` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` int(10) NOT NULL,
  `replies` int(10) NOT NULL DEFAULT '0',
  `views` int(10) NOT NULL DEFAULT '0',
  `date` timestamp NULL DEFAULT NULL,
  `content` text NOT NULL,
  `locked` tinyint(1) DEFAULT '0',
  `has_blizz` tinyint(1) DEFAULT '0',
  `prefix` varchar(255) NOT NULL DEFAULT 'none',
  `last_date` datetime NOT NULL,
  `edited` int(1) NOT NULL DEFAULT '0',
  `editedby` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table website.forum_threads: 7 rows
/*!40000 ALTER TABLE `forum_threads` DISABLE KEYS */;
INSERT INTO `forum_threads` (`id`, `forumid`, `name`, `author`, `replies`, `views`, `date`, `content`, `locked`, `has_blizz`, `prefix`, `last_date`, `edited`, `editedby`) VALUES
	(7, 2, 'Feels good?', 1, 0, 0, '2013-08-11 16:53:36', 'Oh! It does not!<br />\r\nNOOBS!', 0, 1, 'none', '2013-08-11 16:53:36', 0, 0),
	(8, 2, 'Sometimes we don\\\'t care!', 1, 0, 0, '2013-08-11 16:55:24', 'It is true that some times we don\\\'t care what happens to our fellow friends! <br />\r\nWell if a private server dies it dies! That\\\'s all, the end! Even if a server has the best fixes and better playability players don\\\'t care they just play on the server that they got used to and they don\\\'t even want to test anything else. This is bad for the private servers community!', 0, 1, 'none', '2013-08-11 16:55:24', 0, 0),
	(9, 2, 'This is no fun!', 1, 0, 0, '2013-08-11 23:21:42', 'Haha such a fucked up topic!', 0, 1, 'none', '2013-08-11 23:21:42', 0, 0),
	(10, 2, 'Do we even care? Just Lift!', 1, 1, 3, '2013-08-11 23:22:10', 'I was so lucky. My grandson showed me how to use the internet, and the very first website I go to tells me I won! Now all I have to do is wait, but does anyone know for how long?', 0, 1, 'none', '2013-08-11 23:22:38', 0, 0),
	(11, 2, 'This got to get fixed!', 1, 0, 0, '2013-08-11 23:36:22', 'Really?!', 0, 1, 'none', '2013-08-11 23:36:22', 0, 0),
	(12, 3, 'Super Bugs! Section denied!', 1, 0, 0, '2013-08-11 23:36:56', 'YEAH!', 0, 1, 'none', '2013-08-11 23:36:56', 0, 0),
	(13, 4, 'Another damn post in Suggestions!', 1, 0, 0, '2013-08-11 23:37:15', 'Suggestions: 0', 0, 1, 'none', '2013-08-11 23:37:15', 0, 0);
/*!40000 ALTER TABLE `forum_threads` ENABLE KEYS */;


-- Dumping structure for table website.items
DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) DEFAULT NULL,
  `entry` int(11) DEFAULT NULL,
  `bind` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `speed` int(11) DEFAULT NULL,
  `stats` varchar(50) DEFAULT NULL,
  `str` int(11) DEFAULT NULL,
  `agi` int(11) DEFAULT NULL,
  `int` int(11) DEFAULT NULL,
  `sprt` int(11) DEFAULT NULL,
  `haste` int(11) DEFAULT NULL,
  `crit` int(11) DEFAULT NULL,
  `mast` int(11) DEFAULT NULL,
  `spellp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='This is the items table for the item DB from CMS 1.5';

-- Dumping data for table website.items: ~0 rows (approximately)
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` (`id`, `entry`, `bind`, `name`, `type`, `speed`, `stats`, `str`, `agi`, `int`, `sprt`, `haste`, `crit`, `mast`, `spellp`) VALUES
	(1, 24448, 'Binds on Pickup', 'Test Sword', 'Sword', 1, 'str,agi,crit,mast', 320, 287, 0, 0, 0, 1032, 980, 0);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;


-- Dumping structure for table website.logs
DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `txn_id` varchar(32) DEFAULT NULL,
  `payer_email` varchar(64) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `info` blob,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table website.logs: 0 rows
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;


-- Dumping structure for table website.media
DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `author` int(10) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_url` varchar(30) NOT NULL DEFAULT '0' COMMENT 'Just Youtube Videos',
  `title` text,
  `description` text,
  `comments` int(10) DEFAULT '0',
  `link` varchar(255) DEFAULT '#',
  `visible` int(2) NOT NULL DEFAULT '0',
  `type` int(2) unsigned NOT NULL DEFAULT '0' COMMENT '0 video - 1 wallpapapers - 2 screenshots - 3 artwork - 4 comics',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table website.media: 4 rows
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` (`id`, `author`, `date`, `id_url`, `title`, `description`, `comments`, `link`, `visible`, `type`) VALUES
	(16, 1, '2013-09-18 02:09:52', '-E5M3X-1KP0', 'CATACLYSM (Español - España) - World of Warcraft', 'Trailer of the third World of Warcraft Expansion.</br>This expansion supouse a big change for Azeroth, all the known world will change and the Deathwing`s rage will change the curse of the life.', 0, 'http://www.youtube.com/watch?v=-E5M3X-1KP0', 0, 0),
	(17, 1, '2013-09-18 02:09:54', 'CARC72zF7UI', 'World of Warcraft - Cinemáticas', 'Normal Video', 0, 'http://www.youtube.com/watch?v=CARC72zF7UI', 1, 0),
	(18, 1, '2013-09-18 02:09:54', 'dYK_Gqyf48Y', 'World of Warcraft - Cinematic Trailer', 'Some Trailers', 0, 'http://www.youtube.com/watch?v=dYK_Gqyf48Y', 1, 0),
	(19, 1, '2013-09-18 02:09:55', 'IBHL_-biMrQ', 'World of Warcraft: The Burning Crusade', 'TBC Trailer', 0, 'http://www.youtube.com/watch?v=IBHL_-biMrQ', 1, 0);
/*!40000 ALTER TABLE `media` ENABLE KEYS */;


-- Dumping structure for table website.media_comments
DROP TABLE IF EXISTS `media_comments`;
CREATE TABLE IF NOT EXISTS `media_comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mediaid` int(10) NOT NULL,
  `comment` text NOT NULL,
  `accountId` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

-- Dumping data for table website.media_comments: 0 rows
/*!40000 ALTER TABLE `media_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `media_comments` ENABLE KEYS */;


-- Dumping structure for table website.messages
DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(255) NOT NULL DEFAULT 'FailZorD',
  `class` varchar(255) NOT NULL DEFAULT 'Administrator',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table website.messages: 0 rows
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;


-- Dumping structure for table website.motd
DROP TABLE IF EXISTS `motd`;
CREATE TABLE IF NOT EXISTS `motd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` int(11) NOT NULL,
  `image` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table website.motd: ~0 rows (approximately)
/*!40000 ALTER TABLE `motd` DISABLE KEYS */;
INSERT INTO `motd` (`id`, `day`, `image`) VALUES
	(1, 24, 20);
/*!40000 ALTER TABLE `motd` ENABLE KEYS */;


-- Dumping structure for table website.news
DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `author` int(10) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  `content` text,
  `contentlnk` text,
  `title` text,
  `comments` int(10) DEFAULT '0',
  `image` varchar(255) DEFAULT 'staff',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table website.news: 1 rows
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `author`, `date`, `content`, `contentlnk`, `title`, `comments`, `image`) VALUES
	(1, 1, '0000-00-00 00:00:00', 'World of Warcraft Patch 4.3: Hour of Twilight nears, and with it, Deathwing’s reign of terror will finally come to an end. Featuring a new raid, unexplored dungeons, a legendary rogue quest line, the latest raid tier armor sets, major story developments, the Transmogrification and Void Storage features, and much more, Hour of Twilight has something for everyone..\r\n<div id="center"><br>\r\n	<div class="ctextheadline">\r\n		<img src="http://eu.media4.battle.net/cms/gallery/RC2CO4SNOMFT1320833523998.jpg" style="width: 580px; height: 45px;" />\r\n		<h1>\r\n			Content &amp; Features</h1>\r\n	</div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg"  target="_blank"><img src="http://eu.media5.battle.net/cms/blog_thumbnail/6UI3J2B2ZLHI1317321685765.jpg" /></a> <a class="cteasersummary"  target="_blank"><span class="headline">Raid Finder</span><br />\r\n		<span class="summarytext">Enjoy our brand-new grouping feature that works much like the Dungeon Finder.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg"  target="_blank"><img src="http://eu.media4.battle.net/cms/blog_thumbnail/SOHDLM4OWJF71313585059916.jpg" /></a> <a class="cteasersummary" target="_blank"><span class="headline">Transmogrification</span><br />\r\n		<span class="summarytext">Customize the appearance of your weapons and armor like never before.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg"  target="_blank"><img src="http://eu.media4.battle.net/cms/blog_thumbnail/6XAVNMWID70C1313660227876.jpg" /></a> <a class="cteasersummary"  target="_blank"><span class="headline">Void Storage</span><br />\r\n		<span class="summarytext">Characters of all levels will be able to take advantage of this brand-new technology, which will open up 80 slots of long-term storage space.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg"  target="_blank"><img src="http://eu.media5.battle.net/cms/blog_thumbnail/S8BLQAJZL9301317746259756.jpg" /></a> <a class="cteasersummary" target="_blank"><span class="headline">Valor Changes</span><br />\r\n		<span class="summarytext">With patch 4.3, we\'ll be introducing some changes to the way Valor Points are obtained, as well as the items they can be exchanged for.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media2.battle.net/cms/blog_thumbnail/TF5FWQJV66MF1317210321396.jpg" /></a> <a class="cteasersummary"  target="_blank"><span class="headline">Fangs of the Father</span><br />\r\n		<span class="summarytext">Attention rogues! Play a central role in the fate of Azeroth by doing what you do best: manipulating key events from the shadows.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg"  target="_blank"><img src="http://eu.media1.battle.net/cms/blog_thumbnail/P9VUT605DXAZ1314262079585.jpg" /></a> <a class="cteasersummary" target="_blank"><span class="headline">The All-New Darkmoon Faire</span><br />\r\n		<span class="summarytext">You’ll be dazzled. You’ll be amazed! You aren’t prepared for the Darkmoon Faire, ‘cause it’s like nothing you’ve seen before!</span></a></div>\r\n	<p style="clear: both;">&#160;</p>\r\n	<div class="ctextheadline">\r\n		<img src="http://eu.media5.battle.net/cms/gallery/OVXWRHAJZJ4P1320833656835.jpg" style="width: 580px; height: 45px;" />\r\n		<h1>\r\n			Tier 13 Sets and Visual Retrospective</h1>\r\n	</div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg"  target="_blank"><img src="http://eu.media3.battle.net/cms/blog_thumbnail/W1C83D9578F71315579410079.jpg" /></a> <a class="cteasersummary"  target="_blank"><span class="headline">Warlock Tier Set</span><br />\r\n		<span class="summarytext">The warlock set has the flavor of the Old Gods about it, full of dark and warped aesthetics. General Vezax from the Ulduar raid was used as a reference point.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg"  target="_blank"><img src="http://eu.media1.battle.net/cms/blog_thumbnail/XTSGMRFB7ZF41317987453789.jpg" /></a> <a class="cteasersummary"  target="_blank"><span class="headline">Hunter Tier Set</span><br />\r\n		<span class="summarytext">A dragon-head helm and chained leathery wings around the shoulders -- the set gives the impression of a skeletal dragon crouching over the hunter\'s upper body.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media4.battle.net/cms/blog_thumbnail/0AP817VT773C1316103167706.jpg" /></a> <a class="cteasersummary"  target="_blank"><span class="headline">Mage Tier Set</span><br />\r\n		<span class="summarytext">The combination of moving cogs, quilted fabric, and buckled straps give the set an intriguing &#34;techno-mage&#34; flavor.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg"  target="_blank"><img src="http://eu.media3.battle.net/cms/blog_thumbnail/95KFX579H9261315935561322.jpg" /></a> <a class="cteasersummary"  target="_blank"><span class="headline">Druid Tier Set</span><br />\r\n		<span class="summarytext">Twisting, organic shapes are often key elements of a druid set, and this tier is no exception, with writhing plant roots providing a frame for the glowing clusters of fungi.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg"  target="_blank"><img src="http://eu.media1.battle.net/cms/blog_thumbnail/7J7DWPT5WW2M1316014013476.jpg" /></a> <a class="cteasersummary" target="_blank"><span class="headline">Shaman Tier Set</span><br />\r\n		<span class="summarytext">The shaman set combines huge wolf-skull shoulder pads, bone fetishes, and fur with glowing shards of amber crystal: a mix of the animal and the elemental.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg"  target="_blank"><img src="http://eu.media5.battle.net/cms/blog_thumbnail/WZBWZUQSA6UG1315511140272.jpg" /></a> <a class="cteasersummary"  target="_blank"><span class="headline">Warrior Tier Set</span><br />\r\n		<span class="summarytext">Gnarled dragon horn and angular elementium plating with burning fire behind it were the key ingredients.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg"  target="_blank"><img src="http://eu.media2.battle.net/cms/blog_thumbnail/MZLJSYVI6GKI1316629978030.jpg" /></a> <a class="cteasersummary" target="_blank"><span class="headline">Paladin Tier Set</span><br />\r\n		<span class="summarytext">The ‘feathered’ plate mail, rendered in silver and gold, creates an aggressive, yet sweeping and powerful silhouette for the paladin.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg"  target="_blank"><img src="http://eu.media1.battle.net/cms/blog_thumbnail/MKP8J0HP9B1V1316527703712.jpg" /></a> <a class="cteasersummary"  target="_blank"><span class="headline">Rogue Tier Set</span><br />\r\n		<span class="summarytext">A close-fitting mask, collar, and cowl helps reinforce the rogue\'s sneaky silhouette, despite the sharp, bladed details.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg"  target="_blank"><img src="http://eu.media1.battle.net/cms/blog_thumbnail/FV1PBVSBVI8S1317203740617.jpg" /></a> <a class="cteasersummary"  target="_blank"><span class="headline">Priest Tier Set</span><br />\r\n		<span class="summarytext">Creepy, soulless black eyes and a spiked, setting sun motif create the bold two-tone priest set.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media1.battle.net/cms/blog_thumbnail/VO7DROA9BVXD1319724579692.jpg" /></a> <a class="cteasersummary"  target="_blank"><span class="headline">Death Knight Tier Set</span><br />\r\n		<span class="summarytext">The Necrotic Boneplate set features bones stretched and twisted into unnatural shapes by sorcerous means.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg"  target="_blank"><img src="http://eu.media2.battle.net/cms/gallery/HG43KVD56T0C1320658241819.jpg" /></a> <a class="cteasersummary"  target="_blank"><span class="headline">Tier Set Bonuses</span><br />\r\n		<span class="summarytext">With all the visuals of the tier sets, let’s not forget the magic that lays imbued betwixt their stitches and plating!</span></a></div>\r\n	<p style="clear: both;">&#160;</p>\r\n	<div class="ctextheadline">\r\n		<img src="http://eu.media3.battle.net/cms/gallery/GT6C6FTS92F51320833637514.jpg" style="width: 580px; height: 45px;" />\r\n		<h1>\r\n			Raids &amp; Dungeons</h1>\r\n	</div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg"  target="_blank"><img src="http://eu.media1.battle.net/cms/blog_thumbnail/RFXF4JIWWNTT1288709394829.jpg" /></a> <a class="cteasersummary"  target="_blank"><span class="headline">Raid Preview: Dragon Soul</span><br />\r\n		<span class="summarytext">Assist Thrall and the Dragon Aspects as they seek to bring an end to the Black Dragonflight once and for all.</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media4.battle.net/cms/blog_thumbnail/4X5B4WE74Q001316422569592.jpg" /></a> <a class="cteasersummary" target="_blank"><span class="headline">Dungeons Preview: End Time</span><br />\r\n		<span class="summarytext">Deathwing roams the skies of Azeroth, wreaking havoc on the land and its people -- how can you stop him?</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media1.battle.net/cms/blog_thumbnail/V9OA0INVOZHK1316422710831.jpg" /></a> <a class="cteasersummary"  target="_blank"><span class="headline">Dungeons Preview: Well of Eternity</span><br />\r\n		<span class="summarytext">Witness one of the most catastrophic events in Azeroth’s history: the War of the Ancients!</span></a></div>\r\n	<div class="cteaser">\r\n		<a class="cteaserimg" target="_blank"><img src="http://eu.media2.battle.net/cms/blog_thumbnail/RASNKQG5BHE11316426431395.jpg" /></a> <a class="cteasersummary" target="_blank"><span class="headline">Dungeons Preview: Hour of Twilight</span><br />\r\n		<span class="summarytext">A most dangerous task awaits you: Escort Thrall and the Dragon Soul safely to Wyrmrest Temple, for the assault on Deathwing.</span></a></div>\r\n	<p style="clear: both;">&#160;</p>\r\n	\r\n	\r\n	\r\n	\r\n			\r\n				<tbody>\r\n<!-- repeat for every media coverage link you have -->					<tr>\r\n						\r\n<!-- repeat until here for every media coverage link you have -->				</tbody>\r\n			\r\n		\r\n	<p style="clear: both;">&#160;</p>\r\n</div>\r\n<style type="text/css">\r\n#blog .detail #center {\r\nwidth: 590px;\r\nmargin: 0px auto;\r\n}\r\n#blog .detail div.ctextheadline {\r\nposition: relative;\r\ndisplay: block;\r\ntext-decoration: none;\r\nline-height:1 !important;\r\nfont-family: Arial !important;\r\nmargin-left: 3px;\r\n}\r\n#blog .detail div.ctextheadline h1 {\r\nposition: absolute;\r\ntop: 13px;\r\nleft: 30px;\r\ncolor: #ffb001 !important;\r\nfont-size: 23px !important;\r\n}\r\n#blog .detail div.cteaser, #blog .detail img, #blog .detail div.cteaserg {\r\n-moz-border-radius:4px;\r\n-webkit-border-radius:4px;\r\nborder-radius:4px;\r\n-moz-box-shadow:0 0 20px #000000;\r\n-webkit-box-shadow:0 0 20px #000000;\r\nbox-shadow:0 0 20px #000000;\r\nborder: 1px solid #372511;\r\npadding: 1px;\r\n}\r\n#blog .detail div.cteaser, #blog .detail div.cteaserg {\r\nwidth: 285px;\r\nheight: 144px;\r\nmargin: 8px 3px 0px 3px;\r\npadding-top: 5px;\r\nbackground-color: #1D100A;\r\nfloat:left;\r\n}\r\n#blog .detail div.cteaser:hover {\r\nborder: 1px solid #CD9000;\r\nbackground-color: #40200d;\r\n}\r\n#blog .detail .cteaser a.cteaserimg, #blog .detail .cteaserg div.cteaserimg {\r\ndisplay: block;\r\nwidth: 125px;\r\nheight: 140px;\r\ntext-align: center;\r\nfloat: left;\r\n}\r\n#blog .detail .cteaser a.cteaserimg img, #blog .detail .cteaserg div.cteaserimg img {\r\n-moz-border-radius:10px;\r\n-webkit-border-radius:10px;\r\nborder-radius:10px;\r\n-moz-box-shadow:0 0 20px #000000;\r\n-webkit-box-shadow:0 0 20px #000000;\r\nbox-shadow:0 0 20px #000000;\r\nborder: 1px solid #1D100A;\r\nvertical-align: middle;\r\nwidth: 109px;\r\nheight: 109px;\r\nmargin-top: 10px;\r\npadding: 1px;\r\n}\r\n#blog .detail .cteaser a.cteasersummary, #blog .detail .cteaserg div.cteasersummary {\r\ndisplay: block;\r\npadding-right: 3px;\r\nline-height: 1.4 !important;\r\nwidth: 157px;\r\nheight: 140px;\r\nfloat: left;\r\n}\r\n#blog .detail .cteaser a.cteasersummary span.headline, #blog .detail .cteaserg div.cteasersummary span.headline {\r\ncolor: #d19205 !important;\r\nfont-size: 17px !important;\r\ntext-weight: bold !important;\r\n}\r\n#blog .detail .cteaser a.cteasersummary span.summarytext, #blog .detail .cteaserg div.cteasersummary span.summarytext {\r\ncolor: #ad8460 !important;\r\nfont-size: 12px !important;\r\n}\r\n.top-list tr:nth-child(2) td {\r\ncolor: #F0E29A;\r\nbackground-color: transparent;\r\n}\r\n.top-list-interior table tbody tr td {\r\nbackground-color: none !important;\r\ncolor: #EFC9A0 !important;\r\nfont-weight: normal !important;\r\nvertical-align: top;\r\n}\r\n.top-list-interior table tbody tr:hover td {\r\ncolor: #fff !important;\r\n}</style>\r\n\r\n\r\n					\r\nHope you enjoy, and we will let you know what is fixed and what is not.', '1', 'Patch 4.3: Hour of Twilight', 1, '4.3.0');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;


-- Dumping structure for table website.prices
DROP TABLE IF EXISTS `prices`;
CREATE TABLE IF NOT EXISTS `prices` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `service` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'vote',
  `vp` int(10) DEFAULT '0',
  `dp` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table website.prices: 4 rows
/*!40000 ALTER TABLE `prices` DISABLE KEYS */;
INSERT INTO `prices` (`id`, `service`, `type`, `vp`, `dp`) VALUES
	(1, 'name-change', 'vote', 300, 0),
	(2, 'race-change', 'vote', 500, 0),
	(3, 'appear-change', 'vote', 400, 0),
	(4, 'faction-change', 'vote', 600, 10);
/*!40000 ALTER TABLE `prices` ENABLE KEYS */;


-- Dumping structure for table website.realms
DROP TABLE IF EXISTS `realms`;
CREATE TABLE IF NOT EXISTS `realms` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `realmid` int(10) DEFAULT NULL,
  `world_db` varchar(255) NOT NULL DEFAULT 'world',
  `char_db` varchar(255) NOT NULL DEFAULT 'characters',
  `version` varchar(15) NOT NULL DEFAULT '4.0.6a',
  `drop_rate` varchar(5) NOT NULL DEFAULT '1x',
  `exp_rate` varchar(5) NOT NULL DEFAULT '1x',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Dumping data for table website.realms: 1 rows
/*!40000 ALTER TABLE `realms` DISABLE KEYS */;
INSERT INTO `realms` (`id`, `realmid`, `world_db`, `char_db`, `version`, `drop_rate`, `exp_rate`) VALUES
	(1, 1, 'world', 'chars', '4.3.4a', '1x', '1x');
/*!40000 ALTER TABLE `realms` ENABLE KEYS */;


-- Dumping structure for table website.rewards
DROP TABLE IF EXISTS `rewards`;
CREATE TABLE IF NOT EXISTS `rewards` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `server` int(10) unsigned NOT NULL,
  `name` varchar(32) NOT NULL,
  `item1` int(10) unsigned NOT NULL,
  `item2` int(10) unsigned NOT NULL,
  `item3` int(10) unsigned NOT NULL,
  `item4` int(10) unsigned NOT NULL,
  `item5` int(10) unsigned NOT NULL,
  `item6` int(10) unsigned NOT NULL,
  `item7` int(10) unsigned NOT NULL,
  `item8` int(10) unsigned NOT NULL,
  `gold` int(10) unsigned NOT NULL,
  `price` float unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table website.rewards: 1 rows
/*!40000 ALTER TABLE `rewards` DISABLE KEYS */;
INSERT INTO `rewards` (`id`, `server`, `name`, `item1`, `item2`, `item3`, `item4`, `item5`, `item6`, `item7`, `item8`, `gold`, `price`) VALUES
	(1, 1, 'Test Sword', 24448, 0, 0, 0, 0, 0, 0, 0, 0, 5);
/*!40000 ALTER TABLE `rewards` ENABLE KEYS */;


-- Dumping structure for table website.servers
DROP TABLE IF EXISTS `servers`;
CREATE TABLE IF NOT EXISTS `servers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `host` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `database` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table website.servers: 1 rows
/*!40000 ALTER TABLE `servers` DISABLE KEYS */;
INSERT INTO `servers` (`id`, `name`, `host`, `username`, `password`, `database`) VALUES
	(1, 'AquaFlameCMS', '127.0.0.1', 'root', 'password', 'world');
/*!40000 ALTER TABLE `servers` ENABLE KEYS */;


-- Dumping structure for table website.slideshows
DROP TABLE IF EXISTS `slideshows`;
CREATE TABLE IF NOT EXISTS `slideshows` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT '#',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table website.slideshows: 2 rows
/*!40000 ALTER TABLE `slideshows` DISABLE KEYS */;
INSERT INTO `slideshows` (`id`, `title`, `description`, `image`, `link`) VALUES
	(2, 'Patch 4.3', 'Cataclysm Version 4.3.4 Supported!', '4.3.jpg', '#'),
	(1, 'Patch 4.2', 'Cataclysm Version 4.2.0 Supported!', '4.2.jpg', '#');
/*!40000 ALTER TABLE `slideshows` ENABLE KEYS */;


-- Dumping structure for table website.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT '0-0.jpg',
  `blizz` tinyint(1) DEFAULT '0',
  `class` varchar(255) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `character` int(10) NOT NULL DEFAULT '0',
  `vote_points` int(10) NOT NULL DEFAULT '0',
  `donation_points` int(10) NOT NULL DEFAULT '0',
  `char_realm` int(10) NOT NULL DEFAULT '1',
  `registerIp` varchar(30) NOT NULL DEFAULT '0-0-0-0',
  `country` varchar(20) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `quest1` int(2) NOT NULL DEFAULT '0',
  `ans1` varchar(50) NOT NULL DEFAULT 'undefined',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table website.users: 1 rows
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `avatar`, `blizz`, `class`, `firstName`, `lastName`, `character`, `vote_points`, `donation_points`, `char_realm`, `registerIp`, `country`, `birth`, `quest1`, `ans1`) VALUES
	(1, 'eagle.gif', 1, 'blizz', 'Alex', 'Papadopoulos', 0, 101, 20, 1, '0-0-0-0', 'GRC', '1990-04-10', 1, 'it\'s 1');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table website.version
DROP TABLE IF EXISTS `version`;
CREATE TABLE IF NOT EXISTS `version` (
  `Name` text,
  `Number` varchar(10) DEFAULT NULL,
  `Revision` char(50) DEFAULT NULL,
  `DB_Version` varchar(50) DEFAULT NULL,
  `Updates` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='This here shows you what Version of WoWFailureCMS you have.';

-- Dumping data for table website.version: 1 rows
/*!40000 ALTER TABLE `version` DISABLE KEYS */;
INSERT INTO `version` (`Name`, `Number`, `Revision`, `DB_Version`, `Updates`) VALUES
	('AquaFlameCMS', 'v7', 'fa7385fb81fcb7834f26af9e4d606c81060241ec', 'v7', '2');
/*!40000 ALTER TABLE `version` ENABLE KEYS */;


-- Dumping structure for table website.vote
DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID has to be from 1 to 5',
  `Name` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT 'This is the Name of the Voting Site.',
  `Link` text CHARACTER SET utf8 COMMENT 'It must have http:// to work properly',
  `Description` text CHARACTER SET utf8 COMMENT 'Add the Description for the Voting',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='This Table is all about the Infortmation for the Vote Panel.';

-- Dumping data for table website.vote: 2 rows
/*!40000 ALTER TABLE `vote` DISABLE KEYS */;
INSERT INTO `vote` (`ID`, `Name`, `Link`, `Description`) VALUES
	(1, 'Google', 'http://google.gr', 'Vote me jackass!'),
	(2, 'AquaFlame', 'http://aquaflame.org', 'Just click me for cookies!');
/*!40000 ALTER TABLE `vote` ENABLE KEYS */;


-- Dumping structure for table website.votes
DROP TABLE IF EXISTS `votes`;
CREATE TABLE IF NOT EXISTS `votes` (
  `id` int(10) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `voteid` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table website.votes: 4 rows
/*!40000 ALTER TABLE `votes` DISABLE KEYS */;
INSERT INTO `votes` (`id`, `userid`, `date`, `voteid`) VALUES
	(1, 1, '2013-08-14 18:08:07', 1),
	(2, 1, '2013-09-04 17:30:01', 1),
	(3, 1, '2013-09-09 23:36:19', 1),
	(4, 1, '2013-09-28 18:02:42', 1);
/*!40000 ALTER TABLE `votes` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
