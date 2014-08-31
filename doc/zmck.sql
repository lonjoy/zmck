/*
Navicat MySQL Data Transfer

Source Server         : vhost_192.168.199.129
Source Server Version : 50528
Source Host           : localhost:3306
Source Database       : zmck

Target Server Type    : MYSQL
Target Server Version : 50528
File Encoding         : 65001

Date: 2014-09-01 00:40:20
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
-- Table structure for `zm_forum`
-- ----------------------------
DROP TABLE IF EXISTS `zm_forum`;
CREATE TABLE `zm_forum` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `user_id` int(10) NOT NULL DEFAULT '0',
  `desc` text NOT NULL,
  `pid` int(10) NOT NULL DEFAULT '0',
  `posts` int(10) NOT NULL DEFAULT '0',
  `threads` int(10) NOT NULL DEFAULT '0',
  `listorder` int(10) NOT NULL DEFAULT '0',
  `ctime` int(10) NOT NULL,
  `enable` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_forum
-- ----------------------------
INSERT INTO `zm_forum` VALUES ('2', '业余创业技术圈子', '1', '愿意利用业余时间来参与一些感兴趣的创业 项目原型开发的技术合伙人，可以要求一定 的回报，但不是纯粹为赚钱而要...', '0', '0', '0', '0', '1409483426', '1');
INSERT INTO `zm_forum` VALUES ('3', '业余创业技术圈子', '1', '多撒范德萨', '0', '0', '0', '1', '1409483443', '1');

-- ----------------------------
-- Table structure for `zm_forum_posts`
-- ----------------------------
DROP TABLE IF EXISTS `zm_forum_posts`;
CREATE TABLE `zm_forum_posts` (
  `pid` int(10) NOT NULL AUTO_INCREMENT,
  `fid` int(10) NOT NULL,
  `subject` varchar(80) NOT NULL,
  `author` varchar(15) NOT NULL,
  `author_id` int(10) NOT NULL,
  `ctime` int(10) NOT NULL,
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_forum_posts
-- ----------------------------
INSERT INTO `zm_forum_posts` VALUES ('1', '1', 'dsafdsa', 'dsaf', '2', '0', 'dsaf');

-- ----------------------------
-- Table structure for `zm_forum_threads`
-- ----------------------------
DROP TABLE IF EXISTS `zm_forum_threads`;
CREATE TABLE `zm_forum_threads` (
  `id` int(10) NOT NULL,
  `subject` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_forum_threads
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
INSERT INTO `zm_industries` VALUES ('2', '餐饮', '0');
INSERT INTO `zm_industries` VALUES ('3', '医疗', '0');

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
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '名称',
  `value` text NOT NULL COMMENT '值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_site_settings
-- ----------------------------
INSERT INTO `zm_site_settings` VALUES ('1', 'weibo', 'tt');
INSERT INTO `zm_site_settings` VALUES ('2', 'wexin', '天天');
INSERT INTO `zm_site_settings` VALUES ('3', 'aboutus', '天天唐甜甜');
INSERT INTO `zm_site_settings` VALUES ('4', 'contactus', 'kkk');
INSERT INTO `zm_site_settings` VALUES ('5', 'joinus', '谁打分的萨菲司法所');

-- ----------------------------
-- Table structure for `zm_suggest`
-- ----------------------------
DROP TABLE IF EXISTS `zm_suggest`;
CREATE TABLE `zm_suggest` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL DEFAULT '0',
  `content` text NOT NULL COMMENT '意见内容',
  `ctime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_suggest
-- ----------------------------
INSERT INTO `zm_suggest` VALUES ('2', '0', '\'唐甜甜唐甜甜唐甜甜唐甜甜\'', '1409494507');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_survey
-- ----------------------------
INSERT INTO `zm_survey` VALUES ('6', '和别人争吵起来时，你a', '1409499540', '1', '0');
INSERT INTO `zm_survey` VALUES ('7', '哪种最接近你现在的状态？', '1409499600', '1', '0');
INSERT INTO `zm_survey` VALUES ('8', '你经常关注国内外的创业项目和报道吗？', '1409499653', '1', '0');
INSERT INTO `zm_survey` VALUES ('9', '你认为最阻碍创业者成功的个人因素是什么？', '1409499687', '1', '0');

-- ----------------------------
-- Table structure for `zm_survey_data`
-- ----------------------------
DROP TABLE IF EXISTS `zm_survey_data`;
CREATE TABLE `zm_survey_data` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `ctime` int(10) NOT NULL,
  `ip` char(15) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_survey_data
-- ----------------------------
INSERT INTO `zm_survey_data` VALUES ('1', '1', '1409502921', '', '{\"6\":\"36\"}');

-- ----------------------------
-- Table structure for `zm_survey_options`
-- ----------------------------
DROP TABLE IF EXISTS `zm_survey_options`;
CREATE TABLE `zm_survey_options` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `survey_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_survey_options
-- ----------------------------
INSERT INTO `zm_survey_options` VALUES ('24', '7', '有想法，想找合伙人探讨 ');
INSERT INTO `zm_survey_options` VALUES ('25', '7', '有进展中项目，想找合伙人');
INSERT INTO `zm_survey_options` VALUES ('26', '7', '没有项目，看看有没有靠谱项目参与 ');
INSERT INTO `zm_survey_options` VALUES ('27', '7', '想多交创业朋友 ');
INSERT INTO `zm_survey_options` VALUES ('28', '7', '打酱油路过 ');
INSERT INTO `zm_survey_options` VALUES ('29', '8', '随时关注');
INSERT INTO `zm_survey_options` VALUES ('30', '8', '偶尔关注');
INSERT INTO `zm_survey_options` VALUES ('31', '8', '从不关注 ');
INSERT INTO `zm_survey_options` VALUES ('32', '9', '执行力不强');
INSERT INTO `zm_survey_options` VALUES ('33', '9', '心胸狭窄 ');
INSERT INTO `zm_survey_options` VALUES ('34', '9', '韧性不足 ');
INSERT INTO `zm_survey_options` VALUES ('35', '6', '能够有力的反驳对方');
INSERT INTO `zm_survey_options` VALUES ('36', '6', '常常语无伦次，事后才想起要如何反驳对方，可是已经晚了 ');
INSERT INTO `zm_survey_options` VALUES ('37', '6', ' 能够反驳，但是没有多大的力量 ');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_user_roles
-- ----------------------------
INSERT INTO `zm_user_roles` VALUES ('1', '创始人', '1', '1408376644');
INSERT INTO `zm_user_roles` VALUES ('2', '技术合伙人', '1', '1408376996');
INSERT INTO `zm_user_roles` VALUES ('3', '营销合伙人', '1', '1408377004');
INSERT INTO `zm_user_roles` VALUES ('4', '运营合伙人', '1', '1409487798');
INSERT INTO `zm_user_roles` VALUES ('5', '产品合伙人', '1', '1409487808');
INSERT INTO `zm_user_roles` VALUES ('6', '设计师', '1', '1409487816');
INSERT INTO `zm_user_roles` VALUES ('7', '其他', '1', '1409487821');

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
