-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: api_crud
-- ------------------------------------------------------
-- Server version	8.0.19

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
-- Table structure for table `tb_telefones`
--

DROP TABLE IF EXISTS `tb_telefones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_telefones` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cadastro_id` bigint unsigned NOT NULL,
  `telefone_principal` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `telefone_comercial` bigint DEFAULT NULL,
  `telefone_celular` bigint DEFAULT NULL,
  `telefone_residencial` bigint DEFAULT NULL,
  `telefone_recado1` bigint DEFAULT NULL,
  `telefone_recado2` bigint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tb_telefones_cadastro_id_foreign` (`cadastro_id`),
  CONSTRAINT `tb_telefones_cadastro_id_foreign` FOREIGN KEY (`cadastro_id`) REFERENCES `tb_cadastro` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_telefones`
--

LOCK TABLES `tb_telefones` WRITE;
/*!40000 ALTER TABLE `tb_telefones` DISABLE KEYS */;
INSERT INTO `tb_telefones` VALUES (1,1,11940869414,'2020-02-25 22:10:27','2020-02-26 19:58:45',11940869411,NULL,NULL,NULL,NULL),(3,8,11940869414,'2020-02-26 20:48:06','2020-02-26 20:48:06',11940869411,NULL,NULL,NULL,NULL),(4,16,11940869414,'2020-02-26 23:46:05','2020-02-26 23:46:05',NULL,NULL,NULL,NULL,NULL),(5,17,11940869414,'2020-02-27 00:19:07','2020-02-27 00:19:07',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tb_telefones` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-26 19:31:03
