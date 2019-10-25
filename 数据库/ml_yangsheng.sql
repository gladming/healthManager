/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 80012
Source Host           : localhost:3306
Source Database       : ml_yangsheng

Target Server Type    : MYSQL
Target Server Version : 80012
File Encoding         : 65001

Date: 2019-10-25 23:18:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ys_admin`
-- ----------------------------
DROP TABLE IF EXISTS `ys_admin`;
CREATE TABLE `ys_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `login_time` datetime NOT NULL COMMENT '最后登录时间',
  `login_ip` varchar(20) NOT NULL COMMENT '用户登录ip',
  `auth` tinyint(1) NOT NULL DEFAULT '0' COMMENT '权限（0普通管理员1超级管理员）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ys_admin
-- ----------------------------
INSERT INTO `ys_admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2019-10-25 22:03:28', '127.0.0.1', '1');
INSERT INTO `ys_admin` VALUES ('2', 'wang', 'e10adc3949ba59abbe56e057f20f883e', '2019-10-16 10:21:50', '192.168.1.200', '0');

-- ----------------------------
-- Table structure for `ys_jiankanzixun`
-- ----------------------------
DROP TABLE IF EXISTS `ys_jiankanzixun`;
CREATE TABLE `ys_jiankanzixun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issue` varchar(100) NOT NULL,
  `answer` text NOT NULL,
  `images` varchar(100) NOT NULL,
  `add_time` datetime NOT NULL COMMENT '添加时间',
  `add_id` int(11) NOT NULL DEFAULT '0' COMMENT '添加的管理员id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ys_jiankanzixun
-- ----------------------------
INSERT INTO `ys_jiankanzixun` VALUES ('5', ' 经痛怎么办 中医支招解决痛经难题?', '<p>痛经是现在女性的一种常见病，每天都会痛上一至两天，有时候无法工作，严重影响到了健康问题，对于女性痛经该怎么办呢？中医学角度来说，就是气血两瘀，这时该怎样调理痛经呢？下面跟天天养生网小编一起来学习吧。</p><p>　　一、痛经的原因</p><p>　　在中医看来通着不痛，痛则不通。女性出现痛经的原因很复杂，但多和气滞血瘀、宫寒、气虚以及精神方面有关。所以中医调理痛经也多从这方面着手。</p><p>　　1.气滞血瘀导致痛经</p><p>　　因为气滞血瘀导致的痛经常常表现为小腹胀痛，量少，有血块。这往往是由于子宫内淤血流不出的原因造成。正是应证了“痛则不通”这个说法。</p><p>　　2.宫寒导致痛经</p><p>　　宫寒从字面上理解就是子宫寒冷的意思，在日常生活中女性朋友都知道每个月那几天要忌生冷。</p><p>　　先天的脾肾阳虚，后天的生冷食物、受凉等导致体内的寒气积聚、寒湿凝滞，出现痛经和月经失调等妇科问题。</p><p>　　3.气虚和肝肾两虚导致痛经</p><p>　　中医中对气血的解释和现代亚健康的定义很相似，多由于先天不足，后天过度劳累、肾脏功能减退和没有及时调养的原因造成。气虚容易贫血、无力、面色黄，造成的痛经也是绵痛。</p><p>　　很多女性会在经期出现腰酸和腰痛的现象，这多是由于肝肾两虚造成。</p><p>　　4.精神方面</p><p>　　“这份工作让我几个月不来那个了”这句话可能很多人都说过或听说过。女性精神压力大，容易导致内分泌失调，引起月经不调。而同时肝气郁结、情志失调、久坐等也是导致工作女性痛经的一个重要原因。</p><p>&nbsp;</p><p>　　既然我们知道了痛经的原因，那么该如何喝茶来调理女性的月月痛了？</p><p>　　二、调理月月痛的中药茶</p><p>　　喝哪些茶可以治疗痛经，相信每个女性都有自己的秘诀，生姜红糖茶可能是最广泛的选择。我们就从生姜红糖茶开始一一了解可以治疗痛经的茶饮。</p><p>　　1.生姜红糖茶</p><p>　　其制作简单，只需将生姜切丝或切片之后和红糖一同加水煮即可。</p><p>　　生姜属于解表之物，有利用与发散体内寒气。红糖性温，具有“温而补之、温而通之、温而散之”的功效，和生姜一同饮用可以起到温通的功效，起到驱寒、发汗和抗抑郁等功效。适合疑问气滞血瘀、宫寒和精神方面等造成的痛经。</p><p>　　2.玫瑰花茶</p><p>　　玫瑰花大家并不陌生，鲜花店多的是，但是鲜花店中的玫瑰花多为现代月季，和治疗痛经的玫瑰花不同。</p><p>　　玫瑰花具有疏气活血、宣通窒滞等功效，同时玫瑰花和辛辣的宣通药物（如茴香）相比，不会出现燥热。</p><p>　　但女性痛经时喝玫瑰花茶，可以平衡内分泌、补血气、疏肝解郁、行气活血同时还可以缓解神经，起到镇定作用。适合所有情况造成的痛经。</p><p>　　3.益母草茶</p><p>　　益母草又被誉为“女人草”,属于一味中药，但是也可入菜，入汤，制作茶饮。具有改善女人血液循环、增强免疫力的功效。一般可用于女性调血理气、活血祛瘀和养颜补血。对于生产后的女性更为有益。</p><p>　　益母草茶的制作</p><p>　　首先，准备益母草和红枣以1:5的分量，红糖少量（根据自己口感添加）。</p><p>　　其次，将益母草和红枣一同煎水，取第一道水和第二道水合并，饮用之前根据口感加入红糖。</p><p>　　这款益母草茶具有补血温经，祛瘀止痛的功效，适合因为气血虚、宫寒等原因造成痛经。</p><p>　　4.桂圆茶</p><p>　　桂圆也就是水果龙眼晒干之后的成品，其对女人而言具有补益心脾、养气血、增强免疫力，可以用于治疗女性因为肝肾两虚造成的经期腰痛。</p><p>　　同时，桂圆还可以抑制子宫癌细胞，其抑制率超过90%.所以，桂圆是女性专有的抗癌佳品。</p><p>　　桂圆茶的制作非常简单，只需将干桂圆剥壳，利用开水浸泡饮用即可。但是需要注意的是桂圆食用容易上火，每日食用不宜多。</p><div><br></div>', 'upload/1571230538.jpeg', '2019-10-19 13:21:31', '1');
INSERT INTO `ys_jiankanzixun` VALUES ('6', '不运动肌肉会转成脂肪', '<p>不运动肌肉会转成脂肪</p><p>&nbsp; &nbsp; &nbsp; &nbsp;对于那些一周中将3到4天的时间花在体育锻炼上的人来说，如果停止锻炼，这些人的肌肉会变成脂肪吗?养生大师多纳-理查德森-尤尔说：“这种情况是不会发生的。肌肉是肌肉，脂肪是脂肪。这两者之间不会相互转化。”佐治亚州立大学运动科学教授华特-汤普森说，肌肉是一种较为密集的物质，而脂肪则比较密实。当你停止运动时，肌肉会变得有些松弛，但不会转化成脂肪。反过来是否成立呢?很遗憾，体育运动也不会使脂肪转化为肌肉。一个运动俱乐部的成员拉尔-斯兹曼斯克说：“虽然脂肪不会转化成肌肉，但若想拥有发达的肌肉就必须进行拉力锻炼，这样才能去除体内的多余脂肪。”</p>', 'upload/1571230573.jpeg', '2019-10-20 16:43:36', '1');
INSERT INTO `ys_jiankanzixun` VALUES ('7', ' 经常练的瑜伽种类有哪些 哈他瑜伽怎么练?', '　　哈他瑜伽,在哈他这个词中，“哈”的意思是太阳，“他”的意思是月亮。“哈他”代表男与女，日与夜、阴与阳、冷与热、柔与刚，以及其他任何相辅相成的两个对立面的平衡。哈他瑜伽认为，人体包括两个体系，一为精神体系。一为肌体体系。 　　\r\n人的平常思想活动大部分是无序骚乱的，是能力的浪费比如：疲劳、兴奋、哀伤、激动，人体只有一小部分用于维持生命.在通常情况下，如果这种失调现象不太严重时，通过休息便可自然恢复平衡，但是如果不能主动的自我克制和调节，这种失调会日益加剧导致精神和肌体上的疾病。', 'upload/1571230693.jpeg', '2019-10-16 20:58:15', '1');
INSERT INTO `ys_jiankanzixun` VALUES ('8', '长期熬夜会给我们带来哪些危害呢？', '1、免疫力下降\r\n\r\n　　熬夜因为睡眠不足，脑细胞没有得到充分的休息，身体正常的代谢功能受到影响。中医理论表明人体是有着独属于自己的循环，是一个相对独立的系统。但是这个系统又是和其所在的环境相协调的，人的循环是和周围自然界的循环相统一的。十一点到三点是肾脏工作和自身休息，这段时间人必须处于睡眠状态肾脏才能工作，如果不是睡眠状态，肾精就会过度的消耗。导致人体的免疫力大大的下降。', 'upload/1571230752.jpeg', '2019-10-16 20:59:13', '1');
INSERT INTO `ys_jiankanzixun` VALUES ('9', ' 经常戴美瞳会对眼睛带来一些什么样的危害呢？', '1、眼角膜损伤\r\n\r\n　其实经常戴美瞳对眼角膜的损伤是很大的，因为美瞳中含有大量的色素，而且许多美瞳中含有的色素都是直接粘在镜片上的，这样也会或多或少的沾到眼球上。当戴的时间过久的时候，这种色素会脱落，造成眼角膜的损伤，引起眼睛上的炎症。 　　\r\n\r\n2、眼角膜缺氧', 'upload/1571230778.jpeg', '2019-10-16 20:59:39', '1');
INSERT INTO `ys_jiankanzixun` VALUES ('10', '苦奔', '122121212', 'upload/1571232438.jpeg', '2019-10-16 21:27:23', '1');
INSERT INTO `ys_jiankanzixun` VALUES ('11', 'ddd', 'ddddd', 'upload/1571232489.jpeg', '2019-10-16 21:28:13', '1');
INSERT INTO `ys_jiankanzixun` VALUES ('12', '苦奔', 'dasfasf', 'upload/1571232655.jpeg', '2019-10-16 21:31:00', '1');
INSERT INTO `ys_jiankanzixun` VALUES ('13', '444', '4444', 'upload/1571232760.png', '2019-10-16 21:32:46', '1');
INSERT INTO `ys_jiankanzixun` VALUES ('14', '苦奔', '4444', 'upload/1571232821.jpeg', '2019-10-16 21:33:44', '1');
INSERT INTO `ys_jiankanzixun` VALUES ('15', '1212', '121212', 'upload/1571232881.jpeg', '2019-10-16 21:34:44', '1');
INSERT INTO `ys_jiankanzixun` VALUES ('16', 'qqww', 'wwwww', 'upload/1571233243.png', '2019-10-16 21:40:48', '1');
INSERT INTO `ys_jiankanzixun` VALUES ('17', 'qqww', 'wwwww', 'upload/1571233243.png', '2019-10-16 21:40:50', '1');
INSERT INTO `ys_jiankanzixun` VALUES ('18', 'qqww', 'wwwww', 'upload/1571233243.png', '2019-10-16 21:40:51', '1');
INSERT INTO `ys_jiankanzixun` VALUES ('19', 'qqww', 'wwwww', 'upload/1571233243.png', '2019-10-16 21:40:51', '1');
INSERT INTO `ys_jiankanzixun` VALUES ('20', 'asasa', 'asasa', 'upload/1571233258.jpeg', '2019-10-16 21:41:01', '1');
INSERT INTO `ys_jiankanzixun` VALUES ('21', 'sadsa', 'asdadada', 'upload/1571233560.jpeg', '2019-10-16 21:46:04', '1');
INSERT INTO `ys_jiankanzixun` VALUES ('22', '苦奔', '<img src=\"upload/1571457493.jpeg\" alt=\"undefined\">12121212121', 'upload/1571457483.jpeg', '2019-10-19 11:58:17', '1');
INSERT INTO `ys_jiankanzixun` VALUES ('23', '苦奔', 'dafadfafafa', 'upload/1571560193.jpeg', '2019-10-20 16:29:58', '1');

-- ----------------------------
-- Table structure for `ys_sangshi`
-- ----------------------------
DROP TABLE IF EXISTS `ys_sangshi`;
CREATE TABLE `ys_sangshi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `images` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ys_sangshi
-- ----------------------------
INSERT INTO `ys_sangshi` VALUES ('1', '沙参山楂粥', 'bpic26.jpg');
INSERT INTO `ys_sangshi` VALUES ('2', '膳食山楂薏苡仁粥', 'bpic27.jpg');
INSERT INTO `ys_sangshi` VALUES ('3', '膳食活血袪湿消暑汤', 'bpic28.jpg');
INSERT INTO `ys_sangshi` VALUES ('4', '膳食小米乳', 'bpic29.jpg');
INSERT INTO `ys_sangshi` VALUES ('5', '鱼头豆腐煲', 'bpic30.jpg');
INSERT INTO `ys_sangshi` VALUES ('6', '冬瓜肉圆', 'bpic31.jpg');
INSERT INTO `ys_sangshi` VALUES ('7', '小吃四果汤', 'bpic32.jpg');
INSERT INTO `ys_sangshi` VALUES ('8', '牛油果思慕雪', 'bpic33.jpg');
INSERT INTO `ys_sangshi` VALUES ('9', '西红柿肉丸汤', 'bpic34.jpg');
INSERT INTO `ys_sangshi` VALUES ('10', '小菜水豆豉拌凉粉', 'bpic35.jpg');

