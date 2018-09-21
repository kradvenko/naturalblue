--Primera subida al servidor
--23/08/2018

CREATE TABLE `almacenes` (
  `idalmacen` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `tipo` varchar(4) DEFAULT NULL,
  `prefijo` varchar(5) DEFAULT NULL,
  `nombretabla` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idalmacen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `distribuidores` (
  `iddistribuidor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidopaterno` varchar(45) DEFAULT NULL,
  `apellidomaterno` varchar(45) DEFAULT NULL,
  `calle` varchar(200) DEFAULT NULL,
  `numinterior` varchar(15) DEFAULT NULL,
  `numexterior` varchar(15) DEFAULT NULL,
  `entrecalles` varchar(100) DEFAULT NULL,
  `colonia` varchar(150) DEFAULT NULL,
  `ciudad` varchar(150) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `codigopostal` varchar(5) DEFAULT NULL,
  `telefonoparticular` varchar(45) DEFAULT NULL,
  `telefonocelular` varchar(45) DEFAULT NULL,
  `banco` varchar(30) DEFAULT NULL,
  `clabe` varchar(18) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `rfc` varchar(45) DEFAULT NULL,
  `dianacimiento` int(11) DEFAULT NULL,
  `mesnacimiento` int(11) DEFAULT NULL,
  `anonacimiento` int(11) DEFAULT NULL,
  `curp` varchar(45) DEFAULT NULL,
  `ine` varchar(45) DEFAULT NULL,
  `beneficiario` varchar(150) DEFAULT NULL,
  `fechacaptura` varchar(45) DEFAULT NULL,
  `tieneusuario` varchar(5) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`iddistribuidor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `productos` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `idcategoria` int(11) DEFAULT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `producto` varchar(150) DEFAULT NULL,
  `preciodistribuidor` float DEFAULT NULL,
  `iva` float DEFAULT NULL,
  `preciodistribuidoriva` float DEFAULT NULL,
  `preciopublico` float DEFAULT NULL,
  `valornegocio` int(11) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `idusuariocaptura` int(11) DEFAULT NULL,
  `fechacaptura` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `relacion` (
  `idrelacion` int(11) NOT NULL AUTO_INCREMENT,
  `idpatrocinadororiginal` int(11) DEFAULT NULL,
  `idpatrocinador` int(11) DEFAULT NULL,
  `iddistribuidor` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idrelacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tiendas` (
  `idtienda` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `prefijo` varchar(5) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `idmatriz` int(11) DEFAULT NULL,
  `nombretabla` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idtienda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tpc_almacen1` (
  `idalmacenproducto` int(11) NOT NULL AUTO_INCREMENT,
  `idproducto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `cantidadminima` int(11) DEFAULT NULL,
  PRIMARY KEY (`idalmacenproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tpc_almacen2` (
  `idalmacenproducto` int(11) NOT NULL AUTO_INCREMENT,
  `idproducto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`idalmacenproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `tpc_tienda1` (
  `idtiendaproducto` int(11) NOT NULL AUTO_INCREMENT,
  `idproducto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`idtiendaproducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `iddistribuidor` int(11) DEFAULT NULL,
  `idtienda` int(11) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `pass` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--09/09/2018
CREATE TABLE `ventas` (
  `idventa` int(11) NOT NULL AUTO_INCREMENT,
  `idtienda` int(11) DEFAULT NULL,
  `iddistribuidor` int(11) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `totalventa` float DEFAULT NULL,
  `totalpuntos` int(11) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idventa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



  CREATE TABLE `detalleventa` (
  `iddetalleventa` INT NOT NULL AUTO_INCREMENT,
  `idventa` INT NULL,
  `idproducto` INT NULL,
  `cantidad` INT NULL,
  `precio` FLOAT NULL,
  `puntos` INT NULL,
  `total` FLOAT NULL,
  PRIMARY KEY (`iddetalleventa`));

CREATE TABLE `categorias` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) DEFAULT NULL,
  `idusuariocaptura` int(11) DEFAULT NULL,
  `fechacaptura` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


