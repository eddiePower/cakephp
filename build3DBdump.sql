-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Sep 16, 2015 at 06:11 PM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


DROP TABLE  if exists `articles`,  `orders`, `order_details`, `purchases`, `purchase_details`,  `shopcart_items`, `suppliers`;
DROP TABLE if exists `couriers`, `customers`, `items`, `shopcart`, `users`;

--
-- Database: `fitie2015t18dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
`id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `post` text,
  `category_id` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `post`, `category_id`, `created`, `modified`) VALUES
(5, 'TEAM 18 NEWS - Ways to create labels for rick', '<p>Ways to generate labels for rick from css are shown here i havent read it all yet but it may hold some info http://www.codeproject.com/Articles/90577/Building-a-Label-Printing-Software-using-HTML-CSS hope we can get this site up to scratch for MYOB sync dev stages. also found http://www.labelgrid.net/</p>', NULL, '2015-06-08 07:27:17', '2015-08-24 13:12:46'),
(7, 'August Sale!', '<h1>Dont forget our sale coming up</h1>\r\n<p>the month of August 2015, there will be a 0.5% discount on orders over $10,000! great savings for all ;) &nbsp;<img src="/testBuild/js/tinymce/plugins/emoticons/img/smiley-cool.gif" alt="cool" /></p>\r\n<p>&nbsp;</p>\r\n<p><img src="/testBuild/img/graphics/23-7093.jpg" alt="doormat" width="180" height="108" /></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', NULL, '2015-08-02 15:59:37', '2015-08-25 02:35:58'),
(8, 'Added the data table plugin', '<p>I added a jQuery plugin as dora and pod said its a easy no config plug in for searching and sorting large tables of data i think it will come in handy for thisa assignement&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p><img src="/testBuild/js/tinymce/plugins/emoticons/img/smiley-tongue-out.gif" alt="tongue-out" /></p>\r\n<p style="text-align: center;"><iframe src="https://www.youtube.com/embed/AyDGI_maAeY" width="560" height="315" frameborder="0" allowfullscreen="allowfullscreen"></iframe></p>', NULL, '2015-09-06 14:57:23', '2015-09-07 10:58:04'),
(9, 'Ricks Quote about sustainability', '<p>Ricks Quote for the title bar.</p>\r\n<p><em><strong>"All our matts are produced with enviromentally friendly and sustainable processes, using all natural materials"</strong></em></p>', NULL, '2015-09-07 11:02:11', '2015-09-07 11:02:11');

-- --------------------------------------------------------

--
-- Table structure for table `couriers`
--

