-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2017 at 01:05 PM
-- Server version: 5.6.30
-- PHP Version: 5.5.35

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
  `post_code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `door_number_name`, `street_name`, `city`, `county`, `post_code`) VALUES
(1, '12', 'Somewhere Street', 'Wimbledon', 'London', 'SW199GD'),
(2, '67', 'Happy Lane', 'Hounslow', 'Middlesex', 'HE46GF');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `campaign`
--

CREATE TABLE IF NOT EXISTS `campaign` (
  `campaign_id` int(11) NOT NULL,
  `offer_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL,
  `wine_colour` varchar(25) DEFAULT NULL,
  `wine_type` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `address_id_fk` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `phone_number`, `email_address`, `password`, `address_id_fk`) VALUES
(1, 'Gordon', 'Johnson', '7572077644', 'k1451760@kingston.ac.uk', '123', 1),
(2, 'Saira', 'Sarwar', '07123456789', 'k1653193@kingston.ac.uk', '456', 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `navigation`
--

CREATE TABLE IF NOT EXISTS `navigation` (
  `navigation_id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL,
  `url_link` varchar(255) NOT NULL,
  `access_level` int(11) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL,
  `card_type` varchar(50) NOT NULL,
  `card_name` varchar(100) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `expiry_date` date NOT NULL,
  `customer_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `static_content`
--

CREATE TABLE IF NOT EXISTS `static_content` (
  `static_content_id` int(11) NOT NULL,
  `subject_heading` varchar(255) DEFAULT NULL,
  `subject_content` longtext NOT NULL,
  `paragraph` int(11) NOT NULL DEFAULT '1',
  `image_link` varchar(255) DEFAULT NULL,
  `navigation_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_hold`
--

CREATE TABLE IF NOT EXISTS `stock_hold` (
  `stock_hold_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  `wine_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wine`
--

CREATE TABLE IF NOT EXISTS `wine` (
  `wine_id` int(11) NOT NULL,
  `wine_name` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `description` longtext,
  `price_per_bottle` double(10,2) NOT NULL,
  `bottles_per_case` int(11) NOT NULL,
  `asset_link` varchar(255) DEFAULT NULL,
  `category_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email_address` (`email_address`);

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
-- Indexes for table `navigation`
--
ALTER TABLE `navigation`
  ADD PRIMARY KEY (`navigation_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `fk_customer_id` (`customer_id_fk`);

--
-- Indexes for table `static_content`
--
ALTER TABLE `static_content`
  ADD PRIMARY KEY (`static_content_id`),
  ADD KEY `fk_navigation_id` (`navigation_id_fk`);

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
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `customer_order_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer_order_line`
--
ALTER TABLE `customer_order_line`
  MODIFY `customer_order_line_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `navigation`
--
ALTER TABLE `navigation`
  MODIFY `navigation_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `static_content`
--
ALTER TABLE `static_content`
  MODIFY `static_content_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `stock_hold`
--
ALTER TABLE `stock_hold`
  MODIFY `stock_hold_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wine`
--
ALTER TABLE `wine`
  MODIFY `wine_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wish_list`
--
ALTER TABLE `wish_list`
  MODIFY `wish_list_id` int(11) NOT NULL AUTO_INCREMENT;
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
-- Constraints for table `static_content`
--
ALTER TABLE `static_content`
  ADD CONSTRAINT `static_content_ibfk_1` FOREIGN KEY (`navigation_id_fk`) REFERENCES `navigation` (`navigation_id`);

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
