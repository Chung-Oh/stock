-- MySQL dump 10.16  Distrib 10.3.8-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: stock_tests
-- ------------------------------------------------------
-- Server version	10.3.8-MariaDB

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
-- Current Database: `stock_tests`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `stock_tests` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `stock_tests`;

--
-- Table structure for table `categorys`
--

DROP TABLE IF EXISTS `categorys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorys`
--

LOCK TABLES `categorys` WRITE;
/*!40000 ALTER TABLE `categorys` DISABLE KEYS */;
INSERT INTO `categorys` VALUES (1,'Smartphone','2019-01-26 18:10:23',NULL),(2,'Roupa','2019-01-26 18:10:36',NULL),(3,'Filme','2019-01-26 18:10:51',NULL),(4,'Quadrinho','2019-01-26 18:11:06',NULL),(5,'Livro','2019-01-26 18:11:12',NULL),(6,'Notebook','2019-01-26 18:11:27',NULL),(7,'Calçado','2019-01-26 18:11:38',NULL),(8,'Doce','2019-01-26 18:11:54',NULL),(9,'Tabuleiro','2019-01-26 18:12:01',NULL),(10,'Abajur','2019-01-26 18:12:07',NULL),(11,'Vídeo game','2019-01-26 18:12:34','2019-01-26 18:15:08'),(12,'Eletrônica','2019-01-26 18:26:20',NULL);
/*!40000 ALTER TABLE `categorys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logger`
--

DROP TABLE IF EXISTS `logger`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` timestamp NULL DEFAULT NULL,
  `logout` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `logger_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logger`
--

LOCK TABLES `logger` WRITE;
/*!40000 ALTER TABLE `logger` DISABLE KEYS */;
/*!40000 ALTER TABLE `logger` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `color` varchar(25) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categorys` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Senhor dos Anéis - As duas torres','Segundo filme da mais conhecida trilogia de fantasia','175 gramas','Amarelo',3,'2019-01-26 18:13:05',NULL),(2,'Samsung Galaxy S5','2GB RAM, 32GB INTERNO, OCTACORE, ANDROID 8.1, SD 60GB','350 gramas','Prata',1,'2019-01-26 18:13:25',NULL),(3,'Berserk','Anime de fantasia mais brutal. Obra criada por Keitaro Miura','50 gramas','Cinza',4,'2019-01-26 18:13:53',NULL),(4,'Adidas Trecsion','Modelo para correr','350 gramas','Laranja e verde',7,'2019-01-26 18:14:16',NULL),(5,'Playstation 4','Console Playstation 4 Sony Slim 1TB 4a G Cuh-2214b','1,3 kg','Preto',11,'2019-01-26 18:15:38',NULL),(6,'RumyCub','Jogo de pedras ','850 gramas','Laranja',9,'2019-01-26 18:15:59',NULL),(7,'Zenfone 3 Plus','8GB RAM, 32GB INTERNO, QUADCORE, ANDROID 8.1, SD 120GB EXTENSIVEL','550 gramas','Dourado',1,'2019-01-26 18:16:20',NULL),(8,'Verônica','Modelo 11EJX, com capacidade de 2 lâmpadas, bivolt','550 gramas','Dourado',10,'2019-01-26 18:17:04',NULL),(9,'Xbox 360','Slim 4GB, mesma potência, com 5 entradas USB, conta ainda com disco rígido de 4GB de espaço para armazenar e transportar dados como fases dos jogos, músicas, vídeos, entre muitos outros','1,220 kg','Preto',11,'2019-01-26 18:18:21','2019-01-26 18:33:29'),(10,'Idiota','O mínimo que você precisa saber para não ser um idiota é um livro do Olavo de Carvalho, organizado pelo jornalista Felipe Moura Brasil','275 gramas','Vermelho e cinza',5,'2019-01-26 18:19:32',NULL),(11,'Xadrez','Jogo de tabuleiro, estratégia','850 gramas','Branco e preto',9,'2019-01-26 18:19:54',NULL),(12,'iPhone 6','1,5GB RAM, 16GB INTERNO, DUAL CORE','275 gramas','Branco',1,'2019-01-26 18:20:17',NULL),(13,'Dell FR377','8GB RAM, 1TB HD e processador i7','1,450 kg','Prata e preto',6,'2019-01-26 18:20:41',NULL),(14,'Samsung NP900X3J-KW1BR','8GB RAM, 32GB INTERNO, QUADCORE, ANDROID 8.1, SD 120GB EXTENSIVEL','1 kg','Prata e azul',6,'2019-01-26 18:21:27',NULL),(15,'Homem-aranha','Aventuras espaciais e super horóis','50 gramas','Vermelhor e laranja',4,'2019-01-26 18:22:13',NULL),(16,'Nike Shox','Nike Shox Nz Feminino Masculino Ft Original Na Caixa','550 gramas','Branco',7,'2019-01-26 18:24:14',NULL),(17,'Calça Jeans','Designa-se por calças a peça de roupa que cobre as pernas, da linha de cintura até perto do calcanhar.','175 gramas','Azul',2,'2019-01-26 18:25:03',NULL),(18,'Pudim','Umas das maravilhas de nossa loja, nosso carro forte dos Doces. Pudim de doce de leite','50 gramas','Amarelo',8,'2019-01-26 18:25:27',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'daniel','202cb962ac59075b964b07152d234b70','2019-01-26 16:36:11',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-01-26 16:47:49
