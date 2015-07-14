-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: perform_afrik
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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
-- Table structure for table `pa_camion`
--

DROP TABLE IF EXISTS `pa_camion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pa_camion` (
  `id_camion` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(45) NOT NULL,
  PRIMARY KEY (`id_camion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pa_camion`
--

LOCK TABLES `pa_camion` WRITE;
/*!40000 ALTER TABLE `pa_camion` DISABLE KEYS */;
/*!40000 ALTER TABLE `pa_camion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pa_dechargement`
--

DROP TABLE IF EXISTS `pa_dechargement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pa_dechargement` (
  `id_dechargement` int(11) NOT NULL AUTO_INCREMENT,
  `id_camion` int(11) NOT NULL,
  `id_ville` int(11) NOT NULL,
  `id_fournisseur` int(11) NOT NULL,
  `date` date NOT NULL,
  `bon_sac` int(11) NOT NULL,
  `sac_dechire` int(11) NOT NULL,
  `poids_brut` int(11) NOT NULL,
  `poids_net` int(11) NOT NULL,
  `poids_refracte` int(11) NOT NULL,
  `humidite` int(11) NOT NULL,
  PRIMARY KEY (`id_dechargement`),
  KEY `id_camion` (`id_camion`,`id_ville`,`id_fournisseur`),
  KEY `id_camion_2` (`id_camion`),
  KEY `id_fournisseur` (`id_fournisseur`),
  KEY `id_ville` (`id_ville`),
  CONSTRAINT `pa_dechargement_ibfk_1` FOREIGN KEY (`id_camion`) REFERENCES `pa_camion` (`id_camion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pa_dechargement_ibfk_2` FOREIGN KEY (`id_fournisseur`) REFERENCES `pa_fournisseur` (`id_fournisseur`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pa_dechargement_ibfk_3` FOREIGN KEY (`id_ville`) REFERENCES `pa_ville` (`id_ville`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pa_dechargement`
--

LOCK TABLES `pa_dechargement` WRITE;
/*!40000 ALTER TABLE `pa_dechargement` DISABLE KEYS */;
/*!40000 ALTER TABLE `pa_dechargement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pa_fournisseur`
--

DROP TABLE IF EXISTS `pa_fournisseur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pa_fournisseur` (
  `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `telephone` varchar(45) DEFAULT NULL,
  `adresse` text,
  PRIMARY KEY (`id_fournisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pa_fournisseur`
--

LOCK TABLES `pa_fournisseur` WRITE;
/*!40000 ALTER TABLE `pa_fournisseur` DISABLE KEYS */;
/*!40000 ALTER TABLE `pa_fournisseur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pa_ville`
--

DROP TABLE IF EXISTS `pa_ville`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pa_ville` (
  `id_ville` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id_ville`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pa_ville`
--

LOCK TABLES `pa_ville` WRITE;
/*!40000 ALTER TABLE `pa_ville` DISABLE KEYS */;
/*!40000 ALTER TABLE `pa_ville` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-02 23:44:46
