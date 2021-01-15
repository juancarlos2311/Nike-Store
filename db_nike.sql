-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-01-2021 a las 01:12:22
-- Versión del servidor: 5.7.24
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_nike`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `cat_Nombre` varchar(20) NOT NULL,
  `cat_Descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `cat_Nombre`, `cat_Descripcion`) VALUES
(1, 'Sudaderas', 'Sudaderas '),
(2, 'Calzado', 'Calzado'),
(3, 'Camicetas', 'camicetas'),
(4, 'Mallas', 'Mallas'),
(5, 'Shorts', 'shorts');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `idDomicilio` int(11) NOT NULL,
  `dom_Direccion` text NOT NULL,
  `dom_CodigoPostal` int(5) NOT NULL,
  `dom_Pais` varchar(30) NOT NULL,
  `dom_Estado` varchar(20) NOT NULL,
  `don_Celular` int(8) NOT NULL,
  `idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `domicilio`
--

INSERT INTO `domicilio` (`idDomicilio`, `dom_Direccion`, `dom_CodigoPostal`, `dom_Pais`, `dom_Estado`, `don_Celular`, `idCliente`) VALUES
(1, 'Av.Valle ondo 985JASD', 27277, 'Mexico', 'Torreon', 92688, 1),
(2, 'asdas', 12345, 'España', 'Torres', 14798, 2),
(3, 'Av.Valle ondo 985B', 27278, 'Brasil', 'Torreon', 9876, 3),
(4, 'qweqweqwe', 27279, 'Mexico', 'Torreon', 9876, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `idImagen` int(11) NOT NULL,
  `img_UrlImg2` varchar(50) NOT NULL,
  `img_UrlImg3` varchar(50) NOT NULL,
  `img_UrlImg4` varchar(50) NOT NULL,
  `img_UrlImg5` varchar(50) NOT NULL,
  `img_UrlImg6` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`idImagen`, `img_UrlImg2`, `img_UrlImg3`, `img_UrlImg4`, `img_UrlImg5`, `img_UrlImg6`) VALUES
(1, 'images/producto-1/producto-nike-frontal.jpg', 'images/producto-1/producto-nike-frontal2.jpg', 'images/producto-1/producto-nike-espalda.jpg', 'images/producto-1/producto-nike-bolsas.jpg', 'images/producto-1/producto-nike-mangas.jpg'),
(2, 'images/producto-2/producto-nike-planta.jpg', 'images/producto-2/producto-nike-lateral.jpg', 'images/producto-2/producto-nike-aerea.jpg', 'images/producto-2/producto-nike-frente.jpg', 'images/producto-2/producto-nike-atras.jpg'),
(3, 'images/producto-3/producto-nike-planta.jpg', 'images/producto-3/producto-nike-lateral.jpg', 'images/producto-3/producto-nike-aerea.jpg', 'images/producto-3/producto-nike-frontal.jpg', 'images/producto-3/producto-nike-atras.jpg'),
(4, 'images/producto-4/producto-nike-planta.jpg', 'images/producto-4/producto-nike-lateral.jpg', 'images/producto-4/producto-nike-aerea.jpg', 'images/producto-4/producto-nike-frontal.jpg', 'images/producto-4/producto-nike-atras.jpg'),
(5, 'images/producto-5/producto-nike-planta.jpg', 'images/producto-5/producto-nike-lateral.jpg', 'images/producto-5/producto-nike-aerea.jpg', 'images/producto-5/producto-nike-frente.jpg', 'images/producto-5/producto-nike-atras.jpg'),
(6, 'images/producto-6/producto-nike-planta.jpg', 'images/producto-6/producto-nike-lateral.jpg', 'images/producto-6/producto-nike-aerea.jpg', 'images/producto-6/producto-nike-frente.jpg', 'images/producto-6/producto-nike-atras.jpg'),
(7, 'images/producto-7/producto-nike-planta.jpg', 'images/producto-7/producto-nike-lateral.jpg', 'images/producto-7/producto-nike-aerea.jpg', 'images/producto-7/producto-nike-frente.jpg', 'images/producto-7/producto-nike-atras.jpg'),
(8, 'images/producto-8/producto-nike-planta.jpg', 'images/producto-8/producto-nike-lateral.jpg', 'images/producto-8/producto-nike-aerea.jpg', 'images/producto-8/producto-nike-frente.jpg', 'images/producto-8/producto-nike-atras.jpg'),
(9, 'images/producto-9/producto-nike-planta.jpg', 'images/producto-9/producto-nike-lateral.jpg', 'images/producto-9/producto-nike-aerea.jpg', 'images/producto-9/producto-nike-frente.jpg', 'images/producto-9/producto-nike-atras.jpg'),
(10, 'images/producto-10/producto-nike-planta.jpg', 'images/producto-10/producto-nike-lateral.jpg', 'images/producto-10/producto-nike-aerea.jpg', 'images/producto-10/producto-nike-frente.jpg', 'images/producto-10/producto-nike-atras.jpg'),
(11, 'images/producto-11/producto-nike-planta.jpg', 'images/producto-11/producto-nike-lateral.jpg', 'images/producto-11/producto-nike-aerea.jpg', 'images/producto-11/producto-nike-frente.jpg', 'images/producto-11/producto-nike-atras.jpg'),
(12, 'images/producto-12/producto-nike-planta.jpg', 'images/producto-12/producto-nike-lateral.jpg', 'images/producto-12/producto-nike-aerea.jpg', 'images/producto-12/producto-nike-frente.jpg', 'images/producto-12/producto-nike-atras.jpg'),
(13, 'images/producto-13/producto-nike-aerea.jpg', '  images/producto-13/producto-nike-atras.jpg', '  images/producto-13/producto-nike-frente.jpg', '  images/producto-13/producto-nike-lateral.jpg', '  images/producto-13/producto-nike-planta.jpg'),
(25, ' images/producto-14/producto-nike-aerea.jpg', ' images/producto-14/producto-nike-atras.jpg', ' images/producto-14/producto-nike-frente.jpg', ' images/producto-14/producto-nike-lateral.jpg', ' images/producto-14/producto-nike-planta.jpg'),
(26, ' images/producto-15/producto-nike-aerea.jpg', ' images/producto-15/producto-nike-atras.jpg', ' images/producto-15/producto-nike-frente.jpg', ' images/producto-15/producto-nike-lateral.jpg', ' images/producto-15/producto-nike-planta.jpg'),
(27, ' images/producto-15/producto-nike-aerea.jpg', ' images/producto-15/producto-nike-atras.jpg', ' images/producto-15/producto-nike-frente.jpg', ' images/producto-15/producto-nike-lateral.jpg', ' images/producto-15/producto-nike-planta.jpg'),
(28, ' images/producto-15/producto-nike-aerea.jpg', ' images/producto-15/producto-nike-atras.jpg', ' images/producto-15/producto-nike-frente.jpg', ' images/producto-15/producto-nike-lateral.jpg', ' images/producto-15/producto-nike-planta.jpg'),
(29, ' images/producto-19/producto-nike-aerea.jpg', ' images/producto-19/producto-nike-atras.jpg', ' images/producto-19/producto-nike-frente.jpg', ' images/producto-19/producto-nike-lateral.jpg', ' images/producto-19/producto-nike-planta.jpg'),
(30, ' images/producto-20/producto-nike-aerea.jpg', '  images/producto-20/producto-nike-atras.jpg', ' images/producto-20/producto-nike-frente.jpg', ' images/producto-20/producto-nike-lateral.jpg', ' images/producto-20/producto-nike-planta.jpg'),
(31, ' images/producto-20/producto-nike-aerea.jpg', ' images/producto-20/producto-nike-atras.jpg', ' images/producto-20/producto-nike-frente.jpg', ' images/producto-20/producto-nike-lateral.jpg', ' images/producto-20/producto-nike-planta.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `idPago` int(11) NOT NULL,
  `pag_NombreCompleto` varchar(50) NOT NULL,
  `pag_NumeroTarjeta` varchar(18) NOT NULL,
  `pag_Fecha` date NOT NULL,
  `idTipoPago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`idPago`, `pag_NombreCompleto`, `pag_NumeroTarjeta`, `pag_Fecha`, `idTipoPago`) VALUES
