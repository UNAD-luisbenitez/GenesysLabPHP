-- MySQL dump 10.16  Distrib 10.1.10-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: bd_genesyslab
-- ------------------------------------------------------
-- Server version	10.1.10-MariaDB

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
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargos` (
  `IdCargo` tinyint(1) unsigned NOT NULL,
  `NameCargo` varchar(100) NOT NULL,
  `DescripcionCargo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`IdCargo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` VALUES (0,'Ninguno','No pertenece a la empresa'),(1,'Gerente','Gerente principal de la sede'),(2,'Ingeniero Lider','Lidera equipos de trabajo e investigacion'),(3,'Secretariado','Colabora en tareas administrativas'),(4,'Ingeniero','Hace parte de equipos de trabajo');
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dependencias`
--

DROP TABLE IF EXISTS `dependencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dependencias` (
  `IdDependencia` tinyint(1) unsigned NOT NULL,
  `NameDependencia` varchar(120) NOT NULL,
  `DescripcionDependencia` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`IdDependencia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dependencias`
--

LOCK TABLES `dependencias` WRITE;
/*!40000 ALTER TABLE `dependencias` DISABLE KEYS */;
INSERT INTO `dependencias` VALUES (0,'Ninguno','Sin asignar'),(1,'Gerencia','Tareas administrativas'),(2,'Contaduria','finanzas de la empresa'),(3,'Investigacion Y Desarrollo','Se crean y perfeccionan productos'),(5,'PHP locos','locos por PHP');
/*!40000 ALTER TABLE `dependencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `historiales`
--

DROP TABLE IF EXISTS `historiales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historiales` (
  `SerialHistorial` bigint(1) unsigned NOT NULL AUTO_INCREMENT,
  `HoraIngreso` datetime(1) NOT NULL,
  `HoraSalida` datetime(1) DEFAULT NULL,
  `Personas_IdPersonas` bigint(1) unsigned NOT NULL,
  PRIMARY KEY (`SerialHistorial`),
  KEY `Personas_IdPersonas` (`Personas_IdPersonas`),
  CONSTRAINT `historiales_ibfk_1` FOREIGN KEY (`Personas_IdPersonas`) REFERENCES `personas` (`IdPersonas`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historiales`
--

LOCK TABLES `historiales` WRITE;
/*!40000 ALTER TABLE `historiales` DISABLE KEYS */;
INSERT INTO `historiales` VALUES (1,'2016-05-06 05:29:20.0','2016-05-06 05:29:24.0',34721325),(2,'2016-05-06 05:29:34.0','2016-05-06 05:29:39.0',114685749),(3,'2016-05-06 05:29:51.0','2016-05-06 05:29:53.0',18352247),(4,'2016-05-06 05:30:02.0','2016-05-06 05:30:04.0',5555555),(5,'2016-05-07 05:32:09.0','2016-05-07 05:32:17.0',987452368),(6,'2016-05-08 01:26:16.0','2016-05-08 01:40:35.0',18352247),(7,'2016-05-08 01:49:21.0','2016-05-08 01:49:24.0',12345);
/*!40000 ALTER TABLE `historiales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulos`
--

DROP TABLE IF EXISTS `modulos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulos` (
  `IdModulo` tinyint(1) unsigned NOT NULL,
  `NameModulo` varchar(80) NOT NULL,
  PRIMARY KEY (`IdModulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulos`
--

LOCK TABLES `modulos` WRITE;
/*!40000 ALTER TABLE `modulos` DISABLE KEYS */;
INSERT INTO `modulos` VALUES (1,'Personal Administrativo'),(2,'Personal Misional'),(3,'Visitantes');
/*!40000 ALTER TABLE `modulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personas`
--

DROP TABLE IF EXISTS `personas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personas` (
  `IdPersonas` bigint(1) unsigned NOT NULL,
  `NamePersonas` varchar(100) NOT NULL,
  `ApellidoPersonas` varchar(100) DEFAULT NULL,
  `GeneroPersonas` varchar(10) NOT NULL,
  `ProfesionPersonas` varchar(100) DEFAULT NULL,
  `FotoPersonas` longblob,
  `Cargos_IdCargo` tinyint(1) unsigned NOT NULL,
  `Dependencias_IdDependencia` tinyint(1) unsigned NOT NULL,
  `Modulos_IdModulos` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`IdPersonas`),
  KEY `Cargos_IdCargo` (`Cargos_IdCargo`),
  KEY `Dependencias_IdDependencia` (`Dependencias_IdDependencia`),
  KEY `Modulos_IdModulos` (`Modulos_IdModulos`),
  CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`Cargos_IdCargo`) REFERENCES `cargos` (`IdCargo`),
  CONSTRAINT `personas_ibfk_2` FOREIGN KEY (`Dependencias_IdDependencia`) REFERENCES `dependencias` (`IdDependencia`),
  CONSTRAINT `personas_ibfk_3` FOREIGN KEY (`Modulos_IdModulos`) REFERENCES `modulos` (`IdModulo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personas`
--

LOCK TABLES `personas` WRITE;
/*!40000 ALTER TABLE `personas` DISABLE KEYS */;
INSERT INTO `personas` VALUES (12345,'Pepito','fgfgfgfg','femenino','',NULL,0,0,1),(5555555,'Juanito','Clavito','masculino','',NULL,0,0,3),(18352247,'Felipe','Cardenas','masculino','Ingeniero Quimico',NULL,4,3,2),(34721325,'Cristina','Arias','femenino','Magister en Ciencias (Quimica)',NULL,2,3,2),(114685749,'Daniel','Arevalo','masculino','Magister en Economia',NULL,1,1,1),(987452368,'Ana','Sanchez','femenino','Tecnologo En Gestion Empresarial',NULL,3,2,1);
/*!40000 ALTER TABLE `personas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `systemadmins`
--

DROP TABLE IF EXISTS `systemadmins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `systemadmins` (
  `IdAdmin` bigint(1) unsigned NOT NULL,
  `NombreAdmin` varchar(120) NOT NULL,
  `ApellidosAdmin` varchar(120) DEFAULT NULL,
  `PassAdmin` varchar(40) NOT NULL,
  `FotoAdmin` longblob,
  PRIMARY KEY (`IdAdmin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `systemadmins`
--

LOCK TABLES `systemadmins` WRITE;
/*!40000 ALTER TABLE `systemadmins` DISABLE KEYS */;
INSERT INTO `systemadmins` VALUES (1234567890,'Luis','Benitez','251f38c26a1f01207dd937775cffdfdab5302610',NULL);
/*!40000 ALTER TABLE `systemadmins` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-08  0:39:44
