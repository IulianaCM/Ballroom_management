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
-- Table structure for table `eveniment`
--

DROP TABLE IF EXISTS `eveniment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eveniment` (
  `IDEveniment` int NOT NULL AUTO_INCREMENT,
  `Tip_Eveniment` varchar(15) COLLATE utf8mb3_unicode_ci NOT NULL,
  `Culoare_predominanta` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Data_eveniment` datetime NOT NULL,
  `IDMeniu` int NOT NULL,
  `IDSalon` int NOT NULL,
  `IDFotograf` int NOT NULL,
  `IDClient` int NOT NULL,
  PRIMARY KEY (`IDEveniment`),
  KEY `IDMeniu_idx` (`IDMeniu`),
  KEY `IDSalon_idx` (`IDSalon`),
  KEY `IDFotograf_idx` (`IDFotograf`),
  KEY `IDClient_idx` (`IDClient`),
  CONSTRAINT `IDClient` FOREIGN KEY (`IDClient`) REFERENCES `client` (`IDClient`) ON DELETE CASCADE,
  CONSTRAINT `IDFotograf` FOREIGN KEY (`IDFotograf`) REFERENCES `fotograf` (`IDFotograf`) ON DELETE RESTRICT,
  CONSTRAINT `IDMeniu` FOREIGN KEY (`IDMeniu`) REFERENCES `meniu` (`IDMeniu`),
  CONSTRAINT `IDSalon` FOREIGN KEY (`IDSalon`) REFERENCES `salon` (`IDSalon`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eveniment`
--

LOCK TABLES `eveniment` WRITE;
/*!40000 ALTER TABLE `eveniment` DISABLE KEYS */;
INSERT INTO `eveniment` VALUES (1,'Nunta','Mov deschis','2024-02-10 16:00:00',3,1,6,6),(2,'Botez','Roz','2024-02-11 18:00:00',6,6,3,5),(3,'Bal absolvire','Grena','2024-02-14 11:00:00',8,2,3,2),(4,'Nunta','Lime','2024-01-20 18:00:00',2,4,7,4),(5,'Nunta','Violet','2024-01-27 17:00:00',1,5,1,1),(6,'Botez','Albastru','2024-02-03 15:00:00',4,3,5,3),(7,'Bal absolvire','Grena','2024-01-26 12:00:00',8,2,5,7),(8,'Botez','Roz','2024-01-20 18:00:00',6,7,10,8);
/*!40000 ALTER TABLE `eveniment` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-09 10:59:29
