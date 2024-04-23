-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-04-2015 a las 20:47:25
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `autocompletedb`
--
CREATE DATABASE `autocompletedb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `autocompletedb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ;

--
-- Volcado de datos para la tabla `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(1, 'China'),
(2, 'Estados Unidos'),
(3, 'India'),
(4, 'Japón'),
(5, 'Brasil'),
(6, 'Rusia'),
(7, 'Alemania'),
(8, 'Nigeria'),
(9, 'Inglaterra'),
(10, 'Francia'),
(11, 'México'),
(12, 'Corea del Sur'),
(13, 'España'),
(14, 'Corea del Norte'),
(15, 'Egipto'),
(16, 'Colombia'),
(17, 'Turquía'),
(18, 'Italia'),
(19, 'Croacia'),
(20, 'Canadá'),
(21, 'Polonia'),
(22, 'Argentina'),
(23, 'Chile'),
(24, 'Irán'),
(25, 'Sudáfrica'),
(26, 'Marruecos'),
(27, 'Bélgica'),
(28, 'Australia'),
(29, 'Trinidad y Tobago'),
(30, 'Jamaica'),
(31, 'Argelia'),
(32, 'Austria'),
(33, 'Ucrania'),
(34, 'Arabia Saudita'),
(35, 'Kenia'),
(36, 'República Dominicana'),
(37, 'Perú'),
(38, 'Rumania'),
(39, 'Dinamarca'),
(40, 'Grecia'),
(41, 'Ghana'),
(42, 'Jamaica'),
(43, 'Escocia'),
(44, 'Suecia'),
(45, 'El Salvador'),
(46, 'Guatemala'),
(47, 'Honduras'),
(48, 'Costa Rica'),
(49, 'Nicaragua'),
(50, 'Panamá'),
(51, 'Ecuador'),
(52, 'Bolivia'),
(53, 'Venezuela'),
(54, 'Holanda'),
(55, 'Indonesia'),
(56, 'Malta'),
(57, 'Malasia'),
(58, 'Noruega'),
(59, 'Paraguay'),
(60, 'Uruguay');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
