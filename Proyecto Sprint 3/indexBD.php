<?php
$servername = "localhost";
$username = "virtualt_g5";
$password = "Zxcvb12345";
$dbname = "virtualt_grupo5";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


 $sql = "ALTER TABLE `revistas` CHANGE `categoria` `categoria` ENUM('A1','A2','B','C') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL";
//$sql = "ALTER TABLE `users` CHANGE `areas` `areas` VARCHAR(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL";

//$sql = "alter table users  add universidad varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL";

//$sql = "ALTER TABLE `revistas` CHANGE `categoria` `categoria` ENUM('A','B','C') CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL";

//$sql = "TRUNCATE TABLE areas";


//$tildes = $conn->query("SET NAMES 'utf8'"); //Para que se inserten las tildes correctamente
/*$sql = "INSERT INTO `areas` (`id`, `nombre`, `tipo`) VALUES (1, 'MATEMATICAS', NULL),
(2, 'Educación matemática', 'MATEMATICAS'), 
(3, 'Matemáticas - optimización', 'MATEMATICAS'),
(4, 'Métodos numéricos', 'MATEMATICAS'),
(5, 'ESTADISTICA', NULL),
(6, 'Análisis estadístico', 'ESTADISTICA'),
(7, 'Análisis numérico', 'ESTADISTICA'),
(8, 'CIENCIAS QUÍMICAS', NULL),
(9, 'Bioquímica', 'CIENCIAS QUÍMICAS'),
(10, 'CIENCIAS BIOLÓGICAS', NULL),
(11, 'Ambiente marino', 'CIENCIAS BIOLÓGICAS'),
(12, 'Anatomía e histología', 'CIENCIAS BIOLÓGICAS'),
(13, 'Biodiversidad', 'CIENCIAS BIOLÓGICAS'),
(14, 'Biología celular y Funcional', 'CIENCIAS BIOLÓGICAS'),
(15, 'Microbiología', 'CIENCIAS BIOLÓGICAS'),
(16, 'OTRAS CIENCIAS NATURALES', NULL),
(17, ' Meteorología ', 'OTRAS CIENCIAS NATURALES'),
(18, ' COMPUTACIÓN, SISTEMAS, INFORMÁTICA Y CIENCIAS DE LA INFORMACIÓN ', NULL),
(19, ' Ambientes educativos mediados por TIC ', ' COMPUTACIÓN, SISTEMAS, INFORMÁTICA Y CIENCIAS DE LA INFORMACIÓN '),
(20, ' Algoritmia y diseño de algoritmos ', ' COMPUTACIÓN, SISTEMAS, INFORMÁTICA Y CIENCIAS DE LA INFORMACIÓN '),
(21, ' Aprendizaje Computacional ', ' COMPUTACIÓN, SISTEMAS, INFORMÁTICA Y CIENCIAS DE LA INFORMACIÓN '),
(22, ' Administración informática ', ' COMPUTACIÓN, SISTEMAS, INFORMÁTICA Y CIENCIAS DE LA INFORMACIÓN '),
(23, ' Arquitectura de software ', ' COMPUTACIÓN, SISTEMAS, INFORMÁTICA Y CIENCIAS DE LA INFORMACIÓN '),
(24, ' Arquitectura de Tecnología Informática TI ', ' COMPUTACIÓN, SISTEMAS, INFORMÁTICA Y CIENCIAS DE LA INFORMACIÓN '),
(25, ' Auditoría de sistemas ', ' COMPUTACIÓN, SISTEMAS, INFORMÁTICA Y CIENCIAS DE LA INFORMACIÓN '),
(26, ' Bases de datos ', 'COMPUTACIÓN, SISTEMAS, INFORMÁTICA Y CIENCIAS DE LA INFORMACIÓN '),
(27, ' Bioinformática ', ' COMPUTACIÓN, SISTEMAS, INFORMÁTICA Y CIENCIAS DE LA INFORMACIÓN '),
(28, ' Calidad de software ', ' COMPUTACIÓN, SISTEMAS, INFORMÁTICA Y CIENCIAS DE LA INFORMACIÓN '),
(29, ' Desarrollo web ', ' COMPUTACIÓN, SISTEMAS, INFORMÁTICA Y CIENCIAS DE LA INFORMACIÓN '),
(30, ' Diseño web ', ' COMPUTACIÓN, SISTEMAS, INFORMÁTICA Y CIENCIAS DE LA INFORMACIÓN '),
(31, ' Diseño y desarrollo de videojuegos ', ' COMPUTACIÓN, SISTEMAS, INFORMÁTICA Y CIENCIAS DE LA INFORMACIÓN '),
(32, ' Ingeniería de software ', ' COMPUTACIÓN, SISTEMAS, INFORMÁTICA Y CIENCIAS DE LA INFORMACIÓN '),
(33, ' Inteligencia Artificial ', ' COMPUTACIÓN, SISTEMAS, INFORMÁTICA Y CIENCIAS DE LA INFORMACIÓN '),
(34, ' Programación de computadores ', ' COMPUTACIÓN, SISTEMAS, INFORMÁTICA Y CIENCIAS DE LA INFORMACIÓN '),
(35, ' Pruebas de software ', ' COMPUTACIÓN, SISTEMAS, INFORMÁTICA Y CIENCIAS DE LA INFORMACIÓN '),
(36, ' Redes y telecomunicaciones ', ' COMPUTACIÓN, SISTEMAS, INFORMÁTICA Y CIENCIAS DE LA INFORMACIÓN '),
(37, ' Seguridad informática ', ' COMPUTACIÓN, SISTEMAS, INFORMÁTICA Y CIENCIAS DE LA INFORMACIÓN '),
(38, ' INGENIERÍA AGRONÓMICA Y AGROAMBIENTAL ', NULL),
(39, ' Abastecimiento de agua ', ' INGENIERÍA AGRONÓMICA Y AGROAMBIENTAL '),
(40, ' Agroecología ', ' INGENIERÍA AGRONÓMICA Y AGROAMBIENTAL '),
(41, ' Agroindustria ', ' INGENIERÍA AGRONÓMICA Y AGROAMBIENTAL '),
(42, ' INGENIERÍA MÉDICA Y BIOMÉDICA ', NULL),
(43, 'Bioingeniería', ' INGENIERÍA MÉDICA Y BIOMÉDICA '),
(44, ' Biología computacional ', ' INGENIERÍA MÉDICA Y BIOMÉDICA '),
(45, ' Biomecatrónica ', ' INGENIERÍA MÉDICA Y BIOMÉDICA '),
(46, ' Biotecnología ', ' INGENIERÍA MÉDICA Y BIOMÉDICA '),
(47, 'CIENCIAS BIOLÓGICAS', NULL),
(48, ' INGENIERÍA DE ALIMENTOS ', NULL),
(49, ' Ciencia y tecnología de alimentos ', ' INGENIERÍA DE ALIMENTOS '),
(50, ' INGENIERÍA DE TELECOMUNICACIONES O TELEMÁTICA ', NULL),
(51, ' Web 2.0 y 3.0 ', ' INGENIERÍA DE TELECOMUNICACIONES O TELEMÁTICA '),
(52, ' INGENIERÍA DE TRANSPORTES Y VÍAS ', NULL),
(53, ' Estructuras, vías y transporte ', ' INGENIERÍA DE TRANSPORTES Y VÍAS '),
(54, ' Tránsito y transporte ', ' INGENIERÍA DE TRANSPORTES Y VÍAS '),
(55, ' Movilidad y pavimentos ', ' INGENIERÍA DE TRANSPORTES Y VÍAS '),
(56, ' Infraestructura vial ', ' INGENIERÍA DE TRANSPORTES Y VÍAS '),
(57, ' INGENIERÍA GEOMÁTICA Y TOPOGRAFÍA ', NULL),
(58, ' Suelos ', ' INGENIERÍA GEOMÁTICA Y TOPOGRAFÍA '),
(59, ' Topografía ', ' INGENIERÍA GEOMÁTICA Y TOPOGRAFÍA '),
(60, ' INGENIERÍA ELÉCTRICA, ELECTRÓNICA, ELECTROMECÁNICA, MECÁNICA Y MECATRÓNICA ', NULL),
(61, ' Sistemas mecatrónicos ', ' INGENIERÍA ELÉCTRICA, ELECTRÓNICA, ELECTROMECÁNICA, MECÁNICA Y MECATRÓNICA '),
(62, ' Robótica ', ' INGENIERÍA ELÉCTRICA, ELECTRÓNICA, ELECTROMECÁNICA, MECÁNICA Y MECATRÓNICA '),
(63, ' MEDICINA BÁSICA ', NULL),
(64, ' Pediatría ', ' MEDICINA BÁSICA '),
(65, ' Patología ', ' MEDICINA BÁSICA '),
(66, ' Ginecología ', ' MEDICINA BÁSICA '),
(67, ' Ginecología y mastología ', ' MEDICINA BÁSICA '),
(68, ' Ginecología y obstetricia ', ' MEDICINA BÁSICA '),
(69, ' Salud ', ' MEDICINA BÁSICA '),
(70, ' Salud bucal ', ' MEDICINA BÁSICA '),
(71, ' MEDICINA CLÍNICA  ', NULL),
(72, 'Cirugía', ' MEDICINA CLÍNICA  '),
(73, 'Patología Clínica', ' MEDICINA CLÍNICA  '),
(74, 'Oncología', ' MEDICINA CLÍNICA  '),
(75, 'Parasitología', ' MEDICINA CLÍNICA  '),
(76, 'CIENCIAS DE LA SALUD', NULL),
(77, ' Administración de empresas de salud ', 'CIENCIAS DE LA SALUD'),
(78, ' DEPORTE Y RECREACIÓN ', NULL),
(79, ' Estilos de vida saludable ', ' DEPORTE Y RECREACIÓN '),
(80, ' Medicina del deporte ', ' DEPORTE Y RECREACIÓN '),
(81, ' PSICOLOGÍA ', NULL),
(82, ' Psicología educativa ', ' PSICOLOGÍA '),
(83, ' Psicología clínica y de la salud ', ' PSICOLOGÍA '),
(84, ' Psicoanálisis, Subjetividad y Cultura ', ' PSICOLOGÍA '),
(85, ' Neuropsicología ', ' PSICOLOGÍA '),
(86, ' Trabajo Social con énfasis en familia y redes sociales ', ' PSICOLOGÍA '),
(87, ' ECONOMÍA, ADMINISTRACIÓN Y NEGOCIOS ', NULL),
(88, ' Análisis econométrico ', ' ECONOMÍA, ADMINISTRACIÓN Y NEGOCIOS '),
(89, ' Análisis riesgo de inversión ', ' ECONOMÍA, ADMINISTRACIÓN Y NEGOCIOS '),
(90, ' Arquitectura empresarial ', ' ECONOMÍA, ADMINISTRACIÓN Y NEGOCIOS '),
(91, ' Pequeña y mediana empresa (PYME) ', ' ECONOMÍA, ADMINISTRACIÓN Y NEGOCIOS '),
(92, ' Business Process Management - BPM ', ' ECONOMÍA, ADMINISTRACIÓN Y NEGOCIOS '),
(93, ' Branding ', ' ECONOMÍA, ADMINISTRACIÓN Y NEGOCIOS '),
(94, ' CIENCIAS DE LA EDUCACIÓN ', NULL),
(95, ' Aprendizaje ', ' CIENCIAS DE LA EDUCACIÓN '),
(96, ' Pedagogía ', ' CIENCIAS DE LA EDUCACIÓN '),
(97, ' Evaluación educativa ', ' CIENCIAS DE LA EDUCACIÓN '),
(98, 'DERECHO ', NULL),
(99, ' Constitución civil ', 'DERECHO '),
(100, ' Constitución colombiana ', 'DERECHO '),
(101, ' Construcción de paz ', 'DERECHO '),
(102, ' Derecho civil ', 'DERECHO '),
(103, ' Derecho constitucional ', 'DERECHO '),
(104, ' Derecho de familia ', 'DERECHO '),
(105, ' Derecho laboral y la seguridad social ', 'DERECHO '),
(106, ' Derecho penal ', 'DERECHO '),
(107, ' Derecho privado ', 'DERECHO '),
(108, ' Derecho procesal ', 'DERECHO '),
(109, ' Derecho público ', 'DERECHO '),
(110, ' Derechos humanos ', 'DERECHO '),
(111, ' HISTORIA Y ARQUEOLOGÍA ', NULL),
(112, ' Teoría, historia y patrimonio ', ' HISTORIA Y ARQUEOLOGÍA '),
(113, ' IDIOMAS Y LITERATURA ', NULL),
(114, ' Política nacional y/o internacional en la educación bilingüe ', ' IDIOMAS Y LITERATURA '),
(115, ' Pedagogía de lenguas extranjeras ', ' IDIOMAS Y LITERATURA '),
(116, ' Lingüística ', ' IDIOMAS Y LITERATURA '),
(117, ' Lenguas y cultura ', ' IDIOMAS Y LITERATURA '),
(118, ' Bilingüismo ', ' IDIOMAS Y LITERATURA '),
(119, ' ARTE ', NULL),
(120, ' Arte, diseño y sociedad ', ' ARTE '),
(121, ' Artes plásticas y visuales ', ' ARTE '),
(122, ' Historia del arte ', ' ARTE '),
(123, ' Imagen y creación artística ', ' ARTE '),
(124, ' Fotografía ', ' ARTE '),
(125, ' Cine ', ' ARTE ')";
*/
/*$tildes = $conn->query("SET NAMES 'utf8'"); //Para que se inserten las tildes correctamente

$sql = "INSERT INTO `convocatorias` (`id`, `departamento`, `ciudad`, `universidad`, `areas`, `titulo`, `fecha_inicio`, `fecha_finalizacion`, `descripcion`, `enlace`, `created_at`, `updated_at`) VALUES(1, '2', '5', 'Universidad Distrital Francisco Jos? de Caldas', 'Bases de datos', 'Ingeniero de sistemas', '2016-03-01', '2016-04-30', '', 'https://www.udistrital.edu.co/admisiones/undergraduate.php', '2016-03-26 04:52:03', '2016-03-26 04:52:03')";
*/
/*
$sql = "CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL PRIMARY KEY,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `areas` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tipoUser` enum('Buscar','Publicar') COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
   UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci " ;
*/

