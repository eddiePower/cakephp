-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Apr 20, 2015 at 08:35 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2


--  IE 2015 - Team Heisenburg
--  Build 1: Client Email System
--  Client: Solemate Doormats

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `fitie2015t18dev`
--

--
-- Drop any tables for clean rebuild of database
--


-- -------------------------------------------------------

drop TABLE if EXISTS customers;
drop TABLE if EXISTS users;

-- -------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cardnum` int(5) NOT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `cardnum`, `phone`, `balance`, `type`, `user_id`) VALUES
(1, 'Clothes R US', 102, '', 2300.00, 'customer', 2),
(2, 'phills mats', 104, '9887887', 109.09, 'customer', NULL),
(3, 'eddie power', 105, '0404556778', 10000.00, 'customer', 1),
(4, 'Mathews Matt''s', 108, '97787676', 2032.20, 'customer', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
`id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `role` varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created`, `modified`, `role`) VALUES
(1, 'edster2007@gmail.com', '$2y$10$GP4s6apwYGEeuKyh8D40SeN8KXVAZNXoWIY6p9EGj9z668Q1z7PXC', '2015-04-03 05:45:16', NULL, 'admin'),
(2, 'user@iTest.com', '$2y$10$9rpAiou/xu70Ag37P/TCOuVOgDSlj97nIhxCpUS5l.Bw/qZ7cPiJi', '2015-04-03 17:31:54', NULL, 'user'),
(3, 'lliu147@student.monash.edu', '$2y$10$EdWfOnju7g1Hk5FRCkQsjeFBefvh7sSmp/t.O1XHaKfJLaFPkY47a', '2015-04-23', NULL, 'admin'),
(4, 'ss4.justin@gmail.com', '$2y$10$SOC0M376y8xtWVtqKkLaOOEgav4qGO0ut2jz4x4Xx5FqgzRDMVjMm', '2015-04-25', NULL, 'admin'),
(5, 'bowser@mailinator.com', '$2y$10$9rpAiou/xu70Ag37P/TCOuVOgDSlj97nIhxCpUS5l.Bw/qZ7cPiJi', '2015-05-01', NULL, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`id`), ADD KEY `customers_fk` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
ADD CONSTRAINT `customers_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