-- ----------------------------
-- Table structure for `ys_shouye`
-- ----------------------------
DROP TABLE IF EXISTS `ys_shouye`;
CREATE TABLE `ys_shouye` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '鏍囬',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '绠€浠?',
  `images` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '封面',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  `add_id` int(11) NOT NULL DEFAULT '0' COMMENT '添加管理员id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ys_shouye
-- ----------------------------
INSERT INTO `ys_shouye` VALUES ('2', '日常膳食养生', '<p><span>大白菜 大白菜，平常菜，老年人，最喜爱。白菜味道鲜美、劳素皆宜，国画大师齐白石先生有一幅大白菜图，独论白菜为“菜中之王”，并赞“百菜不如白菜”。老人常说：“白菜吃半年，大夫享清闲”。可见，常吃白菜有利于祛病延年。大白菜含有矿物质、维生素、蛋白质、粗纤维。从药用功效说，大白菜能养胃55555</span></p>', 'upload/1571466574.jpeg', '2019-10-19 21:46:26', '1');

-- ----------------------------
-- Table structure for `ys_user`
-- ----------------------------
DROP TABLE IF EXISTS `ys_user`;
CREATE TABLE `ys_user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` char(11) NOT NULL COMMENT '手机号',
  `reg_time` datetime NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ys_user
