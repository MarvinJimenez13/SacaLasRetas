-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2017 a las 07:06:37
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
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_use` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(100) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fecha_reg` datetime NOT NULL,
  `rango` int(11) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `edad` varchar(100) NOT NULL,
  `tipfut` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_use`, `nombre`, `usuario`, `contrasena`, `avatar`, `email`, `fecha_reg`, `rango`, `descripcion`, `edad`, `tipfut`) VALUES
(17, 'Marvin Roberto Jimenez Gamboa', 'admin', '1234', 'avatars/17.jpg', 'marvinjiga@hotmail.com', '2017-11-27 00:13:48', 1, 'Soy admin prro', '18', 'Soccer'),
(23, 'Reportero Uno', 'reporterouno', '1234', 'avatars/23.jpg', 'reportero@reportero.com', '2017-11-30 19:08:44', 0, 'Añadir', 'Añadir', 'Añadir'),
(24, 'Reportero Dos', 'reporterodos', '1234', 'avatars/24.jpg', 'reportero2@reportero.com', '2017-11-30 19:11:16', 0, 'Añadir', 'Añadir', 'Añadir'),
(25, 'Usuario Uno', 'usuario', '1234', 'avatars/25.jpg', 'usuario@usuario.com', '2017-11-30 19:11:41', 2, 'Añadir', 'Añadir', 'Añadir');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_use`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_use` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
