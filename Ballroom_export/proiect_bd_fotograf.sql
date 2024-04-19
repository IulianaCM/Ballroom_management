-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: proiect_bd
-- ------------------------------------------------------
-- Server version	8.2.0

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
-- Table structure for table `fotograf`
--

DROP TABLE IF EXISTS `fotograf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fotograf` (
  `IDFotograf` int NOT NULL AUTO_INCREMENT,
  `Nume` varchar(45) COLLATE utf8mb3_unicode_ci NOT NULL,
  `Nr_Contact` char(10) COLLATE utf8mb3_unicode_ci NOT NULL,
  `Cost_servicii` int NOT NULL,
  PRIMARY KEY (`IDFotograf`),
  UNIQUE KEY `Nume_UNIQUE` (`Nume`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotograf`
--

LOCK TABLES `fotograf` WRITE;
/*!40000 ALTER TABLE `fotograf` DISABLE KEYS */;
INSERT INTO `fotograf` VALUES (1,'Blurr Studio','0728471045',950),(2,'Danatudorfoto','0719471035',1020),(3,'Fortin','0718293581',1900),(4,'Aimee','0718274182',1300),(5,'Famous Click','0781275324',1890),(6,'Cylex','0718256128',2300),(7,'IQads','0713215428',1900),(8,'Connectmedia','0712312345',1260),(9,'Radunicolaefoto','0789235412',1500),(10,'Caseta','0719321646',2150);
/*!40000 ALTER TABLE `fotograf` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-09 10:59:28
