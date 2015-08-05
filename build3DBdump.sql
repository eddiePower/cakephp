-- phpMyAdmin SQL Dump
-- version 4.3.12
-- http://www.phpmyadmin.net
--
-- Host: 130.194.7.82
-- Generation Time: Aug 05, 2015 at 02:41 AM
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
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `body` text,
  `category_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `body`, `category_id`, `created`, `modified`) VALUES
(1, 'New Motor Bike front door mats', 'Hi again here we are adding our newest Motorbike Door mats back by popular demand we have pictures to be posted soon.', NULL, '2015-06-01 08:26:32', '2015-06-01 08:26:32'),
(5, 'TEAM 18 NEWS - Ways to create labels for rick', 'Ways to generate labels for rick from css are shown here i havent read it all yet but it may hold some info\r\nhttp://www.codeproject.com/Articles/90577/Building-a-Label-Printing-Software-using-HTML-CSS hope we can get this site up to scratch for MYOB sync dev stages.\r\nalso found http://www.labelgrid.net/', NULL, '2015-06-08 07:27:17', '2015-06-08 07:29:07'),
(7, 'August Sale!', 'Dont forget our sale coming up in the month of August 2015, there will be a 0.5% discount on orders over $10,000! great savings for all ;)', NULL, '2015-08-02 15:59:37', '2015-08-02 15:59:37');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rght` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `lft`, `rght`, `name`, `description`, `created`, `modified`) VALUES
(1, NULL, 5, 6, 'Stock', 'Any new or updates to our great stock range here at solemate doormats, any changes in availability price or other important details will be posted under this catagory.', '2015-06-01 08:06:26', '2015-06-01 08:06:26'),
(2, 1, 1, 2, 'House Matts', 'All our stock aimed at the domestic dwellings or house type matts, these will be divided again into sub catagories.', '2015-06-01 08:07:26', '2015-06-01 08:07:26'),
(3, 1, 3, 4, 'Safety Matts', 'Used in safety equipment and floor coverings, different categories will begin here.', '2015-06-01 08:36:46', '2015-06-01 08:36:46'),
(4, 2, 7, 8, 'front door', 'Our front door matts', '2015-06-07 03:38:34', '2015-06-07 03:38:34'),
(5, NULL, 9, 10, 'MotorBike - Harley mat', 'Great back door mat from our Harley motorcycle range, looks great at home or work for any bikie to wipe his feet on in style', '2015-06-09 13:51:34', '2015-06-09 13:51:34');

-- --------------------------------------------------------

--
-- Table structure for table `couriers`
--

CREATE TABLE IF NOT EXISTS `couriers` (
  `id` int(11) NOT NULL,
  `courier_name` varchar(100) NOT NULL,
  `courier_charge` double(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `couriers`
--

INSERT INTO `couriers` (`id`, `courier_name`, `courier_charge`) VALUES
(1, 'Vally Fast couriers', 12.22),
(2, 'free couriers', 12.99),
(3, 'Startrek couriers', 25.50),
(4, 'International shipping', 105.50),
(5, 'The Flash', 1002.20),
(6, 'drunk couriers Inc', 244.20);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `email`, `first_name`, `last_name`, `address`, `postcode`, `phone`, `notes`, `customer_type`, `user_id`) VALUES
(1, 'lliu147@student.monash.edu', 'Clothes R US', 'NA', '102 street st streetville', '3111', '98878787', 'met at ciarns trade show ', 'customer', 2),
(2, 'phill@phillsPlace.com', 'phills mats', 'Phill', '104 Given up lane', '3243', '9887887', '', 'customer', 4),
(3, 'edster2007@gmail.com', 'Eddie', 'Power', '105 some place', '3199', '0404556778', 'met at university 2015 meet and greet.', 'sole trader', 3),
(4, 'eddie.power@icloud.com', 'Mathews', 'Matt''s', '108 Mathews street', '3200', '97787676', 'brother of matt''s mats the supplier, so i give him good discount of  +150% ;)', 'Sales Rep', 6),
(5, 'sgami1@student.monash.edu', 'Shash', 'DaMan', '123 youWishYouLivedHere street Caulfield', '3232', '0456689999', 'Very Rich met at the "we pwn you" seminar 2015.', 'Chemist', 7),
(6, 'joBlows@email.com', 'Jo''s outdoor', 'retailer', '123 high street Melbourne', '3000', '95556565', 'met 2008 cairns trade fair.', 'wholesaler', 2);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `quantity_on_hand` int(11) NOT NULL,
  `item_number` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `photo_dir` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `quantity_on_hand`, `item_number`, `photo`, `photo_dir`) VALUES
