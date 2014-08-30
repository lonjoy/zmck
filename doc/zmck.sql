/*
Navicat MySQL Data Transfer

Source Server         : vhost_192.168.199.129
Source Server Version : 50528
Source Host           : localhost:3306
Source Database       : zmck

Target Server Type    : MYSQL
Target Server Version : 50528
File Encoding         : 65001

Date: 2014-08-30 08:47:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `zm_company`
-- ----------------------------
DROP TABLE IF EXISTS `zm_company`;
CREATE TABLE `zm_company` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '公司名称',
  `legalperson` varchar(20) NOT NULL DEFAULT '' COMMENT '法人',
  `salarysystem` varchar(100) NOT NULL DEFAULT '' COMMENT '薪酬体系',
  `province` tinyint(2) NOT NULL DEFAULT '0' COMMENT '省',
  `city` tinyint(2) NOT NULL DEFAULT '0' COMMENT '市',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_company
-- ----------------------------

-- ----------------------------
-- Table structure for `zm_datacarousels`
-- ----------------------------
DROP TABLE IF EXISTS `zm_datacarousels`;
CREATE TABLE `zm_datacarousels` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `ctime` int(10) NOT NULL,
  `order` tinyint(3) NOT NULL DEFAULT '0',
  `url` varchar(200) NOT NULL DEFAULT '' COMMENT 'url',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_datacarousels
-- ----------------------------
INSERT INTO `zm_datacarousels` VALUES ('9', '众梦创客', '1409155815', '22', 'ttt');
INSERT INTO `zm_datacarousels` VALUES ('10', '众梦创客', '1409159073', '0', '');

-- ----------------------------
-- Table structure for `zm_followers`
-- ----------------------------
DROP TABLE IF EXISTS `zm_followers`;
CREATE TABLE `zm_followers` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `follower_id` int(10) NOT NULL,
  `ctime` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_followers
-- ----------------------------

-- ----------------------------
-- Table structure for `zm_industries`
-- ----------------------------
DROP TABLE IF EXISTS `zm_industries`;
CREATE TABLE `zm_industries` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `isdel` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_industries
-- ----------------------------
INSERT INTO `zm_industries` VALUES ('1', '计算机', '0');
INSERT INTO `zm_industries` VALUES ('2', '', '0');
INSERT INTO `zm_industries` VALUES ('3', 'yy', '0');

-- ----------------------------
-- Table structure for `zm_salary_system`
-- ----------------------------
DROP TABLE IF EXISTS `zm_salary_system`;
CREATE TABLE `zm_salary_system` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '名称',
  `isdel` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_salary_system
-- ----------------------------
INSERT INTO `zm_salary_system` VALUES ('1', '基本薪资', '0');
INSERT INTO `zm_salary_system` VALUES ('2', '基本薪资 + 提成', '0');
INSERT INTO `zm_salary_system` VALUES ('3', '基本薪资 + 原始股', '0');
INSERT INTO `zm_salary_system` VALUES ('4', '基本薪资 + 期权', '0');

-- ----------------------------
-- Table structure for `zm_site_settings`
-- ----------------------------
DROP TABLE IF EXISTS `zm_site_settings`;
CREATE TABLE `zm_site_settings` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '名称',
  `value` varchar(500) NOT NULL DEFAULT '' COMMENT '值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_site_settings
-- ----------------------------

-- ----------------------------
-- Table structure for `zm_survey`
-- ----------------------------
DROP TABLE IF EXISTS `zm_survey`;
CREATE TABLE `zm_survey` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `ctime` int(10) NOT NULL,
  `enable` tinyint(1) NOT NULL DEFAULT '1' COMMENT '有效无效',
  `ismultiple` tinyint(1) NOT NULL DEFAULT '0' COMMENT '单选，多选',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_survey
-- ----------------------------
INSERT INTO `zm_survey` VALUES ('1', 'test', '1409330688', '1', '0');
INSERT INTO `zm_survey` VALUES ('2', '天天', '1409330770', '1', '0');
INSERT INTO `zm_survey` VALUES ('3', '让人', '1409330861', '1', '0');
INSERT INTO `zm_survey` VALUES ('4', '让人 dsf', '1409330988', '1', '0');

-- ----------------------------
-- Table structure for `zm_survey_data`
-- ----------------------------
DROP TABLE IF EXISTS `zm_survey_data`;
CREATE TABLE `zm_survey_data` (
  `id` int(10) NOT NULL,
  `userid` int(10) NOT NULL,
  `ctime` int(10) NOT NULL,
  `ip` char(15) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_survey_data
-- ----------------------------

-- ----------------------------
-- Table structure for `zm_survey_options`
-- ----------------------------
DROP TABLE IF EXISTS `zm_survey_options`;
CREATE TABLE `zm_survey_options` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `survey_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_survey_options
-- ----------------------------
INSERT INTO `zm_survey_options` VALUES ('1', '0', '让人');
INSERT INTO `zm_survey_options` VALUES ('2', '0', '啊啊');
INSERT INTO `zm_survey_options` VALUES ('3', '0', '方法');
INSERT INTO `zm_survey_options` VALUES ('4', '4', 'dsfdsa');
INSERT INTO `zm_survey_options` VALUES ('5', '4', 'dsafdsa');
INSERT INTO `zm_survey_options` VALUES ('6', '4', 'fdsaf');
INSERT INTO `zm_survey_options` VALUES ('7', '4', 'dsfdsa');
INSERT INTO `zm_survey_options` VALUES ('8', '4', 'dsafdsa');
INSERT INTO `zm_survey_options` VALUES ('9', '4', 'fdsaf');
INSERT INTO `zm_survey_options` VALUES ('10', '4', '1111');
INSERT INTO `zm_survey_options` VALUES ('11', '4', 'dsfdsa');
INSERT INTO `zm_survey_options` VALUES ('12', '4', 'dsafdsa');
INSERT INTO `zm_survey_options` VALUES ('13', '4', 'fdsaf');
INSERT INTO `zm_survey_options` VALUES ('14', '4', 'dsfdsa');
INSERT INTO `zm_survey_options` VALUES ('15', '4', 'dsafdsa');
INSERT INTO `zm_survey_options` VALUES ('16', '4', 'fdsaf');
INSERT INTO `zm_survey_options` VALUES ('17', '4', '1111');
INSERT INTO `zm_survey_options` VALUES ('18', '4', '222');
INSERT INTO `zm_survey_options` VALUES ('19', '4', 'dsfdsa');
INSERT INTO `zm_survey_options` VALUES ('20', '4', 'dsafdsa');
INSERT INTO `zm_survey_options` VALUES ('21', '4', 'fdsaf');
INSERT INTO `zm_survey_options` VALUES ('22', '4', 'dsfdsa');
INSERT INTO `zm_survey_options` VALUES ('23', '4', 'dsafdsa');
INSERT INTO `zm_survey_options` VALUES ('24', '4', 'fdsaf');
INSERT INTO `zm_survey_options` VALUES ('25', '4', '1111');
INSERT INTO `zm_survey_options` VALUES ('26', '4', 'dsfdsa');
INSERT INTO `zm_survey_options` VALUES ('27', '4', 'dsafdsa');
INSERT INTO `zm_survey_options` VALUES ('28', '4', 'fdsaf');
INSERT INTO `zm_survey_options` VALUES ('29', '4', 'dsfdsa');
INSERT INTO `zm_survey_options` VALUES ('30', '4', 'dsafdsa');
INSERT INTO `zm_survey_options` VALUES ('31', '4', 'fdsaf');
INSERT INTO `zm_survey_options` VALUES ('32', '4', '1111');
INSERT INTO `zm_survey_options` VALUES ('33', '4', '222');
INSERT INTO `zm_survey_options` VALUES ('34', '4', 'dsfdsa');
INSERT INTO `zm_survey_options` VALUES ('35', '4', 'dsafdsa');
INSERT INTO `zm_survey_options` VALUES ('36', '4', 'fdsaf');
INSERT INTO `zm_survey_options` VALUES ('37', '4', 'dsfdsa');
INSERT INTO `zm_survey_options` VALUES ('38', '4', 'dsafdsa');
INSERT INTO `zm_survey_options` VALUES ('39', '4', 'fdsaf');
INSERT INTO `zm_survey_options` VALUES ('40', '4', '1111');
INSERT INTO `zm_survey_options` VALUES ('41', '4', 'dsfdsa');
INSERT INTO `zm_survey_options` VALUES ('42', '4', 'dsafdsa');
INSERT INTO `zm_survey_options` VALUES ('43', '4', 'fdsaf');
INSERT INTO `zm_survey_options` VALUES ('44', '4', 'dsfdsa');
INSERT INTO `zm_survey_options` VALUES ('45', '4', 'dsafdsa');
INSERT INTO `zm_survey_options` VALUES ('46', '4', 'fdsaf');
INSERT INTO `zm_survey_options` VALUES ('47', '4', '1111');
INSERT INTO `zm_survey_options` VALUES ('48', '4', '222');
INSERT INTO `zm_survey_options` VALUES ('49', '4', 'dsfdsa');
INSERT INTO `zm_survey_options` VALUES ('50', '4', 'dsfdsa');
INSERT INTO `zm_survey_options` VALUES ('51', '4', 'dsfdsa');
INSERT INTO `zm_survey_options` VALUES ('52', '4', 'dsafdsa');
INSERT INTO `zm_survey_options` VALUES ('53', '4', 'fdsaf');
INSERT INTO `zm_survey_options` VALUES ('54', '4', 'dsfdsa');
INSERT INTO `zm_survey_options` VALUES ('55', '4', 'dsafdsa');
INSERT INTO `zm_survey_options` VALUES ('56', '4', 'fdsaf');
INSERT INTO `zm_survey_options` VALUES ('57', '4', '1111');
INSERT INTO `zm_survey_options` VALUES ('58', '4', 'dsfdsa');
INSERT INTO `zm_survey_options` VALUES ('59', '4', 'dsafdsa');
INSERT INTO `zm_survey_options` VALUES ('60', '4', 'fdsaf');
INSERT INTO `zm_survey_options` VALUES ('61', '4', 'dsfdsa');
INSERT INTO `zm_survey_options` VALUES ('62', '4', 'dsafdsa');
INSERT INTO `zm_survey_options` VALUES ('63', '4', 'fdsaf');
INSERT INTO `zm_survey_options` VALUES ('64', '4', '1111');
INSERT INTO `zm_survey_options` VALUES ('65', '4', '222');

-- ----------------------------
-- Table structure for `zm_user_roles`
-- ----------------------------
DROP TABLE IF EXISTS `zm_user_roles`;
CREATE TABLE `zm_user_roles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `state` tinyint(1) NOT NULL DEFAULT '0',
  `ctime` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_user_roles
-- ----------------------------
INSERT INTO `zm_user_roles` VALUES ('1', 'ss', '1', '1408376644');
INSERT INTO `zm_user_roles` VALUES ('2', '神奇啊', '1', '1408376996');
INSERT INTO `zm_user_roles` VALUES ('3', '美女啊', '1', '1408377004');

-- ----------------------------
-- Table structure for `zm_user_tags`
-- ----------------------------
DROP TABLE IF EXISTS `zm_user_tags`;
CREATE TABLE `zm_user_tags` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_user_tags
-- ----------------------------

-- ----------------------------
-- Table structure for `zm_users`
-- ----------------------------
DROP TABLE IF EXISTS `zm_users`;
CREATE TABLE `zm_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL DEFAULT '',
  `gender` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '用户姓名',
  `nickname` varchar(50) NOT NULL DEFAULT '',
  `intro` varchar(1000) NOT NULL DEFAULT '',
  `agerange` tinyint(3) NOT NULL,
  `workyears` tinyint(3) NOT NULL,
  `role` tinyint(3) NOT NULL DEFAULT '0',
  `level` tinyint(3) NOT NULL COMMENT '用户等级',
  `vip` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'VIP',
  `xintai` tinyint(2) NOT NULL DEFAULT '0',
  `nowstatus` int(10) NOT NULL DEFAULT '0' COMMENT '目前状态',
  `regip` varchar(50) NOT NULL DEFAULT '0',
  `regtime` int(10) NOT NULL DEFAULT '0',
  `lastlogintime` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `online` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否在线',
  `province` tinyint(3) DEFAULT '0',
  `city` tinyint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_users
-- ----------------------------
INSERT INTO `zm_users` VALUES ('1', 'qq@qq.comä»–', '11', '1', '', 'ha偶人已个', 'tttttttttttt', '1', '1', '3', '0', '0', '0', '0', '0', '1408292240', '0', '0', '0', '0', null);
INSERT INTO `zm_users` VALUES ('2', 'qqf1223@126.com', '96e79218965eb72c92a549dd5a330112', '1', '', 'çº¢çš„è¨è²', '', '1', '1', '1', '0', '0', '0', '0', '0', '1408292762', '0', '0', '0', '0', null);
INSERT INTO `zm_users` VALUES ('3', 'qq@qq.com', 'd41d8cd98f00b204e9800998ecf8427e', '1', '', '', '', '1', '1', '1', '0', '0', '0', '0', '0', '1408377890', '0', '0', '0', '0', null);
INSERT INTO `zm_users` VALUES ('4', 'fsafdsa', '11ddbaf3386aea1f2974eee984542152', '0', '', 'fffffffffffffffffffff', 'fafdsafd', '1', '1', '2', '0', '0', '0', '0', '0', '1408462328', '0', '0', '0', '0', '0');
INSERT INTO `zm_users` VALUES ('5', 'ssssssssssss', '9f6e6800cfae7749eb6c486619254b9c', '0', '', '', 'sssss', '1', '1', '1', '0', '0', '0', '0', '0', '1408462354', '0', '0', '0', '0', '0');
INSERT INTO `zm_users` VALUES ('6', 'dddddddddddd', '50f84daf3a6dfd6a9f20c9f8ef428942', '0', '', 'dddd', 'dddd', '1', '1', '1', '0', '0', '0', '0', '0', '1408462482', '0', '0', '0', '0', '0');
INSERT INTO `zm_users` VALUES ('7', 'qq@qq.com', '96e79218965eb72c92a549dd5a330112', '0', '', 'tank', 'tt', '1', '1', '1', '0', '0', '0', '0', '0', '1408468711', '0', '0', '0', '0', '0');
INSERT INTO `zm_users` VALUES ('8', '', 'd41d8cd98f00b204e9800998ecf8427e', '0', '', '', '', '1', '1', '1', '0', '0', '0', '0', '0', '1408468966', '0', '0', '0', '0', '0');
INSERT INTO `zm_users` VALUES ('9', 'tttt', 'accc9105df5383111407fd5b41255e23', '0', '', 'å”ç”œç”œ', 't', '1', '1', '1', '0', '0', '0', '0', '0', '1408469039', '0', '0', '0', '0', '0');
INSERT INTO `zm_users` VALUES ('10', '4', 'a87ff679a2f3e71d9181a67b7542122c', '0', '', '4', '4', '1', '1', '1', '0', '0', '0', '0', '0', '1408469091', '0', '0', '0', '0', '0');
