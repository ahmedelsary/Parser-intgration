-- MySQL dump 10.13  Distrib 5.5.43, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: parser
-- ------------------------------------------------------
-- Server version	5.5.43-0ubuntu0.14.04.1

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
-- Table structure for table `aauth_groups`
--

DROP TABLE IF EXISTS `aauth_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aauth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `definition` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aauth_groups`
--

LOCK TABLES `aauth_groups` WRITE;
/*!40000 ALTER TABLE `aauth_groups` DISABLE KEYS */;
INSERT INTO `aauth_groups` VALUES (1,'Admin','Super Admin Group'),(2,'Public','Public Access Group'),(3,'Default','Default Access Group');
/*!40000 ALTER TABLE `aauth_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aauth_perm_to_group`
--

DROP TABLE IF EXISTS `aauth_perm_to_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aauth_perm_to_group` (
  `perm_id` int(11) unsigned NOT NULL DEFAULT '0',
  `group_id` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`perm_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aauth_perm_to_group`
--

LOCK TABLES `aauth_perm_to_group` WRITE;
/*!40000 ALTER TABLE `aauth_perm_to_group` DISABLE KEYS */;
/*!40000 ALTER TABLE `aauth_perm_to_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aauth_perm_to_user`
--

DROP TABLE IF EXISTS `aauth_perm_to_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aauth_perm_to_user` (
  `perm_id` int(11) unsigned NOT NULL DEFAULT '0',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`perm_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aauth_perm_to_user`
--

LOCK TABLES `aauth_perm_to_user` WRITE;
/*!40000 ALTER TABLE `aauth_perm_to_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `aauth_perm_to_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aauth_perms`
--

DROP TABLE IF EXISTS `aauth_perms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aauth_perms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `definition` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aauth_perms`
--

LOCK TABLES `aauth_perms` WRITE;
/*!40000 ALTER TABLE `aauth_perms` DISABLE KEYS */;
/*!40000 ALTER TABLE `aauth_perms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aauth_pms`
--

DROP TABLE IF EXISTS `aauth_pms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aauth_pms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) unsigned NOT NULL,
  `receiver_id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text,
  `date` datetime DEFAULT NULL,
  `read` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `full_index` (`id`,`sender_id`,`receiver_id`,`read`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aauth_pms`
--

LOCK TABLES `aauth_pms` WRITE;
/*!40000 ALTER TABLE `aauth_pms` DISABLE KEYS */;
/*!40000 ALTER TABLE `aauth_pms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aauth_system_variables`
--

DROP TABLE IF EXISTS `aauth_system_variables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aauth_system_variables` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(100) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aauth_system_variables`
--

LOCK TABLES `aauth_system_variables` WRITE;
/*!40000 ALTER TABLE `aauth_system_variables` DISABLE KEYS */;
/*!40000 ALTER TABLE `aauth_system_variables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aauth_user_to_group`
--

DROP TABLE IF EXISTS `aauth_user_to_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aauth_user_to_group` (
  `user_id` int(11) unsigned NOT NULL DEFAULT '0',
  `group_id` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aauth_user_to_group`
--

LOCK TABLES `aauth_user_to_group` WRITE;
/*!40000 ALTER TABLE `aauth_user_to_group` DISABLE KEYS */;
INSERT INTO `aauth_user_to_group` VALUES (1,1),(1,3),(2,3),(3,3),(4,3),(5,1);
/*!40000 ALTER TABLE `aauth_user_to_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aauth_user_variables`
--

DROP TABLE IF EXISTS `aauth_user_variables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aauth_user_variables` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `key` varchar(100) NOT NULL,
  `value` text,
  PRIMARY KEY (`id`),
  KEY `user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aauth_user_variables`
--

LOCK TABLES `aauth_user_variables` WRITE;
/*!40000 ALTER TABLE `aauth_user_variables` DISABLE KEYS */;
/*!40000 ALTER TABLE `aauth_user_variables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aauth_users`
--

DROP TABLE IF EXISTS `aauth_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aauth_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `pass` varchar(64) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `banned` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `last_login_attempt` datetime DEFAULT NULL,
  `forgot_exp` text,
  `remember_time` datetime DEFAULT NULL,
  `remember_exp` text,
  `verification_code` text,
  `ip_address` text,
  `login_attempts` int(11) DEFAULT '0',
  `birth_date` date DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aauth_users`
--

LOCK TABLES `aauth_users` WRITE;
/*!40000 ALTER TABLE `aauth_users` DISABLE KEYS */;
INSERT INTO `aauth_users` VALUES (5,'admin@admin.com','2b5a7142e2014cb591dda3b37af411bfa6d2ac4adc24adacd997a864ee57b6c3','admin',0,'2015-06-13 12:06:25','2015-06-13 12:06:25','2015-06-13 12:00:00',NULL,NULL,NULL,NULL,'127.0.0.1',NULL,NULL,NULL);
/*!40000 ALTER TABLE `aauth_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) DEFAULT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branches`
--

LOCK TABLES `branches` WRITE;
/*!40000 ALTER TABLE `branches` DISABLE KEYS */;
/*!40000 ALTER TABLE `branches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cars` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `model` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `producer` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` int(100) DEFAULT NULL,
  `price` int(100) DEFAULT NULL,
  `km` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gearbox` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ac` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `power` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ecapacity` int(100) DEFAULT NULL,
  `glass` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `centerlock` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alarm` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `floor` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emirror` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bags` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `doorn` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `abs` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `speed` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gps` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `carlink` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ref` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `owner` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `googleplus` varchar(255) DEFAULT NULL,
  `dribble` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `icon_path` text,
  `sort` int(10) unsigned DEFAULT '0',
  `parent_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_items`
--

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `body` varchar(1000) DEFAULT NULL,
  `subject` varchar(150) DEFAULT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ticket_id` (`ticket_id`),
  CONSTRAINT `message_ibfk_1` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mostview`
--

DROP TABLE IF EXISTS `mostview`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mostview` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `car` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fkuser` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fkuser` (`fkuser`),
  KEY `fkuser_2` (`fkuser`),
  CONSTRAINT `mostview_ibfk_1` FOREIGN KEY (`fkuser`) REFERENCES `aauth_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mostview`
--

LOCK TABLES `mostview` WRITE;
/*!40000 ALTER TABLE `mostview` DISABLE KEYS */;
INSERT INTO `mostview` VALUES (1,'Hyundai-Verna-2014','2015-06-11 10:08:02',NULL),(2,'Hyundai-Verna-2014','2015-06-11 10:55:03',NULL),(3,'Hyundai-Matrix-2010','2015-06-11 10:55:06',NULL),(4,'Hyundai-Verna-2014','2015-06-11 10:55:09',NULL),(5,'Kia-Soul-2012','2015-06-11 10:55:12',NULL),(6,'Daewoo-Lanos 1-1997','2015-06-11 10:55:18',NULL),(7,'Volkswagen-Jetta-2012','2015-06-11 10:55:21',NULL),(8,'Daewoo-Lanos 1-1997','2015-06-11 10:55:25',NULL),(9,'Kia-Soul-2012','2015-06-11 10:55:28',NULL),(10,'Volkswagen-Jetta-2012','2015-06-11 10:55:31',NULL),(11,'Hyundai-Verna-2014','2015-06-11 10:55:36',NULL);
/*!40000 ALTER TABLE `mostview` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (1,'2003-03-16 00:00:00','mycar','cheep car',NULL),(2,'2015-05-13 00:00:00','the second car','the second car',NULL),(3,'0000-00-00 00:00:00','super car','super car',NULL),(4,'0000-00-00 00:00:00','jjj','description',NULL);
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `simsearch`
--

DROP TABLE IF EXISTS `simsearch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `simsearch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `serdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fkuser` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fkuser` (`fkuser`),
  CONSTRAINT `simsearch_ibfk_1` FOREIGN KEY (`fkuser`) REFERENCES `aauth_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `simsearch`
--

LOCK TABLES `simsearch` WRITE;
/*!40000 ALTER TABLE `simsearch` DISABLE KEYS */;
/*!40000 ALTER TABLE `simsearch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket`
--

LOCK TABLES `ticket` WRITE;
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_events`
--

DROP TABLE IF EXISTS `u_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_events` (
  `usr_id` int(10) unsigned NOT NULL DEFAULT '0',
  `event_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`usr_id`,`event_id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `u_events_ibfk_1` FOREIGN KEY (`usr_id`) REFERENCES `aauth_users` (`id`),
  CONSTRAINT `u_events_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_events`
--

LOCK TABLES `u_events` WRITE;
/*!40000 ALTER TABLE `u_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `u_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `u_msg`
--

DROP TABLE IF EXISTS `u_msg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `u_msg` (
  `usr_id` int(10) unsigned NOT NULL DEFAULT '0',
  `msg_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`usr_id`,`msg_id`),
  KEY `msg_id` (`msg_id`),
  CONSTRAINT `u_msg_ibfk_1` FOREIGN KEY (`usr_id`) REFERENCES `aauth_users` (`id`),
  CONSTRAINT `u_msg_ibfk_2` FOREIGN KEY (`msg_id`) REFERENCES `message` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `u_msg`
--

LOCK TABLES `u_msg` WRITE;
/*!40000 ALTER TABLE `u_msg` DISABLE KEYS */;
/*!40000 ALTER TABLE `u_msg` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-13 16:33:24
