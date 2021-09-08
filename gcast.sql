-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 07, 2021 at 09:20 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gcast`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag_ids` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci,
  `thumbnail_small` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail_big` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL,
  `hits` int(11) DEFAULT NULL,
  `created_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_23A0E6612469DE2` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `category_id`, `title`, `tag_ids`, `body`, `thumbnail_small`, `thumbnail_big`, `status`, `hits`, `created_time`, `update_time`) VALUES
(2, 4, 'aaaappppppp', '1111', 'aaaappppppp aaaappppppp aaaappppppp', NULL, NULL, 1, NULL, '2021-09-07 08:48:17', '2021-09-07 08:48:17'),
(3, 1, 'vvvvvvv', 'vvvv', 'vvvvv', NULL, NULL, 1, NULL, '2021-09-07 08:56:28', '2021-09-07 08:56:28'),
(4, 1, 'ggggggg', 'gg', '<p>ggg</p>', NULL, NULL, 1, NULL, '2021-09-07 09:13:51', '2021-09-07 09:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

DROP TABLE IF EXISTS `attachment`;
CREATE TABLE IF NOT EXISTS `attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_795FD9BB7294869C` (`article_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `lvl` int(11) NOT NULL,
  `root_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_64C19C1727ACA70` (`parent_id`),
  KEY `IDX_64C19C179066886` (`root_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `lft`, `rgt`, `lvl`, `root_id`) VALUES
(1, NULL, 'Home', 1, 6, 0, 1),
(2, 1, 'Tool', 9, 14, 1, 1),
(3, 1, 'Food', 2, 5, 1, 1),
(4, 3, 'Apple', 3, 4, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

DROP TABLE IF EXISTS `device`;
CREATE TABLE IF NOT EXISTS `device` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deviceTitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deviceContent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deviceStatus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deviceSketch` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deviceImage` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deviceDate` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`id`, `deviceTitle`, `deviceContent`, `deviceStatus`, `deviceSketch`, `deviceImage`, `deviceDate`) VALUES
(1, '摄像机', '索尼S817', '1', '预定时间', '/Command/images/2.jpg', '2021-08-20 16:20:31'),
(2, '音响', 'JJ8821', '1', '预定时间', '', '0000-00-00 00:00:00'),
(3, '游戏手柄', 'Douls4', '1', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20210901040533', '2021-09-01 04:06:56', 1226),
('DoctrineMigrations\\Version20210903054501', '2021-09-03 05:56:13', 1221),
('DoctrineMigrations\\Version20210906024549', '2021-09-06 02:47:08', 1876);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
CREATE TABLE IF NOT EXISTS `equipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `equipmentName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `equipmentEmail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `equipmentPhone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `equipmentNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `equipmentTeacher` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `equipmentClass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `equipmentDate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `equipmentReturndate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `equipmentContent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `equipmentStatus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `equipmentQuantity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sketch` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `status`, `sketch`, `img`, `time`) VALUES
(1, '1号楼101', '实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明实验室说明', '1', '多媒体', '/Command/images/1.png', '2021-08-13 14:42:00'),
(2, '1号楼102', '222实验室说明实验室说明实验室说', '1', '多媒体', '/Command/images/2.jpg', '2021-08-13 14:42:00'),
(3, '1号楼103', '实验3333333333333333333333333', '1', '多媒体', '/Command/images/3.jpg', '2021-08-13 20:01:00'),
(4, '1号楼104', '实验室104104104104', '1', '化学', '/Command/images/4.jpg', '2021-08-19 13:44:47'),
(5, '1号楼105', '实验室55555555555555555555555', '1', '数学', '/Command/images/4.jpg', '2021-08-19 13:51:27'),
(6, '1号楼106', '实验室666666666666666666', '2', '生物', '/Command/images/4.jpg', '2021-08-19 13:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userTitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userSketch` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userImg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userContent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userTime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

DROP TABLE IF EXISTS `reserve`;
CREATE TABLE IF NOT EXISTS `reserve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reserveName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reserveEmail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reservePhone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reserveNumber` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reserveTeacher` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reserveClass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reserveDate` datetime NOT NULL,
  `reserveTime` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reserveContent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reserveStatus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`id`, `reserveName`, `reserveEmail`, `reservePhone`, `reserveNumber`, `reserveTeacher`, `reserveClass`, `reserveDate`, `reserveTime`, `reserveContent`, `reserveStatus`) VALUES
(1, '王同学', '175@gemil.com', '15917956419', '44522220000930003X', '牛老师', '生物', '2021-08-19 10:10:35', '1', '申请使用实验室', '1');

-- --------------------------------------------------------

--
-- Table structure for table `test_entity`
--

DROP TABLE IF EXISTS `test_entity`;
CREATE TABLE IF NOT EXISTS `test_entity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userPsw` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `userName`, `userPsw`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

DROP TABLE IF EXISTS `works`;
CREATE TABLE IF NOT EXISTS `works` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` longtext COLLATE utf8_unicode_ci NOT NULL,
  `userTitle` longtext COLLATE utf8_unicode_ci NOT NULL,
  `userSketch` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userImg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userContent` longtext COLLATE utf8_unicode_ci NOT NULL,
  `userTime` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `userName`, `userTitle`, `userSketch`, `userImg`, `userContent`, `userTime`) VALUES
(1, '站小圆', '吉他建模', 'Make：Cordoba|Year：2021', '/Command/images/2.jpg', '吉他建模吉他建模吉他建模吉他建模吉他建模吉他建模吉他建模吉他建模', '2021-08-17 10:31:37');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_23A0E6612469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `attachment`
--
ALTER TABLE `attachment`
  ADD CONSTRAINT `FK_795FD9BB7294869C` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `FK_64C19C1727ACA70` FOREIGN KEY (`parent_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_64C19C179066886` FOREIGN KEY (`root_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
