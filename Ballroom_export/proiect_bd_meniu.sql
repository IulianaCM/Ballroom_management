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
-- Table structure for table `meniu`
--

DROP TABLE IF EXISTS `meniu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `meniu` (
  `IDMeniu` int NOT NULL AUTO_INCREMENT,
  `Denumire` varchar(45) COLLATE utf8mb3_unicode_ci NOT NULL,
  `Tip_Eveniment` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Pret` int NOT NULL,
  `Gustare_rece` varchar(500) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT '-',
  `Peste` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '-',
  `Traditional` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '-',
  `Grill` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '-',
  `Tort` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `Candy_bar` char(2) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'Nu',
  `Bauturi` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`IDMeniu`),
  UNIQUE KEY `Denumire_UNIQUE` (`Denumire`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meniu`
--

LOCK TABLES `meniu` WRITE;
/*!40000 ALTER TABLE `meniu` DISABLE KEYS */;
INSERT INTO `meniu` VALUES (1,'Classic','Nunta',1200,'Choux umplut cu salata de pui si ciuperci champignon, Baba ganoush cu rodie si chips de morcov, Ficat de rata invelit in bacon si sos dulce acrisor, Rulada de spanac cu Philadelphia si jambon, Rulada de pui si chorizo, Capresse si pesto din muguri de pin, Blinis cu pastrav, somon fume si citrice, Pralina si branza Esquisa, fistic si nuci coapte','File de salau de Nil in crusta de panko, sos de busuioc si citrice, orez oriental si lamaie','Sarmale de porc in foi de varza, mamaliga, bacon crocant, smantana si ardei iute','Ceafa de porc la cuptor si rulou din piept de pui cu spanac, servite cu cartofi gratinati cu smantana si sos de mustar dijon','Tortul miresei','Nu','Bauturi racoritoare, Bere, Vin, Lichior, Vermut, Vodka, Whisky, Gin, Long drinks, Selectie ceaiuri, Cafea, Spumant  '),(2,'Select','Nunta',1400,'Terrina de branzeturi in crusta de ierburi, Grisina prosciutto, Foie gras cu dulceata de ceapa caramelizata si zmeura, Verrines cu salata de rata si mango, Briosa de somon fume si esquisa, Chat cu vichisoisse si crevete jumbo, Bresaloa capresse, Brie pane si sos de rodie','File de somon Nordic, tagliatelle de legume, sos de homar si citrice','Duo de sarmale in foi de varza si vita de vie, mamaliga, smantana si bacon crocant','Muschiulet de porc, cartofi gratinati cu ciuperci, conopida Romanesco si sos de mustar boabe ','Tortul miresei','Da','Bauturi racoritoare, Vin, Bere, Lichior, Vermut, Vodka, Whisky, Gin, Rom, Tequila, Long drinks, Cafea, Selectie ceaiuri, Spumant '),(3,'Premium','Nunta',1600,'Duo din calamar si crevete torpedo, sos sweet chilli, Ecler cu somon fume si icre de Manciuria, Verrines cu salata de rata si mango, Grisina prosciutto, Pralina din branza Esquisa, strugure si fistic, Bresaola capresse, Tartaleta cu salata de pui si chips de parmesan, Terrina de gouda in crusta de ierburi','File de biban de mare, risotto de hribi, sos de sofran si citrice','Duo din sarmale de porc in foi de vita de vie si varza, mamaliga, smantana si bacon crocant','Antricot de vita din Brazilia, garnitura din morcov, cartof violet si fasole pastai, sos dijonnaise','Tortul miresei','Da','Bauturi racoritoare, Bere, Vin, Lichior, Vermut, Whisky, Rom, Tequila, Vodka, Gin, Long drinks, Cafea, Selectie ceaiuri, Spumant'),(4,'All Inclusive','Botez',1400,'Choux umplut cu salata de pui si ciuperci champignon, Baba ganoush cu rodie si chips de morcov, Ficat de rata invelit in bacon si sos dulce acrisor, Rulada de spanac cu Philadelphia si jambon, Rulada de pui si chorizo, Capresse si pesto din muguri de pin, Blinis cu pastrav, somon fume si citrice, Pralina si branza Esquisa, fistic si nuci coapte  ','File de salau de Nil in crusta de panko, sos de busuioc si citrice, orez oriental si lamaie','Sarmale de porc in foi de varza, mamaliga, bacon crocant, smantana si ardei iute','Ceafa de porc la cuptor si rulou din piept de pui cu spanac, servite cu cartofi gratinat cu smantana si sos de mustar dijon','Tort','Nu','Bauturi racoritoare, Bere, Vin, Lichior, Vermut, Whisky, Rom, Tequila, Vodka, Gin, Long drinks, Cafea, Selectie ceaiuri, Spumant'),(5,'All Inclusive Classic','Botez',1600,'Baba ganoush cu rodie si chips de morcov, Ficat de rata invelit in bacon si sos dulce acrisor, Rulada de spanac cu Philadelphia si jambon, Rulada de pui si chorizo, Capresse si pesto din muguri de pin, Blinis cu pastrav, somon fume si citrice, Brie pane si sos de rodie, Briosa de somon fume si citrice ','File de salau de Nil in crusta de panko, sos de busuioc si citrice, orez oriental si lamaie','Duo de sarmale in foi de varza si vita de vie, mamaliga, smantana si bacon crocant','Ceafa de porc la cuptor si rulou din piept de pui cu spanac, servite cu cartofi gratinati cu broccoli','Tort','Da','Bauturi racoritoare, Bere, Vin, Lichior, Vermut, Vodka, Whisky, Gin, Long drinks, Cafea, Spumant  '),(6,'All Inclusive Select','Botez',1800,'Baba ganoush cu rodie si chips de morcov, Salata de fenicul, Rulada de spanac cu Philadelphia si jambon, Rulada de pui si chorizo, Bresaola capresse, Ecler cu pastrav, somon fume si citrice, Tartaleta cu somon fume si castravete, Pralina din branza Esquisa, strugure si fistic ','File de salau de Nil in crusta de panko, sos de busuioc si citrice, orez oriental si lamaie','Ceafa de porc la gratar, piept de pui umplut, cu spanac si mozzarella, Garnitura de cartofi la cuptor cu rozmarin si ierburi proaspete, Salata de rosii si castraveti, Bufet fructe proaspete','Muschiulet de porc, cartof gratinat cu ciuperci, conopida Romanesco si sos de mustar boabe','Tort','Da','Bauturi racoritoare, Bere, Vin, Lichior, Vermut, Vodka, Whisky, Gin, Long drinks, Cafea, Spumant  '),(7,'All Inclusive Premium','Botez',2000,'Duo din calamar si crevete torpedo, sos sweet chilli, Ecler cu somon fume si icre de Manciuria, Verrines cu salata de rata si mango, Grisina prosciutto, Choux cu salata de pui si ciuperci champinion, Bresaola capresse, Briosa de somon si esquisa, Foie gras cu dulceata de ceapa caramelizata si zmeura ','File de somon Nordic, tagliatelle de legume, sos de homar si citrice','Sarmale de porc in foi de varza, mamaliga, bacon crocant, smantana si ardei iute','Croissant din pulpa de rata confiata, cartofi gratinati cu ciuperci si sos de zmeura','Tort','Da','Bauturi racoritoare, Bere, Vin, Lichior, Vermut, Vodka, Whisky, Gin, Long drinks, Cafea, Spumant  '),(8,'Meniu Bal Absolvire','Bal absolvire',1600,'Tartine cu somon fume si wakame, Chiftelute de pui si peste, Frigaruie de mozzarella si rosie cherry, Salata de vinete, Rulada de spanac cu Philadelphia si chivas, Tabouleh si lipie crocanta, Rulouri cu salata a la rousse, Rulada de pui cu legume, Crakers cu brie si ceapa caramelizata','-','Ceafa de porc la gratar, piept de pui umplut, cu spanac si mozzarella, Garnitura de cartofi la cuptor cu rozmarin si ierburi proaspete, Salata de rosii si castraveti, Bufet fructe proaspete','-','Tort festiv','Nu','Bauturi racoritoare, Bere, Vin, Lichior, Vodka, Whisky, Cafea');
/*!40000 ALTER TABLE `meniu` ENABLE KEYS */;
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
