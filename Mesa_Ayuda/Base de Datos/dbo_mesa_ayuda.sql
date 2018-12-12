-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- Base de datos: `dbo_mesa_ayuda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estadoaprobacion`
--

CREATE TABLE `tb_estadoaprobacion` (
  `idEstadoAprobacion` int(11) NOT NULL,
  `TipoAprobacion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_estadoaprobacion`
--

INSERT INTO `tb_estadoaprobacion` (`idEstadoAprobacion`, `TipoAprobacion`) VALUES
(1, 'Aprobado'),
(2, 'No Aprovado'),
(3, 'sin estado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estadocaso`
--

CREATE TABLE `tb_estadocaso` (
  `idEstadoCaso` int(11) NOT NULL,
  `tipoEstado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Aperturado,Planificado,Solucionado';

--
-- Volcado de datos para la tabla `tb_estadocaso`
--

INSERT INTO `tb_estadocaso` (`idEstadoCaso`, `tipoEstado`) VALUES
(1, 'Aperturado'),
(2, 'Planificado'),
(3, 'Solucionado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estadousuario`
--

CREATE TABLE `tb_estadousuario` (
  `idEstadoUsuario` int(11) NOT NULL,
  `Estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_estadousuario`
--

INSERT INTO `tb_estadousuario` (`idEstadoUsuario`, `Estado`) VALUES
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_nivelcaso`
--

CREATE TABLE `tb_nivelcaso` (
  `idNivelCaso` int(11) NOT NULL,
  `tipoCaso` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_nivelcaso`
--

INSERT INTO `tb_nivelcaso` (`idNivelCaso`, `tipoCaso`) VALUES
(1, 'Alta'),
(2, 'Media'),
(3, 'Baja'),
(4, 'Sin Tipo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ticket`
--

CREATE TABLE `tb_ticket` (
  `idTicket` int(11) NOT NULL,
  `idEstadoCaso` int(11) NOT NULL,
  `idAprobacion` int(11) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `Solucion` varchar(200) NOT NULL,
  `idNivelCaso` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `FechaCreacion` date NOT NULL,
  `FechaSolucion` date NOT NULL,
  `usuarioSolucion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_ticket`
--

INSERT INTO `tb_ticket` (`idTicket`, `idEstadoCaso`, `idAprobacion`, `Descripcion`, `Solucion`, `idNivelCaso`, `idUsuario`, `FechaCreacion`, `FechaSolucion`, `usuarioSolucion`) VALUES
(1, 3, 2, 'Deshabilitar usuario', 'El usuario no existe', 3, 2, '2018-11-20', '2018-11-20', 'Analista.Mesa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipodocumento`
--

CREATE TABLE `tb_tipodocumento` (
  `idTipoDocumento` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_tipodocumento`
--

INSERT INTO `tb_tipodocumento` (`idTipoDocumento`, `tipo`) VALUES
(1, 'Cedula'),
(2, 'Tarjeta de Identidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tipousuario`
--

CREATE TABLE `tb_tipousuario` (
  `IdtipoUsuario` int(11) NOT NULL,
  `cargo` varchar(20) NOT NULL,
  `permisos` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_tipousuario`
--

INSERT INTO `tb_tipousuario` (`IdtipoUsuario`, `cargo`, `permisos`) VALUES
(1, 'Admin', 'creaUsers,ApruebaSoli'),
(2, 'empleado', 'modifica,Solicita'),
(3, 'Cliente', 'CreaCasos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `idUsuario` int(11) NOT NULL,
  `idtipousuario` int(11) NOT NULL,
  `idTipoDocumento` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `contraseniaNormal` varchar(20) NOT NULL,
  `contraseniaEncriptada` varchar(20) NOT NULL,
  `identificacion` varchar(30) NOT NULL,
  `idestadousuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_usuario`
--

INSERT INTO `tb_usuario` (`idUsuario`, `idtipousuario`, `idTipoDocumento`, `nombre`, `usuario`, `contraseniaNormal`, `contraseniaEncriptada`, `identificacion`, `idestadousuario`) VALUES
(1, 1, 1, 'Juan Diego Jurado ', 'juan.jurado', 'Bogota2020', '', '123456789', 1),
(2, 3, 1, 'Carlos Andres calderon', 'carlos.calderon', 'cali2020', '', '1234578', 1),
(3, 2, 1, 'Analista Mesa', 'Analista.mesa', 'Colombia2020', '', '3023015', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_estadoaprobacion`
--
ALTER TABLE `tb_estadoaprobacion`
  ADD PRIMARY KEY (`idEstadoAprobacion`);

--
-- Indices de la tabla `tb_estadocaso`
--
ALTER TABLE `tb_estadocaso`
  ADD PRIMARY KEY (`idEstadoCaso`);

--
-- Indices de la tabla `tb_estadousuario`
--
ALTER TABLE `tb_estadousuario`
  ADD PRIMARY KEY (`idEstadoUsuario`);

--
-- Indices de la tabla `tb_nivelcaso`
--
ALTER TABLE `tb_nivelcaso`
  ADD PRIMARY KEY (`idNivelCaso`);

--
-- Indices de la tabla `tb_ticket`
--
ALTER TABLE `tb_ticket`
  ADD PRIMARY KEY (`idTicket`),
  ADD KEY `idEstadoCaso` (`idEstadoCaso`),
  ADD KEY `idAprobacion` (`idAprobacion`),
  ADD KEY `idNivelCaso` (`idNivelCaso`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `tb_tipodocumento`
--
ALTER TABLE `tb_tipodocumento`
  ADD PRIMARY KEY (`idTipoDocumento`);

--
-- Indices de la tabla `tb_tipousuario`
--
ALTER TABLE `tb_tipousuario`
  ADD PRIMARY KEY (`IdtipoUsuario`);

--
-- Indices de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idtipousuario` (`idtipousuario`),
  ADD KEY `idTipoDocumento` (`idTipoDocumento`),
  ADD KEY `idestadousuario` (`idestadousuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_estadoaprobacion`
--
ALTER TABLE `tb_estadoaprobacion`
  MODIFY `idEstadoAprobacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_estadocaso`
--
ALTER TABLE `tb_estadocaso`
  MODIFY `idEstadoCaso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_estadousuario`
--
ALTER TABLE `tb_estadousuario`
  MODIFY `idEstadoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_nivelcaso`
--
ALTER TABLE `tb_nivelcaso`
  MODIFY `idNivelCaso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_ticket`
--
ALTER TABLE `tb_ticket`
  MODIFY `idTicket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_tipodocumento`
--
ALTER TABLE `tb_tipodocumento`
  MODIFY `idTipoDocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_tipousuario`
--
ALTER TABLE `tb_tipousuario`
  MODIFY `IdtipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_ticket`
--
ALTER TABLE `tb_ticket`
  ADD CONSTRAINT `tb_ticket_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `tb_usuario` (`idUsuario`),
  ADD CONSTRAINT `tb_ticket_ibfk_2` FOREIGN KEY (`idEstadoCaso`) REFERENCES `tb_estadocaso` (`idEstadoCaso`),
  ADD CONSTRAINT `tb_ticket_ibfk_3` FOREIGN KEY (`idAprobacion`) REFERENCES `tb_estadoaprobacion` (`idEstadoAprobacion`),
  ADD CONSTRAINT `tb_ticket_ibfk_4` FOREIGN KEY (`idNivelCaso`) REFERENCES `tb_nivelcaso` (`idNivelCaso`);

--
-- Filtros para la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `tb_usuario_ibfk_1` FOREIGN KEY (`idTipoDocumento`) REFERENCES `tb_tipodocumento` (`idTipoDocumento`),
  ADD CONSTRAINT `tb_usuario_ibfk_2` FOREIGN KEY (`idtipousuario`) REFERENCES `tb_tipousuario` (`IdtipoUsuario`),
  ADD CONSTRAINT `tb_usuario_ibfk_3` FOREIGN KEY (`idestadousuario`) REFERENCES `tb_estadousuario` (`idEstadoUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
