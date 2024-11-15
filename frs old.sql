-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 12, 2022 at 11:02 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frs`
--

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_title` varchar(100) DEFAULT NULL,
  `r_cat` varchar(100) NOT NULL,
  `r_comm` varchar(100) NOT NULL,
  `r_offer` varchar(100) DEFAULT NULL,
  `r_offer2` varchar(100) DEFAULT NULL,
  `r_bearer` varchar(100) DEFAULT NULL,
  `r_platform` varchar(100) DEFAULT NULL,
  `r_profile` varchar(100) DEFAULT NULL,
  `r_todo` varchar(100) DEFAULT NULL,
  `r_payment` varchar(100) DEFAULT NULL,
  `r_amount` int(11) DEFAULT NULL,
  `r_date` date NOT NULL,
  `r_any` varchar(500) DEFAULT NULL,
  `r_track` varchar(100) NOT NULL,
  `r_status` int(11) NOT NULL DEFAULT 0,
  `r_count` int(11) NOT NULL DEFAULT 0,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`r_id`, `r_title`, `r_cat`, `r_comm`, `r_offer`, `r_offer2`, `r_bearer`, `r_platform`, `r_profile`, `r_todo`, `r_payment`, `r_amount`, `r_date`, `r_any`, `r_track`, `r_status`, `r_count`, `date`) VALUES
(1, 'New Form of fraud', 'Something else', 'Physical', 'No', 'No', NULL, 'Email Address', 'ibrahimwali4u@gmail.com', 'Here is the real deal', 'Bank Transfer', 1000, '2022-10-17', 'This is the first time', 'a383833368d8986c00f3e648483338190cfd', 0, 0, '2022-10-18 23:45:30'),
(2, NULL, 'Something else', 'Physical', 'No', 'No', NULL, 'Email Address', 'ibrahimwali4u@gmail.com', 'Here is the real deal', 'Bank Transfer', 1000, '2022-10-17', 'This is the first time', 'dd15560949068b2e38e9742ede3dc9b31597', 0, 0, '2022-10-19 00:07:15'),
(3, 'Data processing scam', 'money', 'Text Message', 'No', 'Yes', NULL, 'Twitter', 'ibwalii', 'Message back', 'Bank Transfer', 9993, '2022-10-17', 'Hello for desc', '97c0bccbcce235527256e9401d83874b7dea', 1, 0, '2022-10-19 00:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `reports_comments`
--

DROP TABLE IF EXISTS `reports_comments`;
CREATE TABLE IF NOT EXISTS `reports_comments` (
  `rc_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_id` int(11) NOT NULL,
  `rc_name` varchar(100) NOT NULL,
  `rc_email` varchar(100) NOT NULL,
  `rc_remark` varchar(500) NOT NULL,
  `rc_status` int(11) NOT NULL,
  `rc_priv` int(11) NOT NULL,
  `rc_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`rc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports_comments`
--

INSERT INTO `reports_comments` (`rc_id`, `r_id`, `rc_name`, `rc_email`, `rc_remark`, `rc_status`, `rc_priv`, `rc_date`) VALUES
(1, 3, 'ibrahim', 'ibrahimwali4u@gmail.com', 'A message from comment', 0, 0, '2022-10-21 06:37:01'),
(2, 3, 'Wali', 'wali@gmail.com', 'It is the trend now', 0, 0, '2022-10-21 06:37:05'),
(3, 3, 'admin', 'admin@admin.com', 'It is designated a high risk', 1, 1, '2022-10-21 07:10:59'),
(4, 3, 'admin', 'admin@admin.com', 'It is designated a high risk.', 1, 1, '2022-10-21 20:21:29');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
