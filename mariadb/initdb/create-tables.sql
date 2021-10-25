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
  `adm_id` int(10) NOT NULL  primary key AUTO_INCREMENT COMMENT ' ไอดีของ Admin ',
  `adm_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT ' ชื่อของ Admin ',
  `adm_email` varchar(30) NULL COMMENT ' อีเมลของ Admin ',
  `adm_username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT ' username ของ Admin ',
  `adm_password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'รหัสผ่านของผู้ดูแลระบบ',
  `adm_status` int(1) DEFAULT 1 COMMENT 'สถานะของผู้ดูแลระบบ 1=ใช้งาน 2=ถูกลบ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dcs_admin`
--

INSERT INTO `dcs_admin` (`adm_id`, `adm_name`, `adm_username`, `adm_password`, `adm_status`) VALUES
(1, 'adminfluk', 'weradet', '958eab45014e55ca1ffc41ff3b2d808d', 1),
(2, 'adminpip', 'suwapat', 'adm2_1234', 1);

-- --------------------------------------------------------

CREATE TABLE `dcs_com_category` (
  `com_cat_id` int(10) NOT NULL primary key AUTO_INCREMENT COMMENT ' ไอดีของ ประเภทสถานที่ ',
  `com_cat_name` varchar(50) COMMENT 'ชื่อของประเภท '
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
--
-- Table structure for table `dcs_company`
--

--
-- Dumping data for table `dcs_admin`
--

INSERT INTO `dcs_com_category` (`com_cat_id`, `com_cat_name`) VALUES
(1, 'ชายหาด'),
(2, 'ตลาดน้ำ'),
(3, 'พิพิธภัณฑ์'),
(4, 'อุทยาน'),
(5, 'เมืองจำลอง'),
(6, 'ร้านอาหาร'),
(7, 'โรงแรม'),
(8, 'อื่น ๆ');

-- --------------------------------------------------------

--
-- Table structure for table `dcs_prefix`
--

CREATE TABLE `dcs_prefix` (
  `pre_id` int(10) NOT NULL  primary key AUTO_INCREMENT COMMENT ' ไอดีของ ตารางคำนำหน้า ',
  `pre_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ตัวอย่าง Ex. นาย, นาง, นางสาว '
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
  `ent_id` int(10) NOT NULL  primary key AUTO_INCREMENT COMMENT ' ไอดีของ ผู้ประกอบการ ',
  `ent_firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อจริงของผู้ประกอบการ',
  `ent_lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'นามสกุลของผู้ประกอบการ ',
  `ent_username` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT ' username ของ ผู้ประกอบการ',
  `ent_password` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT ' รหัสผ่าน ของ ผู้ประกอบการ ',
  `ent_birthdate` date NOT NULL COMMENT 'วันเกิดของของผู้ประกอบการ',
  `ent_tel` varchar(12) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เบอร์โทรของผู้ประกอบการ',
  `ent_id_card` varchar(13) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รหัสประชาชน ของผู้ประกอบการ',
  `ent_email` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'อีเมลของผู้ประกอบการ',
  `ent_status` int(1) DEFAULT 1 COMMENT ' สถานะของผู้ประกอบการ 1=รออนุมัติ 2=อนุมัติ, 3=ปฏิเสธ, 4=ถูกบล็อค',
  `ent_pre_id` int(1) NOT NULL COMMENT ' คำนำหน้า จากตาราง dcs_prefix',
  `ent_regis_date` TIMESTAMP DEFAULT CONVERT_TZ(NOW(), @@session.time_zone, '+07:00') COMMENT 'วันที่ลงทะบียน',
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
  `doc_path` varchar(100) NOT NULL primary key COMMENT 'ที่อยู่จัดเก็บของเอกสาร ',
  `doc_name` varchar(100) NOT NULL COMMENT 'เอกสารยืนยันตัวตนของผู้ประกอบการ ',
  `doc_ent_id` int(10) NOT NULL COMMENT ' ไอดีของ ผู้ประกอบการ จากตาราง dcs_entrepreneur ',
  FOREIGN KEY (doc_ent_id) REFERENCES dcs_entrepreneur(ent_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dcs_document`
--

-- --------------------------------------------------------
--
-- Table structure for table `dcs_tourist`
--

CREATE TABLE `dcs_tourist` (
  `tus_id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'ไอดีของนักท่องเที่ยว',
  `tus_firstname` varchar(50) NOT NULL COMMENT 'ชื่อจริงของนักท่องเที่ยว',
  `tus_lastname` varchar(50) NOT NULL COMMENT 'นามสกุลของนักท่องเที่ยว',
  `tus_username` varchar(100) NOT NULL COMMENT ' username ',
  `tus_password` varchar(100) NOT NULL COMMENT 'รหัสผ่าน',
  `tus_birthdate` date NOT NULL COMMENT 'วันเกิดของนักท่องเที่ยว',
  `tus_tel` varchar(12) NOT NULL COMMENT 'เบอร์โทรของนักท่องเที่ยว',
  `tus_score` INT(10) DEFAULT 0 COMMENT 'คะแนนของนักท่องเที่ยวที่ใช้งาน ',
  `tus_email` varchar(30) NOT NULL COMMENT 'อีเมลของนักท่องเที่ยว',
  `tus_cur_score` int(10) DEFAULT 0 COMMENT 'คะแนนสูงสุดของนักท่องเที่ยว เพื่อนำไปเช็คกับ Ranking',
  `tus_status` int(1) DEFAULT 1 COMMENT ' สถานะของนักท่องเที่ยว 1=กำลังใช้งาน 2=ถูกระงับ',
  `tus_pre_id` int(10) NOT NULL COMMENT 'คำนำหน้า จากตาราง dcs_prefix',
   FOREIGN KEY (tus_pre_id) REFERENCES dcs_prefix(pre_id)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `dcs_company` (
  `com_id` int(10) NOT NULL  primary key AUTO_INCREMENT COMMENT 'ไอดีของสถานที่',
  `com_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อสถานที่',
  `com_num_visitor` int(10) DEFAULT 0 COMMENT 'จำนวนผู้เข้าชม',
  `com_lat` float(20, 6) NOT NULL COMMENT 'latitude ของสถานที่',
  `com_lon` float(20, 6) NOT NULL COMMENT 'logtitude ของสถานที่',
  `com_status` int(1) DEFAULT 1  COMMENT ' สถานะของสถานที่, ร้านค้า 1=รออนุมัติ 2=อนุมัติ 3=ปฏิเสธ 4=ถูกลบ ',
  `com_description` varchar(2000) COLLATE utf8_unicode_ci NOT NULL COMMENT 'รายละเอียดของสถานที่',
  `com_ent_id` int(10) NOT NULL COMMENT 'ไอดีของผู้ประกอบการ จากตาราง dcs_entrepreneur',
  `com_tel` varchar(12) NOT NULL COMMENT 'เบอร์โทรสถานที่',
  `com_location` varchar(200) NOT NULL COMMENT 'ที่อยู่ของสถานที่ เป็น ตัวอักษร คำ',
  `com_cat_id` int(10) NOT NULL COMMENT 'หมวดหมู่สถานที่ ของ dcs_com_category',
  `com_add_date` TIMESTAMP DEFAULT CONVERT_TZ(NOW(), @@session.time_zone, '+07:00') COMMENT 'เวลาที่ถูกเพิ่ม',
   FOREIGN KEY (com_ent_id) REFERENCES dcs_entrepreneur(ent_id),
   FOREIGN KEY (com_cat_id) REFERENCES dcs_com_category(com_cat_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Dumping data for table `dcs_company`
--


INSERT INTO `dcs_entrepreneur` (`ent_id`, `ent_firstname`, `ent_lastname`, `ent_username`, `ent_password`, `ent_birthdate`, `ent_tel`, `ent_id_card`, `ent_email`, `ent_status`, `ent_pre_id`) VALUES
(1, 'ณเอก', 'ปุณย์ปริชญ์', 'Entrepreneur1', '756b6dda5f9669f0277e9fb50c279a59', '2001-07-17', '0955572662', '777777777777', '62160082@go.buu.ac.th', 2, 1),
(2, 'อัจฉราภรณ์', 'พรพัฒนทรัพย์', 'Entrepreneur2', 'ent2_1234', '2001-02-14', '0991584644', '1249900858895', '62160344@gmail.com', 1, 1);

INSERT INTO `dcs_document` (`doc_path`, `doc_name`, `doc_ent_id`) VALUES
('613257f20bbb03.90906788.pdf', 'รูปบัตรประชาชน', 1);

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
  `enr_id` int(10) NOT NULL primary key AUTO_INCREMENT COMMENT 'ไอดีของการปฏิเสธ',
  `enr_admin_reason` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เหตุผลว่าทำไมต้องมีการปฏิเสธผู้ประกอบการ',
  `enr_ent_id` int(10) NOT NULL COMMENT 'ไอดีของผู้ประกอบการ จากตาราง dcs_entrepreneur',
  `enr_adm_id` int(10) NOT NULL COMMENT 'ไอดีของผู้ดูแลระบบที่ถูกปฏิเสธ จากตาราง dcs_admin',
  `enr_rej_date` TIMESTAMP DEFAULT CONVERT_TZ(NOW(), @@session.time_zone, '+07:00') COMMENT 'วันที่ปฏิเสธ',
   FOREIGN KEY (enr_ent_id) REFERENCES dcs_entrepreneur(ent_id),
   FOREIGN KEY (enr_adm_id) REFERENCES dcs_admin(adm_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `dcs_tourist_image` (
  `tus_img_path` varchar(100) NOT NULL primary key COMMENT 'ที่อยู่เก็บไฟล์ รูปประจำตัวของนักท่องเที่ยว',
  `tus_img_name` varchar(100) NOT NULL COMMENT 'ชื่อรูปประจำตัว',
  `tus_img_tus_id` int(10) NOT NULL COMMENT 'ไอดีของนักท่องเที่ยวจากตาราง dcs_tourist',
  FOREIGN KEY (tus_img_tus_id) REFERENCES dcs_tourist(tus_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `dcs_reward` (
  `rew_id` int(10) NOT NULL primary key AUTO_INCREMENT,
  `rew_name`  varchar(100) NOT NULL COMMENT 'ชื่อRank',
  `rew_request` int(10) NOT NULL COMMENT 'คะแนนที่ต้องการไปยัง Rank นั้นได้',
  `rew_img_path` varchar(100) NOT NULL COMMENT 'ที่อยู่ของรูป Rank'
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `dcs_reward_tourist` (
  `ret_id` int(10) NOT NULL primary key AUTO_INCREMENT,
  `ret_rew_id`  int(10) NOT NULL COMMENT 'Rank ของนักท่องเที่ยว จากตาราง dcs_reward',
  `ret_tus_id` int(10) NOT NULL COMMENT 'ไอดีของนักท่องเที่ยว จากตาราง dcs_tourist ',
  FOREIGN KEY (ret_rew_id) REFERENCES dcs_reward(rew_id),
  FOREIGN KEY (ret_tus_id) REFERENCES dcs_tourist(tus_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `dcs_eve_category` (
  `eve_cat_id` int(10) NOT NULL primary key AUTO_INCREMENT COMMENT 'ไอดีของประเภท',
  `eve_cat_name` varchar(50) COMMENT 'ชื่อประเภท',
  `eve_drop_carbon` float(20) DEFAULT 0 COMMENT 'จำนวนการลดคาร์บอน'
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- data category event

CREATE TABLE `dcs_event` (
  `eve_id` int(10) NOT NULL primary key AUTO_INCREMENT COMMENT 'ไอดีของกิจกรรม',
  `eve_name` varchar(100) COMMENT 'ชื่อกิจกรรม ',
  `eve_point` int(10) DEFAULT 0 COMMENT 'แต้มของกิจกรรม',
  `eve_num_visitor` int(10) DEFAULT 0 COMMENT 'จำนวนผู้เข้าชมกิจกรรม',
  `eve_description` varchar(2000) COMMENT 'รายละเอียดของกิจกรรม',
  `eve_status` int(10) DEFAULT 1 COMMENT 'สถานะของกิจกรรม 1=รออนุมัติ 2=อนุมัติแล้ว 3=ถูกปฏิเสธ 4=ถูกลบ 5=สิ้นสุดกิจกรรม',
  `eve_add_date` TIMESTAMP DEFAULT CONVERT_TZ(NOW(), @@session.time_zone, '+07:00') COMMENT 'วันที่เพิ่มกิจกรรม',
  `eve_start_date` DATE NOT NULL COMMENT 'วันเริ่มต้นกิจกรรม',
  `eve_end_date` DATE NULL COMMENT 'วันสิ้นสุดกิจกรรม',
  `eve_location` varchar(200) NULL COMMENT 'ที่อยู่ของกิจกรรม เป็น ตัวอักษร คำ',
  `eve_lat` float(20, 6) NOT NULL COMMENT 'latitude ของ สถานที่จัดกิจกรรม',
  `eve_lon` float(20, 6) NOT NULL COMMENT 'logtitude ของ สถานที่จัดกิจกรรม',
  `eve_com_id` int(10) COMMENT 'ไอดีของสถานที่ จากตาราง dcs_company',
  `eve_cat_id` int(10) COMMENT 'ไอดีประเภทของกิจกรรมนี้ จากตาราง dcs_eve_category',
  FOREIGN KEY (eve_com_id) REFERENCES dcs_company(com_id),
  FOREIGN KEY (eve_cat_id) REFERENCES dcs_eve_category(eve_cat_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `dcs_checkin` (
  `che_id` int(10) NOT NULL primary key AUTO_INCREMENT COMMENT 'ไอดีของการเช็คอิน',
  `che_status` int(1) NOT NULL COMMENT 'สถานะการเช็คอิน 1=เช็คอิน 2=เช็คเอาต์',
  `che_date_time_in` TIMESTAMP DEFAULT CONVERT_TZ(NOW(), @@session.time_zone, '+07:00') COMMENT 'เวลาการเช็คอิน',
  `che_date_time_out` TIMESTAMP DEFAULT 0 COMMENT 'เวลาการเช็คเอาท์',
  `che_tus_id` int(10) NOT NULL COMMENT 'ไอดีของนักท่องเที่ยวที่เช็คอิน จาก ตาราง dcs_tourist',
  `che_eve_id` int(10) NOT NULL COMMENT 'กิจกรรม ที่ถูกเช็คอิน จากตาราง dcs_event',
  FOREIGN KEY (che_tus_id) REFERENCES dcs_tourist(tus_id),
  FOREIGN KEY (che_eve_id) REFERENCES dcs_event(eve_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `dcs_eve_image` (
  `eve_img_path` varchar(100) NOT NULL primary key COMMENT 'ที่อยู่จัดเก็บรูปกิจกรรม',
  `eve_img_name` varchar(100) NOT NULL COMMENT 'ชื่อรูปกิจกรรม',
  `eve_img_eve_id` int(10) NOT NULL COMMENT 'ไอดีกิจกรรมจากตาราง dcs_event',
  FOREIGN KEY (eve_img_eve_id) REFERENCES dcs_event(eve_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `dcs_com_image` (
  `com_img_path` varchar(100) NOT NULL primary key COMMENT 'ที่อยู่เก็บรูปสถานที่',
  `com_img_name` varchar(100) NOT NULL COMMENT 'ชื่อรูปสถานที่',
  `com_img_com_id` int(10) NOT NULL COMMENT 'ไอดีของสถานที่ จากตาราง dcs_company',
  FOREIGN KEY (com_img_com_id) REFERENCES dcs_company(com_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- data image company

CREATE TABLE `dcs_pro_category` (
  `pro_cat_id` int(10) NOT NULL primary key AUTO_INCREMENT COMMENT 'ไอดีของประเภทโปรโมชัน',
  `pro_cat_name` varchar(50) COMMENT 'ชื่อประเภทโปรโมชัน'
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- data category promotion

CREATE TABLE `dcs_promotions` (
  `pro_id` int(10) NOT NULL primary key AUTO_INCREMENT COMMENT 'ไอดีของโปรโมชัน หรือของรางวัล',
  `pro_name` varchar(100) NOT NULL COMMENT 'ชื่อโปรโมชัน',
  `pro_point` int(10) DEFAULT 0 COMMENT 'แต้มที่ใช้แลก',
  `pro_description` varchar (2000) NOT NULL COMMENT 'รายละเอียดของโปรโมชัน หรือของรางวัล',
  `pro_status` int(10) DEFAULT 1 COMMENT 'สถานะของผู้โปรโมชัน 1=รออนุมัติ 2=อนุมัติแล้ว 3=ปฏิเสธ 4=ถูกลบ 5=หมดอายุ',
  `pro_add_date` TIMESTAMP DEFAULT CONVERT_TZ(NOW(), @@session.time_zone, '+07:00') COMMENT 'วันที่เพิ่มโปรโมชัน',
  `pro_start_date` DATE NOT NULL COMMENT 'วันที่เพิ่มโปรโมชัน หรือของรางวัล',
  `pro_end_date` DATE NULL COMMENT 'วันที่หมดโปรโมชั่น หรือของรางวัล',
  `pro_com_id` int(10) NOT NULL COMMENT 'ไอดีของสถานที่ จากตาราง dcs_company',
  `pro_cat_id` int(10) NOT NULL COMMENT 'ไอดีของประเภทโปรโมชัน หรือของรางวัล จากตาราง dcs_pro_category',
  FOREIGN KEY (pro_com_id) REFERENCES dcs_company(com_id),
  FOREIGN KEY (pro_cat_id) REFERENCES dcs_pro_category(pro_cat_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `dcs_pro_image` (
  `pro_img_path` varchar(100) NOT NULL primary key COMMENT 'ที่อยู่จัดเก็บของรูปโปรโมชัน',
  `pro_img_name` varchar(100) NOT NULL COMMENT 'ชื่อรูปโปรโมชัน',
  `pro_img_pro_id` int(10) NOT NULL COMMENT 'ไอดีของโปรโมชัน จากตาราง dcs_promotions',
  FOREIGN KEY (pro_img_pro_id) REFERENCES dcs_promotions(pro_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `dcs_tou_promotion` (
  `tou_id` int(10) NOT NULL primary key AUTO_INCREMENT  COMMENT 'ไอดีของตารางนักท่องเที่ยวที่ใช้โปรโมชัน',
  `tou_pro_status` int(10) NOT NULL COMMENT 'สถานะของรางวัล ที่ถูกใช้ 1=ยังไม่หมดอายุ 2=หมดอายุ',
  `tou_pro_id` int(10) NOT NULL COMMENT 'ไอดีโปรโมชัน หรือของรางวัล จากตาราง dcs_promotion',
  `tou_tus_id` int(10) NOT NULL COMMENT 'ไอดีของนักท่องเที่ยว จากตาราง dcs_tourist',
  FOREIGN KEY (tou_tus_id) REFERENCES dcs_tourist(tus_id),
  FOREIGN KEY (tou_pro_id) REFERENCES dcs_promotions(pro_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `dcs_company_reject` (
  `cor_id` int(10) NOT NULL primary key AUTO_INCREMENT COMMENT 'ไอดี ของสถานที่ที่ปฏิเสธ',
  `cor_admin_reason` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เหตุผลที่ ปฏิเสธสถานที่',
  `cor_rej_date` TIMESTAMP DEFAULT CONVERT_TZ(NOW(), @@session.time_zone, '+07:00') COMMENT 'วันที่ถูกปฏิเสธ',
  `cor_com_id` int(10) NOT NULL COMMENT 'ไอดีของสถานที่ ถูกปฏิเสธ จากตาราง dcs_company',
  `cor_adm_id` int(10) NOT NULL COMMENT 'ไอดีของผู้ดูแลระบบจากตาราง dcs_admin',
   FOREIGN KEY (cor_com_id) REFERENCES dcs_company(com_id),
   FOREIGN KEY (cor_adm_id) REFERENCES dcs_admin(adm_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `dcs_event_reject` (
  `evr_id` int(10) NOT NULL primary key AUTO_INCREMENT COMMENT 'ไอดี ของกิจกรรมที่ปฏิเสธ',
  `evr_admin_reason` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เหตุผลที่ ปฏิเสธกิจกรรม',
  `evr_rej_date` TIMESTAMP DEFAULT CONVERT_TZ(NOW(), @@session.time_zone, '+07:00') COMMENT 'วันที่ถูกปฏิเสธ',
  `evr_eve_id` int(10) COMMENT 'เหตุผลที่ปฏิเสธ กิจกรรม จากตาราง dcs_event',
  `evr_adm_id` int(10) COMMENT 'ไอดีของผู้ดูแลระบบที่ปฏิเสธ',
   FOREIGN KEY (evr_eve_id) REFERENCES dcs_event(eve_id),
   FOREIGN KEY (evr_adm_id) REFERENCES dcs_admin(adm_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `dcs_promotion_reject` (
  `prr_id` int(10) NOT NULL primary key AUTO_INCREMENT COMMENT 'ไอดี ของโปรโมชันที่ปฏิเสธ',
  `prr_admin_reason` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'เหตุผลที่ปฏิเสธ โปรโมชัน',
  `prr_rej_date` TIMESTAMP DEFAULT CONVERT_TZ(NOW(), @@session.time_zone, '+07:00') COMMENT 'วันที่ถูกปฏิเสธ',
  `prr_pro_id` int(10) COMMENT 'ไอดีของโปรโมชัน จากตาราง dcs_promotions',
  `prr_adm_id` int(10) COMMENT 'ไอดีของผู้ดูแลระบบจากตาราง dcs_admin',
   FOREIGN KEY (prr_pro_id) REFERENCES dcs_promotions(pro_id),
   FOREIGN KEY (prr_adm_id) REFERENCES dcs_admin(adm_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `dcs_banner` (
  `ban_path` varchar(100) NOT NULL primary key COMMENT 'ที่อยู่จัดเก็บ' ,
  `ban_name` varchar(100) NOT NULL COMMENT 'ชื่อภาพแบนเนอร์',
  `ban_adm_id` int(10) COMMENT 'ไอดีของผู้ดูแลระบบที่เพิ่มแบนเนอร์ จากตาราง dcs_admin',
  FOREIGN KEY (ban_adm_id) REFERENCES dcs_admin(adm_id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `dcs_banner` (`ban_path`, `ban_name`, `ban_adm_id`) VALUES
('615a75194a7a46.49398115.png', 'banner1', 1),
('615a75194a7a46.49398123.png', 'banner2', 1);

INSERT INTO `dcs_company` (`com_id`, `com_name`, `com_num_visitor`, `com_lat`, `com_lon`, `com_status`, `com_description`, `com_ent_id`, `com_tel`, `com_location`, `com_cat_id`, `com_add_date`) VALUES
(1, 'โรงแรมพักร้อน', 0, 13.262200, 101.174004, 4, 'หมู่เกาะสิมิลัน เป็นหมู่เกาะเล็ก ๆ ในทะเลอันดามัน มีทั้งหมด 9 เกาะ เรียงลำดับจากเหนือมาใต้ ได้แก่ เกาะหูยง เกาะปายัง เกาะปาหยัน เกาะเมี่ยง (มี 2 เกาะติดกัน) เกาะปายู เกาะหัวกะโหลก (เกาะบอน) เกาะสิมิลัน และเกาะบางู โดยหมู่เกาะเหล่านี้ได้รับการยกย่องว่าเป็นหมู่เกาะที่มีความงาม ทั้งบนบกและใต้น้ำที่ยังคงความสมบูรณ์ของท้องทะเล สามารถดำน้ำได้ทั้งน้ำตื้นและน้ำลึก มีปะการังที่มีสีสันสวยงามหลากชนิด ปลาหลากสีสันและหายาก', 1, '090-553-0622', '158/1 หมู่.9 ตำบล.หนองอิรุณ อำเภอ.บ้านบึง จังหวัด.ชลบุรี 20170', 1, '2021-10-22 20:57:47'),
(2, 'ศาลเจ้านาจา', 0, 13.272564, 100.923393, 4, 'ศาลเจ้านาจา หรือศาลเจ้าหน่าจาซาไท่จื้อ ตั้งอยู่ที่อ่างศิลา จังหวัดชลบุรี เป็นสถานที่ที่หลายคนคงรู้จักกันดีเมื่อได้มาเที่ยวชายหาดบางแสนก็จะแวะมาไหว้ศาลเจ้านาจา ที่อยู่บริเวณแถวตลาดอ่างศิลาไม่ไกลจากชายหาดบางแสนนัก ศาลจ้านาจา อ่างศิลาเดิมเป็นเพียงศาลเจ้าเล็กๆ ด้วยความเคารพศรัทธาของผู้ที่มากราบไหว้ด้วยเชื่อกันว่าให้โชคทางด้านการค้า ทำให้ศาลเจ้าแห่งนี้ถูกพัฒนาปรับปรุงเรื่อยมาจวบจนถึงปัจจุบัน เป็นศาลเจ้าจีนที่ใหญ่โตสวยงามตระการตา สร้างด้วยเป็นศิลปะแบบจีน มีองค์เทพเจ้าปางต่างๆ มากมายให้บูชาเพื่อความเป็นสิริมงคล ส่วนใหญ่ที่มากราบไหว้ มักมาขอเกี่ยวกับการงาน ให้ประสบความสำเร็จ\" ', 1, '038-367-8153', '1/13 ซอย หมู่บ้านศิลาวดี 5 ตำบล อ่างศิลา อำเภอเมืองชลบุรี ชลบุรี 20000', 1, '2021-10-22 20:57:47'),
(3, 'อ่าวแสมสาร', 0, 12.600690, 100.958160, 4, 'อ.สัตหีบ เป็นเมืองชายทะเลในเขตพื้นที่ของทหาร มีชายหาด เกาะน้อย-ใหญ่ สวยๆ มากมาย ไม่ว่าจะเป็นหาดทรายแก้ว หาดเตยงาม หาดนางรำ เกาะขาม เกาะแสมสาร ฯลฯ ในรีวิวนี้จะพาไปเที่ยวที่ เกาะแสมสาร สัตหีบ เกาะที่กำลังจะเป็นที่รู้จักของนักท่องเที่ยว มีนักท่องเที่ยวเพิ่มขึ้นเรื่อยๆ เกาะแห่งนี้ขึ้นชื่อว่าทะเลสวย น้ำใส ปะการังอุดมสมบูรณ์ แถมยังอยู่ไม่ไกลจากฝั่งอีกด้วย เหมาะสำหรับการมาเที่ยวแบบ One day trip', 1, '095-543-5723', 'หมู่ที่ 2 ตำบลแสมสาร อำเภอสัตหีบ จังหวัดชลบุรี', 1, '2021-10-22 20:57:47'),
(4, 'ปราสาทสัจธรรม', 0, 12.489740, 102.243362, 2, 'ปราสาทสัจธรรม (Sanctuary of Truth) เป็นปราสาทที่ทำด้วยไม้ทั้งหลังที่มีขนาดใหญ่ที่สุดในประเทศไทย และเป็นปราสาทไม้ที่ใหญ่ที่สุดในโลก ตั้งอยู่ที่ แหลมราชเวช ตำบลนาเกลือ อำเภอบางละมุง จังหวัดชลบุรี หนึ่งในสถานที่ท่องเที่ยวสุดอันซีน \r\nไปชมความงามของที่แห่งนี้กัน เที่ยวใกล้กรุงเทพฯ แค่นี้เอง ^^\r\nความว่างเปล่า คือ ความจริงที่แท้ เส้นทางท่องเที่ยวเพื่อคนทั้งมวล (รองรับผู้ใช้รถเข็น) : Tourism For All ตื่นตาตื่นใจเมื่อเห็น \"ปราสาทสัจธรรม\" ปราสาทไม้แกะสลักหลังใหญ่ ทรงไทยจัตุรมุข สูงกว่า 100 เมตร ใช้ไม้เนื้อแข็งที่รับน้ำหนักได้ดี เช่น ไม้ตะเคียนทอง ไม้ประดู่ ไม้แดง ไม้เต็ง ไม้สักทองในการสร้าง เป็นสถาปัตยกรรมไทยร่วมสมัยที่ถูกสร้างขึ้นในแผ่นดินรัชกาลที่ 9 ซึ่งออกแบบให้หลุดจากกรอบสถาปัตยกรรมไทยดั้งเดิม แต่ยึดกรรมวิธีแบบโบราณในการสร้าง เช่น ใช้การยึดต่อไม้ด้วยการเข้าเดือย ตอกสลัก เข้าลิ่ม เข้าหางเหยี่ยว โดยไม่ใช้ตะปูเลยแม้แต่น้อย แนวคิดหลักต้องการนำเสนอเรื่องความเชื่อ ความศรัทธา ศาสนา ปรัชญา จริยธรรม อารยธรรม และวัฒนธรรมอันดีงามของชาวเอเชียตะวันออก โดยจุดสำคัญอยู่ที่ห้องโถงกลาง ซึ่งเป็นที่ตั้งของมหาบุษบกวิมาน เป็นไม้แกะสลักอย่างวิจิตรบรรจง เป็นสัญลักษณ์สื่อถึงความว่างเปล่าของจักรวาล หรือนิพพาน นั่นคือการหลุดพ้น นับเป็นสัจธรรมเที่ยงแท้ของทุกสิ่ง เปรียบได้กับการสร้างปราสาทที่เริ่มตั้งแต่ปี 2524 เกือบ 40 ปีแล้วยังไม่สมบูรณ์ และจะสร้างต่อไปเรื่อย ๆ ไม่มีวันสิ้นสุด \"ความว่างเปล่า\" คงไม่ยากเกินกว่าเราจะเข้าไปสัมผัส *** หมายเหตุ ทางลาดชันต่างระดับในบางสถานที่มีระดับความชันไม่ได้มาตรฐาน จำเป็นต้องมีผู้ช่วยเหลือ เพื่อความปลอดภัยปราสาทสัจธรรม เป็นปราสาทไม้ริมทะเลที่นับเป็นสถาปัตยกรรมไม้ขนาดใหญ่ที่สุดในประเทศไทยก่อกำเนิดขึ้นจากแนวความคิดของผู้สร้างคือคุณเล็กวิริยะพันธุ์ผู้ก่อตั้งเมืองโบราณและพิพิธภัณฑ์ช้างเอราวัณจังหวัดสมุทรปราการปราสาทสัจธรรม(Sanctuary of Truth)มีลักษณะทางสถาปัตยกรรมอันโดดเด่นสร้างขึ้นด้วยไม้ทั้งหลังไม่มีโลหะเช่นน็อตตะปูเข้ามาปะปนใช้การเข้าเดือยใส่สลักตอกลิ่มตามแบบช่างไทยสมัยโบราณพร้อมทั้งประติมากรรมแกะสลักไม้อันวิจิตรตระการตาถ่ายทอดเรื่องราวเกี่ยวกับปรัชญาแห่งสรรพสิ่งในเชิงนามธรรมออกมาเป็นรูปธรรมได้อย่างงดงามสะท้อนให้เห็นถึงโลกทัศน์ภูมิปัญญาคุณธรรมและปรัชญาของคนในโลกตะวันออ', 1, '+6638110653', 'หมู่ที่ 5 206/2 พัทยา-นาเกลือ อำเภอบางละมุง ชลบุรี 20150', 3, '2021-10-22 21:03:14'),
(5, 'หาดเตยงามสัตหีบ', 0, 12.692266, 100.853111, 2, 'หาดเตยงาม สัตหีบ\r\nเริ่มกันที่หาดยอดนิยมของสัตหีบ นั่นก็คือ \"หาดเตยงาม\" หรือ \"หาด นย.\" ตั้งอยู่บริเวณอ่าวนาวิกโยธิน ภายใต้การดูแลของหน่วยบัญชาการนาวิกโยธิน (นย.) เดิมชื่อ อ่าวตากัน เป็นหาดทรายขาวสวยงามและสะอาด เพราะได้รับการดูแลอย่างดีจากทหารเรือ เปิดให้ประชาชนเข้าไปพักผ่อนในช่วงวันหยุด โดยจะต้องทำการแลกบัตรที่บริเวณทางเข้าเสียก่อน เพื่อความเป็นระเบียบเรียบร้อย มีการแบ่งพื้นที่โซนเล่นน้ำ โซนที่พักเอาไว้อย่างชัดเจน เพื่อจัดระเบียบและดูแลได้โดยง่าย\r\nการเดินทางหากมาจากกรุงเทพฯ ทางถนนสุขุมวิท เมื่อถึงสามแยกไประยองก่อนถึงตัวเมืองสัตหีบ จะเข้าซุ้มประตูทางเข้าหน่วยบัญชาการนาวิกโยธิน อยู่ทางด้านขวามือ เมื่อเลี้ยวเข้ามาด้านในก็แจ้งกับเจ้าหน้าที่รักษาการณ์ซึ่งจะอำนวยความสะดวกในเรื่องเส้นทางเดินรถเวลาเปิด-ปิดบริการ : สามารถเข้าเที่ยวและเล่นน้ำได้ถึงเวลา 18.00 น. โดยต้องแลกบัตรเข้าไป (ไม่อนุญาตนักท่องเที่ยวชาวต่างชาติเข้าในพื้นที่ อย่างไรก็ตามนักท่องเที่ยวควรปฏิบัติตามระเบียบต่าง ๆ อย่างเคร่งครัด)', 1, '0843776791', '9, 80 ถนน บรมราชชนนี แขวง ศาลาธรรมสพน์ เขตทวีวัฒนา กรุงเทพมหานคร 10170', 1, '2021-10-22 21:08:30'),
(6, 'หาดวอนนภา', 0, 12.489740, 102.243362, 2, 'หาดวอนภา บางแสน\r\nหาดวอนนภา หรือ บางแสนล่าง จ. ชลบุรี เป็นแหล่งที่เที่ยวเดียวกับหาดบางแสนกลาง \r\nแต่จะมีบรรยากาศเงียบกว่าในช่วงเช้าถึงเย็น และจะเริ่มคึกคักหลังจากพระอาทิตย์ตก เนื่องจากจะเต็มไปด้วยแสงสีและเสียงเพลง\r\nจากร้านอาหาร บาร์ ต่างๆ ซึ่งถือว่าเป็นแหล่งท่องเที่ยวกลางคืนของบางแสน ซึ่งปัจจุบันเมื่อปลายปี พศ 2562 ได้ถูกเปลี่ยนโฉมใหม่ จากเทศบาลตำบลแสนสุข จนมีน้ำทะเลที่ใสมองเห็นผื้นทราย \r\nบริเวณโดยรอบดูสะอาดตา ไม่มีขยะเหมือนเมื่อก่อนดวอนนภา ตั้งอยู่ตอนใต้ของหาดบางแสน มีลักษณะเป็นแนวหินกั้นคลื่นซัดเซาะชายฝั่ง ยาวตลอดแนวชายหาด มีน้ำทะเลที่ใสและลึกประมาณ 1 เมตร \r\nสามารถทำกิจกรรมต่างๆทางทะเลได้ เช่น เช่าห่วงยางเล่นน้ำทะเล เล่นบานาน่าโบ้ท แต่ก็ต้องใช้ความระมัดระวังในการเล่น เนื่อจากมีระดับที่ลึกและมีโขดหินจำนวนมาก ส่วนบนลานหินริมทะเลเป็นที่สำหรับนั่งปูเสื่อ \r\nหรือเตียงผ้าใบใต้ร่มเงาทิวมะพร้าว เพื่อนั่งรับลม รับประทานอาหาร ส่วนฝั่งตรงข้ามริมถนน มีร้านค้า ร้านอาหารสิ่งอำนวยความสะดวกจำนวนมาก ให้ใช้บริการ ส่วนปลายหาดเป็นสวนสาธารณะและสะพานปลา \r\nซึ่งในช่วงเช้า ชาวประมงจะจอดเรือเทียบฝั่ง เพื่อแกะกุ้งหอยปูปลาออกจากอวนแบบสดๆ มาขายให้นักท่องเที่ยว ในราคา', 1, '0955701308', '186 ถนน บางแสนล่าง ตำบลแสนสุข อำเภอเมืองชลบุรี ชลบุรี 20130', 1, '2021-10-22 21:12:24'),
(7, ' Marina Sea View Bangsaen', 0, 13.272218, 100.921890, 2, 'นั่งชิล ชมวิวทะเลสวยๆ จากในห้องนอนได้เลย อะไรจะดีไปกว่านี้ ! Marina Sea View Bangsaen โรงแรมเล็กๆ สุดฮิป ที่มาพร้อมคอนเซ็ปต์ดีๆ และห้องพักวิวทะเลสวยๆ บรรยากาศมีความพาสเทลมากๆ เอาล่ะ งานนี้ต้องไปสักครั้ง !\r\n', 1, '0944869910', '108/16 ถนนบางแสนล่าง บางแสน จังหวัดชลบุรี ', 7, '2021-10-22 21:32:37');

INSERT INTO `dcs_pro_category` (`pro_cat_id`, `pro_cat_name`) VALUES
(1, 'โปรโมชัน'),
(2, 'ของรางวัล');

INSERT INTO `dcs_event` (`eve_id`, `eve_name`, `eve_point`, `eve_num_visitor`, `eve_description`, `eve_status`, `eve_add_date`, `eve_start_date`, `eve_end_date`, `eve_location`, `eve_lat`, `eve_lon`, `eve_com_id`, `eve_cat_id`) VALUES
(1, 'ขี่ช้าง', 10, 0, 'กิจกรรมของปราสาทสัจธรรม\r\nขี่ช้างชมธรรมชาติ กิจกรรมสนุกๆ ที่ปราสาทสัจธรรม พัทยา“พิพิธภัณฑ์ปราสาทสัจธรรม  นำสันติสุขสู่โลก โดยใช้ศิลปะเป็นสื่อ”\r\n“ครั้งหนึ่งในชีวิต ที่ต้องมาสัมผัส”พิพิธภัณฑ์ปราสาทสัจธรรม สถานที่ท่องเที่ยวที่ไม่ไกลจากกรุงเทพ ใครอยากเที่ยวฟินๆ ตามเก็บจุดเช็คอินสุดเก๋ \r\nกับมนต์เสน่ห์ของเมืองพัทยา หาจุดถ่ายรูปบรรยากาศสวยๆ บอกเลยว่า มาที่นี่ได้ครบทุกรสแน่นอนขอให้เชื่อมั่น มั่นใจ ในมาตรฐานการบริการที่มีความปลอดภัยด้านสุขอนามัย \r\nในการควบคุมโรคโควิด-19 ซึ่งได้รับการรับรอง จากกระทรวงสาธารณสุข และกระทรวงการท่องเที่ยวและกีฬา\r\n\"Sanctuary of Truth Museum - a place for extraordinary photography.\"A must-visit place to see and behold once in a lifetime.\"Sanctuary of Truth Museum is an attraction a few distances from Bangkok for those who want to travel to the best check-in point and charm of Pattaya. A striking photo spot to take photos with a beautiful ambience. Indeed, a fantastic place to see that everyone can look forward to. Please be assured and have trust with the standard of service that the place is safe and secure. Accordingly and, certified by the Ministry of Health and the Ministry of Tourism and Sports to control the COVID-19.', 2, '2021-10-22 21:18:25', '2021-10-22', '2022-12-12', NULL, 12.973313, 100.889030, 4, 2),
(2, 'ดำน้ำปลูกปะการัง', 20, 0, 'หยิบบิกินี่ใส่กระเป๋า แล้วไปดำน้ำ ดูปะการัง ที่ อ่าวแสมสาร อ.สัตหีบ จ.ชลบุรี กันเถอะ ด้วยความที่อยู่ใกล้กรุงเทพฯ เพียง 2 ชม. จึงสะดวกต่อการเดินทาง จะเลือกขับรถมาเองก็ชิลล์ หรือขึ้นรถตู้ จากสายใต้ เอกมัย หมอชิต ก็มีบริการค่ะต้องขอเกริ่นก่อนว่า นี่ไม่ใช่เกาะแสมสาร และ เกาะขาม อย่างที่หลายๆ คนเข้าใจ … อ่าวแสมสาร เป็นหนึ่งในเขตความดูแลของกองทัพเรือสัตหีบ จังหวัดชลบุรี เพื่ออนุรักษ์ทรัพยากรธรรมชาติบนเกาะต่างๆ ที่รายล้อมอยู่ เช่น เกาะจวง เกาะโรงโขน เกาะโรงหนัง เกาะยุ้งเกลือ ฯลฯ ซึ่งเกาะเหล่านี้ จะมีเต่าทะเลมาวางไข่อยู่เป็นประจำ จึงไม่อนุญาตให้นักท่องเที่ยวขึ้นไปเดินบนเกาะ สามารถเดินเล่นได้เฉพาะบนหาดทรายเท่านั้นการท่องเที่ยวอ่าวแสมสาร เป็นการท่องเที่ยวเชิงอนุรักษ์ บริหารจัดการโดยชาวบ้านชุมชนช่องแสมสาร ซึ่งเราได้ซื้อทริปดำน้ำจาก Ton Samaesarn เป็นแพคเกจรวมกับที่พัก พร้อมอุปกรณ์ดำน้ำ เครื่องดื่ม น้ำอัดลม แถมบริการถ่ายภาพใต้น้ำให้ฟรี! ไม่จำกัดจำนวนภาพด้วย', 2, '2021-10-22 21:23:26', '2021-10-22', '2022-12-12', NULL, 12.693208, 100.852928, 5, 2),
(3, 'สะพานปลา หาดวอนภา', 5, 0, 'สะพานปลาหาดวอนนภา วิถึชีวิตชุมชมชาวประมงบางแสน หมู่บ้านประมงหาดวอนนภาท่ามกลางตึกคอนโด โรงแรมที่พักที่รายล้อมริมหาดบางแสน หาดวอนนภา สุดปลายหาดวอนนภา มองไกลสุดตา คุณจะเห็นสะพานปลาหาดวอนนภา สะพานที่ทอดยาวลงสู่ทะเลบางแสน บรรยากาศรอบข้างเต็มไปด้วยเรือชาวประมองที่จอดเทียบท่าเรียงรายตามแนวสะพานปลา มุมนี้ยังคงสะท้อนวิถึชุมชนชาวประมงบางแสนดั้งเดิม ที่ยังคงหลงเหลืออยู่ไม่มากนักวิถีชีวิตชาวประมงบางแสนที่ยังคงปรากฎสู่สายตานักท่องเที่ยวยามเย็มเหล่าชาวประมงจะมาทอดแหกันริมสะพานปลาหาดวอนนภา ทุกครั้งที่มีการทอดแหแผ่กว้าง เสียงโซ่ที่ปลายแหกระทบน้ำ สายตาจับจ้องไปกับเชือกที่ปลายแห ชาวประมงค่อยๆ สาวแหขึ้นมา มีแสงสะท้อนจากเกล็ดปลาสะท้อยรับแสงพระอาทิตย์ ระยิบระยับ ได้เห็นปลาตัวเป็นๆ หลากหลายชนิดจากทะเลบางแสน ไม่ว่าจะเป็น ปลากระบอก ปลาเห็ดโคน บางตัวมีขนาดใหญ่ ความยาวเท่าถังพลาสติก สร้างความตื่นตาตื่นใจให้กับนักท่องเที่ยว เรียกเสียงชัตเตอร์ไปได้ไม่น้อยเลยทีเดียว', 2, '2021-10-22 21:28:12', '2021-10-22', '2022-12-12', NULL, 13.269679, 100.922806, 6, 2);

INSERT INTO `dcs_com_image` (`com_img_path`, `com_img_name`, `com_img_com_id`) VALUES
('613257f20bbb03.90174979.jpg', 'อ่าวแสมสาร', 3),
('613257f20bbb03.90906345.jpg', 'รูปปราสาทสัจธรรม2', 2),
('613257f20bbb03.90906415.jpg', 'รูปปราสาทสัจธรรม1', 2),
('613257f20bbb03.90906443.jpg', 'โรงแรม 1', 1),
('6172c424b4d2d6.79320577.jfif', 'download (1).jfif', 4),
('6172c424b5fc21.00860265.jpg', 'overall1.jpg', 4),
('6172c424b76df6.35110862.jpg', 'the-sanctuary-of-truth-standard.jpg', 4),
('6172c424b9b3c5.30116954.jpg', 'zw3zzo5t8h.jpg', 4),
('6172c5615ccee8.51847281.jfif', 'images (1).jfif', 5),
('6172c5615dd6e9.25762131.jpg', 's_62455_5240.jpg', 5),
('6172c66362f1b2.18711435.jpg', 'b5d6gjabifbdibjajj5a9.jpg', 6),
('6172c66366a5a4.50931286.jpg', 'หาดวอนนภา Bang San.jpg', 6),
('6172cb7eb0ca95.67161527.jpg', '568287_15072200530032738922.jpg', 7);

INSERT INTO `dcs_eve_category` (`eve_cat_id`, `eve_cat_name`, `eve_drop_carbon`) VALUES
(1, 'ปลูกต้นไม้ / ปลูกป่า', 0),
(2, 'ชมธรรมชาติ', 0),
(3, 'ออกกำลังกาย', 0),
(4, 'ผจญภัย', 0),
(5, 'ล่องเรือ', 0),
(6, 'อื่นๆ', 0);

INSERT INTO `dcs_tourist` (`tus_id`, `tus_firstname`, `tus_lastname`, `tus_username`, `tus_password`, `tus_birthdate`, `tus_tel`, `tus_score`, `tus_email`, `tus_cur_score`, `tus_status`, `tus_pre_id`) VALUES
(1, 'สมชาย', 'ชาติทหาร', 'Tourist1', 'tou1_1234', '2021-09-05', '0901111111', 0, '62160110@go.buu.ac.th', 0, 1, 1);
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
