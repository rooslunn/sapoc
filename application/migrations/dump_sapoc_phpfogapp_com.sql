-- MySQL dump 10.13  Distrib 5.1.60, for apple-darwin10.8.0 (i386)
--
-- Host: localhost    Database: sapoc_phpfogapp_com
-- ------------------------------------------------------
-- Server version	5.1.60

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `sapoc_phpfogapp_com`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `sapoc_phpfogapp_com` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `sapoc_phpfogapp_com`;

--
-- Table structure for table `laravel_migrations`
--

DROP TABLE IF EXISTS `laravel_migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laravel_migrations` (
  `bundle` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`bundle`,`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laravel_migrations`
--

LOCK TABLES `laravel_migrations` WRITE;
/*!40000 ALTER TABLE `laravel_migrations` DISABLE KEYS */;
INSERT INTO `laravel_migrations` VALUES ('application','2012_08_22_180633_create_users',1),('application','2012_09_05_083439_create_offers',1),('application','2012_09_06_044935_create_session_table',1),('application','2012_09_11_081152_create_refs',1);
/*!40000 ALTER TABLE `laravel_migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offers`
--

DROP TABLE IF EXISTS `offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `offers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `offer_type` int(11) NOT NULL,
  `from_date` datetime NOT NULL,
  `from_country` varchar(64) NOT NULL,
  `from_state` varchar(64) DEFAULT NULL,
  `from_town` varchar(64) NOT NULL,
  `to_date` datetime NOT NULL,
  `to_country` varchar(64) NOT NULL,
  `to_state` varchar(64) DEFAULT NULL,
  `to_town` varchar(64) NOT NULL,
  `auto_type` int(11) NOT NULL,
  `auto_capacity` float NOT NULL,
  `auto_load_type` int(11) DEFAULT NULL,
  `auto_volume` float DEFAULT NULL,
  `auto_price` float DEFAULT NULL,
  `auto_pay_type` int(11) DEFAULT NULL,
  `auto_count` int(11) DEFAULT NULL,
  `auto_periodicity` varchar(64) DEFAULT NULL,
  `auto_license` varchar(64) DEFAULT NULL,
  `comments` varchar(200) DEFAULT NULL,
  `contact_company` varchar(64) DEFAULT NULL,
  `contact_person` varchar(64) DEFAULT NULL,
  `contact_phone` varchar(64) DEFAULT NULL,
  `contact_phone2` varchar(64) DEFAULT NULL,
  `contact_email` varchar(64) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offers`
--

LOCK TABLES `offers` WRITE;
/*!40000 ALTER TABLE `offers` DISABLE KEYS */;
/*!40000 ALTER TABLE `offers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `refs`
--

DROP TABLE IF EXISTS `refs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `refs` (
  `ref_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ref_type` int(11) NOT NULL,
  `parent_ref_id` int(11) NOT NULL DEFAULT '0',
  `ref_name` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`ref_id`),
  KEY `refs_ref_type_index` (`ref_type`),
  KEY `refs_parent_ref_id_index` (`parent_ref_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `refs`
--

LOCK TABLES `refs` WRITE;
/*!40000 ALTER TABLE `refs` DISABLE KEYS */;
INSERT INTO `refs` VALUES (1,1,0,'any','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,1,0,'tent','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,1,0,'container','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,2,0,'up','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,2,0,'back','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,2,0,'up and back','0000-00-00 00:00:00','0000-00-00 00:00:00'),(7,3,0,'cash','0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,3,0,'wire','0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,3,0,'ach','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `refs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(40) NOT NULL,
  `last_activity` int(11) NOT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `company` varchar(64) DEFAULT NULL,
  `company_id` varchar(32) DEFAULT NULL,
  `country_id` varchar(64) DEFAULT NULL,
  `district_id` varchar(64) DEFAULT NULL,
  `city` varchar(64) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `phone_1` varchar(32) DEFAULT NULL,
  `phone_2` varchar(32) DEFAULT NULL,
  `contact_person` varchar(64) DEFAULT NULL,
  `code` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-09-14 12:53:47
