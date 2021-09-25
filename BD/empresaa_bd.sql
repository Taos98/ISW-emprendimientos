
CREATE SCHEMA IF NOT EXISTS `empresaa_bd` DEFAULT CHARACTER SET utf8;
USE `empresaa_bd` ;

-- -----------------------------------------------------
-- Table `mydb`.`Empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Empresa` (
  `id_empresa` INT NOT NULL AUTO_INCREMENT,
  `rut_empresa` VARCHAR(12) NULL,
  `empresa_nombre` VARCHAR(45) NULL,
  `direccion_empresa` VARCHAR(255) NULL,
  PRIMARY KEY (`id_empresa`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Representante_Empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Representante_Empresa` (
  `id_representante` INT NOT NULL AUTO_INCREMENT,
  `id_empresa` INT NULL,
  `representante_rut` VARCHAR(12) NULL,
  `representante_primer_nombre` VARCHAR(45) NULL,
  `representante_segundo_nombre` VARCHAR(45) NULL,
  `representante_primer_apellido` VARCHAR(45) NULL,
  `representante_segundo_apellido` VARCHAR(45) NULL,
  PRIMARY KEY (`id_representante`),
  INDEX `id_empresa_idx` (`id_empresa` ASC) VISIBLE,
	FOREIGN KEY (`id_empresa`) REFERENCES `empresaa_bd`.`Empresa` (`id_empresa`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Ficha_juridica`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Ficha_juridica` (
  `id_ficha_juridica` INT NOT NULL AUTO_INCREMENT,
  `id_representante` INT NULL,
  `universidad_rut` VARCHAR(12) NULL,
  `rut_vicerrector` VARCHAR(45) NULL,
  `primer_nombre_vicerrector` VARCHAR(45) NULL,
  `segundo_nombre_vicerrector` VARCHAR(45) NULL,
  `primer_apellido_vicerector` VARCHAR(45) NULL,
  `segundo_apellido_vicerrector` VARCHAR(45) NULL,
  `fecha_inicio` DATE NULL,
  `fecha_termino` DATE NULL,
  `correo_soporte` VARCHAR(256) NULL,
  `dias_habiles_empresa` INT NULL,
  `lugar_contrato` VARCHAR(255) NULL,
  `direccion_universidad` VARCHAR(255) NULL,
  `nombre_ficha_juridica` VARCHAR(45) NULL,
  PRIMARY KEY (`id_ficha_juridica`),
  INDEX `id_empresa_representante_idx` (`id_representante` ASC) VISIBLE,
    FOREIGN KEY (`id_representante`) REFERENCES `empresaa_bd`.`Representante_Empresa` (`id_representante`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Ficha_administrativa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Ficha_administrativa` (
  `id_ficha_administrativa` INT NOT NULL AUTO_INCREMENT,
  `nombre_ficha_administrativa` VARCHAR(256) NULL,
  `num_resolucion_universitaria` VARCHAR(255) NULL,
  `año_resolucion_universitaria` INT NULL,
  `num_decreto_universitario` VARCHAR(256) NULL,
  `año_decreto_universitario` INT NULL,
  `num_boleta` VARCHAR(256) NULL,
  `vigencia_boleta` DATE NULL,
  `plazo_devolucion` INT NULL,
  `corre_facturacion` VARCHAR(256) NULL,
  `veces_aunmento_renta` VARCHAR(4256) NULL,
  `dias_incumplimiento_pago` VARCHAR(256) NULL,
  `hora_tiempo_solucion` VARCHAR(256) NULL,
  PRIMARY KEY (`id_ficha_administrativa`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Contrato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Contrato` (
  `id_contrato` INT NOT NULL AUTO_INCREMENT,
  `id_ficha_juridica` INT NULL,
  `id_ficha_administrativa` INT NULL,
  `duracion_contrato` INT NULL,
  `nombrecontrato` VARCHAR(45) NULL,
  `numero_adquisision` INT NULL,
  `decreto_universitario` INT NULL,
  `fecha_decreto_universitario` DATE NULL,
  PRIMARY KEY (`id_contrato`),
  INDEX `id_Ficha_Administrativa_idx` (`id_ficha_administrativa` ASC) VISIBLE,
  INDEX `id_Ficha_Juridica_idx` (`id_ficha_juridica` ASC) VISIBLE,
    FOREIGN KEY (`id_ficha_juridica`) REFERENCES `empresaa_bd`.`Ficha_juridica` (`id_ficha_juridica`),
    FOREIGN KEY (`id_ficha_administrativa`) REFERENCES `empresaa_bd`.`Ficha_administrativa` (`id_ficha_administrativa`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Prorroga`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Prorroga` (
  `id_prorroga` INT NOT NULL AUTO_INCREMENT,
  `id_ficha_juridica` INT NULL,
  `fecha_prorroga_inicio` DATE NULL,
  `fecha_prorroga_termino` DATE NULL,
  `prorroga_descripcion` VARCHAR(256) NULL,
  PRIMARY KEY (`id_prorroga`),
  INDEX `id_Ficha_Juridica_idx` (`id_ficha_juridica` ASC) VISIBLE,
    FOREIGN KEY (`id_ficha_juridica`) REFERENCES `empresaa_bd`.`Ficha_juridica` (`id_ficha_juridica`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Anexo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Anexo` (
  `id_anexos` INT NOT NULL AUTO_INCREMENT,
  `id_contrato` INT NOT NULL,
  `descripcion` VARCHAR(256) NULL,
  PRIMARY KEY (`id_anexos`),
  INDEX `id_Contrato_idx` (`id_contrato` ASC) VISIBLE,
    FOREIGN KEY (`id_contrato`) REFERENCES `empresaa_bd`.`Contrato` (`id_contrato`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Causales`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Causales` (
  `id_causales` INT NOT NULL AUTO_INCREMENT,
  `caucion_porcentaje` FLOAT NULL,
  `horas_incontinuidad_servicio` INT NULL,
  `dias_liquidacion_en_contra` INT NULL,
  PRIMARY KEY (`id_causales`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Rol` (
  `id_rol` INT NOT NULL AUTO_INCREMENT,
  `nombre_cargo` VARCHAR(45) NULL,
  `descripcion_cargo` VARCHAR(255) NULL,
  PRIMARY KEY (`id_rol`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Perfil` (
  `id_perfil` INT NOT NULL AUTO_INCREMENT,
  `perfil_nombre` VARCHAR(50) NULL,
  `gabinete` VARCHAR(50) NULL,
  `CPU` VARCHAR(50) NULL,
  `varios` VARCHAR(50) NULL,
  `nombre_modelo` VARCHAR(50) NULL,
  `GPU` VARCHAR(50) NULL,
  `SO` VARCHAR(50) NULL,
  `fecha_perfil` DATE NULL,
  `marca` VARCHAR(50) NULL,
  `fuente` VARCHAR(50) NULL,
  PRIMARY KEY (`id_perfil`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Estado_revision`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Estado_revision` (
  `id_estado_revision` INT NOT NULL AUTO_INCREMENT,
  `nombre_estado` VARCHAR(45) NULL,
  PRIMARY KEY (`id_estado_revision`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Equipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Equipo` (
  `id_equipo` INT NOT NULL AUTO_INCREMENT,
  `id_interno` VARCHAR(45) NULL,
  `fecha_recepcion` DATE NULL,
  `rechazo` VARCHAR(200) NULL,
  `observacion` VARCHAR(200) NULL,
  `fecha_inicio_revision` DATE NULL,
  `contrato_idcontrato` INT NOT NULL,
  `perfil_idperfil` INT NOT NULL,
  `Estado_id_estado_revision` INT NOT NULL,
  PRIMARY KEY (`id_equipo`),
  INDEX `fk_Equipo_Contrato1_idx` (`contrato_idcontrato` ASC) VISIBLE,
  INDEX `fk_Equipo_Perfil1_idx` (`perfil_idperfil` ASC) VISIBLE,
  INDEX `fk_Equipo_Estado_revision1_idx` (`Estado_id_estado_revision` ASC) VISIBLE,
    FOREIGN KEY (`contrato_idcontrato`) REFERENCES `empresaa_bd`.`Contrato` (`id_contrato`),
    FOREIGN KEY (`perfil_idperfil`) REFERENCES `empresaa_bd`.`Perfil` (`id_perfil`),
    FOREIGN KEY (`Estado_id_estado_revision`) REFERENCES `empresaa_bd`.`Estado_revision` (`id_estado_revision`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Sede`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Sede` (
  `id_sede` INT NOT NULL AUTO_INCREMENT,
  `nombre_sede` VARCHAR(45) NULL,
  PRIMARY KEY (`id_sede`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Reparticion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Reparticion` (
  `id_reparticion` INT NOT NULL AUTO_INCREMENT,
  `nombre_reparticion` VARCHAR(45) NULL,
  PRIMARY KEY (`id_reparticion`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Sede_Reparticion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Sede_Reparticion` (
  `sede_id_sede` INT NOT NULL AUTO_INCREMENT,
  `reparticion_id_reparticion` INT NOT NULL,
  PRIMARY KEY (`sede_id_sede`, `reparticion_id_reparticion`),
  INDEX `fk_Sede_has_Reparticion_Reparticion1_idx` (`reparticion_id_reparticion` ASC) VISIBLE,
  INDEX `fk_Sede_has_Reparticion_Sede1_idx` (`sede_id_sede` ASC) VISIBLE,
    FOREIGN KEY (`sede_id_sede`) REFERENCES `empresaa_bd`.`Sede` (`id_sede`),
    FOREIGN KEY (`reparticion_id_reparticion`) REFERENCES `empresaa_bd`.`Reparticion` (`id_reparticion`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `rut_usuario` VARCHAR(12) NULL,
  `universidad_rut` VARCHAR(12) NULL,
  `idrol` INT NOT NULL,
  `nombre_usuario` VARCHAR(45) NULL,
  `apellido_usuario` VARCHAR(45) NULL,
  `Facultad_has_Sede_Facultad_Id_Facultad` INT NOT NULL,
  `Facultad_has_Sede_Sede_Id_sede` INT NOT NULL,
  `Sede_has_Reparticion_Sede_Id_sede` INT NOT NULL,
  `Sede_has_Reparticion_Reparticion_Id_reparticion` INT NOT NULL,
  PRIMARY KEY (`id_usuario`),
  INDEX `id_Rol_idx` (`idrol` ASC) VISIBLE,
  INDEX `fk_Usuario_Sede_has_Reparticion1_idx` (`Sede_has_Reparticion_Sede_Id_sede` ASC, `Sede_has_Reparticion_Reparticion_Id_reparticion` ASC) VISIBLE,
    FOREIGN KEY (`idrol`) REFERENCES `empresaa_bd`.`Rol` (`id_rol`),
    FOREIGN KEY (`Sede_has_Reparticion_Sede_Id_sede` , `Sede_has_Reparticion_Reparticion_Id_reparticion`) REFERENCES `empresaa_bd`.`Sede_Reparticion` (`sede_id_sede` , `reparticion_id_reparticion`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Asignacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Asignacion` (
  `id_asignacion` INT NOT NULL AUTO_INCREMENT,
  `fecha_inicio` DATE NULL,
  `fecha_vencimiento` DATE NULL,
  `encargado_rut_encargado` INT NOT NULL,
  `usuario_id_usuario` INT NOT NULL,
  `equipo_id_equipo` INT NOT NULL,
  PRIMARY KEY (`id_asignacion`),
  INDEX `fk_Asignacion_Usuario1_idx` (`usuario_id_usuario` ASC) VISIBLE,
  INDEX `fk_Asignacion_Equipo1_idx` (`equipo_id_equipo` ASC) VISIBLE,
    FOREIGN KEY (`usuario_id_usuario`) REFERENCES `empresaa_bd`.`Usuario` (`id_usuario`),
    FOREIGN KEY (`equipo_id_equipo`) REFERENCES `empresaa_bd`.`Equipo` (`id_equipo`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Entrega`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Entrega` (
  `idEntrega` INT NOT NULL AUTO_INCREMENT,
  `Lugar_de_Entrega` VARCHAR(255) NULL,
  `direccion_recibo` VARCHAR(255) NULL,
  `recepcionista_nombre` VARCHAR(45) NULL,
  `recepcionista_apellido` VARCHAR(45) NULL,
  `fecha_entrega` DATE NULL,
  `usuario_id_usuario` INT NOT NULL,
  `cantidad_entregada` INT NULL,
  PRIMARY KEY (`idEntrega`),
  INDEX `fk_Entrega_Usuario1_idx` (`usuario_id_usuario` ASC) VISIBLE,
  FOREIGN KEY (`usuario_id_usuario`) REFERENCES `empresaa_bd`.`Usuario` (`id_usuario`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Detalle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Detalle` (
  `id_detalle` INT NOT NULL AUTO_INCREMENT,
  `id_perfil` INT NOT NULL,
  `id_anexos` INT NULL,
  `id_contrato` INT NOT NULL,
  `cantidad_total_perfil` INT NULL,
  `cantidad_recepcionados` INT NULL,
  `cantidad_listos` INT NULL,
  `fecha_inicio_contrato` DATE NULL,
  `precio_perfil` FLOAT NULL,
  PRIMARY KEY (`id_detalle`),
  INDEX `id_Perfil_idx` (`id_perfil` ASC) VISIBLE,
  INDEX `fk_Detalle_entrega_Contrato1_idx` (`id_contrato` ASC) VISIBLE,
  INDEX `fk_Det_Con_perfil_Anexo1_idx` (`id_anexos` ASC) VISIBLE,
    FOREIGN KEY (`id_perfil`) REFERENCES `empresaa_bd`.`Perfil` (`id_perfil`),
    FOREIGN KEY (`id_contrato`) REFERENCES `empresaa_bd`.`Contrato` (`id_contrato`),
    FOREIGN KEY (`id_anexos`) REFERENCES `empresaa_bd`.`Anexo` (`id_anexos`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Tipo_cobertura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Tipo_cobertura` (
  `id_tipo_cobertura` INT NOT NULL AUTO_INCREMENT,
  `descripcion_garantia` VARCHAR(255) NULL,
  `hora_tiempo_respuesta` INT NULL,
  `hora_solucion` INT NULL,
  PRIMARY KEY (`id_tipo_cobertura`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Tipo_componente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Tipo_componente` (
  `id_tipo_componente` INT NOT NULL AUTO_INCREMENT,
  `nombre_componente` VARCHAR(50) NULL,
  PRIMARY KEY (`id_tipo_componente`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Componentes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Componentes` (
  `id_componentes` INT NOT NULL AUTO_INCREMENT,
  `id_tipo_componente` INT NOT NULL,
  `perfil_idperfil` INT NOT NULL,
  `tipo_modelo` VARCHAR(70) NULL,
  `tipo_descripcion` VARCHAR(70) NULL,
  PRIMARY KEY (`id_componentes`, `id_tipo_componente`),
  INDEX `fk_Componentes_has_Tipo_Componente_Tipo_Componente1_idx` (`id_tipo_componente` ASC) VISIBLE,
  INDEX `fk_Componentes_has_Tipo_Componente_Perfil1_idx` (`perfil_idperfil` ASC) VISIBLE,
    FOREIGN KEY (`id_tipo_componente`) REFERENCES `empresaa_bd`.`Tipo_componente` (`id_tipo_componente`),
    FOREIGN KEY (`perfil_idperfil`) REFERENCES `empresaa_bd`.`Perfil` (`id_perfil`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Solicitud_de_equipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Solicitud_de_equipo` (
  `id_solicitud` INT NOT NULL AUTO_INCREMENT,
  `nombre_usua` VARCHAR(45) NULL,
  `encargado` VARCHAR(45) NULL,
  `departamento` VARCHAR(45) NULL,
  `tipo_uso` VARCHAR(45) NULL,
  `fecha` DATE NULL,
  `estado` VARCHAR(45) NULL,
  `prioridad` VARCHAR(45) NULL,
  `observaciones` VARCHAR(45) NULL,
  `adjuntar` LONGBLOB NULL,
  `idusuario` INT NOT NULL,
  PRIMARY KEY (`id_solicitud`),
  INDEX `fk_Solicitud_de_equipo_Usuario1_idx` (`idusuario` ASC) VISIBLE,
    FOREIGN KEY (`idusuario`) REFERENCES `empresaa_bd`.`Usuario` (`id_usuario`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Detalle_solicitud`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Detalle_solicitud` (
  `idperfil` INT NOT NULL,
  `cantidad` VARCHAR(45) NULL,
  `idsolicitud` INT NOT NULL,
  PRIMARY KEY (`idperfil`, `idsolicitud`),
  INDEX `fk_Detalle solicitud_has_Perfil_Perfil1_idx` (`idperfil` ASC) VISIBLE,
  INDEX `fk_Perfil_detalle solicitud_Solicitud1_idx` (`idsolicitud` ASC) VISIBLE,
    FOREIGN KEY (`idperfil`) REFERENCES `empresaa_bd`.`Perfil` (`id_perfil`),
    FOREIGN KEY (`idsolicitud`) REFERENCES `empresaa_bd`.`Solicitud_de_equipo` (`id_solicitud`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Estado_cto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Estado_cto` (
  `id_estado_cto` INT NOT NULL AUTO_INCREMENT,
  `estado_descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id_estado_cto`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Estado_contrato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Estado_contrato` (
  `id_estado_cto` INT NOT NULL AUTO_INCREMENT,
  `id_contrato` INT NOT NULL,
  `fecha_estado_contrato` DATE NULL,
  PRIMARY KEY (`id_estado_cto`, `id_contrato`),
  INDEX `fk_Estado_cto_has_Contrato_Contrato1_idx` (`id_contrato` ASC) VISIBLE,
  INDEX `fk_Estado_cto_has_Contrato_Estado_cto1_idx` (`id_estado_cto` ASC) VISIBLE,
    FOREIGN KEY (`id_estado_cto`) REFERENCES `empresaa_bd`.`Estado_cto` (`id_estado_cto`),
    FOREIGN KEY (`id_contrato`) REFERENCES `empresaa_bd`.`Contrato` (`id_contrato`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Estado_Equipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Estado_Equipo` (
  `id_estado_revision` INT NOT NULL,
  `id_equipo` INT NOT NULL,
  `fecha_estado` DATETIME NULL,
  PRIMARY KEY (`id_estado_revision`, `id_equipo`),
  INDEX `fk_Estado_eq_has_Equipo_Equipo1_idx` (`id_equipo` ASC) VISIBLE,
  INDEX `fk_Estado_eq_has_Equipo_Estado_eq1_idx` (`id_estado_revision` ASC) VISIBLE,
    FOREIGN KEY (`id_estado_revision`) REFERENCES `empresaa_bd`.`Estado_revision` (`id_estado_revision`),
    FOREIGN KEY (`id_equipo`) REFERENCES `empresaa_bd`.`Equipo` (`id_equipo`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Ficha_juridica_Causales`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Ficha_juridica_Causales` (
  `id_ficha_juridica` INT NOT NULL AUTO_INCREMENT,
  `id_causales` INT NOT NULL,
  PRIMARY KEY (`id_ficha_juridica`, `id_causales`),
  INDEX `fk_Ficha Juridica_has_Causales_Causales1_idx` (`id_causales` ASC) VISIBLE,
  INDEX `fk_Ficha Juridica_has_Causales_Ficha Juridica1_idx` (`id_ficha_juridica` ASC) VISIBLE,
  CONSTRAINT `fk_Ficha Juridica_has_Causales_Ficha Juridica1`
    FOREIGN KEY (`id_ficha_juridica`) REFERENCES `empresaa_bd`.`Ficha_juridica` (`id_ficha_juridica`),
    FOREIGN KEY (`id_causales`) REFERENCES `empresaa_bd`.`Causales` (`id_causales`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Lote`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Lote` (
  `id_lote` INT NOT NULL AUTO_INCREMENT,
  `desc_lote` VARCHAR(45) NULL,
  PRIMARY KEY (`id_lote`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Detalle_Entrega`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Detalle_Entrega` (
  `Detalle_id_detalle` INT NOT NULL,
  `entrega_identrega` INT NULL,
  `cantidad_perfil_llegada` INT NULL,
  `lote_id_lote` INT NULL,
  INDEX `fk_Det_Con_perfil_has_Entrega_Entrega1_idx` (`entrega_identrega` ASC) VISIBLE,
  INDEX `fk_Det_Con_perfil_has_Entrega_Det_Con_perfil1_idx` (`Detalle_id_detalle` ASC) VISIBLE,
  INDEX `fk_Det_Con_perfil_has_Entrega_Lote1_idx` (`lote_id_lote` ASC) VISIBLE,
    FOREIGN KEY (`Detalle_id_detalle`) REFERENCES `empresaa_bd`.`Detalle` (`id_detalle`),
    FOREIGN KEY (`entrega_identrega`) REFERENCES `empresaa_bd`.`Entrega` (`idEntrega`),
    FOREIGN KEY (`lote_id_lote`) REFERENCES `empresaa_bd`.`Lote` (`id_lote`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Despacho`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Despacho` (
  `id_despacho` INT NOT NULL AUTO_INCREMENT,
  `fecha_despacho` DATE NULL,
  `contrato_idcontrato` INT NOT NULL,
  PRIMARY KEY (`id_despacho`),
  INDEX `fk_Depacho_Contrato1_idx` (`contrato_idcontrato` ASC) VISIBLE,
    FOREIGN KEY (`contrato_idcontrato`) REFERENCES `empresaa_bd`.`Contrato` (`id_contrato`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Seguro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Seguro` (
  `idseguro` INT NOT NULL,
  `seguro_obs` VARCHAR(180) NOT NULL,
  `fecha_ingreso_seg` DATE NULL,
  `equipo_id_equipo` INT NOT NULL,
  PRIMARY KEY (`idseguro`),
  INDEX `fk_Seguro_Equipo1_idx` (`equipo_id_equipo` ASC) VISIBLE,
    FOREIGN KEY (`equipo_id_equipo`) REFERENCES `empresaa_bd`.`Equipo` (`id_equipo`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`Es_cubierta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `empresaa_bd`.`Es_cubierta` (
  `id_ficha_administrativa` INT NOT NULL,
  `id_tipo_cobertura` INT NOT NULL,
  `descripcion_es_cubierta` VARCHAR(256) NULL,
  INDEX `fk_esCubierta_Ficha_administrativa1_idx` (`id_ficha_administrativa` ASC) VISIBLE,
  INDEX `fk_esCubierta_Tipo_cobertura1_idx` (`id_tipo_cobertura` ASC) VISIBLE,
    FOREIGN KEY (`id_ficha_administrativa`) REFERENCES `empresaa_bd`.`Ficha_administrativa` (`id_ficha_administrativa`),
    FOREIGN KEY (`id_tipo_cobertura`) REFERENCES `empresaa_bd`.`Tipo_cobertura` (`id_tipo_cobertura`))
ENGINE = InnoDB;