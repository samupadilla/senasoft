-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-08-2021 a las 21:21:35
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mi_hospital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `idCita` int(11) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Especialidad` varchar(100) NOT NULL,
  `Estado` int(1) NOT NULL,
  `Estado_cita` varchar(45) DEFAULT NULL,
  `Consultorio_Id_Consultorio` int(11) NOT NULL,
  `Persona_idPersonas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultorio`
--

CREATE TABLE `consultorio` (
  `Id_Consultorio` int(11) NOT NULL,
  `No_Consultorio` varchar(45) NOT NULL,
  `Estado` int(11) DEFAULT NULL,
  `Persona_idPersonas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idPersonas` int(11) NOT NULL,
  `Nombres` varchar(45) NOT NULL,
  `Apellidos` varchar(45) NOT NULL,
  `Telefono` varchar(12) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `contrasena` varchar(150) NOT NULL,
  `Estado` varchar(45) NOT NULL,
  `Rol_idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idPersonas`, `Nombres`, `Apellidos`, `Telefono`, `Direccion`, `Email`, `contrasena`, `Estado`, `Rol_idRol`) VALUES
(1024583211, 'ASDA', 'PUERTO', '301112121221', 'KR 45 CA 25 63', 'ASDAPUERT@HOTMAIL.COM', 'QWERY', '1', 2),
(1024583225, 'JHONATAN', 'ALBADAN', '3058551759', 'kr 6a este 33 3...', 'tatan19972008@h...', 'qweqweqweqwe', '1', 1),
(1024583226, 'JHONATAN', 'ALBADAN', '301112121221', 'KR 5 ESTE 22 55', 'cpan@hotmail.com', 'qwerty', '0', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `Rol` varchar(45) NOT NULL,
  `Estado` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `Rol`, `Estado`) VALUES
(1, '0', '1'),
(2, '1', '1'),
(3, '2', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`idCita`),
  ADD KEY `fk_Cita_Consultorio1_idx` (`Consultorio_Id_Consultorio`),
  ADD KEY `fk_Cita_Persona1_idx` (`Persona_idPersonas`);

--
-- Indices de la tabla `consultorio`
--
ALTER TABLE `consultorio`
  ADD PRIMARY KEY (`Id_Consultorio`),
  ADD KEY `fk_Consultorio_Persona1_idx` (`Persona_idPersonas`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idPersonas`),
  ADD KEY `fk_Persona_Rol_idx` (`Rol_idRol`),
  ADD KEY `Rol_idRol` (`Rol_idRol`),
  ADD KEY `Estado` (`Estado`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `consultorio`
--
ALTER TABLE `consultorio`
  MODIFY `Id_Consultorio` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `fk_Cita_Consultorio1` FOREIGN KEY (`Consultorio_Id_Consultorio`) REFERENCES `consultorio` (`Id_Consultorio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cita_Persona1` FOREIGN KEY (`Persona_idPersonas`) REFERENCES `persona` (`idPersonas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `consultorio`
--
ALTER TABLE `consultorio`
  ADD CONSTRAINT `fk_Consultorio_Persona1` FOREIGN KEY (`Persona_idPersonas`) REFERENCES `persona` (`idPersonas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `fk_Persona_Rol` FOREIGN KEY (`Rol_idRol`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
