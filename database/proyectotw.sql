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
INSERT INTO `categorias` VALUES (1,'Café','Variedad de Cafés','women.jpg'),
(2,'Bebidas Calientes','Bebidas Ricas y Sanas','men.jpg'),
(3,'Metodos Artesanales','BEBIDAS PREPARADAS CON PRECISIÓN Y CUIDADO DE NUESTROS BARISTAS','children.jpg'),
(4,'Bebidas Frías','Para el Calor','men.jpg'),
(5,'Postres','Ricos','men.jpg'),
(6,'PANQUÉS/GALLETAS/SCONES','xxx','children.jpg'),
(7,'SANDWICHES','Ricos SANDWICHES','men.jpg'),
(8,'CAFÉ EN GRANO/PARA LA CASA','Para llevar el café','men.jpg'),
(9,'HAMBURGUESAS','Ricas Hamburgesas','men.jpg'),
(10,'Para Comer Aquí','Ricos','men.jpg');
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
INSERT INTO `productos` VALUES (1,'Hamburgesa BBQ','Un rica hamburguesa con carne a la parrilla cubierta de salsa BBQ +Papas',80,'hamburgesa.jpg',50,9),
(2,'Expresso','60 ml de espresso. Dulce con un acidez ligero',40,'expresso.jpg',50,1),
(3,'Cortado','Espresso con leche texturizada 180 ml.',48,'cafe.png',50,1),
(4,'CHIQUITITO','Leche condensada, espresso y leche texturizada 240 ml.',50,'cafe.png',50,1),
(5,'Americano','Espresso con agua caliente 360 ml.',48,'americano.jpg',50,1),
(6,'Cappuccino','Espresso con leche texturizada 360 ml.',55,'cappuccino.jpg',50,1),
(7,'Latte','Espresso con leche texturizada 480 ml.',58,'latte.jpg',50,1),
(8,'Café con Leche','Espresso con agua caliente, y leche texturizada 480 ml.',55,'cafe.png',50,1),
(9,'Latte Vainilla','Espresso, vainilla, y leche texturizada 480 ml.',60,'latte.jpg',50,1),
(10,'Mocha','Espresso, chocolate y leche texturizada 480 ml.',60,'cafe.png',50,1),
(11,'Latte Caramelo','Espresso, caramelo y leche texturizada 480 ml.',60,'cafe.png',50,1),
-- Bebidas Calientes
(12,'Matcha Latte Puro','Matcha latte hecho con matcha puro 480 ml.',65,'cafe.png',50,2),
(13,'Matcha Latte Dulce','Matcha latte hecho con matcha poquito endulzado 480 ml.',65,'cafe.png',50,2),
(14,'Doradita','Bebida con mezcla de especias con base de curcuma 360 ml.',60,'cafe.png',60,2),
(15,'Betabel Latte','Bebida con mezcla de especias con base de betabel 360 ml.',60,'cafe.png',60,2),
(16,'Té','Escojes el tipo de té. Té Verde, de Manzanilla, de Manzana o Limón',50,'cafe.png',50,2),
(17,'Chocolate Caliente','Chocolate estilo oaxaqueno con leche texturizada 480 ml.',60,'cafe.png',60,2),
(18,'Chai Dulce','Base de chai poco endulzado con leche texturizada 480 ml.',65,'cafe.png',50,2),
(19,'Chai Masala','Chai natural de especies 360 ml.',60,'cafe.png',55,2),
(20,'Chai Espresso','Base de chai poco endulzado, leche texturizada y espresso 480 ml.',70,'cafe.png',50,2),
(21,'Babyccino','Leche texturizada con sabor a tu elección 240 ml.',40,'cafe.png',50,2),
-- Metodos Artesanales
(22,'Aeropress','Café hecho en manera artesanal en el Aeropress 300 ml.',50,'artesanal.png',50,3),
(23,'Chemex','Café hecho en manera artesanal en el Chemex 300 ml.',50,'artesanal.png',3,2),
(24,'Prensa Francesa','Café hecho en manera artesanal en el Prensa Francesa 300 ml.',50,'artesanal.png',50,3),
(25,'Pour Over V60','Café hecho en manera artesanal en el Hario v60 300 ml.',50,'artesanal.png',50,3),
-- Bebidas Frías
(26,'Cold Brew','Extracción en frío de café, el extracto mezclado con agua 480 ml.',50,'coldbrew.png',3,4),
(27,'Botella Cold Brew','Extracto puro de café 250 ml.',150,'BotellaColdBrew.png',3,4),
(28,'Espresso Tonic','Extracto puro de café 250 ml.',65,'coldrinks.png',3,4),
(29,'Latte Frío en Botella','Latte frío en botella para tomar en casa con gusto 500ml.',90,'coldrinks.png',3,4),
(30,'Chocolate Frío','Chocolate estilo oxacaqueno con leche fría 480 ml.',60,'coldchocolate.png',3,4),
(31,'Latte Frio','Latte hecho con espresso o cold brew con leche 480 ml.',58,'coldrinks.png',3,4),
(32,'Chai Dulce Frío','Base de Chai poco endulzado con leche fría 480 ml.',65,'coldrinks.png',3,4),
(33,'Chai Masala Latte Frío','Chai natural de especies 480 ml.',60,'latte.png',3,2),
(34,'Matcha Frío','Matcha latte hecho con matcha poquito endulzado 480 ml.',65,'coldrinks.png',3,4),
(35,'Frappé Cappuccino','Base frappé café con espresso, leche y hielos 480 ml.',70,'frapucchino.png',3,4),
(36,'Frappé Chai','Base frappé chai con leche y hielos 480 ml.',70,'coldrinks.png',3,4),
(37,'Frappé Matcha','Base frappé matcha con leche y hielos 480 ml.',70,'coldrinks.png',3,4),
(38,'Topo Chico','Topo Chico Mineral 355 ml',35,'coldrinks.png',3,4),
(39,'Dominga Kombucha','Refréscate con una deliciosa Dominga de jengibre',105,'kombucha.png',3,4),
-- POSTRES
(40,'Pudín de Chía','Pudin de chía con leche de coco, toque de miel y frutos rojos',60,'ychia.png',3,5),
(41,'Yoghurt Orgánico con Granola','Yoghurt orgánico, frutos rojos y granola de la casa.',55,'granola.png',3,5),
(42,'Arroz con 3 Leches','Delicioso arroz con 3 Leches',55,'postres.png',3,5),
(43,'Gelatina de Queso','Gelatina de Queso con Nuez',50,'queso.png',3,5),
(44,'Pay de Limón con Merengue','Pay de limón con merengue.',55,'postres.png',3,5),
(45,'Gajos de Toronja','Gajos de Toronja',45,'postres.png',3,5),
-- Panques
(46,'Panqué de Plátano Rebanada','Panqué de Plátano Rebanada',45,'postres.png',3,6),
(47,'Panqué de Matcha Rebanada','Panqué de Matcha Rebanada',55,'postres.png',3,6),
(48,'Panqué de Nata Rebanada','Panqué de Nata Rebanada',45,'postres.png',3,6),
(49,'Panqué de yoghurt, limón y cardamomo rebanada.','Panqué de yoghurt, limón y cardamomo rebanada.',45,'postres.png',3,6),
(50,'Panqué de Plátano Completa','Panqué de Plátano Completa - pedir con un día de anticipación',270,'postres.png',3,6),
(51,'Panqué de Matcha Completa','Panqué de Matcha Completa - pedir con un día de anticipación',300,'postres.png',3,6),
(52,'Panqué de Nata Completa','Panqué de Nata Completa - pedir con un día de anticipación',270,'postres.png',3,6),
(53,'Panqué de yoghurt, limón y cardamomo completa.','Panqué de yoghurt, limón y cardamomo completa - pedir con un día de anticipación',270,'postres.png',3,6),
(54,'Galleta Chispas de Chocolate','Galleta chispas de chocolate.',30,'postres.png',3,6),
(55,'Galleta de Avena','Nutritiva Galleta de avena',25,'postres.png',3,6),
(56,'Galleta de Dulce de Leche','Galleta de dulce de Leche.',30,'postres.png',3,6),
(57,'Galleta de Nutella','Galleta de Nutella',30,'postres.png',3,6),
(58,'Galletas de Nuez','Galleta de Nuez',40,'postres.png',3,6),
(59,'Scones','Ricos Bollos con Mermelada',45,'scones.png',3,6),
-- SANDWICHES
(60,'Club Sandwich','Sandwich de jamón y queso amarillo acompañado con papas',120,'clubsandwich.jpg',50,7),
(61,'Pan de Granos Aguacate','Pan de granos, aguacate, arúgula, queso feta, chile seco, aceite de oliva, y sal de mar.',120,'GranosAguacate.jpg',50,7),
(62,'Pan de Granos Hummus','Pan de granos, hummus, arúgula, aceite de oliva, jitomate y sal de mar.',105,'sandwitch.jpg',50,7),
(63,'Croissant con Jamón de Pavo','Rico Croissant Caliente con Jamón de Pavo y queso amarillo',75,'Croissant.png',50,7),
(64,'Pan Blanco','Pan blanco con jamón de pavo, panela, tomate, lechuga y mayonesa chipotle.',110,'Sandwiches.png',50,7),
(65,'Bagel de Salmón','Bagel, salmón, alcaparras y queso crema.',115,'Bagel.png',50,7),
(66,'Ciabatta Queso de Cabra','Ciabatta con queso de cabra, pepino y tapenade.',95,'Sandwiches.png',50,7),
(67,'Baguette Tomates Rojos','Baguette con tomates rojos, mozzarella fresco y pesto de la casa.',100,'Baguette.png',50,7),
(68,'Baguette de Jamón Serrano','Baguette con jamón serrano, queso brie, mostaza dijon, aguacate, lechuga y aceite oliva.',125,'Baguette.png',50,7),
-- CAFE en GRANO
(69,'Espresso Boca Del Monte - Café en Grano','Este es el café que usamos para nuestro espresso. viene del boca del monte, veracruz, es dulce, con una
acidez presente, con notas de chocolate, almendra, y miel, es muy versátil, lo puedes usar para todos los
métodos de preparación de café.',150,'bocamonte.png',50,8),
(70,'Café con Jiribilla Veracruz','Del productor Marco Córdoba tenemos un café de un micro lote de la Finca Corahe, en Zentla, Veracruz, es
café natural, secado en camas, de la variedad sarchimor, notas de sabor: caramelo, fresa y chocolate. Café
con Jiribilla es el proyecto de Carlos de la Torre.',195,'jiribilla.png',50,8),
(71,'Café con Jiribilla Oaxaca','Del productor Salvador Moreno tenemos un café de la Finca el Zacatal, en Santa Cruz Acatepec, Oaxaca, es
una mezcla de los variedades typica y bourbon, con un proceso lavado, que típicamente deja una taza muy
fresca y limpia en la boca, notas de sabor: toronja deshidratada, flor de naranja y ciruel',195,'jiribilla.png',50,8),
(72,'Café Finca Las Nieves','Este café es un bourbon natural, con notas de sabor: Cacao obscuro, cereza, fresa',175,'grano.png',50,8),
(73,'Granola de la Casa','Una bolsa de 250 gramos de nuestra granola hecha en casa',100,'grano.png',50,8),
(74,'Mama Pacha Chocolate en Barra','Mamá Pacha chocolate artesanal, Ingredientes: 75% cacao nativo, azúcar de coco 70 gramos',125,'mamapacha.png',50,8),
(75,'Tote Bag Chiquitito','Chiquito cafe especial',250,'grano.png',50,8),
-- Para comer aqui
(101,'Taquitos','Una rica orden de taquitos',20,'taquitos.jpg',3,10),
(102,'Flautas','Orden de Falutas con lechugas',20,'flautas.jpg',3,10),
(104,'Tortas ESCOM','Torta con todo',20,'torta.jpg',3,10),
(105,'Alambre ESCOM','Super alabre de bistec. Receta secreta ESCOM',20,'alambre.jpg',3,10);
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
