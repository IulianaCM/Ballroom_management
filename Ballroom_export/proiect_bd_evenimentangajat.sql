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
-- Table structure for table `evenimentangajat`
--

DROP TABLE IF EXISTS `evenimentangajat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `evenimentangajat` (
  `IDEveniment` int NOT NULL,
  `IDAngajat` int NOT NULL,
  PRIMARY KEY (`IDEveniment`,`IDAngajat`),
  KEY `IDAngajat_idx` (`IDAngajat`) /*!80000 INVISIBLE */,
  CONSTRAINT `IDAngajat` FOREIGN KEY (`IDAngajat`) REFERENCES `angajat` (`IDAngajat`) ON DELETE CASCADE,
  CONSTRAINT `IDEveniment` FOREIGN KEY (`IDEveniment`) REFERENCES `eveniment` (`IDEveniment`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evenimentangajat`
--

LOCK TABLES `evenimentangajat` WRITE;
/*!40000 ALTER TABLE `evenimentangajat` DISABLE KEYS */;
INSERT INTO `evenimentangajat` VALUES (1,1),(1,2),(1,5),(1,7),(1,10),(1,12),(1,13),(1,21),(1,22),(1,34),(1,35),(1,41),(1,44),(1,54),(2,6),(2,16),(2,27),(2,28),(2,29),(2,36),(2,37),(2,38),(2,39),(2,40),(2,47),(2,48),(2,98),(2,105),(3,4),(3,8),(3,11),(3,15),(3,25),(3,26),(3,31),(3,33),(3,45),(3,46),(3,50),(3,52),(3,96),(3,97),(4,17),(4,49),(4,53),(4,56),(4,57),(4,58),(4,59),(4,60),(4,61),(4,62),(4,63),(4,99),(4,100),(4,101),(5,18),(5,64),(5,65),(5,67),(5,68),(5,69),(5,70),(5,71),(5,72),(5,73),(5,74),(5,102),(5,103),(5,104),(6,3),(6,4),(6,9),(6,14),(6,23),(6,24),(6,30),(6,32),(6,42),(6,43),(6,51),(6,55),(6,66),(6,95);
/*!40000 ALTER TABLE `evenimentangajat` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-01-09 10:59:27
