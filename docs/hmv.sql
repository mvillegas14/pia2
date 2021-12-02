-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2021 a las 07:55:03
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hmv`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id_cargo` int(11) NOT NULL,
  `nombre_cargo` varchar(50) NOT NULL,
  `activo` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id_cargo`, `nombre_cargo`, `activo`) VALUES
(1, 'INGENIERO DE PROYECTOS', ''),
(2, 'ANALISTA DE NOMINA I', NULL),
(3, 'PROFESIONAL 4', NULL),
(4, 'TÉCNICO 3', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coevaluacion`
--

CREATE TABLE `coevaluacion` (
  `id` int(25) NOT NULL,
  `id_evaluado` int(25) NOT NULL,
  `id_evaluador` int(25) NOT NULL,
  `resultado_co` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `coevaluacion`
--

INSERT INTO `coevaluacion` (`id`, `id_evaluado`, `id_evaluador`, `resultado_co`) VALUES
(3, 2, 5, 7),
(4, 2, 3, 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `id_cargo` int(100) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `apellido`, `password`, `usuario`, `id_cargo`, `admin`) VALUES
(1, 'Das', 'art', '123', 'Das1', 1, 1),
(2, 'Wendy', 'Benitez', '1234', 'Wendy2', 1, 0),
(3, 'Miguel', 'Villegas', '123', 'Miguel3', 1, 0),
(5, 'rat', 'das', '123', 'rat5', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_encuestas`
--

CREATE TABLE `estado_encuestas` (
  `avanzando` tinyint(1) NOT NULL DEFAULT 1,
  `estamos` tinyint(1) NOT NULL DEFAULT 1,
  `coevaluacion` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_encuestas`
--

INSERT INTO `estado_encuestas` (`avanzando`, `estamos`, `coevaluacion`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

CREATE TABLE `resultados` (
  `id_respuestas` int(11) NOT NULL,
  `id_trabajador` int(11) DEFAULT NULL,
  `resultado` varchar(25) DEFAULT '...',
  `solved` tinyint(1) NOT NULL DEFAULT 0,
  `solved_enfocados` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `resultados`
--

INSERT INTO `resultados` (`id_respuestas`, `id_trabajador`, `resultado`, `solved`, `solved_enfocados`) VALUES
(1, 2, '27.671875', 0, 0),
(4, 3, '20', 0, 0),
(5, 4, '28', 0, 0),
(6, 5, '...', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos_empleados`
--

CREATE TABLE `trabajos_empleados` (
  `id` int(25) NOT NULL,
  `id_trabajo` int(25) NOT NULL,
  `id_empleado` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trabajos_empleados`
--

INSERT INTO `trabajos_empleados` (`id`, `id_trabajo`, `id_empleado`) VALUES
(1, 1, 2),
(3, 7, 2),
(4, 7, 5),
(5, 7, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos_equipo`
--

CREATE TABLE `trabajos_equipo` (
  `id` int(25) NOT NULL,
  `trabajo` varchar(50) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `id_cargo_necesario` int(25) NOT NULL,
  `casco_minimo` int(25) DEFAULT 7,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trabajos_equipo`
--

INSERT INTO `trabajos_equipo` (`id`, `trabajo`, `descripcion`, `id_cargo_necesario`, `casco_minimo`, `estado`, `fecha`) VALUES
(1, 'Busqueda', 'Deda', 1, 13, 0, '2021-10-02'),
(2, 'Minar', 'si', 3, 13, 1, '2021-10-26'),
(3, 'Seguimiento de cuenta', 'Pelar zapatos', 2, 8, 1, '2021-11-07'),
(4, 'sdadas', 'adsasdasdsa', 1, 13, 1, '2021-11-08'),
(5, 'dasdas', 'dasdasda', 1, 13, 0, '0000-00-00'),
(7, 'si', 'si', 1, 8, 0, '2021-12-01'),
(9, '', '', 1, NULL, 1, '0000-00-00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargo`);

--
-- Indices de la tabla `coevaluacion`
--
ALTER TABLE `coevaluacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD PRIMARY KEY (`id_respuestas`);

--
-- Indices de la tabla `trabajos_empleados`
--
ALTER TABLE `trabajos_empleados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trabajos_equipo`
--
ALTER TABLE `trabajos_equipo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `coevaluacion`
--
ALTER TABLE `coevaluacion`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `resultados`
--
ALTER TABLE `resultados`
  MODIFY `id_respuestas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `trabajos_empleados`
--
ALTER TABLE `trabajos_empleados`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `trabajos_equipo`
--
ALTER TABLE `trabajos_equipo`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
