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
(2, 'Educaci�n matem�tica', 'MATEMATICAS'), 
(3, 'Matem�ticas - optimizaci�n', 'MATEMATICAS'),
(4, 'M�todos num�ricos', 'MATEMATICAS'),
(5, 'ESTADISTICA', NULL),
(6, 'An�lisis estad�stico', 'ESTADISTICA'),
(7, 'An�lisis num�rico', 'ESTADISTICA'),
(8, 'CIENCIAS QU�MICAS', NULL),
(9, 'Bioqu�mica', 'CIENCIAS QU�MICAS'),
(10, 'CIENCIAS BIOL�GICAS', NULL),
(11, 'Ambiente marino', 'CIENCIAS BIOL�GICAS'),
(12, 'Anatom�a e histolog�a', 'CIENCIAS BIOL�GICAS'),
(13, 'Biodiversidad', 'CIENCIAS BIOL�GICAS'),
(14, 'Biolog�a celular y Funcional', 'CIENCIAS BIOL�GICAS'),
(15, 'Microbiolog�a', 'CIENCIAS BIOL�GICAS'),
(16, 'OTRAS CIENCIAS NATURALES', NULL),
(17, ' Meteorolog�a ', 'OTRAS CIENCIAS NATURALES'),
(18, ' COMPUTACI�N, SISTEMAS, INFORM�TICA Y CIENCIAS DE LA INFORMACI�N ', NULL),
(19, ' Ambientes educativos mediados por TIC ', ' COMPUTACI�N, SISTEMAS, INFORM�TICA Y CIENCIAS DE LA INFORMACI�N '),
(20, ' Algoritmia y dise�o de algoritmos ', ' COMPUTACI�N, SISTEMAS, INFORM�TICA Y CIENCIAS DE LA INFORMACI�N '),
(21, ' Aprendizaje Computacional ', ' COMPUTACI�N, SISTEMAS, INFORM�TICA Y CIENCIAS DE LA INFORMACI�N '),
(22, ' Administraci�n inform�tica ', ' COMPUTACI�N, SISTEMAS, INFORM�TICA Y CIENCIAS DE LA INFORMACI�N '),
(23, ' Arquitectura de software ', ' COMPUTACI�N, SISTEMAS, INFORM�TICA Y CIENCIAS DE LA INFORMACI�N '),
(24, ' Arquitectura de Tecnolog�a Inform�tica TI ', ' COMPUTACI�N, SISTEMAS, INFORM�TICA Y CIENCIAS DE LA INFORMACI�N '),
(25, ' Auditor�a de sistemas ', ' COMPUTACI�N, SISTEMAS, INFORM�TICA Y CIENCIAS DE LA INFORMACI�N '),
(26, ' Bases de datos ', 'COMPUTACI�N, SISTEMAS, INFORM�TICA Y CIENCIAS DE LA INFORMACI�N '),
(27, ' Bioinform�tica ', ' COMPUTACI�N, SISTEMAS, INFORM�TICA Y CIENCIAS DE LA INFORMACI�N '),
(28, ' Calidad de software ', ' COMPUTACI�N, SISTEMAS, INFORM�TICA Y CIENCIAS DE LA INFORMACI�N '),
(29, ' Desarrollo web ', ' COMPUTACI�N, SISTEMAS, INFORM�TICA Y CIENCIAS DE LA INFORMACI�N '),
(30, ' Dise�o web ', ' COMPUTACI�N, SISTEMAS, INFORM�TICA Y CIENCIAS DE LA INFORMACI�N '),
(31, ' Dise�o y desarrollo de videojuegos ', ' COMPUTACI�N, SISTEMAS, INFORM�TICA Y CIENCIAS DE LA INFORMACI�N '),
(32, ' Ingenier�a de software ', ' COMPUTACI�N, SISTEMAS, INFORM�TICA Y CIENCIAS DE LA INFORMACI�N '),
(33, ' Inteligencia Artificial ', ' COMPUTACI�N, SISTEMAS, INFORM�TICA Y CIENCIAS DE LA INFORMACI�N '),
(34, ' Programaci�n de computadores ', ' COMPUTACI�N, SISTEMAS, INFORM�TICA Y CIENCIAS DE LA INFORMACI�N '),
(35, ' Pruebas de software ', ' COMPUTACI�N, SISTEMAS, INFORM�TICA Y CIENCIAS DE LA INFORMACI�N '),
(36, ' Redes y telecomunicaciones ', ' COMPUTACI�N, SISTEMAS, INFORM�TICA Y CIENCIAS DE LA INFORMACI�N '),
(37, ' Seguridad inform�tica ', ' COMPUTACI�N, SISTEMAS, INFORM�TICA Y CIENCIAS DE LA INFORMACI�N '),
(38, ' INGENIER�A AGRON�MICA Y AGROAMBIENTAL ', NULL),
(39, ' Abastecimiento de agua ', ' INGENIER�A AGRON�MICA Y AGROAMBIENTAL '),
(40, ' Agroecolog�a ', ' INGENIER�A AGRON�MICA Y AGROAMBIENTAL '),
(41, ' Agroindustria ', ' INGENIER�A AGRON�MICA Y AGROAMBIENTAL '),
(42, ' INGENIER�A M�DICA Y BIOM�DICA ', NULL),
(43, 'Bioingenier�a', ' INGENIER�A M�DICA Y BIOM�DICA '),
(44, ' Biolog�a computacional ', ' INGENIER�A M�DICA Y BIOM�DICA '),
(45, ' Biomecatr�nica ', ' INGENIER�A M�DICA Y BIOM�DICA '),
(46, ' Biotecnolog�a ', ' INGENIER�A M�DICA Y BIOM�DICA '),
(47, 'CIENCIAS BIOL�GICAS', NULL),
(48, ' INGENIER�A DE ALIMENTOS ', NULL),
(49, ' Ciencia y tecnolog�a de alimentos ', ' INGENIER�A DE ALIMENTOS '),
(50, ' INGENIER�A DE TELECOMUNICACIONES O TELEM�TICA ', NULL),
(51, ' Web 2.0 y 3.0 ', ' INGENIER�A DE TELECOMUNICACIONES O TELEM�TICA '),
(52, ' INGENIER�A DE TRANSPORTES Y V�AS ', NULL),
(53, ' Estructuras, v�as y transporte ', ' INGENIER�A DE TRANSPORTES Y V�AS '),
(54, ' Tr�nsito y transporte ', ' INGENIER�A DE TRANSPORTES Y V�AS '),
(55, ' Movilidad y pavimentos ', ' INGENIER�A DE TRANSPORTES Y V�AS '),
(56, ' Infraestructura vial ', ' INGENIER�A DE TRANSPORTES Y V�AS '),
(57, ' INGENIER�A GEOM�TICA Y TOPOGRAF�A ', NULL),
(58, ' Suelos ', ' INGENIER�A GEOM�TICA Y TOPOGRAF�A '),
(59, ' Topograf�a ', ' INGENIER�A GEOM�TICA Y TOPOGRAF�A '),
(60, ' INGENIER�A EL�CTRICA, ELECTR�NICA, ELECTROMEC�NICA, MEC�NICA Y MECATR�NICA ', NULL),
(61, ' Sistemas mecatr�nicos ', ' INGENIER�A EL�CTRICA, ELECTR�NICA, ELECTROMEC�NICA, MEC�NICA Y MECATR�NICA '),
(62, ' Rob�tica ', ' INGENIER�A EL�CTRICA, ELECTR�NICA, ELECTROMEC�NICA, MEC�NICA Y MECATR�NICA '),
(63, ' MEDICINA B�SICA ', NULL),
(64, ' Pediatr�a ', ' MEDICINA B�SICA '),
(65, ' Patolog�a ', ' MEDICINA B�SICA '),
(66, ' Ginecolog�a ', ' MEDICINA B�SICA '),
(67, ' Ginecolog�a y mastolog�a ', ' MEDICINA B�SICA '),
(68, ' Ginecolog�a y obstetricia ', ' MEDICINA B�SICA '),
(69, ' Salud ', ' MEDICINA B�SICA '),
(70, ' Salud bucal ', ' MEDICINA B�SICA '),
(71, ' MEDICINA CL�NICA  ', NULL),
(72, 'Cirug�a', ' MEDICINA CL�NICA  '),
(73, 'Patolog�a Cl�nica', ' MEDICINA CL�NICA  '),
(74, 'Oncolog�a', ' MEDICINA CL�NICA  '),
(75, 'Parasitolog�a', ' MEDICINA CL�NICA  '),
(76, 'CIENCIAS DE LA SALUD', NULL),
(77, ' Administraci�n de empresas de salud ', 'CIENCIAS DE LA SALUD'),
(78, ' DEPORTE Y RECREACI�N ', NULL),
(79, ' Estilos de vida saludable ', ' DEPORTE Y RECREACI�N '),
(80, ' Medicina del deporte ', ' DEPORTE Y RECREACI�N '),
(81, ' PSICOLOG�A ', NULL),
(82, ' Psicolog�a educativa ', ' PSICOLOG�A '),
(83, ' Psicolog�a cl�nica y de la salud ', ' PSICOLOG�A '),
(84, ' Psicoan�lisis, Subjetividad y Cultura ', ' PSICOLOG�A '),
(85, ' Neuropsicolog�a ', ' PSICOLOG�A '),
(86, ' Trabajo Social con �nfasis en familia y redes sociales ', ' PSICOLOG�A '),
(87, ' ECONOM�A, ADMINISTRACI�N Y NEGOCIOS ', NULL),
(88, ' An�lisis econom�trico ', ' ECONOM�A, ADMINISTRACI�N Y NEGOCIOS '),
(89, ' An�lisis riesgo de inversi�n ', ' ECONOM�A, ADMINISTRACI�N Y NEGOCIOS '),
(90, ' Arquitectura empresarial ', ' ECONOM�A, ADMINISTRACI�N Y NEGOCIOS '),
(91, ' Peque�a y mediana empresa (PYME) ', ' ECONOM�A, ADMINISTRACI�N Y NEGOCIOS '),
(92, ' Business Process Management - BPM ', ' ECONOM�A, ADMINISTRACI�N Y NEGOCIOS '),
(93, ' Branding ', ' ECONOM�A, ADMINISTRACI�N Y NEGOCIOS '),
(94, ' CIENCIAS DE LA EDUCACI�N ', NULL),
(95, ' Aprendizaje ', ' CIENCIAS DE LA EDUCACI�N '),
(96, ' Pedagog�a ', ' CIENCIAS DE LA EDUCACI�N '),
(97, ' Evaluaci�n educativa ', ' CIENCIAS DE LA EDUCACI�N '),
(98, 'DERECHO ', NULL),
(99, ' Constituci�n civil ', 'DERECHO '),
(100, ' Constituci�n colombiana ', 'DERECHO '),
(101, ' Construcci�n de paz ', 'DERECHO '),
(102, ' Derecho civil ', 'DERECHO '),
(103, ' Derecho constitucional ', 'DERECHO '),
(104, ' Derecho de familia ', 'DERECHO '),
(105, ' Derecho laboral y la seguridad social ', 'DERECHO '),
(106, ' Derecho penal ', 'DERECHO '),
(107, ' Derecho privado ', 'DERECHO '),
(108, ' Derecho procesal ', 'DERECHO '),
(109, ' Derecho p�blico ', 'DERECHO '),
(110, ' Derechos humanos ', 'DERECHO '),
(111, ' HISTORIA Y ARQUEOLOG�A ', NULL),
(112, ' Teor�a, historia y patrimonio ', ' HISTORIA Y ARQUEOLOG�A '),
(113, ' IDIOMAS Y LITERATURA ', NULL),
(114, ' Pol�tica nacional y/o internacional en la educaci�n biling�e ', ' IDIOMAS Y LITERATURA '),
(115, ' Pedagog�a de lenguas extranjeras ', ' IDIOMAS Y LITERATURA '),
(116, ' Ling��stica ', ' IDIOMAS Y LITERATURA '),
(117, ' Lenguas y cultura ', ' IDIOMAS Y LITERATURA '),
(118, ' Biling�ismo ', ' IDIOMAS Y LITERATURA '),
(119, ' ARTE ', NULL),
(120, ' Arte, dise�o y sociedad ', ' ARTE '),
(121, ' Artes pl�sticas y visuales ', ' ARTE '),
(122, ' Historia del arte ', ' ARTE '),
(123, ' Imagen y creaci�n art�stica ', ' ARTE '),
(124, ' Fotograf�a ', ' ARTE '),
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