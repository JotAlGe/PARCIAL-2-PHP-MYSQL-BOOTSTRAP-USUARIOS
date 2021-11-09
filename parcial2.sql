-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 09, 2021 at 09:35 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parcial2`
--

-- --------------------------------------------------------

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
CREATE TABLE IF NOT EXISTS `areas` (
  `id_ar` int(11) NOT NULL AUTO_INCREMENT,
  `descrip_ar` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_ar`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `areas`
--

INSERT INTO `areas` (`id_ar`, `descrip_ar`) VALUES
(1, 'Sistemas'),
(2, 'Administración'),
(3, 'Mantenimiento');

-- --------------------------------------------------------

--
-- Table structure for table `incidents`
--

DROP TABLE IF EXISTS `incidents`;
CREATE TABLE IF NOT EXISTS `incidents` (
  `id_inc` int(11) NOT NULL AUTO_INCREMENT,
  `id_pri` int(11) NOT NULL,
  `id_sta` int(11) NOT NULL,
  `id_us` int(11) NOT NULL,
  `title_inc` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `descrip_inc` text COLLATE utf8_spanish2_ci NOT NULL,
  `date_inc` datetime NOT NULL,
  PRIMARY KEY (`id_inc`),
  KEY `id_pri` (`id_pri`),
  KEY `id_sta` (`id_sta`),
  KEY `id_us` (`id_us`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `incidents`
--

INSERT INTO `incidents` (`id_inc`, `id_pri`, `id_sta`, `id_us`, `title_inc`, `descrip_inc`, `date_inc`) VALUES
(1, 1, 1, 2, 'Incidencia de prueba', 'Lorem ipsum dolor sit amet consectetur adipiscing elit aptent vitae, vehicula hendrerit ultricies auctor per commodo tempor nullam ligula, iaculis tempus cras habitasse suscipit felis dapibus varius. Ac proin habitasse praesent nisl porta etiam tempor vehicula, platea cursus condimentum vestibulum quis iaculis quisque, accumsan natoque rutrum sapien parturient feugiat curae. Nibh cras hendrerit dictumst sed justo eros natoque felis suscipit tortor, praesent ridiculus faucibus feugiat morbi congue cursus duis lectus quam velit', '2021-11-06 15:00:27'),
(2, 2, 1, 2, 'Problemas con la temperatura de la notebook', 'MI Computadora toma temperaturas elevadas luego de una hora de uso.', '2021-11-06 15:00:45'),
(3, 1, 1, 1, 'Impresoras sin tinta', 'Se les agotÃ³ la tinta a las impresoras, se require tinta para impresoras HP.', '2021-11-06 15:01:07'),
(4, 3, 2, 2, 'El monitor no enciende', 'Al encender el equipo, el monitor no enciende ni se visualiza luz en el mismo', '2021-11-06 15:01:37'),
(5, 3, 3, 3, 'Al ingresar al sistema se nota lentitud', 'cuando me logueo en el sistema del trabajo, el equipo comienza a ponerse muy lento', '2021-11-06 15:02:01'),
(6, 2, 1, 3, 'El mouse no funciona', 'Probando conectarlo al USB de varios equipos, no logro que funcione, solicito un cambio', '2021-11-06 19:07:14'),
(7, 3, 2, 3, 'Solicitud de permiso', 'Necesito me habiliten el ingreso al sistema de gestiÃ³n de pagos.', '2021-11-07 12:06:55'),
(8, 2, 1, 2, 'Los telÃ©fonos no funcionan', 'Ocurre un problema con las lineas telefÃ³nicas.', '2021-11-09 18:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
CREATE TABLE IF NOT EXISTS `levels` (
  `id_lev` int(11) NOT NULL,
  `descrip_lev` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_lev`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id_lev`, `descrip_lev`) VALUES
(1, 'Administrador'),
(2, 'Usuario Normal'),
(3, 'Técnico');

-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

DROP TABLE IF EXISTS `priorities`;
CREATE TABLE IF NOT EXISTS `priorities` (
  `id_pri` int(11) NOT NULL,
  `descrip_pri` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_pri`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`id_pri`, `descrip_pri`) VALUES
(1, 'Alta'),
(2, 'Media'),
(3, 'Baja');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id_sta` int(11) NOT NULL,
  `descrip_sta` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_sta`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id_sta`, `descrip_sta`) VALUES
(1, 'Iniciado'),
(2, 'En Proceso'),
(3, 'Finalizado');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_us` int(11) NOT NULL AUTO_INCREMENT,
  `id_lev` int(11) NOT NULL,
  `id_ar` int(11) NOT NULL,
  `name_us` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `image_us` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `email_us` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `password_us` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `last_access_us` datetime NOT NULL,
  `active_us` tinyint(1) NOT NULL,
  `last_name_us` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id_us`),
  KEY `id_lev` (`id_lev`),
  KEY `id_ar` (`id_ar`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_us`, `id_lev`, `id_ar`, `name_us`, `image_us`, `email_us`, `password_us`, `last_access_us`, `active_us`, `last_name_us`) VALUES
(1, 1, 1, 'Juan', 'Juan.PNG', 'juan@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-11-09 18:33:15', 1, 'González'),
(2, 2, 2, 'Melisa', 'team-3.PNG', 'meli@yahoo.com', '202cb962ac59075b964b07152d234b70', '2021-11-09 18:33:23', 1, 'Salas'),
(3, 3, 3, 'Antonio', NULL, 'antonio@hotmail.com', '202cb962ac59075b964b07152d234b70', '2021-11-09 18:33:32', 1, 'Rosas');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
