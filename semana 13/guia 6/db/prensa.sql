-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2019 a las 17:17:24
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prensa`
--
CREATE DATABASE IF NOT EXISTS `prensa` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `prensa`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `idnoticia` int(11) NOT NULL,
  `titulonoticia` varchar(120) NOT NULL,
  `textonoticia` text NOT NULL,
  `imgnoticia` varchar(200) NOT NULL,
  `idnota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='El detalle de las noticias';

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`idnoticia`, `titulonoticia`, `textonoticia`, `imgnoticia`, `idnota`) VALUES
(1, 'Fuerza Especializada trabaja en 12 puntos del país y apegada a leyes', '<p>Esta tarde el director de la Policía Nacional Civil (PNC), Howard Cotto, informó que la Fuerza Especializada de Reacción ya se encuentra trabajando en 12 puntos del país, tres sitios más con los que se comenzó tras su lanzamiento.</p>\r\n<p>La FES está trabajando en el combate al crimen, de manera centralizada y con acciones más rígidas de las que ya lleva a cabo la Fuerza Armada y la PNC, que son instituciones que la conforman.</p>\r\n<p>Cotto mencionó que desde el inicio de trabajo de la Fuerza ya se contabilizan 50 capturas. Y que, actualmente se está trabajando en los diez municipios con mayor violencia en el país contemplados dentro del Plan El Salvador Seguro. El director de la institución policial dijo que el trabajo de la FES se concentra sobre todo en aquellas zonas rurales del país.</p>', 'img/fuerza-especial.jpg', 1),
(2, 'Papa Francisco recibirá a sobrina del Beato Romero', '<p>En la audiencia general del próximo miércoles 23, el Papa Francisco saludará a Cecilia Romero, sobrina del Beato Oscar Arnulfo Romero, un día antes de la fecha en la que fue martirizado por odio a la fe</p>\n<p>El periódico argentino La Nación informa del hecho del pontífice, "en la misma audiencia del miércoles próximo Francisco recibirá a Cecilia Romero, sobrina del beato Monseñor Oscar Romero, asesinado el 24 de marzo de 1980 en El Salvador mientras celebraba una misa".</p>\n<p>El saludo del Papa se da en el marco de la decisión tomada por El Vaticano -a pedido de Francisco-, de desclasificar documentos secretos de las dictaduras militares de Argentina y Uruguay.</p>', 'img/papa-francisco.jpg', 2),
(3, 'El City de los mil millones de euros', '<p>A nadie se le regala estar entre los mejores. Lo puede constatar elManchester City. Le ha costado un auténtico pastizal, más de mil millones de euros gastados en tan sólo ocho años. Pero al jeque le habrá merecido la pena. Por primera vez en su historia ve a su equipo en las semifinales de la máxima competición continental, donde más brillan los diamantes.</p>\r\n<p>La historia del Manchester City cambió en septiembre de 2008. Un grupo inversor de los Emiratos Árabes tomó el mando para transformar el club a base de millones. De muchísimos. Mansour, uno de los amos del petróleo, se convirtió en el máximo accionista para saltar la banca y refundar un equipo diseñado para conquistar Europa algún día.</p>', 'img/manchester-city.jpg', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `idnota` int(11) NOT NULL,
  `tiponota` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Almacena los tipos de nota que se pueden publicar';

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`idnota`, `tiponota`) VALUES
(1, 'Noticias'),
(2, 'Sociales'),
(3, 'Deportes');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`idnoticia`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`idnota`);
  
SET FOREIGN_KEY_CHECKS=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
