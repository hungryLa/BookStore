-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: localhost    Database: bookstore
-- ------------------------------------------------------
-- Server version	8.0.25-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `authors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `SName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `FName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (1,'Эрих Мария','Ремарк',NULL,NULL),(2,'Брэдбэри','Рэй',NULL,NULL),(3,'Чехов','Антон',NULL,'2021-07-07 11:24:09'),(4,'Булгаков','Михаил',NULL,NULL),(5,'Киз','Дэниел',NULL,NULL),(13,'sdf','edsa','2021-07-07 11:50:51','2021-07-07 11:50:51'),(14,'sdf','fdsf','2021-07-07 23:14:33','2021-07-07 23:14:33');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_genre`
--

DROP TABLE IF EXISTS `book_genre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book_genre` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `book_id` int NOT NULL,
  `genre_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_genre`
--

LOCK TABLES `book_genre` WRITE;
/*!40000 ALTER TABLE `book_genre` DISABLE KEYS */;
INSERT INTO `book_genre` VALUES (12,6,4,NULL,NULL),(13,6,3,NULL,NULL),(14,7,4,NULL,NULL),(15,8,4,NULL,NULL),(16,8,5,NULL,NULL),(37,9,4,NULL,NULL),(38,9,7,NULL,NULL),(39,9,6,NULL,NULL),(40,9,8,NULL,NULL),(41,10,4,NULL,NULL),(42,10,8,NULL,NULL),(43,10,1,NULL,NULL),(44,11,7,NULL,NULL),(45,11,8,NULL,NULL),(46,11,1,NULL,NULL),(47,12,4,NULL,NULL),(48,12,6,NULL,NULL),(49,12,1,NULL,NULL),(50,13,7,NULL,NULL),(51,13,8,NULL,NULL),(52,13,1,NULL,NULL),(57,14,4,NULL,NULL),(58,14,6,NULL,NULL),(59,14,7,NULL,NULL),(60,14,8,NULL,NULL),(72,17,4,NULL,NULL),(73,17,8,NULL,NULL),(74,18,7,NULL,NULL),(75,19,7,NULL,NULL),(101,20,1,NULL,NULL),(102,20,4,NULL,NULL),(103,20,6,NULL,NULL),(104,16,8,NULL,NULL),(105,16,9,NULL,NULL),(109,5,1,NULL,NULL),(110,4,1,NULL,NULL),(111,4,6,NULL,NULL),(112,3,1,NULL,NULL),(113,2,1,NULL,NULL),(114,1,4,NULL,NULL),(115,1,6,NULL,NULL),(116,1,7,NULL,NULL),(119,15,6,NULL,NULL),(124,22,4,NULL,NULL),(125,22,7,NULL,NULL),(126,22,6,NULL,NULL),(127,23,4,NULL,NULL),(128,23,8,NULL,NULL),(144,21,7,NULL,NULL),(145,21,8,NULL,NULL),(150,24,4,NULL,NULL);
/*!40000 ALTER TABLE `book_genre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_order`
--

DROP TABLE IF EXISTS `book_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book_order` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `book_id` int NOT NULL,
  `count` int NOT NULL DEFAULT '1',
  `order_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_order`
--

LOCK TABLES `book_order` WRITE;
/*!40000 ALTER TABLE `book_order` DISABLE KEYS */;
INSERT INTO `book_order` VALUES (17,15,5,1,'2021-05-23 07:43:06','2021-05-23 08:36:58'),(18,5,3,1,'2021-05-23 08:37:14','2021-05-23 08:37:16'),(19,16,1,5,'2021-05-23 08:55:34','2021-05-23 08:55:39'),(20,15,1,6,'2021-05-23 09:03:34','2021-05-23 09:03:34'),(21,16,1,7,'2021-05-23 09:04:23','2021-05-23 09:04:23'),(23,15,2,8,'2021-05-26 00:45:53','2021-05-26 01:19:13'),(27,15,2,9,'2021-05-26 01:41:17','2021-05-26 01:41:18'),(28,16,3,10,'2021-05-27 14:01:43','2021-05-27 14:01:45'),(29,16,1,11,'2021-06-05 09:23:18','2021-06-05 09:23:22'),(32,15,5,12,'2021-07-02 11:25:49','2021-07-02 12:03:28'),(33,16,1,13,'2021-07-02 12:52:49','2021-07-02 12:52:49'),(34,16,1,14,'2021-07-05 06:57:32','2021-07-05 06:57:32'),(35,16,1,15,'2021-07-05 07:17:52','2021-07-05 07:17:55'),(36,20,1,16,'2021-07-05 23:33:27','2021-07-05 23:33:27'),(37,21,2,17,'2021-07-09 00:35:08','2021-07-09 00:35:10'),(38,16,1,17,'2021-07-09 00:35:24','2021-07-09 00:35:24');
/*!40000 ALTER TABLE `book_order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pubHouse` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` int NOT NULL DEFAULT '0',
  `visible` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (1,'На западном фронте без перемен',1,'0rpMMoDQcZxoKvozjUc59Ueye2X8T9eoMPwmClMV.jpg','Эксклюзивная классика','2021-04-25 09:46:15','2021-07-07 01:58:53',189,1),(2,'Три товарища',1,'Rm3V9Os0f0AxswA0h2VMkeLq72MJLhcz7zDxTXTL.jpg','Эксклюзивная классика','2021-04-30 08:28:22','2021-07-07 03:46:25',229,1),(3,'Возлюби ближнего своего',1,'NaxgSebUls0NBMFfFUJ5VZr8GUORIsmKKLp4oNi0.jpg','Эксклюзивная классика','2021-04-30 08:32:24','2021-07-07 01:58:41',250,1),(4,'Ночь в Лиссабоне',1,'vAuMUk2Gow0vczkaVNTeaFggWmAZiVA6Hc3efSt5.jpg','Эксклюзивная классика','2021-04-30 09:01:05','2021-07-07 01:58:35',219,1),(5,'Жизнь взаймы',1,'PYnw8zzk0GHA77I8TOvi25ZCeM4Uj8fJFqiJeMfA.jpg','Эксклюзивная классика','2021-04-30 09:03:35','2021-07-07 01:58:28',220,1),(15,'Драма на охоте',3,'8cKEQmyoqzh0SDyHp0Ee92ESNevqOasAW9GMaAv7.jpg','Всемирная литература','2021-05-12 00:14:20','2021-07-07 03:42:29',125,1),(16,'Вишневый сад',3,'RQaebXJPiwnxPFz9M35fcs833TbyKDpe4QHtE0je.jpg','Всемирная литература','2021-05-12 00:15:38','2021-07-07 01:57:49',100,1);
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genres` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genres`
--

LOCK TABLES `genres` WRITE;
/*!40000 ALTER TABLE `genres` DISABLE KEYS */;
INSERT INTO `genres` VALUES (1,'Роман','novel',NULL,NULL),(4,'Биография','biography',NULL,NULL),(6,'Драма','drama',NULL,NULL),(7,'Военная проза','military_prose',NULL,NULL),(8,'Комедия','comedy',NULL,NULL),(9,'Художественный вымысел','fiction',NULL,NULL);
/*!40000 ALTER TABLE `genres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (12,'2021_03_09_042258_create_books',1),(16,'2021_04_24_101041_create_genre_table',2),(26,'2014_10_12_000000_create_users_table',3),(27,'2014_10_12_100000_create_password_resets_table',3),(28,'2019_08_19_000000_create_failed_jobs_table',3),(29,'2021_04_24_101041_create_genres_table',3),(30,'2021_04_24_101403_create_books_table',3),(31,'2021_04_24_101736_create_authors_table',3),(32,'2021_04_25_102456_create_book_genre_table',3),(33,'2021_05_23_053133_alter_table_users',4),(35,'2021_05_23_072327_alter_table_books',5),(36,'2021_05_23_085939_create_orders_table',6),(37,'2021_05_23_090154_create_book_order_table',6),(38,'2021_05_23_111231_update_book_order_table',7),(39,'2021_05_26_061439_alter_table_orders',8),(40,'2021_07_06_045137_update_table_books',9),(41,'2021_07_07_113247_update_table_genres',10),(42,'2021_07_07_162250_update_table_authors',11);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,'Niyaz','392312','2021-05-23 04:37:43','2021-05-23 08:39:47',NULL),(2,0,NULL,NULL,'2021-05-23 08:40:00','2021-05-23 08:40:00',NULL),(3,0,NULL,NULL,'2021-05-23 08:40:15','2021-05-23 08:40:15',NULL),(4,0,NULL,NULL,'2021-05-23 08:40:22','2021-05-23 08:40:22',NULL),(6,2,'Nastya','329','2021-05-23 09:03:34','2021-07-06 23:46:44',NULL),(7,0,NULL,NULL,'2021-05-23 09:04:23','2021-05-23 09:04:23',NULL),(8,2,'Rick','223','2021-05-26 00:33:30','2021-07-06 23:46:24',2),(9,0,NULL,NULL,'2021-05-26 01:25:00','2021-05-26 01:25:00',2),(10,0,NULL,NULL,'2021-05-27 14:01:42','2021-05-27 14:01:42',NULL),(11,0,NULL,NULL,'2021-06-05 09:23:17','2021-06-05 09:23:17',NULL),(12,0,NULL,NULL,'2021-07-02 11:25:26','2021-07-02 11:25:26',2),(13,0,NULL,NULL,'2021-07-02 12:52:49','2021-07-02 12:52:49',NULL),(14,0,NULL,NULL,'2021-07-05 06:57:32','2021-07-05 06:57:32',NULL),(15,0,NULL,NULL,'2021-07-05 07:17:52','2021-07-05 07:17:52',3),(16,0,NULL,NULL,'2021-07-05 23:33:26','2021-07-05 23:33:26',NULL),(17,1,'Freed','3123','2021-07-09 00:35:08','2021-07-09 00:35:34',3);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (3,'Admin','admin@mail.ru',NULL,'$2y$10$02x0lWVDjuG0aKCAdkDqPuolYo7h4bwk2LG.Eb0NomeFxLgxsDmA.',NULL,'2021-07-02 13:03:58','2021-07-02 13:03:58',1),(4,'User','User@mail.ru',NULL,'$2y$10$udxc.DBtgqbVnhYyF3KKPee0mwJlE7EJo.BHveXdBor0CsllkOaKW','7RKGmubV652kstpnERpfEK7uMB4Uj6YujFjD6RtvvPvYQQe6mUc4RQKlOIN2','2021-07-03 06:50:32','2021-07-03 06:50:32',0);
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

-- Dump completed on 2021-07-12  9:08:45