/*
$sql = "CREATE TABLE IF NOT EXISTS `areas` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT  PRIMARY KEY, 
  `nombre` varchar(300)  NOT NULL,
  `tipo` varchar(300) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 " ;
*/

/*
$sql = "CREATE TABLE IF NOT EXISTS `departamentos` (
`id` int(10) unsigned NOT NULL PRIMARY KEY,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ";
*/
/*
$sql = "CREATE TABLE IF NOT EXISTS `ciudades` (
`id` int(10) unsigned NOT NULL PRIMARY KEY,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `departamento_id` int(10) unsigned NOT NULL,
   FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ";
*/

/*
$sql = "CREATE TABLE IF NOT EXISTS `universidades` (
`id` int(10) unsigned NOT NULL PRIMARY KEY,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad_id` int(10) unsigned NOT NULL,
   FOREIGN KEY (`ciudad_id`) REFERENCES `ciudades` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ";
*/

/*
$sql = "CREATE TABLE IF NOT EXISTS `revistas` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(10) unsigned NOT NULL,
  `universidad` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `areas` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `tipoRevista` enum('Indexada','No indexada') COLLATE utf8_unicode_ci NOT NULL,
  `categoria` enum('A','B','C') COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechaRecepcion` date DEFAULT NULL,
  `enlace` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ";
*/
/*

$sql ="CREATE TABLE IF NOT EXISTS `convocatorias` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
`user_id` int(10) unsigned NOT NULL,
  `ciudad` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `universidad` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `areas` varchar(230) COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_finalizacion` date NOT NULL,
  `descripcion` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `enlace` varchar(210) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ";
*/

/*
$sql ="CREATE TABLE IF NOT EXISTS `eventos_academicos` (
`id` int(10) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
 `user_id` int(10) unsigned NOT NULL,
  `universidad` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ciudad` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `areas` varchar(220) COLLATE utf8_unicode_ci NOT NULL,
  `titulo` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `enlace` varchar(160) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
   FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ";
*/


/*
$sql = "Drop table users";
$sql = "Drop table areas";
$sql = "Drop table departamentos";
$sql = "Drop table ciudades";
$sql = "Drop table universidades";
$sql = "Drop table revistas";
$sql = "Drop table convocatorias";
$sql = "Drop table eventos_academicos";
*/

if ($conn->query($sql) === TRUE) {
  	 //echo "Table X removed";
   	// echo "Table X created successfully";
   // echo "Datos insertados";
    //echo "Se ha vaciado la tabla";
    echo "ALTER exitoso";

} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>