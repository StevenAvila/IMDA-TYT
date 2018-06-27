-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2018 a las 22:41:37
-- Versión del servidor: 5.7.11
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_imdatyt`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `descripcion` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `descripcion`) VALUES
(1, 'En Revision'),
(2, 'Sin Atencion'),
(3, 'Solucionado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `idgenero` int(11) NOT NULL,
  `descripcion_genero` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`idgenero`, `descripcion_genero`) VALUES
(1, 'Masculino'),
(2, 'Femenino'),
(3, 'Indefinido');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe`
--

CREATE TABLE `informe` (
  `idinforme` int(11) NOT NULL,
  `fecha_fin` date NOT NULL,
  `comentario` varchar(50) NOT NULL,
  `ticket_idticket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `informe`
--

INSERT INTO `informe` (`idinforme`, `fecha_fin`, `comentario`, `ticket_idticket`) VALUES
(1, '2018-06-28', 'Se reparo', 1),
(2, '2018-06-26', 'SE reparo', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `idticket` int(11) NOT NULL,
  `tipoequipo_idtipoequipo` int(11) NOT NULL,
  `asunto_incidencia` varchar(25) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion_incidencia` varchar(100) NOT NULL,
  `usuario_idusuario` int(11) NOT NULL,
  `estado_idestado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`idticket`, `tipoequipo_idtipoequipo`, `asunto_incidencia`, `fecha`, `descripcion_incidencia`, `usuario_idusuario`, `estado_idestado`) VALUES
(1, 2, 'Pantalla', '2010-10-20', 'No enciende luego del apagon', 2, 1),
(2, 2, 'Television', '2018-05-17', 'No sirve la conexion HDMI ', 4, 2),
(3, 2, 'Licencia Office', '2018-05-17', 'Me pide renovar licencia', 5, 2),
(4, 2, 'Teclado', '2018-05-28', 'No lo reconoce', 2, 1),
(5, 2, 'Teclado', '2018-05-24', 'Faltan Teclas', 4, 1),
(6, 2, 'Pantalla', '2018-05-18', 'No enciende', 5, 1),
(7, 3, 'sdcfvdf', '2018-05-29', 'sadfsf', 4, 2),
(8, 2, 'Pantalla', '2018-05-17', 'No enciende', 5, 3),
(9, 3, 'Impresora', '2018-06-02', 'Se atasco el papel', 4, 2),
(10, 3, 'Impresora', '2018-06-03', 'Sin tinta', 4, 2),
(11, 1, 'xasxjknakjsxc', '2018-06-15', 'adcsdcsfvfv', 4, 2),
(12, 3, 'asdcsdcdsc', '2018-06-22', 'dfvbfgbfgb', 6, 2),
(13, 2, 'Teclado otro', '2018-06-15', 'Estallo ', 4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoequipo`
--

CREATE TABLE `tipoequipo` (
  `idtipoequipo` int(11) NOT NULL,
  `descripcionequipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoequipo`
--

INSERT INTO `tipoequipo` (`idtipoequipo`, `descripcionequipo`) VALUES
(1, 'Software'),
(2, 'Hardware'),
(3, 'Audiovisual');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `idtipousuario` int(11) NOT NULL,
  `descripcion_usuario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`idtipousuario`, `descripcion_usuario`) VALUES
(1, 'Administrador'),
(2, 'Usuario'),
(3, 'Tecnico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `genero_idgenero` int(11) DEFAULT NULL,
  `tipousuario_idtipousuario` int(11) DEFAULT NULL,
  `usuario` varchar(25) NOT NULL,
  `contrasena` varchar(25) NOT NULL,
  `telefono` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `apellidos`, `correo`, `genero_idgenero`, `tipousuario_idtipousuario`, `usuario`, `contrasena`, `telefono`) VALUES
(1, 'Steven Gerardo', 'Avila', 'elstiven0703@hotmail.com', 1, 1, 'Steven07', 'admin123', '313895'),
(2, 'santiago ', 'Garcia', 'garciasdaza2390@hotmail.com', 1, 2, 'Santiago06', 'stevenavila11', '5361653'),
(3, 'Jhonatan', 'Rodriguez', 'j@hotmail.com', 1, 3, 'Jhonatan03', 'tecnico', '32321654'),
(4, 'Gerardo', 'Avila', 'sgavila1@misena.edu.co', 1, 2, 'StevenUser', '12345', '320445'),
(5, 'Andrea', 'lopez', 'Alopez@hotmail.com', 2, 2, 'AndreaUser', '12345', '3206548795'),
(6, 'Lokilla', 'Rastacuando', 'Loki@loki.com', 2, 2, 'Lokilla01', '12345', '3124567890'),
(7, 'laura', 'garcia', 'valeria69@hotmail.com', 2, 2, 'laura69', 'laura69', '3133408380');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`idgenero`);

--
-- Indices de la tabla `informe`
--
ALTER TABLE `informe`
  ADD PRIMARY KEY (`idinforme`),
  ADD KEY `fk_informe_ticket1_idx` (`ticket_idticket`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`idticket`),
  ADD KEY `fk_ticket_tipoequipo1_idx` (`tipoequipo_idtipoequipo`),
  ADD KEY `fk_ticket_usuario1_idx` (`usuario_idusuario`),
  ADD KEY `tipoequipo_idtipoequipo` (`tipoequipo_idtipoequipo`),
  ADD KEY `tipoequipo_idtipoequipo_2` (`tipoequipo_idtipoequipo`),
  ADD KEY `estado_idestado` (`estado_idestado`);

--
-- Indices de la tabla `tipoequipo`
--
ALTER TABLE `tipoequipo`
  ADD PRIMARY KEY (`idtipoequipo`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`idtipousuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `fk_usuario_genero1_idx` (`genero_idgenero`),
  ADD KEY `fk_usuario_tipousuario1_idx` (`tipousuario_idtipousuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `idgenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `informe`
--
ALTER TABLE `informe`
  MODIFY `idinforme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `idticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `tipoequipo`
--
ALTER TABLE `tipoequipo`
  MODIFY `idtipoequipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `idtipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `informe`
--
ALTER TABLE `informe`
  ADD CONSTRAINT `informe_ibfk_1` FOREIGN KEY (`ticket_idticket`) REFERENCES `ticket` (`idticket`);

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`tipoequipo_idtipoequipo`) REFERENCES `tipoequipo` (`idtipoequipo`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `ticket_ibfk_3` FOREIGN KEY (`estado_idestado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`genero_idgenero`) REFERENCES `genero` (`idgenero`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`tipousuario_idtipousuario`) REFERENCES `tipousuario` (`idtipousuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
