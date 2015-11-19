-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 16, 2013 at 07:21 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kdkitchen`
--

-- --------------------------------------------------------

--
-- Table structure for table `attachments`
--

CREATE TABLE `attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_page_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `file_ext` varchar(20) NOT NULL,
  `file_dir` varchar(200) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `attachments`
--

INSERT INTO `attachments` (`id`, `user_page_id`, `type`, `file_name`, `file_ext`, `file_dir`, `created`, `modified`) VALUES
(37, 1, 'food', '85ef2510.jpeg', 'image/jpeg', 'uploads/attachments/3f011f8c9d9465ceacbbfb5881012696a68806e1/1', '2013-11-05 08:17:33', '2013-11-05 08:17:33'),
(40, 1, 'food', 'a821c93b-s.jpeg', 'image/jpeg', 'uploads/attachments/3f011f8c9d9465ceacbbfb5881012696a68806e1/1', '2013-11-05 08:49:14', '2013-11-05 08:49:14'),
(41, 1, 'food', 'a0016-000302-m.jpg', 'image/jpeg', 'uploads/attachments/3f011f8c9d9465ceacbbfb5881012696a68806e1/1', '2013-11-05 08:49:14', '2013-11-05 08:49:14'),
(43, 1, 'profile', 'a0016-000302-m.jpg', 'image/jpeg', 'uploads/attachments/3f011f8c9d9465ceacbbfb5881012696a68806e1/1', '2013-11-07 18:54:46', '2013-11-07 18:54:46');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `code`, `name`, `description`, `created`, `modified`) VALUES
(1, 'recipe', 'Recipes', '', '2013-10-27 00:00:00', '2013-10-27 00:00:00'),
(2, 'report', 'Reports', '', '2013-10-27 00:00:00', '2013-10-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `categories_posts`
--

CREATE TABLE `categories_posts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=33 ;

--
-- Dumping data for table `categories_posts`
--

INSERT INTO `categories_posts` (`id`, `category_id`, `post_id`) VALUES
(1, 1, 16),
(2, 1, 19),
(3, 1, 20),
(4, 1, 23),
(5, 1, 24),
(6, 1, 25),
(7, 1, 26),
(8, 1, 27),
(9, 1, 28),
(10, 1, 29),
(11, 1, 30),
(12, 1, 31),
(13, 1, 32),
(14, 1, 33),
(15, 1, 34),
(16, 1, 35),
(17, 1, 36),
(18, 1, 37),
(19, 1, 38),
(20, 1, 39),
(21, 1, 40),
(22, 1, 41),
(23, 1, 42),
(24, 1, 43),
(25, 1, 46),
(26, 1, 47),
(27, 1, 48),
(28, 1, 49),
(29, 1, 50),
(30, 2, 51),
(31, 1, 52),
(32, 1, 53);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `body` text NOT NULL,
  `password` varchar(64) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `created_by` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `parent_id`, `body`, `password`, `is_deleted`, `created_by`, `created`, `modified`) VALUES
(1, 0, NULL, 'asd', '', 0, '', '2013-06-04 23:59:07', '2013-06-04 23:59:07'),
(2, 0, NULL, 'ads', '', 0, '', '2013-06-05 00:42:05', '2013-06-05 00:42:05'),
(3, 1, NULL, 'tsss', '', 0, '', '2013-06-10 00:17:12', '2013-06-10 00:17:12'),
(4, 1, NULL, 'dd', '', 0, '', '2013-06-10 00:23:48', '2013-06-10 00:23:48'),
(5, 1, NULL, 'dd', '', 0, 'aa', '2013-06-10 00:24:05', '2013-06-10 00:24:05'),
(6, 80, NULL, 'VV', '', 0, 'FF', '2013-06-10 00:24:36', '2013-06-10 00:24:36'),
(7, 80, 6, 'asdasdads', '', 0, 'asd', '2013-06-05 00:00:00', '2013-06-05 00:00:00'),
(8, 80, 7, 'DDDDDDDDDDDD', '', 0, 'caddsasd', '2013-06-26 00:00:00', '2013-06-26 00:00:00'),
(9, 80, NULL, 'asdasd', '', 0, 'asdasd', '2013-06-10 01:44:08', '2013-06-10 01:44:08'),
(10, 80, NULL, 'asdasdasdasdasd', '', 0, 'asd', '2013-06-10 01:44:18', '2013-06-10 01:44:18'),
(11, 80, 8, 'asdasdas', '', 0, 'D', '2013-06-10 01:45:51', '2013-06-10 01:45:51'),
(12, 80, 9, 'XX', '', 0, 'VV', '2013-06-10 01:45:59', '2013-06-10 01:45:59'),
(13, 80, 12, 'dasdasd', '', 0, 'asdas', '2013-06-10 01:46:08', '2013-06-10 01:46:08'),
(14, 80, NULL, 'dafga', '', 0, 'dafgadg', '2013-06-10 01:46:17', '2013-06-10 01:46:17'),
(15, 80, NULL, 'hey', '', 0, '', '2013-06-10 23:59:46', '2013-06-10 23:59:46'),
(16, 79, NULL, 'asdf', '', 0, 'asdf', '2013-06-13 23:45:51', '2013-06-13 23:45:51'),
(17, 79, 16, 'gdfsgs', '', 0, 'sdf', '2013-06-13 23:46:13', '2013-06-13 23:46:13'),
(18, 92, NULL, 'asd', '', 0, 'test', '2013-07-05 23:00:00', '2013-07-05 23:00:00'),
(19, 92, NULL, 'asdasd', '', 0, 'dsa', '2013-07-10 16:35:36', '2013-07-10 16:35:36'),
(20, 0, NULL, 'sadfasf', '', 0, 'test', '2013-10-28 09:44:23', '2013-10-28 09:44:23'),
(21, 0, NULL, 'sadfasf', '', 0, 'test', '2013-10-28 09:44:48', '2013-10-28 09:44:48'),
(22, 20, NULL, 'dsfgs', '', 0, 'asd', '2013-10-28 09:44:57', '2013-10-28 09:44:57'),
(23, 20, 22, 'sdfsaf', '', 0, 'test', '2013-10-28 09:45:06', '2013-10-28 09:45:06'),
(24, 16, NULL, 'hahaha', '', 0, 'test', '2013-11-03 09:13:17', '2013-11-03 09:13:17'),
(25, 16, NULL, 'sdf', '', 0, 'fasd', '2013-11-03 09:13:30', '2013-11-03 09:13:30'),
(26, 52, NULL, 'asdf', '', 0, 'asfd', '2013-11-04 06:46:09', '2013-11-04 06:46:09'),
(27, 53, NULL, 'sadfasf', '', 0, 'sdfasf', '2013-11-15 05:14:52', '2013-11-15 05:14:52'),
(28, 53, NULL, 'sdfasf', '', 0, 'sdf', '2013-11-15 05:15:17', '2013-11-15 05:15:17'),
(34, 53, 28, 'asfd', '5fbb22c69f659d42a68774eff8d008b384e711df85da62aa879249692f2652e6', 0, 'asdf', '2013-11-15 08:32:59', '2013-11-15 08:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(200) NOT NULL,
  `file_ext` varchar(20) NOT NULL,
  `file_dir` varchar(200) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `file_name`, `file_ext`, `file_dir`, `created`, `modified`) VALUES
(37, '1e6d1c13.jpg', 'image/jpeg', 'uploads/media/20131028', '2013-10-28 04:09:52', '2013-10-28 04:09:52'),
(38, '21a85852.jpg', 'image/jpeg', 'uploads/media/20131028', '2013-10-28 04:11:21', '2013-10-28 04:11:21'),
(39, '85ef2510.jpeg', 'image/jpeg', 'uploads/media/20131028', '2013-10-28 08:11:11', '2013-10-28 08:11:11'),
(40, '02419992.gif', 'image/gif', 'uploads/media/20131028', '2013-10-28 08:14:48', '2013-10-28 08:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL,
  `is_valid` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `user_id`, `hash`, `is_valid`, `created`, `modified`) VALUES
(1, 0, '', 1, '2013-07-07 21:50:26', '2013-07-07 21:50:26'),
(2, 0, 'bc70fd271cc1e6163b2f7975b0c5570c91962703f65bfba6964b79337f016fcf', 1, '2013-07-07 21:51:21', '2013-07-07 21:51:21'),
(3, 0, 'b287ecb2f3fa4d66ae13791c92bc2704314d11fb7164b0301bf4637fc4dbdc9a', 1, '2013-07-07 21:52:17', '2013-07-07 21:52:17'),
(4, 8, 'c297346e744e2bcb5296660dbbd3ee5bdcd534fbbfcd08fea7e2c663be555458', 1, '2013-07-07 21:59:59', '2013-07-07 21:59:59'),
(5, 8, 'e24a71d21ab0369f7f007d5ca73f5918ce34ef6162c24269e941842f03d648db', 1, '2013-07-07 22:02:48', '2013-07-07 22:02:48'),
(6, 8, 'b95be37a28613b4a6d5259fbc92355f82f21a72198a96a4a399655b5f66acf71', 1, '2013-07-07 22:07:01', '2013-07-07 22:07:01'),
(7, 1, 'a81146a1aec6e177557c6071290ef91346f098bbf215c9c897fdd6eac7c43ce5', 1, '2013-10-20 06:19:20', '2013-10-20 06:19:20');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `featured_media_url` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `summary` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `comment_count` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=54 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `featured_media_url`, `body`, `summary`, `comment_count`, `created`, `modified`) VALUES
(1, 'test', '', '<p>sadf</p>', '', 0, '2013-10-27 21:11:52', '2013-10-27 21:11:52'),
(2, 'test', '', '<p>fasfasdf</p>', '', 0, '2013-10-27 21:12:41', '2013-10-27 21:12:41'),
(3, 'aaa', '', '<p>vvv</p>', '', 0, '2013-10-27 21:19:00', '2013-10-27 21:19:00'),
(4, 'aaa', '', '<p>vvv</p>', '', 0, '2013-10-27 21:23:54', '2013-10-27 21:23:54'),
(5, 'aaa', '', '<p>vvv</p>', '', 0, '2013-10-27 21:24:08', '2013-10-27 21:24:08'),
(6, 'aaa', '', '<p>vvv</p>', '', 0, '2013-10-27 21:24:36', '2013-10-27 21:24:36'),
(7, 'aaa', '', '<p>vvv</p>', '', 0, '2013-10-27 21:27:09', '2013-10-27 21:27:09'),
(9, 'aaa', '', '<p>vvv</p>', '', 0, '2013-10-27 21:30:32', '2013-10-27 21:30:32'),
(12, 'aaa', '', '<p>vvv</p>', '', 0, '2013-10-27 21:39:38', '2013-10-27 21:39:38'),
(13, 'aaa', '', '<p>vvv</p>', '', 0, '2013-10-27 21:39:58', '2013-10-27 21:39:58'),
(14, 'ccc', '', '<p>aaa</p>', '', 0, '2013-10-27 21:47:22', '2013-10-27 21:47:22'),
(15, 'ccc', '', '<p>aaa</p>', '', 0, '2013-10-27 21:48:17', '2013-10-27 21:48:17'),
(16, 'aaa', '', '<p>asdfsadf</p>', '', 2, '2013-10-27 21:49:53', '2013-10-28 00:14:49'),
(17, 'aaa', '', '<p>cccc</p>', '', 0, '2013-10-28 00:13:49', '2013-10-28 00:13:49'),
(18, 'aaa', '', '<p>aaa</p>', '', 0, '2013-10-28 00:14:17', '2013-10-28 00:14:17'),
(19, 'test', '', '<p>ahhaha</p>', 'asd', 0, '2013-10-28 08:18:35', '2013-10-28 11:48:16'),
(20, 'aaa', 'http://local.kdkitchen.com:8888/uploads/attachments/3f011f8c9d9465ceacbbfb5881012696a68806e1/1/disp/03044-velocityii-1440x900.jpg', '<p>bbb</p>', 'test thiest asifdj oasdjf odsajf oisajfo d', 2, '2013-10-28 08:20:41', '2013-10-28 08:20:41'),
(23, 'asd', '', '<p>dasasd</p>', '', 0, '2013-10-28 11:34:04', '2013-10-28 11:34:04'),
(24, '', '', '', '', 0, '2013-11-03 21:56:53', '2013-11-03 21:56:53'),
(25, '', '', '', '', 0, '2013-11-03 21:57:24', '2013-11-03 21:57:24'),
(26, '', '', '', '', 0, '2013-11-03 21:57:31', '2013-11-03 21:57:31'),
(27, '', '', '', '', 0, '2013-11-03 21:57:55', '2013-11-03 21:57:55'),
(28, '', '', '', '', 0, '2013-11-03 22:39:08', '2013-11-03 22:39:08'),
(29, '', '', '', '', 0, '2013-11-03 22:39:48', '2013-11-03 22:39:48'),
(30, '', '', '', '', 0, '2013-11-03 22:40:43', '2013-11-03 22:40:43'),
(31, 'asdfasf', '', '', '', 0, '2013-11-03 22:42:18', '2013-11-03 22:42:18'),
(32, 'asdfasf', '', '', '', 0, '2013-11-03 23:34:00', '2013-11-03 23:34:00'),
(33, '', '', '', '', 0, '2013-11-03 23:34:06', '2013-11-03 23:34:06'),
(34, '', '', '', '', 0, '2013-11-03 23:34:33', '2013-11-03 23:34:33'),
(35, '', '', '', '', 0, '2013-11-03 23:40:39', '2013-11-03 23:40:39'),
(36, '', '', '', '', 0, '2013-11-03 23:40:49', '2013-11-03 23:40:49'),
(37, '', '', '', '', 0, '2013-11-03 23:40:57', '2013-11-03 23:40:57'),
(38, '', '', '', '', 0, '2013-11-03 23:41:46', '2013-11-03 23:41:46'),
(39, '', '', '', '', 0, '2013-11-03 23:42:04', '2013-11-03 23:42:04'),
(40, '', '', '', '', 0, '2013-11-03 23:47:15', '2013-11-03 23:47:15'),
(41, '', '', '', '', 0, '2013-11-03 23:47:23', '2013-11-03 23:47:23'),
(42, '', '', '', '', 0, '2013-11-03 23:52:44', '2013-11-04 04:52:22'),
(43, '', '', '', '', 0, '2013-11-03 23:53:03', '2013-11-03 23:53:03'),
(44, '', '', '', '', 0, '2013-11-04 04:36:19', '2013-11-04 04:36:19'),
(45, '', '', '', '', 0, '2013-11-04 04:37:03', '2013-11-04 04:37:03'),
(46, '', '', '', '', 0, '2013-11-04 04:37:19', '2013-11-04 04:37:19'),
(47, '', '', '', '', 0, '2013-11-04 04:38:28', '2013-11-04 04:38:28'),
(48, '', '', '', '', 0, '2013-11-04 04:38:48', '2013-11-04 04:38:48'),
(49, '', '', '', '', 0, '2013-11-04 05:11:02', '2013-11-04 05:11:02'),
(50, '', '', '', '', 0, '2013-11-04 05:11:41', '2013-11-04 05:11:41'),
(51, '', '', '', '', 0, '2013-11-04 06:44:39', '2013-11-04 06:44:39'),
(52, 'sdaf', 'http://demo.samuli.me/_media/smartstart-html/sliders/features-slider/features_img_1.jpg', '<p>ãƒ‡ãƒˆãƒƒã‚¯ã‚¹ã®æœ¬å ´NYã§ãƒ€ã‚¤ã‚¨ãƒƒãƒˆã‚³ãƒ¼ãƒã¨ã—ã¦æ´»èºã™ã‚‹æ—¥ã€…ã‚’ãŠé€ã‚Šã—ã¾ã™ã€‚<br />ãƒ–ãƒ­ã‚°ã‚’é€šã—ã¦Healthyã§Sexyã§ã€Happyï¼ã«ãªã‚‹ã“ã¨ãŒ<br />ã¨ã£ã¦ã‚‚å¤§åˆ‡ã§ã‚ã‚‹ã“ã¨ãŒä¼ã‚ã‚Šã¾ã™ã‚ˆã†ã«ã€‚<br />ãã—ã¦ã„ã¤ã‹ã€ã‚ãªãŸã‚’ç›´æŽ¥ã‚³ãƒ¼ãƒãƒ³ã‚°ã—ã¦ã€<br />Healthy, Sexy, Happyãªä½“ã¨ãƒžã‚¤ãƒ³ãƒ‰ã‚’æ‰‹ã«å…¥ã‚Œã‚‹ãŠæ‰‹ä¼ã„ãŒã§ãã‚Œã°<br />ã“ã‚Œã»ã©å¬‰ã—ã„ã“ã¨ã¯ãªã„ã‚ï¼ï¼<br /><br /><br />ã©ã†ãžã‚ˆã‚ã—ããŠé¡˜ã„ã—ã¾ã™â™¡<br /><br /><br /><span style="color: #ff1493;"><strong><span style="font-size: x-large;">ã€ŽKDã‚¯ãƒƒã‚­ãƒ³ã‚°ã‚¯ãƒ©ã‚¹ in å¤§é˜ªï¼ã€</span></strong></span><br /><span style="font-size: medium;"><br />NYç™ºï¼ä½“ã®ä¸­ã‹ã‚‰ã‚­ãƒ¬ã‚¤ã«ï¼<br />Healthy! Sexy! Happyãªä½“ã‚’æ‰‹ã«å…¥ã‚Œã‚‹ãŠæ‰‹ä¼ã„ã‚’ã™ã‚‹ã‹ã‚‰ã ãƒ‡ãƒˆãƒƒã‚¯ã‚¹ãŒã€<br />ç¾Žå‘³ã—ãã¦æº€è¶³ãŒã§ãã‚‹ã‚¹ãƒ†ã‚­ãªKDãƒ¬ã‚·ãƒ”ã®åŸºç¤Žã‚’ã”ç´¹ä»‹ã—ã¾ã™ï¼<br />ãƒ¡ãƒ‹ãƒ¥ãƒ¼ã¯å…¨éƒ¨ã§4å“ï¼<br /><br /><span style="color: #009966;">â—GJ ( Green Juice: çµžã‚Šç«‹ã¦é‡Žèœã‚¸ãƒ¥ãƒ¼ã‚¹) ã€€<br />â—é‡Žèœæµ·è‹”å·»ãã€€â—ã‚­ãƒŽã‚¢ã¨çŽ„ç±³ã®æ —ã”ã¯ã‚“&nbsp;<br />â—å­£ç¯€ã®ãƒ‡ã‚¶ãƒ¼ãƒˆæŸ¿ã®ãƒ—ãƒªãƒ³</span><br /><br />ã¾ãŸã€ã‚¯ãƒƒã‚­ãƒ³ã‚°ã‚¯ãƒ©ã‚¹ã§ã¯<br />New Yorkã‚¹ã‚¿ã‚¤ãƒ«ã®KDãƒ—ãƒ­ã‚°ãƒ©ãƒ ã®ã‚³ãƒ³ã‚»ãƒ—ãƒˆã«ã¤ã„ã¦ã‚‚å­¦ã‚“ã§é ‚ã‘ã¾ã™ï¼<br /><strong><span style="color: #ff1493;"><br />â—ä½“ã‚’å¼•ãç· ã‚ãŸã„ï¼â—è‹¥è¿”ã‚ŠãŸã„ï¼â—ãƒ„ãƒ¤ãƒ„ãƒ¤ãƒ”ã‚«ãƒ”ã‚«ã®ãŠè‚Œã‚’æ‰‹ã«å…¥ã‚ŒãŸã„ï¼<br />â—ç–²ã‚Œã«ãã„ä½“ã‚’æ‰‹ã«å…¥ã‚ŒãŸã„ï¼â—è¾›ã„ãƒ€ã‚¤ã‚¨ãƒƒãƒˆã¯ã‚‚ã†ã‚¤ãƒ¤ã <br />â—æ–°ã—ã„ãƒ¬ã‚·ãƒ”ã‚’å­¦ã³ãŸã„ï¼â—New Yorkç™ºä¿¡ã®ã‹ã‚‰ã ãƒ‡ãƒˆãƒƒã‚¯ã‚¹ã‚’çŸ¥ã‚ŠãŸã„ï¼<br />â—ç¾Žå‘³ã—ãé£Ÿã¹ã¦æº€è¶³ã—ãªãŒã‚‰ãƒ˜ãƒ«ã‚·ãƒ¼ã§ã‚»ã‚¯ã‚·ãƒ¼ãªä½“ã‚’ç›®æŒ‡ã—ãŸã„ï¼</span></strong><br /><br />ã¨ã„ã†æ–¹ã€ãœã²ãœã²ã”å‚åŠ ãã ã•ã„ã­ï¼ï¼<br /><br /><strong>{ã‚¹ã‚±ã‚¸ãƒ¥ãƒ¼ãƒ«}<br />â—æ—¥æ™‚ï¼š11/9(åœŸ)ã€11æ™‚ï½ž(ç´„2æ™‚é–“)&nbsp;<br />â—KDã‚¨ãƒ‡ãƒ¥ã‚±ãƒ¼ã‚¿ãƒ¼: å®¤è°·æ™ºå­<span style="font-size: small;">ï¼ˆ&larr;ç§å¥½ã¿ã®é¢ç™½ãã¦ç¾ŽäººãªãŠæ–¹â™¡ï¼‰&nbsp;</span><br />â—å ´æ‰€: å¤§é˜ªå¸‚åŒ—åŒºè¥¿å¤©æº€1-8-9&nbsp;<br />â—å‚åŠ è²» ï¿¥5000ã€€&nbsp;<br />â—ãŠç”³ã—è¾¼ã¿: info@karadadetox.com&nbsp;<br />(ã”å‚åŠ é ‚ãæ–¹ã®ãŠåå‰ã€é€£çµ¡å…ˆé›»è©±ç•ªå·ã‚’ãŠçŸ¥ã‚‰ã›ä¸‹ã•ã„)ã€€<br /></strong></span><br /><br /><a id="i12733748130" class="detailOn" href="http://ameblo.jp/karadadetox/image-11667522422-12733748130.html"><img src="http://stat.ameba.jp/user_images/20131031/10/karadadetox/61/29/j/o0355050012733748130.jpg" alt="$NYã§åƒããƒ€ã‚¤ã‚¨ãƒƒãƒˆãƒ˜ãƒ«ã‚¹ã‚³ãƒ¼ãƒMARI" border="0" /></a><br /><br /><br />ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼ï¼<br /><strong><span style="font-size: medium;"><span style="color: #0000ff;"><br />ã€Žãƒ€ã‚¤ã‚¨ãƒƒãƒˆã‚³ãƒ¼ãƒã€ãƒãƒªã‚¦ãƒƒãƒ‰ã‚¹ã‚¿ãƒ¼ã¨å¾…ã¡åˆã‚ã›(!?)â™¡ã€</span></span></strong><span style="font-size: medium;"><br /><br /><br />ã¿ãªã•ã‚“ã€ã“ã‚“ã«ã¡ã¯ãƒ¼ãƒ¼ãƒ¼ãƒ¼ãƒ¼ï¼ï¼<br />ã‚¢ãƒ¡ãƒªã‚«ã¯Daylight Savingã§æ™‚é–“ã‚’1æ™‚é–“é…ãã—ã¾ã—ãŸã€‚<br />ã¨ã„ã†ã‚ã‘ã§ã€æ—¥æœ¬ã¨ã®æ™‚å·®ã¯13æ™‚é–“ã‹ã‚‰14æ™‚é–“ã§ã™ã€‚æ±—<br />ã‚®ãƒ£ã‚¡ã€‚<br /><br /><br /><br />ã•ãƒ¼ã¦ã•ã¦ã•ã¦ã€Daylight Savingã¯ã•ã¦ãŠã<br />ä»Šæ—¥ã¯NYã®ãƒ€ã‚¤ã‚¨ãƒƒãƒˆãƒ˜ãƒ«ã‚¹ã‚³ãƒ¼ãƒã®ã‚ªãƒ•ãƒˆãƒ¼ã‚¯ï¼<br />ã¿ãªã•ã‚“ã«ã€ã‚¢ã‚¿ã‚·ã®NYãƒ©ã‚¤ãƒ•ã‚’ã“ã£ãã‚Šæ•™ãˆã¡ã‚ƒã†ã‚â™¡<br /><br /><br /><br />æ•°æ—¥å‰ãªã‚“ã ã‘ã©ã€ã¨ã‚ã‚‹ãƒãƒªã‚¦ãƒƒãƒ‰ã‚¹ã‚¿ãƒ¼ã¨å¾…ã¡åˆã‚ã›ã—ãŸã®ã‚ˆã­ã€‚<br />NYCã«ä½ã‚“ã§ã‚‹ã¨å¾…ã¡åˆã‚ã›ã™ã‚‹äººé”ã‚‚è‰²ã€…ã‚ˆã­ã‡â™¡ ï¼ˆãªã‚“ã¤ã£ã¦ï¼ï¼‰<br /><br /><br />å¾…ã¡åˆã‚ã›ã¯ã‚ãŸã—ã®ã‚¢ãƒ‘ãƒ¼ãƒˆã®ç›´ãä¸‹ã®ãƒ¬ã‚¹ãƒˆãƒ©ãƒ³ã€‚</span></p>', '', 1, '2013-11-04 06:45:54', '2013-11-04 09:28:03'),
(53, 'ãŸã„ã¨ã‚‹', 'http://demo.samuli.me/_media/smartstart-html/blog/standart_post_1.jpg', '<p><span style="font-size: medium;">ã¾ãŸã€ã‚¯ãƒƒã‚­ãƒ³ã‚°ã‚¯ãƒ©ã‚¹ã§ã¯<br />New Yorkã‚¹ã‚¿ã‚¤ãƒ«ã®KDãƒ—ãƒ­ã‚°ãƒ©ãƒ ã®ã‚³ãƒ³ã‚»ãƒ—ãƒˆã«ã¤ã„ã¦ã‚‚å­¦ã‚“ã§é ‚ã‘ã¾ã™ï¼<br /><strong><span style="color: #ff1493;"><br />â—ä½“ã‚’å¼•ãç· ã‚ãŸã„ï¼â—è‹¥è¿”ã‚ŠãŸã„ï¼â—ãƒ„ãƒ¤ãƒ„ãƒ¤ãƒ”ã‚«ãƒ”ã‚«ã®ãŠè‚Œã‚’æ‰‹ã«å…¥ã‚ŒãŸã„ï¼<br />â—ç–²ã‚Œã«ãã„ä½“ã‚’æ‰‹ã«å…¥ã‚ŒãŸã„ï¼â—è¾›ã„ãƒ€ã‚¤ã‚¨ãƒƒãƒˆã¯ã‚‚ã†ã‚¤ãƒ¤ã <br />â—æ–°ã—ã„ãƒ¬ã‚·ãƒ”ã‚’å­¦ã³ãŸã„ï¼â—New Yorkç™ºä¿¡ã®ã‹ã‚‰ã ãƒ‡ãƒˆãƒƒã‚¯ã‚¹ã‚’çŸ¥ã‚ŠãŸã„ï¼<br />â—ç¾Žå‘³ã—ãé£Ÿã¹ã¦æº€è¶³ã—ãªãŒã‚‰ãƒ˜ãƒ«ã‚·ãƒ¼ã§ã‚»ã‚¯ã‚·ãƒ¼ãªä½“ã‚’ç›®æŒ‡ã—ãŸã„ï¼</span></strong><br /><br />ã¨ã„ã†æ–¹ã€ãœã²ãœã²ã”å‚åŠ ãã ã•ã„ã­ï¼ï¼<br /><br /><strong>{ã‚¹ã‚±ã‚¸ãƒ¥ãƒ¼ãƒ«}<br />â—æ—¥æ™‚ï¼š11/9(åœŸ)ã€11æ™‚ï½ž(ç´„2æ™‚é–“)&nbsp;<br />â—KDã‚¨ãƒ‡ãƒ¥ã‚±ãƒ¼ã‚¿ãƒ¼: å®¤è°·æ™ºå­<span style="font-size: small;">ï¼ˆ&larr;ç§å¥½ã¿ã®é¢ç™½ãã¦ç¾ŽäººãªãŠæ–¹â™¡ï¼‰&nbsp;</span><br />â—å ´æ‰€: å¤§é˜ªå¸‚åŒ—åŒºè¥¿å¤©æº€1-8-9&nbsp;<br />â—å‚åŠ è²» ï¿¥5000ã€€&nbsp;<br />â—ãŠç”³ã—è¾¼ã¿: info@karadadetox.com&nbsp;<br />(ã”å‚åŠ é ‚ãæ–¹ã®ãŠåå‰ã€é€£çµ¡å…ˆé›»è©±ç•ªå·ã‚’ãŠçŸ¥ã‚‰ã›ä¸‹ã•ã„)ã€€<br /></strong></span><br /><br /><a id="i12733748130" class="detailOn" href="http://ameblo.jp/karadadetox/image-11664187683-12733748130.html"><img src="http://stat.ameba.jp/user_images/20131031/10/karadadetox/61/29/j/o0355050012733748130.jpg" alt="$NYã§åƒããƒ€ã‚¤ã‚¨ãƒƒãƒˆãƒ˜ãƒ«ã‚¹ã‚³ãƒ¼ãƒMARI" border="0" /></a></p>', '', 9, '2013-11-07 18:53:07', '2013-11-07 18:53:07');

-- --------------------------------------------------------

--
-- Table structure for table `posts_tags`
--

CREATE TABLE `posts_tags` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `post_id` int(10) NOT NULL,
  `tag_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=57 ;

--
-- Dumping data for table `posts_tags`
--

INSERT INTO `posts_tags` (`id`, `post_id`, `tag_id`) VALUES
(46, 42, 55),
(47, 47, 56),
(48, 48, 55),
(49, 49, 57),
(50, 49, 58),
(51, 50, 57),
(54, 52, 56),
(55, 52, 61),
(56, 53, 62);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=63 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`, `created`, `modified`) VALUES
(54, 'asfd', '2013-11-04 04:31:06', '2013-11-04 04:31:06'),
(55, 'asdf', '2013-11-04 04:31:29', '2013-11-04 04:31:29'),
(56, 'asd', '2013-11-04 04:38:28', '2013-11-04 04:38:28'),
(57, 'aaa', '2013-11-04 05:11:03', '2013-11-04 05:11:03'),
(58, 'sdf', '2013-11-04 05:11:03', '2013-11-04 05:11:03'),
(59, 'aa', '2013-11-04 06:45:54', '2013-11-04 06:45:54'),
(60, 'asdfsadf', '2013-11-04 06:47:45', '2013-11-04 06:47:45'),
(61, 'ddd', '2013-11-04 09:28:03', '2013-11-04 09:28:03'),
(62, 'Cadsad', '2013-11-07 18:53:07', '2013-11-07 18:53:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `is_admin` int(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_admin`, `created`, `modified`) VALUES
(1, 'takutoa', 'takuto.lehr@gmail.com', '1b9286b8c6c6a6a0794683f37f4701ae5bbdc2747e77597c6d8ee0e89f760f84', 1, '2013-09-15 11:44:22', '2013-11-04 02:26:03'),
(2, 'lehr', 'l3ots@yahoo.co.jp', '1b9286b8c6c6a6a0794683f37f4701ae5bbdc2747e77597c6d8ee0e89f760f84', 0, '2013-11-05 08:52:11', '2013-11-05 08:52:11');

