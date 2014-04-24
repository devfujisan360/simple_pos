-- MySQL dump 10.13  Distrib 5.5.35, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: simple_pos
-- ------------------------------------------------------
-- Server version	5.5.35-0ubuntu0.12.04.2

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
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `value` decimal(11,2) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `remove` tinyint(1) NOT NULL DEFAULT '0',
  `category` varchar(255) DEFAULT NULL,
  `area_category` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'','',0.00,'2014-03-06 17:24:10','2014-04-16 09:26:49',0,'','kitchen'),(2,'Test','',0.00,'2014-04-16 07:39:10','2014-04-16 07:52:13',1,'',''),(3,'asdfasdf','ljasldkfj',1000.00,'2014-04-16 07:46:15','2014-04-16 07:46:18',0,'lkjlskjdflj','');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `pos_table_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (2,3,1,4,1,1,'2014-03-10 18:02:38','2014-03-10 18:02:38'),(3,4,1,4,1,1,'2014-03-11 17:18:59','2014-03-11 17:18:59'),(4,5,1,3,1,1,'2014-03-11 17:19:35','2014-03-11 17:19:35'),(5,6,1,3,1,1,'2014-03-12 14:37:05','2014-03-12 14:37:05'),(8,9,1,1,1,3,'2014-04-16 08:04:54','2014-04-16 08:05:02');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pos_table`
--

DROP TABLE IF EXISTS `pos_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pos_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pos_table_category_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `remove` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_table`
--

LOCK TABLES `pos_table` WRITE;
/*!40000 ALTER TABLE `pos_table` DISABLE KEYS */;
INSERT INTO `pos_table` VALUES (1,'1',1,'2014-03-06 17:23:47','2014-03-06 17:23:47',0),(2,'Gdfcvbb',2,'2014-03-07 14:43:39','2014-03-07 14:46:36',1),(3,'Gcvhg',2,'2014-03-07 14:46:26','2014-03-07 14:46:26',0),(4,'1',3,'2014-03-10 18:02:33','2014-03-10 18:02:33',0);
/*!40000 ALTER TABLE `pos_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pos_table_categories`
--

DROP TABLE IF EXISTS `pos_table_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pos_table_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `remove` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_table_categories`
--

LOCK TABLES `pos_table_categories` WRITE;
/*!40000 ALTER TABLE `pos_table_categories` DISABLE KEYS */;
INSERT INTO `pos_table_categories` VALUES (1,'Bar',0,'2014-03-06 17:23:27','2014-04-16 08:11:47'),(2,'Test',0,'2014-03-07 14:43:28','2014-03-07 14:43:28'),(3,'Bar',0,'2014-03-10 18:02:22','2014-03-10 18:02:22');
/*!40000 ALTER TABLE `pos_table_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receipts`
--

DROP TABLE IF EXISTS `receipts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receipts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paid` tinyint(1) NOT NULL DEFAULT '0',
  `pos_table_category_id` int(11) NOT NULL,
  `pos_table_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` decimal(11,2) NOT NULL DEFAULT '0.00',
  `payment` decimal(11,2) NOT NULL DEFAULT '0.00',
  `change` decimal(11,2) NOT NULL DEFAULT '0.00',
  `remove` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receipts`
--

LOCK TABLES `receipts` WRITE;
/*!40000 ALTER TABLE `receipts` DISABLE KEYS */;
INSERT INTO `receipts` VALUES (1,0,1,1,1,200.00,0.00,0.00,1,'2014-04-16 09:31:37','2014-03-06 17:23:51'),(2,1,2,3,1,150.00,1000.00,850.00,0,'2014-03-11 17:18:54','2014-03-07 14:46:42'),(3,1,3,4,1,50.00,1000.00,950.00,0,'2014-03-11 16:28:57','2014-03-10 18:02:36'),(4,1,3,4,1,50.00,50.00,0.00,0,'2014-03-11 17:19:07','2014-03-11 17:18:58'),(5,1,2,3,1,50.00,100.00,50.00,0,'2014-03-11 18:37:32','2014-03-11 17:19:32'),(6,1,2,3,1,50.00,1000.00,950.00,0,'2014-03-12 14:37:14','2014-03-12 14:37:03'),(7,0,2,3,2,0.00,0.00,0.00,1,'2014-04-16 08:04:16','2014-04-15 10:10:08'),(8,0,1,1,1,0.00,0.00,0.00,0,'2014-04-16 08:04:09','2014-04-16 08:03:38'),(9,1,1,1,1,150.00,100.00,50.00,0,'2014-04-16 08:05:14','2014-04-16 08:04:52'),(10,0,1,1,1,0.00,0.00,0.00,0,'2014-04-16 09:28:09','2014-04-16 09:28:09'),(11,0,1,1,1,0.00,0.00,0.00,0,'2014-04-16 09:28:17','2014-04-16 09:28:17'),(12,0,1,1,1,0.00,0.00,0.00,0,'2014-04-16 09:28:24','2014-04-16 09:28:24');
/*!40000 ALTER TABLE `receipts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `usertype` varchar(255) DEFAULT NULL,
  `remove` tinyint(1) NOT NULL DEFAULT '0',
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin','admin',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'client','client','client',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'employee1','employee1','employee',1,'2014-04-11 16:21:03','2014-04-11 16:15:34'),(4,'test','test','test',1,'2014-04-11 16:20:59','2014-04-11 16:20:51'),(5,'8899','1234asdf','trainee',0,'2014-04-16 08:39:51','2014-04-16 08:39:51');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `work_time`
--

DROP TABLE IF EXISTS `work_time`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `work_time` (
  `username` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `time_on` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `work_time`
--

LOCK TABLES `work_time` WRITE;
/*!40000 ALTER TABLE `work_time` DISABLE KEYS */;
INSERT INTO `work_time` VALUES ('','time_in','2014-04-16 09:09:24','2014-04-16 09:09:24','2014-04-16 09:09:24'),('8899','time_in','2014-04-16 09:13:38','2014-04-16 09:13:38','2014-04-16 09:13:38'),('8899','break_in','2014-04-16 09:17:27','2014-04-16 09:17:27','2014-04-16 09:17:27');
/*!40000 ALTER TABLE `work_time` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-04-16  9:33:51
