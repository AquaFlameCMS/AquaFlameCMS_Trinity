-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.27 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2012-09-14 16:14:26
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

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
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

-- Dumping data for table website.comments: 0 rows
DELETE FROM `comments`;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;


-- Dumping structure for table website.community_slides
DROP TABLE IF EXISTS `community_slides`;
CREATE TABLE IF NOT EXISTS `community_slides` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `desc` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT '#',
  `date` date NOT NULL,
  `image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table website.community_slides: ~4 rows (approximately)
DELETE FROM `community_slides`;
/*!40000 ALTER TABLE `community_slides` DISABLE KEYS */;
INSERT INTO `community_slides` (`id`, `desc`, `title`, `url`, `date`, `image`) VALUES
	(1, 'Testing WoWFailureCMS at maximum capacity.', 'Testing WoWFailureCMS', '#', '2011-04-20', '4ZONJ2G8H02S1291403588642.jpg'),
	(2, 'Find us on WoWFailureCore.org.', 'Where to find us?', '#', '2011-04-20', '3A016YGNDN971281040709386.jpg'),
	(3, 'Check The Forum for the latest updates.', 'WoWFailureCMS Forum', '#', '2011-04-20', 'HXW8I6KL6MRK1290045863003.jpg'),
	(4, 'test', 'test', '#', '2011-04-20', 'TE943VAV1IVZ1290560963083.jpg');
/*!40000 ALTER TABLE `community_slides` ENABLE KEYS */;


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

-- Dumping data for table website.contacts: ~0 rows (approximately)
DELETE FROM `contacts`;
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table website.forum_blizzposts: ~0 rows (approximately)
DELETE FROM `forum_blizzposts`;
/*!40000 ALTER TABLE `forum_blizzposts` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_blizzposts` ENABLE KEYS */;


-- Dumping structure for table website.forum_categ
DROP TABLE IF EXISTS `forum_categ`;
CREATE TABLE IF NOT EXISTS `forum_categ` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `num` int(10) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table website.forum_categ: ~1 rows (approximately)
DELETE FROM `forum_categ`;
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

-- Dumping data for table website.forum_forums: ~4 rows (approximately)
DELETE FROM `forum_forums`;
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
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- Dumping data for table website.forum_posts: ~0 rows (approximately)
DELETE FROM `forum_posts`;
/*!40000 ALTER TABLE `forum_posts` DISABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

-- Dumping data for table website.forum_replies: ~0 rows (approximately)
DELETE FROM `forum_replies`;
/*!40000 ALTER TABLE `forum_replies` DISABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table website.forum_threads: ~0 rows (approximately)
DELETE FROM `forum_threads`;
/*!40000 ALTER TABLE `forum_threads` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_threads` ENABLE KEYS */;


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

-- Dumping data for table website.logs: ~0 rows (approximately)
DELETE FROM `logs`;
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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table website.media: 4 rows
DELETE FROM `media`;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` (`id`, `author`, `date`, `id_url`, `title`, `description`, `comments`, `link`, `visible`, `type`) VALUES
	(16, 0, '2012-03-12 01:59:00', '-E5M3X-1KP0', 'CATACLYSM (Español - España) - World of Warcraft', 'Trailer of the third World of Warcraft Expansion.</br>This expansion supouse a big change for Azeroth, all the known world will change and the Deathwing`s rage will change the curse of the life.', 0, 'http://www.youtube.com/watch?v=-E5M3X-1KP0', 1, 0),
	(17, 0, '2012-03-12 01:59:00', 'CARC72zF7UI', 'World of Warcraft - Cinemáticas', 'Normal Video', 0, 'http://www.youtube.com/watch?v=CARC72zF7UI', 1, 0),
	(18, 0, '2012-03-12 01:59:00', 'dYK_Gqyf48Y', 'World of Warcraft - Cinematic Trailer', 'Some Trailers', 0, 'http://www.youtube.com/watch?v=dYK_Gqyf48Y', 1, 0),
	(19, 0, '2012-03-12 01:59:00', 'IBHL_-biMrQ', 'World of Warcraft: The Burning Crusade', 'TBC Trailer', 0, 'http://www.youtube.com/watch?v=IBHL_-biMrQ', 1, 0);
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
DELETE FROM `media_comments`;
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
DELETE FROM `messages`;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;


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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table website.news: 0 rows
DELETE FROM `news`;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
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

