-- phpMyAdmin SQL Dump
-- version 3.4.11.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 19-11-2013 a las 10:09:14
-- Versión del servidor: 5.5.30
-- Versión de PHP: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `saopaulo_tutorapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--
-- Creación: 19-11-2013 a las 03:58:03
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `primer_apellido` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `segundo_apellido` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `carrera` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `matricula` int(11) DEFAULT NULL,
  `cuatrimestre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_alumno`
--
-- Creación: 19-11-2013 a las 03:58:03
--

DROP TABLE IF EXISTS `datos_alumno`;
CREATE TABLE IF NOT EXISTS `datos_alumno` (
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_contacto`
--
-- Creación: 19-11-2013 a las 03:58:03
--

DROP TABLE IF EXISTS `datos_contacto`;
CREATE TABLE IF NOT EXISTS `datos_contacto` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dpa`
--
-- Creación: 19-11-2013 a las 03:58:03
--

DROP TABLE IF EXISTS `dpa`;
CREATE TABLE IF NOT EXISTS `dpa` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `primer_apellido` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `segundo_apellido` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `carrera` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dpa_tutores`
--
-- Creación: 19-11-2013 a las 03:58:03
--

DROP TABLE IF EXISTS `dpa_tutores`;
CREATE TABLE IF NOT EXISTS `dpa_tutores` (
  `id_dpa` int(11) DEFAULT NULL,
  `id_tutor` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutores`
--
-- Creación: 19-11-2013 a las 03:58:03
--

DROP TABLE IF EXISTS `tutores`;
CREATE TABLE IF NOT EXISTS `tutores` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `primer_apellido` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `segundo_apellido` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutorias`
--
-- Creación: 19-11-2013 a las 03:58:03
--

DROP TABLE IF EXISTS `tutorias`;
CREATE TABLE IF NOT EXISTS `tutorias` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tutorias`
--

INSERT INTO `tutorias` (`id`, `programa_educativo`, `id_tutor`, `fecha_asignacion`, `num_sesion`, `fecha_sesion`, `acuerdos`, `id_alumno`, `estatus`, `notas_personales`, `activo`) VALUES
(1, 'SOFTWARE', 1, '2013-11-14', NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutor_alumnos`
--
-- Creación: 19-11-2013 a las 03:58:03
--

DROP TABLE IF EXISTS `tutor_alumnos`;
CREATE TABLE IF NOT EXISTS `tutor_alumnos` (
  `id_tutor` int(11) DEFAULT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--
-- Creación: 19-11-2013 a las 03:58:03
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `password` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `rol` enum('admin','dpa','tutor','alumno') COLLATE utf8_spanish2_ci DEFAULT NULL,
  `correo` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `activo` int(11) DEFAULT '0' COMMENT '0=INACTIVO\n1=ACTIVO',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `rol`, `correo`, `fecha`, `activo`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@gmail.com', '2013-11-14 00:00:00', 0),
(2, 'ilse', 'ilse', 'admin', 'ilseferman@gmail.com', '2013-11-14 00:00:00', 0),
(3, 'andrez', 'be7a72815ff33a98e4e35bbbe0e94754220f6aeb', 'admin', 'a_kanin@hotmail.com', '2013-11-14 19:52:27', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
