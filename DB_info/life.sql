-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Aug 03, 2012 at 08:56 AM
-- Server version: 5.5.21
-- PHP Version: 5.3.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `life`
--

-- --------------------------------------------------------

--
-- Table structure for table `chain`
--

CREATE TABLE IF NOT EXISTS `chain` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_estonian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_estonian_ci COMMENT='This table is for defining different chains of goals' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `chain`
--

INSERT INTO `chain` (`id`, `name`) VALUES
(1, 'Chain for major goals'),
(2, 'Chain for small goals');

-- --------------------------------------------------------

--
-- Table structure for table `chain_goal`
--

CREATE TABLE IF NOT EXISTS `chain_goal` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `chain_id` bigint(20) unsigned NOT NULL,
  `goal_id` bigint(20) unsigned NOT NULL,
  `priority` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `chain_id` (`chain_id`,`goal_id`),
  KEY `goal_id` (`goal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_estonian_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `chain_goal`
--

INSERT INTO `chain_goal` (`id`, `chain_id`, `goal_id`, `priority`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `goal`
--

CREATE TABLE IF NOT EXISTS `goal` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `heading` varchar(30) COLLATE utf8mb4_estonian_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_estonian_ci NOT NULL,
  `due_date` date NOT NULL,
  `active` varchar(100) COLLATE utf8mb4_estonian_ci NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_estonian_ci NOT NULL,
  `on_dashboard` varchar(1) COLLATE utf8mb4_estonian_ci NOT NULL DEFAULT 'Y' COMMENT 'Y = on dashboard; N  = Not on dashboard',
  `owner_id` bigint(20) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `owner_id` (`owner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_estonian_ci COMMENT='This is a table for Goals' AUTO_INCREMENT=5 ;

--
-- Dumping data for table `goal`
--

INSERT INTO `goal` (`id`, `heading`, `description`, `due_date`, `active`, `status`, `on_dashboard`, `owner_id`) VALUES
(1, 'Goal 1', 'Kirjeldus uus uus', '2012-07-30', 'Y', '', 'N', 1),
(2, 'Goal 2', 'Teine kirjeldus', '2012-07-21', 'Y', '', 'Y', 1),
(3, 'Goal 3', 'Jee see on mul kolmas goal', '2012-08-31', 'Y', '', 'Y', 1),
(4, 'Goal 4', 'Mingi kirjeldus jee', '2012-08-31', 'Y', '', 'Y', 1);

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE IF NOT EXISTS `list` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_estonian_ci NOT NULL,
  `owner_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `owner` (`owner_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_estonian_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`id`, `name`, `owner_id`) VALUES
(1, 'Things I want to do', 1);

-- --------------------------------------------------------

--
-- Table structure for table `list_item`
--

CREATE TABLE IF NOT EXISTS `list_item` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `heading` varchar(100) COLLATE utf8mb4_estonian_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_estonian_ci NOT NULL,
  `priority` int(11) NOT NULL,
  `type_id` bigint(20) unsigned NOT NULL,
  `list_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `type` (`type_id`),
  KEY `list_id` (`list_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_estonian_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `list_item`
--

INSERT INTO `list_item` (`id`, `heading`, `description`, `priority`, `type_id`, `list_id`) VALUES
(1, '"Getting things done"', 'Raamat by someone', 1, 2, 1),
(2, '"Dokumentaal kõigest"', 'Dokumentaali link siia', 2, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `list_item_type`
--

CREATE TABLE IF NOT EXISTS `list_item_type` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_estonian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_estonian_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `list_item_type`
--

INSERT INTO `list_item_type` (`id`, `name`) VALUES
(1, 'Dream'),
(2, 'Book'),
(3, 'Documental'),
(4, 'Tutorial');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `heading` varchar(30) COLLATE utf8mb4_estonian_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_estonian_ci NOT NULL,
  `dueDate` date NOT NULL,
  `actionDate` date NOT NULL,
  `endDate` date NOT NULL,
  `status` varchar(100) COLLATE utf8mb4_estonian_ci NOT NULL,
  `goal_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `goal_id` (`goal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_estonian_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `heading`, `description`, `dueDate`, `actionDate`, `endDate`, `status`, `goal_id`) VALUES
(1, 'Task 1.1', 'See  on esimese goali esimene task', '0000-00-00', '0000-00-00', '0000-00-00', '', 1),
(2, 'Task 1.2', 'See on esimese goali teine task', '0000-00-00', '0000-00-00', '0000-00-00', '', 1),
(3, 'Task 2.1', 'Teise goali esimene task', '0000-00-00', '0000-00-00', '0000-00-00', '', 2),
(4, 'Task 2.2', 'Teise goali teine task', '0000-00-00', '0000-00-00', '0000-00-00', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `forname` varchar(200) COLLATE utf8mb4_estonian_ci NOT NULL,
  `lastname` varchar(200) COLLATE utf8mb4_estonian_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `forname` (`forname`(191)),
  KEY `forname_2` (`forname`(191)),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_estonian_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `forname`, `lastname`) VALUES
(1, 'Heily', 'Hindrea');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chain_goal`
--
ALTER TABLE `chain_goal`
  ADD CONSTRAINT `chain_goal_ibfk_1` FOREIGN KEY (`chain_id`) REFERENCES `chain` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `chain_goal_ibfk_2` FOREIGN KEY (`goal_id`) REFERENCES `goal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `goal`
--
ALTER TABLE `goal`
  ADD CONSTRAINT `goal_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `list_item`
--
ALTER TABLE `list_item`
  ADD CONSTRAINT `list_item_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `list_item_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `list_item_ibfk_2` FOREIGN KEY (`list_id`) REFERENCES `list` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `task_ibfk_2` FOREIGN KEY (`goal_id`) REFERENCES `goal` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
