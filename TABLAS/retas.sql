-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2017 a las 07:05:57
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
-- Estructura de tabla para la tabla `retas`
--

CREATE TABLE `retas` (
  `id_ret` int(11) NOT NULL,
  `nombreusuario` varchar(200) NOT NULL,
  `numjugadores` varchar(200) NOT NULL,
  `fecha` varchar(200) NOT NULL,
  `hora` varchar(200) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `coor` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `retas`
--

INSERT INTO `retas` (`id_ret`, `nombreusuario`, `numjugadores`, `fecha`, `hora`, `descripcion`, `coor`) VALUES
(2, 'Marvin', '11', '31/11/2017', '13:00', 'Vengan con agua y balon xd', '19.591548, -99.008011'),
(4, 'Roberto', '11', '03/12/2017', '13:00', 'Vengan a la reta prros :v en la FES.', '19.477119, -99.044510');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `retas`
--
ALTER TABLE `retas`
  ADD PRIMARY KEY (`id_ret`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `retas`
--
ALTER TABLE `retas`
  MODIFY `id_ret` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
