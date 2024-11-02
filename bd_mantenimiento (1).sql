-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2024 a las 17:06:06
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
-- Base de datos: `bd_mantenimiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `idcargo` int(11) NOT NULL,
  `nombre_cargo` varchar(20) DEFAULT NULL,
  `estado_cargo` bit(1) DEFAULT NULL,
  `Fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doc_flota`
--

CREATE TABLE `doc_flota` (
  `id_docflota` int(11) NOT NULL,
  `id_flota` int(11) NOT NULL,
  `id_tipodoc` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `fechareg_docflota` date NOT NULL DEFAULT current_timestamp(),
  `precio` float NOT NULL,
  `fechareg` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `doc_flota`
--

INSERT INTO `doc_flota` (`id_docflota`, `id_flota`, `id_tipodoc`, `id_proveedor`, `fechareg_docflota`, `precio`, `fechareg`) VALUES
(1, 4, 2, 1, '2024-08-12', 150, '2024-08-12 16:52:01'),
(2, 5, 2, 1, '2024-04-11', 150, '2024-08-13 18:38:30'),
(4, 7, 2, 1, '2024-06-21', 150, '2024-08-13 18:49:58'),
(5, 4, 3, 1, '2024-06-10', 150, '2024-08-13 18:52:17'),
(6, 5, 3, 1, '2024-02-26', 150, '2024-08-13 18:53:09'),
(8, 7, 3, 1, '2024-02-26', 150, '2024-08-13 18:54:52'),
(9, 4, 1, 2, '2024-06-04', 165, '2024-08-13 19:02:30'),
(13, 5, 1, 2, '2024-03-16', 165, '2024-08-14 18:10:24'),
(14, 7, 1, 2, '2024-06-13', 165, '2024-08-14 18:11:17'),
(15, 14, 2, 1, '2024-01-19', 135, '2024-08-14 18:12:14'),
(16, 14, 3, 1, '2024-08-13', 130, '2024-08-14 18:12:48'),
(18, 14, 1, 2, '2023-11-13', 165, '2024-08-14 18:14:48'),
(19, 4, 3, 1, '2023-12-06', 150, '2024-08-16 20:50:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idempleado` int(11) NOT NULL,
  `nombre_empleado` varchar(50) DEFAULT NULL,
  `apellidos_empleado` varchar(50) DEFAULT NULL,
  `sexo_empleado` char(1) DEFAULT NULL,
  `telefono_empleado` char(9) DEFAULT NULL,
  `fechanac_empleado` date DEFAULT NULL,
  `tipodoc_empleado` char(1) DEFAULT NULL,
  `nrodoc_empleado` char(8) DEFAULT NULL,
  `idusuario` int(11) DEFAULT NULL,
  `Fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idestado` int(11) NOT NULL,
  `nombre_estado` varchar(50) NOT NULL,
  `fechareg_estado` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idestado`, `nombre_estado`, `fechareg_estado`) VALUES
(1, 'Activo', '2024-07-18 17:25:02'),
(2, 'Baja', '2024-07-18 19:42:37'),
(4, 'Mantenimiento', '2024-07-18 20:10:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `flota`
--

CREATE TABLE `flota` (
  `id_flota` int(11) NOT NULL,
  `id_tipoflota` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_sede` int(11) NOT NULL,
  `marca_flota` varchar(250) NOT NULL,
  `modelo_flota` varchar(250) NOT NULL,
  `serie_flota` varchar(250) NOT NULL,
  `placa_flota` varchar(200) NOT NULL,
  `nombre_flota` varchar(250) NOT NULL,
  `fechareg_flota` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `flota`
--

