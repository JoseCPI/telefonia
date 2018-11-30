# Host: localhost  (Version 5.5.5-10.1.37-MariaDB)
# Date: 2018-11-29 21:36:05
# Generator: MySQL-Front 6.1  (Build 1.26)


#
# Structure for table "cliente"
#

CREATE TABLE `cliente` (
  `NIF` varchar(50) NOT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`NIF`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "cliente"
#

INSERT INTO `cliente` VALUES ('END123O','Joestar','Johnny','end of the world'),('HRD256S','Perez','Jesus','little china 54'),('SSS965S','Uchida','Maya','coffe shop 3');

#
# Structure for table "linea"
#

CREATE TABLE `linea` (
  `num_telefono` varchar(10) NOT NULL DEFAULT '0',
  `nif_cliente` varchar(50) DEFAULT NULL,
  `tipo_linea` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`num_telefono`),
  KEY `id_cliente` (`nif_cliente`),
  CONSTRAINT `id_cliente` FOREIGN KEY (`nif_cliente`) REFERENCES `cliente` (`NIF`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "linea"
#

INSERT INTO `linea` VALUES ('6623547896','END123O','Movil'),('6658964587','END123O','Fija');

#
# Structure for table "llamada"
#

CREATE TABLE `llamada` (
  `id_llamada` int(11) NOT NULL AUTO_INCREMENT,
  `num_destino` varchar(10) DEFAULT NULL,
  `num_saliente` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_llamada`),
  KEY `numSaliente` (`num_saliente`),
  KEY `numDestino` (`num_destino`),
  CONSTRAINT `numDestino` FOREIGN KEY (`num_destino`) REFERENCES `linea` (`num_telefono`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `numSaliente` FOREIGN KEY (`num_saliente`) REFERENCES `linea` (`num_telefono`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "llamada"
#


#
# Structure for table "servicio"
#

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

