-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 27-11-2015 a las 15:03:32
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Base de datos: `basedatosasistencia`
-- 

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `alumno`
-- 

CREATE TABLE `alumno` (
  `IDALUMNO` varchar(8) collate utf8_spanish_ci NOT NULL,
  `CODIGO_BARRAS` varchar(8) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`IDALUMNO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `alumno`
-- 

INSERT INTO `alumno` VALUES ('13200049', 'camiloa');
INSERT INTO `alumno` VALUES ('13200116', 'jorged');
INSERT INTO `alumno` VALUES ('13200057', 'francoj');
INSERT INTO `alumno` VALUES ('13200222', 'markh');
INSERT INTO `alumno` VALUES ('13200131', 'lucerol');
INSERT INTO `alumno` VALUES ('13200113', 'diegog');
INSERT INTO `alumno` VALUES ('13200114', 'shanyh');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `asistencia`
-- 

CREATE TABLE `asistencia` (
  `IDASISTENCIA` varchar(20) collate utf8_spanish_ci NOT NULL,
  `HORA_MARCADO` time NOT NULL,
  `ESTADO_ASISTENCIA` varchar(10) collate utf8_spanish_ci NOT NULL,
  `IDALUMNO` varchar(8) collate utf8_spanish_ci default NULL,
  `IDCLASE` varchar(8) collate utf8_spanish_ci default NULL,
  PRIMARY KEY  (`IDASISTENCIA`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `asistencia`
-- 

INSERT INTO `asistencia` VALUES ('2005', '14:10:00', 'Tardanza', '13200131', '1000');
INSERT INTO `asistencia` VALUES ('2004', '14:00:00', 'Asistio', '13200057', '1000');
INSERT INTO `asistencia` VALUES ('2003', '14:03:00', 'Asistio', '13200113', '1000');
INSERT INTO `asistencia` VALUES ('2002', '14:02:00', 'Asistio', '13200222', '1000');
INSERT INTO `asistencia` VALUES ('2001', '14:01:00', 'Asistio', '13200116', '1000');
INSERT INTO `asistencia` VALUES ('2000', '14:01:00', 'Asistio', '13200049', '1000');
INSERT INTO `asistencia` VALUES ('2006', '00:00:00', 'Falta', '13200114', '1000');
INSERT INTO `asistencia` VALUES ('2007', '14:08:00', 'Asistio', '13200049', '1001');
INSERT INTO `asistencia` VALUES ('2008', '14:01:00', 'Asistio', '13200116', '1001');
INSERT INTO `asistencia` VALUES ('2009', '14:03:00', 'Asistio', '13200222', '1001');
INSERT INTO `asistencia` VALUES ('3000', '13:00:00', 'Asistio', '13200049', '1003');
INSERT INTO `asistencia` VALUES ('3001', '13:01:00', 'Asistio', '13200116', '1003');
INSERT INTO `asistencia` VALUES ('3002', '13:02:00', 'Asistio', '13200222', '1003');
INSERT INTO `asistencia` VALUES ('3003', '13:00:00', 'Asistio', '13200113', '1003');
INSERT INTO `asistencia` VALUES ('5000', '13:00:00', 'Asistio', '13200049', '1006');
INSERT INTO `asistencia` VALUES ('5001', '13:01:00', 'Asistio', '13200049', '1007');
INSERT INTO `asistencia` VALUES ('5002', '13:03:00', 'Asistio', '13200049', '1008');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `clase`
-- 

CREATE TABLE `clase` (
  `IDCLASE` varchar(8) collate utf8_spanish_ci NOT NULL,
  `AULA` int(3) NOT NULL,
  `HORA_INICIO` time NOT NULL,
  `HORA_TERMINO` time NOT NULL,
  `IDGRUPO` varchar(8) collate utf8_spanish_ci default NULL,
  `TEMA` varchar(30) collate utf8_spanish_ci NOT NULL,
  `NROSEMANA` int(2) NOT NULL,
  `FECHA` date NOT NULL,
  PRIMARY KEY  (`IDCLASE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `clase`
-- 

INSERT INTO `clase` VALUES ('1000', 201, '14:00:00', '20:00:00', '001', 'Memoria RAM', 14, '2015-11-24');
INSERT INTO `clase` VALUES ('1001', 201, '14:00:00', '20:00:00', '001', 'Memoria Virtual', 13, '2015-11-17');
INSERT INTO `clase` VALUES ('1002', 201, '14:00:00', '20:00:00', '001', 'CPU', 12, '2015-11-10');
INSERT INTO `clase` VALUES ('1003', 105, '13:00:00', '18:00:00', '007', 'Triggers', 14, '2015-11-23');
INSERT INTO `clase` VALUES ('1004', 105, '13:00:00', '18:00:00', '007', 'Querys', 13, '2015-11-16');
INSERT INTO `clase` VALUES ('1005', 105, '13:00:00', '18:00:00', '007', 'DML', 12, '2015-11-09');
INSERT INTO `clase` VALUES ('1006', 103, '13:00:00', '18:00:00', '003', 'Patrón DAO', 14, '2015-11-26');
INSERT INTO `clase` VALUES ('1007', 103, '13:00:00', '18:00:00', '003', 'Patrón MVC', 13, '2015-11-19');
INSERT INTO `clase` VALUES ('1008', 103, '13:00:00', '18:00:00', '003', 'Vista Despliegue', 12, '2015-11-12');
INSERT INTO `clase` VALUES ('1009', 102, '13:00:00', '18:00:00', '004', 'Patrón DAO', 14, '2015-11-26');
INSERT INTO `clase` VALUES ('1010', 102, '13:00:00', '18:00:00', '004', 'Patrón MVC', 13, '2015-11-19');
INSERT INTO `clase` VALUES ('1011', 102, '13:00:00', '18:00:00', '004', 'Vista Despliegue', 12, '2015-11-12');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `curso`
-- 

CREATE TABLE `curso` (
  `IDCURSO` varchar(8) collate utf8_spanish_ci NOT NULL,
  `NOMBRE_CURSO` varchar(20) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`IDCURSO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `curso`
-- 

INSERT INTO `curso` VALUES ('001', 'Matemática Discreta');
INSERT INTO `curso` VALUES ('002', 'Diseño de Software');
INSERT INTO `curso` VALUES ('003', 'Programación I');
INSERT INTO `curso` VALUES ('004', 'Programación II');
INSERT INTO `curso` VALUES ('060', 'Sistemas Operativos');
INSERT INTO `curso` VALUES ('061', 'Contabilidad');
INSERT INTO `curso` VALUES ('062', 'Idioma Extranjero VI');
INSERT INTO `curso` VALUES ('063', 'Investigación Oper I');
INSERT INTO `curso` VALUES ('064', 'Base de Datos II');
INSERT INTO `curso` VALUES ('065', 'Diseño de Software');
INSERT INTO `curso` VALUES ('050', 'Arquitectura de Comp');
INSERT INTO `curso` VALUES ('051', 'Base de Datos I');
INSERT INTO `curso` VALUES ('052', 'Idioma Extranjero V');
INSERT INTO `curso` VALUES ('053', 'Modelamiento');
INSERT INTO `curso` VALUES ('054', 'Estruct de Datos II');
INSERT INTO `curso` VALUES ('055', 'Compiladores');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `director_academico`
-- 

CREATE TABLE `director_academico` (
  `IDDIRECTOR` varchar(8) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`IDDIRECTOR`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `director_academico`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `docente`
-- 

CREATE TABLE `docente` (
  `IDDOCENTE` varchar(8) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`IDDOCENTE`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `docente`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `encargado_apoyo_docente`
-- 

CREATE TABLE `encargado_apoyo_docente` (
  `IDENCARGADO` varchar(8) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`IDENCARGADO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `encargado_apoyo_docente`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `grupo_curso`
-- 

CREATE TABLE `grupo_curso` (
  `IDGRUPO` varchar(10) collate utf8_spanish_ci NOT NULL,
  `NOMBRE_GRUPO` varchar(20) collate utf8_spanish_ci NOT NULL,
  `IDCURSO` varchar(8) collate utf8_spanish_ci NOT NULL,
  `IDHORARIO` varchar(10) collate utf8_spanish_ci default NULL,
  `IDDOCENTE` varchar(8) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`IDGRUPO`),
  KEY `GRUPO_CURSO_FK` (`IDCURSO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `grupo_curso`
-- 

INSERT INTO `grupo_curso` VALUES ('006', 'Grupo 2', '061', '05', 'null');
INSERT INTO `grupo_curso` VALUES ('005', 'Grupo 1', '061', '04', 'null');
INSERT INTO `grupo_curso` VALUES ('004', 'Grupo 2', '065', '04', 'null');
INSERT INTO `grupo_curso` VALUES ('003', 'Grupo 1', '065', '04', 'null');
INSERT INTO `grupo_curso` VALUES ('002', 'Grupo 2', '060', '02', 'null');
INSERT INTO `grupo_curso` VALUES ('001', 'Grupo 1', '060', '02', 'null');
INSERT INTO `grupo_curso` VALUES ('007', 'Grupo 1', '064', '01', 'null');
INSERT INTO `grupo_curso` VALUES ('008', 'Grupo 1', '063', '05', 'null');
INSERT INTO `grupo_curso` VALUES ('009', 'Grupo 1', '062', '03', 'null');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `grupo_curso_alumno`
-- 

CREATE TABLE `grupo_curso_alumno` (
  `IDGRUPO` varchar(10) collate utf8_spanish_ci NOT NULL,
  `IDALUMNO` varchar(8) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`IDGRUPO`,`IDALUMNO`),
  KEY `GRUPO_CURSO_ALUMNO_FK` (`IDALUMNO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `grupo_curso_alumno`
-- 

INSERT INTO `grupo_curso_alumno` VALUES ('102', '13200049');
INSERT INTO `grupo_curso_alumno` VALUES ('102', '13200116');
INSERT INTO `grupo_curso_alumno` VALUES ('104', '13200049');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `horario`
-- 

CREATE TABLE `horario` (
  `IDHORARIO` varchar(10) collate utf8_spanish_ci NOT NULL,
  `CANTIDAD_HORAS` int(2) NOT NULL,
  `DIA` varchar(7) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`IDHORARIO`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `horario`
-- 

INSERT INTO `horario` VALUES ('04', 5, 'Jueves');
INSERT INTO `horario` VALUES ('03', 5, 'Miérco');
INSERT INTO `horario` VALUES ('02', 5, 'Martes');
INSERT INTO `horario` VALUES ('01', 5, 'Lunes');
INSERT INTO `horario` VALUES ('05', 5, 'Viernes');
INSERT INTO `horario` VALUES ('06', 5, 'Sábado');
INSERT INTO `horario` VALUES ('07', 6, 'Lunes');
INSERT INTO `horario` VALUES ('08', 6, 'Martes');
INSERT INTO `horario` VALUES ('09', 6, 'Miérco');
INSERT INTO `horario` VALUES ('10', 6, 'Jueves');
INSERT INTO `horario` VALUES ('11', 6, 'Viernes');
INSERT INTO `horario` VALUES ('12', 6, 'Sábado');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `persona`
-- 

CREATE TABLE `persona` (
  `IDPERSONA` varchar(8) collate utf8_spanish_ci NOT NULL,
  `NOMBRE` varchar(20) collate utf8_spanish_ci NOT NULL,
  `APELLIDO` varchar(20) collate utf8_spanish_ci NOT NULL,
  `PASSWORD` varchar(8) collate utf8_spanish_ci NOT NULL,
  `SEXO` char(1) collate utf8_spanish_ci NOT NULL,
  `ROL` varchar(10) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`IDPERSONA`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- 
-- Volcar la base de datos para la tabla `persona`
-- 

INSERT INTO `persona` VALUES ('13200049', 'Camilo Gerardo', 'Armas Yalico', 'moqui', 'M', 'Alumno');
INSERT INTO `persona` VALUES ('13200116', 'Jorge Alberto', 'De la Cruz Padilla', 'salinas', 'M', 'Alumno');
INSERT INTO `persona` VALUES ('13200057', 'Franco Eduardo', 'Jiménez Delesma', 'oton', 'M', 'Alumno');
INSERT INTO `persona` VALUES ('13200222', 'Mark Harlank', 'Huillca Rojas', 'mynameis', 'M', 'Alumno');
INSERT INTO `persona` VALUES ('13200113', 'Diego Alonso', 'Guerra Cruzado', 'psyduck', 'M', 'Alumno');
INSERT INTO `persona` VALUES ('13200131', 'Lucero del Pilar', 'Liza Puican', 'pancho', 'F', 'Alumno');
INSERT INTO `persona` VALUES ('13200114', 'Shany Sonaly', 'Huaypar Sotelo', 'alucina', 'F', 'Alumno');
