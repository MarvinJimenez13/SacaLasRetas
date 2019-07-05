-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2017 a las 07:04:05
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `redsocial`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `noticia` text NOT NULL,
  `reportero` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `noticia`, `reportero`, `fecha`, `imagen`) VALUES
(8, 'Sorteo del Mundial 2018: Así queda la fase de grupos.', 'El sorteo en Moscú para el Mundial de Rusia 2018 ha dejado a España en el grupo B, emparejada con Portugal, Irán y Marruecos. Argentina ha caído en el grupo D con Islandia, Croacia y Nigeria, mientras que México, que está en el grupo F, se enfrentará a Alemania, Suecia y Corea del Sur. La selección española jugará contra el país luso, liderado por Cristiano Ronaldo y actual campeón de la Eurocopa, el 15 de junio en Sochi; el día 20 el rival será Irán, un partido que se disputará en la ciudad de Kazán; el último conjunto al que se medirá el equipo dirigido por Julen Lopetegui es Marruecos, un encuentro que se jugará el 25 de junio en Kaliningrado. El Mundial comenzará el 14 de junio a las 17.00 con un enfrentamiento entre Rusia y Arabaia Saudí. La final se celebrará el 15 de julio en Moscú.', 23, '2017-12-01 20:35:14', ''),
(9, 'México jugará su primer partido del Mundial Rusia 2018 contra Alemania :vvv', 'Moscú, Rusia -\r\nLa suerte está echada y la Selección Mexicana debutará en Rusia 2018 nada menos que contra el campeón del mundo, Alemania, equipo contra el que perdió 4-1 en la reciente Copa Confederaciones.\r\n\r\nEl Tri quedó en el Grupo F de la próxima Copa del Mundo, en donde el cabeza de serie es el cuadro de Joachim Löw, equipo contra el que el cuadro de Juan Carlos Osorio jugará el domingo 17 de junio en el Estdio Luzhniki de Moscú, el inmueble donde se jugará la inauguración y la final.', 24, '2017-12-01 20:36:49', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
