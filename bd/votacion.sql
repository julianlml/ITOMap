-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2020 a las 22:49:31
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `votacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumnos` int(11) NOT NULL,
  `cedula_alumno` int(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `carrera` varchar(50) NOT NULL,
  `cod_candidato` int(50) NOT NULL,
  `voto` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumnos`, `cedula_alumno`, `nombre`, `carrera`, `cod_candidato`, `voto`) VALUES
(92, 7, 'panchito', 'Preescolar', 3, 1),
(93, 16011045, 'julian', 'Informatica', 1, 1),
(94, 16011137, 'monica', 'Informatica', 0, 1),
(95, 16011137, 'monica', 'Administracion', 0, 1),
(96, 2, 'sds', 'Informatica', 1, 1),
(97, 15011111, 'pioquinto', 'Informatica', 0, 1),
(98, 15011111, 'pioquinto', 'Informatica', 0, 1),
(99, 15011111, 'pioquinto', 'Informatica', 0, 1),
(100, 16011137, 'monica', 'Informatica', 0, 1),
(101, 15011218, 'pintor', 'Informatica', 3, 1),
(102, 15011218, 'pintor', 'Informatica', 3, 1),
(103, 15011226, 'tavo', 'Preescolar', 3, 1),
(104, 16011045, 'jose', 'Produccion Industrial', 1, 1),
(105, 16011074, 'lorena', 'Contaduria', 1, 1),
(106, 77, 'vvv', 'Informatica', 1, 1),
(107, 1, 'prueba1', 'Informatica', 0, 1),
(108, 2, 'prueba2', 'Contaduria', 1, 1),
(109, 3, 'PRUEBA3', 'Informatica', 1, 1),
(110, 4, 'prueba4', 'Informatica', 1, 1),
(111, 5, 'prueba5', 'Informatica', 1, 1),
(112, 6, 'prueba6', 'Contaduria', 1, 1),
(113, 7, 'prueba7', 'Informatica', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidatos`
--

CREATE TABLE `candidatos` (
  `id_candidato` int(11) NOT NULL,
  `cedula_candidato` int(50) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `cod_candidato` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `candidatos`
--

INSERT INTO `candidatos` (`id_candidato`, `cedula_candidato`, `nombre`, `cod_candidato`) VALUES
(7, 1, '2', 1),
(8, 3, '3', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id_carreras` int(50) NOT NULL,
  `carreras` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id_carreras`, `carreras`) VALUES
(1, 'Informatica'),
(2, 'Contaduria'),
(3, 'Administracion'),
(4, 'Preescolar'),
(5, 'Seguridad Industrial'),
(6, 'Produccion Industrial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `comentario` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`comentario`) VALUES
(''),
('buena pagina'),
('jhkjhkj'),
(''),
('');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `id_profesores` int(11) NOT NULL,
  `cedula_profesor` int(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `carrera` varchar(50) NOT NULL,
  `cod_candidato` int(50) NOT NULL,
  `voto` int(50) NOT NULL,
  `comentario` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id_profesores`, `cedula_profesor`, `nombre`, `carrera`, `cod_candidato`, `voto`, `comentario`) VALUES
(1, 15011111, 'pioquinto', 'Informatica', 0, 0, ''),
(2, 15011111, 'pio', 'Informatica', 0, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `usuario`, `clave`) VALUES
(1, 'administrador', 'admin', 'iutar123');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `votos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `votos` (
`carrera` varchar(50)
,`cod_candidato` int(50)
,`nombre` varchar(250)
,`votos` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `votos`
--
DROP TABLE IF EXISTS `votos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `votos`  AS  select `alumnos`.`carrera` AS `carrera`,`alumnos`.`cod_candidato` AS `cod_candidato`,`candidatos`.`nombre` AS `nombre`,count(`alumnos`.`carrera`) AS `votos` from (`alumnos` join `candidatos` on(`candidatos`.`cod_candidato` = `alumnos`.`cod_candidato`)) group by `alumnos`.`carrera`,`alumnos`.`cod_candidato`,`candidatos`.`nombre` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD UNIQUE KEY `id_alumnos` (`id_alumnos`);

--
-- Indices de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`id_candidato`),
  ADD UNIQUE KEY `cedula_candidato` (`cedula_candidato`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id_carreras`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id_profesores`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD UNIQUE KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumnos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `id_candidato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id_carreras` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id_profesores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
