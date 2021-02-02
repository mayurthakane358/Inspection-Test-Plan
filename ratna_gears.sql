-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 05, 2020 at 07:34 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ratna_gears`
--

-- --------------------------------------------------------

--
-- Table structure for table `create_job`
--

DROP TABLE IF EXISTS `create_job`;
CREATE TABLE IF NOT EXISTS `create_job` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `part_number` varchar(255) NOT NULL,
  `cust_draw_no` varchar(255) NOT NULL,
  `po_number` varchar(255) NOT NULL,
  `itp_number` varchar(255) NOT NULL,
  `itp_revision_level` varchar(255) NOT NULL,
  `rgpl_draw_no` varchar(255) NOT NULL,
  `drawing_revision` varchar(255) NOT NULL,
  `rtp_revision_date` varchar(255) NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `job_date` varchar(255) NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `create_job`
--

INSERT INTO `create_job` (`id`, `file_name`, `customer_id`, `part_number`, `cust_draw_no`, `po_number`, `itp_number`, `itp_revision_level`, `rgpl_draw_no`, `drawing_revision`, `rtp_revision_date`, `invoice_id`, `job_date`, `creationdate`) VALUES
(18, 'New-5328', '12', '12', '12', '12', '12', '12', '12', '12', '2020-12-31', '006/2020-21', '06/12/2020', '2020-12-05 19:06:24'),
(14, 'test-4064', '12', '12', '12', '12', '12', '12', '12', '12', '2020-12-31', '004/2020-21', '05/12/2020', '2020-12-05 17:50:06'),
(15, 'make-8273', '14', '12', '12', '12', '12', '12', '12', '12', '2020-01-12', '005/2020-21', '06/12/2020', '2020-12-05 18:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `create_job_items`
--

DROP TABLE IF EXISTS `create_job_items`;
CREATE TABLE IF NOT EXISTS `create_job_items` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `draw_location` varchar(255) NOT NULL,
  `ballon_no` varchar(255) NOT NULL,
  `characteristics` varchar(255) NOT NULL,
  `spcified_dimention` varchar(255) NOT NULL,
  `upper_tolerance` varchar(255) NOT NULL,
  `lower_tolerance` varchar(255) NOT NULL,
  `upper_dimention` varchar(255) NOT NULL,
  `lower_dimention` varchar(255) NOT NULL,
  `measuring_instrument` varchar(255) NOT NULL,
  `job_value` varchar(255) NOT NULL,
  `job_value2` varchar(255) NOT NULL,
  `job_value3` varchar(255) NOT NULL,
  `job_value4` varchar(255) NOT NULL,
  `job_value5` varchar(255) NOT NULL,
  `job_value6` varchar(255) NOT NULL,
  `job_value7` varchar(255) NOT NULL,
  `job_value8` varchar(255) NOT NULL,
  `job_value9` varchar(255) NOT NULL,
  `job_value10` varchar(255) NOT NULL,
  `job_value11` varchar(255) NOT NULL,
  `job_value12` varchar(255) NOT NULL,
  `job_value13` varchar(255) NOT NULL,
  `job_value14` varchar(255) NOT NULL,
  `job_value15` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `invoice_id` varchar(255) NOT NULL,
  `job_date` varchar(255) NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `create_job_items`
--

INSERT INTO `create_job_items` (`id`, `draw_location`, `ballon_no`, `characteristics`, `spcified_dimention`, `upper_tolerance`, `lower_tolerance`, `upper_dimention`, `lower_dimention`, `measuring_instrument`, `job_value`, `job_value2`, `job_value3`, `job_value4`, `job_value5`, `job_value6`, `job_value7`, `job_value8`, `job_value9`, `job_value10`, `job_value11`, `job_value12`, `job_value13`, `job_value14`, `job_value15`, `status`, `invoice_id`, `job_date`, `creationdate`) VALUES
(30, 'asw', 'sd', 'OD', '15', '12', '08', '27', '23', 'MICRO', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', '1', 'ok', '006/2020-21', '06/12/2020', '2020-12-05 19:06:24'),
(25, 'asw', 'sd', 'OD', '15', '12', '08', '27', '23', 'MICRO', '25', '1', '1', '1', '24', '1', '1', '23', '1', '26.5', '1', '1', '1', '27', '1', 'ok', '004/2020-21', '05/12/2020', '2020-12-05 17:50:06'),
(26, 'main', '1254', 'LG', '21', '12', '08', '33', '29', 'GUAGE', '29.1', '32.9', '15', '33', '21', '56', '15', '18', '25', '21', '45', '25', '35', '15', '15', 'ok', '005/2020-21', '06/12/2020', '2020-12-05 18:49:39'),
(27, 'maimn', '524', 'LG', '25', '21', '15', '46', '40', 'MICRO', '45', '41', '40.5', '46', '35', '92', '12', '45', '65', '32', '52', '12', '12', '14', '15', 'ok', '005/2020-21', '06/12/2020', '2020-12-05 18:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `job_nos`
--

DROP TABLE IF EXISTS `job_nos`;
CREATE TABLE IF NOT EXISTS `job_nos` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `invoice_no` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_nos`
--

INSERT INTO `job_nos` (`id`, `invoice_no`) VALUES
(15, '005/2020-21'),
(14, '004/2020-21'),
(18, '006/2020-21');

-- --------------------------------------------------------

--
-- Table structure for table `ratna_admin`
--

DROP TABLE IF EXISTS `ratna_admin`;
CREATE TABLE IF NOT EXISTS `ratna_admin` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_enabled` varchar(255) NOT NULL,
  `creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratna_admin`
--

INSERT INTO `ratna_admin` (`id`, `username`, `password`, `is_enabled`, `creationdate`) VALUES
(1, 'admin', 'Ratna@2020', 'Yes', '2020-11-28 17:46:31');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
