-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-02-2022 a las 14:06:29
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sorteo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenarboleto`
--

CREATE TABLE `almacenarboleto` (
  `boleto` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `almacenarboleto`
--

INSERT INTO `almacenarboleto` (`boleto`, `fecha`) VALUES
(2134, '2002-12-12'),
(6556, '6545-04-05'),
(657895, '1212-12-12'),
(6578934, '1212-12-12'),
(657893434, '1212-12-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletoganador`
--

CREATE TABLE `boletoganador` (
  `boleto` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `boletoganador`
--

INSERT INTO `boletoganador` (`boleto`, `fecha`) VALUES
(6556, '0000-00-00'),
(65562, '1111-12-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premios`
--

CREATE TABLE `premios` (
  `fecha` date NOT NULL,
  `boletopremio` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacenarboleto`
--
ALTER TABLE `almacenarboleto`
  ADD PRIMARY KEY (`boleto`);

--
-- Indices de la tabla `boletoganador`
--
ALTER TABLE `boletoganador`
  ADD PRIMARY KEY (`boleto`);

--
-- Indices de la tabla `premios`
--
ALTER TABLE `premios`
  ADD PRIMARY KEY (`boletopremio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacenarboleto`
--
ALTER TABLE `almacenarboleto`
  MODIFY `boleto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=657893435;

--
-- AUTO_INCREMENT de la tabla `boletoganador`
--
ALTER TABLE `boletoganador`
  MODIFY `boleto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65563;

--
-- AUTO_INCREMENT de la tabla `premios`
--
ALTER TABLE `premios`
  MODIFY `boletopremio` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
