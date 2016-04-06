-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2016 at 08:41 AM
-- Server version: 5.5.47-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `student_platform_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `answer` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `question_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question` (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table ` questions`
--

CREATE TABLE IF NOT EXISTS ` questions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `question` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `answer_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `answer` (`answer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_answered`
--

CREATE TABLE IF NOT EXISTS `user_answered` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `weekly_questions_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `tried` int(10) NOT NULL,
  `correct_answers` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `weekly_questions_id` (`weekly_questions_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `weekly_questions`
--

CREATE TABLE IF NOT EXISTS `weekly_questions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `question_id` int(10) NOT NULL,
  `week_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question:` (`question_id`),
  KEY `week_id` (`week_id`),
  KEY `question_id` (`question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `weeks`
--

CREATE TABLE IF NOT EXISTS `weeks` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES ` questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table ` questions`
--
ALTER TABLE ` questions`
  ADD CONSTRAINT ` questions_ibfk_1` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_answered`
--
ALTER TABLE `user_answered`
  ADD CONSTRAINT `user_answered_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_answered_ibfk_1` FOREIGN KEY (`weekly_questions_id`) REFERENCES `weekly_questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `weekly_questions`
--
ALTER TABLE `weekly_questions`
  ADD CONSTRAINT `weekly_questions_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES ` questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `weekly_questions_ibfk_2` FOREIGN KEY (`week_id`) REFERENCES `weeks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
