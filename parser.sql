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
INSERT INTO `aauth_user_to_group` VALUES (1,1),(1,3),(2,3),(3,3),(4,3),(5,3);
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
INSERT INTO `aauth_users` VALUES (5,'admin@admin.com','2b5a7142e2014cb591dda3b37af411bfa6d2ac4adc24adacd997a864ee57b6c3','admin',0,'2015-05-24 20:09:29','2015-05-24 20:09:29','2015-05-24 20:00:00',NULL,NULL,NULL,NULL,'127.0.0.1',NULL,NULL,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
INSERT INTO `cars` VALUES (1,'Verna','Hyundai',2014,0,'22000 km','Manual',NULL,NULL,1501,NULL,NULL,NULL,NULL,NULL,NULL,'4 door',NULL,NULL,NULL,'https://e0415552026373f497aa-79445249ccb41a60f7b99c8ef6df8604.ssl.cf3.rackcdn.com/7/2015/6/10/cc774fe32be73a20ad646e495a97e0fe7a9b6d5f/thumb.jpeg','https://egypt.dubizzle.com/en/cars/hyundai/listing/7-listings-f3d8c90352e35074b281b1c5a2909a14/show/?back=L2VuL2NhcnMvc2VhcmNoLz9pc19zZWFyY2g9RmFsc2UmcGFnZT0xJnBhZ2VzPTA=','https://egypt.dubizzle.com',NULL,'٠١١٥٤٠٠٢٨١٠','كامله فابريقه بره وجوه <br />مودل ٢٠١٤','10 June 2015','used'),(2,'Sienna','Fiat',1987,0,'16000 km','Manual',NULL,NULL,1501,NULL,NULL,NULL,NULL,NULL,NULL,'4 door',NULL,NULL,NULL,'https://e0415552026373f497aa-79445249ccb41a60f7b99c8ef6df8604.ssl.cf3.rackcdn.com/7/2015/6/10/e6b8440cac10f6c4f82b7afae1e70381e3ad38bf/thumb.jpeg','https://egypt.dubizzle.com/en/cars/fiat/listing/7-listings-15d585b2e7e15cab8a262cfacbba2bc7/show/?back=L2VuL2NhcnMvc2VhcmNoLz9pc19zZWFyY2g9RmFsc2UmcGFnZT0xJnBhZ2VzPTA=','https://egypt.dubizzle.com',NULL,'01206657112','فيات كروما ( موديل 87 ) ( 1600 سي سي ) بحاله جيده','10 June 2015','used'),(3,'Matrix','Hyundai',2010,0,'52000 km','Automatic',NULL,NULL,1501,NULL,NULL,NULL,NULL,NULL,NULL,'4 door',NULL,NULL,NULL,'https://e0415552026373f497aa-79445249ccb41a60f7b99c8ef6df8604.ssl.cf3.rackcdn.com/7/2015/6/10/1cd060343bb94610e4c5299c04b4e98d1f4a26cb/thumb.jpeg','https://egypt.dubizzle.com/en/cars/hyundai/listing/7-listings-ba4412cced705954b51ff78fbecd83bb/show/?back=L2VuL2NhcnMvc2VhcmNoLz9pc19zZWFyY2g9RmFsc2UmcGFnZT0xJnBhZ2VzPTA=','https://egypt.dubizzle.com',NULL,'01061134400','السيارة ممتازة جدا زيرو بالكامل ممتازة جدا فبريكة بالكامل 52 الف كيلو كاملة اتومتيك البيع لظروف خاصة','10 June 2015','used'),(4,'GLK','Mercedes-Benz',2015,0,'750 km','Automatic',NULL,NULL,1901,NULL,NULL,NULL,NULL,NULL,NULL,'4 door',NULL,NULL,NULL,'https://e0415552026373f497aa-79445249ccb41a60f7b99c8ef6df8604.ssl.cf3.rackcdn.com/7/2015/6/10/a7ea9db22443aac4069b75a8fd3cac2e10e540db/thumb.jpeg','https://egypt.dubizzle.com/en/cars/mercedes-benz/listing/7-listings-bd1412dea38e58d6ba1c6112723f4935/show/?back=L2VuL2NhcnMvc2VhcmNoLz9pc19zZWFyY2g9RmFsc2UmcGFnZT0xJnBhZ2VzPTA=','https://egypt.dubizzle.com',NULL,'01222823459','السيارة بجواب المرور ولم ترخص','10 June 2015','used'),(5,'Other','Chevrolet',2007,0,'220000 km','Manual',NULL,NULL,2701,NULL,NULL,NULL,NULL,NULL,NULL,'2 door',NULL,NULL,NULL,'https://e0415552026373f497aa-79445249ccb41a60f7b99c8ef6df8604.ssl.cf3.rackcdn.com/7/2015/6/10/3c8276e98f1fc541c653e99facf53f6481db65ea/thumb.jpeg','https://egypt.dubizzle.com/en/cars/chevrolet/listing/7-listings-9d407b45116d52b1be5368553df0fb0b/show/?back=L2VuL2NhcnMvc2VhcmNoLz9pc19zZWFyY2g9RmFsc2UmcGFnZT0xJnBhZ2VzPTA=','https://egypt.dubizzle.com',NULL,'01224935119','شيفورليه دبابه نص نقل سعه محرك 2800 cc موديل 2007 ماشيه 200000km','10 June 2015','used'),(6,'Soul','Kia',2012,0,'49000 km','Steptronic',NULL,NULL,1501,NULL,NULL,NULL,NULL,NULL,NULL,'4 door',NULL,NULL,NULL,'https://e0415552026373f497aa-79445249ccb41a60f7b99c8ef6df8604.ssl.cf3.rackcdn.com/7/2015/6/10/30b5b9faa7addba2483efdd51033e6ec5dadbde4/thumb.jpeg','https://egypt.dubizzle.com/en/cars/kia/listing/7-listings-65000ad10e165fbe835ebc274e50d770/show/?back=L2VuL2NhcnMvc2VhcmNoLz9pc19zZWFyY2g9RmFsc2UmcGFnZT0xJnBhZ2VzPTA=','https://egypt.dubizzle.com',NULL,'01000516660','كيا سول 2012 فابريكة بالكامل داخلى وخارجى بدون اى دهانات -كاملة اتوماتيك اعلى فئة لون احمر - فتحة سقف - ايرباج - ABS - EBD - تحكم طارة - بلوتوث موبيل - كاسيت سى دى AUX - USB - t- فوج لايت - فامية مثبوت على الرخصة - فرش لونيين وطابلوة لونيين ( احمر * اسود )- جنوط 18 - اثنين مفتاح ريموت - سنسور بارك - كاميرا خلفية - والمعاينة بالمعادى','10 June 2015','used'),(7,'Lanos 1','Daewoo',1997,0,'140000 km','Manual',NULL,NULL,1401,NULL,NULL,NULL,NULL,NULL,NULL,'4 door',NULL,NULL,NULL,'https://e0415552026373f497aa-79445249ccb41a60f7b99c8ef6df8604.ssl.cf3.rackcdn.com/7/2015/6/10/2824789210f533ed7b38e84bc1d1ec68de0235f8/thumb.jpeg','https://egypt.dubizzle.com/en/cars/daewoo/listing/7-listings-e9c96a719dbd5b828b0384afb6310ce5/show/?back=L2VuL2NhcnMvc2VhcmNoLz9pc19zZWFyY2g9RmFsc2UmcGFnZT0xJnBhZ2VzPTA=','https://egypt.dubizzle.com',NULL,'01069017015','دايو لانوس موديل 97 استيراد معاقين زيرو بره وجوا ما عدا الجانبين','10 June 2015','used'),(8,'3008','Peugeot',2011,0,'64000 km','Automatic',NULL,NULL,1601,NULL,NULL,NULL,NULL,NULL,NULL,'4 door',NULL,NULL,NULL,'https://e0415552026373f497aa-79445249ccb41a60f7b99c8ef6df8604.ssl.cf3.rackcdn.com/7/2015/6/10/6e920952bf5873c5e9e3e52b470a49eb58092f5f/thumb.jpeg','https://egypt.dubizzle.com/en/cars/peugeot/listing/7-listings-26f71b28e13b5f349ee92200afbf6115/show/?back=L2VuL2NhcnMvc2VhcmNoLz9pc19zZWFyY2g9RmFsc2UmcGFnZT0xJnBhZ2VzPTA=','https://egypt.dubizzle.com',NULL,'01222407007 ...01006665222','الحالة فوق الممتاز استعمل بيتى<br />بيجو 3008 بحالة الجديدة فءة تانيه','10 June 2015','used'),(9,'Jetta','Volkswagen',2012,0,'49000 km','Automatic',NULL,NULL,1401,NULL,NULL,NULL,NULL,NULL,NULL,'4 door',NULL,NULL,NULL,'https://e0415552026373f497aa-79445249ccb41a60f7b99c8ef6df8604.ssl.cf3.rackcdn.com/7/2015/6/10/a8316932baa7b3458fdad3ba1b3d070d766d7f2d/thumb.jpeg','https://egypt.dubizzle.com/en/cars/volkswagen/listing/7-listings-8c9a54c32f735197bcc5ba3868d38019/show/?back=L2VuL2NhcnMvc2VhcmNoLz9pc19zZWFyY2g9RmFsc2UmcGFnZT0xJnBhZ2VzPTA=','https://egypt.dubizzle.com',NULL,'01129250623','فابريكا بالكامل الفءة التانية موكا صيانات توكيل رخصة ممتدة باسم الماللك حالة ممتازة مع امكتمية تقسيط النصف من خلاتل كونتاكت كارز','10 June 2015','used'),(10,'Elantra','Hyundai',2012,0,'43 km','Automatic',NULL,NULL,1501,NULL,NULL,NULL,NULL,NULL,NULL,'4 door',NULL,NULL,NULL,'https://e0415552026373f497aa-79445249ccb41a60f7b99c8ef6df8604.ssl.cf3.rackcdn.com/7/2015/6/10/f98240985d2437cd7ccfec3947fdb2b7b8aa2d14/thumb.jpeg','https://egypt.dubizzle.com/en/cars/hyundai/listing/7-listings-89f3a6ba656c55a2b6ac671e28612a9e/show/?back=L2VuL2NhcnMvc2VhcmNoLz9pc19zZWFyY2g9RmFsc2UmcGFnZT0xJnBhZ2VzPTA=','https://egypt.dubizzle.com',NULL,'01227460800','هيونداى النترا - موديل / 2012 - هاى لاين - عداد / 43000كم - كامله فتحه سقف - جنوط سبور - مفتاح بصمه - طاره مالتى فانكشن - cruise contorl - start enging - ايرباج - ABS - EBD - AUX - USB - فوج لايت - سينسور خلفى - فرش جلد -اشارات مرايات - السيارات فابريقه بالكامل بحاله الزيرو لا تحتاج مصاريف نهائياا.','10 June 2015','used');
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
  `fkuser` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fkuser` (`fkuser`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mostview`
--

LOCK TABLES `mostview` WRITE;
/*!40000 ALTER TABLE `mostview` DISABLE KEYS */;
INSERT INTO `mostview` VALUES (1,'Hyundai-Verna-2014',1,'2015-06-11 10:08:02'),(2,'Hyundai-Verna-2014',1,'2015-06-11 10:55:03'),(3,'Hyundai-Matrix-2010',1,'2015-06-11 10:55:06'),(4,'Hyundai-Verna-2014',1,'2015-06-11 10:55:09'),(5,'Kia-Soul-2012',1,'2015-06-11 10:55:12'),(6,'Daewoo-Lanos 1-1997',1,'2015-06-11 10:55:18'),(7,'Volkswagen-Jetta-2012',1,'2015-06-11 10:55:21'),(8,'Daewoo-Lanos 1-1997',1,'2015-06-11 10:55:25'),(9,'Kia-Soul-2012',1,'2015-06-11 10:55:28'),(10,'Volkswagen-Jetta-2012',1,'2015-06-11 10:55:31'),(11,'Hyundai-Verna-2014',1,'2015-06-11 10:55:36');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
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
  `fkuser` int(11) NOT NULL,
  `keyword` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `serdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fkuser` (`fkuser`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `simsearch`
--

LOCK TABLES `simsearch` WRITE;
/*!40000 ALTER TABLE `simsearch` DISABLE KEYS */;
INSERT INTO `simsearch` VALUES (2,1,'cc','2015-06-08 12:08:30'),(3,1,'bb','2015-06-08 12:09:07'),(4,1,'cc','2015-06-08 12:09:23'),(5,1,'cc','2015-06-08 12:09:34'),(6,1,'vv','2015-06-08 12:09:39'),(7,1,'aa','2015-06-08 12:09:44'),(8,1,'bb','2015-06-08 12:09:50'),(9,1,'cc','2015-06-08 12:09:53'),(10,1,'dd','2015-06-08 12:09:58'),(11,1,'ff','2015-06-08 12:16:03'),(12,1,'ereny','2015-06-08 22:00:19'),(13,1,'mero','2015-06-08 22:00:26'),(14,1,'3fret','2015-06-08 22:06:03'),(15,1,'3fret','2015-06-08 22:06:22'),(16,1,'3fret','2015-06-08 22:06:43'),(17,2,'ereny','2015-06-08 22:16:36'),(18,2,'aa','2015-06-08 22:16:43'),(19,2,'bb','2015-06-08 22:16:47'),(20,2,'hh','2015-06-08 22:16:53'),(21,2,'xx','2015-06-08 22:16:57'),(22,2,'vv','2015-06-08 22:17:03'),(23,2,'salah','2015-06-09 08:08:22'),(24,2,'salah','2015-06-09 08:08:37'),(25,2,'salah','2015-06-09 08:08:50'),(26,2,'mariem','2015-06-09 08:54:46'),(27,2,'mariem','2015-06-09 08:55:14'),(28,2,'mariem','2015-06-09 08:55:28'),(29,2,'mahmoud','2015-06-09 13:25:13'),(30,2,'mahmoud','2015-06-09 13:25:34'),(31,2,'mahmoud','2015-06-09 13:25:59'),(32,2,'salah','2015-06-09 13:52:09'),(33,2,'A','2015-06-10 10:23:40'),(34,2,'A','2015-06-10 10:23:56'),(35,2,'A','2015-06-10 10:27:57'),(36,2,'A','2015-06-10 10:35:50'),(37,2,'A','2015-06-10 10:40:22'),(38,2,'A','2015-06-10 10:41:55'),(39,2,'A','2015-06-10 10:42:52'),(40,2,'A','2015-06-10 10:49:58'),(41,2,'b','2015-06-10 10:50:45'),(42,2,'A','2015-06-10 10:52:13'),(43,2,'A','2015-06-10 10:55:48'),(44,2,'b','2015-06-10 10:56:09'),(45,2,'f','2015-06-10 11:23:39'),(46,2,'A','2015-06-10 11:23:46'),(47,2,'A','2015-06-11 09:51:09'),(48,2,'A','2015-06-11 09:52:37'),(49,2,'A','2015-06-11 09:56:01');
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

-- Dump completed on 2015-06-11 16:53:33