(1, 'Jorge Moreno Castillo', '1111111111', '2021-01-01', 1),
(2, 'Gerardo M', '987654321', '2021-02-02', 3),
(3, 'koke', '989898989', '2020-01-01', 2),
(16, 'Gerardo M', '8717364111', '2020-01-01', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedidos` int(11) NOT NULL,
  `ped_Fecha` datetime NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idPago` int(11) NOT NULL,
  `ped_cantidad_producto` int(11) NOT NULL,
  `ped_Talla_producto` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedidos`, `ped_Fecha`, `idCliente`, `idProducto`, `idPago`, `ped_cantidad_producto`, `ped_Talla_producto`) VALUES
(1, '2020-11-29 01:47:32', 1, 1, 2, 0, ''),
(3, '2020-12-01 01:19:20', 1, 2, 1, 0, ''),
(4, '2020-12-01 01:22:21', 2, 7, 3, 0, ''),
(5, '2020-12-01 01:22:59', 2, 6, 3, 0, ''),
(6, '2020-12-01 01:41:28', 2, 5, 3, 0, ''),
(7, '2020-12-03 02:27:18', 1, 2, 1, 0, ''),
(23, '2020-12-04 18:25:01', 1, 10, 1, 1, 'XXL'),
(24, '2020-12-04 19:44:29', 1, 10, 1, 1, 'S'),
(25, '2020-12-05 18:27:27', 1, 1, 1, 1, 'XXL'),
(26, '2020-12-06 23:57:08', 3, 1, 2, 1, 'S'),
(27, '2020-12-07 02:42:38', 3, 2, 2, 1, '28'),
(28, '2020-12-07 19:40:40', 1, 3, 1, 2, '26'),
(29, '2020-12-08 02:45:27', 3, 1, 2, 3, 'XXL'),
(30, '2020-12-08 02:45:27', 3, 2, 2, 1, '27'),
(31, '2020-12-08 03:08:31', 3, 2, 2, 1, '24'),
(32, '2020-12-08 03:13:22', 3, 2, 2, 1, '24'),
(33, '2020-12-08 03:14:47', 3, 1, 2, 1, 'XXL'),
(34, '2021-01-04 01:07:19', 4, 3, 2, 1, '24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `pro_Nombre` varchar(50) NOT NULL,
  `pro_Precio` double NOT NULL,
  `pro_DescripcionCorta` varchar(50) NOT NULL,
  `pro_DescripcionLarga` text NOT NULL,
  `pro_RutaImagen` text NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `idImagen` int(11) NOT NULL,
  `idTalla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `pro_Nombre`, `pro_Precio`, `pro_DescripcionCorta`, `pro_DescripcionLarga`, `pro_RutaImagen`, `idCategoria`, `idImagen`, `idTalla`) VALUES