-- ----------------------------
INSERT INTO `ys_user` VALUES ('1', '张三22', 'e10adc3949ba59abbe56e057f20f883e', '15989399346', '2019-10-14 18:11:20');
INSERT INTO `ys_user` VALUES ('2', 'ming', 'e10adc3949ba59abbe56e057f20f883e', '15989399346', '2019-10-14 22:14:25');
INSERT INTO `ys_user` VALUES ('3', 'whm', 'e10adc3949ba59abbe56e057f20f883e', '15989399347', '2019-10-16 00:38:36');

-- ----------------------------
-- Table structure for `ys_user_appointment`
-- ----------------------------
DROP TABLE IF EXISTS `ys_user_appointment`;
CREATE TABLE `ys_user_appointment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT '0' COMMENT '会员id',
  `appointment` int(11) NOT NULL DEFAULT '1' COMMENT '棰勫畾缁勶紙1锛?锛?',
  `add_time` datetime NOT NULL COMMENT '棰勫畾鏃堕棿',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`appointment`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8 COMMENT='会员预定列表';

-- ----------------------------
-- Records of ys_user_appointment
-- ----------------------------
INSERT INTO `ys_user_appointment` VALUES ('35', '3', '5', '2019-10-20 16:09:58');
INSERT INTO `ys_user_appointment` VALUES ('41', '2', '5', '2019-10-24 20:24:22');
INSERT INTO `ys_user_appointment` VALUES ('33', '3', '4', '2019-10-19 17:09:15');
INSERT INTO `ys_user_appointment` VALUES ('34', '3', '6', '2019-10-19 17:09:17');
INSERT INTO `ys_user_appointment` VALUES ('47', '2', '12', '2019-10-25 23:16:27');
INSERT INTO `ys_user_appointment` VALUES ('46', '2', '4', '2019-10-25 22:23:30');
INSERT INTO `ys_user_appointment` VALUES ('38', '3', '7', '2019-10-22 01:29:30');

-- ----------------------------
-- Table structure for `ys_yangshengzhishi`
-- ----------------------------
DROP TABLE IF EXISTS `ys_yangshengzhishi`;
CREATE TABLE `ys_yangshengzhishi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `introduce` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `content` text NOT NULL COMMENT '内容详情',
  `images` varchar(100) NOT NULL,
  `add_time` datetime NOT NULL COMMENT '添加时间',
  `add_id` int(11) NOT NULL DEFAULT '0' COMMENT '添加管理员id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ys_yangshengzhishi
