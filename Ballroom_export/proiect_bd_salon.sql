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
-- Table structure for table `salon`
--

DROP TABLE IF EXISTS `salon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `salon` (
  `IDSalon` int NOT NULL AUTO_INCREMENT,
  `Nume_Salon` varchar(45) COLLATE utf8mb3_unicode_ci NOT NULL,
  `Descriere` varchar(500) COLLATE utf8mb3_unicode_ci NOT NULL,
  `Nr_locuri` int NOT NULL,
  `Cost_inchiriere` int NOT NULL,
  PRIMARY KEY (`IDSalon`),
  UNIQUE KEY `Nume_Salon_UNIQUE` (`Nume_Salon`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salon`
--

LOCK TABLES `salon` WRITE;
/*!40000 ALTER TABLE `salon` DISABLE KEYS */;
INSERT INTO `salon` VALUES (1,'Elysee','Elysee este spatiul generos si elegant, cu detalii subtile care vor pune in valoare tema evenimentului.',300,2400),(2,'Charme','Charme este special conceput pentru a celebra amestecul de fantezie si inedit care dau viata unui eveniment fabulos.',100,1000),(3,'Garden','Sarbatoreste cele mai frumoase clipe in lumina difuza a lunii sau bucura-te de razele soarelui in aceasta gradina.',300,2700),(4,'Sofia','Salonul Sofia este un taram cu personalitate in care iti doresti sa existi, sa visezi si sa celebrezi.',170,1300),(5,'Victoria','Salonul Victoria este locul in care clipele si emotiile capata mai mult sens.',250,1500),(6,'North','Formata dintr-un conac si o sala de evenimente situata intr-o gradina impresionanta, acolo unde natura intalneste orasul.',300,3000),(7,'Royal Hall','Creativitate, servicii ireprosabile si gust desavarsit sunt cuvintele cheie care definesc Royal Hall.',250,1800),(8,'Manhattan','In salonul Manhattan, privirile va vor fi captate de mobilierul ce reuneste un mix de stiluri, printre care se numara cel florentin sau cel baroc.',300,2500);
/*!40000 ALTER TABLE `salon` ENABLE KEYS */;
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
