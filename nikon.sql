-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-01-2025 a las 00:31:47
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
-- Base de datos: `nikon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(3) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `boton` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `titulo`, `descripcion`, `boton`) VALUES
(1, 'Cursos', 'Nikon School introduce al usuario en el manejo de la fotografía réflex digital, sea cual sea su nivel de experiencia. En los cursos ofrecidos, los entusiastas de la fotografía recibirán un práctico en', 'Consultar'),
(2, 'Excursiones', 'Nuestro objetivo es complementar el esquema tradicional de clases en aula, con salidas fotográficas donde aplicar los conocimientos adquiridos. Los phototrips son una experiencia mucho más completa qu', 'Ver del tema'),
(3, 'Talleres', 'Jornadas para la profundización de conocimientos a través de la práctica. Desde Retoque e Iluminación hasta ejercicios prácticos. Pensado para todos los niveles y abarcando aquellos aspectos importantes que rodean el mundo de la fotografía.', 'Consultar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `titulo`, `descripcion`, `precio`) VALUES
(1, 'Cámaras Mirrorless', 'Las cámaras Mirrorless (también conocidas como cámaras compactas de sistema) no contienen un espejo ni un visor óptico, por lo que suelen ser más pequeñas que las réflex digitales.', 0),
(2, 'Cámaras Reflex', 'Es una cámara fotográfica digital también conocida como DSLR (Digital Single Lens Reflex), que permite al fotógrafo visualizar de manera directa la imagen que desea capturar a través de un visor óptico sin cambiar el ángulo del objeto.', 0),
(3, 'Lentes Mirrorless', 'Estas lentes son el complemento ideal para su cámara Mirrorless Nikon.', 0),
(4, 'Flashes', 'El flash fotográfico o destellador es un dispositivo que actúa como fuente de luz artificial intensa y dura, que generalmente abarca poco espacio y es transportable.', 0),
(5, 'Binoculares', 'Los prismáticos, o binoculares, son un instrumento óptico usado para ampliar la imagen de los objetos distantes, al igual que el monocular y el telescopio, resultando más cómodo apreciar la distancia entre objetos distantes y seguirlos en movimiento.', 0),
(6, 'Telescopios', 'Un telescopio es una herramienta que los astrónomos usan para ver objetos lejanos. La mayor de los telescopios, al igual que todos los telescopios grandes, funcionan utilizando espejos curvos para captar y enfocar la luz del cielo nocturno.', 0)

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `tipo_admin` tinyint(1) NOT NULL,
  `user` varchar(15) NOT NULL,
  `pass` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `tipo_admin`, `user`, `pass`) VALUES
(1, 1, 'admin', '1234'),
(2, 0, 'user', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
