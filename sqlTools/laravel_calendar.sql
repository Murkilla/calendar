-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:3306
-- 產生時間： 2021 年 11 月 15 日 18:26
-- 伺服器版本： 10.3.31-MariaDB-0ubuntu0.20.04.1
-- PHP 版本： 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `laravel_calendar`
--
CREATE DATABASE IF NOT EXISTS `laravel_calendar` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `laravel_calendar`;

-- --------------------------------------------------------

--
-- 資料表結構 `laravel_calendar`
--

CREATE TABLE `laravel_calendar` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `switch` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `laravel_calendar`
--

INSERT INTO `laravel_calendar` (`id`, `title`, `start`, `end`, `switch`) VALUES
(1, 'qazss', '2021-11-16 00:00:00', '2021-11-17 00:00:00', 'Y'),
(2, 'zxc', '2021-11-23 00:00:00', '2021-11-24 00:00:00', 'Y'),
(3, 'asd', '2021-11-30 00:00:00', '2021-12-01 00:00:00', 'Y');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `laravel_calendar`
--
ALTER TABLE `laravel_calendar`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `laravel_calendar`
--
ALTER TABLE `laravel_calendar`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