CREATE TABLE `couriers` (
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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `email`, `first_name`, `last_name`, `address`, `postcode`, `phone`, `notes`, `customer_type`, `user_id`) VALUES
(1, 'lliu147@student.monash.edu', 'Clothes R US', 'NA', '102 street st streetville', '3111', '98878787', 'met at ciarns trade show ', 'customer', 2),
(2, 'phill@phillsPlace.com', 'phills mats', 'Phill', '104 Given up lane', '3243', '9887887', '', 'customer', 4),
(3, 'edster2007@gmail.com', 'Eddie', 'Power', '105 some place', '3199', '0404556778', 'met at university 2015 meet and greet.', 'sole trader', 1),
(4, 'eddie.power@icloud.com', 'Mathews', 'Matt''s', '108 Mathews street', '3200', '97787676', 'brother of matt''s mats the supplier, so i give him good discount of  +150% ;)', 'Sales Rep', 6),
(5, 'sgami1@student.monash.edu', 'Shash', 'DaMan', '123 youWishYouLivedHere street Caulfield', '3232', '0456689999', 'Very Rich met at the "we pwn you" seminar 2015.', 'Chemist', 12),
(9, 'rugs@rugville.com', 'john', 'Rando', '243 chapel street melbourne', '3154', '87763232', 'some small shop in Chapel street parahn', 'sole trader', 13),
(10, 'repco@email.com', 'Bill', 'Johnes', '23 silly av Frankston', '3199', '97783232', 'Big car store only interested in safety mats for workshops.', 'autoParts', 13),
(11, 'autobarn@shop.com', 'Frankenstien', 'Blacksmith', '23 foot street new zealand', '2321', '98332332', 'lives on a mountain and sells auto parts, loves the safety floor mats for auto shops.', 'autoParts shop', 13);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
`id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `quantity_on_hand` int(11) NOT NULL,
  `base_price` decimal(10,2) NOT NULL COMMENT 'used to store the base customer price for each unit of stock.',
  `item_number` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `photo_dir` varchar(255) DEFAULT NULL,
  `barcode` varchar(14) NOT NULL DEFAULT ''
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `item_name`, `quantity_on_hand`, `base_price`, `item_number`, `photo`, `photo_dir`, `barcode`) VALUES
(1, 'door matt car shaped 1', 470, 12.50, 222343, '23-7093.jpg', NULL, '4294967295234'),
(2, 'Back Door matt', 255, 10.50, 233454, '23-7186.jpg', NULL, '9874329056733'),
(3, 'Safety Matt -- 8x8', 129, 15.90, 100212, '23-7007.jpg', NULL, '5654335623234'),
(4, 'Safety Matt 16x16', 489, 25.00, 233211, '23-1197 a.jpg', NULL, '2342343425232'),
(5, 'Harley Davidson Doormat 3', 927, 21.20, 7885332, '23-2110.jpg', NULL, '4765456433453'),
(7, 'Front Door "Welcome Home" Matt', 841, 18.90, 2245321, '23-6005.JPG', NULL, '1231236765777'),
(8, 'Kids Live here Matt', 53951, 19.70, 7654222, '23-7053A.jpg', NULL, '6799677865333'),
(9, 'Beware Dog Bites Matt', 53064, 12.50, 865543, '23-7051.jpg', NULL, '2134123453424'),
(10, 'Kids Bite Doormat ', 5071, 32.45, 675443, '23-7110.jpg', NULL, '6453624567865'),
(11, 'saftey matt 1', 2036, 80.90, 9887673, '23-7411.jpg', NULL, '1145234523452'),
(12, 'saftey matt 1', 2045, 75.90, 9887673, '23-X7379.jpg', NULL, '3452345234523'),
(13, 'test item', 2294, 12.50, 987789, 'mat4.jpg', NULL, '9873214674329');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
`id` int(11) NOT NULL,
  `ordered_date` date NOT NULL,
  `required_date` date NOT NULL,
  `customer_comments` varchar(100) NOT NULL DEFAULT '',
  `courier_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `ordered_date`, `required_date`, `customer_comments`, `courier_id`, `customer_id`) VALUES
