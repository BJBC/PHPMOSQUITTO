<?php

//$client = new Mosquitto\Client();

//USANDO PDO	
$servername = "localhost"; $username = "root";
$password = ""; $sgbdname = "eventos"; $table = "empresa";

$conn = new PDO("mysql:dbname=$sgbdname;host=$servername",$username,$password);

$stmt = $conn->prepare("SELECT * FROM $table");

$stmt->execute();

//duas formas de apresentar
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
//$results = $stmt->fetchAll();

var_dump($results);

?>