-- Dumping data for table website.prices: ~4 rows (approximately)
DELETE FROM `prices`;
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

-- Dumping data for table website.realms: ~1 rows (approximately)
DELETE FROM `realms`;
/*!40000 ALTER TABLE `realms` DISABLE KEYS */;
INSERT INTO `realms` (`id`, `realmid`, `world_db`, `char_db`, `version`, `drop_rate`, `exp_rate`) VALUES
	(1, 1, 'world', 'characters', '4.0.6a', '1x', '1x');
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table website.rewards: ~0 rows (approximately)
DELETE FROM `rewards`;
/*!40000 ALTER TABLE `rewards` DISABLE KEYS */;
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table website.servers: ~0 rows (approximately)
DELETE FROM `servers`;
/*!40000 ALTER TABLE `servers` DISABLE KEYS */;
/*!40000 ALTER TABLE `servers` ENABLE KEYS */;


-- Dumping structure for table website.shouts
DROP TABLE IF EXISTS `shouts`;
CREATE TABLE IF NOT EXISTS `shouts` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `author` varchar(255) DEFAULT NULL,
  `body` longtext,
  `date` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table website.shouts: ~0 rows (approximately)
DELETE FROM `shouts`;
/*!40000 ALTER TABLE `shouts` DISABLE KEYS */;
/*!40000 ALTER TABLE `shouts` ENABLE KEYS */;


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
DELETE FROM `slideshows`;
/*!40000 ALTER TABLE `slideshows` DISABLE KEYS */;
INSERT INTO `slideshows` (`id`, `title`, `description`, `image`, `link`) VALUES
	(4, 'Title1', 'Description1', 'community01.png', '#'),
	(5, 'Title2', 'Description2', 'draenei.jpg', '#');
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

-- Dumping data for table website.users: 0 rows
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table website.version
DROP TABLE IF EXISTS `version`;
CREATE TABLE IF NOT EXISTS `version` (
  `Name` text,
  `Number` varchar(10) DEFAULT NULL,
  `Revision` varchar(10) DEFAULT NULL,
  `DB_Version` varchar(50) DEFAULT NULL,
  `Updates` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='This here shows you what Version of WoWFailureCMS you have.';

-- Dumping data for table website.version: ~1 rows (approximately)
DELETE FROM `version`;
/*!40000 ALTER TABLE `version` DISABLE KEYS */;
INSERT INTO `version` (`Name`, `Number`, `Revision`, `DB_Version`, `Updates`) VALUES
	('AquaFlameCMS', 'v6', '192', 'v6', '0');
/*!40000 ALTER TABLE `version` ENABLE KEYS */;


-- Dumping structure for table website.vote
DROP TABLE IF EXISTS `vote`;
CREATE TABLE IF NOT EXISTS `vote` (
  `ID` int(10) DEFAULT NULL COMMENT 'ID has to be from 1 to 5',
  `Name` varchar(50) DEFAULT NULL COMMENT 'This is the Name of the Voting Site.',
  `Link` text COMMENT 'It must have http:// to work properly',
  `Description` text COMMENT 'Add the Description for the Voting'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='This Table is all about the Infortmation for the Vote Panel.';

-- Dumping data for table website.vote: ~0 rows (approximately)
DELETE FROM `vote`;
/*!40000 ALTER TABLE `vote` DISABLE KEYS */;
/*!40000 ALTER TABLE `vote` ENABLE KEYS */;


-- Dumping structure for table website.votes
DROP TABLE IF EXISTS `votes`;
CREATE TABLE IF NOT EXISTS `votes` (
  `id` int(10) DEFAULT NULL,
  `userid` int(10) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `voteid` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table website.votes: ~0 rows (approximately)
DELETE FROM `votes`;
/*!40000 ALTER TABLE `votes` DISABLE KEYS */;
/*!40000 ALTER TABLE `votes` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
