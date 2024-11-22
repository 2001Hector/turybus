-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2024 a las 04:47:01
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autobus`
--

CREATE TABLE `autobus` (
  `id_matricula` varchar(15) NOT NULL,
  `modelo` varchar(30) NOT NULL,
  `fabricante` varchar(30) NOT NULL,
  `numero_plazas` int(50) NOT NULL,
  `caracteristicas` text NOT NULL,
  `km_autobus` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `autobus`
--

INSERT INTO `autobus` (`id_matricula`, `modelo`, `fabricante`, `numero_plazas`, `caracteristicas`, `km_autobus`) VALUES
('890-hjk', 'autobus 2pisos', 'toyota', 32, 'rojo', 21242),
('APC-673', 'Busstar DD S1', 'Busscar Colombia', 54, 'Doble piso, 6x6, azul', 0),
('CDS-627', 'Busstar 380', 'Busscar Colombia', 32, 'blanco, 6x6', 0),
('DOF-456', 'Asocrd 2', 'Toyota', 40, 'Dorado', 0),
('GHI-789', 'elegy 3', 'Toyota', 32, 'Negro', 0),
('GRT-719', 'Maxian 2015', 'Busscar Colombia', 32, 'Blanco y Rojo ', 0),
('HEF-439', 'homer', 'Busscar Colombia', 42, 'Negro', 0),
('LKH-405', 'xr 2022', 'Hhyundai', 36, 'Blanco y Amarrillo', 0),
('RLI-789', 'Sould 2015', 'Toyota ', 32, 'Rojo y Blanco ', 0),
('XYH-025', 'xr 2022', 'Hhyundai', 36, 'Blanco y Rojo', 0),
('ZXC-406', 'xr 2022', 'Hhyundai', 36, 'Blanco y Verde', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `billete`
--

CREATE TABLE `billete` (
  `id_billete` int(20) NOT NULL,
  `id_ruta` int(20) NOT NULL,
  `importe` varchar(20) NOT NULL,
  `hora_llegada` time NOT NULL,
  `dni_viajero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `billete`
--

