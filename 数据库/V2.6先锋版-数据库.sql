-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2019-04-24 11:56:29
-- 服务器版本： 5.5.57-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qwys_mao2234_cn`
--

-- --------------------------------------------------------

--
-- 表的结构 `ap_adduser`
--

CREATE TABLE IF NOT EXISTS `ap_adduser` (
  `uid` int(11) DEFAULT NULL,
  `ctime` int(11) DEFAULT NULL,
  `time` char(10) DEFAULT NULL,
  `lasttime` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ap_advert`
--

CREATE TABLE IF NOT EXISTS `ap_advert` (
  `id` int(1) NOT NULL,
  `content` text
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ap_advert`
--

INSERT INTO `ap_advert` (`id`, `content`) VALUES
(1, '代理无限充值点数'),
(2, NULL),
(3, NULL),
(4, '10'),
(5, '525600'),
(6, NULL),
(7, '如播放失败请更换线路app已经升级'),
(8, 'http://959495.xyz/yjx/?url='),
(9, 'http://yjx.mao2234.cn/?url='),
(10, 'https://vip16.ooosoo.com/jx/?url='),
(11, 'http://jqaaa.com/jx.php?url='),
(12, 'https://jx.zhirong8.com/z8/?url='),
(13, 'https://xz.lexiang58.com/ceshi/index.php?url='),
(14, 'https://xz.lexiang58.com/ceshi/index.php?url='),
(15, 'https://kx28.com/vip/index.php?url='),
(16, 'https://xz.lexiang58.com/ceshi/index.php?url='),
(17, NULL),
(20, '欣然影视'),
(21, NULL),
(22, NULL),
(23, NULL),
(27, NULL),
(28, NULL),
(29, NULL),
(30, NULL),
(31, NULL),
(32, NULL),
(33, NULL),
(34, NULL),
(35, NULL),
(36, NULL),
(37, NULL),
(38, NULL),
(39, NULL),
(40, NULL),
(41, NULL),
(42, NULL),
(43, NULL),
(44, NULL),
(45, NULL),
(46, NULL),
(47, NULL),
(48, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `ap_app`
--

CREATE TABLE IF NOT EXISTS `ap_app` (
  `id` int(1) NOT NULL DEFAULT '0',
  `content` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ap_banner`
--

CREATE TABLE IF NOT EXISTS `ap_banner` (
  `id` int(11) NOT NULL,
  `uid` int(10) NOT NULL DEFAULT '1',
  `cid` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `linkurl` varchar(255) DEFAULT NULL,
  `picurl` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `del` int(11) DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=243 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ap_banner`
--

INSERT INTO `ap_banner` (`id`, `uid`, `cid`, `name`, `content`, `linkurl`, `picurl`, `sort`, `del`) VALUES
(138, 1, 2, '爱奇艺', '', 'https://m.iqiyi.com/vip', '/public/uploads/20181122/8554720d40d122db235315c576a5f4bb.png', 1, 1),
(139, 1, 2, '腾讯视频', '', 'https://m.v.qq.com/', '/public/uploads/20181122/82be1204995164e0ad5fb50ef6b740fe.png', 2, 1),
(140, 1, 2, '优酷视频', '', 'http://youku.com/', '/public/uploads/20190210/3abbfe8802d49608ae7a1369cca83009.jpg', 3, 1),
(141, 1, 2, '搜狐视频', '', 'https://m.tv.sohu.com/film', '/public/uploads/20190210/989948316315d9b5799960daab1262f0.jpg', 5, 1),
(142, 1, 2, 'PPTV', '', 'http://m.pptv.com', '/public/uploads/20181122/d4928b7e104b03723c2bf7ce016302b3.jpg', 6, 1),
(143, 1, 2, '芒果视频', '', 'https://m.mgtv.com/channel/979', '/public/uploads/20181122/915e8e3357dc6d330536ff306394beb7.jpg', 4, 1),
(144, 1, 2, 'M1905', '', 'http://vip.1905.com', '/public/uploads/20181122/f3813ea271a5957913f4fa2a53062bef.jpg', 7, 1),
(145, 1, 2, '综合影院', '', 'http://v.sigu.me/', '/public/uploads/20181122/c7fd2ac210cb732ce2b69466755e8d17.jpg', 11, 1),
(146, 1, 2, '乐视视频', '', 'https://m.le.com/vip', '/public/uploads/20181122/b3d8fc8780c0a4f4d7831e25ce6db009.png', 9, 1),
(147, 1, 2, '哔哩哔哩', '', 'https://m.bilibili.com', '/public/uploads/20181122/a4f65b7dd76017e6a2537e8dab3701a5.jpg', 10, 1),
(154, 1, 4, '漫画', '在线漫画', 'http://www.buka.cn', '/public/uploads/20190210/2ae26eecdfc63869d0e4521fc8712bf5.jpg', 0, 1),
(155, 1, 4, '体育直播', 'yy体育', 'http://www.yy.com/sport', '/public/uploads/20190210/67e6ac3227bccc48d56173223e042633.jpg', 1, 1),
(156, 1, 4, '美女直播', '在线直播', 'https://www.6.cn/', '/public/uploads/20190210/6975cae6ceda3fae840c35c3722b417c.png', 0, 1),
(157, 1, 4, '新闻在线', '新闻快线', 'http://www.huanqiu.com/', '/public/uploads/20190210/ea4eb0acf5763ab2132e4d93edfb871e.jpg', 0, 1),
(184, 1, 2, '咪咕视频', '', 'http://m.miguvideo.com/wap/resource/migu/miguH5/index.jsp', '/public/uploads/20181122/02a8c7db557042b4831b326f7459d359.png', 8, 1),
(229, 1, 2, '9.9包邮', '', 'http://tao.6lite.cn', '/public/uploads/20190306/010660e0985cde3bfc083eb82b521852.png', 12, 1),
(230, 1, 1, '', '', 'http://tao.6lite.cn', '/public/uploads/20190306/1b9fbdc1564eb273d0bcc0d01cc466d9.jpg', 0, 1),
(231, 1, 3, '', '', 'http://tao.6lite.cn', '/public/uploads/20190306/217052e26b4f7fc981fc441e1637ac6d.jpg', 0, 1),
(232, 1, 5, '', '', 'http://tao.6lite.cn', '/public/uploads/20190306/6f441798efc8ca0368445e65cbe1a7c7.jpg', 0, 1),
(233, 1, 6, '优惠券', '', 'http://tao.6lite.cn', '/public/uploads/20190306/5b981821e5b345c8274d06294b4bcb04.png', 0, 1),
(234, 1, 6, '女装', '', 'http://tao.6lite.cn', '/public/uploads/20190306/fc542df537461cb77668e627b85ca144.jpg', 0, 1),
(235, 1, 6, '美妆', '', 'http://tao.6lite.cn', '/public/uploads/20190306/f7e925559649bef4ce0ef8ccbf3aaa4b.jpg', 0, 1),
(236, 1, 6, '饰品', '', 'http://tao.6lite.cn', '/public/uploads/20190306/ccd28e9ec22dde8040a18cbb19ab3a6b.jpg', 0, 1),
(237, 1, 6, '内衣', '', 'http://tao.6lite.cn', '/public/uploads/20190306/1ce053e30399a9bc57ca400765adce9b.jpg', 0, 1),
(238, 1, 6, '鞋品', '', 'http://tao.6lite.cn', '/public/uploads/20190306/30d80c8026afd4b20183a1fbb618620f.jpg', 0, 1),
(239, 1, 6, '外套', '', 'http://tao.6lite.cn', '/public/uploads/20190306/2464338934bc177e69048d0376ec89e5.jpg', 0, 1),
(240, 1, 6, '美食', '', 'http://tao.6lite.cn', '/public/uploads/20190306/e73d68ea145bd8b179b0e20182b7ad45.jpg', 0, 1),
(241, 1, 7, '', '', 'http://tao.6lite.cn', '/public/uploads/20190306/7fe6e2a88ead4252708bcdc605e1ef39.jpg', 0, 1),
(242, 1, 8, '', '', 'http://tao.6lite.cn', '/public/uploads/20190306/98631ec1c28376dc71b289f2a26f3a1f.png', 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `ap_category`
--

CREATE TABLE IF NOT EXISTS `ap_category` (
  `id` int(11) NOT NULL,
  `cname` varchar(100) DEFAULT NULL COMMENT '类名'
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ap_category`
--

INSERT INTO `ap_category` (`id`, `cname`) VALUES
(1, '首页轮播图'),
(2, 'VIP观影区'),
(3, '首页底部广告图'),
(4, '首页底部图标'),
(5, '福利社轮播图'),
(6, '福利社图标'),
(7, '福利社底部广告'),
(8, '首页右上角'),
(12, '首页文字链接');

-- --------------------------------------------------------

--
-- 表的结构 `ap_count`
--

CREATE TABLE IF NOT EXISTS `ap_count` (
  `day` varchar(50) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `count` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ap_count`
--

INSERT INTO `ap_count` (`day`, `ip`, `count`) VALUES
('2019-03-11', '115.53.180.247', 1),
('2019-03-11', '61.158.152.248', 2),
('2019-03-20', '36.4.233.223', 1),
('2019-04-23', '42.238.93.70', 1),
('2019-04-23', '218.204.252.35', 1);

-- --------------------------------------------------------

--
-- 表的结构 `ap_dianka`
--

CREATE TABLE IF NOT EXISTS `ap_dianka` (
  `id` int(11) NOT NULL,
  `dianka` varchar(255) NOT NULL,
  `uid` int(11) NOT NULL,
  `ctime` int(11) NOT NULL,
  `y` int(1) NOT NULL,
  `yid` int(1) DEFAULT NULL,
  `time` int(11) NOT NULL,
  `type` int(1) NOT NULL,
  `name` varchar(255) NOT NULL,
  `stime` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ap_dianka`
--

INSERT INTO `ap_dianka` (`id`, `dianka`, `uid`, `ctime`, `y`, `yid`, `time`, `type`, `name`, `stime`) VALUES
(1, '9586c2', 1, 1553059674, 1, 5, 604800, 0, '体验卡', 1553059760);

-- --------------------------------------------------------

--
-- 表的结构 `ap_fxtb`
--

CREATE TABLE IF NOT EXISTS `ap_fxtb` (
  `id` int(11) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `linkurl` varchar(255) DEFAULT NULL,
  `picurl` varchar(255) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ap_fxtb`
--

INSERT INTO `ap_fxtb` (`id`, `content`, `linkurl`, `picurl`) VALUES
(29, '福利社', '', '/public/uploads/20180620/521375bc14e5db6b112a2ff7ce3258aa.jpg'),
(30, '优惠券', '', '/public/uploads/20180620/a0e083dfddc7e1ab6747cd59b2110e05.jpg'),
(31, '小说', '', '/public/uploads/20180620/5d3c2988aecfb32015ec968acb2c035a.jpg'),
(32, '抓娃娃', '', '/public/uploads/20180620/ce0fa1701a9467603666792e8e7308ee.png'),
(33, '美女直播', '', '/public/uploads/20180620/94c32676266e76c694e7553be124c0d4.jpg'),
(34, '搞笑段子', '', '/public/uploads/20180620/81cd47d437d2e4599b1dd5dbd92e2bdf.jpg'),
(35, '新闻', 'https://xw.qq.com/', '/public/uploads/20180620/ab0f37043dad570c5685a50c1fb105e8.jpg'),
(37, '看呀影视', 'https://v.qq.com', '/public/uploads/20180722/5bc5909f50c700de52ce99959804757c.png');

-- --------------------------------------------------------

--
-- 表的结构 `ap_jilu`
--

CREATE TABLE IF NOT EXISTS `ap_jilu` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `time` varchar(255) NOT NULL,
  `ping` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ap_jilu`
--

INSERT INTO `ap_jilu` (`id`, `uid`, `title`, `url`, `time`, `ping`) VALUES
(1, 2, '天衣无缝第1集-电视剧-高清正版视频-爱奇艺', 'https://m.iqiyi.com/v_19rqql3swk.html', '1552310133', '爱奇艺'),
(2, 3, '海王', 'https://m.v.qq.com/play.html?cid=l8r3gm1zzu5u3nk', '1552316967', '腾讯'),
(3, 3, '斗罗大陆 第42集', 'https://m.v.qq.com/x/cover/m/m441e3rjq9kwpsc.html?vid=p0030dxx286', '1552317045', '腾讯'),
(4, 3, '都挺好第2集-电视剧-高清正版视频-爱奇艺', 'https://m.iqiyi.com/v_19rquh3le0.html#vfrm=30-26-15-7', '1552317371', '爱奇艺'),
(5, 1, '飞驰人生', 'https://m.v.qq.com/x/cover/8/8kw2uo89elwb7as.html', '1555910862', '腾讯'),
(6, 6, '封神演义 01', 'https://m.youku.com/video/id_e3ff62e88ea111e5b692.html?spm=a2hww.12518357.homeDrawer5.4', '1556010350', '优酷'),
(7, 6, '万妖国', 'https://m.youku.com/video/id_1defbfbd4aefbfbd037c.html?spm=a2hww.12518357.homeDrawer2.5', '1556042025', '优酷'),
(8, 6, '封神演义 第01集', 'https://m.v.qq.com/play.html?cid=71ielauv44ray7v', '1556042294', '腾讯'),
(9, 6, '猎枭行动', 'https://m.v.qq.com/x/cover/o/oiogxwmjbwf204z.html', '1556045049', '腾讯');

-- --------------------------------------------------------

--
-- 表的结构 `ap_kai`
--

CREATE TABLE IF NOT EXISTS `ap_kai` (
  `uid` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `ctime` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ap_kai`
--

INSERT INTO `ap_kai` (`uid`, `cid`, `ctime`) VALUES
(1, 2, 1552311350);

-- --------------------------------------------------------

--
-- 表的结构 `ap_kamifx`
--

CREATE TABLE IF NOT EXISTS `ap_kamifx` (
  `id` int(10) NOT NULL,
  `qitian` decimal(11,3) NOT NULL,
  `yigeyue` decimal(11,3) NOT NULL,
  `sangeyue` decimal(11,3) NOT NULL,
  `liugeyue` decimal(11,3) NOT NULL,
  `yinian` decimal(11,3) NOT NULL,
  `yongjiu` decimal(11,3) NOT NULL,
  `miaoshu` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ap_kamifx`
--

INSERT INTO `ap_kamifx` (`id`, `qitian`, `yigeyue`, `sangeyue`, `liugeyue`, `yinian`, `yongjiu`, `miaoshu`) VALUES
(1, '0.5000', '1.000', '1.5000', '2.5000', '4.000', '5.5000', '这是提卡价格'),
(2, '0.1000', '0.2000', '0.3000', '0.5000', '1.000', '1.5000', '这是代理一级提成金额'),
(3, '0.1000', '0.2000', '0.3000', '0.5000', '1.000', '1.5000', '这是代理二级提成金额'),
(4, '0.1000', '0.2000', '0.3000', '0.5000', '1.000', '1.5000', '这是代理三级提成金额'),
(5, '0.1000', '0.2000', '0.3000', '0.5000', '1.000', '1.5000', '这是合伙人一级提成金额'),
(6, '0.1000', '0.2000', '0.3000', '0.5000', '1.000', '1.5000', '这是合伙人二级提成金额'),
(7, '0.1000', '0.2000', '0.3000', '0.5000', '1.000', '1.5000', '这是合伙人三级提成金额');

-- --------------------------------------------------------

--
-- 表的结构 `ap_login_code`
--

CREATE TABLE IF NOT EXISTS `ap_login_code` (
  `uid` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `client_id` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ap_mn`
--

CREATE TABLE IF NOT EXISTS `ap_mn` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` text,
  `img` text
) ENGINE=MyISAM AUTO_INCREMENT=426 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ap_mn`
--

INSERT INTO `ap_mn` (`id`, `title`, `url`, `img`) VALUES
(422, '喜剧之王', 'https://gncdn3.jongta.com:666/2019/02/07/Tzd4aOYcA6quL1Sv/playlist.m3u8', 'http://pic.douban888.com/upload/vod/2019-02-06/15494143060.jpg'),
(423, '死侍2', 'https://doubanzyv1.tyswmp.com/2018/07/26/0vhyINWfXeWIkrJd/playlist.m3u8', 'http://pic.douban888.com/upload/vod/2019-01-17/154766124017.jpg'),
(424, '飞驰人生', 'https://gncdn3.jongta.com:666/2019/02/07/8RjIRI9bcfsgDrZq/playlist.m3u8', 'http://pic.douban888.com/upload/vod/2019-02-07/15495099579.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `ap_moneylog`
--

CREATE TABLE IF NOT EXISTS `ap_moneylog` (
  `uid` int(11) NOT NULL,
  `money` decimal(11,2) NOT NULL,
  `cid` int(11) NOT NULL,
  `ctime` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ap_money_get`
--

CREATE TABLE IF NOT EXISTS `ap_money_get` (
  `id` int(11) NOT NULL,
  `type` varchar(20) DEFAULT NULL COMMENT '反钱 级别 1 2  3',
  `u_id` int(11) DEFAULT NULL COMMENT '充值代理的用户',
  `get_u_id` int(11) DEFAULT NULL COMMENT '得到钱的用户id',
  `create_time` int(11) DEFAULT NULL COMMENT '反钱的时间',
  `money` int(11) DEFAULT NULL COMMENT '反钱的金额',
  `order_id` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ap_opentj`
--

CREATE TABLE IF NOT EXISTS `ap_opentj` (
  `id` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `time` varchar(100) NOT NULL,
  `os` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ap_pass_log`
--

CREATE TABLE IF NOT EXISTS `ap_pass_log` (
  `ip` varchar(50) NOT NULL,
  `ctime` int(11) NOT NULL,
  `uid` varchar(11) NOT NULL,
  `old_pass` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `aid` int(11) NOT NULL,
  `web` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ap_pass_log`
--

INSERT INTO `ap_pass_log` (`ip`, `ctime`, `uid`, `old_pass`, `pass`, `aid`, `web`) VALUES
('115.53.180.247', 1552309619, '1', '3ac2cc73701a872cd490ae789a4c6bed', '0c7540eb7e65b553ec1ba6b20de79608', 1, 0),
('115.53.180.247', 1552311298, '1', '0c7540eb7e65b553ec1ba6b20de79608', '3ac2cc73701a872cd490ae789a4c6bed', 1, 0),
('115.53.180.247', 1552311350, '2', '3ac2cc73701a872cd490ae789a4c6bed', 'c78b6663d47cfbdb4d65ea51c104044e', 1, 0),
('36.4.233.223', 1553059249, '1', '9e9b3dc0c51b947094f22265d6a12871', 'd93a5def7511da3d0f2d171d9c344e91', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ap_pay`
--

CREATE TABLE IF NOT EXISTS `ap_pay` (
  `id` int(11) NOT NULL,
  `outtrade` varchar(200) NOT NULL,
  `trade` varchar(200) NOT NULL,
  `type` char(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `money` decimal(11,2) NOT NULL,
  `trade_status` varchar(100) NOT NULL,
  `cid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `kami` varchar(15) DEFAULT NULL,
  `time` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ap_rebate`
--

CREATE TABLE IF NOT EXISTS `ap_rebate` (
  `id` int(11) NOT NULL,
  `money` int(11) NOT NULL DEFAULT '0',
  `rebate` int(11) NOT NULL DEFAULT '0',
  `rebate2` int(11) NOT NULL DEFAULT '0',
  `rebate3` int(11) NOT NULL DEFAULT '0',
  `rebate4` int(11) NOT NULL DEFAULT '0',
  `rebate5` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ap_rebate`
--

INSERT INTO `ap_rebate` (`id`, `money`, `rebate`, `rebate2`, `rebate3`, `rebate4`, `rebate5`) VALUES
(1, 160, 80, 40, 20, 10, 5);

-- --------------------------------------------------------

--
-- 表的结构 `ap_sad`
--

CREATE TABLE IF NOT EXISTS `ap_sad` (
  `id` int(11) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `title` varchar(225) NOT NULL,
  `linkurl` varchar(255) DEFAULT NULL,
  `picurl` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ap_share`
--

CREATE TABLE IF NOT EXISTS `ap_share` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ap_share`
--

INSERT INTO `ap_share` (`id`, `ip`, `uid`) VALUES
(1, '115.53.180.247', 1),
(2, '61.158.152.248', 3),
(3, '36.4.233.223', 5),
(4, '36.4.233.223', 5),
(5, '183.228.64.97', 1),
(6, '139.207.129.42', 1),
(7, '183.66.180.194', 1),
(8, '42.238.93.70', 6),
(9, '218.204.252.35', 7);

-- --------------------------------------------------------

--
-- 表的结构 `ap_shop`
--

CREATE TABLE IF NOT EXISTS `ap_shop` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `picurl` varchar(100) NOT NULL,
  `miaoshu` varchar(999) NOT NULL,
  `money` double(10,3) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='商品';

--
-- 转存表中的数据 `ap_shop`
--

INSERT INTO `ap_shop` (`id`, `title`, `picurl`, `miaoshu`, `money`) VALUES
(1, '电信流量卡', '/public/uploads/20190422/c4ffb2f8b05ab526c7f56c5d8d7bd8e8.png', '为了保证流量卡激活率（充值套餐）实现一卡一人一机不浪费 每张卡我们收取6元押金（邮费免费！）客户收到卡后充值激活6元全退！ 全国通用无需实名！ 全国流量不限速！ 一卡多种套餐随意订购，套餐内容：23元/45G 29元/65G 39元/105G 49元/150G 59元/220G 全国流量不限速！第一大物联网公司出卡，稳定零售后可靠！ 发中通快递，每天晚上6点开始打包发货', 600.000),
(2, '移动流量卡', '/public/uploads/20190422/80a8defe791ab321be25b29d6c1eff96.png', '为了保证流量卡激活率（充值套餐）实现一卡一人一机不浪费 每张卡我们收取6元押金（邮费免费！）客户收到卡后充值激活6元全退！ 全国通用无需实名！ 全国流量不限速！ 一卡多种套餐随意订购，套餐内容：23元/45G 29元/65G 39元/105G 49元/150G 59元/220G 全国流量不限速！第一大物联网公司出卡，稳定零售后可靠！ 发中通快递，每天晚上6点开始打包发货', 600.000),
(3, '移动流量卡', '/public/uploads/20190422/f1fc203e2494002dc8f4de00e88452c2.png', '全国通用无需实名！ 全国流量不限速！ 一卡多种套餐随意订购，套餐内容：10元/10G 18元/30G 全国流量不限速！第一大物联网公司出卡，稳定零售后可靠！ 发中通快递，每天晚上七点开始打包发货', 600.000);

-- --------------------------------------------------------

--
-- 表的结构 `ap_shopdingdan`
--

CREATE TABLE IF NOT EXISTS `ap_shopdingdan` (
  `id` int(11) NOT NULL,
  `uid` int(10) NOT NULL,
  `oderid` varchar(50) NOT NULL,
  `money` decimal(10,3) NOT NULL,
  `spid` int(10) NOT NULL,
  `time` varchar(50) NOT NULL,
  `type` int(10) NOT NULL,
  `dizhi` varchar(255) NOT NULL,
  `fahuoxinxi` varchar(255) NOT NULL DEFAULT '暂未发货',
  `picurl` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ap_stop`
--

CREATE TABLE IF NOT EXISTS `ap_stop` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ap_tanchuang`
--

CREATE TABLE IF NOT EXISTS `ap_tanchuang` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `neirong` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `ssurl` varchar(255) DEFAULT NULL,
  `kaiguan` int(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ap_tanchuang`
--

INSERT INTO `ap_tanchuang` (`id`, `title`, `neirong`, `url`, `ssurl`, `kaiguan`) VALUES
(1, '欣然影视', '欢迎来到欣然影视', 'http://959495.xyz', 'http://jx.zyu5.com/index.php?wd=', 2);

-- --------------------------------------------------------

--
-- 表的结构 `ap_timelog`
--

CREATE TABLE IF NOT EXISTS `ap_timelog` (
  `uid` int(11) DEFAULT NULL,
  `ctime` int(11) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `money` decimal(11,2) DEFAULT NULL,
  `day` varchar(11) DEFAULT NULL,
  `lasttime` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ap_tixian`
--

CREATE TABLE IF NOT EXISTS `ap_tixian` (
  `id` int(11) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `moneys` int(11) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `money_time` int(11) DEFAULT NULL,
  `state` smallint(5) DEFAULT '1' COMMENT '状态1 2  1为未到账 2为以到账',
  `number` text COMMENT '提现账号',
  `name` varchar(40) DEFAULT NULL COMMENT '体现姓名'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ap_tongji`
--

CREATE TABLE IF NOT EXISTS `ap_tongji` (
  `id` int(11) NOT NULL,
  `os` varchar(255) NOT NULL,
  `imei` varchar(255) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ap_tuijian`
--

CREATE TABLE IF NOT EXISTS `ap_tuijian` (
  `id` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `img` text NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ap_tuijian`
--

INSERT INTO `ap_tuijian` (`id`, `title`, `img`, `url`) VALUES
(22, '一出好戏', 'http://116.62.233.25/public/uploads/20180811/16832d98daebe18d4b0bd737bfc35940.jpg', 'http://yong.yongjiu6.com/20180811/wslGYCAN/index.m3u8'),
(21, '西虹市首富', 'http://img1.doubanio.com/view/photo/s_ratio_poster/public/p2529206747.jpg', 'https://v4.438vip.com/20180730/5QiVLcpo/index.m3u8'),
(20, '狄仁杰之四大天王', 'http://img3.doubanio.com/view/photo/s_ratio_poster/public/p2526405034.jpg', 'https://v4.438vip.com/20180730/vf4Z4WO9/index.m3u8'),
(19, '我不是药神', 'http://pic.china-gif.com/pic/upload/vod/2018-07/15304196550.jpg', 'http://youku.cdn2-youku.com/20180710/12991_efbabf56/index.m3u8'),
(18, '死侍2', 'https://img1.doubanio.com/view/photo/s_ratio_poster/public/p2521499639.webp', 'http://youku.cdn-iqiyi.com/20180710/11624_9050b3a4/index.m3u8'),
(13, '猛虫过江', 'http://pic.china-gif.com/pic/upload/vod/2018-06/15291123500.jpg', 'http://v-bilibili.com/20180717/6905_44b030ce/index.m3u8'),
(22, '一出好戏', 'http://116.62.233.25/public/uploads/20180811/16832d98daebe18d4b0bd737bfc35940.jpg', 'http://yong.yongjiu6.com/20180811/wslGYCAN/index.m3u8'),
(21, '西虹市首富', 'http://img1.doubanio.com/view/photo/s_ratio_poster/public/p2529206747.jpg', 'https://v4.438vip.com/20180730/5QiVLcpo/index.m3u8'),
(20, '狄仁杰之四大天王', 'http://img3.doubanio.com/view/photo/s_ratio_poster/public/p2526405034.jpg', 'https://v4.438vip.com/20180730/vf4Z4WO9/index.m3u8'),
(19, '我不是药神', 'http://pic.china-gif.com/pic/upload/vod/2018-07/15304196550.jpg', 'http://youku.cdn2-youku.com/20180710/12991_efbabf56/index.m3u8'),
(18, '死侍2', 'https://img1.doubanio.com/view/photo/s_ratio_poster/public/p2521499639.webp', 'http://youku.cdn-iqiyi.com/20180710/11624_9050b3a4/index.m3u8'),
(13, '猛虫过江', 'http://pic.china-gif.com/pic/upload/vod/2018-06/15291123500.jpg', 'http://v-bilibili.com/20180717/6905_44b030ce/index.m3u8'),
(22, '一出好戏', 'http://116.62.233.25/public/uploads/20180811/16832d98daebe18d4b0bd737bfc35940.jpg', 'http://yong.yongjiu6.com/20180811/wslGYCAN/index.m3u8'),
(21, '西虹市首富', 'http://img1.doubanio.com/view/photo/s_ratio_poster/public/p2529206747.jpg', 'https://v4.438vip.com/20180730/5QiVLcpo/index.m3u8'),
(20, '狄仁杰之四大天王', 'http://img3.doubanio.com/view/photo/s_ratio_poster/public/p2526405034.jpg', 'https://v4.438vip.com/20180730/vf4Z4WO9/index.m3u8'),
(19, '我不是药神', 'http://pic.china-gif.com/pic/upload/vod/2018-07/15304196550.jpg', 'http://youku.cdn2-youku.com/20180710/12991_efbabf56/index.m3u8'),
(18, '死侍2', 'https://img1.doubanio.com/view/photo/s_ratio_poster/public/p2521499639.webp', 'http://youku.cdn-iqiyi.com/20180710/11624_9050b3a4/index.m3u8'),
(13, '猛虫过江', 'http://pic.china-gif.com/pic/upload/vod/2018-06/15291123500.jpg', 'http://v-bilibili.com/20180717/6905_44b030ce/index.m3u8');

-- --------------------------------------------------------

--
-- 表的结构 `ap_tuisong`
--

CREATE TABLE IF NOT EXISTS `ap_tuisong` (
  `id` int(11) NOT NULL,
  `appkey` varchar(50) NOT NULL,
  `master_secret` varchar(255) NOT NULL,
  `kaiguan` int(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ap_tuisong`
--

INSERT INTO `ap_tuisong` (`id`, `appkey`, `master_secret`, `kaiguan`) VALUES
(1, 'e096f19e76791299af428961', '83abe0e075498eaac48c0801', 1);

-- --------------------------------------------------------

--
-- 表的结构 `ap_tv`
--

CREATE TABLE IF NOT EXISTS `ap_tv` (
  `title` varchar(255) NOT NULL,
  `img` text NOT NULL,
  `url` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ap_tv`
--

INSERT INTO `ap_tv` (`title`, `img`, `url`, `id`) VALUES
('CHC高清电影', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521449765264&di=d34fdbee49173710e247b888dfaf799c&imgtype=0&src=http%3A%2F%2Fwww.5etime.com%2Finfo5%2Fuploads%2Fallimg%2F140204%2F6-1402040913150-L.jpg', 'http://ivi.bupt.edu.cn/hls/chchd.m3u8', 18),
('东方卫视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521438560889&di=a810c43c8006c83cd67c1a1a7f21a018&imgtype=0&src=http%3A%2F%2Fwww.askququ.com%2Fuploads%2Fallimg%2F160417%2F1_160417235823_1.jpg', 'http://ivi.bupt.edu.cn/hls/dfhd.m3u8', 19),
('云南卫视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521446996898&di=0c9e1f4fceb009660f8e13ab098f0e09&imgtype=jpg&src=http%3A%2F%2Fimg2.imgtn.bdimg.com%2Fit%2Fu%3D4167813717%2C485108299%26fm%3D214%26gp%3D0.jpg', 'http://ivi.bupt.edu.cn/hls/yntv.m3u8', 20),
('内蒙古卫视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521448672137&di=a06d1b4333aa024205e38dca84d1aa95&imgtype=0&src=http%3A%2F%2Fwww.zhiboba.cc%2Fzbbimg%2Fneimengguweishi_zbb.jpg', 'http://ivi.bupt.edu.cn/hls/nmtv.m3u8', 21),
('北京体育', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521438875915&di=76b9adf8f628c6cfc98e958c22bd63b4&imgtype=0&src=http%3A%2F%2Fimgbdb3.bendibao.com%2Fbjbdb%2F201512%2F17%2F20151217211837_18180.jpg', 'http://ivi.bupt.edu.cn/hls/btv6hd.m3u8', 22),
('北京卡酷少儿', 'https://timgsa.baidu.com/timg?image&quality=80&size=b10000_10000&sec=1521431022&di=35b5372e3943f45dd98ac14cf1176bce&src=http://i6.qhimg.com/dr/250_500_/t01cce007620ff6c031.jpg', 'http://ivi.bupt.edu.cn/hls/btv10.m3u8', 23),
('北京卫视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521438875915&di=76b9adf8f628c6cfc98e958c22bd63b4&imgtype=0&src=http%3A%2F%2Fimgbdb3.bendibao.com%2Fbjbdb%2F201512%2F17%2F20151217211837_18180.jpg', 'http://ivi.bupt.edu.cn/hls/btv1hd.m3u8', 24),
('北京影视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521449195463&di=b81841e08a3583fe2fee9b5fdb8ec201&imgtype=0&src=http%3A%2F%2Fimgbdb3.bendibao.com%2Fbjbdb%2F201512%2F17%2F20151217211837_18180.jpg', 'http://ivi.bupt.edu.cn/hls/btv4.m3u8', 25),
('北京文艺', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521438875915&di=76b9adf8f628c6cfc98e958c22bd63b4&imgtype=0&src=http%3A%2F%2Fimgbdb3.bendibao.com%2Fbjbdb%2F201512%2F17%2F20151217211837_18180.jpg', 'http://ivi.bupt.edu.cn/hls/btv2hd.m3u8', 26),
('厦门卫视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521440961685&di=56323ff2c8157013bcbd670c342cb87b&imgtype=0&src=http%3A%2F%2Fp2.img.cctvpic.com%2Fphotoworkspace%2Fcontentimg%2F2015%2F04%2F03%2F2015040317221992933.jpg', 'http://ivi.bupt.edu.cn/hls/jstv.m3u8', 27),
('四川卫视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521444118075&di=61bea82fed90d8c3aba7f28a833e4c80&imgtype=0&src=http%3A%2F%2Fwww.guojitv.com%2Fepg%2Fupfile%2F6922487a-5351-4924-9646-aa23331cb1e3.jpg', 'http://ivi.bupt.edu.cn/hls/sctv.m3u8', 28),
('天津卫视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521438045785&di=45ac121f3546beb424ed684869d48fc1&imgtype=jpg&src=http%3A%2F%2Fimg2.imgtn.bdimg.com%2Fit%2Fu%3D2388055552%2C3521134445%26fm%3D214%26gp%3D0.jpg', 'http://ivi.bupt.edu.cn/hls/tjhd.m3u8', 29),
('宁夏卫视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521447468222&di=5734aae221d04e164c1949c8155fa489&imgtype=0&src=http%3A%2F%2Fg.hiphotos.baidu.com%2Fzhidao%2Fpic%2Fitem%2Fd01373f082025aaf4a28b028fcedab64034f1a3f.jpg', 'http://ivi.bupt.edu.cn/hls/nxtv.m3u8', 30),
('安徽卫视', 'https://gss2.bdstatic.com/-fo3dSag_xI4khGkpoWK1HF6hhy/baike/w%3D268%3Bg%3D0/sign=c1b27653972f07085f052d06d11fdfa4/5fdf8db1cb1349544f478c785f4e9258d1094a54.jpg', 'http://ivi.bupt.edu.cn/hls/ahhd.m3u8', 0),
('山东卫视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521437766886&di=b7bfe474813aa2f4fc104537f08ea7d0&imgtype=0&src=http%3A%2F%2Fimg.sj33.cn%2Fuploads%2Fallimg%2F201402%2F104P93039-0.png', 'http://ivi.bupt.edu.cn/hls/sdhd.m3u8', 0),
('山西卫视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521448925319&di=a62df4a2fdf910baf00d4b2bf730f12d&imgtype=0&src=http%3A%2F%2Fwww.jinqiao-ad.com%2FUploadFile%2F2011913155047134.jpg', 'http://ivi.bupt.edu.cn/hls/sxrtv.m3u8', 0),
('广东卫视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521438132116&di=4805195ca7dc53af5804e28a917ff26a&imgtype=0&src=http%3A%2F%2Fwww.haoqu.net%2Fuploadfile%2F2015%2F0417%2F20150417123256441.jpg', 'http://ivi.bupt.edu.cn/hls/gdhd.m3u8', 0),
('广西卫视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521448570971&di=ba08008dd3bacccdad92314d9d4a1940&imgtype=0&src=http%3A%2F%2Fimg2.cache.netease.com%2Fent%2F2013%2F2%2F5%2F2013020513352409c8f.jpg', 'http://ivi.bupt.edu.cn/hls/gxtv.m3u8', 0),
('江苏卫视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521438608006&di=7e901d515c4e5732670c9ab0704ef311&imgtype=0&src=http%3A%2F%2Fphoto.renwen.com%2F3%2F740%2F374023_1354724541617895_s.jpg', 'http://ivi.bupt.edu.cn/hls/jshd.m3u8', 0),
('江西卫视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521447093511&di=ca7e7cdebaf7f6388a3f134acdb61796&imgtype=0&src=http%3A%2F%2Fi3.qhmsg.com%2Ft01325f825f5a837518.png', 'http://ivi.bupt.edu.cn/hls/jxtv.m3u8', 0),
('河北卫视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521441248113&di=bb63ad2313598edc50ded73b064ccd76&imgtype=0&src=http%3A%2F%2Fimg3.cache.netease.com%2Fent%2F2013%2F7%2F30%2F20130730163703b283f_550.jpg', 'http://ivi.bupt.edu.cn/hls/hebtv.m3u8', 0),
('河南卫视', 'https://gss2.bdstatic.com/9fo3dSag_xI4khGkpoWK1HF6hhy/baike/w%3D268%3Bg%3D0/sign=6cb4d33fdb160924dc25a51dec3c52c7/faf2b2119313b07e10c9e46107d7912397dd8c67.jpg', 'http://ivi.bupt.edu.cn/hls/hntv.m3u8', 0),
('浙江卫视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521438648272&di=9e9ceaa2e60008d3841f1a67da647e7c&imgtype=0&src=http%3A%2F%2Fimgbdb3.bendibao.com%2Fguangzhou%2F201511%2F20%2F2015112015311480.jpg', 'http://ivi.bupt.edu.cn/hls/zjhd.m3u8', 0),
('深圳卫视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521438330833&di=79b07ba371c9a9d29265e5291fd05bcf&imgtype=0&src=http%3A%2F%2Fphoto.hanyu.iciba.com%2Fupload%2Fencyclopedia_2%2F20%2F83%2Fbk_20831bb807a45638cfaf81df1122024d_4vR9PJ.jpg', 'http://ivi.bupt.edu.cn/hls/szhd.m3u8', 0),
('湖北卫视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b10000_10000&sec=1521427881&di=6e7f41afb9ea26065bc744129e2a2bba&src=http://img.sj33.cn/uploads/allimg/201402/7-140225100443R3.png', 'http://ivi.bupt.edu.cn/hls/hbhd.m3u8', 0),
('湖南卫视', 'https://gss1.bdstatic.com/9vo3dSag_xI4khGkpoWK1HF6hhy/baike/w%3D268%3Bg%3D0/sign=e737c9718c94a4c20a23e02d36cf7ce8/5ab5c9ea15ce36d3e486ab4e31f33a87e850b1c9.jpg', 'http://ivi.bupt.edu.cn/hls/hunanhd.m3u8', 0),
('甘肃卫视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521447579015&di=8a6c0bc5c0b82f09acbfe4aa18bd9839&imgtype=0&src=http%3A%2F%2Fwww.cctvmt.com%2Fmedia%2Fbig%2F41b61a89018d02b74cea19c16dfbfa1a.jpg', 'http://ivi.bupt.edu.cn/hls/gstv.m3u8', 0),
('福建东南卫视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521447260326&di=ee736f021eec49f3777d3f7388725162&imgtype=0&src=http%3A%2F%2Fs2.sinaimg.cn%2Fmw690%2F7e130453g7c6744376401%26690', 'http://ivi.bupt.edu.cn/hls/dntv.m3u8', 0),
('翡翠台', 'http://www.leshizhibo.com/uploads/images/53a3fd6f109eftvb.jpg', 'http://acm.gg/jade.m3u8', 0),
('贵州卫视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521447335101&di=ef7aaedeeba668817393768219d57940&imgtype=0&src=http%3A%2F%2Fxianzhi.net%2Fuploads%2F140728%2F1-140HQ43916194.jpg', 'http://ivi.bupt.edu.cn/hls/gztv.m3u8', 0),
('辽宁卫视', 'http://awb.img.xmtbang.com/img/uploadnew/201512/24/4ea7c36869c54392a3049fd70b50c3f6.jpg', 'http://ivi.bupt.edu.cn/hls/lnhd.m3u8', 0),
('重庆卫视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521439764215&di=e3c095e4061a9f71c22f9291ce99004b&imgtype=0&src=http%3A%2F%2Fwww.zqzhibo.com%2Fimages%2Fchannels%2Fcqws.gif', 'http://ivi.bupt.edu.cn/hls/cqhd.m3u8', 0),
('陕西卫视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521448386452&di=dd97e921ff61a30d5c267307111e8f04&imgtype=0&src=http%3A%2F%2Fimages.movie.xunlei.kankan.com%2Fgallery%2F1318%2F96be848cc1bb45bfb0768702eb03715f.jpg', 'http://ivi.bupt.edu.cn/hls/sxtv.m3u8', 0),
('青海卫视', 'http://img.shiting5.com/allimg/150119/6-150119212913J7.jpg', 'http://ivi.bupt.edu.cn/hls/gxtv.m3u8', 0),
('香港卫视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521450276217&di=1c4ff77aa56cb0ad739935130b06649b&imgtype=0&src=http%3A%2F%2Fwww.hinews.cn%2Fpic%2F0%2F13%2F47%2F28%2F13472840_865544.jpg', 'http://live.hkstv.hk.lxdns.com/live/hks/playlist.m3u8', 0),
('黑龙江卫视', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1521438462748&di=dab59ceb5ca559fc711dd2ef872f5e54&imgtype=0&src=http%3A%2F%2Fwww.hlyy.cc%2Fuploadfile%2F20150411%2Flmmr152l4vc.jpg', 'http://ivi.bupt.edu.cn/hls/hljhd.m3u8', 0);

-- --------------------------------------------------------

--
-- 表的结构 `ap_user`
--

CREATE TABLE IF NOT EXISTS `ap_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nick_name` varchar(255) NOT NULL DEFAULT '',
  `power` varchar(255) NOT NULL DEFAULT '0',
  `status` varchar(255) NOT NULL DEFAULT '0',
  `parentid` int(11) NOT NULL DEFAULT '0',
  `ctime` int(11) NOT NULL DEFAULT '0',
  `logintime` int(11) NOT NULL DEFAULT '0',
  `lasttime` int(11) NOT NULL DEFAULT '0',
  `money` decimal(11,2) NOT NULL DEFAULT '0.00',
  `type` int(1) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `imei` varchar(255) DEFAULT NULL,
  `count` int(11) NOT NULL DEFAULT '0',
  `sign` int(11) DEFAULT '0',
  `share_ma` varchar(255) DEFAULT NULL,
  `weichat` varchar(255) DEFAULT NULL,
  `url` text,
  `url1` text,
  `url2` text,
  `url3` text,
  `url4` text,
  `url5` text,
  `url6` text,
  `url7` text,
  `key` varchar(255) DEFAULT NULL,
  `moneys` int(11) DEFAULT '0',
  `cate` varchar(255) DEFAULT NULL,
  `qiandaotime` varchar(100) DEFAULT NULL,
  `kamioff` int(10) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ap_user`
--

INSERT INTO `ap_user` (`id`, `username`, `password`, `nick_name`, `power`, `status`, `parentid`, `ctime`, `logintime`, `lasttime`, `money`, `type`, `phone`, `imei`, `count`, `sign`, `share_ma`, `weichat`, `url`, `url1`, `url2`, `url3`, `url4`, `url5`, `url6`, `url7`, `key`, `moneys`, `cate`, `qiandaotime`, `kamioff`) VALUES
(1, 'admin', 'd93a5def7511da3d0f2d171d9c344e91', '', '0', '1', 0, 1553059249, 1556045599, 0, '0.00', NULL, NULL, '867302023180302', 1312, 167, '000001', '欣然影视', '购卡', '无数据', '无数据', '无数据', '无数据', '无数据', '无数据', NULL, '853773187bd283693e2aceccb3d0d3df', 14607, '1,2,7', '20190423', 0),
(2, '15290927726', 'c78b6663d47cfbdb4d65ea51c104044e', '', '1', '1', 1, 1552311471, 1552315864, 1583845861, '20.00', NULL, '123456', '867305035648562', 24, 2, '780669', '123456', '无数据', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '20190311', 0),
(3, '12345678901', '2a5240c7b496efe3243964cc0325f36f', '', '2', '1', 1, 1552316074, 1552317331, 1583852074, '0.00', NULL, '', '869189043613414', 14, 1, NULL, NULL, NULL, 'http://zuozuovip.cn/pay/?name=一个月&fee=12', 'http://zuozuovip.cn/pay/?name=三个月&fee=28', 'http://zuozuovip.cn/pay/?name=一年&fee=88', 'http://zuozuovip.cn/pay/?name=永久&fee=188', 'http://zuozuovip.cn/pay/?name=七天&fee=5', 'http://zuozuovip.cn/pay/?name=六个月&fee=48', NULL, NULL, 0, NULL, NULL, 0),
(4, '15617226292', '472d17c0c118b09f45c04bc9b4011f36', '', '2', '1', 1, 1552319220, 1552319743, 1583855220, '0.00', NULL, '', '865982027683047', 12, 0, NULL, NULL, NULL, 'http://zuozuovip.cn/pay/?name=一个月&fee=12', 'http://zuozuovip.cn/pay/?name=三个月&fee=28', 'http://zuozuovip.cn/pay/?name=一年&fee=88', 'http://zuozuovip.cn/pay/?name=永久&fee=188', 'http://zuozuovip.cn/pay/?name=七天&fee=5', 'http://zuozuovip.cn/pay/?name=六个月&fee=48', NULL, NULL, 0, NULL, NULL, 0),
(5, '17777777777', '02ba38fd6267a0ec1dcfc7e142823044', '', '2', '1', 1, 1553059695, 1553059765, 1585200495, '0.00', NULL, '', '19A7769F-1A3D-42E5-9B68-6DAFEDECCF79', 19, 7, NULL, NULL, NULL, 'http://zuozuovip.cn/pay/?name=一个月&fee=12', 'http://zuozuovip.cn/pay/?name=三个月&fee=28', 'http://zuozuovip.cn/pay/?name=一年&fee=88', 'http://zuozuovip.cn/pay/?name=永久&fee=188', 'http://zuozuovip.cn/pay/?name=七天&fee=5', 'http://zuozuovip.cn/pay/?name=六个月&fee=48', NULL, NULL, 0, NULL, '20190320', 1),
(6, '15257281443', 'd1003ed7245029349552f030cbe47503', '', '2', '1', 1, 1556010322, 1556041961, 1587546322, '0.00', NULL, '', '866538042666992', 20, 1, NULL, NULL, NULL, 'http://959495.xyz/pay/?name=一个月&fee=6', 'http://959495.xyz/pay/?name=三个月&fee=10', 'http://959495.xyz/pay/?name=一年&fee=28', 'http://959495.xyz/pay/?name=永久&fee=58', 'http://959495.xyz/pay/?name=七天&fee=1', 'http:/959495.xyz/pay/?name=六个月&fee=18', NULL, NULL, 0, NULL, NULL, 0),
(7, '13724283839', '75e78684398c937075caa170fb30ef43', '', '2', '1', 1, 1556025291, 1556025317, 1587561291, '0.00', NULL, '', '864493041109606', 6, 1, NULL, NULL, NULL, 'http://959495.xyz/pay/?name=一个月&fee=6', 'http://959495.xyz/pay/?name=三个月&fee=10', 'http://959495.xyz/pay/?name=一年&fee=28', 'http://959495.xyz/pay/?name=永久&fee=58', 'http://959495.xyz/pay/?name=七天&fee=1', 'http:/959495.xyz/pay/?name=六个月&fee=18', NULL, NULL, 0, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- 表的结构 `ap_video`
--

CREATE TABLE IF NOT EXISTS `ap_video` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` text NOT NULL,
  `url` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ap_video`
--

INSERT INTO `ap_video` (`id`, `title`, `img`, `url`) VALUES
(1, '成龙电影在线直播', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1547465140655&di=47dd5d15270f304bd662d54052189c93&imgtype=0&src=http%3A%2F%2F5b0988e595225.cdn.sohucs.com%2Fq_70%2Cc_zoom%2Cw_640%2Fimages%2F20180715%2F119d12719e29431faf738c618f0331c7.jpeg', 'http://tx.hls.huya.com/huyalive/94525224-2460685722-10568564701724147712-2789253838-10057-A-0-1.m3u8'),
(2, '徐峥电影在线直播', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1547465278085&di=92812069a299b3617c6ff4b41f699905&imgtype=0&src=http%3A%2F%2Fn.sinaimg.cn%2Fent%2Ftransform%2F299%2Fw440h659%2F20181118%2FQKbn-hnyuqhh6759461.jpg', 'http://tx.hls.huya.com/huyalive/30765679-2689675828-11552069718101721088-3048991626-10057-A-0-1.m3u8'),
(3, '周润发电影在线直播', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1547465416255&di=fc4e8c46bd2442adff7e12d56da8e76f&imgtype=0&src=http%3A%2F%2Fimg.iecity.com%2FUpload%2FNews%2F201512%2F23%2F20151223180829552.jpg', 'http://tx.hls.huya.com/huyalive/94525224-2460685774-10568564925062447104-2789253840-10057-A-0-1.m3u8'),
(4, '周星驰在线电影直播', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1547465694162&di=9262d8a9b5f9f3fd3af8175be0294e27&imgtype=0&src=http%3A%2F%2Fs11.sinaimg.cn%2Fmiddle%2F4a78a895x7633f6291e8a%26690', 'http://tx.hls.huya.com/huyalive/94525224-2460685313-10568562945082523648-2789274524-10057-A-0-1.m3u8'),
(5, '刘德华电影在线直播', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1548060512&di=8234ebc34eefd335333a6ea4ca249702&imgtype=jpg&er=1&src=http%3A%2F%2Fi3.sinaimg.cn%2Fent%2Fm%2Fp%2F2012-09-26%2FU4611P28T3D3753520F234DT20120926233515.jpg', 'http://tx.hls.huya.com/huyalive/94525224-2467341872-10597152648291418112-2789274550-10057-A-0-1.m3u8'),
(6, '李连杰在线电影直播', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1547465823318&di=9cf076bde65f653f724870ad9acb5e48&imgtype=0&src=http%3A%2F%2Fpic0.qiyipic.com%2Fimage%2F20150311%2Fdd%2Fcf%2Fli_203115_li_601_m2.jpg', 'http://tx.hls.huya.com/huyalive/94525224-2460686093-10568566295157014528-2789253848-10057-A-0-1.m3u8'),
(7, '洪金宝电影在线直播', 'https://ss2.bdstatic.com/70cFvnSh_Q1YnxGkpoWK1HF6hhy/it/u=1671194223,74939063&fm=26&gp=0.jpg', 'http://tx.hls.huya.com/huyalive/29106097-2689406282-11550912026846953472-2789274558-10057-A-0-1.m3u8'),
(8, '林正英在线电影直播', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1547466053622&di=8411d92026d485bf74c0b1842eea2d77&imgtype=0&src=http%3A%2F%2Fimg.alicdn.com%2Fimgextra%2Fi3%2FTB1IelnPXXXXXXOXpXXXXXXXXXX_%2521%25210-item_pic.jpg_310x310.jpg', 'http://tx.hls.huya.com/huyalive/94525224-2460686034-10568566041753944064-2789274542-10057-A-0-1.m3u8'),
(9, '甄子丹在线电影直播', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1547466146990&di=79df0141f8c266198ac4ef7db77703ae&imgtype=0&src=http%3A%2F%2Fimages.rednet.cn%2Farticleimage%2F2013%2F10%2F02%2F13428230.jpg', 'http://tx.hls.huya.com/huyalive/29169025-2686219938-11537226783573147648-2847699096-10057-A-1524024759-1.m3u8'),
(10, '古天乐在线电影直播', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1547466349237&di=19b95ed930f6ee2c29b75349d406f6eb&imgtype=0&src=http%3A%2F%2Fs13.sinaimg.cn%2Fmw690%2F004cVFOEgy6ToCa7B0wdc%26690', 'http://tx.hls.huya.com/huyalive/29169025-2686220040-11537227221659811840-2713685416-10057-A-1524041498-1.m3u8'),
(11, '斯坦森在线电影直播', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1547466635611&di=1ab8d7a84c05bfc483d5d4767c0f3b28&imgtype=0&src=http%3A%2F%2Fpic1.win4000.com%2Fpic%2F1%2F41%2F50fe1362427.jpg', 'http://tx.hls.huya.com/huyalive/30765679-2554414705-10971127618396487680-3048991636-10057-A-0-1.m3u8'),
(12, '徐克导演电影', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1547466679969&di=01ade59f6ca287921efa575b14e9a5d0&imgtype=0&src=http%3A%2F%2Fimg01.9yaocn.com%2F2016-06%2F25%2F576d6535%2F576d6535f10d22040e4d2d51%2F1466801442942_696933.jpg', 'http://tx.hls.huya.com/huyalive/29106097-2689447148-11551087544980471808-2789253872-10057-A-1525420294-1.m3u8'),
(13, '王晶电影', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1547466744924&di=8412a462634fe7762c5f1360575af255&imgtype=0&src=http%3A%2F%2Fliaocheng.dzwww.com%2Fyule%2F201707%2FW020170712317418595378.jpg', 'http://tx.hls.huya.com/huyalive/94525224-2579683592-11079656661667807232-2847687574-10057-A-0-1.m3u8'),
(14, '古惑仔电影直播', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1547466785140&di=a9fa5d2865859bbe4fbee713418c8a28&imgtype=jpg&src=http%3A%2F%2Fimg4.imgtn.bdimg.com%2Fit%2Fu%3D4189706434%2C3304546954%26fm%3D214%26gp%3D0.jpg', 'http://tx.hls.huya.com/huyalive/30765679-2523417522-10837995731143360512-2777068634-10057-A-0-1.m3u8'),
(15, '赌博电影在线直播', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1547466843193&di=586d9efdb79924345c4d555b051a5ad8&imgtype=0&src=http%3A%2F%2Fimg1.cache.netease.com%2Fcatchpic%2FB%2FBC%2FBCBD37FAC92DFDC5C097311B922169FB.jpg', 'http://tx.hls.huya.com/huyalive/29106097-2689446042-11551082794746642432-2789253870-10057-A-0-1.m3u8'),
(16, '科幻电影在线直播', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1547466885246&di=ae153f1322e182779cec47c2a590790f&imgtype=0&src=http%3A%2F%2Fscimg.jb51.net%2Fallimg%2F150124%2F11-150124095639127.jpg', 'http://tx.hls.huya.com/huyalive/30765679-2499070088-10733424298371842048-2789274548-10057-A-1521102596-1.m3u8'),
(17, '漫威电影直播', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1547467032663&di=44677446bc97ceb2c21bafe17011a102&imgtype=0&src=http%3A%2F%2Fimg.zcool.cn%2Fcommunity%2F0152ff5a17ff46a80120908d3f4ba9.jpg%402o.jpg', 'http://tx.hls.huya.com/huyalive/30765679-2504742278-10757786168918540288-3049003128-10057-A-0-1.m3u8'),
(18, '女神港片直播', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1548061833&di=7efab48e0d020c5f1910c842dc77ea59&imgtype=jpg&er=1&src=http%3A%2F%2Fm3.biz.itc.cn%2Fpic%2Fnew%2Fn%2F30%2F86%2FImg6938630_n.jpg', 'http://tx.hls.huya.com/huyalive/30765679-2484192476-10669525441389264896-2789274564-10057-A-0-1.m3u8'),
(19, '丧尸电影直播', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1548061943&di=df4420a9a8f7656a368f5aa89dadab5d&imgtype=jpg&er=1&src=http%3A%2F%2Fi0.hdslb.com%2Fbfs%2Farticle%2F1f60d7555ec74308ef78c5117634377432132e2f.jpg', 'http://tx.hls.huya.com/huyalive/29106097-2689286606-11550398022340837376-2789274544-10057-A-0-1.m3u8'),
(20, '战争电影', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1547467245093&di=cfddfb6dbb3da95e0245ee0784dc20df&imgtype=0&src=http%3A%2F%2F5b0988e595225.cdn.sohucs.com%2Fimages%2F20170907%2F1de8a46b744e44db8c82fdee6a074c90.jpeg', 'http://tx.hls.huya.com/huyalive/28466698-2689659358-11551998979990355968-2789274580-10057-A-0-1.m3u8'),
(21, '犯罪战争直播电影', 'https://ss0.bdstatic.com/70cFuHSh_Q1YnxGkpoWK1HF6hhy/it/u=2385651372,896048122&fm=26&gp=0.jpg', 'http://tx.hls.huya.com/huyalive/30765679-2480288304-10652757150331305984-2789274538-10057-A-1511757260-1.m3u8'),
(22, '灾难电影直播', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1547467390751&di=0b5ba3f0b7b295602758b1704f4dd131&imgtype=0&src=http%3A%2F%2Fcimg2.163.com%2Fent%2F2007%2F10%2F15%2F20071015213529eb6e2.gif', 'http://tx.hls.huya.com/huyalive/29359996-2689475864-11551210879261343744-2847699104-10057-A-1525430092-1.m3u8'),
(23, '真实改编电影直播', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1547467564757&di=4ff88b97abb3cdb3ddc0dc8e9c838c0f&imgtype=0&src=http%3A%2F%2F5b0988e595225.cdn.sohucs.com%2Fimages%2F20181202%2Fd5d8c2afc91c41deaee3c5e84b0885ae.jpeg', 'http://tx.hls.huya.com/huyalive/30765679-2554414680-10971127511022305280-3048991634-10057-A-0-1.m3u8'),
(24, '惊悚电影直播', 'https://timgsa.baidu.com/timg?image&quality=80&size=b9999_10000&sec=1547467605029&di=0080821b90ca5ec120b63a0dbb06c207&imgtype=0&src=http%3A%2F%2Fpic14.photophoto.cn%2F20100227%2F0036036353466568_b.jpg', 'http://tx.hls.huya.com/huyalive/29106097-2689447600-11551089486305689600-2789274568-10057-A-1525420695-1.m3u8');

-- --------------------------------------------------------

--
-- 表的结构 `ap_zce`
--

CREATE TABLE IF NOT EXISTS `ap_zce` (
  `phone` varchar(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `ap_zhibo`
--

CREATE TABLE IF NOT EXISTS `ap_zhibo` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` text,
  `img` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ap_advert`
--
ALTER TABLE `ap_advert`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ap_app`
--
ALTER TABLE `ap_app`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ap_banner`
--
ALTER TABLE `ap_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ap_category`
--
ALTER TABLE `ap_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ap_dianka`
--
ALTER TABLE `ap_dianka`
  ADD PRIMARY KEY (`id`,`dianka`),
  ADD UNIQUE KEY `dianka` (`dianka`);

--
-- Indexes for table `ap_fxtb`
--
ALTER TABLE `ap_fxtb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ap_jilu`
--
ALTER TABLE `ap_jilu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ap_kamifx`
--
ALTER TABLE `ap_kamifx`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `ap_login_code`
--
ALTER TABLE `ap_login_code`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `ap_mn`
--
ALTER TABLE `ap_mn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ap_money_get`
--
ALTER TABLE `ap_money_get`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ap_opentj`
--
ALTER TABLE `ap_opentj`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `ap_pay`
--
ALTER TABLE `ap_pay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ap_rebate`
--
ALTER TABLE `ap_rebate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ap_sad`
--
ALTER TABLE `ap_sad`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ap_share`
--
ALTER TABLE `ap_share`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ap_shop`
--
ALTER TABLE `ap_shop`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `ap_shopdingdan`
--
ALTER TABLE `ap_shopdingdan`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `ap_stop`
--
ALTER TABLE `ap_stop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ap_tanchuang`
--
ALTER TABLE `ap_tanchuang`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `ap_tixian`
--
ALTER TABLE `ap_tixian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ap_tongji`
--
ALTER TABLE `ap_tongji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ap_tuisong`
--
ALTER TABLE `ap_tuisong`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `ap_tv`
--
ALTER TABLE `ap_tv`
  ADD PRIMARY KEY (`title`);

--
-- Indexes for table `ap_user`
--
ALTER TABLE `ap_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ap_video`
--
ALTER TABLE `ap_video`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ap_zce`
--
ALTER TABLE `ap_zce`
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `ap_zhibo`
--
ALTER TABLE `ap_zhibo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ap_advert`
--
ALTER TABLE `ap_advert`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `ap_banner`
--
ALTER TABLE `ap_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=243;
--
-- AUTO_INCREMENT for table `ap_category`
--
ALTER TABLE `ap_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `ap_dianka`
--
ALTER TABLE `ap_dianka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ap_fxtb`
--
ALTER TABLE `ap_fxtb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `ap_jilu`
--
ALTER TABLE `ap_jilu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ap_kamifx`
--
ALTER TABLE `ap_kamifx`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ap_mn`
--
ALTER TABLE `ap_mn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=426;
--
-- AUTO_INCREMENT for table `ap_money_get`
--
ALTER TABLE `ap_money_get`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ap_opentj`
--
ALTER TABLE `ap_opentj`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ap_pay`
--
ALTER TABLE `ap_pay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ap_rebate`
--
ALTER TABLE `ap_rebate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ap_sad`
--
ALTER TABLE `ap_sad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ap_share`
--
ALTER TABLE `ap_share`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ap_shop`
--
ALTER TABLE `ap_shop`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ap_shopdingdan`
--
ALTER TABLE `ap_shopdingdan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ap_stop`
--
ALTER TABLE `ap_stop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ap_tanchuang`
--
ALTER TABLE `ap_tanchuang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ap_tixian`
--
ALTER TABLE `ap_tixian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ap_tongji`
--
ALTER TABLE `ap_tongji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ap_tuisong`
--
ALTER TABLE `ap_tuisong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ap_user`
--
ALTER TABLE `ap_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ap_video`
--
ALTER TABLE `ap_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `ap_zhibo`
--
ALTER TABLE `ap_zhibo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
