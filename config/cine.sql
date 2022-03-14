-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-03-2022 a las 03:14:59
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cine`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `id` int(11) NOT NULL,
  `sesion` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `pedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(32) NOT NULL,
  `sinopsis` varchar(2048) NOT NULL,
  `imagen` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`id`, `titulo`, `sinopsis`, `imagen`) VALUES
(1, 'The Batman', 'Cuando un asesino se dirige a la élite de Gotham con una serie de maquinaciones sádicas, un rastro de pistas crípticas envía Batman a una investigación en los bajos fondos. A medida que las pruebas comienzan a acercarse a su casa y se hace evidente la magnitud de los planes del autor, Batman debe forjar nuevas relaciones, desenmascarar al culpable y hacer justicia al abuso de poder y la corrupción que durante mucho tiempo han asolado Gotham City.\r\n\r\n', 'batman.jpg'),
(2, 'Luz negra', 'Travis Block, un agente del gobierno en la sombra que se especializa en eliminar operativos cuyas coberturas han sido expuestas, descubre una conspiración mortal dentro de sus propias filas que alcanza los niveles más altos del poder.', 'luz_negra.jpg'),
(3, 'Uncharted', 'Un descendiente del explorador Sir Francis Drake descubre la ubicación de la legendaria ciudad de El Dorado. Con la ayuda de su mentor Victor Sullivan y la ambiciosa periodista Elena Fischer, Nathan Drake trabajará para descubrir sus secretos, mientras sobreviven en una isla llena de piratas, mercenarios, y un misterioso enemigo, se embarcarán en una búsqueda sin precedentes por alcanzar el tesoro antes que sus perseguidores. Adaptación del aclamado videojuego homónimo.', 'uncharted.jpg'),
(4, 'Muerte en el Nilo', 'Vuelven las pesquisas del célebre detective Hércules Poirot. Esta vez, durante un viaje en crucero por el Nilo, Poirot deberá investigar el misterioso asesinato de una joven heredera sin explicación aparente. Esta secuela de Asesinato en el Orient Express (2017) es la adaptación de la novela Muerte en el Nilo (1937) de Agatha Christie.', 'muerte_nilo.jpg'),
(5, 'Cásate conmigo', 'Una estrella del pop es abandonada por su prometido, una estrella del rock, momentos antes de su boda en el Madison Square Garden, por lo que decide casarse con un hombre que selecciona aleatoriamente entre el público.', 'casate_conmigo.jpg'),
(6, 'Moonfall', 'Una fuerza misteriosa golpea a la Luna fuera de su órbita y la envía en choque directo contra la Tierra a toda velocidad. Unas semanas antes del impacto con el mundo al borde de la aniquilación, la ejecutiva de la NASA y ex astronauta Jo Fowler está convencida de tener la clave para salvar nuestro planeta. Pero solo el astronauta Brian Harper y el teórico conspiranoico KC Houseman la creen. Estos héroes inverosímiles montarán una misión imposible al espacio, dejando atrás a todos sus seres queridos, para aterrizar en la superficie lunar e intentar salvar a la humanidad, enfrentándose a un misterio de proporciones cósmicas.', 'moonfall.jpg'),
(7, 'Dog. Un viaje salvaje', 'Un guardabosques del ejército y su perro se embarcan en un viaje por carretera a lo largo de la Pacific Coast Highway para asistir al funeral de un amigo.', 'dog_viaje_salvaje.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE `salas` (
  `id` int(11) NOT NULL,
  `asientos` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `id` int(11) NOT NULL,
  `sala` int(11) NOT NULL,
  `pelicula` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(16) NOT NULL,
  `usuario` varchar(16) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `apellidos` varchar(32) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(32) NOT NULL,
  `contrasena` varchar(256) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `apellidos`, `telefono`, `correo`, `contrasena`, `admin`) VALUES
(1, 'admin', 'Manuel', 'Acuña Blanco', '123456789', 'manuelacbl@gmail.com', '$2y$10$gG1lIlWvMovjqhXhHlMN7OkB4PtxydG2K.gXZJ6pSNr7ms5bNp27C', 1),
(2, 'usuario1', 'Manue', 'Acuña Blanco', '123456789', 'manuelacbl@gmail.com', '$2y$10$gG1lIlWvMovjqhXhHlMN7OkB4PtxydG2K.gXZJ6pSNr7ms5bNp27C', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido` (`pedido`),
  ADD KEY `sesion` (`sesion`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`);

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelicula` (`pelicula`),
  ADD KEY `sala` (`sala`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `salas`
--
ALTER TABLE `salas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `entradas_ibfk_1` FOREIGN KEY (`pedido`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `entradas_ibfk_2` FOREIGN KEY (`sesion`) REFERENCES `sesiones` (`id`),
  ADD CONSTRAINT `entradas_ibfk_3` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesiones_ibfk_1` FOREIGN KEY (`pelicula`) REFERENCES `peliculas` (`id`),
  ADD CONSTRAINT `sesiones_ibfk_2` FOREIGN KEY (`sala`) REFERENCES `salas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
