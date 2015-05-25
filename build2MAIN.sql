-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: May 19, 2015 at 10:28 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `fitie2015t18dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `couriers`
--

CREATE TABLE `couriers` (
`id` int(11) NOT NULL,
  `courier_name` varchar(100) NOT NULL,
  `courier_charge` double(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `couriers`
--

INSERT INTO `couriers` (`id`, `courier_name`, `courier_charge`) VALUES
(1, 'courier1 ', 12.22),
(2, 'free couriers', 12.99);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
`id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `postcode` varchar(8) NOT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `notes` text,
  `customer_type` varchar(20) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `email`, `first_name`, `last_name`, `address`, `postcode`, `phone`, `notes`, `customer_type`, `user_id`) VALUES
(1, 'clothesrus@mail.com', 'Clothes R US', 'NA', '102 street st streetville', '3111', '98878787', 'met at ciarns trade show ', 'customer', 2),
(2, 'phill@phillsPlace.com', 'phills mats', 'Phill', '104 Given up lane', '3243', '9887887', '', 'customer', 5),
(3, 'edster2007@gmail.com', 'Eddie', 'Power', '105 some place', '3199', '0404556778', '', 'sole trader', 1),
(4, 'eddie.power@icloud.com', 'Mathews', 'Matt''s', '108 Mathews street', '3200', '97787676', '', 'customer', 1),
(5, 'jo@joe.com', 'jo', 'blow', 'jos house', '3199', '9999', '9999', 'shop', 2);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
`id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `quantity_on_hand` int(11) NOT NULL,
  `item_number` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `quantity_on_hand`, `item_number`) VALUES
(1, 'door matt car shaped 1', 212, 222343),
(2, 'Back Door matt', 255, 233454);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
`id` int(11) NOT NULL,
  `shipped_date` date NOT NULL,
  `required_date` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `courier_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `shipped_date`, `required_date`, `status`, `courier_id`, `customer_id`) VALUES
(1, '2015-05-19', '2015-05-19', 'processing', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
`id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity_ordered` int(11) NOT NULL,
  `per_unit` double(10,2) NOT NULL,
  `discount` double(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `item_id`, `order_id`, `quantity_ordered`, `per_unit`, `discount`) VALUES
(1, 1, 1, 10, 15.00, 23.00),
(2, 2, 1, 255, 2.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
`id` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `purchase_status` varchar(80) NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `purchase_date`, `purchase_status`, `supplier_id`) VALUES
(1, '2015-05-19', 'ordered', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
`id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity_purchased` int(11) NOT NULL,
  `price_of_item` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_details`
--

INSERT INTO `purchase_details` (`id`, `purchase_id`, `item_id`, `quantity_purchased`, `price_of_item`) VALUES
(1, 1, 1, 250, 10);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
`id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_description` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `supplier_description`) VALUES
(1, 'Matt Maker Matt', 'Guy named matt who makes mat''s great fit for his name.'),
(2, 'Matt Factory', 'A super factory for producing matts.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
`id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `role` varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created`, `modified`, `role`) VALUES
(1, 'ed', 'edster2007@gmail.com', '$2y$10$GP4s6apwYGEeuKyh8D40SeN8KXVAZNXoWIY6p9EGj9z668Q1z7PXC', '2015-04-03 05:45:16', '2015-05-19 12:27:02', 'admin'),
(2, 'test', 'user@iTest.com', '$2y$10$9rpAiou/xu70Ag37P/TCOuVOgDSlj97nIhxCpUS5l.Bw/qZ7cPiJi', '2015-04-03 17:31:54', '2015-05-19 12:27:14', 'user'),
(3, 'linc', 'lliu147@student.monash.edu', '$2y$10$EdWfOnju7g1Hk5FRCkQsjeFBefvh7sSmp/t.O1XHaKfJLaFPkY47a', '2015-04-23 00:00:00', '2015-05-19 12:27:56', 'admin'),
(4, 'jus', 'ss4.justin@gmail.com', '$2y$10$SOC0M376y8xtWVtqKkLaOOEgav4qGO0ut2jz4x4Xx5FqgzRDMVjMm', '2015-04-25 00:00:00', '2015-05-19 12:28:03', 'admin'),
(5, 'just2', 'bowser@mailinator.com', '$2y$10$9rpAiou/xu70Ag37P/TCOuVOgDSlj97nIhxCpUS5l.Bw/qZ7cPiJi', '2015-05-01 00:00:00', '2015-05-19 12:28:15', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `couriers`
--
ALTER TABLE `couriers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`id`), ADD KEY `customers_fk` (`user_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`), ADD KEY `orders_fk1` (`customer_id`), ADD KEY `orders_fk2` (`courier_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
 ADD PRIMARY KEY (`id`), ADD KEY `purchase_fk1` (`supplier_id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `couriers`
--
ALTER TABLE `couriers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
ADD CONSTRAINT `customers_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `order_fk2` FOREIGN KEY (`courier_id`) REFERENCES `couriers` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `order_fk1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
ADD CONSTRAINT `purchase_fk1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
