/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50525
 Source Host           : localhost
 Source Database       : tutorapp

 Target Server Type    : MySQL
 Target Server Version : 50525
 File Encoding         : utf-8

 Date: 12/12/2013 17:52:46 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `alumnos`
-- ----------------------------
DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE `alumnos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `primer_apellido` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `segundo_apellido` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `carrera` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `matricula` int(11) DEFAULT NULL,
  `cuatrimestre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `alumnos`
-- ----------------------------
BEGIN;
INSERT INTO `alumnos` VALUES ('1', 'Andres', 'Ortoz', 'Herrera', 'Ing en Software', '1101150064', '9Âº', '24'), ('2', 'Josue', 'Camilo', 'Barbosa', 'Ing en Software', '1101150076', '9no', '6'), ('3', 'Sonia', 'Sinahi', 'Maritnez', 'Ing de Manufactura', '1101150074', '9no Cuatri', null), ('4', 'Paul', 'Vega', 'Rodriguez', 'Software', '1124012312', '1ro', null), ('5', 'Guachp', 'PatiÃ±o', 'Canales', 'Ing en software', '0', '9no', null);
COMMIT;

-- ----------------------------
--  Table structure for `datos_alumno`
-- ----------------------------
DROP TABLE IF EXISTS `datos_alumno`;
CREATE TABLE `datos_alumno` (
  `id` int(11) unsigned DEFAULT NULL,
  `calle` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `colonia` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `codigo_postal` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sexo` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `celular` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `otro_telefono` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `correo` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `lugar_nacimiento` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `estado_civil` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `vive_con` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `becado` int(11) DEFAULT NULL COMMENT '0=NO ESTA BECADO\n1=SI ESTA BECADO',
  `tipo_beca` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `instancia_beca` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `trabaja` int(11) DEFAULT '0' COMMENT '0=NO TRABAJA\n1=SI TRABAJA',
  `empresa_trabajo` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `horario` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `puesto_trabajo` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `servicio_medico` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tratamiento_medico` int(11) DEFAULT NULL COMMENT '0=NO TIENE TRATAMIENTO\n1=SI TIENE TRATAMIENTO',
  `tratamiento_observaciones` text COLLATE utf8_spanish2_ci,
  `observaciones` text COLLATE utf8_spanish2_ci,
  `tipo_sangre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `datos_contacto`
-- ----------------------------
DROP TABLE IF EXISTS `datos_contacto`;
CREATE TABLE `datos_contacto` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_alumno` int(11) DEFAULT NULL,
  `nombre_contacto` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `edad_contacto` int(11) DEFAULT NULL,
  `ocupacion` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `lugar_trabajo` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono_casa` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono_oficina` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `celular` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `correo` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `observaciones_contacto` text COLLATE utf8_spanish2_ci,
  `tipo_contacto` enum('normal','emergencia') COLLATE utf8_spanish2_ci DEFAULT NULL,
  `recomendaciones_accidente` text COLLATE utf8_spanish2_ci,
  `activo` int(11) DEFAULT NULL COMMENT '0=INACTIVO\n1=ACTIVO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `dpa`
-- ----------------------------
DROP TABLE IF EXISTS `dpa`;
CREATE TABLE `dpa` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `primer_apellido` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `segundo_apellido` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `carrera` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `dpa`
-- ----------------------------
BEGIN;
INSERT INTO `dpa` VALUES ('1', 'Rosalinda', 'Mesta', 'Morales', null, null), ('2', 'Ivan', 'GonzÃ¡les', 'Peyro', null, '36');
COMMIT;

-- ----------------------------
--  Table structure for `dpa_tutores`
-- ----------------------------
DROP TABLE IF EXISTS `dpa_tutores`;
CREATE TABLE `dpa_tutores` (
  `id_dpa` int(11) DEFAULT NULL,
  `id_tutor` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Table structure for `tutor_alumnos`
-- ----------------------------
DROP TABLE IF EXISTS `tutor_alumnos`;
CREATE TABLE `tutor_alumnos` (
  `id_tutor` int(11) DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `tutor_alumnos`
-- ----------------------------
BEGIN;
INSERT INTO `tutor_alumnos` VALUES ('1', '1', '2013-12-11 21:16:57', '1');
COMMIT;

-- ----------------------------
--  Table structure for `tutores`
-- ----------------------------
DROP TABLE IF EXISTS `tutores`;
CREATE TABLE `tutores` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `primer_apellido` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `segundo_apellido` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `tutores`
-- ----------------------------
BEGIN;
INSERT INTO `tutores` VALUES ('1', 'Liliana', 'LimÃ³n', 'Peyro', '23'), ('2', 'Ivan', 'Peyro', 'Gonzales', null), ('3', 'Felix', 'Acosta', 'Hernandez', null);
COMMIT;

-- ----------------------------
--  Table structure for `tutorias`
-- ----------------------------
DROP TABLE IF EXISTS `tutorias`;
CREATE TABLE `tutorias` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `programa_educativo` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_tutor` int(11) DEFAULT NULL,
  `fecha_asignacion` date DEFAULT NULL,
  `num_sesion` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_sesion` date DEFAULT NULL,
  `acuerdos` text COLLATE utf8_spanish2_ci,
  `id_alumno` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estatus` enum('Inicio','Seguimiento','Termino') COLLATE utf8_spanish2_ci DEFAULT NULL,
  `notas_personales` text COLLATE utf8_spanish2_ci,
  `activo` int(11) DEFAULT '0' COMMENT '0=INACTIVO\n1=ACTIVO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `tutorias`
-- ----------------------------
BEGIN;
INSERT INTO `tutorias` VALUES ('1', 'SOFTWARE', '1', '2013-11-14', null, null, null, null, null, null, '0'), ('2', 'Perronone', null, '2013-12-19', '1', '2013-12-04', 'Hola', '1', 'Inicio', 'Es un alumno destacado', '0'), ('3', null, null, null, null, null, null, '0', null, null, '0'), ('4', null, null, null, null, null, null, '0', null, null, '0'), ('5', null, null, null, null, null, null, '0', null, null, '0'), ('6', null, null, null, null, null, null, '0', null, null, '0'), ('7', null, null, null, null, null, null, '0', null, null, '0');
COMMIT;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rol` enum('admin','dpa','tutor','alumno','Por Asignar') COLLATE utf8_spanish2_ci DEFAULT 'Por Asignar',
  `correo` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `activo` int(11) DEFAULT '0' COMMENT '0=INACTIVO\n1=ACTIVO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('6', 'andrez', '7e79696887d279eb02b713fd673470a7a229a47c', 'admin', 'andrez@hotmail.com', '2013-11-27 01:45:26', '1'), ('23', 'homi', 'd2cf27c5cf32a1542796ff6e89649303eefe3359', 'alumno', 'a_kanini@hotmail.com', '2013-12-05 01:16:59', '1'), ('24', 'and', 'd2cf27c5cf32a1542796ff6e89649303eefe3359', 'admin', 'and@hotm.com', '2013-12-06 22:53:52', '1'), ('25', 'prueba', 'a0d343af135f841dfcf895f7e0a95d0af3939eb4', 'Por Asignar', 'pr@hotmail.com', '2013-12-12 15:47:11', '0'), ('26', 'pruebas', '4c7e54bc8c281f0433a93913849c8b11eb680fec', 'Por Asignar', 'pru@hotmail.com', '2013-12-12 15:48:23', '0'), ('27', 'ilse', 'f8ea82d4ae6295524957e5336a7c3920401ffc76', 'Por Asignar', 'ilseferman@gmail.com', '2013-12-12 15:49:13', '0'), ('28', 'josesito', 'b4e767e635f4e16de2f42c0e9e7d3267d5755070', 'Por Asignar', 'josesito@hotmail.com', '2013-12-12 16:07:40', '0'), ('29', 'perron', 'afeb82a2461cb89868ec0b4339ca6a7565655411', 'alumno', 'perron@hotmail.com', '2013-12-12 16:08:35', '1'), ('30', 'jamon', 'e9e4730bad212d7f55581ee1ebc86f15ef440a18', 'Por Asignar', 'jamon@hotmail.com', '2013-12-12 16:10:01', '0'), ('31', 'porque', 'c304f7a954c20d61644501a179a33a63705876ed', 'Por Asignar', 'porque@hotmail.com', '2013-12-12 16:10:30', '0'), ('32', 'mejorando', 'f8c6fbb4dfa49bee5cd38f99b0b02b4bd3df4596', 'Por Asignar', 'mejora@mejora.la', '2013-12-12 16:15:57', '0'), ('33', 'jos', '76bf648e79f237e9f04501d9c0887a46a029877f', 'dpa', 'jos@hotm.com', '2013-12-12 16:20:01', '0'), ('34', 'slkdjrelw', '1a655d4478b74cf7864e20b7a527aecb1af3d812', 'Por Asignar', 'lksjdflkjsdf@hotm.com', '2013-12-12 16:21:35', '0'), ('35', 'jose', '1002222c7392a6a438556ce31b814cee80e8c4ba', 'Por Asignar', 'josefo@hotm.com', '2013-12-12 16:24:16', '0'), ('36', 'persona', '6cab01792b043db55fdeff0f9a38806034d11391', 'Por Asignar', 'per@hotmail.com', '2013-12-12 16:24:45', '0'), ('37', 'aldoes', '531e750c03356bd8d6ed844ccf57f2827e082b3d', 'Por Asignar', 'aldoes@hotmail.com', '2013-12-12 17:24:54', '0'), ('38', 'rogelio', '7c2fae40cc1cb609eef1abe8d8b3b32b3349ea40', 'Por Asignar', 'rojas@hotmail.com', '2013-12-12 17:28:34', '0'), ('39', 'jalkr', '413f46bdf9b0a4f7bb354e7d66fa0eb596624302', 'Por Asignar', 'jar@hotmail.com', '2013-12-12 17:31:31', '0'), ('40', 'anita', 'bc42d58248af78de920756835b3ad6a4dc520c5d', 'Por Asignar', 'anita@hotmail.com', '2013-12-12 17:35:22', '0'), ('41', 'lluvia', '7cf3ede1b5fa1921e126446ef98eb77886f5c1a8', 'Por Asignar', 'lluvia@hotmail.com', '2013-12-12 17:37:31', '0'), ('42', 'andre', '9faa0b2ab243b79a57a1f14418db66bc91550a46', 'Por Asignar', 'andre@gmail.com', '2013-12-12 17:44:11', '0'), ('43', 'josera', '6aba551cbf324f0e5a9c93f10504b6d301eefc39', 'Por Asignar', 'josera@h.com', '2013-12-12 17:47:02', '0'), ('44', 'edith', '3515dcfae15a1dc6b349dbf33806a2a74d896e17', 'Por Asignar', 'edith@h.com', '2013-12-12 17:49:12', '0');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