-- ----------------------------
INSERT INTO `ys_yangshengzhishi` VALUES ('5', '银耳莲子粥', '银耳莲子粥是一道美味可口的名点。可以美容养颜，还可以清热解暑。', '<p>银耳莲子粥是一道美味可口的名点。可以美容养颜，还可以清热解暑。而且其中莲子能补脾止泻，益肾固精、养心安神；银耳能提高肝脏解毒能力，保护肝脏功能，它不但能增强机体抗肿瘤的免疫能力，还能增强肿瘤患者对放疗、化疗的耐受力。</p><p><br></p><p>&nbsp;</p><p>制作</p><p>编辑</p><p>红枣银耳莲子汤做法一</p><p>食材准备</p><p>银耳、雪梨、红枣、薏米、莲子、冰糖。</p><p>&nbsp;红枣银耳莲子汤&nbsp;</p><p>制作步骤</p><p>1、银耳泡发后洗净掰成小朵，雪梨去皮切成小块备用；</p><p>2、莲子、薏米、红枣洗净后一起放进慢炖锅里，加入银耳和雪梨及适量冷水，加入两小块冰糖，炖上2个小时即可。</p><p>红枣银耳莲子汤做法二</p><p>食材准备</p><p>银耳、冰糖、莲子、红枣、枸杞</p><p>制作步骤</p><p>1、红枣10分钟洗净备用；</p><p>&nbsp;红枣银耳莲子汤&nbsp;</p><p>2、莲子提前一晚浸泡，泡好后剥开除去里面的黑心，洗净备用；</p><p>3、枸杞泡1分钟后洗净备用；</p><p>4、银耳泡15分钟，待发后，去粗蒂撕成小块备用；</p><p>5、电饭锅加入清水，把莲子和红枣放进去煮1个小时后，加入银耳炖半个小时，加冰糖再炖半个小时，汤比较粘稠时，加入枸杞炖5分钟即可。 [1]&nbsp;&nbsp;</p><p>红枣银耳莲子汤营养成分</p><p>编辑</p><p>红枣银耳莲子汤银耳</p><p>银耳能提高肝脏解毒能力，保护肝脏功能，它不但能增强机体抗肿瘤的免疫能</p><p>银耳&nbsp;</p><p>力，还能增强肿瘤患者对放疗、化疗的耐受力。它也是一味滋补良药，特点是滋润而不腻滞，具有补脾开胃、益气清肠、安眠健胃、补脑、养阴清热、润燥之功，对阴虚火旺不受参茸等温热滋补的病人是一种良好的补品。</p><p>1. 银耳能提高肝脏解毒能力，起保肝作用；银耳对老年慢性支气管炎、肺原性心脏病有一定疗效；</p><p>2. 银耳富含维生素D，能防止钙的流失，对生长发育十分有益；因富含硒等微量元素，它可以增强机体抗肿瘤的免疫力；</p><p>3. 银耳富有天然植物性胶质，加上它的滋阴作用，长期服用可以润肤，并有祛除脸部黄褐斑、雀斑的功效；</p><p>4. 银耳中的有效成分酸性多糖类物质，能增强人体的免疫力，调动淋巴细胞，加强白细胞的吞噬能力，兴奋骨髓造血功能。 [2]&nbsp;&nbsp;</p><p>红枣银耳莲子汤莲子</p><p>1. 防癌抗癌：莲子善于补五脏不足，通利十二经脉气血，使气血畅而不腐，</p><p>&nbsp;莲子&nbsp;</p><p>莲子所含氧化黄心树宁碱对鼻咽癌有抑制作用，这一切，构成了莲子的防癌抗癌的营养保健功能；</p><p>2. 降血压：莲子所含非结晶形生物碱N－9有降血压作用；</p><p>3. 强心安神：莲子芯所含生物碱具有显著的强心作用，莲芯碱则有较强抗钙及抗心律不齐的作用；</p><p>4. 滋养补虚、止遗涩精：莲子中所含的棉子糖，是老少皆宜的滋补品，对于久病、产后或老年体虚者，更是常用营养佳品；莲子碱有平抑性欲的作用，对于青年人梦多，遗精频繁或滑精者，服食莲子有良好的止遗涩精作用。 [3]&nbsp;&nbsp;</p><p>红枣银耳莲子汤红枣</p><p>中医将红枣归於补气药类，称其性味甘平，有润心肺、止咳、补五脏、治虚损的功效，於胃肠道功能不佳的蠕动力弱及消化吸收功能差时，就很适合常吃红枣以改善肠胃不佳功能而增益体力。在精神紧张、心中烦乱、睡眠不安或一般更年期症候群时，中医的处方常配加红枣，主要是红枣有镇静作.</p><p>&nbsp;</p><p><br></p><p>红枣&nbsp;</p><p>用，因此平常如果生活紧张者，不妨在主菜汤中加入一些红枣同食。红枣成份中维他命C含量很高。</p><p>1. 枣能提高人体免疫力，并可抑制癌细胞：药理研究发现，红枣能促进白细胞的生成，降低血清胆固醇，提高血清白蛋白，保护肝脏，红枣中还含有抑制癌细胞，甚至可使癌细胞向正常细胞转化的物质；</p><p>2. 经常食用鲜枣的人很少患胆结石，这是因为鲜枣中丰富的维生素C，使体内多余的胆固醇转变为胆汁酸，胆固醇少了，结石形成的概率也就随之减少；</p><p>3. 枣中富含钙和铁，它们对防治骨质疏松产贫血有重要作用，中老年人更年期经常会骨质疏松，正在生长发育高峰的青少年和女性容易发生贫血，大枣对他们会有十分理想的食疗作用，其效果通常是药物不能比拟的；</p><p>4. 对病后体虚的人也有良好的滋补作用；</p><p>5. 枣所含的芦丁，是一种使血管软化，从而使血压降低的物质，对高血压病有防治功效；</p><p>6. 枣还可以抗过敏、除腥臭怪味、宁心安神、益智健脑、增强食欲。</p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p>红豆薏米粥</p><p><br></p><p>红豆薏米粥是一道以赤小豆、薏米、仙鹤草等作为主要原料制作而成的美食，这道粥制作简单、营养丰富，鲜香可口。有清热利尿作用，因此对浮肿病人也有疗效，还可以防癌，多吃有益身心健康。</p><p>&nbsp;</p><p><br></p><p>食材</p><p>编辑</p><p>1、主料：薏米100克</p><p>辅料：枣（干）25克，赤小豆50克，仙鹤草10克</p><p><br></p><p>&nbsp;</p><p>红豆薏米粥(2张)&nbsp;</p><p>调料：白砂糖30克</p><p>2、赤小豆、薏米、水、冰糖222</p><div><br></div>', 'upload/1571234719.jpeg', '2019-10-20 19:13:12', '1');
INSERT INTO `ys_yangshengzhishi` VALUES ('6', '红豆薏米粥', '红豆薏米粥是一道以赤小豆、薏米、仙鹤草等作为主要原料制作而成的美食，这道粥制作简单、营养丰富，鲜香可口。wqwqwq', '', 'upload/1571234775.jpeg', '2019-10-20 18:12:24', '1');
INSERT INTO `ys_yangshengzhishi` VALUES ('7', '红枣山药粥', '冬季养生调理，补虚养身调理，气血双补调理，老人食谱，延缓衰老调理。', '', 'upload/1571234798.jpeg', '2019-10-16 22:06:39', '1');
INSERT INTO `ys_yangshengzhishi` VALUES ('8', '紫薯小米粥', '紫薯小米粥是一道养生保健的佳品，它具有养胃的作用，还有补血的功能。', '', 'upload/1571234821.jpeg', '2019-10-16 22:07:02', '1');
INSERT INTO `ys_yangshengzhishi` VALUES ('9', '智瑜伽', '智瑜伽认为，知识有低等和高等之别。寻常人所说的知识仅仅局限于生命和物质的外在表现。', '', 'upload/1571234878.jpeg', '2019-10-16 22:08:00', '1');
INSERT INTO `ys_yangshengzhishi` VALUES ('10', '业瑜伽', '业瑜伽，梵文为Karma Yoga，又译作羯磨。业瑜伽本意是指行为本身，而不是行为之后产生的“业”。', '', 'upload/1571234912.jpeg', '2019-10-16 22:08:34', '1');
INSERT INTO `ys_yangshengzhishi` VALUES ('11', '哈他瑜伽', '哈他瑜伽主要练习如何控制身体和呼吸，更深一层的效果是使身体各机能有序运转，从而使心灵获得宁静，变得祥和。', '', 'upload/1571234943.jpeg', '2019-10-16 22:09:04', '1');
INSERT INTO `ys_yangshengzhishi` VALUES ('12', '王瑜伽', '王瑜伽重视冥想与调息。是印度的印度教修行者通往精神世界的主流之路。', '', 'upload/1571234965.jpeg', '2019-10-16 22:09:27', '1');

