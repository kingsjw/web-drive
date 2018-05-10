-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 18-04-03 17:25
-- 서버 버전: 10.1.21-MariaDB
-- PHP 버전: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `0402`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `files`
--

CREATE TABLE `files` (
  `idx` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `micro` text NOT NULL,
  `path` int(11) NOT NULL,
  `folder` int(11) NOT NULL,
  `size` double NOT NULL,
  `wdate` datetime NOT NULL,
  `edate` datetime NOT NULL,
  `u_idx` int(11) NOT NULL,
  `folder_c` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `files`
--

INSERT INTO `files` (`idx`, `f_name`, `micro`, `path`, `folder`, `size`, `wdate`, `edate`, `u_idx`, `folder_c`) VALUES
(63, 'asd', '', 0, 1, 0, '2018-03-27 23:30:23', '2018-03-27 23:30:23', 18, 0),
(64, '0324.sql', '0.69305500 15221610320324.sql', 63, 0, 3743, '2018-03-27 23:30:32', '2018-03-27 23:30:32', 18, 0),
(65, 'a', '', 63, 1, 0, '2018-03-27 23:30:48', '2018-03-27 23:30:48', 18, 0),
(66, '0324.sql', '0.85123200 15221610570324.sql', 65, 0, 3743, '2018-03-27 23:30:57', '2018-03-27 23:30:57', 18, 0),
(67, 'index.php', '0.32615500 1522161127index.php', 0, 0, 680, '2018-03-27 23:32:07', '2018-03-27 23:32:07', 18, 0),
(70, 'aa', '1522764331.2256', 0, 0, 1028112299, '2018-04-03 23:05:31', '2018-04-03 23:05:42', 16, 0),
(71, 'aa', '', 0, 1, 0, '2018-04-03 23:05:51', '2018-04-03 23:05:51', 16, 0),
(72, '[JTBC] 냉장고를 부탁해.E172.180312.720p-NEXT.mp4', '1522764896.084', 71, 0, 1284370108, '2018-04-03 23:14:56', '2018-04-03 23:14:56', 16, 0),
(73, '%5BtvN%5D 라이브.E03.180317.1080p-NEXT.mp4.torrent', '1522768983.4867', 0, 0, 219213, '2018-04-04 00:23:03', '2018-04-04 00:23:03', 16, 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `inside`
--

CREATE TABLE `inside` (
  `idx` int(11) NOT NULL,
  `f_idx` int(11) NOT NULL,
  `u_idx` int(11) NOT NULL,
  `down_cnt` int(11) NOT NULL,
  `wdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `inside`
--

INSERT INTO `inside` (`idx`, `f_idx`, `u_idx`, `down_cnt`, `wdate`) VALUES
(1, 70, 16, 3, '2018-04-04 00:19:26'),
(2, 73, 16, 1, '2018-04-04 00:23:12');

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `idx` int(11) NOT NULL,
  `userid` text NOT NULL,
  `userpw` text NOT NULL,
  `username` text NOT NULL,
  `salt` text NOT NULL,
  `userlevel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`idx`, `userid`, `userpw`, `username`, `salt`, `userlevel`) VALUES
(16, 'admin', '95dfd0353e2470047ea45b5bd7484189b7c1986830aabba5377176bef7720912', '관리자', 'Ee40', '관리자'),
(18, 'user1', '037e0f6a4ac4d7338ab8b7694d993a2ada1da144609b5753a1255232f9efe172', '유저1', 'Df25', '사용자'),
(19, 'user2', 'bab60cfa994db94a16281c2da3706688d75f7deb194135a7e4d075a7fba712e1', '유저2', 'Ff34', '관리자'),
(22, 'user3', '9f67cbe98b8f2ecedb28a2ff442586413df8ed0428c9413af4e8819e7c3a7a28', 'user3', 'Ad60', '관리자');

-- --------------------------------------------------------

--
-- 테이블 구조 `outside`
--

CREATE TABLE `outside` (
  `idx` int(11) NOT NULL,
  `f_idx` int(11) NOT NULL,
  `u_idx` int(11) NOT NULL,
  `down_cnt` int(11) NOT NULL,
  `wdate` datetime NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `outside`
--

INSERT INTO `outside` (`idx`, `f_idx`, `u_idx`, `down_cnt`, `wdate`, `code`) VALUES
(1, 67, 18, 1, '2018-03-27 23:32:12', 'Ca85'),
(2, 72, 16, 1, '2018-04-04 00:17:07', 'FC22');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `inside`
--
ALTER TABLE `inside`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `outside`
--
ALTER TABLE `outside`
  ADD PRIMARY KEY (`idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `files`
--
ALTER TABLE `files`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- 테이블의 AUTO_INCREMENT `inside`
--
ALTER TABLE `inside`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 테이블의 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- 테이블의 AUTO_INCREMENT `outside`
--
ALTER TABLE `outside`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
