/*
SQLyog Community v11.26 (64 bit)
MySQL - 5.5.24-log : Database - tutorapp
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tutorapp` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci */;

USE `tutorapp`;

/*Table structure for table `alumnos` */

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

/*Data for the table `alumnos` */

insert  into `alumnos`(`id`,`nombre`,`primer_apellido`,`segundo_apellido`,`carrera`,`matricula`,`cuatrimestre`,`id_usuario`) values (1,'Ilse','Ferman','Garcia','SOFTWARE',1003150006,'9',NULL),(2,'Pony','Gon','Gon','SOFTWARE',1003150007,'5',NULL),(3,'Ash','Ketchup','Picka','SOFTWARE',1003160002,'1',NULL),(4,'YU','GI','OH','SOFTWARE',1003150008,'9',NULL),(5,'Rocio','Palacios','Rio','SOFTWARE',1003150009,'9',NULL);

/*Table structure for table `datos_alumno` */

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

/*Data for the table `datos_alumno` */

/*Table structure for table `datos_contacto` */

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

/*Data for the table `datos_contacto` */

/*Table structure for table `dpa` */

DROP TABLE IF EXISTS `dpa`;

CREATE TABLE `dpa` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `primer_apellido` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `segundo_apellido` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `carrera` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

/*Data for the table `dpa` */

insert  into `dpa`(`id`,`nombre`,`primer_apellido`,`segundo_apellido`,`carrera`,`id_usuario`) values (1,'Ivan','Gonzalez','Peyro','Software',9),(2,'Ana Liliana','Pymes','PymeÃ±a',NULL,NULL),(6,'aaa','aa','a',NULL,NULL);

/*Table structure for table `dpa_tutores` */

DROP TABLE IF EXISTS `dpa_tutores`;

CREATE TABLE `dpa_tutores` (
  `id_dpa` int(11) DEFAULT NULL,
  `id_tutor` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

/*Data for the table `dpa_tutores` */

/*Table structure for table `tutor_alumnos` */

DROP TABLE IF EXISTS `tutor_alumnos`;

CREATE TABLE `tutor_alumnos` (
  `id_tutor` int(11) DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

/*Data for the table `tutor_alumnos` */

insert  into `tutor_alumnos`(`id_tutor`,`id_alumno`,`created`,`id`) values (1,2,'2013-12-10 17:57:13',2),(2,1,'2013-12-10 18:16:09',10);

/*Table structure for table `tutores` */

DROP TABLE IF EXISTS `tutores`;

CREATE TABLE `tutores` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `primer_apellido` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `segundo_apellido` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

/*Data for the table `tutores` */

insert  into `tutores`(`id`,`nombre`,`primer_apellido`,`segundo_apellido`,`id_usuario`) values (1,'Liliana','Limon',NULL,3),(2,'SeÃ±orita','Laura','America',NULL),(3,'Po','ko','yo',NULL);

/*Table structure for table `tutorias` */

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

/*Data for the table `tutorias` */

insert  into `tutorias`(`id`,`programa_educativo`,`id_tutor`,`fecha_asignacion`,`num_sesion`,`fecha_sesion`,`acuerdos`,`id_alumno`,`estatus`,`notas_personales`,`activo`) values (1,'SOFTWARE',1,'2013-11-14','1','2013-12-03','Ya no sere tan feo Me bañare','2','Inicio','me cae mal',0),(2,'SOFTWARE',1,'2013-12-18','2','2013-12-18','Hara lo mismo\r\n','2','Seguimiento','ushhcale',0);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rol` enum('admin','dpa','tutor','alumno','Por asignar') COLLATE utf8_spanish2_ci DEFAULT NULL,
  `correo` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `activo` int(11) DEFAULT '0' COMMENT '0=INACTIVO\n1=ACTIVO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`,`rol`,`correo`,`fecha`,`activo`) values (1,'admin','admin','admin','admin@gmail.com','2013-11-14 00:00:00',1),(2,'ilse','ilse','admin','ilseferman@gmail.com','2013-11-14 00:00:00',1),(3,'andrez','be7a72815ff33a98e4e35bbbe0e94754220f6aeb','admin','a_kanin@hotmail.com','2013-11-14 19:52:27',1),(4,'ilseferman','f8ea82d4ae6295524957e5336a7c3920401ffc76','alumno','ilseferman@gmail.com','2013-11-27 19:28:19',1),(9,'yo','03ea75a1e8c3b6f747e816383bb604ddd4e82e00',NULL,'yo@hotmail.com','2013-12-05 06:24:59',1),(10,'yooo','ebe2044add170990c85c5f5990362d253bb1dbee',NULL,'yooo@hotmail.com','2013-12-05 06:28:57',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
