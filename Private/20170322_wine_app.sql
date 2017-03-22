-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2017 at 03:42 PM
-- Server version: 5.6.31
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wine_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `address_id` int(11) NOT NULL,
  `door_number_name` varchar(25) NOT NULL,
  `street_name` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `county` varchar(255) DEFAULT NULL,
  `post_code` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `door_number_name`, `street_name`, `city`, `county`, `post_code`) VALUES
(1, '12', 'Somewhere Street', 'Wimbledon', 'London', 'SW199GD'),
(2, '67', 'Happy Lane', 'Hounslow', 'Middlesex', 'HE46GF'),
(3, '5', 'Wibble Road', 'London', 'London', 'W1D N5Y'),
(4, '23', NULL, NULL, NULL, 'gt58yh'),
(8, '9', 'Hidden Gardens', 'Raynes Park', 'London', 'SW20'),
(9, '55', 'Mayfair Street', 'London', 'London', 'W1D 5VE');

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE IF NOT EXISTS `campaign` (
  `campaign_id` int(11) NOT NULL,
  `offer_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `campaign_line`
--

CREATE TABLE IF NOT EXISTS `campaign_line` (
  `campaign_line_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `campaign_id_fk` int(11) NOT NULL,
  `wine_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL,
  `wine_colour` varchar(25) DEFAULT NULL,
  `wine_type` varchar(25) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `wine_colour`, `wine_type`) VALUES
(1, 'Red', 'Wine'),
(2, 'White', 'Wine'),
(3, 'Rose', 'Wine'),
(4, NULL, 'Champagne'),
(5, NULL, 'Sparkling');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access` int(11) NOT NULL DEFAULT '0',
  `address_id_fk` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `phone_number`, `email_address`, `password`, `access`, `address_id_fk`) VALUES
