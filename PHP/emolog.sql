-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:3306
-- 生成日時: 2021 年 6 月 02 日 11:55
-- サーバのバージョン： 5.7.32
-- PHP のバージョン: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- データベース: `emolog`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_an_table`
--

CREATE TABLE `gs_an_table` (
  `id` int(12) NOT NULL,
  `kimochi` varchar(64) DEFAULT NULL,
  `naiyou` text,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `gs_an_table`
--

INSERT INTO `gs_an_table` (`id`, `kimochi`, `naiyou`, `indate`) VALUES
(24, 'かなしい', 'おおお', '2021-06-01 23:20:41'),
(25, 'まあまあ', 'aa', '2021-06-01 23:20:46'),
(26, 'おだやか', 'aa', '2021-06-01 23:20:50'),
(27, 'うれしい', 'aa', '2021-06-01 23:20:55'),
(28, 'わくわく', 'aa', '2021-06-01 23:21:01'),
(29, 'うれしい', 'ddd', '2021-06-02 08:49:53'),
(31, 'まあまあ', '勉強っd', '2021-06-02 15:15:35'),
(32, 'いらいら', 'ddd', '2021-06-02 20:17:25'),
(33, 'いらいら', 'ddd', '2021-06-02 20:17:42'),
(34, 'いらいら', 'dd', '2021-06-02 20:36:36');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_an_table`
--
ALTER TABLE `gs_an_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_an_table`
--
ALTER TABLE `gs_an_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
