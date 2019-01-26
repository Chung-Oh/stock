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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorys`
--

LOCK TABLES `categorys` WRITE;
/*!40000 ALTER TABLE `categorys` DISABLE KEYS */;
INSERT INTO `categorys` VALUES (1,'Smartphone',NULL,NULL),(2,'Roupa',NULL,NULL),(3,'Filme',NULL,NULL),(4,'Livro',NULL,NULL),(5,'Tabuleiro',NULL,NULL),(6,'Notebook',NULL,NULL),(7,'Quadrinho',NULL,NULL),(8,'Doce',NULL,NULL),(9,'Vídeo game',NULL,NULL),(10,'Calçado',NULL,NULL);
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
INSERT INTO `products` VALUES (1,'Samsung Galaxy S5','8GB RAM, 32GB INTERNO, QUADCORE, ANDROID 8.1, SD 120GB EXTENSIVEL','350 gramas','Preto',1,NULL,NULL),(2,'Xbox 360','O console Xbox 360 4GB, está pronto com um novo acabamento. Com Wi-fi embutido para fácil conexão com o mundo do entretenimento no Xbox Live','1,3 kg','Preto',9,NULL,NULL),(3,'RumyCub','Jogo de pedras ','850 gramas','Laranja',5,NULL,NULL),(4,'Jaqueta Hugo Boss','Com bordados florais coloridos como detalhe. Jaqueta feminina estilo biker, com zíperes e botões metálicos e forrado','677 gramas','Marrom',2,NULL,NULL),(5,'Senhor dos Anéis - As duas torres','Segundo filme da mais conhecida trilogia de fantasia','100 gramas','Prata',3,NULL,NULL),(6,'Xadrez','Jogo de tabuleiro, estratégia','550 gramas','Branco',5,NULL,NULL),(7,'Adidas Trecsion','Modelo para correr','455 gramas','Laranja e verde',10,NULL,NULL),(8,'Idiota','O mínimo que você precisa saber para não ser um idiota é um livro do Olavo de Carvalho, organizado pelo jornalista Felipe Moura Brasil.','350 gramas','Vermelho',4,NULL,NULL),(9,'Homem-aranha','O Homem-Aranha alter-ego de Peter Parker, é um personagem fictício, um super-herói que aparece nas revistas em quadrinhos americanas publicadas pela Marvel Comics','50 gramas','Vermelho',7,NULL,NULL),(10,'Nike Shox','Feminino Masculino Ft Original Na Caixa','450 gramas','Branco',10,NULL,NULL),(11,'Zenfone 3 Plus','1,5GB RAM, 16GB INTERNO, DUAL CORE','450 gramas','Prata',1,NULL,NULL),(12,'Dell FR377','8GB RAM, 32GB INTERNO, QUADCORE, ANDROID 8.1, SD 120GB EXTENSIVEL','1,450 kg','Dourado',6,NULL,NULL),(13,'iPhone 6','1,5GB RAM, 16GB INTERNO, DUAL CORE','320 gramas','Branco',1,NULL,NULL),(14,'Pudim','Umas das maravilhas de nossa loja, nosso carro forte dos Doces. Pudim de doce de leite','50 gramas','Amarelo',8,NULL,NULL),(15,'Poderoso chefão','Trilogia completa de umas obras de artes do cinema. História de máfias italianas','275 gramas','Verde e cinza',3,NULL,NULL),(16,'Calça Jeans','Designa-se por calças a peça de roupa que cobre as pernas, da linha de cintura até perto do calcanhar.','150 gramas','Azul',2,NULL,NULL),(17,'Samsung NP900X3J-KW1BR','8GB RAM, 1TB HD e processador i7','1 kg','Branco',6,NULL,NULL),(18,'Playstation 4','Console Playstation 4 Sony Slim 1TB 4a G Cuh-2214b','1,3 kg','Preto',9,NULL,NULL);
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

-- Dump completed on 2019-01-26 15:21:18
