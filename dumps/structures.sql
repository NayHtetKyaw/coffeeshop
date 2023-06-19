CREATE DATABASE  IF NOT EXISTS `stamfordcafe` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `stamfordcafe`;
-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: stamfordcafe
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `checkout`
--

DROP TABLE IF EXISTS `checkout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `checkout` (
  `order_id` int NOT NULL,
  `checkout_date` date NOT NULL,
  `status` varchar(45) NOT NULL,
  `final_price` double NOT NULL,
  KEY `orderid_idx` (`order_id`),
  CONSTRAINT `orderid` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `customer_feedbacks`
--

DROP TABLE IF EXISTS `customer_feedbacks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer_feedbacks` (
  `feedback_id` int NOT NULL,
  `feedback` longtext NOT NULL,
  `date` varchar(45) NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `drinks`
--

DROP TABLE IF EXISTS `drinks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `drinks` (
  `drink_id` int NOT NULL AUTO_INCREMENT,
  `drink_name` varchar(45) NOT NULL,
  `speciality` varchar(45) NOT NULL,
  `drink_type` varchar(45) NOT NULL,
  `price` float NOT NULL,
  `img` blob,
  PRIMARY KEY (`drink_id`),
  KEY `drinkname` (`drink_name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `foods`
--

DROP TABLE IF EXISTS `foods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `foods` (
  `food_id` int NOT NULL,
  `food_name` varchar(45) NOT NULL,
  `meal_type` varchar(45) NOT NULL,
  `speciality` varchar(45) NOT NULL,
  `food_type` varchar(45) NOT NULL,
  `price` float NOT NULL,
  `img` tinyblob,
  PRIMARY KEY (`food_id`),
  KEY `foodname` (`food_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu` (
  `menu_no` varchar(45) NOT NULL,
  `food` int NOT NULL,
  `drink` int NOT NULL,
  PRIMARY KEY (`menu_no`),
  KEY `food_idx` (`food`),
  KEY `drink_idx` (`drink`),
  CONSTRAINT `drink` FOREIGN KEY (`drink`) REFERENCES `drinks` (`drink_id`),
  CONSTRAINT `food` FOREIGN KEY (`food`) REFERENCES `foods` (`food_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `order_detial`
--

DROP TABLE IF EXISTS `order_detial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_detial` (
  `order_id` int NOT NULL,
  `payment` varchar(45) NOT NULL,
  `date` varchar(45) NOT NULL,
  `time` varchar(45) NOT NULL,
  `total_price` varchar(45) NOT NULL,
  KEY `order_id_idx` (`order_id`),
  CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `table_id` int NOT NULL,
  `menu_item` varchar(45) NOT NULL,
  `quantity` varchar(45) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `table_id_idx` (`table_id`),
  KEY `food_name_idx` (`menu_item`),
  CONSTRAINT `menu_drink_name` FOREIGN KEY (`menu_item`) REFERENCES `drinks` (`drink_name`),
  CONSTRAINT `menu_food_name` FOREIGN KEY (`menu_item`) REFERENCES `foods` (`food_name`),
  CONSTRAINT `table_id` FOREIGN KEY (`table_id`) REFERENCES `table` (`table_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `packages` (
  `package_name` varchar(45) NOT NULL,
  `price` varchar(45) NOT NULL,
  `food` varchar(45) DEFAULT NULL,
  `drink` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`package_name`),
  KEY `package_food_idx` (`food`),
  KEY `package_drink_idx` (`drink`),
  CONSTRAINT `package_drink` FOREIGN KEY (`drink`) REFERENCES `drinks` (`drink_name`),
  CONSTRAINT `package_food` FOREIGN KEY (`food`) REFERENCES `foods` (`food_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservations` (
  `reservations_id` int NOT NULL AUTO_INCREMENT,
  `reservation_date` varchar(45) NOT NULL,
  `customer_phone` varchar(45) NOT NULL,
  `customer_name` varchar(45) NOT NULL,
  `number_of_guests` varchar(45) NOT NULL,
  `customer_email` varchar(45) NOT NULL,
  `package_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`reservations_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `special_menu`
--

DROP TABLE IF EXISTS `special_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `special_menu` (
  `id_special_menu` int NOT NULL,
  `special_drink` int DEFAULT NULL,
  `special_food` int DEFAULT NULL,
  PRIMARY KEY (`id_special_menu`),
  KEY `special_food_idx` (`special_food`),
  KEY `special_drink_idx` (`special_drink`),
  CONSTRAINT `special_drink` FOREIGN KEY (`special_drink`) REFERENCES `drinks` (`drink_id`),
  CONSTRAINT `special_food` FOREIGN KEY (`special_food`) REFERENCES `foods` (`food_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `table`
--

DROP TABLE IF EXISTS `table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `table` (
  `table_id` int NOT NULL AUTO_INCREMENT,
  `no_of_seat` int NOT NULL,
  `table_size` int NOT NULL,
  PRIMARY KEY (`table_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-19  3:25:55
