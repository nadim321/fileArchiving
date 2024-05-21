-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: file_archiving
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `deleted` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Cloud system',0),(2,'Android',0),(3,' Artificial intelligence',0),(4,'Neural network',0),(5,'IOT',0);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `student` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1,'rr rr','rr@gmail.coom','021545451','rrr',0);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher`
--

DROP TABLE IF EXISTS `teacher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teacher` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher`
--

LOCK TABLES `teacher` WRITE;
/*!40000 ALTER TABLE `teacher` DISABLE KEYS */;
INSERT INTO `teacher` VALUES (1,'Piash1111','aaa@gmail.com','2133122312312','Professor','c',0),(2,'Abc','wew@gmail.com','0554521454','Professor','b',0),(4,'Raa Raa','raa@gmail.com','2155545','Prof','a',0),(5,'Teacher 1','teacher1@gmail.com','018270902222','Professorsdfsd','raa',0);
/*!40000 ALTER TABLE `teacher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher_student_mapping`
--

DROP TABLE IF EXISTS `teacher_student_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teacher_student_mapping` (
  `id` int NOT NULL AUTO_INCREMENT,
  `student_id` int NOT NULL,
  `teacher_id` int NOT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher_student_mapping`
--

LOCK TABLES `teacher_student_mapping` WRITE;
/*!40000 ALTER TABLE `teacher_student_mapping` DISABLE KEYS */;
INSERT INTO `teacher_student_mapping` VALUES (1,1,2,0);
/*!40000 ALTER TABLE `teacher_student_mapping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thesis`
--

DROP TABLE IF EXISTS `thesis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `thesis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(1024) NOT NULL,
  `abstract` varchar(5000) NOT NULL,
  `file_path` varchar(5000) NOT NULL,
  `teacher_id` int NOT NULL,
  `status` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  `category_id` int DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `summary` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thesis`
--

LOCK TABLES `thesis` WRITE;
/*!40000 ALTER TABLE `thesis` DISABLE KEYS */;
INSERT INTO `thesis` VALUES (1,'Catelent-Template','sd','thesis_doc/1711301480.pdf',1,1,'nadim',0,1,NULL,NULL),(3,'afds','sdaa','thesis_doc/1711301697.pdf',1,1,'nadim',1,2,NULL,NULL),(4,'werewr','werw','thesis_doc/1711301769.pdf',1,1,'naddim',0,4,NULL,NULL),(5,'development-analytical-services-Template_New','Testtttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt','thesis_doc/1711378677.pdf',2,1,'nadim',1,3,NULL,NULL),(6,'Catelent_template_update','As with Bootstrap 3, DataTables can also be integrated seamlessly with Bootstrap 4. This integration is done simply by including the DataTables Bootstrap 4 files (CSS and JS) which sets the defaults needed for DataTables to be initialised as normal, as shown in this example.','thesis_doc/1711378704.pdf',2,1,'nadim',0,1,NULL,NULL),(7,'Heart disease Management System','Heart disease describes a range of conditions that affect the heart. Heart diseases include: Blood vessel disease, such as coronary artery disease. Irregular heartbeats (arrhythmias) Heart problems you&#39;re born with (congenital heart defects)','thesis_doc/1711379021.pdf',2,1,'nadim',0,1,NULL,NULL),(8,'Papaya leaf diseases','Brown spot is a serious foliar disease found in most papaya producing countries. Symptoms of brown spot include light brown circular spots on leaves (Figure 1), ...','thesis_doc/1711379274.pdf',2,1,'naddim',1,1,NULL,NULL),(9,'How to embed PDF viewer in HTML','Unfortunately, it is not possible to completely prevent a user from downloading a PDF file that is embedded in an HTML page. Even if you disable the right-click context menu, a user can still access the PDF file through the browser&#39;s developer tools or by inspecting the page source.\r\n\r\nHowever, you can make it more difficult for a user to download the PDF file by u','thesis_doc/1711385718.pdf',2,1,'nadim',0,2,NULL,NULL),(10,'rr','rr','thesis_doc/1713893967.jpg',2,1,'super_admin',0,3,NULL,NULL),(11,'A system for managing cardiovascular disease','wefferwe4534','thesis_doc/1713936350.png',0,1,'super_admin',0,4,NULL,NULL),(12,'A platform designed to oversee the management of heart conditions.','wefferwe4534','thesis_doc/1713936390.png',0,1,'super_admin',0,2,NULL,NULL),(13,'Usdufssfs','fdgertererw','thesis_doc/1714368748.PNG',5,1,'nadim',0,2,NULL,NULL),(14,'RRRRRR','RRRRRRR ','thesis_doc/1716205849.json',5,1,'nadim',0,1,'2024-05-24',NULL),(15,'reterte','435rtert   ','thesis_doc/1716266786.pdf',5,1,'nadim',0,4,NULL,'werwewr  sdfdff sdf  rfwerd ewrwre erwer');
/*!40000 ALTER TABLE `thesis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(512) NOT NULL,
  `role` varchar(32) NOT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'sad','sad','nahidul.haque.31@gmail.com','4545554','nadim','$2y$10$PuhQOAGm2l4dt31WaQndJe16/K7LyM1GxMyM4sHS7BEjFGsJZ/eAq','profile_pic/1575647224.webp','student',0),(3,'super','admin','super@gmail.com','01827090222','super_admin','$2y$10$ZpKdHZPUVHSJFk9zJFTppOefzEOb.DpagL4pMHSsjKNbSqFaVcj1K','profile_pic/1713803054.png','admin',0),(4,'Raa','Raa','raa@gmail.com','0215002115','raa','$2y$10$MU9ZGRg5P/aGottqYvFEOeZJBz.8UwnNWvgb1m1SG79IDTM8qe8uO','profile_pic/1714367556.PNG','teacher',0),(5,'rr','rr','rr@gmail.coom','021545451','rrr','$2y$10$szCLF/TjeoDKlPMBGWZLSOGSt7UohKONEU5Lzu.KIs4XslSI9Gmee','profile_pic/1715705930.jpg','student',0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-21 10:58:43
