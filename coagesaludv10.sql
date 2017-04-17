-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 17-04-2017 a las 00:52:59
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `coagesaludv3`
--
CREATE DATABASE IF NOT EXISTS `coagesaludv3` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `coagesaludv3`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_asociado`
--

CREATE TABLE `tab_asociado` (
  `asociado_id` int(11) NOT NULL,
  `asociado_correlativo` varchar(10) NOT NULL,
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
  `asociado_numpunto` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tab_asociado`
--

INSERT INTO `tab_asociado` (`asociado_id`, `asociado_correlativo`, `asociado_nombre`, `asociado_dui`, `asociado_nit`, `asociado_extendido`, `asociado_fechaextendido`, `asociado_lugarnacimiento`, `asociado_fechanacimiento`, `asociado_nacionalidad`, `asociado_estadocivil`, `asociado_departamento`, `asociado_municipio`, `asociado_direccion`, `asociado_profesionoficio`, `asociado_ingresomes`, `asociado_estado`, `asociado_institucionsaludid`, `asociado_sucursalid`, `asociado_fechasesion`, `asociado_numacta`, `asociado_numpunto`) VALUES
(7, '1', 'Emma Watson', '04123345-6', '2324-121212-111-1', '', '1999-04-15', '', '1999-01-01', 'Savadoreño/a', 'Soltero/a', '0', 'La Libertad', '', '', 0, 'Aprobado', 1, 1, '2017-04-14', 1, '1a'),
(9, '2', 'hola mundo', '1111111111', '22222222222222222', '', '1999-04-11', '', '1999-04-11', 'Savadoreño/a', 'Viudo/a', '0', 'Cojutepeque', '', '', 0, 'En espera', 1, 1, '0000-00-00', 0, ''),
(10, '3', 'Elisha Curthberth', '1932393232', '12392092302309239', 'sdaksda', '1999-01-06', 'asdas', '1999-04-06', 'Savadoreño/a', 'Soltero/a', '0', 'Monte San Juan', 'ahi', 'bonita', 1923, 'Aprobado', 1, 1, '2017-04-16', 23, '3c'),
(11, '4', 'Hermione', '213e234234', '234234e234e234234', 'sdflsdlwd', '1999-04-02', 'msdlfnmsklfcml', '1999-04-04', 'Savadoreño/a', 'Soltero/a', '0', 'El Rosario', '', '', 2000, 'En espera', 1, 1, '0000-00-00', 0, ''),
(13, '5', 'ueueueueue', '8798789898', '23423423423423423', '', '0000-00-00', '', '0000-00-00', 'Savadoreño/a', 'Soltero/a', '0', 'Cojutepeque', '', '', 0, 'En espera', 1, 1, '0000-00-00', 0, '');

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

--
-- Volcado de datos para la tabla `tab_beneficiario`
--

