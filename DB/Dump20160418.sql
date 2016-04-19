-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: KSupport
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

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
-- Table structure for table `Agente`
--

DROP TABLE IF EXISTS `Agente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Agente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `anexo` varchar(45) DEFAULT NULL,
  `Avatar` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Tabla de agentes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Agente`
--

LOCK TABLES `Agente` WRITE;
/*!40000 ALTER TABLE `Agente` DISABLE KEYS */;
INSERT INTO `Agente` VALUES (1,'Daniel Palma','dpalma@k-group.cl','6534','monito'),(2,'Elizabeth García','egarcia@k-group.cl','6534','monito'),(3,'Alicia Encalada','aencalada@k-group.cl','6534','monito'),(4,'Dennis Kangme','dkangme@k-group.cl','6534','monito');
/*!40000 ALTER TABLE `Agente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Bitacora`
--

DROP TABLE IF EXISTS `Bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Bitacora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` datetime NOT NULL,
  `evento` varchar(1024) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Bitacora_ticket1_idx` (`ticket_id`),
  CONSTRAINT `fk_Bitacora_ticket1` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Bitacora de requerimientos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Bitacora`
--

LOCK TABLES `Bitacora` WRITE;
/*!40000 ALTER TABLE `Bitacora` DISABLE KEYS */;
/*!40000 ALTER TABLE `Bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Requerimiento`
--

DROP TABLE IF EXISTS `Requerimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Requerimiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario_id` int(11) NOT NULL,
  `timestamp_apertura` datetime NOT NULL,
  `timestamp_cierre` datetime DEFAULT NULL,
  `estado` varchar(24) NOT NULL,
  `descripcion` varchar(1024) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Requerimiento_Usuario_idx` (`Usuario_id`),
  CONSTRAINT `fk_Requerimiento_Usuario` FOREIGN KEY (`Usuario_id`) REFERENCES `Usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Tabla de requerimientos\n';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Requerimiento`
--

LOCK TABLES `Requerimiento` WRITE;
/*!40000 ALTER TABLE `Requerimiento` DISABLE KEYS */;
INSERT INTO `Requerimiento` VALUES (1,2,'2016-04-18 18:55:57',NULL,'NUEVO','<p>Estimado Dennis, junto con saludarte, te informo que hoy desocup&eacute; la oficina que estaba utilizando y me cambi&eacute; a la sala e ventas.</p>\r\n\r\n<p>Para quedar operativo en mi nuevo lugar de trabajo, necesito lo siguiente:</p>\r\n\r\n<ol>\r\n	<li>Cambiar el cable de red, el que est&aacute; disponible es corto (pueden hacerlo el lunes).</li>\r\n	<li>Necesito soporte t&eacute;cnico para instalar en mi notebook la nueva impresora que utilizar&eacute; (esta tarea para el martes d&iacute;a, cuando llegue a trabajar).</li>\r\n</ol>\r\n\r\n<p>En la antigua oficina qued&oacute; impresora HP L&aacute;serjet M4555MFP, serie <strong><span style=\"background-color:#FF0000\">N&deg; mxdcg1917n</span></strong> <u>con toner incluido</u>, para que sea utilizada por la unidad que ser&aacute; trasladada a dicho lugar, por lo tanto requiero me hagas llegar el formulario correspondiente por la recepci&oacute;n oficial de la impresora por tu departamento.<br />\r\n<br />\r\nEncontrar&aacute;s adem&aacute;s un teclado hp y un monitor marca s'),(2,2,'2016-04-18 20:40:30',NULL,'NUEVO','<p>Se deben cambiar las pantallas (5) de la sala de matr&iacute;culas.&nbsp;</p>');
/*!40000 ALTER TABLE `Requerimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tipo`
--

DROP TABLE IF EXISTS `Tipo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(64) NOT NULL,
  `costo` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Tipo de requerimientos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tipo`
--

LOCK TABLES `Tipo` WRITE;
/*!40000 ALTER TABLE `Tipo` DISABLE KEYS */;
INSERT INTO `Tipo` VALUES (1,'RED',0),(2,'TELEFONÍA',0),(3,'APLICACIONES',0),(4,'HARDWARE',0),(5,'IMPRESORAS',0),(6,'DELFOS',0);
/*!40000 ALTER TABLE `Tipo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuario`
--

DROP TABLE IF EXISTS `Usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_completo` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `unidad` varchar(45) NOT NULL,
  `anexo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Tabla de Usuarios';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuario`
--

LOCK TABLES `Usuario` WRITE;
/*!40000 ALTER TABLE `Usuario` DISABLE KEYS */;
INSERT INTO `Usuario` VALUES (2,'Gonzalo Vargas','gonzalo.vargas@uarcis.cl','Matrículas','6642');
/*!40000 ALTER TABLE `Usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(1024) NOT NULL,
  `apertura` datetime DEFAULT NULL,
  `cierre` datetime DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `Agente_id` int(11) NOT NULL,
  `Requerimiento_id` int(11) NOT NULL,
  `Tipo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ticket_Agente1_idx` (`Agente_id`),
  KEY `fk_ticket_Requerimiento1_idx` (`Requerimiento_id`),
  KEY `fk_ticket_Tipo1_idx` (`Tipo_id`),
  CONSTRAINT `fk_ticket_Agente1` FOREIGN KEY (`Agente_id`) REFERENCES `Agente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_Requerimiento1` FOREIGN KEY (`Requerimiento_id`) REFERENCES `Requerimiento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_ticket_Tipo1` FOREIGN KEY (`Tipo_id`) REFERENCES `Tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='Tabla de tickets\n';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ticket`
--

LOCK TABLES `ticket` WRITE;
/*!40000 ALTER TABLE `ticket` DISABLE KEYS */;
INSERT INTO `ticket` VALUES (2,'<p>Cambiar el cable de red, el que est&aacute; disponible es corto.</p>','2016-04-18 20:19:06',NULL,'ASIGNADO',1,1,1),(3,'<p>Necesito soporte t&eacute;cnico para instalar en mi notebook la nueva impresora que utilizar&eacute; (esta tarea para el martes d&iacute;a, cuando llegue a trabajar).</p>','2016-04-18 20:20:42',NULL,'ASIGNADO',1,1,3),(4,'<p>En la antigua oficina qued&oacute; impresora HP L&aacute;serjet M4555MFP, serie&nbsp;<strong>N&deg; mxdcg1917n</strong>&nbsp;<u>con toner incluido</u>, para que sea utilizada por la unidad que ser&aacute; trasladada a dicho lugar, por lo tanto requiero me hagas llegar el formulario correspondiente por la recepci&oacute;n oficial de la impresora por tu departamento.</p>','2016-04-18 20:21:38',NULL,'ASIGNADO',2,1,4),(5,'<p>Encontrar&aacute;s adem&aacute;s un teclado hp y un monitor marca s</p>','2016-04-18 20:22:06',NULL,'ASIGNADO',1,1,4),(6,'<p>Cambiar teclado</p>','2016-04-18 20:38:42',NULL,'ASIGNADO',3,1,4),(7,'<p>Reemplazo de pantallas CRT de la sala de matr&iacute;culas por pantallas planas. Se debe mantener registro de los numeros de serie de las pantallas asignadas a trav&eacute;s del formulario de cambio de hardware.</p>\r\n\r\n<p>&nbsp;</p>','2016-04-18 20:41:37',NULL,'ASIGNADO',2,2,4);
/*!40000 ALTER TABLE `ticket` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-18 21:04:09
