-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2025 a las 15:45:22
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
-- Base de datos: `topicos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_acciones`
--

CREATE TABLE `historial_acciones` (
  `id` int(11) NOT NULL,
  `tabla` varchar(50) DEFAULT NULL,
  `accion` varchar(10) DEFAULT NULL,
  `id_afectado` int(11) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial_acciones`
--

INSERT INTO `historial_acciones` (`id`, `tabla`, `accion`, `id_afectado`, `usuario`, `fecha`, `descripcion`) VALUES
(1, 't_profesores', 'INSERT', 7, 'root@localhost', '2025-05-27 06:45:12', 'Se registró al profesor fede berrocal'),
(2, 't_alumnos', 'INSERT', 12, 'ramiroA', '2025-05-27 15:44:35', 'Se registró al alumno test test'),
(3, 't_alumnos', 'INSERT', 13, 'ramiroA', '2025-05-27 15:45:10', 'Se registró al alumno test test'),
(4, 't_alumnos', 'INSERT', 14, 'ramiroA', '2025-05-27 15:45:32', 'Se registró al alumno test test'),
(5, 't_alumnos', 'INSERT', 15, 'ramiroA', '2025-05-27 16:59:43', 'Se registró al alumno fernando laraaaaaa'),
(6, 't_usuario', 'UPDATE', 23, 'ramiroA', '2025-05-27 17:22:55', 'Se actualizó al usuario test'),
(7, 't_usuario', 'UPDATE', 23, 'ramiroA', '2025-05-27 17:26:39', 'Se actualizó al usuario test'),
(8, 't_usuario', 'UPDATE', 20, 'ramiroA', '2025-05-27 18:29:55', 'Se actualizó al usuario ramiroA'),
(9, 't_usuario', 'UPDATE', 22, 'ramiroA', '2025-05-27 18:33:05', 'Se actualizó al usuario cremax'),
(10, 't_usuario', 'UPDATE', 22, 'ramiroA', '2025-05-27 18:37:26', 'Se actualizó al usuario cremax'),
(11, 't_usuario', 'UPDATE', 20, 'ramiroA', '2025-05-27 18:37:43', 'Se actualizó al usuario ramiroA'),
(12, 't_usuario', 'UPDATE', 20, 'ramiroA', '2025-05-27 18:50:17', 'Se actualizó al usuario ramiroA'),
(13, 't_usuario', 'UPDATE', 20, 'ramiroA', '2025-05-27 18:50:41', 'Se actualizó al usuario ramiroA'),
(14, 't_alumnos', 'INSERT', 16, 'ramiroA', '2025-05-27 18:52:01', 'Se registró al alumno pedro benitez'),
(15, 't_profesores', 'UPDATE', 1, 'root@localhost', '2025-05-27 18:56:15', 'Se actualizó al profesor adan cardenas'),
(16, 't_usuario', 'UPDATE', 20, 'ramiroA', '2025-05-27 18:59:16', 'Se actualizó al usuario ramiroA'),
(17, 't_usuario', 'UPDATE', 22, 'ramiroA', '2025-05-27 18:59:23', 'Se actualizó al usuario cremax'),
(18, 't_usuario', 'UPDATE', 22, 'ramiroA', '2025-05-27 19:00:16', 'Se actualizó al usuario cremax'),
(19, 't_usuario', 'UPDATE', 20, 'ramiroA', '2025-05-27 19:00:41', 'Se actualizó al usuario ramiroA'),
(20, 't_usuario', 'UPDATE', 20, 'ramiroA', '2025-05-27 19:02:39', 'Se actualizó al usuario ramiroA'),
(21, 't_usuario', 'UPDATE', 22, 'ramiroA', '2025-05-27 19:02:53', 'Se actualizó al usuario cremax'),
(22, 't_usuario', 'UPDATE', 22, 'ramiroA', '2025-05-27 19:03:00', 'Se actualizó al usuario cremax'),
(23, 't_usuario', 'UPDATE', 22, 'ramiroA', '2025-05-27 19:03:31', 'Se actualizó al usuario cremax'),
(24, 't_usuario', 'UPDATE', 22, 'ramiroA', '2025-05-27 19:13:47', 'Se actualizó al usuario cremax'),
(25, 't_usuario', 'UPDATE', 20, 'ramiroA', '2025-05-27 19:14:07', 'Se actualizó al usuario ramiroA'),
(26, 't_usuario', 'UPDATE', 21, 'ramiroA', '2025-05-27 19:14:20', 'Se actualizó al usuario perroF'),
(27, 't_usuario', 'UPDATE', 20, 'ramiroA', '2025-05-27 19:14:37', 'Se actualizó al usuario ramiroA'),
(28, 't_usuario', 'INSERT', 24, 'ramiroA', '2025-05-27 19:19:02', 'Se registró al usuario test2'),
(29, 't_usuario', 'UPDATE', 24, 'ramiroA', '2025-05-27 19:19:14', 'Se actualizó al usuario test2'),
(30, 't_usuario', 'UPDATE', 24, 'ramiroA', '2025-05-27 19:22:31', 'Se actualizó al usuario test2'),
(31, 't_usuario', 'UPDATE', 22, 'ramiroA', '2025-05-27 19:22:46', 'Se actualizó al usuario cremax'),
(32, 't_usuario', 'UPDATE', 22, 'ramiroA', '2025-05-27 19:23:07', 'Se actualizó al usuario cremax'),
(33, 't_usuario', 'UPDATE', 20, 'ramiroA', '2025-05-27 19:23:11', 'Se actualizó al usuario ramiroA'),
(34, 't_usuario', 'UPDATE', 20, 'ramiroA', '2025-05-27 19:23:44', 'Se actualizó al usuario ramiroA'),
(35, 't_usuario', 'INSERT', 25, 'ramiroA', '2025-05-27 19:24:52', 'Se registró al usuario abad2'),
(36, 't_usuario', 'UPDATE', 25, 'ramiroA', '2025-05-27 19:25:25', 'Se actualizó al usuario abad2'),
(37, 't_usuario', 'UPDATE', 25, 'ramiroA', '2025-05-27 19:25:37', 'Se actualizó al usuario abad2'),
(38, 't_usuario', 'UPDATE', 20, 'ramiroA', '2025-05-27 19:25:43', 'Se actualizó al usuario ramiroA'),
(39, 't_usuario', 'UPDATE', 20, 'ramiroA', '2025-05-27 19:25:50', 'Se actualizó al usuario ramiroA'),
(40, 't_usuario', 'UPDATE', 20, 'ramiroA', '2025-05-27 19:27:10', 'Se actualizó al usuario ramiroA'),
(41, 't_alumnos', 'INSERT', 17, 'ramiroA', '2025-05-27 19:28:18', 'Se registró al alumno ddwq wqedqw'),
(42, 't_usuario', 'UPDATE', 20, 'ramiroA', '2025-05-28 05:34:18', 'Se actualizó al usuario ramiroA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_alumnos`
--

CREATE TABLE `t_alumnos` (
  `id_alumnos` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `matricula` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_alumnos`
--

INSERT INTO `t_alumnos` (`id_alumnos`, `nombre`, `apellido`, `matricula`) VALUES
(1, 'pedro', 'benites', '231190040'),
(2, 'arenita', 'mejia', '231190080'),
(4, 'rafa', 'paredes', '23119020'),
(5, 'fernando', 'lara', '231190050'),
(6, 'andress', 'benites', '231190040'),
(7, 'fernanda', 'lara', '231190050'),
(9, 'pedro', 'benitessss', '231190040'),
(15, 'fernando', 'laraaaaaa', '231190050'),
(16, 'pedro', 'benitez', '25945'),
(17, 'ddwq', 'wqedqw', '123123');

--
-- Disparadores `t_alumnos`
--
DELIMITER $$
CREATE TRIGGER `tr_insert_alumno` AFTER INSERT ON `t_alumnos` FOR EACH ROW BEGIN
    DECLARE usuario_php VARCHAR(100);
    SELECT usuario INTO usuario_php FROM usuario_log_actual WHERE id = 1;

    INSERT INTO historial_acciones (tabla, accion, id_afectado, usuario, descripcion)
    VALUES (
        't_alumnos',
        'INSERT',
        NEW.id_alumnos,
        usuario_php,
        CONCAT('Se registró al alumno ', NEW.nombre, ' ', NEW.apellido)
    );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_update_alumno` AFTER UPDATE ON `t_alumnos` FOR EACH ROW BEGIN
    DECLARE usuario_php VARCHAR(100);
    SELECT usuario INTO usuario_php FROM usuario_log_actual WHERE id = 1;

    INSERT INTO historial_acciones (tabla, accion, id_afectado, usuario, descripcion)
    VALUES (
        't_alumnos',
        'UPDATE',
        OLD.id_alumnos,
        usuario_php,
        CONCAT('Se actualizó al alumno ', OLD.nombre, ' ', OLD.apellido)
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_historial`
--

CREATE TABLE `t_historial` (
  `id_historial` int(11) NOT NULL,
  `tabla_afectada` varchar(50) DEFAULT NULL,
  `accion` varchar(20) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_inventario`
--

CREATE TABLE `t_inventario` (
  `id_inventario` int(11) NOT NULL,
  `producto` varchar(100) NOT NULL,
  `precio` double NOT NULL,
  `unidades` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `t_inventario`
--

INSERT INTO `t_inventario` (`id_inventario`, `producto`, `precio`, `unidades`) VALUES
(2, 'doritos', 400, 40),
(3, 'bonafina', 18, 5),
(4, 'gomitas', 10, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_materia`
--

CREATE TABLE `t_materia` (
  `id_materia` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_materia`
--

INSERT INTO `t_materia` (`id_materia`, `nombre`, `tipo`) VALUES
(1, 'Calculo Vectorial', 'Ciencias Basicas');

--
-- Disparadores `t_materia`
--
DELIMITER $$
CREATE TRIGGER `tr_delete_materia` AFTER DELETE ON `t_materia` FOR EACH ROW BEGIN
    DECLARE usuario_php VARCHAR(100);
    SELECT usuario INTO usuario_php FROM usuario_log_actual WHERE id = 1;

    INSERT INTO historial_acciones (tabla, accion, id_afectado, usuario, descripcion)
    VALUES (
        't_materia',
        'DELETE',
        OLD.id_materia,
        usuario_php,
        CONCAT('Se eliminó la materia ', OLD.nombre)
    );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_insert_materia` AFTER INSERT ON `t_materia` FOR EACH ROW BEGIN
    DECLARE usuario_php VARCHAR(100);
    SELECT usuario INTO usuario_php FROM usuario_log_actual WHERE id = 1;

    INSERT INTO historial_acciones (tabla, accion, id_afectado, usuario, descripcion)
    VALUES (
        't_materia',
        'INSERT',
        NEW.id_materia,
        usuario_php,
        CONCAT('Se registró la materia ', NEW.nombre)
    );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_update_materia` AFTER UPDATE ON `t_materia` FOR EACH ROW BEGIN
    DECLARE usuario_php VARCHAR(100);
    SELECT usuario INTO usuario_php FROM usuario_log_actual WHERE id = 1;

    INSERT INTO historial_acciones (tabla, accion, id_afectado, usuario, descripcion)
    VALUES (
        't_materia',
        'UPDATE',
        OLD.id_materia,
        usuario_php,
        CONCAT('Se actualizó la materia ', OLD.nombre)
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_profesores`
--

CREATE TABLE `t_profesores` (
  `id_profesores` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `rfc` varchar(20) NOT NULL,
  `materia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_profesores`
--

INSERT INTO `t_profesores` (`id_profesores`, `nombre`, `apellido`, `rfc`, `materia`) VALUES
(1, 'adan', 'cardenas', '123123ADSL123', 'fisica'),
(7, 'fede', 'berrocal', '123e123e', 'principios');

--
-- Disparadores `t_profesores`
--
DELIMITER $$
CREATE TRIGGER `tr_delete_profesor` AFTER DELETE ON `t_profesores` FOR EACH ROW BEGIN
    INSERT INTO historial_acciones (tabla, accion, id_afectado, usuario, descripcion)
    VALUES (
        't_profesores',
        'DELETE',
        OLD.id_profesores,
        CURRENT_USER(),
        CONCAT('Se eliminó al profesor ', OLD.nombre, ' ', OLD.apellido)
    );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_insert_profesor` AFTER INSERT ON `t_profesores` FOR EACH ROW BEGIN
    INSERT INTO historial_acciones (tabla, accion, id_afectado, usuario, descripcion)
    VALUES (
        't_profesores',
        'INSERT',
        NEW.id_profesores,
        CURRENT_USER(),
        CONCAT('Se registró al profesor ', NEW.nombre, ' ', NEW.apellido)
    );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tr_update_profesor` AFTER UPDATE ON `t_profesores` FOR EACH ROW BEGIN
    INSERT INTO historial_acciones (tabla, accion, id_afectado, usuario, descripcion)
    VALUES (
        't_profesores',
        'UPDATE',
        OLD.id_profesores,
        CURRENT_USER(),
        CONCAT('Se actualizó al profesor ', OLD.nombre, ' ', OLD.apellido)
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuario`
--

CREATE TABLE `t_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `rol` varchar(50) NOT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'inactivo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `t_usuario`
--

INSERT INTO `t_usuario` (`id_usuario`, `nombre`, `apellido`, `correo`, `usuario`, `password`, `rol`, `estado`) VALUES
(20, 'ramiro', 'hernandez', 'arroba@gmail.com', 'ramiroA', '$2y$10$MilAwA.zPUj3hZWvG0eiBOXxjsP8SNKFiHTDTKMDY56Yt/hV0ELIK', 'admin', 'activo'),
(21, 'perro', 'fernandez', 'perro@gmail.com', 'perroF', '$2y$10$6nHbSCdHMIZRg94yXrLqo.xJik.vYSdQF4BTTfsvyUUHLd.wG3nFC', 'admin', 'inactivo'),
(22, 'cremas', 'lala', 'cremas@gmail.com', 'cremax', '$2y$10$bzM0UiLBQ64eYWPJ0zFVdOTHegb7auTNFVs5FwR5Oj4iRglkZQAO.', 'usuario', 'inactivo'),
(23, 'test', 'test', 'test@mail.com', 'test', '$2y$10$MqsuPE.9HPpvUnhGlxIZxOwxG09GFJpnZfyIPV/sOU3bi9lwk3J12', 'usuario', 'inactivo'),
(24, 'dgdhfgfj', 'tetet', 'test2@mail.com', 'test2', '$2y$10$iQpryD5IyumLxNxJlH58m.IyhW.HvVzhG2uWgmczL9TsUcFvqMyXi', 'usuario', 'inactivo'),
(25, 'israel', 'abad', 'tortugas2.0.8@gmail.com', 'abad2', '$2y$10$seRoB6I5S/T5sdocCltcZOjIwu3P8TnbdpxUY6wN2NZVrmHpB.9qi', 'usuario', 'inactivo');

--
-- Disparadores `t_usuario`
--
DELIMITER $$
CREATE TRIGGER `after_insert_usuario` AFTER INSERT ON `t_usuario` FOR EACH ROW BEGIN
  DECLARE usuario_php VARCHAR(100);

  SELECT usuario INTO usuario_php FROM usuario_log_actual WHERE id = 1;

  INSERT INTO historial_acciones (tabla, accion, id_afectado, usuario, descripcion)
  VALUES (
    't_usuario',
    'INSERT',
    NEW.id_usuario,
    usuario_php,
    CONCAT('Se registró al usuario ', NEW.usuario)
  );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_update_usuario` AFTER UPDATE ON `t_usuario` FOR EACH ROW BEGIN
  DECLARE usuario_php VARCHAR(100);

  SELECT usuario INTO usuario_php FROM usuario_log_actual WHERE id = 1;

  INSERT INTO historial_acciones (tabla, accion, id_afectado, usuario, descripcion)
  VALUES (
    't_usuario',
    'UPDATE',
    NEW.id_usuario,
    usuario_php,
    CONCAT('Se actualizó al usuario ', NEW.usuario)
  );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_log_actual`
--

CREATE TABLE `usuario_log_actual` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario_log_actual`
--

INSERT INTO `usuario_log_actual` (`id`, `usuario`) VALUES
(1, 'ramiroA');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historial_acciones`
--
ALTER TABLE `historial_acciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `t_alumnos`
--
ALTER TABLE `t_alumnos`
  ADD PRIMARY KEY (`id_alumnos`);

--
-- Indices de la tabla `t_historial`
--
ALTER TABLE `t_historial`
  ADD PRIMARY KEY (`id_historial`);

--
-- Indices de la tabla `t_inventario`
--
ALTER TABLE `t_inventario`
  ADD PRIMARY KEY (`id_inventario`);

--
-- Indices de la tabla `t_materia`
--
ALTER TABLE `t_materia`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `t_profesores`
--
ALTER TABLE `t_profesores`
  ADD PRIMARY KEY (`id_profesores`);

--
-- Indices de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usuario_log_actual`
--
ALTER TABLE `usuario_log_actual`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial_acciones`
--
ALTER TABLE `historial_acciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `t_alumnos`
--
ALTER TABLE `t_alumnos`
  MODIFY `id_alumnos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `t_historial`
--
ALTER TABLE `t_historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_inventario`
--
ALTER TABLE `t_inventario`
  MODIFY `id_inventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `t_materia`
--
ALTER TABLE `t_materia`
  MODIFY `id_materia` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_profesores`
--
ALTER TABLE `t_profesores`
  MODIFY `id_profesores` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