INSERT INTO `billete` (`id_billete`, `id_ruta`, `importe`, `hora_llegada`, `dni_viajero`) VALUES
(7, 28, '50000', '15:29:00', 1010130961),
(8, 1, '10000', '12:38:00', 1083043328),
(9, 31, '10000', '12:41:00', 1083043328),
(10, 23, '20000', '23:42:00', 1083043328),
(11, 31, '10000', '12:45:00', 1083043328),
(12, 31, '10000', '12:52:00', 1083043328),
(13, 31, '20000', '12:54:00', 1083043328),
(14, 31, '50000', '12:01:00', 1083043328),
(15, 31, '10000', '13:02:00', 1083043328),
(16, 31, '50000', '12:04:00', 1083043328),
(17, 31, '20000', '23:11:00', 1083043328),
(18, 31, '10000', '12:14:00', 1083043328),
(19, 31, '50000', '23:21:00', 1083043328),
(20, 31, '10000', '23:31:00', 1083043328),
(21, 31, '10000', '14:40:00', 1083043328),
(22, 31, '316', '10:15:00', 1010130961),
(23, 31, '357797', '16:36:00', 1083043329),
(24, 31, '271961', '21:41:00', 1083043323),
(25, 31, '495785', '11:45:00', 1083043323),
(26, 31, '130215', '16:29:00', 1083043323),
(27, 31, '258356', '11:02:00', 1083043323),
(28, 31, '353521', '00:00:00', 1083043323),
(29, 31, '187694', '03:11:00', 1083043323),
(31, 31, '213809', '05:49:00', 1083043323),
(32, 31, '106948', '05:32:00', 1083043323),
(33, 31, '152634', '04:03:00', 1083043323),
(34, 31, '440717', '11:57:00', 1083043323),
(35, 31, '201404', '22:51:00', 1083043323),
(36, 31, '174773', '15:14:00', 1083043323),
(37, 31, '317213', '05:24:00', 1083043323),
(38, 31, '477555', '19:03:00', 1083043323),
(39, 31, ' VIP 500000', '08:29:00', 1083043323),
(40, 31, 'ESCUSIVO :250000', '21:25:00', 1083043323),
(41, 31, '50,000', '23:34:00', 1083043323),
(42, 31, '10,0000', '01:11:00', 1083043323),
(43, 31, '15,0000', '10:04:00', 1083043323),
(44, 31, '150,000', '12:41:00', 1083043323),
(45, 31, '111173', '22:59:00', 1083043323),
(46, 31, '261907', '22:08:00', 1083043323),
(47, 31, '447723', '06:05:00', 1083043323),
(48, 33, '200,000', '23:50:00', 1083043323),
(49, 33, '50,000', '11:34:00', 1083043323),
(50, 33, '350,000', '21:27:00', 1083043323),
(51, 33, '450,000', '23:41:00', 1083043323),
(52, 33, 'ESCUSIVO :250000', '17:13:00', 1083043323);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor`
--

CREATE TABLE `conductor` (
  `dni` varchar(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `dirreccion` varchar(100) NOT NULL,
  `km_conductor` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `conductor`
--

INSERT INTO `conductor` (`dni`, `nombre`, `apellido`, `telefono`, `dirreccion`, `km_conductor`) VALUES
('', 'ydydy', 'ydysy', 'syys', 'ysyyssyx', 7200),
('10005295', 'Santiago ', 'Perea Blanco', '3201536758', 'calle 3', 0),
('10007651', 'Duran ', 'Mendoza Urrego', '32029785757', 'cra 3', 0),
('10047651', 'Amaranto ', 'benavides Salazar', '3085263655', 'calle 9', 0),
('10056876', 'Isacc David', 'Quiroz ', '32065298202', 'cra 12', 0),
('1005756', 'Pedro Josue', 'Perez Gomez', '30052444025', 'calle 7', 0),
('10086533', 'Jose David', 'Diaz F', '3005890025', 'calle 11', 0),
('10805653', 'Juan Francisco', 'Isla', '3128998052', 'cra 22d', 10),
('10805783', 'Jose Smith', 'Herrera Perez', '3215891115', 'calle 18', 0),
('10832221', 'Josue Angel', 'Rodriguez Areola', '3006875725', 'calle 7', 0),
('10895357', 'Gabriel ', 'Uribe Mejia', '3103510425', 'cra 2c', 0),
('10907653', 'Camilo ', 'Mendez Padilla', '3103510425', 'cra 25c', 0),
('10935687', 'Jhon ', 'Alvarez ', '3005850025', 'calle 2', 0),
('10987651', 'Ismael ', 'Suarez benavides', '3228595752', 'calle 23', 0),
('183736727', 'Jose Miguel', 'Mendoza Gimenez', '300221785', 'cra 2b', 0),
('189082018', 'Juan David', 'Perez Gomez', '300526691', 'calle 12', 0),
('262662q', 'y', 'y', 'y', 'y', 120000),
('26489', 'rosa', 'camargo', '32178976', 'cr 3  8', 42),
('kevin', 'e', 'e', 'e', 'e', 0),
('w6w6w6', 'swysysy', '6s6s6s', '8181', 'dirreccion', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cronograma`
--

