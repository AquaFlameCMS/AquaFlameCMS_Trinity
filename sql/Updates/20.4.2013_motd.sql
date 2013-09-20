/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50509
Source Host           : localhost:3306
Source Database       : website

Target Server Type    : MYSQL
Target Server Version : 50509
File Encoding         : 65001

Date: 2013-09-20 13:55:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `motd`
-- ----------------------------
DROP TABLE IF EXISTS `motd`;
CREATE TABLE `motd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` int(11) NOT NULL,
  `image` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of motd
-- ----------------------------
INSERT INTO `motd` VALUES ('1', '0', '22');
