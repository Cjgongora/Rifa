/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.4.32-MariaDB : Database - rifas
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`rifas` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci */;

USE `rifas`;

/*Table structure for table `checkout` */

DROP TABLE IF EXISTS `checkout`;

CREATE TABLE `checkout` (
  `idcheckout` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(45) NOT NULL,
  `nombres` varchar(70) NOT NULL,
  `numero_cel` varchar(45) NOT NULL,
  `cant` int(45) DEFAULT NULL,
  `total` int(45) DEFAULT NULL,
  PRIMARY KEY (`idcheckout`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `checkout` */

/*Table structure for table `clientes` */

DROP TABLE IF EXISTS `clientes`;

CREATE TABLE `clientes` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(45) NOT NULL,
  `nombres` varchar(70) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `numero_cel` varchar(45) NOT NULL,
  `cant` varchar(45) NOT NULL,
  `sudtotal` varchar(45) NOT NULL,
  `iva` varbinary(45) NOT NULL,
  `total` varchar(45) NOT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `clientes` */

insert  into `clientes`(`idcliente`,`correo`,`nombres`,`direccion`,`numero_cel`,`cant`,`sudtotal`,`iva`,`total`) values 
(72,'x','x','x','2','3','$9,720','$2,280','$12,000'),
(73,'c','c','c','3','3','$9,720','$2,280','$12,000'),
(74,'d','d','d','43','3','$9,720','$2,280','$12,000'),
(75,'s','s','s','4','3','$9,720','$2,280','$12,000');

/*Table structure for table `numeros` */

DROP TABLE IF EXISTS `numeros`;

CREATE TABLE `numeros` (
  `numbers` varchar(45) NOT NULL,
  `idcliente` int(11) NOT NULL,
  KEY `fk_numeros_info_idx` (`idcliente`),
  CONSTRAINT `fk_numeros_info` FOREIGN KEY (`idcliente`) REFERENCES `clientes` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

/*Data for the table `numeros` */

insert  into `numeros`(`numbers`,`idcliente`) values 
('3818',72),
('8811',72),
('4162',72),
('9616',73),
('8101',73),
('7664',73),
('0563',74),
('2271',74),
('6882',74),
('7278',75),
('8289',75),
('5092',75);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
