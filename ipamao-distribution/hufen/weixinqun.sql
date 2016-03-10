/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50538
Source Host           : localhost:3306
Source Database       : cjrmgj

Target Server Type    : MYSQL
Target Server Version : 50538
File Encoding         : 65001

Date: 2015-09-05 16:49:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `weixinqun`
-- ----------------------------
DROP TABLE IF EXISTS `weixinqun`;
CREATE TABLE `weixinqun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `wxid` varchar(30) DEFAULT NULL,
  `upnum` tinyint(4) DEFAULT '0',
  `uptime` int(11) DEFAULT '0',
  `sex` tinyint(4) NOT NULL,
  `photoimg` text,
  `codeimg` text,
  `addr` varchar(255) DEFAULT NULL,
  `prov` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `miaoshu` text,
  `cdate` varchar(255) DEFAULT NULL,
  `uid` char(30) NOT NULL DEFAULT '' COMMENT 'ç”¨æˆ·çš„ID å¾®ä¿¡openid',
  `shuaxin2` tinyint(2) NOT NULL DEFAULT '0' COMMENT 'åˆ·æ–°çŠ¶æ€',
  `listorder` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3059 DEFAULT CHARSET=utf8 DELAY_KEY_WRITE=1;

-- ----------------------------
-- Records of weixinqun
-- ----------------------------
INSERT INTO `weixinqun` VALUES ('3057', '心疼的人只有自己', '', '0', '0', '2', 'http://wx.qlogo.cn/mmopen/PiajxSqBRaEInWPosJVia6iax46Jib71XdtGypWjXBuEyCbFTqx9vR27vibwKz3Np7Uial3IAiallakPz0lAU7jJLpBtw/0', 'upload/1441434761a.jpg', '', '广东', '东莞', '加我，教你爆机方法', '2015-09-05 14:33:11', 'o-kiot41gj16STcd3yCd2hXp1ERM', '0', '0');
INSERT INTO `weixinqun` VALUES ('3047', '有人＠了我', '', '0', '0', '1', 'http://wx.qlogo.cn/mmopen/prnib7urmCsGOpw7VKrI12AfdPE0FW5RM039w5uXYPccQt8RjjzLxLdDwBWjfltNS5bBhqGSUiapZfpyu3G0npPxDKy7xJ2QCZ/0', 'upload/1441360779a.jpg', '', '浙江', '杭州', '我来了', '2015-09-04 18:00:04', 'o-kiot_SPH9MoLh0QeOXX-V7aP34', '0', '0');
INSERT INTO `weixinqun` VALUES ('3048', '夜猫', '', '0', '0', '2', 'http://wx.qlogo.cn/mmopen/ZF5eJRQ014Yfdo6rVNxwvU0Yf2Nl4qG5Hmiblc2D84aVzjxjpgSDqt9Q797I67pOfx6trg2elF5dwl2Gibdqw54JVDygpLC16k/0', 'upload/1441365644a.jpg', '', '江苏', '南通', '新手微商必备，想知道的加我，不会让你失望。', '2015-09-04 19:21:28', 'o-kiot-KcmLOMwBlwQhby-0R20Es', '0', '0');
INSERT INTO `weixinqun` VALUES ('3049', 'BBT', '173343400', '3', '1441423510', '1', 'http://wx.qlogo.cn/mmopen/I1YzhXxW8YBXhCvDHHUmQNvYMJolVcNI8a2KbRr3WwIZC9xxnSUzfsz5ARguG0mpHib1WfBOFSwLr5SrkCWGNYSqYgrQ8k34U/0', 'upload/1441368357a.jpg', '', '北京', '东城区', '你好！我最近在投资一个互联网金融复利理财项目！只需要一次性投资800元！如果做静态什么都不用管每天有8块钱的利润！如果是做市场动态只要努力3-6个月每天的收入会超过10000元以上！投资800元如何做到在3-6个月每一天都有10000万以上的收入？并且是0风险', '2015-09-04 20:06:28', 'o-kiotwtLDAo7lMn_DpMETihiFk8', '0', '0');
INSERT INTO `weixinqun` VALUES ('3050', '轩轩妈咪', '', '0', '0', '2', 'http://wx.qlogo.cn/mmopen/I1YzhXxW8YBXhCvDHHUmQOIUnCicf3ibQMKV1Bv3xZsyeGIIEqCIwaLg4R9XfhjsljnMAcMZdASpWYzJcjzXibnsFLNwdUNbFbt/0', 'upload/1441382257a.png', '', '上海', '青浦区', '宝妈交流群，进群加群主不加秒踢', '2015-09-04 23:58:11', 'o-kiot1zBGzeMwfsoOmnvOpnGkTk', '0', '0');
INSERT INTO `weixinqun` VALUES ('3051', '', '', '0', '0', '2', 'http://wx.qlogo.cn/mmopen/2vu7VicpG6HSlrcOBx3TGrw3XPvH3v3PicLzHJ9AOTicNsp62qtS6y1PPGibiaeDpnehTF6YGQyco9szY0begYjS0EA/0', 'upload/1441387069a.jpg', '', '广东', '广州', '加我教你两个小时快速加1500的活粉丝', '2015-09-05 01:19:05', 'o-kiot_PuOeKniA2ZLgiJqRKxn2I', '0', '0');
INSERT INTO `weixinqun` VALUES ('3052', 'A◕ฺ‿◕ฺ✿ฺ)小木娘', '', '0', '0', '2', 'http://wx.qlogo.cn/mmopen/I1YzhXxW8YCw535Guo2h7nqaDn1vzTQZKsWTzVhGkSOPSCJ1Uao9FrV3Hte0viasfV4icstbL7AK0XRhVicJvibaEA/0', 'upload/1441405604a.jpg', '', '黑龙江', '牡丹江', '招代理的加', '2015-09-05 06:28:22', 'o-kiot_yqwO6GJ0VucCcjcYJR39k', '0', '0');
INSERT INTO `weixinqun` VALUES ('3053', '向日葵', '', '0', '0', '2', 'http://wx.qlogo.cn/mmopen/ZF5eJRQ014aXrAdrpfP9etE1eAXpmZkg7DN8H5WiaHSXfdOPqbdtrNGibLTO7ibAzZCqDwT6HYCFzq2wcOsJHpcPpuiaQcbRAlIE/0', 'upload/1441417138a.jpg', '', '浙江', '宁波', '    没有做不到的     只有想不到的。  进群加群主。  ', '2015-09-05 09:39:57', 'o-kiot04NFhLfj9Wppaz1kpyUFyY', '0', '0');
INSERT INTO `weixinqun` VALUES ('3054', 'boom', '', '0', '0', '2', 'http://wx.qlogo.cn/mmopen/ZF5eJRQ014ZV66Q1DdOvMtuM4piaSIfaRh3ZxGC5AQhuXfHWNXnI0IbANR5PSK6GC3vVAaujjobtjTHfz1yPQQ4b7KeW2s8lu/0', 'upload/1441419794a.jpg', '', '四川', '绵阳', '招零食代理，带你装逼带你飞', '2015-09-05 10:24:38', 'o-kiot2LNzb8FF-Z_pnY3lsQ-EWU', '0', '0');
INSERT INTO `weixinqun` VALUES ('3055', '99566', '', '0', '0', '1', 'upload/1441420440a.jpg', 'upload/1441420355a.jpeg', '', '新疆', '乌鲁木齐', '咯哦OK啦', '2015-09-05 10:34:04', 'o-kiotymgDQbSV-UOX2yiGpr72iM', '0', '0');
INSERT INTO `weixinqun` VALUES ('3056', '叶子', '', '0', '0', '2', 'http://wx.qlogo.cn/mmopen/prnib7urmCsEZ5ANqwSAyiaaxASlzwISUCSH8ctXmPrYPvx2oNib7AkPcLTn481TibRBS6Ar6MLKickic7c9T5icbib6fHeXPk5m12ibO/0', 'upload/1441421656a.jpg', '', '安徽', '合肥', '宝妈求带', '2015-09-05 10:54:40', 'o-kiot7SFVxpHJcrjFxnuhVP1NQ0', '0', '0');
INSERT INTO `weixinqun` VALUES ('3058', '笛梵晓平', '', '2', '1441442501', '2', 'upload/1441441595a.jpg', 'upload/1441441561a.jpg', '', '河南', '郑州', '进群加群主，不加秒踢！', '2015-09-05 16:27:52', 'o-kiot3KopmsavFjkE0AHwNwKZGg', '3', '0');
