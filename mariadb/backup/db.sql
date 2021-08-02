-- MySQL dump 10.19  Distrib 10.3.29-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: team2
-- ------------------------------------------------------
-- Server version	10.3.29-MariaDB-1:10.3.29+maria~focal

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dcs_admin`
--

DROP TABLE IF EXISTS `dcs_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dcs_admin` (
  `adm_id` int(10) NOT NULL AUTO_INCREMENT,
  `adm_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adm_username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adm_password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adm_status` int(1) DEFAULT 1,
  PRIMARY KEY (`adm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dcs_admin`
--

LOCK TABLES `dcs_admin` WRITE;
/*!40000 ALTER TABLE `dcs_admin` DISABLE KEYS */;
INSERT INTO `dcs_admin` VALUES (1,'adminfluk','weradet','1234',1),(2,'adminpip','suwapat','1234',1);
/*!40000 ALTER TABLE `dcs_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dcs_company`
--

DROP TABLE IF EXISTS `dcs_company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dcs_company` (
  `com_id` int(10) NOT NULL AUTO_INCREMENT,
  `com_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_num_visitor` int(10) DEFAULT 0,
  `com_lat` float DEFAULT NULL,
  `com_lon` float DEFAULT NULL,
  `com_status` int(1) DEFAULT 1,
  `com_description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `com_ent_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`com_id`),
  KEY `com_ent_id` (`com_ent_id`),
  CONSTRAINT `dcs_company_ibfk_1` FOREIGN KEY (`com_ent_id`) REFERENCES `dcs_entrepreneur` (`ent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dcs_company`
--

LOCK TABLES `dcs_company` WRITE;
/*!40000 ALTER TABLE `dcs_company` DISABLE KEYS */;
INSERT INTO `dcs_company` VALUES (1,'เธจเธนเธเธขเนเธญเธเธธเธฃเธฑเธเธฉเนเธชเธดเนเธเนเธงเธ”เธฅเนเธญเธก เธชเธฒเธเธฒ 2',0,0,0,1,'เธฃเธฑเธเธฉเธฒเธชเธดเนเธเนเธงเธ”เธเนเธฒเธขเนเนเธเนเน€เธเนเธฒเธกเธฒเธเธฑเธเธเธฑเธเน€เธฃเธฒ เนเธฅเธฐเธชเธฒเธกเธฒเธฃเธ–เธ•เธดเธ”เธ•เนเธญเนเธ”เนเธ—เธตเน เน€เธเธญเธฃเน 0914143234',2),(2,'เธชเธธเธงเธเธฑเธ’เธเนเธญเธเธธเธฃเธฑเธเธฉเน',0,0,0,4,'เธฃเธฑเธเธฉเธฒเธชเธดเนเธเนเธงเธ”เธเนเธฒเธขเนเนเธเนเน€เธเนเธฒเธกเธฒเธเธฑเธเธเธฑเธเน€เธฃเธฒ',2);
/*!40000 ALTER TABLE `dcs_company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dcs_document`
--

DROP TABLE IF EXISTS `dcs_document`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dcs_document` (
  `doc_path` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doc_ent_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dcs_document`
--

LOCK TABLES `dcs_document` WRITE;
/*!40000 ALTER TABLE `dcs_document` DISABLE KEYS */;
/*!40000 ALTER TABLE `dcs_document` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dcs_entrepreneur`
--

DROP TABLE IF EXISTS `dcs_entrepreneur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dcs_entrepreneur` (
  `ent_id` int(10) NOT NULL AUTO_INCREMENT,
  `ent_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ent_username` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ent_password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ent_birthdate` date DEFAULT NULL,
  `ent_tel` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ent_id_card` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ent_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ent_status` int(1) DEFAULT 1,
  `ent_pre_id` int(1) DEFAULT NULL,
  PRIMARY KEY (`ent_id`),
  KEY `ent_pre_id` (`ent_pre_id`),
  CONSTRAINT `dcs_entrepreneur_ibfk_1` FOREIGN KEY (`ent_pre_id`) REFERENCES `dcs_prefix` (`pre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dcs_entrepreneur`
--

LOCK TABLES `dcs_entrepreneur` WRITE;
/*!40000 ALTER TABLE `dcs_entrepreneur` DISABLE KEYS */;
INSERT INTO `dcs_entrepreneur` VALUES (2,'เธชเธธเธงเธเธฑเธ’เธเน  เน€เธชเธฒเธงเธฃเธช','Entrepreneur2','1234',NULL,'0922563953','777777777777','62160340@go.buu.ac.th',4,1),(3,'เธงเธตเธฃเน€เธ”เธ เธเธเธชเธกเธเธนเธฃเธ“เน',NULL,NULL,NULL,'0852812191','1249900858895','fluk.weradet@gmail.com',4,1),(4,'เธเธฃเธดเธจเธฃเธฒ เธเธนเนเธเธธเธ',NULL,NULL,NULL,'0852812191','1249900858895','fluk.weradet@gmail.com',2,3),(5,'เธเธฑเธเธขเน เธเธฐเธเธฃเธฑเธ',NULL,NULL,NULL,'0852812191','1249900858895','fluk.weradet@gmail.com',1,1),(6,'เธงเธตเธฃเธจเธฑเธเธ”เธดเน เธฅเธดเนเธงเธชเธธเธงเธฃเธฃเธ“',NULL,NULL,NULL,'0852812191','1249900858895','fluk.weradet@gmail.com',3,1),(7,'เธเธฒเนเธ—เธข','เนเธเนเธเนเธเธฑเนเธ',NULL,NULL,'xxxxxxx','1249900858895','fluk.weradet@gmail.com',4,2),(8,'เธเธฒเธเธก เธเธกเธเธกเธเธน',NULL,NULL,'2011-07-18','0852812191','1249900858895','fluk.weradet@gmail.com',3,2);
/*!40000 ALTER TABLE `dcs_entrepreneur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dcs_prefix`
--

DROP TABLE IF EXISTS `dcs_prefix`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dcs_prefix` (
  `pre_id` int(10) NOT NULL AUTO_INCREMENT,
  `pre_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`pre_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dcs_prefix`
--

LOCK TABLES `dcs_prefix` WRITE;
/*!40000 ALTER TABLE `dcs_prefix` DISABLE KEYS */;
INSERT INTO `dcs_prefix` VALUES (1,'เธเธฒเธข'),(2,'เธเธฒเธ'),(3,'เธเธฒเธเธชเธฒเธง');
/*!40000 ALTER TABLE `dcs_prefix` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dcs_tourist`
--

DROP TABLE IF EXISTS `dcs_tourist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dcs_tourist` (
  `tus_id` int(10) NOT NULL AUTO_INCREMENT,
  `tus_firstname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tus_lastname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tus_username` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tus_password` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tus_birthdate` date DEFAULT NULL,
  `tus_tel` int(10) DEFAULT NULL,
  `tus_score` int(10) DEFAULT NULL,
  `tus_email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tus_cur_score` int(10) DEFAULT NULL,
  `tus_status` int(1) DEFAULT 1,
  `tus_pre_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`tus_id`),
  KEY `tus_pre_id` (`tus_pre_id`),
  CONSTRAINT `tus_pre_id` FOREIGN KEY (`tus_pre_id`) REFERENCES `dcs_prefix` (`pre_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dcs_tourist`
--

LOCK TABLES `dcs_tourist` WRITE;
/*!40000 ALTER TABLE `dcs_tourist` DISABLE KEYS */;
/*!40000 ALTER TABLE `dcs_tourist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-02  9:28:40
