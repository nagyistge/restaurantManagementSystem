-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: Restaurant
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

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
-- Table structure for table `CloseBillingOutlet`
--

DROP TABLE IF EXISTS `CloseBillingOutlet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CloseBillingOutlet` (
  `AccountingDate` date DEFAULT NULL,
  `Employee_id` varchar(10) NOT NULL,
  `SessionEndingTime` time DEFAULT NULL,
  `ClosingAmount` float(20,4) NOT NULL,
  KEY `Employee_id` (`Employee_id`),
  CONSTRAINT `CloseBillingOutlet_ibfk_1` FOREIGN KEY (`Employee_id`) REFERENCES `Employees` (`Employee_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CloseBillingOutlet`
--

LOCK TABLES `CloseBillingOutlet` WRITE;
/*!40000 ALTER TABLE `CloseBillingOutlet` DISABLE KEYS */;
/*!40000 ALTER TABLE `CloseBillingOutlet` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`IntroToDB`@`localhost`*/ /*!50003 trigger DateTime4 before insert on CloseBillingOutlet for each row set New.AccountingDate = NOW(), New.SessionEndingTime = NOW() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `CloseShift`
--

DROP TABLE IF EXISTS `CloseShift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CloseShift` (
  `Date` date DEFAULT NULL,
  `Employee_id` varchar(10) NOT NULL,
  `ClosingTime` time DEFAULT NULL,
  KEY `Employee_id` (`Employee_id`),
  CONSTRAINT `CloseShift_ibfk_1` FOREIGN KEY (`Employee_id`) REFERENCES `Employees` (`Employee_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CloseShift`
--

LOCK TABLES `CloseShift` WRITE;
/*!40000 ALTER TABLE `CloseShift` DISABLE KEYS */;
/*!40000 ALTER TABLE `CloseShift` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`IntroToDB`@`localhost`*/ /*!50003 trigger DateTime1 before insert on CloseShift for each row set NEW.Date = NOW(), NEW.ClosingTime = NOW() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `CustomerDetails`
--

DROP TABLE IF EXISTS `CustomerDetails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CustomerDetails` (
  `SNO` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `TableNo` enum('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20') DEFAULT NULL,
  `NoofCovers` enum('1','2','3','4','5','6','7','8','9','10') DEFAULT NULL,
  `NoofPeople` int(10) NOT NULL,
  `NC` enum('YES','NO') DEFAULT NULL,
  `DateTime` datetime DEFAULT NULL,
  PRIMARY KEY (`SNO`),
  UNIQUE KEY `SNO` (`SNO`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CustomerDetails`
--

LOCK TABLES `CustomerDetails` WRITE;
/*!40000 ALTER TABLE `CustomerDetails` DISABLE KEYS */;
INSERT INTO `CustomerDetails` VALUES (1,'VenuMadhav','1','1',1,'NO','2014-11-09 02:25:10');
/*!40000 ALTER TABLE `CustomerDetails` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`IntroToDB`@`localhost`*/ /*!50003 trigger DateTime7 before insert on CustomerDetails for each row set New.DateTime = NOW() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `Employees`
--

DROP TABLE IF EXISTS `Employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Employees` (
  `Name` varchar(100) NOT NULL,
  `Designation` varchar(100) NOT NULL,
  `Employee_id` varchar(10) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Mobile` varchar(10) NOT NULL,
  `Alternate_Mobile` varchar(10) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Employee_id`),
  UNIQUE KEY `Employee_id` (`Employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Employees`
--

LOCK TABLES `Employees` WRITE;
/*!40000 ALTER TABLE `Employees` DISABLE KEYS */;
INSERT INTO `Employees` VALUES ('VenuMadhav','Manager','MAD123','fcvolb','9852147630','9874563210','venumadhav.kattagoni@gmail.com');
/*!40000 ALTER TABLE `Employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Items`
--

DROP TABLE IF EXISTS `Items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Items` (
  `ItemCode` varchar(10) NOT NULL,
  `ItemName` varchar(100) NOT NULL,
  `Type` enum('VEG TANDOORI','VEGETARIAN SALAD','NON VEG SALAD','VELETABLE SOUPS','NON VEG SOUPS','CHINESE VEG STARTERS','CHINESE NON VEG STARTERS','SOUTH INDIAN NON VEG STARTERS','SOUTH INDIAN NON VEG STARTERS','INDIAN CURRIES FROM SEA & RIVE','CHOICE OF INDIAN CHICKEN','CHOICE OF INDIAN MUTTON','CHOICE OF INDIAN VEGETARIAN','CHINESE NON VEG MAIN COURSE','CHINESE VEG MAIN COURSE','LENTILS','TRADITIONAL NON VEG BIRYAANIS','INDIAN VEG BIRYANI, PULAO, RICE','NON VEG CHINESE RICE & NOODLES','VEG CHINESE RICE & NOODLES','INDIAN BREADS','DESSERT','OTHERS','SOFT DRINK') DEFAULT NULL,
  `Rate` float(10,2) NOT NULL,
  `Tax` float(4,2) DEFAULT NULL,
  `Discount` float(4,2) DEFAULT NULL,
  `NC` float(4,2) DEFAULT NULL,
  PRIMARY KEY (`ItemCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Items`
--

LOCK TABLES `Items` WRITE;
/*!40000 ALTER TABLE `Items` DISABLE KEYS */;
INSERT INTO `Items` VALUES ('1234','mad','VEG TANDOORI',12.00,12.00,12.00,NULL),('123456','kaju','VEG TANDOORI',7.00,7.00,7.00,0.00);
/*!40000 ALTER TABLE `Items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `OpenBillingOutlet`
--

DROP TABLE IF EXISTS `OpenBillingOutlet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `OpenBillingOutlet` (
  `AccountingDate` date DEFAULT NULL,
  `Employee_id` varchar(10) NOT NULL,
  `SessionStartTime` time DEFAULT NULL,
  `OpeningAmount` float(20,4) NOT NULL,
  KEY `Employee_id` (`Employee_id`),
  CONSTRAINT `OpenBillingOutlet_ibfk_1` FOREIGN KEY (`Employee_id`) REFERENCES `Employees` (`Employee_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `OpenBillingOutlet`
--

LOCK TABLES `OpenBillingOutlet` WRITE;
/*!40000 ALTER TABLE `OpenBillingOutlet` DISABLE KEYS */;
/*!40000 ALTER TABLE `OpenBillingOutlet` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`IntroToDB`@`localhost`*/ /*!50003 trigger DateTime3 before insert on OpenBillingOutlet for each row set New.AccountingDate = NOW(), New.SessionStartTime = NOW() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `OpenShift`
--

DROP TABLE IF EXISTS `OpenShift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `OpenShift` (
  `Date` date DEFAULT NULL,
  `Employee_id` varchar(10) NOT NULL,
  `OpeningTime` time DEFAULT NULL,
  KEY `Employee_id` (`Employee_id`),
  CONSTRAINT `OpenShift_ibfk_1` FOREIGN KEY (`Employee_id`) REFERENCES `Employees` (`Employee_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `OpenShift`
--

LOCK TABLES `OpenShift` WRITE;
/*!40000 ALTER TABLE `OpenShift` DISABLE KEYS */;
INSERT INTO `OpenShift` VALUES ('2014-11-09','MAD123','03:31:14');
/*!40000 ALTER TABLE `OpenShift` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`IntroToDB`@`localhost`*/ /*!50003 trigger DateTime before insert on OpenShift for each row set NEW.Date = NOW(), NEW.OpeningTime = NOW() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `OrderEntry`
--

DROP TABLE IF EXISTS `OrderEntry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `OrderEntry` (
  `Customer_id` int(11) DEFAULT NULL,
  `ItemCode` varchar(10) DEFAULT NULL,
  `Qunatity` int(11) NOT NULL,
  `PricePerUnit` float(5,2) NOT NULL,
  `ModificationsInDish` varchar(1000) DEFAULT NULL,
  `ModificationsPrice` float(5,2) DEFAULT NULL,
  `FinalItemPrice` float(10,2) NOT NULL,
  `Discount` float(5,2) DEFAULT NULL,
  `NetPrice` float(10,3) NOT NULL,
  KEY `Customer_id` (`Customer_id`),
  KEY `ItemCode` (`ItemCode`),
  CONSTRAINT `OrderEntry_ibfk_1` FOREIGN KEY (`Customer_id`) REFERENCES `CustomerDetails` (`SNO`) ON UPDATE CASCADE,
  CONSTRAINT `OrderEntry_ibfk_2` FOREIGN KEY (`ItemCode`) REFERENCES `Items` (`ItemCode`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `OrderEntry`
--

LOCK TABLES `OrderEntry` WRITE;
/*!40000 ALTER TABLE `OrderEntry` DISABLE KEYS */;
INSERT INTO `OrderEntry` VALUES (1,'123456',1,12.00,'NOthing',0.00,12.00,0.00,12.000),(1,'123456',3,100.00,'dsgfdf',0.00,300.00,10.00,270.000);
/*!40000 ALTER TABLE `OrderEntry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Payment`
--

DROP TABLE IF EXISTS `Payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Payment` (
  `BillNo` int(11) NOT NULL AUTO_INCREMENT,
  `Customer_id` int(11) DEFAULT NULL,
  `TotalAmount` float(20,4) NOT NULL,
  `ServiceTax` float(5,2) NOT NULL,
  `ModeOfpayment` enum('CASH','CARD') DEFAULT NULL,
  PRIMARY KEY (`BillNo`),
  UNIQUE KEY `BillNo` (`BillNo`),
  KEY `Customer_id` (`Customer_id`),
  CONSTRAINT `Payment_ibfk_1` FOREIGN KEY (`Customer_id`) REFERENCES `CustomerDetails` (`SNO`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Payment`
--

LOCK TABLES `Payment` WRITE;
/*!40000 ALTER TABLE `Payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `Payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PhysicalStockEntry`
--

DROP TABLE IF EXISTS `PhysicalStockEntry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PhysicalStockEntry` (
  `ItemCode` varchar(10) NOT NULL,
  `ItemValuePerUnit` float(5,2) NOT NULL,
  `QuantityInStore` int(10) NOT NULL,
  `TotalValue` int(10) NOT NULL,
  PRIMARY KEY (`ItemCode`),
  UNIQUE KEY `ItemCode` (`ItemCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PhysicalStockEntry`
--

LOCK TABLES `PhysicalStockEntry` WRITE;
/*!40000 ALTER TABLE `PhysicalStockEntry` DISABLE KEYS */;
INSERT INTO `PhysicalStockEntry` VALUES ('1212325445',23.00,23,0),('123',2.00,2,0),('123456',3.00,4,100),('1235',3.00,3,9),('123565',45.00,10,450);
/*!40000 ALTER TABLE `PhysicalStockEntry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PurchaseOrder`
--

DROP TABLE IF EXISTS `PurchaseOrder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PurchaseOrder` (
  `PurchaseOrder_id` int(10) NOT NULL AUTO_INCREMENT,
  `PODate` date DEFAULT NULL,
  `Vendor` varchar(100) NOT NULL,
  `POValue` float(5,2) NOT NULL,
  `DeliveryDate` varchar(10) NOT NULL,
  `PaymentTerms` varchar(200) DEFAULT NULL,
  `Authorization` varchar(100) DEFAULT NULL,
  `Employee_id` varchar(10) DEFAULT NULL,
  `status` enum('TO BE DELIVERED','PENDING','DELIVERED') DEFAULT NULL,
  UNIQUE KEY `PurchaseOrder_id` (`PurchaseOrder_id`),
  KEY `Employee_id` (`Employee_id`),
  CONSTRAINT `PurchaseOrder_ibfk_1` FOREIGN KEY (`Employee_id`) REFERENCES `Employees` (`Employee_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PurchaseOrder`
--

LOCK TABLES `PurchaseOrder` WRITE;
/*!40000 ALTER TABLE `PurchaseOrder` DISABLE KEYS */;
/*!40000 ALTER TABLE `PurchaseOrder` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`IntroToDB`@`localhost`*/ /*!50003 trigger DateTime5 before insert on PurchaseOrder for each row set New.PODate = NOW() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `PurchaseRequisition`
--

DROP TABLE IF EXISTS `PurchaseRequisition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PurchaseRequisition` (
  `RequisitonDate` date DEFAULT NULL,
  `Department` enum('KITCHEN','MANGEMENT') DEFAULT NULL,
  `Requisition_Reference` varchar(100) DEFAULT NULL,
  `CreatedBy` varchar(100) DEFAULT NULL,
  `Authorization` varchar(100) DEFAULT NULL,
  KEY `Authorization` (`Authorization`),
  CONSTRAINT `PurchaseRequisition_ibfk_1` FOREIGN KEY (`Authorization`) REFERENCES `Employees` (`Employee_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PurchaseRequisition`
--

LOCK TABLES `PurchaseRequisition` WRITE;
/*!40000 ALTER TABLE `PurchaseRequisition` DISABLE KEYS */;
/*!40000 ALTER TABLE `PurchaseRequisition` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`IntroToDB`@`localhost`*/ /*!50003 trigger DateTime6 before insert on PurchaseRequisition for each row set New.RequisitonDate = NOW() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `Transactions`
--

DROP TABLE IF EXISTS `Transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Transactions` (
  `ItemCode` varchar(10) DEFAULT NULL,
  `Transaction_id` varchar(100) NOT NULL,
  `STORE` enum('KITCHEN','MANAGEMENT') DEFAULT NULL,
  `Item_Name` varchar(100) NOT NULL,
  `Quantity` int(10) NOT NULL,
  `PricePerUnit` float(10,2) NOT NULL,
  `TotalPrice` float(20,2) NOT NULL,
  KEY `ItemCode` (`ItemCode`),
  CONSTRAINT `Transactions_ibfk_1` FOREIGN KEY (`ItemCode`) REFERENCES `PhysicalStockEntry` (`ItemCode`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Transactions`
--

LOCK TABLES `Transactions` WRITE;
/*!40000 ALTER TABLE `Transactions` DISABLE KEYS */;
INSERT INTO `Transactions` VALUES ('123456','645656','KITCHEN','dgfdgf',5,6677.00,33385.00);
/*!40000 ALTER TABLE `Transactions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-09 13:05:29