(2, '2015-05-12', '2015-05-19', 'shipped.', 1, 3),
(4, '2015-05-26', '2015-07-26', 'Order', 5, 3),
(5, '2014-06-08', '2014-06-09', 'Shipped', 4, 3),
(6, '2015-04-09', '2015-04-15', 'Ordered -- Awaiting picking.', 6, 4),
(10, '2015-09-18', '2015-09-04', '', 1, 1),
(11, '2015-09-18', '2015-09-02', '', 3, 4),
(12, '2015-09-18', '2015-09-16', '', 4, 4),
(13, '2015-09-18', '2015-09-16', '', 4, 4),
(14, '2015-09-18', '2015-09-16', '', 4, 4),
(15, '2015-09-18', '2015-09-05', '', 3, 4),
(16, '2015-09-19', '2015-09-08', '', 2, 2),
(20, '2015-09-19', '2015-09-09', '', 1, 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `item_id`, `order_id`, `quantity_ordered`, `per_unit`, `discount`) VALUES
(2, 2, 1, 255, 2.00, 0.00),
(3, 2, 1, 12, 12.50, 0.00),
(7, 3, 3, 23, 12.22, 12.00),
(8, 2, 3, 233, 15.45, 2.00),
(46, 7, 2, 96, 25.45, 15.00),
(48, 10, 2, 143, 15.00, 12.00),
(49, 5, 4, 123, 32.00, 12.00),
(50, 7, 2, 77, 154.00, 0.00),
(51, 8, 6, 245, 23.00, 12.00),
(52, 3, 2, 21, 12.43, 0.00),
(53, 9, 4, 34, 23.00, 1.00),
(54, 8, 5, 123, 12.50, 1.00),
(55, 9, 10, 123, 12.20, 1.00),
(56, 7, 11, 23, 21.50, 0.00),
(57, 4, 10, 2, 2.00, 1.00),
(58, 1, 10, 3, 3.00, 3.00),
(59, 1, 10, 3, 3.00, 3.00),
(60, 1, 10, 3, 3.00, 3.00),
(61, 1, 10, 3, 3.00, 3.00),
(62, 1, 10, 3, 3.00, 3.00),
(63, 1, 12, 3, 3.00, 3.00),
(64, 1, 12, 3, 3.00, 3.00),
(65, 1, 12, 3, 3.00, 3.00),
(66, 1, 12, 3, 3.00, 3.00),
(67, 1, 12, 3, 3.00, 3.00),
(68, 8, 20, 1, 2.00, 1.00),
(69, 8, 20, 1, 2.00, 1.00),
(70, 13, 20, 3, 12.50, 1.00),
(71, 13, 20, 3, 12.50, 1.00),
(72, 13, 20, 3, 12.50, 1.00),
(73, 13, 20, 3, 12.50, 1.00);

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
`id` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `purchase_status` varchar(80) NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `purchase_date`, `purchase_status`, `supplier_id`) VALUES
(1, '2015-05-19', 'ordered', 1),
(2, '2015-06-26', 'ordered', 2),
(3, '2015-05-26', 'Ordered', 4),
(4, '2015-05-31', 'awaiting shipping', 4),
(5, '2015-06-09', 'Ordered', 3),
(6, '2015-09-06', 'ordering', 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

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
(7, 3, 8, 2041, 10),
(8, 6, 12, 24675, 8);

-- --------------------------------------------------------

--
-- Table structure for table `shopcart`
--

CREATE TABLE `shopcart` (
`id` int(11) NOT NULL,
  `user_id` int(8) NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopcart`
--

INSERT INTO `shopcart` (`id`, `user_id`, `created`) VALUES
(10, 3, '2015-08-31 08:03:18'),
(12, 1, '2015-09-08 22:58:31');

-- --------------------------------------------------------

--
-- Table structure for table `shopcart_items`
--

CREATE TABLE `shopcart_items` (
`id` int(8) NOT NULL,
  `shopcart_id` int(8) NOT NULL,
  `item_id` int(8) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopcart_items`
--

INSERT INTO `shopcart_items` (`id`, `shopcart_id`, `item_id`, `quantity`) VALUES
(10, 10, 8, 105),
(11, 10, 1, 23),
(12, 10, 4, 100),
(15, 12, 2, 25),
(16, 12, 4, 0),
(17, 12, 11, 5);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
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

CREATE TABLE `users` (
`id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL COMMENT 'The log in user name for each user/customer on the system',
  `email` varchar(255) NOT NULL COMMENT 'users email address for correspondence',
  `password` varchar(255) NOT NULL COMMENT 'user log in password',
  `reset` varchar(64) DEFAULT NULL COMMENT 'a reset string for checking user has asked for a new password.',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `role` varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `reset`, `created`, `modified`, `role`) VALUES
(1, 'ed', 'edster2007@gmail.com', '$2y$10$GP4s6apwYGEeuKyh8D40SeN8KXVAZNXoWIY6p9EGj9z668Q1z7PXC', 'c8e6529e5801b91ed8a43a1ea1fbba57aa56335c475e8d3c434c49f4a92eb25a', '2015-04-03 05:45:16', '2015-06-06 06:46:52', 'admin'),
(2, 'tester1', 'user@iTest.com', '$2y$10$tcTEwARwQ//3dJAL9q2hyuar7uRepke3Wpr92ZF78wQlgDc7amb66', NULL, '2015-04-03 17:31:54', '2015-09-16 18:53:07', 'user'),
(3, 'linc', 'lliu147@student.monash.edu', '$2y$10$EdWfOnju7g1Hk5FRCkQsjeFBefvh7sSmp/t.O1XHaKfJLaFPkY47a', NULL, '2015-04-23 00:00:00', '2015-05-19 12:27:56', 'admin'),
(4, 'jus', 'ss4.justin@gmail.com', '$2y$10$SOC0M376y8xtWVtqKkLaOOEgav4qGO0ut2jz4x4Xx5FqgzRDMVjMm', NULL, '2015-04-25 00:00:00', '2015-05-19 12:28:03', 'admin'),
(6, 'ep', 'eddie.power@icloud.com', '$2y$10$ktw61mCHoa8La8e9vBpAwe74zKEuSrvrdr/qA9T3qhAdPnCOG1fhK', NULL, '2015-06-08 06:30:11', '2015-06-08 06:30:11', 'admin'),
(10, 'lliu', 'hhh@gmail.com', '$2y$10$.JpVuT/dOuqD8P0Dcg6GIub1Db1UCdSToBu6G93pLDPmoEcb1i1hu', NULL, '2015-07-31 01:01:19', '2015-07-31 01:01:19', 'user'),
(11, 'shash7', 'shashwat.amin@yahoo.com', '$2y$10$nkmeAyGtKYVge1O62nJDkO/6v.I1UGWeK20CLb7vo6mY8nqY4kW0i', NULL, '2015-08-07 04:39:42', '2015-08-07 04:39:42', 'admin'),
(12, 'dicksmith', 'shash122tfu@gmail.com', '$2y$10$WT5U5poJZsXRAonxsYildu8BPaCYoIFwIg78G8iMGXRwiZ2RwgfUu', NULL, '2015-08-07 04:40:49', '2015-08-07 04:40:49', 'user'),
(13, 'testRep1', 'empow3@student.monash.edu', '$2y$10$dkTnLm0g0rkp2JY3Ti85MOSMVn0ax1gMT7CD/TTpInhGsVs2S4Tbm', NULL, '2015-09-16 13:52:42', '2015-09-16 14:13:15', 'salesRep'),
(14, 'edtest', 'ed@email.com', '$2y$10$S2s26yh4s9Zl4x2j3..L9.fJWGopaV/gGpC1.KUCuowbKbUaFT/3a', NULL, '2015-09-17 08:01:16', '2015-09-17 08:01:16', 'admin'),
(15, 'tester21', 'ed@power.com', '$2y$10$thI1Nw27ZXjV3Bj1orutGe/pms/7h/Wopule68LAI0GoBDpPLJMIO', NULL, '2015-09-17 15:49:43', '2015-09-17 15:54:21', 'salesRep'),
(16, 'Dora', 'dora@email.com', '$2y$10$ol4WIvJu8TKco4/nLKjI2eZAl2NxZj.suuLy0QSut/EQz61mJklom', NULL, '2015-09-19 15:52:29', '2015-09-19 15:52:29', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
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
-- Indexes for table `shopcart`
--
ALTER TABLE `shopcart`
 ADD PRIMARY KEY (`id`), ADD KEY `shopcart_fk` (`user_id`);

--
-- Indexes for table `shopcart_items`
--
ALTER TABLE `shopcart_items`
 ADD PRIMARY KEY (`id`), ADD KEY `shopcart_items_fk1` (`item_id`), ADD KEY `shopcart_items_fk2` (`shopcart_id`);

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
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `couriers`
--
ALTER TABLE `couriers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `shopcart`
--
ALTER TABLE `shopcart`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `shopcart_items`
--
ALTER TABLE `shopcart_items`
MODIFY `id` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
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

--
-- Constraints for table `shopcart`
--
ALTER TABLE `shopcart`
ADD CONSTRAINT `shopcart_users_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `shopcart_items`
--
ALTER TABLE `shopcart_items`
ADD CONSTRAINT `shopCart_items_fk` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `shopcart_items_fk1` FOREIGN KEY (`shopcart_id`) REFERENCES `shopcart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
