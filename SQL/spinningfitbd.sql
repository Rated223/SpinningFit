-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.19 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para spinningfitbd
CREATE DATABASE IF NOT EXISTS `spinningfitbd` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `spinningfitbd`;

-- Volcando estructura para tabla spinningfitbd.administrador
CREATE TABLE IF NOT EXISTS `administrador` (
  `idadministrador` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_administrador` varchar(45) DEFAULT NULL,
  `contrasena_administrador` varchar(45) DEFAULT NULL,
  `nombre_administrador` varchar(45) DEFAULT NULL,
  `apellido_administrador` varchar(45) DEFAULT NULL,
  `direccion_administrador` varchar(45) DEFAULT NULL,
  `correo_administrador` varchar(45) DEFAULT NULL,
  `telefono_administrador` varchar(45) DEFAULT NULL,
  `sueldo_administrador` varchar(45) DEFAULT NULL,
  `clave_administrador` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idadministrador`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla spinningfitbd.administrador: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` (`idadministrador`, `usuario_administrador`, `contrasena_administrador`, `nombre_administrador`, `apellido_administrador`, `direccion_administrador`, `correo_administrador`, `telefono_administrador`, `sueldo_administrador`, `clave_administrador`) VALUES
	(2, 'rated223', 'qwerty', 'Daniel Alejandro', 'Carrizales Juarez', 'Gran #1015', 'Rated223@outlook.com', '8114211375', '5000', '12345');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;

-- Volcando estructura para tabla spinningfitbd.alumno
CREATE TABLE IF NOT EXISTS `alumno` (
  `idalumno` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_alumno` varchar(45) DEFAULT NULL,
  `contrasena_alumno` varchar(45) DEFAULT NULL,
  `nombre_alumno` varchar(45) DEFAULT NULL,
  `apellido_alumno` varchar(45) DEFAULT NULL,
  `direccion_alumno` varchar(45) DEFAULT NULL,
  `correo_alumno` varchar(45) DEFAULT NULL,
  `telefono_alumno` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idalumno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla spinningfitbd.alumno: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
INSERT INTO `alumno` (`idalumno`, `usuario_alumno`, `contrasena_alumno`, `nombre_alumno`, `apellido_alumno`, `direccion_alumno`, `correo_alumno`, `telefono_alumno`) VALUES
	(1, 'Emma09', 'qwerty', 'Emmanuel', 'Vazquez', 'Ejemplo #1234', 'test@test.com', '8123456789'),
	(2, 'Alberto23', '1234', 'Alberto', 'Martinez', 'Calle #4576', 'Test@gmail.com', '8114567832');
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;

-- Volcando estructura para tabla spinningfitbd.anuncios
CREATE TABLE IF NOT EXISTS `anuncios` (
  `idAnuncios` int(11) NOT NULL AUTO_INCREMENT,
  `Administrador_idAdministrador` int(11) DEFAULT NULL,
  `titulo_anuncio` varchar(35) NOT NULL,
  `imagen_anuncio` varchar(45) DEFAULT NULL,
  `descripcion_anuncio` varchar(45) DEFAULT NULL,
  `fecha_anuncio` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idAnuncios`),
  KEY `fk_Anuncios_Administrador1_idx` (`Administrador_idAdministrador`),
  CONSTRAINT `anuncios_ibfk_1` FOREIGN KEY (`Administrador_idAdministrador`) REFERENCES `administrador` (`idadministrador`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla spinningfitbd.anuncios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `anuncios` DISABLE KEYS */;
INSERT INTO `anuncios` (`idAnuncios`, `Administrador_idAdministrador`, `titulo_anuncio`, `imagen_anuncio`, `descripcion_anuncio`, `fecha_anuncio`) VALUES
	(1, 2, 'Prueba1', '1.png', 'Hola mundo2', '2019-1-15'),
	(3, 2, 'Carrera', '3.jpg', 'caridad', '2018-12-05');
/*!40000 ALTER TABLE `anuncios` ENABLE KEYS */;

-- Volcando estructura para tabla spinningfitbd.asistencia
CREATE TABLE IF NOT EXISTS `asistencia` (
  `idAsistencia` int(11) NOT NULL AUTO_INCREMENT,
  `Alumnos_idAlumnos` int(11) NOT NULL,
  `Clases_idClases` int(11) NOT NULL,
  `fecha_asistencia` varchar(45) NOT NULL,
  PRIMARY KEY (`idAsistencia`),
  KEY `Alumnos_idAlumnos` (`Alumnos_idAlumnos`),
  KEY `Clases_idClases` (`Clases_idClases`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla spinningfitbd.asistencia: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `asistencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `asistencia` ENABLE KEYS */;

-- Volcando estructura para tabla spinningfitbd.clases
CREATE TABLE IF NOT EXISTS `clases` (
  `idClases` int(11) NOT NULL AUTO_INCREMENT,
  `Instructor_idInstructor` int(11) NOT NULL,
  `hora_inicio` varchar(45) DEFAULT NULL,
  `hora_fin` varchar(45) DEFAULT NULL,
  `frecuencia` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idClases`),
  KEY `fk_Clases_Instructor1_idx` (`Instructor_idInstructor`),
  CONSTRAINT `fk_Clases_Instructor1` FOREIGN KEY (`Instructor_idInstructor`) REFERENCES `instructor` (`idinstructor`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla spinningfitbd.clases: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `clases` DISABLE KEYS */;
INSERT INTO `clases` (`idClases`, `Instructor_idInstructor`, `hora_inicio`, `hora_fin`, `frecuencia`) VALUES
	(1, 1, '9:00', '12:00', 'L-Mi-V');
/*!40000 ALTER TABLE `clases` ENABLE KEYS */;

-- Volcando estructura para tabla spinningfitbd.detalles_venta
CREATE TABLE IF NOT EXISTS `detalles_venta` (
  `id_detalles_venta` int(4) NOT NULL AUTO_INCREMENT,
  `id_venta` int(4) NOT NULL,
  `id_producto` int(4) NOT NULL,
  `cantidad_producto_venta` int(4) NOT NULL,
  PRIMARY KEY (`id_detalles_venta`),
  KEY `Productos_en_venta` (`id_venta`),
  CONSTRAINT `Productos_en_venta` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`idVentas`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla spinningfitbd.detalles_venta: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `detalles_venta` DISABLE KEYS */;
INSERT INTO `detalles_venta` (`id_detalles_venta`, `id_venta`, `id_producto`, `cantidad_producto_venta`) VALUES
	(31, 23, 1, 10),
	(32, 23, 2, 2);
/*!40000 ALTER TABLE `detalles_venta` ENABLE KEYS */;

-- Volcando estructura para tabla spinningfitbd.equipo
CREATE TABLE IF NOT EXISTS `equipo` (
  `idEquipo` int(11) NOT NULL AUTO_INCREMENT,
  `Administrador_idAdministrador` int(11) DEFAULT NULL,
  `nombre_equipo` varchar(45) DEFAULT NULL,
  `estado_equipo` varchar(45) DEFAULT NULL,
  `fecha_equipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEquipo`),
  KEY `fk_Equipo_Administrador1_idx` (`Administrador_idAdministrador`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla spinningfitbd.equipo: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `equipo` DISABLE KEYS */;
INSERT INTO `equipo` (`idEquipo`, `Administrador_idAdministrador`, `nombre_equipo`, `estado_equipo`, `fecha_equipo`) VALUES
	(1, 2, 'Equipo1', 'fuera de servicio', '2018-11-09');
/*!40000 ALTER TABLE `equipo` ENABLE KEYS */;

-- Volcando estructura para tabla spinningfitbd.facturas
CREATE TABLE IF NOT EXISTS `facturas` (
  `idFacturas` int(11) NOT NULL AUTO_INCREMENT,
  `Alumnos_idAlumnos` int(11) DEFAULT NULL,
  `fecha_factura` varchar(45) DEFAULT NULL,
  `total_factura` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idFacturas`),
  KEY `Alumnos_idAlumnos` (`Alumnos_idAlumnos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla spinningfitbd.facturas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `facturas` DISABLE KEYS */;
/*!40000 ALTER TABLE `facturas` ENABLE KEYS */;

-- Volcando estructura para tabla spinningfitbd.gastos
CREATE TABLE IF NOT EXISTS `gastos` (
  `idGastos` int(11) NOT NULL AUTO_INCREMENT,
  `Administrador_idAdministrador` int(11) DEFAULT NULL,
  `cantidad_gasto` varchar(45) DEFAULT NULL,
  `fecha_gasto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idGastos`),
  KEY `fk_Gastos_Administrador1_idx` (`Administrador_idAdministrador`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla spinningfitbd.gastos: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `gastos` DISABLE KEYS */;
INSERT INTO `gastos` (`idGastos`, `Administrador_idAdministrador`, `cantidad_gasto`, `fecha_gasto`) VALUES
	(1, 2, '200', '2018-10-01'),
	(2, 2, '2000', '2018-10-23'),
	(13, 2, '3000', '2018-10-23');
/*!40000 ALTER TABLE `gastos` ENABLE KEYS */;

-- Volcando estructura para tabla spinningfitbd.instructor
CREATE TABLE IF NOT EXISTS `instructor` (
  `idinstructor` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_instructor` varchar(45) DEFAULT NULL,
  `contrasena_instructor` varchar(45) DEFAULT NULL,
  `nombre_instructor` varchar(45) DEFAULT NULL,
  `apellido_instructor` varchar(45) DEFAULT NULL,
  `direccion_instructor` varchar(45) DEFAULT NULL,
  `correo_instructor` varchar(45) DEFAULT NULL,
  `telefono_instructor` varchar(45) DEFAULT NULL,
  `sueldo_instructor` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idinstructor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla spinningfitbd.instructor: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `instructor` DISABLE KEYS */;
INSERT INTO `instructor` (`idinstructor`, `usuario_instructor`, `contrasena_instructor`, `nombre_instructor`, `apellido_instructor`, `direccion_instructor`, `correo_instructor`, `telefono_instructor`, `sueldo_instructor`) VALUES
	(1, 'Leo24', 'test', 'Leo', 'Castillo', 'torres #2466', 'LeoC24@outlook.com', '8114567698', '5000');
/*!40000 ALTER TABLE `instructor` ENABLE KEYS */;

-- Volcando estructura para tabla spinningfitbd.lista_clase
CREATE TABLE IF NOT EXISTS `lista_clase` (
  `idlista` int(11) NOT NULL AUTO_INCREMENT,
  `idclase` int(11) NOT NULL,
  `idalumno` int(11) NOT NULL,
  PRIMARY KEY (`idlista`),
  KEY `idclase` (`idclase`),
  KEY `idalumno` (`idalumno`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla spinningfitbd.lista_clase: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `lista_clase` DISABLE KEYS */;
INSERT INTO `lista_clase` (`idlista`, `idclase`, `idalumno`) VALUES
	(1, 1, 1),
	(2, 1, 2);
/*!40000 ALTER TABLE `lista_clase` ENABLE KEYS */;

-- Volcando estructura para tabla spinningfitbd.mantenimiento
CREATE TABLE IF NOT EXISTS `mantenimiento` (
  `idMantenimiento` int(11) NOT NULL AUTO_INCREMENT,
  `Administrador_idAdministrador` int(11) DEFAULT NULL,
  `nombre_mantenimiento` varchar(45) DEFAULT NULL,
  `apellido_mantenimiento` varchar(45) DEFAULT NULL,
  `correo_mantenimiento` varchar(45) DEFAULT NULL,
  `telefono_mantenimiento` varchar(45) DEFAULT NULL,
  `sueldo_mantenimiento` varchar(45) DEFAULT NULL,
  `clave_mantenimiento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idMantenimiento`),
  KEY `fk_Mantenimiento_Administrador1_idx` (`Administrador_idAdministrador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla spinningfitbd.mantenimiento: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `mantenimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `mantenimiento` ENABLE KEYS */;

-- Volcando estructura para tabla spinningfitbd.mensajes
CREATE TABLE IF NOT EXISTS `mensajes` (
  `idMensajes` int(11) NOT NULL AUTO_INCREMENT,
  `id_emisor` int(11) NOT NULL,
  `tipo_emisor` varchar(45) NOT NULL,
  `id_receptor` int(11) NOT NULL,
  `tipo_receptor` varchar(45) NOT NULL,
  `contenido_mensaje` text NOT NULL,
  `fecha_mensaje` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `leido_mensaje` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`idMensajes`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla spinningfitbd.mensajes: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `mensajes` DISABLE KEYS */;
INSERT INTO `mensajes` (`idMensajes`, `id_emisor`, `tipo_emisor`, `id_receptor`, `tipo_receptor`, `contenido_mensaje`, `fecha_mensaje`, `leido_mensaje`) VALUES
	(1, 1, 'alumno', 2, 'alumno', 'Hola', '2018-10-29 22:36:55', '1'),
	(2, 2, 'alumno', 1, 'alumno', 'que tal?', '2018-10-29 22:37:12', '1'),
	(3, 1, 'alumno', 2, 'alumno', 'Todo bien', '2018-10-29 22:37:33', '1'),
	(4, 1, 'alumno', 2, 'alumno', 'Oye, recuerdas si habra clase el proximo viernes?', '2018-10-29 22:37:57', '1'),
	(5, 2, 'alumno', 1, 'alumno', 'Creo recordar que se habia cancelado', '2018-10-29 22:38:33', '1'),
	(6, 1, 'alumno', 2, 'alumno', 'Okay, gracias', '2018-10-29 23:19:40', '1'),
	(7, 1, 'alumno', 2, 'alumno', 'Te veo el proximo lunes', '2018-10-29 23:44:51', '1'),
	(12, 1, 'instructor', 1, 'alumno', 'Hola emanuel, creo que olvidaste tu mochila esta mañana', '2018-11-09 02:58:53', '1');
/*!40000 ALTER TABLE `mensajes` ENABLE KEYS */;

-- Volcando estructura para tabla spinningfitbd.notas_alumnos
CREATE TABLE IF NOT EXISTS `notas_alumnos` (
  `idNotas_Alumnos` int(11) NOT NULL AUTO_INCREMENT,
  `Alumnos_idAlumnos` int(11) NOT NULL,
  `descripcion_notas` varchar(45) DEFAULT NULL,
  `altura_nota` varchar(45) DEFAULT NULL,
  `peso_nota` varchar(45) DEFAULT NULL,
  `fecha_nota` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idNotas_Alumnos`),
  KEY `fk_Notas_Alumnos_Alumnos_idx` (`Alumnos_idAlumnos`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='			';

-- Volcando datos para la tabla spinningfitbd.notas_alumnos: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `notas_alumnos` DISABLE KEYS */;
INSERT INTO `notas_alumnos` (`idNotas_Alumnos`, `Alumnos_idAlumnos`, `descripcion_notas`, `altura_nota`, `peso_nota`, `fecha_nota`) VALUES
	(2, 1, 'Primera sesión', '170', '64', '2018-11-08 21:58:39'),
	(3, 1, 'Segunda sesión', '1.70', '63', '2018-11-08 21:59:12'),
	(4, 1, 'tercera sesión', '1.70', '63', '2018-11-08 22:34:32');
/*!40000 ALTER TABLE `notas_alumnos` ENABLE KEYS */;

-- Volcando estructura para tabla spinningfitbd.notificaciones
CREATE TABLE IF NOT EXISTS `notificaciones` (
  `idNotificacion` int(5) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(4) NOT NULL,
  `tipo_usuario` varchar(20) NOT NULL,
  `tipo_notificacion` enum('1','2','3','4','5','6','7','8') NOT NULL,
  `titulo_notificacion` varchar(45) NOT NULL,
  `contenido_notificacion` text NOT NULL,
  `leido_notificacion` enum('0','1') NOT NULL,
  `fecha_notificacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idNotificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla spinningfitbd.notificaciones: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `notificaciones` DISABLE KEYS */;
INSERT INTO `notificaciones` (`idNotificacion`, `id_usuario`, `tipo_usuario`, `tipo_notificacion`, `titulo_notificacion`, `contenido_notificacion`, `leido_notificacion`, `fecha_notificacion`) VALUES
	(1, 2, 'administrador', '1', 'Evento: Carrera', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis necessitatibus ipsam illum optio illo magnam vero consectetur, perferendis nesciunt ut at suscipit. Quia qui culpa ullam nesciunt adipisci. Ab, ad.', '1', '2018-11-05 22:58:01'),
	(2, 1, 'instructor', '1', 'Evento: Carrera', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis necessitatibus ipsam illum optio illo magnam vero consectetur, perferendis nesciunt ut at suscipit. Quia qui culpa ullam nesciunt adipisci. Ab, ad.', '1', '2018-11-05 22:58:01'),
	(3, 1, 'alumno', '1', 'Evento: Carrera', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis necessitatibus ipsam illum optio illo magnam vero consectetur, perferendis nesciunt ut at suscipit. Quia qui culpa ullam nesciunt adipisci. Ab, ad.', '0', '2018-11-05 22:58:01'),
	(4, 2, 'alumno', '1', 'Evento: Carrera', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis necessitatibus ipsam illum optio illo magnam vero consectetur, perferendis nesciunt ut at suscipit. Quia qui culpa ullam nesciunt adipisci. Ab, ad.', '1', '2018-11-05 22:58:01');
/*!40000 ALTER TABLE `notificaciones` ENABLE KEYS */;

-- Volcando estructura para tabla spinningfitbd.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `idProductos` int(11) NOT NULL AUTO_INCREMENT,
  `Administrador_idAdministrador` int(11) DEFAULT NULL,
  `nombre_producto` varchar(45) DEFAULT NULL,
  `codigo_producto` varchar(45) DEFAULT NULL,
  `precio_producto` varchar(45) DEFAULT NULL,
  `cantidad_producto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idProductos`),
  KEY `fk_Productos_Administrador1_idx` (`Administrador_idAdministrador`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla spinningfitbd.productos: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`idProductos`, `Administrador_idAdministrador`, `nombre_producto`, `codigo_producto`, `precio_producto`, `cantidad_producto`) VALUES
	(1, 2, 'Prueba1', '1234', '50', '0'),
	(2, 2, 'Manquerna .5kg ', '1235', '300', '10'),
	(3, 2, 'Manquerna 1kg ', '1236', '300', '6'),
	(4, 2, 'Suplemento alimenticio 4.4 lbs', '1237', '600', '7'),
	(5, 2, 'Suplemento alimenticio 2 lbs', '1238', '250', '20');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando estructura para tabla spinningfitbd.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `idVentas` int(11) NOT NULL AUTO_INCREMENT,
  `Administrador_idAdministrador` int(11) DEFAULT NULL,
  `total_venta` varchar(45) DEFAULT NULL,
  `folio_venta` varchar(45) DEFAULT NULL,
  `fecha_venta` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idVentas`),
  KEY `fk_Ventas_Administrador1_idx` (`Administrador_idAdministrador`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla spinningfitbd.ventas: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` (`idVentas`, `Administrador_idAdministrador`, `total_venta`, `folio_venta`, `fecha_venta`) VALUES
	(23, 2, '1100', '1', '2018-11-11 00:02:55');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
