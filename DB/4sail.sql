-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2017 at 05:10 PM
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
(12, 62, '1411690270039.gif'),
(13, 63, 'avcx.jpg'),
(14, 64, '1963-vw-beetle-for-sale-americanlisted_30184071.jpg');

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
  `points` int(11) NOT NULL DEFAULT '0',
  `link` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_cat`, `item_title`, `item_price`, `item_desc`, `item_keywords`, `user_id`, `points`, `link`) VALUES
(56, 1, 'Lenovo 15.6&quot; Laptop', 350, 'Black (Intel Pentium 4405U/500GB HDD/4GB RAM/Windows 10) - English', 'Intel Pentium 4405U 500GB HDD', 1, 20, NULL),
(57, 1, 'Apple MacBook Air 13.3', 1200, '(Intel Core i5 1.8 GHz/ 128GB SSD/ 8GB RAM) - English', 'sdf', 1, 0, NULL),
(58, 2, 'Cashmere scarf ', 69, 'PREMIUM QUALITY. Ribbed scarf knitted in soft cashmere. Size 30x180 cm.', 'no need', 1, 2, NULL),
(59, 1, '2-pack Patterned Socks ', 40, 'ERDEM x H&amp;M. Jacquard-knit socks in a soft wool blend. One floral pair and one checked pair.', 'Viscose 45%; Polyamide 34%; Wool 19%; Elastane 2%', 1, 0, NULL),
(60, 3, 'Beaded Clutch Bag ', 35, 'Clutch bag in thick faux leather with a beaded strap at front. Flap with magnetic fastener, metal chain shoulder strap, and one inner compartment with zip. Lined. Size 1 1/2 x 5 1/2 x 8 1/4 in.', 'bag', 1, 2, NULL),
(61, 3, 'Jersey leggings ', 13, 'Leggings in jersey with an elasticated waist.', 'Machine wash cold', 1, 0, NULL),
(62, 7, 'PURE EVIL', 666, 'THE DEVIL', 'HELL A SICK', 1, 666, 'https://www.paypal.me/montambeaultalex/'),
(63, 4, '2017/18 Chelsea FC Stadium Home', 110, 'The 2017/18 Chelsea FC Stadium Home ', 'Mens Football Shirt', 1, 0, NULL),
(64, 6, '1963 Vw Beetle', 3200, 'For sale is my 1963 vw beetle. It has a 1400cc engine, the engine is recently rebuilt with new jugs. The car is very reliable and runs great it has a 4 speed transmission', 'sick car duder', 1, 15, NULL);

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
(14, 1, 1, 'Sick laptop!', 'Hey i want to buy your laptop, contact me on my email.', '2017-11-30 01:58:02', '2017-12-10 16:33:08', 0, NULL, 56),
(15, 1, 1, 'Interested in buying', 'Can I test drive it?', '2017-11-30 01:58:40', '2017-12-10 16:36:43', 0, NULL, 64),
(16, 1, 1, 'MacOS &gt; Linux', 'True hackers only code on MAC.', '2017-11-30 01:59:06', '2017-11-30 03:47:00', 0, NULL, 57),
(17, 1, 1, 'wussup', 'great thing', '2017-11-30 03:44:45', '2017-11-30 03:54:32', 0, NULL, 0),
(18, 1, 1, 'supp', 'asdsd', '2017-11-30 04:02:00', '2017-11-30 04:02:02', 0, NULL, 62),
(19, 3, 1, 'JSJSJSJSJSJ', 'ajajsdasd', '2017-12-05 16:04:45', '2017-12-10 16:34:17', 0, NULL, 60);

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
(10, 1, 1, 3);

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
(17, 63, 1, 1, '0qmxXAdntX18JMGQukebF2bo8bznXJsg');

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
  `points` int(100) NOT NULL,
  `rating` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `phone`, `address`, `points`, `rating`) VALUES
(1, 'Test', 'User', '1', '1', '8389080183', '123 Test Street', 1275, 3.25),
(2, 'bob', 'zoretic', 'bob.zoret@gmail.com', '123456', '8195829971', '1838 rue dunant', 2000, 0),
(3, 'al', 'm', 'test@test.com', 'password', '1234567899', '123 rue chose', 1000, 0),
(9, 'test', 'test', 'test@testerino.com', 'test', '123', '12', 1000, 0),
(12, 'admin', 'admin', 'admin', 'admin', '000', 'admin', 1000, 5);

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
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `referral`
--
ALTER TABLE `referral`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
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
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
