ALTER TABLE `tab_solicitud_credito` ADD COLUMN `solicitudcredito_tipopago` varchar(2) NOT NULL;
ALTER TABLE `tab_solicitud_credito` ADD `solicitudcredito_estado` INT NOT NULL AFTER `solicitudcredito_tipopago`;
ALTER TABLE `tab_solicitud_credito` ADD `solicitudcredito_numrefcre` VARCHAR(10) NOT NULL AFTER `solicitudcredito_estado`;
ALTER TABLE `tab_credito_movimiento` ADD `creditomovimiento_concepto` VARCHAR(200) NOT NULL AFTER `creditomovimiento_id`;


CREATE TABLE `tab_codeudor` (
  `codeudor_id` int(11) NOT NULL,
  `codeudor_nombre` varchar(200) NOT NULL,
  `codeudor_dui` varchar(11) NOT NULL,
  `codeudor_nit` varchar(20) NOT NULL,
  `codeudor_edad` int(11) NOT NULL,
  `codeudor_profesionuoficio` text NOT NULL,
  `codeudor_direccion` text NOT NULL,
  `codeudor_estadocivil` text NOT NULL,
  `codeudor_telefono` varchar(9) NOT NULL,
  `codeudor_celular` varchar(9) NOT NULL,
  `codeudor_no` text NOT NULL,
  `codeudor_jefeinmediato` varchar(200) NOT NULL,
  `codeudor_tiempotrabajo` text NOT NULL,
  `codeudor_puesto` text NOT NULL,
  `codeudor_salario` float NOT NULL,
  `codeudor_telefonotrabajo` varchar(9) NOT NULL,
  `codeudor_email` text NOT NULL,
  `codeudor_otrosingresos` float NOT NULL,
  `codeudor_gastovida` float NOT NULL,
  `codeudor_pagodeudas` float NOT NULL,
  `codeudor_otrosegresos` float NOT NULL,
  `codeudor_nombreref1` varchar(200) NOT NULL,
  `codeudor_direccionref1` text NOT NULL,
  `codeudor_telefonoref1` varchar(9) NOT NULL,
  `codeudor_celularref1` varchar(9) NOT NULL,
  `codeudor_lugartrabajoref1` text NOT NULL,
  `codeudor_nombreref2` varchar(200) NOT NULL,
  `codeudor_direccionref2` text NOT NULL,
  `codeudor_telefonoref2` varchar(9) NOT NULL,
  `codeudor_celularref2` varchar(9) NOT NULL,
  `codeudor_lugartrabajoref2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `tab_codeudor`
  ADD PRIMARY KEY (`codeudor_id`);

ALTER TABLE `tab_codeudor`
  MODIFY `codeudor_id` int(11) NOT NULL AUTO_INCREMENT;