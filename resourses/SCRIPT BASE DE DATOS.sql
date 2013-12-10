SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `tutorapp` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci ;
USE `tutorapp` ;

-- -----------------------------------------------------
-- Table `tutorapp`.`dpa`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tutorapp`.`dpa` (
  `id_dpa` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `primer_apellido` VARCHAR(45) NULL ,
  `segundo_apellido` VARCHAR(45) NULL ,
  `carrera` VARCHAR(45) NULL ,
  `id_usuario` INT NULL ,
  PRIMARY KEY (`id_dpa`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tutorapp`.`usuarios`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tutorapp`.`usuarios` (
  `id_usuario` INT NOT NULL ,
  `user_name` VARCHAR(45) NULL ,
  `password` VARCHAR(45) NULL ,
  `tipo` ENUM('admin','dpa','tutor','alumno') NULL ,
  `correo` VARCHAR(100) NULL ,
  `fecha` DATE NULL ,
  `activo` INT NULL DEFAULT 0 COMMENT '0=INACTIVO\n1=ACTIVO' ,
  PRIMARY KEY (`id_usuario`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tutorapp`.`dpa_tutores`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tutorapp`.`dpa_tutores` (
  `id_dpa` INT NULL ,
  `id_tutor` INT NULL )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tutorapp`.`tutor_alumnos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tutorapp`.`tutor_alumnos` (
  `id_tutor` int(11) DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tutorapp`.`tutorias`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tutorapp`.`tutorias` (
  `id_tutoria` INT NOT NULL ,
  `programa_educativo` VARCHAR(45) NULL ,
  `id_tutor` INT NULL ,
  `fecha_asignacion` DATE NULL ,
  `num_sesion` VARCHAR(45) NULL ,
  `fecha_sesion` DATE NULL ,
  `acuerdos` TEXT NULL ,
  `id_alumno` VARCHAR(45) NULL ,
  `estatus` ENUM('Inicio','Seguimiento','Termino') NULL ,
  `notas_personales` TEXT NULL ,
  `activo` INT NULL DEFAULT 0 COMMENT '0=INACTIVO\n1=ACTIVO' ,
  PRIMARY KEY (`id_tutoria`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tutorapp`.`alumnos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tutorapp`.`alumnos` (
  `id_alumno` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `primer_apellido` VARCHAR(45) NULL ,
  `segundo_apellido` VARCHAR(45) NULL ,
  `carrera` VARCHAR(45) NULL ,
  `matricula` INT NULL ,
  `cuatrimestre` VARCHAR(45) NULL ,
  `id_usuario` INT NULL ,
  PRIMARY KEY (`id_alumno`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tutorapp`.`tutores`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tutorapp`.`tutores` (
  `id_tutor` INT NOT NULL ,
  `nombre` VARCHAR(45) NULL ,
  `primer_apellido` VARCHAR(45) NULL ,
  `segundo_apellido` VARCHAR(45) NULL ,
  `id_usuario` INT NULL ,
  PRIMARY KEY (`id_tutor`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tutorapp`.`datos_alumno`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tutorapp`.`datos_alumno` (
  `id_alumno` INT NULL ,
  `calle` VARCHAR(45) NULL ,
  `colonia` VARCHAR(45) NULL ,
  `codigo_postal` VARCHAR(45) NULL ,
  `sexo` VARCHAR(45) NULL ,
  `telefono` VARCHAR(45) NULL ,
  `celular` VARCHAR(45) NULL ,
  `otro_telefono` VARCHAR(45) NULL ,
  `correo` VARCHAR(100) NULL ,
  `lugar_nacimiento` VARCHAR(45) NULL ,
  `fecha_nacimiento` DATE NULL ,
  `estado_civil` VARCHAR(45) NULL ,
  `vive_con` VARCHAR(45) NULL ,
  `becado` INT NULL COMMENT '0=NO ESTA BECADO\n1=SI ESTA BECADO' ,
  `tipo_beca` VARCHAR(45) NULL ,
  `instancia_beca` VARCHAR(45) NULL ,
  `trabaja` INT NULL DEFAULT 0 COMMENT '0=NO TRABAJA\n1=SI TRABAJA' ,
  `empresa_trabajo` VARCHAR(45) NULL ,
  `horario` VARCHAR(45) NULL ,
  `puesto_trabajo` VARCHAR(45) NULL ,
  `servicio_medico` VARCHAR(45) NULL ,
  `tratamiento_medico` INT NULL COMMENT '0=NO TIENE TRATAMIENTO\n1=SI TIENE TRATAMIENTO' ,
  `tratamiento_observaciones` TEXT NULL ,
  `observaciones` TEXT NULL ,
  `tipo_sangre` VARCHAR(45) NULL ,
  `fecha` DATE NULL )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tutorapp`.`datos_contacto`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `tutorapp`.`datos_contacto` (
  `id_contacto` INT NOT NULL ,
  `id_alumno` INT NULL ,
  `nombre_contacto` VARCHAR(200) NULL ,
  `edad_contacto` INT NULL ,
  `ocupacion` VARCHAR(45) NULL ,
  `lugar_trabajo` VARCHAR(45) NULL ,
  `telefono_casa` VARCHAR(45) NULL ,
  `telefono_oficina` VARCHAR(45) NULL ,
  `celular` VARCHAR(45) NULL ,
  `correo` VARCHAR(45) NULL ,
  `observaciones_contacto` TEXT NULL ,
  `tipo_contacto` ENUM('normal','emergencia') NULL ,
  `recomendaciones_accidente` TEXT NULL ,
  `activo` INT NULL COMMENT '0=INACTIVO\n1=ACTIVO' ,
  PRIMARY KEY (`id_contacto`) )
ENGINE = InnoDB;

USE `tutorapp` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
