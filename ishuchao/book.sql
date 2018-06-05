/*
 Navicat MySQL Data Transfer

 Source Server         : Leo
 Source Server Version : 50635
 Source Host           : localhost
 Source Database       : news

 Target Server Version : 50635
 File Encoding         : utf-8

 Date: 04/09/2017 10:42:37 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `t_feilei`
-- ----------------------------
DROP TABLE IF EXISTS `l_feilei`;
CREATE TABLE `l_feilei` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `类别` varchar(255) NOT NULL,
  `备注` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_feilei`
-- ----------------------------
BEGIN;
INSERT INTO `l_feilei` VALUES ('1','国学','guoxue'),('2','经管','jingguan'),('3','居家','jujia'),
('4','历史','lishi'),('5','外文','waiwen'),('6','文学','wenxue'),('7','小说','xiaoshuo'),
('8','学习','xuexi'),('9','艺体','yiti'),('10','政治','zhengzhi'),('11','哲学','zhexue'),('12','传记','zhuanji');
COMMIT;


-- ----------------------------
--  Table structure for `t_news`
-- ----------------------------
DROP TABLE IF EXISTS `l_books`;
CREATE TABLE `l_books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `书名` varchar(255) NOT NULL,
  `作者` varchar(255) NOT NULL,
  `封面` varchar(255) NOT NULL,
  `类别` varchar(20) NOT NULL,
  `状态` varchar(20) NOT NULL,
  `点击量` int(11) NOT NULL,
  `格式` varchar(20) NOT NULL,
  `备注` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_news`
-- ----------------------------


SET FOREIGN_KEY_CHECKS = 1;
