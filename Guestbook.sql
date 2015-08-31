-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2015 年 02 月 04 日 17:31
-- 伺服器版本: 5.6.21
-- PHP 版本： 5.4.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `Guestbook`
--

-- --------------------------------------------------------

--
-- 資料表結構 `all_messages`
--

CREATE TABLE IF NOT EXISTS `all_messages` (
`ID` int(6) NOT NULL,
  `postname` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `context` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `all_reply`
--

CREATE TABLE IF NOT EXISTS `all_reply` (
  `ID` varchar(6) NOT NULL,
  `replyname` varchar(20) NOT NULL,
  `time` varchar(32) NOT NULL,
  `context` text NOT NULL,
`none` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `member_table`
--

CREATE TABLE IF NOT EXISTS `member_table` (
`NO` int(6) NOT NULL,
  `username` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `other` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `all_messages`
--
ALTER TABLE `all_messages`
 ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `all_reply`
--
ALTER TABLE `all_reply`
 ADD PRIMARY KEY (`none`);

--
-- 資料表索引 `member_table`
--
ALTER TABLE `member_table`
 ADD PRIMARY KEY (`NO`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `all_messages`
--
ALTER TABLE `all_messages`
MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `all_reply`
--
ALTER TABLE `all_reply`
MODIFY `none` int(6) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `member_table`
--
ALTER TABLE `member_table`
MODIFY `NO` int(6) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
