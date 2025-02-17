-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-02-2025 a las 22:28:43
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mi_proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `appmodulos`
--

CREATE TABLE `appmodulos` (
  `id_modulo_principal` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `icono` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `appmodulos`
--

INSERT INTO `appmodulos` (`id_modulo_principal`, `nombre`, `icono`) VALUES
(1, 'INFORMES', 'fas fa-tachometer-alt'),
(2, 'VENTAS', 'fas fa-shop'),
(3, 'BODEGA', 'fa-solid fa-box'),
(4, 'CONFIGURACION', 'fas fa-gears');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apppermisos`
--

CREATE TABLE `apppermisos` (
  `id` int(11) NOT NULL,
  `id_emp` int(11) DEFAULT NULL,
  `id_submodulo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `apppermisos`
--

INSERT INTO `apppermisos` (`id`, `id_emp`, `id_submodulo`) VALUES
(23, 1, 3),
(24, 1, 2),
(25, 1, 5),
(26, 1, 1),
(27, 1, 4),
(28, 2, 3),
(29, 2, 2),
(30, 2, 5),
(31, 2, 1),
(32, 2, 4),
(42, 3, 3),
(43, 3, 2),
(44, 3, 5),
(45, 3, 1),
(46, 3, 4),
(51, 4, 3),
(52, 4, 2),
(53, 4, 5),
(54, 4, 1),
(55, 4, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `appsubmodulos`
--

CREATE TABLE `appsubmodulos` (
  `id_submodulo` int(11) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `icono` varchar(50) DEFAULT NULL,
  `id_modulo_principal` int(11) DEFAULT NULL,
  `urls` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `appsubmodulos`
--

INSERT INTO `appsubmodulos` (`id_submodulo`, `nombres`, `icono`, `id_modulo_principal`, `urls`) VALUES
(1, 'Crear Usuarios', 'nav-icon fas fa-users', 4, '../usuarios/registroUsuario.php'),
(2, 'Invantario\r\n', 'fa-solid fa-boxes-stacked', 3, '../usuarios/inventario.php'),
(3, 'Catalogo\r\n', 'fa-solid fa-file-pdf', 2, '../usuarios/catalogo.php'),
(4, 'Crea Categoria', 'fa-solid fa-check', 4, '../usuarios/CrearCategorias.php'),
(5, 'Productos\r\n', 'fas fa-tag', 3, '../usuarios/products.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `id_Categoria` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `Empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `id_Categoria`, `nombre`, `Empresa`) VALUES
(1, '001', 'motos menores a 200 cc', 1),
(2, '002', 'motos de 200 cc a 400 cc', 1),
(3, '003', 'motos de 400 cc a 800 cc', 1),
(4, '004', 'motos de mas de 800 cc', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `Nombre_Empresa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `Nombre_Empresa`) VALUES
(1, 'Mi Proyecto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `referencia` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `valor` int(11) NOT NULL,
  `Valor2` int(11) NOT NULL,
  `Valor3` int(11) NOT NULL,
  `Categoria` varchar(255) NOT NULL,
  `Existencia` varchar(255) NOT NULL,
  `CantidadBulto` int(11) NOT NULL,
  `Empresa` int(11) NOT NULL,
  `Carac1` varchar(255) DEFAULT NULL,
  `Carac2` varchar(255) DEFAULT NULL,
  `Carac3` varchar(255) DEFAULT NULL,
  `Carac4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `referencia`, `nombre`, `valor`, `Valor2`, `Valor3`, `Categoria`, `Existencia`, `CantidadBulto`, `Empresa`, `Carac1`, `Carac2`, `Carac3`, `Carac4`) VALUES
(424, '1', 'Suzuki Gixxer 155', 9, 2, 2, '               001', '10', 5, 0, '120 km/h', '140 kg', 'Horquilla telescópica', 'Sistema de inyección'),
(425, '2', 'Suzuki Gixxer SF250', 18, 4, 4, '002', '8', 3, 0, '153 km/h', '167 kg', 'Suspensión invertida', 'Pantalla LCD'),
(426, '3', 'Suzuki V-Strom 650', 24, 5, 5, '003', '5', 4, 0, '160 km/h', '214 kg', 'Doble horquilla telescópica', 'ABS y control de tracción'),
(427, '4', 'Suzuki GSX-S750', 18, 4, 4, '003', '6', 3, 0, '215 km/h', '213 kg', 'Suspensión invertida', 'Tecnología Ride-by-Wire'),
(428, '5', 'Suzuki Inazuma 250', 13, 3, 3, '002', '15', 4, 0, '135 km/h', '177 kg', 'Horquilla telescópica', 'Encendido sin llave'),
(429, '6', 'Suzuki V-Strom 1000', 35, 8, 8, '004', '4', 2, 0, '200 km/h', '228 kg', 'Doble horquilla telescópica', 'Asistente de cambio'),
(430, '7', 'Suzuki Burgman 200', 15, 3, 4, '002', '10', 3, 0, '130 km/h', '170 kg', 'Suspensión telescópica', 'Arranque eléctrico'),
(431, '8', 'Suzuki Hayabusa 1300', 85, 18, 19, '004', '2', 1, 0, '299 km/h', '260 kg', 'Doble horquilla invertida', 'Control electrónico'),
(432, '9', 'Suzuki GSX-R1000', 48, 10, 11, '004', '7', 2, 0, '299 km/h', '202 kg', 'Suspensión de competición', 'Control de estabilidad'),
(433, '10', 'Suzuki SV650', 18, 4, 4, '003', '5', 3, 0, '190 km/h', '198 kg', 'Horquilla telescópica', 'Indicador de cambios'),
(434, '11', 'Suzuki Bandit 1200', 22, 5, 5, '004', '4', 2, 0, '225 km/h', '210 kg', 'Suspensión telescópica', 'Sistema de escape Akrapovic'),
(435, '12', 'Suzuki DR-Z400', 18, 4, 4, '002', '6', 3, 0, '140 km/h', '156 kg', 'Suspensión de largo recorrido', 'Neumáticos off-road'),
(436, '13', 'Suzuki GSX-R150', 8, 2, 2, '001', '10', 5, 0, '135 km/h', '141 kg', 'Horquilla telescópica', 'Sistema de inyección'),
(437, '14', 'Suzuki V-Strom 250', 15, 3, 4, '002', '8', 4, 0, '145 km/h', '180 kg', 'Suspensión invertida', 'Control de tracción'),
(438, '15', 'Suzuki Bandit 600', 16, 4, 4, '003', '6', 3, 0, '210 km/h', '208 kg', 'Doble horquilla telescópica', 'Suspensión ajustable'),
(439, '16', 'Suzuki GSX-R250', 9, 2, 2, '002', '12', 6, 0, '155 km/h', '165 kg', 'Suspensión invertida', 'Pantalla digital'),
(440, '17', 'Suzuki GSX-S1000', 30, 6, 7, '004', '5', 2, 0, '250 km/h', '211 kg', 'Suspensión de competición', 'Ride-by-wire'),
(441, '18', 'Suzuki V-Strom 1050', 35, 8, 8, '004', '3', 3, 0, '210 km/h', '232 kg', 'Doble horquilla telescópica', 'Asistente de cambio'),
(442, '19', 'Suzuki Intruder 150', 11, 2, 2, '001', '15', 4, 0, '115 km/h', '160 kg', 'Suspensión telescópica', 'Arranque eléctrico'),
(443, '20', 'Suzuki V-Strom 250X', 17, 4, 4, '002', '7', 4, 0, '140 km/h', '183 kg', 'Suspensión invertida', 'Pantalla TFT'),
(444, '21', 'Suzuki Hayabusa 1000', 80, 16, 18, '004', '4', 1, 0, '299 km/h', '250 kg', 'Doble horquilla invertida', 'Sistema de control de tracción'),
(445, '22', 'Suzuki GSR750', 20, 4, 5, '003', '8', 3, 0, '220 km/h', '190 kg', 'Suspensión invertida', 'Ride-by-wire'),
(446, '23', 'Suzuki GSX-R125', 7, 2, 2, '001', '10', 5, 0, '120 km/h', '136 kg', 'Horquilla telescópica', 'Inyección electrónica'),
(447, '24', 'Suzuki V-Strom 650XT', 27, 6, 6, '003', '6', 3, 0, '160 km/h', '210 kg', 'Suspensión invertida', 'Control de tracción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUser` int(11) NOT NULL,
  `User` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `NombreEstado` varchar(255) DEFAULT NULL,
  `NombreRol` varchar(255) DEFAULT NULL,
  `IdPersona` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUser`, `User`, `Password`, `NombreEstado`, `NombreRol`, `IdPersona`) VALUES
(1, 'ADMIN@GMAIL.COM', '$argon2i$v=19$m=65536,t=4,p=1$bEVwU3d0ZU9JeWtsWXZRZg$1P2QnRUMYYp87BwB7fYUM97JgjzwcVMV13NGh4rnwyI', 'Habilitado', 'Mensajero', NULL),
(2, 'MICHAEL@GMAIL.COM', '$argon2i$v=19$m=65536,t=4,p=1$THJlTmtudW0wT2FRczdDMg$HR54gPUZBZ8BQAvwbdPUMy/UMJEOEQwZN6m/QD2gzU4', 'Habilitado', 'Administrador', NULL),
(3, 'JAIRO@GMAIL.COM', '$argon2i$v=19$m=65536,t=4,p=1$N01Qci5ySDJOL3A1eHI1cw$bxXLrhuuNigllAed9cVIDWDTjcBmnDFNnVeTjgenScc', 'Inhabilitado', 'Tienda', NULL),
(5, 'JULAIAN@GMAIL.COM', '$argon2i$v=19$m=65536,t=4,p=1$ZndJY1d3cjFPS0s3TVNtdg$X8SI27rmFzg77CKYXXQST/enpf03U//BfNFPtAW7kD4', 'Habilitado', 'Usuario', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `appmodulos`
--
ALTER TABLE `appmodulos`
  ADD PRIMARY KEY (`id_modulo_principal`);

--
-- Indices de la tabla `apppermisos`
--
ALTER TABLE `apppermisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `appsubmodulos`
--
ALTER TABLE `appsubmodulos`
  ADD PRIMARY KEY (`id_submodulo`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apppermisos`
--
ALTER TABLE `apppermisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `appsubmodulos`
--
ALTER TABLE `appsubmodulos`
  MODIFY `id_submodulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=449;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