(1, 'door matt car shaped 1', 212, 222343, NULL, NULL),
(2, 'Back Door matt', 255, 233454, NULL, NULL),
(3, 'Safety Matt -- 8x8', 150, 100212, NULL, NULL),
(4, 'Safety Matt 16x16', 512, 233211, NULL, NULL),
(5, 'Harley Davidson Doormat 3', 1050, 7885332, NULL, NULL),
(6, 'MotorBirke Matt 4', 567, 3332121, NULL, NULL),
(7, 'Front Door "Welcome Home" Matt', 1043, 2245321, NULL, NULL),
(8, 'Kids Live here Matt', 54321, 7654222, NULL, NULL),
(9, 'Beware Dog Bites Matt', 53221, 865543, NULL, NULL),
(10, 'Kids Bite Doormat ', 5214, 675443, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL,
  `shipped_date` date NOT NULL,
  `required_date` date NOT NULL,
  `status` varchar(100) NOT NULL,
  `courier_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `shipped_date`, `required_date`, `status`, `courier_id`, `customer_id`) VALUES
(2, '2015-05-12', '2015-05-19', 'shipped.', 1, 3),
(4, '2015-05-26', '2015-07-26', 'Order', 5, 3),
(5, '2014-06-08', '2014-06-09', 'Shipped', 4, 3),
(6, '2015-04-09', '2015-04-15', 'Ordered -- Awaiting picking.', 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity_ordered` int(11) NOT NULL,
  `per_unit` double(10,2) NOT NULL,
  `discount` double(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `item_id`, `order_id`, `quantity_ordered`, `per_unit`, `discount`) VALUES
(1, 1, 1, 10, 15.00, 23.00),
(2, 2, 1, 255, 2.00, 0.00),
(3, 2, 1, 12, 12.50, 0.00),
(4, 2, 2, 5, 20.50, 5.00),
(5, 1, 2, 5, 15.50, 0.00),
(6, 1, 2, 100, 10.00, 15.00),
(7, 3, 3, 23, 12.22, 12.00),
(8, 2, 3, 233, 15.45, 2.00),
(9, 8, 4, 332, 9.90, 2.00),
(10, 7, 4, 512, 17.80, 4.00),
(11, 8, 5, 12, 12.24, 12.00),
(12, 6, 6, 66, 12.45, 12.00),
(13, 4, 6, 1332, 9.56, 1.00),
(14, 6, 6, 12, 21.21, 2.00);

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

CREATE TABLE IF NOT EXISTS `phinxlog` (
  `version` bigint(20) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `start_time`, `end_time`) VALUES
(20150601075210, '2015-05-31 22:00:50', '2015-05-31 22:00:50');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `purchase_status` varchar(80) NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `purchase_date`, `purchase_status`, `supplier_id`) VALUES
(1, '2015-05-19', 'ordered', 1),
(2, '2015-06-26', 'ordered', 2),
(3, '2015-05-26', 'Ordered', 4),
(4, '2015-05-31', 'awaiting shipping', 4),
(5, '2015-06-09', 'Ordered', 3);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE IF NOT EXISTS `purchase_details` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity_purchased` int(11) NOT NULL,
  `price_of_item` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_details`
--

INSERT INTO `purchase_details` (`id`, `purchase_id`, `item_id`, `quantity_purchased`, `price_of_item`) VALUES
(1, 1, 1, 250, 10),
(2, 1, 3, 10, 10),
(3, 2, 9, 500, 10),
(4, 3, 8, 1000, 6),
(5, 2, 5, 120, 19),
(6, 2, 9, 1100, 11),
(7, 3, 8, 2041, 10);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_description` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supplier_name`, `supplier_description`) VALUES
(1, 'Matt Maker Matt', 'Guy named matt who makes mat''s great fit for his name.'),
(2, 'Matt Factory', 'A super factory for producing matts.'),
(3, 'Nylex Australia', 'A factory production supplier in melbourne keeping the shipping costs down, met at QLD trade show and was put in touch with Joe Blow in melbourne branch.'),
(4, 'Doors are US', 'Local Supplier of Doors and Doormats'),
(5, 'Peumal Pukmakumar', 'Young Indian family producing completely producing matts with biodegradable fully sustainable practices ');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `role` varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created`, `modified`, `role`) VALUES
(1, 'ed', 'edster2007@gmail.com', '$2y$10$GP4s6apwYGEeuKyh8D40SeN8KXVAZNXoWIY6p9EGj9z668Q1z7PXC', '2015-04-03 05:45:16', '2015-06-06 06:46:52', 'admin'),
(2, 'tester1', 'user@iTest.com', '$2y$10$9rpAiou/xu70Ag37P/TCOuVOgDSlj97nIhxCpUS5l.Bw/qZ7cPiJi', '2015-04-03 17:31:54', '2015-06-06 07:25:13', 'user'),
(3, 'linc', 'lliu147@student.monash.edu', '$2y$10$EdWfOnju7g1Hk5FRCkQsjeFBefvh7sSmp/t.O1XHaKfJLaFPkY47a', '2015-04-23 00:00:00', '2015-05-19 12:27:56', 'admin'),
(4, 'jus', 'ss4.justin@gmail.com', '$2y$10$SOC0M376y8xtWVtqKkLaOOEgav4qGO0ut2jz4x4Xx5FqgzRDMVjMm', '2015-04-25 00:00:00', '2015-05-19 12:28:03', 'admin'),
(6, 'ep', 'eddie.power@icloud.com', '$2y$10$ktw61mCHoa8La8e9vBpAwe74zKEuSrvrdr/qA9T3qhAdPnCOG1fhK', '2015-06-08 06:30:11', '2015-06-08 06:30:11', 'admin'),
(7, 'test2', 'test2@tester2.email.com', '$2y$10$3XfSU/uXgc3UfJ49oKCR9ODZO7tF/zprXnntlhOgom1sEG8lZNaXS', '2015-06-09 03:56:45', '2015-06-09 03:57:02', 'user'),
(10, 'lliu', 'hhh@gmail.com', '$2y$10$.JpVuT/dOuqD8P0Dcg6GIub1Db1UCdSToBu6G93pLDPmoEcb1i1hu', '2015-07-31 01:01:19', '2015-07-31 01:01:19', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `couriers`
--
ALTER TABLE `couriers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
ADD CONSTRAINT `customers_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `order_fk1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `order_fk2` FOREIGN KEY (`courier_id`) REFERENCES `couriers` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
ADD CONSTRAINT `purchase_fk1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
