
INSERT INTO `departamentos` (`id`, `nombre`) VALUES
(1, 'Boyaca'),
(2, 'Cundinamarca'),
(3, 'Antioquia'),
(4, 'Atlantico'),
(5, 'Valle del Cauca'),
(6, 'Santader Sur');


INSERT INTO `ciudades` (`id`, `nombre`, `departamento_id`) VALUES
(1, 'Tunja', 1),
(2, 'Duitama', 1),
(3, 'Sogamoso', 1),
(4, 'Chiquinquira', 1),
(5, 'Bogota', 2),
(6, 'Medellin', 3),
(7, 'Barranquilla', 4),
(8, 'Cali', 5),
(9, 'Chia', 2),
(10, 'Bucaramanga', 6),
(11, 'Envigado', 3),
(12, 'Velez', 6),
(13, 'Barrancabermeja', 6),
(14, 'Soledad', 4),
(15, 'Jamundi', 5);


INSERT INTO `universidades` (`id`, `nombre`, `ciudad_id`) VALUES
(1, 'Universidad Pedagógica y Tecnológica de Colombia (UPTC)', 1),
(2, 'Universidad de Boyacá', 1),
(3, 'Universidad Santo Tomás (USTA)', 1),
(4, 'Fundación Universitaria Juan de Castellanos (JDC)', 1),
(5, 'Universidad Antonio Nariño (UAN)', 2),
(6, 'SENA', 3),
(7, 'Universidad Nacional de Colombia (UNAL)', 5),
(8, 'Universidad Distrital Francisco José de Caldas', 5),
(9, 'Universidad Militar Nueva Granada (UMNG)', 9),
(10, 'Universidad de la Sabana', 9),
(11, 'Universidad de los Andes', 5),
(12, 'Universidad Pontificia Javeriana', 5),
(13, 'Universidad de Antioquia (UDEA)', 6),
(14, 'Universidad Nacional de Colombia (UNAD)', 6),
(15, 'Universidad EAFIT', 6),
(16, 'Universidad de Medellín (UDEM)', 6),
(17, 'Universidad del Norte (UNINORTE) ', 7),
(18, 'Universidad del Atlántico', 7),
(19, 'Universidad Autónoma del Caribe (UAC)', 7),
(20, 'Universidad Industrial de Santander (UIS)', 10),
(21, 'Universidad Francisco de Paula Santander (UFPS)', 10),
(22, 'Universidad del Cauca', 8),
(23, 'Universidad del Valle', 8);

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `nombre`) VALUES
(1, 'Redes'),
(2, 'Bases de datos'),
(3, 'Ingeniería Software'),
(4, 'Inteligencia artificial ');


--
-- Volcado de datos para la tabla `revistas`
--
INSERT INTO `revistas` (`id`, `departamento`, `ciudad`, `universidad`, `areas`, `titulo`, `tipoRevista`, `categoria`, `fechaRecepcion`, `enlace`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'Universidad Pedagógica y Tecnológica de Colombia (UPTC)', 'Ingeniería Software,Inteligencia artificial ', 'Revista Ingenieria', 'Indexada', 'C', '2016-04-03', 'http://revistas.uptc.edu.co/', '2016-03-20 20:00:48', '2016-03-20 20:00:48'),
(2, '2', '5', 'Universidad Nacional de Colombia (UNAL)', 'Bases de datos,Inteligencia artificial ', 'Revista Ingenieria', 'Indexada', 'B', '2016-02-12', 'http://www.revistas.unal.edu.co/index.php/dyna/about/submiss', '2016-03-21 20:00:48', '2016-03-21 20:00:49'),
(3, '3', '6', 'Universidad de Antioquia (UDEA)', 'Redes,Ingeniería Software ', 'Revista Ingenieria', 'Indexada', 'A', '2016-05-01', 'http://revistas.udistrital.edu.co/', '2016-03-22 20:00:48', '2016-03-22 20:00:48');
-- --------------------------------------------------------


INSERT INTO `convocatorias` (`id`, `departamento`, `ciudad`, `universidad`, `areas`, `titulo`, `fecha_inicio`, `fecha_finalizacion`, `descripcion`, `enlace`, `created_at`, `updated_at`) VALUES
(1, '2', '5', 'Universidad Distrital Francisco José de Caldas', 'Bases de datos', 'Ingeniero de sistemas', '2016-03-01', '2016-04-30', '', 'https://www.udistrital.edu.co/admisiones/undergraduate.php', '2016-03-25 23:52:03', '2016-03-25 23:52:03'),
(2, '1', '1', 'Universidad Santo Tomás (USTA)', 'Redes', 'Ingeniero Civil', '2016-03-10', '2016-04-11', 'Con conocimiento en infraestuctura vial', 'http://www.uptc.edu.co/vicerectoria_academica/convocatoria/bie/2015/index.html', '2016-03-26 00:06:24', '2016-03-26 00:06:24');

INSERT INTO `eventos_academicos` (`id`, `departamento`, `ciudad`, `universidad`, `areas`,`titulo`, `fecha_evento`, `enlace`, `created_at`, `updated_at`) VALUES
(1, '2', '9', 'Universidad de la Sabana', 'Bases de datos','Ponencia de Bases de Datos NoSQL', '2016-03-27', 'http://www.enfermeria.unal.edu.co/XVIIISeminario_Internacional_de_Cuidado/', '2016-03-26 19:20:16', '2016-03-29 19:20:19'),
(2, '3', '6', 'Universidad Nacional de Colombia (UNAD)',  'Ingeniería Software', 'Seminario de Investigacion en Redes Neuronales', '2016-03-13', 'http://www.unal.edu.co/diracad/ddocente/seminario/2016_I/', '2016-04-26 19:41:52', '2016-04-28 19:41:52');