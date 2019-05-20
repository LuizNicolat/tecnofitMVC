-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: tecnofitluizmvc
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Table structure for table `indice_pedidos`
--

DROP TABLE IF EXISTS `indice_pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `indice_pedidos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `indice_pedidos`
--

LOCK TABLES `indice_pedidos` WRITE;
/*!40000 ALTER TABLE `indice_pedidos` DISABLE KEYS */;
INSERT INTO `indice_pedidos` VALUES (7,'2019-05-16 04:25:10','2019-05-16 04:25:10'),(8,'2019-05-16 04:27:41','2019-05-16 04:27:41'),(9,'2019-05-16 04:33:53','2019-05-16 04:33:53'),(10,'2019-05-16 04:34:56','2019-05-16 04:34:56'),(11,'2019-05-16 04:35:15','2019-05-16 04:35:15'),(12,'2019-05-16 04:36:28','2019-05-16 04:36:28'),(13,'2019-05-16 04:46:08','2019-05-16 04:46:08'),(14,'2019-05-16 04:46:26','2019-05-16 04:46:26'),(15,'2019-05-16 05:00:35','2019-05-16 05:00:35'),(16,'2019-05-16 05:01:13','2019-05-16 05:01:13'),(17,'2019-05-16 05:01:15','2019-05-16 05:01:15'),(18,'2019-05-16 05:02:48','2019-05-16 05:02:48'),(19,'2019-05-16 05:04:15','2019-05-16 05:04:15'),(20,'2019-05-16 05:05:16','2019-05-16 05:05:16'),(21,'2019-05-16 05:06:54','2019-05-16 05:06:54'),(22,'2019-05-16 05:07:20','2019-05-16 05:07:20'),(23,'2019-05-16 05:08:26','2019-05-16 05:08:26'),(24,'2019-05-16 05:49:05','2019-05-16 05:49:05'),(25,'2019-05-16 05:51:21','2019-05-16 05:51:21');
/*!40000 ALTER TABLE `indice_pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2019_05_15_222919_create_produtos_table',1),(2,'2019_05_15_222935_create_pedidos_table',1),(3,'2019_05_16_005654_create_indice_pedidos_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedidos` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Total_produto` decimal(6,2) NOT NULL,
  `Data` date NOT NULL,
  `Produto` bigint(20) unsigned NOT NULL,
  `indicePedido` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `pedidos_produto_foreign` (`Produto`),
  KEY `asd_idx` (`indicePedido`),
  CONSTRAINT `asd` FOREIGN KEY (`indicePedido`) REFERENCES `indice_pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `pedidos_produto_foreign` FOREIGN KEY (`Produto`) REFERENCES `produtos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (1,250.00,'2019-05-16',2,17,'2019-05-16 05:01:18','2019-05-16 05:01:18'),(2,250.00,'2019-05-16',2,17,'2019-05-16 05:02:43','2019-05-16 05:02:43'),(3,200.45,'2019-05-16',3,18,'2019-05-16 05:02:50','2019-05-16 05:02:50'),(4,200.45,'2019-05-16',3,18,'2019-05-16 05:04:10','2019-05-16 05:04:10'),(5,250.00,'2019-05-16',2,19,'2019-05-16 05:04:18','2019-05-16 05:04:18'),(6,123.00,'2019-05-16',1,19,'2019-05-16 05:04:44','2019-05-16 05:04:44'),(7,250.00,'2019-05-16',2,22,'2019-05-16 05:07:23','2019-05-16 05:07:23'),(8,250.00,'2019-05-16',2,23,'2019-05-16 05:08:28','2019-05-16 05:08:28'),(12,250.00,'2019-05-16',2,23,'2019-05-16 05:10:25','2019-05-16 05:10:25'),(15,250.00,'2019-05-16',2,23,'2019-05-16 05:10:56','2019-05-16 05:10:56'),(16,250.00,'2019-05-16',2,23,'2019-05-16 05:12:09','2019-05-16 05:12:09'),(17,250.00,'2019-05-16',2,23,'2019-05-16 05:12:29','2019-05-16 05:12:29'),(18,250.00,'2019-05-16',2,23,'2019-05-16 05:13:08','2019-05-16 05:13:08'),(19,250.00,'2019-05-16',2,23,'2019-05-16 05:14:09','2019-05-16 05:14:09'),(20,250.00,'2019-05-16',2,23,'2019-05-16 05:16:00','2019-05-16 05:16:00'),(21,250.00,'2019-05-16',2,23,'2019-05-16 05:18:11','2019-05-16 05:18:11'),(22,250.00,'2019-05-16',2,23,'2019-05-16 05:18:26','2019-05-16 05:18:26'),(23,250.00,'2019-05-16',2,23,'2019-05-16 05:18:39','2019-05-16 05:18:39'),(24,250.00,'2019-05-16',2,23,'2019-05-16 05:22:06','2019-05-16 05:22:06'),(25,250.00,'2019-05-16',2,23,'2019-05-16 05:22:31','2019-05-16 05:22:31'),(26,250.00,'2019-05-16',2,23,'2019-05-16 05:22:50','2019-05-16 05:22:50'),(27,250.00,'2019-05-16',2,23,'2019-05-16 05:24:04','2019-05-16 05:24:04'),(28,250.00,'2019-05-16',2,23,'2019-05-16 05:26:52','2019-05-16 05:26:52'),(29,250.00,'2019-05-16',2,23,'2019-05-16 05:27:00','2019-05-16 05:27:00'),(30,123.00,'2019-05-16',1,23,'2019-05-16 05:27:26','2019-05-16 05:27:26'),(31,123.00,'2019-05-16',1,23,'2019-05-16 05:29:47','2019-05-16 05:29:47'),(32,123.00,'2019-05-16',1,23,'2019-05-16 05:30:11','2019-05-16 05:30:11'),(33,200.45,'2019-05-16',3,23,'2019-05-16 05:30:45','2019-05-16 05:30:45'),(34,200.45,'2019-05-16',3,23,'2019-05-16 05:31:23','2019-05-16 05:31:23'),(35,200.45,'2019-05-16',3,23,'2019-05-16 05:34:56','2019-05-16 05:34:56'),(37,200.45,'2019-05-16',3,23,'2019-05-16 05:36:10','2019-05-16 05:36:10'),(38,250.00,'2019-05-16',2,25,'2019-05-16 05:51:25','2019-05-16 05:51:25'),(40,123.00,'2019-05-16',1,25,'2019-05-16 05:52:15','2019-05-16 05:52:15'),(41,123.00,'2019-05-16',1,25,'2019-05-16 05:52:51','2019-05-16 05:52:51'),(42,123.00,'2019-05-16',1,25,'2019-05-16 05:53:22','2019-05-16 05:53:22'),(43,123.00,'2019-05-16',1,25,'2019-05-16 05:53:25','2019-05-16 05:53:25');
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produtos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `SKU` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Descricao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` decimal(6,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (1,'123456','Josefo','teste de produto',123.00,'2019-05-16 03:07:20','2019-05-16 03:07:20'),(2,'25555','7897','teste de produto',250.00,'2019-05-16 03:10:40','2019-05-16 03:48:28'),(3,'1234','Prod novo 88','123.56',200.45,'2019-05-16 03:11:40','2019-05-16 03:47:57');
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-16  0:12:07
