
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 04 月 17 日 06:46
-- 服务器版本: 10.1.22-MariaDB
-- PHP 版本: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `u802617760_book`
--

-- --------------------------------------------------------

--
-- 表的结构 `l_books`
--

CREATE TABLE IF NOT EXISTS `l_books` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4138 ;

--
-- 转存表中的数据 `l_books`
--

INSERT INTO `l_books` (`id`, `书名`, `作者`, `封面`, `类别`, `状态`, `点击量`, `格式`, `备注`) VALUES
(1, '1948-1966：“希区柯克症候”', '李洋', '封面01.png', '传记', '未读', 17, 'txt', '/'),
(2, '20世纪的科学怪杰鲍林', '托马斯·哈格', '封面01.png', '传记', '未读', 3, 'txt', ''),
(3, 'borland传奇', '', '封面01.png', '传记', '未读', 3, 'txt', ''),
(4, 'D调的华丽(周杰伦自传)', '周杰伦', '封面01.png', '传记', '未读', 3, 'txt', ''),
(5, 'J.K.罗琳传', '康尼·安·柯克', '封面01.png', '传记', '未读', 2, 'txt', ''),
(6, 'QQ王子马化腾', '俞志荣', '封面01.png', '传记', '未读', 3, 'txt', ''),
(7, '阿加莎·克里斯蒂自传', '阿加莎·克里斯蒂', '封面01.png', '传记', '未读', 3, 'txt', ''),
(8, '阿加莎·克里斯蒂自传', '阿加莎·克里斯蒂', '封面01.png', '传记', '未读', 2, 'txt', ''),
(9, '阿娜伊斯·宁日记', '阿娜伊斯·宁', '封面01.png', '传记', '未读', 3, 'txt', ''),
(10, '阿西莫夫逸闻趣事', '米歇尔·怀特', '封面01.png', '传记', '未读', 3, 'txt', ''),
(11, '阿西莫夫逸闻趣事', '怀特', '封面01.png', '传记', '未读', 3, 'txt', ''),
(12, '埃及艳后', '鲁特维克', '封面01.png', '传记', '未读', 3, 'txt', ''),
(13, '爱就一个字-张信哲的故事', '佚名', '封面01.png', '传记', '未读', 8, 'txt', ''),
(14, '爱因斯坦传', '聂运伟', '封面01.png', '传记', '未读', 3, 'txt', ''),
(15, '安东尼奥·萨马兰奇', '刘平安、刘京胜', '封面01.png', '传记', '未读', 3, 'txt', ''),
(16, '奥威尔传', 'D. J. 泰勒', '封面01.png', '传记', '未读', 3, 'txt', ''),
(17, '澳门赌枭叶汉正传', '', '封面01.png', '传记', '未读', 3, 'txt', ''),
(18, '巴顿最后的岁月', '江永红', '封面01.png', '传记', '未读', 3, 'txt', ''),
(19, '巴金自传', '', '封面01.png', '传记', '未读', 3, 'txt', ''),
(20, '巴金最后23个春秋', '窦应泰', '封面01.png', '传记', '未读', 3, 'txt', ''),
(21, '白宫后代', '佚名', '封面01.png', '传记', '未读', 4, 'txt', ''),
(22, '半生多事', '王蒙', '封面01.png', '传记', '未读', 3, 'txt', ''),
(23, '卑鄙的圣人：曹操', '王晓磊', '封面01.png', '传记', '未读', 3, 'txt', ''),
(24, '悲情曹雪芹', '徐淦生', '封面01.png', '传记', '未读', 4, 'txt', ''),
(25, '北大之父蔡元培', '陈军', '封面01.png', '传记', '未读', 3, 'txt', ''),
(26, '北回归线', '亨利·米勒', '封面01.png', '传记', '未读', 1, 'txt', ''),
(27, '北宋改革思想家－范仲淹', '不详', '封面01.png', '传记', '未读', 0, 'txt', ''),
(28, '贝多芬传', '罗曼·罗兰', '封面01.png', '传记', '未读', 0, 'txt', ''),
(29, '贝多芬传', '', '封面01.png', '传记', '未读', 0, 'txt', ''),
(30, '贝克汉姆与皇马的内幕故事：白天使', '', '封面01.png', '传记', '未读', 0, 'txt', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
