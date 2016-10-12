-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-10-2016 a las 01:45:16
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ordenes-trabajo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anunciante`
--

CREATE TABLE IF NOT EXISTS `anunciante` (
  `id_anunciante` int(12) NOT NULL AUTO_INCREMENT,
  `cliente` int(12) NOT NULL DEFAULT '0',
  `nombre` varchar(250) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `sector` varchar(250) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_anunciante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `id_ciudad` int(12) NOT NULL AUTO_INCREMENT,
  `codigo` int(12) DEFAULT NULL,
  `ciudad` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_ciudad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Agrega una ciudad ' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(12) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `ciudad` int(12) NOT NULL DEFAULT '0',
  `cliente` varchar(250) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `nit` varchar(250) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `nombre_corto` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `persona_contacto` varchar(250) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `pagador` varchar(250) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `movil_pagador` varchar(250) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `correo` varchar(250) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `pagina_web` varchar(250) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `tipo_cliente` varchar(250) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `cumpleanos` varchar(150) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Agrega un cliente' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturacion`
--

CREATE TABLE IF NOT EXISTS `facturacion` (
  `id_facturacion` int(12) NOT NULL AUTO_INCREMENT,
  `cliente` int(12) NOT NULL DEFAULT '0',
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `direccion` varchar(250) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `telefono` varchar(250) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `orden` varchar(250) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `iva` bit(1) NOT NULL DEFAULT b'0',
  `tipo_moneda` int(12) NOT NULL DEFAULT '0',
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_facturacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturar`
--

CREATE TABLE IF NOT EXISTS `facturar` (
  `id_facturar` int(12) NOT NULL AUTO_INCREMENT,
  `orden_trabajo` int(12) DEFAULT NULL,
  `cliente` int(12) DEFAULT NULL,
  `facturacion` int(12) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_facturar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

CREATE TABLE IF NOT EXISTS `forma_pago` (
  `id_forma_pago` int(11) DEFAULT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion_secundaria`
--

CREATE TABLE IF NOT EXISTS `informacion_secundaria` (
  `id_info` int(12) NOT NULL AUTO_INCREMENT,
  `cantidad` int(12) DEFAULT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `facturacion` int(12) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_info`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_trabajo`
--

CREATE TABLE IF NOT EXISTS `orden_trabajo` (
  `id_orden_trabajo` int(12) NOT NULL AUTO_INCREMENT,
  `cliente` int(12) DEFAULT NULL,
  `anunciante` int(12) DEFAULT NULL,
  `tipo_ot` int(12) DEFAULT NULL,
  `aplicacion` text COLLATE utf8_spanish_ci,
  `valor_impresion` int(12) DEFAULT NULL,
  `valor_radio` int(12) DEFAULT NULL,
  `valor_television` int(12) DEFAULT NULL,
  `valor_internet` int(12) DEFAULT NULL,
  `valor_analisis` int(12) DEFAULT NULL,
  `tipo_alerta` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `alertas` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `observaciones` text COLLATE utf8_spanish_ci,
  `marca` text COLLATE utf8_spanish_ci,
  `entorno` text COLLATE utf8_spanish_ci,
  `competencias` text COLLATE utf8_spanish_ci,
  `sectores` text COLLATE utf8_spanish_ci,
  `categoria` text COLLATE utf8_spanish_ci,
  `actividad` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `facturacion` int(12) DEFAULT NULL,
  `desde` date DEFAULT NULL,
  `hasta` date DEFAULT NULL,
  `comercial` int(12) DEFAULT NULL,
  `observaciones_2` text COLLATE utf8_spanish_ci,
  `firma_1` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `firma_2` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `firma_3` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_orden_trabajo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(12) NOT NULL AUTO_INCREMENT,
  `usuario` int(12) DEFAULT NULL,
  `rol` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Agrega el rol al usuario' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_moneda`
--

CREATE TABLE IF NOT EXISTS `tipo_moneda` (
  `id_tipo_moneda` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_tipo_moneda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_monitoreo`
--

CREATE TABLE IF NOT EXISTS `tipo_monitoreo` (
  `id_tipo` int(11) DEFAULT NULL,
  `tipo` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(12) NOT NULL AUTO_INCREMENT,
  `identificacion` int(12) DEFAULT NULL,
  `usuario` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contrasena` int(12) DEFAULT NULL,
  `fec_nac` date DEFAULT NULL,
  `direccion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ciudad` int(12) DEFAULT NULL,
  `correo` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rol` int(12) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla de ususarios. registra los usuarios ' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
