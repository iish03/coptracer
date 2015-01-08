-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2015 at 06:27 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cop_tracer`
--

-- --------------------------------------------------------

--
-- Table structure for table `cop_category`
--

CREATE TABLE IF NOT EXISTS `cop_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cop_description`
--

CREATE TABLE IF NOT EXISTS `cop_description` (
`event_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `sequence` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cop_events`
--

CREATE TABLE IF NOT EXISTS `cop_events` (
`event_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET latin1 NOT NULL,
  `status` varchar(50) NOT NULL,
  `max_participants` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `date_entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `time_start` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `time_end` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `location` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cop_events_member`
--

CREATE TABLE IF NOT EXISTS `cop_events_member` (
`event_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `date_entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(50) NOT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cop_users`
--

CREATE TABLE IF NOT EXISTS `cop_users` (
`id` int(11) NOT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `user_password` varchar(200) DEFAULT NULL,
  `cal_color` varchar(25) DEFAULT '#E6FAD8',
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `is_admin` varchar(3) DEFAULT '0',
  `date_entered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `address_street` varchar(150) DEFAULT NULL,
  `address_city` varchar(100) DEFAULT NULL,
  `address_postalcode` varchar(9) DEFAULT NULL,
  `imagename` varchar(250) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `crypt_type` varchar(20) NOT NULL DEFAULT 'MD5',
  `visited` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cop_users`
--

INSERT INTO `cop_users` (`id`, `user_name`, `user_password`, `cal_color`, `first_name`, `last_name`, `gender`, `is_admin`, `date_entered`, `date_modified`, `phone`, `email`, `status`, `address_street`, `address_city`, `address_postalcode`, `imagename`, `deleted`, `crypt_type`, `visited`) VALUES
(1, 'admin', '$1$ad000000$hzXFXvL3XVlnUE/X.1n9t/', '#E6FAD8', 'Krishia', 'Valencia', 'female', 'on', '2015-01-06 16:35:34', '0000-00-00 00:00:00', NULL, 'admin@gmail.com', 'Active', 'L18 B3 Belisario Subd.', 'Las Piñas', NULL, NULL, 0, 'PHP5.3MD5', 1),
(2, '311-1262', '$1$31000000$cw981R2sDU.dqcJR3rlXr.', '#E6FAD8', 'Kevin', 'Valencia', 'male', 'off', '2015-01-06 16:35:37', '2015-01-05 21:32:11', NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 0, 'PHP5.3MD5', 1),
(3, '311-1263', '$1$31000000$cw981R2sDU.dqcJR3rlXr.', '#E6FAD8', 'Denise', 'Valencia', 'male', 'off', '2015-01-06 16:35:38', '2015-01-05 21:32:54', NULL, NULL, 'Active', NULL, NULL, NULL, NULL, 0, 'PHP5.3MD5', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cop_category`
--
ALTER TABLE `cop_category`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cop_description`
--
ALTER TABLE `cop_description`
 ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `cop_events`
--
ALTER TABLE `cop_events`
 ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `cop_events_member`
--
ALTER TABLE `cop_events_member`
 ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `cop_users`
--
ALTER TABLE `cop_users`
 ADD PRIMARY KEY (`id`), ADD KEY `user_user_name_idx` (`user_name`), ADD KEY `user_user_password_idx` (`user_password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cop_description`
--
ALTER TABLE `cop_description`
MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cop_events`
--
ALTER TABLE `cop_events`
MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cop_events_member`
--
ALTER TABLE `cop_events_member`
MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cop_users`
--
ALTER TABLE `cop_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cop_description`
--
ALTER TABLE `cop_description`
ADD CONSTRAINT `cop_description_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `cop_events` (`event_id`) ON UPDATE NO ACTION;

--
-- Constraints for table `cop_events_member`
--
ALTER TABLE `cop_events_member`
ADD CONSTRAINT `cop_events_member_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `cop_events` (`event_id`) ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
