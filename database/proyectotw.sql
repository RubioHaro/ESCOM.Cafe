-- MySQL dump 10.13  Distrib 8.0.12, for Win64 (x86_64)
--
-- Host: localhost    Database: proyectotw
-- ------------------------------------------------------
-- Server version	8.0.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `carrito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categorias`
--

DROP TABLE IF EXISTS `categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `imagen` varchar(400) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'Mujeres','Ropar para dama','women.jpg'),(2,'Hombres','Ropa para hombre','men.jpg'),(3,'Niños','Ropa para niños','children.jpg');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(300) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` double NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `inventario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'Tank Top','Finding perfect t-shirt',60,'cloth_1.jpg',23,3),(2,'Corater','Finding perfect products',20,'shoe_1.jpg',0,2),(103,'Producto 0','Esta es la descripcion',954,'cloth_1.jpg',21,1),(104,'Producto 1','Esta es la descripcion',130,'cloth_1.jpg',90,1),(105,'Producto 2','Esta es la descripcion',682,'cloth_1.jpg',72,1),(106,'Producto 3','Esta es la descripcion',963,'cloth_1.jpg',96,1),(107,'Producto 4','Esta es la descripcion',574,'cloth_1.jpg',77,1),(108,'Producto 5','Esta es la descripcion',806,'cloth_1.jpg',99,1),(109,'Producto 6','Esta es la descripcion',549,'cloth_1.jpg',26,1),(110,'Producto 7','Esta es la descripcion',794,'cloth_1.jpg',92,1),(111,'Producto 8','Esta es la descripcion',219,'cloth_1.jpg',44,1),(112,'Producto 9','Esta es la descripcion',723,'cloth_1.jpg',49,1),(113,'Producto 10','Esta es la descripcion',596,'cloth_1.jpg',93,1),(114,'Producto 11','Esta es la descripcion',221,'cloth_1.jpg',84,1),(115,'Producto 12','Esta es la descripcion',991,'cloth_1.jpg',38,1),(116,'Producto 13','Esta es la descripcion',385,'cloth_1.jpg',15,1),(117,'Producto 14','Esta es la descripcion',348,'cloth_1.jpg',85,1),(118,'Producto 15','Esta es la descripcion',986,'cloth_1.jpg',41,1),(119,'Producto 16','Esta es la descripcion',882,'cloth_1.jpg',55,1),(120,'Producto 17','Esta es la descripcion',850,'cloth_1.jpg',80,1),(121,'Producto 18','Esta es la descripcion',674,'cloth_1.jpg',11,1),(122,'Producto 19','Esta es la descripcion',499,'cloth_1.jpg',4,1),(123,'Producto 20','Esta es la descripcion',685,'cloth_1.jpg',6,1),(124,'Producto 21','Esta es la descripcion',343,'cloth_1.jpg',87,1),(125,'Producto 22','Esta es la descripcion',792,'cloth_1.jpg',82,1),(126,'Producto 23','Esta es la descripcion',42,'cloth_1.jpg',11,1),(127,'Producto 24','Esta es la descripcion',33,'cloth_1.jpg',46,1),(128,'Producto 25','Esta es la descripcion',522,'cloth_1.jpg',65,1),(129,'Producto 26','Esta es la descripcion',194,'cloth_1.jpg',31,1),(130,'Producto 27','Esta es la descripcion',279,'cloth_1.jpg',47,1),(131,'Producto 28','Esta es la descripcion',750,'cloth_1.jpg',64,1),(132,'Producto 29','Esta es la descripcion',673,'cloth_1.jpg',41,1),(133,'Producto 30','Esta es la descripcion',939,'cloth_1.jpg',57,1),(134,'Producto 31','Esta es la descripcion',986,'cloth_1.jpg',38,1),(135,'Producto 32','Esta es la descripcion',325,'cloth_1.jpg',48,1),(136,'Producto 33','Esta es la descripcion',443,'cloth_1.jpg',89,1),(137,'Producto 34','Esta es la descripcion',600,'cloth_1.jpg',67,1),(138,'Producto 35','Esta es la descripcion',828,'cloth_1.jpg',39,1),(139,'Producto 36','Esta es la descripcion',264,'cloth_1.jpg',52,1),(140,'Producto 37','Esta es la descripcion',104,'cloth_1.jpg',48,1),(141,'Producto 38','Esta es la descripcion',208,'cloth_1.jpg',6,1),(142,'Producto 39','Esta es la descripcion',156,'cloth_1.jpg',80,1),(143,'Producto 40','Esta es la descripcion',195,'cloth_1.jpg',60,1),(144,'Producto 41','Esta es la descripcion',821,'cloth_1.jpg',21,1),(145,'Producto 42','Esta es la descripcion',93,'cloth_1.jpg',6,1),(146,'Producto 43','Esta es la descripcion',441,'cloth_1.jpg',71,1),(147,'Producto 44','Esta es la descripcion',833,'cloth_1.jpg',25,1),(148,'Producto 45','Esta es la descripcion',174,'cloth_1.jpg',87,1),(149,'Producto 46','Esta es la descripcion',582,'cloth_1.jpg',93,1),(150,'Producto 47','Esta es la descripcion',989,'cloth_1.jpg',24,1),(151,'Producto 48','Esta es la descripcion',578,'cloth_1.jpg',37,1),(152,'Producto 49','Esta es la descripcion',299,'cloth_1.jpg',30,1);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos_venta`
--

DROP TABLE IF EXISTS `productos_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `productos_venta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `precio` double NOT NULL,
  `subtotal` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos_venta`
--

LOCK TABLES `productos_venta` WRITE;
/*!40000 ALTER TABLE `productos_venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `productos_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `saldo_electronico`
--

DROP TABLE IF EXISTS `saldo_electronico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `saldo_electronico` (
  `id_saldo` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  PRIMARY KEY (`id_saldo`),
  KEY `id_usuario_idx` (`id_usuario`),
  CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `saldo_electronico`
--

LOCK TABLES `saldo_electronico` WRITE;
/*!40000 ALTER TABLE `saldo_electronico` DISABLE KEYS */;
INSERT INTO `saldo_electronico` VALUES (1,1,138);
/*!40000 ALTER TABLE `saldo_electronico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) NOT NULL,
  `telefono` varchar(200) NOT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nivel` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Fernando Hernandez','5511223344','5511223344','ejemplo@ejemplo.com','123','Cliente');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `total` double NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` varchar(100) DEFAULT 'Pendiente',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voucher`
--

DROP TABLE IF EXISTS `voucher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `voucher` (
  `id_voucher` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  `estado` varchar(100) DEFAULT 'Pendiente',
  `voucher` varchar(400) NOT NULL,
  PRIMARY KEY (`id_voucher`),
  KEY `id_usuario_idx` (`id_usuario`),
  CONSTRAINT `id_user` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voucher`
--

LOCK TABLES `voucher` WRITE;
/*!40000 ALTER TABLE `voucher` DISABLE KEYS */;
/*!40000 ALTER TABLE `voucher` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-18 18:59:30
