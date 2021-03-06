-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-04-2016 a las 19:24:37
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `worldofmusic`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canciones`
--

CREATE TABLE IF NOT EXISTS `canciones` (
  `idCancion` int(9) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `duracion` int(9) NOT NULL,
  `idDisco` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=216 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `canciones`
--

INSERT INTO `canciones` (`idCancion`, `titulo`, `duracion`, `idDisco`) VALUES
(1, 'All Things Go', 5, 1),
(2, 'I Lied', 5, 1),
(3, 'The Crying Game', 4, 1),
(4, 'Get On Your Knees', 3, 1),
(5, 'Feeling Myself', 4, 1),
(6, 'Only', 5, 1),
(7, 'Want Some More', 4, 1),
(8, 'Four Door Aventador', 3, 1),
(9, 'Favorite', 4, 1),
(10, 'Buy A Heart', 4, 1),
(11, 'Trini Dem Girls', 3, 1),
(12, 'Anaconda', 4, 1),
(13, 'The Night Is Still Young', 4, 1),
(14, 'Pills N Potions', 4, 1),
(15, 'Bed Of Lies', 4, 1),
(16, 'Grand Piano', 4, 1),
(17, 'Holy Grail', 6, 2),
(18, 'Picasso Baby', 4, 2),
(19, 'Tom Ford', 3, 2),
(20, 'F*ckwithmeyouknowigotit', 4, 2),
(21, 'Oceans', 4, 2),
(22, 'F.U.T.W.', 4, 2),
(23, 'Somewhereinamerica', 2, 2),
(24, 'Crown', 5, 2),
(25, 'Heaven', 4, 2),
(26, 'Versus', 1, 2),
(27, 'Part II (On The Run)', 6, 2),
(28, 'Beach Is Better', 1, 2),
(29, 'BBC', 3, 2),
(30, 'Jay Z Blue', 4, 2),
(31, 'La Familia', 4, 2),
(32, 'Nickels And Dimes', 5, 2),
(33, 'Hijo del Levante', 1, 3),
(34, 'He Vuelto', 5, 3),
(35, 'Sr. Zapatones', 5, 3),
(36, 'Amada Mía', 5, 3),
(37, 'Adiós Amor', 4, 3),
(38, 'Toreando al Destino', 6, 3),
(39, 'Buenas Noches Amor', 4, 3),
(40, 'De Lobo a Cordero', 4, 3),
(41, 'Cuando el Río Suena', 4, 3),
(42, 'Vendimias Moras', 4, 3),
(43, 'Donde se Esconde el Miedo', 4, 3),
(44, 'Un Repasito', 4, 3),
(45, 'Santa María', 4, 3),
(46, 'Cántame Amor', 4, 3),
(47, 'Memorias del Alzheimer', 4, 3),
(48, 'Young Girls', 4, 4),
(49, 'Locked Out Of Heaven', 4, 4),
(50, 'Gorilla', 4, 4),
(51, 'Treasure', 3, 4),
(52, 'Moonshine', 4, 4),
(53, 'When I Was Your Man', 4, 4),
(54, 'Natalie', 4, 4),
(55, 'Show Me', 3, 4),
(56, 'Money Make Her Smile', 3, 4),
(57, 'If I Knew', 2, 4),
(58, 'Green Valley', 2, 5),
(59, 'Bounce', 4, 5),
(60, 'Feel So Close', 3, 5),
(61, 'We Found Love', 4, 5),
(62, 'We''ll Be Coming Back', 4, 5),
(63, 'Mansion', 2, 5),
(64, 'Iron', 4, 5),
(65, 'I Need Your Love', 4, 5),
(66, 'Drinking From the Bottle', 4, 5),
(67, 'Sweet Nothing', 4, 5),
(68, 'School', 2, 5),
(69, 'Here 2 China', 3, 5),
(70, 'Let''s Go', 4, 5),
(71, 'Awooga', 4, 5),
(72, 'Thinking About You', 4, 5),
(73, 'We In This Bitch', 4, 6),
(74, 'Work', 4, 6),
(75, 'Change Your Life', 4, 6),
(76, 'Beg For It', 3, 6),
(77, 'Black Widow', 3, 6),
(78, 'Trouble', 3, 6),
(79, 'Don''t Need Y''all', 4, 6),
(80, 'Rolex', 3, 6),
(81, 'Iggy SZN', 3, 6),
(82, 'Fancy', 3, 6),
(83, 'Heavy Crown', 4, 6),
(84, 'Bounce', 3, 6),
(85, 'Intro', 1, 7),
(86, 'Problem', 3, 7),
(87, 'One Last Time', 3, 7),
(88, 'Why Try', 4, 7),
(89, 'Break Free', 4, 7),
(90, 'Best Mistake', 4, 7),
(91, 'Be My Baby', 4, 7),
(92, 'Break Your Heart Right Back', 4, 7),
(93, 'Love Me Harder', 4, 7),
(94, 'Just A Little Bit Of Your Heart', 4, 7),
(95, 'Hands On Me', 3, 7),
(96, 'My Everything', 3, 7),
(97, 'Bang Bang', 3, 7),
(98, 'Only 1', 3, 7),
(99, 'You Don''t Know Me', 4, 7),
(100, 'One', 4, 8),
(101, 'I''m A Mess', 4, 8),
(102, 'Sing', 4, 8),
(103, 'Don''t', 4, 8),
(104, 'Nina', 4, 8),
(105, 'Photograph', 4, 8),
(106, 'Bloodstream', 5, 8),
(107, 'Tenerife Sea', 4, 8),
(108, 'Runaway', 3, 8),
(109, 'The Man', 4, 8),
(110, 'Thinking Out Loud', 5, 8),
(111, 'Afire Love', 5, 8),
(112, 'Take It Back', 3, 8),
(113, 'Shirtsleeves', 3, 8),
(114, 'Even My Dad Does Sometimes', 4, 8),
(115, 'I See Fire', 5, 8),
(116, 'Maps', 3, 9),
(117, 'Animals', 4, 9),
(118, 'It Was Always You', 4, 9),
(119, 'Unkiss Me', 4, 9),
(120, 'Sugar ', 4, 9),
(121, 'Leaving California', 3, 9),
(122, 'In Your Pocket', 4, 9),
(123, 'New Love', 3, 9),
(124, 'Coming Back For You', 4, 9),
(125, 'Feelings', 3, 9),
(126, 'My Heart Is Open', 4, 9),
(127, 'The Best Part', 1, 10),
(128, 'All About That Bass', 3, 10),
(129, 'Dear Future Husband', 3, 10),
(130, 'Close Your Eyes', 4, 10),
(131, '3am', 3, 10),
(132, 'Like I''m Gonna Lose You', 4, 10),
(133, 'Bang Dem Sticks', 3, 10),
(134, 'Walkashame', 3, 10),
(135, 'Title', 3, 10),
(136, 'What If I', 3, 10),
(137, 'Lips Are Movin', 3, 10),
(138, 'No Good For You', 4, 10),
(139, 'Mr.Almost', 3, 10),
(140, 'My Selfish Heart', 4, 10),
(141, 'Credit', 3, 10),
(142, 'Irresistible', 3, 11),
(143, 'American Beauty/American Psycho', 3, 11),
(144, 'Centuries', 4, 11),
(145, 'The Kids Aren''t Alright', 4, 11),
(146, 'Uma Thurman', 3, 11),
(147, 'Jet Pack Blues', 3, 11),
(148, 'Novocaine', 4, 11),
(149, 'Fourth Of July', 4, 11),
(150, 'Favorite Record', 3, 11),
(151, 'Immortals', 3, 11),
(152, 'Twin Skeleton''s (Hotel In NYC)', 4, 11),
(153, 'Uptown''s First Finale', 2, 12),
(154, 'Summer Breaking', 3, 12),
(155, 'Feel Right', 4, 12),
(156, 'Uptown Funk', 4, 12),
(157, 'I Can''t Lose ', 3, 12),
(158, 'Daffodils', 5, 12),
(159, 'Crack In the Pearl', 2, 12),
(160, 'In Case Of Fire', 5, 12),
(161, 'Leaving Los Feliz', 4, 12),
(162, 'Heavy and Rolling', 4, 12),
(163, 'Crack In the Pearl, Pt. II', 2, 12),
(164, 'Always In My Head', 4, 13),
(165, 'Magic', 5, 13),
(166, 'Ink', 4, 13),
(167, 'True Love', 4, 13),
(168, 'Midnight', 5, 13),
(169, 'Another''s Arms', 4, 13),
(170, 'Oceans', 5, 13),
(171, 'A Sky Full of Stars', 4, 13),
(172, 'O', 5, 13),
(173, 'Chandelier', 4, 14),
(174, 'Big Girls Cry', 3, 14),
(175, 'Burn the Pages', 3, 14),
(176, 'Eye of the Needle', 4, 14),
(177, 'Hostage', 3, 14),
(178, 'Straight for the Knife', 3, 14),
(179, 'Fair Game', 4, 14),
(180, 'Elastic Heart', 4, 14),
(181, 'Free the Animal', 4, 14),
(182, 'Fire Meet Gasoline', 4, 14),
(183, 'Cellophane', 4, 14),
(184, 'Dressed In Black', 7, 14),
(185, 'Dangerous', 3, 15),
(186, 'What I Did For Love', 3, 15),
(187, 'No Money No Love', 4, 15),
(188, 'Lovers On The Sun', 3, 15),
(189, 'Goodbye Friend', 4, 15),
(190, 'Lift Me Up', 4, 15),
(191, 'Listen', 4, 15),
(192, 'Bang My Head', 4, 15),
(193, 'Yesterday', 4, 15),
(194, 'Hey Mama', 3, 15),
(195, 'Sun Goes Down', 3, 15),
(196, 'S.T.O.P.', 4, 15),
(197, 'I''ll Keep Loving You', 3, 15),
(198, 'The Wisperer', 4, 15),
(199, 'Bad', 3, 15),
(200, 'Rise', 4, 15),
(201, 'Shot Me Down', 3, 15),
(202, 'Dangerous (Extra)', 3, 15),
(203, 'Give Life Back to Music', 5, 16),
(204, 'The Game Of Love', 5, 16),
(205, 'Giorgio by Moroder', 9, 16),
(206, 'Within', 4, 16),
(207, 'Instant Crush', 6, 16),
(208, 'Lose Yourself to Dance', 6, 16),
(209, 'Touch', 8, 16),
(210, 'Get Lucky', 6, 16),
(211, 'Beyond', 5, 16),
(212, 'Motherboard', 6, 16),
(213, 'Fragments of Time', 5, 16),
(214, 'Doin''it Right', 4, 16),
(215, 'Contact', 6, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int(9) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `contrasena` varchar(64) COLLATE utf8_spanish2_ci NOT NULL,
  `tema` varchar(35) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `telefono` int(9) DEFAULT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `usuario`, `contrasena`, `tema`, `tipo`, `nombre`, `apellidos`, `telefono`, `direccion`) VALUES
(1, 'jesusmhe', '827ccb0eea8a706c4c34a16891f84e7b', 'tema1', 'Admin', 'Jesus', 'Mantilla Herrera', 633325162, NULL),
(2, 'ajvjimenez', '827ccb0eea8a706c4c34a16891f84e7b', 'tema1', 'Admin', 'Antonio', 'Jimenez Verdejo', 622251215, 'C/artrt'),
(3, 'Pepito', '827ccb0eea8a706c4c34a16891f84e7b', 'tema1', 'Cliente', 'cliente', 'cliente', 123456789, 'c/prueba'),
(4, 'Juanito', '827ccb0eea8a706c4c34a16891f84e7b', 'tema3', 'Cliente', 'juanito', 'asd', 954954954, 'C/as'),
(5, 'Fernando', '7815696ecbf1c96e6894b779456d330e', 'tema1', 'Cliente', 'fernando', 'asdsad', 954645852, ''),
(6, 'Papito', '827ccb0eea8a706c4c34a16891f84e7b', 'tema1', 'Cliente', 'papito', 'etryr', 955130245, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concierto`
--

