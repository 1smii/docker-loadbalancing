<?php

$mysqli = new mysqli("db", "mustelaris", "123456", "consultas");

/* comprobar la conexión */
if ($mysqli->connect_errno) {
  printf("Falló la conexión: %s\n", $mysqli->connect_error);
  exit();
}else{
  printf("Estamos entrando weey");
}


/* Crear una tabla */
$stmc = $mysqli->prepare(<<<EOD
      CREATE TABLE user (id int(11) unsigned NOT NULL AUTO_INCREMENT,
      userName varchar(32) DEFAULT NULL,
      password varchar(32) DEFAULT NULL,
      realName varchar(32) DEFAULT NULL,
      PRIMARY KEY (id))
      ENGINE=InnoDB DEFAULT CHARSET=utf8;
EOD);
$stmc->execute();
$stmc->close();

/* Añadir datos */
$stmt = $mysqli->prepare(<<<EOD
      INSERT INTO user (userName,password,realName) VALUES ('pepito','pepon','Pepe');
EOD);
$stmt->execute();
$stmt->close();

/* Consulta */
$resultado = $mysqli->query("SELECT * FROM user");
$resultado = $resultado->fetch_all();

$ipaddr = $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];

echo "<h2>Bienvenido a mi mejor servidor DALE A LAIK</h2>";
echo "<h3>Hola! Mi dirección IP es: $ipaddr </h3>";
echo "<h3>Y mi puerto es: $port </h3>";
echo "<h3>El resultado de la consulta es: </h3>";
print_r($resultado[0][1]);

?>
