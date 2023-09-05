-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2023 a las 03:19:56
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
-- Base de datos: `reportdb_web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo_cliente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nombre`, `tipo_cliente`) VALUES
(6, 'Juan Pérez', 'A'),
(7, 'María García', 'B'),
(8, 'Pedro Rodríguez', 'A'),
(9, 'Laura López', 'C'),
(10, 'Carlos Sánchez', 'B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operarios`
--

CREATE TABLE `operarios` (
  `id_operario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `salario` decimal(10,2) DEFAULT NULL,
  `documento` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `operarios`
--

INSERT INTO `operarios` (`id_operario`, `nombre`, `salario`, `documento`) VALUES
(1, 'Juan Pérez', 1000.00, ''),
(2, 'María Gómez', 1500.00, ''),
(3, 'juan', 1000000.00, '12345678'),
(4, 'Jose David Ososrio', 123456.00, '1.000.000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id_reporte` int(11) NOT NULL,
  `maquina` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `turno` varchar(50) NOT NULL,
  `codigo` int(11) NOT NULL,
  `hora` time NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `num_rollo` varchar(50) NOT NULL,
  `op_opc` varchar(50) NOT NULL,
  `ancho_r` varchar(50) NOT NULL,
  `produccion` varchar(50) NOT NULL,
  `ancho_largo` varchar(50) NOT NULL,
  `observaciones` varchar(50) DEFAULT NULL,
  `firma` varchar(50) NOT NULL,
  `id_operario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`id_reporte`, `maquina`, `fecha`, `turno`, `codigo`, `hora`, `id_cliente`, `num_rollo`, `op_opc`, `ancho_r`, `produccion`, `ancho_largo`, `observaciones`, `firma`, `id_operario`) VALUES
(19, 'Máquina1', '2023-06-01', 'Turno1', 0, '08:00:00', 6, 'Rollo1', 'OPC1', '10', '100', '50', 'Observación1', 'Firma1', 1),
(20, 'Máquina2', '2023-06-02', 'Turno2', 0, '09:30:00', 7, 'Rollo2', 'OPC2', '12', '150', '60', 'Observación2', 'Firma2', 2),
(21, 'Máquina3', '2023-06-03', 'Turno1', 0, '11:15:00', 8, 'Rollo3', 'OPC3', '8', '80', '45', 'Observación3', 'Firma3', 3),
(22, 'Máquina4', '2023-06-04', 'Turno2', 0, '14:45:00', 9, 'Rollo4', 'OPC4', '15', '200', '55', 'Observación4', 'Firma4', 4),
(24, 'Máquina1', '2023-06-01', 'Turno1', 0, '08:00:00', 6, 'Rollo1', 'OPC1', '10', '100', '50', 'Observación1', 'Firma1', 1),
(25, 'Máquina2', '2023-06-02', 'Turno2', 0, '09:30:00', 7, 'Rollo2', 'OPC2', '12', '150', '60', 'Observación2', 'Firma2', 2),
(26, 'Máquina3', '2023-06-03', 'Turno1', 0, '11:15:00', 8, 'Rollo3', 'OPC3', '8', '80', '45', 'Observación3', 'Firma3', 3),
(27, 'Máquina4', '2023-06-04', 'Turno2', 0, '14:45:00', 9, 'Rollo4', 'OPC4', '15', '200', '55', 'Observación4', 'Firma4', 1),
(28, 'Máquina5', '2023-06-05', 'Turno1', 0, '17:20:00', 10, 'Rollo5', 'OPC5', '11', '120', '48', 'Observación5', 'Firma5', 2),
(29, 'maquina 1', '2023-06-26', '', 0, '02:24:40', 6, '1', 'op 1', '5 cm', 'producción 1', '50 cm', '', 'juan Pérez', 1),
(30, 'maquina 2', '2023-06-26', '', 5230, '02:31:04', 10, '1', 'op 1', '5 cm', 'producción 1', '50 cm', 'ninguna novedad', 'carlos', 1),
(31, 'maquina 1', '2023-06-26', '', 1, '02:32:21', 10, '1', 'op 1', '5 cm', 'producción 1', '50 cm', '', 'carlos', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `passwd` varchar(50) NOT NULL,
  `rol` varchar(50) NOT NULL DEFAULT 'operario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `passwd`, `rol`) VALUES
(1, 'admin', '123456', 'administrador'),
(2, 'operario', '123456', 'operario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `operarios`
--
ALTER TABLE `operarios`
  ADD PRIMARY KEY (`id_operario`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id_reporte`),
  ADD KEY `FK_reportes_operarios` (`id_operario`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `operarios`
--
ALTER TABLE `operarios`
  MODIFY `id_operario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `FK_reportes_operarios` FOREIGN KEY (`id_operario`) REFERENCES `operarios` (`id_operario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reportes_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