CREATE TABLE IF NOT EXISTS `concierto` (
  `idConcierto` int(9) NOT NULL,
  `fecha` date NOT NULL,
  `lugar` varchar(90) COLLATE utf8_spanish2_ci NOT NULL,
  `idInter` int(9) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `concierto`
--

INSERT INTO `concierto` (`idConcierto`, `fecha`, `lugar`, `idInter`) VALUES
(1, '2016-09-16', 'Fibes, Sevilla', 1),
(3, '2017-04-01', 'Huelva', 5),
(4, '2017-04-23', 'Madrid arena', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disco`
--

CREATE TABLE IF NOT EXISTS `disco` (
  `idDisco` int(5) NOT NULL,
  `titulo` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `duracion` int(5) DEFAULT NULL,
  `formato` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `precio` decimal(6,0) DEFAULT NULL,
  `stock` int(5) DEFAULT NULL,
  `caratula` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `idDiscografica` int(9) NOT NULL,
  `idInter` int(9) NOT NULL,
  `idEstilo` int(9) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `disco`
--

INSERT INTO `disco` (`idDisco`, `titulo`, `duracion`, `formato`, `precio`, `stock`, `caratula`, `idDiscografica`, `idInter`, `idEstilo`) VALUES
(1, 'The Pinkprint', 67, 'CD', '10', 99, 'thepinkprint.jpg', 2, 1, 1),
(2, 'Magna Carta... Holy Grail', 59, 'CD', '10', 97, 'magnaCarta.jpg', 1, 2, 2),
(3, 'Hijo del Levante', 62, 'CD', '12', 0, 'hijodellevante.jpg', 3, 3, 9),
(4, 'Unorthodox Jukebox', 34, 'CD', '50', 97, 'unorthodoxJukebox.jpg', 4, 4, 1),
(5, '18 Months', 49, 'CD', '50', 100, '18months.jpg', 5, 5, 6),
(6, 'Reclassified', 41, 'CD', '50', 100, 'reclassified.jpg', 6, 6, 2),
(7, 'My Everything', 50, 'CD', '15', 94, 'myeverything.jpg', 7, 7, 1),
(8, 'X', 65, 'CD', '17', 100, 'x.jpg', 4, 8, 3),
(9, 'V', 40, 'CD', '20', 100, 'v.jpg', 8, 9, 3),
(10, 'Title', 45, 'CD', '14', 98, 'title.jpg', 9, 10, 3),
(11, 'American Beauty/American Psycho', 39, 'CD', '14', 98, 'AmericanBeautyAmericanPsycho.jpg', 10, 11, 7),
(12, 'Uptown Special', 38, 'CD', '18', 99, 'uptownSpecial.jpg', 5, 12, 7),
(13, 'Ghost Stories', 40, 'CD', '19', 10, 'GhostStories.jpg', 11, 13, 3),
(14, '1000 Forms of Fear', 48, 'CD', '16', 22, '1000formsoffear.jpg', 12, 14, 6),
(15, 'Listen', 1, 'CD', '16', 60, 'Listen.jpg', 13, 15, 6),
(16, 'Random Access Memories', 74, 'CD', '13', 4, 'RandomAccessMemories.jpg', 5, 16, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discografica`
--

CREATE TABLE IF NOT EXISTS `discografica` (
  `idDiscografica` int(9) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `discografica`
--

INSERT INTO `discografica` (`idDiscografica`, `nombre`) VALUES
(1, 'S. Carter Enterprises'),
(2, 'Cash Money Records Inc.'),
(3, 'Senador'),
(4, 'Atlantic Records'),
(5, 'Columbia Records'),
(6, 'Virgin Emi'),
(7, 'Republic Records'),
(8, 'Interscope'),
(9, 'Epic Records'),
(10, 'Island Records'),
(11, 'Parlophone'),
(12, 'Monkey Puzzle'),
(13, 'Warner Music Group');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estilo`
--

CREATE TABLE IF NOT EXISTS `estilo` (
  `idEstilo` int(9) NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estilo`
--

INSERT INTO `estilo` (`idEstilo`, `tipo`) VALUES
(1, 'R&B'),
(2, 'Hip-Hop'),
(3, 'Pop'),
(4, 'Rock'),
(5, 'Reggae'),
(6, 'Electronica'),
(7, 'Alternativa'),
(8, 'Clasica'),
(9, 'Flamenco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interprete`
--

CREATE TABLE IF NOT EXISTS `interprete` (
  `idInt` int(9) NOT NULL,
  `name` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `alias` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `pais` varchar(25) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `interprete`
--

INSERT INTO `interprete` (`idInt`, `name`, `apellidos`, `alias`, `pais`) VALUES
(1, 'Onika Tanya', 'Maraj', 'Nicki Minaj', 'Venezuela'),
(2, 'Shawn Corey', 'Carter', 'Jay-Z', 'USA'),
(3, 'Jose Luis', 'Figuereo', 'El Barrio', 'España'),
(4, 'Peter Gene', 'Hernandez', 'Bruno Mars', 'USA'),
(5, 'Adam Richard', 'Wiles', 'Calvin Harris', 'Escocia'),
(6, 'Amethyst Amelia', 'Kelly', 'Iggy Azalea', 'Australia'),
(7, 'Ariana ', 'Grande-Butera', 'Ariana Grande', 'USA'),
(8, 'Edward Christopher', 'Sheeran', 'Ed Sheeran', 'UK'),
(9, 'Adam Noah', 'Levine', 'Maroon 5', 'USA'),
(10, 'Meghan Elizabeth', 'Trainor', 'Meghan Trainor', 'USA'),
(11, 'Patrick Martin', 'Vaughn Stump', 'Fall Out Boy', 'USA'),
(12, 'Mark Daniel', 'Ronson', 'Mark Ronson', 'UK'),
(13, 'Jonathan Mark', 'Buckland', 'Coldplay', 'UK'),
(14, 'Sia Kate', 'Isobelle Furler', 'Sia', 'Australia'),
(15, 'David Pierre', 'Guetta', 'David Guetta', 'Francia'),
(16, 'Guy-Manuel', 'de Homem-Christo', 'Daft Punk', 'Francia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE IF NOT EXISTS `venta` (
  `idVenta` int(5) NOT NULL,
  `idDisco` int(5) NOT NULL,
  `idCliente` int(9) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `fecha` date NOT NULL,
  `precioTotal` decimal(6,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`idVenta`, `idDisco`, `idCliente`, `cantidad`, `fecha`, `precioTotal`) VALUES
(7, 1, 4, 1, '2016-03-29', '10'),
(1, 2, 3, 2, '2016-03-28', '58'),
(11, 2, 5, 1, '2016-03-31', '258'),
(4, 4, 3, 1, '2016-03-29', '50'),
(11, 4, 5, 1, '2016-03-31', '258'),
(13, 4, 6, 1, '2016-03-31', '50'),
(10, 7, 3, 1, '2016-03-31', '15'),
(11, 7, 5, 5, '2016-03-31', '258'),
(11, 10, 5, 1, '2016-03-31', '258'),
(11, 11, 5, 1, '2016-03-31', '258'),
(11, 12, 5, 1, '2016-03-31', '258'),
(1, 13, 3, 2, '2016-03-28', '58'),
(6, 13, 3, 2, '2016-03-29', '38'),
(8, 13, 4, 5, '2016-03-29', '95'),
(12, 14, 3, 1, '2016-03-31', '16'),
(9, 14, 5, 1, '2016-03-31', '16'),
(11, 14, 5, 2, '2016-03-31', '258'),
(2, 15, 3, 1, '2016-03-28', '16'),
(5, 15, 3, 14, '2016-03-29', '224'),
(11, 15, 5, 2, '2016-03-31', '258'),
(3, 16, 3, 1, '2016-03-28', '13'),
(11, 16, 5, 1, '2016-03-31', '258');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD PRIMARY KEY (`idCancion`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `concierto`
--
ALTER TABLE `concierto`
  ADD PRIMARY KEY (`idConcierto`,`idInter`),
  ADD KEY `idInter` (`idInter`);

--
-- Indices de la tabla `disco`
--
ALTER TABLE `disco`
  ADD PRIMARY KEY (`idDisco`),
  ADD KEY `idDiscografica` (`idDiscografica`),
  ADD KEY `idInter` (`idInter`),
  ADD KEY `idEstilo` (`idEstilo`);

--
-- Indices de la tabla `discografica`
--
ALTER TABLE `discografica`
  ADD PRIMARY KEY (`idDiscografica`);

--
-- Indices de la tabla `estilo`
--
ALTER TABLE `estilo`
  ADD PRIMARY KEY (`idEstilo`);

--
-- Indices de la tabla `interprete`
--
ALTER TABLE `interprete`
  ADD PRIMARY KEY (`idInt`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idDisco`,`idCliente`,`idVenta`),
  ADD KEY `idVenta` (`idVenta`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idDisco` (`idDisco`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `canciones`
--
ALTER TABLE `canciones`
  MODIFY `idCancion` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=216;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `concierto`
--
ALTER TABLE `concierto`
  MODIFY `idConcierto` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `disco`
--
ALTER TABLE `disco`
  MODIFY `idDisco` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `discografica`
--
ALTER TABLE `discografica`
  MODIFY `idDiscografica` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `estilo`
--
ALTER TABLE `estilo`
  MODIFY `idEstilo` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `interprete`
--
ALTER TABLE `interprete`
  MODIFY `idInt` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `concierto`
--
ALTER TABLE `concierto`
  ADD CONSTRAINT `concierto_ibfk_1` FOREIGN KEY (`idInter`) REFERENCES `interprete` (`idInt`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `disco`
--
ALTER TABLE `disco`
  ADD CONSTRAINT `disco_ibfk_1` FOREIGN KEY (`idDiscografica`) REFERENCES `discografica` (`idDiscografica`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disco_ibfk_2` FOREIGN KEY (`idInter`) REFERENCES `interprete` (`idInt`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disco_ibfk_3` FOREIGN KEY (`idEstilo`) REFERENCES `estilo` (`idEstilo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`idDisco`) REFERENCES `disco` (`idDisco`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
