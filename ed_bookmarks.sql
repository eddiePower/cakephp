-- phpMyAdmin SQL Dump
-- version 4.3.12
-- http://www.phpmyadmin.net
--
-- Host: 130.194.7.82
-- Generation Time: Apr 15, 2015 at 03:35 PM
-- Server version: 5.5.20
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fitie2015t18dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE IF NOT EXISTS `bookmarks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `description` text,
  `url` text,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `user_id`, `title`, `description`, `url`, `created`, `updated`) VALUES
(1, 1, 'Google web search', 'The Google web search located on Australian servers. Slightly faster then the normal one.', 'http://google.com.au', '2015-04-03 05:59:57', NULL),
(2, 3, 'Online Video time waster', 'Google''s very own Youtube which has taken many hours if not a year now of my life in short clips, it can be a good friend in research and a great enemy in time wasting!', 'http://youtube.com/', '2015-04-03 17:38:47', NULL),
(3, 2, 'Great way to make funny videos', 'Another great way to waste time on the modern internet, this is a video tool that takes still pictures of your family or friends faces and imposes them onto video characters doing some funny dances.', 'http://jibjab.com/', '2015-04-03 17:40:05', NULL),
(4, 1, 'home server', 'our home server websites hosted on a Linux Ubuntu virtual machine which lives on a old Apple Mac Pro that sits in my room gathering dust', 'http://powerfamilyau.mine.nu:7788/~edster2007/index.php', '2015-04-03 17:43:29', NULL),
(5, 1, 'test bookmark', 'testing the bookmarks and bookmark tags relationship is still ok.', 'http://test.com/', '2015-04-05 07:04:48', NULL),
(6, 1, 'test bookmarks2', 'testing the bookmarking tags, string?', 'http://test.com/1', '2015-04-05 08:25:29', NULL),
(7, 2, 'no name saves', 'testing the bookmark save', 'http://notreal.com', '2015-04-10 06:34:30', NULL),
(8, 5, 'Jesse pinkman', 'Walter started to cook crystal meth with Jesse.', 'www.google.com', '2015-04-10 06:38:11', NULL),
(9, 1, 'This webApp', 'This is a development demo of CakePHP framework, used to test the Authentication module in cake to allow logins for security and also with the combination of a simple user role and this Auth module we have also enabled two types of user account. The admin has access to all areas of the site, whereas users only have access to their bookmarks.  This is testing for our soon to be developed web application for the IE unit at Monash uni 2015.', 'http://ie.infotech.monash.edu.au/team18/build0/development/bookmarks/', '2015-04-13 15:27:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks_tags`
--

CREATE TABLE IF NOT EXISTS `bookmarks_tags` (
  `bookmark_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookmarks_tags`
--

INSERT INTO `bookmarks_tags` (`bookmark_id`, `tag_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(2, 3),
(3, 3),
(3, 4),
(3, 6),
(4, 1),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(5, 1),
(5, 2),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `created`, `updated`) VALUES
(1, 'Seach tool', '2015-04-03 06:00:32', NULL),
(2, 'search', '2015-04-03 08:27:21', NULL),
(3, 'procrastination', '2015-04-03 17:38:56', NULL),
(4, 'funny', '2015-04-03 17:40:10', NULL),
(5, 'Monash', '2015-04-03 17:40:20', NULL),
(6, 'File sharing', '2015-04-03 17:40:31', NULL),
(7, 'News', '2015-04-03 17:40:42', NULL),
(8, 'CakePHP', '2015-04-13 15:33:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `role` varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created`, `updated`, `role`) VALUES
(1, 'edster2007@gmail.com', '$2y$10$GP4s6apwYGEeuKyh8D40SeN8KXVAZNXoWIY6p9EGj9z668Q1z7PXC', '2015-04-03 05:45:16', NULL, 'admin'),
(2, 'mike.power@icloud.com', '$2y$10$9rpAiou/xu70Ag37P/TCOuVOgDSlj97nIhxCpUS5l.Bw/qZ7cPiJi', '2015-04-03 17:31:54', NULL, 'user'),
(3, 'rusty@home.com', '$2y$10$detHHseAr1MWWgJGy6iW6uJo1HfbPjRNylxE3gRVIrjfvruDYX6NG', '2015-04-03 17:36:55', NULL, 'user'),
(5, 'lliu147@student.monash.edu', '$2y$10$us.D.NN5iqimhap6BTcIR.as6Tx95rfsLQQEGMDyNhRJS7h3yuLwu', '2015-04-10 06:34:50', NULL, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
  ADD PRIMARY KEY (`id`), ADD KEY `user_key` (`user_id`);

--
-- Indexes for table `bookmarks_tags`
--
ALTER TABLE `bookmarks_tags`
  ADD PRIMARY KEY (`bookmark_id`,`tag_id`), ADD KEY `tag_idx` (`tag_id`,`bookmark_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookmarks`
--
ALTER TABLE `bookmarks`
ADD CONSTRAINT `bookmarks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `bookmarks_tags`
--
ALTER TABLE `bookmarks_tags`
ADD CONSTRAINT `bookmarks_tags_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`),
ADD CONSTRAINT `bookmarks_tags_ibfk_2` FOREIGN KEY (`bookmark_id`) REFERENCES `bookmarks` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
