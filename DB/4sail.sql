-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2017 at 12:20 AM
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
CREATE DATABASE IF NOT EXISTS `4sail` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `4sail`;

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
(1, 'Electronics'),
(2, 'Men\'s clothes'),
(3, 'Women\'s clothes'),
(4, 'Sport '),
(5, 'Fourniture'),
(6, 'Vehicles'),
(7, 'All');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `image_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`image_id`, `item_id`, `name`) VALUES
(6, 56, '11537626.jpg'),
(7, 57, '10749364.jpg'),
(8, 58, 'hmprod.jpg'),
(9, 59, 'hmgoepprod.jpg'),
(10, 60, 'hmgoepprod2.jpg'),
(11, 61, 'hmgoepprod3.jpg'),
(13, 63, 'avcx.jpg'),
(14, 64, '1963-vw-beetle-for-sale-americanlisted_30184071.jpg'),
(17, 64, '0.9.8_carry.png'),
(18, 64, '0.9.7_discord.png'),
(19, 64, '0.9.7_discord.png'),
(20, 64, '0.9.7_discord.png'),
(21, 64, '0.9.8_carry.png'),
(22, 64, '0.9.8_djenge.png'),
(23, 64, '0.9.8_djenge.png'),
(24, 64, '0.9.8_djenge.png'),
(25, 64, '0.9.7_discord.png'),
(26, 64, 'img_fjords.jpg'),
(27, 64, 'img_fjords.jpg'),
(28, 64, 'img_fjords.jpg'),
(29, 64, 'img_fjords.jpg'),
(30, 64, 'img_fjords.jpg'),
(31, 64, 'img_fjords.jpg'),
(32, 83, 'img_fjords.jpg'),
(33, 83, 'img_fjords.jpg'),
(34, 83, 'img_fjords.jpg'),
(35, 83, 'img_fjords.jpg'),
(36, 84, 'img_fjords.jpg'),
(37, 85, 'download.jpg');

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
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `points` int(11) NOT NULL DEFAULT '0',
  `link` varchar(100) DEFAULT NULL,
  `sold` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_cat`, `item_title`, `item_price`, `item_desc`, `item_keywords`, `user_id`, `date_created`, `points`, `link`, `sold`) VALUES
