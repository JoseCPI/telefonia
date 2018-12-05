# Host: localhost  (Version 5.5.5-10.1.37-MariaDB)
# Date: 2018-12-04 22:41:09
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "cliente"
#

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
  `id_cliente` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `NIF` varchar(50) NOT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

#
# Data for table "cliente"
#

INSERT INTO `cliente` VALUES (1,'END123O','Joestar','Johnny','end of the world'),(2,'HRD256S','Perez','Jesus','little china 54'),(3,'SSS965S','Uchida','Maya','coffe shop 3'),(5,'HJK654M','Leyva','Roberto','Fundadores 123');

#
# Structure for table "linea"
#

DROP TABLE IF EXISTS `linea`;
CREATE TABLE `linea` (
  `id_linea` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `num_telefono` varchar(10) NOT NULL DEFAULT '0',
  `id_cliente` int(11) unsigned DEFAULT NULL,
  `tipo_linea` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_linea`),
  UNIQUE KEY `num_telefono` (`num_telefono`),
  KEY `idcliente` (`id_cliente`),
  CONSTRAINT `idcliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

#
# Data for table "linea"
#

INSERT INTO `linea` VALUES (1,'6623547896',1,'Movil'),(2,'6658964587',1,'Fija'),(3,'6657998547',3,'Fija'),(4,'6654256541',5,'Fija'),(5,'6653856312',2,'Fija'),(7,'6621458545',3,'Fija'),(8,'6625369685',5,'Movil');

#
# Structure for table "llamada"
#

DROP TABLE IF EXISTS `llamada`;
CREATE TABLE `llamada` (
  `id_llamada` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `num_destino` int(11) unsigned DEFAULT NULL,
  `num_saliente` int(11) unsigned DEFAULT NULL,
  `costo` float(5,2) DEFAULT '0.00',
  PRIMARY KEY (`id_llamada`),
  KEY `numSaliente` (`num_saliente`),
  KEY `numDestino` (`num_destino`),
  CONSTRAINT `numDestino` FOREIGN KEY (`num_destino`) REFERENCES `linea` (`id_linea`),
  CONSTRAINT `numSaliente` FOREIGN KEY (`num_saliente`) REFERENCES `linea` (`id_linea`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

#
# Data for table "llamada"
#

INSERT INTO `llamada` VALUES (1,2,3,2.52),(2,5,1,2.65),(3,1,8,1.10),(4,4,7,1.05),(5,7,5,1.03),(6,3,4,0.93),(7,8,2,1.02),(8,1,3,2.36),(9,8,4,0.25),(10,5,4,1.25);

#
# Structure for table "servicio"
#

DROP TABLE IF EXISTS `servicio`;
CREATE TABLE `servicio` (
  `idservicio` int(10) unsigned NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `costo` float(6,2) DEFAULT NULL,
  PRIMARY KEY (`idservicio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "servicio"
#