-- ----------------------------
-- Table structure for `ys_yuding`
-- ----------------------------
DROP TABLE IF EXISTS `ys_yuding`;
CREATE TABLE `ys_yuding` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course` varchar(100) NOT NULL COMMENT '课程名称',
  `start_time` char(10) NOT NULL COMMENT '寮€濮嬫椂闂?',
  `end_time` char(10) NOT NULL COMMENT '缁撴潫鏃堕棿',
  `price` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `images` varchar(100) NOT NULL COMMENT '封面',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  `add_id` int(11) NOT NULL COMMENT '添加管理员id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ys_yuding
-- ----------------------------
INSERT INTO `ys_yuding` VALUES ('4', '智瑜伽', '11: 40', '12:35', '200.00', 'upload/1571226850.jpeg', '2019-10-16 19:56:21', '1');
INSERT INTO `ys_yuding` VALUES ('5', '节奏瑜伽', '18:20', '19:35', '200.00', 'upload/1571226992.jpeg', '2019-10-16 19:57:06', '1');
INSERT INTO `ys_yuding` VALUES ('6', '哈他瑜伽', '11:40', '12:35', '200.00', 'upload/1571227046.jpeg', '2019-10-16 19:57:57', '1');
INSERT INTO `ys_yuding` VALUES ('7', '流程瑜伽', '18:20', '17:35', '200.00', 'upload/1571227095.jpeg', '2019-10-16 19:58:57', '1');
INSERT INTO `ys_yuding` VALUES ('8', '力量瑜伽', '11:40', '12:35', '200.00', 'upload/1571227264.jpeg', '2019-10-16 20:01:06', '1');
INSERT INTO `ys_yuding` VALUES ('9', '瘦身瑜伽', '11:40', '12:35', '200.00', 'upload/1571227476.jpeg', '2019-10-16 20:04:48', '1');
INSERT INTO `ys_yuding` VALUES ('10', '艾扬格瑜伽', '11:40', '12:35', '200.00', 'upload/1571227499.jpeg', '2019-10-16 20:05:18', '1');
INSERT INTO `ys_yuding` VALUES ('11', '孕瑜伽', '18:20', '19:35', '200.00', 'upload/1571227526.jpeg', '2019-10-16 20:05:41', '1');
INSERT INTO `ys_yuding` VALUES ('12', '埋索尔瑜伽', '18:20', '19:35', '200.00', 'upload/1571227551.jpeg', '2019-10-16 20:06:11', '1');
INSERT INTO `ys_yuding` VALUES ('13', '热瑜伽', '18:20', '19:35', '200.00', 'upload/1571227578.jpeg', '2019-10-16 20:06:34', '1');
INSERT INTO `ys_yuding` VALUES ('14', '334444', '15:20', '19:10', '600.00', 'upload/1571468504.jpeg', '2019-10-19 15:01:50', '1');
