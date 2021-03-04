<?php

//CRIAR IMAGEM DO SERVIDOR AWS
//https://www.youtube.com/watch?v=yREIVJWRr7o

//criar grafo simples com php
//https://www.devmedia.com.br/criando-graficos-com-php/11466

//usando banco de dados 
//https://www.gigasystems.com.br/artigo/16/como-exibir-graficos-em-php


//BIBLIOTECA PHP PLOT

//FAZENDO GRAFICO COM PHP E MYSQL
//SELECT valor FROM leitura WHERE id_sensor = 1 ORDER BY datahora DESC LIMIT 5


 
https://www.youtube.com/watch?v=Z62QAN5mP5M

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