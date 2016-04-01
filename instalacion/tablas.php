<?php

/* TABLA CANCIONES */
$query = "CREATE TABLE IF NOT EXISTS `canciones` (
  `idCancion` int(9) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `duracion` int(9) NOT NULL,
  `idDisco` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=216 DEFAULT CHARSET=latin1;";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

/* TABLA CLIENTES */
$query = "CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int(9) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `contrasena` varchar(64) COLLATE utf8_spanish2_ci NOT NULL,
  `tema` varchar(35) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` int(9) DEFAULT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

/* TABLA CONCIERTO */
$query = "CREATE TABLE IF NOT EXISTS `concierto` (
  `idConcierto` int(9) NOT NULL,
  `fecha` date NOT NULL,
  `lugar` varchar(90) COLLATE utf8_spanish2_ci NOT NULL,
  `idInter` int(9) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

/* TABLA DISCO */
$query = "CREATE TABLE IF NOT EXISTS `disco` (
  `idDisco` int(5) NOT NULL,
  `titulo` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `duracion` int(5) DEFAULT NULL,
  `formato` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `precio` decimal(6,0) DEFAULT NULL,
  `stock` int(5) DEFAULT NULL,
  `caratula` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `idDiscografica` int(9) NOT NULL,
  `idInter` int(9) NOT NULL,
  `idEstilo` int(9) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

/* TABLA DISCOGRAFICA */
$query = "CREATE TABLE IF NOT EXISTS `discografica` (
  `idDiscografica` int(9) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());


/* TABLA ESTILOS */
$query = "CREATE TABLE IF NOT EXISTS `estilo` (
  `idEstilo` int(9) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

/* DATOS DE ESTILOS QUE SE INSTALAN SIEMPRE */
$query = "INSERT INTO `estilo` (`idEstilo`, `tipo`) VALUES
(1, 'R&B'),
(2, 'Hip-Hop'),
(3, 'Pop'),
(4, 'Rock'),
(5, 'Reggae'),
(6, 'Electronica'),
(7, 'Alternativa'),
(8, 'Clasica'),
(9, 'Flamenco');";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

/* TABLA INTERPRETE */
$query = "CREATE TABLE IF NOT EXISTS `interprete` (
  `idInt` int(9) NOT NULL,
  `name` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `alias` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `pais` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

/* TABLA VENTAS */ 
$query = "CREATE TABLE IF NOT EXISTS `venta` (
  `idVenta` int(5) NOT NULL,
  `idDisco` int(5) NOT NULL,
  `idCliente` int(9) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `fecha` date NOT NULL,
  `precioTotal` decimal(6,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());


/* ALTERS DE LAS TABLAS */
$query = "ALTER TABLE `canciones`
  ADD PRIMARY KEY (`idCancion`);";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

$query = "ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

$query = "ALTER TABLE `concierto`
  ADD PRIMARY KEY (`idConcierto`,`idInter`),
  ADD KEY `idInter` (`idInter`);";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

$query = "ALTER TABLE `disco`
  ADD PRIMARY KEY (`idDisco`),
  ADD KEY `idDiscografica` (`idDiscografica`),
  ADD KEY `idInter` (`idInter`),
  ADD KEY `idEstilo` (`idEstilo`);";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

$query = "ALTER TABLE `discografica`
  ADD PRIMARY KEY (`idDiscografica`);";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

$query = "ALTER TABLE `estilo`
  ADD PRIMARY KEY (`idEstilo`);";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

$query = "ALTER TABLE `interprete`
  ADD PRIMARY KEY (`idInt`);";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

$query = "ALTER TABLE `venta`
  ADD PRIMARY KEY (`idDisco`,`idCliente`,`idVenta`),
  ADD KEY `idVenta` (`idVenta`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idDisco` (`idDisco`);";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());


/* AUTO_INCREMENT DE LAS TABLAS */
$query = "ALTER TABLE `canciones`
  MODIFY `idCancion` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=216;";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

$query = "ALTER TABLE `cliente`
  MODIFY `idCliente` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

$query = "ALTER TABLE `concierto`
  MODIFY `idConcierto` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

$query = "ALTER TABLE `disco`
  MODIFY `idDisco` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

$query = "ALTER TABLE `discografica`
  MODIFY `idDiscografica` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

$query = "ALTER TABLE `estilo`
  MODIFY `idEstilo` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

$query = "ALTER TABLE `interprete`
  MODIFY `idInt` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());


/* RESTRICCIONES DE LAS TABLAS */
$query = "ALTER TABLE `concierto`
  ADD CONSTRAINT `concierto_ibfk_1` FOREIGN KEY (`idInter`) REFERENCES `interprete` (`idInt`) ON DELETE CASCADE ON UPDATE CASCADE;";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

$query = "ALTER TABLE `disco`
  ADD CONSTRAINT `disco_ibfk_1` FOREIGN KEY (`idDiscografica`) REFERENCES `discografica` (`idDiscografica`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disco_ibfk_2` FOREIGN KEY (`idInter`) REFERENCES `interprete` (`idInt`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disco_ibfk_3` FOREIGN KEY (`idEstilo`) REFERENCES `estilo` (`idEstilo`) ON DELETE CASCADE ON UPDATE CASCADE;";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

$query = "ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`idDisco`) REFERENCES `disco` (`idDisco`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE;";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());

?>