-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-06-2016 a las 20:22:50
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `advanced`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1465089978),
('admin', '3', 1465183366),
('admin', '6', 1465178540),
('admin', '7', 1465252551),
('autor', '2', 1464938885),
('autor', '3', 1465100704),
('autor', '5', 1465175227),
('autor', '6', 1465178540),
('creador', '2', 1465098910),
('creador', '3', 1464941862),
('creador', '5', 1465175227),
('superadmin', '1', 1464936850);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'administra el back', NULL, NULL, 1464934406, 1464934406),
('autor', 1, 'autor de posts', NULL, NULL, 1464934420, 1464934420),
('creador', 2, 'crea contenido', NULL, NULL, 1464933918, 1464933918),
('superadmin', 1, 'super administrador del sitio', NULL, NULL, 1464934382, 1465098305),
('suscriptor', 1, 'se ha suscripbido a la web', NULL, NULL, 1464934450, 1464934450);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('superadmin', 'admin'),
('superadmin', 'autor'),
('superadmin', 'creador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `id` int(11) NOT NULL,
  `etiqueta` varchar(30) NOT NULL,
  `post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1464887861),
('m140209_132017_init', 1464887867),
('m140403_174025_create_account_table', 1464887869),
('m140504_113157_update_tables', 1464887875),
('m140504_130429_create_token_table', 1464887877),
('m140506_102106_rbac_init', 1464889484),
('m140830_171933_fix_ip_field', 1464887879),
('m140830_172703_change_account_table_name', 1464887880),
('m141222_110026_update_ip_field', 1464887881),
('m141222_135246_alter_username_length', 1464887882),
('m150614_103145_update_social_account_table', 1464887885),
('m150623_212711_fix_username_notnull', 1464887885);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `autor` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`id`, `titulo`, `descripcion`, `fecha`, `autor`, `visible`) VALUES
(1, 'Hola mundo', '<p>mi primer post</p>', '2016-06-03 12:55:00', 2, 1),
(6, 'Creación de VLANs en routers Mikrotik.', '<p style="text-align: justify;">Esta entrada es una traducción del artículo “<a href="http://blog.butchevans.com/2010/02/to-tag-or-not-to-tag-that-is-the-question/">To tag or not to tag…that is the question!</a>” de <a href="http://blog.butchevans.com/">Butch Evans</a>, publicado en su blog el 24 de febrero de 2010.\r\n</p>\r\n<p style="text-align: justify;">Hay una cuestión muy solicitada de cómo los routers Mikrotik tratan el tráfico de VLAN.\r\n</p>\r\n<p style="text-align: justify;"><a href="undefined">math</a><img style="line-height: 1.6em;"><br>\r\n</p>\r\n<p style="text-align: justify;">Déjenme empezar por el concepto más simple pero que es un buen fundamento para el resto del artículo:\r\n</p>\r\n<blockquote style="text-align: justify;">Cuando se crea un interface VLAN, a todos los efectos el router se cree que tiene un nuevo interface físico.\r\n</blockquote>\r\n<p style="text-align: justify;">Examinemos esta red:\r\n</p>\r\n<p style="text-align: justify;"><img src="https://dl.dropboxusercontent.com/u/70868298/Vlan1.png" alt="vlan" style="width: 304px; height: 75px; display: block; margin: auto;" width="304" height="75">\r\n</p>\r\n<p style="text-align: justify;">Cuando el router tiene que dirigir tráfico, lo hace basado en la ip asignada a cada interface. Por ejemplo, en la imagen, todo el tráfico dirigido a la red 10.10.10.0/24 es dirigido al puerto ether1. Esto lo hace consultando su tabla de rutas.\r\n</p>\r\n<hr>\r\n<p style="text-align: justify;">Vamos a ver otro ejemplo: <br><img src="https://dl.dropboxusercontent.com/u/70868298/vlan_iface1.png" alt="vlan-tagged" style="display: block; margin: auto;"> <br>De forma similar a la primera red, cuando el MT necesita comunicarse con la red 10.10.10.0/24, consulta su tabla de rutas. En este caso, el interface 10.10.10.1/24 es un interface VLAN que puede crearse con el siguiente código:\r\n</p>\r\n<pre class="prettyprint" style="background-color:white;" align="justify"><code>/<strong>interface</strong> <strong>vlan</strong> <strong><span class="hljs-title">add</span></strong> <strong>name</strong>=vlan_1_e1 <strong>interface</strong>=ether1 vlan-id=<span class="hljs-number">1</span> <br>/ip address <strong>add</strong> <strong>interface</strong>=vlan_1_e1 address=<span class="hljs-number">10.10</span><span class="hljs-number">.</span><span class="hljs-number"><span class="hljs-number">10</span><span class="hljs-number">.1</span></span>/<span class="hljs-number">24</span></code>\r\n</pre>\r\n<p style="text-align: justify;">La primera línea crea un interface vlan con un nombre descriptivo apropiado, asocia la vlan al puerto FÍSICO ether1 y configura la vlan-id (el tag) como “1”.\r\n</p>\r\n<p style="text-align: justify;">La segunda línea añade una dirección ip al interface vlan.\r\n</p>\r\n<blockquote style="text-align: justify;">Cualquier tráfico destinado a la red 10.10.10.0/24 abandonará el router por este interface y, ya que lo hace por un interface vlan, este tráfico va ha ser marcado con la vlan-id 1.\r\n</blockquote>\r\n<p style="text-align: justify;">Así como vamos a ir examinando otros tipos de configuraciones posibles, pensar siempre que lo único que hace que un paquete abandone el router con el tag de la vlan o no, es simplemente esto: Cada vez que un paquete abandona el router POR UN INTERFAZ VLAN, será marcado con la vlan. No es más complicado que esto.\r\n</p>', '2016-06-05 09:13:17', 1, 1),
(7, 'Apple contrató a experto en criptografía para reforzar la “seguridad” de sus dispositivos', '<p style="text-align: justify;">El <strong>FBI</strong> y otras agencias de seguridad han iniciado una guerra legal en contra de tecnologías de cifrado y privacidad.</p><p style="text-align: justify;">Seguro haz escuchado o leído varias noticias acerca de la batalla legal que tiene <strong>Apple</strong> contra el FBI por desbloquear el iPhone que perteneció al tirador de San Bernardino. Sin embargo, esta fue sólo una batalla, dentro de una más grande.</p><hr><p style="text-align: justify;">Ahora, en un esfuerzo por mejorar la seguridad de su dispositivo (iPhone), Apple ha contratado de nuevo al experto en seguridad y cifrado <strong>Jon Callas, </strong>quien a su vez ha tenido un importante papel en empresas como PGP Corp, Silent Circle y el fabricante del supuesto teléfono mas seguro del mundo: <strong>BlackPhone</strong>.</p><p style="text-align: justify;">Pocos meses atrás, la compañía contrató a <strong>Frederic Jacobs, </strong>uno de los desarrolladores de Signal (<em>la aplicación de mensajería cifrada más segura y openSource).</em></p><p style="text-align: justify;"><em><strong>Jon Callas</strong> </em>ha trabajado anteriormente para Apple en dos ocasiones, la primera en 1995 hasta 1997 y la segunda vez desde el 2009 al 2011. Durante esta segunda vez que Callas se unió diseñó un sistema de cifrado “full-disk” para proteger los datos almacenados en los ordenadores Macintosh.</p><p style="text-align: justify;">Esta decisión de Apple, llega poco después de que la misma compañía aclaró que está trabajando en mejorar la seguridad de todos sus productos iOS para que incluso Apple tampoco pueda “hackearlos”.</p><p style="text-align: justify;">Tras esta aclaración, Apple promete no abrir nunca un backdoor o puerta trasera a los gobiernos para acceder a información, ni siquiera para resolver casos o crímenes. Con Jon Callas de nuevo en el equipo de seguridad, seguro podrán reforzar aún más sus dispositivos.</p>', '2016-06-06 01:10:59', 2, 1),
(8, 'SWIFT System: Banco Ecuatoriano perdió $12 millones a raíz de un ‘malware’', '<h4 style="text-align: justify;">Banco Ecuatoriano reporta que perdió $12 millones a raíz de un ‘malware’ en el sistema de pagos SWIFT, que permitió eludir todos los controles de seguridad y pudieron exponer al sistema a la posibilidad de sufrir transferencias ilegales de dinero.</h4><hr><p style="text-align: justify;">‘Hackers’ robaron $12 millones de un Banco Ecuatoriano, al igual que paso con el banco central de Bangladesh y un pequeño prestamista vietnamita.</p><p style="text-align: justify;"><strong>Banco del Austro S.A. </strong>dijo en una demanda presentada en Nueva York contra Wells Fargo &amp; Co. que los hackers obtuvieron acceso a los códigos que el Banco utiliza para mover o realizar transferencias de dinero a través de Swift (la red global de pagos y mensajería entre bancos) y utilizado para transferir fondos desde el Banco de los Estados Unidos. Aunque el ataque ocurrió hace mas de 15 meses, una portavoz de Swift dijo a Reuters que la firma había recién descubierto este ataque, en donde los bancos no han estado compartiendo detalles de estos ataques con la cooperativa. Un representante de Wells Fargo no respondió de inmediato una llamada en busca de comentarios acerca del tema.</p><hr><p style="text-align: justify;"><strong>TPBank</strong>, Banco de Vietnam, informó a los reguladores del país esta semana que había bloqueado una solicitud de transferencia fraudulenta a finales del pasado año por más de 1 millón de euros ($1,1 millones) que procedía de un servicio de terceros que el Banco utiliza para conectarse al sistema Swift. En febrero, Bangladesh perdió $81 millones después de que su banco central fue infectado con malware. Los ataques han suscitado preocupaciones dentro de bancos globales, algunas de las cuales están presionando de forma privada a Swift para reforzar la ‘seguridad’ de su sistema.</p><hr><p style="text-align: justify;"><strong>Esta es la forma en la que los ‘hackers’ atacan los bancos:</strong></p><ul><li>Usan ‘Malware’ para infectar y eludir los controles de seguridad de los sistemas bancarios.</li><li>Obtienen acceso a la red de mensajería de SWIFT.</li><li>Envían mensajes fraudulentos vía SWIFT para iniciar transferencias de dinero desde cuentas en los bancos mas grandes.</li></ul><p style="text-align: justify;">“En especial, recordamos a todos los usuarios que respeten sus obligacions de informar inmediatamente a SWIFT de cualquier sospecha de uso fraudulento de la conectividad SWIFT de su institución”, dijo la firma el viernes en un comunicado. “Actualmante estamos trabajando para reforzar aún más nuestro sistema en apoyo a los clientes en la obtención de su acceso a la red SWIFT”.</p>', '2016-06-10 01:06:09', 2, 1),
(9, 'Foro de BitTorrent hackeado ¿IPB Vulnerable?', '<h4 style="text-align: justify;">Si eres de los que usan torrents a diario y te has registrado en el foro de la comunidad BitTorrent, entonces tus datos personales pueden estar comprometidos, junto con el hash de tu contraseña.</h4><hr><p style="text-align: justify;"><em>El equipo de BitTorrent ha anunciado que el foro de su comunidad ha sido hackeado, y en donde se han comprometido datos privados de cientos de miles de usuarios.</em></p><p style="text-align: justify;"><em><strong><span class="">BitTorrent</span></strong> es <span class="">el</span> cliente de torrent <span class="">más</span> <span class="">visitado</span> del mundo con más de 150 millones de usuarios <span class="">activos</span> <span class="">mensuales</span>. </em><em>Además de esto, BitTorrent también tiene un foro que posee cientos de miles de miembros registrados, con decenas de miles de visitantes diarios.</em></p><hr><p style="text-align: justify;"><em>Una reciente alerta de seguridad por el equipo de BitTorrent, expresa que la Base de Datos del foro ha sido comprometida por Hackers que ganaron acceso a las contraseñas de sus usuarios. BitTorrent alertó y recomendó a los usuarios que cambien de contraseña tan pronto como sea posible, como una medida muy común cuando ocurre este tipo de ataques.</em></p><hr><p style="text-align: justify;"><em>La vulnerabilidad se cree que se originó en uno de sus proveedores, que alertó al equipo de BitTorrent sobre el tema a principios de esta semana.</em></p><blockquote style="text-align: justify;"><em><span class="">“La</span> <span class="">vulnerabilidad</span> al parecer se originó a través de uno de los proveedores de otros clientes torrent. <span class="">Sin embargo,</span> permitió a <span class="">los atacantes</span> acceder a alguna información de otras <span class="highlighted">cuentas” uTorrent en su foro escribe</span> “Como <span class="">resultado de esto</span>, los atacantes pudieron descargar una lista de <span class="">nuestros</span> <span class="">usuarios</span> del <span class="">foro</span>.”</em></blockquote><hr><p style="text-align: justify;"><em>El investigador de seguridad Troy Hunt de alguna manera obtuvo acceso a la base de <span class="">datos</span> robada y ya ha creado una notificacion de la brecha de seguridad en su sitio <a href="https://haveibeenpwned.com/" target="_blank">Have I Been Pwned</a> que incluye 34,000 datos personales, hash en sha1 de las contraseñas, direcciones IP de usuarios del foro de BitTorrent.</em></p><p style="text-align: justify;"><em>Se ha recomendado a todos los usuarios cambiar las contraseñas del Foro, así mismo las de otros sitios, en caso de que utilicen las mismas contraseñas para otros servicios.</em></p><p style="text-align: justify;"><em><br></em></p>', '2016-06-10 01:12:37', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`) VALUES
(1, 'Administrador', 'admin@davidhurtado.tk', 'admin@davidhurtado.tk', 'a17dd825a06c1584ae66550494701e64', 'Ecuador', 'http://www.davidhurtado.tk', 'Tengo 20 años.\r\nEstudio en la PUCESE.\r\n#ProgramarEstiloDeVida'),
(2, 'David Alfredo Hurtado Chichande', 'david.hurtado.chichande@gmail.com', '', 'd41d8cd98f00b204e9800998ecf8427e', 'Esmeraldas - Ecuador', 'http://ecuafull.tk', 'Amante a la programación web :)'),
(7, 'Marc Grob', 'marc@gmail.com', '', 'd41d8cd98f00b204e9800998ecf8427e', 'Esmeraldas - Ecuador', 'http://convision.com', 'Profesor de la PUCESE en la escuela de ingeniería en sistemas y computacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(1, '28SVI1odN9-SiXXPCoNXAeAFXomLd2yP', 1465171341, 1),
(1, 'LH3e2Tnwv9nsPzy3ub_O2K3xtomNU7V6', 1464888385, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `status`) VALUES
(1, 'admin', 'admin@davidhurtado.tk', '$2y$12$TsjYLwkqzN3gcLkWflo0/e21ITMt7XJLQ3wVnnpOpZ8E6oPIrV88m', 'gzFRgMGlc-n5xyVWuSD9GlC8yDfvZu3p', 1464889498, NULL, NULL, '127.0.0.1', 1464888385, 1464888385, 0, 0),
(2, 'david', 'david@gmail.com', '$2y$12$QdYPgz0lE2V69OA5z.fe.uqr2XP38NReJjjYFPQYmLIyTuUvds0SG', 'F9VofLHVC0IowQGOK3eywr_4IXG1JFUY', 1464933864, NULL, NULL, '127.0.0.1', 1464933865, 1465252622, 0, 0),
(7, 'marc', 'marc@gmail.com', '$2y$12$WCtbTUyufMnr6xz8vOCGdO49qpBjD80zcxHxJCXOFGvsx2sbLXQJ2', 'zqwJ8NR94E0yaOUctiJUKrTtGtHzodY4', 1465252351, NULL, NULL, '186.42.182.9', 1465252351, 1465252351, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indices de la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indices de la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indices de la tabla `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `titulo` (`titulo`),
  ADD KEY `autor` (`autor`);

--
-- Indices de la tabla `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indices de la tabla `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_email` (`email`),
  ADD UNIQUE KEY `user_unique_username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `poten` FOREIGN KEY (`id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD CONSTRAINT `cascade` FOREIGN KEY (`id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`autor`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
