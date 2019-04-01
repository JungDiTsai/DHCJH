-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2019 年 04 月 26 日 14:11
-- 伺服器版本： 8.0.13
-- PHP 版本： 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `dhc`
--

-- --------------------------------------------------------

--
-- 資料表結構 `administrator`
--

CREATE TABLE `administrator` (
  `adminNo` int(11) NOT NULL COMMENT '管理員編號',
  `adminName` varchar(15) NOT NULL COMMENT '管理員名稱',
  `adminId` varchar(20) NOT NULL COMMENT '管理員帳號',
  `adminPsw` varchar(15) NOT NULL COMMENT '管理員密碼',
  `adminPer` varchar(20) NOT NULL COMMENT '管理員權限',
  `adminStatus` varchar(20) NOT NULL COMMENT '管理員狀態'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `administrator`
--

INSERT INTO `administrator` (`adminNo`, `adminName`, `adminId`, `adminPsw`, `adminPer`, `adminStatus`) VALUES
(11, '員工', ' 111', '111', '一般', '啟用'),
(12, '員工', 'qq', 'q', '最高', '啟用'),
(13, '員工', 'q', 'q', '最高', '啟用'),
(14, '員工', 's', 's', '最高', '啟用'),
(16, '員工', 's', 's', '一般', '啟用');

-- --------------------------------------------------------

--
-- 資料表結構 `audio`
--

CREATE TABLE `audio` (
  `audioNo` int(10) NOT NULL COMMENT '音響編號',
  `audioName` varchar(15) NOT NULL COMMENT '音響名稱',
  `audioPrice` int(10) NOT NULL COMMENT '單價',
  `audioImgUrl` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '音響圖片',
  `audioStatus` varchar(3) NOT NULL COMMENT '音響狀態'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `audio`
--

INSERT INTO `audio` (`audioNo`, `audioName`, `audioPrice`, `audioImgUrl`, `audioStatus`) VALUES
(2, '鄰居會罵型', 8000, 'images/customized/cust_stage_audioAndPole/audio_01.png', '啟用'),
(3, '震耳欲聾型', 11000, 'images/customized/cust_stage_audioAndPole/audio_02.png', '啟用'),
(4, '毀天滅地型', 15000, 'images/customized/cust_stage_audioAndPole/audio_03.png', '啟用');

-- --------------------------------------------------------

--
-- 資料表結構 `binform`
--

CREATE TABLE `binform` (
  `binformNo` int(11) NOT NULL COMMENT '選美檢舉編號',
  `orderNo` int(11) NOT NULL COMMENT '訂單編號',
  `memNo` int(11) NOT NULL COMMENT '檢舉人會員編號',
  `informReason` varchar(50) NOT NULL COMMENT '檢舉原因',
  `informStatus` varchar(4) NOT NULL COMMENT '檢舉狀態'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `binform`
--

INSERT INTO `binform` (`binformNo`, `orderNo`, `memNo`, `informReason`, `informStatus`) VALUES
(2, 3, 1, '太情色', '未處理'),
(4, 3, 1, '太情色', '未處理');

-- --------------------------------------------------------

--
-- 資料表結構 `calendar`
--

CREATE TABLE `calendar` (
  `hostNo` int(10) NOT NULL COMMENT '主持人編號',
  `startDate` date NOT NULL COMMENT '非空檔開始日期',
  `endDate` date NOT NULL COMMENT '非空檔結束日期',
  `reason` varchar(10) NOT NULL COMMENT '非空檔原因'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `calendar`
--

INSERT INTO `calendar` (`hostNo`, `startDate`, `endDate`, `reason`) VALUES
(1, '2019-04-11', '2019-04-19', '病假');

-- --------------------------------------------------------

--
-- 資料表結構 `collection`
--

CREATE TABLE `collection` (
  `memNo` int(10) NOT NULL COMMENT '會員編號',
  `orderNo` int(10) NOT NULL COMMENT '訂單編號'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `collection`
--

INSERT INTO `collection` (`memNo`, `orderNo`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- 資料表結構 `coupons`
--

CREATE TABLE `coupons` (
  `couponsType` int(11) NOT NULL COMMENT '優惠券種類',
  `couponsName` varchar(15) NOT NULL COMMENT '優惠券名稱',
  `discount` int(5) NOT NULL COMMENT '折扣金額',
  `status` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `coupons`
--

INSERT INTO `coupons` (`couponsType`, `couponsName`, `discount`, `status`) VALUES
(1, '折價券1000元       ', 1000, '停用'),
(2, '折價券2000元       ', 2000, '停用'),
(3, '折價券1500元', 1500, '啟用'),
(4, '折價券5000元', 5000, '啟用'),
(5, '折價券1000元       ', 1000, '停用'),
(24, '123', 111, '正常'),
(25, '123', 111, '正常'),
(27, '1', 1, '1'),
(28, '1', 1, '啟用'),
(29, '2', 2, '啟用'),
(30, '3', 3, '啟用'),
(31, '111', 111, '啟用');

-- --------------------------------------------------------

--
-- 資料表結構 `draw`
--

CREATE TABLE `draw` (
  `drawNo` int(10) NOT NULL COMMENT '內塗裝編號',
  `drawName` varchar(15) NOT NULL COMMENT '內塗裝名稱',
  `drawImgUrl` varchar(100) NOT NULL COMMENT '內塗裝圖片',
  `drawPrice` varchar(20) NOT NULL COMMENT '單價',
  `drawStatus` varchar(20) NOT NULL COMMENT '狀態'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `draw`
--

INSERT INTO `draw` (`drawNo`, `drawName`, `drawImgUrl`, `drawPrice`, `drawStatus`) VALUES
(5, '新年快樂', 'images/customized/cust_stage_innerPattern/cust_stage_pattern_01.png', '10000', '啟用'),
(6, '霓虹骷髏', 'images/customized/cust_stage_innerPattern/cust_stage_pattern_02.jpg', '10000', '啟用'),
(7, '快樂城堡', 'images/customized/cust_stage_innerPattern/cust_stage_pattern_03.png', '10000', '啟用'),
(8, '絢麗霓虹', 'images/customized/cust_stage_innerPattern/cust_stage_pattern_04.jpg', '10000', '啟用'),
(9, '在地意象', 'images/customized/cust_stage_innerPattern/cust_stage_pattern_05.jpg', '10000', '啟用'),
(10, '飛馬奔騰', 'images/customized/cust_stage_innerPattern/cust_stage_pattern_06.png', '10000', '啟用'),
(11, '繽紛愛心', 'images/customized/cust_stage_innerPattern/cust_stage_pattern_07.jpg', '10000', '啟用'),
(12, '日本動漫', 'images/customized/cust_stage_innerPattern/cust_stage_pattern_08.jpg', '10000', '啟用');

-- --------------------------------------------------------

--
-- 資料表結構 `effects`
--

CREATE TABLE `effects` (
  `effectsNo` int(10) NOT NULL COMMENT '特效設備編號',
  `effectsName` varchar(15) NOT NULL COMMENT '特效設備名稱',
  `effectsPrice` int(10) NOT NULL COMMENT '單價',
  `effectsImgUrl` varchar(150) NOT NULL COMMENT '特效設備圖片',
  `effectsStatus` varchar(3) NOT NULL COMMENT '狀態',
  `effectsGif` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `effects`
--

INSERT INTO `effects` (`effectsNo`, `effectsName`, `effectsPrice`, `effectsImgUrl`, `effectsStatus`, `effectsGif`) VALUES
(2, '火焰之舞', 3000, 'images/customized/cust_stage_effect/effects_01.png', '啟用', 'images/fire1.gif'),
(3, '火力四射', 5000, 'images/customized/cust_stage_effect/effects_02.png', '啟用', 'images/fire4.gif'),
(4, '火力全開', 7000, 'images/customized/cust_stage_effect/effects_03.png', '啟用', 'images/fire5.gif');

-- --------------------------------------------------------

--
-- 資料表結構 `finform`
--

CREATE TABLE `finform` (
  `finformNo` int(10) NOT NULL COMMENT '宣傳單檢舉編號',
  `flyerNo` int(10) NOT NULL COMMENT '宣傳單編號',
  `memNo` int(10) NOT NULL COMMENT '檢舉人會員編號',
  `informReason` varchar(50) NOT NULL COMMENT '檢舉原因',
  `informStatus` varchar(5) NOT NULL COMMENT '檢舉狀態 '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `finform`
--

INSERT INTO `finform` (`finformNo`, `flyerNo`, `memNo`, `informReason`, `informStatus`) VALUES
(1, 1, 2, '太情色', '未處理'),
(2, 1, 1, '太情色', ''),
(3, 1, 1, '太情色', '');

-- --------------------------------------------------------

--
-- 資料表結構 `fireworks`
--

CREATE TABLE `fireworks` (
  `fireworkNo` int(10) NOT NULL,
  `fireworkName` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fireworkPrice` int(10) NOT NULL,
  `fireworkImgUrl` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fireworkStatus` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `fireworks`
--

INSERT INTO `fireworks` (`fireworkNo`, `fireworkName`, `fireworkPrice`, `fireworkImgUrl`, `fireworkStatus`) VALUES
(1, '雷霆萬鈞', 13000, 'images/customized/cust_stage_effect/firework_01.png', '啟用'),
(2, '萬紫千紅', 18000, 'images/customized/cust_stage_effect/firework_02.png', '啟用'),
(3, '龍翔九天', 22000, 'images/customized/cust_stage_effect/firework_03.png', '啟用');

-- --------------------------------------------------------

--
-- 資料表結構 `flyer`
--

CREATE TABLE `flyer` (
  `flyerNo` int(10) NOT NULL COMMENT '宣傳單編號',
  `orderNo` int(10) NOT NULL COMMENT 'orderNo',
  `flyerImgUrl` varchar(40) NOT NULL COMMENT '上傳圖片',
  `peopleNumber` int(11) NOT NULL COMMENT '人數統計',
  `flyeStatus` int(11) NOT NULL COMMENT '宣傳單狀態',
  `flyeDate` date NOT NULL COMMENT ' 宣傳單活動日期',
  `flyTitle` varchar(20) NOT NULL COMMENT '宣傳單標題',
  `flyeradd` varchar(150) NOT NULL COMMENT '宣傳單地址',
  `peopleStatus` varchar(3) NOT NULL COMMENT '是否要使用人數功能',
  `flyerText` varchar(150) NOT NULL COMMENT '宣傳單內容'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `flyer`
--

INSERT INTO `flyer` (`flyerNo`, `orderNo`, `flyerImgUrl`, `peopleNumber`, `flyeStatus`, `flyeDate`, `flyTitle`, `flyeradd`, `peopleStatus`, `flyerText`) VALUES
(1, 3, 'images/flyerimg/1.png', 600, 1, '2019-04-15', '勁爆你的夜', '', '', '');

-- --------------------------------------------------------

--
-- 資料表結構 `flyimg`
--

CREATE TABLE `flyimg` (
  `flyNo` int(20) NOT NULL COMMENT '宣傳單編號',
  `flyTitle` varchar(20) NOT NULL COMMENT '宣傳單標題',
  `flyImg` varchar(40) NOT NULL COMMENT '宣傳單圖片',
  `flyStatus` varchar(20) NOT NULL COMMENT '宣傳單狀態'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `flyimg`
--

INSERT INTO `flyimg` (`flyNo`, `flyTitle`, `flyImg`, `flyStatus`) VALUES
(3, '勁爆你的夜1              ', 'images/flyerimg/1.png', '啟用'),
(4, '今晚有辣妹', 'images/flyerimg/1.png', '啟用'),
(5, '勁爆你的夜', 'images/flyerimg/1.png', '啟用'),
(6, '今晚有辣妹', 'images/flyerimg/1.png', '啟用'),
(9, '', 'C:\\fakepath\\5.png', '啟用');

-- --------------------------------------------------------

--
-- 資料表結構 `host`
--

CREATE TABLE `host` (
  `hostNo` int(10) NOT NULL COMMENT '主持人編號',
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
  `hostStatus` varchar(20) NOT NULL COMMENT '主持人狀態'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `host`
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

CREATE TABLE `member` (
  `memNo` int(10) NOT NULL COMMENT '會員編號',
  `memId` varchar(20) NOT NULL COMMENT '會員帳號',
  `memPsw` varchar(20) NOT NULL COMMENT '會員密碼',
  `memName` varchar(10) NOT NULL COMMENT '會員姓名',
  `memTel` varchar(10) NOT NULL COMMENT '會員電話',
  `memEmail` varchar(40) NOT NULL COMMENT '會員信箱',
  `memImgUrl` varchar(40) DEFAULT 'images/member/member.jpg' COMMENT '會員大頭照',
  `memStatus` varchar(20) NOT NULL,
  `memGender` int(1) NOT NULL COMMENT '性別'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`memNo`, `memId`, `memPsw`, `memName`, `memTel`, `memEmail`, `memImgUrl`, `memStatus`, `memGender`) VALUES
(1, '                 11e', '11', '測試帳號', '0933335556', 'abcd@yahoo.com.tw', 'images/member/member.jpg', '停用', 0),
(2, '111', '111', '我是第一個', '0911111648', '1234@yahoo.com.tw', 'images/member/member.jpg', '停用', 1),
(3, '                 11e', '11', '測試帳號', '0933335556', 'abcd@yahoo.com.tw', 'images/member/member.jpg', '啟用', 0),
(4, '111', '111', '我是第一個', '0911111648', '1234@yahoo.com.tw', 'images/member/member.jpg', '停用', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `memcoupons`
--

CREATE TABLE `memcoupons` (
  `memCouponsNo` int(10) NOT NULL COMMENT '優惠券編號',
  `memNo` int(10) NOT NULL COMMENT '會員編號',
  `couponsType` int(10) NOT NULL COMMENT '優惠券種類',
  `expiry` date NOT NULL COMMENT '優惠券期限',
  `memStatus` varchar(3) NOT NULL COMMENT '優惠券使用狀態'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `memcoupons`
--

INSERT INTO `memcoupons` (`memCouponsNo`, `memNo`, `couponsType`, `expiry`, `memStatus`) VALUES
(1, 2, 4, '2019-04-25', '未使用'),
(2, 2, 3, '2019-04-30', '未使用');

-- --------------------------------------------------------

--
-- 資料表結構 `message`
--

CREATE TABLE `message` (
  `messageNo` int(11) NOT NULL COMMENT '留言編號',
  `orderNo` int(11) NOT NULL COMMENT '訂單編號',
  `memNo` int(11) NOT NULL COMMENT '會員編號',
  `messageContent` varchar(100) NOT NULL COMMENT '留言內容',
  `messageDate` date NOT NULL COMMENT '留言日期'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `message`
--

INSERT INTO `message` (`messageNo`, `orderNo`, `memNo`, `messageContent`, `messageDate`) VALUES
(1, 3, 2, '這台真的好美喔', '2019-04-12');

-- --------------------------------------------------------

--
-- 資料表結構 `minform`
--

CREATE TABLE `minform` (
  `minformNo` int(10) NOT NULL COMMENT '留言檢舉編號',
  `messageNo` int(10) NOT NULL COMMENT '留言編號',
  `memNo` int(10) NOT NULL COMMENT '檢舉人會員編號',
  `messageContent` varchar(100) NOT NULL COMMENT '留言內容',
  `informReason` varchar(50) NOT NULL COMMENT '檢舉原因',
  `informStatus` varchar(3) NOT NULL COMMENT '檢舉狀態'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `minform`
--

INSERT INTO `minform` (`minformNo`, `messageNo`, `memNo`, `messageContent`, `informReason`, `informStatus`) VALUES
(1, 1, 1, '這台真的好美喔', '言語攻擊', '已處理'),
(2, 1, 1, '這台真的屌喔', '言語攻擊', '未處理');

-- --------------------------------------------------------

--
-- 資料表結構 `orders`
--

CREATE TABLE `orders` (
  `orderNo` int(10) NOT NULL COMMENT '訂單編號',
  `memNo` int(10) NOT NULL COMMENT '會員編號',
  `memCouponsNo` int(10) NOT NULL COMMENT '使用的優惠卷之編號',
  `totalMoney` int(20) NOT NULL COMMENT '總金額',
  `orderName` varchar(15) NOT NULL COMMENT '客製花車名稱',
  `orderImgUrl` varchar(40) NOT NULL COMMENT '客製花車圖片',
  `orderVote` int(10) NOT NULL COMMENT '投票數量',
  `flyerNo` int(10) NOT NULL COMMENT '宣傳單編號',
  `beautyState` tinyint(1) NOT NULL COMMENT '花車選美參與狀態',
  `beautyDate` date NOT NULL COMMENT '上傳花車日期',
  `actPlace` varchar(15) NOT NULL COMMENT '活動地點名稱',
  `actStart` date NOT NULL COMMENT '活動開始日期',
  `actContent` varchar(100) NOT NULL COMMENT '介紹內容',
  `hostNo` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `orders`
--

INSERT INTO `orders` (`orderNo`, `memNo`, `memCouponsNo`, `totalMoney`, `orderName`, `orderImgUrl`, `orderVote`, `flyerNo`, `beautyState`, `beautyDate`, `actPlace`, `actStart`, `actContent`, `hostNo`) VALUES
(3, 2, 1, 200000, '開心大舞台', 'images/flyerimg/1.png', 267, 1, 0, '2019-04-03', '中央大學', '2019-04-11', '', 4),
(4, 2, 1, 200000, '開心大舞台', 'images/flyerimg/1.png', 267, 1, 0, '2019-04-03', '中央大學', '2019-04-11', '', 9);

-- --------------------------------------------------------

--
-- 資料表結構 `pipe`
--

CREATE TABLE `pipe` (
  `pipeNo` int(10) NOT NULL COMMENT '鋼管編號鋼管編號',
  `pipeName` varchar(15) NOT NULL COMMENT '鋼管名稱',
  `pipePrice` int(10) NOT NULL COMMENT '單價',
  `pipeImgUrl` varchar(200) NOT NULL COMMENT '鋼管圖片',
  `pipeStatus` varchar(100) NOT NULL COMMENT '鋼管狀態'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `pipe`
--

INSERT INTO `pipe` (`pipeNo`, `pipeName`, `pipePrice`, `pipeImgUrl`, `pipeStatus`) VALUES
(2, '一枝獨秀款', 1000, 'images/customized/cust_stage_audioAndPole/pole.png', '啟用'),
(3, '三人小團體', 3000, 'images/customized/cust_stage_audioAndPole/pole_3.png', '啟用'),
(4, '五福大臨門', 6000, 'images/customized/cust_stage_audioAndPole/pole_5.png', '啟用');

-- --------------------------------------------------------

--
-- 資料表結構 `robot`
--

CREATE TABLE `robot` (
  `robotNo` int(10) NOT NULL COMMENT ' 關鍵字編號',
  `robotAsk` varchar(20) NOT NULL COMMENT '關鍵字內容',
  `robotAns` varchar(200) NOT NULL COMMENT '關鍵字應答',
  `robotStatus` varchar(3) NOT NULL COMMENT '狀態'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `robot`
--

INSERT INTO `robot` (`robotNo`, `robotAsk`, `robotAns`, `robotStatus`) VALUES
(1, 'qq', 'hi', '啟用'),
(2, 'ww', 'hi', '啟用'),
(3, 'qq', 'hi', '啟用'),
(4, 'ww', 'hi', '啟用');

-- --------------------------------------------------------

--
-- 資料表結構 `troupe`
--

CREATE TABLE `troupe` (
  `troupeNo` int(10) NOT NULL COMMENT '舞團編號',
  `troupeName` varchar(15) NOT NULL COMMENT '舞團名稱 ',
  `troupePrice` int(10) NOT NULL COMMENT '單價',
  `troupeStatus` varchar(100) NOT NULL COMMENT '狀態',
  `troupeImgUrl` varchar(50) NOT NULL COMMENT '舞團圖片',
  `troupeGif` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `troupe`
--

INSERT INTO `troupe` (`troupeNo`, `troupeName`, `troupePrice`, `troupeStatus`, `troupeImgUrl`, `troupeGif`) VALUES
(2, '最熱情森巴', 7000, '啟用', 'images/customized/cust_stage_dance/dance_01.png', 'images/danceGirlOne.gif'),
(3, '大媽廣場舞', 10000, '啟用', 'images/customized/cust_stage_dance/dance_02.png', 'images/dance1.gif'),
(5, '超清涼辣妹', 12000, '啟用', 'images/customized/cust_stage_dance/dance_03.png', 'images/dance2.gif'),
(6, '猛男愛搖擺', 12000, '啟用', 'images/customized/cust_stage_dance/dance_04.png', 'images/dance3.gif'),
(7, '正妹雙人舞', 13000, '啟用', 'images/customized/cust_stage_dance/dance_05.png', 'images/dance4.gif'),
(8, '真舞龍舞獅', 18000, '啟用', 'images/customized/cust_stage_dance/dance_06.png', 'images/dance5.gif');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`adminNo`);

--
-- 資料表索引 `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`audioNo`);

--
-- 資料表索引 `binform`
--
ALTER TABLE `binform`
  ADD PRIMARY KEY (`binformNo`),
  ADD KEY `memNo_FK2` (`memNo`),
  ADD KEY `orderNo_FK` (`orderNo`);

--
-- 資料表索引 `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`hostNo`);

--
-- 資料表索引 `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`memNo`,`orderNo`),
  ADD KEY `orderNo_FK1` (`orderNo`);

--
-- 資料表索引 `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`couponsType`);

--
-- 資料表索引 `draw`
--
ALTER TABLE `draw`
  ADD PRIMARY KEY (`drawNo`);

--
-- 資料表索引 `effects`
--
ALTER TABLE `effects`
  ADD PRIMARY KEY (`effectsNo`);

--
-- 資料表索引 `finform`
--
ALTER TABLE `finform`
  ADD PRIMARY KEY (`finformNo`),
  ADD KEY `flyerNo_FK` (`flyerNo`),
  ADD KEY `memNo_FK5` (`memNo`);

--
-- 資料表索引 `fireworks`
--
ALTER TABLE `fireworks`
  ADD PRIMARY KEY (`fireworkNo`);

--
-- 資料表索引 `flyer`
--
ALTER TABLE `flyer`
  ADD PRIMARY KEY (`flyerNo`),
  ADD KEY `orderNo_FK3` (`orderNo`);

--
-- 資料表索引 `flyimg`
--
ALTER TABLE `flyimg`
  ADD PRIMARY KEY (`flyNo`);

--
-- 資料表索引 `host`
--
ALTER TABLE `host`
  ADD PRIMARY KEY (`hostNo`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memNo`);

--
-- 資料表索引 `memcoupons`
--
ALTER TABLE `memcoupons`
  ADD PRIMARY KEY (`memCouponsNo`),
  ADD KEY `memNo` (`memNo`),
  ADD KEY `couponsType_FK` (`couponsType`);

--
-- 資料表索引 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageNo`),
  ADD KEY `memNo_FK3` (`memNo`),
  ADD KEY `orderNo_FK2` (`orderNo`);

--
-- 資料表索引 `minform`
--
ALTER TABLE `minform`
  ADD PRIMARY KEY (`minformNo`),
  ADD KEY `messageNo_FK` (`messageNo`),
  ADD KEY `memNo_FK4` (`memNo`);

--
-- 資料表索引 `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderNo`),
  ADD KEY `memCouponsNo_FK` (`memCouponsNo`),
  ADD KEY `flyNo_FK` (`flyerNo`),
  ADD KEY `memNo_FK` (`memNo`),
  ADD KEY `hostNo_FK` (`hostNo`);

--
-- 資料表索引 `pipe`
--
ALTER TABLE `pipe`
  ADD PRIMARY KEY (`pipeNo`);

--
-- 資料表索引 `robot`
--
ALTER TABLE `robot`
  ADD PRIMARY KEY (`robotNo`);

--
-- 資料表索引 `troupe`
--
ALTER TABLE `troupe`
  ADD PRIMARY KEY (`troupeNo`);

--
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `administrator`
--
ALTER TABLE `administrator`
  MODIFY `adminNo` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理員編號', AUTO_INCREMENT=20;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `audio`
--
ALTER TABLE `audio`
  MODIFY `audioNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '音響編號', AUTO_INCREMENT=5;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `binform`
--
ALTER TABLE `binform`
  MODIFY `binformNo` int(11) NOT NULL AUTO_INCREMENT COMMENT '選美檢舉編號', AUTO_INCREMENT=5;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `calendar`
--
ALTER TABLE `calendar`
  MODIFY `hostNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '主持人編號', AUTO_INCREMENT=2;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `coupons`
--
ALTER TABLE `coupons`
  MODIFY `couponsType` int(11) NOT NULL AUTO_INCREMENT COMMENT '優惠券種類', AUTO_INCREMENT=32;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `draw`
--
ALTER TABLE `draw`
  MODIFY `drawNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '內塗裝編號', AUTO_INCREMENT=13;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `effects`
--
ALTER TABLE `effects`
  MODIFY `effectsNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '特效設備編號', AUTO_INCREMENT=5;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `finform`
--
ALTER TABLE `finform`
  MODIFY `finformNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '宣傳單檢舉編號', AUTO_INCREMENT=4;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `fireworks`
--
ALTER TABLE `fireworks`
  MODIFY `fireworkNo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `flyer`
--
ALTER TABLE `flyer`
  MODIFY `flyerNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '宣傳單編號', AUTO_INCREMENT=2;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `flyimg`
--
ALTER TABLE `flyimg`
  MODIFY `flyNo` int(20) NOT NULL AUTO_INCREMENT COMMENT '宣傳單編號', AUTO_INCREMENT=11;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `host`
--
ALTER TABLE `host`
  MODIFY `hostNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '主持人編號', AUTO_INCREMENT=12;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `memNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '會員編號', AUTO_INCREMENT=5;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `memcoupons`
--
ALTER TABLE `memcoupons`
  MODIFY `memCouponsNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '優惠券編號', AUTO_INCREMENT=3;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `message`
--
ALTER TABLE `message`
  MODIFY `messageNo` int(11) NOT NULL AUTO_INCREMENT COMMENT '留言編號', AUTO_INCREMENT=2;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `minform`
--
ALTER TABLE `minform`
  MODIFY `minformNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '留言檢舉編號', AUTO_INCREMENT=3;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `orders`
--
ALTER TABLE `orders`
  MODIFY `orderNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '訂單編號', AUTO_INCREMENT=5;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `pipe`
--
ALTER TABLE `pipe`
  MODIFY `pipeNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '鋼管編號鋼管編號', AUTO_INCREMENT=5;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `robot`
--
ALTER TABLE `robot`
  MODIFY `robotNo` int(10) NOT NULL AUTO_INCREMENT COMMENT ' 關鍵字編號', AUTO_INCREMENT=5;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `troupe`
--
ALTER TABLE `troupe`
  MODIFY `troupeNo` int(10) NOT NULL AUTO_INCREMENT COMMENT '舞團編號', AUTO_INCREMENT=9;

--
-- 已傾印資料表的限制(constraint)
--

--
-- 資料表的限制(constraint) `binform`
--
ALTER TABLE `binform`
  ADD CONSTRAINT `memNo_FK2` FOREIGN KEY (`memNo`) REFERENCES `member` (`memno`),
  ADD CONSTRAINT `orderNo_FK` FOREIGN KEY (`orderNo`) REFERENCES `orders` (`orderno`);

--
-- 資料表的限制(constraint) `collection`
--
ALTER TABLE `collection`
  ADD CONSTRAINT `memNo_FK1` FOREIGN KEY (`memNo`) REFERENCES `member` (`memno`),
  ADD CONSTRAINT `orderNo_FK1` FOREIGN KEY (`orderNo`) REFERENCES `orders` (`orderno`);

--
-- 資料表的限制(constraint) `finform`
--
ALTER TABLE `finform`
  ADD CONSTRAINT `flyerNo_FK` FOREIGN KEY (`flyerNo`) REFERENCES `flyer` (`flyerno`),
  ADD CONSTRAINT `memNo_FK5` FOREIGN KEY (`memNo`) REFERENCES `member` (`memno`);

--
-- 資料表的限制(constraint) `flyer`
--
ALTER TABLE `flyer`
  ADD CONSTRAINT `orderNo_FK3` FOREIGN KEY (`orderNo`) REFERENCES `orders` (`orderno`);

--
-- 資料表的限制(constraint) `memcoupons`
--
ALTER TABLE `memcoupons`
  ADD CONSTRAINT `couponsType_FK` FOREIGN KEY (`couponsType`) REFERENCES `coupons` (`couponstype`),
  ADD CONSTRAINT `member_FK` FOREIGN KEY (`memNo`) REFERENCES `member` (`memno`);

--
-- 資料表的限制(constraint) `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `memNo_FK3` FOREIGN KEY (`memNo`) REFERENCES `member` (`memno`),
  ADD CONSTRAINT `orderNo_FK2` FOREIGN KEY (`orderNo`) REFERENCES `orders` (`orderno`);

--
-- 資料表的限制(constraint) `minform`
--
ALTER TABLE `minform`
  ADD CONSTRAINT `memNo_FK4` FOREIGN KEY (`memNo`) REFERENCES `member` (`memno`),
  ADD CONSTRAINT `messageNo_FK` FOREIGN KEY (`messageNo`) REFERENCES `message` (`messageno`);

--
-- 資料表的限制(constraint) `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `hostNo_FK` FOREIGN KEY (`hostNo`) REFERENCES `host` (`hostno`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `memCouponsNo_FK` FOREIGN KEY (`memCouponsNo`) REFERENCES `memcoupons` (`memcouponsno`),
  ADD CONSTRAINT `memNo_FK` FOREIGN KEY (`memNo`) REFERENCES `member` (`memno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
