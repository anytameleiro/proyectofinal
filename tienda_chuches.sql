-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2017 a las 12:24:58
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_chuches`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(10) NOT NULL,
  `nombre_cat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_cat`) VALUES
(1, 'Gomitas'),
(2, 'Caramelos'),
(3, 'Nubes'),
(4, 'Pica picas'),
(5, 'Regaliz'),
(6, 'Chicles'),
(7, 'Gelatinas'),
(8, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chuches`
--

CREATE TABLE `chuches` (
  `id_chuche` int(10) NOT NULL,
  `id_categoria` int(10) NOT NULL,
  `nombre_chu` varchar(50) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `img_chu` varchar(150) DEFAULT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `chuches`
--

INSERT INTO `chuches` (`id_chuche`, `id_categoria`, `nombre_chu`, `descripcion`, `img_chu`, `precio`) VALUES
(1, 1, 'BOLSITAS FINI FUN ', 'SURTIDO 360 GRS 18 BOLSITAS APROX\r\n', '../../imgchu/bolsitafini.jpg', 2.72),
(3, 1, 'OSITOS DE ORO HARIBO', '1 BOLSITA 100 GR\r\n\r\nCÃ³digo de barras  8426617002510\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  0.10 Kg.\r\n\r\nDisponibilidad: En stock', '../../imgchu/ositos-d-oro-haribo.jpg', 0.68),
(4, 1, 'Delfines', 'Si eres goloso da rienda suelta a tu antojo, si eres creativo, te lo ponemos fÃ¡cil para realizar tus creaciones.\r\n\r\nEndÃºlzate, decora tus eventos, realiza tu mesa dulce y elabora los diseÃ±os mÃ¡s dulces con las mejores chuches y chocolates seleccionadas especialmente para ti, y recÃ­belas cuando desees con la mayor frescura,!como nunca las has probado!\r\n\r\nPuedes comprarlas de 100 en 100 gramos (15 unidades aprox.), o en packs de 250 unidades  (1.750 kg aproximadamente).', '../../imgchu/delfin.jpg', 1.2),
(5, 1, 'Golosinas SandÃ­as', 'Golosinas rellenas SandÃ­as brillo Fini 65 unidades\r\nFabricante:  Fini', '../../imgchu/golosinas-.jpg', 5.25),
(6, 1, 'Bolsita Fini Corazones ', 'Bolsita Fini 100gr Corazones Surtido Brillo 12 unidades.\r\nFabricante:  Fini.', '../../imgchu/bolsita-.jpg', 7.26),
(7, 2, 'Caramelos Respiral Eucaliptus', 'Caramelos Respiral Eucaliptus Mentol 1 kg.\r\nFabricante:  Respiral', '../../imgchu/caramelos-respiral-eucaliptus-mentol-1-kg.jpg', 6.2),
(8, 3, 'MASMELO CONEJOS Y PATOS', 'BOLSA 160 NUBES CONEJOS Y PATOS\r\n\r\nCÃ³digo de barras  8411500111950\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  0.87 Kg.', '../../imgchu/masmelo-conejos-y-patos.jpg', 5.13),
(9, 3, 'NUBES CUBIERTAS CHOCO', 'TARRO 31 NUBES APROX. CUBIERTAS CHOCO\r\nCÃ³digo de barras  5410358102250\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  0.40 Kg.\r\n\r\n', '../../imgchu/haribo-nubes-cubiertas-choco-soft-kiss.jpg', 3.44),
(10, 4, 'COOL COLA LATA', 'LATA 50 LATITAS DEXTROSA COLA\r\n\r\nCÃ³digo de barras  8437011321572\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  0.50 Kg.', '../../imgchu/cool-cola-lata.jpg', 8.6),
(11, 4, 'VARITAS MAGICAS', 'LATA CON 150 PAJITAS PICA\r\n\r\nCÃ³digo de barras  8437001486731\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  1.70 Kg.', '../../imgchu/varitas-magicas-lata.jpg', 12.3),
(12, 4, 'CANDY TOILET', 'ESTUCHE 24 BAÃ‘OS CHUCHE\r\n\r\nCÃ³digo de barras  8436031762235\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  0.19 Kg.', '../../imgchu/candy-toilet.jpg', 10),
(13, 6, 'FIVE BOX SANDIA ', 'ESTUCHE 6 TARROS DE 30 CHICLES\r\n\r\nCÃ³digo de barras  4009900512343\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  0.62 Kg.', '../../imgchu/five-box-sandia-grageas.jpg', 15.6),
(14, 6, 'CHICLE PELOTAS BALONCESTO', 'ESTUCHE 200 CHICLES RELLENOS LIQUIDO\r\n\r\nCÃ³digo de barras  8410525180958\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  1.25 Kg.', '../../imgchu/chicle-pelotas-baloncesto.jpg', 7.55),
(15, 5, 'RELLENADO DON FRESON', 'TARRO 30 REGALIZ EXTRA GRANDE\r\n\r\nCÃ³digo de barras  8435063807136\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  1.50 Kg.', '../../imgchu/rellenado-don-freson.jpg', 6),
(16, 5, 'REGALIZ GATOS XXL', 'ESTUCHE 40 UNIDADES\r\n\r\nCÃ³digo de barras  8425723002223\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  0.80 Kg.', '../../imgchu/regaliz-gatos-xxl-40-uds.jpg', 7),
(17, 7, 'GELATINA FRESA ', 'TARRO 48 TARRINAS +CUCHARAS\r\n\r\nCÃ³digo de barras  8436007908124\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  2.66 Kg.', '../../imgchu/gelatina-fresa-tarrinas-zamba.jpg', 8.99),
(18, 8, 'CHOCOLATE LINDOR', '24 STICK CHOCOLATE 38 GR LINDOR LECHE\r\nCÃ³digo artÃ­culo  CCH00278\r\nCÃ³digo de barras  04000539363108\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  0.91 Kg.\r\n\r\n', '../../imgchu/chocolate-en-stick-lindor-leche-stick.jpg', 16.9),
(19, 8, 'PRINGLES SABOR JAMON', 'BOTE 165 GRAMOS\r\n\r\nCÃ³digo de barras  5053990106776\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  0.17 Kg.', '../../imgchu/pringles-jamon-165-grs.jpg', 15.2),
(20, 8, 'LACASITOS MINI AZUL BOTES', '8 BOTES MINILACASITOS 129 GRS\r\n\r\nCÃ³digo de barras  18410740907580\r\n\r\nIVA  10%\r\n\r\nPeso logÃ­stico:  1.03 Kg.', '../../imgchu/lacasitos-mini-azul-botes.jpg', 12.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `nombre` varchar(25) NOT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `apodo` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `contrasenia` varchar(64) NOT NULL,
  `telefono` int(9) DEFAULT NULL,
  `tema` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`nombre`, `apellidos`, `direccion`, `apodo`, `email`, `contrasenia`, `telefono`, `tema`) VALUES
('admin', '', 'c/ madrid, Madrid, EspaÃ±a', 'admin', 'tiendachuches@info.com', '81dc9bdb52d04dc20036dbd8313ed055', 666655423, 0),
('Carmen', '', 'calle san mario,Madrid', 'Carmen', 'carmen4516@corre.edu', '81dc9bdb52d04dc20036dbd8313ed055', 123444444, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contiene`
--

CREATE TABLE `contiene` (
  `id_pedido` int(50) NOT NULL,
  `id_chuche` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contiene`
--

INSERT INTO `contiene` (`id_pedido`, `id_chuche`, `cantidad`) VALUES
(1, 9, 10),
(2, 9, 1),
(3, 14, 3),
(4, 11, 1),
(5, 8, 2),
(6, 9, 3),
(7, 17, 2),
(8, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(50) NOT NULL,
  `apodo` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `precio_total` decimal(10,2) NOT NULL,
  `pago` varchar(20) DEFAULT NULL,
  `mes` varchar(20) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `apodo`, `fecha`, `precio_total`, `pago`, `mes`, `year`) VALUES
(1, 'Carmen', '2017-03-21', '34.40', 'Pagado', '', 0),
(2, 'Carmen', '2017-04-19', '3.44', 'Pagado', '', 0),
(3, 'Carmen', '2017-05-23', '22.65', NULL, '05', 0),
(4, 'Carmen', '2017-05-29', '12.30', 'Pagado', '05', 2017),
(5, 'Carmen', '2017-05-29', '10.26', 'Pagado', '05', 2017),
(6, 'Carmen', '2017-05-29', '10.32', NULL, '05', 2017),
(7, 'Carmen', '2017-05-29', '17.98', NULL, '05', 2017),
(8, 'Carmen', '2017-05-29', '5.44', NULL, '05', 2017);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `chuches`
--
ALTER TABLE `chuches`
  ADD PRIMARY KEY (`id_chuche`,`id_categoria`),
  ADD KEY `id_chuche` (`id_chuche`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`apodo`);

--
-- Indices de la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD PRIMARY KEY (`id_pedido`,`id_chuche`),
  ADD KEY `id_pedido` (`id_pedido`),
  ADD KEY `id_chuche` (`id_chuche`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`,`apodo`),
  ADD KEY `dni` (`apodo`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chuches`
--
ALTER TABLE `chuches`
  MODIFY `id_chuche` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chuches`
--
ALTER TABLE `chuches`
  ADD CONSTRAINT `chuches_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `contiene`
--
ALTER TABLE `contiene`
  ADD CONSTRAINT `contiene_ibfk_4` FOREIGN KEY (`id_chuche`) REFERENCES `chuches` (`id_chuche`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contiene_ibfk_5` FOREIGN KEY (`id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`apodo`) REFERENCES `cliente` (`apodo`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
