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
-- Dumping data for table `checkout`
--

LOCK TABLES `checkout` WRITE;
/*!40000 ALTER TABLE `checkout` DISABLE KEYS */;
/*!40000 ALTER TABLE `checkout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `customer_feedbacks`
--

LOCK TABLES `customer_feedbacks` WRITE;
/*!40000 ALTER TABLE `customer_feedbacks` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer_feedbacks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `drinks`
--

LOCK TABLES `drinks` WRITE;
/*!40000 ALTER TABLE `drinks` DISABLE KEYS */;
INSERT INTO `drinks` VALUES (1,'Cappuccino','Normal','Hot',90,_binary '945575-cappuccino_at_sightglass_coffee.jpg'),(2,'Espresso','Normal','Hot',80,_binary '291084-ec178d83e5f597b162cda1e60cb64194.jpg'),(3,'Americano','Normal','Hot',80,_binary '239339-americano-coffee-thmbnail.jpg'),(4,'Latte','Normal','Hot',100,_binary '180138-how-to-make-caffe-latte-765372-hero-01-2417e49c4a9c4789b3abdd36885f06ab.jpg'),(5,'Caffè macchiato','Special','Hot',120,_binary '685842-155108.jpg'),(6,'Caffè mocha','Special','Hot',120,_binary '550632-peppermint-mocha-470x449.jpg'),(7,'Coca Cola','Normal','Cold',30,_binary '815938-l-intro-1641859551.jpg'),(9,'Banana Smothie','Special','Cold',50,_binary '326631-221261-peanut-butter-banana-smoothie-ddmfs-4x3-79533eeb04c84b42aae440d643fc9a31.jpg'),(10,'Ice Tea','Normal','Cold',60,_binary '623867-iced-tea-recipes-for-rasymptom-relief-1440x810.jpg');
/*!40000 ALTER TABLE `drinks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `foods`
--

LOCK TABLES `foods` WRITE;
/*!40000 ALTER TABLE `foods` DISABLE KEYS */;
INSERT INTO `foods` VALUES (1,'Bagels','Breakfast','Normal','Bread',120,_binary '903921-bagel.jpg'),(2,'Donuts','Breakfast','Normal','Donut',100,_binary '234000-how-to-make-donuts-20.jpg'),(3,'Corissant','Breakfast','Normal','Bread',150,_binary '690664-wgbh.brightspotcdn.jpg'),(4,'Sandwich','Breakfast','Normal','Bread',80,_binary '268291-italian-sandwich-recipe-2-1674500643.jpg'),(5,'Pizza','Lunch','Normal','Pizza',80,_binary '775536-6776_pizza-dough_ddmfs_2x1_1725-fdaa76496da045b3bdaadcec6d4c5398.jpg'),(6,'Cupcakes','Breakfast','Special','Cake',100,_binary '546875-graduation-cupcakes_exps_ft23_273184_st_3_16_1-3.jpg'),(7,'Macarons','Breakfast','Special','Cake',120,_binary '831251-french-macarons-1200t.jpg'),(8,'Cheese Burger','Lunch','Normal','Burger',150,_binary '304101-best-burger-4-500x375.jpg'),(9,'Mix Salad','Lunch','Normal','Salad',130,_binary '262951-ribeye-salad-today-061920-tease.jpg'),(10,'Thai Curry','Lunch','Normal','Curry',80,_binary '385025-image-3.jpg'),(11,'Best Lasagna','Lunch','Normal','Bread',100,_binary '731379-classic-lasagna-14-scaled.jpg'),(12,'Spaghetti','Lunch','Normal','Noodle',120,_binary '365437-one-pot-spaghetti-in-bowl-720x540.jpg'),(13,'Pancake Bacon','Breakfast','Normal','Meat',110,_binary '947161-classic-sunny-side-up-eggs-with-bacon-and-pancakes-recipes.jpg'),(14,'Toast','Breakfast','Normal','Bread',70,_binary '661162-french-toast-stack_lynne_resized.jpg'),(15,'Fried Rice','Lunch','Special','Rice',60,_binary '92428-spoonful-of-fried-rice-thumbnail-500x500.jpg');
/*!40000 ALTER TABLE `foods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES ('M1',1,1),('M2',2,2),('M3',3,4),('M4',4,3),('M5',6,5),('M6',5,6);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `order_detial`
--

LOCK TABLES `order_detial` WRITE;
/*!40000 ALTER TABLE `order_detial` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_detial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `packages`
--

LOCK TABLES `packages` WRITE;
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;
/*!40000 ALTER TABLE `packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `special_menu`
--

LOCK TABLES `special_menu` WRITE;
/*!40000 ALTER TABLE `special_menu` DISABLE KEYS */;
INSERT INTO `special_menu` VALUES (1,5,6),(2,6,7),(3,9,15);
/*!40000 ALTER TABLE `special_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `table`
--

LOCK TABLES `table` WRITE;
/*!40000 ALTER TABLE `table` DISABLE KEYS */;
/*!40000 ALTER TABLE `table` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-19  3:24:17
