-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-08-2024 a las 22:39:53
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `peliculas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actores`
--

CREATE TABLE `actores` (
  `actor_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `nacionalidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `actores`
--

INSERT INTO `actores` (`actor_id`, `nombre`, `apellido`, `fecha_nacimiento`, `nacionalidad`) VALUES
(343, 'nando', 'pozo', '2024-08-20', 'ecuatoriano'),
(345, 'abdul', 'rahman', '2002-12-07', 'argentino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `director` varchar(255) DEFAULT NULL,
  `año` int(11) DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `sinopsis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `titulo`, `director`, `año`, `genero`, `sinopsis`) VALUES
(1, 'Titanic', 'James Cameron', 1997, 'Romance/Drama', 'Una joven pareja se enamora en el transatlántico más grande del mundo, pero su amor se ve amenazado por un trágico desastre.'),
(2, 'El Padrino', 'Francis Ford Coppola', 1972, 'Crimen/Drama', 'La historia de la familia Corleone, liderada por Don Vito Corleone, y su ascenso al poder en el mundo del crimen organizado.'),
(3, 'La La Land', 'Damien Chazelle', 2016, 'Musical/Romance', 'Un pianista y una actriz se enamoran en Los Ángeles mientras persiguen sus sueños, pero su relación se ve desafiada por la realidad de la industria del entretenimiento.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas_actores`
--

CREATE TABLE `peliculas_actores` (
  `pelicula_id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actores`
--
ALTER TABLE `actores`
  ADD PRIMARY KEY (`actor_id`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `peliculas_actores`
--
ALTER TABLE `peliculas_actores`
  ADD PRIMARY KEY (`pelicula_id`,`actor_id`),
  ADD KEY `actor_id` (`actor_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actores`
--
ALTER TABLE `actores`
  MODIFY `actor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `peliculas_actores`
--
ALTER TABLE `peliculas_actores`
  ADD CONSTRAINT `peliculas_actores_ibfk_1` FOREIGN KEY (`pelicula_id`) REFERENCES `peliculas` (`id`),
  ADD CONSTRAINT `peliculas_actores_ibfk_2` FOREIGN KEY (`actor_id`) REFERENCES `actores` (`actor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
