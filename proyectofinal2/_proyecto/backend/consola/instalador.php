<?php

	function persistirConsulta($sqlInsert){
		// String conexion a la base de datos
		include("configuracion/configuracion.php");

		$srtConexion 	= "mysql:".$DATABASE['host']."=localhost;dbname=".$DATABASE['database'];
		// Credenciales
		$usuario 		= $DATABASE['user'];
		$clave 			= $DATABASE['password'];
		$options = [
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
			PDO::ATTR_CASE => PDO::CASE_NATURAL,
			PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING
		];
		$conexion 	= new PDO($srtConexion, $usuario, $clave, $options); 	
		$preparo 	= $conexion->prepare($sqlInsert);
		$respuesta	= $preparo->execute(array());	

	}

$arraySQL = array();

$arraySQL[] = "
		SET FOREIGN_KEY_CHECKS=0;
		DROP TABLE IF EXISTS ciudad;
		DROP TABLE IF EXISTS cliente;
		DROP TABLE IF EXISTS empleados;
		DROP TABLE IF EXISTS envio;
		SET FOREIGN_KEY_CHECKS=1;
";

$arraySQL[] = "CREATE TABLE `ciudad` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nombre` varchar(50) DEFAULT NULL,
    `departamento` varchar(50) DEFAULT NULL,
    PRIMARY KEY (`id`)
  )";

$arraySQL[] = "ALTER TABLE ciudad AUTO_INCREMENT=100;";

$arraySQL[] = "CREATE TABLE `cliente` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `documento` varchar(20) DEFAULT NULL,
    `nombres` varchar(100) DEFAULT NULL,
    `apellidos` varchar(100) DEFAULT NULL,
    `telefono` varchar(20) DEFAULT NULL,
    `estado` bit(1) NOT NULL DEFAULT b'1',
    PRIMARY KEY (`id`),
    UNIQUE KEY `cliente_un` (`documento`)
  )";

$arraySQL[] = "CREATE TABLE `empleados` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `mail` varchar(50) DEFAULT NULL,
    `clave` varchar(200) DEFAULT NULL,
    `tipo` enum('admin','recepcionista','cadete','encargado') DEFAULT NULL,
    `estado` bit(1) NOT NULL DEFAULT b'1',
    PRIMARY KEY (`id`),
    UNIQUE KEY `empleados_email` (`mail`)
  )";