CREATE TABLE `cronograma` (
  `id_cronograma` int(20) NOT NULL,
  `id_ruta` int(20) NOT NULL,
  `lugar_relevante` varchar(250) NOT NULL,
  `actividad` varchar(250) NOT NULL,
  `tiempo_parada` time NOT NULL,
  `ruta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cronograma`
--

INSERT INTO `cronograma` (`id_cronograma`, `id_ruta`, `lugar_relevante`, `actividad`, `tiempo_parada`, `ruta`) VALUES
(9, 28, 'rioacha', 'playa', '15:29:00', ''),
(13, 28, '', '', '00:00:00', 'images/bg2.jpg'),
(14, 28, '', '', '00:00:00', 'images/bg3.jpg'),
(15, 1, 'rioacha', 'ver la ancha', '23:36:00', ''),
(16, 28, '', '', '00:00:00', 'images/bg1.jpg'),
(17, 1, 'bosconia', 'motel', '21:59:00', 'images/'),
(18, 31, 'momentos', 'ver la ancha', '14:12:00', ''),
(19, 28, 'rioacha', 's', '23:18:00', 'images/bg2.jpg'),
(20, 31, 'rioacha', 'motel', '13:32:00', 'images/bg5.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `folleto`
--

CREATE TABLE `folleto` (
  `id_folleto` int(20) NOT NULL,
  `id_ruta` int(11) NOT NULL,
  `dias_programados` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `folleto`
--

INSERT INTO `folleto` (`id_folleto`, `id_ruta`, `dias_programados`) VALUES
(5, 1, 'martes y jueves');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_reparacion`
--

CREATE TABLE `lista_reparacion` (
  `id_reparacion` varchar(15) NOT NULL,
  `id_revision` int(15) NOT NULL,
  `codigo_reparacion` varchar(15) NOT NULL,
  `tiempo_empleado` int(15) NOT NULL,
  `coment_reparacion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lista_reparacion`
--

INSERT INTO `lista_reparacion` (`id_reparacion`, `id_revision`, `codigo_reparacion`, `tiempo_empleado`, `coment_reparacion`) VALUES
('1', 2, '5644', 12, '3eeed');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revision_mecanica`
--

CREATE TABLE `revision_mecanica` (
  `id_revision` int(15) NOT NULL,
  `id_matricula` varchar(15) NOT NULL,
  `fecha_revision` date NOT NULL,
  `diagnostico` text NOT NULL,
  `procede_reparar` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `revision_mecanica`
--

INSERT INTO `revision_mecanica` (`id_revision`, `id_matricula`, `fecha_revision`, `diagnostico`, `procede_reparar`) VALUES
(1, 'CDS-627', '2024-05-16', 's', 1),
(2, 'XYH-025', '2024-05-26', 'fdfd', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_diarios`
--

CREATE TABLE `servicios_diarios` (
  `id_ruta` int(11) NOT NULL,
  `ruta` varchar(255) NOT NULL,
  `horario_salida` time NOT NULL,
  `demanda` varchar(100) NOT NULL,
  `nombre_conductor` varchar(100) NOT NULL,
  `id_matricula` varchar(100) NOT NULL,
  `kilometros_ruta` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicios_diarios`
--

INSERT INTO `servicios_diarios` (`id_ruta`, `ruta`, `horario_salida`, `demanda`, `nombre_conductor`, `id_matricula`, `kilometros_ruta`) VALUES
(1, 'maicao-riohacha', '08:03:00', '', '26489', '890-hjk', 0),
(23, 'maicao-santamarta', '05:43:00', 'si', '', '890-hjk', 600),
(28, 'maicao_palomino', '16:06:00', 'si', '26489', '890-hjk', 0),
(29, 'maicao-venezuela', '16:06:00', 'si', '262662q', '890-hjk', 10000),
(30, 'maicao-venezuela', '16:06:00', 'si', '262662q', '890-hjk', 0),
(31, 'maicao-espana', '18:37:00', 'si', '26489', '890-hjk', 21),
(32, 'maicao-espana', '18:37:00', 'si', '26489', '890-hjk', 0),
(33, 'maicao - cabo de la vela', '08:40:00', 'no', '10987651', 'DOF-456', 120),
(34, 'maicao - cartagena', '20:25:00', 'si', '10007651', '890-hjk', 700);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajero`
--

CREATE TABLE `viajero` (
  `dni_viajero` int(11) NOT NULL,
  `nombre_apellido` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `horas_viaje` time NOT NULL,
  `correo` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasena` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `viajero`
--

INSERT INTO `viajero` (`dni_viajero`, `nombre_apellido`, `telefono`, `horas_viaje`, `correo`, `usuario`, `contrasena`) VALUES
(1010130961, 'melany_iguaran', '3215116044', '17:18:00', '', '', ''),
(1083043323, 'Wence Nieves', '', '00:00:00', 'wrnieves@gmail.com', 'wrnieves', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),
(1083043324, 'Prince Samper', '3001234567', '00:00:00', 'princesa@gmail.com', 'princesa', 'a8cebf1698dc14282c507b1e1cfb7f2c9d5216aa7bd0854b50561e02c2b99d9a38945ec0f81e55f9699062b1eac6d0083411c839ba2b27c6a15b494463bc5c73'),
(1083043326, 'Administrador', '3123456789', '00:00:00', 'admin1@gmail.com', 'admin1', '5e7951aa8f403ff16d0cd453e7d86ee0c99ce5319e01836333b6ba398a20494d7f3e76397e3d99e8fc4702ba7cfd7600d453958c755000cc31ce0150ac819f9e'),
(1083043327, 'daiaiai', '30212322', '00:00:00', 'amin1@gmail.com', 'keboco12', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),
(1083043328, 'f', '348749302', '178:12:00', 'gjhlk@gmail.com', 'f', 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db'),
(1083043329, 'mary', '27394430', '04:02:00', 'mary@gmail.com', 'mary', 'd332a8e0ed9c2c7a25863f6f86a4daa19222e0a94ad958889e0a50ed97cf07102a390154adbbaea8419357002d9a307ba54d04341a95a7c5415c2692a6f42ce4'),
(1083043330, 'hector jose chamorr', '302400444', '00:00:00', 'hector@gmail.com', 'hector6', '33275a8aa48ea918bd53a9181aa975f15ab0d0645398f5918a006d08675c1cb27d5c645dbd084eee56e675e25ba4019f2ecea37ca9e2995b49fcb12c096a032e');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autobus`
--
ALTER TABLE `autobus`
  ADD PRIMARY KEY (`id_matricula`);

--
-- Indices de la tabla `billete`
--
ALTER TABLE `billete`
  ADD PRIMARY KEY (`id_billete`),
  ADD KEY `id_ruta` (`id_ruta`),
  ADD KEY `dni_viajero` (`dni_viajero`),
  ADD KEY `id_billete` (`id_billete`);

--
-- Indices de la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `cronograma`
--
ALTER TABLE `cronograma`
  ADD PRIMARY KEY (`id_cronograma`),
  ADD KEY `id_billete` (`id_ruta`);

--
-- Indices de la tabla `folleto`
--
ALTER TABLE `folleto`
  ADD PRIMARY KEY (`id_folleto`),
  ADD KEY `id_ruta` (`id_ruta`);

--
-- Indices de la tabla `lista_reparacion`
--
ALTER TABLE `lista_reparacion`
  ADD PRIMARY KEY (`id_reparacion`),
  ADD KEY `id_revision` (`id_revision`);

--
-- Indices de la tabla `revision_mecanica`
--
ALTER TABLE `revision_mecanica`
  ADD PRIMARY KEY (`id_revision`),
  ADD KEY `ID_MATRICULA` (`id_matricula`),
  ADD KEY `ID_MATRICULA_2` (`id_matricula`);

--
-- Indices de la tabla `servicios_diarios`
--
ALTER TABLE `servicios_diarios`
  ADD PRIMARY KEY (`id_ruta`),
  ADD KEY `nombre_conductor` (`nombre_conductor`),
  ADD KEY `id_matricula` (`id_matricula`),
  ADD KEY `ruta` (`ruta`),
  ADD KEY `id_ruta` (`id_ruta`);

--
-- Indices de la tabla `viajero`
--
ALTER TABLE `viajero`
  ADD PRIMARY KEY (`dni_viajero`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `billete`
--
ALTER TABLE `billete`
  MODIFY `id_billete` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `cronograma`
--
ALTER TABLE `cronograma`
  MODIFY `id_cronograma` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `folleto`
--
ALTER TABLE `folleto`
  MODIFY `id_folleto` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `revision_mecanica`
--
ALTER TABLE `revision_mecanica`
  MODIFY `id_revision` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `servicios_diarios`
--
ALTER TABLE `servicios_diarios`
  MODIFY `id_ruta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `viajero`
--
ALTER TABLE `viajero`
  MODIFY `dni_viajero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1083043331;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `billete`
--
ALTER TABLE `billete`
  ADD CONSTRAINT `billete_ibfk_1` FOREIGN KEY (`id_ruta`) REFERENCES `servicios_diarios` (`id_ruta`),
  ADD CONSTRAINT `billete_ibfk_2` FOREIGN KEY (`dni_viajero`) REFERENCES `viajero` (`dni_viajero`);

--
-- Filtros para la tabla `cronograma`
--
ALTER TABLE `cronograma`
  ADD CONSTRAINT `cronograma_ibfk_1` FOREIGN KEY (`id_ruta`) REFERENCES `servicios_diarios` (`id_ruta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `folleto`
--
ALTER TABLE `folleto`
  ADD CONSTRAINT `folleto_ibfk_1` FOREIGN KEY (`id_ruta`) REFERENCES `servicios_diarios` (`id_ruta`);

--
-- Filtros para la tabla `lista_reparacion`
--
ALTER TABLE `lista_reparacion`
  ADD CONSTRAINT `lista_reparacion_ibfk_1` FOREIGN KEY (`id_revision`) REFERENCES `revision_mecanica` (`id_revision`);

--
-- Filtros para la tabla `revision_mecanica`
--
ALTER TABLE `revision_mecanica`
  ADD CONSTRAINT `revision_mecanica_ibfk_1` FOREIGN KEY (`id_matricula`) REFERENCES `autobus` (`id_matricula`);

--
-- Filtros para la tabla `servicios_diarios`
--
ALTER TABLE `servicios_diarios`
  ADD CONSTRAINT `servicios_diarios_ibfk_1` FOREIGN KEY (`nombre_conductor`) REFERENCES `conductor` (`dni`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `servicios_diarios_ibfk_2` FOREIGN KEY (`id_matricula`) REFERENCES `autobus` (`id_matricula`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