INSERT INTO `flota` (`id_flota`, `id_tipoflota`, `id_estado`, `id_sede`, `marca_flota`, `modelo_flota`, `serie_flota`, `placa_flota`, `nombre_flota`, `fechareg_flota`) VALUES
(1, 3, 1, 1, 'CATERPILAR', 'NR25N2X', 'RTB35A10122', '-', 'APILADOR RETRACTIL ELÉCTRICO CON MASTIL CAT', '2024-07-20 23:03:10'),
(4, 1, 1, 1, 'VOLKSWAGEN', 'WORKER 17,250E', '9533N82TODR251778', 'D6P-738', 'CAMION PLATAFORMA 17250E', '2024-08-03 23:24:57'),
(5, 1, 1, 1, 'VOLKSWAGEN', 'WORKER 17280 LR MAN 5', '953658248MR132124', 'BJD-917', 'CAMION PLATAFORMA 17280', '2024-08-03 23:28:15'),
(7, 1, 1, 1, 'VOLKSWAGEN', '24280 LR MAN E5', '953658243KR919897', 'BEA-835', 'CAMION PLATAFORMA 24280', '2024-08-10 21:21:11'),
(14, 1, 1, 1, 'HINO', 'FC', 'JHDFC9JJ7NXX10904', 'P4M-944', 'CAMION PLATAFORMA HINO FC', '2024-08-14 18:07:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_prov` int(11) NOT NULL,
  `nombre_prov` varchar(50) NOT NULL,
  `fechareg_prov` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_prov`, `nombre_prov`, `fechareg_prov`) VALUES
(1, 'CERTIFICA DEL NORTE', '2024-07-20 18:25:09'),
(2, 'MAPFRE PERÚ', '2024-07-20 18:43:30'),
(3, 'LINDE', '2024-07-20 18:45:10'),
(5, 'GALVEZ ALBERCA JESÚS', '2024-08-10 22:21:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `idsede` int(11) NOT NULL,
  `nombre_sede` varchar(50) NOT NULL,
  `fechareg_sede` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`idsede`, `nombre_sede`, `fechareg_sede`) VALUES
(1, 'Piura', '2024-07-19 23:10:38'),
(2, 'Arequipa', '2024-07-20 14:19:21'),
(4, 'Villa el salvador', '2024-08-01 19:00:18'),
(6, 'Unicachi', '2024-08-01 19:05:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `idservicio` int(11) NOT NULL,
  `nombre_servicio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_doc`
--

CREATE TABLE `tipo_doc` (
  `idtipo_doc` int(11) NOT NULL,
  `tipo_doc` varchar(50) NOT NULL,
  `nombre_doc` varchar(150) NOT NULL,
  `fechareg_tipodoc` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_doc`
--

INSERT INTO `tipo_doc` (`idtipo_doc`, `tipo_doc`, `nombre_doc`, `fechareg_tipodoc`) VALUES
(1, 'SOAT', 'SEGURO OBLIGATORIO DE ACCIDENTE DE TRABAJO', '2024-07-18 20:44:27'),
(2, 'CITV-MERCANCÍAS', 'CERTIFICADO DE INSPECCIÓN TÉCNICA VEHICULAR - MERCANCIAS', '2024-07-18 23:32:24'),
(3, 'CITV-RES. PELIGROSOS', 'CERTIFICADO DE INSPECCIÓN TÉCNICA VEHICULAR - RESIDUOS PELIGROSOS', '2024-07-18 23:33:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_flota`
--

CREATE TABLE `tipo_flota` (
  `idtipo_flota` int(11) NOT NULL,
  `nomtipo_flota` varchar(50) NOT NULL,
  `fechareg_flota` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_flota`
--

INSERT INTO `tipo_flota` (`idtipo_flota`, `nomtipo_flota`, `fechareg_flota`) VALUES
(1, 'Camión', '2024-07-03 15:10:26'),
(2, 'Montacarga', '2024-07-03 15:11:00'),
(3, 'Apilador eléctrico', '2024-07-03 15:11:36'),
(4, 'Transpaleta', '2024-07-03 15:11:45'),
(11, 'AUTO', '2024-10-18 00:45:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_mantenimiento`
--

CREATE TABLE `tipo_mantenimiento` (
  `idtipo_mant` int(11) NOT NULL,
  `tipo_mant` varchar(50) NOT NULL,
  `nombre_mant` varchar(50) NOT NULL,
  `fechareg_sede` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_mantenimiento`
--

INSERT INTO `tipo_mantenimiento` (`idtipo_mant`, `tipo_mant`, `nombre_mant`, `fechareg_sede`) VALUES
(1, 'MANTPREVvv', 'MANTENIMIENTO PREVENTIVO  ooo    ', '2024-07-20 16:08:37'),
(2, 'MANTCORR', 'MANTENIMIENTO CORRECTIVO', '2024-07-20 16:52:53'),
(3, 'MANTPRED', 'MANTENIMIENTO PREDICTIVO', '2024-07-20 17:11:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `login_usuario` varchar(20) DEFAULT NULL,
  `clave_usuario` varchar(10) DEFAULT NULL,
  `estado_usuario` bit(1) DEFAULT NULL,
  `idcargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idcargo`);

--
-- Indices de la tabla `doc_flota`
--
ALTER TABLE `doc_flota`
  ADD PRIMARY KEY (`id_docflota`),
  ADD KEY `id_flota` (`id_flota`),
  ADD KEY `id_tipodoc` (`id_tipodoc`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idempleado`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idestado`);

--
-- Indices de la tabla `flota`
--
ALTER TABLE `flota`
  ADD PRIMARY KEY (`id_flota`),
  ADD KEY `id_tipoflota` (`id_tipoflota`),
  ADD KEY `id_sede` (`id_sede`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`idsede`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`idservicio`);

--
-- Indices de la tabla `tipo_doc`
--
ALTER TABLE `tipo_doc`
  ADD PRIMARY KEY (`idtipo_doc`);

--
-- Indices de la tabla `tipo_flota`
--
ALTER TABLE `tipo_flota`
  ADD PRIMARY KEY (`idtipo_flota`);

--
-- Indices de la tabla `tipo_mantenimiento`
--
ALTER TABLE `tipo_mantenimiento`
  ADD PRIMARY KEY (`idtipo_mant`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `doc_flota`
--
ALTER TABLE `doc_flota`
  MODIFY `id_docflota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idestado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `flota`
--
ALTER TABLE `flota`
  MODIFY `id_flota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `idsede` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `idservicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_doc`
--
ALTER TABLE `tipo_doc`
  MODIFY `idtipo_doc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_flota`
--
ALTER TABLE `tipo_flota`
  MODIFY `idtipo_flota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipo_mantenimiento`
--
ALTER TABLE `tipo_mantenimiento`
  MODIFY `idtipo_mant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `doc_flota`
--
ALTER TABLE `doc_flota`
  ADD CONSTRAINT `doc_flota_ibfk_1` FOREIGN KEY (`id_flota`) REFERENCES `flota` (`id_flota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doc_flota_ibfk_2` FOREIGN KEY (`id_tipodoc`) REFERENCES `tipo_doc` (`idtipo_doc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doc_flota_ibfk_3` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_prov`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `flota`
--
ALTER TABLE `flota`
  ADD CONSTRAINT `flota_ibfk_1` FOREIGN KEY (`id_tipoflota`) REFERENCES `tipo_flota` (`idtipo_flota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flota_ibfk_2` FOREIGN KEY (`id_sede`) REFERENCES `sede` (`idsede`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `flota_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`idestado`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
