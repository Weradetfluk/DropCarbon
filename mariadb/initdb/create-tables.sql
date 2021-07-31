-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jul 21, 2021 at 05:53 AM
-- Server version: 10.3.28-MariaDB-1:10.3.28+maria~focal
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DcbSystem`
--
CREATE DATABASE IF NOT EXISTS `team2` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `team2`;

-- --------------------------------------------------------

--
-- Table structure for table `dcs_admin`
--

CREATE TABLE `dcs_admin` (
  `adm_id` int(10) NOT NULL,
  `adm_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adm_username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adm_password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adm_status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dcs_admin`
--

INSERT INTO `dcs_admin` (`adm_id`, `adm_name`, `adm_username`, `adm_password`, `adm_status`) VALUES
(1, 'adminfluk', 'weradet', '1234', 1),
(2, 'adminpip', 'suwapat', '1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dcs_company`
--

CREATE TABLE `dcs_company` (
  `com_id` int(10) NOT NULL,
  `com_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_num_visitor` int(10) DEFAULT 0,
  `com_lat` float DEFAULT NULL,
  `com_lon` float DEFAULT NULL,
  `com_status` int(1) DEFAULT 1,
  `com_description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_ent_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dcs_company`
--

INSERT INTO `dcs_company` (`com_id`, `com_name`, `com_num_visitor`, `com_lat`, `com_lon`, `com_status`, `com_description`, `com_ent_id`) VALUES
(1, 'ศูนย์อนุรักษ์สิ่งแวดล้อม สาขา 2', 0, 0, 0, 1, 'รักษาสิ่งแวดง่ายๆแค่เข้ามาพักกับเรา และสามารถติดต่อได้ที่ เบอร์ 0914143234', 2),
(2, 'สุวพัฒน์อนุรักษ์', 0, 0, 0, 4, 'รักษาสิ่งแวดง่ายๆแค่เข้ามาพักกับเรา', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dcs_document`
--

CREATE TABLE `dcs_document` (
  `doc_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doc_ent_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dcs_entrepreneur`
--

CREATE TABLE `dcs_entrepreneur` (
  `ent_id` int(10) NOT NULL,
  `ent_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ent_username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ent_password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ent_birthdate` date DEFAULT NULL,
  `ent_tel` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ent_id_card` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ent_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ent_status` int(1) DEFAULT 1,
  `ent_pre_id` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dcs_entrepreneur`
--

INSERT INTO `dcs_entrepreneur` (`ent_id`, `ent_name`, `ent_username`, `ent_password`, `ent_birthdate`, `ent_tel`, `ent_id_card`, `ent_email`, `ent_status`, `ent_pre_id`) VALUES
(2, 'สุวพัฒน์  เสาวรส', 'Entrepreneur2', '1234', NULL, '0922563953', '777777777777', '62160340@go.buu.ac.th', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dcs_tourist`
--

CREATE TABLE `dcs_tourist` (
  `tus_id` int(10) NOT NULL AUTO_INCREMENT,
  `tus_firstname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tus_lastname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tus_username` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tus_password` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tus_birthdate` DATE DEFAULT NULL,
  `tus_tel` int(10) DEFAULT NULL,
  `tus_score` INT(10) DEFAULT NULL,
  `tus_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tus_cur_score` int(10) DEFAULT NULL,
  `tus_status` int(1) DEFAULT NULL,
  `tus_pre_id` int(10) DEFAULT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Table structure for table `dcs_prefix`
--

CREATE TABLE `dcs_prefix` (
  `pre_id` int(10) NOT NULL,
  `pre_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dcs_prefix`
--

INSERT INTO `dcs_prefix` (`pre_id`, `pre_name`) VALUES
(1, 'นาย'),
(2, 'นาง'),
(3, 'นางสาว');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dcs_admin`
--
ALTER TABLE `dcs_admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `dcs_company`
--
ALTER TABLE `dcs_company`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `com_ent_id` (`com_ent_id`);

--
-- Indexes for table `dcs_entrepreneur`
--
ALTER TABLE `dcs_entrepreneur`
  ADD PRIMARY KEY (`ent_id`),
  ADD KEY `ent_pre_id` (`ent_pre_id`);
  
--
-- Indexes for table `dcs_tourist`
--
ALTER TABLE `dcs_tourist`
  ADD PRIMARY KEY (`tus_id`),
  ADD KEY `tus_pre_id` (`tus_pre_id`);
--
-- Indexes for table `dcs_prefix`
--
ALTER TABLE `dcs_prefix`
  ADD PRIMARY KEY (`pre_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dcs_admin`
--
ALTER TABLE `dcs_admin`
  MODIFY `adm_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dcs_company`
--
ALTER TABLE `dcs_company`
  MODIFY `com_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dcs_entrepreneur`
--
ALTER TABLE `dcs_entrepreneur`
  MODIFY `ent_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dcs_tourist`
--
ALTER TABLE `dcs_tourist`
  MODIFY `tus_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dcs_prefix`
--
ALTER TABLE `dcs_prefix`
  MODIFY `pre_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dcs_company`
--
ALTER TABLE `dcs_company`
  ADD CONSTRAINT `dcs_company_ibfk_1` FOREIGN KEY (`com_ent_id`) REFERENCES `dcs_entrepreneur` (`ent_id`);

--
-- Constraints for table `dcs_entrepreneur`
--
ALTER TABLE `dcs_entrepreneur`
  ADD CONSTRAINT `dcs_entrepreneur_ibfk_1` FOREIGN KEY (`ent_pre_id`) REFERENCES `dcs_prefix` (`pre_id`);
COMMIT;

--
-- Constraints for table `dcs_entrepreneur`
--
ALTER TABLE `dcs_tourist`
  ADD CONSTRAINT `dcs_tourist_ibfk_1` FOREIGN KEY (`tus_pre_id`) REFERENCES `dcs_prefix` (`pre_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