(1, 'Nike Sports wear', 1401, 'Sudadera para hombre', 'La sudadera de cuello redondo Nike Sportswear Tech Fleece actualiza un estilo clásico con una ligera tela con espaciador de doble cara para mayor calidez sin peso extra. La cinta transparente circundante resalta el exclusivo detalle de bolsillo Tech Fleece en la manga.', 'images/producto-1/producto-nike-1.jpg', 1, 1, 1),
(2, 'Nike Blazer Mid \'77 Infinite', 2299, 'Calzado para mujer', 'El Nike Blazer Mid \'77 Infinite refuerza el ícono de básquetbol de la vieja escuela que se convirtió en el favorito de las calles. Los detalles de goma duraderos en la punta, el talón y el costado te permiten llevarlo a donde quieras, día tras día, y los ribetes y el logotipo Swoosh distorsionado le dan un toque moderno.\r\n\r\nColor que se muestra: Blanco/Verde aurora/Carmesí brillante/Fortunella\r\nEstilo: DA7233-100', 'images/producto-2/producto-nike-2.jpg', 2, 2, 2),
(3, 'Jordan Zoom \'92', 3299, 'Calzado para mujer ', 'El Jordan Zoom \'92 rinde homenaje al calzado de básquetbol de los 90 y está diseñado para ofrecer comodidad sin renunciar al espíritu irreverente de los diseños de esa época. La manga de ajuste elástico y la amortiguación debajo del pie ofrecen un ajuste cómodo. Los detalles inspirados en los años 90 aportan al calzado su estilo retro.\r\n\r\nColor que se muestra: Blanco/Negro/Gris humo/Flor de cactus\r\nEstilo: CK9184-105', 'images/producto-3/producto-nike-3.jpg', 2, 3, 2),
(4, 'Jordan Winter Utility', 2199, 'Sudadera para mujer  ', 'La sudadera con capucha Jordan Fleece ofrece una combinación perfecta de comodidad relajada y estilo que combina con cualquier cosa. Está confeccionada con tela cepillada deslavada para darle un look desgastado y tiene un peso agradable.\r\n\r\nColor que se muestra: Azul verdoso oscuro atómico\r\nEstilo: CV7737-300', 'images/producto-4/producto-nike-4.jpg', 1, 4, 1),
(5, 'Nike Air Force 1 Pixel', 2199, 'Calzado para mujer', 'Conquista la duda y haz una declaración con el Nike Air Force 1 Pixel, un estilo reimaginado fuera de la cancha hecho por y para las mujeres. La elegante parte superior de cuero cuenta con líneas limpias y texturización sutil para brindar un look fresco y fácil de combinar con estilo. La suela y entresuela distorsionadas tienen detalles grandes y pixelados para brindar un toque moderno, mientras que el nuevo logotipo y el diseño de Swoosh invertido son un acto de audacia inquebrantable. No solo estás en el partido. Lo estás liderando.\r\n\r\nColor que se muestra: Beige partícula/Negro/Blanco/Beige partícula\r\nEstilo: CK6649-200', 'images/producto-5/producto-nike-5.jpg', 2, 5, 2),
(6, 'Nike Air Max 98', 2379, 'Calzado para hombre', 'El Nike Air Max 98, que siempre va un paso adelante, cuenta con las líneas de diseño OG que se inspiraron en las paredes del Gran Cañón, además de destellos de color en la parte superior. El look fluido y texturizado y la amortiguación Nike Air larga te destacan del resto.\r\n\r\nColor que se muestra: Blanco/Negro/Peltre metalizado/Blanco\r\nEstilo: CJ0592-100', 'images/producto-6/producto-nike-6.jpg', 2, 6, 2),
(7, 'Nike  Ribbon Sports', 764, 'Camiseta de running para hombre', 'La prenda para la parte superior Nike Rise 365 ofrece un rendimiento versátil para el running diario. Diseñada para una movilidad ligera, la camiseta cuenta con una tela suave con mayor ventilación donde más la necesitas. Este producto está confeccionado con materiales 100 % sustentables, con una mezcla de telas de poliéster reciclado y algodón orgánico. La mezcla es al menos 10 % de tela reciclada o al menos 10 % de tela de algodón orgánico.\r\n\r\nColor que se muestra: Blanco/Azul vacío\r\nEstilo: CU3419-100', 'images/producto-7/producto-nike-7.jpg', 3, 7, 1),
(8, 'Nike Air Max 720 Print', 2519, 'Calzado para mujer', 'El Nike Air Max 720 es más grande que nunca con la unidad Air más alta de Nike hasta el momento, por lo que ofrece más aire debajo del pie para brindar un nivel de comodidad inimaginable durante todo el día. Los vibrantes colores le dan un estilo veraniego. ¿Será un exceso de Air Max? Esperamos que sí.\r\n\r\nColor que se muestra: Avalancha rosa/Rosa atómico/Verde fantasma/Avalancha rosa\r\nEstilo: CW2537-600', 'images/producto-8/producto-nike-8.jpg', 2, 8, 2),
(9, 'Nike Icon Clash', 787, 'Sujetador deportivo sin costuras para mujer', 'El sujetador deportivo Nike Icon Clash tiene un ajuste increíblemente suave y elástico que absorbe el sudor para mantenerte seca y cómoda.\r\n\r\nColor que se muestra: Rosa pasión/Zafiro/Polvo del desierto/Polvo del desierto\r\nEstilo: CJ0557-601', 'images/producto-9/producto-nike-9.jpg', 4, 9, 1),
(11, 'Nike Court Vision Low Premium', 1124, 'Calzado para hombre', 'Inspirado por las tendencias de mediados de la década del 80, el Nike Court Vision Low Premium cuenta con un diseño que se mezcla con el estilo del básquetbol. Los detalles premium resaltan la onda retro.\r\n\r\nColor que se muestra: Blanco/Negro\r\nEstilo: CD5464-101', 'images/producto-11/producto-nike-11.jpg', 2, 11, 2),
(12, 'Nike Sportswear City Ready', 1759, 'Chamarra corta para mujer', 'Refresca las calles con estilo y comodidad con la chamarra Nike Sportswear City Ready. La suave tela de tejido Woven tiene un ligero brillo que te permite resplandecer, mientras que el diseño corto se combina con una capucha para brindar mayor versatilidad.\r\n\r\nColor que se muestra: Negro/Negro/Negro\r\nEstilo: CJ4008-010', 'images/producto-12/producto-nike-12.jpg', 1, 12, 1),
(13, ' Nike Air Max 270 XX', 3599, ' Calzado para mujer', 'Con su abordaje del Air instintivamente femenino, el Nike Air Max 270 XX te aporta un look totalmente nuevo que atraviesa todos tus mundos. La pila elevada de espuma acolchada en el talón se combina con una horma deportiva altamente angulada para crear un look audaz increíblemente cómodo.', ' images/producto-13/producto-nike-13.jpg', 2, 13, 2),
(17, ' Nike Sportswear JDI', 650, ' Playera para hombre', 'La playera Nike Sportswear JDI se ve y se siente como un clásico con la suave tela de tejido de punto de algodón y un sutil aspecto de color lavado.', ' images/producto-14/producto-nike-14.jpg', 3, 25, 1),
(18, ' Nike Flex Stride A.I.R. Chaz Bundick', 999, ' Shorts de running para hombre', 'Los shorts Nike Flex Stride cuentan con tejido Woven y transpirabilidad mejorada en la parte posterior, en las zonas de mayor sudoración. Utilizan gráficos diseñados por el músico Chaz Bundick.', ' images/producto-15/producto-nike-15.jpg', 5, 28, 1),
(21, '  Nike Max 270 Air  XX', 9999, ' Sudadera de hombre', 'adsdadasdasdasd', ' images/producto-20/producto-nike-20.jpg', 1, 31, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `idSecion` int(11) NOT NULL,
  `sec_Fecha` date NOT NULL,
  `sec_Hora` time NOT NULL,
  `sec_SO` varchar(50) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE `tallas` (
  `idTalla` int(11) NOT NULL,
  `tal_talla1` varchar(5) NOT NULL,
  `tal_talla2` varchar(5) NOT NULL,
  `tal_talla3` varchar(5) NOT NULL,
  `tal_talla4` varchar(5) NOT NULL,
  `tal_talla5` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tallas`
--

INSERT INTO `tallas` (`idTalla`, `tal_talla1`, `tal_talla2`, `tal_talla3`, `tal_talla4`, `tal_talla5`) VALUES
(1, 'XXL', 'XL', 'L', 'M', 'S'),
(2, '24', '25', '26', '27', '28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopago`
--

CREATE TABLE `tipopago` (
  `idTipoPago` int(11) NOT NULL,
  `tip_Nombre` varchar(20) NOT NULL,
  `tip_Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipopago`
--

INSERT INTO `tipopago` (`idTipoPago`, `tip_Nombre`, `tip_Descripcion`) VALUES
(1, 'Debito', 'Tarjetas de tipo Debito'),
(2, 'Credito', 'Tarjetas de tipo Credito'),
(3, 'PayPal', 'Pagos con PayPal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `use_Nombre` varchar(25) NOT NULL,
  `use_Apellidos` varchar(50) NOT NULL,
  `use_Celular` varchar(10) NOT NULL,
  `use_Correo` varchar(50) NOT NULL,
  `use_Contraseña` varchar(25) NOT NULL,
  `idPago` int(11) NOT NULL,
  `idTipoUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `use_Nombre`, `use_Apellidos`, `use_Celular`, `use_Correo`, `use_Contraseña`, `idPago`, `idTipoUsuario`) VALUES
(1, 'adm', 'adm', '213123123', 'admin_123@gmail.com', '12345679qW', 1, 1),
(2, 'jorge', 'Castillo', '8717364110', 'jkokecas_123@gmail.com', '12345679qW', 3, 1),
(3, 'Gerardo', 'Casstilo', '1234567890', 'Ger.1_123@gmail.com', '12345679qW', 2, 0),
(4, 'R', 'A', '1232445', 'RA_123@gmail.com', '12345679qW', 2, 0),
(5, 'qwer', 'asf', '21312312', 'qweeq_123@gmail.com', '12345679qW', 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`idDomicilio`),
  ADD KEY `fkCliente` (`idCliente`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`idImagen`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`idPago`) USING BTREE,
  ADD KEY `fkTipo` (`idTipoPago`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedidos`),
  ADD KEY `fkCliente` (`idCliente`),
  ADD KEY `fkProducto` (`idProducto`),
  ADD KEY `fkPago` (`idPago`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `fkCategoria` (`idCategoria`),
  ADD KEY `fkImagen` (`idImagen`),
  ADD KEY `fkTalla` (`idTalla`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`idSecion`),
  ADD KEY `kfUsuario` (`idUsuario`);

--
-- Indices de la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD PRIMARY KEY (`idTalla`);

--
-- Indices de la tabla `tipopago`
--
ALTER TABLE `tipopago`
  ADD PRIMARY KEY (`idTipoPago`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fkPago` (`idPago`),
  ADD KEY `fkIdTipoUs` (`idTipoUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `idDomicilio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `idImagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `idPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `idSecion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `idTalla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipopago`
--
ALTER TABLE `tipopago`
  MODIFY `idTipoPago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD CONSTRAINT `domicilio_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`idTipoPago`) REFERENCES `tipopago` (`idTipoPago`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD CONSTRAINT `secciones_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