(56, 1, 'Lenovo 15.6&quot; Laptop', 350, 'Black (Intel Pentium 4405U/500GB HDD/4GB RAM/Windows 10) - English', 'Intel Pentium 4405U 500GB HDD', 1, '2017-12-16 19:12:29', 20, 'https://www.paypal.me/montambeaultalex', 1),
(57, 1, 'Apple MacBook Air 13.3', 1200, '(Intel Core i5 1.8 GHz/ 128GB SSD/ 8GB RAM) - English', 'sdf', 1, '2017-12-16 19:12:29', 0, NULL, 0),
(58, 2, 'Cashmere scarf ', 69, 'PREMIUM QUALITY. Ribbed scarf knitted in soft cashmere. Size 30x180 cm.', 'no need', 1, '2017-12-16 19:12:29', 1, 'https://www.aa', 0),
(59, 1, '2-pack Patterned Socks ', 40, 'ERDEM x H&amp;M. Jacquard-knit socks in a soft wool blend. One floral pair and one checked pair.', 'Viscose 45%; Polyamide 34%; Wool 19%; Elastane 2%', 1, '2017-12-16 19:12:29', 0, NULL, 0),
(60, 3, 'Beaded Clutch Bag 2', 35, 'Clutch bag in thick faux leather with a beaded strap at front. Flap with magnetic fastener, metal chain shoulder strap, and one inner compartment with zip. Lined. Size 1 1/2 x 5 1/2 x 8 1/4 in.', 'bag', 1, '2017-12-16 19:12:29', 32, 'https://www.https://www.https://www.https://www.https://www.https://www.https://www.https://www.test', 1),
(61, 3, 'Jersey leggings ', 13, 'Leggings in jersey with an elasticated waist.', 'Machine wash cold', 1, '2017-12-16 19:12:29', 0, NULL, 0),
(63, 4, '2017/18 Chelsea FC Stadium Home', 110, 'The 2017/18 Chelsea FC Stadium Home ', 'Mens Football Shirt', 1, '2017-12-16 19:12:29', 0, NULL, 1),
(64, 6, '1963 Vw Beetle', 3200, 'For sale is my 1963 vw beetle. It has a 1400cc engine, the engine is recently rebuilt with new jugs. The car is very reliable and runs great it has a 4 speed transmission', 'sick car duder', 1, '2017-12-16 19:12:29', 15, NULL, 1),
(83, 1, '2', 2, '4', '2', 1, '2017-12-16 15:56:07', 2, 'https://www.https://www.paypal.me/alexmontambeault', 0),
(84, 1, '8', 8, '8', '8', 1, '2017-12-16 15:58:57', 8, 'https://www.paypal.me/alexmontambeault', 0),
(85, 1, 'test', 90, 'test', 'test', 1, '2017-12-16 16:07:34', 0, 'https://www.paypal.me/alexmontambeault', 0);

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
  `date_viewed` timestamp NULL DEFAULT NULL,
  `isResponse` tinyint(1) NOT NULL DEFAULT '0',
  `response_id` int(11) DEFAULT NULL,
  `fk_item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `fk_user_from`, `fk_user_to`, `object`, `messaged`, `date_sent`, `date_viewed`, `isResponse`, `response_id`, `fk_item_id`) VALUES
(44, 1, 1, '!!! PAYMENT ALERT !!!', 'Did you receive my Paypal payment for Lenovo 15.6&quot; Laptop ? If so, please mark item as sold.', '2017-12-14 15:04:37', '2017-12-16 23:40:47', 0, NULL, 56),
(45, 1, 1, '!!! PAYMENT ALERT !!!', 'Did you receive my Paypal payment for Lenovo 15.6&quot; Laptop ? If so, please mark item as sold.', '2017-12-14 15:05:51', '2017-12-16 23:38:54', 1, 44, 56),
(46, 1, 1, '!!! PAYMENT ALERT !!!', 'Did you receive my Paypal payment for Lenovo 15.6&quot; Laptop ? If so, please mark item as sold.', '2017-12-14 15:08:37', '2017-12-16 23:40:54', 0, 45, 56),
(47, 1, 1, '!!! POINTS AWARDED !!!', 'Your referral link for the item : Lenovo 15.6&quot; Laptop has led to a successful purchase. 2 points were added to your account.', '2017-12-14 15:09:11', '2017-12-16 23:41:03', 0, 45, 56),
(48, 1, 1, 'test', '0', '2017-12-16 23:16:26', '2017-12-16 23:16:53', 0, NULL, 60),
(49, 1, 1, 'works', 'works', '2017-12-16 16:22:56', '2017-12-16 23:23:12', 0, NULL, 60),
(50, 1, 1, '!!! PAYMENT ALERT !!!', 'Did you receive my Paypal payment for Beaded Clutch Bag 2 ? If so, please mark item as sold.', '2017-12-16 16:23:59', '2017-12-16 23:41:09', 0, 46, 60),
(51, 1, 1, '!!! POINTS AWARDED !!!', 'Your referral link for the item : Beaded Clutch Bag 2 has led to a successful purchase. 3 points were added to your account.', '2017-12-16 16:41:13', '2017-12-16 23:41:17', 0, 46, 60);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id_rating` int(11) NOT NULL,
  `id_rater` int(11) NOT NULL,
  `id_rated` int(11) NOT NULL,
  `rating` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id_rating`, `id_rater`, `id_rated`, `rating`) VALUES
(7, 2, 1, 5),
(8, 3, 1, 3),
(9, 9, 1, 2),
(11, 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `referral`
--

CREATE TABLE `referral` (
  `id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `ref_user_id` int(25) NOT NULL,
  `sell_user_id` int(10) DEFAULT NULL,
  `ref_link` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referral`
--

INSERT INTO `referral` (`id`, `item_id`, `ref_user_id`, `sell_user_id`, `ref_link`) VALUES
(42, 56, 1, 1, 'KfSc4kR7jokdvCV2TSy5aDfTHaL5RZ67'),
(43, 56, 1, 1, 'GlaT8OaeZ1K5jrrStjstupH9yHJxuRGO'),
(44, 56, 1, 1, '3ZKh8397aN2u80sIix3WRl0w0lchr1xw'),
(45, 56, 1, 1, 'gUvVgfYiUdSVUD53xG8YxtlDDPODYMg4'),
(46, 60, 1, 1, 'zCzH25nmIH7mpIQTHDqgijTfAHjuwEAk'),
(47, 83, 1, 1, 'j9j97h4PJB199WdnZlrgaNnNwTp5BCqR'),
(48, 58, 1, 1, 'Fy3o6qqIWJNaqtFidM0afYTlSxkmVlxV');

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
  `points` int(100) NOT NULL,
  `rating` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `phone`, `address`, `points`, `rating`) VALUES
(1, 'Test', 'User', '1', '1', '8389080183', '123 Test Street', 2698, 3.25),
(2, 'bob', 'zoretic', '2', '2', '8195829971', '1838 rue dunant', 2000, 0),
(3, 'al', 'm', 'test@test.com', 'password', '1234567899', '123 rue chose', 1000, 0),
(9, 'test', 'test', 'test@testerino.com', 'test', '123', '12', 1000, 0),
(12, 'admin', 'admin', 'admin', 'admin', '000', 'admin', 1000, 5);

-- --------------------------------------------------------

--
-- Table structure for table `watch_list`
--

CREATE TABLE `watch_list` (
  `id_watch_list` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `watch_list`
--

INSERT INTO `watch_list` (`id_watch_list`, `user_id`, `item_id`) VALUES
(17, 2, 60),
(19, 1, 58),
(20, 1, 61),
(21, 1, 57),
(22, 1, 59),
(28, 1, 60),
(29, 1, 84);

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
  ADD KEY `message_fk_user_to` (`fk_user_to`),
  ADD KEY `message_RID` (`response_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `r_id_rater` (`id_rater`),
  ADD KEY `r_id_rated` (`id_rated`);

--
-- Indexes for table `referral`
--
ALTER TABLE `referral`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `ref_user_id` (`ref_user_id`),
  ADD KEY `sell_user_id` (`sell_user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `watch_list`
--
ALTER TABLE `watch_list`
  ADD PRIMARY KEY (`id_watch_list`),
  ADD KEY `wl_user` (`user_id`),
  ADD KEY `wl_item` (`item_id`);

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
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `referral`
--
ALTER TABLE `referral`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `watch_list`
--
ALTER TABLE `watch_list`
  MODIFY `id_watch_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
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
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`fk_user_to`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_3` FOREIGN KEY (`response_id`) REFERENCES `referral` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`id_rater`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`id_rated`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `referral`
--
ALTER TABLE `referral`
  ADD CONSTRAINT `referral_ibfk_1` FOREIGN KEY (`ref_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `referral_ibfk_2` FOREIGN KEY (`sell_user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `referral_ibfk_3` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `watch_list`
--
ALTER TABLE `watch_list`
  ADD CONSTRAINT `watch_list_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `watch_list_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