-- --------------------------------------------------------

--
-- Table structure for table `user_pages`
--

CREATE TABLE `user_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` varchar(64) NOT NULL,
  `summary` varchar(400) NOT NULL,
  `body` text NOT NULL,
  `calendar_iframe` varchar(1000) NOT NULL,
  `is_public` int(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `user_pages`
--

INSERT INTO `user_pages` (`id`, `user_id`, `hash`, `summary`, `body`, `calendar_iframe`, `is_public`, `created`, `modified`) VALUES
(1, 1, '3f011f8c9d9465ceacbbfb5881012696a68806e1', 'HELLO WORLDã€Œã¿ã‚“ãªã§ä½œã‚‹ã‚°ãƒ«ãƒ¡ã‚µã‚¤ãƒˆã€ã¨ã„ã†æ€§è³ªä¸Šã€åº—èˆ—æƒ…å ±ã®æ­£ç¢ºæ€§ã¯ä¿è¨¼ã•ã‚Œã¾ã›ã‚“ã®ã§ã€å¿…ãšäº‹å‰ã«ã”ç¢ºèªã®ä¸Šã”åˆ©ç”¨ãã ã•ã„ã€‚', '<p><span style="color: #ff1493;"><strong><span style="font-size: x-large;">ã€ŽKDã‚¯ãƒƒã‚­ãƒ³ã‚°ã‚¯ãƒ©ã‚¹ in å¤§é˜ªï¼ã€</span></strong></span><br /><span style="font-size: medium;"><br />NYç™ºï¼ä½“ã®ä¸­ã‹ã‚‰ã‚­ãƒ¬ã‚¤ã«ï¼ klasdjf kjaslf jlsak jflksaj fdlksaj&nbsp;<br />Healthy! Sexy! Happyãªä½“ã‚’æ‰‹ã«å…¥ã‚Œã‚‹ãŠæ‰‹ä¼ã„ã‚’ã™ã‚‹ã‹ã‚‰ã ãƒ‡ãƒˆãƒƒã‚¯ã‚¹ãŒã€<br />ç¾Žå‘³ã—ãã¦æº€è¶³ãŒã§ãã‚‹ã‚¹ãƒ†ã‚­ãªKDãƒ¬ã‚·ãƒ”ã®åŸºç¤Žã‚’ã”ç´¹ä»‹ã—ã¾ã™ï¼<br />ãƒ¡ãƒ‹ãƒ¥ãƒ¼ã¯å…¨éƒ¨ã§4å“ï¼<br /><br /><span style="color: #009966;">â—GJ ( Green Juice: çµžã‚Šç«‹ã¦é‡Žèœã‚¸ãƒ¥ãƒ¼ã‚¹) ã€€<br />â—é‡Žèœæµ·è‹”å·»ãã€€â—ã‚­ãƒŽã‚¢ã¨çŽ„ç±³ã®æ —ã”ã¯ã‚“&nbsp;<br />â—å­£ç¯€ã®ãƒ‡ã‚¶ãƒ¼ãƒˆæŸ¿ã®ãƒ—ãƒªãƒ³</span><br /><br />ã¾ãŸã€ã‚¯ãƒƒã‚­ãƒ³ã‚°ã‚¯ãƒ©ã‚¹ã§ã¯<br />New Yorkã‚¹ã‚¿ã‚¤ãƒ«ã®KDãƒ—ãƒ­ã‚°ãƒ©ãƒ ã®ã‚³ãƒ³ã‚»ãƒ—ãƒˆã«ã¤ã„ã¦ã‚‚å­¦ã‚“ã§é ‚ã‘ã¾ã™ï¼<br /><strong><span style="color: #ff1493;"><br />â—ä½“ã‚’å¼•ãç· ã‚ãŸã„ï¼â—è‹¥è¿”ã‚ŠãŸã„ï¼â—ãƒ„ãƒ¤ãƒ„ãƒ¤ãƒ”ã‚«ãƒ”ã‚«ã®ãŠè‚Œã‚’æ‰‹ã«å…¥ã‚ŒãŸã„ï¼<br />â—ç–²ã‚Œã«ãã„ä½“ã‚’æ‰‹ã«å…¥ã‚ŒãŸã„ï¼â—è¾›ã„ãƒ€ã‚¤ã‚¨ãƒƒãƒˆã¯ã‚‚ã†ã‚¤ãƒ¤ã <br />â—æ–°ã—ã„ãƒ¬ã‚·ãƒ”ã‚’å­¦ã³ãŸã„ï¼â—New Yorkç™ºä¿¡ã®ã‹ã‚‰ã ãƒ‡ãƒˆãƒƒã‚¯ã‚¹ã‚’çŸ¥ã‚ŠãŸã„ï¼<br />â—ç¾Žå‘³ã—ãé£Ÿã¹ã¦æº€è¶³ã—ãªãŒã‚‰ãƒ˜ãƒ«ã‚·ãƒ¼ã§ã‚»ã‚¯ã‚·ãƒ¼ãªä½“ã‚’ç›®æŒ‡ã—ãŸã„ï¼</span></strong></span></p>', '<iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;src=h9th3cest8s79aurhprrrcfjio%40group.calendar.google.com&ctz=America/New_York" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>', 1, '2013-09-17 10:43:25', '2013-09-17 10:43:25'),
(2, 0, 'd94f54f5d1f67035efba96c055e0a5528fe7f306', '', '', '', 0, '2013-10-22 09:53:31', '2013-10-22 09:53:31'),
(3, 0, '19a404666e20989727a724c3cfb5527ba9882076', '', '', '', 0, '2013-10-22 09:54:08', '2013-10-22 09:54:08'),
(4, 0, '0035d2673726803e05011880e51f8ec790576916', '', '', '', 0, '2013-10-22 09:54:11', '2013-10-22 09:54:11'),
(5, 0, '0076868d1c3f01d8452b0342ba97e1e300222d23', '', '', '', 0, '2013-10-22 10:43:59', '2013-10-22 10:43:59'),
(6, 0, '0b2f66fee31434de686c8a5f197a79a161b414e4', '', '', '', 0, '2013-10-22 10:43:59', '2013-10-22 10:43:59'),
(7, 0, '9fb4254f5a0b9aa4866fd8c62450dac67fc468fd', 'I COOK METH', '<p><span style="background-color: #ff6600;">DASD sdaf as fas fas &nbsp;sdafasf &nbsp;DDDDDDDDDDDDDD asdas da</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="background-color: #ff6600;">sdfxcxzv sadfsad fasd f</span></p>', '', 0, '2013-10-22 10:43:59', '2013-10-22 10:43:59'),
(8, 0, 'e9f628d60e2a3b4feedc27d75d6ef7350c88b0cf', '', '', '', 0, '2013-10-22 10:43:59', '2013-10-22 10:43:59'),
(9, 0, 'c64c69b1a5f89e43d79d4ce8d354269ea0388f02', '', '', '', 0, '2013-10-22 10:43:59', '2013-10-22 10:43:59'),
(10, 0, '88c7a996ccd4d67d03a656c811c38638ee59ea37', '', '', '', 0, '2013-10-22 10:45:10', '2013-10-22 10:45:10'),
(11, 0, '2cff42217f1ac7e6ff03c41fbe9bd093081e8ea5', '', '', '', 0, '2013-10-22 10:45:10', '2013-10-22 10:45:10'),
(12, 0, '65c7155249b2f93129b35aee1d7b8d6abdc5e252', 'I COOK METH', '<p><span style="background-color: #ff6600;">DASD sdaf as fas fas &nbsp;sdafasf &nbsp;DDDDDDDDDDDDDD asdas da</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="background-color: #ff6600;">sdfxcxzv sadfsad fasd f</span></p>', '', 0, '2013-10-22 10:45:10', '2013-10-22 10:45:10'),
(13, 0, '07b5d5f7cb8addaca47405aa29e7bd649cd5dd06', '', '', '', 0, '2013-10-22 10:45:10', '2013-10-22 10:45:10'),
(14, 0, '7b0aa5995227c7cd6bed6582a3ba31e2fbd1c911', '', '', '', 0, '2013-10-22 10:45:10', '2013-10-22 10:45:10'),
(15, 0, '13bb3395a711b5f4dfc3caca8bdb20c5f562fab0', '', '', '', 0, '2013-10-22 10:45:34', '2013-10-22 10:45:34'),
(16, 0, 'bb5066aa418c24449737f297285a8bfdb6c7ae4d', '', '', '', 0, '2013-10-22 10:45:34', '2013-10-22 10:45:34'),
(17, 0, 'f7d4bbfa0c10b234150ce74015212043188039c7', 'I COOK METH', '<p><span style="background-color: #ff6600;">DASD sdaf as fas fas &nbsp;sdafasf &nbsp;DDDDDDDDDDDDDD asdas da</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="background-color: #ff6600;">sdfxcxzv sadfsad fasd f</span></p>', '', 0, '2013-10-22 10:45:34', '2013-10-22 10:45:34'),
(18, 0, 'db052cd0f77da288d557fcfdcc6dd6b10c0218fe', '', '', '', 0, '2013-10-22 10:45:34', '2013-10-22 10:45:34'),
(19, 0, '9c7b4c1a61cab3e3d1f2f51c11900a55cb1061a3', '', '', '', 0, '2013-10-22 10:45:34', '2013-10-22 10:45:34'),
(20, 0, 'd661f5a5cd1ecd623275d5912a643f16bd55c64e', '', '', '', 0, '2013-10-22 10:46:00', '2013-10-22 10:46:00'),
(21, 0, 'f853b68d038feff7168c9fe1e148d7385caf5361', '', '', '', 0, '2013-10-22 10:46:00', '2013-10-22 10:46:00'),
(22, 0, '173e63af06e881491907ae8d89f7dd9fa5e22e18', 'I COOK METH', '<p><span style="background-color: #ff6600;">DASD sdaf as fas fas &nbsp;sdafasf &nbsp;DDDDDDDDDDDDDD asdas da</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="background-color: #ff6600;">sdfxcxzv sadfsad fasd f</span></p>', '', 0, '2013-10-22 10:46:00', '2013-10-22 10:46:00'),
(23, 0, '4b64e15942a9e3f156bc53595005be3423e9536a', '', '', '', 0, '2013-10-22 10:46:00', '2013-10-22 10:46:00'),
(24, 0, '9d598fdff0ec432e9f99f4c53b9557cee9c4bffa', '', '', '', 0, '2013-10-22 10:46:00', '2013-10-22 10:46:00'),
(25, 0, 'f6b126c1c4a4df528f2b2e3bb861f216d5b9371e', '', '', '', 0, '2013-10-22 10:48:41', '2013-10-22 10:48:41'),
(26, 0, '816e4c666e106573dfd835a7020dd75e25a3f364', '', '', '', 0, '2013-10-22 10:48:41', '2013-10-22 10:48:41'),
(27, 0, '9927ddd33a2a3984c973735a3f4255e42d60e9eb', 'I COOK METH', '<p><span style="background-color: #ff6600;">DASD sdaf as fas fas &nbsp;sdafasf &nbsp;DDDDDDDDDDDDDD asdas da</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="background-color: #ff6600;">sdfxcxzv sadfsad fasd f</span></p>', '', 0, '2013-10-22 10:48:41', '2013-10-22 10:48:41'),
(28, 0, '11a50e015eab1474e857f48e84ff88e414f59e4d', '', '', '', 0, '2013-10-22 10:48:41', '2013-10-22 10:48:41'),
(29, 0, 'a1b7cea4d3106087ada29ff71a860a1cd3913330', 'I COOK METH', '<p>asdfsd</p>', '', 0, '2013-10-22 11:00:04', '2013-10-22 11:00:04'),
(30, 0, '75f44fd3c150f4632db9514691dbe7999730c89d', '', '', '', 0, '2013-10-22 11:00:04', '2013-10-22 11:00:04'),
(33, 0, '1b08cee5f101476b4b631af87e8893bfa7b8aeef', 'I COOK METH', '<p><span style="background-color: #ff6600;">DASD sdaf as fas fas &nbsp;sdafasf &nbsp;DDDDDDDDDDDDDD asdas da</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="background-color: #ff6600;">sdfxcxzv sadfsad fasd f</span></p>', '', 0, '2013-10-22 11:22:12', '2013-10-22 11:22:12'),
(39, 0, 'eca3e0ccee6da329be47e2d525b81ce2aa235fab', 'I COOK METH', '<p><span style="background-color: #ff6600;">DASD sdaf as fas fas &nbsp;sdafasf &nbsp;DDDDDDDDDDDDDD asdas da</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="background-color: #ff6600;">sdfxcxzv sadfsad fasd f</span></p>', '', 0, '2013-10-22 11:28:01', '2013-10-22 11:28:01'),
(41, 0, '719d37df13512d626c873cc6a7b93aab23f4bc29', '', '', '', 0, '2013-10-22 11:34:04', '2013-10-22 11:34:04'),
(42, 0, '8d6dd95e995a77ea315eca3f6d8566d6c9c2f3b9', '', '', '', 0, '2013-10-22 11:34:04', '2013-10-22 11:34:04'),
(43, 0, '8ce55b3eefc95dbed2f9bb628b03b98d8e12952d', 'I COOK METH', '<p><span style="background-color: #ff6600;">DASD sdaf as fas fas &nbsp;sdafasf &nbsp;DDDDDDDDDDDDDD asdas da</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="background-color: #ff6600;">sdfxcxzv sadfsad fasd f</span></p>', '', 0, '2013-10-22 11:34:04', '2013-10-22 11:34:04'),
(44, 0, 'd51703d4a12c8d7b782c9fe6b028ee5088ffb928', '', '', '', 0, '2013-10-22 11:34:04', '2013-10-22 11:34:04'),
(45, 0, '675c07d48aefe2639ec36379914041dd3845dbcc', '', '', '', 0, '2013-10-22 11:34:13', '2013-10-22 11:34:13'),
(46, 0, '4386006335130b8bb096ca36875fe179273a4184', '', '', '', 0, '2013-10-22 11:34:13', '2013-10-22 11:34:13'),
(47, 0, '93bf74c1fb5163552c56dced534bba9d00083bcb', 'I COOK METH', '<p><span style="background-color: #ff6600;">DASD sdaf as fas fas &nbsp;sdafasf &nbsp;DDDDDDDDDDDDDD asdas da</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="background-color: #ff6600;">sdfxcxzv sadfsad fasd f</span></p>', '', 0, '2013-10-22 11:34:13', '2013-10-22 11:34:13'),
(48, 0, '4672c6d6be84de210070b2e793d875fca527af78', '', '', '', 0, '2013-10-22 11:34:13', '2013-10-22 11:34:13'),
(49, 0, '35f13bcaf314d55ec66264c0bcdcb1ab1d388e5b', '', '', '', 0, '2013-10-22 11:34:17', '2013-10-22 11:34:17'),
(50, 0, '633cfbe055bc7fdacaca73ab467b862ba22c7758', '', '', '', 0, '2013-10-22 11:34:17', '2013-10-22 11:34:17'),
(51, 0, '337f40366b0c4d0a2ec1d19afa430cbe121ec955', 'I COOK METH', '<p><span style="background-color: #ff6600;">DASD sdaf as fas fas &nbsp;sdafasf &nbsp;DDDDDDDDDDDDDD asdas da</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="background-color: #ff6600;">sdfxcxzv sadfsad fasd f</span></p>', '', 0, '2013-10-22 11:34:17', '2013-10-22 11:34:17'),
(52, 0, 'bff401213059e1df98e0975aff6bc97a5e216547', '', '', '', 0, '2013-10-22 11:34:17', '2013-10-22 11:34:17'),
(53, 0, 'f49348a70fd603a8526cd123e30af7af60765450', '', '', '', 0, '2013-10-22 11:34:45', '2013-10-22 11:34:45'),
(54, 0, '5d00a2a18dc93344ca297c9aa0bd95943f8e8b51', '', '', '', 0, '2013-10-22 11:34:45', '2013-10-22 11:34:45'),
(55, 0, '7b896724caa99dfdc75f2cc8c89dd891864d4b6f', 'I COOK METH', '<p><span style="background-color: #ff6600;">DASD sdaf as fas fas &nbsp;sdafasf &nbsp;DDDDDDDDDDDDDD asdas da</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="background-color: #ff6600;">sdfxcxzv sadfsad fasd f</span></p>', '', 0, '2013-10-22 11:34:45', '2013-10-22 11:34:45'),
(56, 0, '5ab57d639a2d181474e783670d84e4223bdc767b', '', '', '', 0, '2013-10-22 11:34:45', '2013-10-22 11:34:45'),
(57, 0, '5e8ef07d27bff5d869420f79257eb5d16dc3734a', '', '', '', 0, '2013-10-22 11:35:25', '2013-10-22 11:35:25'),
(58, 0, 'f0c58e1ff54a7e19242620e2366d6f67ee797df7', '', '', '', 0, '2013-10-22 11:35:25', '2013-10-22 11:35:25'),
(59, 0, 'f84451fc7891f08ef42683f680cea1554611c3a4', 'I COOK METH', '<p><span style="background-color: #ff6600;">DASD sdaf as fas fas &nbsp;sdafasf &nbsp;DDDDDDDDDDDDDD asdas da</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="background-color: #ff6600;">sdfxcxzv sadfsad fasd f</span></p>', '', 0, '2013-10-22 11:35:25', '2013-10-22 11:35:25'),
(60, 0, 'e3fb5908faf30478c5745745b4876a63dbc9a432', '', '', '', 0, '2013-10-22 11:35:25', '2013-10-22 11:35:25'),
(61, 0, '8a23dde6fa680d6d0b2604c4233e6b77623f506d', '', '', '', 0, '2013-10-22 11:35:32', '2013-10-22 11:35:32'),
(62, 0, 'd318534434590d7974433d1549cfc0981758354f', '', '', '', 0, '2013-10-22 11:35:32', '2013-10-22 11:35:32'),
(63, 0, 'ce992b79a636c1e370aa13a1b69dd8215fc18896', 'I COOK METH', '<p><span style="background-color: #ff6600;">DASD sdaf as fas fas &nbsp;sdafasf &nbsp;DDDDDDDDDDDDDD asdas da</span></p>\r\n<p>&nbsp;</p>\r\n<p><span style="background-color: #ff6600;">sdfxcxzv sadfsad fasd f</span></p>', '', 0, '2013-10-22 11:35:32', '2013-10-22 11:35:32'),
(64, 0, '4dad13c400718fc4e49cea19651629a6e01257a0', '', '', '', 0, '2013-10-22 11:35:32', '2013-10-22 11:35:32'),
(65, 2, '47ed76ae24ba37e63eb6db41a37d4f0cf9d0e008', '', '<p>asdfasf</p>', '', 0, '2013-11-05 08:57:04', '2013-11-05 08:57:04');

-- --------------------------------------------------------

--
-- Table structure for table `user_page_addresses`
--

CREATE TABLE `user_page_addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_page_id` int(11) NOT NULL,
  `zip` varchar(30) NOT NULL,
  `prefecture` varchar(20) NOT NULL,
  `street` varchar(200) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longtitude` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `user_page_addresses`
--

INSERT INTO `user_page_addresses` (`id`, `user_page_id`, `zip`, `prefecture`, `street`, `latitude`, `longtitude`, `created`, `modified`) VALUES
(11, 1, '123-56789', 'å¤§é˜ªåºœ', 'æ±äº¬éƒ½æ¸¯åŒºèµ¤å‚1-11-6 èµ¤å‚ãƒ†ãƒ©ã‚¹ãƒã‚¦ã‚¹ ', '35.6609354', '139.7287598', '2013-11-05 08:32:17', '2013-11-16 19:17:48');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
