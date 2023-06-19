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
-- Dumping data for table `checkout`
--

LOCK TABLES `checkout` WRITE;
/*!40000 ALTER TABLE `checkout` DISABLE KEYS */;
/*!40000 ALTER TABLE `checkout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer_feedbacks`
--

DROP TABLE IF EXISTS `customer_feedbacks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customer_feedbacks` (
  `feedback_id` int NOT NULL AUTO_INCREMENT,
  `feedback` longtext NOT NULL,
  `fdate` date NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_feedbacks`
--

LOCK TABLES `customer_feedbacks` WRITE;
/*!40000 ALTER TABLE `customer_feedbacks` DISABLE KEYS */;
INSERT INTO `customer_feedbacks` VALUES (1,'sd fsdfskdflさdkjfぁskjfかsjdk','2023-06-13'),(2,'サkdksっkっwアbsd','2023-02-08'),(3,'サkdksっkっwアbsd','2023-02-08'),(4,'very good food','2023-06-24'),(5,'it was so shit serv','2023-06-19'),(6,'good\r\n','2023-06-02'),(7,'ji ji iji ji','2023-06-20');
/*!40000 ALTER TABLE `customer_feedbacks` ENABLE KEYS */;
UNLOCK TABLES;

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
  `dprice` float NOT NULL,
  `img` blob,
  PRIMARY KEY (`drink_id`),
  KEY `drinkname` (`drink_name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `drinks`
--

LOCK TABLES `drinks` WRITE;
/*!40000 ALTER TABLE `drinks` DISABLE KEYS */;
INSERT INTO `drinks` VALUES (1,'Cappuccino','Normal','Hot',100,_binary '945575-cappuccino_at_sightglass_coffee.jpg'),(2,'Espresso','Normal','Hot',60,_binary '291084-ec178d83e5f597b162cda1e60cb64194.jpg'),(3,'Americano','Normal','Hot',80,_binary '239339-americano-coffee-thmbnail.jpg'),(4,'Latte','Normal','Hot',90,_binary '180138-how-to-make-caffe-latte-765372-hero-01-2417e49c4a9c4789b3abdd36885f06ab.jpg'),(5,'Caffè macchiato','Special','Hot',120,_binary '685842-155108.jpg'),(6,'Caffè mocha','Special','Hot',120,_binary '550632-peppermint-mocha-470x449.jpg'),(7,'Coca Cola','Normal','Cold',30,_binary '815938-l-intro-1641859551.jpg'),(9,'Banana Smothie','Special','Cold',100,_binary '326631-221261-peanut-butter-banana-smoothie-ddmfs-4x3-79533eeb04c84b42aae440d643fc9a31.jpg'),(10,'Ice Tea','Normal','Cold',60,_binary '623867-iced-tea-recipes-for-rasymptom-relief-1440x810.jpg');
/*!40000 ALTER TABLE `drinks` ENABLE KEYS */;
UNLOCK TABLES;

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
  `fprice` float NOT NULL,
  `img` tinyblob,
  PRIMARY KEY (`food_id`),
  KEY `foodname` (`food_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `foods`
--

LOCK TABLES `foods` WRITE;
/*!40000 ALTER TABLE `foods` DISABLE KEYS */;
INSERT INTO `foods` VALUES (1,'Bagels','Breakfast','Normal','Bread',120,_binary '903921-bagel.jpg'),(2,'Donuts','Breakfast','Normal','Donut',100,_binary '234000-how-to-make-donuts-20.jpg'),(3,'Corissant','Breakfast','Normal','Bread',150,_binary '690664-wgbh.brightspotcdn.jpg'),(4,'Sandwich','Breakfast','Normal','Bread',80,_binary '268291-italian-sandwich-recipe-2-1674500643.jpg'),(5,'Pizza','Lunch','Normal','Pizza',220,_binary '775536-6776_pizza-dough_ddmfs_2x1_1725-fdaa76496da045b3bdaadcec6d4c5398.jpg'),(6,'Cupcakes','Breakfast','Special','Cake',100,_binary '546875-graduation-cupcakes_exps_ft23_273184_st_3_16_1-3.jpg'),(7,'Macarons','Breakfast','Special','Cake',120,_binary '831251-french-macarons-1200t.jpg'),(8,'Cheese Burger','Lunch','Normal','Burger',150,_binary '304101-best-burger-4-500x375.jpg'),(9,'Mix Salad','Lunch','Normal','Salad',130,_binary '262951-ribeye-salad-today-061920-tease.jpg'),(10,'Thai Curry','Lunch','Normal','Curry',80,_binary '385025-image-3.jpg'),(11,'Best Lasagna','Lunch','Normal','Bread',100,_binary '731379-classic-lasagna-14-scaled.jpg'),(12,'Spaghetti','Lunch','Normal','Noodle',120,_binary '365437-one-pot-spaghetti-in-bowl-720x540.jpg'),(13,'Pancake Bacon','Breakfast','Normal','Meat',100,_binary '947161-classic-sunny-side-up-eggs-with-bacon-and-pancakes-recipes.jpg'),(14,'Toast','Breakfast','Normal','Bread',70,_binary '661162-french-toast-stack_lynne_resized.jpg'),(15,'Fried Rice','Lunch','Special','Rice',60,_binary '92428-spoonful-of-fried-rice-thumbnail-500x500.jpg');
/*!40000 ALTER TABLE `foods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu` (
  `menu_no` varchar(45) NOT NULL,
  `food` int DEFAULT NULL,
  `drink` int DEFAULT NULL,
  PRIMARY KEY (`menu_no`),
  KEY `food_idx` (`food`),
  KEY `drink_idx` (`drink`),
  CONSTRAINT `drink` FOREIGN KEY (`drink`) REFERENCES `drinks` (`drink_id`),
  CONSTRAINT `food` FOREIGN KEY (`food`) REFERENCES `foods` (`food_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES ('M1',1,1),('M10',10,5),('M11',11,3),('M12',12,10),('M14',13,9),('M15',14,5),('M16',15,7),('M2',2,2),('M3',3,4),('M4',4,3),('M5',6,5),('M6',5,6),('M7',7,1),('M8',8,2),('M9',9,5);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `order_detial`
--

LOCK TABLES `order_detial` WRITE;
/*!40000 ALTER TABLE `order_detial` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_detial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `table_id` int NOT NULL,
  `food` varchar(45) DEFAULT NULL,
  `food_quantity` int DEFAULT NULL,
  `drink` varchar(45) DEFAULT NULL,
  `drink_quantity` int DEFAULT NULL,
  `notes` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `table_id_idx` (`table_id`),
  KEY `food_name_idx` (`food`),
  KEY `menu_drink_name_idx` (`drink`),
  CONSTRAINT `menu_drink_name` FOREIGN KEY (`drink`) REFERENCES `drinks` (`drink_name`),
  CONSTRAINT `menu_food_name` FOREIGN KEY (`food`) REFERENCES `foods` (`food_name`),
  CONSTRAINT `table_id` FOREIGN KEY (`table_id`) REFERENCES `table` (`table_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,'Sandwich',1,'Latte',1,'less salt'),(2,5,'Pizza',4,'Coca Cola',6,NULL),(3,8,'Spaghetti',4,'Ice Tea',3,'No spicy'),(4,24,'Pancake Bacon',2,'Cappuccino',2,NULL),(5,3,'Thai Curry',1,'Banana Smothie',2,NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `packages` (
  `package_name` varchar(45) NOT NULL,
  `price` varchar(45) NOT NULL,
  `food` int NOT NULL,
  `drink` int NOT NULL,
  PRIMARY KEY (`package_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `packages`
--

LOCK TABLES `packages` WRITE;
/*!40000 ALTER TABLE `packages` DISABLE KEYS */;
INSERT INTO `packages` VALUES ('Package 1','150',2,1),('Package 2','200',3,2),('Package 3','140',4,6);
/*!40000 ALTER TABLE `packages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservations` (
  `reservations_id` int NOT NULL AUTO_INCREMENT,
  `reservation_date` date NOT NULL,
  `customer_phone` varchar(45) NOT NULL,
  `customer_name` varchar(45) NOT NULL,
  `number_of_guests` int NOT NULL,
  `customer_email` varchar(45) NOT NULL,
  `package_name` varchar(45) NOT NULL,
  `room_id` varchar(45) NOT NULL,
  PRIMARY KEY (`reservations_id`),
  KEY `package_idx` (`package_name`),
  KEY `room_name_idx` (`room_id`),
  CONSTRAINT `package_name` FOREIGN KEY (`package_name`) REFERENCES `packages` (`package_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `room_name` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (1,'2023-06-19','0829929030','anascence',2,'nayhtetkyaw86@gmail.com','Package 2','Boardgame Room'),(2,'2023-06-19','0816756678','joseph',6,'maxmisteno@gmail.com','Package 2','Boardgame Room'),(3,'2023-11-19','0814780546','long',2,'long@gmail.com','Package 2','Pet Room'),(4,'2023-06-19','098765433','Eaint',2,'eaintvickyyang@gmail.com','Package 2','Pet Room'),(5,'2023-06-19','9823645293','Juny',1,'juny@gmail.com','Package 2','Boardgame Room'),(6,'2023-06-20','0285234235','nikita',3,'kini@gmail.com','Package 1','Boardgame Room');
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `room` (
  `idroom` varchar(45) NOT NULL,
  `room_name` varchar(45) NOT NULL,
  `feature` varchar(45) NOT NULL,
  PRIMARY KEY (`idroom`),
  KEY `room_name` (`room_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` VALUES ('1','Boardgame Room','Customer can play boardgames'),('2','Inernet Room','Customer can use computers'),('3','Pet Room','Customer can bring pets');
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Dumping data for table `special_menu`
--

LOCK TABLES `special_menu` WRITE;
/*!40000 ALTER TABLE `special_menu` DISABLE KEYS */;
INSERT INTO `special_menu` VALUES (1,5,6),(2,6,7),(3,9,15);
/*!40000 ALTER TABLE `special_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stuffs`
--

DROP TABLE IF EXISTS `stuffs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stuffs` (
  `stuff_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `role` varchar(45) NOT NULL,
  PRIMARY KEY (`stuff_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stuffs`
--

LOCK TABLES `stuffs` WRITE;
/*!40000 ALTER TABLE `stuffs` DISABLE KEYS */;
INSERT INTO `stuffs` VALUES (1,'ana','anascence','0882642344','engineer'),(2,'long','panthorn','0934342524','manager'),(3,'nikita','shampoo','097242523425','waiter');
/*!40000 ALTER TABLE `stuffs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `table`
--

DROP TABLE IF EXISTS `table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `table` (
  `table_id` int NOT NULL AUTO_INCREMENT,
  `no_of_seat` int NOT NULL,
  `table_size` varchar(45) NOT NULL,
  PRIMARY KEY (`table_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `table`
--

LOCK TABLES `table` WRITE;
/*!40000 ALTER TABLE `table` DISABLE KEYS */;
INSERT INTO `table` VALUES (1,6,'big'),(2,4,'medium'),(3,2,'small'),(4,1,'extra small'),(5,6,'big'),(6,1,'extra small'),(7,4,'medium'),(8,8,'extra big'),(9,2,'small'),(10,4,'medium'),(11,4,'medium'),(12,4,'medium'),(13,2,'small'),(14,2,'small'),(15,1,'extra small'),(16,6,'big'),(17,6,'big'),(18,8,'extra big'),(19,1,'extra small'),(20,2,'small'),(21,2,'small'),(22,2,'small'),(23,2,'small'),(24,2,'small'),(25,1,'extra small');
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

-- Dump completed on 2023-06-20  6:49:22
