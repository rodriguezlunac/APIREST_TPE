-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2023 a las 01:46:52
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
-- Base de datos: `db_trenes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `locomotora`
--

CREATE TABLE `locomotora` (
  `id_locomotora` int(11) NOT NULL,
  `modelo` varchar(200) NOT NULL,
  `anio_fabricacion` int(4) NOT NULL,
  `lugar_fabricacion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `locomotora`
--

INSERT INTO `locomotora` (`id_locomotora`, `modelo`, `anio_fabricacion`, `lugar_fabricacion`) VALUES
(48, '20-ton Boxcab', 1938, 'Estados Unidos'),
(49, '23-ton Boxcab', 1939, 'Argentina'),
(50, '23-ton', 1941, 'Alemania'),
(51, '25-ton', 1974, 'Rusia'),
(52, '44-ton', 1940, 'Estados Unidos'),
(53, 'GE 45-Ton switcher ', 1944, 'España'),
(54, 'GE 46-Ton switcher ', 1955, 'Canada'),
(55, '47-ton ', 1953, 'Francia'),
(56, 'GE 55-Ton switcher ', 1931, 'Italia'),
(57, 'GE 57-Ton switcher ', 1935, 'China'),
(58, '60-ton ', 1935, 'Japón');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `clave` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `clave`) VALUES
(1, 'Admin', '$2y$10$uo2zJEcpilfHUBGIiyZ8FewUH9cMtwUdG6jP819dTeoxjWvicL7By');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vagon`
--

CREATE TABLE `vagon` (
  `id_vagon` int(11) NOT NULL,
  `nro_vagon` int(11) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `capacidad_max` int(11) NOT NULL,
  `modelo` varchar(200) NOT NULL,
  `descripcion` varchar(3000) NOT NULL,
  `locomotora_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vagon`
--

INSERT INTO `vagon` (`id_vagon`, `nro_vagon`, `tipo`, `capacidad_max`, `modelo`, `descripcion`, `locomotora_id`) VALUES
(24, 123, 'Góndola', 5000, 'AL-458', 'Las góndolas son carros descubiertos que transportan todo tipo de material que no necesita protección contra el medio ambiente. Estos carros están diseñados para facilitar la carga y descarga por medio de grúas de volteo de carros o magneto.', 48),
(45, 12, 'Caja Tráiler', 2500, 'FD-789', 'Las cajas de tráiler pueden ser movidas por ferrocarril en carros plataforma, reduciendo el costo detransporte en distancias largas. También existen variaciones para control de temperatura ambiente en las mercacías que así lo requieran.', 48),
(46, 16, 'Tolva granelera (mineral)', 9650, 'PD-124', 'Las tolvas graneleras se utilizan para el transporte de productos industriales que no requieren protección contra el medio ambiente, como el carbón. Posee compuertas en la parte inferior que facilita la descarga de productos a granel. ', 54),
(47, 984, 'Tolva granelera (agrícola)', 10000, 'RT-789', 'Las tolvas graneleras se utilizan para el transporte de productos agroindustriales que requieren protección contra el medio ambiente, como café, o maíz o trigo. Poseen compuertas en la parte superior e inferior que facilitan la carga y descarga de productos a granel.', 55),
(48, 104, 'Carro Tanque', 9800, 'LM-148', 'Los carros tanque poseen cierre hermético para evitar fugas o posibles contaminaciones, y se utilizan para el transporte de productos líquidos o gaseosos como puede ser vino, jugos, hidrógeno u oxígeno líquido.', 53),
(49, 784, 'Pallet dos niveles para autos. Plataforma intermodal', 8000, 'KJ-748', 'Las plataformas se utilizan para el transporte de carga en general o carga pesada que no requiere protección contra el medio ambiente.\r\nPoseen aditamentos que permiten asegurar la carga durante su transporte.', 55),
(50, 74, 'Trinivel automotriz (Autorack)', 12500, 'PD-789', 'Estos carros son utilizados para el transporte de automóviles nuevos, Existen variación de abiertos y cerrados, para garantizar la integridad del producto.\r\n\r\nEn Uni-Trade ofrecemos servicios de transporte en doble estiba, furgón, tolva o cualquier otro tipo especializado a través de las redes de ferrocarril establecidas. Nuestros más de 30 años de experiencia en logística y transporte de mercancía nos permiten ofrecerle la mejor relación costo-beneficio para las necesidades de transporte que su negocio requiere. Le invitamos a contactar a nuestros especialistas para que hoy le asesoren y le brinden una solución a medida.', 48),
(51, 789, 'Furgones', 4500, 'FL-789', 'Los furgones se emplean para transportar productos que requieren protección contra la intemperie. Algunas variaciones incluyen amortiguadores para transportar carga frágil como pueden ser obras de arte, componentes electrónicos, o mercancías sensibles a la vibración y movimientos bruscos. Sin control de temperatura.', 55),
(52, 986, 'Furgones', 7860, 'FP-4789', 'Los furgones se emplean para transportar productos que requieren protección contra la intemperie. Algunas variaciones incluyen amortiguadores para transportar carga frágil como pueden ser obras de arte, componentes electrónicos, o mercancías sensibles a la vibración y movimientos bruscos. Sin control de temperatura.', 52),
(53, 789, 'Caja Tráiler', 5620, 'KG-0789', 'Las cajas de tráiler pueden ser movidas por ferrocarril en carros plataforma, reduciendo el costo detransporte en distancias largas. También existen variaciones para control de temperatura ambiente en las mercacías que así lo requieran.', 50);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `locomotora`
--
ALTER TABLE `locomotora`
  ADD PRIMARY KEY (`id_locomotora`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `vagon`
--
ALTER TABLE `vagon`
  ADD PRIMARY KEY (`id_vagon`),
  ADD KEY `vagon_ibfk_1` (`locomotora_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `locomotora`
--
ALTER TABLE `locomotora`
  MODIFY `id_locomotora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vagon`
--
ALTER TABLE `vagon`
  MODIFY `id_vagon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vagon`
--
ALTER TABLE `vagon`
  ADD CONSTRAINT `vagon_ibfk_1` FOREIGN KEY (`locomotora_id`) REFERENCES `locomotora` (`id_locomotora`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