$arraySQL[] = "CREATE TABLE `envio` (
    `identificador` int(11) NOT NULL AUTO_INCREMENT,
    `codigo` varchar(6) DEFAULT NULL,
    `destinatario` varchar(100) DEFAULT NULL,
    `fecha_recepcion` datetime DEFAULT NULL,
    `fecha_envio` datetime DEFAULT NULL,
    `calle` varchar(100) DEFAULT NULL,
    `numero_puerta` int(11) DEFAULT NULL,
    `apartamento` varchar(50) DEFAULT NULL,
    `otros` varchar(100) DEFAULT NULL,
    `id_cliente` int(11) NOT NULL,
    `id_ciudad` int(11) NOT NULL,
    `estado` enum('pendiente','en_reparto','en_camino','entregado') NOT NULL,
    PRIMARY KEY (`identificador`),
    KEY `envio_FK` (`id_ciudad`),
    KEY `envio_FK_1` (`id_cliente`),
    CONSTRAINT `envio_FK` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id`),
    CONSTRAINT `envio_FK_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id`) ON DELETE CASCADE
  )  ";

$arraySQL[] = "
    INSERT INTO ciudad (id,nombre,departamento) VALUES
    (1,'solis de mataojo','canelones'),
    (3,'PUNTA RUBIA','ROCHA'),
    (6,'18 DE JULIO','SAN JOSE'),
    (7,'18 DE JULIO','ROCHA'),
    (8,'BARRA DE CARRASCO','CANELONES'),
    (9,'BARRIO HIPODROMO','MALDONADO'),
    (10,'BARRIO PEREIRA','ROCHA'),
    (11,'CANTERAS DE MARELLI','MALDONADO'),
    (13,'CERROS DE LA CALERA','RIVERA'),
    (14,'CIUDAD DE LA COSTA','CANELONES');

    INSERT INTO ciudad (id,nombre,departamento) VALUES
    (15,'COLONIA DEL SACRAMENTO','COLONIA'),
    (16,'DELTA DEL TIGRE Y VILLAS','SAN JOSE'),
    (17,'LA ESTANZUELA','COLONIA'),
    (18,'PASO CAMPAMENTO','ARTIGAS'),
    (19,'RINCON DE PACHECO','ARTIGAS'),
    (20,'TOPADOR','ARTIGAS'),
    (21,'FARO JOSE IGNACIO','MALDONADO'),
    (22,'FARO JOSE IGNACIO NORTE','MALDONADO'),
    (23,'PLAYA FOMENTO','COLONIA'),
    (24,'GIL','COLONIA');

    INSERT INTO ciudad (id,nombre,departamento) VALUES
    (25,'HARAS DEL LAGO','CANELONES'),
    (26,'INSTITUTO ADVENTISTA','CANELONES'),
    (27,'FRACCIONAMIENTO SOBRE RUTA 74','CANELONES'),
    (28,'BARROS BLANCOS','CANELONES'),
    (29,'JOSE PEDRO VARELA','LAVALLEJA'),
    (34,'ANTONIOPOLIS','ROCHA'),
    (36,'ARAMINDA','CANELONES'),
    (38,'ATLANTIDA','CANELONES'),
    (41,'LAGO JARDIN DEL BOSQUE','CANELONES'),
    (42,'LAGOMAR','CANELONES');

    INSERT INTO ciudad (id,nombre,departamento) VALUES
    (43,'LAS CAÑAS','RIO NEGRO'),
    (44,'LAS CAÑAS','DURAZNO'),
    (45,'LOS TITANES','CANELONES'),
    (46,'PASO DE LAS TOSCAS','CANELONES'),
    (47,'PASO DOÑA ROSA','ROCHA'),
    (48,'PLAYA VERDE','MALDONADO'),
    (49,'MIGUES','CANELONES'),
    (51,'BARRANCAS DE LA CORONILLA','ROCHA'),
    (56,'BELLO HORIZONTE','CANELONES'),
    (57,'BIARRITZ','CANELONES');
    
    INSERT INTO ciudad (id,nombre,departamento) VALUES
    (59,'BELEN','SALTO'),
    (60,'PROGRESO','CANELONES'),
    (61,'PUNTA DEL ESTE','MALDONADO'),
    (62,'RINCON DE CAÑADA NIETO','SORIANO'),
    (63,'ESTACION RODRIGUEZ','SAN JOSE'),
    (64,'SARANDI DEL YI','DURAZNO'),
    (69,'CARDAL','FLORIDA'),
    (73,'CASTILLOS','ROCHA'),
    (74,'FCIO SANCHEZ','COLONIA'),
    (78,'EL CHORRO','MALDONADO');
    ";

    $arraySQL[]="
    INSERT INTO cliente (documento,nombres,apellidos,telefono,estado) VALUES
    ('56781243','Ayelen','Ferrer','098156224',1),
    ('98765418','Martin','Cameto','098651872',1),
    ('58976519','Jorge','Quintero','091762774',1),
    ('98710023','Manuel','Perez','099716542',1);
    ";
    $arraySQL[]="
    INSERT INTO empleados (mail,clave,tipo,estado) VALUES
    ('admin@admin.com','fbc71ce36cc20790f2eeed2197898e71','admin',1),
    ('recepcionista1@correo.com','fbc71ce36cc20790f2eeed2197898e71','recepcionista',1),
    ('cadete@correo.com','fbc71ce36cc20790f2eeed2197898e71','cadete',1),
    ('encargado@correo.com','fbc71ce36cc20790f2eeed2197898e71','encargado',1);
    ";

    $arraySQL[]="
    INSERT INTO envio (codigo,destinatario,fecha_recepcion,fecha_envio,calle,numero_puerta,apartamento,otros,id_cliente,id_ciudad,estado) VALUES
    ('abc123','Juan Castillo',NULL,'2022-10-16 17:23:15','25 de agosto',871,'304','De 16 a 15 horas',3,1,'pendiente'),
    ('4b647d','David Rodriguez',NULL,'2022-10-17 06:10:41','18 de julio',541,'206','',4,62,'en_camino'),
    ('2de6d7','Mariel Armani','2022-10-17 22:45:58','2022-10-17 06:11:48','Mario Casinoni',998,'801','',3,73,'entregado');
    ";

    foreach($arraySQL as $sql){
            print_r($sql);
            persistirConsulta($sql);
            print_r("\n\n");
    }


?>