--13/08/2018
CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `iddistribuidor` int(11) DEFAULT NULL,
  `idtienda` int(11) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `pass` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idusuario`));

CREATE TABLE `colonias` (
  `idcolonia` INT NOT NULL AUTO_INCREMENT,
  `idciudad` INT NULL,
  `colonia` VARCHAR(150) NULL,
  PRIMARY KEY (`idcolonia`));

CREATE TABLE `ciudades` (
`idciudad` INT NOT NULL AUTO_INCREMENT,
`idestado` INT NULL,
`ciudad` VARCHAR(100) NULL,
PRIMARY KEY (`idciudad`));

CREATE TABLE `estados` (
`idestado` INT NOT NULL AUTO_INCREMENT,
`estado` VARCHAR(45) NULL,
PRIMARY KEY (`idestado`));

CREATE TABLE `bancos` (
`idbanco` INT NOT NULL AUTO_INCREMENT,
`banco` VARCHAR(45) NULL,
PRIMARY KEY (`idbanco`));

CREATE TABLE `distribuidores` (
  `iddistribuidor` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `apellidopaterno` VARCHAR(45) NULL,
  `apellidomaterno` VARCHAR(45) NULL,
  `calle` VARCHAR(200) NULL,
  `numinterior` VARCHAR(15) NULL,
  `numexterior` VARCHAR(15) NULL,
  `entrecalles` VARCHAR(100) NULL,
  `idcolonia` INT NULL,
  `idciudad` INT NULL,
  `idestado` INT NULL,
  `codigopostal` VARCHAR(5) NULL,
  `telefonoparticular` VARCHAR(45) NULL,
  `telefonocelular` VARCHAR(45) NULL,
  `idbanco` INT NULL,
  `clabe` VARCHAR(18) NULL,
  `email` VARCHAR(45) NULL,
  `rfc` VARCHAR(45) NULL,
  `dianacimiento` INT NULL,
  `mesnacimiento` INT NULL,
  `anonacimiento` INT NULL,
  `curp` VARCHAR(45) NULL,
  `ine` VARCHAR(45) NULL,
  `beneficiario` VARCHAR(150) NULL,
  `fechacaptura` VARCHAR(45) NULL,
  PRIMARY KEY (`iddistribuidor`));

  CREATE TABLE `tiendas` (
  `idtienda` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `tipo` VARCHAR(45) NULL,
  `prefijo` VARCHAR(5) NULL,
  `estado` VARCHAR(45) NULL,
  `idmatriz` INT NULL,
  PRIMARY KEY (`idtienda`));

ALTER TABLE `distribuidores` 
CHANGE COLUMN `idcolonia` `colonia` VARCHAR(150) NULL DEFAULT NULL ,
CHANGE COLUMN `idciudad` `ciudad` VARCHAR(150) NULL DEFAULT NULL ,
CHANGE COLUMN `idestado` `estado` VARCHAR(20) NULL DEFAULT NULL ,
CHANGE COLUMN `idbanco` `banco` VARCHAR(30) NULL DEFAULT NULL ;

ALTER TABLE `distribuidores` 
ADD COLUMN `tieneusuario` VARCHAR(5) NULL AFTER `fechacaptura`;

