-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 18-03-2017 a las 03:53:29
-- Versión del servidor: 5.7.15-log
-- Versión de PHP: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `coagesaludv4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_asociado`
--

CREATE TABLE `tab_asociado` (
  `asociado_id` int(11) NOT NULL,
  `asociado_nombre` varchar(200) NOT NULL,
  `asociado_dui` varchar(10) NOT NULL,
  `asociado_nit` varchar(20) NOT NULL,
  `asociado_extendido` varchar(100) NOT NULL,
  `asociado_fechaextendido` date NOT NULL,
  `asociado_lugarnacimiento` varchar(100) NOT NULL,
  `asociado_fechanacimiento` date NOT NULL,
  `asociado_nacionalidad` varchar(100) NOT NULL,
  `asociado_estadocivil` varchar(100) NOT NULL,
  `asociado_municipio` varchar(100) NOT NULL,
  `asociado_direccion` text NOT NULL,
  `asociado_profesionoficio` varchar(200) NOT NULL,
  `asociado_ingresomes` float NOT NULL,
  `asociado_estado` varchar(100) NOT NULL,
  `asociado_institucionsaludid` int(11) NOT NULL,
  `asociado_empresaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_beneficiario`
--

CREATE TABLE `tab_beneficiario` (
  `beneficiario_nombre` varchar(200) NOT NULL,
  `beneficiario_direccion` text NOT NULL,
  `beneficiario_parentezco` varchar(100) NOT NULL,
  `beneficiario_porcentaje` float NOT NULL,
  `beneficiario_asociadoid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_capital`
--

CREATE TABLE `tab_capital` (
  `capital_id` int(11) NOT NULL,
  `capital_anio` smallint(6) NOT NULL,
  `capital_fecha` date NOT NULL,
  `capital_concepto` text NOT NULL,
  `capital_cargo` float NOT NULL,
  `capital_abono` float NOT NULL,
  `capital_saldo` float NOT NULL,
  `capital_empresaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_configuracion`
--

CREATE TABLE `tab_configuracion` (
  `configuracion_id` int(11) NOT NULL,
  `configuracion_nombre` varchar(200) NOT NULL,
  `configuracion_valor` varchar(200) NOT NULL,
  `configuracion_empresaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_credito`
--

CREATE TABLE `tab_credito` (
  `credito_id` int(11) NOT NULL,
  `credito_monto` float NOT NULL,
  `credito_cuota` float NOT NULL,
  `credito_fechacontrato` date NOT NULL,
  `credito_fechapago` date NOT NULL,
  `credito_plazo` smallint(6) NOT NULL,
  `credito_fechafin` date NOT NULL,
  `credito_estado` varchar(50) NOT NULL,
  `credito_solicitudcreditoid` int(11) NOT NULL,
  `credito_tipocreditoid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_credito_movimiento`
--

CREATE TABLE `tab_credito_movimiento` (
  `creditomovimiento_id` int(11) NOT NULL,
  `creditomovimiento_fecha` date NOT NULL,
  `creditomovimiento_cargo` float NOT NULL,
  `creditomovimiento_abono` float NOT NULL,
  `creditomovimiento_interes` float NOT NULL,
  `creditomovimiento_capital` float NOT NULL,
  `creditomovimiento_saldo` float NOT NULL,
  `creditomovimiento_creditoid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_cuenta`
--

CREATE TABLE `tab_cuenta` (
  `cuenta_id` int(11) NOT NULL,
  `cuenta_monto` float NOT NULL,
  `cuenta_fechaapertura` date NOT NULL,
  `cuenta_estado` varchar(50) NOT NULL,
  `cuenta_asociadoid` int(11) NOT NULL,
  `cuenta_tipocuentaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_cuenta_movimiento`
--

CREATE TABLE `tab_cuenta_movimiento` (
  `cuentamovimiento_id` int(11) NOT NULL,
  `cuentamovimiento_concepto` text NOT NULL,
  `cuentamovimiento_fecha` date NOT NULL,
  `cuentamovimiento_cargo` float NOT NULL,
  `cuentamovimiento_abono` float NOT NULL,
  `cuentamovimiento_saldo` float NOT NULL,
  `cuentamovimiento_plazo` smallint(6) NOT NULL,
  `cuentamovimiento_cuentaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_empresa`
--

CREATE TABLE `tab_empresa` (
  `empresa_id` int(11) NOT NULL,
  `empresa_nombre` varchar(200) NOT NULL,
  `empresa_nit` varchar(20) NOT NULL,
  `empresa_razonsocial` text NOT NULL,
  `empresa_eslogan` text NOT NULL,
  `empresa_logo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_institucion_salud`
--

CREATE TABLE `tab_institucion_salud` (
  `institucionsalud_id` int(11) NOT NULL,
  `institucionsalud_nombre` text NOT NULL,
  `institucionsalud_direccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_solicitud_credito`
--

CREATE TABLE `tab_solicitud_credito` (
  `solicitudcredito_id` int(11) NOT NULL,
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
  `solicitudcredito_asociadoid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_tipo_credito`
--

CREATE TABLE `tab_tipo_credito` (
  `tipocredito_id` int(11) NOT NULL,
  `tipocredito_nombre` varchar(200) NOT NULL,
  `tipocredito_interes` float NOT NULL,
  `tipocredito_interesxmora` float NOT NULL,
  `tipocredito_plazomaximo` smallint(6) NOT NULL,
  `tipocredito_montominimo` float NOT NULL,
  `tipocredito_montomaximo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_tipo_cuenta`
--

CREATE TABLE `tab_tipo_cuenta` (
  `tipocuenta_id` int(11) NOT NULL,
  `tipocuenta_nombre` varchar(200) NOT NULL,
  `tipocuenta_interes` float NOT NULL,
  `tipocuenta_montominimo` float NOT NULL,
  `tipocuenta_cobromontominimo` float NOT NULL,
  `tipocuenta_montoapertura` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tab_asociado`
--
ALTER TABLE `tab_asociado`
  ADD PRIMARY KEY (`asociado_id`),
  ADD KEY `asociado_institucionsaludid` (`asociado_institucionsaludid`),
  ADD KEY `asociado_empresaid` (`asociado_empresaid`);

--
-- Indices de la tabla `tab_beneficiario`
--
ALTER TABLE `tab_beneficiario`
  ADD KEY `beneficiario_asociadoid` (`beneficiario_asociadoid`);

--
-- Indices de la tabla `tab_capital`
--
ALTER TABLE `tab_capital`
  ADD PRIMARY KEY (`capital_id`),
  ADD KEY `capital_empresaid` (`capital_empresaid`);

--
-- Indices de la tabla `tab_configuracion`
--
ALTER TABLE `tab_configuracion`
  ADD PRIMARY KEY (`configuracion_id`),
  ADD KEY `configuracion_empresaid` (`configuracion_empresaid`);

--
-- Indices de la tabla `tab_credito`
--
ALTER TABLE `tab_credito`
  ADD PRIMARY KEY (`credito_id`),
  ADD KEY `credito_solicitudcreditoid` (`credito_solicitudcreditoid`),
  ADD KEY `credito_tipocreditoid` (`credito_tipocreditoid`);

--
-- Indices de la tabla `tab_credito_movimiento`
--
ALTER TABLE `tab_credito_movimiento`
  ADD PRIMARY KEY (`creditomovimiento_id`),
  ADD KEY `creditomovimiento_creditoid` (`creditomovimiento_creditoid`);

--
-- Indices de la tabla `tab_cuenta`
--
ALTER TABLE `tab_cuenta`
  ADD PRIMARY KEY (`cuenta_id`),
  ADD UNIQUE KEY `cuenta_tipocuentaid` (`cuenta_tipocuentaid`),
  ADD KEY `cuenta_asociadoid` (`cuenta_asociadoid`);

--
-- Indices de la tabla `tab_cuenta_movimiento`
--
ALTER TABLE `tab_cuenta_movimiento`
  ADD PRIMARY KEY (`cuentamovimiento_id`),
  ADD KEY `cuentamovimiento_cuentaid` (`cuentamovimiento_cuentaid`);

--
-- Indices de la tabla `tab_empresa`
--
ALTER TABLE `tab_empresa`
  ADD PRIMARY KEY (`empresa_id`);

--
-- Indices de la tabla `tab_institucion_salud`
--
ALTER TABLE `tab_institucion_salud`
  ADD PRIMARY KEY (`institucionsalud_id`);

--
-- Indices de la tabla `tab_solicitud_credito`
--
ALTER TABLE `tab_solicitud_credito`
  ADD PRIMARY KEY (`solicitudcredito_id`),
  ADD KEY `solicitudcredito_asociadoid` (`solicitudcredito_asociadoid`);

--
-- Indices de la tabla `tab_tipo_credito`
--
ALTER TABLE `tab_tipo_credito`
  ADD PRIMARY KEY (`tipocredito_id`);

--
-- Indices de la tabla `tab_tipo_cuenta`
--
ALTER TABLE `tab_tipo_cuenta`
  ADD PRIMARY KEY (`tipocuenta_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tab_asociado`
--
ALTER TABLE `tab_asociado`
  MODIFY `asociado_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tab_capital`
--
ALTER TABLE `tab_capital`
  MODIFY `capital_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tab_configuracion`
--
ALTER TABLE `tab_configuracion`
  MODIFY `configuracion_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tab_credito`
--
ALTER TABLE `tab_credito`
  MODIFY `credito_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tab_credito_movimiento`
--
ALTER TABLE `tab_credito_movimiento`
  MODIFY `creditomovimiento_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tab_cuenta`
--
ALTER TABLE `tab_cuenta`
  MODIFY `cuenta_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tab_cuenta_movimiento`
--
ALTER TABLE `tab_cuenta_movimiento`
  MODIFY `cuentamovimiento_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tab_empresa`
--
ALTER TABLE `tab_empresa`
  MODIFY `empresa_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tab_institucion_salud`
--
ALTER TABLE `tab_institucion_salud`
  MODIFY `institucionsalud_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tab_solicitud_credito`
--
ALTER TABLE `tab_solicitud_credito`
  MODIFY `solicitudcredito_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tab_tipo_credito`
--
ALTER TABLE `tab_tipo_credito`
  MODIFY `tipocredito_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tab_tipo_cuenta`
--
ALTER TABLE `tab_tipo_cuenta`
  MODIFY `tipocuenta_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tab_asociado`
--
ALTER TABLE `tab_asociado`
  ADD CONSTRAINT `tab_asociado_ibfk_1` FOREIGN KEY (`asociado_institucionsaludid`) REFERENCES `tab_institucion_salud` (`institucionsalud_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tab_asociado_ibfk_2` FOREIGN KEY (`asociado_empresaid`) REFERENCES `tab_empresa` (`empresa_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tab_beneficiario`
--
ALTER TABLE `tab_beneficiario`
  ADD CONSTRAINT `tab_beneficiario_ibfk_1` FOREIGN KEY (`beneficiario_asociadoid`) REFERENCES `tab_asociado` (`asociado_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tab_capital`
--
ALTER TABLE `tab_capital`
  ADD CONSTRAINT `tab_capital_ibfk_1` FOREIGN KEY (`capital_empresaid`) REFERENCES `tab_empresa` (`empresa_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tab_configuracion`
--
ALTER TABLE `tab_configuracion`
  ADD CONSTRAINT `tab_configuracion_ibfk_1` FOREIGN KEY (`configuracion_empresaid`) REFERENCES `tab_empresa` (`empresa_id`) ON UPDATE CASCADE;

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
