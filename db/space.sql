-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 19-10-2019 a las 01:15:29
-- Versión del servidor: 5.7.21
-- Versión de PHP: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `space`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

DROP TABLE IF EXISTS `articulos`;
CREATE TABLE IF NOT EXISTS `articulos` (
  `ID_ARTICULO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USR` int(11) NOT NULL,
  `ID_CAT` int(11) NOT NULL,
  `NOMBRE` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `DESCRIPCION` text COLLATE utf8_spanish_ci,
  `IMG_RUTA` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `PRECIO` float DEFAULT NULL,
  `ESTATUS` tinyint(1) NOT NULL,
  `FECHA_REG` date DEFAULT NULL,
  PRIMARY KEY (`ID_ARTICULO`),
  KEY `ID_USR` (`ID_USR`),
  KEY `ID_CAT` (`ID_CAT`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`ID_ARTICULO`, `ID_USR`, `ID_CAT`, `NOMBRE`, `DESCRIPCION`, `IMG_RUTA`, `CANTIDAD`, `PRECIO`, `ESTATUS`, `FECHA_REG`) VALUES
(1, 1, 3, 'Coca Cola', 'Se puede comer', 'PRO_18153622.jpg', 12, 1.5, 1, '2019-10-17'),
(4, 1, 5, 'Cachitos', 'sirve para comer', 'PRO_18222223.jpg', 25, 0.65, 1, '2019-10-18'),
(3, 1, 3, 'Ginger ale', 'se puede tomar toda', 'PRO_18165713.jpg', 5, 2.6, 2, '2019-10-18'),
(5, 1, 5, 'boli queso', 'sirve para comer', NULL, 10, 0.65, 1, '2019-10-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `ID_CAT` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USR` int(11) NOT NULL,
  `NOMBRE_CAT` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `IMG_RUTA` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ESTATUS` tinyint(1) NOT NULL,
  `FECHA_REG` date DEFAULT NULL,
  PRIMARY KEY (`ID_CAT`),
  KEY `ID_USR` (`ID_USR`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`ID_CAT`, `ID_USR`, `NOMBRE_CAT`, `IMG_RUTA`, `ESTATUS`, `FECHA_REG`) VALUES
(3, 1, 'SODAS', NULL, 1, '2019-09-24'),
(2, 1, 'HAMBURGUESA', NULL, 1, '2019-09-24'),
(4, 1, 'CERVEZA', NULL, 1, '2019-09-24'),
(5, 1, 'SNACK', NULL, 1, '2019-09-24'),
(6, 1, 'PLAYERAS', NULL, 1, '2019-09-24'),
(7, 1, 'GORRAS', NULL, 1, '2019-09-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `miembros`
--

DROP TABLE IF EXISTS `miembros`;
CREATE TABLE IF NOT EXISTS `miembros` (
  `ID_MIEMBRO` int(11) NOT NULL AUTO_INCREMENT,
  `CEDULA` varchar(13) COLLATE utf8_spanish_ci NOT NULL,
  `ID_USR` int(11) NOT NULL,
  `PR_NOMBRE` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `SG_NOMBRE` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `PR_APELLIDO` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `SG_APELLIDO` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `GENERO` tinyint(1) NOT NULL,
  `CORREO` varchar(75) COLLATE utf8_spanish_ci DEFAULT NULL,
  `TELEFONO` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DIRECCION` text COLLATE utf8_spanish_ci,
  `FOTO` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ESTATUS` tinyint(1) NOT NULL,
  `FECHA_REG` date DEFAULT NULL,
  PRIMARY KEY (`ID_MIEMBRO`),
  KEY `ID_USR` (`ID_USR`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `miembros`
--

INSERT INTO `miembros` (`ID_MIEMBRO`, `CEDULA`, `ID_USR`, `PR_NOMBRE`, `SG_NOMBRE`, `PR_APELLIDO`, `SG_APELLIDO`, `GENERO`, `CORREO`, `TELEFONO`, `DIRECCION`, `FOTO`, `ESTATUS`, `FECHA_REG`) VALUES
(1, '8-796-2482', 1, 'w', 'x', 'y', 'y', 2, 'adfasd@gmail.com', '10-10', 'calle de los vivos', NULL, 1, '2019-09-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes`
--

DROP TABLE IF EXISTS `ordenes`;
CREATE TABLE IF NOT EXISTS `ordenes` (
  `ID_ORDEN` int(11) NOT NULL AUTO_INCREMENT,
  `ID_VENDEDOR` int(11) NOT NULL,
  `TOTAL` float DEFAULT NULL,
  `ESTATUS` tinyint(1) NOT NULL,
  `FECHA_REG` date DEFAULT NULL,
  `MODIFICADO` date DEFAULT NULL,
  PRIMARY KEY (`ID_ORDEN`),
  KEY `ID_VENDEDOR` (`ID_VENDEDOR`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_articulos`
--

DROP TABLE IF EXISTS `orden_articulos`;
CREATE TABLE IF NOT EXISTS `orden_articulos` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ORDEN` int(11) NOT NULL,
  `ID_ARTICULO` int(11) NOT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID_ORDEN` (`ID_ORDEN`),
  KEY `ID_ARTICULO` (`ID_ARTICULO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

DROP TABLE IF EXISTS `perfiles`;
CREATE TABLE IF NOT EXISTS `perfiles` (
  `ID_PERFIL` int(11) NOT NULL AUTO_INCREMENT,
  `PERFIL` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `DESCRIPCION` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ID_PERFIL`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`ID_PERFIL`, `PERFIL`, `DESCRIPCION`) VALUES
(1, 'Administrador', 'Puede hacer todo y algo más'),
(2, 'Vendedor', 'Puede vender todo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
CREATE TABLE IF NOT EXISTS `proveedores` (
  `ID_PROVEEDOR` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USR` int(11) NOT NULL,
  `PROVEEDOR` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `DESCRIPCION` text COLLATE utf8_spanish_ci,
  `TELEFONO` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CORREO` varchar(75) COLLATE utf8_spanish_ci DEFAULT NULL,
  `DIRECCION` text COLLATE utf8_spanish_ci,
  `ESTATUS` tinyint(1) DEFAULT NULL,
  `FECHA_REG` date DEFAULT NULL,
  PRIMARY KEY (`ID_PROVEEDOR`),
  KEY `ID_USR` (`ID_USR`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`ID_PROVEEDOR`, `ID_USR`, `PROVEEDOR`, `DESCRIPCION`, `TELEFONO`, `CORREO`, `DIRECCION`, `ESTATUS`, `FECHA_REG`) VALUES
(1, 1, 'Romero', 'Puede vender todo nada', '2-31-5643', '3dangs28@gmail.com', 'ciudad ', 2, '2019-09-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rutas`
--

DROP TABLE IF EXISTS `rutas`;
CREATE TABLE IF NOT EXISTS `rutas` (
  `ID_RUTA` int(11) NOT NULL AUTO_INCREMENT,
  `RUTA` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ID_RUTA`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID_USR` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PERFIL` int(11) NOT NULL,
  `NOMBRE` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `APELLIDO` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `USUARIO` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `CLAVE` varchar(65) COLLATE utf8_spanish_ci NOT NULL,
  `ESTATUS` tinyint(1) NOT NULL,
  `FECHA_REG` date DEFAULT NULL,
  PRIMARY KEY (`ID_USR`),
  KEY `ID_PERFIL` (`ID_PERFIL`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_USR`, `ID_PERFIL`, `NOMBRE`, `APELLIDO`, `USUARIO`, `CLAVE`, `ESTATUS`, `FECHA_REG`) VALUES
(1, 1, 'Angel', 'Garcia', 'agarcia', 'ygh8b77t', 1, '2019-09-11');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
