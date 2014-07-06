/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : website

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2013-10-14 11:23:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `vote`
-- ----------------------------
DROP TABLE IF EXISTS `vote`;
CREATE TABLE `vote` (
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'ID has to be from 1 to 5',
  `Name` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT 'This is the Name of the Voting Site.',
  `Link` text CHARACTER SET utf8 COMMENT 'It must have http:// to work properly',
  `Description` text CHARACTER SET utf8 COMMENT 'Add the Description for the Voting',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='This Table is all about the Infortmation for the Vote Panel.';

-- ----------------------------
-- Records of vote
-- ----------------------------
INSERT INTO `vote` VALUES ('1', 'Google', 'http://google.gr', 'Vote me jackass!');
INSERT INTO `vote` VALUES ('2', 'AquaFlame', 'http://aquaflame.org', 'Just click me for cookies!');
