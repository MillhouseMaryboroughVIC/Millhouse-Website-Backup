CREATE DATABASE  IF NOT EXISTS `millhouse_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `millhouse_db`;
-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: millhouse_db
-- ------------------------------------------------------
-- Server version	8.0.43

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `adverts`
--

DROP TABLE IF EXISTS `adverts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `adverts` (
  `shortkey` int NOT NULL AUTO_INCREMENT,
  `business_name` varchar(128) NOT NULL,
  `contact_name` varchar(45) DEFAULT NULL,
  `email_address` varchar(45) DEFAULT NULL,
  `phone_number` varchar(45) DEFAULT NULL,
  `website` varchar(128) NOT NULL,
  `logo_image` mediumtext NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `clicks` int unsigned NOT NULL DEFAULT '0',
  `amount_paid` int(10) unsigned zerofill NOT NULL,
  PRIMARY KEY (`shortkey`),
  UNIQUE KEY `shortkey_UNIQUE` (`shortkey`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adverts`
--

LOCK TABLES `adverts` WRITE;
/*!40000 ALTER TABLE `adverts` DISABLE KEYS */;
INSERT INTO `adverts` VALUES (1,'Neighborhood Houses Victoria','Kass McDonald','info@nhvic.org.au','(03) 9602 1228','https://www.nhvic.org.au/','NHHV.png','2050-05-29',0,0000000000),(2,'Victorian State Government - Department of Families, Fairness & Housing','','feedback@dffh.vic.gov.au','1300 360 462','https://www.dffh.vic.gov.au/','VicStateGov.jpg','2050-05-29',2,0000000000),(3,'Central Goldfields Shire Council','Terence Jaensch','Terence.Jaensch@cgoldshire.vic.gov.au',' 0477 621 577','https://www.centralgoldfields.vic.gov.au/','CentralGoldfields.png','2050-05-29',0,0000000000),(4,'Foundation for Rural & Regional Renewal','Jill Karena','j.karena@frrr.org.au','(03) 5430 2399','https://frrr.org.au/','FRRR.png','2050-05-29',0,0000000000),(7,'Bendigo Bank - Community Bank Avoca, Maryborough and St Arnaud','Julie Driscoll','secretary@avocacoop.com.au','0411234800','https://communitybankavocamaryborough.smartygrants.com.au/','BendigoBank.jpg','2050-05-29',0,0000000000),(9,'Food Bank',NULL,'info@foodbankvictoria.org.au','03 9362 8300','https://www.foodbank.org.au/vic/','FoodBank.png','2050-05-29',0,0000000000),(10,'Food Share',NULL,'info@bendigofoodshare.org.au','03 5444 3409','https://bendigofoodshare.org.au/','FoodShare.png','2050-05-29',0,0000000000),(11,'Aldi Food Rescue',NULL,NULL,'13 25 34','https://help-aldi.my.site.com/s/topic/0TO2y0000008sJgGAI/food-rescue?language=en_AU','Aldi.png','2050-05-29',0,0000000000),(12,'Parkview Bakery','Pam Johnson and Mason Tranter','orders.pvb@outlook.com','0494 661 053','https://www.facebook.com/parkviewbakery/photos','ParkviewBakery.jpg','2050-05-29',0,0000000000),(13,'Maryborough Flooring','Cameron and Leah Retallick','maryboroughfloorcoverings@outlook.com.au','(03) 5461 3099','https://www.facebook.com/p/Maryborough-Floor-Coverings-61587302613405/','MaryboroughFloorCoverings.jpg','2050-05-29',0,0000000000),(14,'Silver Service','Barry Pannam','barry@sshospitality.com.au','(03) 9369 9634 / 0428 815 474','http://sshospitality.com.au','SilverService.png','2050-05-29',0,0000000000),(15,'Goldfeields Blinds & Screens','Simon Koopmans','info@goldfieldsblinds.com.au','0419 894 257','http://www.goldfieldsblinds.com.au/','GoldfieldsScreens.png','2050-05-29',0,0000000000);
/*!40000 ALTER TABLE `adverts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `adverts_view`
--

DROP TABLE IF EXISTS `adverts_view`;
/*!50001 DROP VIEW IF EXISTS `adverts_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `adverts_view` AS SELECT 
 1 AS `shortkey`,
 1 AS `business_name`,
 1 AS `contact_name`,
 1 AS `email_address`,
 1 AS `phone_number`,
 1 AS `website`,
 1 AS `logo_image`,
 1 AS `expiry_date`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `donations`
--

DROP TABLE IF EXISTS `donations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `donations` (
  `shortkey` int unsigned NOT NULL AUTO_INCREMENT,
  `surname` varchar(64) DEFAULT NULL,
  `given_names` varchar(64) DEFAULT NULL,
  `amount` float unsigned NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(64) DEFAULT NULL,
  `phone` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`shortkey`),
  UNIQUE KEY `shortkey_UNIQUE` (`shortkey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `donations`
--

LOCK TABLES `donations` WRITE;
/*!40000 ALTER TABLE `donations` DISABLE KEYS */;
/*!40000 ALTER TABLE `donations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `donations_view`
--

DROP TABLE IF EXISTS `donations_view`;
/*!50001 DROP VIEW IF EXISTS `donations_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `donations_view` AS SELECT 
 1 AS `shortkey`,
 1 AS `surname`,
 1 AS `given_names`,
 1 AS `amount`,
 1 AS `date`,
 1 AS `email`,
 1 AS `phone`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `shortkey` int unsigned NOT NULL AUTO_INCREMENT,
  `group_shortkey` int unsigned NOT NULL,
  `description` varchar(8192) NOT NULL,
  `photo` varchar(64) DEFAULT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`shortkey`),
  UNIQUE KEY `shortkey_UNIQUE` (`shortkey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `events_view`
--

DROP TABLE IF EXISTS `events_view`;
/*!50001 DROP VIEW IF EXISTS `events_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `events_view` AS SELECT 
 1 AS `shortkey`,
 1 AS `group_shortkey`,
 1 AS `description`,
 1 AS `photo`,
 1 AS `date`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `groups` (
  `shortkey` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL,
  `email` varchar(45) DEFAULT '',
  `phone` varchar(45) DEFAULT NULL,
  `description` varchar(45) NOT NULL,
  `dow1` int DEFAULT '-1',
  `dow2` int DEFAULT '-1',
  `wom` int DEFAULT '0',
  `time1` datetime DEFAULT NULL,
  `time2` datetime DEFAULT NULL,
  `duration` decimal(4,2) DEFAULT NULL,
  `cost` decimal(5,2) DEFAULT '0.00',
  `donation` tinyint(3) unsigned zerofill NOT NULL,
  `display` tinyint NOT NULL DEFAULT '1',
  `purpose` varchar(420) NOT NULL,
  `facebook` varchar(256) DEFAULT NULL,
  `exclude_school_holidays` tinyint NOT NULL DEFAULT '0',
  `exclude_xmas_new_year` tinyint NOT NULL DEFAULT '1',
  `exclude_easter` tinyint NOT NULL DEFAULT '1',
  PRIMARY KEY (`shortkey`),
  UNIQUE KEY `shortkey_UNIQUE` (`shortkey`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'art4soul','password','Will Johns','','','Art for the Soul',3,5,0,'0000-01-01 10:00:00','0000-01-01 13:00:00',2.00,0.00,000,1,'The purpose is to provide a therapeutic outlet to process emotions, alleviate stress, unlock creativity, and foster growth beyond surface-level experiences.','https://www.instagram.com/willjohns26/',0,1,1),(4,'deadly','password','Tonya Fedel &  Kymberley Williams','mdhs@mdhs.vic.gov.au','54610333','Deadly Catch-up',1,-1,3,'0000-01-01 10:00:00',NULL,2.00,0.00,000,1,'',NULL,0,1,1),(5,'dungeons_dragons','password','Tristan & Charlotte','manager@millhouse.org.au','54613185','Dungeons & Dragons',2,-1,0,'0000-01-01 13:00:00',NULL,2.00,0.00,000,1,'This a casual group is for anyone that enjoys playing table top games, including dungeons & dragons.',NULL,0,1,1),(7,'playgroup','password','Sarah Mclean','sarahmc@djerriwarrh.org','0422629249','Millhouse Playgroup',1,3,0,'0000-01-01 12:15:00','0000-01-01 11:00:00',1.50,0.00,000,0,'',NULL,0,1,1),(8,'parent_pathways','password','Sarah McLean','manager@millhouse.org.au','0422629249','Parent Pathways',1,-1,0,'0000-01-01 09:00:00',NULL,2.00,0.00,000,0,'This group allows parents select appropriate Service Australia support programs, with the help of a mentor.',NULL,0,1,1),(9,'u3a_writers','password','Deb Sealey','deb.sealey@hotmail.com','0491105356','U3A Writers',5,-1,1,'0000-01-01 10:00:00',NULL,2.00,0.00,000,1,'',NULL,0,1,1),(10,'u3a_photobooks','password','Deb Sealey','deb.sealey@hotmail.com','0491105356','U3A Digital Photobooks',2,-1,0,'0000-01-01 10:00:00',NULL,2.00,0.00,000,1,'',NULL,0,1,1),(11,'mental_health','password','Fred Smith','vmhpeers@outlook.comvmhpeers@outlook.com','0466577522','Peer Collective Mental Health',3,-1,0,'0000-01-01 14:00:00',NULL,2.00,0.00,000,0,'','',0,1,1),(12,'u3a_books','password','Deb Sealey','deb.sealey@hotmail.com','0491105356','U3A Book Club',2,-1,2,'0000-01-01 10:00:00',NULL,2.00,0.00,000,1,'','',0,1,1),(14,'stamps','password','Grey Loyer','','0354605008','Stamp Club',2,-1,2,'0000-01-01 20:00:00',NULL,2.00,0.00,000,1,'This group is for anyone with a passion for collecting coins and stamps. We can assist you with valuation of your collection. You can buy, sell & swap. We hold auctions and an annual fair.','',0,1,1),(15,'scrappers','password','Fred Smith','fred.smith@gmail.com','0455123456','Millhouse Scrappers',2,-1,0,'0000-01-01 10:00:00',NULL,2.00,0.00,001,1,'','',0,1,1),(16,'cafe','password','Sarah','manager@millhouse.org.au','54613185','Millhouse Cafe',2,-1,0,'0000-01-01 11:00:00',NULL,2.00,5.00,000,0,'','',0,1,1),(17,'feast','password','Sarah','manager@millhouse.org.au','54613185','Friday Feast',5,-1,0,'0000-01-01 12:00:00',NULL,2.00,5.00,001,0,'','',0,1,1),(19,'u3a_adult','password','Deb Sealey','deb.sealey@hotmail.com','0491105356','U3A Adult Learning',2,-1,4,'0000-01-01 11:00:00',NULL,1.50,0.00,000,1,'','',0,1,1),(20,'market','password','Sarah','manager@millhouse.org.au','54613185','Millhouse Market',4,-1,0,'0000-01-01 09:30:00',NULL,2.00,5.00,001,0,'For a small donation attendees can take home a basket full of grocery items.','',0,1,1),(21,'food_friends','password','Sarah McLean','manager@millhouse.org.au','54613185','Food with Friends',4,-1,0,'0000-01-01 10:00:00',NULL,2.00,10.00,000,0,'Cooking lessons for disabled kids.','',0,1,1),(22,'labour_party','password','Secretary','secretary@maryboroughlabor.com','','Australian Labour Party',4,-1,4,'0000-01-01 19:00:00',NULL,2.00,0.00,000,0,'','',0,1,1),(23,'theatre','password','Fred Smith','maryborough.theatre.company@gmail.com','','Maryborough Theatre Company',0,-1,0,'0000-01-01 13:00:00',NULL,2.00,0.00,000,0,'Maryborough Theatre Company provides a total theatre experience for all children and adults.','https://www.facebook.com/MaryboroughTheatreCompany/directory_intro',0,1,1),(24,'admin','password','Sarah McLean','manager@millhouse.org.au','0422629249','Administrator',-1,-1,-1,NULL,NULL,0.00,0.00,000,0,'Just to store the admin password.','',0,1,1),(25,'yarn','password','Sarah McLean, Rhonda or Ruth','XXXX@gmail,com','0000000000','Yarn Craft',5,-1,0,'0000-01-01 13:00:00',NULL,2.00,0.00,000,1,'XXXXXXX','',1,1,1),(27,'gamers','password','XXXX','XXXX@gmail.com','0000000000','Youth Activity Hub',3,-1,0,'0000-01-01 15:30:00',NULL,2.00,0.00,000,1,'XXXXXX','',0,1,1),(28,'axis_employment','password','Joel','reception@caei.com.au','1800 811 622','Axis Emplyment',2,4,0,'0000-01-01 09:00:00','0000-01-01 09:00:00',7.00,0.00,000,0,'At CAEI, we believe employment is more than a job - it is a pathway to independence, connection, and wellbeing.','https://www.facebook.com/axisemployment.caei/',0,1,1),(29,'are-able','password','Dianne','samhallam@areable.org.au','1800 566 066','are-able Employment',-1,-1,0,'0000-01-01 09:00:00','0000-01-01 09:00:00',7.00,0.00,000,0,'Do you have an illness, injury or disability? We’ll work with you, at your own pace, to help find a job you love.','https://www.facebook.com/areable.community',0,1,1),(30,'connecting_futures','password','Wayne Kelly','wayne@connectingfutures.com.au','0408493060','Conncting Futures',3,-1,0,'0000-01-01 10:00:00',NULL,6.00,0.00,000,0,'We work with NDIS participants via the School Leavers Employment Support service in to help them prepare for and find work opportunities. Our services are focused on a holistic approach, meaning we help build soft skills, technical skills and work with other professionals involved in supporting you towards your goals.','https://www.facebook.com/ConnectingFuturesLM/',0,1,1),(31,'apm','password','Wayne','apm4jobs@apm.net.au','1800 276 276','APM Employment Services',3,5,0,'0000-01-01 09:00:00',NULL,7.00,0.00,000,0,'Our purpose is enabling better lives. Our mission is to help people become more independent, feel like they belong, and get involved in their communities. With a team of over 16,000 caring professionals, we’re dedicated to this cause.','https://www.facebook.com/APMAustralia/',0,1,1),(32,'massage','password','Neil','maryboroughmf@outlook.com','0436287447','Remedial Massage (by appointment)',-1,-1,-1,'0000-01-01 09:00:00',NULL,10.00,0.00,000,0,'Hi, I’m Neil, I am a Remedial & Sports massage therapist working in Maryborough, Vic. I help people who may have had a long-term or chronic injury, brought on by overtraining in their fitness journey or the possibility of poor ergonomics in a work situation. I tend to use sports massage techniques combined with MFR (myofascial release) and deep tissue to help overcome those tight muscles which may cause dysfunction. ','https://www.facebook.com/maryboroughrsm/',0,1,1),(33,'canasta','password','Jen Fisher','','54613185','Canasta',5,-1,0,'0000-01-01 13:00:00',NULL,3.00,0.00,000,1,'For anyone who wants to enjoy a social game of canasta.',NULL,0,1,1),(34,'peer_collective','passowrd','Jen','','54613185','Peer Collective Support Group',3,-1,0,'0000-01-01 13:00:00',NULL,4.00,0.00,000,1,'A friendly group meeting for a cuppa, a chat and mutual support. All welcome.',NULL,0,1,1);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `groups_view`
--

DROP TABLE IF EXISTS `groups_view`;
/*!50001 DROP VIEW IF EXISTS `groups_view`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `groups_view` AS SELECT 
 1 AS `shortkey`,
 1 AS `name`,
 1 AS `password`,
 1 AS `contact`,
 1 AS `email`,
 1 AS `phone`,
 1 AS `description`,
 1 AS `dow1`,
 1 AS `dow2`,
 1 AS `wom`,
 1 AS `time1`,
 1 AS `time2`,
 1 AS `duration`,
 1 AS `cost`,
 1 AS `donation`,
 1 AS `display`,
 1 AS `purpose`,
 1 AS `facebook`,
 1 AS `exclude_school_holidays`,
 1 AS `exclude_xmas_new_year`,
 1 AS `exclude_easter`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `page_hits`
--

DROP TABLE IF EXISTS `page_hits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `page_hits` (
  `shortkey` int unsigned NOT NULL AUTO_INCREMENT,
  `page` varchar(32) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_agent` varchar(160) NOT NULL,
  `visitor_ip_address` varchar(16) NOT NULL,
  PRIMARY KEY (`shortkey`),
  UNIQUE KEY `shortkey_UNIQUE` (`shortkey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_hits`
--

LOCK TABLES `page_hits` WRITE;
/*!40000 ALTER TABLE `page_hits` DISABLE KEYS */;
/*!40000 ALTER TABLE `page_hits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `adverts_view`
--

/*!50001 DROP VIEW IF EXISTS `adverts_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `adverts_view` AS select `adverts`.`shortkey` AS `shortkey`,`adverts`.`business_name` AS `business_name`,`adverts`.`contact_name` AS `contact_name`,`adverts`.`email_address` AS `email_address`,`adverts`.`phone_number` AS `phone_number`,`adverts`.`website` AS `website`,`adverts`.`logo_image` AS `logo_image`,`adverts`.`expiry_date` AS `expiry_date` from `adverts` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `donations_view`
--

/*!50001 DROP VIEW IF EXISTS `donations_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `donations_view` AS select `donations`.`shortkey` AS `shortkey`,`donations`.`surname` AS `surname`,`donations`.`given_names` AS `given_names`,`donations`.`amount` AS `amount`,`donations`.`date` AS `date`,`donations`.`email` AS `email`,`donations`.`phone` AS `phone` from `donations` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `events_view`
--

/*!50001 DROP VIEW IF EXISTS `events_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `events_view` AS select `events`.`shortkey` AS `shortkey`,`events`.`group_shortkey` AS `group_shortkey`,`events`.`description` AS `description`,`events`.`photo` AS `photo`,`events`.`date` AS `date` from `events` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `groups_view`
--

/*!50001 DROP VIEW IF EXISTS `groups_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `groups_view` AS select `groups`.`shortkey` AS `shortkey`,`groups`.`name` AS `name`,`groups`.`password` AS `password`,`groups`.`contact` AS `contact`,`groups`.`email` AS `email`,`groups`.`phone` AS `phone`,`groups`.`description` AS `description`,`groups`.`dow1` AS `dow1`,`groups`.`dow2` AS `dow2`,`groups`.`wom` AS `wom`,`groups`.`time1` AS `time1`,`groups`.`time2` AS `time2`,`groups`.`duration` AS `duration`,`groups`.`cost` AS `cost`,`groups`.`donation` AS `donation`,`groups`.`display` AS `display`,`groups`.`purpose` AS `purpose`,`groups`.`facebook` AS `facebook`,`groups`.`exclude_school_holidays` AS `exclude_school_holidays`,`groups`.`exclude_xmas_new_year` AS `exclude_xmas_new_year`,`groups`.`exclude_easter` AS `exclude_easter` from `groups` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-07-15 16:08:39
