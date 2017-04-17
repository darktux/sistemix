-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-04-2017 a las 01:45:28
-- Versión del servidor: 5.7.15-log
-- Versión de PHP: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `coagesaludv3`
--
DROP DATABASE `coagesaludv3`;
CREATE DATABASE IF NOT EXISTS `coagesaludv3` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `coagesaludv3`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_asociado`
--

DROP TABLE IF EXISTS `tab_asociado`;
CREATE TABLE IF NOT EXISTS `tab_asociado` (
  `asociado_id` int(11) NOT NULL AUTO_INCREMENT,
  `asociado_nombre` varchar(200) NOT NULL,
  `asociado_dui` varchar(10) NOT NULL,
  `asociado_nit` varchar(20) NOT NULL,
  `asociado_extendido` varchar(100) NOT NULL,
  `asociado_fechaextendido` date NOT NULL,
  `asociado_lugarnacimiento` varchar(100) NOT NULL,
  `asociado_fechanacimiento` date NOT NULL,
  `asociado_nacionalidad` varchar(100) NOT NULL,
  `asociado_estadocivil` varchar(100) NOT NULL,
  `asociado_departamento` varchar(100) NOT NULL,
  `asociado_municipio` varchar(200) NOT NULL,
  `asociado_direccion` text NOT NULL,
  `asociado_profesionoficio` varchar(200) NOT NULL,
  `asociado_ingresomes` float NOT NULL,
  `asociado_estado` varchar(100) NOT NULL,
  `asociado_institucionsaludid` int(11) NOT NULL,
  `asociado_sucursalid` int(11) NOT NULL,
  `asociado_fechasesion` date NOT NULL,
  `asociado_numacta` int(11) NOT NULL,
  `asociado_numpunto` varchar(10) NOT NULL,
  PRIMARY KEY (`asociado_id`),
  KEY `asociado_institucionsaludid` (`asociado_institucionsaludid`),
  KEY `asociado_empresaid` (`asociado_sucursalid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_beneficiario`
--

DROP TABLE IF EXISTS `tab_beneficiario`;
CREATE TABLE IF NOT EXISTS `tab_beneficiario` (
  `beneficiario_nombre` varchar(200) NOT NULL,
  `beneficiario_direccion` text NOT NULL,
  `beneficiario_parentezco` varchar(100) NOT NULL,
  `beneficiario_porcentaje` float NOT NULL,
  `beneficiario_asociadoid` int(11) NOT NULL,
  KEY `beneficiario_asociadoid` (`beneficiario_asociadoid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_capital`
--

DROP TABLE IF EXISTS `tab_capital`;
CREATE TABLE IF NOT EXISTS `tab_capital` (
  `capital_id` int(11) NOT NULL AUTO_INCREMENT,
  `capital_anio` smallint(6) NOT NULL,
  `capital_fecha` date NOT NULL,
  `capital_concepto` text NOT NULL,
  `capital_cargo` float NOT NULL,
  `capital_abono` float NOT NULL,
  `capital_saldo` float NOT NULL,
  `capital_sucursalid` int(11) NOT NULL,
  PRIMARY KEY (`capital_id`),
  KEY `capital_empresaid` (`capital_sucursalid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_configuracion`
--

DROP TABLE IF EXISTS `tab_configuracion`;
CREATE TABLE IF NOT EXISTS `tab_configuracion` (
  `configuracion_id` int(11) NOT NULL AUTO_INCREMENT,
  `configuracion_nombre` varchar(200) NOT NULL,
  `configuracion_valor` varchar(200) NOT NULL,
  `configuracion_sucursalid` int(11) NOT NULL,
  PRIMARY KEY (`configuracion_id`),
  KEY `configuracion_empresaid` (`configuracion_sucursalid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_credito`
--

DROP TABLE IF EXISTS `tab_credito`;
CREATE TABLE IF NOT EXISTS `tab_credito` (
  `credito_id` int(11) NOT NULL AUTO_INCREMENT,
  `credito_monto` float NOT NULL,
  `credito_cuota` float NOT NULL,
  `credito_fechacontrato` date NOT NULL,
  `credito_fechapago` date NOT NULL,
  `credito_plazo` smallint(6) NOT NULL,
  `credito_fechafin` date NOT NULL,
  `credito_estado` varchar(50) NOT NULL,
  `credito_solicitudcreditoid` int(11) NOT NULL,
  `credito_tipocreditoid` int(11) NOT NULL,
  PRIMARY KEY (`credito_id`),
  KEY `credito_solicitudcreditoid` (`credito_solicitudcreditoid`),
  KEY `credito_tipocreditoid` (`credito_tipocreditoid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_credito_movimiento`
--

DROP TABLE IF EXISTS `tab_credito_movimiento`;
CREATE TABLE IF NOT EXISTS `tab_credito_movimiento` (
  `creditomovimiento_id` int(11) NOT NULL AUTO_INCREMENT,
  `creditomovimiento_fecha` date NOT NULL,
  `creditomovimiento_cargo` float NOT NULL,
  `creditomovimiento_abono` float NOT NULL,
  `creditomovimiento_interes` float NOT NULL,
  `creditomovimiento_capital` float NOT NULL,
  `creditomovimiento_saldo` float NOT NULL,
  `creditomovimiento_creditoid` int(11) NOT NULL,
  PRIMARY KEY (`creditomovimiento_id`),
  KEY `creditomovimiento_creditoid` (`creditomovimiento_creditoid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_cuenta`
--

DROP TABLE IF EXISTS `tab_cuenta`;
CREATE TABLE IF NOT EXISTS `tab_cuenta` (
  `cuenta_id` varchar(11) NOT NULL,
  `cuenta_monto` float NOT NULL,
  `cuenta_fechaapertura` date NOT NULL,
  `cuenta_estado` varchar(50) NOT NULL,
  `cuenta_asociadoid` int(11) NOT NULL,
  `cuenta_tipocuentaid` int(11) NOT NULL,
  PRIMARY KEY (`cuenta_id`),
  UNIQUE KEY `cuenta_tipocuentaid` (`cuenta_tipocuentaid`),
  KEY `cuenta_asociadoid` (`cuenta_asociadoid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_cuenta_autorizados`
--

DROP TABLE IF EXISTS `tab_cuenta_autorizados`;
CREATE TABLE IF NOT EXISTS `tab_cuenta_autorizados` (
  `cuentaautorizados_cuentaid` varchar(11) NOT NULL,
  `cuentaautorizados_nombre` varchar(200) NOT NULL,
  `cuentaautorizados_dui` varchar(10) NOT NULL,
  `cuentaautorizados_nit` varchar(20) NOT NULL,
  KEY `cuentaautorizados_cuentaid` (`cuentaautorizados_cuentaid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_cuenta_movimiento`
--

DROP TABLE IF EXISTS `tab_cuenta_movimiento`;
CREATE TABLE IF NOT EXISTS `tab_cuenta_movimiento` (
  `cuentamovimiento_id` int(11) NOT NULL AUTO_INCREMENT,
  `cuentamovimiento_concepto` text NOT NULL,
  `cuentamovimiento_fecha` date NOT NULL,
  `cuentamovimiento_cargo` float NOT NULL,
  `cuentamovimiento_abono` float NOT NULL,
  `cuentamovimiento_saldo` float NOT NULL,
  `cuentamovimiento_plazo` smallint(6) NOT NULL,
  `cuentamovimiento_cuentaid` varchar(11) NOT NULL,
  PRIMARY KEY (`cuentamovimiento_id`),
  KEY `cuentamovimiento_cuentaid` (`cuentamovimiento_cuentaid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_institucion_salud`
--

DROP TABLE IF EXISTS `tab_institucion_salud`;
CREATE TABLE IF NOT EXISTS `tab_institucion_salud` (
  `institucionsalud_id` int(11) NOT NULL AUTO_INCREMENT,
  `institucionsalud_nombre` text NOT NULL,
  `institucionsalud_direccion` text NOT NULL,
  PRIMARY KEY (`institucionsalud_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_solicitud_credito`
--

DROP TABLE IF EXISTS `tab_solicitud_credito`;
CREATE TABLE IF NOT EXISTS `tab_solicitud_credito` (
  `solicitudcredito_id` int(11) NOT NULL AUTO_INCREMENT,
  `solicitudcredito_sexo` char(1) NOT NULL,
  `solicitudcredito_telefonofijo` varchar(10) NOT NULL,
  `solicitudcredito_telefonocelular` varchar(10) NOT NULL,
  `solicitudcredito_direcciontrabajo` text NOT NULL,
  `solicitudcredito_jefeinmediato` varchar(200) NOT NULL,
  `solicitudcredito_tiempotrabajo` varchar(20) NOT NULL,
  `solicitudcredito_puesto` text NOT NULL,
  `solicitudcredito_telefonotrabajo` varchar(10) NOT NULL,
  `solicitudcredito_nombreconyuge` varchar(200) NOT NULL,
  `solicitudcredito_sexoconyuge` char(1) NOT NULL,
  `solicitudcredito_duiconyuge` varchar(10) NOT NULL,
  `solicitudcredito_nitconyuge` varchar(20) NOT NULL,
  `solicitudcredito_fechanacimientoconyuge` date NOT NULL,
  `solicitudcredito_profesionoficioconyuge` text NOT NULL,
  `solicitudcredito_direccionconyuge` text NOT NULL,
  `solicitudcredito_estadocivilconyuge` varchar(15) NOT NULL,
  `solicitudcredito_telefonofijoconyuge` varchar(10) NOT NULL,
  `solicitudcredito_telefonocelularconyuge` varchar(10) NOT NULL,
  `solicitudcredito_lugartrabajoconyuge` text NOT NULL,
  `solicitudcredito_direcciontrabajoconyuge` text NOT NULL,
  `solicitudcredito_sueldomensual` float NOT NULL,
  `solicitudcredito_otrosingresos` float NOT NULL,
  `solicitudcredito_totalingresos` float NOT NULL,
  `solicitudcredito_gastovida` float NOT NULL,
  `solicitudcredito_pagodeudas` float NOT NULL,
  `solicitudcredito_otrosegresos` float NOT NULL,
  `solicitudcredito_totalegresos` float NOT NULL,
  `solicitudcredito_nombrereferencia` varchar(200) NOT NULL,
  `solicitudcredito_direccionreferencia` text NOT NULL,
  `solicitudcredito_telefonofijoreferencia` varchar(10) NOT NULL,
  `solicitudcredito_telefonocelularreferencia` varchar(10) NOT NULL,
  `solicitudcredito_lugartrabajoreferencia` text NOT NULL,
  `solicitudcredito_direcciontrabajoreferencia` text NOT NULL,
  `solicitudcredito_asociadoid` int(11) NOT NULL,
  PRIMARY KEY (`solicitudcredito_id`),
  KEY `solicitudcredito_asociadoid` (`solicitudcredito_asociadoid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_sucursal`
--

DROP TABLE IF EXISTS `tab_sucursal`;
CREATE TABLE IF NOT EXISTS `tab_sucursal` (
  `sucursal_id` int(11) NOT NULL AUTO_INCREMENT,
  `sucursal_nombre` varchar(200) NOT NULL,
  `sucursal_nit` varchar(20) NOT NULL,
  `sucursal_razonsocial` text NOT NULL,
  `sucursal_eslogan` text NOT NULL,
  `sucursal_logo` text NOT NULL,
  PRIMARY KEY (`sucursal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_tipo_credito`
--

DROP TABLE IF EXISTS `tab_tipo_credito`;
CREATE TABLE IF NOT EXISTS `tab_tipo_credito` (
  `tipocredito_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipocredito_nombre` varchar(200) NOT NULL,
  `tipocredito_interes` float NOT NULL,
  `tipocredito_interesxmora` float NOT NULL,
  `tipocredito_plazomaximo` smallint(6) NOT NULL,
  `tipocredito_montominimo` float NOT NULL,
  `tipocredito_montomaximo` float NOT NULL,
  PRIMARY KEY (`tipocredito_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_tipo_cuenta`
--

DROP TABLE IF EXISTS `tab_tipo_cuenta`;
CREATE TABLE IF NOT EXISTS `tab_tipo_cuenta` (
  `tipocuenta_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipocuenta_nombre` varchar(200) NOT NULL,
  `tipocuenta_interes` float NOT NULL,
  `tipocuenta_montominimo` float NOT NULL,
  `tipocuenta_cobromontominimo` float NOT NULL,
  `tipocuenta_montoapertura` float NOT NULL,
  PRIMARY KEY (`tipocuenta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tab_asociado`
--
ALTER TABLE `tab_asociado`
  ADD CONSTRAINT `tab_asociado_ibfk_1` FOREIGN KEY (`asociado_institucionsaludid`) REFERENCES `tab_institucion_salud` (`institucionsalud_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tab_asociado_ibfk_2` FOREIGN KEY (`asociado_sucursalid`) REFERENCES `tab_sucursal` (`sucursal_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tab_beneficiario`
--
ALTER TABLE `tab_beneficiario`
  ADD CONSTRAINT `tab_beneficiario_ibfk_1` FOREIGN KEY (`beneficiario_asociadoid`) REFERENCES `tab_asociado` (`asociado_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tab_capital`
--
ALTER TABLE `tab_capital`
  ADD CONSTRAINT `tab_capital_ibfk_1` FOREIGN KEY (`capital_sucursalid`) REFERENCES `tab_sucursal` (`sucursal_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tab_configuracion`
--
ALTER TABLE `tab_configuracion`
  ADD CONSTRAINT `tab_configuracion_ibfk_1` FOREIGN KEY (`configuracion_sucursalid`) REFERENCES `tab_sucursal` (`sucursal_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tab_credito`
--
ALTER TABLE `tab_credito`
  ADD CONSTRAINT `tab_credito_ibfk_1` FOREIGN KEY (`credito_solicitudcreditoid`) REFERENCES `tab_solicitud_credito` (`solicitudcredito_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tab_credito_ibfk_2` FOREIGN KEY (`credito_tipocreditoid`) REFERENCES `tab_tipo_credito` (`tipocredito_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tab_credito_movimiento`
--
ALTER TABLE `tab_credito_movimiento`
  ADD CONSTRAINT `tab_credito_movimiento_ibfk_1` FOREIGN KEY (`creditomovimiento_creditoid`) REFERENCES `tab_credito` (`credito_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tab_cuenta`
--
ALTER TABLE `tab_cuenta`
  ADD CONSTRAINT `tab_cuenta_ibfk_1` FOREIGN KEY (`cuenta_asociadoid`) REFERENCES `tab_asociado` (`asociado_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tab_cuenta_ibfk_2` FOREIGN KEY (`cuenta_tipocuentaid`) REFERENCES `tab_tipo_cuenta` (`tipocuenta_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tab_cuenta_autorizados`
--
ALTER TABLE `tab_cuenta_autorizados`
  ADD CONSTRAINT `tab_cuenta_autorizados_ibfk_1` FOREIGN KEY (`cuentaautorizados_cuentaid`) REFERENCES `tab_cuenta` (`cuenta_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tab_cuenta_movimiento`
--
ALTER TABLE `tab_cuenta_movimiento`
  ADD CONSTRAINT `tab_cuenta_movimiento_ibfk_1` FOREIGN KEY (`cuentamovimiento_cuentaid`) REFERENCES `tab_cuenta` (`cuenta_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tab_solicitud_credito`
--
ALTER TABLE `tab_solicitud_credito`
  ADD CONSTRAINT `tab_solicitud_credito_ibfk_1` FOREIGN KEY (`solicitudcredito_asociadoid`) REFERENCES `tab_asociado` (`asociado_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
