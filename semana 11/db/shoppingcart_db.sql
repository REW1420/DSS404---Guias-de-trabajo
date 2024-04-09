-- Base de datos productoscart
CREATE DATABASE productoscart DEFAULT CHARSET 'utf8' COLLATE 'utf8_general_ci';
USE productoscart;

--
-- Estructura de tabla para la tabla `productos`
--
 
CREATE TABLE IF NOT EXISTS `productos` (
 `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
 `name` varchar(255) NOT NULL,
 `brand` varchar (80) NOT NULL,
 `image` varchar(255) NOT NULL,
 `price` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET='utf8';
 
--
-- Volcado de datos para la tabla `productos`
--
 
INSERT INTO `productos` (`id`, `name`, `brand`, `image`, `price`) 
VALUES
(1, 'LED 65" TC-65FX800P 4K Ultra HD Smart TV', 'Panasonic', 'img/panasonic-led-65-4k-ultra.jpg', 389.00),
(2, 'TV LED Sony 55" HDR con 4K X-Reality PRO X72F', 'Sony', 'img/sony-led-55-hdr-x72f.jpg', 599.90),
(3, 'Galaxi s8', 'Samsung', 'img/samsung-galaxy-s10-plus.jpg', 999.95),
(4, 'Barra de sonido LG NB4540 4.1 320W Bluetooth', 'LG', 'img/lg-barra-sonido-nb4540-320w.jpg', 136.95);