(2, 'Saira', 'Sarwar', '07123456789', 'k1653193@kingston.ac.uk', '456', 0, 2),
(6, 'Gordon', 'Johnson', '07572077644', 'k1451760@kingston.ac.uk', '637199d01117096a83ab9b3f3fd9abdb2b3d070faf668fa980c2f86a13529657', 111078, 8);

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE IF NOT EXISTS `customer_order` (
  `customer_order_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `total_value` double(10,2) DEFAULT NULL,
  `payment_id_fk` int(11) NOT NULL,
  `address_id_fk` int(11) NOT NULL,
  `customer_id_fk` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`customer_order_id`, `order_date`, `total_value`, `payment_id_fk`, `address_id_fk`, `customer_id_fk`) VALUES
(1, '2017-02-01', 55.23, 1, 4, 6),
(2, '2017-02-10', 100.09, 2, 2, 6),
(3, '2017-02-18', 147.99, 1, 9, 6),
(4, '2017-02-18', 217.24, 2, 9, 6),
(5, '2017-02-18', 46.09, 4, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `customer_order_line`
--

CREATE TABLE IF NOT EXISTS `customer_order_line` (
  `customer_order_line_id` int(11) NOT NULL,
  `line_value` double(10,2) NOT NULL,
  `quantity` int(10) DEFAULT NULL,
  `container` varchar(255) DEFAULT NULL,
  `wine_id_fk` int(11) NOT NULL,
  `customer_order_id_fk` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_order_line`
--

INSERT INTO `customer_order_line` (`customer_order_line_id`, `line_value`, `quantity`, `container`, `wine_id_fk`, `customer_order_id_fk`) VALUES
(1, 10.16, 4, NULL, 1, 3),
(2, 135.00, 3, NULL, 8, 3),
(3, 2.83, 1, NULL, 2, 3),
(4, 22.00, 4, NULL, 7, 4),
(5, 15.24, 6, NULL, 1, 4),
(6, 180.00, 4, NULL, 8, 4),
(7, 27.00, 4, NULL, 9, 5),
(8, 16.55, 5, NULL, 5, 5),
(9, 2.54, 1, NULL, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL,
  `card_type` varchar(50) DEFAULT NULL,
  `card_name` varchar(100) DEFAULT NULL,
  `card_number` varchar(16) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `customer_id_fk` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `card_type`, `card_name`, `card_number`, `expiry_date`, `customer_id_fk`) VALUES
(1, 'VISA', 'Gordon Johnson', '5423569858745412', '2017-06-16', 6),
(2, 'Master Card', 'Gordon Johnson', '4567894525896322', '2017-07-22', 6),
(3, 'VISA', 'Saira Sawar', '1234567891234567', '2017-03-23', 2),
(4, 'Visa', 'Gordon Johnson', '4561234567894561', '2017-06-17', 6),
(11, 'Visa', '', '', '0000-00-00', 6);

-- --------------------------------------------------------

--
-- Table structure for table `stock_hold`
--

CREATE TABLE IF NOT EXISTS `stock_hold` (
  `stock_hold_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `wine_id_fk` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock_hold`
--

INSERT INTO `stock_hold` (`stock_hold_id`, `quantity`, `wine_id_fk`) VALUES
(1, 993, 1),
(2, 5000, 2),
(3, 200, 3),
(4, 0, 4),
(5, 7, 5),
(6, 6, 6),
(7, 317, 7),
(8, 539, 8),
(9, 837, 9);

-- --------------------------------------------------------

--
-- Table structure for table `wine`
--

CREATE TABLE IF NOT EXISTS `wine` (
  `wine_id` int(11) NOT NULL,
  `wine_name` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `bottle_size` int(11) DEFAULT NULL,
  `description` longtext,
  `price_per_bottle` double(10,2) NOT NULL,
  `bottles_per_case` int(11) NOT NULL,
  `asset_link` varchar(255) DEFAULT NULL,
  `category_id_fk` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wine`
--

INSERT INTO `wine` (`wine_id`, `wine_name`, `country`, `bottle_size`, `description`, `price_per_bottle`, `bottles_per_case`, `asset_link`, `category_id_fk`) VALUES
(1, 'Bereich Nierstein Qba', 'German', 75, 'Easy drinking, medium-dry white with passion fruit flavour. Ideal for Chinese or Thai dishes', 2.54, 6, 'img/1.jpg', 2),
(2, 'Liebfraumilch', 'German', 100, 'Party on down with this easy-drinking, fruity, medium sweet wine.  Serve well chilled.  Serves 8 glasses.', 2.83, 6, 'img/2.jpg', 2),
(3, 'Piersporter Michelsberg', 'German', 150, 'Easy-drinking, floral medium white.  Perfect for parties, serves 12 glasses.', 4.70, 12, 'img/3.jpg', 2),
(4, 'The Bend in the River', 'German', 75, 'Easy-drinking, floral medium white.  Perfect for parties, serves 12 glasses.', 4.74, 6, 'img/4.jpg', 2),
(5, 'Robertson Cabernet Sauvignon', 'South African', 75, 'Smooth, full-bodied style with rich mulberry, plum and cassis supported by soft tannins. The wine is deep red in colour, smooth with good weight, made in a friendly new Cape style with no hard edges. Enjoy now with roast beef, stews, lamb, venison, pasta and steak.', 3.31, 12, 'img/5.jpg', 1),
(6, 'Mouton-Cadet Blanc', 'French', 75, 'Party on down with this easy-drinking, fruity, medium sweet wine.  Serve well chilled.  Serves 8 glasses.', 5.69, 6, 'img/6.jpg', 1),
(7, 'Ogio Pinot Grigio Rose', 'Italy', 75, 'Pinot Grigio is the grape behind this wine and this juicy strawberry fruit-scented rose makes a really refreshing change to white PG.', 5.50, 6, 'img/7.jpg', 3),
(8, 'Bollinger Rose Champagne', 'France', 75, 'A subtle combination of structure, length and vivacity, with a tannic finish flavours of wild berried and bubbles like velvet.', 45.00, 6, 'img/8.jpg', 4),
(9, 'Plaza Centro Prosecco DOC', 'Italy', 75, 'Made in the north-eastern region of Veneto, in Italy, this is such a great style of Prosecco. Full of lively, little bubbles and lovely soft lemon fruit, its fantastically refreshing and works brilliantly as an aperitif. Add a dash of bitters (like Campari) and youve got a jewel-coloured gem of a cocktail.', 6.75, 6, 'img/9.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `wish_list`
--

CREATE TABLE IF NOT EXISTS `wish_list` (
  `wish_list_id` int(11) NOT NULL,
  `watch` tinyint(4) NOT NULL,
  `last_modified` date DEFAULT NULL,
  `customer_id_fk` int(11) NOT NULL,
  `wine_id_fk` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wish_list`
--

INSERT INTO `wish_list` (`wish_list_id`, `watch`, `last_modified`, `customer_id_fk`, `wine_id_fk`) VALUES
(5, 1, '2017-02-15', 6, 7),
(9, 1, '2017-02-15', 6, 1),
(10, 1, '2017-02-15', 6, 5),
(11, 1, '2017-02-15', 6, 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`campaign_id`);

--
-- Indexes for table `campaign_line`
--
ALTER TABLE `campaign_line`
  ADD PRIMARY KEY (`campaign_line_id`),
  ADD KEY `fk_campaign_id` (`campaign_id_fk`),
  ADD KEY `fk_wine_id` (`wine_id_fk`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `fk_address_id` (`address_id_fk`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`customer_order_id`),
  ADD KEY `fk_payment_id` (`payment_id_fk`),
  ADD KEY `fk_address_id` (`address_id_fk`),
  ADD KEY `fk_customer_id` (`customer_id_fk`);

--
-- Indexes for table `customer_order_line`
--
ALTER TABLE `customer_order_line`
  ADD PRIMARY KEY (`customer_order_line_id`),
  ADD KEY `fk_wine_id` (`wine_id_fk`),
  ADD KEY `fk_customer_order_id` (`customer_order_id_fk`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD UNIQUE KEY `card_number` (`card_number`),
  ADD KEY `fk_customer_id` (`customer_id_fk`);

--
-- Indexes for table `stock_hold`
--
ALTER TABLE `stock_hold`
  ADD PRIMARY KEY (`stock_hold_id`),
  ADD KEY `fk_wine_id` (`wine_id_fk`);

--
-- Indexes for table `wine`
--
ALTER TABLE `wine`
  ADD PRIMARY KEY (`wine_id`),
  ADD KEY `fk_category_id` (`category_id_fk`);

--
-- Indexes for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD PRIMARY KEY (`wish_list_id`),
  ADD KEY `fk_customer_id` (`customer_id_fk`),
  ADD KEY `fk_wine_id` (`wine_id_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `campaign`
--
ALTER TABLE `campaign`
  MODIFY `campaign_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `campaign_line`
--
ALTER TABLE `campaign_line`
  MODIFY `campaign_line_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `customer_order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customer_order_line`
--
ALTER TABLE `customer_order_line`
  MODIFY `customer_order_line_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `stock_hold`
--
ALTER TABLE `stock_hold`
  MODIFY `stock_hold_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `wine`
--
ALTER TABLE `wine`
  MODIFY `wine_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `wish_list_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `campaign_line`
--
ALTER TABLE `campaign_line`
  ADD CONSTRAINT `campaign_line_ibfk_1` FOREIGN KEY (`campaign_id_fk`) REFERENCES `campaign` (`campaign_id`),
  ADD CONSTRAINT `campaign_line_ibfk_2` FOREIGN KEY (`wine_id_fk`) REFERENCES `wine` (`wine_id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`address_id_fk`) REFERENCES `address` (`address_id`);

--
-- Constraints for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD CONSTRAINT `customer_order_ibfk_1` FOREIGN KEY (`payment_id_fk`) REFERENCES `payment` (`payment_id`),
  ADD CONSTRAINT `customer_order_ibfk_2` FOREIGN KEY (`address_id_fk`) REFERENCES `address` (`address_id`),
  ADD CONSTRAINT `customer_order_ibfk_3` FOREIGN KEY (`customer_id_fk`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `customer_order_line`
--
ALTER TABLE `customer_order_line`
  ADD CONSTRAINT `customer_order_line_ibfk_1` FOREIGN KEY (`wine_id_fk`) REFERENCES `wine` (`wine_id`),
  ADD CONSTRAINT `customer_order_line_ibfk_2` FOREIGN KEY (`customer_order_id_fk`) REFERENCES `customer_order` (`customer_order_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`customer_id_fk`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `stock_hold`
--
ALTER TABLE `stock_hold`
  ADD CONSTRAINT `stock_hold_ibfk_1` FOREIGN KEY (`wine_id_fk`) REFERENCES `wine` (`wine_id`);

--
-- Constraints for table `wine`
--
ALTER TABLE `wine`
  ADD CONSTRAINT `wine_ibfk_1` FOREIGN KEY (`category_id_fk`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `wish_list`
--
ALTER TABLE `wish_list`
  ADD CONSTRAINT `wish_list_ibfk_1` FOREIGN KEY (`customer_id_fk`) REFERENCES `customer` (`customer_id`),
  ADD CONSTRAINT `wish_list_ibfk_2` FOREIGN KEY (`wine_id_fk`) REFERENCES `wine` (`wine_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
