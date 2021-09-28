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
  `adm_id` int(10) NOT NULL  primary key AUTO_INCREMENT,
  `adm_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adm_email` varchar(30) NULL,
  `adm_username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adm_password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adm_status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dcs_admin`
--

INSERT INTO `dcs_admin` (`adm_id`, `adm_name`, `adm_username`, `adm_password`, `adm_status`) VALUES
(1, 'adminfluk', 'weradet', 'adm1_1234', 1),
(2, 'adminpip', 'suwapat', 'adm2_1234', 1);

-- --------------------------------------------------------

CREATE TABLE `dcs_com_category` (
  `com_cat_id` int(10) NOT NULL primary key AUTO_INCREMENT,
  `com_cat_name` varchar(50)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
--
-- Table structure for table `dcs_company`
--

--
-- Dumping data for table `dcs_admin`
--

INSERT INTO `dcs_com_category` (`com_cat_id`, `com_cat_name`) VALUES
(1, 'สถานที่ท่องเที่ยว'),
(2, 'สถานที่พักผ่อน'),
(3, 'ร้านอาหาร'),
(4, 'อื่น ๆ');

-- --------------------------------------------------------

--
-- Table structure for table `dcs_prefix`
--

CREATE TABLE `dcs_prefix` (
  `pre_id` int(10) NOT NULL  primary key AUTO_INCREMENT,
  `pre_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dcs_prefix`
--

INSERT INTO `dcs_prefix` (`pre_id`, `pre_name`) VALUES
(1, 'นาย'),
(2, 'นาง'),
(3, 'นางสาว'),
(4, 'อื่นๆ');



--
-- Table structure for table `dcs_entrepreneur`
--

CREATE TABLE `dcs_entrepreneur` (
  `ent_id` int(10) NOT NULL  primary key AUTO_INCREMENT,
  `ent_firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ent_lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ent_username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ent_password` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ent_birthdate` date NOT NULL,
  `ent_tel` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `ent_id_card` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `ent_email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ent_status` int(1) DEFAULT 1,
  `ent_pre_id` int(1) NOT NULL,
  `ent_regis_date` TIMESTAMP DEFAULT CONVERT_TZ(NOW(), @@session.time_zone, '+07:00'),
   FOREIGN KEY (ent_pre_id) REFERENCES dcs_prefix(pre_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dcs_entrepreneur`
--

-- --------------------------------------------------------

--
-- Table structure for table `dcs_document`
--

CREATE TABLE `dcs_document` (
  `doc_path` varchar(100) NOT NULL primary key,
  `doc_name` varchar(100) NOT NULL,
  `doc_ent_id` int(10) NOT NULL,
  FOREIGN KEY (doc_ent_id) REFERENCES dcs_entrepreneur(ent_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dcs_tourist`
--

CREATE TABLE `dcs_tourist` (
  `tus_id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `tus_firstname` varchar(50) NOT NULL,
  `tus_lastname` varchar(50) NOT NULL,
  `tus_username` varchar(30) NOT NULL,
  `tus_password` varchar(30) NOT NULL,
  `tus_birthdate` date NOT NULL,
  `tus_tel` varchar(12) NOT NULL,
  `tus_score` INT(10) DEFAULT 0,
  `tus_email` varchar(30) NOT NULL,
  `tus_cur_score` int(10) DEFAULT 0,
  `tus_status` int(1) DEFAULT 1,
  `tus_pre_id` int(10) NOT NULL,
   FOREIGN KEY (tus_pre_id) REFERENCES dcs_prefix(pre_id)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `dcs_company` (
  `com_id` int(10) NOT NULL  primary key AUTO_INCREMENT,
  `com_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `com_num_visitor` int(10) DEFAULT 0,
  `com_lat` float(20) NOT NULL,
  `com_lon` float(20) NOT NULL,
  `com_status` int(1) DEFAULT 1,
  `com_description` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `com_ent_id` int(10) NOT NULL,
  `com_tel` varchar(12) NOT NULL,
  `com_location` varchar(200) NOT NULL,
  `com_cat_id` int(10) NOT NULL,
  `com_add_date` TIMESTAMP DEFAULT CONVERT_TZ(NOW(), @@session.time_zone, '+07:00'),
   FOREIGN KEY (com_ent_id) REFERENCES dcs_entrepreneur(ent_id),
   FOREIGN KEY (com_cat_id) REFERENCES dcs_com_category(com_cat_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dcs_company`
--

INSERT INTO `dcs_entrepreneur` (`ent_id`, `ent_firstname`, `ent_lastname`, `ent_username`, `ent_password`, `ent_birthdate`, `ent_tel`, `ent_id_card`, `ent_email`, `ent_status`, `ent_pre_id`) VALUES
(1, 'ณเอก', 'ปุณย์ปริชญ์', 'Entrepreneur1', 'ent1_1234', '2001-07-17', '0955572662', '777777777777', '62160082@go.buu.ac.th', 2, 1),
(2, 'อัจฉราภรณ์', 'พรพัฒนทรัพย์', 'Entrepreneur2', 'ent2_1234', '2001-02-14', '0991584644', '1249900858895', '62160344@gmail.com', 1, 1);

INSERT INTO `dcs_company` (`com_id`, `com_name`, `com_num_visitor`, `com_lat`, `com_lon`, `com_status`, `com_description`, `com_ent_id`, `com_tel`, `com_cat_id`) VALUES
(1, 'โรงแรมพักร้อน', 0, 13.2622, 101.174, 1, 'หมู่เกาะสิมิลัน เป็นหมู่เกาะเล็ก ๆ ในทะเลอันดามัน มีทั้งหมด 9 เกาะ เรียงลำดับจากเหนือมาใต้ ได้แก่ เกาะหูยง เกาะปายัง เกาะปาหยัน เกาะเมี่ยง (มี 2 เกาะติดกัน) เกาะปายู เกาะหัวกะโหลก (เกาะบอน) เกาะสิมิลัน และเกาะบางู โดยหมู่เกาะเหล่านี้ได้รับการยกย่องว่าเป็นหมู่เกาะที่มีความงาม ทั้งบนบกและใต้น้ำที่ยังคงความสมบูรณ์ของท้องทะเล สามารถดำน้ำได้ทั้งน้ำตื้นและน้ำลึก มีปะการังที่มีสีสันสวยงามหลากชนิด ปลาหลากสีสันและหายาก', 1, '0905530622', 1);

INSERT INTO `dcs_tourist` (`tus_id`, `tus_firstname`, `tus_lastname`, `tus_username`, `tus_password`, `tus_birthdate`, `tus_tel`, `tus_score`, `tus_email`, `tus_cur_score`, `tus_status`, `tus_pre_id`) VALUES
(1, 'สมชาย', 'ชาติทหาร', 'Tourist1', 'tou1_1234', '2021-09-05', '0901111111', NULL, '62160110@go.buu.ac.th', NULL, 1, 1);

INSERT INTO `dcs_document` (`doc_path`, `doc_ent_id`) VALUES
('613257f20bbb03.90906788.pdf', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dcs_admin`
--


--
-- AUTO_INCREMENT for dumped tables
--


CREATE TABLE `dcs_entrepreneur_reject` (
  `enr_id` int(10) NOT NULL primary key AUTO_INCREMENT,
  `enr_admin_reason` varchar(255) COLLATE utf8_unicode_ci,
  `enr_ent_id` int(10),
  `enr_adm_id` int(10),
  `enr_rej_date` TIMESTAMP DEFAULT CONVERT_TZ(NOW(), @@session.time_zone, '+07:00'),
   FOREIGN KEY (enr_ent_id) REFERENCES dcs_entrepreneur(ent_id),
   FOREIGN KEY (enr_adm_id) REFERENCES dcs_admin(adm_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `dcs_tourist_image` (
  `tus_img_path` varchar(100) NOT NULL primary key,
  `tus_img_name` varchar(100),
  `tus_img_tus_id` int(10),
  FOREIGN KEY (tus_img_tus_id) REFERENCES dcs_tourist(tus_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `dcs_reward` (
  `rew_id` int(10) NOT NULL primary key AUTO_INCREMENT,
  `rew_name`  varchar(100),
  `rew_request` int(10),
  `rew_img_path` varchar(100)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `dcs_reward_tourist` (
  `ret_id` int(10) NOT NULL primary key AUTO_INCREMENT,
  `ret_rew_id`  int(10),
  `ret_tus_id` int(10),
  FOREIGN KEY (ret_rew_id) REFERENCES dcs_reward(rew_id),
  FOREIGN KEY (ret_tus_id) REFERENCES dcs_tourist(tus_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `dcs_eve_category` (
  `eve_cat_id` int(10) NOT NULL primary key AUTO_INCREMENT,
  `eve_cat_name` varchar(50)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `dcs_event` (
  `eve_id` int(10) NOT NULL primary key AUTO_INCREMENT,
  `eve_name` varchar(100),
  `eve_point` int(10) DEFAULT 0,
  `eve_num_visitor` int(10) DEFAULT 0,
  `eve_description` varchar (2000),
  `eve_status` int(10) DEFAULT 1,
  `eve_add_date` TIMESTAMP DEFAULT CONVERT_TZ(NOW(), @@session.time_zone, '+07:00'),
  `eve_start_date` DATE NOT NULL,
  `eve_end_date` DATE NULL,
  `eve_com_id` int(10),
  `eve_cat_id` int(10),
  FOREIGN KEY (eve_com_id) REFERENCES dcs_company(com_id),
  FOREIGN KEY (eve_cat_id) REFERENCES dcs_eve_category(eve_cat_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `dcs_checkin` (
  `che_id` int(10) NOT NULL primary key AUTO_INCREMENT,
  `che_status` int(1) NOT NULL,
  `che_date_time_in` TIMESTAMP DEFAULT CONVERT_TZ(NOW(), @@session.time_zone, '+07:00'),
  `che_date_time_out` TIMESTAMP,
  `che_tus_id` int(10) NOT NULL,
  `che_eve_id` int(10) NOT NULL,
  FOREIGN KEY (che_tus_id) REFERENCES dcs_tourist(tus_id),
  FOREIGN KEY (che_eve_id) REFERENCES dcs_event(eve_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `dcs_eve_image` (
  `eve_img_path` varchar(100) NOT NULL primary key,
  `eve_img_name` varchar(100),
  `eve_img_eve_id` int(10),
  FOREIGN KEY (eve_img_eve_id) REFERENCES dcs_event(eve_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `dcs_com_image` (
  `com_img_path` varchar(100) NOT NULL primary key,
  `com_img_name` varchar(100),
  `com_img_com_id` int(10),
  FOREIGN KEY (com_img_com_id) REFERENCES dcs_company(com_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `dcs_pro_category` (
  `pro_cat_id` int(10) NOT NULL primary key AUTO_INCREMENT,
  `pro_cat_name` varchar(50)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `dcs_promotions` (
  `pro_id` int(10) NOT NULL primary key AUTO_INCREMENT,
  `pro_name` varchar(100) NOT NULL,
  `pro_point` int(10) DEFAULT 0,
  `pro_description` varchar (2000) NOT NULL,
  `pro_status` int(10) DEFAULT 1,
  `pro_add_date` TIMESTAMP DEFAULT CONVERT_TZ(NOW(), @@session.time_zone, '+07:00'),
  `pro_start_date` DATE NOT NULL,
  `pro_end_date` DATE NULL,
  `pro_com_id` int(10) NOT NULL,
  `pro_cat_id` int(10) NOT NULL,
  FOREIGN KEY (pro_com_id) REFERENCES dcs_company(com_id),
  FOREIGN KEY (pro_cat_id) REFERENCES dcs_pro_category(pro_cat_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `dcs_pro_image` (
  `pro_img_path` varchar(100) NOT NULL primary key,
  `pro_img_name` varchar(100) NOT NULL,
  `pro_img_adm_id` int(10) NOT NULL,
  FOREIGN KEY (pro_img_adm_id) REFERENCES dcs_promotions(pro_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `dcs_tou_promotion` (
  `tou_id` int(10) NOT NULL primary key AUTO_INCREMENT,
  `tou_pro_status` int(10),
  `tou_pro_id` int(10),
  `tou_tus_id` int(10),
  FOREIGN KEY (tou_tus_id) REFERENCES dcs_tourist(tus_id),
  FOREIGN KEY (tou_pro_id) REFERENCES dcs_promotions(pro_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `dcs_company_reject` (
  `cor_id` int(10) NOT NULL primary key AUTO_INCREMENT,
  `cor_admin_reason` varchar(255) COLLATE utf8_unicode_ci,
  `cor_rej_date` TIMESTAMP DEFAULT CONVERT_TZ(NOW(), @@session.time_zone, '+07:00'),
  `cor_ent_id` int(10),
  `cor_adm_id` int(10),
   FOREIGN KEY (cor_ent_id) REFERENCES dcs_company(com_id),
   FOREIGN KEY (cor_adm_id) REFERENCES dcs_admin(adm_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `dcs_event_reject` (
  `evr_id` int(10) NOT NULL primary key AUTO_INCREMENT,
  `evr_admin_reason` varchar(255) COLLATE utf8_unicode_ci,
  `evr_rej_date` TIMESTAMP DEFAULT CONVERT_TZ(NOW(), @@session.time_zone, '+07:00'),
  `evr_eve_id` int(10),
  `evr_adm_id` int(10),
   FOREIGN KEY (evr_eve_id) REFERENCES dcs_event(eve_id),
   FOREIGN KEY (evr_adm_id) REFERENCES dcs_admin(adm_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `dcs_promotion_reject` (
  `prr_id` int(10) NOT NULL primary key AUTO_INCREMENT,
  `prr_admin_reason` varchar(255) COLLATE utf8_unicode_ci,
  `prr_rej_date` TIMESTAMP DEFAULT CONVERT_TZ(NOW(), @@session.time_zone, '+07:00'),
  `prr_pro_id` int(10),
  `prr_adm_id` int(10),
   FOREIGN KEY (prr_pro_id) REFERENCES dcs_promotions(pro_id),
   FOREIGN KEY (prr_adm_id) REFERENCES dcs_admin(adm_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `dcs_banner` (
  `ban_path` varchar(100) NOT NULL primary key,
  `ban_name` varchar(100) NOT NULL,
  `ban_adm_id` int(10),
  FOREIGN KEY (ban_adm_id) REFERENCES dcs_admin(adm_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
--
-- AUTO_INCREMENT for table `dcs_admin`
--

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dcs_company`
--

--
-- Constraints for table `dcs_entrepreneur`
--


--
-- Constraints for table `dcs_tourist`
--




/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
