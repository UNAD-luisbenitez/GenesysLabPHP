-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2016 a las 01:01:08
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_genesyslab`
--
CREATE DATABASE IF NOT EXISTS `bd_genesyslab` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bd_genesyslab`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `IdCargo` tinyint(1) UNSIGNED NOT NULL,
  `NameCargo` varchar(100) NOT NULL,
  `DescripcionCargo` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`IdCargo`, `NameCargo`, `DescripcionCargo`) VALUES
(0, 'Ninguno', 'No pertenece a la empresa'),
(1, 'Gerente', 'Gerente principal de la sede'),
(2, 'Ingeniero Lider', 'Lidera equipos de trabajo e investigacion'),
(3, 'Secretariado', 'Colabora en tareas administrativas'),
(4, 'Ingeniero', 'Hace parte de equipos de trabajo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencias`
--

CREATE TABLE `dependencias` (
  `IdDependencia` tinyint(1) UNSIGNED NOT NULL,
  `NameDependencia` varchar(120) NOT NULL,
  `DescripcionDependencia` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dependencias`
--

INSERT INTO `dependencias` (`IdDependencia`, `NameDependencia`, `DescripcionDependencia`) VALUES
(0, 'Ninguno', 'Sin asignar'),
(1, 'Gerencia', 'Tareas administrativas'),
(2, 'Contaduria', 'finanzas de la empresa'),
(3, 'Investigacion Y Desarrollo', 'Se crean y perfeccionan productos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historiales`
--

CREATE TABLE `historiales` (
  `SerialHistorial` bigint(1) UNSIGNED NOT NULL,
  `HoraIngreso` datetime(1) NOT NULL,
  `HoraSalida` datetime(1) DEFAULT NULL,
  `Personas_IdPersonas` bigint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historiales`
--

INSERT INTO `historiales` (`SerialHistorial`, `HoraIngreso`, `HoraSalida`, `Personas_IdPersonas`) VALUES
(1, '2016-05-06 05:29:20.0', '2016-05-06 05:29:24.0', 34721325),
(2, '2016-05-06 05:29:34.0', '2016-05-06 05:29:39.0', 114685749),
(3, '2016-05-06 05:29:51.0', '2016-05-06 05:29:53.0', 18352247),
(4, '2016-05-06 05:30:02.0', '2016-05-06 05:30:04.0', 5555555),
(5, '2016-05-07 05:32:09.0', '2016-05-07 05:32:17.0', 987452368);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `IdModulo` tinyint(1) UNSIGNED NOT NULL,
  `NameModulo` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`IdModulo`, `NameModulo`) VALUES
(1, 'Personal Administrativo'),
(2, 'Personal Misional'),
(3, 'Visitantes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `IdPersonas` bigint(1) UNSIGNED NOT NULL,
  `NamePersonas` varchar(100) NOT NULL,
  `ApellidoPersonas` varchar(100) DEFAULT NULL,
  `GeneroPersonas` varchar(10) NOT NULL,
  `ProfesionPersonas` varchar(100) DEFAULT NULL,
  `FotoPersonas` longblob,
  `Cargos_IdCargo` tinyint(1) UNSIGNED NOT NULL,
  `Dependencias_IdDependencia` tinyint(1) UNSIGNED NOT NULL,
  `Modulos_IdModulos` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`IdPersonas`, `NamePersonas`, `ApellidoPersonas`, `GeneroPersonas`, `ProfesionPersonas`, `FotoPersonas`, `Cargos_IdCargo`, `Dependencias_IdDependencia`, `Modulos_IdModulos`) VALUES
(5555555, 'Juanito', 'Clavito', 'masculino', '', NULL, 0, 0, 3),
(18352247, 'Felipe', 'Cardenas', 'masculino', 'Ingeniero Quimico', NULL, 4, 3, 2),
(34721325, 'Cristina', 'Arias', 'femenino', 'Magister en Ciencias (Quimica)', NULL, 2, 3, 2),
(114685749, 'Daniel', 'Arevalo', 'masculino', 'Magister en Economia', NULL, 1, 1, 1),
(987452368, 'Ana', 'Sanchez', 'femenino', 'Tecnologo En Gestion Empresarial', NULL, 3, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `systemadmins`
--

CREATE TABLE `systemadmins` (
  `IdAdmin` bigint(1) UNSIGNED NOT NULL,
  `NombreAdmin` varchar(120) NOT NULL,
  `ApellidosAdmin` varchar(120) DEFAULT NULL,
  `PassAdmin` varchar(40) NOT NULL,
  `FotoAdmin` longblob
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `systemadmins`
--

INSERT INTO `systemadmins` (`IdAdmin`, `NombreAdmin`, `ApellidosAdmin`, `PassAdmin`, `FotoAdmin`) VALUES
(1234567890, 'Luis', 'Benitez', '251f38c26a1f01207dd937775cffdfdab5302610', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`IdCargo`);

--
-- Indices de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  ADD PRIMARY KEY (`IdDependencia`);

--
-- Indices de la tabla `historiales`
--
ALTER TABLE `historiales`
  ADD PRIMARY KEY (`SerialHistorial`),
  ADD KEY `Personas_IdPersonas` (`Personas_IdPersonas`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`IdModulo`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`IdPersonas`),
  ADD KEY `Cargos_IdCargo` (`Cargos_IdCargo`),
  ADD KEY `Dependencias_IdDependencia` (`Dependencias_IdDependencia`),
  ADD KEY `Modulos_IdModulos` (`Modulos_IdModulos`);

--
-- Indices de la tabla `systemadmins`
--
ALTER TABLE `systemadmins`
  ADD PRIMARY KEY (`IdAdmin`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historiales`
--
ALTER TABLE `historiales`
  MODIFY `SerialHistorial` bigint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historiales`
--
ALTER TABLE `historiales`
  ADD CONSTRAINT `historiales_ibfk_1` FOREIGN KEY (`Personas_IdPersonas`) REFERENCES `personas` (`IdPersonas`);

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`Cargos_IdCargo`) REFERENCES `cargos` (`IdCargo`),
  ADD CONSTRAINT `personas_ibfk_2` FOREIGN KEY (`Dependencias_IdDependencia`) REFERENCES `dependencias` (`IdDependencia`),
  ADD CONSTRAINT `personas_ibfk_3` FOREIGN KEY (`Modulos_IdModulos`) REFERENCES `modulos` (`IdModulo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
