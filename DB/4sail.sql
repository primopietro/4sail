-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2017 at 08:22 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4sail`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_title`) VALUES
(1, '?lectronique'),
(2, 'V?tements pour homme'),
(3, 'V?tements pour femme'),
(4, 'Articles de sport'),
(5, 'Meubles'),
(6, 'Automobile'),
(7, 'Autres');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(100) NOT NULL,
  `item_cat` int(100) NOT NULL,
  `item_title` varchar(255) NOT NULL,
  `item_price` int(100) NOT NULL,
  `item_desc` text NOT NULL,
  `item_keywords` text NOT NULL,
  `user_id` int(25) NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_cat`, `item_title`, `item_price`, `item_desc`, `item_keywords`, `user_id`, `points`) VALUES
(1, 1, 'Samsung Dous 2', 5000, 'Samsung Dous 2 sgh ', 'samsung mobile electronics', 1, 0),
(2, 1, 'iPhone 5s', 25000, 'iphone 5s', 'mobile iphone apple', 1, 0),
(3, 1, 'iPad', 30000, 'ipad apple brand', 'apple ipad tablet', 1, 0),
(4, 1, 'iPhone 6s', 32000, 'Apple iPhone ', 'iphone apple mobile', 1, 0),
(5, 1, 'iPad 2', 10000, 'samsung ipad', 'ipad tablet samsung', 1, 0),
(6, 1, 'Hp Laptop r series', 35000, 'Hp Red and Black combination Laptop', 'hp laptop ', 1, 0),
(7, 1, 'Laptop Pavillion', 50000, 'Laptop Hp Pavillion', 'Laptop Hp Pavillion', 1, 0),
(8, 1, 'Sony', 40000, 'Sony Mobile', 'sony mobile', 1, 0),
(9, 1, 'iPhone New', 12000, 'iphone', 'iphone apple mobile', 1, 0),
(10, 2, 'Red Ladies dress', 1000, 'red dress for girls', 'red dress ', 1, 0),
(11, 2, 'Blue Heave dress', 1200, 'Blue dress', 'blue dress cloths', 1, 0),
(12, 2, 'Ladies Casual Cloths', 1500, 'ladies casual summer two colors pleted', 'girl dress cloths casual', 1, 0),
(13, 2, 'SpringAutumnDress', 1200, 'girls dress', 'girl dress', 1, 0),
(14, 2, 'Casual Dress', 1400, 'girl dress', 'ladies cloths girl', 1, 0),
(15, 2, 'Formal Look', 1500, 'girl dress', 'ladies wears dress girl', 2, 0),
(16, 3, 'Sweter for men', 600, '2012-Winter-Sweater-for-Men-for-better-outlook', 'black sweter cloth winter', 2, 0),
(17, 3, 'Gents formal', 1000, 'gents formal look', 'gents wear cloths', 2, 0),
(19, 3, 'Formal Coat', 3000, 'ad', 'coat blazer gents', 2, 0),
(20, 3, 'Mens Sweeter', 1600, 'jg', 'sweeter gents ', 2, 0),
(21, 3, 'T shirt', 800, 'ssds', 'formal t shirt black', 2, 0),
(22, 4, 'Yellow T shirt ', 1300, 'yello t shirt with pant', 'kids yellow t shirt', 2, 0),
(23, 4, 'Girls cloths', 1900, 'sadsf', 'formal kids wear dress', 2, 0),
(24, 4, 'Blue T shirt', 700, 'g', 'kids dress', 2, 0),
(25, 4, 'Yellow girls dress', 750, 'as', 'yellow kids dress', 2, 0),
(26, 4, 'Skyblue dress', 650, 'nbk', 'skyblue kids dress', 2, 0),
(27, 4, 'Formal look', 690, 'sd', 'formal kids dress', 2, 0),
(32, 5, 'Book Shelf', 2500, 'book shelf', 'book shelf furniture', 2, 0),
(33, 6, 'Refrigerator', 35000, 'Refrigerator', 'refrigerator samsung', 1, 0),
(34, 6, 'Emergency Light', 1000, 'Emergency Light', 'emergency light', 2, 0),
(35, 6, 'Vaccum Cleaner', 6000, 'Vaccum Cleaner', 'Vaccum Cleaner', 2, 0),
(36, 6, 'Iron', 1500, 'gj', 'iron', 2, 0),
(37, 6, 'LED TV', 20000, 'LED TV', 'led tv lg', 2, 0),
(38, 6, 'Microwave Oven', 3500, 'Microwave Oven', 'Microwave Oven', 2, 0),
(39, 6, 'Mixer Grinder', 2500, 'Mixer Grinder', 'Mixer Grinder', 2, 0),
(40, 2, 'Formal girls dress', 3000, 'Formal girls dress', 'ladies', 2, 0),
(45, 1, 'Samsung Galaxy Note 3', 10000, '0', 'samsung galaxy Note 3 neo', 2, 0),
(46, 1, 'Samsung Galaxy Note 3', 10000, '', 'samsung galxaxy note 3 neo', 2, 0),
(47, 1, 'wef', 10, 'eqwf', 'wef', 1, 55),
(48, 1, 'wef', 10, 'eqwf', 'wef', 1, 55);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `fk_user_from` int(11) NOT NULL,
  `fk_user_to` int(11) NOT NULL,
  `object` varchar(25) NOT NULL,
  `messaged` varchar(500) NOT NULL,
  `date_sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_viewed` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `fk_user_from`, `fk_user_to`, `object`, `messaged`, `date_sent`, `date_viewed`) VALUES
(1, 1, 1, 'yolo', 'test', '2017-11-29 20:20:29', NULL),
(2, 1, 2, 'This is a message', 'testerinotesterinotesterinotesterinotesterinotesterinotesterinotesterinotesterinotesterinotesterinotesterinotesterino.', '2017-11-29 20:20:29', NULL),
(3, 1, 2, 'yolo', 'swag', '2017-11-29 20:20:29', NULL),
(4, 1, 1, 'xD', 'a', '2017-11-29 20:20:56', NULL),
(5, 1, 1, 'test2', 'a', '2017-11-29 20:21:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `referral`
--

CREATE TABLE `referral` (
  `id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `ref_user_id` int(25) NOT NULL,
  `sell_user_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `trans_id` int(11) NOT NULL,
  `buy_user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `sell_user_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(300) NOT NULL,
  `points` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `phone`, `address`, `points`) VALUES
(1, 'Test', 'User', 'test@test.com', '25f9e794323b453885f5181f1b624d0b', '8389080183', '123 Test Street', 0),
(2, 'bob', 'zoretic', 'bob.zoret@gmail.com', '123456', '8195829971', '1838 rue dunant', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `i_id` (`item_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_cat` (`item_cat`),
  ADD KEY `user_id_2` (`user_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `message_fk_user_from` (`fk_user_from`),
  ADD KEY `message_fk_user_to` (`fk_user_to`);

--
-- Indexes for table `referral`
--
ALTER TABLE `referral`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `ref_user_id` (`ref_user_id`),
  ADD KEY `sell_user_id` (`sell_user_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `buy_user_id` (`buy_user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `sell_user_id` (`sell_user_id`),
  ADD KEY `p_status` (`status_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `referral`
--
ALTER TABLE `referral`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`item_cat`) REFERENCES `category` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`fk_user_from`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`fk_user_to`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `referral`
--
ALTER TABLE `referral`
  ADD CONSTRAINT `referral_ibfk_1` FOREIGN KEY (`ref_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `referral_ibfk_2` FOREIGN KEY (`sell_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `referral_ibfk_3` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`buy_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`sell_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_ibfk_4` FOREIGN KEY (`product_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
