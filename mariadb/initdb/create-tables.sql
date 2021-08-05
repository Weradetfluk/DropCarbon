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
-- Database: `team2`
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

CREATE TABLE dcs_com_category (
  com_cat_id int(10) NOT NULL primary key AUTO_INCREMENT,
  com_cat_name varchar(50)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
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
  `ent_firstname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ent_lastname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
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

-- --------------------------------------------------------


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
-- Table structure for table `dcs_tourist`
--

CREATE TABLE `dcs_tourist` (
  `tus_id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `tus_firstname` varchar(50),
  `tus_lastname` varchar(50),
  `tus_username` varchar(30),
  `tus_password` varchar(30),
  `tus_birthdate` DATE,
  `tus_tel` int(10),
  `tus_score` INT(10),
  `tus_email` varchar(30) NULL,
  `tus_cur_score` int(10),
  `tus_status` int(1) DEFAULT 1,
  `tus_pre_id` int(10)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;






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
-- Indexes for table `dcs_prefix`
--
ALTER TABLE `dcs_prefix`
  ADD PRIMARY KEY (`pre_id`);

--
-- AUTO_INCREMENT for dumped tables
--


CREATE TABLE dcs_entrepreneur_reject (
  enr_id int(10) NOT NULL primary key AUTO_INCREMENT,
  enr_admin_reason varchar(100) COLLATE utf8_unicode_ci,
  enr_ent_id int(10),
  enr_adm_id int(10),
   FOREIGN KEY (enr_ent_id) REFERENCES dcs_entrepreneur(ent_id),
   FOREIGN KEY (enr_adm_id) REFERENCES dcs_admin(adm_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE dcs_tourist_image (
  tus_img_path varchar(100) NOT NULL,
  tus_img_tus_id int(10),
  FOREIGN KEY (tus_img_tus_id) REFERENCES dcs_tourist(tus_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE dcs_reward (
  rew_id int(10) NOT NULL primary key AUTO_INCREMENT,
  rew_name  varchar(100),
  rew_request int(10),
  rew_img_path varchar(100)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE dcs_reward_tourist (
  ret_id int(10) NOT NULL primary key AUTO_INCREMENT,
  ret_rew_id  int(10),
  ret_tus_id int(10),
  FOREIGN KEY (ret_rew_id) REFERENCES dcs_reward(rew_id),
  FOREIGN KEY (ret_tus_id) REFERENCES dcs_tourist(tus_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE dcs_eve_category (
  eve_cat_id int(10) NOT NULL primary key AUTO_INCREMENT,
  eve_cat_name varchar(50)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE dcs_event (
  eve_id int(10) NOT NULL primary key AUTO_INCREMENT,
  eve_name varchar(100),
  eve_point int(10),
  eve_num_visitor int(10),
  eve_description varchar (255),
  eve_com_id int(10),
  eve_cat_id int(10),
  eve_status int(10),
  FOREIGN KEY (eve_com_id) REFERENCES dcs_company(com_id),
  FOREIGN KEY (eve_cat_id) REFERENCES dcs_eve_category(eve_cat_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE dcs_checkin (
  che_id int(10) NOT NULL primary key AUTO_INCREMENT,
  che_tus_id  int(10),
  che_eve_id int(10),
  che_status int(1),
  che_date_time_in TIMESTAMP,
  che_date_time_out TIMESTAMP,
  FOREIGN KEY (che_tus_id) REFERENCES dcs_tourist(tus_id),
  FOREIGN KEY (che_eve_id) REFERENCES dcs_event(eve_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE dcs_eve_image (
  eve_img_path varchar(100),
  eve_img_eve_id int(10),
  FOREIGN KEY (eve_img_eve_id) REFERENCES dcs_event(eve_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE dcs_com_image (
  com_img_path varchar(100),
  com_img_com_id int(10),
  FOREIGN KEY (com_img_com_id) REFERENCES dcs_company(com_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE dcs_pro_category (
  pro_cat_id int(10) NOT NULL primary key AUTO_INCREMENT,
  pro_cat_name varchar(50)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE dcs_promotions (
  pro_id int(10) NOT NULL primary key AUTO_INCREMENT,
  pro_name varchar(100),
  pro_point int(10),
  pro_description varchar (255),
  pro_com_id int(10),
  pro_cat_id int(10),
  pro_status int(10),
  pro_img_path varchar(100),
  FOREIGN KEY (pro_com_id) REFERENCES dcs_company(com_id),
  FOREIGN KEY (pro_cat_id) REFERENCES dcs_pro_category(pro_cat_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




CREATE TABLE dcs_tou_promotion (
  tou_id int(10) NOT NULL primary key AUTO_INCREMENT,
  tou_pro_id int(10),
  tou_tus_id int(10),
  tou_pro_status int(10),
  FOREIGN KEY (tou_tus_id) REFERENCES dcs_tourist(tus_id),
  FOREIGN KEY (tou_pro_id) REFERENCES dcs_promotions(pro_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Constraints for table `dcs_tourist`
--
ALTER TABLE `dcs_tourist`
  ADD CONSTRAINT `tus_pre_id` FOREIGN KEY (`tus_pre_id`) REFERENCES `dcs_prefix` (`pre_id`);
COMMIT;



/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
