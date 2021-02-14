<?php

$servername = "db";
$username = "mustelaris";
$password = "123456";
$dbname = "consultas";
$results = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";

  $query = "SELECT * FROM user";
  $stm = $this->conn->prepare($query);
  $stm->execute();
  $results = $stm->fetch();

  foreach($results as $result){
      echo $results;
  }

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$ipaddr = $_SERVER['REMOTE_ADDR'];
$port = $_SERVER['REMOTE_PORT'];

echo "<h2>Bienvenido a mi mejor servidor DALE A LAIK</h2>";
echo "<h3>Hola! Mi dirección IP es: $ipaddr </h3>";
echo "<h3>Y mi puerto es: $port </h3>";

?>