INSERT INTO `tab_beneficiario` (`beneficiario_nombre`, `beneficiario_direccion`, `beneficiario_parentezco`, `beneficiario_porcentaje`, `beneficiario_asociadoid`) VALUES
('jajaja', 'jj tt e ', 'huhu', 40, 9),
('uiioooiu', 'kdkdk', 'jdjd', 60, 9),
('Angel Hernandez', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo', 'Novio', 100, 10),
('uiioooiu', 'kdkdk', 'jdjd', 60, 10),
('Angel Hernandez', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo', 'Novio', 100, 7);

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
  `capital_sucursalid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_cotitular`
--

CREATE TABLE `tab_cotitular` (
  `cotitular_nombre` varchar(200) NOT NULL,
  `cotitular_dui` varchar(10) NOT NULL,
  `cotitular_nit` varchar(20) NOT NULL,
  `cotitular_asociadoid` int(11) NOT NULL
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
  `cuenta_id` varchar(11) NOT NULL,
  `cuenta_monto` float NOT NULL,
  `cuenta_fechaapertura` date NOT NULL,
  `cuenta_estado` varchar(50) NOT NULL,
  `cuenta_asociadoid` int(11) NOT NULL,
  `cuenta_tipocuentaid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tab_cuenta`
--

INSERT INTO `tab_cuenta` (`cuenta_id`, `cuenta_monto`, `cuenta_fechaapertura`, `cuenta_estado`, `cuenta_asociadoid`, `cuenta_tipocuentaid`) VALUES
('01-01-xxxx', 334, '2017-04-16', 'Activada', 7, 4),
('1406568701', 300, '2017-04-13', 'Activada', 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_cuenta_autorizados`
--

CREATE TABLE `tab_cuenta_autorizados` (
  `cuentaautorizados_cuentaid` varchar(11) NOT NULL,
  `cuentaautorizados_nombre` varchar(200) NOT NULL,
  `cuentaautorizados_dui` varchar(10) NOT NULL,
  `cuentaautorizados_nit` varchar(20) NOT NULL
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
  `cuentamovimiento_cuentaid` varchar(11) NOT NULL
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

--
-- Volcado de datos para la tabla `tab_institucion_salud`
--

INSERT INTO `tab_institucion_salud` (`institucionsalud_id`, `institucionsalud_nombre`, `institucionsalud_direccion`) VALUES
(1, 'Hospital 1 de Mayo', 'Lorem ipsum dolor sit amet');

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
-- Estructura de tabla para la tabla `tab_sucursal`
--

CREATE TABLE `tab_sucursal` (
  `sucursal_id` int(11) NOT NULL,
  `sucursal_nombre` varchar(200) NOT NULL,
  `sucursal_nit` varchar(20) NOT NULL,
  `sucursal_razonsocial` text NOT NULL,
  `sucursal_eslogan` text NOT NULL,
  `sucursal_logo` text NOT NULL,
  `sucursal_direccion` text NOT NULL,
  `sucursal_telefono` varchar(9) NOT NULL,
  `sucursal_cuotaingreso` float NOT NULL,
  `sucursal_mision` text NOT NULL,
  `sucursal_vision` text NOT NULL,
  `sucursal_valores` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tab_sucursal`
--

INSERT INTO `tab_sucursal` (`sucursal_id`, `sucursal_nombre`, `sucursal_nit`, `sucursal_razonsocial`, `sucursal_eslogan`, `sucursal_logo`, `sucursal_direccion`, `sucursal_telefono`, `sucursal_cuotaingreso`, `sucursal_mision`, `sucursal_vision`, `sucursal_valores`) VALUES
(1, 'CO-AGESALUD Casa Matriz', '', '', '', '', '', '', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_tipo_credito`
--

CREATE TABLE `tab_tipo_credito` (
  `tipocredito_id` int(11) NOT NULL,
  `tipocredito_correlativo` varchar(3) NOT NULL,
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
  `tipocuenta_correlativo` varchar(3) NOT NULL,
  `tipocuenta_nombre` varchar(200) NOT NULL,
  `tipocuenta_interes` float NOT NULL,
  `tipocuenta_montominimo` float NOT NULL,
  `tipocuenta_cobromontominimo` float NOT NULL,
  `tipocuenta_montoapertura` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tab_tipo_cuenta`
--

INSERT INTO `tab_tipo_cuenta` (`tipocuenta_id`, `tipocuenta_correlativo`, `tipocuenta_nombre`, `tipocuenta_interes`, `tipocuenta_montominimo`, `tipocuenta_cobromontominimo`, `tipocuenta_montoapertura`) VALUES
(1, '1', 'uno', 4, 4, 4, 4),
(4, '2', 'tres', 9, 9, 9, 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tab_asociado`
--
ALTER TABLE `tab_asociado`
  ADD PRIMARY KEY (`asociado_id`),
  ADD UNIQUE KEY `asociado_correlativo` (`asociado_correlativo`),
  ADD KEY `asociado_institucionsaludid` (`asociado_institucionsaludid`),
  ADD KEY `asociado_empresaid` (`asociado_sucursalid`);

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
  ADD KEY `capital_empresaid` (`capital_sucursalid`);

--
-- Indices de la tabla `tab_cotitular`
--
ALTER TABLE `tab_cotitular`
  ADD KEY `cotitular_asociadoid` (`cotitular_asociadoid`);

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
-- Indices de la tabla `tab_cuenta_autorizados`
--
ALTER TABLE `tab_cuenta_autorizados`
  ADD KEY `cuentaautorizados_cuentaid` (`cuentaautorizados_cuentaid`);

--
-- Indices de la tabla `tab_cuenta_movimiento`
--
ALTER TABLE `tab_cuenta_movimiento`
  ADD PRIMARY KEY (`cuentamovimiento_id`),
  ADD KEY `cuentamovimiento_cuentaid` (`cuentamovimiento_cuentaid`);

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
-- Indices de la tabla `tab_sucursal`
--
ALTER TABLE `tab_sucursal`
  ADD PRIMARY KEY (`sucursal_id`);

--
-- Indices de la tabla `tab_tipo_credito`
--
ALTER TABLE `tab_tipo_credito`
  ADD PRIMARY KEY (`tipocredito_id`),
  ADD UNIQUE KEY `tipocredito_` (`tipocredito_correlativo`);

--
-- Indices de la tabla `tab_tipo_cuenta`
--
ALTER TABLE `tab_tipo_cuenta`
  ADD PRIMARY KEY (`tipocuenta_id`),
  ADD UNIQUE KEY `tipocuenta_correlativo` (`tipocuenta_correlativo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tab_asociado`
--
ALTER TABLE `tab_asociado`
  MODIFY `asociado_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `tab_capital`
--
ALTER TABLE `tab_capital`
  MODIFY `capital_id` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT de la tabla `tab_cuenta_movimiento`
--
ALTER TABLE `tab_cuenta_movimiento`
  MODIFY `cuentamovimiento_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tab_institucion_salud`
--
ALTER TABLE `tab_institucion_salud`
  MODIFY `institucionsalud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tab_solicitud_credito`
--
ALTER TABLE `tab_solicitud_credito`
  MODIFY `solicitudcredito_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tab_sucursal`
--
ALTER TABLE `tab_sucursal`
  MODIFY `sucursal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tab_tipo_credito`
--
ALTER TABLE `tab_tipo_credito`
  MODIFY `tipocredito_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `tab_tipo_cuenta`
--
ALTER TABLE `tab_tipo_cuenta`
  MODIFY `tipocuenta_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
-- Filtros para la tabla `tab_cotitular`
--
ALTER TABLE `tab_cotitular`
  ADD CONSTRAINT `tab_cotitular_ibfk_1` FOREIGN KEY (`cotitular_asociadoid`) REFERENCES `tab_asociado` (`asociado_id`);

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
