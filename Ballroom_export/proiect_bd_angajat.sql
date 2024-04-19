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
-- Table structure for table `angajat`
--

DROP TABLE IF EXISTS `angajat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `angajat` (
  `IDAngajat` int NOT NULL AUTO_INCREMENT,
  `Nume` varchar(45) COLLATE utf8mb3_unicode_ci NOT NULL,
  `Prenume` varchar(45) COLLATE utf8mb3_unicode_ci NOT NULL,
  `Pozitia_ocupata` varchar(45) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`IDAngajat`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `angajat`
--

LOCK TABLES `angajat` WRITE;
/*!40000 ALTER TABLE `angajat` DISABLE KEYS */;
INSERT INTO `angajat` VALUES (1,'Anghel','Leonard','Bucatar'),(2,'Dumitrescu','Florin','Bucatar'),(3,'Ristea','Dorin','Bucatar'),(4,'Florea','Bogdan','Bucatar'),(5,'Alexescu','Lidia','Bucatar'),(6,'Dinca','Valentina','Bucatar'),(7,'Simion','Cosmin','Ospatar'),(8,'Dinca','Simona','Ospatar'),(9,'Gica','Gabriela','Ospatar'),(10,'Soare','Catalin','Ospatar'),(11,'Mihnea','Florina','Ospatar'),(12,'Dobroiu','Raluca','Ospatar'),(13,'Florescu','Elena','Barman'),(14,'Dobre','Cristina','Barman'),(15,'Predescu','Valentin','Barman'),(16,'Hart','Elizabeth','Barman'),(17,'Flores','Valeria','Barman'),(18,'Prince','Valeria','Barman'),(19,'Grecu','Elizabeth','Barman'),(20,'Hart','Harry','Barman'),(21,'Dragu','Michael','Ospatar'),(22,'Antoine','Christopher','Ospatar'),(23,'Bliss','Evan','Ospatar'),(24,'Miro','William','Ospatar'),(25,'Prince','Michael','Ospatar'),(26,'Dragu','Cassidy','Ospatar'),(27,'Grecu','Francesca','Ospatar'),(28,'Antoine','Claudia','Ospatar'),(29,'Grecu','Annabelle','Ospatar'),(30,'Hart','Elizabeth','Ospatar'),(31,'Hart','Christopher','Ospatar'),(32,'Flores','Michael','Ospatar'),(33,'Sandro','Elizabeth','Ospatar'),(34,'Prince','Cassidy','Ospatar'),(35,'Bliss','Harry','Ospatar'),(36,'Dragu','Clara','Ospatar'),(37,'Miro','Emily','Ospatar'),(38,'Grecu','Henry','Ospatar'),(39,'Voinea','Henry','Ospatar'),(40,'Voinea','Claudia','Ospatar'),(41,'Prince','Claudia','Ospatar'),(42,'Prince','Diana','Ospatar'),(43,'Voinea','Emily','Ospatar'),(44,'Prince','Valeria','Ospatar'),(45,'Dragu','Annabelle','Ospatar'),(46,'Grecu','Valeria','Ospatar'),(47,'Sandro','Michael','Ospatar'),(48,'Sandro','Claudia','Ospatar'),(49,'Flores','Claudia','Ospatar'),(50,'Sandro','Emily','Ospatar'),(51,'Miro','Annabelle','Ospatar'),(52,'Prince','Emily','Ospatar'),(53,'Hart','Annabelle','Ospatar'),(54,'Prince','Cassidy','Ospatar'),(55,'Sandro','Michael','Ospatar'),(56,'Grecu','Valeria','Ospatar'),(57,'Prince','Annabelle','Ospatar'),(58,'Miro','Harry','Ospatar'),(59,'Dragu','Clara','Ospatar'),(60,'Grecu','Christopher','Ospatar'),(61,'Flores','Henry','Ospatar'),(62,'Sandro','Claudia','Ospatar'),(63,'Prince','Henry','Ospatar'),(64,'Prince','Michael','Ospatar'),(65,'Bliss','Emily','Ospatar'),(66,'Flores','Michael','Ospatar'),(67,'Hart','Annabelle','Ospatar'),(68,'Prince','Anne','Ospatar'),(69,'Dragu','Harry','Ospatar'),(70,'Antoine','Elizabeth','Ospatar'),(71,'Antoine','William','Ospatar'),(72,'Bliss','Elizabeth','Ospatar'),(73,'Bliss','Henry','Ospatar'),(74,'Antoine','Cassidy','Ospatar'),(75,'Flores','Evan','Ospatar'),(76,'Dragu','Valeria','Ospatar'),(77,'Flores','Kyle','Ospatar'),(78,'Bliss','Evan','Ospatar'),(79,'Grecu','Harry','Ospatar'),(80,'Miro','Harry','Ospatar'),(81,'Sandro','Annabelle','Ospatar'),(82,'Dragu','Kyle','Ospatar'),(83,'Dragu','Emily','Ospatar'),(84,'Prince','Valeria','Ospatar'),(85,'Bliss','Henry','Ospatar'),(86,'Grecu','Harry','Ospatar'),(87,'Voinea','Emily','Ospatar'),(88,'Flores','William','Ospatar'),(89,'Sandro','Clara','Ospatar'),(90,'Sandro','William','Ospatar'),(91,'Dragu','William','Ospatar'),(92,'Voinea','Clara','Ospatar'),(93,'Bliss','Annabelle','Ospatar'),(94,'Grecu','Francesca','Ospatar'),(95,'Bliss','Francesca','Bucatar'),(96,'Dragu','Evan','Bucatar'),(97,'Antoine','Evan','Bucatar'),(98,'Flores','Kyle','Bucatar'),(99,'Grecu','Harry','Bucatar'),(100,'Hart','Eliza','Bucatar'),(101,'Sandro','Eliza','Bucatar'),(102,'Hart','Mihai','Bucatar'),(103,'Bliss','Mihai','Bucatar'),(104,'Bliss','Claudia','Bucatar'),(105,'Grecu','Clara','Bucatar'),(106,'Miro','Valeria','Bucatar'),(107,'Voinea','Elizabeth','Bucatar'),(108,'Flores','Valeria','Bucatar'),(109,'Sandro','Vincent','Bucatar'),(110,'Bliss','Anne','Bucatar'),(111,'Hart','Evan','Bucatar'),(112,'Antoine','Henry','Bucatar'),(113,'Antoine','Clara','Bucatar'),(114,'Voinea','Clara','Bucatar'),(115,'Dragu','Francesca','Bucatar');
/*!40000 ALTER TABLE `angajat` ENABLE KEYS */;
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
