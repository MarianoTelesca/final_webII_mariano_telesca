-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-02-2025 a las 20:35:47
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
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(15) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `tema` varchar(20) NOT NULL,
  `consulta` varchar(300) NOT NULL,
  `resuelta` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id`, `nombre`, `apellido`, `mail`, `tema`, `consulta`, `resuelta`) VALUES
(1, 'Mariano', 'Telesca', 'Mariano@gmail.com', 'generales', 'La consulta', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(3) NOT NULL,
  `titulo` varchar(20) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `boton` varchar(20) NOT NULL,
  `ruta_imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `titulo`, `descripcion`, `boton`, `ruta_imagen`) VALUES
(1, 'Cursos', 'Nikon School introduce al usuario en el manejo de la fotografía réflex digital, sea cual sea su nivel de experiencia. En los cursos ofrecidos, los entusiastas de la fotografía recibirán un práctico en', 'Consultar', 'imagenes/curso1.png'),
(2, 'Excursiones', 'Nuestro objetivo es complementar el esquema tradicional de clases en aula, con salidas fotográficas donde aplicar los conocimientos adquiridos. Los phototrips son una experiencia mucho más completa qu', 'Ver del tema', 'imagenes/curso2.png'),
(3, 'Talleres', 'Jornadas para la profundización de conocimientos a través de la práctica. Desde Retoque e Iluminación hasta ejercicios prácticos. Pensado para todos los niveles y abarcando aquellos aspectos importantes que rodean el mundo de la fotografía.', 'Consultar', 'imagenes/curso3.png'),
(4, 'Talleres infantiles', 'Una nueva forma de intentar encontrar el futuro hobby para los niños. Un taller para niños sobre fotografía, desde un enfoque divertido y motivante.', 'Vamos!', 'imagenes/curso4.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `precio` int(11) NOT NULL,
  `ruta_imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `titulo`, `categoria`, `descripcion`, `precio`, `ruta_imagen`) VALUES
(1, 'ZZ 6 II', 'Cámara Mirrorless', 'Formato FX. 24.5 Megapíxeles. 14 CPS Disparos Continuos. Video 4k Ultra HD.', 1698000, 'imagenes/producto1'),
(2, 'ZZ 8', 'Cámara Mirrorless', 'Cámara híbrida única. 45.7 Megapíxeles. Pantalla LCD táctil de 3.2\'\'. Video 8K Ultra HD. ISO 64-25600.', 4500000, 'imagenes/producto2'),
(3, 'ZZ 7', 'Cámara Mirrorless', 'Cámara con formato FX. 45.7 Megapíxeles. Gran definición en los detalles. Video 4K Ultra HD.', 2350000, 'imagenes/producto3'),
(4, '1 SB-N7', 'Flash', 'El flash fotográfico o destellador es un dispositivo que actúa como fuente de luz artificial intensa y dura, abarca poco espacio y es transportable.', 270000, 'imagenes/producto4'),
(5, 'Aculon T01', 'Binoculares', 'Los binoculares, son un instrumento óptico usado para ampliar la imagen de los objetos distantes resultando más cómodo apreciar la distancia entre objetos distantes y seguirlos en movimiento.', 58000, 'imagenes/producto5'),
(6, 'D780', 'Cámara Réflex', 'Cámara Réflex Digitales. \r\nFormato FX. \r\nPantalla LCD.', 2785000, 'imagenes/producto6'),
(27, 'ZZ 30', 'Cámara Mirrorles', 'Formato DX, 20,9 megapíxeles, pantalla LCD táctil 3,0 y video 4K UltraHD', 769000, 'imagenes/producto27'),
(28, 'ZZ 50', 'Cámara Mirrorles', 'Pequeña y audaz. Formato DX, 20,9 megapíxeles. Disparo continuo y de 100 a 51200 ISO. Video 4K UltraHD', 865000, 'imagenes/producto28'),
(29, 'P1000', 'Cámara Compacta', '16 Megapíxeles. Lente de cristal 125X con zoom. Pantalla LCD 3.2\" y 4K UltraHD.', 1273000, 'imagenes/producto29'),
(30, 'P1100', 'Cámara Compacta', '16 Megapíxeles. Lente de cristal 200X con zoom. Pantalla LCD 3.2\" y 4K UltraHD.', 1465000, 'imagenes/producto30'),
(31, 'P950', 'Cámara Compacta', '16 Megapíxeles. Lente de cristal 83X con zoom. Pantalla LCD 3.2\" y 4K UltraHD.', 968000, 'imagenes/producto31'),
(32, 'Aculon 211 7x35', 'Binoculares', 'Enfoque central. 7 veces de aumento y 35mm de diámetro', 94000, 'imagenes/producto32'),
(33, 'Aculon 211 10x42', 'Binoculares', 'Enfoque central. 10 veces de aumento y 42mm de diámetro', 103000, 'imagenes/producto33'),
(34, 'Telescopio de campo 13-30x50 mm ED', 'Telescopios', 'El cristal ED de Nikon ofrece la máxima nitidez de borde a borde, resolución de detalles e imágenes claras y en colores reales sin destellos.', 986000, 'imagenes/producto34'),
(35, 'ProStaff 4x32 Matte Nikoplex', 'Telescopios', 'Sistema óptico multicapa: las lentes multicapa aumentan la transmisión de la luz hasta en un 90%, sin precedentes en ámbitos similares.', 108000, 'imagenes/producto35');

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
(1, 1, 'admin', '$2y$10$noYUrgwCPsMFq95RRuGf7.GC.U/At0BCNCKKnEjNfK1HLkNdKPQaa'),
(2, 0, 'user', '$2y$10$BHvBgkOyqMk4d4YNsPu3SOiUEe63px75XvDn5aqNVw.HizMeq5RU.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
