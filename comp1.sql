CREATE DATABASE CompaniasTelefonicas;
USE CompaniasTelefonicas;

# Creando tablas 
CREATE TABLE Cliente (
  NIF VARCHAR(50) NOT NULL PRIMARY KEY,
  apellido VARCHAR(50),
  nombre VARCHAR(50),
  direccion VARCHAR(50)
);

CREATE TABLE Linea (
  num_telefono INT NOT NULL PRIMARY KEY,
  # foreign key Cliente_NIF
  tipo_linea VARCHAR(50)
);

CREATE TABLE Servicio_de_lineas (
  # foreing key, linea_num_telefono : num al que pertenece la lista de servicio
  # foreing key, servicio_idservicio
);

#fixme, no ejecuta el float ???
CREATE TABLE Servicio (
  idservicio INTEGER UNSIGNED NOT NULL PRIMARY KEY,
  nombre VARCHAR(50) NULL,
  descripcion VARCHAR(50) NULL,
  costo FLOAT(6,2) # costo puede ser de hsata 9999.99
);

CREATE TABLE Llamada (
  id_llamada int NOT NULL PRIMARY KEY AUTO_INCREMENT, # Contador de llamada
  #foreing key, Linea_num_telefono : Linea que realiza la llamada
  num_destino INT
);

CREATE TABLE Franja_horaria (
  id_franja INTEGER UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  rango_dias VARCHAR(50) NULL,
  hora_fin TIME NULL,
  hora_inicio TIME NULL,
  descripcion VARCHAR(50) NULL,
  rango_llamada VARCHAR(50) NULL
);

CREATE TABLE Linea_tiene_tarifa (
  Linea_num_telefono INT NOT NULL,
  tarifa_idtarifa INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(Linea_num_telefono, tarifa_idtarifa),
  INDEX linea_has_tarifa_FKIndex1(Linea_num_telefono),
  INDEX linea_has_tarifa_FKIndex2(tarifa_idtarifa)
);

# Droping tables
DROP TABLE Cliente
DROP TABLE Linea