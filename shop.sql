-- MySQL dump 10.13  Distrib 5.7.32, for osx10.16 (x86_64)
--
-- Host: localhost    Database: shop
-- ------------------------------------------------------
-- Server version	5.7.32

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
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `c_order` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,0,'Telefon',NULL,1),(2,0,'Noutbook',NULL,2),(3,0,'Telivizor',NULL,3),(4,0,'Boshqalar',NULL,4);
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `regionId` int(10) unsigned NOT NULL,
  `name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_city_region_idx` (`regionId`),
  KEY `name` (`name`),
  CONSTRAINT `fk_city_region` FOREIGN KEY (`regionId`) REFERENCES `region` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=216 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,14,'Шахрисабз шаҳар'),(2,3,'Поп тумани'),(3,2,'Асака туман'),(4,5,'Тошкент тумани'),(5,5,'Янгийўл шаҳар'),(6,5,'Оҳангарон шаҳар'),(7,5,'Нурафшон шаҳар'),(8,11,'Нукус шаҳар'),(9,11,'Тахиатош тумани'),(10,4,'Хива шаҳар'),(11,11,'Амударё туман'),(12,11,'Беруний туман'),(13,11,'Қонликул туман'),(14,11,'Қораузак туман'),(15,11,'Кегейли туман'),(16,11,'Қўнғирот туман'),(17,11,'Муйнақ туман'),(18,11,'Нукус туман'),(19,11,'Тахтакупир туман'),(20,11,'Турткул туман'),(21,11,'Хўжайли туман'),(22,11,'Чимбой туман'),(23,11,'Шуманай туман '),(24,11,'Элликкалъа туман'),(25,2,'Андижон шаҳар'),(26,2,'Хонобод шаҳар'),(27,2,'Андижон тумани'),(28,2,'Балиқчи туман'),(29,2,'Булоқбоши туман'),(30,2,'Бўз туман'),(31,2,'Жалақудуқ туман'),(32,2,'Избоскан туман'),(33,2,'Улуғнор туман'),(34,2,'Марҳамат туман'),(35,2,'Пахтаобод туман'),(36,2,'Хўжаобод туман'),(37,2,'Олтинкўл туман'),(38,2,'Қўрғонтепа туман'),(39,2,'Шахрихон туман'),(40,7,'Бухоро шаҳар'),(41,7,'Когон шаҳар'),(42,7,'Бухоро туман'),(43,7,'Бобкент туман '),(44,7,'Жондор туман'),(45,7,'Когон туман'),(46,7,'Олот туман'),(47,7,'Пешку туман'),(48,7,'Ромитан туман'),(49,7,'Шофиркон туман'),(50,7,'Қоракўл туман'),(51,7,'Қоровулбозор туман'),(52,7,'Ғиждувон туман'),(53,9,'Арнасой туман'),(54,9,'Бахмал туман'),(55,9,'Ғаллаорол туман'),(56,9,'Дўстлик туман'),(57,9,'Жиззах шаҳар'),(58,9,'Жиззах туман'),(59,9,'Зарбдор туман'),(60,9,'Зафаробод туман'),(61,9,'Зомин туман '),(62,9,'Мирзачўл туман'),(63,9,'Пахтакор туман'),(64,9,'Фориш туман'),(65,9,'Янгиобод туман'),(66,14,'Қарши шаҳар'),(67,14,'Қарши туман'),(68,14,'Муборак туман'),(69,14,'Ғузор тумани'),(70,14,'Қамаши туман'),(71,14,'Чироқчи туман'),(72,14,'Шахрисабз туман'),(73,14,'Касби туман'),(74,14,'Косон туман'),(75,14,'Китоб туман'),(76,14,'Нишон туман'),(77,14,'Миришкор туман '),(78,14,'Деҳқонобод туман'),(79,14,'Яккабоғ туман'),(80,10,'Навоий шаҳар'),(81,10,'Зарафшон шаҳар'),(82,10,'Кармана туман'),(83,10,'Томди тумани'),(84,10,'Навбаҳор туман'),(85,10,'Нурота туман'),(86,10,'Хатирчи туман'),(87,10,'Қизилтепа туман'),(88,10,'Конимех туман'),(89,10,'Учқудуқ туман'),(90,3,'Наманган шаҳар'),(91,3,'Мингбулоқ тумани'),(92,3,'Косонсой тумани'),(93,3,'Наманган тумани'),(94,3,'Норин тумани'),(95,3,'Тўрақўрғон тумани'),(96,3,'Уйчи тумани'),(97,3,'Учқўрғон тумани'),(98,3,'Чортоқ тумани'),(99,3,'Чуст тумани'),(100,3,'Янгиқўрғон тумани'),(101,8,'Самарқанд шаҳар'),(102,8,'Ургут туман'),(103,8,'Пахтачи туман'),(104,8,'Каттақўрғон туман'),(105,8,'Самарқанд туман'),(106,8,'Булунғур туман'),(107,8,'Жомбой туман'),(108,8,'Қўшробод туман'),(109,8,'Нарпай туман'),(110,8,'Тайлоқ туман'),(111,8,'Пастдарғом туман'),(112,8,'Нуробод туман'),(113,8,'Каттақўрғон шаҳар'),(114,8,'Пайариқ туман'),(115,8,'Оқдарё туман'),(116,8,'Иштихон туман'),(117,13,'Термиз шаҳар'),(118,13,'Термиз туман'),(119,13,'Музработ туман'),(120,13,'Олтинсой туман'),(121,13,'Денов туман'),(122,13,'Сариосиё туман'),(123,13,'Қизириқ туман'),(124,13,'Жарқўрғон туман'),(125,13,'Ангор туман'),(126,13,'Қумқўрғон туман'),(127,13,'Бойсун туман'),(128,13,'Шўрчи туман'),(129,13,'Шеробод туман'),(130,13,'Узун туман'),(131,12,'Гулистон шаҳар'),(132,12,'Янгиер туман'),(133,12,'Ширин туман'),(134,12,'Оқолтин тумани'),(135,12,'Боёвут туман'),(136,12,'Гулистон туман'),(137,12,'Мирзаобод туман'),(138,12,'Сайхунобод туман'),(139,12,'Сардоба туман'),(140,12,'Сирдарё туман'),(141,12,'Ховос туман'),(142,5,'Ангрен шаҳар'),(143,5,'Бекобод шаҳар'),(144,5,'Олмалиқ шаҳар'),(145,5,'Чирчиқ шаҳар'),(146,5,'Бекобод туман'),(147,5,'Бўстонлиқ туман'),(148,5,'Қибрай туман'),(149,5,'Зангиота туман'),(150,5,'Қуйичирчиқ туман'),(151,5,'Оққўрғон туман'),(152,5,'Паркент туман'),(154,5,'Ўртачирчиқ туман'),(155,5,'Чиноз туман'),(156,5,'Юқоричирчиқ туман'),(157,5,'Бўка туман'),(158,5,'Янгийўл туман'),(159,5,'Охангарон туман'),(160,15,'Фарғона шаҳар '),(161,15,'Марғилон шаҳар'),(162,15,'Қувасой шаҳар'),(163,15,'Қўқон шаҳар'),(164,15,'Боғдод туман'),(165,15,'Бувайда туман'),(166,15,'Данғара туман '),(167,15,'Ёзёвон туман'),(168,15,'Олтиариқ туман'),(169,15,'Бешариқ туман'),(170,15,'Қўштепа туман'),(171,15,'Риштон туман'),(172,15,'Сўх туман'),(173,15,'Тошлоқ туман'),(174,15,'Учкўприк туман'),(175,15,'Фарғона туман'),(176,15,'Ўзбекистон туман'),(177,15,'Қува туман'),(178,15,'Фурқат туман'),(179,4,'Урганч шаҳар'),(180,4,'Боғот туман'),(181,4,'Урганч туман'),(182,4,'Қўшкўпир туман'),(183,4,'Хонка туман'),(184,4,'Янгиариқ туман'),(185,4,'Хива туман'),(186,4,'Янгибозор туман'),(187,4,'Хозарасп туман'),(188,4,'Шовот туман'),(189,4,'Гурлан туман'),(190,6,'Бектемир тумани'),(191,6,'Миробод тумани'),(192,6,'М.Улуғбек тумани'),(193,6,'Сергели тумани'),(194,6,'Олмазор тумани'),(195,6,'Учтепа тумани'),(196,6,'Яшнобод тумани'),(197,6,'Чилонзор тумани'),(198,6,'Шайхонтохур тумани'),(199,6,'Юнусобод тумани'),(200,6,'Яккасарой тумани'),(201,5,'Пискент туман');
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `first_Name` varchar(25) NOT NULL,
  `last_Name` varchar(25) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `region_id` int(3) unsigned NOT NULL,
  `city_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_customer_region` (`region_id`),
  KEY `fk_customer_city` (`city_id`),
  CONSTRAINT `fk_customer_city` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  CONSTRAINT `fk_customer_region` FOREIGN KEY (`region_id`) REFERENCES `region` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (2,0,'Eshmat','Toshmatov','+99894447777',2,3),(3,0,'Ismoil','Bobojonov','+998984445556',4,188),(4,0,'Foziljon','Jalilov','+998934010477',3,92),(5,0,'Akmal','Jabborov','+998901112233',8,101),(6,0,'Eshmat','Toshmatov','+99894555555',2,25),(7,0,'Yusufjon','Toshmatov','+998932226669',2,3),(8,0,'Eshmat','Toshmatov','+998932226669',9,54),(9,0,'Yusufjon','Ismatov','+998932226669',7,41),(10,7,'Rahmatulloh','Muhammadjonov','+998949119997',6,193);
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `count` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `status_id` int(11) DEFAULT '1',
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orders_customer` (`customer_id`),
  KEY `fk_orders_product` (`product_id`),
  CONSTRAINT `fk_orders_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  CONSTRAINT `fk_orders_product` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,2,2,5,2,'2021-06-21 20:07:26'),(2,3,3,2,2,'2021-06-21 20:08:18'),(3,15,4,3,2,'2021-06-21 20:08:48'),(4,1,5,1,2,'2021-06-21 20:09:36'),(5,1,6,4,1,'2021-06-25 20:22:07'),(6,3,8,4,1,'2021-06-25 20:40:54'),(7,1,10,8,1,NULL),(8,1,10,10,1,NULL),(9,2,10,9,1,NULL),(10,1,10,4,1,NULL),(11,1,10,8,1,NULL),(12,1,10,10,1,NULL),(13,2,10,9,1,NULL),(14,1,10,4,1,NULL),(15,1,10,8,1,NULL),(16,1,10,7,1,NULL),(17,1,10,8,1,NULL),(18,1,10,9,1,NULL),(19,2,10,1000013,1,NULL),(20,1,10,1000014,1,NULL),(21,1,10,10,1,NULL),(22,1,10,1000013,1,NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(25) NOT NULL,
  `amount` decimal(10,0) DEFAULT NULL,
  `price` decimal(20,2) DEFAULT NULL,
  `in_stock` int(11) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `amount` (`amount`)
) ENGINE=InnoDB AUTO_INCREMENT=1000015 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,4,'Turnik',160,NULL,135,'../images/redmi.jpeg'),(2,4,'Koptok',10,NULL,131,'../images/redmi.jpeg'),(3,4,'Tenis to\'pi',1,NULL,200,'../images/redmi.jpeg'),(4,4,'Fudbolka Real',7,NULL,69,'../images/redmi.jpeg'),(5,4,'Fudbolka Barcelona',7,NULL,71,'../images/redmi.jpeg'),(6,4,'TEST2',NULL,100.00,1,'../images/redmi.jpeg'),(7,4,'sdasdsa',1111,NULL,1,'../images/06-24.jpg'),(8,4,'Tennis koptok',1000,NULL,20,'../images/redmi.jpeg'),(9,4,'Plastik kartochka',34000,NULL,2,'../images/card.png'),(10,1,'Yusufjon Ismatov',1000,NULL,1,'../images/phone1.jpeg'),(1000013,1,'Redmi',2200000,NULL,15,'../images/redmi.jpeg'),(1000014,1,'Redmi',2200000,NULL,15,'../images/redmi.jpeg');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `region` (
  `id` int(3) unsigned NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region`
--

LOCK TABLES `region` WRITE;
/*!40000 ALTER TABLE `region` DISABLE KEYS */;
INSERT INTO `region` VALUES (2,'Андижон'),(7,'Бухоро'),(9,'Жиззах'),(14,'Кашкадарё'),(11,'Коракалпогистон'),(10,'Навоий'),(3,'Наманган'),(8,'Самарканд'),(12,'Сирдарё'),(13,'Сурхондарё'),(6,'Тошкент'),(5,'Тошкент вил.'),(15,'Фаргона'),(4,'Хоразм');
/*!40000 ALTER TABLE `region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Buyurtma qabul qilingan'),(2,'Buyurtma bekor qilingan');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `logged_at` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'iyusufjon','123@$',NULL,NULL,NULL,1),(7,3,'Rahmatulloh','9997',NULL,NULL,NULL,1);
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

-- Dump completed on 2021-07-16 21:58:53
