/*
Navicat MySQL Data Transfer

Source Server         : vhost_192.168.199.129
Source Server Version : 50528
Source Host           : localhost:3306
Source Database       : zmck

Target Server Type    : MYSQL
Target Server Version : 50528
File Encoding         : 65001

Date: 2014-09-24 01:24:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `zm_area`
-- ----------------------------
DROP TABLE IF EXISTS `zm_area`;
CREATE TABLE `zm_area` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL DEFAULT '',
  `parentid` int(10) NOT NULL DEFAULT '0',
  `isdel` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`isdel`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_area
-- ----------------------------
INSERT INTO `zm_area` VALUES ('1', '北京', '0', '0');
INSERT INTO `zm_area` VALUES ('2', '别经', '0', '0');
INSERT INTO `zm_area` VALUES ('3', '广东', '0', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_datacarousels
-- ----------------------------
INSERT INTO `zm_datacarousels` VALUES ('1', 'tt', '1410618412', '0', 'tt');

-- ----------------------------
-- Table structure for `zm_followers`
-- ----------------------------
DROP TABLE IF EXISTS `zm_followers`;
CREATE TABLE `zm_followers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL DEFAULT '0',
  `follower_id` int(10) NOT NULL DEFAULT '0',
  `ctime` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `i_key` (`user_id`,`follower_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_followers
-- ----------------------------
INSERT INTO `zm_followers` VALUES ('1', '11', '1', '1410363810');
INSERT INTO `zm_followers` VALUES ('2', '11', '14', '1410365823');
INSERT INTO `zm_followers` VALUES ('3', '11', '13', '1410365952');
INSERT INTO `zm_followers` VALUES ('4', '15', '11', '1410451132');
INSERT INTO `zm_followers` VALUES ('5', '15', '15', '1410452919');
INSERT INTO `zm_followers` VALUES ('6', '11', '15', '1410701789');
INSERT INTO `zm_followers` VALUES ('7', '11', '2', '1411295863');
INSERT INTO `zm_followers` VALUES ('8', '1', '11', '1411304347');
INSERT INTO `zm_followers` VALUES ('9', '1', '1', '1411305133');

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
INSERT INTO `zm_forum` VALUES ('2', '业余创业技术圈子', '1', '愿意利用业余时间来参与一些感兴趣的创业 项目原型开发的技术合伙人，可以要求一定 的回报，但不是纯粹为赚钱而要...', '0', '8', '0', '0', '1409483426', '1');
INSERT INTO `zm_forum` VALUES ('3', '业余创业技术圈子', '1', '多撒范德萨', '0', '1', '0', '1', '1409483443', '1');

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
  `clicknum` int(10) NOT NULL DEFAULT '0',
  `replynum` int(10) NOT NULL DEFAULT '0',
  `replytime` int(10) NOT NULL DEFAULT '0',
  `jinghua` tinyint(1) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_forum_posts
-- ----------------------------
INSERT INTO `zm_forum_posts` VALUES ('1', '2', 'dsafdsa', 'dsaf', '2', '0', 'dsaf', '1', '0', '0', '0');
INSERT INTO `zm_forum_posts` VALUES ('2', '2', '大的萨菲', '倒萨', '2', '0', '范德萨范德萨', '0', '0', '0', '0');
INSERT INTO `zm_forum_posts` VALUES ('3', '2', '阿发的撒', 'aa', '11', '1410180308', '的萨菲打分', '0', '0', '0', '0');
INSERT INTO `zm_forum_posts` VALUES ('4', '2', '测试', 'aa', '11', '1410180363', '打分打了饭的撒的拉丝粉倒萨a', '0', '0', '0', '0');
INSERT INTO `zm_forum_posts` VALUES ('5', '3', '的萨芬的', 'aa', '11', '1410180411', '的萨芬的', '2', '0', '0', '0');
INSERT INTO `zm_forum_posts` VALUES ('6', '2', '的萨芬的', 'aa', '11', '1410181425', '打分', '0', '0', '0', '0');
INSERT INTO `zm_forum_posts` VALUES ('7', '2', '范德萨发', 'aa', '11', '1410181884', '大师傅', '0', '0', '0', '0');
INSERT INTO `zm_forum_posts` VALUES ('8', '2', '浏览量', 'aa', '11', '1410182966', '大师傅', '0', '0', '0', '0');
INSERT INTO `zm_forum_posts` VALUES ('9', '2', '的萨芬的', 'aa', '11', '1410183013', '多撒范德萨', '0', '0', '0', '0');
INSERT INTO `zm_forum_posts` VALUES ('10', '2', '的萨芬的', 'aa', '11', '1410183046', '多撒范德萨', '0', '0', '0', '0');
INSERT INTO `zm_forum_posts` VALUES ('11', '2', '啦啦啦', 'aa', '11', '1410183133', '打分', '5', '3', '1410190740', '0');
INSERT INTO `zm_forum_posts` VALUES ('12', '2', '222', 'aa', '11', '1410183478', '大幅度', '1', '0', '0', '0');
INSERT INTO `zm_forum_posts` VALUES ('13', '3', 'didi', 'aa', '11', '1410189560', 'diyige ', '21', '0', '0', '0');
INSERT INTO `zm_forum_posts` VALUES ('14', '2', '222', 'aa', '11', '1410190072', 'dasfdfds', '34', '6', '1410450562', '0');
INSERT INTO `zm_forum_posts` VALUES ('15', '2', 'dsafds', '创客-15', '15', '1410450701', 'dsaf', '3', '0', '0', '0');

-- ----------------------------
-- Table structure for `zm_forum_threads`
-- ----------------------------
DROP TABLE IF EXISTS `zm_forum_threads`;
CREATE TABLE `zm_forum_threads` (
  `tid` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL,
  `fid` int(10) NOT NULL,
  `subject` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `ctime` int(10) NOT NULL,
  `author_id` int(10) NOT NULL,
  `author` varchar(50) NOT NULL,
  `floor` int(10) NOT NULL,
  `ismaster` tinyint(1) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_forum_threads
-- ----------------------------
INSERT INTO `zm_forum_threads` VALUES ('1', '0', '2', '的萨芬的', '多撒范德萨', '1410183046', '11', 'aa', '0', '1');
INSERT INTO `zm_forum_threads` VALUES ('2', '11', '2', '啦啦啦', '打分', '1410183133', '11', 'aa', '0', '1');
INSERT INTO `zm_forum_threads` VALUES ('3', '12', '2', '222', '大幅度', '1410183478', '11', 'aa', '0', '1');
INSERT INTO `zm_forum_threads` VALUES ('4', '13', '3', 'didi', 'diyige ', '1410189560', '11', 'aa', '0', '1');
INSERT INTO `zm_forum_threads` VALUES ('5', '14', '2', '222', 'dasfdfds', '1410190072', '11', 'aa', '0', '1');
INSERT INTO `zm_forum_threads` VALUES ('6', '11', '2', '啦啦啦', 'dsafdsaf', '1410190524', '11', 'aa', '0', '0');
INSERT INTO `zm_forum_threads` VALUES ('7', '11', '2', '啦啦啦', 'dasfdsaf', '1410190566', '11', 'aa', '0', '0');
INSERT INTO `zm_forum_threads` VALUES ('8', '11', '2', '啦啦啦', 'dsafdsafdsafd', '1410190740', '11', 'aa', '0', '0');
INSERT INTO `zm_forum_threads` VALUES ('9', '14', '2', '222', 'dsafsdafdsa', '1410283233', '11', 'aa', '0', '0');
INSERT INTO `zm_forum_threads` VALUES ('10', '14', '2', '222', 'xxx', '1410283244', '11', 'aa', '0', '0');
INSERT INTO `zm_forum_threads` VALUES ('11', '14', '2', '222', 'afdsfafdsaf太好了', '1410283348', '11', 'aa', '0', '0');
INSERT INTO `zm_forum_threads` VALUES ('12', '14', '2', '222', '真是太好了', '1410283382', '11', 'aa', '0', '0');
INSERT INTO `zm_forum_threads` VALUES ('13', '14', '2', '222', 'dsafsdaf', '1410359882', '11', 'aa', '0', '0');
INSERT INTO `zm_forum_threads` VALUES ('14', '14', '2', '222', 'dsafsda', '1410450562', '15', '创客-15', '0', '0');
INSERT INTO `zm_forum_threads` VALUES ('15', '15', '2', 'dsafds', 'dsaf', '1410450701', '15', '创客-15', '0', '1');

-- ----------------------------
-- Table structure for `zm_industries`
-- ----------------------------
DROP TABLE IF EXISTS `zm_industries`;
CREATE TABLE `zm_industries` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `isdel` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_industries
-- ----------------------------
INSERT INTO `zm_industries` VALUES ('1', '44444444444444', '0');
INSERT INTO `zm_industries` VALUES ('2', '餐饮', '0');
INSERT INTO `zm_industries` VALUES ('3', '的萨菲', '0');
INSERT INTO `zm_industries` VALUES ('4', '阿什顿', '0');
INSERT INTO `zm_industries` VALUES ('5', '天天', '0');

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
INSERT INTO `zm_site_settings` VALUES ('1', 'weibo', 'http://weibo.com/sitrn');
INSERT INTO `zm_site_settings` VALUES ('2', 'wexin', 'http://weibo.com/sitrn');
INSERT INTO `zm_site_settings` VALUES ('3', 'aboutus', '      联招网是北京联招教育文化有限公司旗下的品牌网站，是国内领先的教育招生咨询类服务平台，努力打 造成为中国最权威、专业、实效的教育招生咨询和课程学习网络平台。联招网以\"服务需求、服务学生、服务 机构\"为宗旨，为求学者提供最适合的好学校、好专业和好课程，先行赔付的协议保障，做到省心、省时、省 力、省钱！ \"联招在手，求学无忧\"。\r\n\r\n\r\n        北京联招教育文化有限公司（\"联招教育\"），创立于2002年，是一家从事教育招生信息咨询服务的专业 机构。公司是国内最早建立教育咨询连锁机构的领跑者，至2006年在全国建立了近800家连锁加盟咨询中心， 为几十万学生和求学者提供了优质招生咨询和报名服务。2014年全新改版\"联招网\"，打造成招生咨询和课程 学习o2o服务平台，中国教育招生类下一个\"携程\"。');
INSERT INTO `zm_site_settings` VALUES ('4', 'contactus', '        联招网是北京联招教育文化有限公司旗下的品牌网站，是国内领先的教育招生咨询类服务平台，努力打 造成为中国最权威、专业、实效的教育招生咨询和课程学习网络平台。联招网以\"服务需求、服务学生、服务 机构\"为宗旨，为求学者提供最适合的好学校、好专业和好课程，先行赔付的协议保障，做到省心、省时、省 力、省钱！ \"联招在手，求学无忧\"。\r\n        北京联招教育文化有限公司（\"联招教育\"），创立于2002年，是一家从事教育招生信息咨询服务的专业 机构。公司是国内最早建立教育咨询连锁机构的领跑者，至2006年在全国建立了近800家连锁加盟咨询中心， 为几十万学生和求学者提供了优质招生咨询和报名服务。2014年全新改版\"联招网\"，打造成招生咨询和课程 学习o2o服务平台，中国教育招生类下一个\"携程\"。');
INSERT INTO `zm_site_settings` VALUES ('5', 'joinus', '      联招网是北京联招教育文化有限公司旗下的品牌网站，是国内领先的教育招生咨询类服务平台，努力打 造成为中国最权威、专业、实效的教育招生咨询和课程学习网络平台。联招网以\"服务需求、服务学生、服务 机构\"为宗旨，为求学者提供最适合的好学校、好专业和好课程，先行赔付的协议保障，做到省心、省时、省 力、省钱！ \"联招在手，求学无忧\"。\r\n        北京联招教育文化有限公司（\"联招教育\"），创立于2002年，是一家从事教育招生信息咨询服务的专业 机构。公司是国内最早建立教育咨询连锁机构的领跑者，至2006年在全国建立了近800家连锁加盟咨询中心， 为几十万学生和求学者提供了优质招生咨询和报名服务。2014年全新改版\"联招网\"，打造成招生咨询和课程 学习o2o服务平台，中国教育招生类下一个\"携程\"。');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_suggest
-- ----------------------------
INSERT INTO `zm_suggest` VALUES ('2', '0', '\'唐甜甜唐甜甜唐甜甜唐甜甜\'', '1409494507');
INSERT INTO `zm_suggest` VALUES ('4', '0', 'rrrrrrrrrrrrrrrrrrrrrrrrrrr', '1409837852');
INSERT INTO `zm_suggest` VALUES ('5', '0', 'rrrrrrrrrrrrrrrrrrrrrrrrrrr', '1409837866');
INSERT INTO `zm_suggest` VALUES ('6', '0', 'rrrr', '1409837909');
INSERT INTO `zm_suggest` VALUES ('7', '0', 'kjkkk', '1410107173');
INSERT INTO `zm_suggest` VALUES ('8', '0', '', '1410154328');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_survey_data
-- ----------------------------
INSERT INTO `zm_survey_data` VALUES ('1', '1', '1409502921', '', '{\"6\":\"36\"}');
INSERT INTO `zm_survey_data` VALUES ('2', '11', '1410098766', '', '{\"7\":\"26\",\"6\":\"36\",\"8\":\"29\",\"9\":\"33\"}');

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
-- Table structure for `zm_sys_message`
-- ----------------------------
DROP TABLE IF EXISTS `zm_sys_message`;
CREATE TABLE `zm_sys_message` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `ctime` int(10) NOT NULL,
  `uptime` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_sys_message
-- ----------------------------
INSERT INTO `zm_sys_message` VALUES ('1', '您好，看到您的项目，请问可以了解下吗？', '0ttttttttttttttttttttt', '1410973228', '0');

-- ----------------------------
-- Table structure for `zm_system_tags`
-- ----------------------------
DROP TABLE IF EXISTS `zm_system_tags`;
CREATE TABLE `zm_system_tags` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `enable` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_system_tags
-- ----------------------------
INSERT INTO `zm_system_tags` VALUES ('1', '啊啊333', '0');
INSERT INTO `zm_system_tags` VALUES ('2', '天天', '0');

-- ----------------------------
-- Table structure for `zm_user_details`
-- ----------------------------
DROP TABLE IF EXISTS `zm_user_details`;
CREATE TABLE `zm_user_details` (
  `user_id` int(10) NOT NULL,
  `industry_id` int(10) NOT NULL,
  `intro` text NOT NULL,
  `study_experience` text NOT NULL,
  `work_experience` text NOT NULL,
  `ctime` int(10) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_user_details
-- ----------------------------
INSERT INTO `zm_user_details` VALUES ('11', '1', '    5年开发经验，软硬通吃，熟悉单片机开发、OpenWRT系统移植修改、Android开发、Java和PHP服务器开发，有一定的运营管理经验。曾经带领原\r\n    公司团队完成中国移动手机二维码客户端的开发、华为手机定制阅读客户端；\r\n    公司是中国移动手机二维码、咪咕音乐的官方合作伙伴。', 'asdfdsafd', '创业经验 多次 有回报\r\n\r\n创业资金 原大力投资\r\n\r\n投入时间 全部时间参与创业\r\n\r\n创业地点 我所在的城市', '1410071849');
INSERT INTO `zm_user_details` VALUES ('13', '0', '的萨菲大', '的萨芬的萨菲', '撒旦飞达撒\r\n<script>alert(111);</script>', '1410017349');
INSERT INTO `zm_user_details` VALUES ('16', '3', '多撒范德萨', '的萨菲大4444444444444', '的撒发大水法的', '1411489188');

-- ----------------------------
-- Table structure for `zm_user_interview`
-- ----------------------------
DROP TABLE IF EXISTS `zm_user_interview`;
CREATE TABLE `zm_user_interview` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `fromuser_id` int(10) NOT NULL,
  `touser_id` int(10) NOT NULL,
  `message` varchar(500) NOT NULL,
  `ctime` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `i_id` (`fromuser_id`,`touser_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_user_interview
-- ----------------------------
INSERT INTO `zm_user_interview` VALUES ('1', '11', '15', 'dsafdsafdsa', '1410703574');
INSERT INTO `zm_user_interview` VALUES ('2', '11', '15', '您好！我这有个项目找PHP技术合伙人，不知道有 没有兴趣聊下', '1410705073');
INSERT INTO `zm_user_interview` VALUES ('3', '11', '15', '您好！我这有个项目找PHP技术合伙人，不知道有 没有兴趣聊下。', '1410705139');
INSERT INTO `zm_user_interview` VALUES ('4', '11', '15', '您好！我这有个项目找PHP技术合伙人，不知道有 没有兴趣聊下。', '1410705142');
INSERT INTO `zm_user_interview` VALUES ('5', '11', '15', '您好！我这有个项目找PHP技术合伙人，不知道有 没有兴趣聊下。', '1410705147');
INSERT INTO `zm_user_interview` VALUES ('6', '15', '11', '好的哦', '1410707595');
INSERT INTO `zm_user_interview` VALUES ('7', '11', '14', '多撒范德萨', '1410709688');
INSERT INTO `zm_user_interview` VALUES ('8', '11', '14', '多撒范德萨', '1410709692');
INSERT INTO `zm_user_interview` VALUES ('9', '11', '14', '天天', '1410709723');
INSERT INTO `zm_user_interview` VALUES ('10', '11', '1', '打分', '1410710958');
INSERT INTO `zm_user_interview` VALUES ('11', '11', '1', 'dsafd', '1410969257');
INSERT INTO `zm_user_interview` VALUES ('12', '11', '1', '您好', '1410969268');
INSERT INTO `zm_user_interview` VALUES ('13', '1', '10', 'tt', '1410971374');
INSERT INTO `zm_user_interview` VALUES ('14', '1', '11', 'dasf', '1410971875');
INSERT INTO `zm_user_interview` VALUES ('15', '1', '11', 'da', '1410971882');
INSERT INTO `zm_user_interview` VALUES ('16', '1', '11', 'dsadfd', '1410971940');
INSERT INTO `zm_user_interview` VALUES ('17', '11', '1', 'dsaf', '1411295970');

-- ----------------------------
-- Table structure for `zm_user_profiles`
-- ----------------------------
DROP TABLE IF EXISTS `zm_user_profiles`;
CREATE TABLE `zm_user_profiles` (
  `user_id` int(10) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` tinyint(2) NOT NULL DEFAULT '0',
  `agerange` tinyint(3) NOT NULL DEFAULT '0',
  `workyears` tinyint(3) NOT NULL,
  `role` tinyint(3) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_user_profiles
-- ----------------------------
INSERT INTO `zm_user_profiles` VALUES ('1', '\'aa\'', 'aatt', '0', '1', '0', '1');
INSERT INTO `zm_user_profiles` VALUES ('11', '太阳神', 'dsafds', '2', '2', '2', '1');
INSERT INTO `zm_user_profiles` VALUES ('15', '创客-15', 'da', '0', '0', '0', '1');
INSERT INTO `zm_user_profiles` VALUES ('16', '好看', '美女4', '2', '2', '1', '1');

-- ----------------------------
-- Table structure for `zm_user_project`
-- ----------------------------
DROP TABLE IF EXISTS `zm_user_project`;
CREATE TABLE `zm_user_project` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `logo` varchar(500) NOT NULL,
  `direction` int(10) NOT NULL COMMENT 'fangxiang',
  `stage` tinyint(3) NOT NULL,
  `brief` text NOT NULL,
  `teamstatus` text NOT NULL,
  `investstatus` tinyint(3) NOT NULL,
  `needpartner` int(10) NOT NULL,
  `partnerduty` text NOT NULL,
  `cooperation` tinyint(3) NOT NULL,
  `return` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `i_uid` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_user_project
-- ----------------------------

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
  `user_id` int(10) NOT NULL,
  `tags` varchar(500) NOT NULL DEFAULT '',
  `systemtag` varchar(500) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`),
  KEY `i_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_user_tags
-- ----------------------------
INSERT INTO `zm_user_tags` VALUES ('11', 'a:1:{i:0;s:2:\"gg\";}', '');
INSERT INTO `zm_user_tags` VALUES ('15', 'a:4:{i:0;s:4:\"dsaf\";i:1;s:5:\"dsafd\";i:2;s:7:\"dsafdsa\";i:3;s:6:\"asdfsa\";}', '');

-- ----------------------------
-- Table structure for `zm_users`
-- ----------------------------
DROP TABLE IF EXISTS `zm_users`;
CREATE TABLE `zm_users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL DEFAULT '',
  `baseinfo` tinyint(3) NOT NULL,
  `industry` smallint(8) NOT NULL DEFAULT '0',
  `level` tinyint(3) NOT NULL COMMENT '用户等级',
  `vip` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'VIP',
  `xintai` tinyint(2) NOT NULL DEFAULT '0',
  `nowstatus` int(10) NOT NULL DEFAULT '0' COMMENT '目前状态',
  `regip` varchar(50) NOT NULL DEFAULT '0',
  `regtime` int(10) NOT NULL DEFAULT '0',
  `lastlogintime` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `online` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否在线',
  `workyears` tinyint(2) NOT NULL DEFAULT '0',
  `agerange` tinyint(2) NOT NULL DEFAULT '0',
  `nickname` varchar(50) NOT NULL DEFAULT '',
  `role` tinyint(2) NOT NULL DEFAULT '0',
  `area` tinyint(3) NOT NULL DEFAULT '0',
  `province` tinyint(3) NOT NULL DEFAULT '0',
  `city` tinyint(3) NOT NULL DEFAULT '0',
  `startupMoney` tinyint(3) NOT NULL DEFAULT '0' COMMENT '创业资金',
  `startupExperience` tinyint(3) NOT NULL DEFAULT '0' COMMENT '创业经验',
  `spenttime` tinyint(3) NOT NULL,
  `startupArea` tinyint(3) NOT NULL,
  `companyauth` tinyint(1) NOT NULL DEFAULT '0' COMMENT '企业是否认证',
  `recommend` tinyint(1) NOT NULL DEFAULT '0',
  `homeshow` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zm_users
-- ----------------------------
INSERT INTO `zm_users` VALUES ('1', 'qq@qq.com', '96e79218965eb72c92a549dd5a330112', '1', '0', '0', '0', '1', '1', '0', '1408292240', '0', '0', '0', '0', '1', '\'aa\'', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `zm_users` VALUES ('2', 'qqf1223@126.com', '96e79218965eb72c92a549dd5a330112', '1', '0', '0', '0', '0', '0', '0', '1408292762', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `zm_users` VALUES ('3', 'qq@qq.com', 'd41d8cd98f00b204e9800998ecf8427e', '1', '0', '0', '0', '0', '0', '0', '1408377890', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `zm_users` VALUES ('4', 'fsafdsa', '11ddbaf3386aea1f2974eee984542152', '1', '0', '0', '0', '0', '0', '0', '1408462328', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `zm_users` VALUES ('5', 'ssssssssssss', '9f6e6800cfae7749eb6c486619254b9c', '1', '0', '0', '0', '0', '0', '0', '1408462354', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `zm_users` VALUES ('6', 'dddddddddddd', '50f84daf3a6dfd6a9f20c9f8ef428942', '1', '0', '0', '0', '0', '0', '0', '1408462482', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `zm_users` VALUES ('7', 'qq@qq.com', '96e79218965eb72c92a549dd5a330112', '1', '0', '0', '0', '0', '0', '0', '1408468711', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `zm_users` VALUES ('8', '', 'd41d8cd98f00b204e9800998ecf8427e', '1', '0', '0', '0', '0', '0', '0', '1408468966', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `zm_users` VALUES ('9', 'tttt', 'accc9105df5383111407fd5b41255e23', '1', '0', '0', '0', '0', '0', '0', '1408469039', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `zm_users` VALUES ('10', '4', 'a87ff679a2f3e71d9181a67b7542122c', '1', '0', '0', '0', '0', '0', '0', '1408469091', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `zm_users` VALUES ('11', 'aa@aa.com', 'e3ceb5881a0a1fdaad01296d7554868d', '5', '0', '0', '0', '2', '6', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '5', '1', '1', '2', '0', '0', '0');
INSERT INTO `zm_users` VALUES ('12', 'bb@bb.com', '96e79218965eb72c92a549dd5a330112', '0', '0', '0', '0', '2', '0', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `zm_users` VALUES ('13', 'cc@cc.com', '96e79218965eb72c92a549dd5a330112', '6', '0', '0', '0', '2', '0', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `zm_users` VALUES ('14', 'qqf1223@qq.com', '96e79218965eb72c92a549dd5a330112', '0', '0', '0', '0', '2', '0', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `zm_users` VALUES ('15', 'aaa@aaa.com', '96e79218965eb72c92a549dd5a330112', '0', '0', '0', '0', '2', '0', '0', '0', '0', '0', '0', '0', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `zm_users` VALUES ('16', 'test@test.com4', '96e79218965eb72c92a549dd5a330112', '0', '0', '0', '0', '1', '6', '0', '1411489188', '0', '0', '0', '1', '2', '好看', '1', '0', '0', '0', '2', '2', '3', '1', '0', '0', '0');
