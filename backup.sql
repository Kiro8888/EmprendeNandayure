-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: emprendenandayure
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id_ctg` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ctg_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ctg_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_ctg`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Frutas','Estas son las frutas de los emprendedores','2024-11-01 02:38:04','2024-11-01 02:38:04'),(2,'ddd','ddd','2024-11-06 07:44:19','2024-11-06 07:44:19');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entrepreneurships`
--

DROP TABLE IF EXISTS `entrepreneurships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `entrepreneurships` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `etp_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etp_latitude` decimal(10,7) NOT NULL,
  `etp_longitude` decimal(10,7) NOT NULL,
  `etp_status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `etp_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etp_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `etp_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `etp_id_user` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `entrepreneurships_etp_email_unique` (`etp_email`),
  KEY `entrepreneurships_etp_id_user_foreign` (`etp_id_user`),
  CONSTRAINT `entrepreneurships_etp_id_user_foreign` FOREIGN KEY (`etp_id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entrepreneurships`
--

LOCK TABLES `entrepreneurships` WRITE;
/*!40000 ALTER TABLE `entrepreneurships` DISABLE KEYS */;
INSERT INTO `entrepreneurships` VALUES (1,'Fruteros',12.1886503,-86.2447491,'1','2345534','fruteros@gmail.com','images/entrepreneurships/1730407044.jpg',1,'2024-11-01 02:37:24','2024-11-01 02:37:24'),(2,'Hermanos rojas',10.1705331,-85.4291472,'1','71824483','rojas@gmail.com','images/entrepreneurships/1730513576.png',1,'2024-11-02 08:12:56','2024-11-02 08:12:56'),(3,'Taxi',9.8817662,-84.1049625,'1','22222222','taxi@gmail.com',NULL,1,'2024-11-08 01:05:04','2024-11-08 01:05:04');
/*!40000 ALTER TABLE `entrepreneurships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `events` (
  `id_evt` bigint unsigned NOT NULL AUTO_INCREMENT,
  `evt_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `evt_description` text COLLATE utf8mb4_unicode_ci,
  `evt_date` date NOT NULL,
  `evt_hour` time NOT NULL,
  `evt_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `evt_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_evt`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_reset_tokens_table',1),(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2024_07_10_220630_entrepreneurships',1),(7,'2024_07_12_182957_create_sessions_table',1),(8,'2024_07_12_190108_create_events_table',1),(9,'2024_07_12_190225_create_categories_table',1),(10,'2024_07_12_190313_create_products_table',1),(11,'2024_07_12_190406_create_services_table',1),(12,'2024_08_07_174214_create_permission_tables',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',2);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'admin.home','Ver el dashboard','web','2024-10-29 09:09:58','2024-10-29 09:09:58'),(2,'admin.users.index','Ver los usuarios','web','2024-10-29 09:09:58','2024-10-29 09:09:58'),(3,'admin.users.create','Crear usuarios','web','2024-10-29 09:09:58','2024-10-29 09:09:58'),(4,'admin.users.edit','Editar usuarios','web','2024-10-29 09:09:58','2024-10-29 09:09:58'),(5,'admin.users.update','Actualizar usuarios','web','2024-10-29 09:09:58','2024-10-29 09:09:58'),(6,'admin.categories.index','Ver las categorias','web','2024-10-29 09:09:58','2024-10-29 09:09:58'),(7,'admin.categories.create','Crear las categorias','web','2024-10-29 09:09:58','2024-10-29 09:09:58'),(8,'admin.categories.edit','Editar  las categorias','web','2024-10-29 09:09:58','2024-10-29 09:09:58'),(9,'admin.categories.destroy','Eliminar las categorias','web','2024-10-29 09:09:58','2024-10-29 09:09:58'),(10,'admin.entrepreneurships.index','Ver los emprendimientos','web','2024-10-29 09:09:58','2024-10-29 09:09:58'),(11,'admin.entrepreneurships.create','Crear los emprendimientos','web','2024-10-29 09:09:58','2024-10-29 09:09:58'),(12,'admin.entrepreneurships.edit','Editar los emprendimientos','web','2024-10-29 09:09:58','2024-10-29 09:09:58'),(13,'admin.entrepreneurships.destroy','Eliminar los emprendimientos','web','2024-10-29 09:09:58','2024-10-29 09:09:58'),(14,'admin.entrepreneurships.show','Ver los emprendimientos','web','2024-10-29 09:09:58','2024-10-29 09:09:58'),(15,'admin.products.index','Ver los productos','web','2024-10-29 09:09:58','2024-10-29 09:09:58'),(16,'admin.products.create','Crear los productos','web','2024-10-29 09:09:58','2024-10-29 09:09:58'),(17,'admin.products.edit','Editar los productos','web','2024-10-29 09:09:58','2024-10-29 09:09:58'),(18,'admin.products.destroy','Eliminar los productos','web','2024-10-29 09:09:58','2024-10-29 09:09:58'),(19,'admin.products.show','Ver los productos','web','2024-10-29 09:09:58','2024-10-29 09:09:58'),(20,'admin.services.index','Ver los servicios','web','2024-10-29 09:09:58','2024-10-29 09:09:58'),(21,'admin.services.create','Crear los servicios','web','2024-10-29 09:09:58','2024-10-29 09:09:58'),(22,'admin.services.edit','Editar los servicios','web','2024-10-29 09:09:58','2024-10-29 09:09:58'),(23,'admin.services.destroy','Eliminar los servicios','web','2024-10-29 09:09:59','2024-10-29 09:09:59'),(24,'admin.services.show','Ver los servicios','web','2024-10-29 09:09:59','2024-10-29 09:09:59'),(25,'admin.events.index','Ver los eventos','web','2024-10-29 09:09:59','2024-10-29 09:09:59'),(26,'admin.events.create','Crear eventos','web','2024-10-29 09:09:59','2024-10-29 09:09:59'),(27,'admin.events.edit','Editar eventos','web','2024-10-29 09:09:59','2024-10-29 09:09:59'),(28,'admin.events.destroy','Eliminar eventos','web','2024-10-29 09:09:59','2024-10-29 09:09:59'),(29,'admin.events.show','Ver eventos','web','2024-10-29 09:09:59','2024-10-29 09:09:59'),(30,'admin.roles.index','Ver los roles','web','2024-10-29 09:09:59','2024-10-29 09:09:59'),(31,'admin.roles.create','Crear roles','web','2024-10-29 09:09:59','2024-10-29 09:09:59'),(32,'admin.roles.edit','Editar roles','web','2024-10-29 09:09:59','2024-10-29 09:09:59'),(33,'admin.roles.destroy','Eliminar roles','web','2024-10-29 09:09:59','2024-10-29 09:09:59');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id_pdt` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pdt_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdt_description` text COLLATE utf8mb4_unicode_ci,
  `pdt_status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `pdt_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pdt_price` decimal(8,2) NOT NULL,
  `pdt_id_ctg` bigint unsigned NOT NULL,
  `pdt_id_etp` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pdt`),
  KEY `products_pdt_id_etp_foreign` (`pdt_id_etp`),
  KEY `products_pdt_id_ctg_foreign` (`pdt_id_ctg`),
  CONSTRAINT `products_pdt_id_ctg_foreign` FOREIGN KEY (`pdt_id_ctg`) REFERENCES `categories` (`id_ctg`) ON DELETE CASCADE,
  CONSTRAINT `products_pdt_id_etp_foreign` FOREIGN KEY (`pdt_id_etp`) REFERENCES `entrepreneurships` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (2,'Papaya','esta es una papaya','1','images/products/1730412254.png',1200.00,1,1,'2024-11-01 03:06:19','2024-11-01 04:04:14'),(3,'Pera','esta es una pera','1','images/products/1730412281.png',2000.00,1,1,'2024-11-01 03:06:42','2024-11-01 04:04:41'),(4,'Sandia','Esta es una sandia','1','images/products/1730412305.png',500.00,1,1,'2024-11-01 03:07:08','2024-11-01 04:05:05'),(5,'Piña','Esta es una piña','1','images/products/1730412371.png',1200.00,1,1,'2024-11-01 04:06:11','2024-11-01 04:06:11'),(6,'test de producto','esto es un producto para un test','1','images/products/1731010126.png',12000.00,1,2,'2024-11-08 02:08:46','2024-11-08 02:08:46');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(1,2),(10,2),(11,2),(12,2),(13,2),(14,2),(15,2),(16,2),(17,2),(18,2),(19,2),(20,2),(21,2),(22,2),(23,2),(24,2);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','web','2024-10-29 09:09:58','2024-10-29 09:09:58'),(2,'Entrepreneur','web','2024-10-29 09:09:58','2024-10-29 09:09:58'),(3,'User','web','2024-10-29 09:09:58','2024-10-29 09:09:58');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id_srv` bigint unsigned NOT NULL AUTO_INCREMENT,
  `srv_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `srv_description` text COLLATE utf8mb4_unicode_ci,
  `srv_status` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `srv_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `srv_price` decimal(8,2) NOT NULL,
  `srv_id_ctg` bigint unsigned NOT NULL,
  `srv_id_etp` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_srv`),
  KEY `services_srv_id_etp_foreign` (`srv_id_etp`),
  KEY `services_srv_id_ctg_foreign` (`srv_id_ctg`),
  CONSTRAINT `services_srv_id_ctg_foreign` FOREIGN KEY (`srv_id_ctg`) REFERENCES `categories` (`id_ctg`) ON DELETE CASCADE,
  CONSTRAINT `services_srv_id_etp_foreign` FOREIGN KEY (`srv_id_etp`) REFERENCES `entrepreneurships` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Fiestas','Fiestas para la casa','1','images/services/1730503036.jpg',1500.00,1,1,'2024-11-02 05:17:16','2024-11-02 05:17:16'),(2,'Servicio de corta','Una empresa familiar enfocada en la corta de césped','1','images/services/1730513638.png',1500.00,1,2,'2024-11-02 08:13:58','2024-11-02 08:13:58');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('5lc70xICoCZ0uzhexBwi8yNIQx1WloYPgmYsCyEt',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36 OPR/114.0.0.0','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYTdHN2taTEVWUzNZOVJodjNzdmIyVGdSUXNWUWpSV3UxSk5pTWxGNCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDE6Imh0dHA6Ly9lbXByZW5kZW5hbmRheXVyZS50ZXN0L2F1dGgvZ29vZ2xlIjt9czo1OiJzdGF0ZSI7czo0MDoiYjdPWFNjZThNVWlWY2hza2RmT2ZFdHdjY1FTVWlNUm9Ob1NRblo3NyI7fQ==',1731014288);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
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
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('En espera','Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Activo',
  `cellphone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cedula` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_cedula_unique` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','Admin','admin@gmail.com',NULL,'$2y$12$j39IXf39iobwqkFCtfoDiO4jJfN07TMfaWn8VISVwcd/mhVqEVjym',NULL,NULL,NULL,NULL,NULL,NULL,'Activo',NULL,NULL,'2024-10-29 09:10:27','2024-10-29 09:10:27'),(2,'test','Villegas Mora','4dddd@gmail.com',NULL,'$2y$12$ilEil6hE7a3SVqIeWaImq.zZemHsskrCC4gB549LzvgDU0T/uI/Nm',NULL,NULL,NULL,NULL,NULL,NULL,'En espera','32332','4352345324','2024-11-03 01:37:50','2024-11-03 01:37:50'),(3,'Carlitos','Fakercito','carlitoschallenger123fakergod@gmail.com',NULL,'$2y$12$8Qv0EDu38ahdsZVl1EHLIuorvgO5pHSh/VS358NwToif2.Tw1AeXW',NULL,NULL,NULL,NULL,NULL,NULL,'Activo',NULL,NULL,'2024-11-04 01:17:09','2024-11-04 01:17:09');
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

-- Dump completed on 2024-11-07 15:33:18
