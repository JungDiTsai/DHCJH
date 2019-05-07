-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1:3306
-- 產生時間： 2019-05-07 03:31:42
-- 伺服器版本: 5.7.23
-- PHP 版本： 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `cd106g1`
--

-- --------------------------------------------------------

--
-- 資料表結構 `administrator`
--

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE IF NOT EXISTS `administrator` (
  `adminNo` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理員編號',
  `adminName` varchar(15) NOT NULL COMMENT '管理員名稱',
  `adminId` varchar(20) NOT NULL COMMENT '管理員帳號',
  `adminPsw` varchar(15) NOT NULL COMMENT '管理員密碼',
  `adminPer` varchar(20) NOT NULL COMMENT '管理員權限',
  `adminStatus` varchar(20) NOT NULL COMMENT '管理員狀態',
  PRIMARY KEY (`adminNo`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `administrator`
--

INSERT INTO `administrator` (`adminNo`, `adminName`, `adminId`, `adminPsw`, `adminPer`, `adminStatus`) VALUES
(1, '菜種迪', '   test', 'test', '一般', '啟用'),
(2, '陽具與', ' hall', 'hall', '最高', '啟用'),
(3, '紅晚奇', 'test3', 'test3', '最高', '啟用'),
(4, '猴漸層', 'test4', 'test4', '最高', '啟用'),
(20, '員工', ' acc', 'acc', '最高', '停用');

-- --------------------------------------------------------

--
-- 資料表結構 `audio`
--

DROP TABLE IF EXISTS `audio`;
CREATE TABLE IF NOT EXISTS `audio` (
  `audioNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '音響編號',
  `audioName` varchar(15) NOT NULL COMMENT '音響名稱',
  `audioPrice` int(10) NOT NULL COMMENT '單價',
  `audioImgUrl` varchar(100) NOT NULL COMMENT '音響圖片',
  `audioStatus` varchar(3) NOT NULL COMMENT '音響狀態',
  PRIMARY KEY (`audioNo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `audio`
--

INSERT INTO `audio` (`audioNo`, `audioName`, `audioPrice`, `audioImgUrl`, `audioStatus`) VALUES
(2, '鄰居會罵型', 8000, 'images/customized/cust_stage_audioAndPole/audio_01.png', '啟用'),
(3, '震耳欲聾型', 11000, 'images/customized/cust_stage_audioAndPole/audio_02.png', '啟用'),
(4, '毀天滅地型', 15000, 'images/customized/cust_stage_audioAndPole/audio_03.png', '啟用');

-- --------------------------------------------------------

--
-- 資料表結構 `binform`
--

DROP TABLE IF EXISTS `binform`;
CREATE TABLE IF NOT EXISTS `binform` (
  `binformNo` int(11) NOT NULL AUTO_INCREMENT COMMENT '選美檢舉編號',
  `orderNo` int(11) NOT NULL COMMENT '訂單編號',
  `memNo` int(11) NOT NULL COMMENT '檢舉人會員編號',
  `informReason` varchar(50) NOT NULL COMMENT '檢舉原因',
  `informStatus` varchar(4) NOT NULL COMMENT '檢舉狀態',
  `binformWay` varchar(3) NOT NULL COMMENT '處理方式',
  PRIMARY KEY (`binformNo`),
  KEY `memNo_FK2` (`memNo`),
  KEY `orderNo_FK` (`orderNo`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `binform`
--

INSERT INTO `binform` (`binformNo`, `orderNo`, `memNo`, `informReason`, `informStatus`, `binformWay`) VALUES
(1, 2, 2, '嚴重抄襲我的花車', '已處理', '下架'),
(2, 5, 4, '看起來怪怪的', '已處理', '無'),
(3, 10, 4, '嚴重抄襲欸', '未處理', '無'),
(4, 2, 2, '沒品的人用沒品的花車', '已處理', '下架'),
(10, 9, 2, '好無聊哦這個人', '未處理', '無'),
(17, 1, 10, '不知道為什麼', '未處理', '無'),
(23, 24, 10, '不知道為什麼', '未處理', '無'),
(26, 1, 10, '奇怪', '未處理', '無'),
(27, 1, 1, '你好', '未處理', '無'),
(29, 1, 1, '大家好', '未處理', '無'),
(30, 1, 10, '大舞台', '未處理', '無'),
(31, 5, 10, '挖空心思遮掩', '未處理', '無'),
(32, 24, 10, '我覺得破圖', '未處理', '無'),
(33, 1, 10, '誰能用真心來道歉', '未處理', '無'),
(36, 34, 1, 'null', '未處理', '無'),
(37, 28, 2, 'null', '未處理', '無'),
(38, 11, 1, '太美了', '未處理', '無'),
(39, 27, 16, '你的這一台車，過度裸露呢', '已處理', '下架'),
(40, 27, 16, '太可愛', '已處理', '下架');

-- --------------------------------------------------------

--
-- 資料表結構 `calendar`
--

DROP TABLE IF EXISTS `calendar`;
CREATE TABLE IF NOT EXISTS `calendar` (
  `hostNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '主持人編號',
  `startDate` date NOT NULL COMMENT '非空檔開始日期',
  `endDate` date NOT NULL COMMENT '非空檔結束日期',
  `reason` varchar(10) NOT NULL COMMENT '非空檔原因',
  PRIMARY KEY (`hostNo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `collection`
--

DROP TABLE IF EXISTS `collection`;
CREATE TABLE IF NOT EXISTS `collection` (
  `memNo` int(10) NOT NULL COMMENT '會員編號',
  `orderNo` int(10) NOT NULL COMMENT '訂單編號',
  PRIMARY KEY (`memNo`,`orderNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `collection`
--

INSERT INTO `collection` (`memNo`, `orderNo`) VALUES
(2, 1),
(2, 17),
(2, 36),
(3, 3),
(10, 10),
(10, 26),
(12, 3),
(13, 21),
(16, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `couponsType` int(11) NOT NULL AUTO_INCREMENT COMMENT '優惠券種類',
  `couponsName` varchar(15) NOT NULL COMMENT '優惠券名稱',
  `discount` int(5) NOT NULL COMMENT '折扣金額',
  `status` varchar(3) NOT NULL,
  PRIMARY KEY (`couponsType`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `coupons`
--

INSERT INTO `coupons` (`couponsType`, `couponsName`, `discount`, `status`) VALUES
(1, '折價券500元       ', 500, '啟用'),
(2, '折價券1000元       ', 1000, '啟用'),
(3, '折價券1200元', 1200, '啟用'),
(4, '折價券1500元', 1500, '啟用'),
(5, '折價券1000元       ', 1000, '啟用');

-- --------------------------------------------------------

--
-- 資料表結構 `draw`
--

DROP TABLE IF EXISTS `draw`;
CREATE TABLE IF NOT EXISTS `draw` (
  `drawNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '內塗裝編號',
  `drawName` varchar(15) NOT NULL COMMENT '內塗裝名稱',
  `drawImgUrl` varchar(100) NOT NULL COMMENT '內塗裝圖片',
  `drawPrice` varchar(20) NOT NULL COMMENT '單價',
  `drawStatus` varchar(20) NOT NULL COMMENT '狀態',
  PRIMARY KEY (`drawNo`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `draw`
--

INSERT INTO `draw` (`drawNo`, `drawName`, `drawImgUrl`, `drawPrice`, `drawStatus`) VALUES
(5, '  新年快樂', 'images/customized/cust_stage_innerPattern/cust_stage_pattern_01.png', '10000', '啟用'),
(6, '霓虹骷髏', 'images/customized/cust_stage_innerPattern/cust_stage_pattern_02.jpg', '10000', '啟用'),
(7, '快樂城堡', 'images/customized/cust_stage_innerPattern/cust_stage_pattern_03.png', '10000', '啟用'),
(8, '絢麗霓虹', 'images/customized/cust_stage_innerPattern/cust_stage_pattern_04.jpg', '10000', '啟用'),
(9, '在地意象', 'images/customized/cust_stage_innerPattern/cust_stage_pattern_05.jpg', '10000', '啟用'),
(10, '飛馬奔騰', 'images/customized/cust_stage_innerPattern/cust_stage_pattern_06.png', '10000', '啟用'),
(11, '繽紛愛心', 'images/customized/cust_stage_innerPattern/cust_stage_pattern_07.jpg', '10000', '啟用'),
(12, ' 日本動漫', 'images/customized/cust_stage_innerPattern/cust_stage_pattern_08.jpg', '10000', '停用');

-- --------------------------------------------------------

--
-- 資料表結構 `effects`
--

DROP TABLE IF EXISTS `effects`;
CREATE TABLE IF NOT EXISTS `effects` (
  `effectsNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '特效設備編號',
  `effectsName` varchar(15) NOT NULL COMMENT '特效設備名稱',
  `effectsPrice` int(10) NOT NULL COMMENT '單價',
  `effectsImgUrl` varchar(150) NOT NULL COMMENT '特效設備圖片',
  `effectsStatus` varchar(3) NOT NULL COMMENT '狀態',
  `effectsGif` varchar(100) NOT NULL,
  PRIMARY KEY (`effectsNo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `effects`
--

INSERT INTO `effects` (`effectsNo`, `effectsName`, `effectsPrice`, `effectsImgUrl`, `effectsStatus`, `effectsGif`) VALUES
(2, '火焰之舞', 3000, 'images/customized/cust_stage_effect/effects_01.png', '啟用', 'images/fire1.gif'),
(3, '火力四射', 5000, 'images/customized/cust_stage_effect/effects_02.png', '啟用', 'images/fire4.gif'),
(4, '火力全開', 7000, 'images/customized/cust_stage_effect/effects_03.png', '啟用', 'images/fire5.gif');

-- --------------------------------------------------------

--
-- 資料表結構 `finform`
--

DROP TABLE IF EXISTS `finform`;
CREATE TABLE IF NOT EXISTS `finform` (
  `finformNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '宣傳單檢舉編號',
  `flyerNo` int(10) DEFAULT NULL COMMENT '宣傳單編號',
  `memNo` int(10) NOT NULL COMMENT '檢舉人會員編號',
  `informReason` varchar(50) NOT NULL COMMENT '檢舉原因',
  `informStatus` varchar(5) NOT NULL COMMENT '檢舉狀態 ',
  `finformWay` varchar(3) NOT NULL COMMENT '處理方式',
  PRIMARY KEY (`finformNo`),
  KEY `flyerNo_FK` (`flyerNo`),
  KEY `memNo_FK5` (`memNo`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `finform`
--

INSERT INTO `finform` (`finformNo`, `flyerNo`, `memNo`, `informReason`, `informStatus`, `finformWay`) VALUES
(1, 10, 1, '看了就讓人不高興', '已處理', '下架'),
(2, 3, 2, '內容不雅', '未處理', '無'),
(3, 11, 2, '血腥圖片', '未處理', '無'),
(4, 1, 4, '不當廣告', '未處理', '無'),
(19, NULL, 2, '不雅', '未處理', '無'),
(20, 2, 2, '不好...', '未處理', '無'),
(21, 11, 2, '0..0', '未處理', '無'),
(22, 7, 2, '0.0', '未處理', '無'),
(23, 12, 11, 'null', '未處理', '無'),
(24, 9, 11, '我討厭狗', '已處理', '下架'),
(25, 24, 16, 'null', '已處理', '下架'),
(26, 24, 27, '有礙觀瞻', '已處理', '下架'),
(27, 24, 16, '可怕', '已處理', '下架'),
(28, 24, 16, 'QRCODE位置怪怪的', '已處理', '下架'),
(29, 24, 16, '不雅', '已處理', '下架');

-- --------------------------------------------------------

--
-- 資料表結構 `fireworks`
--

DROP TABLE IF EXISTS `fireworks`;
CREATE TABLE IF NOT EXISTS `fireworks` (
  `fireworkNo` int(10) NOT NULL AUTO_INCREMENT,
  `fireworkName` varchar(15) NOT NULL,
  `fireworkPrice` int(10) NOT NULL,
  `fireworkImgUrl` varchar(150) NOT NULL,
  `fireworkStatus` varchar(3) NOT NULL,
  PRIMARY KEY (`fireworkNo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `fireworks`
--

INSERT INTO `fireworks` (`fireworkNo`, `fireworkName`, `fireworkPrice`, `fireworkImgUrl`, `fireworkStatus`) VALUES
(1, '雷霆萬鈞', 13000, 'images/customized/cust_stage_effect/firework_01.png', '啟用'),
(2, '萬紫千紅', 18000, 'images/customized/cust_stage_effect/firework_02.png', '啟用'),
(3, '龍翔九天', 22000, 'images/customized/cust_stage_effect/firework_03.png', '啟用');

-- --------------------------------------------------------

--
-- 資料表結構 `flyer`
--

DROP TABLE IF EXISTS `flyer`;
CREATE TABLE IF NOT EXISTS `flyer` (
  `flyerNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '宣傳單編號',
  `orderNo` int(10) NOT NULL COMMENT 'orderNo',
  `flyerImgUrl` varchar(40) NOT NULL COMMENT '上傳圖片',
  `peopleNumber` int(11) NOT NULL DEFAULT '0' COMMENT '人數統計',
  `flyeStatus` int(1) NOT NULL DEFAULT '1' COMMENT '宣傳單狀態',
  `flyeDate` date DEFAULT NULL COMMENT ' 宣傳單活動日期',
  `flyeradd` varchar(150) DEFAULT NULL COMMENT '宣傳單地址',
  `peopleStatus` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否要使用人數功能',
  `flyerText` varchar(150) DEFAULT NULL COMMENT '宣傳單內容',
  PRIMARY KEY (`flyerNo`),
  KEY `orderNo_FK3` (`orderNo`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `flyer`
--

INSERT INTO `flyer` (`flyerNo`, `orderNo`, `flyerImgUrl`, `peopleNumber`, `flyeStatus`, `flyeDate`, `flyeradd`, `peopleStatus`, `flyerText`) VALUES
(1, 1, 'images/flyer/member_11.jpg', 306, 1, '2019-05-16', '新北市新店區新店路', 1, '以車為主題之遊樂園，從小朋友喜歡的兒童汽車及舞台活動更邀請到波力、MOMO哥哥姐姐們及BabyBoss職業體驗城等知名卡童玩偶陪伴大家一起玩樂，感受這歡樂愉快的氣氛吧'),
(2, 2, 'images/flyer/member_2.png', 306, 1, '2019-05-23', '新北市新店區新店路', 1, '將於5月23日晚間在市政府前的市民廣場舉行，晚會當天邀請到重量級主持人主持，還有知名藝人輪番上台勁歌熱舞，將臺北的夜空點綴得更加亮麗耀眼。'),
(3, 3, 'images/flyer/member_1.jpg', 1030, 1, '2019-05-23', '台北市萬華區康定路173巷', 1, '剝皮寮歷史街區位於臺灣臺北市萬華區，北臨老松國小，東至昆明街，南面廣州街，西接康定路，為臺北市今日碩果僅存的清代街道之一，臺北市政府於2010年3月29日公告登錄為歷史建築。'),
(4, 4, 'images/flyer/member_4.jpg', 307, 1, '2019-05-16', '新北市新店區新店路', 1, '以車為主題之遊樂園，從小朋友喜歡的兒童汽車及舞台活動更邀請到波力、MOMO哥哥姐姐們及BabyBoss職業體驗城等知名卡童玩偶陪伴大家一起玩樂，感受這歡樂愉快的氣氛吧'),
(5, 5, 'images/flyer/member_5.jpg', 305, 1, '2019-05-23', '新北市新店區新店路', 1, '將於5月23日晚間在市政府前的市民廣場舉行，晚會當天邀請到重量級主持人主持，還有知名藝人輪番上台勁歌熱舞，將臺北的夜空點綴得更加亮麗耀眼。'),
(6, 6, 'images/flyer/member_6.jpg', 1032, 1, '2019-05-23', '台北市萬華區康定路173巷', 1, '剝皮寮歷史街區位於臺灣臺北市萬華區，北臨老松國小，東至昆明街，南面廣州街，西接康定路，為臺北市今日碩果僅存的清代街道之一，臺北市政府於2010年3月29日公告登錄為歷史建築。'),
(7, 7, 'images/flyer/member_7.jpg', 307, 1, '2019-05-16', '新北市新店區新店路', 1, '以車為主題之遊樂園，從小朋友喜歡的兒童汽車及舞台活動更邀請到波力、MOMO哥哥姐姐們及BabyBoss職業體驗城等知名卡童玩偶陪伴大家一起玩樂，感受這歡樂愉快的氣氛吧'),
(8, 8, 'images/flyer/member_8.png', 305, 1, '2019-05-23', '新北市新店區新店路', 1, '將於5月23日晚間在市政府前的市民廣場舉行，晚會當天邀請到重量級主持人主持，還有知名藝人輪番上台勁歌熱舞，將臺北的夜空點綴得更加亮麗耀眼。'),
(9, 9, 'images/flyer/member_9.png', 1029, 0, '2019-05-23', '台北市萬華區康定路173巷', 1, '剝皮寮歷史街區位於臺灣臺北市萬華區，北臨老松國小，東至昆明街，南面廣州街，西接康定路，為臺北市今日碩果僅存的清代街道之一，臺北市政府於2010年3月29日公告登錄為歷史建築。'),
(10, 10, 'images/flyer/member_10.png', 307, 0, '2019-05-16', '新北市新店區新店路', 1, '以車為主題之遊樂園，從小朋友喜歡的兒童汽車及舞台活動更邀請到波力、MOMO哥哥姐姐們及BabyBoss職業體驗城等知名卡童玩偶陪伴大家一起玩樂，感受這歡樂愉快的氣氛吧'),
(11, 11, 'images/flyer/member_11.jpg', 307, 1, '2019-05-23', '新北市新店區新店路', 1, '將於5月23日晚間在市政府前的市民廣場舉行，晚會當天邀請到重量級主持人主持，還有知名藝人輪番上台勁歌熱舞，將臺北的夜空點綴得更加亮麗耀眼。'),
(12, 12, 'images/flyer/member_12.png', 1033, 0, '2019-05-23', '台北市萬華區康定路173巷', 1, '剝皮寮歷史街區位於臺灣臺北市萬華區，北臨老松國小，東至昆明街，南面廣州街，西接康定路，為臺北市今日碩果僅存的清代街道之一，臺北市政府於2010年3月29日公告登錄為歷史建築。'),
(18, 16, 'images/flyer/member_16.jpg', 0, 1, '2019-05-16', 'place', 1, 'content'),
(19, 17, 'images/flyer/member_17.jpg', 0, 0, '2019-05-01', 'place', 1, 'content'),
(20, 18, 'images/flyer/member_18.jpg', 0, 1, '2019-05-04', '京城酒店', 1, 'content'),
(21, 23, 'images/flyer/member_23.jpg', 0, 0, '2019-05-05', '中央大學', 0, '我哩機勒活動檢有水溝牛阿'),
(23, 25, 'images/flyer/member_25.jpg', 0, 1, '2019-05-02', '客製化宣傳單', 1, 'content'),
(24, 26, 'images/flyer/member_26.jpg', 1, 0, '2019-05-31', '蠟筆小新家', 0, '小白～小白～'),
(25, 27, 'images/flyer/member_27.jpg', 1, 1, '2020-01-10', '總統府', 1, '慶幸自己不是黨員'),
(26, 28, 'images/flyer/member_28.jpg', 0, 1, '2019-05-24', '高雄市政府', 1, '貨出得去，人進得來，\n高雄發大財'),
(28, 29, 'images/flyer/member_29.jpg', 1, 1, '2019-05-16', '中壢好事多', 1, '好事多大舞台全面商品免費放送'),
(29, 30, 'images/flyer/member_30.jpg', 0, 1, '2019-05-25', '全聯福利中心', 1, '全聯福利中心天天得第一'),
(30, 38, 'images/flyer/member_38.jpg', 0, 1, '2019-05-04', '中壢資策會', 1, '台灣大舞台為您到府服務'),
(31, 39, 'images/flyer/member_39.jpg', 0, 1, '2019-05-06', '中壢火車站', 1, '快來喔');

-- --------------------------------------------------------

--
-- 資料表結構 `flyimg`
--

DROP TABLE IF EXISTS `flyimg`;
CREATE TABLE IF NOT EXISTS `flyimg` (
  `flyNo` int(20) NOT NULL AUTO_INCREMENT COMMENT '宣傳單編號',
  `flyTitle` varchar(20) NOT NULL COMMENT '宣傳單標題',
  `flyImg` varchar(40) NOT NULL COMMENT '宣傳單圖片',
  `flyStatus` varchar(20) NOT NULL COMMENT '宣傳單狀態',
  PRIMARY KEY (`flyNo`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `flyimg`
--

INSERT INTO `flyimg` (`flyNo`, `flyTitle`, `flyImg`, `flyStatus`) VALUES
(11, '預設1', 'images/flyerimg/1.jpg', '啟用'),
(12, '預設2', 'images/flyerimg/2.jpg', '停用'),
(13, '預設3', 'images/flyerimg/3.jpg', '啟用'),
(14, '預設4', 'images/flyerimg/4.jpg', '啟用'),
(15, '預設5', 'images/flyerimg/5.jpg', '啟用'),
(16, '預設6', 'images/flyerimg/6.jpg', '啟用'),
(17, '預設7', 'images/flyerimg/7.jpg', '啟用'),
(18, '預設8', 'images/flyerimg/8.jpg', '啟用'),
(19, '預設9', 'images/flyerimg/9.jpg', '啟用'),
(20, '預設10', 'images/flyerimg/10.jpg', '啟用');

-- --------------------------------------------------------

--
-- 資料表結構 `host`
--

DROP TABLE IF EXISTS `host`;
CREATE TABLE IF NOT EXISTS `host` (
  `hostNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '主持人編號',
  `hostName` varchar(15) NOT NULL COMMENT '主持人姓名',
  `hostTel` varchar(11) NOT NULL COMMENT '主持人電話',
  `hostContent` varchar(100) NOT NULL COMMENT '主持人介紹',
  `hostA` int(3) NOT NULL COMMENT '能力值A',
  `hostB` int(3) NOT NULL COMMENT '能力值B',
  `hostC` int(3) NOT NULL COMMENT '能力值C',
  `hostD` int(3) NOT NULL COMMENT '能力值D',
  `hostE` int(3) NOT NULL COMMENT '能力值E',
  `hostF` int(3) NOT NULL COMMENT '能力值F',
  `price` int(10) NOT NULL COMMENT '價格',
  `hostImgUrl` varchar(40) NOT NULL COMMENT '主持人圖片',
  `hostStatus` varchar(20) NOT NULL COMMENT '主持人狀態',
  PRIMARY KEY (`hostNo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `host`
--

INSERT INTO `host` (`hostNo`, `hostName`, `hostTel`, `hostContent`, `hostA`, `hostB`, `hostC`, `hostD`, `hostE`, `hostF`, `price`, `hostImgUrl`, `hostStatus`) VALUES
(4, '王春嬌', '0925712976', '上百場廟會主持經驗<br>岬北宮主任委員', 81, 76, 50, 98, 40, 31, 6000, 'images/customized/host/host_01.jpg', '啟用'),
(5, '陳阿美', '0925712976', '上市櫃公司春酒主持經驗<br>跆拳道黑帶二段', 81, 76, 50, 98, 40, 31, 5300, 'images/customized/host/host_02.jpg', '啟用'),
(6, '李小花', '0936721012', '中國淪陷區主持經驗<br>自由民主先鋒', 78, 21, 30, 66, 97, 67, 6800, 'images/customized/host/host_03.jpg', '啟用'),
(7, '張美麗', '0925712976', '2014腕力比賽女子組亞軍<br>可倒立喝酒兩公升', 81, 76, 50, 98, 40, 31, 4200, 'images/customized/host/host_04.jpg', '啟用'),
(9, '曾歡喜', '0925712976', '氣氛帶動最佳推手<br>第一屆資策會熱舞社社長', 81, 76, 50, 98, 40, 31, 3000, 'images/customized/host/host_05.jpg', '啟用'),
(10, '艾森七', '', '宮廟杯最佳主持人獎<br>曾拍攝過多支音樂錄影帶', 20, 30, 54, 65, 21, 38, 5800, 'images/customized/host/host_06.jpg', '啟用'),
(11, '王六婆', '', '美利堅共和國語言熟練<br>台中知名夜店DJ', 54, 39, 41, 70, 53, 25, 6000, 'images/customized/host/host_07.jpg', '啟用');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

DROP TABLE IF EXISTS `member`;
CREATE TABLE IF NOT EXISTS `member` (
  `memNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '會員編號',
  `memId` varchar(20) NOT NULL COMMENT '會員帳號',
  `memPsw` varchar(20) NOT NULL COMMENT '會員密碼',
  `memName` varchar(10) NOT NULL COMMENT '會員姓名',
  `memTel` varchar(10) NOT NULL COMMENT '會員電話',
  `memEmail` varchar(40) NOT NULL COMMENT '會員信箱',
  `memImgUrl` varchar(40) DEFAULT 'images/member/member.jpg' COMMENT '會員大頭照',
  `memStatus` varchar(20) NOT NULL DEFAULT '啟用',
  `memGender` varchar(1) NOT NULL DEFAULT '男' COMMENT '性別',
  PRIMARY KEY (`memNo`),
  UNIQUE KEY `memId` (`memId`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`memNo`, `memId`, `memPsw`, `memName`, `memTel`, `memEmail`, `memImgUrl`, `memStatus`, `memGender`) VALUES
(1, 'guest', 'guest', '訪客', '0935426955', 'google@yahoo.com.tw', 'images/member/member.jpg', '啟用', '女'),
(2, '111', '111', '簡莉莉', '0912314562', 'hahaha@yaho.com.tw', 'images/member/member_2.jpg', '啟用', '女'),
(3, 'iii', 'iii', '資策會', '0911111111', '1234@yahoo.com.tw', 'images/member/member.jpg', '停用', '男'),
(4, 'test', 'test', '我是誰', '0911111111', '1324@yahoo.com', 'images/member/member_7.jpg', '啟用', '男'),
(10, 'abc', 'abc', '洋洋', 'abc', 'abc', 'images/member/member_3.jpg', '啟用', '男'),
(11, 'test1', 'test1', '叫一號', '0912354569', 'ch20026103@icloud.com', 'images/member/member.jpg', '啟用', '男'),
(12, 'test2', 'test2', '郝美麗', '0912520250', 'j4520@icloud.com', 'images/member/member_12.jpg', '啟用', '女'),
(13, 'wowwow', 'wowwow', '曾帥氣', '0911101505', '6666@yahoo.com.tw', 'images/member/member_10.jpg', '啟用', '男'),
(14, 'ncuiii', 'ncuiii', 'iii', '0933333333', '333@yahoo.com', 'images/member/member_13.jpg', '啟用', '男'),
(15, 'test4', 'test4', '洋洋3號', '0906222222', '1330@auedd.com', 'images/member/member_15.jpg', '啟用', '男'),
(16, 'somebody', '654321', '蔡帥哥', '0966666666', '666666@yahoo.com', 'images/member/member_16.jpg', '啟用', '男'),
(17, 'koreafish', 'koreafish', '韓國魚', '0922222222', 'koreafish@yahoo.com', 'images/member/member_17.jpg', '啟用', '男'),
(18, 'coco', 'coco', '柯文哲', '0952052052', 'avd123@iiiiiii', 'images/member/member_18.jpg', '啟用', '男'),
(24, 'casco', 'casco', '好事多', '091261324', '1321@yahoo.com', 'images/member/member_24.jpg', '啟用', '女'),
(27, 'wangki', 'wangki', 'wangki', '09123456', 'chungtitsai@gmail.com', 'images/member/member.jpg', '啟用', '女'),
(28, '222', '222', '222', '222', '222', 'images/member/member.jpg', '啟用', '女'),
(29, '77', '77', '77', '77', '77', 'images/member/member.jpg', '啟用', '女'),
(31, 'test8', 'test8', 'test8', '0911111111', 'test8@yahoo.com', 'images/member/member.jpg', '啟用', '男'),
(32, 'test9', 'test9', 'test9', '0911111111', 'test9@yahoo.com', 'images/member/member.jpg', '啟用', '女'),
(33, 'an', 'an', 'an', '0987878787', 'hihi550202@gmail.com', 'images/member/member.jpg', '啟用', '女');

-- --------------------------------------------------------

--
-- 資料表結構 `memcoupons`
--

DROP TABLE IF EXISTS `memcoupons`;
CREATE TABLE IF NOT EXISTS `memcoupons` (
  `memCouponsNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '優惠券編號',
  `memNo` int(10) NOT NULL COMMENT '會員編號',
  `couponsType` int(10) NOT NULL COMMENT '優惠券種類',
  `expiry` date NOT NULL COMMENT '優惠券期限',
  `memStatus` varchar(3) NOT NULL COMMENT '優惠券使用狀態',
  PRIMARY KEY (`memCouponsNo`),
  KEY `memNo` (`memNo`),
  KEY `couponsType_FK` (`couponsType`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `memcoupons`
--

INSERT INTO `memcoupons` (`memCouponsNo`, `memNo`, `couponsType`, `expiry`, `memStatus`) VALUES
(1, 2, 4, '2019-04-25', '已使用'),
(2, 2, 3, '2019-04-30', '已使用'),
(3, 1, 3, '2019-05-16', '已使用'),
(4, 1, 4, '2019-05-17', '未使用'),
(5, 4, 4, '2019-04-25', '未使用'),
(6, 4, 3, '2019-04-30', '未使用'),
(7, 4, 3, '2019-05-16', '未使用'),
(8, 4, 4, '2019-05-17', '未使用'),
(9, 3, 4, '2019-04-25', '未使用'),
(12, 2, 4, '2019-05-17', '已使用'),
(18, 2, 1, '2019-04-25', '未使用'),
(21, 2, 1, '2019-04-25', '未使用'),
(22, 2, 4, '2019-04-25', '未使用'),
(23, 2, 3, '2019-04-25', '未使用'),
(24, 2, 3, '2019-04-25', '未使用'),
(25, 13, 2, '2019-04-25', '未使用'),
(26, 13, 2, '2019-04-25', '未使用'),
(27, 13, 1, '2019-04-25', '未使用'),
(36, 2, 5, '2019-04-25', '未使用'),
(37, 2, 2, '2019-04-25', '未使用'),
(38, 2, 4, '2019-06-30', '已使用'),
(39, 2, 2, '2019-06-30', '未使用'),
(40, 16, 1, '2019-06-30', '已使用'),
(41, 27, 3, '2019-06-30', '已使用'),
(42, 11, 5, '2019-06-30', '未使用'),
(43, 28, 1, '2019-06-30', '未使用'),
(44, 28, 1, '2019-06-30', '已使用'),
(45, 28, 1, '2019-06-30', '未使用'),
(46, 28, 1, '2019-06-30', '未使用'),
(47, 29, 1, '2019-06-30', '已使用'),
(48, 29, 1, '2019-06-30', '未使用'),
(49, 2, 4, '2019-06-30', '未使用'),
(50, 2, 4, '2019-06-30', '未使用'),
(51, 2, 4, '2019-06-30', '未使用'),
(52, 2, 3, '2019-06-30', '未使用'),
(53, 2, 1, '2019-06-30', '未使用');

-- --------------------------------------------------------

--
-- 資料表結構 `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `messageNo` int(11) NOT NULL AUTO_INCREMENT COMMENT '留言編號',
  `orderNo` int(11) NOT NULL COMMENT '訂單編號',
  `memNo` int(11) NOT NULL COMMENT '會員編號',
  `messageContent` varchar(100) NOT NULL COMMENT '留言內容',
  `messageDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '留言日期',
  PRIMARY KEY (`messageNo`),
  KEY `memNo_FK3` (`memNo`),
  KEY `orderNo_FK2` (`orderNo`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `message`
--

INSERT INTO `message` (`messageNo`, `orderNo`, `memNo`, `messageContent`, `messageDate`) VALUES
(1, 1, 2, '好厲害喔', '2019-04-10 00:00:00'),
(2, 1, 2, '第一次看到這種花車', '2019-04-10 00:00:00'),
(3, 1, 4, '好棒棒喔', '2019-04-10 00:00:00'),
(5, 1, 2, '功能超級炫', '2019-04-09 00:00:00'),
(6, 1, 2, '誰說舞台只能俗', '2019-04-09 00:00:00'),
(7, 2, 3, '好有趣的特效', '2019-04-10 00:00:00'),
(8, 2, 4, '天啊 這是花車喔', '2019-04-10 00:00:00'),
(11, 12, 2, '美女配美車', '2019-04-09 00:00:00'),
(12, 12, 2, '這些功能真的是用手寫的嗎', '2019-04-09 00:00:00'),
(13, 12, 3, '好厲害喔', '2019-04-10 00:00:00'),
(17, 11, 2, '功能超級炫', '2019-04-09 00:00:00'),
(18, 11, 2, '誰說舞台只能俗', '2019-04-09 00:00:00'),
(19, 11, 4, '逆害耶', '2019-04-10 00:00:00'),
(23, 9, 2, '真的很強', '2019-04-09 00:00:00'),
(24, 9, 2, '挖屋  神人等級', '2019-04-09 00:00:00'),
(43, 3, 2, '好厲害喔', '2019-04-10 00:00:00'),
(46, 3, 2, '功能超級炫', '2019-04-09 00:00:00'),
(47, 3, 2, '誰說舞台只能俗', '2019-04-09 00:00:00'),
(48, 4, 3, '除霉品還是沒品', '2019-04-10 00:00:00'),
(49, 4, 4, '天啊 這是花車喔', '2019-04-10 00:00:00'),
(51, 4, 3, '挖賽', '2019-04-10 00:00:00'),
(52, 5, 2, '美女配美車', '2019-04-09 00:00:00'),
(53, 5, 2, '阿哩巴巴哩', '2019-04-09 00:00:00'),
(54, 6, 3, '好厲害喔', '2019-04-10 00:00:00'),
(58, 8, 2, '功能超級炫', '2019-04-09 00:00:00'),
(59, 8, 2, '誰說舞台只能俗', '2019-04-09 00:00:00'),
(60, 11, 4, '除霉品還是沒品', '2019-04-10 00:00:00'),
(64, 10, 2, '美女配美車', '2019-04-09 00:00:00'),
(65, 10, 2, '阿哩巴巴哩', '2019-04-09 00:00:00'),
(67, 1, 2, '...', '2019-05-01 00:00:00'),
(68, 7, 2, '0.0', '2019-05-01 00:00:00'),
(69, 1, 2, '', '2019-05-01 00:00:00'),
(70, 17, 2, '‘M', '2019-05-01 00:00:00'),
(71, 17, 2, '‘M', '2019-05-01 00:00:00'),
(72, 7, 2, '-.-', '2019-05-01 00:00:00'),
(73, 18, 2, '國防布??', '2019-05-01 00:00:00'),
(74, 18, 13, '好棒棒', '2019-05-02 11:57:26'),
(75, 7, 11, '上面小姐好水', '2019-05-02 00:00:00'),
(76, 1, 11, '我是這台車的主人', '2019-05-02 18:18:27'),
(77, 23, 11, '987', '2019-05-02 00:00:00'),
(78, 4, 10, '123', '2019-05-02 18:44:57'),
(79, 7, 16, '子皮世紀大帥哥', '2019-05-02 00:00:00'),
(80, 1, 16, '搖哩搖勒～', '2019-05-02 00:00:00'),
(81, 10, 16, '想跟妳要電話', '2019-05-02 20:07:20'),
(82, 26, 16, '這個塗裝好帥，跟租賃人一樣帥~', '2019-05-02 00:00:00'),
(83, 27, 17, '我也很認同', '2019-05-02 20:36:45'),
(84, 29, 10, '太厲害了吧，連Costco都來贊助了', '2019-05-02 23:54:23'),
(85, 26, 10, '你好好笑哦', '2019-05-02 23:54:41'),
(86, 36, 2, '歡歡喜喜賺大錢', '2019-05-03 08:59:27'),
(87, 1, 16, '天哪!你的花車好酷，你在哪裡辦活動阿?', '2019-05-03 00:00:00'),
(88, 29, 16, '好讚喔！', '2019-05-03 09:24:10'),
(89, 38, 16, '快來留言啦', '2019-05-03 09:24:59'),
(90, 38, 16, '拋磚引玉', '2019-05-03 09:25:00'),
(91, 38, 16, '你的這一台車讚哦', '2019-05-03 00:00:00'),
(92, 38, 16, '再讚一次', '2019-05-03 00:00:00'),
(93, 10, 1, '讚', '2019-05-03 15:46:37');

-- --------------------------------------------------------

--
-- 資料表結構 `minform`
--

DROP TABLE IF EXISTS `minform`;
CREATE TABLE IF NOT EXISTS `minform` (
  `minformNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '留言檢舉編號',
  `messageNo` int(10) NOT NULL COMMENT '留言編號',
  `memNo` int(10) NOT NULL COMMENT '檢舉人會員編號',
  `messageContent` varchar(100) NOT NULL COMMENT '留言內容',
  `informReason` varchar(50) NOT NULL COMMENT '檢舉原因',
  `informStatus` varchar(3) NOT NULL COMMENT '檢舉狀態',
  PRIMARY KEY (`minformNo`),
  KEY `messageNo_FK` (`messageNo`),
  KEY `memNo_FK4` (`memNo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '訂單編號',
  `memNo` int(10) NOT NULL COMMENT '會員編號',
  `memCouponsNo` int(10) DEFAULT NULL COMMENT '使用的優惠卷之編號',
  `totalMoney` int(20) NOT NULL COMMENT '總金額',
  `orderName` varchar(15) NOT NULL COMMENT '客製花車名稱',
  `orderImgUrl` varchar(40) NOT NULL COMMENT '客製花車圖片',
  `orderVote` int(10) NOT NULL DEFAULT '0' COMMENT '投票數量',
  `flyerNo` int(10) DEFAULT NULL COMMENT '宣傳單編號',
  `beautyState` int(1) NOT NULL DEFAULT '0' COMMENT '狀態',
  `beautyDate` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '上傳花車日期',
  `actPlace` varchar(15) NOT NULL COMMENT '活動地點名稱',
  `actStart` date NOT NULL COMMENT '活動開始日期',
  `actContent` varchar(100) DEFAULT NULL COMMENT '訂單內容',
  `hostNo` int(5) NOT NULL COMMENT '主持人編號',
  PRIMARY KEY (`orderNo`),
  KEY `memCouponsNo_FK` (`memCouponsNo`),
  KEY `flyNo_FK` (`flyerNo`),
  KEY `memNo_FK` (`memNo`),
  KEY `hostNo_FK` (`hostNo`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `orders`
--

INSERT INTO `orders` (`orderNo`, `memNo`, `memCouponsNo`, `totalMoney`, `orderName`, `orderImgUrl`, `orderVote`, `flyerNo`, `beautyState`, `beautyDate`, `actPlace`, `actStart`, `actContent`, `hostNo`) VALUES
(1, 2, NULL, 45000, '駁二傳統音樂節舞台', 'images/stageImages/1.png', 970, 1, 1, NULL, '高雄市鹽埕區大勇路1號', '2019-05-31', '{\"troupeNo\":\"2\",\"fireNo\":\"2\",\"fireworkNo\":\"1\",\"audioNo\":\"2\",\"pipeNo\":\"2\"}', 9),
(2, 2, NULL, 590000, '古色古香活動宣傳舞台', 'images/stageImages/2.png', 802, 2, 0, NULL, '台北市信義區仁愛路四段505號', '2019-05-24', '{\"troupeNo\":\"2\",\"fireNo\":\"2\",\"fireworkNo\":\"3\",\"audioNo\":\"2\",\"pipeNo\":\"3\"}', 7),
(3, 2, NULL, 59000, '自由廣場舞台', 'images/stageImages/3.png', 201, 3, 0, NULL, '台北市中正區中山南路21號', '2019-05-24', '{\"troupeNo\":\"2\",\"fireNo\":\"2\",\"fireworkNo\":\"3\",\"audioNo\":\"2\",\"pipeNo\":\"3\"}', 9),
(4, 10, NULL, 59000, '水水大舞台', 'images/stageImages/4.png', 2, 4, 1, NULL, '台北市中正區忠孝西路一段', '2019-05-24', '{\"troupeNo\":\"2\",\"fireNo\":\"2\",\"fireworkNo\":\"3\",\"audioNo\":\"2\",\"pipeNo\":\"3\"}', 6),
(5, 10, NULL, 59000, '煎餅的大舞台', 'images/stageImages/5.png', 0, 5, 1, NULL, '桃園市中壢區中大路300號', '2019-05-31', '{\"troupeNo\":\"2\",\"fireNo\":\"2\",\"fireworkNo\":\"3\",\"audioNo\":\"2\",\"pipeNo\":\"3\"}', 11),
(6, 4, NULL, 590000, '我的宣傳舞台', 'images/stageImages/6.png', 960, 6, 1, NULL, '台北市信義區仁愛路四段505號', '2019-05-28', '{\"troupeNo\":\"2\",\"fireNo\":\"2\",\"fireworkNo\":\"3\",\"audioNo\":\"2\",\"pipeNo\":\"3\"}', 10),
(7, 2, NULL, 59000, '子皮的舞台', 'images/stageImages/7.png', 908, 7, 1, NULL, '台北市中正區中山南路21號', '2019-05-24', '{\"troupeNo\":\"2\",\"fireNo\":\"2\",\"fireworkNo\":\"3\",\"audioNo\":\"2\",\"pipeNo\":\"3\"}', 5),
(8, 10, NULL, 59000, '山大舞台', 'images/stageImages/8.png', 1, 8, 1, NULL, '台北市中正區忠孝西路一段', '2019-05-24', '{\"troupeNo\":\"2\",\"fireNo\":\"2\",\"fireworkNo\":\"3\",\"audioNo\":\"2\",\"pipeNo\":\"3\"}', 10),
(9, 10, NULL, 59000, '阿比大舞台', 'images/stageImages/9.png', 0, 9, 1, NULL, '桃園市中壢區中大路300號', '2019-05-31', '{\"troupeNo\":\"2\",\"fireNo\":\"2\",\"fireworkNo\":\"3\",\"audioNo\":\"2\",\"pipeNo\":\"3\"}', 4),
(10, 2, NULL, 45000, '駁一傳統音樂節舞台', 'images/stageImages/10.png', 964, 10, 1, NULL, '高雄市鹽埕區大勇路1號', '2019-05-31', '{\"troupeNo\":\"2\",\"fireNo\":\"2\",\"fireworkNo\":\"1\",\"audioNo\":\"2\",\"pipeNo\":\"2\"}', 9),
(11, 2, NULL, 590000, '古色古香活動宣傳舞台', 'images/stageImages/11.png', 1013, 11, 1, NULL, '台北市信義區仁愛路四段505號', '2019-05-24', '{\"troupeNo\":\"2\",\"fireNo\":\"2\",\"fireworkNo\":\"3\",\"audioNo\":\"2\",\"pipeNo\":\"3\"}', 7),
(12, 2, NULL, 59000, '自由廣場舞台', 'images/stageImages/12.png', 1113, 12, 1, NULL, '台北市中正區中山南路21號', '2019-05-24', '{\"troupeNo\":\"2\",\"fireNo\":\"2\",\"fireworkNo\":\"3\",\"audioNo\":\"2\",\"pipeNo\":\"3\"}', 9),
(16, 2, 1, 60800, '核心的舞台', 'images/stageImages/13.png', 0, 18, 1, NULL, '高雄鳳山火車站', '2019-05-01', '{\"troupeNo\":\"5\",\"fireNo\":\"3\",\"fireworkNo\":\"1\",\"audioNo\":\"3\",\"pipeNo\":\"3\"}', 6),
(17, 2, 2, 40800, '20190430', 'images/stageImages/14.png', 1, 19, 1, NULL, '高雄鳳山火車站', '2019-05-08', '{\"troupeNo\":\"3\",\"fireNo\":\"2\",\"fireworkNo\":0,\"audioNo\":\"3\",\"pipeNo\":0}', 6),
(18, 2, 3, 47000, '大38', 'images/stageImages/15.png', 0, 20, 1, NULL, '高雄火車站', '2019-05-09', '{\"troupeNo\":\"3\",\"fireNo\":\"4\",\"fireworkNo\":0,\"audioNo\":\"3\",\"pipeNo\":\"3\"}', 11),
(19, 2, 12, 1800, '國防布大舞台', 'images/stageImages/15.png', 0, NULL, 1, NULL, '千葉火鍋中壢店', '2019-05-24', '{\"troupeNo\":0,\"fireNo\":0,\"fireworkNo\":0,\"audioNo\":0,\"pipeNo\":0}', 6),
(20, 13, 0, 0, '高雄發大財', 'images/stageImages/16.png', 1, NULL, 1, NULL, '高雄新崛江', '2019-05-31', '{\"troupeNo\":\"8\",\"fireNo\":\"3\",\"fireworkNo\":\"3\",\"audioNo\":\"3\",\"pipeNo\":0}', 5),
(21, 13, 0, 63800, '好好玩舞台', 'images/stageImages/17.png', 1, NULL, 1, NULL, '高雄鳳山火車站', '2019-05-16', '{\"troupeNo\":\"8\",\"fireNo\":\"2\",\"fireworkNo\":\"2\",\"audioNo\":\"2\",\"pipeNo\":\"2\"}', 10),
(22, 13, 0, 43000, '自由民主大舞台', 'images/stageImages/18.png', 1, NULL, 1, NULL, '中正紀念堂', '2019-05-10', '{\"troupeNo\":\"2\",\"fireNo\":\"3\",\"fireworkNo\":0,\"audioNo\":\"4\",\"pipeNo\":\"3\"}', 9),
(23, 11, 0, 0, '醉蝦趴', 'images/stageImages/16.png', 0, 21, 1, NULL, '中央大學', '2019-05-05', '{\"troupeNo\":\"2\",\"fireNo\":\"4\",\"fireworkNo\":\"2\",\"audioNo\":\"2\",\"pipeNo\":\"3\"}', 6),
(24, 10, 0, 0, '台南火車站', 'images/stageImages/17.png', 1, NULL, 1, '2019-05-02 18:52:57', '台南火車站', '2019-05-06', '{\"troupeNo\":\"7\",\"fireNo\":\"3\",\"fireworkNo\":0,\"audioNo\":\"3\",\"pipeNo\":0}', 7),
(25, 15, 0, 16000, 'Hair舞台', 'images/stageImages/18.png', 1, 23, 1, '2019-05-02 19:38:01', '中壢', '2019-05-08', '{\"troupeNo\":0,\"fireNo\":0,\"fireworkNo\":0,\"audioNo\":0,\"pipeNo\":0}', 11),
(26, 16, 0, 63800, '世貿der舞台', 'images/stageImages/19.png', 2, 24, 1, '2019-05-02 20:02:09', '台北世貿中心', '2019-07-26', '{\"troupeNo\":\"2\",\"fireNo\":\"3\",\"fireworkNo\":\"3\",\"audioNo\":\"3\",\"pipeNo\":\"3\"}', 10),
(27, 18, 0, 14200, '不分藍綠都是垃圾', 'images/stageImages/20.png', 2, 25, 0, '2019-05-02 20:27:02', '台北市政府市長辦公室', '2019-05-15', '{\"troupeNo\":0,\"fireNo\":0,\"fireworkNo\":0,\"audioNo\":0,\"pipeNo\":0}', 7),
(28, 17, 0, 55000, '高雄發大財', 'images/stageImages/21.png', 2, 26, 1, '2019-05-02 20:31:09', '高雄市政府', '2020-01-10', '{\"troupeNo\":\"6\",\"fireNo\":\"2\",\"fireworkNo\":\"2\",\"audioNo\":\"2\",\"pipeNo\":\"2\"}', 9),
(29, 24, 0, 33800, ' 好事多大舞台', 'images/stageImages/22.png', 2, 28, 1, '2019-05-02 22:07:41', '桃園好事多', '2019-05-09', '{\"troupeNo\":\"3\",\"fireNo\":\"4\",\"fireworkNo\":0,\"audioNo\":0,\"pipeNo\":0}', 6),
(30, 25, 0, 41800, '全聯福利大舞台', 'images/stageImages/23.png', 0, 29, 1, '2019-05-02 22:17:05', '全聯', '2019-05-03', '{\"troupeNo\":\"2\",\"fireNo\":0,\"fireworkNo\":\"2\",\"audioNo\":0,\"pipeNo\":0}', 6),
(36, 2, 38, 14300, '花花的花車', 'images/stageImages/29.png', 0, NULL, 1, '2019-05-03 08:03:59', '資策會', '2019-05-15', '{\"troupeNo\":0,\"fireNo\":0,\"fireworkNo\":0,\"audioNo\":0,\"pipeNo\":0}', 10),
(38, 16, 40, 60800, '愛蝦趴', 'images/stageImages/31.png', 2, 30, 1, '2019-05-03 09:19:07', '中央大學', '2019-05-04', '{\"troupeNo\":\"5\",\"fireNo\":\"3\",\"fireworkNo\":\"1\",\"audioNo\":\"4\",\"pipeNo\":\"2\"}', 5),
(39, 33, 0, 0, '5555', 'images/stageImages/32.png', 0, 31, 1, '2019-05-05 21:15:52', '中壢火車站', '2019-05-15', '{\"troupeNo\":\"2\",\"fireNo\":\"3\",\"fireworkNo\":0,\"audioNo\":\"2\",\"pipeNo\":\"3\"}', 9),
(40, 2, 0, 63700, '111', 'images/stageImages/33.png', 0, NULL, 1, '2019-05-06 15:05:22', '111', '2019-05-07', '{\"troupeNo\":\"7\",\"fireNo\":\"3\",\"fireworkNo\":\"3\",\"audioNo\":\"3\",\"pipeNo\":0}', 7);

-- --------------------------------------------------------

--
-- 資料表結構 `pipe`
--

DROP TABLE IF EXISTS `pipe`;
CREATE TABLE IF NOT EXISTS `pipe` (
  `pipeNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '鋼管編號鋼管編號',
  `pipeName` varchar(15) NOT NULL COMMENT '鋼管名稱',
  `pipePrice` int(10) NOT NULL COMMENT '單價',
  `pipeImgUrl` varchar(200) NOT NULL COMMENT '鋼管圖片',
  `pipeStatus` varchar(100) NOT NULL COMMENT '鋼管狀態',
  PRIMARY KEY (`pipeNo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `pipe`
--

INSERT INTO `pipe` (`pipeNo`, `pipeName`, `pipePrice`, `pipeImgUrl`, `pipeStatus`) VALUES
(2, '一枝獨秀款', 1000, 'images/customized/cust_stage_audioAndPole/pole.png', '啟用'),
(3, '三人小團體', 3000, 'images/customized/cust_stage_audioAndPole/pole_3.png', '啟用'),
(4, '五福大臨門', 6000, 'images/customized/cust_stage_audioAndPole/pole_5.png', '啟用');

-- --------------------------------------------------------

--
-- 資料表結構 `robot`
--

DROP TABLE IF EXISTS `robot`;
CREATE TABLE IF NOT EXISTS `robot` (
  `robotNo` int(10) NOT NULL AUTO_INCREMENT COMMENT ' 關鍵字編號',
  `robotAsk` varchar(20) NOT NULL COMMENT '關鍵字內容',
  `robotAns` varchar(200) NOT NULL COMMENT '關鍵字應答',
  `robotStatus` varchar(3) NOT NULL COMMENT '狀態',
  PRIMARY KEY (`robotNo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `robot`
--

INSERT INTO `robot` (`robotNo`, `robotAsk`, `robotAns`, `robotStatus`) VALUES
(1, '約會', '唉呦~不行啦!輪家最近在跟偶們卡車司機歐霸曖昧啦>///<', '啟用'),
(2, '營業時間', '偶們每天12:00到隔天凌晨3:00全年無休喔!', '啟用'),
(3, 'hi', 'hi 哩賀', '啟用'),
(4, 'ww', 'hi', '啟用'),
(5, '你好', '哩賀阿', '啟用'),
(6, '幹', '不可以罵髒話啦~吼~', '啟用'),
(7, '機掰', '不可以罵髒話啦~吼~', '啟用'),
(8, 'fuck', '不可以罵髒話啦~吼~', '啟用'),
(9, '靠', '不可以罵髒話啦~吼~', '啟用'),
(10, '多少錢', '依造您的客製內容而定喔~\r\n', '啟用'),
(11, '費用', '依造您的客製內容而定喔~\r\n', '啟用');

-- --------------------------------------------------------

--
-- 資料表結構 `troupe`
--

DROP TABLE IF EXISTS `troupe`;
CREATE TABLE IF NOT EXISTS `troupe` (
  `troupeNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '舞團編號',
  `troupeName` varchar(15) NOT NULL COMMENT '舞團名稱 ',
  `troupePrice` int(10) NOT NULL COMMENT '單價',
  `troupeStatus` varchar(100) NOT NULL COMMENT '狀態',
  `troupeImgUrl` varchar(50) NOT NULL COMMENT '舞團圖片',
  `troupeGif` varchar(100) NOT NULL,
  PRIMARY KEY (`troupeNo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `troupe`
--

INSERT INTO `troupe` (`troupeNo`, `troupeName`, `troupePrice`, `troupeStatus`, `troupeImgUrl`, `troupeGif`) VALUES
(2, ' 最熱情森巴', 7000, '停用', 'images/customized/cust_stage_dance/dance_01.png', 'images/danceGirlOne.gif'),
(3, '大媽廣場舞', 10000, '啟用', 'images/customized/cust_stage_dance/dance_02.png', 'images/dance1.gif'),
(5, '超清涼辣妹', 12000, '啟用', 'images/customized/cust_stage_dance/dance_03.png', 'images/dance2.gif'),
(6, '猛男愛搖擺', 12000, '啟用', 'images/customized/cust_stage_dance/dance_04.png', 'images/dance3.gif'),
(7, '正妹雙人舞', 13000, '啟用', 'images/customized/cust_stage_dance/dance_05.png', 'images/dance4.gif'),
(8, '真舞龍舞獅', 18000, '啟用', 'images/customized/cust_stage_dance/dance_06.png', 'images/dance5.gif');

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `binform`
--
ALTER TABLE `binform`
  ADD CONSTRAINT `memNo_FK2` FOREIGN KEY (`memNo`) REFERENCES `member` (`memNo`),
  ADD CONSTRAINT `orderNo_FK` FOREIGN KEY (`orderNo`) REFERENCES `orders` (`orderNo`);

--
-- 資料表的 Constraints `collection`
--
ALTER TABLE `collection`
  ADD CONSTRAINT `mem_FK` FOREIGN KEY (`memNo`) REFERENCES `member` (`memNo`);

--
-- 資料表的 Constraints `finform`
--
ALTER TABLE `finform`
  ADD CONSTRAINT `flyerNo_FK` FOREIGN KEY (`flyerNo`) REFERENCES `flyer` (`flyerNo`),
  ADD CONSTRAINT `memNo_FK5` FOREIGN KEY (`memNo`) REFERENCES `member` (`memNo`);

--
-- 資料表的 Constraints `flyer`
--
ALTER TABLE `flyer`
  ADD CONSTRAINT `orderNo_FK3` FOREIGN KEY (`orderNo`) REFERENCES `orders` (`orderNo`);

--
-- 資料表的 Constraints `memcoupons`
--
ALTER TABLE `memcoupons`
  ADD CONSTRAINT `couponsType_FK` FOREIGN KEY (`couponsType`) REFERENCES `coupons` (`couponsType`),
  ADD CONSTRAINT `member_FK` FOREIGN KEY (`memNo`) REFERENCES `member` (`memNo`);

--
-- 資料表的 Constraints `minform`
--
ALTER TABLE `minform`
  ADD CONSTRAINT `memNo_FK4` FOREIGN KEY (`memNo`) REFERENCES `member` (`memNo`),
  ADD CONSTRAINT `messageNo_FK` FOREIGN KEY (`messageNo`) REFERENCES `message` (`messageNo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
